{{-- Top Bar with Contact Info and Social Links --}}
<div class="bg-blue-900 text-white py-2 px-4 hidden md:flex justify-between items-center text-sm dark:bg-blue-950">
    {{-- Contact Information --}}
    <div class="flex items-center space-x-6">
        <a href="tel:{{ str_replace(' ', '', __('site.contact.phone')) }}" class="hover:text-blue-200 transition-colors">
            <i class="fas fa-phone-alt mr-1"></i>
            {{ __('site.contact.phone') }}
        </a>
        <a href="mailto:{{ __('site.contact.email') }}" class="hover:text-blue-200 transition-colors">
            <i class="fas fa-envelope mr-1"></i>
            {{ __('site.contact.email') }}
        </a>
    </div>

    {{-- Social Media Links --}}
    <div class="flex items-center space-x-4">
        @php
            $socialLinks = [
                ['url' => 'https://www.facebook.com/people/Viduthalai-Chiruthaigal-katchi/61578689859070/', 'name' => 'Facebook', 'icon' => 'M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z'],
                ['url' => 'https://www.instagram.com/vck_officiall/', 'name' => 'Instagram', 'icon' => 'M12 2.163c3.204 0 3.584.012 4.85.07 1.172.053 1.905.242 2.49.449.586.206.96.478 1.48.977.52.499.773.894.978 1.48.207.585.397 1.318.45 2.49.058 1.266.07 1.646.07 4.85s-.012 3.584-.07 4.85c-.053 1.172-.242 1.905-.45 2.49-.206.586-.478.96-.978 1.48-.499.52-.894.773-1.48.978-.585.207-1.318.397-2.49.45-1.266.058-1.646.07-4.85.07s-3.584-.012-4.85-.07c-1.172-.053-1.905-.242-2.49-.45-.586-.206-.96-.478-1.48-.978-.52-.499-.773-.894-.978-1.48-.207-.585-.397-1.318-.45-2.49-.058-1.266-.07-1.646-.07-4.85s.012-3.584.07-4.85c.053-1.172.242-1.905.45-2.49.206-.586.478-.96.978-1.48.499-.52.894-.773 1.48-.978.585-.207 1.318-.397 2.49-.45 1.266-.057 1.646-.07 4.85-.07M12 0C8.741 0 8.333.014 7.053.072 5.775.132 4.905.333 4.14.63c-.789.306-1.459.717-2.126 1.384S.936 3.35.63 4.14C.333 4.905.131 5.775.072 7.053.014 8.333 0 8.741 0 12s.014 3.667.072 4.947c.06 1.277.261 2.148.558 2.913.306.788.717 1.459 1.384 2.126.667.666 1.336 1.079 2.126 1.384.766.296 1.636.499 2.913.558C8.333 23.986 8.741 24 12 24s3.667-.014 4.947-.072c1.277-.06 2.148-.262 2.913-.558.788-.306 1.459-.717 2.126-1.384.666-.667 1.079-1.335 1.384-2.126.296-.765.499-1.636.558-2.913.058-1.266.072-1.646.072-4.947s-.014-3.667-.072-4.947c-.06-1.277-.262-2.148-.558-2.913-.306-.789-.717-1.459-1.384-2.126C20.644.936 19.974.522 19.184.217c-.765-.297-1.636-.499-2.913-.558C14.986.014 14.559 0 12 0zm0 5.838a6.162 6.162 0 100 12.324 6.162 6.162 0 000-12.324M12 16a4 4 0 110-8 4 4 0 010 8m6.406-11.845a1.44 1.44 0 11-2.881.001 1.44 1.44 0 012.881-.001'],
                ['url' => 'https://x.com/vck_officiall', 'name' => 'X (Twitter)', 'icon' => 'M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z'],
                ['url' => 'https://www.threads.com/@vck_officiall', 'name' => 'Threads', 'icon' => 'M12.186 5.595c-3.323 0-5.909 2.27-5.909 5.337 0 2.946 2.365 5.338 5.909 5.338 3.323 0 5.908-2.27 5.908-5.338 0-3.067-2.585-5.337-5.908-5.337zm0 9.433c-2.42 0-4.282-1.721-4.282-4.096 0-2.374 1.862-4.095 4.282-4.095 2.42 0 4.282 1.721 4.282 4.095 0 2.375-1.862 4.096-4.282 4.096zM19.93 5.339a1.38 1.38 0 11-2.76 0 1.38 1.38 0 012.76 0zM12 2.163c3.204 0 3.584.012 4.85.07 1.17.053 1.805.245 2.227.408.56.217.96.477 1.382.896.419.42.679.822.896 1.381.163.423.355 1.057.408 2.227.058 1.265.07 1.645.07 4.85s-.012 3.584-.07 4.849c-.053 1.17-.245 1.804-.408 2.227-.217.56-.477.96-.896 1.381-.42.419-.822.679-1.382.896-.422.163-1.057.355-2.227.408-1.265.058-1.645.07-4.85.07s-3.584-.012-4.849-.07c-1.17-.053-1.805-.245-2.228-.408a3.736 3.736 0 01-1.38-.896 3.736 3.736 0 01-.897-1.381c-.163-.423-.355-1.057-.408-2.227-.058-1.265-.07-1.645-.07-4.85s.012-3.584.07-4.849c.053-1.17.245-1.804.408-2.227.217-.56.477-.96.896-1.382.42-.419.822-.679 1.381-.896.423-.163 1.057-.355 2.228-.408 1.265-.058 1.645-.07 4.849-.07M12 0C8.741 0 8.332.014 7.052.072 5.775.13 4.905.333 4.14.63a5.9 5.9 0 00-2.126 1.384A5.9 5.9 0 00.63 4.14C.333 4.905.13 5.775.072 7.052.014 8.332 0 8.741 0 12c0 3.259.014 3.668.072 4.948.058 1.277.261 2.147.558 2.913a5.9 5.9 0 001.384 2.126A5.9 5.9 0 004.14 23.37c.765.297 1.636.5 2.913.558C8.332 23.986 8.741 24 12 24c3.259 0 3.668-.014 4.948-.072 1.277-.058 2.147-.261 2.913-.558a5.9 5.9 0 002.126-1.384 5.9 5.9 0 001.384-2.126c.297-.766.5-1.636.558-2.913.058-1.28.072-1.689.072-4.948 0-3.259-.014-3.668-.072-4.948-.058-1.277-.261-2.147-.558-2.913a5.9 5.9 0 00-1.384-2.126A5.9 5.9 0 0019.86.63C19.095.333 18.225.13 16.948.072 15.668.014 15.259 0 12 0z'],
                ['url' => 'https://www.youtube.com/@Vck_Youtube', 'name' => 'YouTube', 'icon' => 'M23.498 6.186a2.998 2.998 0 00-2.124-2.124C19.215 3.545 12 3.545 12 3.545s-7.215 0-9.374.517A2.998 2.998 0 00.502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a2.998 2.998 0 002.124 2.124c2.159.517 9.374.517 9.374.517s7.215 0 9.374-.517a2.998 2.998 0 002.124-2.124C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z'],
            ];
        @endphp

        @foreach($socialLinks as $social)
            <a href="{{ $social['url'] }}"
               class="text-white hover:text-opacity-80 transition-opacity"
               target="_blank"
               rel="noopener noreferrer"
               aria-label="{{ $social['name'] }}">
                <span class="sr-only">{{ $social['name'] }}</span>
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                    <path d="{{ $social['icon'] }}"/>
                </svg>
            </a>
        @endforeach
    </div>
