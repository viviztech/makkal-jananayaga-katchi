@extends('layouts.app')

@section('title', __('site.ideology.title'))

@section('content')

  {{-- Page Header --}}
   <section class="relative bg-gray-900 dark:bg-gray-950 py-24 md:py-32">
    <div class="relative max-w-7xl mx-auto px-4 text-center">
      <h1 class="text-5xl md:text-6xl font-extrabold text-white mb-4">{{ __('site.ideology.title') }}</h1>
      <p class="text-xl text-gray-300 max-w-3xl mx-auto">{{ __('site.ideology.subtitle') }}</p>
    </div>
  </section>


  {{-- Core Principles --}}
  <section class="relative min-h-screen flex items-center justify-center px-4 bg-white dark:bg-gray-950 overflow-hidden">
    {{-- Background Elements --}}
    <div class="absolute inset-0 overflow-hidden pointer-events-none">
      <div class="absolute top-1/4 right-10 w-96 h-96 bg-blue-500/5 rounded-full blur-3xl"></div>
      <div class="absolute bottom-1/4 left-10 w-96 h-96 bg-red-500/5 rounded-full blur-3xl"></div>
    </div>

    <div class="max-w-7xl mx-auto w-full relative z-10 py-20 lg:py-28">
      {{-- Section Header --}}
      <div class="text-center mb-16" data-aos="fade-up">
        <h2 class="text-4xl md:text-5xl lg:text-6xl font-bold text-gray-900 dark:text-white mb-6 tracking-tight">
          {{ __('site.ideology.core_principles_title') }}
        </h2>
      </div>

      {{-- Principles Cards Grid --}}
      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 lg:gap-10">

        {{-- Card 1 - Anti Casteism --}}
        <div class="group relative" data-aos="fade-up" data-aos-delay="0">
          {{-- Animated Border --}}
          <div class="absolute -inset-0.5 bg-gradient-to-r from-red-500 to-red-700 rounded-3xl opacity-0 group-hover:opacity-100 blur transition duration-500"></div>

          {{-- Card Content --}}
          <div class="relative bg-gradient-to-br from-red-50 to-red-100 dark:from-red-950/30 dark:to-red-900/30 rounded-3xl p-8 border border-red-200 dark:border-red-800 transition-all duration-500 hover:shadow-2xl hover:-translate-y-2 h-full flex flex-col">
            {{-- Icon --}}
            <div class="relative w-14 h-14 mb-6 mx-auto">
              <div class="absolute inset-0 bg-gradient-to-br from-red-500 to-red-700 rounded-2xl opacity-20 group-hover:opacity-30 transition-opacity"></div>
              <div class="relative w-14 h-14 bg-white dark:bg-gray-900 rounded-2xl flex items-center justify-center group-hover:scale-110 transition-transform duration-500 shadow-lg border-2 border-red-200 dark:border-red-700">
                <svg class="w-7 h-7 text-red-600 dark:text-red-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                </svg>
              </div>
            </div>

            <h3 class="text-2xl font-bold text-red-900 dark:text-red-100 mb-3 text-center">{{ __('site.ideology.anti_casteism') }}</h3>
            <p class="text-red-700/80 dark:text-red-200/70 text-base leading-relaxed text-center flex-grow">
              {{ __('site.ideology.anti_casteism_desc') }}
            </p>
          </div>
        </div>

        {{-- Card 2 - Social Justice --}}
        <div class="group relative" data-aos="fade-up" data-aos-delay="100">
          <div class="absolute -inset-0.5 bg-gradient-to-r from-blue-500 to-blue-700 rounded-3xl opacity-0 group-hover:opacity-100 blur transition duration-500"></div>
          <div class="relative bg-gradient-to-br from-blue-50 to-blue-100 dark:from-blue-950/30 dark:to-blue-900/30 rounded-3xl p-8 border border-blue-200 dark:border-blue-800 transition-all duration-500 hover:shadow-2xl hover:-translate-y-2 h-full flex flex-col">
            <div class="relative w-14 h-14 mb-6 mx-auto">
              <div class="absolute inset-0 bg-gradient-to-br from-blue-500 to-blue-700 rounded-2xl opacity-20 group-hover:opacity-30 transition-opacity"></div>
              <div class="relative w-14 h-14 bg-white dark:bg-gray-900 rounded-2xl flex items-center justify-center group-hover:scale-110 transition-transform duration-500 shadow-lg border-2 border-blue-200 dark:border-blue-700">
                <svg class="w-7 h-7 text-blue-600 dark:text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                </svg>
              </div>
            </div>
            <h3 class="text-2xl font-bold text-blue-900 dark:text-blue-100 mb-3 text-center">{{ __('site.ideology.social_justice') }}</h3>
            <p class="text-blue-700/80 dark:text-blue-200/70 text-base leading-relaxed text-center flex-grow">{{ __('site.ideology.social_justice_desc') }}</p>
          </div>
        </div>

        {{-- Card 3 - Rationalism --}}
        <div class="group relative" data-aos="fade-up" data-aos-delay="200">
          <div class="absolute -inset-0.5 bg-gradient-to-r from-red-500 to-red-700 rounded-3xl opacity-0 group-hover:opacity-100 blur transition duration-500"></div>
          <div class="relative bg-gradient-to-br from-red-50 to-red-100 dark:from-red-950/30 dark:to-red-900/30 rounded-3xl p-8 border border-red-200 dark:border-red-800 transition-all duration-500 hover:shadow-2xl hover:-translate-y-2 h-full flex flex-col">
            <div class="relative w-14 h-14 mb-6 mx-auto">
              <div class="absolute inset-0 bg-gradient-to-br from-red-500 to-red-700 rounded-2xl opacity-20 group-hover:opacity-30 transition-opacity"></div>
              <div class="relative w-14 h-14 bg-white dark:bg-gray-900 rounded-2xl flex items-center justify-center group-hover:scale-110 transition-transform duration-500 shadow-lg border-2 border-red-200 dark:border-red-700">
                <svg class="w-7 h-7 text-red-600 dark:text-red-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"/>
                </svg>
              </div>
            </div>
            <h3 class="text-2xl font-bold text-red-900 dark:text-red-100 mb-3 text-center">{{ __('site.ideology.rationalism') }}</h3>
            <p class="text-red-700/80 dark:text-red-200/70 text-base leading-relaxed text-center flex-grow">{{ __('site.ideology.rationalism_desc') }}</p>
          </div>
        </div>

        {{-- Card 4 - Dalit Liberation --}}
        <div class="group relative" data-aos="fade-up" data-aos-delay="0">
          <div class="absolute -inset-0.5 bg-gradient-to-r from-blue-500 to-blue-700 rounded-3xl opacity-0 group-hover:opacity-100 blur transition duration-500"></div>
          <div class="relative bg-gradient-to-br from-blue-50 to-blue-100 dark:from-blue-950/30 dark:to-blue-900/30 rounded-3xl p-8 border border-blue-200 dark:border-blue-800 transition-all duration-500 hover:shadow-2xl hover:-translate-y-2 h-full flex flex-col">
            <div class="relative w-14 h-14 mb-6 mx-auto">
              <div class="absolute inset-0 bg-gradient-to-br from-blue-500 to-blue-700 rounded-2xl opacity-20 group-hover:opacity-30 transition-opacity"></div>
              <div class="relative w-14 h-14 bg-white dark:bg-gray-900 rounded-2xl flex items-center justify-center group-hover:scale-110 transition-transform duration-500 shadow-lg border-2 border-blue-200 dark:border-blue-700">
                <svg class="w-7 h-7 text-blue-600 dark:text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/>
                </svg>
              </div>
            </div>
            <h3 class="text-2xl font-bold text-blue-900 dark:text-blue-100 mb-3 text-center">{{ __('site.ideology.dalit_liberation') }}</h3>
            <p class="text-blue-700/80 dark:text-blue-200/70 text-base leading-relaxed text-center flex-grow">{{ __('site.ideology.dalit_liberation_desc') }}</p>
          </div>
        </div>

        {{-- Card 5 - Land Rights --}}
        <div class="group relative" data-aos="fade-up" data-aos-delay="100">
          <div class="absolute -inset-0.5 bg-gradient-to-r from-red-500 to-red-700 rounded-3xl opacity-0 group-hover:opacity-100 blur transition duration-500"></div>
          <div class="relative bg-gradient-to-br from-red-50 to-red-100 dark:from-red-950/30 dark:to-red-900/30 rounded-3xl p-8 border border-red-200 dark:border-red-800 transition-all duration-500 hover:shadow-2xl hover:-translate-y-2 h-full flex flex-col">
            <div class="relative w-14 h-14 mb-6 mx-auto">
              <div class="absolute inset-0 bg-gradient-to-br from-red-500 to-red-700 rounded-2xl opacity-20 group-hover:opacity-30 transition-opacity"></div>
              <div class="relative w-14 h-14 bg-white dark:bg-gray-900 rounded-2xl flex items-center justify-center group-hover:scale-110 transition-transform duration-500 shadow-lg border-2 border-red-200 dark:border-red-700">
                <svg class="w-7 h-7 text-red-600 dark:text-red-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                </svg>
              </div>
            </div>
            <h3 class="text-2xl font-bold text-red-900 dark:text-red-100 mb-3 text-center">{{ __('site.ideology.land_rights') }}</h3>
            <p class="text-red-700/80 dark:text-red-200/70 text-base leading-relaxed text-center flex-grow">{{ __('site.ideology.land_rights_desc') }}</p>
          </div>
        </div>

        {{-- Card 6 - Democratic Alliance --}}
        <div class="group relative" data-aos="fade-up" data-aos-delay="200">
          <div class="absolute -inset-0.5 bg-gradient-to-r from-blue-500 to-blue-700 rounded-3xl opacity-0 group-hover:opacity-100 blur transition duration-500"></div>
          <div class="relative bg-gradient-to-br from-blue-50 to-blue-100 dark:from-blue-950/30 dark:to-blue-900/30 rounded-3xl p-8 border border-blue-200 dark:border-blue-800 transition-all duration-500 hover:shadow-2xl hover:-translate-y-2 h-full flex flex-col">
            <div class="relative w-14 h-14 mb-6 mx-auto">
              <div class="absolute inset-0 bg-gradient-to-br from-blue-500 to-blue-700 rounded-2xl opacity-20 group-hover:opacity-30 transition-opacity"></div>
              <div class="relative w-14 h-14 bg-white dark:bg-gray-900 rounded-2xl flex items-center justify-center group-hover:scale-110 transition-transform duration-500 shadow-lg border-2 border-blue-200 dark:border-blue-700">
                <svg class="w-7 h-7 text-blue-600 dark:text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                </svg>
              </div>
            </div>
            <h3 class="text-2xl font-bold text-blue-900 dark:text-blue-100 mb-3 text-center">{{ __('site.ideology.democratic_alliance') }}</h3>
            <p class="text-blue-700/80 dark:text-blue-200/70 text-base leading-relaxed text-center flex-grow">{{ __('site.ideology.democratic_alliance_desc') }}</p>
          </div>
        </div>

      </div>
    </div>
  </section>

  {{-- Vision & Mission --}}
  <section class="relative min-h-screen flex items-center justify-center px-4 bg-gradient-to-br from-blue-50 via-white to-red-50 dark:from-gray-950 dark:via-gray-900 dark:to-blue-950/30 overflow-hidden">
    {{-- Background Elements --}}
    <div class="absolute inset-0 overflow-hidden pointer-events-none">
      <div class="absolute top-20 left-10 w-72 h-72 bg-blue-500/10 rounded-full blur-3xl animate-pulse"></div>
      <div class="absolute bottom-20 right-10 w-96 h-96 bg-red-500/10 rounded-full blur-3xl animate-pulse" style="animation-delay: 1s"></div>
    </div>

    <div class="max-w-7xl mx-auto w-full relative z-10 py-20 lg:py-28">
      <div class="grid grid-cols-1 lg:grid-cols-2 gap-10 lg:gap-12 items-start">

        {{-- Vision Card --}}
        <div class="group relative" data-aos="fade-right">
          <div class="absolute -inset-0.5 bg-gradient-to-r from-red-500 to-pink-500 rounded-3xl opacity-0 group-hover:opacity-100 blur transition duration-500"></div>
          <div class="relative bg-gradient-to-br from-red-50 to-pink-50 dark:from-red-950/30 dark:to-pink-950/30 rounded-3xl p-8 lg:p-10 border border-red-200 dark:border-red-800 transition-all duration-500 hover:shadow-2xl h-full">
            <div class="flex items-center mb-6">
              <div class="relative w-12 h-12 mr-4">
                <div class="absolute inset-0 bg-gradient-to-br from-red-500 to-pink-500 rounded-xl opacity-20"></div>
                <div class="relative w-12 h-12 bg-white dark:bg-gray-900 rounded-xl flex items-center justify-center shadow-lg border-2 border-red-200 dark:border-red-700">
                  <svg class="w-6 h-6 text-red-600 dark:text-red-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                  </svg>
                </div>
              </div>
              <h2 class="text-3xl lg:text-4xl font-extrabold text-red-900 dark:text-red-100">{{ __('site.ideology.vision') }}</h2>
            </div>
            <blockquote class="border-l-4 border-red-600 pl-6">
              <p class="text-lg text-red-800/90 dark:text-red-200/80 italic leading-relaxed">
                "{{ __('site.ideology.vision_desc') }}"
              </p>
            </blockquote>
          </div>
        </div>

        {{-- Mission Card --}}
        <div class="group relative" data-aos="fade-left">
          <div class="absolute -inset-0.5 bg-gradient-to-r from-blue-500 to-cyan-500 rounded-3xl opacity-0 group-hover:opacity-100 blur transition duration-500"></div>
          <div class="relative bg-gradient-to-br from-blue-50 to-cyan-50 dark:from-blue-950/30 dark:to-cyan-950/30 rounded-3xl p-8 lg:p-10 border border-blue-200 dark:border-blue-800 transition-all duration-500 hover:shadow-2xl h-full">
            <div class="flex items-center mb-6">
              <div class="relative w-12 h-12 mr-4">
                <div class="absolute inset-0 bg-gradient-to-br from-blue-500 to-cyan-500 rounded-xl opacity-20"></div>
                <div class="relative w-12 h-12 bg-white dark:bg-gray-900 rounded-xl flex items-center justify-center shadow-lg border-2 border-blue-200 dark:border-blue-700">
                  <svg class="w-6 h-6 text-blue-600 dark:text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4"/>
                  </svg>
                </div>
              </div>
              <h2 class="text-3xl lg:text-4xl font-extrabold text-blue-900 dark:text-blue-100">{{ __('site.ideology.mission') }}</h2>
            </div>
            <ul class="space-y-4 text-lg">
              <li class="flex items-start group/item">
                <div class="flex-shrink-0 w-6 h-6 rounded-full bg-blue-100 dark:bg-blue-900/30 flex items-center justify-center mr-3 mt-1 group-hover/item:scale-110 transition-transform">
                  <svg class="w-4 h-4 text-blue-600 dark:text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                  </svg>
                </div>
                <span class="text-blue-800/90 dark:text-blue-200/80">{{ __('site.ideology.mission_1') }}</span>
              </li>
              <li class="flex items-start group/item">
                <div class="flex-shrink-0 w-6 h-6 rounded-full bg-blue-100 dark:bg-blue-900/30 flex items-center justify-center mr-3 mt-1 group-hover/item:scale-110 transition-transform">
                  <svg class="w-4 h-4 text-blue-600 dark:text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                  </svg>
                </div>
                <span class="text-blue-800/90 dark:text-blue-200/80">{{ __('site.ideology.mission_2') }}</span>
              </li>
              <li class="flex items-start group/item">
                <div class="flex-shrink-0 w-6 h-6 rounded-full bg-blue-100 dark:bg-blue-900/30 flex items-center justify-center mr-3 mt-1 group-hover/item:scale-110 transition-transform">
                  <svg class="w-4 h-4 text-blue-600 dark:text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                  </svg>
                </div>
                <span class="text-blue-800/90 dark:text-blue-200/80">{{ __('site.ideology.mission_3') }}</span>
              </li>
              <li class="flex items-start group/item">
                <div class="flex-shrink-0 w-6 h-6 rounded-full bg-blue-100 dark:bg-blue-900/30 flex items-center justify-center mr-3 mt-1 group-hover/item:scale-110 transition-transform">
                  <svg class="w-4 h-4 text-blue-600 dark:text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                  </svg>
                </div>
                <span class="text-blue-800/90 dark:text-blue-200/80">{{ __('site.ideology.mission_4') }}</span>
              </li>
              <li class="flex items-start group/item">
                <div class="flex-shrink-0 w-6 h-6 rounded-full bg-blue-100 dark:bg-blue-900/30 flex items-center justify-center mr-3 mt-1 group-hover/item:scale-110 transition-transform">
                  <svg class="w-4 h-4 text-blue-600 dark:text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                  </svg>
                </div>
                <span class="text-blue-800/90 dark:text-blue-200/80">{{ __('site.ideology.mission_5') }}</span>
              </li>
              <li class="flex items-start group/item">
                <div class="flex-shrink-0 w-6 h-6 rounded-full bg-blue-100 dark:bg-blue-900/30 flex items-center justify-center mr-3 mt-1 group-hover/item:scale-110 transition-transform">
                  <svg class="w-4 h-4 text-blue-600 dark:text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                  </svg>
                </div>
                <span class="text-blue-800/90 dark:text-blue-200/80">{{ __('site.ideology.mission_6') }}</span>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </section>

  {{-- Ideological Foundation --}}
  <section class="relative min-h-screen flex items-center justify-center px-4 bg-white dark:bg-gray-950 overflow-hidden">
    {{-- Background Elements --}}
    <div class="absolute inset-0 overflow-hidden pointer-events-none">
      <div class="absolute top-1/4 right-10 w-96 h-96 bg-blue-500/5 rounded-full blur-3xl"></div>
      <div class="absolute bottom-1/4 left-10 w-96 h-96 bg-red-500/5 rounded-full blur-3xl"></div>
    </div>

    <div class="max-w-7xl mx-auto w-full relative z-10 py-20 lg:py-28">
      {{-- Section Header --}}
      <div class="text-center mb-16" data-aos="fade-up">
        <h2 class="text-4xl md:text-5xl lg:text-6xl font-bold text-gray-900 dark:text-white mb-6 tracking-tight">
          {{ __('site.ideology.foundations_title') }}
        </h2>
      </div>

      {{-- Dr. Ambedkar Section --}}
      <div class="mb-20" data-aos="fade-up">
        <div class="group relative">
          <div class="absolute -inset-1 bg-gradient-to-r from-blue-500 to-purple-500 rounded-3xl opacity-0 group-hover:opacity-20 blur-xl transition duration-500"></div>
          <div class="relative grid grid-cols-1 lg:grid-cols-2 gap-12 items-center bg-gradient-to-br from-blue-50 to-purple-50 dark:from-blue-950/20 dark:to-purple-950/20 rounded-3xl p-8 lg:p-12 border border-blue-200 dark:border-blue-800">
            <div>
              <div class="inline-flex items-center justify-center w-12 h-12 bg-gradient-to-br from-blue-600 to-purple-600 rounded-xl mb-4 shadow-lg">
                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                </svg>
              </div>
              <h3 class="text-3xl font-bold text-blue-900 dark:text-blue-100 mb-4">{{ __('site.ideology.ambedkar_title') }}</h3>
              <p class="text-lg text-blue-800/90 dark:text-blue-200/80 mb-4 leading-relaxed">
                {{ __('site.ideology.ambedkar_desc1') }}
              </p>
              <p class="text-lg text-blue-800/90 dark:text-blue-200/80 leading-relaxed">
                {{ __('site.ideology.ambedkar_desc2') }}
              </p>
            </div>
            <div class="relative rounded-2xl shadow-2xl overflow-hidden group-hover:shadow-3xl transition-shadow duration-500">
              <div class="absolute inset-0 bg-gradient-to-br from-blue-500/10 to-purple-500/10"></div>
              {{-- NOTE: Please replace this placeholder image path --}}
              <img src="{{ asset('assets/images/about/ambedkar.jpg') }}" alt="Dr. B.R. Ambedkar" class="w-full h-auto object-cover transform transition-transform duration-700 group-hover:scale-105">
            </div>
          </div>
        </div>
      </div>

      {{-- Periyar Section --}}
      <div class="mb-20" data-aos="fade-up">
        <div class="group relative">
          <div class="absolute -inset-1 bg-gradient-to-r from-red-500 to-orange-500 rounded-3xl opacity-0 group-hover:opacity-20 blur-xl transition duration-500"></div>
          <div class="relative grid grid-cols-1 lg:grid-cols-2 gap-12 items-center bg-gradient-to-br from-red-50 to-orange-50 dark:from-red-950/20 dark:to-orange-950/20 rounded-3xl p-8 lg:p-12 border border-red-200 dark:border-red-800">
            <div class="lg:order-2">
              <div class="inline-flex items-center justify-center w-12 h-12 bg-gradient-to-br from-red-600 to-orange-600 rounded-xl mb-4 shadow-lg">
                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"/>
                </svg>
              </div>
              <h3 class="text-3xl font-bold text-red-900 dark:text-red-100 mb-4">{{ __('site.ideology.periyar_title') }}</h3>
              <p class="text-lg text-red-800/90 dark:text-red-200/80 mb-4 leading-relaxed">
                {{ __('site.ideology.periyar_desc1') }}
              </p>
              <p class="text-lg text-red-800/90 dark:text-red-200/80 leading-relaxed">
                {{ __('site.ideology.periyar_desc2') }}
              </p>
            </div>
            <div class="lg:order-1 relative rounded-2xl shadow-2xl overflow-hidden group-hover:shadow-3xl transition-shadow duration-500">
              <div class="absolute inset-0 bg-gradient-to-br from-red-500/10 to-orange-500/10"></div>
              {{-- NOTE: Please replace this placeholder image path --}}
              <img src="{{ asset('assets/images/about/periyar.jpg') }}" alt="Periyar E.V. Ramasamy" class="w-full h-auto object-cover transform transition-transform duration-700 group-hover:scale-105">
            </div>
          </div>
        </div>
      </div>

      {{-- Social Democracy Section --}}
      <div class="mb-20" data-aos="fade-up">
        <div class="group relative">
          <div class="absolute -inset-1 bg-gradient-to-r from-green-500 to-teal-500 rounded-3xl opacity-0 group-hover:opacity-20 blur-xl transition duration-500"></div>
          <div class="relative grid grid-cols-1 lg:grid-cols-2 gap-12 items-center bg-gradient-to-br from-green-50 to-teal-50 dark:from-green-950/20 dark:to-teal-950/20 rounded-3xl p-8 lg:p-12 border border-green-200 dark:border-green-800">
            <div>
              <div class="inline-flex items-center justify-center w-12 h-12 bg-gradient-to-br from-green-600 to-teal-600 rounded-xl mb-4 shadow-lg">
                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                </svg>
              </div>
              <h3 class="text-3xl font-bold text-green-900 dark:text-green-100 mb-4">{{ __('site.ideology.marxism_title') }}</h3>
              <p class="text-lg text-green-800/90 dark:text-green-200/80 mb-4 leading-relaxed">
                {{ __('site.ideology.marxism_desc1') }}
              </p>
              <p class="text-lg text-green-800/90 dark:text-green-200/80 leading-relaxed">
                {{ __('site.ideology.marxism_desc2') }}
              </p>
            </div>
            <div class="relative rounded-2xl shadow-2xl overflow-hidden group-hover:shadow-3xl transition-shadow duration-500">
              <div class="absolute inset-0 bg-gradient-to-br from-green-500/10 to-teal-500/10"></div>
              {{-- NOTE: Please replace this placeholder image path --}}
              <img src="{{ asset('assets/images/about/marx.jpg') }}" alt="Marxist Philosophy" class="w-full h-auto object-cover transform transition-transform duration-700 group-hover:scale-105">
            </div>
          </div>
        </div>
      </div>

      {{-- Key Principles Section --}}
      <div class="group relative" data-aos="fade-up">
        <div class="absolute -inset-1 bg-gradient-to-r from-red-500 via-orange-500 to-yellow-500 rounded-3xl opacity-0 group-hover:opacity-20 blur-xl transition duration-500"></div>
        <div class="relative bg-gradient-to-br from-red-50 to-orange-50 dark:from-red-950/20 dark:to-orange-950/20 rounded-3xl p-8 lg:p-12 border border-red-200 dark:border-red-800">
          <h3 class="text-3xl lg:text-4xl font-extrabold text-red-700 dark:text-red-500 text-center mb-12">{{ __('site.ideology.key_principles_title') }}</h3>
          <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

            <div class="flex items-start group/item hover:bg-white/50 dark:hover:bg-gray-900/30 p-4 rounded-xl transition-all duration-300">
              <div class="flex-shrink-0 bg-gradient-to-br from-red-500 to-orange-500 rounded-xl p-3 mr-4 mt-1 group-hover/item:scale-110 transition-transform shadow-lg">
                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
              </div>
              <div>
                <h4 class="text-lg font-semibold text-red-900 dark:text-red-100 mb-1">{{ __('site.ideology.caste_annihilation') }}</h4>
                <p class="text-red-800/80 dark:text-red-200/70">{{ __('site.ideology.caste_annihilation_desc') }}</p>
              </div>
            </div>

            <div class="flex items-start group/item hover:bg-white/50 dark:hover:bg-gray-900/30 p-4 rounded-xl transition-all duration-300">
              <div class="flex-shrink-0 bg-gradient-to-br from-red-500 to-orange-500 rounded-xl p-3 mr-4 mt-1 group-hover/item:scale-110 transition-transform shadow-lg">
                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
              </div>
              <div>
                <h4 class="text-lg font-semibold text-red-900 dark:text-red-100 mb-1">{{ __('site.ideology.social_justice_principle') }}</h4>
                <p class="text-red-800/80 dark:text-red-200/70">{{ __('site.ideology.social_justice_principle_desc') }}</p>
              </div>
            </div>

            <div class="flex items-start group/item hover:bg-white/50 dark:hover:bg-gray-900/30 p-4 rounded-xl transition-all duration-300">
              <div class="flex-shrink-0 bg-gradient-to-br from-red-500 to-orange-500 rounded-xl p-3 mr-4 mt-1 group-hover/item:scale-110 transition-transform shadow-lg">
                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
              </div>
              <div>
                <h4 class="text-lg font-semibold text-red-900 dark:text-red-100 mb-1">{{ __('site.ideology.democratic_secularism') }}</h4>
                <p class="text-red-800/80 dark:text-red-200/70">{{ __('site.ideology.democratic_secularism_desc') }}</p>
              </div>
            </div>

            <div class="flex items-start group/item hover:bg-white/50 dark:hover:bg-gray-900/30 p-4 rounded-xl transition-all duration-300">
              <div class="flex-shrink-0 bg-gradient-to-br from-red-500 to-orange-500 rounded-xl p-3 mr-4 mt-1 group-hover/item:scale-110 transition-transform shadow-lg">
                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
              </div>
              <div>
                <h4 class="text-lg font-semibold text-red-900 dark:text-red-100 mb-1">{{ __('site.ideology.economic_equality') }}</h4>
                <p class="text-red-800/80 dark:text-red-200/70">{{ __('site.ideology.economic_equality_desc') }}</p>
              </div>
            </div>

            <div class="flex items-start group/item hover:bg-white/50 dark:hover:bg-gray-900/30 p-4 rounded-xl transition-all duration-300">
              <div class="flex-shrink-0 bg-gradient-to-br from-red-500 to-orange-500 rounded-xl p-3 mr-4 mt-1 group-hover/item:scale-110 transition-transform shadow-lg">
                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
              </div>
              <div>
                <h4 class="text-lg font-semibold text-red-900 dark:text-red-100 mb-1">{{ __('site.ideology.womens_emancipation') }}</h4>
                <p class="text-red-800/80 dark:text-red-200/70">{{ __('site.ideology.womens_emancipation_desc') }}</p>
              </div>
            </div>

            <div class="flex items-start group/item hover:bg-white/50 dark:hover:bg-gray-900/30 p-4 rounded-xl transition-all duration-300">
              <div class="flex-shrink-0 bg-gradient-to-br from-red-500 to-orange-500 rounded-xl p-3 mr-4 mt-1 group-hover/item:scale-110 transition-transform shadow-lg">
                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
              </div>
              <div>
                <h4 class="text-lg font-semibold text-red-900 dark:text-red-100 mb-1">{{ __('site.ideology.cultural_assertion') }}</h4>
                <p class="text-red-800/80 dark:text-red-200/70">{{ __('site.ideology.cultural_assertion_desc') }}</p>
              </div>
            </div>

          </div>
        </div>
      </div>
    </div>
  </section>

  {{-- Political Approach --}}
  <section class="relative min-h-screen flex items-center justify-center px-4 bg-gradient-to-br from-blue-50 via-white to-red-50 dark:from-gray-950 dark:via-gray-900 dark:to-blue-950/30 overflow-hidden">
    {{-- Background Elements --}}
    <div class="absolute inset-0 overflow-hidden pointer-events-none">
      <div class="absolute top-20 left-10 w-72 h-72 bg-blue-500/10 rounded-full blur-3xl animate-pulse"></div>
      <div class="absolute bottom-20 right-10 w-96 h-96 bg-red-500/10 rounded-full blur-3xl animate-pulse" style="animation-delay: 1s"></div>
    </div>

    <div class="max-w-7xl mx-auto w-full relative z-10 py-20 lg:py-28">
      <div class="group relative max-w-5xl mx-auto" data-aos="fade-up">
        <div class="absolute -inset-1 bg-gradient-to-r from-red-600 via-orange-500 to-yellow-500 rounded-3xl opacity-20 group-hover:opacity-30 blur-xl transition duration-500"></div>
        <div class="relative bg-gradient-to-br from-red-50 to-orange-50 dark:from-red-950/30 dark:to-orange-950/30 rounded-3xl p-10 lg:p-16 border-2 border-red-200 dark:border-red-800 shadow-2xl">
          <div class="text-center">
            <div class="inline-flex items-center justify-center w-16 h-16 bg-gradient-to-br from-red-600 to-orange-600 rounded-2xl mb-6 shadow-lg">
              <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
              </svg>
            </div>
            <h2 class="text-4xl lg:text-5xl font-extrabold text-red-900 dark:text-red-100 mb-8">{{ __('site.ideology.political_struggle_title') }}</h2>
            <p class="text-xl text-red-800/90 dark:text-red-200/80 leading-relaxed">
              {{ __('site.ideology.political_struggle_desc') }}
            </p>
          </div>
        </div>
      </div>
    </div>
  </section>

  {{-- Revolutionary Slogans --}}
  <section class="relative min-h-screen flex items-center justify-center px-4 bg-white dark:bg-gray-950 overflow-hidden">
    {{-- Background Elements --}}
    <div class="absolute inset-0 overflow-hidden pointer-events-none">
      <div class="absolute top-1/4 right-10 w-96 h-96 bg-blue-500/5 rounded-full blur-3xl"></div>
      <div class="absolute bottom-1/4 left-10 w-96 h-96 bg-red-500/5 rounded-full blur-3xl"></div>
    </div>

    <div class="max-w-7xl mx-auto w-full relative z-10 py-20 lg:py-28">
      {{-- Section Header --}}
      <div class="text-center mb-16" data-aos="fade-up">
        <h2 class="text-4xl md:text-5xl lg:text-6xl font-bold text-gray-900 dark:text-white mb-6 tracking-tight">
          {{ __('site.ideology.slogans_title') }}
        </h2>
      </div>

      {{-- Slogans Grid --}}
      <div class="grid grid-cols-1 md:grid-cols-3 gap-8 lg:gap-10">

        {{-- Slogan 1 --}}
        <div class="group relative" data-aos="zoom-in" data-aos-delay="0">
          <div class="absolute -inset-1 bg-gradient-to-r from-red-600 to-red-800 rounded-3xl blur-lg opacity-75 group-hover:opacity-100 transition duration-500"></div>
          <div class="relative bg-gradient-to-br from-red-600 via-red-700 to-red-800 p-8 rounded-3xl shadow-2xl text-center transform hover:-translate-y-2 hover:scale-105 transition-all duration-500 min-h-[200px] flex items-center justify-center">
            <div class="text-yellow-100">
              <svg class="w-12 h-12 mx-auto mb-4 opacity-50" fill="currentColor" viewBox="0 0 24 24">
                <path d="M12 2L2 7v10c0 5.55 3.84 10.74 9 12 5.16-1.26 9-6.45 9-12V7l-10-5z"/>
              </svg>
              <p class="text-2xl font-bold leading-relaxed">{{ __('site.ideology.slogan_1') }}</p>
            </div>
          </div>
        </div>

        {{-- Slogan 2 --}}
        <div class="group relative" data-aos="zoom-in" data-aos-delay="100">
          <div class="absolute -inset-1 bg-gradient-to-r from-yellow-500 to-orange-600 rounded-3xl blur-lg opacity-75 group-hover:opacity-100 transition duration-500"></div>
          <div class="relative bg-gradient-to-br from-yellow-500 via-yellow-600 to-orange-600 p-8 rounded-3xl shadow-2xl text-center transform hover:-translate-y-2 hover:scale-105 transition-all duration-500 min-h-[200px] flex items-center justify-center">
            <div class="text-red-900">
              <svg class="w-12 h-12 mx-auto mb-4 opacity-50" fill="currentColor" viewBox="0 0 24 24">
                <path d="M12 2L2 7v10c0 5.55 3.84 10.74 9 12 5.16-1.26 9-6.45 9-12V7l-10-5z"/>
              </svg>
              <p class="text-2xl font-bold leading-relaxed">{{ __('site.ideology.slogan_2') }}</p>
            </div>
          </div>
        </div>

        {{-- Slogan 3 --}}
        <div class="group relative" data-aos="zoom-in" data-aos-delay="200">
          <div class="absolute -inset-1 bg-gradient-to-r from-blue-700 to-blue-900 rounded-3xl blur-lg opacity-75 group-hover:opacity-100 transition duration-500"></div>
          <div class="relative bg-gradient-to-br from-blue-700 via-blue-800 to-blue-900 p-8 rounded-3xl shadow-2xl text-center transform hover:-translate-y-2 hover:scale-105 transition-all duration-500 min-h-[200px] flex items-center justify-center">
            <div class="text-yellow-100">
              <svg class="w-12 h-12 mx-auto mb-4 opacity-50" fill="currentColor" viewBox="0 0 24 24">
                <path d="M12 2L2 7v10c0 5.55 3.84 10.74 9 12 5.16-1.26 9-6.45 9-12V7l-10-5z"/>
              </svg>
              <p class="text-2xl font-bold leading-relaxed">{{ __('site.ideology.slogan_3') }}</p>
            </div>
          </div>
        </div>

      </div>
    </div>
  </section>

@endsection