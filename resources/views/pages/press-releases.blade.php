@extends('layouts.app')

@section('title', __('site.press_releases.title'))

@section('content')
@php
use Illuminate\Support\Facades\Storage;
@endphp

{{-- Campaign Hero Section --}}
<section class="bg-gradient-to-br from-[var(--color-mjk-red)] via-[var(--color-mjk-red)] to-[var(--color-mjk-blue)] py-20">
    <div class="max-w-7xl mx-auto px-4 text-center" data-aos="fade-up">
        <h1 class="text-5xl md:text-6xl font-extrabold text-white mb-6">
            {{ __('site.press_releases.title') }}
        </h1>
        <p class="text-xl md:text-2xl text-white/90 max-w-3xl mx-auto">
            {{ __('site.press_releases.subtitle') }}
        </p>
    </div>
</section>

{{-- Press Releases Content --}}
<section class="py-12 lg:py-16 px-4 bg-gray-50">
        <div class="max-w-7xl mx-auto">
            <div class="flex flex-col lg:flex-row gap-8">
                {{-- Main Press Releases Content --}}
                <div class="flex-1 lg:w-3/4">
            @if($press_releases->isNotEmpty())
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 lg:gap-6">
                @foreach($press_releases as $index => $press_release)
                @php
                    $delay = ($index % 3) * 100;
                @endphp
                {{-- Press Release Card --}}
                <div class="card-campaign" data-aos="fade-up" data-aos-delay="{{ $delay }}">
                    <div class="overflow-hidden flex flex-col h-full">
                        {{-- Featured Image --}}
                        <div class="relative h-48 overflow-hidden bg-gray-100 dark:bg-gray-700">
                            <a href="{{ route('media.show', $press_release->slug) }}" class="block w-full h-full">
                                <img src="{{ $press_release->featured_image_url }}" alt="{{ app()->getLocale() === 'ta' ? $press_release->title_ta : $press_release->title_en }}" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110">
                            </a>

                            {{-- Event Date Badge --}}
                            @if($press_release->event_date)
                            <div class="absolute top-2 right-2">
                                <div class="bg-white text-[var(--color-mjk-blue)] px-2 py-1 rounded-md text-xs font-semibold shadow-md">
                                    {{ $press_release->event_date->format('M j') }}
                                </div>
                            </div>
                            @endif

                            {{-- Gradient Overlay on Hover --}}
                            <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                        </div>

                        {{-- Card Content --}}
                        <div class="p-4 flex flex-col flex-grow">
                            {{-- Title --}}
                            <h3 class="text-base font-semibold text-gray-900 mb-2 line-clamp-2 leading-tight min-h-[2.5rem]">
                                 <a href="{{ route('media.show', $press_release->slug) }}" class="hover:text-[var(--color-mjk-blue)] transition-colors duration-200">
                                    {!! app()->getLocale() === 'ta' ? $press_release->title_ta : $press_release->title_en !!}
                                 </a>
                            </h3>

                            {{-- Description/Excerpt --}}
                            @if(app()->getLocale() === 'ta' ? $press_release->content_ta : $press_release->content_en)
                            <p class="text-gray-600 text-xs mb-3 line-clamp-2 flex-grow leading-relaxed">
                                {!! Str::limit(strip_tags(app()->getLocale() === 'ta' ? $press_release->content_ta : $press_release->content_en), 80) !!}
                            </p>
                            @endif

                            {{-- Meta Information --}}
                            <div class="flex items-center justify-between text-xs text-gray-500 mt-auto pt-3 border-t border-gray-200">
                                <span class="flex items-center">
                                    <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                    </svg>
                                    {{ $press_release->created_at->diffForHumans() }}
                                </span>
                                <span class="bg-[var(--color-mjk-blue)]/10 text-[var(--color-mjk-blue)] px-2 py-0.5 rounded-full text-xs font-medium">
                                    {{ $press_release->category->name ?? 'Press Release' }}
                                </span>
                            </div>

                             {{-- Action Button --}}
                            <div class="mt-3">
                                <a href="{{ route('media.show', $press_release->slug) }}" class="block text-center bg-[var(--color-mjk-blue)] hover:bg-blue-700 text-white px-3 py-2 rounded-md text-xs font-medium transition-colors duration-200">
                                    {{ __('site.about.learn-more') }}
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

            {{-- Pagination --}}
             @if ($press_releases->hasPages())
            <div class="mt-16 pt-8 border-t border-gray-200 dark:border-gray-700 flex justify-center">
                 <div class="pagination-links">
                    {{ $press_releases->links() }}
                 </div>
            </div>
            @endif

            @else
            {{-- No Releases Found --}}
            <div class="text-center py-24" data-aos="fade-up">
                <div class="max-w-lg mx-auto">
                    <div class="bg-gray-100 p-12 rounded-3xl">
                        {{-- Icon --}}
                        <div class="w-20 h-20 mx-auto mb-8 bg-white rounded-2xl flex items-center justify-center shadow-lg border-2 border-gray-200">
                            <svg class="w-10 h-10 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                            </svg>
                        </div>

                        <h2 class="text-3xl font-extrabold text-gray-900 mb-4">{{ __('site.press_releases.no_releases') }}</h2>
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

                    {{-- Latest Videos Widget --}}
                    @if(isset($latestVideos) && $latestVideos->isNotEmpty())
                    <div class="bg-white dark:bg-gray-800 rounded-lg shadow-md overflow-hidden">
                        <div class="bg-gradient-to-r from-[var(--color-mjk-red)] to-red-700 px-6 py-4">
                            <h3 class="text-lg font-bold text-white flex items-center">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z"/>
                                </svg>
                                {{ __('site.menu.videos') }}
                            </h3>
                        </div>
                        <div class="p-4 space-y-3">
                            @foreach($latestVideos as $video)
                            <a href="{{ route('media.show', $video->slug) }}" class="block group hover:bg-gray-50 dark:hover:bg-gray-700 p-2 rounded-lg transition-colors">
                                <h4 class="text-sm font-semibold text-gray-900 dark:text-gray-100 line-clamp-2 group-hover:text-[var(--color-mjk-red)] dark:group-hover:text-red-400 transition-colors">
                                    {{ app()->getLocale() === 'ta' ? $video->title_ta : $video->title_en }}
                                </h4>
                                <p class="text-xs text-gray-500 dark:text-gray-400 mt-1">
                                    {{ $video->event_date ? $video->event_date->format('M d, Y') : $video->created_at->format('M d, Y') }}
                                </p>
                            </a>
                            @endforeach
                            <a href="{{ route('videos') }}" class="block text-center mt-4 px-4 py-2 bg-[var(--color-mjk-red)] hover:bg-red-700 text-white text-sm font-medium rounded-lg transition-colors">
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
                                <span class="text-sm font-medium text-gray-700 dark:text-gray-300 group-hover:text-[var(--color-mjk-blue)] dark:group-hover:text-purple-400">{{ __('site.menu.press_release') }}</span>
                                <svg class="w-4 h-4 text-gray-400 group-hover:text-[var(--color-mjk-blue)] dark:group-hover:text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                                </svg>
                            </a>
                            <a href="{{ route('events') }}" class="flex items-center justify-between p-3 bg-gray-50 dark:bg-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 rounded-lg transition-colors group">
                                <span class="text-sm font-medium text-gray-700 dark:text-gray-300 group-hover:text-[var(--color-mjk-green)] dark:group-hover:text-green-400">{{ __('site.home.events') }}</span>
                                <svg class="w-4 h-4 text-gray-400 group-hover:text-[var(--color-mjk-green)] dark:group-hover:text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                                </svg>
                            </a>
                            <a href="{{ route('videos') }}" class="flex items-center justify-between p-3 bg-gray-50 dark:bg-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 rounded-lg transition-colors group">
                                <span class="text-sm font-medium text-gray-700 dark:text-gray-300 group-hover:text-[var(--color-mjk-red)] dark:group-hover:text-red-400">{{ __('site.menu.videos') }}</span>
                                <svg class="w-4 h-4 text-gray-400 group-hover:text-[var(--color-mjk-red)] dark:group-hover:text-red-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                                </svg>
                            </a>
                            <a href="{{ route('gallery') }}" class="flex items-center justify-between p-3 bg-gray-50 dark:bg-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 rounded-lg transition-colors group">
                                <span class="text-sm font-medium text-gray-700 dark:text-gray-300 group-hover:text-[var(--color-mjk-green)] dark:group-hover:text-green-400">{{ __('site.menu.gallery') }}</span>
                                <svg class="w-4 h-4 text-gray-400 group-hover:text-[var(--color-mjk-green)] dark:group-hover:text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                                </svg>
                            </a>
                        </div>
                    </div>
                </aside>
            </div>
        </div>
    </section>
@endsection