{{-- Campaign Top Bar --}}
<div class="navbar-campaign-top">
    <div class="max-w-7xl mx-auto flex justify-between items-center text-sm">
        {{-- Contact Information --}}
        <div class="flex items-center space-x-6">
            <a href="tel:{{ str_replace(' ', '', __('site.contact.phone')) }}" class="hover:opacity-80 transition-opacity">
                <svg class="w-4 h-4 inline mr-1" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.836l.74 4.435a1 1 0 01-.54 1.06l-1.548.773a11.037 11.037 0 006.105 6.105l.774-1.548a1 1 0 011.059-.54l4.435.74a1 1 0 01.836.986V17a1 1 0 01-1 1h-2C7.82 18 2 12.18 2 5V3z"/>
                </svg>
                {{ __('site.contact.phone') }}
            </a>
            <a href="mailto:{{ __('site.contact.email') }}" class="hidden md:inline hover:opacity-80 transition-opacity">
                <svg class="w-4 h-4 inline mr-1" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z"/>
                    <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z"/>
                </svg>
                {{ __('site.contact.email') }}
            </a>
        </div>

        {{-- Social Media Links --}}
        <div class="flex items-center space-x-3">
            @php
                $socialLinks = [
                    ['url' => 'https://www.facebook.com/people/Viduthalai-Chiruthaigal-katchi/61578689859070/', 'name' => 'Facebook', 'icon' => 'M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z'],
                    ['url' => 'https://x.com/vck_officiall', 'name' => 'X', 'icon' => 'M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z'],
                    ['url' => 'https://www.youtube.com/@Vck_Youtube', 'name' => 'YouTube', 'icon' => 'M23.498 6.186a2.998 2.998 0 00-2.124-2.124C19.215 3.545 12 3.545 12 3.545s-7.215 0-9.374.517A2.998 2.998 0 00.502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a2.998 2.998 0 002.124 2.124c2.159.517 9.374.517 9.374.517s7.215 0 9.374-.517a2.998 2.998 0 002.124-2.124C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z'],
                ];
            @endphp

            @foreach($socialLinks as $social)
                <a href="{{ $social['url'] }}" class="hover:opacity-80 transition-opacity" target="_blank" rel="noopener noreferrer" aria-label="{{ $social['name'] }}">
                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                        <path d="{{ $social['icon'] }}"/>
                    </svg>
                </a>
            @endforeach
        </div>
    </div>
</div>

