@extends('layouts.app')

@section('title', __('site.ideology.title'))

@section('content')

{{-- Page Hero --}}
<section class="bg-gradient-to-br from-[var(--color-vck-red)] via-[var(--color-vck-red)] to-[var(--color-vck-blue)] py-20">
    <div class="max-w-7xl mx-auto px-4 text-center" data-aos="fade-up">
        <h1 class="text-5xl md:text-6xl font-extrabold text-white mb-6">
            {{ __('site.ideology.title') }}
        </h1>
        <p class="text-xl md:text-2xl text-white/90 max-w-3xl mx-auto">
            {{ __('site.ideology.subtitle') }}
        </p>
    </div>
</section>

{{-- Core Principles Section --}}
<section class="bg-white py-20">
    <div class="max-w-7xl mx-auto px-4">
        <h2 class="text-4xl md:text-5xl font-extrabold text-center mb-4 text-gray-900" data-aos="fade-up">
            {{ __('site.ideology.core_principles_title') }}
        </h2>
        <p class="text-xl text-center text-gray-600 mb-16" data-aos="fade-up" data-aos-delay="100">
            {{ __('site.ideology.core_principles_subtitle') }}
        </p>

        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
            {{-- Anti-Casteism --}}
            <x-impact-card
                :title="__('site.ideology.anti_casteism')"
                :description="__('site.ideology.anti_casteism_desc')"
                color="primary"
                data-aos-delay="200"
            >
                <x-slot name="icon">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                    </svg>
                </x-slot>
            </x-impact-card>

            {{-- Social Justice --}}
            <x-impact-card
                :title="__('site.ideology.social_justice')"
                :description="__('site.ideology.social_justice_desc')"
                color="secondary"
                data-aos-delay="300"
            >
                <x-slot name="icon">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 6l3 1m0 0l-3 9a5.002 5.002 0 006.001 0M6 7l3 9M6 7l6-2m6 2l3-1m-3 1l-3 9a5.002 5.002 0 006.001 0M18 7l3 9m-3-9l-6-2m0-2v2m0 16V5m0 16H9m3 0h3"></path>
                    </svg>
                </x-slot>
            </x-impact-card>

            {{-- Rationalism --}}
            <x-impact-card
                :title="__('site.ideology.rationalism')"
                :description="__('site.ideology.rationalism_desc')"
                color="primary"
                data-aos-delay="400"
            >
                <x-slot name="icon">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"/>
                    </svg>
                </x-slot>
            </x-impact-card>

            {{-- Dalit Liberation --}}
            <x-impact-card
                :title="__('site.ideology.dalit_liberation')"
                :description="__('site.ideology.dalit_liberation_desc')"
                color="secondary"
                data-aos-delay="500"
            >
                <x-slot name="icon">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                    </svg>
                </x-slot>
            </x-impact-card>

            {{-- Self-Respect Movement --}}
            <x-impact-card
                :title="__('site.ideology.self_respect')"
                :description="__('site.ideology.self_respect_desc')"
                color="success"
                data-aos-delay="600"
            >
                <x-slot name="icon">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path>
                    </svg>
                </x-slot>
            </x-impact-card>

            {{-- Political Empowerment --}}
            <x-impact-card
                :title="__('site.ideology.political_empowerment')"
                :description="__('site.ideology.political_empowerment_desc')"
                color="warning"
                data-aos-delay="700"
            >
                <x-slot name="icon">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 3.055A9.001 9.001 0 1020.945 13H11V3.055z"></path>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.488 9H15V3.512A9.025 9.025 0 0120.488 9z"></path>
                    </svg>
                </x-slot>
            </x-impact-card>
        </div>
    </div>
</section>

