@extends('layouts.book-reader')

@section('title', $book->title . ' - E-Book Reader')

@section('content')
<div class="flex flex-col bg-gray-50 dark:bg-gray-900 h-screen overflow-hidden">
    {{-- Navigation Header --}}
    <header class="bg-white dark:bg-gray-800 shadow-sm border-b border-gray-200 dark:border-gray-700 sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-16">
                <div class="flex items-center space-x-4">
                    <a href="{{ route('books') }}" class="text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-white transition-colors">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                        </svg>
                    </a>
                    <div>
                        <h1 class="text-lg font-semibold text-gray-900 dark:text-white line-clamp-1">{{ $book->title }}</h1>
                        @if($book->author)
                            <p class="text-sm text-gray-500 dark:text-gray-400">{{ $book->author }}</p>
                        @endif
                    </div>
                </div>
                <div class="flex items-center space-x-2">
                    {{-- Voice Button (shown only if TTS is supported) --}}
                    @if($book->supportsTTS())
                    <button id="voice-toggle-btn" class="p-2 text-gray-600 dark:text-gray-400 hover:text-blue-600 dark:hover:text-blue-400 hover:bg-gray-100 dark:hover:bg-gray-700 rounded-lg transition-colors" title="Voice Reading">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11a7 7 0 01-7 7m0 0a7 7 0 01-7-7m7 7v4m0 0H8m4 0h4m-4-8a3 3 0 01-3-3V5a3 3 0 116 0v6a3 3 0 01-3 3z"/>
                        </svg>
                    </button>
                    @endif
                    {{-- Zoom Controls --}}
                    <div class="flex items-center space-x-1 border-l border-gray-200 dark:border-gray-700 pl-2 ml-2">
                        <button id="zoom-out-btn" class="p-2 text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-white hover:bg-gray-100 dark:hover:bg-gray-700 rounded-lg transition-colors" title="Zoom Out">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0zM13 10H7"/>
                            </svg>
                        </button>
                        <span id="zoom-level" class="text-sm text-gray-600 dark:text-gray-400 min-w-[3rem] text-center">100%</span>
                        <button id="zoom-in-btn" class="p-2 text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-white hover:bg-gray-100 dark:hover:bg-gray-700 rounded-lg transition-colors" title="Zoom In">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0zM10 7v6m3-3H7"/>
                            </svg>
                        </button>
                    </div>
                    {{-- Fullscreen --}}
                    <button id="fullscreen-btn" class="p-2 text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-white hover:bg-gray-100 dark:hover:bg-gray-700 rounded-lg transition-colors" title="Fullscreen">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 8V4m0 0h4M4 4l5 5m11-1V4m0 0h-4m4 0l-5 5M4 16v4m0 0h4m-4 0l5-5m11 5l-5-5m5 5v-4m0 4h-4"/>
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    </header>

    {{-- Audio Controls Panel (hidden by default) --}}
    @if($book->supportsTTS())
    <div id="audio-controls-panel" class="bg-white dark:bg-gray-800 border-b border-gray-200 dark:border-gray-700 hidden">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-4">
            <div class="flex flex-col sm:flex-row items-center justify-between space-y-3 sm:space-y-0 sm:space-x-4">
                {{-- Playback Controls --}}
                <div class="flex items-center space-x-2">
                    <button id="play-pause-btn" class="p-2 bg-blue-600 hover:bg-blue-700 text-white rounded-lg transition-colors">
                        <svg id="play-icon" class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M8 5v14l11-7z"/>
                        </svg>
                        <svg id="pause-icon" class="w-5 h-5 hidden" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M6 4h4v16H6V4zm8 0h4v16h-4V4z"/>
                        </svg>
                    </button>
                    <button id="stop-btn" class="p-2 bg-gray-600 hover:bg-gray-700 text-white rounded-lg transition-colors">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M6 6h12v12H6z"/>
                        </svg>
                    </button>
                </div>

                {{-- Speed Control --}}
                <div class="flex items-center space-x-2">
                    <label class="text-sm text-gray-600 dark:text-gray-400">Speed:</label>
                    <select id="speed-select" class="px-3 py-1.5 bg-white dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-lg text-sm text-gray-900 dark:text-white focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                        <option value="0.5">0.5x</option>
                        <option value="0.75">0.75x</option>
                        <option value="1" selected>1x</option>
                        <option value="1.25">1.25x</option>
                        <option value="1.5">1.5x</option>
                        <option value="1.75">1.75x</option>
                        <option value="2">2x</option>
                    </select>
                </div>

                {{-- Volume Control --}}
                <div class="flex items-center space-x-2 flex-1 max-w-xs">
                    <svg class="w-5 h-5 text-gray-600 dark:text-gray-400" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M3 9v6h4l5 5V4L7 9H3zm13.5 3c0-1.77-1.02-3.29-2.5-4.03v8.05c1.48-.73 2.5-2.25 2.5-4.02zM14 3.23v2.06c2.89.86 5 3.54 5 6.71s-2.11 5.85-5 6.71v2.06c4.01-.91 7-4.49 7-8.77s-2.99-7.86-7-8.77z"/>
                    </svg>
                    <input type="range" id="volume-slider" min="0" max="1" step="0.1" value="1" class="flex-1 h-2 bg-gray-200 dark:bg-gray-700 rounded-lg appearance-none cursor-pointer">
                    <span id="volume-value" class="text-sm text-gray-600 dark:text-gray-400 w-10 text-right">100%</span>
                </div>

                {{-- Status --}}
                <div id="audio-status" class="text-sm text-gray-600 dark:text-gray-400">
                    Ready
                </div>
            </div>
        </div>
    </div>
    @endif

    {{-- Book Reading Section --}}
    <main class="flex-1 w-full px-2 sm:px-4 lg:px-6 py-2 overflow-hidden flex flex-col">
        {{-- Page Navigation --}}
        <div class="flex items-center justify-between mb-2">
            <button id="prev-page-btn" class="px-4 py-2 bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-600 rounded-lg text-gray-700 dark:text-gray-300 hover:bg-gray-50 dark:hover:bg-gray-700 transition-colors disabled:opacity-50 disabled:cursor-not-allowed">
                <svg class="w-5 h-5 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                </svg>
                Previous
            </button>
            <div class="text-sm text-gray-600 dark:text-gray-400">
                Page <span id="page-num">1</span> of <span id="page-count">-</span>
            </div>
            <button id="next-page-btn" class="px-4 py-2 bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-600 rounded-lg text-gray-700 dark:text-gray-300 hover:bg-gray-50 dark:hover:bg-gray-700 transition-colors disabled:opacity-50 disabled:cursor-not-allowed">
                Next
                <svg class="w-5 h-5 inline ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                </svg>
            </button>
        </div>

        {{-- PDF Canvas Container --}}
        <div id="pdf-container" class="bg-white dark:bg-gray-800 rounded-lg shadow-lg p-2 mb-2 overflow-auto flex-1" style="min-height: 0;">
            <div class="flex justify-center h-full">
                <canvas id="pdf-canvas" class="border border-gray-200 dark:border-gray-700 shadow-sm"></canvas>
            </div>
        </div>

        {{-- EPUB Container --}}
        <div id="epub-container" class="bg-white dark:bg-gray-800 rounded-lg shadow-lg p-2 mb-2 hidden flex-1" style="min-height: 0; overflow: hidden;">
            <div id="epub-viewer" class="epub-viewer" style="width: 100%; height: 100%;"></div>
        </div>

        {{-- Error Message --}}
        <div id="error-message" class="hidden bg-red-50 dark:bg-red-900/20 border border-red-200 dark:border-red-800 rounded-lg p-4 mb-4">
            <div class="flex items-center">
                <svg class="w-5 h-5 text-red-600 dark:text-red-400 mr-2" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm1 15h-2v-2h2v2zm0-4h-2V7h2v6z"/>
                </svg>
                <p class="text-red-800 dark:text-red-200" id="error-text"></p>
            </div>
        </div>

        {{-- Loading Indicator --}}
        <div id="loading-indicator" class="text-center py-8">
            <div class="inline-block animate-spin rounded-full h-8 w-8 border-b-2 border-blue-600"></div>
            <p class="mt-4 text-gray-600 dark:text-gray-400" id="loading-text">Loading...</p>
        </div>
    </main>
