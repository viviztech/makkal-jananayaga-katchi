@extends('layouts.app')

@section('title', __('site.history.title'))

@section('content')

{{-- Page Hero --}}
<section class="bg-gradient-to-br from-[var(--color-vck-red)] via-[var(--color-vck-red)] to-[var(--color-vck-blue)] py-20">
    <div class="max-w-7xl mx-auto px-4 text-center" data-aos="fade-up">
        <h1 class="text-5xl md:text-6xl font-extrabold text-white mb-6">
            {{ __('site.history.title') }}
        </h1>
        <p class="text-xl md:text-2xl text-white/90 max-w-3xl mx-auto">
            {{ __('site.history.subtitle') }}
        </p>
    </div>
</section>

{{-- Timeline Section --}}
<section class="bg-white py-20">
    <div class="max-w-7xl mx-auto px-4">
        <h2 class="text-4xl md:text-5xl font-extrabold text-center mb-16 text-gray-900" data-aos="fade-up">
            {{ __('site.history.milestones') }}
        </h2>

        <div class="space-y-16">
            {{-- 1972 - Formation --}}
            <div class="grid md:grid-cols-2 gap-12 items-center" data-aos="fade-right">
                <div>
                    <div class="inline-block px-6 py-2 bg-[var(--color-vck-red)] text-white text-xl font-bold rounded-full mb-4">
                        1972
                    </div>
                    <h3 class="text-3xl font-bold mb-4 text-gray-900">
                        {{ __('site.history.1972_title') }}
                    </h3>
                    <p class="text-lg text-gray-600 leading-relaxed">
                        {{ __('site.history.1972_desc') }}
                    </p>
                </div>
                <div class="relative" data-aos="fade-left" data-aos-delay="200">
                    <div class="absolute -inset-4 bg-gradient-to-r from-[var(--color-vck-red)] to-[var(--color-vck-orange)] rounded-2xl opacity-20 blur-xl"></div>
                    <img
                        src="{{ asset('assets/images/history/1972.jpg') }}"
                        alt="1972"
                        class="relative rounded-2xl shadow-2xl w-full"
                        onerror="this.src='{{ asset('assets/images/favicons/apple-touch-icon.png') }}'"
                    />
                </div>
            </div>

            {{-- 1977 - Electoral Debut --}}
            <div class="grid md:grid-cols-2 gap-12 items-center" data-aos="fade-left">
                <div class="order-2 md:order-1 relative" data-aos="fade-right" data-aos-delay="200">
                    <div class="absolute -inset-4 bg-gradient-to-r from-[var(--color-vck-blue)] to-[var(--color-vck-red)] rounded-2xl opacity-20 blur-xl"></div>
                    <img
                        src="{{ asset('assets/images/history/1977.jpg') }}"
                        alt="1977"
                        class="relative rounded-2xl shadow-2xl w-full"
                        onerror="this.src='{{ asset('assets/images/favicons/apple-touch-icon.png') }}'"
                    />
                </div>
                <div class="order-1 md:order-2">
                    <div class="inline-block px-6 py-2 bg-[var(--color-vck-blue)] text-white text-xl font-bold rounded-full mb-4">
                        1977
                    </div>
                    <h3 class="text-3xl font-bold mb-4 text-gray-900">
                        {{ __('site.history.1977_title') }}
                    </h3>
                    <p class="text-lg text-gray-600 leading-relaxed">
                        {{ __('site.history.1977_desc') }}
                    </p>
                </div>
            </div>

            {{-- 1989 - National Recognition --}}
            <div class="grid md:grid-cols-2 gap-12 items-center" data-aos="fade-right">
                <div>
                    <div class="inline-block px-6 py-2 bg-[var(--color-vck-green)] text-white text-xl font-bold rounded-full mb-4">
                        1989
                    </div>
                    <h3 class="text-3xl font-bold mb-4 text-gray-900">
                        {{ __('site.history.1989_title') }}
                    </h3>
                    <p class="text-lg text-gray-600 leading-relaxed">
                        {{ __('site.history.1989_desc') }}
                    </p>
                </div>
                <div class="relative" data-aos="fade-left" data-aos-delay="200">
                    <div class="absolute -inset-4 bg-gradient-to-r from-[var(--color-vck-green)] to-[var(--color-vck-blue)] rounded-2xl opacity-20 blur-xl"></div>
                    <img
                        src="{{ asset('assets/images/history/1989.jpg') }}"
                        alt="1989"
                        class="relative rounded-2xl shadow-2xl w-full"
                        onerror="this.src='{{ asset('assets/images/favicons/apple-touch-icon.png') }}'"
                    />
                </div>
            </div>

            {{-- 2004 - Alliance & Growth --}}
            <div class="grid md:grid-cols-2 gap-12 items-center" data-aos="fade-left">
                <div class="order-2 md:order-1 relative" data-aos="fade-right" data-aos-delay="200">
                    <div class="absolute -inset-4 bg-gradient-to-r from-[var(--color-vck-orange)] to-[var(--color-vck-red)] rounded-2xl opacity-20 blur-xl"></div>
                    <img
                        src="{{ asset('assets/images/history/2004.jpg') }}"
                        alt="2004"
                        class="relative rounded-2xl shadow-2xl w-full"
                        onerror="this.src='{{ asset('assets/images/favicons/apple-touch-icon.png') }}'"
                    />
                </div>
                <div class="order-1 md:order-2">
                    <div class="inline-block px-6 py-2 bg-[var(--color-vck-orange)] text-white text-xl font-bold rounded-full mb-4">
                        2004
                    </div>
                    <h3 class="text-3xl font-bold mb-4 text-gray-900">
                        {{ __('site.history.2004_title') }}
                    </h3>
                    <p class="text-lg text-gray-600 leading-relaxed">
                        {{ __('site.history.2004_desc') }}
                    </p>
                </div>
            </div>

            {{-- Present Day --}}
            <div class="grid md:grid-cols-2 gap-12 items-center" data-aos="fade-right">
                <div>
                    <div class="inline-block px-6 py-2 bg-[var(--color-vck-red)] text-white text-xl font-bold rounded-full mb-4">
                        {{ date('Y') }}
                    </div>
                    <h3 class="text-3xl font-bold mb-4 text-gray-900">
                        {{ __('site.history.present_title') }}
                    </h3>
                    <p class="text-lg text-gray-600 leading-relaxed">
                        {{ __('site.history.present_desc') }}
                    </p>
                </div>
                <div class="relative" data-aos="fade-left" data-aos-delay="200">
                    <div class="absolute -inset-4 bg-gradient-to-r from-[var(--color-vck-red)] to-[var(--color-vck-blue)] rounded-2xl opacity-20 blur-xl"></div>
                    <img
                        src="{{ asset('assets/images/history/present.jpg') }}"
                        alt="Present Day"
                        class="relative rounded-2xl shadow-2xl w-full"
                        onerror="this.src='{{ asset('assets/images/favicons/apple-touch-icon.png') }}'"
                    />
                </div>
            </div>
        </div>
    </div>
