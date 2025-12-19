/**
 * Text-to-Speech functionality with dual engine support
 * - Web Speech API (Free, browser-based)
 * - Google Cloud TTS (Premium, server-based)
 * Supports Tamil and English with automatic language detection
 */

class TextToSpeech {
    constructor() {
        this.synth = window.speechSynthesis;
        this.utterance = null;
        this.isPaused = false;
        this.isPlaying = false;
        this.currentLanguage = document.documentElement.lang || 'en';
        this.voices = [];
        this.currentVoiceIndex = 0;
        this.rate = 1.0;
        this.pitch = 1.0;
        this.volume = 1.0;

        // Text content
        this.titleText = '';
        this.contentText = '';
        this.fullText = '';

        // TTS Engine settings
        this.googleTTSEnabled = false;
        this.useGoogleTTS = false;
        this.audioElement = null;

        // UI Elements
        this.playerContainer = null;
        this.playBtn = null;
        this.pauseBtn = null;
        this.stopBtn = null;
        this.progressBar = null;
        this.currentTimeSpan = null;
        this.totalTimeSpan = null;
        this.rateSelect = null;
        this.volumeSlider = null;
        this.languageIndicator = null;
        this.engineToggle = null;

        this.init();
    }

    async init() {
        // Check Google TTS status
        await this.checkTTSStatus();

        // Load voices
        this.loadVoices();

        // Listen for voices changed event (some browsers load voices asynchronously)
        if (this.synth.onvoiceschanged !== undefined) {
            this.synth.onvoiceschanged = () => this.loadVoices();
        }

        // Extract text content
        this.extractTextContent();

        // Create UI
        this.createUI();

        // Bind events
        this.bindEvents();
    }

    async checkTTSStatus() {
        try {
            const response = await fetch('/api/tts/status');
            const data = await response.json();
            this.googleTTSEnabled = data.google_tts_enabled || false;
            console.log('TTS Status:', data);
        } catch (error) {
            console.warn('Failed to check Google TTS status:', error);
            this.googleTTSEnabled = false;
        }
    }

    loadVoices() {
        this.voices = this.synth.getVoices();

        // Try to find the best voice for current language
        const langCode = this.currentLanguage === 'ta' ? 'ta' : 'en';
        const preferredVoices = this.voices.filter(voice =>
            voice.lang.startsWith(langCode)
        );

        if (preferredVoices.length > 0) {
            this.currentVoiceIndex = this.voices.indexOf(preferredVoices[0]);
        }

        console.log(`TTS: Loaded ${this.voices.length} voices, using language: ${langCode}`);
    }

    extractTextContent() {
        // Get ONLY the main article title (h1 inside article header)
        const titleElement = document.querySelector('h1.text-3xl');
        this.titleText = titleElement ? titleElement.textContent.trim() : '';

        // Get ONLY the main article content from the prose div
        const contentElement = document.querySelector('.prose.prose-lg');
        if (contentElement) {
            // Clone the element to avoid modifying the DOM
            const clone = contentElement.cloneNode(true);

            // Remove ALL unwanted elements that should not be read
            clone.querySelectorAll(
                'script, style, iframe, img, svg, button, ' +
                'nav, aside, footer, header, ' +
                '.flex.items-center, .flex.flex-wrap, ' +
                '.bg-red-100, .bg-blue-100, .bg-green-100, ' +
                'span.text-xs, span.text-sm, ' +
                'a[href*="facebook"], a[href*="twitter"], a[href*="whatsapp"]'
            ).forEach(el => el.remove());

            // Get clean text content only
            this.contentText = clone.textContent
                .trim()
                .replace(/\s+/g, ' ')  // Normalize whitespace
                .replace(/\n+/g, ' ')  // Remove line breaks
                .trim();
        }

        // Combine ONLY title and content - nothing else
        this.fullText = this.titleText && this.contentText
            ? `${this.titleText}. ${this.contentText}`
            : this.titleText || this.contentText || '';

        console.log(`TTS: Extracted ${this.fullText.length} characters (Title: ${this.titleText.length}, Content: ${this.contentText.length})`);
    }

