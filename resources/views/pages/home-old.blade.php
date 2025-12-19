@extends('layouts.app')

@section('title', 'Home')

@section('content')


    {{-- Full-Page Hero Slider --}}
  <!-- Full-Page Hero Slider -->
    <section id="home" class="relative h-screen overflow-hidden">
        <div id="slider-container" class="absolute inset-0 flex transition-transform duration-700 ease-in-out">
        <div class="w-full flex-shrink-0">
            <picture>
                <source media="(max-width: 768px)" srcset="{{ asset('assets/images/bg/slider11-mobile.png') }}">
                <img src="{{ asset('assets/images/bg/slider11.png') }}" class="w-full h-full object-cover" alt="Slide 1" loading="lazy">
            </picture>
        </div>
        <div class="w-full flex-shrink-0">
            <picture>
                <source media="(max-width: 768px)" srcset="{{ asset('assets/images/bg/slider2-mobile.webp') }}">
                <img src="{{ asset('assets/images/bg/slider22.webp') }}" class="w-full h-full object-cover" alt="Slide 2" loading="lazy">
            </picture>
        </div>
        <div class="w-full flex-shrink-0">
            <picture>
                <source media="(max-width: 768px)" srcset="{{ asset('assets/images/bg/slider3-mobile.webp') }}">
                <img src="{{ asset('assets/images/bg/slider33.webp') }}" class="w-full h-full object-cover" alt="Slide 3" loading="lazy">
            </picture>
        </div>
        </div>

        <!-- Bottom Navigation Dots -->
        <div class="absolute bottom-6 left-1/2 transform -translate-x-1/2 flex space-x-2">
        <button class="w-3 h-3 rounded-full bg-white opacity-50 hover:opacity-100" data-slide="0"></button>
        <button class="w-3 h-3 rounded-full bg-white opacity-50 hover:opacity-100" data-slide="1"></button>
        <button class="w-3 h-3 rounded-full bg-white opacity-50 hover:opacity-100" data-slide="2"></button>
        </div>
    </section>

    {{-- Hero: About --}}
    
    <section id="about" class="section-full pt-16 pb-16 px-4 bg-blue-100">
        <div class="max-w-7xl mx-auto flex flex-col md:flex-row items-center gap-10 px-4">
            <img src="{{ asset('assets/images/about/604x476.jpg') }}" alt="About Our Party" class="w-full h-full md:w-1/2 rounded-xl h-96 object-cover">
            <div class="w-full md:w-1/2 text-center md:text-left">
                <h1 class="text-4xl text-red-600 md:text-5xl font-bold mb-6">{{ __('site.about.title') }}</h1>
                <p class="text-lg text-justify text-gray-600 mb-6">
                    {{ __('site.about.intro-1') }}
                </p>
                <p class="text-lg text-justify text-gray-600 mb-6">
                    {{ __('site.about.intro-2') }}
                </p>
                <h3 class="text-xl font-bold tracking-tight text-gray-900 dark:text-white">
                    {{ __('site.home.member_1_name') }}
                </h3>
                <!-- <a href="{{ route('ideology') }}" class="inline-block px-6 py-3 bg-blue-600 text-white font-medium rounded-lg hover:bg-blue-700">{{ __('site.about.learn-more') }}</a> -->
            </div>
        </div>
    </section>

        <!-- Main Section Container -->
    <section id="cards" class="section-full pt-16 pb-16 px-4 bg-blue-100">
        <!-- Content Area -->
        <div class="container mx-auto px-4 pt-0">
            <!-- Three Cards Row -->
            <div class="flex flex-col md:flex-row gap-8 justify-center items-stretch">
            <!-- Card 1: அறிக்கைகள் -->
                <div class="bg-red-100 rounded-xl p-6 shadow-lg flex flex-col items-center text-center max-w-sm">
                    <div class="text-blue-700 mb-4">
                        <svg class="w-12 h-12 text-red-600 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                            <path fill-rule="evenodd" d="M8 7V2.221a2 2 0 0 0-.5.365L3.586 6.5a2 2 0 0 0-.365.5H8Zm2 0V2h7a2 2 0 0 1 2 2v.126a5.087 5.087 0 0 0-4.74 1.368v.001l-6.642 6.642a3 3 0 0 0-.82 1.532l-.74 3.692a3 3 0 0 0 3.53 3.53l3.694-.738a3 3 0 0 0 1.532-.82L19 15.149V20a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V9h5a2 2 0 0 0 2-2Z" clip-rule="evenodd"/>
                            <path fill-rule="evenodd" d="M17.447 8.08a1.087 1.087 0 0 1 1.187.238l.002.001a1.088 1.088 0 0 1 0 1.539l-.377.377-1.54-1.542.373-.374.002-.001c.1-.102.22-.182.353-.237Zm-2.143 2.027-4.644 4.644-.385 1.924 1.925-.385 4.644-4.642-1.54-1.54Zm2.56-4.11a3.087 3.087 0 0 0-2.187.909l-6.645 6.645a1 1 0 0 0-.274.51l-.739 3.693a1 1 0 0 0 1.177 1.176l3.693-.738a1 1 0 0 0 .51-.274l6.65-6.646a3.088 3.088 0 0 0-2.185-5.275Z" clip-rule="evenodd"/>
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-800 mb-2">{{ __('site.menu.press_release') }}</h3>
                    <div class="w-16 h-1 bg-blue-600 mb-4"></div>
                    <p class="text-gray-600 text-md mb-6">
                    {{ __('site.home.press_release_description') }}
                    </p>
                    <button class="bg-blue-600 hover:bg-red-600 text-white font-medium py-2 px-6 rounded-full flex items-center space-x-2 transition-colors">
                    <a href="{{ route('press-releases') }}"><span>{{ __('site.about.learn-more') }}</span></a>
                    </button>
                </div>
                <!-- Card 2: அறிவிப்புகள் -->
                <div class="bg-orange-100 rounded-xl p-6 shadow-lg flex flex-col items-center text-center max-w-sm">
                    <div class="text-blue-700 mb-4">
                        <svg class="w-12 h-12 text-red-600 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                            <path fill-rule="evenodd" d="M18.458 3.11A1 1 0 0 1 19 4v16a1 1 0 0 1-1.581.814L12 16.944V7.056l5.419-3.87a1 1 0 0 1 1.039-.076ZM22 12c0 1.48-.804 2.773-2 3.465v-6.93c1.196.692 2 1.984 2 3.465ZM10 8H4a1 1 0 0 0-1 1v6a1 1 0 0 0 1 1h6V8Zm0 9H5v3a1 1 0 0 0 1 1h3a1 1 0 0 0 1-1v-3Z" clip-rule="evenodd"/>
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-800 mb-2">{{ __('site.home.events') }}</h3>
                    <div class="w-16 h-1 bg-blue-600 mb-4"></div>
                    <p class="text-gray-600 text-md mb-6">
                    {{ __('site.home.events_description') }}
                    </p>
                    <button class="bg-blue-600 hover:bg-red-600 text-white font-medium py-2 px-6 rounded-full flex items-center space-x-2 transition-colors">
                    <a href="{{ route('events') }}"><span>{{ __('site.about.learn-more') }}</span></a>
                    </button>
                </div>
                <!-- Card 3: பொறுப்பாளர்கள் -->
                <div class="bg-green-100 rounded-xl p-6 shadow-lg flex flex-col items-center text-center max-w-sm">
                    <div class="text-blue-700 mb-4">
                        <svg class="w-12 h-12 text-red-600 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                            <path fill-rule="evenodd" d="M12 6a3.5 3.5 0 1 0 0 7 3.5 3.5 0 0 0 0-7Zm-1.5 8a4 4 0 0 0-4 4 2 2 0 0 0 2 2h7a2 2 0 0 0 2-2 4 4 0 0 0-4-4h-3Zm6.82-3.096a5.51 5.51 0 0 0-2.797-6.293 3.5 3.5 0 1 1 2.796 6.292ZM19.5 18h.5a2 2 0 0 0 2-2 4 4 0 0 0-4-4h-1.1a5.503 5.503 0 0 1-.471.762A5.998 5.998 0 0 1 19.5 18ZM4 7.5a3.5 3.5 0 0 1 5.477-2.889 5.5 5.5 0 0 0-2.796 6.293A3.501 3.501 0 0 1 4 7.5ZM7.1 12H6a4 4 0 0 0-4 4 2 2 0 0 0 2 2h.5a5.998 5.998 0 0 1 3.071-5.238A5.505 5.505 0 0 1 7.1 12Z" clip-rule="evenodd"/>
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-800 mb-2">பொறுப்பாளர்கள்</h3>
                    <div class="w-16 h-1 bg-blue-600 mb-4"></div>
                    <p class="text-gray-600 text-md mb-6">
                    விடுதலைச் சிறுத்தைகள் கட்சியின் மாநில மற்றும் மாவட்ட பொறுப்பாளர்கள் 
                    </p>
                    <button class="bg-blue-600 hover:bg-red-600 text-white font-medium py-2 px-6 rounded-full flex items-center space-x-2 transition-colors">
                    <a href="{{ route('office-bearers') }}"><span>{{ __('site.about.learn-more') }}</span></a>
                    </button>
                </div>
            </div>
        </div>
        </div>
    </section>

    <section class="bg-blue-100 bg-blue-200">
        <div class="py-8 px-4 mx-auto max-w-screen-xl lg:py-16 lg:px-6 ">
            <div class="mx-auto max-w-screen-sm text-center mb-8 lg:mb-16">
                <h2 class="mb-4 text-4xl tracking-tight font-extrabold text-red-600 dark:text-white">{{ __('site.home.elected_members_title') }}</h2>
                <p class="font-light text-gray-500 lg:mb-16 sm:text-xl dark:text-gray-400">{{ __('site.home.elected_members_mp') }}</p>
            </div> 
            <div class="grid gap-8 mb-6 lg:mb-16 md:grid-cols-2">
                <div class="items-center bg-gray-50 rounded-lg shadow sm:flex dark:bg-gray-800 dark:border-gray-700">
                    <a href="#">
                        <img class="w-full rounded-lg sm:rounded-none sm:rounded-l-lg" src="{{ asset('assets/images/mla/thiruma.png') }}" alt="Bonnie Avatar">
                    </a>
                    <div class="p-5">
                        <h3 class="text-xl font-bold tracking-tight text-gray-900 dark:text-white">
                            <a href="#">{{ __('site.home.member_1_name') }}</a>
                        </h3>
                        <span class="text-gray-500 dark:text-gray-900">{{ __('site.home.member_1_position') }}</span>
                        <p class="mt-3 mb-4 font-light text-gray-500 dark:text-gray-400">Bonnie drives the technical strategy of the flowbite platform and brand.</p>
                        <ul class="flex space-x-4 sm:mt-0">
                            <li>
                                <a href="#" class="text-gray-500 hover:text-gray-900 dark:hover:text-white">
                                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path fill-rule="evenodd" d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z" clip-rule="evenodd" /></svg>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="text-gray-500 hover:text-gray-900 dark:hover:text-white">
                                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path d="M8.29 20.251c7.547 0 11.675-6.253 11.675-11.675 0-.178 0-.355-.012-.53A8.348 8.348 0 0022 5.92a8.19 8.19 0 01-2.357.646 4.118 4.118 0 001.804-2.27 8.224 8.224 0 01-2.605.996 4.107 4.107 0 00-6.993 3.743 11.65 11.65 0 01-8.457-4.287 4.106 4.106 0 001.27 5.477A4.072 4.072 0 012.8 9.713v.052a4.105 4.105 0 003.292 4.022 4.095 4.095 0 01-1.853.07 4.108 4.108 0 003.834 2.85A8.233 8.233 0 012 18.407a11.616 11.616 0 006.29 1.84" /></svg>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="text-gray-500 hover:text-gray-900 dark:hover:text-white">
                                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path fill-rule="evenodd" d="M12 2C6.477 2 2 6.484 2 12.017c0 4.425 2.865 8.18 6.839 9.504.5.092.682-.217.682-.483 0-.237-.008-.868-.013-1.703-2.782.605-3.369-1.343-3.369-1.343-.454-1.158-1.11-1.466-1.11-1.466-.908-.62.069-.608.069-.608 1.003.07 1.531 1.032 1.531 1.032.892 1.53 2.341 1.088 2.91.832.092-.647.35-1.088.636-1.338-2.22-.253-4.555-1.113-4.555-4.951 0-1.093.39-1.988 1.029-2.688-.103-.253-.446-1.272.098-2.65 0 0 .84-.27 2.75 1.026A9.564 9.564 0 0112 6.844c.85.004 1.705.115 2.504.337 1.909-1.296 2.747-1.027 2.747-1.027.546 1.379.202 2.398.1 2.651.64.7 1.028 1.595 1.028 2.688 0 3.848-2.339 4.695-4.566 4.943.359.309.678.92.678 1.855 0 1.338-.012 2.419-.012 2.747 0 .268.18.58.688.482A10.019 10.019 0 0022 12.017C22 6.484 17.522 2 12 2z" clip-rule="evenodd" /></svg>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="text-gray-500 hover:text-gray-900 dark:hover:text-white">
                                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path fill-rule="evenodd" d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10c5.51 0 10-4.48 10-10S17.51 2 12 2zm6.605 4.61a8.502 8.502 0 011.93 5.314c-.281-.054-3.101-.629-5.943-.271-.065-.141-.12-.293-.184-.445a25.416 25.416 0 00-.564-1.236c3.145-1.28 4.577-3.124 4.761-3.362zM12 3.475c2.17 0 4.154.813 5.662 2.148-.152.216-1.443 1.941-4.48 3.08-1.399-2.57-2.95-4.675-3.189-5A8.687 8.687 0 0112 3.475zm-3.633.803a53.896 53.896 0 013.167 4.935c-3.992 1.063-7.517 1.04-7.896 1.04a8.581 8.581 0 014.729-5.975zM3.453 12.01v-.26c.37.01 4.512.065 8.775-1.215.25.477.477.965.694 1.453-.109.033-.228.065-.336.098-4.404 1.42-6.747 5.303-6.942 5.629a8.522 8.522 0 01-2.19-5.705zM12 20.547a8.482 8.482 0 01-5.239-1.8c.152-.315 1.888-3.656 6.703-5.337.022-.01.033-.01.054-.022a35.318 35.318 0 011.823 6.475 8.4 8.4 0 01-3.341.684zm4.761-1.465c-.086-.52-.542-3.015-1.659-6.084 2.679-.423 5.022.271 5.314.369a8.468 8.468 0 01-3.655 5.715z" clip-rule="evenodd" /></svg>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div> 
                <div class="items-center bg-gray-50 rounded-lg shadow sm:flex dark:bg-gray-800 dark:border-gray-700">
                    <a href="#">
                        <img class="w-full rounded-lg sm:rounded-none sm:rounded-l-lg" src="{{ asset('assets/images/mla/ravi.png') }}" alt="Jese Avatar">
                    </a>
                    <div class="p-5">
                        <h3 class="text-xl font-bold tracking-tight text-gray-900 dark:text-white">
                            <a href="#">{{ __('site.home.member_2_name') }}</a>
                        </h3>
                        <span class="text-gray-500 dark:text-gray-400">{{ __('site.home.member_2_position') }}</span>
                        <p class="mt-3 mb-4 font-light text-gray-500 dark:text-gray-400">Jese drives the technical strategy of the flowbite platform and brand.</p>
                        <ul class="flex space-x-4 sm:mt-0">
                            <li>
                                <a href="#" class="text-gray-500 hover:text-gray-900 dark:hover:text-white">
                                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path fill-rule="evenodd" d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z" clip-rule="evenodd" /></svg>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="text-gray-500 hover:text-gray-900 dark:hover:text-white">
                                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path d="M8.29 20.251c7.547 0 11.675-6.253 11.675-11.675 0-.178 0-.355-.012-.53A8.348 8.348 0 0022 5.92a8.19 8.19 0 01-2.357.646 4.118 4.118 0 001.804-2.27 8.224 8.224 0 01-2.605.996 4.107 4.107 0 00-6.993 3.743 11.65 11.65 0 01-8.457-4.287 4.106 4.106 0 001.27 5.477A4.072 4.072 0 012.8 9.713v.052a4.105 4.105 0 003.292 4.022 4.095 4.095 0 01-1.853.07 4.108 4.108 0 003.834 2.85A8.233 8.233 0 012 18.407a11.616 11.616 0 006.29 1.84" /></svg>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="text-gray-500 hover:text-gray-900 dark:hover:text-white">
                                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path fill-rule="evenodd" d="M12 2C6.477 2 2 6.484 2 12.017c0 4.425 2.865 8.18 6.839 9.504.5.092.682-.217.682-.483 0-.237-.008-.868-.013-1.703-2.782.605-3.369-1.343-3.369-1.343-.454-1.158-1.11-1.466-1.11-1.466-.908-.62.069-.608.069-.608 1.003.07 1.531 1.032 1.531 1.032.892 1.53 2.341 1.088 2.91.832.092-.647.35-1.088.636-1.338-2.22-.253-4.555-1.113-4.555-4.951 0-1.093.39-1.988 1.029-2.688-.103-.253-.446-1.272.098-2.65 0 0 .84-.27 2.75 1.026A9.564 9.564 0 0112 6.844c.85.004 1.705.115 2.504.337 1.909-1.296 2.747-1.027 2.747-1.027.546 1.379.202 2.398.1 2.651.64.7 1.028 1.595 1.028 2.688 0 3.848-2.339 4.695-4.566 4.943.359.309.678.92.678 1.855 0 1.338-.012 2.419-.012 2.747 0 .268.18.58.688.482A10.019 10.019 0 0022 12.017C22 6.484 17.522 2 12 2z" clip-rule="evenodd" /></svg>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="text-gray-500 hover:text-gray-900 dark:hover:text-white">
                                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path fill-rule="evenodd" d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10c5.51 0 10-4.48 10-10S17.51 2 12 2zm6.605 4.61a8.502 8.502 0 011.93 5.314c-.281-.054-3.101-.629-5.943-.271-.065-.141-.12-.293-.184-.445a25.416 25.416 0 00-.564-1.236c3.145-1.28 4.577-3.124 4.761-3.362zM12 3.475c2.17 0 4.154.813 5.662 2.148-.152.216-1.443 1.941-4.48 3.08-1.399-2.57-2.95-4.675-3.189-5A8.687 8.687 0 0112 3.475zm-3.633.803a53.896 53.896 0 013.167 4.935c-3.992 1.063-7.517 1.04-7.896 1.04a8.581 8.581 0 014.729-5.975zM3.453 12.01v-.26c.37.01 4.512.065 8.775-1.215.25.477.477.965.694 1.453-.109.033-.228.065-.336.098-4.404 1.42-6.747 5.303-6.942 5.629a8.522 8.522 0 01-2.19-5.705zM12 20.547a8.482 8.482 0 01-5.239-1.8c.152-.315 1.888-3.656 6.703-5.337.022-.01.033-.01.054-.022a35.318 35.318 0 011.823 6.475 8.4 8.4 0 01-3.341.684zm4.761-1.465c-.086-.52-.542-3.015-1.659-6.084 2.679-.423 5.022.271 5.314.369a8.468 8.468 0 01-3.655 5.715z" clip-rule="evenodd" /></svg>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div> 
            </div>  
            <div class="mx-auto max-w-screen-sm text-center mb-8 lg:mb-16">
                <!-- <h2 class="mb-4 text-4xl tracking-tight font-extrabold text-gray-900 dark:text-white">{{ __('site.home.elected_members_title') }}</h2> -->
                <p class="font-light text-gray-500 lg:mb-16 sm:text-xl dark:text-gray-400">{{ __('site.home.elected_members_mla') }}</p>
            </div> 
            <div class="grid gap-8 lg:gap-16 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4">
                <div class="text-center text-gray-500 dark:text-gray-400">
                    <img class="mx-auto mb-4 w-36 h-36 rounded-full" src="{{ asset('assets/images/mla/sinthanai-1.png') }}" alt="Bonnie Avatar">
                    <h3 class="mb-1 text-2xl font-bold tracking-tight text-blue-900 dark:text-white">
                        <a href="#">{{ __('site.home.member_3_name') }}</a>
                    </h3>
                    <p>{{ __('site.home.member_3_position') }}</p>
                    <ul class="flex justify-center mt-4 space-x-4">
                        <li>
                            <a href="#" class="text-[#39569c] hover:text-blue-900 dark:hover:text-white">
                                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path fill-rule="evenodd" d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z" clip-rule="evenodd" /></svg>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="text-[#00acee] hover:text-gray-900 dark:hover:text-white">
                                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path d="M8.29 20.251c7.547 0 11.675-6.253 11.675-11.675 0-.178 0-.355-.012-.53A8.348 8.348 0 0022 5.92a8.19 8.19 0 01-2.357.646 4.118 4.118 0 001.804-2.27 8.224 8.224 0 01-2.605.996 4.107 4.107 0 00-6.993 3.743 11.65 11.65 0 01-8.457-4.287 4.106 4.106 0 001.27 5.477A4.072 4.072 0 012.8 9.713v.052a4.105 4.105 0 003.292 4.022 4.095 4.095 0 01-1.853.07 4.108 4.108 0 003.834 2.85A8.233 8.233 0 012 18.407a11.616 11.616 0 006.29 1.84" /></svg>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="text-gray-900 hover:text-gray-900 dark:hover:text-white dark:text-gray-300">
                                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path fill-rule="evenodd" d="M12 2C6.477 2 2 6.484 2 12.017c0 4.425 2.865 8.18 6.839 9.504.5.092.682-.217.682-.483 0-.237-.008-.868-.013-1.703-2.782.605-3.369-1.343-3.369-1.343-.454-1.158-1.11-1.466-1.11-1.466-.908-.62.069-.608.069-.608 1.003.07 1.531 1.032 1.531 1.032.892 1.53 2.341 1.088 2.91.832.092-.647.35-1.088.636-1.338-2.22-.253-4.555-1.113-4.555-4.951 0-1.093.39-1.988 1.029-2.688-.103-.253-.446-1.272.098-2.65 0 0 .84-.27 2.75 1.026A9.564 9.564 0 0112 6.844c.85.004 1.705.115 2.504.337 1.909-1.296 2.747-1.027 2.747-1.027.546 1.379.202 2.398.1 2.651.64.7 1.028 1.595 1.028 2.688 0 3.848-2.339 4.695-4.566 4.943.359.309.678.92.678 1.855 0 1.338-.012 2.419-.012 2.747 0 .268.18.58.688.482A10.019 10.019 0 0022 12.017C22 6.484 17.522 2 12 2z" clip-rule="evenodd" /></svg>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="text-[#ea4c89] hover:text-gray-900 dark:hover:text-white">
                                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path fill-rule="evenodd" d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10c5.51 0 10-4.48 10-10S17.51 2 12 2zm6.605 4.61a8.502 8.502 0 011.93 5.314c-.281-.054-3.101-.629-5.943-.271-.065-.141-.12-.293-.184-.445a25.416 25.416 0 00-.564-1.236c3.145-1.28 4.577-3.124 4.761-3.362zM12 3.475c2.17 0 4.154.813 5.662 2.148-.152.216-1.443 1.941-4.48 3.08-1.399-2.57-2.95-4.675-3.189-5A8.687 8.687 0 0112 3.475zm-3.633.803a53.896 53.896 0 013.167 4.935c-3.992 1.063-7.517 1.04-7.896 1.04a8.581 8.581 0 014.729-5.975zM3.453 12.01v-.26c.37.01 4.512.065 8.775-1.215.25.477.477.965.694 1.453-.109.033-.228.065-.336.098-4.404 1.42-6.747 5.303-6.942 5.629a8.522 8.522 0 01-2.19-5.705zM12 20.547a8.482 8.482 0 01-5.239-1.8c.152-.315 1.888-3.656 6.703-5.337.022-.01.033-.01.054-.022a35.318 35.318 0 011.823 6.475 8.4 8.4 0 01-3.341.684zm4.761-1.465c-.086-.52-.542-3.015-1.659-6.084 2.679-.423 5.022.271 5.314.369a8.468 8.468 0 01-3.655 5.715z" clip-rule="evenodd" /></svg>
                            </a> 
                        </li> 
                    </ul>
                </div>
                <div class="text-center text-gray-500 dark:text-gray-400">
                    <img class="mx-auto mb-4 w-36 h-36 rounded-full" src="{{ asset('assets/images/mla/aloor-1.png') }}" alt="Helene Avatar">
                    <h3 class="mb-1 text-2xl font-bold tracking-tight text-blue-900 dark:text-white">
                        <a href="#">{{ __('site.home.member_4_name') }}</a>
                    </h3>
                    <p>{{ __('site.home.member_4_position') }}</p>
                    <ul class="flex justify-center mt-4 space-x-4">
                        <li>
                            <a href="#" class="text-[#39569c] hover:text-blue-900 dark:hover:text-white">
                                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path fill-rule="evenodd" d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z" clip-rule="evenodd" /></svg>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="text-[#00acee] hover:text-gray-900 dark:hover:text-white">
                                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path d="M8.29 20.251c7.547 0 11.675-6.253 11.675-11.675 0-.178 0-.355-.012-.53A8.348 8.348 0 0022 5.92a8.19 8.19 0 01-2.357.646 4.118 4.118 0 001.804-2.27 8.224 8.224 0 01-2.605.996 4.107 4.107 0 00-6.993 3.743 11.65 11.65 0 01-8.457-4.287 4.106 4.106 0 001.27 5.477A4.072 4.072 0 012.8 9.713v.052a4.105 4.105 0 003.292 4.022 4.095 4.095 0 01-1.853.07 4.108 4.108 0 003.834 2.85A8.233 8.233 0 012 18.407a11.616 11.616 0 006.29 1.84" /></svg>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="text-gray-900 hover:text-gray-900 dark:hover:text-white dark:text-gray-300">
                                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path fill-rule="evenodd" d="M12 2C6.477 2 2 6.484 2 12.017c0 4.425 2.865 8.18 6.839 9.504.5.092.682-.217.682-.483 0-.237-.008-.868-.013-1.703-2.782.605-3.369-1.343-3.369-1.343-.454-1.158-1.11-1.466-1.11-1.466-.908-.62.069-.608.069-.608 1.003.07 1.531 1.032 1.531 1.032.892 1.53 2.341 1.088 2.91.832.092-.647.35-1.088.636-1.338-2.22-.253-4.555-1.113-4.555-4.951 0-1.093.39-1.988 1.029-2.688-.103-.253-.446-1.272.098-2.65 0 0 .84-.27 2.75 1.026A9.564 9.564 0 0112 6.844c.85.004 1.705.115 2.504.337 1.909-1.296 2.747-1.027 2.747-1.027.546 1.379.202 2.398.1 2.651.64.7 1.028 1.595 1.028 2.688 0 3.848-2.339 4.695-4.566 4.943.359.309.678.92.678 1.855 0 1.338-.012 2.419-.012 2.747 0 .268.18.58.688.482A10.019 10.019 0 0022 12.017C22 6.484 17.522 2 12 2z" clip-rule="evenodd" /></svg>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="text-[#ea4c89] hover:text-gray-900 dark:hover:text-white">
                                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path fill-rule="evenodd" d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10c5.51 0 10-4.48 10-10S17.51 2 12 2zm6.605 4.61a8.502 8.502 0 011.93 5.314c-.281-.054-3.101-.629-5.943-.271-.065-.141-.12-.293-.184-.445a25.416 25.416 0 00-.564-1.236c3.145-1.28 4.577-3.124 4.761-3.362zM12 3.475c2.17 0 4.154.813 5.662 2.148-.152.216-1.443 1.941-4.48 3.08-1.399-2.57-2.95-4.675-3.189-5A8.687 8.687 0 0112 3.475zm-3.633.803a53.896 53.896 0 013.167 4.935c-3.992 1.063-7.517 1.04-7.896 1.04a8.581 8.581 0 014.729-5.975zM3.453 12.01v-.26c.37.01 4.512.065 8.775-1.215.25.477.477.965.694 1.453-.109.033-.228.065-.336.098-4.404 1.42-6.747 5.303-6.942 5.629a8.522 8.522 0 01-2.19-5.705zM12 20.547a8.482 8.482 0 01-5.239-1.8c.152-.315 1.888-3.656 6.703-5.337.022-.01.033-.01.054-.022a35.318 35.318 0 011.823 6.475 8.4 8.4 0 01-3.341.684zm4.761-1.465c-.086-.52-.542-3.015-1.659-6.084 2.679-.423 5.022.271 5.314.369a8.468 8.468 0 01-3.655 5.715z" clip-rule="evenodd" /></svg>
                            </a> 
                        </li> 
                    </ul>
                </div>
                <div class="text-center text-gray-500 dark:text-gray-400">
                    <img class="mx-auto mb-4 w-36 h-36 rounded-full" src="{{ asset('assets/images/mla/babu-1.png') }}" alt="Jese Avatar">
                    <h3 class="mb-1 text-2xl font-bold tracking-tight text-blue-900 dark:text-white">
                        <a href="#">{{ __('site.home.member_5_name') }}</a>
                    </h3>
                    <p>{{ __('site.home.member_5_position') }}</p>
                    <ul class="flex justify-center mt-4 space-x-4">
                        <li>
                            <a href="#" class="text-[#39569c] hover:text-gray-900 dark:hover:text-white">
                                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path fill-rule="evenodd" d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z" clip-rule="evenodd" /></svg>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="text-[#00acee] hover:text-gray-900 dark:hover:text-white">
                                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path d="M8.29 20.251c7.547 0 11.675-6.253 11.675-11.675 0-.178 0-.355-.012-.53A8.348 8.348 0 0022 5.92a8.19 8.19 0 01-2.357.646 4.118 4.118 0 001.804-2.27 8.224 8.224 0 01-2.605.996 4.107 4.107 0 00-6.993 3.743 11.65 11.65 0 01-8.457-4.287 4.106 4.106 0 001.27 5.477A4.072 4.072 0 012.8 9.713v.052a4.105 4.105 0 003.292 4.022 4.095 4.095 0 01-1.853.07 4.108 4.108 0 003.834 2.85A8.233 8.233 0 012 18.407a11.616 11.616 0 006.29 1.84" /></svg>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="text-gray-900 hover:text-gray-900 dark:hover:text-white dark:text-gray-300">
                                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path fill-rule="evenodd" d="M12 2C6.477 2 2 6.484 2 12.017c0 4.425 2.865 8.18 6.839 9.504.5.092.682-.217.682-.483 0-.237-.008-.868-.013-1.703-2.782.605-3.369-1.343-3.369-1.343-.454-1.158-1.11-1.466-1.11-1.466-.908-.62.069-.608.069-.608 1.003.07 1.531 1.032 1.531 1.032.892 1.53 2.341 1.088 2.91.832.092-.647.35-1.088.636-1.338-2.22-.253-4.555-1.113-4.555-4.951 0-1.093.39-1.988 1.029-2.688-.103-.253-.446-1.272.098-2.65 0 0 .84-.27 2.75 1.026A9.564 9.564 0 0112 6.844c.85.004 1.705.115 2.504.337 1.909-1.296 2.747-1.027 2.747-1.027.546 1.379.202 2.398.1 2.651.64.7 1.028 1.595 1.028 2.688 0 3.848-2.339 4.695-4.566 4.943.359.309.678.92.678 1.855 0 1.338-.012 2.419-.012 2.747 0 .268.18.58.688.482A10.019 10.019 0 0022 12.017C22 6.484 17.522 2 12 2z" clip-rule="evenodd" /></svg>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="text-[#ea4c89] hover:text-gray-900 dark:hover:text-white">
                                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path fill-rule="evenodd" d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10c5.51 0 10-4.48 10-10S17.51 2 12 2zm6.605 4.61a8.502 8.502 0 011.93 5.314c-.281-.054-3.101-.629-5.943-.271-.065-.141-.12-.293-.184-.445a25.416 25.416 0 00-.564-1.236c3.145-1.28 4.577-3.124 4.761-3.362zM12 3.475c2.17 0 4.154.813 5.662 2.148-.152.216-1.443 1.941-4.48 3.08-1.399-2.57-2.95-4.675-3.189-5A8.687 8.687 0 0112 3.475zm-3.633.803a53.896 53.896 0 013.167 4.935c-3.992 1.063-7.517 1.04-7.896 1.04a8.581 8.581 0 014.729-5.975zM3.453 12.01v-.26c.37.01 4.512.065 8.775-1.215.25.477.477.965.694 1.453-.109.033-.228.065-.336.098-4.404 1.42-6.747 5.303-6.942 5.629a8.522 8.522 0 01-2.19-5.705zM12 20.547a8.482 8.482 0 01-5.239-1.8c.152-.315 1.888-3.656 6.703-5.337.022-.01.033-.01.054-.022a35.318 35.318 0 011.823 6.475 8.4 8.4 0 01-3.341.684zm4.761-1.465c-.086-.52-.542-3.015-1.659-6.084 2.679-.423 5.022.271 5.314.369a8.468 8.468 0 01-3.655 5.715z" clip-rule="evenodd" /></svg>
                            </a> 
                        </li> 
                    </ul>
                </div>
                <div class="text-center text-gray-500 dark:text-gray-400">
                    <img class="mx-auto mb-4 w-36 h-36 rounded-full" src="{{ asset('assets/images/mla/balaji-1.png') }}" alt="Joseph Avatar">
                    <h3 class="mb-1 text-2xl font-bold tracking-tight text-blue-900 dark:text-white">
                        <a href="#">{{ __('site.home.member_6_name') }}</a>
                    </h3>
                    <p>{{ __('site.home.member_6_position') }}</p>
                    <ul class="flex justify-center mt-4 space-x-4">
                        <li>
                            <a href="#" class="text-[#39569c] hover:text-gray-900 dark:hover:text-white">
                                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path fill-rule="evenodd" d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z" clip-rule="evenodd" /></svg>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="text-[#00acee] hover:text-gray-900 dark:hover:text-white">
                                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path d="M8.29 20.251c7.547 0 11.675-6.253 11.675-11.675 0-.178 0-.355-.012-.53A8.348 8.348 0 0022 5.92a8.19 8.19 0 01-2.357.646 4.118 4.118 0 001.804-2.27 8.224 8.224 0 01-2.605.996 4.107 4.107 0 00-6.993 3.743 11.65 11.65 0 01-8.457-4.287 4.106 4.106 0 001.27 5.477A4.072 4.072 0 012.8 9.713v.052a4.105 4.105 0 003.292 4.022 4.095 4.095 0 01-1.853.07 4.108 4.108 0 003.834 2.85A8.233 8.233 0 012 18.407a11.616 11.616 0 006.29 1.84" /></svg>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="text-gray-900 hover:text-gray-900 dark:hover:text-white dark:text-gray-300">
                                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path fill-rule="evenodd" d="M12 2C6.477 2 2 6.484 2 12.017c0 4.425 2.865 8.18 6.839 9.504.5.092.682-.217.682-.483 0-.237-.008-.868-.013-1.703-2.782.605-3.369-1.343-3.369-1.343-.454-1.158-1.11-1.466-1.11-1.466-.908-.62.069-.608.069-.608 1.003.07 1.531 1.032 1.531 1.032.892 1.53 2.341 1.088 2.91.832.092-.647.35-1.088.636-1.338-2.22-.253-4.555-1.113-4.555-4.951 0-1.093.39-1.988 1.029-2.688-.103-.253-.446-1.272.098-2.65 0 0 .84-.27 2.75 1.026A9.564 9.564 0 0112 6.844c.85.004 1.705.115 2.504.337 1.909-1.296 2.747-1.027 2.747-1.027.546 1.379.202 2.398.1 2.651.64.7 1.028 1.595 1.028 2.688 0 3.848-2.339 4.695-4.566 4.943.359.309.678.92.678 1.855 0 1.338-.012 2.419-.012 2.747 0 .268.18.58.688.482A10.019 10.019 0 0022 12.017C22 6.484 17.522 2 12 2z" clip-rule="evenodd" /></svg>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="text-[#ea4c89] hover:text-gray-900 dark:hover:text-white">
                                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path fill-rule="evenodd" d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10c5.51 0 10-4.48 10-10S17.51 2 12 2zm6.605 4.61a8.502 8.502 0 011.93 5.314c-.281-.054-3.101-.629-5.943-.271-.065-.141-.12-.293-.184-.445a25.416 25.416 0 00-.564-1.236c3.145-1.28 4.577-3.124 4.761-3.362zM12 3.475c2.17 0 4.154.813 5.662 2.148-.152.216-1.443 1.941-4.48 3.08-1.399-2.57-2.95-4.675-3.189-5A8.687 8.687 0 0112 3.475zm-3.633.803a53.896 53.896 0 013.167 4.935c-3.992 1.063-7.517 1.04-7.896 1.04a8.581 8.581 0 014.729-5.975zM3.453 12.01v-.26c.37.01 4.512.065 8.775-1.215.25.477.477.965.694 1.453-.109.033-.228.065-.336.098-4.404 1.42-6.747 5.303-6.942 5.629a8.522 8.522 0 01-2.19-5.705zM12 20.547a8.482 8.482 0 01-5.239-1.8c.152-.315 1.888-3.656 6.703-5.337.022-.01.033-.01.054-.022a35.318 35.318 0 011.823 6.475 8.4 8.4 0 01-3.341.684zm4.761-1.465c-.086-.52-.542-3.015-1.659-6.084 2.679-.423 5.022.271 5.314.369a8.468 8.468 0 01-3.655 5.715z" clip-rule="evenodd" /></svg>
                            </a> 
                        </li> 
                    </ul>
                </div>
        </div>
    </section>

    <section id="latestnews" class="bg-blue-100 py-16 pb-16 px-4 sm:px-6 lg:px-8">
        <div class="max-w-7xl mx-auto">
            <div class="text-center mb-12">
            <h2 class="text-3xl font-bold text-red-600 text-center mb-12">{{ __('site.menu.latest_news') }}</h2>
            <!-- <p class="text-lg text-gray-600 max-w-3xl mx-auto">
                {{ __('site.home.latest_news_description') }}
            </p> -->
            </div>
            @if($latest_news->isNotEmpty())
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 lg:gap-8">
                @foreach($latest_news as $latest_new)
                <!-- Card 1 -->
                <article class="group bg-white rounded-xl shadow-sm overflow-hidden border border-gray-200 hover:shadow-md transition-shadow">
                    <img 
                    src="{{ $latest_new->featured_image_url }}" 
                    alt="Team collaborating in office" 
                    class="w-full h-48 object-cover"
                    >
                    <div class="p-6">
                    <!-- <span class="inline-block px-2 py-1 text-xs font-semibold text-white bg-purple-600 rounded mb-3">Article</span> -->
                    <a href="{{ route('media.show', $latest_new->slug) }}">
                        <h3 class="text-xl font-bold text-gray-900 mb-3 group-hover:text-blue-600 transition-colors">{{ app()->getLocale() === 'ta' ? $latest_new->title_ta : $latest_new->title_en }}</h3>
                    </a>
                    
                    <div class="flex items-center">
                        <div>
                        <p class="text-sm text-gray-500">{{ $latest_new->event_date ? $latest_new->event_date->format('d-M-Y') : 'N/A' }} • {{ $latest_new->created_at->diffForHumans() }}</p>
                        </div>
                    </div>
                    </div>
                </article>
                @endforeach
            </div>
            @endif
        </div>
    </section>


    {{-- Videos Content --}}
    <section class="py-16 px-4">
        <h2 class="text-3xl font-bold text-red-600 text-center mb-12">{{ __('site.menu.videos') }}</h2>
        <div class="max-w-7xl mx-auto">
            @if($interviews->isNotEmpty())
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($interviews as $video1)
                @php
                    $videoId1 = null;
                    if (preg_match('/(?:youtube\.com\/watch\?v=|youtu\.be\/|youtube\.com\/embed\/)([a-zA-Z0-9_-]{11})/', $video1->video_link, $matches)) {
                        $videoId1 = $matches[1];
                    }
                    $thumbnail = $videoId1 ? "https://img.youtube.com/vi/{$videoId1}/maxresdefault.jpg" : asset('assets/images/placeholder.jpg');
                @endphp
                <div class="group relative overflow-hidden rounded-lg shadow-lg hover:shadow-xl transform hover:-translate-y-2 transition-all duration-300 cursor-pointer video-thumbnail aspect-video" data-video-id="{{ $videoId1 }}" data-video-url="{{ $video1->video_link }}">
                    <img src="{{ $thumbnail }}" alt="{{ app()->getLocale() === 'ta' ? $video1->title_ta : $video1->title_en }}" class="w-full h-full object-cover transition-transform duration-300 group-hover:scale-105">
                    <div class="absolute inset-0 bg-black bg-opacity-40 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-center justify-center">
                        <div class="bg-red-600 rounded-full p-4 transform scale-75 group-hover:scale-100 transition-transform duration-300">
                            <svg class="w-8 h-8 text-white" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM9.555 7.168A1 1 0 008 8v4a1 1 0 001.555.832l3-2a1 1 0 000-1.664l-3-2z" clip-rule="evenodd"></path>
                            </svg>
                        </div>
                    </div>
                    <div class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-black to-transparent p-4 text-white transform translate-y-full group-hover:translate-y-0 transition-transform duration-300">
                        <h3 class="text-lg font-semibold mb-1">{!! app()->getLocale() === 'ta' ? $video1->title_ta : $video1->title_en !!}</h3>
                        <p class="text-sm opacity-80">{{ $video1->event_date ? $video1->event_date->format('M j, Y') : '' }}</p>
                    </div>
                    <div class="absolute top-2 right-2 bg-red-600 text-white text-xs px-2 py-1 rounded-full">
                        <svg class="w-4 h-4 inline mr-1" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M23.498 6.186a3.016 3.016 0 0 0-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 0 0 .502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 0 0 2.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 0 0 2.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z"/>
                        </svg>
                        YouTube
                    </div>
                </div>
                @endforeach
            </div>

            
            @else
            <div class="text-center py-16">
                <h2 class="text-2xl font-semibold text-gray-600">{{ __('site.videos.no_videos') }}</h2>
                <p class="text-gray-500 mt-2">{{ __('site.press_releases.check_back') }}</p>
            </div>
            @endif
        </div>
    </section>




    <section id="latestnews" class="bg-blue-200 py-6 px-4 pt-16 pb-16 sm:px-6 lg:px-8">
    <div class="max-w-7xl mx-auto">
        <div class="relative bg-gradient-to-r from-purple-900 via-indigo-900 to-purple-800 rounded-3xl overflow-hidden shadow-2xl">
        <!-- Background Image -->
        <div class="absolute inset-0">
            <img 
            src="{{ asset('assets/images/backgrounds/Header_2.jpg') }}" 
            alt="Support team collaborating" 
            class="w-full h-full object-cover object-left"
            >
            <!-- Overlay for readability -->
            <div class="absolute inset-0 bg-gradient-to-r from-purple-900/90 via-indigo-900/70 to-transparent"></div>
        </div>
        
        <!-- Content -->
        <div class="relative z-10 px-8 lg:px-12 py-12 lg:py-16 text-white">
            <h2 class="text-4xl lg:text-5xl text-center font-bold mb-4">{{ __('site.history.legacy_quote2') }}</h2>
            <p class="text-lg text-center text-purple-200 leading-relaxed">
            {{ __('site.history.legacy_author') }}
            </p>
        </div>
        </div>
    </div>
    </section>

    {{-- Latest YouTube Video Section --}}
    <section id="latest-video" class="bg-blue-100 py-16 pb-26 px-4">
        <div class="max-w-7xl mx-auto">
            <h2 class="text-3xl font-bold text-red-600 text-center mb-12">Youtube Live</h2>
            @if($lives->isNotEmpty())
                @php $latestVideo = $lives->first(); @endphp
                @php
                    $videoId = null;
                    if (preg_match('/(?:youtube\.com\/watch\?v=|youtu\.be\/|youtube\.com\/embed\/)([a-zA-Z0-9_-]{11})/', $latestVideo->video_link, $matches)) {
                        $videoId = $matches[1];
                    }
                @endphp
                @if($videoId)
                    @php
                        $media = new \App\Models\Media();
                        $embedUrl = $media->getYouTubeEmbedUrl($latestVideo->video_link, ['autoplay' => '0']);
                    @endphp
                    <div class="aspect-video max-w-4xl mx-auto">
                        <iframe src="{!! $embedUrl !!}" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen referrerpolicy="strict-origin-when-cross-origin" class="w-full h-full"></iframe>
                    </div>
                @endif
            @endif
        </div>
    </section>
    
    {{-- Videos Content --}}
    <section class="py-16 px-4">
        <h2 class="text-3xl font-bold text-red-600 text-center mb-12">{{ __('site.menu.videos') }}</h2>
        <div class="max-w-7xl mx-auto">
            @if($videos->isNotEmpty())
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($videos as $video)
                @php
                    $videoId = null;
                    if (preg_match('/(?:youtube\.com\/watch\?v=|youtu\.be\/|youtube\.com\/embed\/)([a-zA-Z0-9_-]{11})/', $video->video_link, $matches)) {
                        $videoId = $matches[1];
                    }
                    $thumbnail = $videoId ? "https://img.youtube.com/vi/{$videoId}/maxresdefault.jpg" : asset('assets/images/placeholder.jpg');
                @endphp
                <div class="group relative overflow-hidden rounded-lg shadow-lg hover:shadow-xl transform hover:-translate-y-2 transition-all duration-300 cursor-pointer video-thumbnail aspect-video" data-video-id="{{ $videoId }}" data-video-url="{{ $video->video_link }}">
                    <img src="{{ $thumbnail }}" alt="{{ app()->getLocale() === 'ta' ? $video->title_ta : $video->title_en }}" class="w-full h-full object-cover transition-transform duration-300 group-hover:scale-105">
                    <div class="absolute inset-0 bg-black bg-opacity-40 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-center justify-center">
                        <div class="bg-red-600 rounded-full p-4 transform scale-75 group-hover:scale-100 transition-transform duration-300">
                            <svg class="w-8 h-8 text-white" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM9.555 7.168A1 1 0 008 8v4a1 1 0 001.555.832l3-2a1 1 0 000-1.664l-3-2z" clip-rule="evenodd"></path>
                            </svg>
                        </div>
                    </div>
                    <div class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-black to-transparent p-4 text-white transform translate-y-full group-hover:translate-y-0 transition-transform duration-300">
                        <h3 class="text-lg font-semibold mb-1">{!! app()->getLocale() === 'ta' ? $video->title_ta : $video->title_en !!}</h3>
                        <p class="text-sm opacity-80">{{ $video->event_date ? $video->event_date->format('M j, Y') : '' }}</p>
                    </div>
                    <div class="absolute top-2 right-2 bg-red-600 text-white text-xs px-2 py-1 rounded-full">
                        <svg class="w-4 h-4 inline mr-1" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M23.498 6.186a3.016 3.016 0 0 0-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 0 0 .502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 0 0 2.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 0 0 2.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z"/>
                        </svg>
                        YouTube
                    </div>
                </div>
                @endforeach
            </div>

            
            @else
            <div class="text-center py-16">
                <h2 class="text-2xl font-semibold text-gray-600">{{ __('site.videos.no_videos') }}</h2>
                <p class="text-gray-500 mt-2">{{ __('site.press_releases.check_back') }}</p>
            </div>
            @endif
        </div>
    </section>

    {{-- Modal for video playback --}}
    <div id="video-modal" class="fixed inset-0 bg-black bg-opacity-75 hidden z-50 flex items-center justify-center">
        <div class="relative w-full max-w-4xl mx-4">
            <button id="close-modal" class="absolute top-4 right-4 text-white text-2xl hover:text-gray-300 transition-colors">&times;</button>
            <div class="aspect-w-16 aspect-h-9">
                <iframe id="video-iframe" class="w-full h-80 md:h-[500px]" src="" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen referrerpolicy="strict-origin-when-cross-origin"></iframe>
            </div>
        </div>
    </div>

    {{-- Social Media Section --}}
    <section class="py-16 pb-8 px-4 bg-red-600">
        <div class="max-w-4xl mx-auto text-center">
            <h2 class="text-2xl font-bold text-white mb-4">{{ __('site.contact.follow_social') }}</h2>
            <p class="text-red-100 mb-8">{{ __('site.contact.stay_connected') }}</p>
            <div class="flex justify-center space-x-2">
                <a href="https://www.facebook.com/people/Viduthalai-Chiruthaigal-katchi/61578689859070/"
                   class="bg-white p-3 rounded-full hover:bg-gray-100 transform hover:scale-110 transition-all duration-200">
                    <img src="{{ asset('assets/images/social/facebook.png') }}" alt="Facebook" class="w-6 h-6">
                </a>
                <a href="https://x.com/vck_officiall"
                   class="bg-white p-3 rounded-full hover:bg-gray-100 transform hover:scale-110 transition-all duration-200">
                    <img src="{{ asset('assets/images/social/twitter.png') }}" alt="Twitter" class="w-6 h-6">
                </a>
                <a href="https://www.instagram.com/vck_officiall/"
                   class="bg-white p-3 rounded-full hover:bg-gray-100 transform hover:scale-110 transition-all duration-200">
                    <img src="{{ asset('assets/images/social/instagram.png') }}" alt="Instagram" class="w-6 h-6">
                </a>
                <a href="#"
                   class="bg-white p-3 rounded-full hover:bg-gray-100 transform hover:scale-110 transition-all duration-200">
                    <img src="{{ asset('assets/images/social/threads.png') }}" alt="Threads" class="w-6 h-6">
                </a>
                <a href="https://www.youtube.com/@Vck_Youtube"
                   class="bg-white p-3 rounded-full hover:bg-gray-100 transform hover:scale-110 transition-all duration-200">
                    <img src="{{ asset('assets/images/social/youtube.png') }}" alt="YouTube" class="w-6 h-6">
                </a>
                <a href="#"
                   class="bg-white p-3 rounded-full hover:bg-gray-100 transform hover:scale-110 transition-all duration-200">
                    <img src="{{ asset('assets/images/social/whatsapp.png') }}" alt="WhatsApp" class="w-6 h-6">
                </a>
            </div>
        </div>
    </section>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const thumbnails = document.querySelectorAll('.video-thumbnail');
            const modal = document.getElementById('video-modal');
            const iframe = document.getElementById('video-iframe');
            const closeModal = document.getElementById('close-modal');

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
                    }
                });
            });

            closeModal.addEventListener('click', function() {
                modal.classList.add('hidden');
                iframe.src = '';
            });

            modal.addEventListener('click', function(e) {
                if (e.target === modal) {
                    modal.classList.add('hidden');
                    iframe.src = '';
                }
            });
        });
    
        // Tab switching functionality
        const tabToggles = document.querySelectorAll('[data-tabs-toggle]');
        tabToggles.forEach(toggle => {
            const tabList = toggle.querySelectorAll('button[role="tab"]');
            const contentId = toggle.getAttribute('data-tabs-toggle');
            const content = document.querySelector(contentId);
            if (content) {
                tabList.forEach(button => {
                    button.addEventListener('click', function() {
                        // Remove active from all buttons in this toggle
                        tabList.forEach(btn => {
                            btn.classList.remove('border-b-2', 'border-blue-600', 'text-blue-600');
                            btn.classList.add('hover:text-gray-600');
                        });
                        // Add active to clicked button
                        this.classList.add('border-b-2', 'border-blue-600', 'text-blue-600');
                        this.classList.remove('hover:text-gray-600');
                        // Hide all panels in this content
                        const allPanels = content.querySelectorAll('[role="tabpanel"]');
                        allPanels.forEach(panel => panel.classList.add('hidden'));
                        // Show target panel
                        const targetId = this.getAttribute('data-tabs-target');
                        const target = document.querySelector(targetId);
                        if (target) target.classList.remove('hidden');
                    });
                });
            }
        });

        // Slider functionality
        let currentSlide = 0;
        const sliderContainer = document.getElementById('slider-container');
        const dots = document.querySelectorAll('[data-slide]');
        const totalSlides = 3;

        function updateSlide(index) {
            currentSlide = index;
            sliderContainer.style.transform = `translateX(-${currentSlide * 100}%)`;
            dots.forEach((dot, i) => {
                dot.classList.toggle('bg-white', i === currentSlide);
                dot.classList.toggle('opacity-50', i !== currentSlide);
            });
        }

        function nextSlide() {
            currentSlide = (currentSlide + 1) % totalSlides;
            updateSlide(currentSlide);
        }

        function prevSlide() {
            currentSlide = (currentSlide - 1 + totalSlides) % totalSlides;
            updateSlide(currentSlide);
        }

        // Dot click events
        dots.forEach((dot, index) => {
            dot.addEventListener('click', () => updateSlide(index));
        });

        // Auto slide every 5 seconds
        setInterval(nextSlide, 5000);

        // Touch swipe for mobile
        let startX = 0;
        let endX = 0;

        sliderContainer.addEventListener('touchstart', (e) => {
            startX = e.touches[0].clientX;
        }, { passive: true });

        sliderContainer.addEventListener('touchmove', (e) => {
            endX = e.touches[0].clientX;
        }, { passive: true });

        sliderContainer.addEventListener('touchend', () => {
            if (startX - endX > 50) {
                nextSlide();
            } else if (endX - startX > 50) {
                prevSlide();
            }
        });
    </script>
@endsection
