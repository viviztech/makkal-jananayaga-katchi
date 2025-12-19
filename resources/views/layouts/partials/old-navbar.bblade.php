<!-- Top Bar -->
<div class="bg-blue-900 text-white py-2 px-4 hidden md:flex justify-between items-center text-sm">
  <div class="flex items-center space-x-4">
    <span>Phone: {{ __('site.contact.phone') }}</span>
    <span>Email: {{ __('site.contact.email') }}</span>
  </div>
  <div class="flex space-x-2">
        <a href="{{ route('applications') }}" class="hover:text-gray-300">{{ __('site.menu.applications') }}</a>
        <a href="{{ route('donation') }}" class="hover:text-gray-300">{{ __('site.menu.donations') }}</a>
    <a href="https://www.facebook.com/people/Viduthalai-Chiruthaigal-katchi/61578689859070/" class="hover:text-blue-300">
      <img src="{{ asset('assets/images/social/facebook.png') }}" alt="Facebook" class="w-5 h-5">
    </a>
    <a href="https://www.instagram.com/vck_officiall/" class="hover:text-blue-300">
      <img src="{{ asset('assets/images/social/instagram.png') }}" alt="Instagram" class="w-5 h-5">
    </a>
    <a href="https://x.com/vck_officiall" class="hover:text-blue-300">
      <img src="{{ asset('assets/images/social/twitter.png') }}" alt="x" class="w-5 h-5">
    </a>
    <a href="https://www.threads.com/@vck_officiall" class="hover:text-blue-300">
      <img src="{{ asset('assets/images/social/threads.png') }}" alt="threads" class="w-5 h-5">
    </a>
    <a href="https://www.youtube.com/@Vck_Youtube" class="hover:text-blue-300">
      <img src="{{ asset('assets/images/social/youtube.png') }}" alt="YouTube" class="w-5 h-5">
    </a>
  </div>
</div>

<!-- Navbar -->
   <nav class="bg-white border-b border-gray-200 px-4 py-3 sticky top-0 z-50">
    <div class="max-w-7xl mx-auto flex flex-wrap items-center justify-between">
      <!-- Logo -->
      <a href="{{ route('home') }}" class="flex items-center">
        <img src="{{ asset('assets/images/favicons/apple-touch-icon.png') }}" alt="Logo" class="h-8 mr-2">
        <span class="self-center text-xs sm:text-2xl text-1xl font-bold whitespace-nowrap">{{ __('site.title') }}</span>
      </a>

      <!-- Center Nav (hidden on mobile) -->
      <div class="hidden md:flex md:items-center md:space-x-6">
        <a href="{{ route('home') }}" class="text-blue-900 {{ Request::routeIs('home') ? 'font-bold' : '' }}">{{ __('site.menu.home') }}</a>
        <!-- Party Dropdown -->
        <div class="relative">
          <button onclick="toggleDropdown('party-menu')" class="flex items-center gap-1 hover:text-blue-800">{{ __('site.menu.party') }}
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" /></svg>
          </button>
          <div id="party-menu" class="dropdown-menu absolute left-0 mt-2 w-48 bg-white rounded-md shadow-lg py-1 hidden z-20">
                        <a href="{{ route('ideology') }}" class="block px-4 py-2 hover:bg-gray-100 {{ Request::routeIs('ideology') ? 'bg-blue-50 font-bold' : '' }}">{{ __('site.menu.ideology') }}</a>
            <a href="{{ route('history') }}" class="block px-4 py-2 hover:bg-gray-100 {{ Request::routeIs('history') ? 'bg-blue-50 font-bold' : '' }}">{{ __('site.menu.history') }}</a>
            <a href="{{ route('leadership') }}" class="block px-4 py-2 hover:bg-gray-100 {{ Request::routeIs('leadership') ? 'bg-blue-50 font-bold' : '' }}">{{ __('site.menu.leadership') }}</a>
            <a href="{{ route('elected-members') }}" class="block px-4 py-2 hover:bg-gray-100 {{ Request::routeIs('elected-members') ? 'bg-blue-50 font-bold' : '' }}">{{ __('site.menu.elected_members') }}</a>
            <a href="{{ route('office-bearers') }}" class="block px-4 py-2 hover:bg-gray-100 {{ Request::routeIs('office-bearers') ? 'bg-blue-50 font-bold' : '' }}">{{ __('site.menu.office_bearers') }}</a>
            <a href="{{ route('party-representatives') }}" class="block px-4 py-2 hover:bg-gray-100 {{ Request::routeIs('party-representatives') ? 'bg-blue-50 font-bold' : '' }}">{{ __('site.menu.party_representatives') }}</a>
            <div class="border-t border-gray-200 my-1"></div>
            <a href="{{ route('applications') }}" class="block px-4 py-2 hover:bg-gray-100 {{ Request::routeIs('applications') ? 'bg-blue-50 font-bold' : '' }}">{{ __('site.menu.applications') }}</a>
            <a href="{{ route('donation') }}" class="block px-4 py-2 hover:bg-gray-100 {{ Request::routeIs('donation') ? 'bg-blue-50 font-bold' : '' }}">{{ __('site.menu.donations') }}</a></search>