</div>

@push('styles')
<style>
    #epub-container {
        position: relative;
        display: flex;
        flex-direction: column;
        min-height: 0;
        flex: 1;
        overflow: hidden;
    }

    #epub-viewer {
        width: 100%;
        height: 100%;
        min-height: 500px;
        background: white;
        font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif;
        line-height: 1.6;
        color: #333;
        position: relative;
        flex: 1;
        overflow: hidden;
    }

    .dark #epub-viewer {
        background: #1f2937;
        color: #f3f4f6;
    }

    #epub-viewer iframe {
        width: 100% !important;
        height: 100% !important;
        border: none !important;
        display: block !important;
        overflow: hidden !important;
    }

    #epub-viewer > div {
        width: 100% !important;
        height: 100% !important;
        overflow: hidden !important;
    }

    /* Ensure EPUB content is displayed properly */
    #epub-viewer * {
        box-sizing: border-box;
    }

    /* Fix for EPUB.js default styles */
    .epub-container {
        width: 100% !important;
        height: 100% !important;
    }

    .epub-view {
        width: 100% !important;
        height: 100% !important;
    }
</style>
@endpush

@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/3.11.174/pdf.min.js"></script>
<!-- EPUB.js library - Updated to latest version -->
<script src="https://cdn.jsdelivr.net/npm/epubjs/dist/epub.min.js"></script>
<script>
// PDF.js worker
pdfjsLib.GlobalWorkerOptions.workerSrc = 'https://cdnjs.cloudflare.com/ajax/libs/pdf.js/3.11.174/pdf.worker.min.js';

