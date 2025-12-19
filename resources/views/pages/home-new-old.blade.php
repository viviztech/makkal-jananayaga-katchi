@extends('layouts.app')

@section('title', 'Home')

@section('content')
@php
use Illuminate\Support\Facades\Storage;
@endphp

    {{-- Full-Page Hero Slider --}}
    <section id="home" class="relative h-screen overflow-hidden">
        {{-- Slider Container --}}
        <div id="slider-container" class="absolute inset-0 flex transition-transform duration-700 ease-in-out">
            {{-- Slide 1 --}}
            <div class="w-full h-full flex-shrink-0 relative">
                <picture>
                    <source media="(max-width: 768px)" srcset="{{ asset('assets/images/bg/slider1.mobile.jpg') }}">
                    <img src="{{ asset('assets/images/bg/slider1.jpg') }}" class="w-full h-full object-cover" alt="Slide 1">
                </picture>
                {{-- Optional: Overlay for better text readability if needed --}}
                <div class="absolute inset-0 bg-gradient-to-b from-black/20 via-transparent to-black/40"></div>
            </div>

            {{-- Slide 2 --}}
            <div class="w-full h-full flex-shrink-0 relative">
                <picture>
                    <source media="(max-width: 768px)" srcset="{{ asset('assets/images/bg/slider2.mobile.jpg') }}">
                    <img src="{{ asset('assets/images/bg/slider2.jpg') }}" class="w-full h-full object-cover" alt="Slide 2">
                </picture>
                {{-- Optional: Overlay for better text readability if needed --}}
                <div class="absolute inset-0 bg-gradient-to-b from-black/20 via-transparent to-black/40"></div>
            </div>

            {{-- Slide 3 --}}
            <div class="w-full h-full flex-shrink-0 relative">
                <picture>
                    <source media="(max-width: 768px)" srcset="{{ asset('assets/images/bg/slider3.mobile.jpg') }}">
                    <img src="{{ asset('assets/images/bg/slider3.jpg') }}" class="w-full h-full object-cover" alt="Slide 3">
                </picture>
                {{-- Optional: Overlay for better text readability if needed --}}
                <div class="absolute inset-0 bg-gradient-to-b from-black/20 via-transparent to-black/40"></div>
            </div>
        </div>

        {{-- Navigation Dots --}}
        <div class="absolute bottom-8 left-1/2 transform -translate-x-1/2 flex space-x-3 z-10">
            <button class="w-3 h-3 rounded-full bg-white/70 hover:bg-white transition-all duration-300 hover:scale-125 shadow-lg" data-slide="0" aria-label="Go to slide 1"></button>
            <button class="w-3 h-3 rounded-full bg-white/70 hover:bg-white transition-all duration-300 hover:scale-125 shadow-lg" data-slide="1" aria-label="Go to slide 2"></button>
            <button class="w-3 h-3 rounded-full bg-white/70 hover:bg-white transition-all duration-300 hover:scale-125 shadow-lg" data-slide="2" aria-label="Go to slide 3"></button>
        </div>

        {{-- Scroll Indicator --}}
        <div class="absolute bottom-20 left-1/2 transform -translate-x-1/2 z-10 animate-bounce">
            <svg class="w-6 h-6 text-white drop-shadow-lg" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3"></path>
            </svg>
        </div>
    </section>

    {{-- About Section - Apple Style --}}
    <section id="about" class="relative min-h-screen flex items-center justify-center px-4 bg-white dark:bg-gray-950 overflow-hidden">
        {{-- Background Image with Overlay --}}
        <div class="absolute inset-0 z-0">
            <img src="{{ asset('assets/images/mla/15.jpg') }}" alt="Background" class="w-full h-full object-cover opacity-90 dark:opacity-90">
            <div class="absolute inset-0 bg-gradient-to-b from-white/85 via-white/90 to-white/85 dark:from-gray-950/85 dark:via-gray-950/90 dark:to-gray-950/85"></div>
        </div>

        <div class="max-w-7xl mx-auto w-full relative z-10 py-16">
            {{-- Section Header --}}
            <div class="text-center mb-12 lg:mb-16">
                <h2 class="text-5xl md:text-6xl lg:text-7xl font-bold text-gray-900 dark:text-white mb-6 tracking-tight">
                    {{ __('site.about.title') }}
                </h2>
                <p class="text-xl md:text-2xl text-gray-600 dark:text-gray-400 max-w-3xl mx-auto font-light">
                    Fighting for justice. Empowering communities.
                </p>
            </div>

            {{-- Content Grid --}}
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 lg:gap-16 items-center">
                {{-- Text Content --}}
                <div class="order-2 lg:order-1 scroll-reveal">
                    <div class="prose prose-lg max-w-none">
                        <p class="text-lg md:text-xl text-gray-700 dark:text-gray-300 mb-6 leading-relaxed">
                            {{ __('site.about.intro-1') }}
                        </p>
                        <p class="text-lg md:text-xl text-gray-700 dark:text-gray-300 mb-8 leading-relaxed">
                            {{ __('site.about.intro-2') }}
                        </p>
                        <div class="mt-8 lg:mt-12">
                            <a href="{{ route('ideology') }}" class="group inline-flex items-center text-blue-600 dark:text-blue-400 text-lg font-semibold hover:text-blue-700 dark:hover:text-blue-300 transition-colors">
                                {{ __('site.about.learn_more-2') }}
                                <svg class="w-5 h-5 ml-2 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>

                {{-- Image Content --}}
                <div class="order-1 lg:order-2 scroll-reveal" data-aos="fade-left" data-aos-delay="300" data-aos-duration="1000">
                    <div class="relative">
                        {{-- Animated gradient glow --}}
                        <div class="absolute -inset-0.5 bg-gradient-to-r from-red-500 to-blue-500 rounded-3xl opacity-0 group-hover:opacity-100 blur-2xl transition duration-500"></div>
                        <div class="absolute -inset-4 bg-gradient-to-r from-red-600 to-blue-600 rounded-3xl blur-2xl opacity-20 animate-pulse"></div>

                        {{-- Image with border --}}
                        <div class="relative bg-white dark:bg-gray-900 rounded-3xl p-2 border border-blue-200 dark:border-blue-800 shadow-2xl">
                            <img src="{{ asset('assets/images/about/about-1.png') }}" alt="About Our Party" class="relative w-full h-auto rounded-2xl">
                        </div>
                    </div>
                </div>
            </div>

            {{-- Optional: Scroll indicator --}}
            <div class="text-center mt-12 lg:mt-16">
                <div class="inline-flex flex-col items-center">
                    <svg class="w-6 h-6 text-blue-600 dark:text-blue-400 animate-bounce" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3"></path>
                    </svg>
                </div>
            </div>
        </div>
    </section>

        {{-- Color Symbolism Section - Full Screen --}}
    <section id="color-symbolism" class="relative min-h-screen flex items-center justify-center px-4 bg-gradient-to-br from-blue-50 via-white to-cyan-50 dark:from-gray-950 dark:via-gray-900 dark:to-blue-950/30 overflow-hidden">
        {{-- Animated Background Elements --}}
        <div class="absolute inset-0 overflow-hidden pointer-events-none">
            <div class="absolute top-20 left-10 w-72 h-72 bg-blue-500/10 rounded-full blur-3xl animate-pulse"></div>
            <div class="absolute bottom-20 right-10 w-96 h-96 bg-cyan-500/10 rounded-full blur-3xl animate-pulse" style="animation-delay: 1s"></div>
            <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[500px] h-[500px] bg-gradient-to-r from-blue-500/5 to-red-500/5 rounded-full blur-3xl"></div>
        </div>

        <div class="max-w-7xl mx-auto w-full relative z-10 py-16">
            {{-- Section Header --}}
            <div class="text-center mb-16" data-aos="fade-up">
                <h2 class="text-5xl md:text-6xl lg:text-7xl font-bold text-gray-900 dark:text-white mb-6 tracking-tight">
                    வண்ணம் காட்டும் வழிமுறை
                </h2>
                <p class="text-xl md:text-2xl text-gray-600 dark:text-gray-400 max-w-3xl mx-auto font-light">
                    Our Colors, Our Identity, Our Struggle
                </p>
            </div>

            {{-- Color Symbolism Cards --}}
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8 max-w-6xl mx-auto">
                {{-- Blue - Working People's Liberation --}}
                <div class="group relative" data-aos="zoom-in" data-aos-delay="0">
                    <div class="absolute -inset-0.5 bg-gradient-to-r from-blue-500 to-cyan-500 rounded-3xl opacity-0 group-hover:opacity-100 blur transition duration-500"></div>
                    <div class="relative bg-gradient-to-br from-blue-50 to-cyan-50 dark:from-blue-950/30 dark:to-cyan-950/30 rounded-3xl p-8 border border-blue-200 dark:border-blue-800 transition-all duration-500 hover:shadow-2xl hover:-translate-y-2 h-full">
                        <div class="relative w-16 h-16 mb-6">
                            <div class="absolute inset-0 bg-gradient-to-br from-blue-500 to-cyan-500 rounded-2xl opacity-20 group-hover:opacity-30 transition-opacity"></div>
                            <div class="relative w-16 h-16 bg-white dark:bg-gray-900 rounded-2xl flex items-center justify-center group-hover:scale-110 transition-transform duration-500 shadow-lg border-2 border-blue-200 dark:border-blue-700">
                                <div class="w-8 h-8 bg-gradient-to-br from-blue-500 to-cyan-500 rounded"></div>
                            </div>
                        </div>
                        <h3 class="text-2xl font-bold text-blue-900 dark:text-blue-100 mb-3">நீலம்</h3>
                        <p class="text-base text-blue-700/80 dark:text-blue-200/70 leading-relaxed">உழைக்கும் மக்கள் விடுதலை</p>
                        <p class="text-sm text-blue-600/70 dark:text-blue-300/60 mt-2 italic">Working People's Liberation</p>
                    </div>
                </div>

                {{-- Red - Revolutionary Path --}}
                <div class="group relative" data-aos="zoom-in" data-aos-delay="100">
                    <div class="absolute -inset-0.5 bg-gradient-to-r from-red-500 to-orange-500 rounded-3xl opacity-0 group-hover:opacity-100 blur transition duration-500"></div>
                    <div class="relative bg-gradient-to-br from-red-50 to-orange-50 dark:from-red-950/30 dark:to-orange-950/30 rounded-3xl p-8 border border-red-200 dark:border-red-800 transition-all duration-500 hover:shadow-2xl hover:-translate-y-2 h-full">
                        <div class="relative w-16 h-16 mb-6">
                            <div class="absolute inset-0 bg-gradient-to-br from-red-500 to-orange-500 rounded-2xl opacity-20 group-hover:opacity-30 transition-opacity"></div>
                            <div class="relative w-16 h-16 bg-white dark:bg-gray-900 rounded-2xl flex items-center justify-center group-hover:scale-110 transition-transform duration-500 shadow-lg border-2 border-red-200 dark:border-red-700">
                                <div class="w-8 h-8 bg-gradient-to-br from-red-500 to-orange-500 rounded"></div>
                            </div>
                        </div>
                        <h3 class="text-2xl font-bold text-red-900 dark:text-red-100 mb-3">சிவப்பு</h3>
                        <p class="text-base text-red-700/80 dark:text-red-200/70 leading-relaxed">புரட்சிகரப் பாதை</p>
                        <p class="text-sm text-red-600/70 dark:text-red-300/60 mt-2 italic">Revolutionary Path</p>
                    </div>
                </div>

                {{-- Star - Morning Star --}}
                <div class="group relative" data-aos="zoom-in" data-aos-delay="200">
                    <div class="absolute -inset-0.5 bg-gradient-to-r from-yellow-400 to-amber-500 rounded-3xl opacity-0 group-hover:opacity-100 blur transition duration-500"></div>
                    <div class="relative bg-gradient-to-br from-yellow-50 to-amber-50 dark:from-yellow-950/30 dark:to-amber-950/30 rounded-3xl p-8 border border-yellow-200 dark:border-yellow-800 transition-all duration-500 hover:shadow-2xl hover:-translate-y-2 h-full">
                        <div class="relative w-16 h-16 mb-6">
                            <div class="absolute inset-0 bg-gradient-to-br from-yellow-400 to-amber-500 rounded-2xl opacity-20 group-hover:opacity-30 transition-opacity"></div>
                            <div class="relative w-16 h-16 bg-white dark:bg-gray-900 rounded-2xl flex items-center justify-center group-hover:scale-110 transition-transform duration-500 shadow-lg border-2 border-yellow-200 dark:border-yellow-700">
                                <svg class="w-8 h-8 text-yellow-600 dark:text-yellow-400" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/>
                                </svg>
                            </div>
                        </div>
                        <h3 class="text-2xl font-bold text-yellow-900 dark:text-yellow-100 mb-3">நட்சத்திரம்</h3>
                        <p class="text-base text-yellow-700/80 dark:text-yellow-200/70 leading-relaxed">விடிவெள்ளி</p>
                        <p class="text-sm text-yellow-600/70 dark:text-yellow-300/60 mt-2 italic">Morning Star</p>
                    </div>
                </div>

                {{-- Panther - Freedom Fighter --}}
                <div class="group relative" data-aos="zoom-in" data-aos-delay="300">
                    <div class="absolute -inset-0.5 bg-gradient-to-r from-gray-700 to-gray-900 rounded-3xl opacity-0 group-hover:opacity-100 blur transition duration-500"></div>
                    <div class="relative bg-gradient-to-br from-gray-50 to-gray-100 dark:from-gray-900/30 dark:to-gray-800/30 rounded-3xl p-8 border border-gray-200 dark:border-gray-700 transition-all duration-500 hover:shadow-2xl hover:-translate-y-2 h-full">
                        <div class="relative w-16 h-16 mb-6">
                            <div class="absolute inset-0 bg-gradient-to-br from-gray-700 to-gray-900 rounded-2xl opacity-20 group-hover:opacity-30 transition-opacity"></div>
                            <div class="relative w-16 h-16 bg-white dark:bg-gray-900 rounded-2xl flex items-center justify-center group-hover:scale-110 transition-transform duration-500 shadow-lg border-2 border-gray-200 dark:border-gray-700">
                                <img src="{{ asset('assets/images/favicons/apple-touch-icon.png') }}" alt="Panther Icon" class="w-8 h-8 rounded">
                            </div>
                        </div>
                        <h3 class="text-2xl font-bold text-gray-900 dark:text-gray-100 mb-3">சிறுத்தை</h3>
                        <p class="text-base text-gray-700/80 dark:text-gray-200/70 leading-relaxed">விடுதலைப் போராளி</p>
                        <p class="text-sm text-gray-600/70 dark:text-gray-300/60 mt-2 italic">Freedom Fighter</p>
                    </div>
                </div>
            </div>

            {{-- Optional: Scroll indicator --}}
            <div class="text-center mt-16" data-aos="fade-up" data-aos-delay="400">
                <div class="inline-flex flex-col items-center">
                    <span class="text-sm text-gray-500 dark:text-gray-400 mb-2">Explore More</span>
                    <svg class="w-6 h-6 text-blue-600 dark:text-blue-400 animate-bounce" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3"></path>
                    </svg>
                </div>
            </div>
        </div>
    </section>

    {{-- Features Section - Full Screen with Consistent Design --}}
    <section id="features" class="relative min-h-screen flex items-center justify-center px-4 bg-gradient-to-br from-blue-50 via-white to-red-50 dark:from-gray-950 dark:via-gray-900 dark:to-blue-950/30 overflow-hidden">
        {{-- Background Elements --}}
        <div class="absolute inset-0 overflow-hidden pointer-events-none">
            <div class="absolute top-1/4 right-10 w-96 h-96 bg-blue-500/5 rounded-full blur-3xl"></div>
            <div class="absolute bottom-1/4 left-10 w-96 h-96 bg-red-500/5 rounded-full blur-3xl"></div>
        </div>

        <div class="max-w-7xl mx-auto w-full relative z-10 py-16">
            {{-- Section Header --}}
            <div class="text-center mb-16" data-aos="fade-up">
                <h2 class="text-5xl md:text-6xl lg:text-7xl font-bold text-gray-900 dark:text-white mb-6 tracking-tight">
                    {{ __('site.features.title') }}
                </h2>
                <p class="text-xl md:text-2xl text-gray-600 dark:text-gray-400 max-w-3xl mx-auto font-light">
                    {{ __('site.features.subtitle') }}
                </p>
            </div>

            {{-- Feature Cards --}}
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 lg:gap-10">
                {{-- Card 1 - Press Release (Blue Theme) --}}
                <div class="group scroll-reveal relative" data-aos="fade-up" data-aos-delay="0">
                    {{-- Card Content --}}
                    <div class="relative bg-white/80 dark:bg-gray-900/80 backdrop-blur-sm rounded-3xl p-8 border-2 border-blue-500 dark:border-blue-600 transition-all duration-500 hover:shadow-2xl hover:-translate-y-2 h-full text-center flex flex-col items-center">
                        {{-- Icon --}}
                        <div class="relative w-20 h-20 mb-6">
                            <div class="relative w-20 h-20 bg-gradient-to-br from-blue-500 to-blue-600 rounded-2xl flex items-center justify-center group-hover:scale-110 transition-transform duration-500 shadow-xl">
                                <svg class="w-10 h-10 text-white" fill="currentColor" viewBox="0 0 24 24">
                                    <path fill-rule="evenodd" d="M8 7V2.221a2 2 0 0 0-.5.365L3.586 6.5a2 2 0 0 0-.365.5H8Zm2 0V2h7a2 2 0 0 1 2 2v.126a5.087 5.087 0 0 0-4.74 1.368v.001l-6.642 6.642a3 3 0 0 0-.82 1.532l-.74 3.692a3 3 0 0 0 3.53 3.53l3.694-.738a3 3 0 0 0 1.532-.82L19 15.149V20a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V9h5a2 2 0 0 0 2-2Z" clip-rule="evenodd"/>
                                </svg>
                            </div>
                        </div>

                        <h3 class="text-2xl font-bold text-blue-900 dark:text-blue-100 mb-3">{{ __('site.menu.press_release') }}</h3>
                        <p class="text-base text-gray-700 dark:text-gray-300 leading-relaxed font-medium mb-6 flex-grow">
                            {{ __('site.home.press_release_description') }}
                        </p>

                        <a href="{{ route('press-releases') }}" class="inline-flex items-center text-blue-600 dark:text-blue-400 font-semibold group-hover:text-blue-700 dark:group-hover:text-blue-300 transition-colors mt-auto">
                            {{ __('site.features.explore') }}
                            <svg class="w-4 h-4 ml-2 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                            </svg>
                        </a>
                    </div>
                </div>

                {{-- Card 2 - Events (Blue Theme) --}}
                <div class="group scroll-reveal relative" data-aos="fade-up" data-aos-delay="100">
                    {{-- Card Content --}}
                    <div class="relative bg-white/80 dark:bg-gray-900/80 backdrop-blur-sm rounded-3xl p-8 border-2 border-blue-500 dark:border-blue-600 transition-all duration-500 hover:shadow-2xl hover:-translate-y-2 h-full text-center flex flex-col items-center">
                        {{-- Icon --}}
                        <div class="relative w-20 h-20 mb-6">
                            <div class="relative w-20 h-20 bg-gradient-to-br from-blue-500 to-blue-600 rounded-2xl flex items-center justify-center group-hover:scale-110 transition-transform duration-500 shadow-xl">
                                <svg class="w-10 h-10 text-white" fill="currentColor" viewBox="0 0 24 24">
                                    <path fill-rule="evenodd" d="M18.458 3.11A1 1 0 0 1 19 4v16a1 1 0 0 1-1.581.814L12 16.944V7.056l5.419-3.87a1 1 0 0 1 1.039-.076ZM22 12c0 1.48-.804 2.773-2 3.465v-6.93c1.196.692 2 1.984 2 3.465ZM10 8H4a1 1 0 0 0-1 1v6a1 1 0 0 0 1 1h6V8Zm0 9H5v3a1 1 0 0 0 1 1h3a1 1 0 0 0 1-1v-3Z" clip-rule="evenodd"/>
                                </svg>
                            </div>
                        </div>

                        <h3 class="text-2xl font-bold text-blue-900 dark:text-blue-100 mb-3">{{ __('site.home.events') }}</h3>
                        <p class="text-base text-gray-700 dark:text-gray-300 leading-relaxed font-medium mb-6 flex-grow">
                            {{ __('site.home.events_description') }}
                        </p>

                        <a href="{{ route('events') }}" class="inline-flex items-center text-blue-600 dark:text-blue-400 font-semibold group-hover:text-blue-700 dark:group-hover:text-blue-300 transition-colors mt-auto">
                            {{ __('site.features.explore') }}
                            <svg class="w-4 h-4 ml-2 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                            </svg>
                        </a>
                    </div>
                </div>

                {{-- Card 3 - Office Bearers (Blue Theme) --}}
                <div class="group scroll-reveal relative" data-aos="fade-up" data-aos-delay="200">
                    {{-- Card Content --}}
                    <div class="relative bg-white/80 dark:bg-gray-900/80 backdrop-blur-sm rounded-3xl p-8 border-2 border-blue-500 dark:border-blue-600 transition-all duration-500 hover:shadow-2xl hover:-translate-y-2 h-full text-center flex flex-col items-center">
                        {{-- Icon --}}
                        <div class="relative w-20 h-20 mb-6">
                            <div class="relative w-20 h-20 bg-gradient-to-br from-blue-500 to-blue-600 rounded-2xl flex items-center justify-center group-hover:scale-110 transition-transform duration-500 shadow-xl">
                                <svg class="w-10 h-10 text-white" fill="currentColor" viewBox="0 0 24 24">
                                    <path fill-rule="evenodd" d="M12 6a3.5 3.5 0 1 0 0 7 3.5 3.5 0 0 0 0-7Zm-1.5 8a4 4 0 0 0-4 4 2 2 0 0 0 2 2h7a2 2 0 0 0 2-2 4 4 0 0 0-4-4h-3Z" clip-rule="evenodd"/>
                                </svg>
                            </div>
                        </div>

                        <h3 class="text-2xl font-bold text-blue-900 dark:text-blue-100 mb-3">{{ __('site.features.office_bearers_title') }}</h3>
                        <p class="text-base text-gray-700 dark:text-gray-300 leading-relaxed font-medium mb-6 flex-grow">
                            {{ __('site.features.office_bearers_desc') }}
                        </p>

                        <a href="{{ route('office-bearers') }}" class="inline-flex items-center text-blue-600 dark:text-blue-400 font-semibold group-hover:text-blue-700 dark:group-hover:text-blue-300 transition-colors mt-auto">
                            {{ __('site.features.explore') }}
                            <svg class="w-4 h-4 ml-2 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>

            {{-- Scroll Indicator --}}
            <div class="text-center mt-16" data-aos="fade-up" data-aos-delay="300">
                <div class="inline-flex flex-col items-center">
                    <span class="text-sm text-gray-500 dark:text-gray-400 mb-2">{{ __('site.features.continue_exploring') }}</span>
                    <svg class="w-6 h-6 text-blue-600 dark:text-blue-400 animate-bounce" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3"></path>
                    </svg>
                </div>
            </div>
        </div>
    </section>

    {{-- Members Section - Full Screen Design --}}
    <section class="relative min-h-screen flex items-center justify-center px-4 bg-gradient-to-br from-white via-blue-50 to-cyan-50 dark:from-gray-950 dark:via-gray-900 dark:to-blue-950/30 overflow-hidden">
        {{-- Background Elements --}}
         <div class="absolute inset-0 z-0">
            <img src="{{ asset('assets/images/mla/bg.jpg') }}" alt="Background" class="w-full h-full object-cover opacity-90 dark:opacity-90">
            <div class="absolute inset-0 bg-gradient-to-b from-white/85 via-white/90 to-white/85 dark:from-gray-950/85 dark:via-gray-950/90 dark:to-gray-950/85"></div>
        </div>

        <div class="max-w-7xl mx-auto w-full relative z-10 py-16">
            {{-- Section Header --}}
            <div class="text-center mb-16" data-aos="fade-up">
                <h2 class="text-5xl md:text-6xl lg:text-7xl font-bold text-gray-900 dark:text-white mb-6 tracking-tight">
                    {{ __('site.home.elected_members_mp') }} & {{ __('site.home.elected_members_mla') }}
                </h2>
                <p class="text-xl md:text-2xl text-gray-600 dark:text-gray-400 max-w-3xl mx-auto font-light">
                    Our Representatives in Parliament and State Assembly
                </p>
            </div>

            {{-- All Members Grid - Single Page Layout --}}
            <div class="grid gap-6 lg:gap-8 grid-cols-2 md:grid-cols-3 lg:grid-cols-6">

                {{-- MP Card 1 --}}
                <div class="group relative" data-aos="fade-up" data-aos-delay="0">
                    {{-- Animated Border --}}
                    <div class="absolute -inset-0.5 bg-gradient-to-r from-blue-500 to-cyan-500 rounded-3xl opacity-0 group-hover:opacity-100 blur transition duration-500"></div>

                    <div class="relative bg-gradient-to-br from-blue-50 to-cyan-50 dark:from-blue-950/30 dark:to-cyan-950/30 rounded-3xl overflow-hidden border border-blue-200 dark:border-blue-800 transition-all duration-500 hover:shadow-2xl hover:-translate-y-2">
                        <div class="relative overflow-hidden aspect-[3/4]">
                            <img class="w-full h-full object-cover object-top transition-transform duration-700 group-hover:scale-105" src="{{ asset('assets/images/mla/thiruma.png') }}" alt="{{ __('site.home.member_1_name') }}">
                            <div class="absolute inset-0 bg-gradient-to-t from-blue-900/60 via-transparent to-transparent"></div>
                            <div class="absolute top-2 left-2 bg-gradient-to-r from-blue-600 to-cyan-600 text-white text-xs font-bold px-3 py-1.5 rounded-lg shadow-lg">MP</div>
                        </div>
                        <div class="p-4 text-center bg-white/50 dark:bg-gray-900/50 backdrop-blur-sm">
                            <h3 class="text-sm md:text-base font-bold text-blue-900 dark:text-blue-100 mb-1 line-clamp-2">
                                {{ __('site.home.member_1_name') }}
                            </h3>
                            <p class="text-xs text-red-600 dark:text-blue-400 font-medium line-clamp-1 mb-3">{{ __('site.home.member_1_position') }}</p>
                            <div class="flex justify-center gap-2">
                                <a href="#" class="text-blue-500 hover:text-blue-700 dark:hover:text-blue-300 transition-colors">
                                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/></svg>
                                </a>
                                <a href="#" class="text-blue-500 hover:text-blue-900 dark:hover:text-white transition-colors">
                                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z"/></svg>
                                </a>
                                <a href="#" class="text-blue-500 hover:text-cyan-600 dark:hover:text-cyan-400 transition-colors">
                                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/></svg>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- MP Card 2 --}}
                <div class="group relative" data-aos="fade-up" data-aos-delay="100">
                    {{-- Animated Border --}}
                    <div class="absolute -inset-0.5 bg-gradient-to-r from-blue-500 to-cyan-500 rounded-3xl opacity-0 group-hover:opacity-100 blur transition duration-500"></div>

                    <div class="relative bg-gradient-to-br from-blue-50 to-cyan-50 dark:from-blue-950/30 dark:to-cyan-950/30 rounded-3xl overflow-hidden border border-blue-200 dark:border-blue-800 transition-all duration-500 hover:shadow-2xl hover:-translate-y-2">
                        <div class="relative overflow-hidden aspect-[3/4]">
                            <img class="w-full h-full object-cover object-top transition-transform duration-700 group-hover:scale-105" src="{{ asset('assets/images/mla/ravi.png') }}" alt="{{ __('site.home.member_2_name') }}">
                            <div class="absolute inset-0 bg-gradient-to-t from-blue-900/60 via-transparent to-transparent"></div>
                            <div class="absolute top-2 left-2 bg-gradient-to-r from-blue-600 to-cyan-600 text-white text-xs font-bold px-3 py-1.5 rounded-lg shadow-lg">MP</div>
                        </div>
                        <div class="p-4 text-center bg-white/50 dark:bg-gray-900/50 backdrop-blur-sm">
                            <h3 class="text-sm md:text-base font-bold text-blue-900 dark:text-blue-100 mb-1 line-clamp-2">
                                {{ __('site.home.member_2_name') }}
                            </h3>
                            <p class="text-xs text-red-600 dark:text-blue-400 font-medium line-clamp-1 mb-3">{{ __('site.home.member_2_position') }}</p>
                            <div class="flex justify-center gap-2">
                                <a href="#" class="text-blue-500 hover:text-blue-700 dark:hover:text-blue-300 transition-colors">
                                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/></svg>
                                </a>
                                <a href="#" class="text-blue-500 hover:text-blue-900 dark:hover:text-white transition-colors">
                                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z"/></svg>
                                </a>
                                <a href="#" class="text-blue-500 hover:text-cyan-600 dark:hover:text-cyan-400 transition-colors">
                                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/></svg>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- MLA Card 1 --}}
                <div class="group relative" data-aos="fade-up" data-aos-delay="200">
                    {{-- Animated Border --}}
                    <div class="absolute -inset-0.5 bg-gradient-to-r from-blue-500 to-cyan-500 rounded-3xl opacity-0 group-hover:opacity-100 blur transition duration-500"></div>

                    <div class="relative bg-gradient-to-br from-blue-50 to-cyan-50 dark:from-blue-950/30 dark:to-cyan-950/30 rounded-3xl overflow-hidden border border-blue-200 dark:border-blue-800 transition-all duration-500 hover:shadow-2xl hover:-translate-y-2">
                        <div class="relative overflow-hidden aspect-[3/4]">
                            <img class="w-full h-full object-cover object-top transition-transform duration-700 group-hover:scale-105" src="{{ asset('assets/images/mla/sinthanai-1.png') }}" alt="{{ __('site.home.member_3_name') }}">
                            <div class="absolute inset-0 bg-gradient-to-t from-blue-900/60 via-transparent to-transparent"></div>
                            <div class="absolute top-2 left-2 bg-gradient-to-r from-blue-600 to-cyan-600 text-white text-xs font-bold px-3 py-1.5 rounded-lg shadow-lg">MLA</div>
                        </div>
                        <div class="p-4 text-center bg-white/50 dark:bg-gray-900/50 backdrop-blur-sm">
                            <h3 class="text-sm md:text-base font-bold text-blue-900 dark:text-blue-100 mb-1 line-clamp-2">
                                {{ __('site.home.member_3_name') }}
                            </h3>
                            <p class="text-xs text-blue-600 dark:text-blue-400 font-medium line-clamp-1 mb-3">{{ __('site.home.member_3_position') }}</p>
                            <div class="flex justify-center gap-2">
                                <a href="#" class="text-blue-500 hover:text-blue-700 dark:hover:text-blue-300 transition-colors">
                                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/></svg>
                                </a>
                                <a href="#" class="text-blue-500 hover:text-blue-900 dark:hover:text-white transition-colors">
                                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z"/></svg>
                                </a>
                                <a href="#" class="text-blue-500 hover:text-cyan-600 dark:hover:text-cyan-400 transition-colors">
                                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/></svg>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- MLA Card 2 --}}
                <div class="group relative" data-aos="fade-up" data-aos-delay="300">
                    {{-- Animated Border --}}
                    <div class="absolute -inset-0.5 bg-gradient-to-r from-blue-500 to-cyan-500 rounded-3xl opacity-0 group-hover:opacity-100 blur transition duration-500"></div>

                    <div class="relative bg-gradient-to-br from-blue-50 to-cyan-50 dark:from-blue-950/30 dark:to-cyan-950/30 rounded-3xl overflow-hidden border border-blue-200 dark:border-blue-800 transition-all duration-500 hover:shadow-2xl hover:-translate-y-2">
                        <div class="relative overflow-hidden aspect-[3/4]">
                            <img class="w-full h-full object-cover object-top transition-transform duration-700 group-hover:scale-105" src="{{ asset('assets/images/mla/aloor-1.png') }}" alt="{{ __('site.home.member_4_name') }}">
                            <div class="absolute inset-0 bg-gradient-to-t from-blue-900/60 via-transparent to-transparent"></div>
                            <div class="absolute top-2 left-2 bg-gradient-to-r from-blue-600 to-cyan-600 text-white text-xs font-bold px-3 py-1.5 rounded-lg shadow-lg">MLA</div>
                        </div>
                        <div class="p-4 text-center bg-white/50 dark:bg-gray-900/50 backdrop-blur-sm">
                            <h3 class="text-sm md:text-base font-bold text-blue-900 dark:text-blue-100 mb-1 line-clamp-2">
                                {{ __('site.home.member_4_name') }}
                            </h3>
                            <p class="text-xs text-blue-600 dark:text-blue-400 font-medium line-clamp-1 mb-3">{{ __('site.home.member_4_position') }}</p>
                            <div class="flex justify-center gap-2">
                                <a href="#" class="text-blue-500 hover:text-blue-700 dark:hover:text-blue-300 transition-colors">
                                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/></svg>
                                </a>
                                <a href="#" class="text-blue-500 hover:text-blue-900 dark:hover:text-white transition-colors">
                                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z"/></svg>
                                </a>
                                <a href="#" class="text-blue-500 hover:text-cyan-600 dark:hover:text-cyan-400 transition-colors">
                                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/></svg>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- MLA Card 3 --}}
                <div class="group relative" data-aos="fade-up" data-aos-delay="400">
                    {{-- Animated Border --}}
                    <div class="absolute -inset-0.5 bg-gradient-to-r from-blue-500 to-cyan-500 rounded-3xl opacity-0 group-hover:opacity-100 blur transition duration-500"></div>

                    <div class="relative bg-gradient-to-br from-blue-50 to-cyan-50 dark:from-blue-950/30 dark:to-cyan-950/30 rounded-3xl overflow-hidden border border-blue-200 dark:border-blue-800 transition-all duration-500 hover:shadow-2xl hover:-translate-y-2">
                        <div class="relative overflow-hidden aspect-[3/4]">
                            <img class="w-full h-full object-cover object-top transition-transform duration-700 group-hover:scale-105" src="{{ asset('assets/images/mla/babu-1.png') }}" alt="{{ __('site.home.member_5_name') }}">
                            <div class="absolute inset-0 bg-gradient-to-t from-blue-900/60 via-transparent to-transparent"></div>
                            <div class="absolute top-2 left-2 bg-gradient-to-r from-blue-600 to-cyan-600 text-white text-xs font-bold px-3 py-1.5 rounded-lg shadow-lg">MLA</div>
                        </div>
                        <div class="p-4 text-center bg-white/50 dark:bg-gray-900/50 backdrop-blur-sm">
                            <h3 class="text-sm md:text-base font-bold text-blue-900 dark:text-blue-100 mb-1 line-clamp-2">
                                {{ __('site.home.member_5_name') }}
                            </h3>
                            <p class="text-xs text-blue-600 dark:text-blue-400 font-medium line-clamp-1 mb-3">{{ __('site.home.member_5_position') }}</p>
                            <div class="flex justify-center gap-2">
                                <a href="#" class="text-blue-500 hover:text-blue-700 dark:hover:text-blue-300 transition-colors">
                                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/></svg>
                                </a>
                                <a href="#" class="text-blue-500 hover:text-blue-900 dark:hover:text-white transition-colors">
                                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z"/></svg>
                                </a>
                                <a href="#" class="text-blue-500 hover:text-cyan-600 dark:hover:text-cyan-400 transition-colors">
                                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/></svg>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- MLA Card 4 --}}
                <div class="group relative" data-aos="fade-up" data-aos-delay="500">
                    {{-- Animated Border --}}
                    <div class="absolute -inset-0.5 bg-gradient-to-r from-blue-500 to-cyan-500 rounded-3xl opacity-0 group-hover:opacity-100 blur transition duration-500"></div>

                    <div class="relative bg-gradient-to-br from-blue-50 to-cyan-50 dark:from-blue-950/30 dark:to-cyan-950/30 rounded-3xl overflow-hidden border border-blue-200 dark:border-blue-800 transition-all duration-500 hover:shadow-2xl hover:-translate-y-2">
                        <div class="relative overflow-hidden aspect-[3/4]">
                            <img class="w-full h-full object-cover object-top transition-transform duration-700 group-hover:scale-105" src="{{ asset('assets/images/mla/balaji-1.png') }}" alt="{{ __('site.home.member_6_name') }}">
                            <div class="absolute inset-0 bg-gradient-to-t from-blue-900/60 via-transparent to-transparent"></div>
                            <div class="absolute top-2 left-2 bg-gradient-to-r from-blue-600 to-cyan-600 text-white text-xs font-bold px-3 py-1.5 rounded-lg shadow-lg">MLA</div>
                        </div>
                        <div class="p-4 text-center bg-white/50 dark:bg-gray-900/50 backdrop-blur-sm">
                            <h3 class="text-sm md:text-base font-bold text-blue-900 dark:text-blue-100 mb-1 line-clamp-2">
                                {{ __('site.home.member_6_name') }}
                            </h3>
                            <p class="text-xs text-blue-600 dark:text-blue-400 font-medium line-clamp-1 mb-3">{{ __('site.home.member_6_position') }}</p>
                            <div class="flex justify-center gap-2">
                                <a href="#" class="text-blue-500 hover:text-blue-700 dark:hover:text-blue-300 transition-colors">
                                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/></svg>
                                </a>
                                <a href="#" class="text-blue-500 hover:text-blue-900 dark:hover:text-white transition-colors">
                                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z"/></svg>
                                </a>
                                <a href="#" class="text-blue-500 hover:text-cyan-600 dark:hover:text-cyan-400 transition-colors">
                                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/></svg>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    {{-- Latest News Section --}}
    @if($latest_news->isNotEmpty())
    <section id="latestnews" class="relative min-h-screen flex items-center justify-center px-4 bg-gradient-to-br from-blue-50 via-white to-red-50 dark:from-gray-950 dark:via-gray-900 dark:to-blue-950/30 overflow-hidden">
        {{-- Background Elements --}}
        <div class="absolute inset-0 overflow-hidden pointer-events-none">
            <div class="absolute top-20 left-10 w-72 h-72 bg-blue-500/10 rounded-full blur-3xl animate-pulse"></div>
            <div class="absolute bottom-20 right-10 w-96 h-96 bg-red-500/10 rounded-full blur-3xl animate-pulse" style="animation-delay: 1s"></div>
        </div>

        <div class="max-w-7xl mx-auto w-full relative z-10 py-16">
            {{-- Section Header --}}
            <div class="text-center mb-16" data-aos="fade-up">
                <h2 class="text-5xl md:text-6xl lg:text-7xl font-bold text-gray-900 dark:text-white mb-6 tracking-tight">
                    {{ __('site.menu.latest_news') }}
                </h2>
                <p class="text-xl md:text-2xl text-gray-600 dark:text-gray-400 max-w-3xl mx-auto font-light">
                    {{ __('site.home.latest_news_description_placeholder') }}
                </p>
            </div>

            {{-- News Navigation --}}
            <div class="flex justify-end mb-8">
                <div class="flex items-center gap-2">
                    <button id="news-scroll-left" class="group p-3 bg-gradient-to-br from-blue-500/20 to-red-500/20 hover:from-blue-500/30 hover:to-red-500/30 rounded-full transition-all duration-300 backdrop-blur-sm border border-blue-400/30 shadow-lg">
                        <svg class="w-5 h-5 text-gray-900 dark:text-white group-hover:scale-110 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                        </svg>
                    </button>
                    <button id="news-scroll-right" class="group p-3 bg-gradient-to-br from-blue-500/20 to-red-500/20 hover:from-blue-500/30 hover:to-red-500/30 rounded-full transition-all duration-300 backdrop-blur-sm border border-blue-400/30 shadow-lg">
                        <svg class="w-5 h-5 text-gray-900 dark:text-white group-hover:scale-110 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                        </svg>
                    </button>
                </div>
            </div>

            {{-- News Scrollable Container --}}
            <div class="relative">
                <div id="news-scroll-container" class="flex gap-6 overflow-x-auto scrollbar-hide scroll-smooth pb-6" style="scrollbar-width: none; -ms-overflow-style: none;">
                    @foreach($latest_news as $index => $latest_new)
                    <article class="group relative flex-shrink-0 w-80 md:w-96" data-aos="fade-up" data-aos-delay="{{ $index * 100 }}">
                        {{-- Animated Border --}}
                        <div class="absolute -inset-0.5 bg-gradient-to-r from-blue-500 to-red-600 rounded-3xl opacity-0 group-hover:opacity-100 blur transition duration-500"></div>

                        {{-- News Card --}}
                        <a href="{{ route('media.show', $latest_new->slug) }}" class="relative block bg-gradient-to-br from-blue-50 to-red-50 dark:from-blue-950/30 dark:to-red-950/30 rounded-3xl overflow-hidden border border-blue-200 dark:border-blue-800 transition-all duration-500 hover:shadow-2xl hover:-translate-y-2 h-full">
                            {{-- Image --}}
                            <div class="relative aspect-video overflow-hidden">
                                <img
                                    src="{{ $latest_new->featured_image_url }}"
                                    alt="{{ app()->getLocale() === 'ta' ? $latest_new->title_ta : $latest_new->title_en }}"
                                    class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110"
                                    loading="lazy"
                                >
                                <div class="absolute inset-0 bg-gradient-to-t from-black via-black/50 to-transparent opacity-60 group-hover:opacity-80 transition-opacity duration-300"></div>

                                {{-- Featured Badge --}}
                                @if($index === 0)
                                <div class="absolute top-3 left-3 bg-gradient-to-r from-blue-600 to-red-600 text-white text-xs font-bold px-3 py-1.5 rounded-lg shadow-lg uppercase">
                                    Featured
                                </div>
                                @endif

                                {{-- News Badge --}}
                                <div class="absolute top-3 right-3 bg-gradient-to-r from-blue-600 to-red-600 text-white text-xs font-bold px-3 py-1.5 rounded-lg shadow-lg flex items-center gap-1.5">
                                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"></path>
                                    </svg>
                                    <span>News</span>
                                </div>
                            </div>

                            {{-- Content --}}
                            <div class="p-6 bg-white/50 dark:bg-gray-900/50 backdrop-blur-sm">
                                <time class="text-xs text-blue-600 dark:text-blue-400 mb-3 flex items-center gap-1.5 font-medium">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                    </svg>
                                    {{ $latest_new->event_date ? $latest_new->event_date->format('M j, Y') : 'N/A' }}
                                </time>

                                <h3 class="text-lg font-bold text-blue-900 dark:text-blue-100 mb-3 line-clamp-2">
                                    {{ app()->getLocale() === 'ta' ? $latest_new->title_ta : $latest_new->title_en }}
                                </h3>

                                <span class="inline-flex items-center text-blue-600 dark:text-blue-400 font-semibold group-hover:text-blue-700 dark:group-hover:text-blue-300 transition-colors">
                                    Read more
                                    <svg class="w-4 h-4 ml-2 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                    </svg>
                                </span>
                            </div>
                        </a>
                    </article>
                    @endforeach
                </div>

                {{-- Progress Bar --}}
                <div class="mt-8 h-1.5 bg-gray-200 dark:bg-gray-800 rounded-full overflow-hidden">
                    <div id="news-scroll-progress" class="h-full bg-gradient-to-r from-blue-600 to-red-600 rounded-full transition-all duration-300" style="width: 0%"></div>
                </div>
            </div>

            {{-- View All Link --}}
            <div class="text-center mt-12" data-aos="fade-up" data-aos-delay="200">
                <a href="{{ route('latest-news') }}" class="inline-flex items-center text-blue-600 dark:text-blue-400 font-semibold hover:text-blue-700 dark:hover:text-blue-300 transition-colors group text-lg">
                    View All News
                    <svg class="w-5 h-5 ml-2 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                    </svg>
                </a>
            </div>

            {{-- Mobile Swipe Hint --}}
            <div class="md:hidden flex items-center justify-center gap-2 mt-8 text-blue-600 dark:text-blue-400 text-sm">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16l-4-4m0 0l4-4m-4 4h18"></path>
                </svg>
                <span>Swipe to explore</span>
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                </svg>
            </div>

            {{-- Scroll Indicator --}}
            <div class="text-center mt-16" data-aos="fade-up" data-aos-delay="300">
                <div class="inline-flex flex-col items-center">
                    <span class="text-sm text-gray-500 dark:text-gray-400 mb-2">Continue Exploring</span>
                    <svg class="w-6 h-6 text-blue-600 dark:text-blue-400 animate-bounce" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3"></path>
                    </svg>
                </div>
            </div>
        </div>
    </section>
    @endif


 {{-- Videos Content (YouTube Channel Style) --}}
    <section class="relative min-h-screen flex items-center justify-center py-24 lg:py-32 px-4 bg-gradient-to-br from-gray-50 via-white to-blue-50 dark:from-gray-950 dark:via-gray-900 dark:to-blue-950/30 overflow-hidden">
        {{-- Background Elements --}}
        <div class="absolute inset-0 overflow-hidden pointer-events-none">
            <div class="absolute top-1/4 right-10 w-96 h-96 bg-blue-500/10 rounded-full blur-3xl animate-pulse"></div>
            <div class="absolute bottom-1/4 left-10 w-96 h-96 bg-cyan-500/10 rounded-full blur-3xl animate-pulse" style="animation-delay: 1s;"></div>
        </div>

        <div class="max-w-7xl mx-auto w-full relative z-10">
            {{-- Section Header --}}
            <div class="flex flex-col md:flex-row items-start md:items-end justify-between mb-16 gap-6">
                <div>
                    <h2 class="text-4xl md:text-5xl lg:text-6xl font-bold text-gray-900 dark:text-white mb-3 tracking-tight">{{ __('site.menu.videos') }}</h2>
                    <p class="text-lg text-blue-600 dark:text-blue-300/80">
                        {{ __('site.home.videos_subtitle_placeholder_2') }}
                    </p>
                </div>
                <a href="{{ route('videos') }}" class="group relative hidden md:inline-flex items-center px-8 py-4 bg-gradient-to-r from-blue-600 to-cyan-600 hover:from-blue-500 hover:to-cyan-500 text-white font-semibold rounded-full transition-all duration-300 hover:scale-105 shadow-xl">
                    <div class="absolute -inset-0.5 bg-gradient-to-r from-blue-600 to-cyan-600 rounded-full opacity-0 group-hover:opacity-30 blur transition duration-300"></div>
                    <span class="relative">View All</span>
                    <svg class="w-5 h-5 ml-2 relative group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                    </svg>
                </a>
            </div>

            @if($videos->isNotEmpty())
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
                @foreach($videos as $video)
                @php
                    $videoId = null;
                    if (preg_match('/(?:youtube\.com\/watch\?v=|youtu\.be\/|youtube\.com\/embed\/)([a-zA-Z0-9_-]{11})/', $video->video_link, $matches)) {
                        $videoId = $matches[1];
                    }
                    $thumbnail = $videoId ? "https://img.youtube.com/vi/{$videoId}/maxresdefault.jpg" : asset('assets/images/placeholder.jpg');
                @endphp

                {{-- YouTube-style Video Card with Blue Cyan Theme --}}
                <div class="group relative scroll-reveal cursor-pointer video-thumbnail transition-all duration-500 hover:-translate-y-2" data-video-id="{{ $videoId }}" data-video-url="{{ $video->video_link }}">
                    {{-- Animated Border --}}
                    <div class="absolute -inset-0.5 bg-gradient-to-r from-blue-500 to-cyan-500 rounded-3xl opacity-0 group-hover:opacity-100 blur transition duration-500"></div>

                    <div class="relative bg-white dark:bg-gray-900 rounded-3xl overflow-hidden border border-blue-200 dark:border-blue-800 transition-all duration-500 group-hover:shadow-2xl">
                        {{-- Thumbnail --}}
                        <div class="relative aspect-video overflow-hidden bg-gray-200 dark:bg-gray-800">
                            <img src="{{ $thumbnail }}" alt="{{ app()->getLocale() === 'ta' ? $video->title_ta : $video->title_en }}" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110">

                            {{-- Gradient Overlay --}}
                            <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-transparent opacity-60 group-hover:opacity-80 transition-opacity duration-300"></div>

                            {{-- Play Button Overlay --}}
                            <div class="absolute inset-0 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-all duration-300">
                                <div class="bg-gradient-to-br from-blue-600 to-cyan-600 hover:from-blue-500 hover:to-cyan-500 rounded-full p-4 transform scale-75 group-hover:scale-100 transition-transform duration-300 shadow-2xl ring-4 ring-blue-500/30">
                                    <svg class="w-8 h-8 text-white" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M6.3 2.841A1.5 1.5 0 004 4.11V15.89a1.5 1.5 0 002.3 1.269l9.344-5.89a1.5 1.5 0 000-2.538L6.3 2.84z"/>
                                    </svg>
                                </div>
                            </div>

                            {{-- Duration Badge --}}
                            <div class="absolute top-3 right-3 bg-gradient-to-r from-blue-600 to-cyan-600 text-white text-xs px-3 py-1.5 rounded-full font-semibold shadow-lg flex items-center gap-1">
                                <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 24 24"><path d="M23.498 6.186a3.016 3.016 0 0 0-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 0 0 .502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 0 0 2.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 0 0 2.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z"/></svg>
                                <span>Video</span>
                            </div>
                        </div>

                        {{-- Video Info --}}
                        <div class="p-4">
                            <div class="flex gap-3">
                                {{-- Channel Avatar --}}
                                <div class="flex-shrink-0">
                                    <div class="w-10 h-10 rounded-full bg-gradient-to-br from-blue-600 to-cyan-600 flex items-center justify-center text-white font-bold shadow-lg">
                                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                            <path d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z"/>
                                        </svg>
                                    </div>
                                </div>

                                {{-- Title and Meta --}}
                                <div class="flex-1 min-w-0">
                                    <h3 class="text-sm font-semibold text-gray-900 dark:text-white mb-2 line-clamp-2 leading-snug group-hover:text-blue-600 dark:group-hover:text-cyan-400 transition-colors">
                                        {!! app()->getLocale() === 'ta' ? $video->title_ta : $video->title_en !!}
                                    </h3>
                                    <p class="text-xs font-medium text-blue-600 dark:text-blue-400 mb-1">VCK Official</p>
                                    <div class="flex items-center text-xs text-gray-500 dark:text-gray-400">
                                        <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                        </svg>
                                        <span>{{ $video->event_date ? $video->event_date->format('M j, Y') : '' }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

            {{-- View All Button (Mobile) --}}
            <div class="md:hidden text-center mt-16">
                <a href="{{ route('videos') }}" class="group relative inline-flex items-center px-10 py-5 bg-gradient-to-r from-blue-600 to-cyan-600 hover:from-blue-500 hover:to-cyan-500 text-white font-semibold rounded-full transition-all duration-300 hover:scale-105 shadow-2xl">
                    <div class="absolute -inset-0.5 bg-gradient-to-r from-blue-600 to-cyan-600 rounded-full opacity-0 group-hover:opacity-30 blur transition duration-300"></div>
                    <span class="relative">View All Videos</span>
                    <svg class="w-5 h-5 ml-2 relative group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                    </svg>
                </a>
            </div>
            @else
            <div class="text-center py-20">
                <div class="relative w-24 h-24 mx-auto mb-6">
                    <div class="absolute inset-0 bg-gradient-to-br from-blue-500/20 to-cyan-500/20 rounded-full blur-xl"></div>
                    <div class="relative w-24 h-24 bg-gradient-to-br from-blue-500/30 to-cyan-500/30 rounded-full flex items-center justify-center border border-blue-400/30 backdrop-blur-sm">
                        <svg class="w-12 h-12 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z"></path>
                        </svg>
                    </div>
                </div>
                <h2 class="text-2xl md:text-3xl font-bold text-gray-900 dark:text-white mb-3">{{ __('site.videos.no_videos') }}</h2>
                <p class="text-blue-600 dark:text-blue-300/80">{{ __('site.press_releases.check_back') }}</p>
            </div>
            @endif
        </div>
    </section>

    {{-- Modal for video playback --}}
    <div id="video-modal" class="fixed inset-0 bg-black bg-opacity-80 z-50 hidden items-center justify-center p-4">
        <div class="relative w-full max-w-4xl mx-4 bg-black rounded-lg shadow-2xl">
            <button id="close-modal" class="absolute -top-4 -right-4 md:top-0 md:-right-10 text-white text-4xl hover:text-gray-300 transition-colors z-50">&times;</button>
            <div class="aspect-video">
                <iframe id="video-iframe" class="w-full h-full rounded-lg" src="" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen referrerpolicy="strict-origin-when-cross-origin"></iframe>
            </div>
        </div>
    </div>


    {{-- Gallery Section - Masonry Grid --}}
    @if($gallery->isNotEmpty())
    <section class="relative min-h-screen flex items-center justify-center px-4 bg-gradient-to-br from-blue-50 via-white to-red-50 dark:from-gray-950 dark:via-gray-900 dark:to-blue-950/30 overflow-hidden">
        {{-- Background Elements --}}
        <div class="absolute inset-0 overflow-hidden pointer-events-none">
            <div class="absolute top-20 left-10 w-72 h-72 bg-blue-500/10 rounded-full blur-3xl animate-pulse"></div>
            <div class="absolute bottom-20 right-10 w-96 h-96 bg-red-500/10 rounded-full blur-3xl animate-pulse" style="animation-delay: 1s"></div>
        </div>

        <div class="max-w-7xl mx-auto w-full relative z-10 py-20 lg:py-28">
            {{-- Section Header --}}
            <div class="text-center mb-16" data-aos="fade-up">
                <h2 class="text-5xl md:text-6xl lg:text-7xl font-bold text-gray-900 dark:text-white mb-6 tracking-tight">
                    {{ __('site.menu.gallery') }}
                </h2>
                <p class="text-xl md:text-2xl text-gray-600 dark:text-gray-400 max-w-3xl mx-auto font-light">
                    {{ __('site.gallery.subtitle_placeholder') }}
                </p>
            </div>

            {{-- Masonry Gallery Grid --}}
            <div class="flex flex-wrap md:-m-2 -m-1">
                @php
                    $galleryItems = $gallery->take(6)->values();
                @endphp

                {{-- Left Column --}}
                <div class="flex flex-wrap w-full md:w-1/2">
                    @if(isset($galleryItems[0]))
                    <div class="md:p-2 p-1 w-1/2" data-aos="fade-up" data-aos-delay="0">
                        <a href="{{ route('media.show', $galleryItems[0]->slug) }}" class="group relative block">
                            <div class="absolute -inset-0.5 bg-gradient-to-r from-blue-500 to-red-600 rounded-2xl opacity-0 group-hover:opacity-100 blur transition duration-500"></div>
                            <div class="relative overflow-hidden rounded-2xl border-2 border-blue-200 dark:border-blue-800 transition-all duration-500 hover:shadow-2xl hover:-translate-y-1">
                                @if($galleryItems[0]->featured_image_url)
                                    <img src="{{ $galleryItems[0]->featured_image_url }}" alt="{{ app()->getLocale() === 'ta' ? $galleryItems[0]->title_ta : $galleryItems[0]->title_en }}" class="w-full h-full object-cover object-center transition-transform duration-700 group-hover:scale-110 aspect-[4/3]" loading="lazy">
                                @else
                                    <div class="w-full aspect-[4/3] bg-gradient-to-br from-blue-900/30 to-red-900/30 flex items-center justify-center">
                                        <svg class="w-16 h-16 text-blue-500/50" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                        </svg>
                                    </div>
                                @endif
                                <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/40 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-end p-4">
                                    <p class="text-white text-sm font-semibold line-clamp-2">{{ app()->getLocale() === 'ta' ? $galleryItems[0]->title_ta : $galleryItems[0]->title_en }}</p>
                                </div>
                            </div>
                        </a>
                    </div>
                    @endif

                    @if(isset($galleryItems[1]))
                    <div class="md:p-2 p-1 w-1/2" data-aos="fade-up" data-aos-delay="100">
                        <a href="{{ route('media.show', $galleryItems[1]->slug) }}" class="group relative block">
                            <div class="absolute -inset-0.5 bg-gradient-to-r from-blue-500 to-red-600 rounded-2xl opacity-0 group-hover:opacity-100 blur transition duration-500"></div>
                            <div class="relative overflow-hidden rounded-2xl border-2 border-blue-200 dark:border-blue-800 transition-all duration-500 hover:shadow-2xl hover:-translate-y-1">
                                @if($galleryItems[1]->featured_image_url)
                                    <img src="{{ $galleryItems[1]->featured_image_url }}" alt="{{ app()->getLocale() === 'ta' ? $galleryItems[1]->title_ta : $galleryItems[1]->title_en }}" class="w-full h-full object-cover object-center transition-transform duration-700 group-hover:scale-110 aspect-[4/3]" loading="lazy">
                                @else
                                    <div class="w-full aspect-[4/3] bg-gradient-to-br from-blue-900/30 to-red-900/30 flex items-center justify-center">
                                        <svg class="w-16 h-16 text-blue-500/50" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                        </svg>
                                    </div>
                                @endif
                                <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/40 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-end p-4">
                                    <p class="text-white text-sm font-semibold line-clamp-2">{{ app()->getLocale() === 'ta' ? $galleryItems[1]->title_ta : $galleryItems[1]->title_en }}</p>
                                </div>
                            </div>
                        </a>
                    </div>
                    @endif

                    @if(isset($galleryItems[2]))
                    <div class="md:p-2 p-1 w-full" data-aos="fade-up" data-aos-delay="200">
                        <a href="{{ route('media.show', $galleryItems[2]->slug) }}" class="group relative block">
                            <div class="absolute -inset-0.5 bg-gradient-to-r from-blue-500 to-red-600 rounded-2xl opacity-0 group-hover:opacity-100 blur transition duration-500"></div>
                            <div class="relative overflow-hidden rounded-2xl border-2 border-blue-200 dark:border-blue-800 transition-all duration-500 hover:shadow-2xl hover:-translate-y-1">
                                @if($galleryItems[2]->featured_image_url)
                                    <img src="{{ $galleryItems[2]->featured_image_url }}" alt="{{ app()->getLocale() === 'ta' ? $galleryItems[2]->title_ta : $galleryItems[2]->title_en }}" class="w-full h-full object-cover object-center transition-transform duration-700 group-hover:scale-110 aspect-[16/9]" loading="lazy">
                                @else
                                    <div class="w-full aspect-[16/9] bg-gradient-to-br from-blue-900/30 to-red-900/30 flex items-center justify-center">
                                        <svg class="w-16 h-16 text-blue-500/50" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                        </svg>
                                    </div>
                                @endif
                                <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/40 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-end p-4">
                                    <p class="text-white text-sm font-semibold line-clamp-2">{{ app()->getLocale() === 'ta' ? $galleryItems[2]->title_ta : $galleryItems[2]->title_en }}</p>
                                </div>
                            </div>
                        </a>
                    </div>
                    @endif
                </div>

                {{-- Right Column --}}
                <div class="flex flex-wrap w-full md:w-1/2">
                    @if(isset($galleryItems[3]))
                    <div class="md:p-2 p-1 w-full" data-aos="fade-up" data-aos-delay="300">
                        <a href="{{ route('media.show', $galleryItems[3]->slug) }}" class="group relative block">
                            <div class="absolute -inset-0.5 bg-gradient-to-r from-blue-500 to-red-600 rounded-2xl opacity-0 group-hover:opacity-100 blur transition duration-500"></div>
                            <div class="relative overflow-hidden rounded-2xl border-2 border-blue-200 dark:border-blue-800 transition-all duration-500 hover:shadow-2xl hover:-translate-y-1">
                                @if($galleryItems[3]->featured_image_url)
                                    <img src="{{ $galleryItems[3]->featured_image_url }}" alt="{{ app()->getLocale() === 'ta' ? $galleryItems[3]->title_ta : $galleryItems[3]->title_en }}" class="w-full h-full object-cover object-center transition-transform duration-700 group-hover:scale-110 aspect-[16/9]" loading="lazy">
                                @else
                                    <div class="w-full aspect-[16/9] bg-gradient-to-br from-blue-900/30 to-red-900/30 flex items-center justify-center">
                                        <svg class="w-16 h-16 text-blue-500/50" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                        </svg>
                                    </div>
                                @endif
                                <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/40 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-end p-4">
                                    <p class="text-white text-sm font-semibold line-clamp-2">{{ app()->getLocale() === 'ta' ? $galleryItems[3]->title_ta : $galleryItems[3]->title_en }}</p>
                                </div>
                            </div>
                        </a>
                    </div>
                    @endif

                    @if(isset($galleryItems[4]))
                    <div class="md:p-2 p-1 w-1/2" data-aos="fade-up" data-aos-delay="400">
                        <a href="{{ route('media.show', $galleryItems[4]->slug) }}" class="group relative block">
                            <div class="absolute -inset-0.5 bg-gradient-to-r from-blue-500 to-red-600 rounded-2xl opacity-0 group-hover:opacity-100 blur transition duration-500"></div>
                            <div class="relative overflow-hidden rounded-2xl border-2 border-blue-200 dark:border-blue-800 transition-all duration-500 hover:shadow-2xl hover:-translate-y-1">
                                @if($galleryItems[4]->featured_image_url)
                                    <img src="{{ $galleryItems[4]->featured_image_url }}" alt="{{ app()->getLocale() === 'ta' ? $galleryItems[4]->title_ta : $galleryItems[4]->title_en }}" class="w-full h-full object-cover object-center transition-transform duration-700 group-hover:scale-110 aspect-[4/3]" loading="lazy">
                                @else
                                    <div class="w-full aspect-[4/3] bg-gradient-to-br from-blue-900/30 to-red-900/30 flex items-center justify-center">
                                        <svg class="w-16 h-16 text-blue-500/50" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                        </svg>
                                    </div>
                                @endif
                                <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/40 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-end p-4">
                                    <p class="text-white text-sm font-semibold line-clamp-2">{{ app()->getLocale() === 'ta' ? $galleryItems[4]->title_ta : $galleryItems[4]->title_en }}</p>
                                </div>
                            </div>
                        </a>
                    </div>
                    @endif

                    @if(isset($galleryItems[5]))
                    <div class="md:p-2 p-1 w-1/2" data-aos="fade-up" data-aos-delay="500">
                        <a href="{{ route('media.show', $galleryItems[5]->slug) }}" class="group relative block">
                            <div class="absolute -inset-0.5 bg-gradient-to-r from-blue-500 to-red-600 rounded-2xl opacity-0 group-hover:opacity-100 blur transition duration-500"></div>
                            <div class="relative overflow-hidden rounded-2xl border-2 border-blue-200 dark:border-blue-800 transition-all duration-500 hover:shadow-2xl hover:-translate-y-1">
                                @if($galleryItems[5]->featured_image_url)
                                    <img src="{{ $galleryItems[5]->featured_image_url }}" alt="{{ app()->getLocale() === 'ta' ? $galleryItems[5]->title_ta : $galleryItems[5]->title_en }}" class="w-full h-full object-cover object-center transition-transform duration-700 group-hover:scale-110 aspect-[4/3]" loading="lazy">
                                @else
                                    <div class="w-full aspect-[4/3] bg-gradient-to-br from-blue-900/30 to-red-900/30 flex items-center justify-center">
                                        <svg class="w-16 h-16 text-blue-500/50" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                        </svg>
                                    </div>
                                @endif
                                <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/40 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-end p-4">
                                    <p class="text-white text-sm font-semibold line-clamp-2">{{ app()->getLocale() === 'ta' ? $galleryItems[5]->title_ta : $galleryItems[5]->title_en }}</p>
                                </div>
                            </div>
                        </a>
                    </div>
                    @endif
                </div>
            </div>

            {{-- View All Gallery Link --}}
            <div class="text-center mt-12" data-aos="fade-up" data-aos-delay="600">
                <a href="{{ route('gallery') }}" class="inline-flex items-center text-blue-600 dark:text-blue-400 font-semibold hover:text-blue-700 dark:hover:text-blue-300 transition-colors group text-lg">
                    View Full Gallery
                    <svg class="w-5 h-5 ml-2 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                    </svg>
                </a>
            </div>

            {{-- Scroll Indicator --}}
            <div class="text-center mt-16" data-aos="fade-up" data-aos-delay="700">
                <div class="inline-flex flex-col items-center">
                    <span class="text-sm text-gray-500 dark:text-gray-400 mb-2">Continue Exploring</span>
                    <svg class="w-6 h-6 text-blue-600 dark:text-blue-400 animate-bounce" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3"></path>
                    </svg>
                </div>
            </div>
        </div>
    </section>
    @endif

    {{-- History Timeline Section --}}
    <section class="relative min-h-screen flex items-center justify-center px-4 bg-gradient-to-br from-blue-50 via-white to-red-50 dark:from-gray-950 dark:via-gray-900 dark:to-blue-950/30 overflow-hidden">
        {{-- Background Elements --}}
        <div class="absolute inset-0 overflow-hidden pointer-events-none">
            <div class="absolute top-20 left-10 w-72 h-72 bg-blue-500/10 rounded-full blur-3xl animate-pulse"></div>
            <div class="absolute bottom-20 right-10 w-96 h-96 bg-red-500/10 rounded-full blur-3xl animate-pulse" style="animation-delay: 1s"></div>
        </div>

        <div class="max-w-7xl mx-auto w-full relative z-10 py-16">
            {{-- Section Header --}}
            <div class="text-center mb-16" data-aos="fade-up">
                <h2 class="text-5xl md:text-6xl lg:text-7xl font-bold text-gray-900 dark:text-white mb-6 tracking-tight">
                    {{ __('site.history.milestones') }}
                </h2>
                <p class="text-xl md:text-2xl text-gray-600 dark:text-gray-400 max-w-3xl mx-auto font-light">
                    Key moments that shaped our journey
                </p>
            </div>

            {{-- Timeline Navigation --}}
            <div class="flex justify-end mb-8">
                <div class="flex items-center gap-2">
                    <button id="timeline-scroll-left" class="group p-3 bg-gradient-to-br from-blue-500/20 to-red-500/20 hover:from-blue-500/30 hover:to-red-500/30 rounded-full transition-all duration-300 backdrop-blur-sm border border-blue-400/30 shadow-lg">
                        <svg class="w-5 h-5 text-gray-900 dark:text-white group-hover:scale-110 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                        </svg>
                    </button>
                    <button id="timeline-scroll-right" class="group p-3 bg-gradient-to-br from-blue-500/20 to-red-500/20 hover:from-blue-500/30 hover:to-red-500/30 rounded-full transition-all duration-300 backdrop-blur-sm border border-blue-400/30 shadow-lg">
                        <svg class="w-5 h-5 text-gray-900 dark:text-white group-hover:scale-110 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                        </svg>
                    </button>
                </div>
            </div>

            {{-- Timeline Scrollable Container --}}
            <div class="relative">
                <div id="timeline-scroll-container" class="flex gap-6 overflow-x-auto scrollbar-hide scroll-smooth pb-6" style="scrollbar-width: none; -ms-overflow-style: none;">
                    @php
                        $timeline = [
                            ['year' => '1972', 'title' => __('site.history.1972_title'), 'desc' => __('site.history.1972_desc'), 'image' => 'assets/images/history/milestone-2016.jpeg'],
                            ['year' => '1990', 'title' => __('site.history.1990_title'), 'desc' => __('site.history.1990_desc'), 'image' => 'assets/images/history/milestone-2018.jpeg'],
                            ['year' => '1999', 'title' => __('site.history.1999_title'), 'desc' => __('site.history.1999_desc'), 'image' => 'assets/images/history/milestone-2020.jpeg'],
                            ['year' => '2001', 'title' => __('site.history.2001_title'), 'desc' => __('site.history.2001_desc'), 'image' => 'assets/images/history/milestone-2022.jpg'],
                            ['year' => '2009', 'title' => __('site.history.2009_title'), 'desc' => __('site.history.2009_desc'), 'image' => 'assets/images/history/milestone-2024.jpg'],
                            ['year' => '2019', 'title' => __('site.history.2019_title'), 'desc' => __('site.history.2019_desc'), 'image' => 'assets/images/history/milestone-2022.jpg'],
                            ['year' => '2021', 'title' => __('site.history.2021_title'), 'desc' => __('site.history.2021_desc'), 'image' => 'assets/images/history/milestone-2024.jpg'],
                            ['year' => '2024', 'title' => __('site.history.2024_title'), 'desc' => __('site.history.2024_desc'), 'image' => 'assets/images/history/milestone-2022.jpg'],
                        ];
                    @endphp

                    @foreach($timeline as $index => $item)
                    <div class="group relative flex-shrink-0 w-80 md:w-96" data-aos="fade-up" data-aos-delay="{{ $index * 100 }}">
                        {{-- Animated Border --}}
                        <div class="absolute -inset-0.5 bg-gradient-to-r from-blue-500 to-red-600 rounded-3xl opacity-0 group-hover:opacity-100 blur transition duration-500"></div>

                        {{-- Timeline Card --}}
                        <div class="relative bg-gradient-to-br from-blue-50 to-red-50 dark:from-blue-950/30 dark:to-red-950/30 rounded-3xl overflow-hidden border border-blue-200 dark:border-blue-800 transition-all duration-500 hover:shadow-2xl hover:-translate-y-2 h-full">
                            {{-- Image --}}
                            <div class="relative aspect-video overflow-hidden">
                                <img
                                    src="{{ asset($item['image']) }}"
                                    alt="{{ $item['title'] }}"
                                    class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110"
                                    loading="lazy"
                                >
                                <div class="absolute inset-0 bg-gradient-to-t from-black via-black/50 to-transparent opacity-60 group-hover:opacity-80 transition-opacity duration-300"></div>

                                {{-- Year Badge --}}
                                <div class="absolute top-3 right-3 bg-gradient-to-r from-blue-600 to-red-600 text-white text-sm font-bold px-4 py-2 rounded-lg shadow-lg">
                                    {{ $item['year'] }}
                                </div>

                                {{-- Timeline Icon --}}
                                <div class="absolute top-3 left-3">
                                    <div class="w-10 h-10 rounded-full bg-gradient-to-br from-blue-600 to-red-600 border-4 border-white dark:border-gray-900 shadow-lg flex items-center justify-center">
                                        <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                                        </svg>
                                    </div>
                                </div>
                            </div>

                            {{-- Content --}}
                            <div class="p-6 bg-white/50 dark:bg-gray-900/50 backdrop-blur-sm">
                                <h3 class="text-lg font-bold text-blue-900 dark:text-blue-100 mb-3 line-clamp-2">
                                    {{ $item['title'] }}
                                </h3>
                                <p class="text-sm text-blue-700/80 dark:text-blue-200/70 line-clamp-3">
                                    {{ $item['desc'] }}
                                </p>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>

                {{-- Progress Bar --}}
                <div class="mt-8 h-1.5 bg-gray-200 dark:bg-gray-800 rounded-full overflow-hidden">
                    <div id="timeline-scroll-progress" class="h-full bg-gradient-to-r from-blue-600 to-red-600 rounded-full transition-all duration-300" style="width: 0%"></div>
                </div>
            </div>

            {{-- View Full History Link --}}
            <div class="text-center mt-12" data-aos="fade-up" data-aos-delay="200">
                <a href="{{ route('history') }}" class="inline-flex items-center text-blue-600 dark:text-blue-400 font-semibold hover:text-blue-700 dark:hover:text-blue-300 transition-colors group text-lg">
                    View Full History
                    <svg class="w-5 h-5 ml-2 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                    </svg>
                </a>
            </div>

            {{-- Mobile Swipe Hint --}}
            <div class="md:hidden flex items-center justify-center gap-2 mt-8 text-blue-600 dark:text-blue-400 text-sm">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16l-4-4m0 0l4-4m-4 4h18"></path>
                </svg>
                <span>Swipe to explore</span>
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                </svg>
            </div>

            {{-- Scroll Indicator --}}
            <div class="text-center mt-16" data-aos="fade-up" data-aos-delay="300">
                <div class="inline-flex flex-col items-center">
                    <span class="text-sm text-gray-500 dark:text-gray-400 mb-2">Continue Exploring</span>
                    <svg class="w-6 h-6 text-blue-600 dark:text-blue-400 animate-bounce" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3"></path>
                    </svg>
                </div>
            </div>
        </div>
    </section>

    {{-- Horizontal Scroll Script with Auto-Scroll --}}
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Generic function to setup scroll for a section
            function setupScroll(containerId, leftBtnId, rightBtnId, progressBarId) {
                const container = document.getElementById(containerId);
                const leftBtn = document.getElementById(leftBtnId);
                const rightBtn = document.getElementById(rightBtnId);
                const progressBar = document.getElementById(progressBarId);

                if (!container || !leftBtn || !rightBtn || !progressBar) return;

                // Scroll amount (width of one card + gap)
                const scrollAmount = 336;
                let autoScrollInterval;
                let isUserInteracting = false;

                // Scroll buttons
                leftBtn.addEventListener('click', () => {
                    stopAutoScroll();
                    container.scrollBy({ left: -scrollAmount, behavior: 'smooth' });
                    setTimeout(startAutoScroll, 5000); // Resume after 5 seconds
                });

                rightBtn.addEventListener('click', () => {
                    stopAutoScroll();
                    container.scrollBy({ left: scrollAmount, behavior: 'smooth' });
                    setTimeout(startAutoScroll, 5000); // Resume after 5 seconds
                });

                // Update progress bar
                function updateProgress() {
                    const scrollWidth = container.scrollWidth - container.clientWidth;
                    const scrolled = container.scrollLeft;
                    const progress = (scrolled / scrollWidth) * 100;
                    progressBar.style.width = `${progress}%`;
                }

                container.addEventListener('scroll', updateProgress);
                updateProgress();

                // Auto-scroll functionality
                function autoScroll() {
                    if (isUserInteracting) return;

                    const scrollWidth = container.scrollWidth - container.clientWidth;
                    const currentScroll = container.scrollLeft;

                    // If reached the end, scroll back to start
                    if (currentScroll >= scrollWidth - 10) {
                        container.scrollTo({ left: 0, behavior: 'smooth' });
                    } else {
                        // Scroll to next card
                        container.scrollBy({ left: scrollAmount, behavior: 'smooth' });
                    }
                }

                function startAutoScroll() {
                    stopAutoScroll(); // Clear any existing interval
                    autoScrollInterval = setInterval(autoScroll, 3000); // Auto-scroll every 3 seconds
                }

                function stopAutoScroll() {
                    if (autoScrollInterval) {
                        clearInterval(autoScrollInterval);
                        autoScrollInterval = null;
                    }
                }

                // Pause auto-scroll on user interaction
                container.addEventListener('mouseenter', () => {
                    isUserInteracting = true;
                    stopAutoScroll();
                });

                container.addEventListener('mouseleave', () => {
                    isUserInteracting = false;
                    startAutoScroll();
                });

                container.addEventListener('touchstart', () => {
                    isUserInteracting = true;
                    stopAutoScroll();
                });

                container.addEventListener('touchend', () => {
                    setTimeout(() => {
                        isUserInteracting = false;
                        startAutoScroll();
                    }, 3000); // Resume after 3 seconds of no touch
                });

                // Pause auto-scroll when manually scrolling
                let scrollTimeout;
                container.addEventListener('scroll', () => {
                    if (!autoScrollInterval) {
                        clearTimeout(scrollTimeout);
                        scrollTimeout = setTimeout(() => {
                            if (!isUserInteracting) {
                                startAutoScroll();
                            }
                        }, 3000);
                    }
                });

                // Keyboard navigation
                container.addEventListener('keydown', (e) => {
                    if (e.key === 'ArrowLeft') {
                        e.preventDefault();
                        leftBtn.click();
                    } else if (e.key === 'ArrowRight') {
                        e.preventDefault();
                        rightBtn.click();
                    }
                });

                // Start auto-scroll on page load
                startAutoScroll();

                // Pause when page is not visible
                document.addEventListener('visibilitychange', () => {
                    if (document.hidden) {
                        stopAutoScroll();
                    } else if (!isUserInteracting) {
                        startAutoScroll();
                    }
                });
            }

            // Setup scroll for news, videos, and timeline
            setupScroll('news-scroll-container', 'news-scroll-left', 'news-scroll-right', 'news-scroll-progress');
            setupScroll('videos-scroll-container', 'videos-scroll-left', 'videos-scroll-right', 'videos-scroll-progress');
            setupScroll('timeline-scroll-container', 'timeline-scroll-left', 'timeline-scroll-right', 'timeline-scroll-progress');
        });
    </script>

    {{-- Hide Scrollbar Style --}}
    <style>
        .scrollbar-hide::-webkit-scrollbar {
            display: none;
        }
    </style>


    {{-- Latest YouTube Live Section --}}
    <section id="latest-video" class="relative min-h-screen flex items-center justify-center px-4 bg-gradient-to-br from-blue-50 via-white to-cyan-50 dark:from-gray-950 dark:via-gray-900 dark:to-blue-950/30 overflow-hidden">
        {{-- Background Elements --}}
        <div class="absolute inset-0 overflow-hidden pointer-events-none">
            <div class="absolute top-1/3 right-10 w-96 h-96 bg-blue-500/10 rounded-full blur-3xl animate-pulse"></div>
            <div class="absolute bottom-1/3 left-10 w-96 h-96 bg-cyan-500/10 rounded-full blur-3xl animate-pulse" style="animation-delay: 1s;"></div>
            <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-[800px] h-[800px] bg-blue-400/5 rounded-full blur-3xl"></div>
        </div>

        <div class="max-w-7xl mx-auto w-full relative z-10 py-16">
            {{-- Section Header with Live Badge --}}
            <div class="text-center mb-16">
                <div class="inline-flex items-center gap-3 mb-8">
                    <div class="flex items-center gap-2 px-5 py-2.5 bg-gradient-to-r from-blue-600 to-cyan-600 text-white rounded-full shadow-lg animate-pulse">
                        <span class="relative flex h-3 w-3">
                            <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-white opacity-75"></span>
                            <span class="relative inline-flex rounded-full h-3 w-3 bg-white"></span>
                        </span>
                        <span class="font-bold text-sm uppercase tracking-wide">LIVE</span>
                    </div>
                </div>
                <h2 class="text-4xl md:text-5xl lg:text-7xl font-bold text-gray-900 dark:text-white mb-6 tracking-tight">
                    Live Streams
                </h2>
                <p class="text-xl text-blue-600 dark:text-blue-300/80 max-w-3xl mx-auto">
                    {{ __('site.home.youtube_live_subtitle_placeholder') }}
                </p>
            </div>

            @if($lives->isNotEmpty())
                @php $latestVideo = $lives->first(); @endphp
                @php
                    $videoId = null;
                    if (preg_match('/(?:youtube\.com\/watch\?v=|youtu\.be\/|youtube\.com\/embed\/)([a-zA-Z0-9_-]{11})/', $latestVideo->video_link, $matches)) {
                        $videoId = $matches[1];
                    }
                @endphp

                <div class="max-w-6xl mx-auto">
                    @if($videoId)
                        {{-- Featured Live Video --}}
                        <div class="relative group">
                            {{-- Glowing Border Effect --}}
                            <div class="absolute -inset-1 bg-gradient-to-r from-blue-600 to-cyan-600 rounded-3xl blur-2xl opacity-30 group-hover:opacity-50 transition duration-1000"></div>

                            {{-- Video Container --}}
                            <div class="relative bg-black rounded-3xl overflow-hidden shadow-2xl border-2 border-blue-500/30">
                                <div class="aspect-video">
                                    @php
                                        $media = new \App\Models\Media();
                                        $embedUrl = $media->getYouTubeEmbedUrl($latestVideo->video_link, ['autoplay' => '0']);
                                    @endphp
                                    <iframe
                                        src="{!! $embedUrl !!}"
                                        frameborder="0"
                                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                        allowfullscreen
                                        referrerpolicy="strict-origin-when-cross-origin"
                                        class="w-full h-full"
                                    ></iframe>
                                </div>

                                {{-- Live Indicator Bar --}}
                                <div class="absolute top-0 left-0 right-0 bg-gradient-to-b from-black/60 to-transparent p-4">
                                    <div class="flex items-center justify-between">
                                        <div class="flex items-center gap-2">
                                            <span class="relative flex h-2.5 w-2.5">
                                                <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-cyan-400 opacity-75"></span>
                                                <span class="relative inline-flex rounded-full h-2.5 w-2.5 bg-cyan-400"></span>
                                            </span>
                                            <span class="text-white font-bold text-sm uppercase tracking-wider">LIVE NOW</span>
                                        </div>
                                        <div class="flex items-center gap-2 bg-gradient-to-r from-blue-600/50 to-cyan-600/50 backdrop-blur-sm px-3 py-1.5 rounded-full border border-blue-400/30">
                                            <svg class="w-4 h-4 text-white" fill="currentColor" viewBox="0 0 24 24">
                                                <path d="M23.498 6.186a3.016 3.016 0 0 0-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 0 0 .502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 0 0 2.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 0 0 2.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z"/>
                                            </svg>
                                            <span class="text-white text-xs font-semibold">YouTube</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- Video Info Below --}}
                        <div class="mt-10 text-center">
                            <h3 class="text-2xl md:text-3xl lg:text-4xl font-bold text-gray-900 dark:text-white mb-4">
                                {!! app()->getLocale() === 'ta' ? $latestVideo->title_ta : $latestVideo->title_en !!}
                            </h3>
                            <div class="flex items-center justify-center gap-4 text-blue-600 dark:text-blue-300/80 text-base">
                                <span class="flex items-center gap-2">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                    </svg>
                                    {{ $latestVideo->event_date ? $latestVideo->event_date->format('M j, Y') : 'Recently' }}
                                </span>
                                <span class="w-1.5 h-1.5 rounded-full bg-blue-400"></span>
                                <span>VCK Official Channel</span>
                            </div>

                            {{-- Action Buttons --}}
                            <div class="flex flex-wrap items-center justify-center gap-4 mt-8">
                                <a href="{{ $latestVideo->video_link }}" target="_blank" class="group relative inline-flex items-center px-8 py-4 bg-gradient-to-r from-blue-600 to-cyan-600 hover:from-blue-500 hover:to-cyan-500 text-white font-semibold rounded-full transition-all duration-300 hover:scale-105 shadow-xl">
                                    <div class="absolute -inset-0.5 bg-gradient-to-r from-blue-600 to-cyan-600 rounded-full opacity-0 group-hover:opacity-30 blur transition duration-300"></div>
                                    <svg class="w-5 h-5 mr-2 relative" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M23.498 6.186a3.016 3.016 0 0 0-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 0 0 .502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 0 0 2.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 0 0 2.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z"/>
                                    </svg>
                                    <span class="relative">Watch on YouTube</span>
                                </a>
                                <button class="inline-flex items-center px-8 py-4 bg-white dark:bg-gray-800 hover:bg-gray-50 dark:hover:bg-gray-700 text-gray-900 dark:text-white font-semibold rounded-full transition-all duration-300 hover:scale-105 shadow-lg border-2 border-blue-200 dark:border-blue-800">
                                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.684 13.342C8.886 12.938 9 12.482 9 12c0-.482-.114-.938-.316-1.342m0 2.684a3 3 0 110-2.684m0 2.684l6.632 3.316m-6.632-6l6.632-3.316m0 0a3 3 0 105.367-2.684 3 3 0 00-5.367 2.684zm0 9.316a3 3 0 105.368 2.684 3 3 0 00-5.368-2.684z"></path>
                                    </svg>
                                    Share
                                </button>
                            </div>
                        </div>
                    @endif
                </div>
            @else
                {{-- Empty State for No Live Videos --}}
                <div class="text-center py-20">
                    <div class="relative inline-block mb-10">
                        <div class="absolute inset-0 bg-gradient-to-br from-blue-500/20 to-cyan-500/20 rounded-full blur-2xl"></div>
                        <div class="relative w-28 h-28 bg-gradient-to-br from-blue-500 to-cyan-500 rounded-full flex items-center justify-center mx-auto shadow-2xl border-4 border-white dark:border-gray-900">
                            <svg class="w-14 h-14 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z"></path>
                            </svg>
                        </div>
                    </div>
                    <h3 class="text-3xl md:text-4xl font-bold text-gray-900 dark:text-white mb-4">{{ __('site.home.no_live_video') }}</h3>
                    <p class="text-lg text-blue-600 dark:text-blue-300/80 mb-10 max-w-md mx-auto">{{ __('site.press_releases.check_back') }}</p>
                    <a href="https://www.youtube.com/@Vck_Youtube" target="_blank" class="group relative inline-flex items-center px-10 py-5 bg-gradient-to-r from-blue-600 to-cyan-600 hover:from-blue-500 hover:to-cyan-500 text-white font-semibold rounded-full transition-all duration-300 hover:scale-105 shadow-2xl">
                        <div class="absolute -inset-0.5 bg-gradient-to-r from-blue-600 to-cyan-600 rounded-full opacity-0 group-hover:opacity-30 blur transition duration-300"></div>
                        <svg class="w-6 h-6 mr-2 relative" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M23.498 6.186a3.016 3.016 0 0 0-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 0 0 .502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 0 0 2.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 0 0 2.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z"/>
                        </svg>
                        <span class="relative">Visit Our Channel</span>
                    </a>
                </div>
            @endif
        </div>
    </section>

    {{-- Videos Section --}}
    @if($interviews->isNotEmpty())
    <section class="relative min-h-screen flex items-center justify-center px-4 bg-gradient-to-br from-blue-50 via-white to-red-50 dark:from-gray-950 dark:via-gray-900 dark:to-blue-950/30 overflow-hidden">
        {{-- Background Elements --}}
        <div class="absolute inset-0 overflow-hidden pointer-events-none">
            <div class="absolute top-20 left-10 w-72 h-72 bg-blue-500/10 rounded-full blur-3xl animate-pulse"></div>
            <div class="absolute bottom-20 right-10 w-96 h-96 bg-red-500/10 rounded-full blur-3xl animate-pulse" style="animation-delay: 1s"></div>
        </div>

        <div class="max-w-7xl mx-auto w-full relative z-10 py-16">
            {{-- Section Header --}}
            <div class="text-center mb-16" data-aos="fade-up">
                <h2 class="text-5xl md:text-6xl lg:text-7xl font-bold text-gray-900 dark:text-white mb-6 tracking-tight">
                    {{ __('site.menu.interviews') }}
                </h2>
                <p class="text-xl md:text-2xl text-gray-600 dark:text-gray-400 max-w-3xl mx-auto font-light">
                    {{ __('site.home.interviews-title-description') }}
                </p>
            </div>

            {{-- Videos Navigation --}}
            <div class="flex justify-end mb-8">
                <div class="flex items-center gap-2">
                    <button id="videos-scroll-left" class="group p-3 bg-gradient-to-br from-blue-500/20 to-red-500/20 hover:from-blue-500/30 hover:to-red-500/30 rounded-full transition-all duration-300 backdrop-blur-sm border border-blue-400/30 shadow-lg">
                        <svg class="w-5 h-5 text-gray-900 dark:text-white group-hover:scale-110 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                        </svg>
                    </button>
                    <button id="videos-scroll-right" class="group p-3 bg-gradient-to-br from-blue-500/20 to-red-500/20 hover:from-blue-500/30 hover:to-red-500/30 rounded-full transition-all duration-300 backdrop-blur-sm border border-blue-400/30 shadow-lg">
                        <svg class="w-5 h-5 text-gray-900 dark:text-white group-hover:scale-110 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                        </svg>
                    </button>
                </div>
            </div>

            {{-- Videos Scrollable Container --}}
            <div class="relative">
                <div id="videos-scroll-container" class="flex gap-6 overflow-x-auto scrollbar-hide scroll-smooth pb-6" style="scrollbar-width: none; -ms-overflow-style: none;">
                    @foreach($interviews as $video1)
                    @php
                        $videoId1 = null;
                        if (preg_match('/(?:youtube\.com\/watch\?v=|youtu\.be\/|youtube\.com\/embed\/)([a-zA-Z0-9_-]{11})/', $video1->video_link, $matches)) {
                            $videoId1 = $matches[1];
                        }
                        $thumbnail = $videoId1 ? "https://img.youtube.com/vi/{$videoId1}/maxresdefault.jpg" : asset('assets/images/placeholder.jpg');
                    @endphp

                    <div class="group relative flex-shrink-0 w-80 md:w-96 cursor-pointer video-thumbnail" data-video-id="{{ $videoId1 }}" data-video-url="{{ $video1->video_link }}" data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}">
                        {{-- Animated Border --}}
                        <div class="absolute -inset-0.5 bg-gradient-to-r from-blue-500 to-red-600 rounded-3xl opacity-0 group-hover:opacity-100 blur transition duration-500"></div>

                        {{-- Video Card --}}
                        <div class="relative bg-gradient-to-br from-blue-50 to-red-50 dark:from-blue-950/30 dark:to-red-950/30 rounded-3xl overflow-hidden border border-blue-200 dark:border-blue-800 transition-all duration-500 hover:shadow-2xl hover:-translate-y-2">
                            <div class="relative aspect-video overflow-hidden">
                                <img src="{{ $thumbnail }}" alt="{{ app()->getLocale() === 'ta' ? $video1->title_ta : $video1->title_en }}" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110" loading="lazy">
                                <div class="absolute inset-0 bg-gradient-to-t from-black via-black/50 to-transparent opacity-60 group-hover:opacity-80 transition-opacity duration-300"></div>

                                {{-- Play Button --}}
                                <div class="absolute inset-0 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-all duration-300">
                                    <div class="bg-gradient-to-br from-blue-600 to-red-600 rounded-full p-5 shadow-2xl ring-4 ring-blue-500/30">
                                        <svg class="w-12 h-12 text-white" fill="currentColor" viewBox="0 0 20 20">
                                            <path d="M6.3 2.841A1.5 1.5 0 004 4.11V15.89a1.5 1.5 0 002.3 1.269l9.344-5.89a1.5 1.5 0 000-2.538L6.3 2.84z"/>
                                        </svg>
                                    </div>
                                </div>

                                {{-- Video Badge --}}
                                <div class="absolute top-3 right-3 bg-gradient-to-r from-blue-600 to-red-600 text-white text-xs font-bold px-3 py-1.5 rounded-lg shadow-lg flex items-center gap-1.5">
                                    <svg class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M23.498 6.186a3.016 3.016 0 0 0-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 0 0 .502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 0 0 2.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 0 0 2.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z"/>
                                    </svg>
                                    <span>Video</span>
                                </div>
                            </div>

                            {{-- Video Info --}}
                            <div class="p-6 bg-white/50 dark:bg-gray-900/50 backdrop-blur-sm">
                                <h3 class="text-lg font-bold text-blue-900 dark:text-blue-100 mb-2 line-clamp-2">
                                    {!! app()->getLocale() === 'ta' ? $video1->title_ta : $video1->title_en !!}
                                </h3>
                                <div class="flex items-center gap-2 text-xs text-blue-600 dark:text-blue-400">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                    </svg>
                                    <span>{{ $video1->event_date ? $video1->event_date->format('M j, Y') : 'Recently' }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>

                {{-- Progress Bar --}}
                <div class="mt-8 h-1.5 bg-gray-200 dark:bg-gray-800 rounded-full overflow-hidden">
                    <div id="videos-scroll-progress" class="h-full bg-gradient-to-r from-blue-600 to-red-600 rounded-full transition-all duration-300" style="width: 0%"></div>
                </div>
            </div>

            {{-- Mobile Swipe Hint --}}
            <div class="md:hidden flex items-center justify-center gap-2 mt-8 text-blue-600 dark:text-blue-400 text-sm">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16l-4-4m0 0l4-4m-4 4h18"></path>
                </svg>
                <span>Swipe to explore</span>
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                </svg>
            </div>

            {{-- Scroll Indicator --}}
            <div class="text-center mt-16" data-aos="fade-up" data-aos-delay="300">
                <div class="inline-flex flex-col items-center">
                    <span class="text-sm text-gray-500 dark:text-gray-400 mb-2">Continue Exploring</span>
                    <svg class="w-6 h-6 text-blue-600 dark:text-blue-400 animate-bounce" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3"></path>
                    </svg>
                </div>
            </div>
        </div>
    </section>
    @endif
    
    {{-- Quote Banner Section - Full Width with Animations --}}
    <section id="quote-banner" class="relative min-h-screen flex items-center justify-center py-20 lg:py-32 overflow-hidden">
        {{-- Animated Background --}}
        <div class="absolute inset-0">
            {{-- Background Image with Parallax --}}
            <div class="absolute inset-0 parallax-quote-bg">
                <img
                    src="{{ asset('assets/images/backgrounds/Header_2.jpg') }}"
                    alt="Banner background"
                    class="w-full h-full object-cover object-center"
                >
            </div>

            {{-- Gradient Overlays - Blue Cyan Theme --}}
            <div class="absolute inset-0 bg-gradient-to-br from-blue-900/95 via-cyan-900/90 to-blue-950/95"></div>
            <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-blue-950/30 to-black/40"></div>

            {{-- Animated Shapes - Blue Cyan Theme --}}
            <div class="absolute top-10 left-10 w-64 h-64 bg-blue-500/15 rounded-full blur-3xl animate-float"></div>
            <div class="absolute bottom-10 right-10 w-96 h-96 bg-cyan-500/15 rounded-full blur-3xl animate-float-delayed"></div>
            <div class="absolute top-1/3 right-1/4 w-80 h-80 bg-blue-400/10 rounded-full blur-3xl animate-pulse-slow"></div>
            <div class="absolute bottom-1/3 left-1/4 w-72 h-72 bg-cyan-400/10 rounded-full blur-3xl animate-float" style="animation-delay: 2s;"></div>
        </div>

        {{-- Animated Grid Pattern with Blue Cyan Accent --}}
        <div class="absolute inset-0 opacity-10">
            <div class="absolute inset-0 bg-gradient-to-r from-blue-500/20 via-cyan-500/20 to-blue-500/20" style="background-image: linear-gradient(rgba(59, 130, 246, 0.3) 1px, transparent 1px), linear-gradient(90deg, rgba(6, 182, 212, 0.3) 1px, transparent 1px); background-size: 50px 50px;"></div>
        </div>

        {{-- Content --}}
        <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center">
                {{-- Decorative Quote Icon with Blue Cyan Glow --}}
                <div class="inline-block mb-12 animate-fade-in-down">
                    <div class="relative">
                        <div class="absolute inset-0 bg-gradient-to-r from-blue-500/30 to-cyan-500/30 blur-3xl rounded-full"></div>
                        <div class="relative p-6 bg-gradient-to-br from-blue-500/20 to-cyan-500/20 rounded-full border border-blue-400/30 backdrop-blur-sm">
                            <svg class="w-16 h-16 md:w-20 md:h-20 text-cyan-300" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M6 17h3l2-4V7H5v6h3zm8 0h3l2-4V7h-6v6h3z"/>
                            </svg>
                        </div>
                    </div>
                </div>

                {{-- Quote Text --}}
                <blockquote class="space-y-10">
                    <p class="text-3xl md:text-4xl lg:text-5xl xl:text-6xl font-bold text-white leading-tight max-w-5xl mx-auto animate-fade-in-up" style="animation-delay: 0.2s">
                        "{{ __('site.history.legacy_quote2') }}"
                    </p>

                    {{-- Author with Blue Cyan Accents --}}
                    <footer class="animate-fade-in-up" style="animation-delay: 0.4s">
                        <div class="flex items-center justify-center gap-4 mb-4">
                            <div class="h-px w-16 bg-gradient-to-r from-transparent via-blue-400/60 to-cyan-400/60"></div>
                            <span class="text-2xl md:text-3xl lg:text-4xl text-white font-semibold bg-clip-text bg-gradient-to-r from-red-300 to-red-800 tracking-wide">
                                {{ __('site.history.legacy_author') }}
                            </span>
                            <div class="h-px w-16 bg-gradient-to-l from-transparent via-cyan-400/60 to-blue-400/60"></div>
                        </div>
                        <p class="text-lg md:text-xl text-blue-200/80 font-light">Founder, VCK</p>
                    </footer>
                </blockquote>

                {{-- Decorative Elements with Blue Cyan Colors --}}
                <div class="mt-16 flex items-center justify-center gap-3 animate-fade-in-up" style="animation-delay: 0.6s">
                    <span class="w-2.5 h-2.5 rounded-full bg-gradient-to-r from-blue-400 to-cyan-400 animate-pulse shadow-lg shadow-blue-500/50"></span>
                    <span class="w-2.5 h-2.5 rounded-full bg-gradient-to-r from-cyan-400 to-blue-400 animate-pulse shadow-lg shadow-cyan-500/50" style="animation-delay: 0.2s"></span>
                    <span class="w-2.5 h-2.5 rounded-full bg-gradient-to-r from-blue-400 to-cyan-400 animate-pulse shadow-lg shadow-blue-500/50" style="animation-delay: 0.4s"></span>
                </div>
            </div>
        </div>

        {{-- Animated Border Gradients with Blue Cyan --}}
        <div class="absolute top-0 left-0 right-0 h-1 bg-gradient-to-r from-transparent via-blue-400/50 to-transparent animate-shimmer"></div>
        <div class="absolute bottom-0 left-0 right-0 h-1 bg-gradient-to-r from-transparent via-cyan-400/50 to-transparent animate-shimmer-delayed"></div>

        {{-- Corner Accent Elements --}}
        <div class="absolute top-0 left-0 w-32 h-32 border-t-2 border-l-2 border-blue-400/30 rounded-tl-3xl"></div>
        <div class="absolute top-0 right-0 w-32 h-32 border-t-2 border-r-2 border-cyan-400/30 rounded-tr-3xl"></div>
        <div class="absolute bottom-0 left-0 w-32 h-32 border-b-2 border-l-2 border-cyan-400/30 rounded-bl-3xl"></div>
        <div class="absolute bottom-0 right-0 w-32 h-32 border-b-2 border-r-2 border-blue-400/30 rounded-br-3xl"></div>
    </section>

    {{-- Additional Animations Styles --}}
    <style>
        /* Hero Text Animations */
        @keyframes hero-slide-up {
            0% {
                opacity: 0;
                transform: translateY(80px);
            }
            100% {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes hero-fade-in {
            0% {
                opacity: 0;
                transform: translateY(30px);
            }
            100% {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes hero-buttons-appear {
            0% {
                opacity: 0;
                transform: translateY(20px) scale(0.95);
            }
            100% {
                opacity: 1;
                transform: translateY(0) scale(1);
            }
        }

        .hero-text-slide-up {
            animation: hero-slide-up 1.2s cubic-bezier(0.16, 1, 0.3, 1) forwards;
            opacity: 0;
        }

        .hero-text-fade-in {
            animation: hero-fade-in 1s cubic-bezier(0.16, 1, 0.3, 1) forwards;
            opacity: 0;
        }

        .hero-buttons {
            animation: hero-buttons-appear 0.8s cubic-bezier(0.16, 1, 0.3, 1) forwards;
            opacity: 0;
        }

        /* Other Animations */
        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-30px); }
        }

        @keyframes float-delayed {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-40px); }
        }

        @keyframes pulse-slow {
            0%, 100% { opacity: 0.3; transform: scale(1); }
            50% { opacity: 0.5; transform: scale(1.1); }
        }

        @keyframes shimmer {
            0% { transform: translateX(-100%); }
            100% { transform: translateX(100%); }
        }

        @keyframes fade-in-down {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .animate-float {
            animation: float 8s ease-in-out infinite;
        }

        .animate-float-delayed {
            animation: float-delayed 10s ease-in-out infinite;
            animation-delay: 1s;
        }

        .animate-pulse-slow {
            animation: pulse-slow 6s ease-in-out infinite;
        }

        .animate-shimmer {
            animation: shimmer 3s ease-in-out infinite;
        }

        .animate-shimmer-delayed {
            animation: shimmer 3s ease-in-out infinite;
            animation-delay: 1.5s;
        }

        .animate-fade-in-down {
            animation: fade-in-down 0.8s ease-out forwards;
        }

        .parallax-quote-bg {
            will-change: transform;
        }
    </style>

    {{-- Quote Parallax Script --}}
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const quoteSection = document.getElementById('quote-banner');
            const parallaxBg = quoteSection?.querySelector('.parallax-quote-bg');

            if (parallaxBg) {
                window.addEventListener('scroll', () => {
                    const rect = quoteSection.getBoundingClientRect();
                    const scrolled = window.pageYOffset;

                    // Only apply parallax when section is in view
                    if (rect.top < window.innerHeight && rect.bottom > 0) {
                        const rate = (scrolled - quoteSection.offsetTop) * 0.3;
                        parallaxBg.style.transform = `translateY(${rate}px)`;
                    }
                });
            }
        });
    </script>
    
   

    {{-- Social Media Section --}}
    <section class="relative min-h-screen flex items-center justify-center py-24 lg:py-32 px-4 overflow-hidden bg-gradient-to-br from-cyan-50 via-white to-blue-50 dark:from-gray-950 dark:via-gray-900 dark:to-blue-950/30">
        {{-- Animated Background Elements --}}
        <div class="absolute top-0 left-0 w-full h-full overflow-hidden pointer-events-none">
            <div class="absolute top-20 left-10 w-72 h-72 bg-cyan-500/10 rounded-full blur-3xl animate-pulse-slow"></div>
            <div class="absolute bottom-20 right-10 w-96 h-96 bg-blue-500/10 rounded-full blur-3xl animate-pulse-slow" style="animation-delay: 2s"></div>
            <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-[600px] h-[600px] bg-blue-400/5 rounded-full blur-3xl"></div>
        </div>

        <div class="relative z-10 max-w-6xl mx-auto w-full">
            {{-- Header --}}
            <div class="text-center mb-20 scroll-reveal">
                <div class="inline-flex items-center gap-2 px-5 py-2.5 bg-gradient-to-r from-blue-600/10 to-cyan-600/10 backdrop-blur-sm rounded-full mb-8 border border-blue-400/30">
                    <span class="relative flex h-2.5 w-2.5">
                        <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-cyan-400 opacity-75"></span>
                        <span class="relative inline-flex rounded-full h-2.5 w-2.5 bg-cyan-500"></span>
                    </span>
                    <span class="text-sm font-semibold text-blue-600 dark:text-blue-400 tracking-wide">Stay Connected</span>
                </div>

                <h2 class="text-4xl md:text-5xl lg:text-7xl font-bold text-gray-900 dark:text-white mb-6 leading-tight tracking-tight">
                    {{ __('site.contact.follow_social') }}
                </h2>
                <p class="text-xl text-blue-600 dark:text-blue-300/80 max-w-2xl mx-auto">
                    {{ __('site.contact.stay_connected') }}
                </p>
            </div>

            {{-- Social Media Cards Grid --}}
            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-6 max-w-5xl mx-auto">
                {{-- Facebook --}}
                <a href="https://www.facebook.com/people/Viduthalai-Chiruthaigal-katchi/61578689859070/"
                   class="group scroll-reveal relative"
                   target="_blank" rel="noopener noreferrer"
                   style="animation-delay: 0.1s">
                    <div class="absolute -inset-0.5 bg-gradient-to-r from-blue-500 to-cyan-500 rounded-3xl opacity-0 group-hover:opacity-100 blur transition duration-500"></div>
                    <div class="relative bg-gradient-to-br from-blue-50 to-cyan-50 dark:from-blue-950/30 dark:to-cyan-950/30 rounded-3xl p-6 border border-blue-200 dark:border-blue-800 transition-all duration-500 group-hover:shadow-2xl group-hover:-translate-y-2">
                        <div class="flex flex-col items-center gap-4">
                            <div class="relative w-14 h-14 bg-gradient-to-br from-blue-600 to-blue-500 rounded-xl flex items-center justify-center group-hover:scale-110 transition-transform duration-500 shadow-lg shadow-blue-500/50">
                                <img src="{{ asset('assets/images/social/facebook.png') }}" alt="Facebook" class="w-7 h-7">
                            </div>
                            <span class="text-sm font-semibold text-gray-900 dark:text-white group-hover:text-blue-600 dark:group-hover:text-blue-400 transition-colors">Facebook</span>
                        </div>
                    </div>
                </a>

                {{-- Twitter/X --}}
                <a href="https://x.com/vck_officiall"
                   class="group scroll-reveal relative"
                   target="_blank" rel="noopener noreferrer"
                   style="animation-delay: 0.2s">
                    <div class="absolute -inset-0.5 bg-gradient-to-r from-blue-500 to-cyan-500 rounded-3xl opacity-0 group-hover:opacity-100 blur transition duration-500"></div>
                    <div class="relative bg-gradient-to-br from-blue-50 to-cyan-50 dark:from-blue-950/30 dark:to-cyan-950/30 rounded-3xl p-6 border border-blue-200 dark:border-blue-800 transition-all duration-500 group-hover:shadow-2xl group-hover:-translate-y-2">
                        <div class="flex flex-col items-center gap-4">
                            <div class="relative w-14 h-14 bg-gradient-to-br from-gray-800 to-gray-700 rounded-xl flex items-center justify-center group-hover:scale-110 transition-transform duration-500 shadow-lg shadow-gray-700/50">
                                <img src="{{ asset('assets/images/social/twitter.png') }}" alt="Twitter" class="w-7 h-7">
                            </div>
                            <span class="text-sm font-semibold text-gray-900 dark:text-white group-hover:text-gray-700 dark:group-hover:text-gray-300 transition-colors">Twitter</span>
                        </div>
                    </div>
                </a>

                {{-- Instagram --}}
                <a href="https://www.instagram.com/vck_officiall/"
                   class="group scroll-reveal relative"
                   target="_blank" rel="noopener noreferrer"
                   style="animation-delay: 0.3s">
                    <div class="absolute -inset-0.5 bg-gradient-to-r from-blue-500 to-cyan-500 rounded-3xl opacity-0 group-hover:opacity-100 blur transition duration-500"></div>
                    <div class="relative bg-gradient-to-br from-blue-50 to-cyan-50 dark:from-blue-950/30 dark:to-cyan-950/30 rounded-3xl p-6 border border-blue-200 dark:border-blue-800 transition-all duration-500 group-hover:shadow-2xl group-hover:-translate-y-2">
                        <div class="flex flex-col items-center gap-4">
                            <div class="relative w-14 h-14 bg-gradient-to-br from-pink-600 via-purple-600 to-orange-500 rounded-xl flex items-center justify-center group-hover:scale-110 transition-transform duration-500 shadow-lg shadow-pink-500/50">
                                <img src="{{ asset('assets/images/social/instagram.png') }}" alt="Instagram" class="w-7 h-7">
                            </div>
                            <span class="text-sm font-semibold text-gray-900 dark:text-white group-hover:text-pink-600 dark:group-hover:text-pink-400 transition-colors">Instagram</span>
                        </div>
                    </div>
                </a>

                {{-- Threads --}}
                <a href="#"
                   class="group scroll-reveal relative"
                   target="_blank" rel="noopener noreferrer"
                   style="animation-delay: 0.4s">
                    <div class="absolute -inset-0.5 bg-gradient-to-r from-blue-500 to-cyan-500 rounded-3xl opacity-0 group-hover:opacity-100 blur transition duration-500"></div>
                    <div class="relative bg-gradient-to-br from-blue-50 to-cyan-50 dark:from-blue-950/30 dark:to-cyan-950/30 rounded-3xl p-6 border border-blue-200 dark:border-blue-800 transition-all duration-500 group-hover:shadow-2xl group-hover:-translate-y-2">
                        <div class="flex flex-col items-center gap-4">
                            <div class="relative w-14 h-14 bg-gradient-to-br from-gray-700 to-gray-900 rounded-xl flex items-center justify-center group-hover:scale-110 transition-transform duration-500 shadow-lg shadow-gray-700/50">
                                <img src="{{ asset('assets/images/social/threads.png') }}" alt="Threads" class="w-7 h-7">
                            </div>
                            <span class="text-sm font-semibold text-gray-900 dark:text-white group-hover:text-gray-700 dark:group-hover:text-gray-300 transition-colors">Threads</span>
                        </div>
                    </div>
                </a>

                {{-- YouTube --}}
                <a href="https://www.youtube.com/@Vck_Youtube"
                   class="group scroll-reveal relative"
                   target="_blank" rel="noopener noreferrer"
                   style="animation-delay: 0.5s">
                    <div class="absolute -inset-0.5 bg-gradient-to-r from-blue-500 to-cyan-500 rounded-3xl opacity-0 group-hover:opacity-100 blur transition duration-500"></div>
                    <div class="relative bg-gradient-to-br from-blue-50 to-cyan-50 dark:from-blue-950/30 dark:to-cyan-950/30 rounded-3xl p-6 border border-blue-200 dark:border-blue-800 transition-all duration-500 group-hover:shadow-2xl group-hover:-translate-y-2">
                        <div class="flex flex-col items-center gap-4">
                            <div class="relative w-14 h-14 bg-gradient-to-br from-red-600 to-red-500 rounded-xl flex items-center justify-center group-hover:scale-110 transition-transform duration-500 shadow-lg shadow-red-500/50">
                                <img src="{{ asset('assets/images/social/youtube.png') }}" alt="YouTube" class="w-7 h-7">
                            </div>
                            <span class="text-sm font-semibold text-gray-900 dark:text-white group-hover:text-red-600 dark:group-hover:text-red-400 transition-colors">YouTube</span>
                        </div>
                    </div>
                </a>

                {{-- WhatsApp --}}
                <a href="#"
                   class="group scroll-reveal relative"
                   target="_blank" rel="noopener noreferrer"
                   style="animation-delay: 0.6s">
                    <div class="absolute -inset-0.5 bg-gradient-to-r from-blue-500 to-cyan-500 rounded-3xl opacity-0 group-hover:opacity-100 blur transition duration-500"></div>
                    <div class="relative bg-gradient-to-br from-blue-50 to-cyan-50 dark:from-blue-950/30 dark:to-cyan-950/30 rounded-3xl p-6 border border-blue-200 dark:border-blue-800 transition-all duration-500 group-hover:shadow-2xl group-hover:-translate-y-2">
                        <div class="flex flex-col items-center gap-4">
                            <div class="relative w-14 h-14 bg-gradient-to-br from-green-600 to-green-500 rounded-xl flex items-center justify-center group-hover:scale-110 transition-transform duration-500 shadow-lg shadow-green-500/50">
                                <img src="{{ asset('assets/images/social/whatsapp.png') }}" alt="WhatsApp" class="w-7 h-7">
                            </div>
                            <span class="text-sm font-semibold text-gray-900 dark:text-white group-hover:text-green-600 dark:group-hover:text-green-400 transition-colors">WhatsApp</span>
                        </div>
                    </div>
                </a>
            </div>

            {{-- Call to Action --}}
            <div class="mt-20 text-center scroll-reveal" style="animation-delay: 0.7s">
                <p class="text-gray-600 dark:text-gray-400 text-xl mb-8 font-medium">Join thousands of supporters in our community</p>
                <div class="flex flex-wrap items-center justify-center gap-8 text-base">
                    <div class="flex items-center gap-3 px-4 py-2 bg-gradient-to-r from-green-50 to-emerald-50 dark:from-green-900/20 dark:to-emerald-900/20 rounded-full border border-green-200 dark:border-green-800">
                        <div class="w-2.5 h-2.5 bg-green-500 rounded-full animate-pulse shadow-lg shadow-green-500/50"></div>
                        <span class="font-semibold text-green-700 dark:text-green-400">Active Community</span>
                    </div>
                    <div class="flex items-center gap-3 px-4 py-2 bg-gradient-to-r from-blue-50 to-cyan-50 dark:from-blue-900/20 dark:to-cyan-900/20 rounded-full border border-blue-200 dark:border-blue-800" style="animation-delay: 0.3s">
                        <div class="w-2.5 h-2.5 bg-blue-500 rounded-full animate-pulse shadow-lg shadow-blue-500/50"></div>
                        <span class="font-semibold text-blue-700 dark:text-blue-400">Daily Updates</span>
                    </div>
                    <div class="flex items-center gap-3 px-4 py-2 bg-gradient-to-r from-cyan-50 to-blue-50 dark:from-cyan-900/20 dark:to-blue-900/20 rounded-full border border-cyan-200 dark:border-cyan-800" style="animation-delay: 0.6s">
                        <div class="w-2.5 h-2.5 bg-cyan-500 rounded-full animate-pulse shadow-lg shadow-cyan-500/50"></div>
                        <span class="font-semibold text-cyan-700 dark:text-cyan-400">Live Events</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Custom Styles for Animations --}}
    <style>
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .animate-fade-in-up {
            animation: fadeInUp 1s ease-out forwards;
        }

        .scroll-reveal {
            opacity: 0;
            transform: translateY(50px);
            transition: opacity 0.8s ease-out, transform 0.8s ease-out;
        }

        .scroll-reveal.revealed {
            opacity: 1;
            transform: translateY(0);
        }

        /* Smooth scrolling */
        html {
            scroll-behavior: smooth;
        }

        /* Apple-style backdrop blur */
        @supports (backdrop-filter: blur(20px)) or (-webkit-backdrop-filter: blur(20px)) {
            .backdrop-blur-apple {
                backdrop-filter: blur(20px);
                -webkit-backdrop-filter: blur(20px);
            }
        }
    </style>

    {{-- Scripts --}}
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Hero Slider
            const sliderContainer = document.getElementById('slider-container');
            const slideButtons = document.querySelectorAll('[data-slide]');
            let currentSlide = 0;
            const totalSlides = 3;
            let autoSlideInterval;

            function goToSlide(slideIndex) {
                currentSlide = slideIndex;
                const offset = -slideIndex * 100;
                sliderContainer.style.transform = `translateX(${offset}%)`;

                // Update active dot
                slideButtons.forEach((btn, index) => {
                    if (index === slideIndex) {
                        btn.classList.remove('bg-white/70');
                        btn.classList.add('bg-white');
                    } else {
                        btn.classList.remove('bg-white');
                        btn.classList.add('bg-white/70');
                    }
                });
            }

            function nextSlide() {
                const next = (currentSlide + 1) % totalSlides;
                goToSlide(next);
            }

            function startAutoSlide() {
                autoSlideInterval = setInterval(nextSlide, 5000); // Auto-slide every 5 seconds
            }

            function stopAutoSlide() {
                if (autoSlideInterval) {
                    clearInterval(autoSlideInterval);
                }
            }

            // Navigation dots click handlers
            slideButtons.forEach((button) => {
                button.addEventListener('click', () => {
                    stopAutoSlide();
                    const slideIndex = parseInt(button.getAttribute('data-slide'));
                    goToSlide(slideIndex);
                    startAutoSlide(); // Restart auto-slide
                });
            });

            // Pause auto-slide on hover
            if (sliderContainer) {
                sliderContainer.addEventListener('mouseenter', stopAutoSlide);
                sliderContainer.addEventListener('mouseleave', startAutoSlide);
            }

            // Initialize
            goToSlide(0);
            startAutoSlide();

            // Parallax Effect for Hero
            const parallaxBg = document.getElementById('parallax-bg');
            if (parallaxBg) {
                window.addEventListener('scroll', () => {
                    const scrolled = window.pageYOffset;
                    const rate = scrolled * 0.5;
                    parallaxBg.style.transform = `translate3d(0, ${rate}px, 0) scale(1.1)`;
                });
            }

            // Scroll Reveal Animation
            const revealElements = document.querySelectorAll('.scroll-reveal');
            const revealOnScroll = () => {
                revealElements.forEach(el => {
                    const elementTop = el.getBoundingClientRect().top;
                    const elementBottom = el.getBoundingClientRect().bottom;
                    const isVisible = (elementTop < window.innerHeight - 100) && (elementBottom > 0);

                    if (isVisible) {
                        el.classList.add('revealed');
                    }
                });
            };

            window.addEventListener('scroll', revealOnScroll);
            revealOnScroll(); // Initial check

            // Video Modal
            const thumbnails = document.querySelectorAll('.video-thumbnail');
            const modal = document.getElementById('video-modal');
            const iframe = document.getElementById('video-iframe');
            const closeModal = document.getElementById('close-modal');

            if (thumbnails.length > 0 && modal && iframe && closeModal) {
                thumbnails.forEach(thumbnail => {
                    thumbnail.addEventListener('click', function() {
                        const videoId = this.getAttribute('data-video-id');
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
                            iframe.src = `https://www.youtube.com/embed/${videoId}?autoplay=1&rel=0&modestbranding=1&enablejsapi=1&origin=${encodeURIComponent(origin)}&widget_referrer=${encodeURIComponent(origin)}`;
                            modal.classList.remove('hidden');
                            modal.classList.add('flex');
                        }
                    });
                });

                function closeVideoModal() {
                    modal.classList.add('hidden');
                    modal.classList.remove('flex');
                    iframe.src = '';
                }

                closeModal.addEventListener('click', closeVideoModal);
                modal.addEventListener('click', function(e) {
                    if (e.target === modal) {
                        closeVideoModal();
                    }
                });

                document.addEventListener('keydown', function(e) {
                    if (e.key === 'Escape' && !modal.classList.contains('hidden')) {
                        closeVideoModal();
                    }
                });
            }

            // Smooth scroll for anchor links
            document.querySelectorAll('a[href^="#"]').forEach(anchor => {
                anchor.addEventListener('click', function (e) {
                    const href = this.getAttribute('href');
                    if (href !== '#' && href !== '#0') {
                        const target = document.querySelector(href);
                        if (target) {
                            e.preventDefault();
                            target.scrollIntoView({
                                behavior: 'smooth',
                                block: 'start'
                            });
                        }
                    }
                });
            });
        });
    </script>
@endsection