</div>

{{-- Main Navigation Bar --}}
<nav class="bg-white border-b border-gray-200 px-4 py-3 sticky top-0 z-40 dark:bg-gray-800 dark:border-gray-700">
    <div class="max-w-7xl mx-auto flex flex-wrap items-center justify-between">
        {{-- Logo and Site Title --}}
        <a href="{{ route('home') }}" class="flex items-center space-x-2">
            <img src="{{ asset('assets/images/favicons/apple-touch-icon.png') }}"
                 alt="VCK Logo"
                 class="h-10 w-10">
            <span class="text-base text-xs md:text-2xl font-bold text-blue-900 dark:text-white">
                {{ __('site.title') }}
            </span>
        </a>

        {{-- Desktop Navigation --}}
        <div class="hidden md:flex md:items-center md:space-x-7">
            {{-- Home Link --}}
            <a href="{{ route('home') }}"
               class="py-2 text-gray-700 hover:text-blue-700 dark:text-gray-300 dark:hover:text-blue-400 transition-colors {{ Request::routeIs('home') ? 'text-blue-700 dark:text-blue-400 font-semibold' : '' }}">
                {{ __('site.menu.home') }}
            </a>

            {{-- Party Dropdown Menu --}}
            @php
                $partyMenuItems = [
                    ['route' => 'ideology', 'label' => 'site.menu.ideology'],
                    ['route' => 'history', 'label' => 'site.menu.history'],
                    ['route' => 'leadership', 'label' => 'site.menu.leadership'],
                    ['route' => 'elected-members', 'label' => 'site.menu.elected_members'],
                    ['route' => 'office-bearers', 'label' => 'site.menu.office_bearers'],
                    ['route' => 'party-representatives', 'label' => 'site.menu.party_representatives'],
                    ['divider' => true],
                    ['route' => 'applications', 'label' => 'site.menu.applications'],
                    ['route' => 'donation', 'label' => 'site.menu.donations'],
                ];
            @endphp
            <x-navbar-dropdown id="party-menu" :label="__('site.menu.party')" :items="$partyMenuItems" />

            {{-- Media Dropdown Menu --}}
            @php
                $mediaMenuItems = [
                    ['route' => 'gallery', 'label' => 'site.menu.gallery'],
                    ['route' => 'videos', 'label' => 'site.menu.videos'],
                    ['route' => 'books', 'label' => 'site.menu.books'],
                ];
            @endphp
            <x-navbar-dropdown id="media-menu" :label="__('site.menu.media')" :items="$mediaMenuItems" />

            {{-- News Dropdown Menu --}}
            @php
                $newsMenuItems = [
                    ['route' => 'press-releases', 'label' => 'site.menu.press_release'],
                    ['route' => 'latest-news', 'label' => 'site.menu.latest_news'],
                    ['route' => 'events', 'label' => 'site.home.events'],
                    ['route' => 'interviews', 'label' => 'site.menu.interviews'],
                    ['route' => 'kalaththil-siruthaigal', 'label' => 'site.menu.kalaththil_siruthaigal'],
                ];
            @endphp
            <x-navbar-dropdown id="news-menu" :label="__('site.menu.news')" :items="$newsMenuItems" />

            {{-- Contact Link --}}
            <a href="{{ route('contact') }}"
               class="py-2 text-gray-700 hover:text-blue-700 dark:text-gray-300 dark:hover:text-blue-400 transition-colors {{ Request::routeIs('contact') ? 'text-blue-700 dark:text-blue-400 font-semibold' : '' }}">
                {{ __('site.menu.contact') }}
            </a>

            {{-- Join VCK Button --}}
            <a href="{{ route('join') }}"
               class="bg-red-600 text-white px-5 py-2 rounded-lg font-semibold hover:bg-red-700 dark:hover:bg-red-500 transition-all duration-300 transform hover:scale-105 {{ Request::routeIs('join') ? 'ring-2 ring-offset-2 ring-red-500' : '' }}">
                {{ __('site.menu.join_vck') }}
            </a>

            {{-- Language Switcher --}}
            <x-language-switcher id="lang-menu-desktop" />
        </div>

        {{-- Mobile Menu Controls --}}
        <div class="flex items-center space-x-2 md:hidden">
            {{-- Mobile Language Switcher --}}
            <x-language-switcher id="lang-menu-mobile" mobile="true" />

            {{-- Mobile Menu Toggle Button --}}
            <button data-collapse-toggle="mobile-menu"
                    type="button"
                    class="inline-flex items-center p-2 w-10 h-10 justify-center text-gray-500 rounded-lg hover:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-700 transition-colors"
                    aria-controls="mobile-menu"
                    aria-expanded="false">
                <span class="sr-only">{{ __('site.menu.open_menu') }}</span>
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                </svg>
            </button>
        </div>

        {{-- Mobile Navigation Menu --}}
        <div class="hidden w-full md:hidden" id="mobile-menu">
            <ul class="flex flex-col mt-4 space-y-2 text-base font-medium">
                {{-- Home --}}
                <li>
                    <a href="{{ route('home') }}"
                       class="block py-2 px-3 rounded {{ Request::routeIs('home') ? 'bg-blue-100 dark:bg-gray-700 text-blue-700 dark:text-white font-semibold' : 'text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700' }}">
                        {{ __('site.menu.home') }}
                    </a>
                </li>

                {{-- Party Menu --}}
                <x-mobile-dropdown id="mobile-party-menu" :label="__('site.menu.party')" :items="$partyMenuItems" />

                {{-- Media Menu --}}
                <x-mobile-dropdown id="mobile-media-menu" :label="__('site.menu.media')" :items="$mediaMenuItems" />

                {{-- News Menu --}}
                <x-mobile-dropdown id="mobile-news-menu" :label="__('site.menu.news')" :items="$newsMenuItems" />

                {{-- Contact --}}
                <li>
                    <a href="{{ route('contact') }}"
                       class="block py-2 px-3 rounded {{ Request::routeIs('contact') ? 'bg-blue-100 dark:bg-gray-700 text-blue-700 dark:text-white font-semibold' : 'text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700' }}">
                        {{ __('site.menu.contact') }}
                    </a>
                </li>

                {{-- Join VCK --}}
                <li>
                    <a href="{{ route('join') }}"
                       class="block py-3 px-3 bg-red-600 text-white text-center mx-3 my-2 rounded-lg font-semibold hover:bg-red-700 dark:hover:bg-red-500 transition-colors {{ Request::routeIs('join') ? 'ring-2 ring-offset-2 ring-red-500' : '' }}">
                        {{ __('site.menu.join_vck') }}
                    </a>
                </li>

                {{-- Social Links --}}
                <li class="border-t border-gray-200 dark:border-gray-700 pt-4 mt-4">
                    <div class="flex justify-center space-x-6 px-3">
                        @foreach($socialLinks as $social)
                            <a href="{{ $social['url'] }}"
                               class="text-gray-500 hover:text-blue-700 dark:text-gray-400 dark:hover:text-white transition-colors"
                               target="_blank"
                               rel="noopener noreferrer"
                               aria-label="{{ $social['name'] }}">
                                <span class="sr-only">{{ $social['name'] }}</span>
                                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="{{ $social['icon'] }}"/>
                                </svg>
                            </a>
                        @endforeach
                    </div>
                </li>
            </ul>
        </div>
    </div>
</nav>