// Wait for EPUB.js to load
function waitForEPUB(callback, maxAttempts = 100) {
    // Check for ePub global function
    if (typeof ePub !== 'undefined') {
        console.log('EPUB.js loaded successfully');
        callback();
    } else if (maxAttempts > 0) {
        // Wait and try again
        setTimeout(function() {
            waitForEPUB(callback, maxAttempts - 1);
        }, 50);
    } else {
        console.error('EPUB.js library failed to load after multiple attempts');
        const errorMessage = document.getElementById('error-message');
        const errorText = document.getElementById('error-text');
        const loadingIndicator = document.getElementById('loading-indicator');
        if (errorMessage && errorText && loadingIndicator) {
            loadingIndicator.classList.add('hidden');
            errorMessage.classList.remove('hidden');
            errorText.textContent = 'Error: EPUB.js library failed to load. Please check your internet connection and refresh the page.';
        }
    }
}

// Global variables
let pdfDoc = null;
let epubBook = null;
let pageNum = 1;
let pageRendering = false;
let pageNumPending = null;
let scale = 1.0;
let canvas = document.getElementById('pdf-canvas');
let ctx = canvas.getContext('2d');
let extractedText = [];
let currentPageText = '';
let speechSynthesis = window.speechSynthesis;
let currentUtterance = null;
let isPlaying = false;
let currentTextIndex = 0;
let textChunks = [];
let ebookFormat = '{{ $book->ebook_format ?? "pdf" }}';
let epubRendition = null;

// Initialize
document.addEventListener('DOMContentLoaded', function() {
    const ebookUrl = '{{ $book->ebook_file_url }}';
    const supportsTTS = {{ $book->supportsTTS() ? 'true' : 'false' }};
    
    // Load ebook based on format
    if (ebookFormat === 'epub') {
        console.log('EPUB format detected, URL:', ebookUrl);
        if (!ebookUrl || ebookUrl === 'null' || ebookUrl === '') {
            const errorMessage = document.getElementById('error-message');
            const errorText = document.getElementById('error-text');
            const loadingIndicator = document.getElementById('loading-indicator');
            if (errorMessage && errorText && loadingIndicator) {
                loadingIndicator.classList.add('hidden');
                errorMessage.classList.remove('hidden');
                errorText.textContent = 'Error: EPUB file URL is not available. Please check the book configuration.';
            }
        } else {
            // Wait for EPUB.js to load before initializing
            waitForEPUB(function() {
                loadEPUB(ebookUrl);
            });
        }
    } else {
        loadPDF(ebookUrl);
    }
    
    // Setup event listeners
    setupEventListeners();
    
    // Setup TTS if supported
    if (supportsTTS) {
        setupTTS();
    }
});