    createUI() {
        // Create floating player HTML
        const playerHTML = `
            <div id="tts-player" class="fixed bottom-6 right-6 bg-white dark:bg-gray-800 rounded-2xl shadow-2xl p-4 w-80 z-40 transform transition-all duration-300 translate-y-0 opacity-100" style="display: none;">
                <!-- Header -->
                <div class="flex items-center justify-between mb-3">
                    <div class="flex items-center space-x-2">
                        <svg class="w-5 h-5 text-blue-600 dark:text-blue-400" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M18 3a1 1 0 00-1.196-.98l-10 2A1 1 0 006 5v9.114A4.369 4.369 0 005 14c-1.657 0-3 .895-3 2s1.343 2 3 2 3-.895 3-2V7.82l8-1.6v5.894A4.37 4.37 0 0015 12c-1.657 0-3 .895-3 2s1.343 2 3 2 3-.895 3-2V3z"/>
                        </svg>
                        <h4 class="font-semibold text-gray-900 dark:text-white text-sm">Listen to Article</h4>
                        <span id="tts-language" class="text-xs px-2 py-0.5 rounded-full bg-blue-100 dark:bg-blue-900 text-blue-600 dark:text-blue-300">
                            ${this.currentLanguage === 'ta' ? 'தமிழ்' : 'English'}
                        </span>
                    </div>
                    <button id="tts-close" class="text-gray-400 hover:text-gray-600 dark:hover:text-gray-300 transition-colors">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                        </svg>
                    </button>
                </div>

                <!-- Progress Bar -->
                <div class="mb-3">
                    <div class="h-1.5 bg-gray-200 dark:bg-gray-700 rounded-full overflow-hidden cursor-pointer" id="tts-progress-container">
                        <div id="tts-progress" class="h-full bg-gradient-to-r from-blue-500 to-blue-600 transition-all duration-100" style="width: 0%"></div>
                    </div>
                    <div class="flex justify-between text-xs text-gray-500 dark:text-gray-400 mt-1">
                        <span id="tts-current-time">0:00</span>
                        <span id="tts-total-time">0:00</span>
                    </div>
                </div>

                <!-- Playback Controls -->
                <div class="flex items-center justify-center space-x-3 mb-3">
                    <button id="tts-backward" class="p-2 rounded-full hover:bg-gray-100 dark:hover:bg-gray-700 transition-colors" title="Backward 10s">
                        <svg class="w-5 h-5 text-gray-700 dark:text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12.066 11.2a1 1 0 000 1.6l5.334 4A1 1 0 0019 16V8a1 1 0 00-1.6-.8l-5.333 4zM4.066 11.2a1 1 0 000 1.6l5.334 4A1 1 0 0011 16V8a1 1 0 00-1.6-.8l-5.334 4z"/>
                        </svg>
                    </button>

                    <button id="tts-play" class="p-3 rounded-full bg-gradient-to-r from-blue-500 to-blue-600 hover:from-blue-600 hover:to-blue-700 transition-all shadow-lg hover:shadow-xl transform hover:scale-105">
                        <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M6.3 2.841A1.5 1.5 0 004 4.11V15.89a1.5 1.5 0 002.3 1.269l9.344-5.89a1.5 1.5 0 000-2.538L6.3 2.84z"/>
                        </svg>
                    </button>

                    <button id="tts-pause" class="p-3 rounded-full bg-gradient-to-r from-blue-500 to-blue-600 hover:from-blue-600 hover:to-blue-700 transition-all shadow-lg hover:shadow-xl transform hover:scale-105" style="display: none;">
                        <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M5 4a2 2 0 012-2h6a2 2 0 012 2v12a2 2 0 01-2 2H7a2 2 0 01-2-2V4z"/>
                        </svg>
                    </button>

                    <button id="tts-stop" class="p-2 rounded-full hover:bg-gray-100 dark:hover:bg-gray-700 transition-colors" title="Stop">
                        <svg class="w-5 h-5 text-gray-700 dark:text-gray-300" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M5 3a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2V5a2 2 0 00-2-2H5z"/>
                        </svg>
                    </button>

                    <button id="tts-forward" class="p-2 rounded-full hover:bg-gray-100 dark:hover:bg-gray-700 transition-colors" title="Forward 10s">
                        <svg class="w-5 h-5 text-gray-700 dark:text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.933 12.8a1 1 0 000-1.6L6.6 7.2A1 1 0 005 8v8a1 1 0 001.6.8l5.333-4zM19.933 12.8a1 1 0 000-1.6l-5.333-4A1 1 0 0013 8v8a1 1 0 001.6.8l5.333-4z"/>
                        </svg>
                    </button>
                </div>

                <!-- Engine Toggle (only show if Google TTS is enabled) -->
                <div id="tts-engine-container" class="mb-3 px-3 py-2 bg-gray-50 dark:bg-gray-700 rounded-lg" style="display: ${this.googleTTSEnabled ? 'block' : 'none'};">
                    <div class="flex items-center justify-between">
                        <span class="text-xs text-gray-600 dark:text-gray-400">TTS Engine:</span>
                        <div class="flex items-center space-x-2">
                            <label class="relative inline-flex items-center cursor-pointer">
                                <input type="checkbox" id="tts-engine-toggle" class="sr-only peer">
                                <div class="w-11 h-6 bg-gray-300 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 rounded-full peer dark:bg-gray-600 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-green-600"></div>
                            </label>
                            <span id="tts-engine-label" class="text-xs font-medium text-gray-700 dark:text-gray-300">Free</span>
                            <span class="text-xs px-2 py-0.5 rounded-full bg-amber-100 dark:bg-amber-900 text-amber-600 dark:text-amber-300" style="display: none;" id="tts-premium-badge">Premium</span>
                        </div>
                    </div>
                </div>

                <!-- Speed and Volume Controls -->
                <div class="flex items-center justify-between space-x-3 text-sm">
                    <div class="flex items-center space-x-2 flex-1">
                        <svg class="w-4 h-4 text-gray-600 dark:text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M5.5 13a3.5 3.5 0 01-.369-6.98 4 4 0 117.753-1.977A4.5 4.5 0 1113.5 13H11V9.413l1.293 1.293a1 1 0 001.414-1.414l-3-3a1 1 0 00-1.414 0l-3 3a1 1 0 001.414 1.414L9 9.414V13H5.5z"/>
                        </svg>
                        <select id="tts-rate" class="flex-1 px-2 py-1 text-xs bg-gray-50 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded text-gray-900 dark:text-white focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                            <option value="0.5">0.5x</option>
                            <option value="0.75">0.75x</option>
                            <option value="1" selected>1x</option>
                            <option value="1.25">1.25x</option>
                            <option value="1.5">1.5x</option>
                            <option value="2">2x</option>
                        </select>
                    </div>

                    <div class="flex items-center space-x-2 flex-1">
                        <svg class="w-4 h-4 text-gray-600 dark:text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M9.383 3.076A1 1 0 0110 4v12a1 1 0 01-1.707.707L4.586 13H2a1 1 0 01-1-1V8a1 1 0 011-1h2.586l3.707-3.707a1 1 0 011.09-.217zM14.657 2.929a1 1 0 011.414 0A9.972 9.972 0 0119 10a9.972 9.972 0 01-2.929 7.071 1 1 0 01-1.414-1.414A7.971 7.971 0 0017 10c0-2.21-.894-4.208-2.343-5.657a1 1 0 010-1.414zm-2.829 2.828a1 1 0 011.415 0A5.983 5.983 0 0115 10a5.984 5.984 0 01-1.757 4.243 1 1 0 01-1.415-1.415A3.984 3.984 0 0013 10a3.983 3.983 0 00-1.172-2.828 1 1 0 010-1.415z" clip-rule="evenodd"/>
                        </svg>
                        <input id="tts-volume" type="range" min="0" max="100" value="100" class="flex-1 h-1.5 bg-gray-200 dark:bg-gray-700 rounded-lg appearance-none cursor-pointer accent-blue-600">
                    </div>
                </div>
            </div>
        `;

        // Insert player into DOM
        document.body.insertAdjacentHTML('beforeend', playerHTML);

        // Cache DOM elements
        this.playerContainer = document.getElementById('tts-player');
        this.playBtn = document.getElementById('tts-play');
        this.pauseBtn = document.getElementById('tts-pause');
        this.stopBtn = document.getElementById('tts-stop');
        this.closeBtn = document.getElementById('tts-close');
        this.backwardBtn = document.getElementById('tts-backward');
        this.forwardBtn = document.getElementById('tts-forward');
        this.progressBar = document.getElementById('tts-progress');
        this.progressContainer = document.getElementById('tts-progress-container');
        this.currentTimeSpan = document.getElementById('tts-current-time');
        this.totalTimeSpan = document.getElementById('tts-total-time');
        this.rateSelect = document.getElementById('tts-rate');
        this.volumeSlider = document.getElementById('tts-volume');
        this.languageIndicator = document.getElementById('tts-language');
        this.engineToggle = document.getElementById('tts-engine-toggle');
        this.engineLabel = document.getElementById('tts-engine-label');
        this.premiumBadge = document.getElementById('tts-premium-badge');
    }

