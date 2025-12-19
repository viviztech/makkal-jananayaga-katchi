@extends('layouts.app')

@section('title', __('site.party_representatives.title'))

@section('content')
  {{-- Page Header --}}
  <section class="relative bg-gray-900 dark:bg-gray-950 py-24 md:py-32">
    <div class="relative max-w-7xl mx-auto px-4 text-center">
      <h1 class="text-5xl md:text-6xl font-extrabold text-white mb-4">{{ __('site.menu.party_representatives') }}</h1>
      <p class="text-xl text-gray-300 max-w-3xl mx-auto">{{ __('site.party_representatives.district_representatives_desc') ?? 'மாவட்ட அளவிலான பிரதிநிதிகள்' }}</p>
    </div>
  </section>

  

  {{-- District Representatives --}}
  @if(isset($districtRepresentatives) && !empty($districtRepresentatives))
    <section class="relative py-20 lg:py-28 px-4 bg-gray-50 dark:bg-gray-900 overflow-hidden">
      {{-- Background Elements --}}
      <div class="absolute inset-0 overflow-hidden pointer-events-none">
        <div class="absolute top-1/4 right-10 w-96 h-96 bg-blue-500/5 rounded-full blur-3xl"></div>
        <div class="absolute bottom-1/4 left-10 w-96 h-96 bg-red-500/5 rounded-full blur-3xl"></div>
      </div>

      <div class="max-w-7xl mx-auto w-full relative z-10">
        

        {{-- District Representatives Grid --}}
        <div class="grid xl:grid-cols-3 md:grid-cols-2 gap-6">
          @foreach($districtRepresentatives as $districtRep)
            <div>
              <div class="bg-white dark:bg-gray-800 shadow rounded p-5">
                <div class="flex items-center gap-6">
                  <div class="rounded-xl h-32 w-32 bg-gray-200 dark:bg-gray-700 flex items-center justify-center">
                    <svg class="w-16 h-16 text-gray-400 dark:text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                    </svg>
                  </div>
                  <div>
                    <h2 class="text-xl mb-1 text-gray-900 dark:text-white">
                      {{ $districtRep['name'] }}
                    </h2>
                    <p class="font-medium text-lg text-gray-500 dark:text-gray-400">
                      {{ $districtRep['district'] }}
                    </p>
                  </div>
                </div>
              </div>
            </div>
          @endforeach
        </div>
      </div>
    </section>
  @endif

  {{-- Contact Representatives CTA --}}
  <section class="py-20 lg:py-28 px-4 {{ (isset($representatives) && $representatives->isNotEmpty()) ? 'bg-red-50 dark:bg-gray-900' : 'bg-white dark:bg-gray-800' }}">
    <div class="max-w-4xl mx-auto text-center">
      <h2 class="text-3xl lg:text-4xl font-extrabold text-red-700 dark:text-red-500 mb-6">{{ __('site.party_representatives.contact_title') }}</h2>
      <p class="text-lg text-gray-700 dark:text-gray-300 mb-8">{{ __('site.party_representatives.contact_desc') }}</p>
      <a href="{{ route('contact') }}" class="inline-block bg-red-600 text-white px-8 py-3 rounded-lg font-semibold hover:bg-red-700 dark:hover:bg-red-500 transition-all duration-300 transform hover:scale-105 shadow hover:shadow-lg">
        {{ __('site.party_representatives.contact_button') }}
      </a>
    </div>
  </section>

@endsection