// Load PDF
function loadPDF(url) {
    const loadingIndicator = document.getElementById('loading-indicator');
    const loadingText = document.getElementById('loading-text');
    const errorMessage = document.getElementById('error-message');
    const errorText = document.getElementById('error-text');
    const pdfContainer = document.getElementById('pdf-container');
    const epubContainer = document.getElementById('epub-container');
    
    loadingText.textContent = 'Loading PDF...';
    pdfContainer.classList.remove('hidden');
    epubContainer.classList.add('hidden');
    
    pdfjsLib.getDocument(url).promise.then(function(pdf) {
        pdfDoc = pdf;
        document.getElementById('page-count').textContent = pdf.numPages;
        loadingIndicator.classList.add('hidden');
        renderPage(pageNum);
        
        // Extract text if TTS is supported
        @if($book->supportsTTS())
        extractAllText();
        @endif
    }).catch(function(error) {
        loadingIndicator.classList.add('hidden');
        errorMessage.classList.remove('hidden');
        errorText.textContent = 'Error loading PDF: ' + error.message;
        console.error('PDF loading error:', error);
    });
}

// Load EPUB
async function loadEPUB(url) {
    const loadingIndicator = document.getElementById('loading-indicator');
    const loadingText = document.getElementById('loading-text');
    const errorMessage = document.getElementById('error-message');
    const errorText = document.getElementById('error-text');
    const pdfContainer = document.getElementById('pdf-container');
    const epubContainer = document.getElementById('epub-container');
    const epubViewer = document.getElementById('epub-viewer');

    if (!epubContainer || !epubViewer) {
        console.error('EPUB container elements not found');
        if (errorMessage && errorText && loadingIndicator) {
            loadingIndicator.classList.add('hidden');
            errorMessage.classList.remove('hidden');
            errorText.textContent = 'Error: EPUB viewer elements not found.';
        }
        return;
    }

    loadingText.textContent = 'Loading EPUB...';
    pdfContainer.classList.add('hidden');
    epubContainer.classList.remove('hidden');

    // Ensure container is visible and has dimensions
    epubContainer.style.display = 'flex';
    epubContainer.style.flexDirection = 'column';

    try {
        // Check if ePub is available
        if (typeof ePub === 'undefined') {
            throw new Error('EPUB.js library is not loaded. Please refresh the page.');
        }

        console.log('Loading EPUB from URL:', url);

        if (!url || url === 'null' || url === '') {
            throw new Error('EPUB file URL is not available.');
        }

        // Create EPUB book directly from URL (let EPUB.js handle fetching)
        epubBook = ePub(url);

        if (!epubBook) {
            throw new Error('Failed to create EPUB book object.');
        }

        console.log('EPUB book object created, waiting for ready...');

        await epubBook.ready;

        console.log('EPUB book ready');
        console.log('Spine items:', epubBook.spine.length);

        const totalPages = epubBook.spine.length;
        document.getElementById('page-count').textContent = totalPages;
        pageNum = 1;
        document.getElementById('page-num').textContent = pageNum;

        // Get container dimensions
        const containerRect = epubContainer.getBoundingClientRect();
        let containerWidth = containerRect.width || epubContainer.offsetWidth || window.innerWidth - 100;
        let containerHeight = containerRect.height || epubContainer.offsetHeight || window.innerHeight - 300;

        // Ensure minimum dimensions
        if (containerWidth < 300) containerWidth = 800;
        if (containerHeight < 400) containerHeight = 600;

        console.log('Rendering EPUB with dimensions:', containerWidth, 'x', containerHeight);

        // Clear any existing content in viewer
        epubViewer.innerHTML = '';

        // Create rendition
        epubRendition = epubBook.renderTo(epubViewer, {
            width: containerWidth,
            height: containerHeight,
            spread: 'none',
            flow: 'paginated',
            manager: 'default',
            allowScriptedContent: false
        });

        if (!epubRendition) {
            throw new Error('Failed to create EPUB rendition.');
        }

        console.log('Rendition created, applying themes...');

        // Add custom styles
        epubRendition.themes.default({
            'body': {
                'font-family': '-apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif !important',
                'line-height': '1.6 !important',
                'padding': '2rem !important',
                'margin': '0 !important',
                'color': '#1f2937 !important'
            },
            'p': {
                'margin-bottom': '1rem !important'
            },
            'img': {
                'max-width': '100% !important',
                'height': 'auto !important'
            }
        });

        console.log('Displaying EPUB...');

        // Display the first page
        await epubRendition.display();

        console.log('EPUB displayed successfully');
        loadingIndicator.classList.add('hidden');

        // Update navigation
        updateEPUBPageInfo();
        updateEPUBNavigation();

        // Handle navigation events
        epubRendition.on('relocated', function(location) {
            console.log('Page relocated:', location);
            updateEPUBPageInfo();
            updateEPUBNavigation();
        });

        // Handle errors
        epubRendition.on('displayError', function(error) {
            console.error('EPUB display error:', error);
        });

    } catch (error) {
        loadingIndicator.classList.add('hidden');
        errorMessage.classList.remove('hidden');
        errorText.textContent = 'Error loading EPUB: ' + (error.message || 'Unknown error');
        console.error('EPUB error:', error);
        if (error.stack) {
            console.error('Error stack:', error.stack);
        }
    }
}