</search_and_replace>
          </div>
        </div>
        <!-- Media Dropdown -->
        <div class="relative">
          <button onclick="toggleDropdown('media-menu')" class="flex items-center gap-1 hover:text-blue-800">{{ __('site.menu.media') }}
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" /></svg>
          </button>
          <div id="media-menu" class="dropdown-menu absolute left-0 mt-2 w-48 bg-white rounded-md shadow-lg py-1 hidden z-20">
                        <a href="{{ route('gallery') }}" class="block px-4 py-2 hover:bg-gray-100 {{ Request::routeIs('gallery') ? 'bg-blue-50 font-bold' : '' }}">{{ __('site.menu.gallery') }}</a>
            <a href="{{ route('videos') }}" class="block px-4 py-2 hover:bg-gray-100 {{ Request::routeIs('videos') ? 'bg-blue-50 font-bold' : '' }}">{{ __('site.menu.videos') }}</a>
            <a href="{{ route('books') }}" class="block px-4 py-2 hover:bg-gray-100 {{ Request::routeIs('books') ? 'bg-blue-50 font-bold' : '' }}">{{ __('site.menu.books') }}</a></search>
</search_and_replace>
          </div>
        </div>
        <div class="relative">
          <button onclick="toggleDropdown('news-menu')" class="flex items-center gap-1 hover:text-blue-800">{{ __('site.menu.news') }}
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" /></svg>
          </button>
          <div id="news-menu" class="dropdown-menu absolute left-0 mt-2 w-48 bg-white rounded-md shadow-lg py-1 hidden z-20">
                        <a href="{{ route('press-releases') }}" class="block px-4 py-2 hover:bg-gray-100 {{ Request::routeIs('press-releases') ? 'bg-blue-50 font-bold' : '' }}">{{ __('site.menu.press_release') }}</a>
            <a href="{{ route('latest-news') }}" class="block px-4 py-2 hover:bg-gray-100 {{ Request::routeIs('latest-news') ? 'bg-blue-50 font-bold' : '' }}">{{ __('site.menu.latest_news') }}</a>
            <a href="{{ route('events') }}" class="block px-4 py-2 hover:bg-gray-100 {{ Request::routeIs('events') ? 'bg-blue-50 font-bold' : '' }}">{{ __('site.home.events') }}</a>
            <a href="{{ route('interviews') }}" class="block px-4 py-2 hover:bg-gray-100 {{ Request::routeIs('interviews') ? 'bg-blue-50 font-bold' : '' }}">{{ __('site.menu.interviews') }}</a>
            <a href="{{ route('kalaththil-siruthaigal') }}" class="block px-4 py-2 hover:bg-gray-100 {{ Request::routeIs('kalaththil-siruthaigal') ? 'bg-blue-50 font-bold' : '' }}">{{ __('site.menu.kalaththil_siruthaigal') }}</a></search>