{{-- Main Campaign Navigation --}}
<nav class="navbar-campaign">
    <div class="navbar-campaign-main max-w-7xl mx-auto">
        {{-- Logo --}}
        <a href="{{ route('home') }}" class="navbar-campaign-logo">
            <img src="{{ asset('assets/images/favicons/apple-touch-icon.png') }}" alt="VCK Logo" class="h-12 w-12">
            <span class="text-2xl font-extrabold text-[var(--color-vck-red)] hidden sm:inline">
                {{ __('site.title') }}
            </span>
        </a>

        {{-- Desktop Navigation --}}
        <div class="navbar-campaign-menu">
            <a href="{{ route('home') }}" class="navbar-campaign-link {{ Request::routeIs('home') ? 'navbar-campaign-link-active' : '' }}">
                {{ __('site.menu.home') }}
            </a>

            {{-- Party Dropdown --}}
            <div class="dropdown-campaign">
                <div class="dropdown-campaign-trigger navbar-campaign-link">
                    {{ __('site.menu.party') }}
                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"/>
                    </svg>
                </div>
                <div class="dropdown-campaign-menu">
                    <a href="{{ route('ideology') }}" class="dropdown-campaign-item {{ Request::routeIs('ideology') ? 'dropdown-campaign-item-active' : '' }}">{{ __('site.menu.ideology') }}</a>
                    <a href="{{ route('history') }}" class="dropdown-campaign-item {{ Request::routeIs('history') ? 'dropdown-campaign-item-active' : '' }}">{{ __('site.menu.history') }}</a>
                    <a href="{{ route('leadership') }}" class="dropdown-campaign-item {{ Request::routeIs('leadership') ? 'dropdown-campaign-item-active' : '' }}">{{ __('site.menu.leadership') }}</a>
                    <a href="{{ route('elected-members') }}" class="dropdown-campaign-item {{ Request::routeIs('elected-members') ? 'dropdown-campaign-item-active' : '' }}">{{ __('site.menu.elected_members') }}</a>
                    <a href="{{ route('office-bearers') }}" class="dropdown-campaign-item {{ Request::routeIs('office-bearers') ? 'dropdown-campaign-item-active' : '' }}">{{ __('site.menu.office_bearers') }}</a>
                    <a href="{{ route('party-representatives') }}" class="dropdown-campaign-item {{ Request::routeIs('party-representatives') ? 'dropdown-campaign-item-active' : '' }}">{{ __('site.menu.party_representatives') }}</a>
                    <div class="border-t my-1"></div>
                    <a href="{{ route('applications') }}" class="dropdown-campaign-item {{ Request::routeIs('applications') ? 'dropdown-campaign-item-active' : '' }}">{{ __('site.menu.applications') }}</a>
                    <a href="{{ route('donation') }}" class="dropdown-campaign-item {{ Request::routeIs('donation') ? 'dropdown-campaign-item-active' : '' }}">{{ __('site.menu.donations') }}</a>
                </div>
            </div>

            {{-- Media Dropdown --}}
            <div class="dropdown-campaign">
                <div class="dropdown-campaign-trigger navbar-campaign-link">
                    {{ __('site.menu.media') }}
                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"/>
                    </svg>
                </div>
                <div class="dropdown-campaign-menu">
                    <a href="{{ route('gallery') }}" class="dropdown-campaign-item {{ Request::routeIs('gallery') ? 'dropdown-campaign-item-active' : '' }}">{{ __('site.menu.gallery') }}</a>
                    <a href="{{ route('videos') }}" class="dropdown-campaign-item {{ Request::routeIs('videos') ? 'dropdown-campaign-item-active' : '' }}">{{ __('site.menu.videos') }}</a>
                    <a href="{{ route('books') }}" class="dropdown-campaign-item {{ Request::routeIs('books') ? 'dropdown-campaign-item-active' : '' }}">{{ __('site.menu.books') }}</a>
                </div>
            </div>

            {{-- News Dropdown --}}
            <div class="dropdown-campaign">
                <div class="dropdown-campaign-trigger navbar-campaign-link">
                    {{ __('site.menu.news') }}
                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"/>
                    </svg>
                </div>
                <div class="dropdown-campaign-menu">
                    <a href="{{ route('press-releases') }}" class="dropdown-campaign-item {{ Request::routeIs('press-releases') ? 'dropdown-campaign-item-active' : '' }}">{{ __('site.menu.press_release') }}</a>
                    <a href="{{ route('latest-news') }}" class="dropdown-campaign-item {{ Request::routeIs('latest-news') ? 'dropdown-campaign-item-active' : '' }}">{{ __('site.menu.latest_news') }}</a>
                    <a href="{{ route('events') }}" class="dropdown-campaign-item {{ Request::routeIs('events') ? 'dropdown-campaign-item-active' : '' }}">{{ __('site.home.events') }}</a>
                    <a href="{{ route('interviews') }}" class="dropdown-campaign-item {{ Request::routeIs('interviews') ? 'dropdown-campaign-item-active' : '' }}">{{ __('site.menu.interviews') }}</a>
                    <a href="{{ route('kalaththil-siruthaigal') }}" class="dropdown-campaign-item {{ Request::routeIs('kalaththil-siruthaigal') ? 'dropdown-campaign-item-active' : '' }}">{{ __('site.menu.kalaththil_siruthaigal') }}</a>
                </div>
            </div>

            <a href="{{ route('contact') }}" class="navbar-campaign-link {{ Request::routeIs('contact') ? 'navbar-campaign-link-active' : '' }}">
                {{ __('site.menu.contact') }}
            </a>
        </div>

        {{-- Right Side: Language + Join Button + Mobile Menu --}}
        <div class="flex items-center gap-3">
            {{-- Language Switcher (Desktop) --}}
            <div class="hidden lg:block">
                <x-language-switcher id="lang-menu-desktop" />
            </div>

            {{-- Join VCK Button (Desktop) --}}
            <a href="{{ route('join') }}" class="hidden lg:inline-flex btn-campaign btn-campaign-cta">
                {{ __('site.menu.join_vck') }}
                <svg class="w-5 h-5 ml-2" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"/>
                </svg>
            </a>

            {{-- Mobile Menu Button --}}
            <button onclick="toggleMobileMenu()" class="lg:hidden p-2 rounded-lg hover:bg-gray-100 transition-colors" aria-label="Toggle mobile menu">
                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"/>
                </svg>
            </button>
        </div>
    </div>