// Update EPUB page info
function updateEPUBPageInfo() {
    if (epubBook && epubRendition) {
        try {
            const currentLocation = epubRendition.currentLocation();
            if (currentLocation && currentLocation.start) {
                const spineItem = epubBook.spine.get(currentLocation.start.cfi);
                if (spineItem) {
                    const index = epubBook.spine.spineItems.indexOf(spineItem);
                    pageNum = index + 1;
                    document.getElementById('page-num').textContent = pageNum;
                }
            }
        } catch (error) {
            console.error('Error updating EPUB page info:', error);
        }
    }
}

// Render page
function renderPage(num) {
    pageRendering = true;
    
    pdfDoc.getPage(num).then(function(page) {
        const viewport = page.getViewport({ scale: scale });
        canvas.height = viewport.height;
        canvas.width = viewport.width;
        
        const renderContext = {
            canvasContext: ctx,
            viewport: viewport
        };
        
        const renderTask = page.render(renderContext);
        
        renderTask.promise.then(function() {
            pageRendering = false;
            if (pageNumPending !== null) {
                renderPage(pageNumPending);
                pageNumPending = null;
            }
            
            // Update page number
            document.getElementById('page-num').textContent = num;
            
            // Update navigation buttons
            if (ebookFormat !== 'epub') {
                document.getElementById('prev-page-btn').disabled = num <= 1;
                document.getElementById('next-page-btn').disabled = num >= pdfDoc.numPages;
            }
            
            // Extract current page text for TTS
            @if($book->supportsTTS())
            extractPageText(num);
            @endif
        });
    });
}

// Queue rendering
function queueRenderPage(num) {
    if (pageRendering) {
        pageNumPending = num;
    } else {
        renderPage(num);
    }
}

// Previous page
function onPrevPage() {
    if (ebookFormat === 'epub') {
        if (epubRendition) {
            epubRendition.prev().then(function() {
                updateEPUBPageInfo();
                updateEPUBNavigation();
                stopTTS();
            });
        }
    } else {
        if (pageNum <= 1) return;
        pageNum--;
        queueRenderPage(pageNum);
        stopTTS();
    }
}

// Next page
function onNextPage() {
    if (ebookFormat === 'epub') {
        if (epubRendition) {
            epubRendition.next().then(function() {
                updateEPUBPageInfo();
                updateEPUBNavigation();
                stopTTS();
            });
        }
    } else {
        if (pageNum >= pdfDoc.numPages) return;
        pageNum++;
        queueRenderPage(pageNum);
        stopTTS();
    }
}

// Update EPUB navigation buttons
function updateEPUBNavigation() {
    if (epubBook && epubRendition) {
        try {
            const currentLocation = epubRendition.currentLocation();
            if (currentLocation && currentLocation.start) {
                const spineItem = epubBook.spine.get(currentLocation.start.cfi);
                if (spineItem) {
                    const index = epubBook.spine.spineItems.indexOf(spineItem);
                    const totalPages = epubBook.spine.length;
                    
                    document.getElementById('prev-page-btn').disabled = index <= 0;
                    document.getElementById('next-page-btn').disabled = index >= totalPages - 1;
                }
            } else {
                // Fallback: enable both buttons if location is not available
                document.getElementById('prev-page-btn').disabled = false;
                document.getElementById('next-page-btn').disabled = false;
            }
        } catch (error) {
            console.error('Error updating EPUB navigation:', error);
            // Fallback: enable both buttons on error
            document.getElementById('prev-page-btn').disabled = false;
            document.getElementById('next-page-btn').disabled = false;
        }
    }
}

