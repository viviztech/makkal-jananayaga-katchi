@extends('layouts.app')

@section('title', __('site.leadership.title'))

@section('content')

{{-- Page Hero --}}
<section class="bg-gradient-to-br from-[var(--color-mjk-red)] via-[var(--color-mjk-red)] to-[var(--color-mjk-blue)] py-20">
    <div class="max-w-7xl mx-auto px-4 text-center" data-aos="fade-up">
        <h1 class="text-5xl md:text-6xl font-extrabold text-white mb-6">
            {{ __('site.leadership.title') }}
        </h1>
        <p class="text-xl md:text-2xl text-white/90 max-w-3xl mx-auto">
            {{ __('site.leadership.subtitle') }}
        </p>
    </div>
</section>

{{-- Leadership Bearers --}}
@if($bearers->isNotEmpty())
    @foreach($bearersByPost as $postId => $postBearers)
        @php
            $post = $postBearers->first()->post;
            $postName = app()->getLocale() === 'ta' ? $post->name_ta : $post->name_en;
        @endphp

        <section class="py-16 {{ $loop->even ? 'bg-gray-50' : 'bg-white' }}">
            <div class="max-w-7xl mx-auto px-4">
                {{-- Post Title --}}
                <h2 class="text-4xl md:text-5xl font-extrabold text-center mb-12 text-gray-900" data-aos="fade-up">
                    {{ $postName }}
                </h2>

                {{-- Bearers Grid --}}
                <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                    @foreach($postBearers as $bearer)
                        @php
                            $bearerName = app()->getLocale() === 'ta' ? $bearer->name_ta : $bearer->name_en;
                            $bearerPost = $bearer->post ? (app()->getLocale() === 'ta' ? $bearer->post->name_ta : $bearer->post->name_en) : '';
                        @endphp

                        <div class="card-campaign" data-aos="fade-up" data-aos-delay="{{ ($loop->index % 3) * 100 }}">
                            <div class="p-6">
                                {{-- Photo --}}
                                <div class="mb-6">
                                    @if($bearer->photo_url)
                                        <img
                                            src="{{ $bearer->photo_url }}"
                                            alt="{{ $bearerName }}"
                                            class="w-32 h-32 rounded-full object-cover mx-auto shadow-lg border-4 border-[var(--color-mjk-red)]"
                                            onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';"
                                        />
                                    @endif
                                    <div class="w-32 h-32 rounded-full bg-gray-200 mx-auto flex items-center justify-center {{ $bearer->photo_url ? 'hidden' : '' }}">
                                        <svg class="w-16 h-16 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                        </svg>
                                    </div>
                                </div>

                                {{-- Name & Post --}}
                                <div class="text-center mb-4">
                                    <h3 class="text-xl font-bold text-gray-900 mb-1">
                                        {{ $bearerName }}
                                    </h3>
                                    @if($bearerPost)
                                        <p class="text-base text-gray-600">
                                            {{ $bearerPost }}
                                        </p>
                                    @endif
                                </div>

                                {{-- Social Links --}}
                                @if($bearer->facebook || $bearer->x || $bearer->instagram || $bearer->youtube)
                                    <div class="flex justify-center gap-3">
                                        @if($bearer->facebook)
                                            <a href="{{ $bearer->facebook }}" target="_blank" class="w-10 h-10 rounded-full border-2 border-gray-300 hover:border-[var(--color-mjk-blue)] hover:bg-[var(--color-mjk-blue)] hover:text-white flex items-center justify-center transition-all">
                                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                                    <path d="M15.12,5.32H17V2.14A26.11,26.11,0,0,0,14.26,2C11.54,2,9.68,3.66,9.68,6.7V9.32H6.61v3.56H9.68V22h3.68V12.88h3.06l.46-3.56H13.36V7.05C13.36,6,13.64,5.32,15.12,5.32Z"></path>
                                                </svg>
                                            </a>
                                        @endif
                                        @if($bearer->x)
                                            <a href="{{ $bearer->x }}" target="_blank" class="w-10 h-10 rounded-full border-2 border-gray-300 hover:border-sky-500 hover:bg-sky-500 hover:text-white flex items-center justify-center transition-all">
                                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                                    <path d="M22,5.8a8.49,8.49,0,0,1-2.36.64,4.13,4.13,0,0,0,1.81-2.27,8.21,8.21,0,0,1-2.61,1,4.1,4.1,0,0,0-7,3.74A11.64,11.64,0,0,1,3.39,4.62a4.16,4.16,0,0,0-.55,2.07A4.09,4.09,0,0,0,4.66,10.1,4.05,4.05,0,0,1,2.8,9.59v.05a4.1,4.1,0,0,0,3.3,4A3.93,3.93,0,0,1,5,13.81a4.9,4.9,0,0,1-.77-.07,4.11,4.11,0,0,0,3.83,2.84A8.22,8.22,0,0,1,3,18.34a7.93,7.93,0,0,1-1-.06,11.57,11.57,0,0,0,6.29,1.85A11.59,11.59,0,0,0,20,8.45c0-.17,0-.35,0-.53A8.43,8.43,0,0,0,22,5.8Z"></path>
                                                </svg>
                                            </a>
                                        @endif
                                        @if($bearer->instagram)
                                            <a href="{{ $bearer->instagram }}" target="_blank" class="w-10 h-10 rounded-full border-2 border-gray-300 hover:border-pink-600 hover:bg-pink-600 hover:text-white flex items-center justify-center transition-all">
                                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                                    <path d="M17.34,5.46h0a1.2,1.2,0,1,0,1.2,1.2A1.2,1.2,0,0,0,17.34,5.46Zm4.6,2.42a7.59,7.59,0,0,0-.46-2.43,4.94,4.94,0,0,0-1.16-1.77,4.7,4.7,0,0,0-1.77-1.15,7.3,7.3,0,0,0-2.43-.47C15.06,2,14.72,2,12,2s-3.06,0-4.12.06a7.3,7.3,0,0,0-2.43.47A4.78,4.78,0,0,0,3.68,3.68,4.7,4.7,0,0,0,2.53,5.45a7.3,7.3,0,0,0-.47,2.43C2,8.94,2,9.28,2,12s0,3.06.06,4.12a7.3,7.3,0,0,0,.47,2.43,4.7,4.7,0,0,0,1.15,1.77,4.78,4.78,0,0,0,1.77,1.15,7.3,7.3,0,0,0,2.43.47C8.94,22,9.28,22,12,22s3.06,0,4.12-.06a7.3,7.3,0,0,0,2.43-.47,4.7,4.7,0,0,0,1.77-1.15,4.85,4.85,0,0,0,1.16-1.77,7.59,7.59,0,0,0,.46-2.43c0-1.06.06-1.4.06-4.12S22,8.94,21.94,7.88ZM20.14,16a5.61,5.61,0,0,1-.34,1.86,3.06,3.06,0,0,1-.75,1.15,3.19,3.19,0,0,1-1.15.75,5.61,5.61,0,0,1-1.86.34c-1,.05-1.37.06-4,.06s-3,0-4-.06A5.73,5.73,0,0,1,6.1,19.8,3.27,3.27,0,0,1,5,19.05a3,3,0,0,1-.74-1.15A5.54,5.54,0,0,1,3.86,16c0-1-.06-1.37-.06-4s0-3,.06-4A5.54,5.54,0,0,1,4.21,6.1,3,3,0,0,1,5,5,3.14,3.14,0,0,1,6.1,4.2,5.73,5.73,0,0,1,8,3.86c1,0,1.37-.06,4-.06s3,0,4,.06a5.61,5.61,0,0,1,1.86.34A3.06,3.06,0,0,1,19.05,5,3.06,3.06,0,0,1,19.8,6.1,5.61,5.61,0,0,1,20.14,8c.05,1,.06,1.37.06,4S20.19,15,20.14,16ZM12,6.87A5.13,5.13,0,1,0,17.14,12,5.12,5.12,0,0,0,12,6.87Zm0,8.46A3.33,3.33,0,1,1,15.33,12,3.33,3.33,0,0,1,12,15.33Z"></path>
                                                </svg>
                                            </a>
                                        @endif
                                        @if($bearer->youtube)
                                            <a href="{{ $bearer->youtube }}" target="_blank" class="w-10 h-10 rounded-full border-2 border-gray-300 hover:border-red-600 hover:bg-red-600 hover:text-white flex items-center justify-center transition-all">
                                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                                    <path d="M23.498 6.186a3.016 3.016 0 0 0-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 0 0 .502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 0 0 2.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 0 0 2.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z"></path>
                                                </svg>
                                            </a>
                                        @endif
                                    </div>
                                @endif
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endforeach
@else
    {{-- Empty State --}}
    <section class="bg-gray-50 py-20">
        <div class="max-w-7xl mx-auto px-4 text-center">
            <div class="w-20 h-20 bg-gray-200 rounded-full flex items-center justify-center mx-auto mb-6">
                <svg class="w-10 h-10 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                </svg>
            </div>
            <h2 class="text-3xl font-bold text-gray-900 mb-2">
                {{ __('site.leadership.no_bearers') }}
            </h2>
            <p class="text-lg text-gray-600">
                {{ __('site.leadership.no_bearers_desc') }}
            </p>
        </div>
    </section>
@endif

{{-- CTA Section --}}
<section class="bg-gradient-to-r from-[var(--color-mjk-red)] to-[var(--color-mjk-blue)] py-20">
    <div class="max-w-4xl mx-auto px-4 text-center" data-aos="zoom-in">
        <h2 class="text-4xl md:text-5xl font-extrabold text-white mb-6">
            {{ __('site.leadership.join_team_cta') }}
        </h2>
        <p class="text-xl text-white/90 mb-10">
            {{ __('site.leadership.join_team_desc') }}
        </p>
        <div class="flex flex-col sm:flex-row gap-4 justify-center">
            <a href="{{ route('join') }}" class="btn-campaign btn-campaign-outline text-xl px-10">
                {{ __('site.menu.join_mjk') }}
            </a>
            <a href="{{ route('contact') }}" class="btn-campaign btn-campaign-cta text-xl px-10">
                {{ __('site.menu.contact') }}
            </a>
        </div>
    </div>
</section>

@endsection
