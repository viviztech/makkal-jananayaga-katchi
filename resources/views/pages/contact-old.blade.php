@extends('layouts.app')

@section('title', __('site.menu.contact'))

@section('content')
    {{-- Page Header --}}
    <x-page-header-simple
        :title="__('site.contact.title')"
        :subtitle="__('site.contact.get_in_touch')"
    />

    {{-- Contact Information & Form Section --}}
    <section class="py-20 lg:py-28 px-4 bg-gray-100 dark:bg-gray-900">
        <div class="max-w-7xl mx-auto">
            {{-- Contact Information Cards --}}
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 lg:gap-12 mb-16">
                {{-- Address Card --}}
                <div class="group relative" data-aos="fade-up" data-aos-delay="0">
                    {{-- Animated Gradient Border --}}
                    <div class="absolute -inset-0.5 bg-gradient-to-r from-blue-500 to-red-500 rounded-3xl opacity-0 group-hover:opacity-100 blur transition duration-500"></div>

                    {{-- Card Content --}}
                    <div class="relative bg-white dark:bg-gray-800 rounded-3xl overflow-hidden transition-all duration-500 hover:shadow-2xl hover:-translate-y-2 h-full border border-blue-100 dark:border-blue-900/30">
                        <div class="p-8 bg-gradient-to-br from-blue-50/50 to-red-50/50 dark:from-blue-950/20 dark:to-red-950/20">
                            <div class="flex flex-col items-center text-center">
                                <div class="relative w-16 h-16 mb-6">
                                    <div class="absolute inset-0 bg-gradient-to-br from-blue-500 to-red-600 rounded-2xl opacity-20 group-hover:opacity-30 transition-opacity"></div>
                                    <div class="relative w-16 h-16 bg-white dark:bg-gray-900 rounded-2xl flex items-center justify-center group-hover:scale-110 transition-transform duration-500 shadow-lg border-2 border-blue-200 dark:border-blue-700">
                                        <svg class="w-8 h-8 text-blue-600 dark:text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                                        </svg>
                                    </div>
                                </div>
                                <h3 class="text-xl font-bold text-blue-900 dark:text-blue-100 mb-3">
                                    {{ __('site.contact.visit_office') }}
                                </h3>
                                <p class="text-blue-700/80 dark:text-blue-200/70 leading-relaxed">
                                    {{ __('site.contact.address') }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Phone Card --}}
                <div class="group relative" data-aos="fade-up" data-aos-delay="100">
                    {{-- Animated Gradient Border --}}
                    <div class="absolute -inset-0.5 bg-gradient-to-r from-blue-500 to-red-500 rounded-3xl opacity-0 group-hover:opacity-100 blur transition duration-500"></div>

                    {{-- Card Content --}}
                    <div class="relative bg-white dark:bg-gray-800 rounded-3xl overflow-hidden transition-all duration-500 hover:shadow-2xl hover:-translate-y-2 h-full border border-blue-100 dark:border-blue-900/30">
                        <div class="p-8 bg-gradient-to-br from-blue-50/50 to-red-50/50 dark:from-blue-950/20 dark:to-red-950/20">
                            <div class="flex flex-col items-center text-center">
                                <div class="relative w-16 h-16 mb-6">
                                    <div class="absolute inset-0 bg-gradient-to-br from-blue-500 to-red-600 rounded-2xl opacity-20 group-hover:opacity-30 transition-opacity"></div>
                                    <div class="relative w-16 h-16 bg-white dark:bg-gray-900 rounded-2xl flex items-center justify-center group-hover:scale-110 transition-transform duration-500 shadow-lg border-2 border-blue-200 dark:border-blue-700">
                                        <svg class="w-8 h-8 text-blue-600 dark:text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                                        </svg>
                                    </div>
                                </div>
                                <h3 class="text-xl font-bold text-blue-900 dark:text-blue-100 mb-3">
                                    {{ __('site.contact.call_us') }}
                                </h3>
                                <a href="tel:{{ str_replace(' ', '', __('site.contact.phone')) }}"
                                   class="text-blue-600 dark:text-blue-400 text-base font-semibold hover:text-red-600 dark:hover:text-red-400 transition-colors duration-300">
                                    {{ __('site.contact.phone') }}
                                </a>
                                <p class="text-blue-600/70 dark:text-blue-300/60 text-sm mt-2">
                                    {{ __('site.contact.office_hours') }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Email Card --}}
                <div class="group relative" data-aos="fade-up" data-aos-delay="200">
                    {{-- Animated Gradient Border --}}
                    <div class="absolute -inset-0.5 bg-gradient-to-r from-blue-500 to-red-500 rounded-3xl opacity-0 group-hover:opacity-100 blur transition duration-500"></div>

                    {{-- Card Content --}}
                    <div class="relative bg-white dark:bg-gray-800 rounded-3xl overflow-hidden transition-all duration-500 hover:shadow-2xl hover:-translate-y-2 h-full border border-blue-100 dark:border-blue-900/30">
                        <div class="p-8 bg-gradient-to-br from-blue-50/50 to-red-50/50 dark:from-blue-950/20 dark:to-red-950/20">
                            <div class="flex flex-col items-center text-center">
                                <div class="relative w-16 h-16 mb-6">
                                    <div class="absolute inset-0 bg-gradient-to-br from-blue-500 to-red-600 rounded-2xl opacity-20 group-hover:opacity-30 transition-opacity"></div>
                                    <div class="relative w-16 h-16 bg-white dark:bg-gray-900 rounded-2xl flex items-center justify-center group-hover:scale-110 transition-transform duration-500 shadow-lg border-2 border-blue-200 dark:border-blue-700">
                                        <svg class="w-8 h-8 text-blue-600 dark:text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                                        </svg>
                                    </div>
                                </div>
                                <h3 class="text-xl font-bold text-blue-900 dark:text-blue-100 mb-3">
                                    {{ __('site.contact.email_us') }}
                                </h3>
                                <a href="mailto:{{ __('site.contact.email') }}"
                                   class="text-blue-600 dark:text-blue-400 text-base font-semibold hover:text-red-600 dark:hover:text-red-400 transition-colors duration-300 break-all">
                                    {{ __('site.contact.email') }}
                                </a>
                                <p class="text-blue-600/70 dark:text-blue-300/60 text-sm mt-2">
                                    {{ __('site.contact.response_time') }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Contact Form Section --}}
            <div class="group relative" data-aos="fade-up" data-aos-delay="300">
                {{-- Animated Gradient Border --}}
                <div class="absolute -inset-0.5 bg-gradient-to-r from-blue-500 to-red-500 rounded-3xl opacity-0 group-hover:opacity-100 blur transition duration-500"></div>

                {{-- Form Container --}}
                <div class="relative bg-white dark:bg-gray-800 rounded-3xl shadow-xl overflow-hidden border border-blue-100 dark:border-blue-900/30">
                    <div class="grid grid-cols-1 lg:grid-cols-5 gap-0">
                        {{-- Form Side --}}
                        <div class="lg:col-span-3 p-8 lg:p-12 bg-gradient-to-br from-blue-50/50 to-red-50/50 dark:from-blue-950/20 dark:to-red-950/20">
                            {{-- Form Header --}}
                            <div class="mb-8">
                                <h2 class="text-3xl lg:text-4xl font-bold text-blue-900 dark:text-blue-100 mb-3">
                                    {{ __('site.contact.send_message') }}
                                </h2>
                                <p class="text-blue-700/80 dark:text-blue-200/70 text-lg">
                                    {{ __('site.contact.questions_prompt') }}
                                </p>
                            </div>

                            {{-- Alert Messages --}}
                            @if(session('success'))
                                <div class="mb-8">
                                    <div class="relative">
                                        <div class="absolute -inset-0.5 bg-gradient-to-r from-green-500 to-emerald-500 rounded-2xl opacity-50 blur"></div>
                                        <div class="relative p-4 flex items-start bg-gradient-to-br from-green-50 to-emerald-50 dark:from-green-950/30 dark:to-emerald-950/30 border border-green-200 dark:border-green-800 text-green-700 dark:text-green-300 rounded-2xl">
                                            <svg class="w-5 h-5 mr-3 flex-shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                                            </svg>
                                            <p>{{ session('success') }}</p>
                                        </div>
                                    </div>
                                </div>
                            @endif

                            @if(session('error'))
                                <div class="mb-8">
                                    <div class="relative">
                                        <div class="absolute -inset-0.5 bg-gradient-to-r from-red-500 to-pink-500 rounded-2xl opacity-50 blur"></div>
                                        <div class="relative p-4 flex items-start bg-gradient-to-br from-red-50 to-pink-50 dark:from-red-950/30 dark:to-pink-950/30 border border-red-200 dark:border-red-800 text-red-700 dark:text-red-300 rounded-2xl">
                                            <svg class="w-5 h-5 mr-3 flex-shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-13a1 1 0 10-2 0v5a1 1 0 102 0V5zm-1 9a1 1 0 100-2 1 1 0 000 2z" clip-rule="evenodd"></path>
                                            </svg>
                                            <p>{{ session('error') }}</p>
                                        </div>
                                    </div>
                                </div>
                            @endif

                            @if($errors->any())
                                <div class="mb-8">
                                    <div class="relative">
                                        <div class="absolute -inset-0.5 bg-gradient-to-r from-red-500 to-pink-500 rounded-2xl opacity-50 blur"></div>
                                        <div class="relative p-4 flex items-start bg-gradient-to-br from-red-50 to-pink-50 dark:from-red-950/30 dark:to-pink-950/30 border border-red-200 dark:border-red-800 text-red-700 dark:text-red-300 rounded-2xl">
                                            <svg class="w-5 h-5 mr-3 flex-shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-13a1 1 0 10-2 0v5a1 1 0 102 0V5zm-1 9a1 1 0 100-2 1 1 0 000 2z" clip-rule="evenodd"></path>
                                            </svg>
                                            <div>
                                                <p class="font-semibold mb-1">{{ __('site.applications.validation_errors') }}</p>
                                                <ul class="list-disc list-inside mt-2 space-y-1">
                                                    @foreach($errors->all() as $error)
                                                        <li>{{ $error }}</li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif

                            {{-- Contact Form --}}
                            <form action="{{ route('contact.store') }}" method="POST" class="space-y-6">
                                @csrf

                                {{-- Name and Email Row --}}
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                    {{-- Name --}}
                                    <div>
                                        <label for="name" class="block text-base font-semibold text-blue-900 dark:text-blue-100 mb-2">
                                            {{ __('site.contact.name') }} <span class="text-red-500">*</span>
                                        </label>
                                        <input type="text" id="name" name="name" value="{{ old('name') }}"
                                               class="w-full px-4 py-3 bg-white dark:bg-gray-900 border border-blue-200 dark:border-blue-700 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200 text-gray-900 dark:text-white placeholder-gray-400 dark:placeholder-gray-500"
                                               required>
                                    </div>

                                    {{-- Email --}}
                                    <div>
                                        <label for="email" class="block text-base font-semibold text-blue-900 dark:text-blue-100 mb-2">
                                            {{ __('site.contact.email-title') }} <span class="text-red-500">*</span>
                                        </label>
                                        <input type="email" id="email" name="email" value="{{ old('email') }}"
                                               class="w-full px-4 py-3 bg-white dark:bg-gray-900 border border-blue-200 dark:border-blue-700 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200 text-gray-900 dark:text-white placeholder-gray-400 dark:placeholder-gray-500"
                                               required>
                                    </div>
                                </div>

                                {{-- Subject --}}
                                <div>
                                    <label for="subject" class="block text-base font-semibold text-blue-900 dark:text-blue-100 mb-2">
                                        {{ __('site.contact.subject') }} <span class="text-red-500">*</span>
                                    </label>
                                    <input type="text" id="subject" name="subject" value="{{ old('subject') }}"
                                           class="w-full px-4 py-3 bg-white dark:bg-gray-900 border border-blue-200 dark:border-blue-700 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200 text-gray-900 dark:text-white placeholder-gray-400 dark:placeholder-gray-500"
                                           required>
                                </div>

                                {{-- Message --}}
                                <div>
                                    <label for="message" class="block text-base font-semibold text-blue-900 dark:text-blue-100 mb-2">
                                        {{ __('site.contact.message') }} <span class="text-red-500">*</span>
                                    </label>
                                    <textarea id="message" name="message" rows="6"
                                              class="w-full px-4 py-3 bg-white dark:bg-gray-900 border border-blue-200 dark:border-blue-700 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200 resize-y text-gray-900 dark:text-white placeholder-gray-400 dark:placeholder-gray-500"
                                              required>{{ old('message') }}</textarea>
                                </div>

                                {{-- Submit Button --}}
                                <div class="pt-2">
                                    <div class="relative inline-block group/btn">
                                        <div class="absolute -inset-0.5 bg-gradient-to-r from-blue-500 to-red-500 rounded-xl opacity-75 group-hover/btn:opacity-100 blur transition duration-300"></div>
                                        <button type="submit"
                                                class="relative w-full md:w-auto inline-flex items-center justify-center bg-gradient-to-r from-blue-600 to-red-600 text-white px-8 py-4 rounded-xl font-semibold text-lg transition-all duration-300 transform hover:scale-105 shadow-lg hover:shadow-2xl">
                                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"/>
                                            </svg>
                                            {{ __('site.contact.send') }}
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>

                        {{-- Info Side --}}
                        <div class="lg:col-span-2 bg-gradient-to-br from-blue-600 via-blue-700 to-red-600 dark:from-blue-700 dark:via-blue-800 dark:to-red-700 p-8 lg:p-12 text-white flex flex-col justify-center items-center relative overflow-hidden">
                            {{-- Background Pattern --}}
                            <div class="absolute inset-0 opacity-10">
                                <div class="absolute top-10 left-10 w-32 h-32 bg-white rounded-full blur-3xl"></div>
                                <div class="absolute bottom-10 right-10 w-40 h-40 bg-white rounded-full blur-3xl"></div>
                            </div>

                            <div class="text-center relative z-10">
                                <h3 class="text-3xl font-bold mb-6">{{ __('site.contact.get_in_touch') }}</h3>
                                <p class="text-blue-100 text-lg mb-10 max-w-sm mx-auto">
                                    {{ __('site.contact.questions_prompt') }}
                                </p>

                                {{-- Social Links --}}
                                <div>
                                    <h4 class="font-semibold text-xl mb-6">{{ __('site.contact.follow_social') }}</h4>
                                    <div class="flex flex-wrap justify-center gap-4">
                                        {{-- Facebook --}}
                                        <a href="https://www.facebook.com/people/Viduthalai-Chiruthaigal-katchi/61578689859070/"
                                           class="bg-white/20 hover:bg-white/30 text-white backdrop-blur-sm p-3 rounded-full transform hover:scale-110 transition-all duration-300"
                                           target="_blank" rel="noopener noreferrer" aria-label="Facebook">
                                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                                                <path d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z"/>
                                            </svg>
                                        </a>

                                        {{-- X (Twitter) --}}
                                        <a href="https://x.com/vck_officiall"
                                           class="bg-white/20 hover:bg-white/30 text-white backdrop-blur-sm p-3 rounded-full transform hover:scale-110 transition-all duration-300"
                                           target="_blank" rel="noopener noreferrer" aria-label="X (Twitter)">
                                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                                                <path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z"/>
                                            </svg>
                                        </a>

                                        {{-- Instagram --}}
                                        <a href="https://www.instagram.com/vck_officiall/"
                                           class="bg-white/20 hover:bg-white/30 text-white backdrop-blur-sm p-3 rounded-full transform hover:scale-110 transition-all duration-300"
                                           target="_blank" rel="noopener noreferrer" aria-label="Instagram">
                                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                                                <path d="M12 2.163c3.204 0 3.584.012 4.85.07 1.172.053 1.905.242 2.49.449.586.206.96.478 1.48.977.52.499.773.894.978 1.48.207.585.397 1.318.45 2.49.058 1.266.07 1.646.07 4.85s-.012 3.584-.07 4.85c-.053 1.172-.242 1.905-.45 2.49-.206.586-.478.96-.978 1.48-.499.52-.894.773-1.48.978-.585.207-1.318.397-2.49.45-1.266.058-1.646.07-4.85.07s-3.584-.012-4.85-.07c-1.172-.053-1.905-.242-2.49-.45-.586-.206-.96-.478-1.48-.978-.52-.499-.773-.894-.978-1.48-.207-.585-.397-1.318-.45-2.49-.058-1.266-.07-1.646-.07-4.85s.012-3.584.07-4.85c.053-1.172.242-1.905.45-2.49.206-.586.478-.96.978-1.48.499-.52.894-.773 1.48-.978.585-.207 1.318-.397 2.49-.45 1.266-.057 1.646-.07 4.85-.07M12 0C8.741 0 8.333.014 7.053.072 5.775.132 4.905.333 4.14.63c-.789.306-1.459.717-2.126 1.384S.936 3.35.63 4.14C.333 4.905.131 5.775.072 7.053.014 8.333 0 8.741 0 12s.014 3.667.072 4.947c.06 1.277.261 2.148.558 2.913.306.788.717 1.459 1.384 2.126.667.666 1.336 1.079 2.126 1.384.766.296 1.636.499 2.913.558C8.333 23.986 8.741 24 12 24s3.667-.014 4.947-.072c1.277-.06 2.148-.262 2.913-.558.788-.306 1.459-.717 2.126-1.384.666-.667 1.079-1.335 1.384-2.126.296-.765.499-1.636.558-2.913.058-1.266.072-1.646.072-4.947s-.014-3.667-.072-4.947c-.06-1.277-.262-2.148-.558-2.913-.306-.789-.717-1.459-1.384-2.126C20.644.936 19.974.522 19.184.217c-.765-.297-1.636-.499-2.913-.558C14.986.014 14.559 0 12 0zm0 5.838a6.162 6.162 0 100 12.324 6.162 6.162 0 000-12.324M12 16a4 4 0 110-8 4 4 0 010 8m6.406-11.845a1.44 1.44 0 11-2.881.001 1.44 1.44 0 012.881-.001"/>
                                            </svg>
                                        </a>

                                        {{-- Threads --}}
                                        <a href="https://www.threads.com/@vck_officiall"
                                           class="bg-white/20 hover:bg-white/30 text-white backdrop-blur-sm p-3 rounded-full transform hover:scale-110 transition-all duration-300"
                                           target="_blank" rel="noopener noreferrer" aria-label="Threads">
                                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                                                <path d="M12.186 5.595c-3.323 0-5.909 2.27-5.909 5.337 0 2.946 2.365 5.338 5.909 5.338 3.323 0 5.908-2.27 5.908-5.338 0-3.067-2.585-5.337-5.908-5.337zm0 9.433c-2.42 0-4.282-1.721-4.282-4.096 0-2.374 1.862-4.095 4.282-4.095 2.42 0 4.282 1.721 4.282 4.095 0 2.375-1.862 4.096-4.282 4.096zM19.93 5.339a1.38 1.38 0 11-2.76 0 1.38 1.38 0 012.76 0zM12 2.163c3.204 0 3.584.012 4.85.07 1.17.053 1.805.245 2.227.408.56.217.96.477 1.382.896.419.42.679.822.896 1.381.163.423.355 1.057.408 2.227.058 1.265.07 1.645.07 4.85s-.012 3.584-.07 4.849c-.053 1.17-.245 1.804-.408 2.227-.217.56-.477.96-.896 1.381-.42.419-.822.679-1.382.896-.422.163-1.057.355-2.227.408-1.265.058-1.645.07-4.85.07s-3.584-.012-4.849-.07c-1.17-.053-1.805-.245-2.228-.408a3.736 3.736 0 01-1.38-.896 3.736 3.736 0 01-.897-1.381c-.163-.423-.355-1.057-.408-2.227-.058-1.265-.07-1.645-.07-4.85s.012-3.584.07-4.849c.053-1.17.245-1.804.408-2.227.217-.56.477-.96.896-1.382.42-.419.822-.679 1.381-.896.423-.163 1.057-.355 2.228-.408 1.265-.058 1.645-.07 4.849-.07M12 0C8.741 0 8.332.014 7.052.072 5.775.13 4.905.333 4.14.63a5.9 5.9 0 00-2.126 1.384A5.9 5.9 0 00.63 4.14C.333 4.905.13 5.775.072 7.052.014 8.332 0 8.741 0 12c0 3.259.014 3.668.072 4.948.058 1.277.261 2.147.558 2.913a5.9 5.9 0 001.384 2.126A5.9 5.9 0 004.14 23.37c.765.297 1.636.5 2.913.558C8.332 23.986 8.741 24 12 24c3.259 0 3.668-.014 4.948-.072 1.277-.058 2.147-.261 2.913-.558a5.9 5.9 0 002.126-1.384 5.9 5.9 0 001.384-2.126c.297-.766.5-1.636.558-2.913.058-1.28.072-1.689.072-4.948 0-3.259-.014-3.668-.072-4.948-.058-1.277-.261-2.147-.558-2.913a5.9 5.9 0 00-1.384-2.126A5.9 5.9 0 0019.86.63C19.095.333 18.225.13 16.948.072 15.668.014 15.259 0 12 0z"/>
                                            </svg>
                                        </a>

                                        {{-- YouTube --}}
                                        <a href="https://www.youtube.com/@Vck_Youtube"
                                           class="bg-white/20 hover:bg-white/30 text-white backdrop-blur-sm p-3 rounded-full transform hover:scale-110 transition-all duration-300"
                                           target="_blank" rel="noopener noreferrer" aria-label="YouTube">
                                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                                                <path d="M23.498 6.186a2.998 2.998 0 00-2.124-2.124C19.215 3.545 12 3.545 12 3.545s-7.215 0-9.374.517A2.998 2.998 0 00.502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a2.998 2.998 0 002.124 2.124c2.159.517 9.374.517 9.374.517s7.215 0 9.374-.517a2.998 2.998 0 002.124-2.124C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z"/>
                                            </svg>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

   
@endsection
