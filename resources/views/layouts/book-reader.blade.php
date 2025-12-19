<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
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
    {{-- Tailwind CSS --}}
    <script src="https://cdn.tailwindcss.com"></script>
    {{-- Flowbite CSS --}}
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet" />
    {{-- AOS CSS --}}
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet" />
    
    <style>
        @font-face {
            font-family: 'Mukta Malar';
            font-style: normal;
            font-weight: 400;
            src: url('{{ asset('fonts/MuktaMalar-Regular.ttf') }}') format('truetype');
        }
        html, body {
            font-family: 'Mukta Malar', sans-serif;
            height: 100%;
            margin: 0;
            padding: 0;
            overflow: hidden;
        }
        
        body {
            display: flex;
            flex-direction: column;
        }
        
        main {
            flex: 1;
            overflow: hidden;
            display: flex;
            flex-direction: column;
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
</head>
<body class="bg-white text-gray-800">

    {{-- Main Content --}}
    <main>
        @yield('content')
    </main>

    {{-- Flowbite JS --}}
    <script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>

    {{-- AOS JS --}}
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init({
            duration: 1000,
            once: true,
            offset: 100
        });
    </script>

    {{-- Page-specific scripts --}}
    @stack('scripts')

</body>
</html>