</search_and_replace>
          </div>
        </div>
        <a href="{{ route('contact') }}" class="hover:text-blue-800 {{ Request::routeIs('contact') ? 'font-bold' : '' }}">{{ __('site.menu.contact') }}</a>

        <a href="{{ route('join') }}" class="bg-red-600 text-white px-4 py-2 rounded-lg hover:bg-red-700 transition-colors duration-200 {{ Request::routeIs('join') ? 'ring-2 ring-white' : '' }}">{{ __('site.menu.join_vck') }}</a>
      </div>

      <!-- Right-side: Social + Language -->
      <div class="flex items-center space-x-4">
        <!-- Social Icons -->
        <!-- <div class="hidden md:flex space-x-2">
          <a href="#" class="text-gray-600 hover:text-blue-600">
            <img src="{{ asset('assets/images/social/facebook.png') }}" alt="Instagram" class="w-6 h-6">
          </a>
          <a href="#" class="text-gray-600 hover:text-blue-600">
            <img src="{{ asset('assets/images/social/instagram.png') }}" alt="Instagram" class="w-6 h-6">
          </a>
          <a href="#" class="text-gray-600 hover:text-blue-600">
            <img src="{{ asset('assets/images/social/youtube.png') }}" alt="Instagram" class="w-6 h-6">
          </a>
        </div> -->


        <!-- Language Switcher -->
        <div class="relative">
          <button onclick="toggleDropdown('lang-menu')" class="flex items-center text-sm font-medium text-gray-700 hover:text-blue-600">
            EN
            <svg class="w-4 h-4 ms-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" /></svg>
          </button>
          <div id="lang-menu" class="dropdown-menu absolute right-0 mt-2 w-28 bg-white rounded-md shadow-lg py-1 hidden z-20">
            @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
            <a hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}" class="block px-4 py-2 text-sm hover:bg-gray-100">{{ $properties['native'] }}</a>
            @endforeach
          </div>
        </div>

        <!-- Mobile Menu Button -->
        <button
          data-collapse-toggle="mobile-menu"
          type="button"
          class="md:hidden inline-flex items-center p-2 w-10 h-10 justify-center text-gray-500 rounded-lg hover:bg-gray-100"
        >
          <span class="sr-only">Open menu</span>
          <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/></svg>
        </button>
      </div>

      <!-- Mobile Menu -->
      <div class="hidden w-full md:hidden" id="mobile-menu">
        <ul class="flex flex-col mt-4 space-y-2">
                    <li><a href="{{ route('home') }}" class="block py-2 px-3 text-blue-600 {{ Request::routeIs('home') ? 'font-bold' : '' }}">{{ __('site.menu.home') }}</a></li></search>
