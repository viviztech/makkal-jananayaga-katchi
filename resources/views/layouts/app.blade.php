<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-theme="vck">
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

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    {{-- AOS CSS --}}
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet" />
    {{-- Google Fonts --}}
    
    <style>
        @font-face {
            font-family: 'Mukta Malar';
            font-style: normal;
            font-weight: 400;
            src: url('{{ asset('fonts/MuktaMalar-Regular.ttf') }}') format('truetype');
        }
        body {
            font-family: 'Mukta Malar', sans-serif;
        }
    </style>
    <style>
        .mukta-malar-extralight {
        font-family: "Mukta Malar", sans-serif;
        font-weight: 200;
        font-style: normal;
        }

        .mukta-malar-light {
        font-family: "Mukta Malar", sans-serif;
        font-weight: 300;
        font-style: normal;
        }

        .mukta-malar-regular {
        font-family: "Mukta Malar", sans-serif;
        font-weight: 400;
        font-style: normal;
        }

        .mukta-malar-medium {
        font-family: "Mukta Malar", sans-serif;
        font-weight: 500;
        font-style: normal;
        }

        .mukta-malar-semibold {
        font-family: "Mukta Malar", sans-serif;
        font-weight: 600;
        font-style: normal;
        }

        .mukta-malar-bold {
        font-family: "Mukta Malar", sans-serif;
        font-weight: 700;
        font-style: normal;
        }

        .mukta-malar-extrabold {
        font-family: "Mukta Malar", sans-serif;
        font-weight: 800;
        font-style: normal;
        }
    </style>

<style>
  .container {
  
max-width: 1200px;
  
margin: 50px auto;
  
gap: 40px;
}

.column {
  flex: 1;
}

.column.left, .column.right {
  max-width: 300px;
  padding-right: 30px;
  overflow-y: auto;
  max-height: 570px;
}
  .footer {
    background: #b91c1c;
    border-radius: 20px;
    width: 80%;
    margin: 80px auto 0px;
    padding: 10px 60px;
    /* box-shadow: 0 0 60px rgba(0, 0, 0, 0.6); */
  }

  .footer-inner {
    display: flex;
    justify-content: space-between;
    flex-wrap: wrap;
    gap: 50px;
  }

  .footer-left {
    flex: 1.2;
  }

  .footer-left h2 {
    font-size: 56px;
    font-weight: 700;
    line-height: 1.1;
    color: #fff;
  }

  .footer-left h2 span {
    color: #fff;
  }

  .footer-left p {
    margin: 25px 0 40px;
    font-size: 15px;
    color: #b5b5b5;
    max-width: 400px;
  }

  .subscribe-box {
    display: flex;
    margin-bottom: 30px;
  }

  .subscribe-box input {
    flex: 1;
    padding: 16px;
    border: none;
    outline: none;
    border-radius: 8px 0 0 8px;
    font-size: 15px;
    background: #f7f7f7;
    color: #333;
  }

  .subscribe-box button {
    background: #0073b1;
    color: #fff;
    border: none;
    padding: 0 30px;
    border-radius: 0 8px 8px 0;
    font-size: 16px;
    font-weight: 600;
    cursor: pointer;
  }

  .subscribe-box button:hover {
    background: #0082ca;
  }

  .social-icons a {
    display: inline-block;
    color: #fff;
    font-size: 18px;
    margin-right: 15px;
    transition: color 0.3s;
  }
  .social-icons {
      display: flex;
  }
  .social-icons p {
    margin: 0;
  }
  .orgsec-icons > div {
      display: none;
  }
  section.footer-bg {
      background: #dc2626;
      padding: 10px 0;
      color: #fff;
  }
  .social-icons a:hover {
    color: #0082ca;
  }

  .footer-right {
    display: flex;
    flex-direction: column;
    gap: 40px;
  }
  .footer-column{
    display: flex;
    gap: 30px;
  }
  .footer-column-inner h4 {
    font-size: 20px;
    margin-bottom: 20px;
    font-weight: 600;
  }

  .footer-column-inner ul {
    list-style: none;
  }

  .footer-column-inner li {
    margin-bottom: 10px;
  }

  .footer-column-inner li a {
    text-decoration: none;
    color: #ccc;
    font-size: 15px;
    display: inline-flex;
    align-items: center;
    transition: color 0.3s;
  }

  .footer-column-inner li a span {
    color: #000;
    margin-right: 8px;
    font-size: 8px;
    background: #006A9C;
    border-radius: 50%;
    width: 14px;
    height: 14px;
    display: flex;
    justify-content: center;
    align-items: center;
  }

  .footer-column-inner li a:hover {
    color: #fff;
  }

  .footer-contact {
    display: flex;
    justify-content: flex-start;
    align-items: center;
    border-top: 1px solid #991b1b;
    /* margin-top: 50px; */
    padding-top: 30px;
    gap: 100px;
  }

  .contact-item {
    display: flex;
    align-items: center;
    gap: 20px;
  }

  .icon {
    width: 55px;
    height: 55px;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 50%;
    background: #7f1d1d;
    font-size: 24px;
  }

  .contact-item h5 {
    font-size: 16px;
    margin-bottom: 6px;
  }

  .contact-item p {
    color: #ccc;
    font-size: 15px;
  }

  .contact-item p a {
    color: #ccc;
    text-decoration: none;
  }

  .contact-item p a:hover {
    color: #0082ca;
  }

  .footer-bottom {
    text-align: center;
    font-size: 14px;
    color: #fff;
    margin-top:20px;
  }

  .footer-bottom p {
    color: #fff;
  }
  .footer-column-inner ul {
      padding: 0;
  }
  .footer-inner{
      gap: 0;
    
    }

  /* Responsive Footer Styles */
  @media screen and (max-width: 991px) {
    footer.footer {
      padding: 10px;
    }
    
    .footer-left h2 {
      font-size: 32px;
    }
    
    .footer-column {
      flex-direction: column;
    }
    
    .footer-contact {
      flex-direction: column;
      gap: 20px;
      align-items: start;
    }
    
    .footer-left {
      flex: 1 1 100%;
      width: 100%;
    }
    
    .footer-inner {
      gap: 0;
    }
    
    .subscribe-box input {
      width: 70%;
    }
    
    .subscribe-box button {
      width: 30%;
      font-size: 14px;
      padding: 8px;
      flex: 1;
    }
  }
