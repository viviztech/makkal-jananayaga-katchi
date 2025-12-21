@extends('layouts.app')

@section('title', __('site.menu.home'))

@section('content')

{{-- Campaign Hero Section --}}
<x-campaign-hero
    :title="__('site.hero.title')"
    :subtitle="__('site.hero.subtitle')"
    :ctaText="__('site.menu.join_mjk')"
    :ctaUrl="route('join')"
    :backgroundImage="asset('assets/images/hero-bg.jpg')"
/>

{{-- Statistics Section --}}
<section class="bg-gray-50 py-20">
    <div class="max-w-7xl mx-auto px-4">
        <h2 class="text-4xl md:text-5xl font-extrabold text-center mb-4 text-gray-900" data-aos="fade-up">
            {{ __('site.stats.title') }}
        </h2>
        <p class="text-xl text-center text-gray-600 mb-16" data-aos="fade-up" data-aos-delay="100">
            {{ __('site.stats.subtitle') }}
        </p>

        <div class="stats-campaign">
            <div class="stat-campaign stat-campaign-primary" data-aos="flip-up" data-aos-delay="200">
                <div class="stat-campaign-value">50K+</div>
                <div class="stat-campaign-title">{{ __('site.stats.active_members') }}</div>
                <div class="stat-campaign-desc">{{ __('site.stats.members_desc') }}</div>
            </div>

            <div class="stat-campaign stat-campaign-secondary" data-aos="flip-up" data-aos-delay="300">
                <div class="stat-campaign-value">{{ \App\Models\Member::count() }}</div>
                <div class="stat-campaign-title">{{ __('site.stats.total_members') }}</div>
                <div class="stat-campaign-desc">{{ __('site.stats.members_registered') }}</div>
            </div>

            <div class="stat-campaign stat-campaign-accent" data-aos="flip-up" data-aos-delay="400">
                <div class="stat-campaign-value">30+</div>
                <div class="stat-campaign-title">{{ __('site.stats.years_movement') }}</div>
                <div class="stat-campaign-desc">{{ __('site.stats.movement_desc') }}</div>
            </div>
        </div>
    </div>
</section>

{{-- Core Principles Section --}}
<section class="bg-white py-20">
    <div class="max-w-7xl mx-auto px-4">
        <h2 class="text-4xl md:text-5xl font-extrabold text-center mb-4 text-gray-900" data-aos="fade-up">
            {{ __('site.principles.title') }}
        </h2>
        <p class="text-xl text-center text-gray-600 mb-16" data-aos="fade-up" data-aos-delay="100">
            {{ __('site.principles.subtitle') }}
        </p>

        <div class="grid md:grid-cols-3 gap-8">
            <x-impact-card
                :title="__('site.principles.anti_casteism')"
                :description="__('site.principles.anti_casteism_desc')"
                color="primary"
                data-aos-delay="200"
            >
                <x-slot name="icon">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path>
                    </svg>
                </x-slot>
            </x-impact-card>

            <x-impact-card
                :title="__('site.principles.social_justice')"
                :description="__('site.principles.social_justice_desc')"
                color="secondary"
                data-aos-delay="300"
            >
                <x-slot name="icon">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 6l3 1m0 0l-3 9a5.002 5.002 0 006.001 0M6 7l3 9M6 7l6-2m6 2l3-1m-3 1l-3 9a5.002 5.002 0 006.001 0M18 7l3 9m-3-9l-6-2m0-2v2m0 16V5m0 16H9m3 0h3"></path>
                    </svg>
                </x-slot>
            </x-impact-card>

            <x-impact-card
                :title="__('site.principles.empowerment')"
                :description="__('site.principles.empowerment_desc')"
                color="success"
                data-aos-delay="400"
            >
                <x-slot name="icon">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                    </svg>
                </x-slot>
            </x-impact-card>
        </div>
    </div>
</section>

{{-- Rally Banner Section --}}
@php
    // Get upcoming event from Media with category 'events' if it exists
    $eventsCategory = \App\Models\Category::where('name_en', 'LIKE', '%Event%')
        ->orWhere('name_ta', 'LIKE', '%நிகழ்வு%')
        ->first();
    $upcomingEvent = null;

    if ($eventsCategory) {
        $upcomingEvent = \App\Models\Media::where('category_id', $eventsCategory->id)
            ->where('event_date', '>=', now())
            ->orderBy('event_date', 'asc')
            ->first();
    }
@endphp