    bindEvents() {
        // Play button
        this.playBtn.addEventListener('click', () => this.play());

        // Pause button
        this.pauseBtn.addEventListener('click', () => this.pause());

        // Stop button
        this.stopBtn.addEventListener('click', () => this.stop());

        // Close button
        this.closeBtn.addEventListener('click', () => this.hidePlayer());

        // Backward/Forward buttons
        this.backwardBtn.addEventListener('click', () => this.skip(-10));
        this.forwardBtn.addEventListener('click', () => this.skip(10));

        // Rate change
        this.rateSelect.addEventListener('change', (e) => {
            this.rate = parseFloat(e.target.value);
            if (this.isPlaying && this.utterance) {
                this.restart();
            }
        });

        // Volume change
        this.volumeSlider.addEventListener('input', (e) => {
            this.volume = e.target.value / 100;
            if (this.utterance) {
                this.utterance.volume = this.volume;
            }
        });

        // Progress bar click
        this.progressContainer.addEventListener('click', (e) => {
            const rect = this.progressContainer.getBoundingClientRect();
            const percent = (e.clientX - rect.left) / rect.width;
            this.seekToPercent(percent);
        });

        // Engine toggle
        if (this.engineToggle) {
            this.engineToggle.addEventListener('change', (e) => {
                this.useGoogleTTS = e.target.checked;
                if (this.useGoogleTTS) {
                    this.engineLabel.textContent = 'Premium';
                    this.premiumBadge.style.display = 'inline-block';
                } else {
                    this.engineLabel.textContent = 'Free';
                    this.premiumBadge.style.display = 'none';
                }
                console.log('TTS Engine:', this.useGoogleTTS ? 'Google Cloud TTS' : 'Web Speech API');
            });
        }
    }