// Zoom in
function zoomIn() {
    scale += 0.2;
    updateZoom();
}

// Zoom out
function zoomOut() {
    if (scale <= 0.4) return;
    scale -= 0.2;
    updateZoom();
}

// Update zoom
function updateZoom() {
    document.getElementById('zoom-level').textContent = Math.round(scale * 100) + '%';
    if (ebookFormat === 'epub') {
        if (epubRendition) {
            // For EPUB, adjust font size instead of zoom
            const fontSize = Math.round(100 * scale) + '%';
            epubRendition.themes.fontSize(fontSize);
        }
    } else {
        queueRenderPage(pageNum);
    }
}

// Fullscreen
function toggleFullscreen() {
    if (!document.fullscreenElement) {
        document.documentElement.requestFullscreen();
    } else {
        document.exitFullscreen();
    }
}

// Extract text from all pages
@if($book->supportsTTS())
async function extractAllText() {
    extractedText = [];
    for (let i = 1; i <= pdfDoc.numPages; i++) {
        try {
            const page = await pdfDoc.getPage(i);
            const textContent = await page.getTextContent();
            const pageText = textContent.items.map(item => item.str).join(' ');
            extractedText.push(pageText);
        } catch (error) {
            console.error('Error extracting text from page', i, error);
            extractedText.push('');
        }
    }
}

// Extract text from current page
async function extractPageText(pageNum) {
    try {
        const page = await pdfDoc.getPage(pageNum);
        const textContent = await page.getTextContent();
        currentPageText = textContent.items.map(item => item.str).join(' ');
    } catch (error) {
        console.error('Error extracting text from page', pageNum, error);
        currentPageText = '';
    }
}

// Setup TTS
function setupTTS() {
    // Check browser support
    if (!('speechSynthesis' in window)) {
        document.getElementById('voice-toggle-btn').style.display = 'none';
        return;
    }
    
    // Get available voices
    let voices = speechSynthesis.getVoices();
    if (voices.length === 0) {
        speechSynthesis.onvoiceschanged = function() {
            voices = speechSynthesis.getVoices();
        };
    }
}

// Detect language (simple detection)
function detectLanguage(text) {
    // Simple detection: if text contains Tamil characters, use Tamil
    const tamilRegex = /[\u0B80-\u0BFF]/;
    return tamilRegex.test(text) ? 'ta-IN' : 'en-US';
}

// Start TTS
function startTTS() {
    if (!currentPageText || currentPageText.trim() === '') {
        updateAudioStatus('No text available on this page');
        return;
    }
    
    stopTTS();
    
    const language = detectLanguage(currentPageText);
    currentUtterance = new SpeechSynthesisUtterance(currentPageText);
    currentUtterance.lang = language;
    currentUtterance.rate = parseFloat(document.getElementById('speed-select').value);
    currentUtterance.volume = parseFloat(document.getElementById('volume-slider').value);
    
    // Try to find appropriate voice
    const voices = speechSynthesis.getVoices();
    if (language === 'ta-IN') {
        const tamilVoice = voices.find(v => v.lang.includes('ta') || v.lang.includes('IN'));
        if (tamilVoice) currentUtterance.voice = tamilVoice;
    } else {
        const englishVoice = voices.find(v => v.lang.includes('en'));
        if (englishVoice) currentUtterance.voice = englishVoice;
    }
    
    currentUtterance.onstart = function() {
        isPlaying = true;
        updatePlayPauseButton();
        updateAudioStatus('Reading...');
    };
    
    currentUtterance.onend = function() {
        isPlaying = false;
        updatePlayPauseButton();
        updateAudioStatus('Finished');
    };
    
    currentUtterance.onerror = function(event) {
        console.error('Speech synthesis error:', event);
        isPlaying = false;
        updatePlayPauseButton();
        updateAudioStatus('Error: ' + event.error);
    };
    
    speechSynthesis.speak(currentUtterance);
}

// Stop TTS
function stopTTS() {
    if (speechSynthesis.speaking) {
        speechSynthesis.cancel();
    }
    isPlaying = false;
    updatePlayPauseButton();
    updateAudioStatus('Stopped');
}

