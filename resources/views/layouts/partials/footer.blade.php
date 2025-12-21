{{-- Labour Welfare Theme Footer - Red & White --}}
<footer class="bg-[var(--color-mjk-red)] text-white relative overflow-hidden">
    {{-- Decorative Pattern --}}
    <div class="absolute inset-0 opacity-5">
        <div class="absolute top-0 left-0 w-64 h-64 border-2 border-white rotate-45 -translate-x-32 -translate-y-32">
        </div>
        <div class="absolute bottom-0 right-0 w-64 h-64 border-2 border-white rotate-45 translate-x-32 translate-y-32">
        </div>
    </div>

    {{-- Main Footer Content --}}
    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
        {{-- Party Symbol & Mission --}}
        <div class="text-center mb-12 pb-8 border-b-2 border-white/20">
            <h2 class="text-4xl font-black mb-3 tracking-tight">{{ __('site.title') }}</h2>
            <p class="text-xl font-semibold text-white/90 max-w-3xl mx-auto">{{ __('site.footer.about_description') }}
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8 lg:gap-12">
            {{-- People's Movement --}}
            <div>
                <h3 class="text-lg font-bold mb-6 uppercase tracking-wider border-b-2 border-white pb-2 inline-block">
                    {{ __('site.footer.quick_links') }}</h3>
                <ul class="space-y-3">
                    <li>
                        <a href="{{ route('join') }}"
                            class="flex items-center gap-2 text-white/90 hover:text-white hover:translate-x-2 transition-all duration-200 group">
                            <span class="text-white group-hover:scale-125 transition-transform">✊</span>
                            <span class="font-medium">{{ __('site.menu.join_mjk') }}</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('donation') }}"
                            class="flex items-center gap-2 text-white/90 hover:text-white hover:translate-x-2 transition-all duration-200 group">
                            <span class="text-white group-hover:scale-125 transition-transform">⭐</span>
                            <span class="font-medium">{{ __('site.menu.donations') }}</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('applications') }}"
                            class="flex items-center gap-2 text-white/90 hover:text-white hover:translate-x-2 transition-all duration-200 group">
                            <span class="text-white group-hover:scale-125 transition-transform">📝</span>
                            <span class="font-medium">{{ __('site.menu.applications') }}</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('contact') }}"
                            class="flex items-center gap-2 text-white/90 hover:text-white hover:translate-x-2 transition-all duration-200 group">
                            <span class="text-white group-hover:scale-125 transition-transform">📞</span>
                            <span class="font-medium">{{ __('site.menu.contact') }}</span>
                        </a>
                    </li>
                </ul>
            </div>

            {{-- Organization --}}
            <div>
                <h3 class="text-lg font-bold mb-6 uppercase tracking-wider border-b-2 border-white pb-2 inline-block">
                    {{ __('site.menu.party') }}</h3>
                <ul class="space-y-3">
                    <li>
                        <a href="{{ route('leadership') }}"
                            class="flex items-center gap-2 text-white/90 hover:text-white hover:translate-x-2 transition-all duration-200 group">
                            <span class="text-white group-hover:scale-125 transition-transform">👥</span>
                            <span class="font-medium">{{ __('site.menu.leadership') }}</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('ideology') }}"
                            class="flex items-center gap-2 text-white/90 hover:text-white hover:translate-x-2 transition-all duration-200 group">
                            <span class="text-white group-hover:scale-125 transition-transform">⚖️</span>
                            <span class="font-medium">{{ __('site.menu.ideology') }}</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('history') }}"
                            class="flex items-center gap-2 text-white/90 hover:text-white hover:translate-x-2 transition-all duration-200 group">
                            <span class="text-white group-hover:scale-125 transition-transform">📚</span>
                            <span class="font-medium">{{ __('site.menu.history') }}</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('party-wings') }}"
                            class="flex items-center gap-2 text-white/90 hover:text-white hover:translate-x-2 transition-all duration-200 group">
                            <span class="text-white group-hover:scale-125 transition-transform">🏛️</span>
                            <span class="font-medium">{{ __('site.color_symbolism.party_wings') }}</span>
                        </a>
                    </li>
                </ul>
            </div>

            {{-- Media & Updates --}}
            <div>
                <h3 class="text-lg font-bold mb-6 uppercase tracking-wider border-b-2 border-white pb-2 inline-block">
                    {{ __('site.menu.media') }}</h3>
                <ul class="space-y-3">
                    <li>
                        <a href="{{ route('latest-news') }}"
                            class="flex items-center gap-2 text-white/90 hover:text-white hover:translate-x-2 transition-all duration-200 group">
                            <span class="text-white group-hover:scale-125 transition-transform">📰</span>
                            <span class="font-medium">{{ __('site.menu.latest_news') }}</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('press-releases') }}"
                            class="flex items-center gap-2 text-white/90 hover:text-white hover:translate-x-2 transition-all duration-200 group">
                            <span class="text-white group-hover:scale-125 transition-transform">📢</span>
                            <span class="font-medium">{{ __('site.menu.press_release') }}</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('events') }}"
                            class="flex items-center gap-2 text-white/90 hover:text-white hover:translate-x-2 transition-all duration-200 group">
                            <span class="text-white group-hover:scale-125 transition-transform">📅</span>
                            <span class="font-medium">{{ __('site.menu.events') }}</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('gallery') }}"
                            class="flex items-center gap-2 text-white/90 hover:text-white hover:translate-x-2 transition-all duration-200 group">
                            <span class="text-white group-hover:scale-125 transition-transform">📸</span>
                            <span class="font-medium">{{ __('site.menu.gallery') }}</span>
                        </a>
                    </li>
                </ul>
            </div>

            {{-- Contact & Connect --}}
            <div>
                <h3 class="text-lg font-bold mb-6 uppercase tracking-wider border-b-2 border-white pb-2 inline-block">
                    {{ __('site.footer.contact') }}</h3>
                <div class="space-y-4 mb-6">
                    <div>
                        <p class="text-sm font-semibold mb-1 text-white/80">{{ __('site.footer.phone') }}</p>
                        <a href="tel:+919876543210" class="text-white hover:underline font-medium">+91 98765 43210</a>
                    </div>
                    <div>
                        <p class="text-sm font-semibold mb-1 text-white/80">{{ __('site.footer.email') }}</p>
                        <a href="mailto:info@makkaljananayagakatchi.com"
                            class="text-white hover:underline font-medium break-all text-sm">info@makkaljananayagakatchi.com</a>
                    </div>
                </div>

                {{-- Social Media --}}
                <div class="flex gap-3">

                </div>
            </div>
        </div>
    </div>

    {{-- Footer Bottom - Solidarity Message --}}
    <div class="relative bg-white text-[var(--color-mjk-red)] border-t-4 border-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-4">
            <div class="flex flex-col md:flex-row justify-between items-center gap-2 text-center md:text-left">
                <p class="font-bold text-sm">
                    ✊ © {{ date('Y') }} {{ __('site.title') }} | {{ __('site.footer.all_rights_reserved') }}
                </p>
                <p class="font-semibold text-sm uppercase tracking-wide">
                    Workers of the World, Unite!
                </p>
            </div>
        </div>
    </div>
</footer>