@if($upcomingEvent)
<section class="bg-gray-50 py-12">
    <div class="max-w-7xl mx-auto px-4">
        @php
            $eventTitle = app()->getLocale() === 'ta' ? $upcomingEvent->title_ta : $upcomingEvent->title_en;
        @endphp
        <x-rally-banner
            :title="$eventTitle"
            :date="$upcomingEvent->event_date->format('M d, Y')"
            :location="''"
            :ctaUrl="route('events')"
            :ctaText="__('site.buttons.learn_more')"
        />
    </div>
</section>
@endif

{{-- Latest Updates Section with Tabs --}}
<section class="bg-white py-20">
    <div class="max-w-7xl mx-auto px-4">
        <h2 class="text-4xl md:text-5xl font-extrabold text-center mb-16 text-gray-900" data-aos="fade-up">
            {{ __('site.updates.title') }}
        </h2>

        {{-- Tabs --}}
        <div class="tabs-campaign" data-aos="fade-up" data-aos-delay="100">
            <div class="tab-campaign tab-campaign-active" onclick="showTab('news')">
                {{ __('site.menu.news') }}
            </div>
            <div class="tab-campaign" onclick="showTab('press')">
                {{ __('site.menu.press_release') }}
            </div>
            <div class="tab-campaign" onclick="showTab('events')">
                {{ __('site.menu.events') }}
            </div>
        </div>

        {{-- Tab Content: News --}}
        <div id="tab-news" class="tab-content">
            <div class="grid md:grid-cols-3 gap-8">
                @php
                    $newsCategory = \App\Models\Category::where('name_en', 'LIKE', '%News%')
                        ->orWhere('name_ta', 'LIKE', '%செய்தி%')
                        ->first();
                    $latestNews = $newsCategory
                        ? \App\Models\Media::where('category_id', $newsCategory->id)->latest()->take(3)->get()
                        : collect();
                @endphp

                @forelse($latestNews as $news)
                    @php
                        $newsTitle = app()->getLocale() === 'ta' ? $news->title_ta : $news->title_en;
                        $newsContent = app()->getLocale() === 'ta' ? $news->content_ta : $news->content_en;
                    @endphp
                    <div class="card-campaign" data-aos="fade-up" data-aos-delay="{{ 200 + $loop->index * 100 }}">
                        @if($news->featured_image)
                            <img
                                src="{{ $news->featured_image_url }}"
                                alt="{{ $newsTitle }}"
                                class="w-full h-48 object-cover"
                            />
                        @endif
                        <div class="p-6">
                            <p class="text-sm text-gray-500 mb-2">
                                {{ $news->created_at->format('M d, Y') }}
                            </p>
                            <h3 class="text-xl font-bold mb-3 text-gray-900">{{ $newsTitle }}</h3>
                            <p class="text-gray-600 mb-4 line-clamp-3">{{ Str::limit(strip_tags($newsContent), 150) }}</p>
                            <a href="{{ route('latest-news') }}" class="text-[var(--color-mjk-red)] font-semibold hover:underline">
                                {{ __('site.buttons.read_more') }} →
                            </a>
                        </div>
                    </div>
                @empty
                    <div class="col-span-3 text-center py-12 text-gray-500">
                        {{ __('site.messages.no_news') }}
                    </div>
                @endforelse
            </div>

            <div class="text-center mt-12">
                <a href="{{ route('latest-news') }}" class="btn-campaign btn-campaign-primary">
                    {{ __('site.buttons.view_all_news') }}
                </a>
            </div>
        </div>

        {{-- Tab Content: Press Releases --}}
        <div id="tab-press" class="tab-content hidden">
            <div class="grid md:grid-cols-3 gap-8">
                @php
                    $pressCategory = \App\Models\Category::where('name_en', 'LIKE', '%Press%')
                        ->orWhere('name_ta', 'LIKE', '%அறிக்கை%')
                        ->first();
                    $pressReleases = $pressCategory
                        ? \App\Models\Media::where('category_id', $pressCategory->id)->latest()->take(3)->get()
                        : collect();
                @endphp

                @forelse($pressReleases as $press)
                    @php
                        $pressTitle = app()->getLocale() === 'ta' ? $press->title_ta : $press->title_en;
                        $pressContent = app()->getLocale() === 'ta' ? $press->content_ta : $press->content_en;
                    @endphp
                    <div class="card-campaign" data-aos="fade-up">
                        <div class="p-6">
                            <p class="text-sm text-gray-500 mb-2">
                                {{ $press->created_at->format('M d, Y') }}
                            </p>
                            <h3 class="text-xl font-bold mb-3 text-gray-900">{{ $pressTitle }}</h3>
                            <p class="text-gray-600 mb-4 line-clamp-3">{{ Str::limit(strip_tags($pressContent), 150) }}</p>
                            <a href="{{ route('press-releases') }}" class="text-[var(--color-mjk-red)] font-semibold hover:underline">
                                {{ __('site.buttons.read_more') }} →
                            </a>
                        </div>
                    </div>
                @empty
                    <div class="col-span-3 text-center py-12 text-gray-500">
                        {{ __('site.messages.no_press_releases') }}
                    </div>
                @endforelse
            </div>

            <div class="text-center mt-12">
                <a href="{{ route('press-releases') }}" class="btn-campaign btn-campaign-primary">
                    {{ __('site.buttons.view_all_press_releases') }}
                </a>
            </div>
        </div>

        {{-- Tab Content: Events --}}
        <div id="tab-events" class="tab-content hidden">
            <div class="grid md:grid-cols-3 gap-8">
                @php
                    $eventsTabCategory = \App\Models\Category::where('name_en', 'LIKE', '%Event%')
                        ->orWhere('name_ta', 'LIKE', '%நிகழ்வு%')
                        ->first();
                    $upcomingEvents = $eventsTabCategory
                        ? \App\Models\Media::where('category_id', $eventsTabCategory->id)
                            ->where('event_date', '>=', now())
                            ->orderBy('event_date', 'asc')
                            ->take(3)
                            ->get()
                        : collect();
                @endphp

                @forelse($upcomingEvents as $event)
                    @php
                        $eventTitle = app()->getLocale() === 'ta' ? $event->title_ta : $event->title_en;
                        $eventContent = app()->getLocale() === 'ta' ? $event->content_ta : $event->content_en;
                    @endphp
                    <div class="card-campaign" data-aos="fade-up">
                        <div class="p-6">
                            <div class="bg-[var(--color-mjk-orange)] text-white text-sm font-bold px-3 py-1 rounded-full inline-block mb-3">
                                {{ $event->event_date ? $event->event_date->format('M d, Y') : $event->created_at->format('M d, Y') }}
                            </div>
                            <h3 class="text-xl font-bold mb-3 text-gray-900">{{ $eventTitle }}</h3>
                            <p class="text-gray-600 mb-4 line-clamp-2">{{ Str::limit(strip_tags($eventContent), 100) }}</p>
                            <a href="{{ route('events') }}" class="text-[var(--color-mjk-red)] font-semibold hover:underline">
                                {{ __('site.buttons.learn_more') }} →
                            </a>
                        </div>
                    </div>
                @empty
                    <div class="col-span-3 text-center py-12 text-gray-500">
                        {{ __('site.messages.no_upcoming_events') }}
                    </div>
                @endforelse
            </div>

            <div class="text-center mt-12">
                <a href="{{ route('events') }}" class="btn-campaign btn-campaign-primary">
                    {{ __('site.buttons.view_all_events') }}
                </a>
            </div>
        </div>
    </div>