// Pause/Resume TTS
function toggleTTS() {
    if (isPlaying) {
        speechSynthesis.pause();
        isPlaying = false;
        updateAudioStatus('Paused');
    } else if (speechSynthesis.paused) {
        speechSynthesis.resume();
        isPlaying = true;
        updateAudioStatus('Reading...');
    } else {
        startTTS();
    }
    updatePlayPauseButton();
}

// Update play/pause button
function updatePlayPauseButton() {
    const playIcon = document.getElementById('play-icon');
    const pauseIcon = document.getElementById('pause-icon');
    
    if (isPlaying) {
        playIcon.classList.add('hidden');
        pauseIcon.classList.remove('hidden');
    } else {
        playIcon.classList.remove('hidden');
        pauseIcon.classList.add('hidden');
    }
}

// Update audio status
function updateAudioStatus(status) {
    document.getElementById('audio-status').textContent = status;
}
@endif

// Setup event listeners
function setupEventListeners() {
    // Page navigation
    document.getElementById('prev-page-btn').addEventListener('click', onPrevPage);
    document.getElementById('next-page-btn').addEventListener('click', onNextPage);
    
    // Handle window resize for EPUB
    let resizeTimeout;
    window.addEventListener('resize', function() {
        if (ebookFormat === 'epub' && epubRendition) {
            clearTimeout(resizeTimeout);
            resizeTimeout = setTimeout(function() {
                const epubContainer = document.getElementById('epub-container');
                const epubViewer = document.getElementById('epub-viewer');
                if (epubContainer && epubViewer && epubRendition) {
                    const containerRect = epubContainer.getBoundingClientRect();
                    let containerWidth = containerRect.width || epubContainer.offsetWidth || window.innerWidth - 100;
                    let containerHeight = containerRect.height || epubContainer.offsetHeight || window.innerHeight - 300;

                    // Ensure minimum dimensions
                    if (containerWidth < 300) containerWidth = 800;
                    if (containerHeight < 400) containerHeight = 600;

                    console.log('Resizing EPUB to:', containerWidth, 'x', containerHeight);
                    epubRendition.resize(containerWidth, containerHeight);
                }
            }, 250);
        }
    });
    
    // Zoom controls
    document.getElementById('zoom-in-btn').addEventListener('click', zoomIn);
    document.getElementById('zoom-out-btn').addEventListener('click', zoomOut);
    
    // Fullscreen
    document.getElementById('fullscreen-btn').addEventListener('click', toggleFullscreen);
    
    @if($book->supportsTTS())
    // Voice toggle
    const voiceToggleBtn = document.getElementById('voice-toggle-btn');
    const audioControlsPanel = document.getElementById('audio-controls-panel');
    
    voiceToggleBtn.addEventListener('click', function() {
        audioControlsPanel.classList.toggle('hidden');
        if (!audioControlsPanel.classList.contains('hidden')) {
            // Extract text if not already done
            if (!currentPageText) {
                extractPageText(pageNum);
            }
        }
    });
    
    // Audio controls
    document.getElementById('play-pause-btn').addEventListener('click', toggleTTS);
    document.getElementById('stop-btn').addEventListener('click', stopTTS);
    
    // Speed control
    document.getElementById('speed-select').addEventListener('change', function() {
        if (currentUtterance) {
            currentUtterance.rate = parseFloat(this.value);
            if (isPlaying) {
                stopTTS();
                startTTS();
            }
        }
    });
    
    // Volume control
    const volumeSlider = document.getElementById('volume-slider');
    volumeSlider.addEventListener('input', function() {
        const volume = parseFloat(this.value);
        document.getElementById('volume-value').textContent = Math.round(volume * 100) + '%';
        if (currentUtterance) {
            currentUtterance.volume = volume;
        }
    });
    @endif
    
    // Keyboard shortcuts
    document.addEventListener('keydown', function(e) {
        if (e.target.tagName === 'INPUT' || e.target.tagName === 'SELECT' || e.target.tagName === 'TEXTAREA') return;
        
        switch(e.key) {
            case 'ArrowLeft':
                e.preventDefault();
                onPrevPage();
                break;
            case 'ArrowRight':
                e.preventDefault();
                onNextPage();
                break;
            case '+':
            case '=':
                e.preventDefault();
                zoomIn();
                break;
            case '-':
                e.preventDefault();
                zoomOut();
                break;
        }
    });
}
</script>
@endpush
