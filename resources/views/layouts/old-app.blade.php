<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>@yield('title', 'VCK - Viduthalai Chiruthaigal Katchi')</title>

    {{-- CSRF Token --}}
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- PWA Meta Tags --}}
    <meta name="description" content="Official website of Viduthalai Chiruthaigal Katchi - Empowering the Marginalized, Fighting for Justice">
    <meta name="keywords" content="VCK, Viduthalai Chiruthaigal Katchi, Tamil Nadu Politics, Social Justice, Dalit Rights">
    <meta name="author" content="Viduthalai Chiruthaigal Katchi">
    <meta name="theme-color" content="#dc2626">
    <meta name="msapplication-TileColor" content="#dc2626">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="default">
    <meta name="apple-mobile-web-app-title" content="VCK">

    {{-- Web App Manifest --}}
    <link rel="manifest" href="/site.webmanifest">

    {{-- Favicons --}}
    <link rel="apple-touch-icon" sizes="180x180" href="/assets/images/favicons/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/assets/images/favicons/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/assets/images/favicons/favicon-16x16.png">
    <link rel="mask-icon" href="/assets/images/favicons/safari-pinned-tab.svg" color="#dc2626">

    {{-- Open Graph / Facebook --}}
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:title" content="@yield('title', 'VCK - Viduthalai Chiruthaigal Katchi')">
    <meta property="og:description" content="Official website of Viduthalai Chiruthaigal Katchi - Empowering the Marginalized, Fighting for Justice">
    <meta property="og:image" content="{{ url('/assets/images/about/vck-about.webp') }}">

    {{-- Twitter --}}
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="{{ url()->current() }}">
    <meta property="twitter:title" content="@yield('title', 'VCK - Viduthalai Chiruthaigal Katchi')">
    <meta property="twitter:description" content="Official website of Viduthalai Chiruthaigal Katchi - Empowering the Marginalized, Fighting for Justice">
    <meta property="twitter:image" content="{{ url('/assets/images/about/vck-about.webp') }}">

    {{-- Optimized Font Loading --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter+Tight:ital,wght@0,100..900;1,100..900&family=Tiro+Tamil:ital@0;1&display=swap" rel="stylesheet">

    {{-- Vite Bundled Assets (Main CSS/JS) - This is the correct Tailwind Standard --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    {{-- Flowbite CSS (from CDN) --}}
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet" />

    {{-- 
      REMOVED: Tailwind Play CDN (<script src="...tailwindcss.com">)
      REMOVED: Inline tailwind.config script
      REMOVED: Inline @import for fonts
      REMOVED: Inline <style> for .tiro-tamil-* classes
      REASON: All are redundant or non-standard when using Vite. 
      Tailwind classes and font definitions belong in your tailwind.config.js and app.css files.
    --}}
</head>
<body class="bg-white text-gray-800 dark:bg-gray-900 dark:text-gray-200">

    {{-- Navbar --}}
    @include('layouts.partials.navbar')

    {{-- Main Content --}}
    <main>
        @yield('content')
    </main>

    {{-- Footer --}}
    @include('layouts.partials.footer')

    {{-- Flowbite JS (Deferred for better performance) --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js" defer></script>

    {{-- 
        Page-specific Interactive Scripts
        Ideally, this logic should be moved into your `resources/js/app.js` file 
        and bundled by Vite for best performance. 
        Keeping it here for simplicity as requested.
    --}}
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            
            // --- Slider Logic ---
            const sliderContainer = document.getElementById('slider-container');
            const sliderDots = document.querySelectorAll('[data-slide]');
            
            if (sliderContainer && sliderDots.length > 0) {
                let current = 0;
                const total = sliderDots.length;
                let slideInterval = null;

                function goToSlide(index) {
                    current = index;
                    sliderContainer.style.transform = `translateX(-${current * 100}%)`;
                    sliderDots.forEach((dot, i) => {
                        dot.classList.toggle('bg-blue-600', i === current); // Use your active color
                        dot.classList.toggle('opacity-100', i === current);
                        if (i !== current) dot.classList.add('opacity-50');
                    });
                }

                function startSlider() {
                    stopSlider(); // Clear existing interval
                    slideInterval = setInterval(() => goToSlide((current + 1) % total), 5000);
                }

                function stopSlider() {
                    if (slideInterval) clearInterval(slideInterval);
                }

                sliderDots.forEach((dot, i) => dot.addEventListener('click', () => {
                     goToSlide(i);
                     startSlider(); // Restart timer on manual click
                }));

                startSlider(); // Start the slider
            }

            // --- News Tabs Logic ---
            const newsTabButtons = document.querySelectorAll('[data-tabs-toggle="#news-content"] button');
            if (newsTabButtons.length > 0) {
                const newsTabContents = {};
                newsTabButtons.forEach(button => {
                    const targetId = button.getAttribute('data-tabs-target');
                    if (targetId) newsTabContents[targetId] = document.querySelector(targetId);
                });

                newsTabButtons.forEach(button => {
                    button.addEventListener('click', () => {
                        newsTabButtons.forEach(btn => {
                            btn.classList.remove('pb-3', 'border-b-2', 'border-blue-600', 'text-blue-600');
                            btn.classList.add('pb-3', 'hover:text-gray-600');
                        });
                        button.classList.remove('hover:text-gray-600');
                        button.classList.add('border-b-2', 'border-blue-600', 'text-blue-600');
                        
                        Object.values(newsTabContents).forEach(content => {
                            if (content) content.classList.add('hidden');
                        });
                        
                        const target = button.getAttribute('data-tabs-target');
                        if (newsTabContents[target]) {
                            newsTabContents[target].classList.remove('hidden');
                        }
                    });
                });
            }
            
            // --- Timeline Tabs Logic ---
            const timelineTabButtons = document.querySelectorAll('#timeline button[data-tab]');
            const timelineTabContents = document.querySelectorAll('#timeline .tab-content[data-tab]');

            if (timelineTabButtons.length > 0) {
                timelineTabButtons.forEach(button => {
                    button.addEventListener('click', () => {
                        timelineTabButtons.forEach(btn => {
                            btn.classList.remove('bg-blue-600', 'text-white');
                            btn.classList.add('bg-gray-200', 'hover:bg-gray-300');
                        });
                        button.classList.add('bg-blue-600', 'text-white');
                        button.classList.remove('bg-gray-200', 'hover:bg-gray-300');
                        
                        timelineTabContents.forEach(content => content.classList.add('hidden'));
                        
                        const tab = button.getAttribute('data-tab');
                        const targetContent = document.querySelector(`#timeline .tab-content[data-tab="${tab}"]`);
                        if (targetContent) {
                            targetContent.classList.remove('hidden');
                        }
                    });
                });
            }

            // --- Dropdown Menu Logic ---
            // This is a fallback. Flowbite's JS should handle this automatically.
            window.toggleDropdown = function(id) {
                const menu = document.getElementById(id);
                if (menu) {
                    const isHidden = menu.classList.contains('hidden');
                    // Hide all other dropdowns
                    document.querySelectorAll('.dropdown-menu').forEach(m => {
                        if (m.id !== id) m.classList.add('hidden');
                    });
                    menu.classList.toggle('hidden', !isHidden);
                }
            };

            // Global click listener to close dropdowns
            document.addEventListener('click', function(event) {
                // If the click is not on a dropdown toggle button
                if (!event.target.closest('[data-dropdown-toggle]')) {
                    // And not inside a dropdown menu
                    if (!event.target.closest('.dropdown-menu')) {
                        document.querySelectorAll('.dropdown-menu').forEach(m => m.classList.add('hidden'));
                    }
                }
            });
        });
    </script>

    {{-- Page-specific scripts --}}
    @stack('scripts')

    {{-- PWA Service Worker Registration (deferred) --}}
    <script defer>
        if ('serviceWorker' in navigator) {
            window.addEventListener('load', function() {
                navigator.serviceWorker.register('/sw.js')
                    .then(function(registration) {
                        console.log('[PWA] ServiceWorker registration successful with scope: ', registration.scope);
                        registration.addEventListener('updatefound', function() {
                            const newWorker = registration.installing;
                            newWorker.addEventListener('statechange', function() {
                                if (newWorker.state === 'installed' && navigator.serviceWorker.controller) {
                                    if (confirm('New content is available! Reload to get the latest version?')) {
                                        window.location.reload();
                                    }
                                }
                            });
                        });
                    })
                    .catch(function(error) {
                        console.log('[PWA] ServiceWorker registration failed: ', error);
                    });
            });
        }

        let deferredPrompt;
        window.addEventListener('beforeinstallprompt', function(e) {
            console.log('[PWA] beforeinstallprompt event fired');
            e.preventDefault();
            deferredPrompt = e;
            // Only show install prompt if it hasn't been dismissed
            if (localStorage.getItem('pwa_install_dismissed') !== 'true') {
                showInstallPrompt();
            }
        });

        function showInstallPrompt() {
            const installPrompt = document.createElement('div');
            installPrompt.id = 'install-prompt';
            installPrompt.className = 'fixed bottom-4 right-4 bg-blue-600 text-white p-4 rounded-lg shadow-lg z-50 max-w-sm animate-fade-in';
            installPrompt.innerHTML = `
                <div class="flex items-start justify-between">
                    <div class="flex-1">
                        <h3 class="font-bold text-lg mb-2">Install VCK App</h3>
                        <p class="text-sm mb-3">Get the full VCK experience with offline access and notifications.</p>
                        <div class="flex space-x-2">
                            <button id="pwa-install-btn" class="bg-white text-blue-600 px-4 py-2 rounded font-medium hover:bg-gray-100 transition-colors">
                                Install
                            </button>
                            <button id="pwa-dismiss-btn" class="text-blue-200 hover:text-white px-4 py-2 rounded transition-colors">
                                Later
                            </button>
                        </div>
                    </div>
                    <button id="pwa-close-btn" class="text-blue-200 hover:text-white ml-2">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </button>
                </div>
            `;
            document.body.appendChild(installPrompt);

            // Add event listeners
            document.getElementById('pwa-install-btn').addEventListener('click', installPWA);
            document.getElementById('pwa-dismiss-btn').addEventListener('click', () => dismissInstallPrompt(true));
            document.getElementById('pwa-close-btn').addEventListener('click', () => dismissInstallPrompt(false));
        }

        function installPWA() {
            if (deferredPrompt) {
                deferredPrompt.prompt();
                deferredPrompt.userChoice.then(function(choiceResult) {
                    console.log('[PWA] User choice:', choiceResult.outcome);
                    deferredPrompt = null;
                    dismissInstallPrompt(false);
                });
            }
        }

        function dismissInstallPrompt(storeDismissal) {
            const prompt = document.getElementById('install-prompt');
            if (prompt) {
                prompt.remove();
            }
            if (storeDismissal) {
                // Store dismissal so we don't ask again this session/day
                localStorage.setItem('pwa_install_dismissed', 'true');
            }
        }

        window.addEventListener('appinstalled', function(evt) {
            console.log('[PWA] App was installed');
            dismissInstallPrompt(false);
        });

        // Network status monitoring
        function updateNetworkStatus() {
            const isOnline = navigator.onLine;
            console.log('[PWA] Network status changed:', isOnline ? 'online' : 'offline');
            // You could show an 'offline' banner here
        }
        window.addEventListener('online', updateNetworkStatus);
        window.addEventListener('offline', updateNetworkStatus);
        updateNetworkStatus();
    </script>

</body>
</html>