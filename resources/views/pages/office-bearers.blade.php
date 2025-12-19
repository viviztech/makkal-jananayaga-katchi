@extends('layouts.app')

@section('title', __('site.office_bearers.title'))

@section('content')
@php
use Illuminate\Support\Facades\Storage;
@endphp

  {{-- Page Header --}}
  <section class="relative bg-gray-900 dark:bg-gray-950 py-24 md:py-32">
    <div class="relative max-w-7xl mx-auto px-4 text-center">
      <h1 class="text-5xl md:text-6xl font-extrabold text-white mb-4">{{ __('site.office_bearers.title') }}</h1>
      <p class="text-xl text-gray-300 max-w-3xl mx-auto">{{ __('site.office_bearers.subtitle') }}</p>
    </div>
  </section>

  {{-- Office Bearers by Post --}}
  @if($posts->isNotEmpty())
    <section class="relative py-20 lg:py-28 px-4 bg-gray-50 dark:bg-gray-900 overflow-hidden">
      {{-- Background Elements --}}
      <div class="absolute inset-0 overflow-hidden pointer-events-none">
        <div class="absolute top-1/4 right-10 w-96 h-96 bg-blue-500/5 rounded-full blur-3xl"></div>
        <div class="absolute bottom-1/4 left-10 w-96 h-96 bg-red-500/5 rounded-full blur-3xl"></div>
      </div>

      <div class="max-w-7xl mx-auto w-full relative z-10">
        @foreach($posts as $post)
          @php
            $postBearers = $post->bearers;
          @endphp

          {{-- Post Title --}}
          <div class="text-center mb-12 {{ !$loop->first ? 'mt-16' : '' }}">
            <h2 class="text-3xl md:text-4xl lg:text-5xl font-bold text-gray-900 dark:text-white mb-4">
              {{ app()->getLocale() === 'ta' ? $post->name_ta : $post->name_en }}
            </h2>
            @if($post->description_en || $post->description_ta)
              <p class="text-lg text-gray-600 dark:text-gray-400 max-w-3xl mx-auto">
                {{ app()->getLocale() === 'ta' ? $post->description_ta : $post->description_en }}
              </p>
            @endif
          </div>

          {{-- Bearers Grid --}}
          <div class="grid xl:grid-cols-3 md:grid-cols-2 gap-6 mb-16">
            @foreach($postBearers as $bearer)
              @php
                $imageExists = false;
                if ($bearer->photo_url) {
                  // Check if it's a local storage path
                  if (strpos($bearer->photo_url, 'storage/') !== false || strpos($bearer->photo_url, '/storage/') !== false) {
                    $path = str_replace(['storage/', '/storage/'], '', parse_url($bearer->photo_url, PHP_URL_PATH));
                    $imageExists = Storage::disk('public')->exists($path);
                  } elseif (filter_var($bearer->photo_url, FILTER_VALIDATE_URL)) {
                    // For external URLs, check if file exists using get_headers
                    $headers = @get_headers($bearer->photo_url, 1);
                    $imageExists = $headers && strpos($headers[0], '200') !== false;
                  } else {
                    // For relative paths
                    $imageExists = file_exists(public_path($bearer->photo_url));
                  }
                }
              @endphp
              <div>
                <div class="bg-white dark:bg-gray-800 shadow rounded p-5">
                  <div class="flex items-center gap-6">
                    @if($imageExists)
                      <div class="rounded-xl h-32 w-32 bg-gray-200 dark:bg-gray-700 flex items-center justify-center relative overflow-hidden">
                        <img src="{{ $bearer->photo_url }}" 
                             alt="{{ app()->getLocale() === 'ta' ? $bearer->name_ta : $bearer->name_en }}" 
                             class="rounded-xl h-32 w-32 object-cover absolute inset-0"
                             onerror="this.style.display='none'; this.parentElement.querySelector('.user-icon').style.display='flex';">
                        <svg class="w-16 h-16 text-gray-400 dark:text-gray-500 user-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24" style="display: none;">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                        </svg>
                      </div>
                    @else
                      <div class="rounded-xl h-32 w-32 bg-gray-200 dark:bg-gray-700 flex items-center justify-center">
                        <svg class="w-16 h-16 text-gray-400 dark:text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                        </svg>
                      </div>
                    @endif
                    <div>
                      <h2 class="text-xl mb-1 text-gray-900 dark:text-white">
                        {{ app()->getLocale() === 'ta' ? $bearer->name_ta : $bearer->name_en }}
                      </h2>
                      @if($bearer->post)
                        <p class="font-medium text-lg text-gray-500 dark:text-gray-400">
                          {{ app()->getLocale() === 'ta' ? $bearer->post->name_ta : $bearer->post->name_en }}
                        </p>
                      @endif

                      <div class="flex items-center gap-3 mt-4">
                        @if($bearer->facebook)
                          <a href="{{ $bearer->facebook }}" target="_blank" class="border fill-gray-400 rounded-full flex items-center justify-center transition-all duration-300 hover:bg-blue-700 hover:fill-white h-8 w-8">
                            <svg class="h-4 w-4" xmlns="http://www.w3.org/2000/svg" data-name="Layer 1" viewBox="0 0 24 24" id="facebook">
                              <path d="M15.12,5.32H17V2.14A26.11,26.11,0,0,0,14.26,2C11.54,2,9.68,3.66,9.68,6.7V9.32H6.61v3.56H9.68V22h3.68V12.88h3.06l.46-3.56H13.36V7.05C13.36,6,13.64,5.32,15.12,5.32Z"></path>
                            </svg>
                          </a>
                        @endif
                        @if($bearer->x)
                          <a href="{{ $bearer->x }}" target="_blank" class="border fill-gray-400 rounded-full flex items-center justify-center transition-all duration-300 hover:bg-sky-500 hover:fill-white h-8 w-8">
                            <svg class="h-4 w-4" xmlns="http://www.w3.org/2000/svg" data-name="Layer 1" viewBox="0 0 24 24" id="twitter">
                              <path d="M22,5.8a8.49,8.49,0,0,1-2.36.64,4.13,4.13,0,0,0,1.81-2.27,8.21,8.21,0,0,1-2.61,1,4.1,4.1,0,0,0-7,3.74A11.64,11.64,0,0,1,3.39,4.62a4.16,4.16,0,0,0-.55,2.07A4.09,4.09,0,0,0,4.66,10.1,4.05,4.05,0,0,1,2.8,9.59v.05a4.1,4.1,0,0,0,3.3,4A3.93,3.93,0,0,1,5,13.81a4.9,4.9,0,0,1-.77-.07,4.11,4.11,0,0,0,3.83,2.84A8.22,8.22,0,0,1,3,18.34a7.93,7.93,0,0,1-1-.06,11.57,11.57,0,0,0,6.29,1.85A11.59,11.59,0,0,0,20,8.45c0-.17,0-.35,0-.53A8.43,8.43,0,0,0,22,5.8Z"></path>
                            </svg>
                          </a>
                        @endif
                        @if($bearer->instagram)
                          <a href="{{ $bearer->instagram }}" target="_blank" class="border fill-gray-400 rounded-full flex items-center justify-center transition-all duration-300 hover:bg-pink-600 hover:fill-white h-8 w-8">
                            <svg class="h-4 w-4" xmlns="http://www.w3.org/2000/svg" data-name="Layer 1" viewBox="0 0 24 24" id="instagram">
                              <path d="M17.34,5.46h0a1.2,1.2,0,1,0,1.2,1.2A1.2,1.2,0,0,0,17.34,5.46Zm4.6,2.42a7.59,7.59,0,0,0-.46-2.43,4.94,4.94,0,0,0-1.16-1.77,4.7,4.7,0,0,0-1.77-1.15,7.3,7.3,0,0,0-2.43-.47C15.06,2,14.72,2,12,2s-3.06,0-4.12.06a7.3,7.3,0,0,0-2.43.47A4.78,4.78,0,0,0,3.68,3.68,4.7,4.7,0,0,0,2.53,5.45a7.3,7.3,0,0,0-.47,2.43C2,8.94,2,9.28,2,12s0,3.06.06,4.12a7.3,7.3,0,0,0,.47,2.43,4.7,4.7,0,0,0,1.15,1.77,4.78,4.78,0,0,0,1.77,1.15,7.3,7.3,0,0,0,2.43.47C8.94,22,9.28,22,12,22s3.06,0,4.12-.06a7.3,7.3,0,0,0,2.43-.47,4.7,4.7,0,0,0,1.77-1.15,4.85,4.85,0,0,0,1.16-1.77,7.59,7.59,0,0,0,.46-2.43c0-1.06.06-1.4.06-4.12S22,8.94,21.94,7.88ZM20.14,16a5.61,5.61,0,0,1-.34,1.86,3.06,3.06,0,0,1-.75,1.15,3.19,3.19,0,0,1-1.15.75,5.61,5.61,0,0,1-1.86.34c-1,.05-1.37.06-4,.06s-3,0-4-.06A5.73,5.73,0,0,1,6.1,19.8,3.27,3.27,0,0,1,5,19.05a3,3,0,0,1-.74-1.15A5.54,5.54,0,0,1,3.86,16c0-1-.06-1.37-.06-4s0-3,.06-4A5.54,5.54,0,0,1,4.21,6.1,3,3,0,0,1,5,5,3.14,3.14,0,0,1,6.1,4.2,5.73,5.73,0,0,1,8,3.86c1,0,1.37-.06,4-.06s3,0,4,.06a5.61,5.61,0,0,1,1.86.34A3.06,3.06,0,0,1,19.05,5,3.06,3.06,0,0,1,19.8,6.1,5.61,5.61,0,0,1,20.14,8c.05,1,.06,1.37.06,4S20.19,15,20.14,16ZM12,6.87A5.13,5.13,0,1,0,17.14,12,5.12,5.12,0,0,0,12,6.87Zm0,8.46A3.33,3.33,0,1,1,15.33,12,3.33,3.33,0,0,1,12,15.33Z"></path>
                            </svg>
                          </a>
                        @endif
                        @if($bearer->youtube)
                          <a href="{{ $bearer->youtube }}" target="_blank" class="border fill-gray-400 rounded-full flex items-center justify-center transition-all duration-300 hover:bg-red-600 hover:fill-white h-8 w-8">
                            <svg class="h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" id="youtube">
                              <path d="M23.498 6.186a3.016 3.016 0 0 0-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 0 0 .502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 0 0 2.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 0 0 2.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z"></path>
                            </svg>
                          </a>
                        @endif
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            @endforeach
          </div>
        @endforeach
      </div>
    </section>
  @else
    {{-- Empty State --}}
    <section class="py-20 lg:py-28 bg-gray-50 dark:bg-gray-900">
      <div class="max-w-7xl mx-auto px-4 text-center">
        <div class="w-20 h-20 bg-gray-200 dark:bg-gray-700 rounded-full flex items-center justify-center mx-auto mb-4">
          <svg class="w-10 h-10 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
          </svg>
        </div>
        <h2 class="text-2xl font-bold text-gray-900 dark:text-white mb-2">No Office Bearers Found</h2>
        <p class="text-gray-600 dark:text-gray-400">Office bearers information will be displayed here once available.</p>
      </div>
    </section>
  @endif

@endsection
