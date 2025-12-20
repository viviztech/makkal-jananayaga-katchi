@extends('layouts.app')

@section('title', __('site.menu.videos'))

@section('content')
{{-- Campaign Hero Section --}}
<section class="bg-gradient-to-br from-[var(--color-mjk-red)] via-[var(--color-mjk-red)] to-[var(--color-mjk-blue)] py-20">
    <div class="max-w-7xl mx-auto px-4 text-center" data-aos="fade-up">
        <h1 class="text-5xl md:text-6xl font-extrabold text-white mb-6">
            {{ __('site.menu.videos') }}
        </h1>
        <p class="text-xl md:text-2xl text-white/90 max-w-3xl mx-auto">
            {{ __('site.videos.description') }}
        </p>
    </div>
</section>

    {{-- Videos Content --}}
    <section class="py-12 lg:py-16 px-4 bg-gray-50">
        <div class="max-w-7xl mx-auto">
            <div class="flex flex-col lg:flex-row gap-8">
                {{-- Main Videos Content --}}
                <div class="flex-1 lg:w-3/4">
            @if($videos->isNotEmpty())
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 lg:gap-6">
                @foreach($videos as $index => $video)
                @php
                    $delay = ($index % 3) * 100;
                    $videoId = null;
                    if (preg_match('/(?:youtube\.com\/watch\?v=|youtu\.be\/|youtube\.com\/embed\/)([a-zA-Z0-9_-]{11})/', $video->video_link, $matches)) {
                        $videoId = $matches[1];
                    }
                    $thumbnail = $videoId ? "https://img.youtube.com/vi/{$videoId}/maxresdefault.jpg" : asset('assets/images/placeholders/video-placeholder.jpg');
                @endphp
                {{-- Video Card --}}
                <div class="card-campaign" data-aos="fade-up" data-aos-delay="{{ $delay }}">
                    <div class="overflow-hidden flex flex-col h-full">
                        {{-- Featured Image --}}
                        <div class="relative h-48 overflow-hidden bg-gray-100 dark:bg-gray-700 cursor-pointer video-thumbnail" data-video-id="{{ $videoId }}" data-video-url="{{ $video->video_link }}">
                            <img src="{{ $thumbnail }}"
                                 alt="{{ app()->getLocale() === 'ta' ? $video->title_ta : $video->title_en }}"
                                 class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110"
                                 onerror="this.onerror=null; this.src='{{ asset('assets/images/placeholders/video-placeholder-hq.jpg') }}';">

                            {{-- Play Button Overlay --}}
                            <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-center justify-center">
                                <div class="relative">
                                    <div class="absolute inset-0 bg-gradient-to-br from-red-500 to-orange-500 rounded-full blur-xl opacity-75"></div>
                                    <div class="relative bg-gradient-to-br from-red-600 to-orange-600 rounded-full p-4 transform scale-90 group-hover:scale-110 transition-transform duration-300 shadow-2xl">
                                        <svg class="w-10 h-10 text-white" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM9.555 7.168A1 1 0 008 8v4a1 1 0 001.555.832l3-2a1 1 0 000-1.664l-3-2z" clip-rule="evenodd"></path>
                                        </svg>
                                    </div>
                                </div>
                            </div>

                            {{-- YouTube Badge --}}
                            <div class="absolute top-2 right-2">
                                <div class="bg-white text-[var(--color-mjk-red)] px-2 py-1 rounded-md text-xs font-semibold shadow-md flex items-center gap-1">
                                    <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 24 24"><path d="M23.498 6.186a3.016 3.016 0 0 0-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 0 0 .502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 0 0 2.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 0 0 2.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z"/></svg>
                                    YouTube
                                </div>
                            </div>
                        </div>

                        {{-- Card Content --}}
                        <div class="p-4 flex flex-col flex-grow">
                            {{-- Title --}}
                            <h3 class="text-base font-semibold text-gray-900 dark:text-gray-100 mb-2 line-clamp-2 leading-tight min-h-[2.5rem]">
                                {!! app()->getLocale() === 'ta' ? $video->title_ta : $video->title_en !!}
                            </h3>

                            {{-- Meta Information --}}
                            <div class="flex items-center justify-between text-xs text-gray-500 mt-auto pt-3 border-t border-gray-200">
                                <span class="flex items-center">
                                    <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                    </svg>
                                    {{ $video->event_date ? $video->event_date->format('M j, Y') : $video->created_at->diffForHumans() }}
                                </span>
                                <span class="bg-[var(--color-mjk-red)]/10 text-[var(--color-mjk-red)] px-2 py-0.5 rounded-full text-xs font-medium">
                                    Video
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

            {{-- Pagination --}}
             @if ($videos->hasPages())
            <div class="mt-16 pt-8 border-t border-gray-200 dark:border-gray-700 flex justify-center">
                 {{-- Add Tailwind styling classes if you publish pagination views --}}
                 <div class="pagination-links">
                    {{ $videos->links() }}
                 </div>
            </div>
            @endif

            @else
            {{-- No Videos Found --}}
            <div class="text-center py-24" data-aos="fade-up">
                <div class="max-w-lg mx-auto">
                    <div class="bg-gray-100 p-12 rounded-3xl">
                        {{-- Icon --}}
                        <div class="w-20 h-20 mx-auto mb-8 bg-white rounded-2xl flex items-center justify-center shadow-lg border-2 border-gray-200">
                            <svg class="w-10 h-10 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z"></path>
                            </svg>
                        </div>

                        <h2 class="text-3xl font-extrabold text-gray-900 mb-4">{{ __('site.videos.no_videos') }}</h2>
                        <p class="text-lg text-gray-600 mb-8 leading-relaxed">{{ __('site.press_releases.check_back') }}</p>

                        {{-- Back Home Button --}}
                        <a href="{{ route('home') }}" class="btn-campaign btn-campaign-primary">
                            {{ __('site.footer.back_home') }}
                        </a>
                    </div>
                </div>
            </div>
            @endif
                </div>

                {{-- Right Sidebar --}}
                <aside class="w-full lg:w-1/4 lg:sticky lg:top-4 lg:h-fit space-y-6">
                    {{-- Latest News Widget --}}
                    @if(isset($latestNews) && $latestNews->isNotEmpty())
                    <div class="bg-white dark:bg-gray-800 rounded-lg shadow-md overflow-hidden">
                        <div class="bg-gradient-to-r from-[var(--color-mjk-red)] to-red-700 px-6 py-4">
                            <h3 class="text-lg font-bold text-white flex items-center">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"/>
                                </svg>
                                {{ __('site.menu.latest_news') }}
                            </h3>
                        </div>
                        <div class="p-4 space-y-3">
                            @foreach($latestNews as $news)
                            <a href="{{ route('media.show', $news->slug) }}" class="block group hover:bg-gray-50 dark:hover:bg-gray-700 p-2 rounded-lg transition-colors">
                                <h4 class="text-sm font-semibold text-gray-900 dark:text-gray-100 line-clamp-2 group-hover:text-[var(--color-mjk-red)] dark:group-hover:text-red-400 transition-colors">
                                    {{ app()->getLocale() === 'ta' ? $news->title_ta : $news->title_en }}
                                </h4>
                                <p class="text-xs text-gray-500 dark:text-gray-400 mt-1">
                                    {{ $news->event_date ? $news->event_date->format('M d, Y') : $news->created_at->format('M d, Y') }}
                                </p>
                            </a>
                            @endforeach
                            <a href="{{ route('latest-news') }}" class="block text-center mt-4 px-4 py-2 bg-[var(--color-mjk-red)] hover:bg-red-700 text-white text-sm font-medium rounded-lg transition-colors">
                                {{ __('site.about.learn-more') }} →
                            </a>
                        </div>
                    </div>
                    @endif

                    {{-- Latest Events Widget --}}
                    @if(isset($latestEvents) && $latestEvents->isNotEmpty())
                    <div class="bg-white dark:bg-gray-800 rounded-lg shadow-md overflow-hidden">
                        <div class="bg-gradient-to-r from-[var(--color-mjk-green)] to-green-700 px-6 py-4">
                            <h3 class="text-lg font-bold text-white flex items-center">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                </svg>
                                {{ __('site.home.events') }}
                            </h3>
                        </div>
                        <div class="p-4 space-y-3">
                            @foreach($latestEvents as $event)
                            <a href="{{ route('media.show', $event->slug) }}" class="block group hover:bg-gray-50 dark:hover:bg-gray-700 p-2 rounded-lg transition-colors">
                                <h4 class="text-sm font-semibold text-gray-900 dark:text-gray-100 line-clamp-2 group-hover:text-[var(--color-mjk-green)] dark:group-hover:text-green-400 transition-colors">
                                    {{ app()->getLocale() === 'ta' ? $event->title_ta : $event->title_en }}
                                </h4>
                                <p class="text-xs text-gray-500 dark:text-gray-400 mt-1">
                                    {{ $event->event_date ? $event->event_date->format('M d, Y') : $event->created_at->format('M d, Y') }}
                                </p>
                            </a>
                            @endforeach
                            <a href="{{ route('events') }}" class="block text-center mt-4 px-4 py-2 bg-[var(--color-mjk-green)] hover:bg-green-700 text-white text-sm font-medium rounded-lg transition-colors">
                                {{ __('site.about.learn-more') }} →
                            </a>
                        </div>
                    </div>
                    @endif

                    {{-- Press Releases Widget --}}
                    @if(isset($pressReleases) && $pressReleases->isNotEmpty())
                    <div class="bg-white dark:bg-gray-800 rounded-lg shadow-md overflow-hidden">
                        <div class="bg-gradient-to-r from-[var(--color-mjk-blue)] to-blue-700 px-6 py-4">
                            <h3 class="text-lg font-bold text-white flex items-center">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                                </svg>
                                {{ __('site.menu.press_release') }}
                            </h3>
                        </div>
                        <div class="p-4 space-y-3">
                            @foreach($pressReleases as $press)
                            <a href="{{ route('media.show', $press->slug) }}" class="block group hover:bg-gray-50 dark:hover:bg-gray-700 p-2 rounded-lg transition-colors">
                                <h4 class="text-sm font-semibold text-gray-900 dark:text-gray-100 line-clamp-2 group-hover:text-[var(--color-mjk-blue)] dark:group-hover:text-blue-400 transition-colors">
                                    {{ app()->getLocale() === 'ta' ? $press->title_ta : $press->title_en }}
                                </h4>
                                <p class="text-xs text-gray-500 dark:text-gray-400 mt-1">
                                    {{ $press->event_date ? $press->event_date->format('M d, Y') : $press->created_at->format('M d, Y') }}
                                </p>
                            </a>
                            @endforeach
                            <a href="{{ route('press-releases') }}" class="block text-center mt-4 px-4 py-2 bg-[var(--color-mjk-blue)] hover:bg-blue-700 text-white text-sm font-medium rounded-lg transition-colors">
                                {{ __('site.about.learn-more') }} →
                            </a>
                        </div>
                    </div>
                    @endif

                    {{-- Gallery Widget --}}
                    @if(isset($gallery) && $gallery->isNotEmpty())
                    <div class="bg-white dark:bg-gray-800 rounded-lg shadow-md overflow-hidden">
                        <div class="bg-gradient-to-r from-[var(--color-mjk-green)] to-green-700 px-6 py-4">
                            <h3 class="text-lg font-bold text-white flex items-center">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                </svg>
                                {{ __('site.menu.gallery') }}
                            </h3>
                        </div>
                        <div class="p-4 space-y-3">
                            @foreach($gallery as $item)
                            <a href="{{ route('media.show', $item->slug) }}" class="block group hover:bg-gray-50 dark:hover:bg-gray-700 p-2 rounded-lg transition-colors">
                                <h4 class="text-sm font-semibold text-gray-900 dark:text-gray-100 line-clamp-2 group-hover:text-[var(--color-mjk-green)] dark:group-hover:text-green-400 transition-colors">
                                    {{ app()->getLocale() === 'ta' ? $item->title_ta : $item->title_en }}
                                </h4>
                                <p class="text-xs text-gray-500 dark:text-gray-400 mt-1">
                                    {{ $item->event_date ? $item->event_date->format('M d, Y') : $item->created_at->format('M d, Y') }}
                                </p>
                            </a>
                            @endforeach
                            <a href="{{ route('gallery') }}" class="block text-center mt-4 px-4 py-2 bg-[var(--color-mjk-green)] hover:bg-green-700 text-white text-sm font-medium rounded-lg transition-colors">
                                {{ __('site.about.learn-more') }} →
                            </a>
                        </div>
                    </div>
                    @endif

                    {{-- Quick Links Widget --}}
                    <div class="bg-white dark:bg-gray-800 rounded-lg shadow-md overflow-hidden">
                        <div class="bg-gradient-to-r from-gray-700 to-gray-800 px-6 py-4">
                            <h3 class="text-lg font-bold text-white flex items-center">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1"/>
                                </svg>
                                {{ __('site.footer.quick_links') ?? 'Quick Links' }}
                            </h3>
                        </div>
                        <div class="p-4 space-y-2">
                            <a href="{{ route('latest-news') }}" class="flex items-center justify-between p-3 bg-gray-50 dark:bg-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 rounded-lg transition-colors group">
                                <span class="text-sm font-medium text-gray-700 dark:text-gray-300 group-hover:text-[var(--color-mjk-red)] dark:group-hover:text-red-400">{{ __('site.menu.latest_news') }}</span>
                                <svg class="w-4 h-4 text-gray-400 group-hover:text-[var(--color-mjk-red)] dark:group-hover:text-red-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                                </svg>
                            </a>
                            <a href="{{ route('press-releases') }}" class="flex items-center justify-between p-3 bg-gray-50 dark:bg-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 rounded-lg transition-colors group">
                                <span class="text-sm font-medium text-gray-700 dark:text-gray-300 group-hover:text-[var(--color-mjk-blue)] dark:group-hover:text-blue-400">{{ __('site.menu.press_release') }}</span>
                                <svg class="w-4 h-4 text-gray-400 group-hover:text-[var(--color-mjk-blue)] dark:group-hover:text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                                </svg>
                            </a>
                            <a href="{{ route('events') }}" class="flex items-center justify-between p-3 bg-gray-50 dark:bg-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 rounded-lg transition-colors group">
                                <span class="text-sm font-medium text-gray-700 dark:text-gray-300 group-hover:text-[var(--color-mjk-green)] dark:group-hover:text-green-400">{{ __('site.home.events') }}</span>
                                <svg class="w-4 h-4 text-gray-400 group-hover:text-[var(--color-mjk-green)] dark:group-hover:text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                                </svg>
                            </a>
                            <a href="{{ route('gallery') }}" class="flex items-center justify-between p-3 bg-gray-50 dark:bg-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 rounded-lg transition-colors group">
                                <span class="text-sm font-medium text-gray-700 dark:text-gray-300 group-hover:text-[var(--color-mjk-green)] dark:group-hover:text-green-400">{{ __('site.menu.gallery') }}</span>
                                <svg class="w-4 h-4 text-gray-400 group-hover:text-[var(--color-mjk-green)] dark:group-hover:text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                                </svg>
                            </a>
                            <a href="{{ route('interviews') }}" class="flex items-center justify-between p-3 bg-gray-50 dark:bg-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 rounded-lg transition-colors group">
                                <span class="text-sm font-medium text-gray-700 dark:text-gray-300 group-hover:text-[var(--color-mjk-orange)] dark:group-hover:text-orange-400">{{ __('site.menu.interviews') }}</span>
                                <svg class="w-4 h-4 text-gray-400 group-hover:text-[var(--color-mjk-orange)] dark:group-hover:text-orange-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                                </svg>
                            </a>
                        </div>
                    </div>
                </aside>
            </div>
        </div>
    </section>

    {{-- Modal for video playback --}}
    <div id="video-modal" class="fixed inset-0 bg-black/80 hidden z-50 flex items-center justify-center p-4">
        {{-- Modal Content Container --}}
        <div class="relative w-full max-w-4xl mx-auto bg-black rounded-lg shadow-2xl">
             {{-- Close Button --}}
            <button id="close-modal" class="absolute -top-4 -right-4 md:top-0 md:-right-10 text-white hover:text-gray-300 transition-colors z-50 p-2 rounded-full bg-black/50 hover:bg-black/70" aria-label="Close video">
                 <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
            </button>
            {{-- Iframe Wrapper --}}
            <div class="aspect-video">
                <iframe id="video-iframe" class="w-full h-full rounded-lg" src="" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen referrerpolicy="strict-origin-when-cross-origin"></iframe>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
{{-- Keep existing modal script --}}
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const thumbnails = document.querySelectorAll('.video-thumbnail');
        const modal = document.getElementById('video-modal');
        const iframe = document.getElementById('video-iframe');
        const closeModalBtn = document.getElementById('close-modal'); // Use the button ID

        function openModal(videoId) {
            if (videoId) {
                // Build embed URL with all required parameters to prevent Error 153
                let origin = window.location.origin;
                // Remove port if it's a standard port (YouTube doesn't need it)
                try {
                    const url = new URL(origin);
                    if ((url.protocol === 'https:' && url.port === '443') || 
                        (url.protocol === 'http:' && url.port === '80') ||
                        !url.port) {
                        origin = `${url.protocol}//${url.hostname}`;
                    }
                } catch (e) {
                    // Fallback to original origin if URL parsing fails
                }
                const embedUrl = `https://www.youtube.com/embed/${videoId}?autoplay=1&rel=0&modestbranding=1&enablejsapi=1&origin=${encodeURIComponent(origin)}&widget_referrer=${encodeURIComponent(origin)}`;
                iframe.src = embedUrl;
                modal.classList.remove('hidden');
                modal.classList.add('flex'); // Use flex for centering
                // Apply enter animation class
                modal.classList.remove('animate-modalOut');
                modal.classList.add('animate-modalIn');
            }
        }

        function closeModal() {
             // Apply leave animation class
             modal.classList.remove('animate-modalIn');
             modal.classList.add('animate-modalOut');

             // Wait for animation to finish before hiding and clearing src
             setTimeout(() => {
                modal.classList.add('hidden');
                modal.classList.remove('flex', 'animate-modalOut'); // Clean up classes
                iframe.src = ''; // Stop video playback
            }, 300); // Duration should match animation duration
        }

        thumbnails.forEach(thumbnail => {
            thumbnail.addEventListener('click', function() {
                const videoId = this.getAttribute('data-video-id');
                openModal(videoId);
            });
        });

        // Close modal via button
        closeModalBtn.addEventListener('click', closeModal);

        // Close modal by clicking outside the video container
        modal.addEventListener('click', function(e) {
            // Check if the click is directly on the modal backdrop (not the iframe container)
            if (e.target === modal) {
                closeModal();
            }
        });

         // Close modal with Escape key
         document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape' && !modal.classList.contains('hidden')) {
                closeModal();
            }
        });
    });
