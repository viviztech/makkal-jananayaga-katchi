@extends('layouts.app')

@section('title', __('site.party_wings.title'))

@section('content')

  {{-- Page Header --}}
  <section class="relative bg-gray-900 dark:bg-gray-950 py-24 md:py-32">
    <div class="relative max-w-7xl mx-auto px-4 text-center">
      <h1 class="text-5xl md:text-6xl font-extrabold text-white mb-4">{{ __('site.party_wings.title') }}</h1>
      <p class="text-xl text-gray-300 max-w-3xl mx-auto">{{ __('site.party_wings.subtitle') }}</p>
    </div>
  </section>

  {{-- Party Wings --}}
  @if($partyWings->isNotEmpty())
    <section class="relative min-h-screen flex items-center justify-center px-4 bg-white dark:bg-gray-950 overflow-hidden">
      {{-- Background Elements --}}
      <div class="absolute inset-0 overflow-hidden pointer-events-none">
        <div class="absolute top-1/4 right-10 w-96 h-96 bg-blue-500/5 rounded-full blur-3xl"></div>
        <div class="absolute bottom-1/4 left-10 w-96 h-96 bg-red-500/5 rounded-full blur-3xl"></div>
      </div>

      <div class="max-w-7xl mx-auto w-full relative z-10 py-20 lg:py-28">
        {{-- Section Title --}}
        <div class="text-center mb-16" data-aos="fade-up">
          <h2 class="text-4xl md:text-5xl lg:text-6xl font-bold text-gray-900 dark:text-white mb-6 tracking-tight">
            {{ __('site.party_wings.wings_title') }}
          </h2>
          <p class="text-xl md:text-2xl text-gray-600 dark:text-gray-400 max-w-3xl mx-auto font-light">
            {{ __('site.party_wings.wings_desc') }}
          </p>
        </div>

        {{-- Party Wings Grid --}}
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 lg:gap-10">
          @foreach($partyWings as $wing)
            <div class="group relative" data-aos="fade-up" data-aos-delay="{{ $loop->index * 50 }}">
              {{-- Animated Border --}}
              <div class="absolute -inset-0.5 bg-gradient-to-r from-blue-500 to-red-600 rounded-3xl opacity-0 group-hover:opacity-100 blur transition duration-500"></div>

              <div class="relative bg-gradient-to-br from-blue-50 to-red-50 dark:from-blue-950/30 dark:to-red-950/30 rounded-3xl p-8 border border-blue-200 dark:border-blue-800 transition-all duration-500 hover:shadow-2xl hover:-translate-y-2 h-full flex flex-col">
                {{-- Icon --}}
                <div class="relative w-14 h-14 mb-6">
                  <div class="absolute inset-0 bg-gradient-to-br from-blue-500 to-red-600 rounded-2xl opacity-20 group-hover:opacity-30 transition-opacity"></div>
                  <div class="relative w-14 h-14 bg-white dark:bg-gray-900 rounded-2xl flex items-center justify-center group-hover:scale-110 transition-transform duration-500 shadow-lg border-2 border-blue-200 dark:border-blue-700">
                    <svg class="w-7 h-7 text-blue-600 dark:text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                    </svg>
                  </div>
                </div>

                <h3 class="text-2xl font-bold text-blue-900 dark:text-blue-100 mb-3">
                  {{ app()->getLocale() === 'ta' ? $wing->name_ta : $wing->name_en }}
                </h3>
                
                @if($wing->postingstage)
                  <p class="text-blue-700/80 dark:text-blue-200/70 text-sm mb-4">
                    {{ app()->getLocale() === 'ta' ? $wing->postingstage->name_ta : $wing->postingstage->name_en }}
                  </p>
                @endif
              </div>
            </div>
          @endforeach
        </div>
      </div>
    </section>
  @else
    {{-- Empty State --}}
    <section class="py-20 lg:py-28 bg-white dark:bg-gray-900">
      <div class="max-w-7xl mx-auto px-4 text-center">
        <div class="w-20 h-20 bg-gray-200 dark:bg-gray-700 rounded-full flex items-center justify-center mx-auto mb-4">
          <svg class="w-10 h-10 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
          </svg>
        </div>
        <h2 class="text-2xl font-bold text-gray-900 dark:text-white mb-2">{{ __('site.party_wings.no_wings') }}</h2>
        <p class="text-gray-600 dark:text-gray-400">{{ __('site.party_wings.no_wings_desc') }}</p>
      </div>
    </section>
  @endif

  {{-- Contact CTA --}}
  <section class="py-20 lg:py-28 px-4 bg-red-50 dark:bg-gray-900">
    <div class="max-w-4xl mx-auto text-center">
      <h2 class="text-3xl lg:text-4xl font-extrabold text-red-700 dark:text-red-500 mb-6">{{ __('site.party_wings.contact_title') }}</h2>
      <p class="text-lg text-gray-700 dark:text-gray-300 mb-8">{{ __('site.party_wings.contact_desc') }}</p>
      <a href="{{ route('contact') }}" class="inline-block bg-red-600 text-white px-8 py-3 rounded-lg font-semibold hover:bg-red-700 dark:hover:bg-red-500 transition-all duration-300 transform hover:scale-105 shadow hover:shadow-lg">
        {{ __('site.party_wings.contact_button') }}
      </a>
    </div>
  </section>

@endsection

