@extends('layouts.app')

@section('title', app()->getLocale() === 'ta' ? $mediaItem->title_ta : $mediaItem->title_en)

@section('content')
@php
use Illuminate\Support\Facades\Storage;
@endphp
    {{-- Main Content Section --}}
    <section class="py-12 lg:py-16 px-4 bg-gray-50 dark:bg-gray-900">
        <div class="max-w-7xl mx-auto">
            <div class="flex flex-col lg:flex-row gap-8">
                {{-- Main Content --}}
                <div class="flex-1 lg:w-3/4">
                    {{-- Article Header --}}
                    <div class="mb-8" data-aos="fade-up">
                        <div class="flex items-start justify-between gap-4 mb-4">
                            <h1 class="text-3xl md:text-4xl lg:text-5xl font-extrabold text-gray-900 dark:text-white leading-tight flex-1">
                                {{ app()->getLocale() === 'ta' ? $mediaItem->title_ta : $mediaItem->title_en }}
                            </h1>

                            {{-- Text-to-Speech Button --}}
                            <button onclick="window.ttsPlayer && window.ttsPlayer.play()"
                                    class="group relative flex-shrink-0 bg-gradient-to-r from-red-600 to-red-700 hover:from-red-700 hover:to-red-800 text-white p-3 rounded-full shadow-lg hover:shadow-xl transition-all transform hover:scale-105"
                                    title="{{ app()->getLocale() === 'ta' ? 'கட்டுரையைக் கேளுங்கள்' : 'Listen to Article' }}">
                                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M18 3a1 1 0 00-1.196-.98l-10 2A1 1 0 006 5v9.114A4.369 4.369 0 005 14c-1.657 0-3 .895-3 2s1.343 2 3 2 3-.895 3-2V7.82l8-1.6v5.894A4.37 4.37 0 0015 12c-1.657 0-3 .895-3 2s1.343 2 3 2 3-.895 3-2V3z"/>
                                </svg>
                                {{-- Tooltip --}}
                                <span class="absolute -bottom-10 left-1/2 transform -translate-x-1/2 bg-gray-900 text-white text-xs px-3 py-1 rounded opacity-0 group-hover:opacity-100 transition-opacity whitespace-nowrap pointer-events-none">
                                    {{ app()->getLocale() === 'ta' ? 'கேளுங்கள்' : 'Listen' }}
                                </span>
                            </button>
                        </div>

                        {{-- Meta Information --}}
                        <div class="flex flex-wrap items-center gap-4 text-sm text-gray-600 dark:text-gray-400 mb-6">
                            @if($mediaItem->category)
                            <span class="bg-red-100 dark:bg-red-900/30 text-red-600 dark:text-red-400 px-3 py-1 rounded-full text-sm font-medium">
                                {{ $mediaItem->category->name ?? 'News' }}
                            </span>
                            @endif
                            <span class="flex items-center">
                                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                                {{ $mediaItem->created_at->diffForHumans() }}
                            </span>
                            @if($mediaItem->event_date)
                            <span class="flex items-center">
                                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                </svg>
                                {{ $mediaItem->event_date->format('F j, Y') }}
                            </span>
                            @endif
                        </div>
                    </div>

                    {{-- Article Content --}}
                    @if(app()->getLocale() === 'ta' ? $mediaItem->content_ta : $mediaItem->content_en)
                    <div class="prose prose-lg max-w-none dark:prose-invert mb-8" data-aos="fade-up" data-aos-delay="200">
                        <div class="text-gray-700 dark:text-gray-300 leading-relaxed">
                            {!! app()->getLocale() === 'ta' ? $mediaItem->content_ta : $mediaItem->content_en !!}
                        </div>
                    </div>
                    @endif

                    {{-- Video Section --}}
                    @if($mediaItem->video_link)
                    @php
                        // Ensure embed URL is generated with all required parameters
                        $embedUrl = $mediaItem->video_embed_url;
                    @endphp
                    @if($embedUrl)
                    <div class="mb-12" data-aos="fade-up" data-aos-delay="300">
                        <h3 class="text-2xl font-bold text-gray-900 dark:text-white mb-6 flex items-center">
                            <svg class="w-6 h-6 mr-2 text-red-600 dark:text-red-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z"/>
                            </svg>
                            {{ __('site.menu.videos') }}
                        </h3>
                        <div class="relative group overflow-hidden rounded-2xl shadow-xl">
                            <div class="absolute -inset-0.5 bg-gradient-to-r from-red-500 to-pink-500 rounded-2xl opacity-0 group-hover:opacity-100 blur transition duration-500"></div>
                            <div class="relative bg-gray-100 dark:bg-gray-800 rounded-2xl overflow-hidden">
                                <iframe
                                    src="{!! $embedUrl !!}"
                                    class="w-full"
                                    height="auto"
                                    style="aspect-ratio: 16/9; min-height: 400px;"
                                    referrerpolicy="strict-origin-when-cross-origin"
                                    frameborder="0"
                                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                    allowfullscreen
                                    loading="lazy"
                                    title="{{ app()->getLocale() === 'ta' ? $mediaItem->title_ta : $mediaItem->title_en }}"
                                ></iframe>
                            </div>
                        </div>
                    </div>
                    @endif
                    @endif

                    {{-- More Photos Gallery --}}
                    @if($mediaItem->more_photos && count($mediaItem->more_photos) > 0)
                    <div class="mb-12" data-aos="fade-up" data-aos-delay="400">
                        <h3 class="text-2xl font-bold text-gray-900 dark:text-white mb-6 flex items-center">
                            <svg class="w-6 h-6 mr-2 text-green-600 dark:text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                            </svg>
                            {{ __('site.gallery.title') }}
                        </h3>
                        <div class="masonry-grid columns-1 md:columns-2 lg:columns-3 xl:columns-4 gap-4 space-y-4">
                            @foreach($mediaItem->more_photos as $index => $photo)
                                @php
                                    $photoUrl = $mediaItem->getPhotoUrl($photo);
                                @endphp
                                <div class="gallery-item group relative overflow-hidden rounded-lg shadow-md hover:shadow-xl transition-all duration-300 cursor-pointer animate-fadeInUp break-inside-avoid"
                                     style="animation-delay: {{ $index * 0.1 }}s"
                                     data-index="{{ $index }}"
                                     data-image="{{ $photoUrl }}"
                                     data-title="{{ app()->getLocale() === 'ta' ? $mediaItem->title_ta : $mediaItem->title_en }} - Photo {{ $index + 1 }}">
                                    <div class="absolute -inset-0.5 bg-gradient-to-r from-green-500 to-emerald-500 rounded-lg opacity-0 group-hover:opacity-100 blur transition duration-500"></div>
                                    <div class="relative">
                                        <img src="{{ $photoUrl }}" alt="Media Photo {{ $index + 1 }}" class="w-full object-cover rounded-lg group-hover:scale-105 transition-transform duration-300">
                                        <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-all duration-300 flex items-end">
                                            <div class="p-4 text-white">
                                                <div class="flex items-center justify-between">
                                                    <span class="text-sm font-medium">Photo {{ $index + 1 }}</span>
                                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0zM10 7v3m0 0v3m0-3h3m-3 0H7"/>
                                                    </svg>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    @endif

                    {{-- Social Share --}}
                    <div class="border-t border-gray-200 dark:border-gray-700 pt-8 mt-12" data-aos="fade-up" data-aos-delay="500">
                        <h4 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">{{ __('site.footer.follow_us') }}</h4>
                        <div class="flex flex-wrap gap-4">
                            <a href="https://www.facebook.com/sharer/sharer.php?u={{ url()->current() }}"
                               target="_blank"
                               rel="noopener noreferrer"
                               class="group relative bg-blue-600 text-white p-3 rounded-full hover:bg-blue-700 transition-colors duration-200">
                                <div class="absolute -inset-0.5 bg-gradient-to-r from-blue-500 to-blue-700 rounded-full opacity-0 group-hover:opacity-100 blur transition duration-300"></div>
                                <svg class="w-5 h-5 relative z-10" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z"/>
                                </svg>
                            </a>
                            <a href="https://twitter.com/intent/tweet?url={{ url()->current() }}&text={{ urlencode((app()->getLocale() === 'ta' ? $mediaItem->title_ta : $mediaItem->title_en) . ' ' . url()->current()) }}"
                               target="_blank"
                               rel="noopener noreferrer"
                               class="group relative bg-blue-400 text-white p-3 rounded-full hover:bg-blue-500 transition-colors duration-200">
                                <div class="absolute -inset-0.5 bg-gradient-to-r from-blue-400 to-blue-600 rounded-full opacity-0 group-hover:opacity-100 blur transition duration-300"></div>
                                <svg class="w-5 h-5 relative z-10" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M23.953 4.57a10 10 0 01-2.825.775 4.958 4.958 0 002.163-2.723c-.951.555-2.005.959-3.127 1.184a4.92 4.92 0 00-8.384 4.482C7.69 8.095 4.067 6.13 1.64 3.162a4.822 4.822 0 00-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 01-2.228-.616v.06a4.923 4.923 0 003.946 4.827 4.996 4.996 0 01-2.212.085 4.936 4.936 0 004.604 3.417 9.867 9.867 0 01-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 007.557 2.209c9.053 0 13.998-7.496 13.998-13.985 0-.21 0-.42-.015-.63A9.935 9.935 0 0024 4.59z"/>
                                </svg>
                            </a>
                            <a href="https://wa.me/?text={{ urlencode((app()->getLocale() === 'ta' ? $mediaItem->title_ta : $mediaItem->title_en) . ' ' . url()->current()) }}"
                               target="_blank"
                               rel="noopener noreferrer"
                               class="group relative bg-green-500 text-white p-3 rounded-full hover:bg-green-600 transition-colors duration-200">
                                <div class="absolute -inset-0.5 bg-gradient-to-r from-green-500 to-green-700 rounded-full opacity-0 group-hover:opacity-100 blur transition duration-300"></div>
                                <svg class="w-5 h-5 relative z-10" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893A11.821 11.821 0 0020.885 3.488"/>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>

                {{-- Right Sidebar --}}
                <aside class="w-full lg:w-1/4 lg:sticky lg:top-4 lg:h-fit space-y-6">
                    {{-- Article Info Card --}}
                    <div class="bg-white dark:bg-gray-800 rounded-lg shadow-md overflow-hidden" data-aos="fade-up" data-aos-delay="100">
                        <div class="bg-gradient-to-r from-gray-700 to-gray-800 px-6 py-4">
                            <h3 class="text-lg font-bold text-blue-600 flex items-center">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                                {{ __('site.press_releases.article_info') }}
                            </h3>
                        </div>
                        <div class="p-4 space-y-3">
                            <div class="flex items-center justify-between py-2 border-b border-gray-200 dark:border-gray-700 last:border-b-0">
                                <span class="text-gray-600 dark:text-gray-400 text-sm">{{ __('site.press_releases.published') }}</span>
                                <span class="font-medium text-gray-900 dark:text-white text-sm">{{ $mediaItem->created_at->format('M j, Y') }}</span>
                            </div>
                            @if($mediaItem->event_date)
                            <div class="flex items-center justify-between py-2 border-b border-gray-200 dark:border-gray-700 last:border-b-0">
                                <span class="text-gray-600 dark:text-gray-400 text-sm">{{ __('site.press_releases.event_date') }}</span>
                                <span class="font-medium text-gray-900 dark:text-white text-sm">{{ $mediaItem->event_date->format('M j, Y') }}</span>
                            </div>
                            @endif
                            @if($mediaItem->category)
                            <div class="flex items-center justify-between py-2 border-b border-gray-200 dark:border-gray-700 last:border-b-0">
                                <span class="text-gray-600 dark:text-gray-400 text-sm">{{ __('site.press_releases.category') }}</span>
                                <span class="bg-red-100 dark:bg-red-900/30 text-red-600 dark:text-red-400 px-2 py-1 rounded-full text-xs font-medium">
                                    {{ $mediaItem->category->name ?? __('site.press_releases.latest_news') }}
                                </span>
                            </div>
                            @endif
                            @if($mediaItem->video_link)
                            <div class="flex items-center justify-between py-2 border-b border-gray-200 dark:border-gray-700 last:border-b-0">
                                <span class="text-gray-600 dark:text-gray-400 text-sm">{{ __('site.press_releases.media') }}</span>
                                <span class="bg-blue-100 dark:bg-blue-900/30 text-blue-600 dark:text-blue-400 px-2 py-1 rounded-full text-xs font-medium">
                                    {{ __('site.press_releases.video_available') }}
                                </span>
                            </div>
                            @endif
                            @if($mediaItem->more_photos && count($mediaItem->more_photos) > 0)
                            <div class="flex items-center justify-between py-2">
                                <span class="text-gray-600 dark:text-gray-400 text-sm">{{ __('site.gallery.title') }}:</span>
                                <span class="bg-green-100 dark:bg-green-900/30 text-green-600 dark:text-green-400 px-2 py-1 rounded-full text-xs font-medium">
                                    {{ count($mediaItem->more_photos) }}
                                </span>
                            </div>
                            @endif
                        </div>
                    </div>

                    <!-- {{-- Latest News Widget --}}
                    @if(isset($latestNews) && $latestNews->isNotEmpty())
                    <div class="bg-white dark:bg-gray-800 rounded-lg shadow-md overflow-hidden" data-aos="fade-up" data-aos-delay="200">
                        <div class="bg-gradient-to-r from-blue-600 to-blue-700 px-6 py-4">
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
                    @endif -->

                    <!-- {{-- Latest Events Widget --}}
                    @if(isset($latestEvents) && $latestEvents->isNotEmpty())
                    <div class="bg-white dark:bg-gray-800 rounded-lg shadow-md overflow-hidden" data-aos="fade-up" data-aos-delay="300">
                        <div class="bg-gradient-to-r from-green-600 to-green-700 px-6 py-4">
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
                    @endif -->

                    <!-- {{-- Latest Videos Widget --}}
                    @if(isset($latestVideos) && $latestVideos->isNotEmpty())
                    <div class="bg-white dark:bg-gray-800 rounded-lg shadow-md overflow-hidden" data-aos="fade-up" data-aos-delay="400">
                        <div class="bg-gradient-to-r from-red-600 to-red-700 px-6 py-4">
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
                    @endif -->

                    <!-- {{-- Press Releases Widget --}}
                    @if(isset($pressReleases) && $pressReleases->isNotEmpty())
                    <div class="bg-white dark:bg-gray-800 rounded-lg shadow-md overflow-hidden" data-aos="fade-up" data-aos-delay="500">
                        <div class="bg-gradient-to-r from-purple-600 to-purple-700 px-6 py-4">
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
                    @endif -->

                    {{-- Quick Links Widget --}}
                    <div class="bg-white dark:bg-gray-800 rounded-lg shadow-md overflow-hidden" data-aos="fade-up" data-aos-delay="600">
                        <div class="bg-gradient-to-r from-gray-700 to-gray-800 px-6 py-4">
                            <h3 class="text-lg font-bold text-red-600 flex items-center">
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

    {{-- Image Gallery Modal --}}
    @if($mediaItem->more_photos && count($mediaItem->more_photos) > 0)
    <div id="gallery-modal" class="fixed inset-0 bg-black bg-opacity-90 z-50 items-center justify-center hidden">
        <div class="relative w-full h-full max-w-6xl max-h-screen p-4">
            {{-- Close Button --}}
            <button id="close-gallery-modal" class="absolute top-4 right-4 z-60 text-white hover:text-gray-300 transition-colors">
                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                </svg>
            </button>

            {{-- Previous Button --}}
            <button id="prev-image" class="absolute left-4 top-1/2 transform -translate-y-1/2 z-60 text-white hover:text-gray-300 transition-colors bg-black bg-opacity-50 rounded-full p-2 hover:bg-opacity-75">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                </svg>
            </button>

            {{-- Next Button --}}
            <button id="next-image" class="absolute right-4 top-1/2 transform -translate-y-1/2 z-60 text-white hover:text-gray-300 transition-colors bg-black bg-opacity-50 rounded-full p-2 hover:bg-opacity-75">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                </svg>
            </button>

            {{-- Main Image --}}
            <div class="w-full h-full flex items-center justify-center">
                <img id="modal-image" src="" alt="" class="max-w-full max-h-full object-contain">
            </div>

            {{-- Image Info --}}
            <div class="absolute bottom-4 left-1/2 transform -translate-x-1/2 bg-black bg-opacity-75 text-white px-4 py-2 rounded-lg">
                <div class="text-center">
                    <span id="image-counter" class="text-sm font-medium"></span>
                    <span id="image-title" class="block text-xs mt-1 text-gray-300"></span>
                </div>
            </div>

            {{-- Thumbnail Strip --}}
            <div class="absolute bottom-16 left-0 right-0 px-4">
                <div id="thumbnail-strip" class="flex justify-center space-x-2 overflow-x-auto pb-2">
                    @foreach($mediaItem->more_photos as $index => $photo)
                        @php
                            $photoUrl = $mediaItem->getPhotoUrl($photo);
                        @endphp
                        <div class="thumbnail-item flex-shrink-0 w-16 h-16 rounded-lg overflow-hidden cursor-pointer border-2 border-transparent hover:border-white transition-colors opacity-60 hover:opacity-100 {{ $index === 0 ? 'active opacity-100 border-white' : '' }}"
                             data-index="{{ $index }}"
                             data-image="{{ $photoUrl }}">
                            <img src="{{ $photoUrl }}" alt="Thumb {{ $index + 1 }}" class="w-full h-full object-cover">
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    @endif

    <style>
        .animate-fadeInUp {
            opacity: 0;
            transform: translateY(30px);
            transition: all 0.6s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .animate-fadeInUp.animate-visible {
            opacity: 1;
            transform: translateY(0);
        }

        /* Masonry Layout */
        .masonry-grid {
            column-gap: 1rem;
        }

        .gallery-item {
            margin-bottom: 1rem;
            border-radius: 0.5rem;
            overflow: hidden;
        }

        .gallery-item img {
            width: 100%;
            height: auto;
            display: block;
        }

        /* Modal Styles */
        #gallery-modal img {
            max-width: 100%;
            max-height: 100%;
            object-fit: contain;
        }

        .thumbnail-item.active {
            border-color: white !important;
            opacity: 1 !important;
        }

        /* Responsive Masonry */
        @media (max-width: 768px) {
            .masonry-grid {
                column-count: 1;
            }
        }

        @media (min-width: 769px) and (max-width: 1024px) {
            .masonry-grid {
                column-count: 2;
            }
        }

        @media (min-width: 1025px) and (max-width: 1280px) {
            .masonry-grid {
                column-count: 3;
            }
        }

        @media (min-width: 1281px) {
            .masonry-grid {
                column-count: 4;
            }
        }
    </style>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Intersection Observer for gallery animations
            const observerOptions = {
                threshold: 0.1,
                rootMargin: '0px 0px -50px 0px'
            };

            const observer = new IntersectionObserver(function(entries) {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('animate-visible');
                    }
                });
            }, observerOptions);

            // Observe gallery items
            document.querySelectorAll('.animate-fadeInUp').forEach(el => {
                observer.observe(el);
            });

            // Gallery Modal Functionality
            @if($mediaItem->more_photos && count($mediaItem->more_photos) > 0)
            const galleryModal = document.getElementById('gallery-modal');
            const modalImage = document.getElementById('modal-image');
            const imageCounter = document.getElementById('image-counter');
            const imageTitle = document.getElementById('image-title');
            const thumbnailStrip = document.getElementById('thumbnail-strip');
            const closeModalBtn = document.getElementById('close-gallery-modal');
            const prevBtn = document.getElementById('prev-image');
            const nextBtn = document.getElementById('next-image');

            let currentImageIndex = 0;
            const galleryImages = @json(array_map(function($photo) use ($mediaItem) {
                return $mediaItem->getPhotoUrl($photo);
            }, $mediaItem->more_photos));

            // Open modal when clicking gallery items
            document.querySelectorAll('.gallery-item').forEach((item, index) => {
                item.addEventListener('click', function() {
                    currentImageIndex = parseInt(this.getAttribute('data-index'));
                    openModal(currentImageIndex);
                });
            });

            // Thumbnail click handlers
            document.querySelectorAll('.thumbnail-item').forEach((thumb, index) => {
                thumb.addEventListener('click', function() {
                    currentImageIndex = index;
                    updateModal(currentImageIndex);
                });
            });

            // Navigation buttons
            prevBtn.addEventListener('click', function() {
                currentImageIndex = currentImageIndex > 0 ? currentImageIndex - 1 : galleryImages.length - 1;
                updateModal(currentImageIndex);
            });

            nextBtn.addEventListener('click', function() {
                currentImageIndex = currentImageIndex < galleryImages.length - 1 ? currentImageIndex + 1 : 0;
                updateModal(currentImageIndex);
            });

            // Close modal
            closeModalBtn.addEventListener('click', closeModal);
            galleryModal.addEventListener('click', function(e) {
                if (e.target === galleryModal) {
                    closeModal();
                }
            });

            // Keyboard navigation
            document.addEventListener('keydown', function(e) {
                if (!galleryModal.classList.contains('hidden')) {
                    if (e.key === 'Escape') {
                        closeModal();
                    } else if (e.key === 'ArrowLeft') {
                        prevBtn.click();
                    } else if (e.key === 'ArrowRight') {
                        nextBtn.click();
                    }
                }
            });

            function openModal(index) {
                currentImageIndex = index;
                updateModal(index);
                galleryModal.classList.remove('hidden');
                galleryModal.classList.add('flex');
                document.body.style.overflow = 'hidden';
            }

            function closeModal() {
                galleryModal.classList.add('hidden');
                galleryModal.classList.remove('flex');
                document.body.style.overflow = 'auto';
            }

            function updateModal(index) {
                const imageUrl = galleryImages[index];
                const imageTitleText = "{{ app()->getLocale() === 'ta' ? $mediaItem->title_ta : $mediaItem->title_en }} - Photo " + (index + 1);

                modalImage.src = imageUrl;
                modalImage.alt = imageTitleText;
                imageCounter.textContent = (index + 1) + ' / ' + galleryImages.length;
                document.getElementById('image-title').textContent = imageTitleText;

                // Update active thumbnail
                document.querySelectorAll('.thumbnail-item').forEach((thumb, i) => {
                    thumb.classList.toggle('active', i === index);
                    thumb.classList.toggle('border-white', i === index);
                    thumb.classList.toggle('opacity-60', i !== index);
                    thumb.classList.toggle('opacity-100', i === index);
                });
            }
            @endif
        });
    </script>

    {{-- Text-to-Speech Script --}}
    <script src="{{ asset('js/text-to-speech.js') }}"></script>
@endsection