</section>

{{-- Key Achievements Section --}}
<section class="bg-gray-50 py-20">
    <div class="max-w-7xl mx-auto px-4">
        <h2 class="text-4xl md:text-5xl font-extrabold text-center mb-16 text-gray-900" data-aos="fade-up">
            {{ __('site.history.achievements') }}
        </h2>

        <div class="grid md:grid-cols-3 gap-8">
            <x-impact-card
                :title="__('site.history.achievement_1_title')"
                :description="__('site.history.achievement_1_desc')"
                color="primary"
                data-aos-delay="200"
            >
                <x-slot name="icon">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </x-slot>
            </x-impact-card>

            <x-impact-card
                :title="__('site.history.achievement_2_title')"
                :description="__('site.history.achievement_2_desc')"
                color="secondary"
                data-aos-delay="300"
            >
                <x-slot name="icon">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </x-slot>
            </x-impact-card>

            <x-impact-card
                :title="__('site.history.achievement_3_title')"
                :description="__('site.history.achievement_3_desc')"
                color="success"
                data-aos-delay="400"
            >
                <x-slot name="icon">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z"></path>
                    </svg>
                </x-slot>
            </x-impact-card>
        </div>
    </div>
</section>

{{-- Legacy & Future Section --}}
<section class="bg-white py-20">
    <div class="max-w-7xl mx-auto px-4">
        <div class="grid md:grid-cols-2 gap-12 items-center">
            <div data-aos="fade-right">
                <h2 class="text-4xl md:text-5xl font-extrabold mb-6 text-gray-900">
                    {{ __('site.history.legacy_title') }}
                </h2>
                <div class="prose prose-lg max-w-none text-gray-700">
                    <p class="mb-4">{{ __('site.history.legacy_para_1') }}</p>
                    <p class="mb-4">{{ __('site.history.legacy_para_2') }}</p>
                    <p>{{ __('site.history.legacy_para_3') }}</p>
                </div>
            </div>
            <div data-aos="fade-left" data-aos-delay="200">
                <div class="relative">
                    <div class="absolute -inset-4 bg-gradient-to-r from-[var(--color-vck-red)] to-[var(--color-vck-blue)] rounded-2xl opacity-20 blur-xl"></div>
                    <img
                        src="{{ asset('assets/images/history/legacy.jpg') }}"
                        alt="{{ __('site.history.legacy_title') }}"
                        class="relative rounded-2xl shadow-2xl w-full"
                        onerror="this.src='{{ asset('assets/images/favicons/apple-touch-icon.png') }}'"
                    />
                </div>
            </div>
        </div>
    </div>
</section>

{{-- CTA Section --}}
<section class="bg-gradient-to-r from-[var(--color-vck-red)] to-[var(--color-vck-blue)] py-20">
    <div class="max-w-4xl mx-auto px-4 text-center" data-aos="zoom-in">
        <h2 class="text-4xl md:text-5xl font-extrabold text-white mb-6">
            {{ __('site.history.be_part_cta') }}
        </h2>
        <p class="text-xl text-white/90 mb-10">
            {{ __('site.history.be_part_desc') }}
        </p>
        <div class="flex flex-col sm:flex-row gap-4 justify-center">
            <a href="{{ route('join') }}" class="btn-campaign btn-campaign-outline text-xl px-10">
                {{ __('site.menu.join_vck') }}
            </a>
            <a href="{{ route('leadership') }}" class="btn-campaign btn-campaign-cta text-xl px-10">
                {{ __('site.history.meet_leaders') }}
            </a>
        </div>
    </div>
</section>

@endsection