</section>

{{-- Join the Movement CTA Section --}}
<section class="bg-gradient-to-r from-[var(--color-mjk-red)] to-[var(--color-mjk-blue)] py-20">
    <div class="max-w-4xl mx-auto px-4 text-center" data-aos="zoom-in">
        <h2 class="text-4xl md:text-5xl font-extrabold text-white mb-6">
            {{ __('site.cta.join_movement') }}
        </h2>
        <p class="text-xl text-white/90 mb-10">
            {{ __('site.cta.join_description') }}
        </p>
        <div class="flex flex-col sm:flex-row gap-4 justify-center">
            <a href="{{ route('join') }}" class="btn-campaign btn-campaign-outline text-xl px-10">
                {{ __('site.menu.join_mjk') }}
            </a>
            <a href="{{ route('donation') }}" class="btn-campaign btn-campaign-cta text-xl px-10">
                {{ __('site.menu.donations') }}
            </a>
        </div>
    </div>
</section>

{{-- Tab Switching JavaScript --}}
<script>
function showTab(tabName) {
    // Hide all tab content
    document.querySelectorAll('.tab-content').forEach(content => {
        content.classList.add('hidden');
    });

    // Remove active class from all tabs
    document.querySelectorAll('.tab-campaign').forEach(tab => {
        tab.classList.remove('tab-campaign-active');
    });

    // Show selected tab content
    document.getElementById('tab-' + tabName).classList.remove('hidden');

    // Add active class to clicked tab
    event.target.classList.add('tab-campaign-active');
}
</script>

@endsection