    createUtterance(text) {
        this.utterance = new SpeechSynthesisUtterance(text);

        // Set voice
        if (this.voices.length > 0 && this.currentVoiceIndex < this.voices.length) {
            this.utterance.voice = this.voices[this.currentVoiceIndex];
        }

        // Set parameters
        this.utterance.rate = this.rate;
        this.utterance.pitch = this.pitch;
        this.utterance.volume = this.volume;
        this.utterance.lang = this.currentLanguage === 'ta' ? 'ta-IN' : 'en-US';

        // Event listeners
        this.utterance.onstart = () => {
            console.log('TTS: Started speaking');
            this.updatePlaybackState(true);
        };

        this.utterance.onend = () => {
            console.log('TTS: Finished speaking');
            this.updatePlaybackState(false);
            this.resetProgress();
        };

        this.utterance.onerror = (e) => {
            console.error('TTS Error:', e);
            this.updatePlaybackState(false);
        };

        // Estimate duration and update progress
        this.estimateDuration();
        this.startProgressTracking();

        return this.utterance;
    }

    async play() {
        if (!this.fullText || this.fullText.trim().length === 0) {
            alert('No text content available to read.');
            return;
        }

        this.showPlayer();

        // Use Google TTS if enabled and selected
        if (this.useGoogleTTS && this.googleTTSEnabled) {
            await this.playWithGoogleTTS();
        } else {
            // Use Web Speech API
            this.playWithWebSpeech();
        }
    }

    async playWithGoogleTTS() {
        try {
            const response = await fetch('/api/tts/synthesize', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.content || ''
                },
                body: JSON.stringify({
                    text: this.fullText,
                    language: this.currentLanguage,
                    use_google: true
                })
            });

            const data = await response.json();

