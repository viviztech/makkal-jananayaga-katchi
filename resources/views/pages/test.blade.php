<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Our Ideology | Party Name</title>

  <!-- Tailwind CSS -->
  <script src="https://cdn.tailwindcss.com"></script>

  <!-- Flowbite CSS -->
  <link
    href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css"
    rel="stylesheet"
  />

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
  <script>
    tailwind.config = {
      theme: {
        extend: {
          fontFamily: { sans: ['Inter', 'sans-serif'] }
        }
      }
    }
  </script>

  <style>
    html {
      scroll-behavior: smooth;
    }
    .section-full {
      min-height: 100vh;
      display: flex;
      flex-direction: column;
      justify-content: center;
    }
  </style>
</head>
<body class="bg-white text-gray-800">

  <!-- Navbar (same as main) -->
  <nav class="bg-white border-b border-gray-200 px-4 py-3 fixed w-full top-0 z-50 backdrop-blur-sm bg-white/90">
    <div class="max-w-7xl mx-auto flex flex-wrap items-center justify-between">
      <a href="index.html" class="flex items-center">
        <span class="self-center text-2xl font-bold whitespace-nowrap">PartyLogo</span>
      </a>

      <div class="hidden md:flex md:items-center md:space-x-6">
        <a href="index.html" class="hover:text-blue-600">Home</a>
        <div class="relative group">
          <button class="flex items-center gap-1 text-blue-600 font-medium">Party
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" /></svg>
          </button>
          <div class="absolute left-0 mt-2 w-44 bg-white rounded-md shadow-lg py-1 hidden group-hover:block z-10">
            <a href="ideology.html" class="block px-4 py-2 bg-blue-50 text-blue-600 font-medium">Ideology</a>
            <a href="#" class="block px-4 py-2 hover:bg-gray-100">History</a>
          </div>
        </div>
        <div class="relative group">
          <button class="flex items-center gap-1 hover:text-blue-600">Media
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" /></svg>
          </button>
          <div class="absolute left-0 mt-2 w-44 bg-white rounded-md shadow-lg py-1 hidden group-hover:block z-10">
            <a href="#" class="block px-4 py-2 hover:bg-gray-100">Gallery</a>
            <a href="#" class="block px-4 py-2 hover:bg-gray-100">Videos</a>
          </div>
        </div>
        <a href="index.html#news" class="hover:text-blue-600">News</a>
        <a href="index.html#contact" class="hover:text-blue-600">Contact</a>
      </div>

      <div class="flex items-center space-x-4">
        <div class="hidden md:flex space-x-2">
          <a href="#" class="text-gray-600 hover:text-blue-600">
            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z"/></svg>
          </a>
          <a href="#" class="text-gray-600 hover:text-blue-600">
            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M8.29 20.251c7.547 0 11.675-6.253 11.675-11.675 0-.178 0-.355-.012-.53A8.348 8.348 0 0022 5.92a8.19 8.19 0 01-2.357.646 4.118 4.118 0 001.804-2.27 8.224 8.224 0 01-2.605.996 4.107 4.107 0 00-6.993 3.743 11.65 11.65 0 01-8.457-4.287 4.106 4.106 0 001.27 5.477A4.072 4.072 0 012.8 9.713v.052a4.105 4.105 0 003.292 4.022 4.095 4.095 0 01-1.853.07 4.108 4.108 0 003.834 2.85A8.233 8.233 0 012 18.407a11.616 11.616 0 006.29 1.84"/></svg>
          </a>
        </div>
        <div class="relative group">
          <button class="text-sm font-medium text-gray-700 hover:text-blue-600">EN ▼</button>
          <div class="absolute right-0 mt-1 w-24 bg-white rounded shadow-lg py-1 hidden group-hover:block z-10">
            <a href="#" class="block px-4 py-1 text-sm hover:bg-gray-100">EN</a>
            <a href="#" class="block px-4 py-1 text-sm hover:bg-gray-100">ES</a>
          </div>
        </div>
        <button data-collapse-toggle="mobile-menu" class="md:hidden text-gray-600">
          <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/></svg>
        </button>
      </div>

      <div class="hidden w-full md:hidden" id="mobile-menu">
        <ul class="mt-4 space-y-2">
          <li><a href="index.html" class="block py-2 px-3">Home</a></li>
          <li><a href="ideology.html" class="block py-2 px-3 font-medium text-blue-600">Ideology</a></li>
          <li><a href="#" class="block py-2 px-3">History</a></li>
          <li><a href="#" class="block py-2 px-3">Media</a></li>
          <li><a href="index.html#contact" class="block py-2 px-3">Contact</a></li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Hero Section -->
  <section class="pt-24 pb-16 bg-gradient-to-r from-blue-50 to-indigo-50">
    <div class="max-w-7xl mx-auto px-4 text-center">
      <h1 class="text-4xl md:text-5xl font-bold text-gray-900 mb-6">Our Ideology</h1>
      <p class="text-xl text-gray-600 max-w-3xl mx-auto">
        Guided by justice, equality, and inclusive progress for every citizen.
      </p>
    </div>
  </section>

  <!-- Core Principles -->
  <section class="py-16 px-4">
    <div class="max-w-7xl mx-auto">
      <h2 class="text-3xl font-bold text-center mb-12">Core Principles</h2>
      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
        <div class="bg-white p-6 rounded-xl shadow text-center border border-gray-100">
          <div class="bg-blue-100 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4">
            <svg class="w-8 h-8 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/></svg>
          </div>
          <h3 class="text-xl font-semibold mb-2">Integrity</h3>
          <p class="text-gray-600">We uphold honesty, transparency, and ethical governance in all actions.</p>
        </div>
        <div class="bg-white p-6 rounded-xl shadow text-center border border-gray-100">
          <div class="bg-green-100 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4">
            <svg class="w-8 h-8 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/></svg>
          </div>
          <h3 class="text-xl font-semibold mb-2">Inclusivity</h3>
          <p class="text-gray-600">We believe in equal opportunity and representation for all communities.</p>
        </div>
        <div class="bg-white p-6 rounded-xl shadow text-center border border-gray-100">
          <div class="bg-purple-100 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4">
            <svg class="w-8 h-8 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>
          </div>
          <h3 class="text-xl font-semibold mb-2">Progress</h3>
          <p class="text-gray-600">We champion innovation, education, and sustainable development.</p>
        </div>
      </div>
    </div>
  </section>

  <!-- Vision & Mission -->
  <section class="py-16 px-4 bg-gray-50">
    <div class="max-w-7xl mx-auto">
      <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
        <div>
          <h2 class="text-3xl font-bold mb-4">Our Vision</h2>
          <p class="text-lg text-gray-700">
            A just, equitable, and prosperous nation where every individual can thrive with dignity, freedom, and opportunity.
          </p>
        </div>
        <div>
          <h2 class="text-3xl font-bold mb-4">Our Mission</h2>
          <ul class="space-y-3 text-gray-700">
            <li class="flex items-start">
              <svg class="w-5 h-5 text-green-500 mr-2 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
              Empower citizens through participatory democracy.
            </li>
            <li class="flex items-start">
              <svg class="w-5 h-5 text-green-500 mr-2 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
              Build resilient, green, and inclusive infrastructure.
            </li>
            <li class="flex items-start">
              <svg class="w-5 h-5 text-green-500 mr-2 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
              Ensure quality education and healthcare for all.
            </li>
          </ul>
        </div>
      </div>
    </div>
  </section>

  <!-- Ideological Timeline -->
  <section class="py-16 px-4">
    <div class="max-w-7xl mx-auto">
      <h2 class="text-3xl font-bold text-center mb-12">Evolution of Our Ideology</h2>
      <div class="relative">
        <!-- Vertical line -->
        <div class="absolute left-1/2 transform -translate-x-px h-full bg-gray-200 hidden md:block"></div>

        <!-- Timeline items -->
        <div class="space-y-12 relative">
          <!-- 2015 -->
          <div class="flex flex-col md:flex-row items-center">
            <div class="md:w-1/2 md:text-right mb-4 md:mb-0 md:pr-8">
              <span class="text-sm font-semibold text-blue-600">2015</span>
              <h3 class="text-xl font-bold">Founding Principles</h3>
              <p class="text-gray-600 mt-2">Launched with a charter focused on anti-corruption and youth engagement.</p>
            </div>
            <div class="md:w-1/2 md:pl-8 mt-4 md:mt-0">
              <div class="bg-gray-200 border-2 border-dashed rounded-xl w-full h-32"></div>
            </div>
          </div>

          <!-- 2018 -->
          <div class="flex flex-col md:flex-row items-center">
            <div class="md:w-1/2 md:pl-8 order-2 md:order-1">
              <div class="bg-blue-200 border-2 border-dashed rounded-xl w-full h-32"></div>
            </div>
            <div class="md:w-1/2 md:text-left md:pr-8 order-1 md:order-2 mb-4 md:mb-0">
              <span class="text-sm font-semibold text-blue-600">2018</span>
              <h3 class="text-xl font-bold">Inclusive Manifesto</h3>
              <p class="text-gray-600 mt-2">Expanded ideology to include gender equity and minority rights.</p>
            </div>
          </div>

          <!-- 2021 -->
          <div class="flex flex-col md:flex-row items-center">
            <div class="md:w-1/2 md:text-right mb-4 md:mb-0 md:pr-8">
              <span class="text-sm font-semibold text-blue-600">2021</span>
              <h3 class="text-xl font-bold">Green & Digital Future</h3>
              <p class="text-gray-600 mt-2">Integrated climate action and digital governance into core ideology.</p>
            </div>
            <div class="md:w-1/2 md:pl-8 mt-4 md:mt-0">
              <div class="bg-green-200 border-2 border-dashed rounded-xl w-full h-32"></div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Footer -->
  <footer class="bg-gray-900 text-white pt-12 pb-6">
    <div class="max-w-7xl mx-auto px-4">
      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8 mb-8">
        <div>
          <h3 class="text-lg font-semibold mb-4">About Us</h3>
          <p class="text-gray-400 text-sm">A people-first political movement dedicated to transparency and development.</p>
        </div>
        <div>
          <h3 class="text-lg font-semibold mb-4">Quick Links</h3>
          <ul class="space-y-2 text-sm text-gray-400">
            <li><a href="index.html" class="hover:text-white">Home</a></li>
            <li><a href="ideology.html" class="hover:text-white font-medium text-white">Ideology</a></li>
            <li><a href="#" class="hover:text-white">History</a></li>
            <li><a href="index.html#news" class="hover:text-white">News</a></li>
          </ul>
        </div>
        <div>
          <h3 class="text-lg font-semibold mb-4">Contact</h3>
          <p class="text-sm text-gray-400">123 Democracy Ave,<br> Capital City, Country</p>
          <p class="text-sm text-gray-400 mt-2">Email: info@party.org<br>Phone: +1 234 567 890</p>
        </div>
        <div>
          <h3 class="text-lg font-semibold mb-4">Follow Us</h3>
          <div class="flex space-x-4">
            <a href="#" class="text-gray-400 hover:text-white">
              <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24"><path d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z"/></svg>
            </a>
            <a href="#" class="text-gray-400 hover:text-white">
              <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24"><path d="M8.29 20.251c7.547 0 11.675-6.253 11.675-11.675 0-.178 0-.355-.012-.53A8.348 8.348 0 0022 5.92a8.19 8.19 0 01-2.357.646 4.118 4.118 0 001.804-2.27 8.224 8.224 0 01-2.605.996 4.107 4.107 0 00-6.993 3.743 11.65 11.65 0 01-8.457-4.287 4.106 4.106 0 001.27 5.477A4.072 4.072 0 012.8 9.713v.052a4.105 4.105 0 003.292 4.022 4.095 4.095 0 01-1.853.07 4.108 4.108 0 003.834 2.85A8.233 8.233 0 012 18.407a11.616 11.616 0 006.29 1.84"/></svg>
            </a>
          </div>
        </div>
      </div>
      <div class="border-t border-gray-800 pt-6 text-center text-sm text-gray-500">
        &copy; 2024 Party Name. All rights reserved.
      </div>
    </div>
  </footer>

  <!-- Flowbite JS -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
</body>
</html>