</nav>

{{-- Mobile Menu --}}
<div id="mobile-menu" class="mobile-menu-campaign">
    <div class="mobile-menu-campaign-panel">
        {{-- Mobile Menu Header --}}
        <div class="mobile-menu-campaign-header">
            <span class="text-xl font-bold text-[var(--color-vck-red)]">{{ __('site.title') }}</span>
            <button onclick="toggleMobileMenu()" class="mobile-menu-campaign-close" aria-label="Close mobile menu">
                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"/>
                </svg>
            </button>
        </div>

        {{-- Mobile Menu Links --}}
        <div class="mobile-menu-campaign-links">
            <a href="{{ route('home') }}" class="mobile-menu-campaign-link">{{ __('site.menu.home') }}</a>

            <x-mobile-dropdown id="party-menu-mobile" :label="__('site.menu.party')" :items="[
                ['route' => 'ideology', 'label' => 'site.menu.ideology'],
                ['route' => 'history', 'label' => 'site.menu.history'],
                ['route' => 'leadership', 'label' => 'site.menu.leadership'],
                ['route' => 'elected-members', 'label' => 'site.menu.elected_members'],
                ['route' => 'office-bearers', 'label' => 'site.menu.office_bearers'],
                ['route' => 'party-representatives', 'label' => 'site.menu.party_representatives'],
                ['divider' => true],
                ['route' => 'applications', 'label' => 'site.menu.applications'],
                ['route' => 'donation', 'label' => 'site.menu.donations'],
            ]" />

            <x-mobile-dropdown id="media-menu-mobile" :label="__('site.menu.media')" :items="[
                ['route' => 'gallery', 'label' => 'site.menu.gallery'],
                ['route' => 'videos', 'label' => 'site.menu.videos'],
                ['route' => 'books', 'label' => 'site.menu.books'],
            ]" />

            <x-mobile-dropdown id="news-menu-mobile" :label="__('site.menu.news')" :items="[
                ['route' => 'press-releases', 'label' => 'site.menu.press_release'],
                ['route' => 'latest-news', 'label' => 'site.menu.latest_news'],
                ['route' => 'events', 'label' => 'site.home.events'],
                ['route' => 'interviews', 'label' => 'site.menu.interviews'],
                ['route' => 'kalaththil-siruthaigal', 'label' => 'site.menu.kalaththil_siruthaigal'],
            ]" />

            <a href="{{ route('contact') }}" class="mobile-menu-campaign-link">{{ __('site.menu.contact') }}</a>

            <div class="mt-4 pt-4 border-t">
                <x-language-switcher id="lang-menu-mobile" :mobile="true" />
            </div>

            <a href="{{ route('join') }}" class="btn-campaign btn-campaign-cta w-full mt-4">
                {{ __('site.menu.join_vck') }}
                <svg class="w-5 h-5 ml-2" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"/>
                </svg>
            </a>
        </div>
    </div>
</div>

<script>
    function toggleMobileMenu() {
        const menu = document.getElementById('mobile-menu');
        menu.classList.toggle('active');
    }

    // Close mobile menu when clicking outside
    document.getElementById('mobile-menu')?.addEventListener('click', function(e) {
        if (e.target === this) {
            toggleMobileMenu();
        }
    });
</script>