</search_and_replace>

          <!-- Party Dropdown Mobile -->
          <li class="relative">
            <button onclick="toggleDropdown('mobile-party-menu')" class="flex items-center justify-between w-full py-2 px-3 hover:bg-gray-100">
              {{ __('site.menu.party') }}
              <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
              </svg>
            </button>
            <ul id="mobile-party-menu" class="ml-4 mt-2 space-y-1 hidden">
              <li><a href="{{ route('ideology') }}" class="block py-2 px-3 text-sm hover:bg-gray-100">{{ __('site.menu.ideology') }}</a></li>
              <li><a href="{{ route('history') }}" class="block py-2 px-3 text-sm hover:bg-gray-100">{{ __('site.menu.history') }}</a></li>
              <li><a href="{{ route('leadership') }}" class="block py-2 px-3 text-sm hover:bg-gray-100">{{ __('site.menu.leadership') }}</a></li>
              <li><a href="{{ route('elected-members') }}" class="block py-2 px-3 text-sm hover:bg-gray-100">{{ __('site.menu.elected_members') }}</a></li>
              <li><a href="{{ route('office-bearers') }}" class="block py-2 px-3 text-sm hover:bg-gray-100">{{ __('site.menu.office_bearers') }}</a></li>
              <li><a href="{{ route('party-representatives') }}" class="block py-2 px-3 text-sm hover:bg-gray-100">{{ __('site.menu.party_representatives') }}</a></li>
              <li class="border-t border-gray-200 pt-2 mt-2"><a href="{{ route('applications') }}" class="block py-2 px-3 text-sm hover:bg-gray-100">{{ __('site.menu.applications') }}</a></li>
              <li><a href="{{ route('donation') }}" class="block py-2 px-3 text-sm hover:bg-gray-100">{{ __('site.menu.donations') }}</a></li>
            </ul>
          </li>

          <!-- Media Dropdown Mobile -->
          <li class="relative">
            <button onclick="toggleDropdown('mobile-media-menu')" class="flex items-center justify-between w-full py-2 px-3 hover:bg-gray-100">
              {{ __('site.menu.media') }}
              <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
              </svg>
            </button>
            <ul id="mobile-media-menu" class="ml-4 mt-2 space-y-1 hidden">
              <li><a href="{{ route('gallery') }}" class="block py-2 px-3 text-sm hover:bg-gray-100">{{ __('site.menu.gallery') }}</a></li>
              <li><a href="{{ route('videos') }}" class="block py-2 px-3 text-sm hover:bg-gray-100">{{ __('site.menu.videos') }}</a></li>
              <li><a href="{{ route('books') }}" class="block py-2 px-3 text-sm hover:bg-gray-100">{{ __('site.menu.books') }}</a></li>
            </ul>
          </li>

          <!-- News Dropdown Mobile -->
          <li class="relative">
            <button onclick="toggleDropdown('mobile-news-menu')" class="flex items-center justify-between w-full py-2 px-3 hover:bg-gray-100">
              {{ __('site.menu.news') }}
              <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
              </svg>
            </button>
            <ul id="mobile-news-menu" class="ml-4 mt-2 space-y-1 hidden">
              <li><a href="{{ route('press-releases') }}" class="block py-2 px-3 text-sm hover:bg-gray-100">{{ __('site.menu.press_release') }}</a></li>
              <li><a href="{{ route('latest-news') }}" class="block py-2 px-3 text-sm hover:bg-gray-100">{{ __('site.menu.latest_news') }}</a></li>
              <li><a href="{{ route('events') }}" class="block py-2 px-3 text-sm hover:bg-gray-100">{{ __('site.home.events') }}</a></li>
              <li><a href="{{ route('interviews') }}" class="block py-2 px-3 text-sm hover:bg-gray-100">{{ __('site.menu.interviews') }}</a></li>
              <li><a href="{{ route('kalaththil-siruthaigal') }}" class="block py-2 px-3 text-sm hover:bg-gray-100">{{ __('site.menu.kalaththil_siruthaigal') }}</a></li>
            </ul>
          </li>
                     <li><a href="{{ route('contact') }}" class="block py-2 px-3 hover:bg-gray-100 {{ Request::routeIs('contact') ? 'bg-blue-50 font-bold' : '' }}">{{ __('site.menu.contact') }}</a></li></search>
</search_and_replace>
                     <li><a href="{{ route('join') }}" class="block py-2 px-3 bg-red-600 text-white text-center mx-3 my-2 rounded-lg {{ Request::routeIs('join') ? 'ring-2 ring-white' : '' }}">{{ __('site.menu.join_vck') }}</a></li></search>