            if (data.success && data.audio_url) {
                // Play the MP3 audio file
                if (this.audioElement) {
                    this.audioElement.pause();
                    this.audioElement.src = '';
                }

                this.audioElement = new Audio(data.audio_url);
                this.audioElement.volume = this.volume;

                // Set up audio event listeners
                this.audioElement.addEventListener('play', () => {
                    this.updatePlaybackState(true);
                });

                this.audioElement.addEventListener('pause', () => {
                    this.updatePlaybackState(false);
                });

                this.audioElement.addEventListener('ended', () => {
                    this.updatePlaybackState(false);
                    this.resetProgress();
                });

                this.audioElement.addEventListener('timeupdate', () => {
                    if (this.audioElement) {
                        const progress = (this.audioElement.currentTime / this.audioElement.duration) * 100;
                        this.progressBar.style.width = `${progress}%`;
                        this.currentTimeSpan.textContent = this.formatTime(Math.floor(this.audioElement.currentTime));
                        this.totalTimeSpan.textContent = this.formatTime(Math.floor(this.audioElement.duration));
                    }
                });

                await this.audioElement.play();
                console.log('Google TTS: Playing audio', data.cached ? '(cached)' : '(generated)');
            } else {
                console.error('Google TTS failed, falling back to Web Speech API');
                this.useGoogleTTS = false;
                this.playWithWebSpeech();
            }
        } catch (error) {
            console.error('Google TTS Error:', error);
            this.useGoogleTTS = false;
            this.playWithWebSpeech();
        }
    }

    playWithWebSpeech() {
        if (this.isPaused) {
            this.synth.resume();
            this.isPaused = false;
            this.updatePlaybackState(true);
        } else {
            this.synth.cancel(); // Cancel any ongoing speech
            const utterance = this.createUtterance(this.fullText);
            this.synth.speak(utterance);
        }
    }

    pause() {
        if (this.isPlaying) {
            if (this.audioElement) {
                this.audioElement.pause();
            } else {
                this.synth.pause();
            }
            this.isPaused = true;
            this.updatePlaybackState(false);
        }
    }

    stop() {
        if (this.audioElement) {
            this.audioElement.pause();
            this.audioElement.currentTime = 0;
            this.audioElement = null;
        }
        this.synth.cancel();
        this.isPlaying = false;
        this.isPaused = false;
        this.resetProgress();
        this.updatePlaybackState(false);
    }

    restart() {
        this.stop();
        setTimeout(() => this.play(), 100);
    }

    skip(seconds) {
        // Web Speech API doesn't support seeking, so we'll restart from beginning
        // This is a limitation of the API
        console.log(`Skip ${seconds}s requested - restarting from beginning`);
        this.restart();
    }

    seekToPercent(percent) {
        // Web Speech API doesn't support seeking
        // We would need to split text and calculate position
        console.log(`Seek to ${percent * 100}% requested - restarting from beginning`);
        this.restart();
    }

    updatePlaybackState(playing) {
        this.isPlaying = playing;

        if (playing) {
            this.playBtn.style.display = 'none';
            this.pauseBtn.style.display = 'block';
        } else {
            this.playBtn.style.display = 'block';
            this.pauseBtn.style.display = 'none';
        }
    }

    estimateDuration() {
        // Rough estimation: average speaking rate is ~150 words per minute
        const words = this.fullText.split(/\s+/).length;
        const minutes = words / (150 * this.rate);
        const seconds = Math.round(minutes * 60);

        this.totalTimeSpan.textContent = this.formatTime(seconds);
    }

    startProgressTracking() {
        let startTime = Date.now();
        const words = this.fullText.split(/\s+/).length;
        const totalDuration = (words / (150 * this.rate)) * 60 * 1000; // in milliseconds

        const updateProgress = () => {
            if (this.isPlaying && !this.isPaused) {
                const elapsed = Date.now() - startTime;
                const progress = Math.min((elapsed / totalDuration) * 100, 100);

                this.progressBar.style.width = `${progress}%`;
                this.currentTimeSpan.textContent = this.formatTime(Math.round(elapsed / 1000));

                if (progress < 100) {
                    requestAnimationFrame(updateProgress);
                }
            }
        };

        requestAnimationFrame(updateProgress);
    }

    resetProgress() {
        this.progressBar.style.width = '0%';
        this.currentTimeSpan.textContent = '0:00';
    }

    formatTime(seconds) {
        const mins = Math.floor(seconds / 60);
        const secs = seconds % 60;
        return `${mins}:${secs.toString().padStart(2, '0')}`;
    }

    showPlayer() {
        this.playerContainer.style.display = 'block';
        setTimeout(() => {
            this.playerContainer.style.transform = 'translateY(0)';
            this.playerContainer.style.opacity = '1';
        }, 10);
    }

    hidePlayer() {
        this.stop();
        this.playerContainer.style.transform = 'translateY(20px)';
        this.playerContainer.style.opacity = '0';
        setTimeout(() => {
            this.playerContainer.style.display = 'none';
        }, 300);
    }
}

// Initialize TTS when DOM is ready
document.addEventListener('DOMContentLoaded', function() {
    if (typeof window !== 'undefined' && 'speechSynthesis' in window) {
        window.ttsPlayer = new TextToSpeech();
    } else {
        console.warn('Text-to-Speech is not supported in this browser');
    }
});
