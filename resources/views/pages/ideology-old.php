
@extends('layouts.app')

@section('content')
  <!-- Hero Section -->
  <section class="bg-gradient-to-r from-blue-700 to-blue-900 text-white py-12">
    <div class="container mx-auto px-4 text-center">
      <h1 class="text-3xl md:text-4xl font-bold mb-4">{{ __('site.about.title') }}</h1>
      <!-- <p class="max-w-3xl mx-auto text-lg opacity-90">
        The resolve to see India as a global superpower during the 'Amrit Kaal' is no castle in the air—it is a meticulously designed roadmap backed by strong economic foundations.
      </p> -->
    </div>
  </section>

    <!-- About Us Section -->
    <section id="about-us" class="min-h-screen snap-start bg-white flex items-center justify-center py-8 md:py-0 overflow-auto pt-25  pb-25">
        <div class="container mx-auto px-4">
            <h2 class="text-2xl sm:text-3xl md:text-4xl font-bold text-red-600 mb-4 sm:mb-6 text-center tamil">{{ __('site.about.title') }}</h2>
            <h3 class="text-xl sm:text-2xl lg:text-3xl font-semibold text-blue-600 mb-4 sm:mb-6 text-center tamil">{{ __('site.about.subtitle') }}</h3>
            <div class="flex flex-col lg:flex-row items-center gap-8 lg:gap-12">
                <!-- Content Side -->
                <div class="flex-1 px-4 lg:px-0 text-center lg:text-left">
                    <p class="text-xl sm:text-xl lg:text-1xl text-gray-700 text-justify leading-relaxed mb-4 tamil">
                        {{ __('site.about.intro-1') }}
                    </p>
                    <p class="text-xl sm:text-xl lg:text-1xl text-gray-700 text-justify leading-relaxed tamil">
                        {{ __('site.about.intro-2') }}
                    </p>
                </div>
                <!-- Image Side -->
                <div class="flex-1 w-full max-w-md lg:max-w-none">
                    <img src="{{ asset('assets/images/about/vck-about.webp') }}" alt="About Us" class="w-full h-160 object-cover rounded-lg shadow-lg">
                </div>
            </div>
        </div>
    </section>

 
@endsection