</search_and_replace>
          <!-- Mobile Social Icons -->
          <li class="border-t pt-4 mt-4">
            <div class="flex space-x-4 px-3">
              <a href="#" class="text-gray-600 hover:text-blue-600">
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z"/></svg>
              </a>
              <a href="#" class="text-gray-600 hover:text-blue-600">
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M8.29 20.251c7.547 0 11.675-6.253 11.675-11.675 0-.178 0-.355-.012-.53A8.348 8.348 0 0022 5.92a8.19 8.19 0 01-2.357.646 4.118 4.118 0 001.804-2.27 8.224 8.224 0 01-2.605.996 4.107 4.107 0 00-6.993 3.743 11.65 11.65 0 01-8.457-4.287 4.106 4.106 0 001.27 5.477A4.072 4.072 0 012.8 9.713v.052a4.105 4.105 0 003.292 4.022 4.095 4.095 0 01-1.853.07 4.108 4.108 0 003.834 2.85A8.233 8.233 0 012 18.407a11.616 11.616 0 006.29 1.84"/></svg>
              </a>
              <a href="#" class="text-gray-600 hover:text-blue-600">
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M12.017 0C5.396 0 .029 5.367.029 11.987c0 5.079 3.158 9.417 7.618 11.174-.105-.949-.199-2.403.041-3.439.219-.937 1.406-5.957 1.406-5.957s-.359-.72-.359-1.781c0-1.663.967-2.911 2.168-2.911 1.024 0 1.518.769 1.518 1.688 0 1.029-.653 2.567-.992 3.992-.285 1.193.6 2.165 1.775 2.165 2.128 0 3.768-2.245 3.768-5.487 0-2.861-2.063-4.869-5.008-4.869-3.41 0-5.409 2.562-5.409 5.199 0 1.033.394 2.143.889 2.75.099.12.112.225.085.345-.09.375-.293 1.199-.334 1.363-.053.225-.172.271-.402.165-1.495-.69-2.433-2.878-2.433-4.646 0-3.776 2.748-7.252 7.92-7.252 4.158 0 7.392 2.967 7.392 6.923 0 4.135-2.607 7.462-6.233 7.462-1.214 0-2.357-.629-2.747-1.378 0 0-.599 2.282-.744 2.84-.282 1.084-1.064 2.456-1.549 3.235C9.584 23.815 10.77 24.001 12.017 24.001c6.624 0 11.99-5.367 11.99-12C24.007 5.367 18.641.001 12.017.001z"/></svg>
              </a>
              <a href="#" class="text-gray-600 hover:text-blue-600">
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M12.017 0C5.396 0 .029 5.367.029 11.987c0 5.079 3.158 9.417 7.618 11.174-.105-.949-.199-2.403.041-3.439.219-.937 1.406-5.957 1.406-5.957s-.359-.72-.359-1.781c0-1.663.967-2.911 2.168-2.911 1.024 0 1.518.769 1.518 1.688 0 1.029-.653 2.567-.992 3.992-.285 1.193.6 2.165 1.775 2.165 2.128 0 3.768-2.245 3.768-5.487 0-2.861-2.063-4.869-5.008-4.869-3.41 0-5.409 2.562-5.409 5.199 0 1.033.394 2.143.889 2.75.099.12.112.225.085.345-.09.375-.293 1.199-.334 1.363-.053.225-.172.271-.402.165-1.495-.69-2.433-2.878-2.433-4.646 0-3.776 2.748-7.252 7.92-7.252 4.158 0 7.392 2.967 7.392 6.923 0 4.135-2.607 7.462-6.233 7.462-1.214 0-2.357-.629-2.747-1.378 0 0-.599 2.282-.744 2.84-.282 1.084-1.064 2.456-1.549 3.235C9.584 23.815 10.77 24.001 12.017 24.001c6.624 0 11.99-5.367 11.99-12C24.007 5.367 18.641.001 12.017.001z"/></svg>
              </a>
              <a href="#" class="text-gray-600 hover:text-blue-600">
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M23.498 6.186a2.998 2.998 0 00-2.124-2.124C19.215 3.545 12 3.545 12 3.545s-7.215 0-9.374.517A2.998 2.998 0 00.502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a2.998 2.998 0 002.124 2.124c2.159.517 9.374.517 9.374.517s7.215 0 9.374-.517a2.998 2.998 0 002.124-2.124C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z"/></svg>
              </a>
              <a href="#" class="text-gray-600 hover:text-blue-600">
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m3.867-6.431C19.515 3.545 12 3.545 12 3.545s-7.515 0-9.339.506A2.994 2.994 0 00.001 6.051C.001 7.215.001 8.379.001 9.543L0 14.456c0 1.084.887 1.96 1.951 2.014 1.814.15 9.048.15 9.048.15s7.234 0 9.048-.15A2.014 2.014 0 0024 14.456V9.543c0-1.164 0-2.328-.001-3.492A2.994 2.994 0 0021.489 3.05"/></svg>
              </a>
              <a href="#" class="text-gray-600 hover:text-blue-600">
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.554 5.746-11.97 12.472-12h.102c6.726.03 12.204 5.406 12.206 12.011.002 6.554-5.293 11.97-11.846 12H12.57c-1.897 0-3.715-.546-5.263-1.547L0 24l.057-.001z"/></svg>
              </a>
            </div>
          </li>

          <!-- Mobile Language Switcher -->
          <li class="border-t pt-4 mt-4">
            <div class="px-3">
              <div class="relative">
                <button onclick="toggleDropdown('mobile-lang-menu')" class="flex items-center justify-between w-full py-2 text-sm font-medium text-gray-700 hover:text-blue-600">
                  EN
                  <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                  </svg>
                </button>
                <div id="mobile-lang-menu" class="mt-2 space-y-1 hidden">
                  @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                  <a hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}" class="block py-2 px-3 text-sm hover:bg-gray-100">{{ $properties['native'] }}</a>
                  @endforeach
                </div>
              </div>
            </div>
          </li>
        </ul>
      </div>
    </div>
  </nav>