{{-- Our Vision Section --}}
<section class="bg-gray-50 py-20">
    <div class="max-w-7xl mx-auto px-4">
        <div class="grid md:grid-cols-2 gap-12 items-center">
            <div data-aos="fade-right">
                <h2 class="text-4xl md:text-5xl font-extrabold mb-6 text-gray-900">
                    {{ __('site.ideology.our_vision') }}
                </h2>
                <div class="prose prose-lg max-w-none text-gray-700">
                    <p class="mb-4">{{ __('site.ideology.vision_para_1') }}</p>
                    <p class="mb-4">{{ __('site.ideology.vision_para_2') }}</p>
                    <p>{{ __('site.ideology.vision_para_3') }}</p>
                </div>
            </div>
            <div data-aos="fade-left" data-aos-delay="200">
                <div class="relative">
                    <div class="absolute -inset-4 bg-gradient-to-r from-[var(--color-vck-red)] to-[var(--color-vck-blue)] rounded-2xl opacity-20 blur-xl"></div>
                    <img
                        src="{{ asset('assets/images/ideology-vision.jpg') }}"
                        alt="{{ __('site.ideology.our_vision') }}"
                        class="relative rounded-2xl shadow-2xl w-full"
                        onerror="this.src='{{ asset('assets/images/favicons/apple-touch-icon.png') }}'"
                    />
                </div>
            </div>
        </div>
    </div>
</section>

{{-- Our Mission Section --}}
<section class="bg-white py-20">
    <div class="max-w-7xl mx-auto px-4">
        <div class="grid md:grid-cols-2 gap-12 items-center">
            <div data-aos="fade-right" class="order-2 md:order-1">
                <div class="relative">
                    <div class="absolute -inset-4 bg-gradient-to-r from-[var(--color-vck-blue)] to-[var(--color-vck-red)] rounded-2xl opacity-20 blur-xl"></div>
                    <img
                        src="{{ asset('assets/images/ideology-mission.jpg') }}"
                        alt="{{ __('site.ideology.our_mission') }}"
                        class="relative rounded-2xl shadow-2xl w-full"
                        onerror="this.src='{{ asset('assets/images/favicons/apple-touch-icon.png') }}'"
                    />
                </div>
            </div>
            <div data-aos="fade-left" data-aos-delay="200" class="order-1 md:order-2">
                <h2 class="text-4xl md:text-5xl font-extrabold mb-6 text-gray-900">
                    {{ __('site.ideology.our_mission') }}
                </h2>
                <div class="prose prose-lg max-w-none text-gray-700">
                    <p class="mb-4">{{ __('site.ideology.mission_para_1') }}</p>
                    <p class="mb-4">{{ __('site.ideology.mission_para_2') }}</p>
                    <p>{{ __('site.ideology.mission_para_3') }}</p>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- Key Goals Section --}}
<section class="bg-gray-50 py-20">
    <div class="max-w-7xl mx-auto px-4">
        <h2 class="text-4xl md:text-5xl font-extrabold text-center mb-16 text-gray-900" data-aos="fade-up">
            {{ __('site.ideology.key_goals') }}
        </h2>

        <div class="grid md:grid-cols-2 gap-8">
            @for($i = 1; $i <= 6; $i++)
                <div class="flex gap-4" data-aos="fade-up" data-aos-delay="{{ $i * 100 }}">
                    <div class="flex-shrink-0">
                        <div class="w-12 h-12 rounded-full bg-[var(--color-vck-red)] text-white flex items-center justify-center font-bold text-xl">
                            {{ $i }}
                        </div>
                    </div>
                    <div>
                        <h3 class="text-xl font-bold mb-2 text-gray-900">
                            {{ __('site.ideology.goal_' . $i . '_title') }}
                        </h3>
                        <p class="text-gray-600">
                            {{ __('site.ideology.goal_' . $i . '_desc') }}
                        </p>
                    </div>
                </div>
            @endfor
        </div>
    </div>
</section>

{{-- CTA Section --}}
<section class="bg-gradient-to-r from-[var(--color-vck-red)] to-[var(--color-vck-blue)] py-20">
    <div class="max-w-4xl mx-auto px-4 text-center" data-aos="zoom-in">
        <h2 class="text-4xl md:text-5xl font-extrabold text-white mb-6">
            {{ __('site.ideology.join_movement_cta') }}
        </h2>
        <p class="text-xl text-white/90 mb-10">
            {{ __('site.ideology.join_movement_desc') }}
        </p>
        <div class="flex flex-col sm:flex-row gap-4 justify-center">
            <a href="{{ route('join') }}" class="btn-campaign btn-campaign-outline text-xl px-10">
                {{ __('site.menu.join_vck') }}
            </a>
            <a href="{{ route('history') }}" class="btn-campaign btn-campaign-cta text-xl px-10">
                {{ __('site.ideology.learn_history') }}
            </a>
        </div>
    </div>
</section>

@endsection
