@extends('layouts.app')

@section('title', __('site.menu.interviews'))

@section('content')
@php
use Illuminate\Support\Facades\Storage;
@endphp
    {{-- Page Header --}}
    <x-page-header-simple
        :title="__('site.menu.interviews')"
        :subtitle="__('site.home.interviews-title-description')"
    />

    {{-- Interviews Content --}}
    <section class="py-12 lg:py-16 px-4 bg-gray-50 dark:bg-gray-900">
        <div class="max-w-7xl mx-auto">
            <div class="flex flex-col lg:flex-row gap-8">
                {{-- Main Interviews Content --}}
                <div class="flex-1 lg:w-3/4">
            @if($interviews->isNotEmpty())
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 lg:gap-6">
                @foreach($interviews as $index => $interview)
                @php
                    $delay = ($index % 3) * 100;
                @endphp
                {{-- Interview Card with Gradient Border --}}
                <div class="group relative" data-aos="fade-up" data-aos-delay="{{ $delay }}">
                    {{-- Animated Gradient Border --}}
                    <div class="absolute -inset-0.5 bg-gradient-to-r from-orange-500 to-amber-500 rounded-3xl opacity-0 group-hover:opacity-100 blur transition duration-500"></div>

                    {{-- Card Content --}}
                    <div class="relative bg-white dark:bg-gray-800 rounded-lg overflow-hidden transition-all duration-300 hover:shadow-xl hover:-translate-y-1 flex flex-col h-full border border-gray-200 dark:border-gray-700">
                        {{-- Featured Image --}}
                        <div class="relative h-48 overflow-hidden bg-gray-100 dark:bg-gray-700">
                             <a href="{{ route('media.show', $interview->slug) }}" class="block w-full h-full">
                                <img src="{{ $interview->featured_image_url }}" alt="{{ app()->getLocale() === 'ta' ? $interview->title_ta : $interview->title_en }}" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110">
                            </a>

                            {{-- Event Date Badge --}}
                            @if($interview->event_date)
                            <div class="absolute top-2 right-2">
                                <div class="bg-white dark:bg-gray-900 text-orange-700 dark:text-orange-300 px-2 py-1 rounded-md text-xs font-semibold shadow-md">
                                    {{ $interview->event_date->format('M j') }}
                                </div>
                             </div>
                            @endif

                            {{-- Gradient Overlay on Hover --}}
                            <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                        </div>

                        {{-- Card Content --}}
                        <div class="p-4 flex flex-col flex-grow bg-white dark:bg-gray-800">
                            {{-- Title --}}
                            <h3 class="text-base font-semibold text-gray-900 dark:text-gray-100 mb-2 line-clamp-2 leading-tight min-h-[2.5rem]">
                                 <a href="{{ route('media.show', $interview->slug) }}" class="hover:text-orange-600 dark:hover:text-orange-400 transition-colors duration-200">
                                    {!! app()->getLocale() === 'ta' ? $interview->title_ta : $interview->title_en !!}
                                </a>
                            </h3>

                            {{-- Description/Excerpt (Optional) --}}
                            @if(app()->getLocale() === 'ta' ? $interview->content_ta : $interview->content_en)
                            <p class="text-gray-600 dark:text-gray-300 text-xs mb-3 line-clamp-2 flex-grow leading-relaxed">
                                {!! Str::limit(strip_tags(app()->getLocale() === 'ta' ? $interview->content_ta : $interview->content_en), 80) !!}
                            </p>
                            @endif

                            {{-- Meta Information --}}
                            <div class="flex items-center justify-between text-xs text-gray-500 dark:text-gray-400 mt-auto pt-3 border-t border-gray-200 dark:border-gray-700">
                                <span class="flex items-center">
                                    <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                    </svg>
                                    {{ $interview->created_at->diffForHumans() }}
                                </span>
                                <span class="bg-orange-100 dark:bg-orange-900/30 text-orange-700 dark:text-orange-300 px-2 py-0.5 rounded-full text-xs font-medium">
                                    {{ $interview->category->name ?? 'Interview' }}
                                </span>
                            </div>

                             {{-- Action Buttons --}}
                            <div class="mt-3 flex items-center gap-2">
                                <a href="{{ route('media.show', $interview->slug) }}" class="flex-1 inline-flex items-center justify-center bg-orange-600 hover:bg-orange-700 text-white px-3 py-2 rounded-md text-xs font-medium transition-colors duration-200">
                                    {{ __('site.about.learn-more') }}
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

            {{-- Pagination --}}
            @if ($interviews->hasPages())
            <div class="mt-16 pt-8 border-t border-gray-200 dark:border-gray-700 flex justify-center">
                 <div class="pagination-links">
                    {{ $interviews->links() }}
                 </div>
            </div>
            @endif

            @else
            {{-- No Interviews Found --}}
            <div class="text-center py-24" data-aos="fade-up">
                <div class="max-w-lg mx-auto relative group">
                    {{-- Animated Gradient Border --}}
                    <div class="absolute -inset-0.5 bg-gradient-to-r from-yellow-500 to-amber-500 rounded-3xl opacity-50 blur transition duration-500"></div>

                    {{-- Content Card --}}
                    <div class="relative bg-gradient-to-br from-yellow-50 to-amber-50 dark:from-yellow-950/30 dark:to-amber-950/30 p-12 rounded-3xl border border-yellow-200 dark:border-yellow-800">
                        {{-- Icon with Gradient Background --}}
                        <div class="relative w-20 h-20 mx-auto mb-8">
                            <div class="absolute inset-0 bg-gradient-to-br from-yellow-500 to-amber-500 rounded-2xl opacity-20"></div>
                            <div class="relative w-20 h-20 bg-white dark:bg-gray-900 rounded-2xl flex items-center justify-center shadow-lg border-2 border-yellow-200 dark:border-yellow-700">
                                <svg class="w-10 h-10 text-yellow-600 dark:text-yellow-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 11a7 7 0 01-7 7m0 0a7 7 0 01-7-7m7 7v4m0 0H8m4 0h4m-4-8a3 3 0 01-3-3V5a3 3 0 116 0v6a3 3 0 01-3 3z"></path>
                                </svg>
                            </div>
                        </div>

                        <h2 class="text-3xl font-extrabold text-yellow-900 dark:text-yellow-100 mb-4">{{ __('site.interviews.no_interviews') }}</h2>
                        <p class="text-lg text-yellow-700/80 dark:text-yellow-200/70 mb-8 leading-relaxed">{{ __('site.press_releases.check_back') }}</p>

                        {{-- Back Home Button --}}
                        <div class="relative inline-block group/btn">
                            <div class="absolute -inset-0.5 bg-gradient-to-r from-yellow-500 to-amber-500 rounded-xl opacity-75 group-hover/btn:opacity-100 blur transition duration-300"></div>
                            <a href="{{ route('home') }}" class="relative inline-block bg-gradient-to-r from-yellow-600 to-amber-600 text-white px-8 py-3 rounded-xl font-semibold transition-all duration-300 transform hover:scale-105 shadow-lg hover:shadow-2xl">
                                {{ __('site.footer.back_home') }}
                            </a>
                        </div>
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
                        <div class="bg-gradient-to-r from-blue-600 to-blue-700 px-6 py-4">
                            <h3 class="text-lg font-bold text-blue-500 flex items-center">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"/>
                                </svg>
                                {{ __('site.menu.latest_news') }}
                            </h3>
                        </div>
                        <div class="p-4 space-y-3">
                            @foreach($latestNews as $news)
                            <a href="{{ route('media.show', $news->slug) }}" class="block group hover:bg-gray-50 dark:hover:bg-gray-700 p-2 rounded-lg transition-colors">
                                <h4 class="text-sm font-semibold text-gray-900 dark:text-gray-100 line-clamp-2 group-hover:text-blue-600 dark:group-hover:text-blue-400 transition-colors">
                                    {{ app()->getLocale() === 'ta' ? $news->title_ta : $news->title_en }}
                                </h4>
                                <p class="text-xs text-gray-500 dark:text-gray-400 mt-1">
                                    {{ $news->event_date ? $news->event_date->format('M d, Y') : $news->created_at->format('M d, Y') }}
                                </p>
                            </a>
                            @endforeach
                            <a href="{{ route('latest-news') }}" class="block text-center mt-4 px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white text-sm font-medium rounded-lg transition-colors">
                                {{ __('site.about.learn-more') }} →
                            </a>
                        </div>
                    </div>
                    @endif

                    {{-- Latest Events Widget --}}
                    @if(isset($latestEvents) && $latestEvents->isNotEmpty())
                    <div class="bg-white dark:bg-gray-800 rounded-lg shadow-md overflow-hidden">
                        <div class="bg-gradient-to-r from-green-600 to-green-700 px-6 py-4">
                            <h3 class="text-lg font-bold text-green-500 flex items-center">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                </svg>
                                {{ __('site.home.events') }}
                            </h3>
                        </div>
                        <div class="p-4 space-y-3">
                            @foreach($latestEvents as $event)
                            <a href="{{ route('media.show', $event->slug) }}" class="block group hover:bg-gray-50 dark:hover:bg-gray-700 p-2 rounded-lg transition-colors">
                                <h4 class="text-sm font-semibold text-gray-900 dark:text-gray-100 line-clamp-2 group-hover:text-green-600 dark:group-hover:text-green-400 transition-colors">
                                    {{ app()->getLocale() === 'ta' ? $event->title_ta : $event->title_en }}
                                </h4>
                                <p class="text-xs text-gray-500 dark:text-gray-400 mt-1">
                                    {{ $event->event_date ? $event->event_date->format('M d, Y') : $event->created_at->format('M d, Y') }}
                                </p>
                            </a>
                            @endforeach
                            <a href="{{ route('events') }}" class="block text-center mt-4 px-4 py-2 bg-green-600 hover:bg-green-700 text-white text-sm font-medium rounded-lg transition-colors">
                                {{ __('site.about.learn-more') }} →
                            </a>
                        </div>
                    </div>
                    @endif

                    {{-- Latest Videos Widget --}}
                    @if(isset($latestVideos) && $latestVideos->isNotEmpty())
                    <div class="bg-white dark:bg-gray-800 rounded-lg shadow-md overflow-hidden">
                        <div class="bg-gradient-to-r from-red-600 to-red-700 px-6 py-4">
                            <h3 class="text-lg font-bold text-red-500 flex items-center">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z"/>
                                </svg>
                                {{ __('site.menu.videos') }}
                            </h3>
                        </div>
                        <div class="p-4 space-y-3">
                            @foreach($latestVideos as $video)
                            <a href="{{ route('media.show', $video->slug) }}" class="block group hover:bg-gray-50 dark:hover:bg-gray-700 p-2 rounded-lg transition-colors">
                                <h4 class="text-sm font-semibold text-gray-900 dark:text-gray-100 line-clamp-2 group-hover:text-red-600 dark:group-hover:text-red-400 transition-colors">
                                    {{ app()->getLocale() === 'ta' ? $video->title_ta : $video->title_en }}
                                </h4>
                                <p class="text-xs text-gray-500 dark:text-gray-400 mt-1">
                                    {{ $video->event_date ? $video->event_date->format('M d, Y') : $video->created_at->format('M d, Y') }}
                                </p>
                            </a>
                            @endforeach
                            <a href="{{ route('videos') }}" class="block text-center mt-4 px-4 py-2 bg-red-600 hover:bg-red-700 text-white text-sm font-medium rounded-lg transition-colors">
                                {{ __('site.about.learn-more') }} →
                            </a>
                        </div>
                    </div>
                    @endif

                    {{-- Press Releases Widget --}}
                    @if(isset($pressReleases) && $pressReleases->isNotEmpty())
                    <div class="bg-white dark:bg-gray-800 rounded-lg shadow-md overflow-hidden">
                        <div class="bg-gradient-to-r from-purple-600 to-purple-700 px-6 py-4">
                            <h3 class="text-lg font-bold text-purple-500 flex items-center">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                                </svg>
                                {{ __('site.menu.press_release') }}
                            </h3>
                        </div>
                        <div class="p-4 space-y-3">
                            @foreach($pressReleases as $press)
                            <a href="{{ route('media.show', $press->slug) }}" class="block group hover:bg-gray-50 dark:hover:bg-gray-700 p-2 rounded-lg transition-colors">
                                <h4 class="text-sm font-semibold text-gray-900 dark:text-gray-100 line-clamp-2 group-hover:text-purple-600 dark:group-hover:text-purple-400 transition-colors">
                                    {{ app()->getLocale() === 'ta' ? $press->title_ta : $press->title_en }}
                                </h4>
                                <p class="text-xs text-gray-500 dark:text-gray-400 mt-1">
                                    {{ $press->event_date ? $press->event_date->format('M d, Y') : $press->created_at->format('M d, Y') }}
                                </p>
                            </a>
                            @endforeach
                            <a href="{{ route('press-releases') }}" class="block text-center mt-4 px-4 py-2 bg-purple-600 hover:bg-purple-700 text-white text-sm font-medium rounded-lg transition-colors">
                                {{ __('site.about.learn-more') }} →
                            </a>
                        </div>
                    </div>
                    @endif

                    {{-- Quick Links Widget --}}
                    <div class="bg-white dark:bg-gray-800 rounded-lg shadow-md overflow-hidden">
                        <div class="bg-gradient-to-r from-gray-700 to-gray-800 px-6 py-4">
                            <h3 class="text-lg font-bold text-gray-600 flex items-center">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1"/>
                                </svg>
                                {{ __('site.footer.quick_links') ?? 'Quick Links' }}
                            </h3>
                        </div>
                        <div class="p-4 space-y-2">
                            <a href="{{ route('latest-news') }}" class="flex items-center justify-between p-3 bg-gray-50 dark:bg-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 rounded-lg transition-colors group">
                                <span class="text-sm font-medium text-gray-700 dark:text-gray-300 group-hover:text-blue-600 dark:group-hover:text-blue-400">{{ __('site.menu.latest_news') }}</span>
                                <svg class="w-4 h-4 text-gray-400 group-hover:text-blue-600 dark:group-hover:text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                                </svg>
                            </a>
                            <a href="{{ route('press-releases') }}" class="flex items-center justify-between p-3 bg-gray-50 dark:bg-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 rounded-lg transition-colors group">
                                <span class="text-sm font-medium text-gray-700 dark:text-gray-300 group-hover:text-purple-600 dark:group-hover:text-purple-400">{{ __('site.menu.press_release') }}</span>
                                <svg class="w-4 h-4 text-gray-400 group-hover:text-purple-600 dark:group-hover:text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                                </svg>
                            </a>
                            <a href="{{ route('events') }}" class="flex items-center justify-between p-3 bg-gray-50 dark:bg-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 rounded-lg transition-colors group">
                                <span class="text-sm font-medium text-gray-700 dark:text-gray-300 group-hover:text-green-600 dark:group-hover:text-green-400">{{ __('site.home.events') }}</span>
                                <svg class="w-4 h-4 text-gray-400 group-hover:text-green-600 dark:group-hover:text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                                </svg>
                            </a>
                            <a href="{{ route('videos') }}" class="flex items-center justify-between p-3 bg-gray-50 dark:bg-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 rounded-lg transition-colors group">
                                <span class="text-sm font-medium text-gray-700 dark:text-gray-300 group-hover:text-red-600 dark:group-hover:text-red-400">{{ __('site.menu.videos') }}</span>
                                <svg class="w-4 h-4 text-gray-400 group-hover:text-red-600 dark:group-hover:text-red-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                                </svg>
                            </a>
                            <a href="{{ route('interviews') }}" class="flex items-center justify-between p-3 bg-gray-50 dark:bg-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 rounded-lg transition-colors group">
                                <span class="text-sm font-medium text-gray-700 dark:text-gray-300 group-hover:text-orange-600 dark:group-hover:text-orange-400">{{ __('site.menu.interviews') }}</span>
                                <svg class="w-4 h-4 text-gray-400 group-hover:text-orange-600 dark:group-hover:text-orange-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
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