</script>

{{-- Keep existing animation styles --}}
<style>
    .animate-modalIn {
        animation: modalIn 0.3s ease-out forwards;
    }
    .animate-modalOut {
        animation: modalOut 0.3s ease-in forwards;
    }
    @keyframes modalIn {
        from { opacity: 0; transform: scale(0.95); }
        to { opacity: 1; transform: scale(1); }
    }
    @keyframes modalOut {
        from { opacity: 1; transform: scale(1); }
        to { opacity: 0; transform: scale(0.95); }
    }
    /* Basic styling for default Laravel pagination */
    .pagination-links nav[role="navigation"] > div:first-child { display: none; }
    .pagination-links nav[role="navigation"] > div:last-child { display: flex; justify-content: center;}
    .pagination-links nav span > span, .pagination-links nav a { @apply inline-flex items-center justify-center px-4 py-2 mx-1 text-sm font-medium border rounded-md transition-colors duration-150; }
    .pagination-links nav span > span { @apply bg-red-600 border-red-600 text-white z-10; }
    .pagination-links nav span[aria-disabled="true"] > span { @apply bg-gray-100 border-gray-300 text-gray-400 cursor-not-allowed dark:bg-gray-700 dark:border-gray-600 dark:text-gray-500; }
    .pagination-links nav a { @apply bg-white border-gray-300 text-gray-700 hover:bg-gray-50 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-300 dark:hover:bg-gray-700; }
</style>
@endpush