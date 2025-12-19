<footer id="contact" class="bg-red-600 text-white pt-12 pb-6">
    <div class="max-w-7xl mx-auto px-4">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8 mb-8">
            <div>
                <h3 class="text-lg font-semibold mb-4">{{ __('site.footer.about_us') }}</h3>
                <p class="text-gray-100 text-sm">{{ __('site.about.intro-1') }}</p>
            </div>
            <div>
                <h3 class="text-lg font-semibold mb-4">{{ __('site.footer.quick_links') }}</h3>
                <ul class="space-y-2 text-sm text-gray-100">
                    <li><a href="{{ route('home') }}" class="hover:text-white transition-colors">{{ __('site.menu.home') }}</a></li>
                    <li><a href="{{ route('ideology') }}" class="hover:text-white transition-colors">{{ __('site.menu.ideology') }}</a></li>
                    <li><a href="{{ route('history') }}" class="hover:text-white transition-colors">{{ __('site.menu.history') }}</a></li>
                    <li><a href="{{ route('latest-news') }}" class="hover:text-white transition-colors">{{ __('site.menu.latest_news') }}</a></li>
                    <li><a href="{{ route('press-releases') }}" class="hover:text-white transition-colors">{{ __('site.menu.press_release') }}</a></li>
                    <li><a href="{{ route('contact') }}" class="hover:text-white transition-colors">{{ __('site.menu.contact') }}</a></li>
                </ul>
            </div>
            <div>
                <h3 class="text-lg font-semibold mb-4">{{ __('site.footer.contact') }}</h3>
                <p class="text-sm text-gray-100 mb-2">{{ __('site.contact.address') }}</p>
                <p class="text-sm text-gray-100 mb-1">
                    <span class="font-medium">{{ __('site.footer.email') }}:</span> {{ __('site.contact.email') }}
                </p>
                <p class="text-sm text-gray-100">
                    <span class="font-medium">{{ __('site.footer.phone') }}:</span> {{ __('site.contact.phone') }}
                </p>
            </div>
            <div>
                <h3 class="text-lg font-semibold mb-4">{{ __('site.footer.follow_us') }}</h3>
                <div class="flex space-x-4">
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
        </div>
        <div class="border-t border-red-400 pt-6 text-center text-sm text-gray-100">
            &copy; {{ date('Y') }} {{ __('site.title') }}. {{ __('site.footer.all_rights_reserved') }}.
        </div>
    </div>
</footer>