</style>
</head>
<body class="bg-white text-gray-800">

    {{-- Navbar --}}
    @include('layouts.partials.navbar')

    {{-- Main Content --}}
    <main>
        @yield('content')
    </main>

    {{-- Footer --}}
    @include('layouts.partials.footer')

    {{-- AOS JS --}}
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init({
            duration: 1000,
            once: true,
            offset: 100
        });
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            // Slider
            const container = document.getElementById('slider-container');
            const dots = document.querySelectorAll('[data-slide]');
            let current = 0;
            const total = 3;

            function goToSlide(index) {
                current = index;
                container.style.transform = `translateX(-${current * 100}%)`;
                dots.forEach((dot, i) => {
                    dot.classList.toggle('bg-blue-600', i === current);
                    dot.classList.toggle('opacity-100', i === current);
                    if (i !== current) dot.classList.add('opacity-50');
                });
            }

            setInterval(() => goToSlide((current + 1) % total), 5000);
            dots.forEach((dot, i) => dot.addEventListener('click', () => goToSlide(i)));

            // News Tabs
            const newsTabButtons = document.querySelectorAll('[data-tabs-toggle="#news-content"] button');
            const newsTabContents = {
                '#latest-news': document.getElementById('latest-news'),
                '#press-releases': document.getElementById('press-releases'),
                '#events-news': document.getElementById('events-news')
            };

            newsTabButtons.forEach(button => {
                button.addEventListener('click', () => {
                    // Remove active from all buttons
                    newsTabButtons.forEach(btn => {
                        btn.classList.remove('pb-3', 'border-b-2', 'border-blue-600', 'text-blue-600');
                        btn.classList.add('pb-3', 'hover:text-gray-600');
                    });
                    // Add active to clicked
                    button.classList.remove('hover:text-gray-600');
                    button.classList.add('border-b-2', 'border-blue-600', 'text-blue-600');
                    // Hide all contents
                    Object.values(newsTabContents).forEach(content => content.classList.add('hidden'));
                    // Show target
                    const target = button.getAttribute('data-tabs-target');
                    if (newsTabContents[target]) {
                        newsTabContents[target].classList.remove('hidden');
                    }
                });
            });

            // Timeline Tabs
            const timelineTabButtons = document.querySelectorAll('#timeline button[data-tab]');
            const timelineTabContents = document.querySelectorAll('.tab-content');

            timelineTabButtons.forEach(button => {
                button.addEventListener('click', () => {
                    // Remove active from all buttons
                    timelineTabButtons.forEach(btn => {
                        btn.classList.remove('bg-blue-600', 'text-white');
                        btn.classList.add('bg-gray-200', 'hover:bg-gray-300');
                    });
                    // Add active to clicked
                    button.classList.add('bg-blue-600', 'text-white');
                    button.classList.remove('bg-gray-200', 'hover:bg-gray-300');
                    // Hide all contents
                    timelineTabContents.forEach(content => content.classList.add('hidden'));
                    // Show target
                    const tab = button.getAttribute('data-tab');
                    const targetContent = document.querySelector(`.tab-content[data-tab="${tab}"]`);
                    if (targetContent) {
                        targetContent.classList.remove('hidden');
                    }
                });
            });

            // Dropdown Menus
            window.toggleDropdown = function(id) {
                const menu = document.getElementById(id);
                const isHidden = menu.classList.contains('hidden');
                // Hide all dropdown menus
                document.querySelectorAll('.dropdown-menu').forEach(m => m.classList.add('hidden'));
                // Toggle the clicked one
                if (isHidden) {
                    menu.classList.remove('hidden');
                }
            };

            // Close dropdowns when clicking outside
            document.addEventListener('click', function(event) {
                if (!event.target.closest('.relative')) {
                    document.querySelectorAll('.dropdown-menu').forEach(m => m.classList.add('hidden'));
                }
            });
        });
    </script>

    {{-- Page-specific scripts --}}
    @stack('scripts')

    {{-- PWA Service Worker Registration --}}
    <script>
        // Register service worker
        if ('serviceWorker' in navigator) {
            window.addEventListener('load', function() {
                navigator.serviceWorker.register('/sw.js')
                    .then(function(registration) {
                        console.log('[PWA] ServiceWorker registration successful with scope: ', registration.scope);

                        // Handle updates
                        registration.addEventListener('updatefound', function() {
                            const newWorker = registration.installing;
                            newWorker.addEventListener('statechange', function() {
                                if (newWorker.state === 'installed' && navigator.serviceWorker.controller) {
                                    // New content is available, notify user
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

        // Handle PWA install prompt
        let deferredPrompt;
        window.addEventListener('beforeinstallprompt', function(e) {
            console.log('[PWA] beforeinstallprompt event fired');
            e.preventDefault();
            deferredPrompt = e;

            // Show custom install button or notification
            showInstallPrompt();
        });

        function showInstallPrompt() {
            // Create and show install prompt
            const installPrompt = document.createElement('div');
            installPrompt.id = 'install-prompt';
            installPrompt.className = 'fixed bottom-4 right-4 bg-blue-600 text-white p-4 rounded-lg shadow-lg z-50 max-w-sm';
            installPrompt.innerHTML = `
                <div class="flex items-start justify-between">
                    <div class="flex-1">
                        <h3 class="font-bold text-lg mb-2">Install VCK App</h3>
                        <p class="text-sm mb-3">Get the full VCK experience with offline access and notifications.</p>
                        <div class="flex space-x-2">
                            <button onclick="installPWA()" class="bg-white text-blue-600 px-4 py-2 rounded font-medium hover:bg-gray-100 transition-colors">
                                Install
                            </button>
                            <button onclick="dismissInstallPrompt()" class="text-blue-200 hover:text-white px-4 py-2 rounded transition-colors">
                                Later
                            </button>
                        </div>
                    </div>
                    <button onclick="dismissInstallPrompt()" class="text-blue-200 hover:text-white ml-2">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </button>
                </div>
            `;
            document.body.appendChild(installPrompt);
        }

        function installPWA() {
            if (deferredPrompt) {
                deferredPrompt.prompt();
                deferredPrompt.userChoice.then(function(choiceResult) {
                    console.log('[PWA] User choice:', choiceResult.outcome);
                    deferredPrompt = null;
                    dismissInstallPrompt();
                });
            }
        }

        function dismissInstallPrompt() {
            const prompt = document.getElementById('install-prompt');
            if (prompt) {
                prompt.remove();
            }
        }

        // Handle successful app installation
        window.addEventListener('appinstalled', function(evt) {
            console.log('[PWA] App was installed');
            dismissInstallPrompt();
        });

        // Network status monitoring
        function updateNetworkStatus() {
            const isOnline = navigator.onLine;
            console.log('[PWA] Network status changed:', isOnline ? 'online' : 'offline');
        }

        window.addEventListener('online', updateNetworkStatus);
        window.addEventListener('offline', updateNetworkStatus);

        // Initial network status
        updateNetworkStatus();
    </script>
</body>
</html>