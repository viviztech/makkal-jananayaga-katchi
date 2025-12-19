@extends('layouts.app')

@section('content')
<div x-data="{ currentSection: 0 }" class="h-screen overflow-y-scroll snap-y snap-mandatory scroll-smooth">
    <!-- Hero Banner Section -->
     
    <section id="hero" x-data="{
        currentSlide: 0,
        slides: [
            '{{ asset('assets/images/bg/slider1.png') }}',
            '{{ asset('assets/images/bg/slider2.webp') }}',
            '{{ asset('assets/images/bg/slider3.webp') }}'
        ],
        init() {
            setInterval(() => {
                this.currentSlide = (this.currentSlide + 1) % this.slides.length;
            }, 5000);
        }
    }" class="h-screen snap-start flex items-center justify-center text-white overflow-auto" :style="`background-image: url('${slides[currentSlide]}'); background-size: cover; background-position: center;`">
        <div class="text-center px-4">
            <h1 class="text-3xl sm:text-4xl md:text-5xl font-bold tamil">{{ __('site.hero.slider_title1') }}</h1><br>
            <h1 class="text-3xl sm:text-4xl md:text-5xl font-bold tamil">{{ __('site.hero.slider_title2') }}</h1>
            <p class="text-lg sm:text-xl mt-4 tamil">{{ __('site.hero.subtitle') }}</p>
            <button class="mt-6 bg-yellow-400 text-red-600 px-4 sm:px-6 py-2 sm:py-3 rounded-full font-bold tamil text-sm sm:text-base">{{ __('site.hero.join_button') }}</button>
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


    <!-- Elected Members Section -->
    <section id="elected-members" class="min-h-screen snap-start bg-white flex items-start justify-center overflow-auto pt-25 pb-25">
        <div class="container mx-auto px-4">
            <h2 class="text-2xl sm:text-3xl md:text-4xl font-bold text-red-600 mb-6 sm:mb-8 text-center tamil">{{ __('site.home.elected_members_title') }}</h2>
            <h3 class="text-lg sm:text-xl md:text-2xl font-semibold text-blue-600 mb-3 sm:mb-4 text-center tamil">{{ __('site.home.elected_members_mp') }}</h3>

            <!-- First Row: 2 Cards Centered -->
            <div class="flex justify-center mb-8">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 max-w-2xl">
                    <div class="bg-gray-100 p-6 rounded-lg shadow-lg text-center">
                        <img src="{{ asset('assets/images/members/member1.png') }}" alt="Member 1" class="w-16 md:w-32 lg:w-48 rounded-full mx-auto mb-4">
                        <h3 class="text-xl font-bold tamil text-red-600">{{ __('site.home.member_1_name') }}</h3>
                        <p class="tamil">{{ __('site.home.member_1_position') }}</p>
                    </div>
                    <div class="bg-gray-100 p-6 rounded-lg shadow-lg text-center">
                        <img src="{{ asset('assets/images/members/member2.png') }}" alt="Member 2" class="w-16 md:w-32 lg:w-48 rounded-full mx-auto mb-4">
                        <h3 class="text-xl font-bold tamil text-red-600">{{ __('site.home.member_2_name') }}</h3>
                        <p class="tamil">{{ __('site.home.member_2_position') }}</p>
                    </div>
                </div>
            </div>

            <h3 class="text-2xl font-semibold text-blue-600 mb-4 text-center tamil">{{ __('site.home.elected_members_mla') }}</h3>
            <!-- Second Row: 4 Cards Centered -->
            <div class="flex justify-center">
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 max-w-6xl">
                    <div class="bg-gray-100 p-6 rounded-lg shadow-lg text-center">
                        <img src="{{ asset('assets/images/members/member3.png') }}" alt="Member 3" class="w-16 md:w-32 lg:w-48 rounded-full mx-auto mb-4">
                        <h3 class="text-xl font-bold tamil text-red-600">{{ __('site.home.member_3_name') ?: 'Member 3' }}</h3>
                        <p class="tamil">{{ __('site.home.member_3_position') ?: 'Position 3' }}</p>
                    </div>
                    <div class="bg-gray-100 p-6 rounded-lg shadow-lg text-center">
                        <img src="{{ asset('assets/images/members/member4.png') }}" alt="Member 4" class="w-16 md:w-32 lg:w-48 rounded-full mx-auto mb-4">
                        <h3 class="text-xl font-bold tamil text-red-600">{{ __('site.home.member_4_name') ?: 'Member 4' }}</h3>
                        <p class="tamil">{{ __('site.home.member_4_position') ?: 'Position 4' }}</p>
                    </div>
                    <div class="bg-gray-100 p-6 rounded-lg shadow-lg text-center">
                        <img src="{{ asset('assets/images/members/member5.png') }}" alt="Member 5" class="w-16 md:w-32 lg:w-48 rounded-full mx-auto mb-4">
                        <h3 class="text-xl font-bold tamil text-red-600">{{ __('site.home.member_5_name') ?: 'Member 5' }}</h3>
                        <p class="tamil">{{ __('site.home.member_5_position') ?: 'Position 5' }}</p>
                    </div>
                    <div class="bg-gray-100 p-6 rounded-lg shadow-lg text-center">
                        <img src="{{ asset('assets/images/members/member6.png') }}" alt="Member 6" class="w-16 md:w-32 lg:w-48 rounded-full mx-auto mb-4">
                        <h3 class="text-xl font-bold tamil text-red-600">{{ __('site.home.member_6_name') ?: 'Member 6' }}</h3>
                        <p class="tamil">{{ __('site.home.member_6_position') ?: 'Position 6' }}</p>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- Latest News Section -->
    <section id="latest-news" x-data="{ activeTab: 0 }" class="min-h-screen snap-start bg-white flex items-start justify-center overflow-auto pt-25 pb-25">
        <div class="container mx-auto px-4 mb-12">
            <h2 class="text-2xl sm:text-3xl md:text-4xl font-bold text-red-600 mb-6 sm:mb-8 text-center tamil">{{ __('site.home.latest_news_title') }}</h2>
            <h3 class="text-lg sm:text-xl md:text-2xl font-semibold text-blue-600 mb-3 sm:mb-4 text-center tamil">{{ __('site.home.latest_news_description') }}</h3>

            <!-- Tabs -->
            <div class="flex justify-center mb-6 sm:mb-8">
                <div class="flex space-x-1 bg-gray-100 p-1 rounded-lg">
                    <button @click="activeTab = 0" :class="activeTab === 0 ? 'bg-red-600 text-white' : 'text-gray-700 hover:bg-gray-200'" class="px-4 sm:px-6 py-2 rounded-md font-medium tamil text-sm sm:text-base transition-colors">அண்மைச் செய்திகள்</button>
                    <button @click="activeTab = 1" :class="activeTab === 1 ? 'bg-red-600 text-white' : 'text-gray-700 hover:bg-gray-200'" class="px-4 sm:px-6 py-2 rounded-md font-medium tamil text-sm sm:text-base transition-colors">அறிக்கைகள்</button>
                    <button @click="activeTab = 2" :class="activeTab === 2 ? 'bg-red-600 text-white' : 'text-gray-700 hover:bg-gray-200'" class="px-4 sm:px-6 py-2 rounded-md font-medium tamil text-sm sm:text-base transition-colors">நிகழ்வுகள்</button>
                </div>
            </div>
            
            <!-- All News Tab Content -->
            @if($latest_news->isNotEmpty())
            <div x-show="activeTab === 0" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 sm:gap-6">
                @foreach($latest_news as $latest_new)
                <div class="bg-white rounded-lg shadow-lg overflow-hidden video-card">
                    <img src="{{ $latest_new->featured_image_url }}" alt="News 1" class="w-full h-48 object-cover">
                    <div class="p-4">
                        <h3 class="text-lg sm:text-xl font-bold tamil text-red-600 mb-2">{{ $latest_new->title_ta }}</h3>
                        <p class="tamil text-sm text-gray-700 mb-3"></p>
                        <div class="flex justify-between items-center">
                            <span class="text-sm text-gray-600">{{ $latest_new->event_date ? $latest_new->event_date->format('d-M-Y') : 'N/A' }}</span>
                            <a href="{{ $latest_new->slug }}" class="bg-blue-600 text-white px-4 py-2 rounded tamil text-sm hover:bg-red-700 transition">Read more</a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            @endif

            <!-- Recent News Tab Content -->
             @if($press_releases->isNotEmpty())
            <div x-show="activeTab === 1" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 sm:gap-6">
                @foreach($press_releases as $press_release)
                <div class="bg-white rounded-lg shadow-lg overflow-hidden video-card">
                    <img src="{{ $press_release->featured_image_url }}" alt="Recent News 1" class="w-full h-48 object-cover">
                    <div class="p-4">
                        <h3 class="text-lg sm:text-xl font-bold tamil text-red-600 mb-2">{{ $press_release->title_ta }}</h3>
                        <p class="tamil text-sm text-gray-700 mb-3"></p>
                        <div class="flex justify-between items-center">
                            <span class="text-sm text-gray-600">{{ $press_release->event_date ? $press_release->event_date->format('d-M-Y') : 'N/A' }}</span>
                            <a href="{{ $press_release->slug }}" class="bg-blue-600 text-white px-4 py-2 rounded tamil text-sm hover:bg-red-700 transition">Read more</a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            @endif

            <!-- Special News Tab Content -->
             @if($events->isNotEmpty())
            <div x-show="activeTab === 2" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 sm:gap-6">
                @foreach($events as $event)
                <div class="bg-white rounded-lg shadow-lg overflow-hidden video-card">
                    <img src="{{ $event->featured_image_url }}" alt="Special News 1" class="w-full h-48 object-cover">
                    <div class="p-4">
                        <h3 class="text-lg sm:text-xl font-bold tamil text-red-600 mb-2">{{ $event->title_ta }}</h3>
                        <p class="tamil text-sm text-gray-700 mb-3"></p>
                        <div class="flex justify-between items-center">
                            <span class="text-sm text-gray-600">{{ $event->event_date ? $event->event_date->format('d-M-Y') : 'N/A' }}</span>
                            <a href="{{ $event->slug }}" class="bg-blue-600 text-white px-4 py-2 rounded tamil text-sm hover:bg-red-700 transition">Read more</a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            @endif
        </div>
    </section>

    
    <section id="journey" class="h-screen snap-start bg-white flex items-center justify-center overflow-auto pt-25 pb-25">
        <div class="container mx-auto h-full flex flex-col">
            <h2 class="text-2xl sm:text-3xl md:text-4xl font-bold text-red-600 mb-6 sm:mb-8 text-center tamil">{{ __('site.home.vck-history') }}</h2>
            <h3 class="text-lg sm:text-xl md:text-2xl font-semibold text-blue-600 mb-3 sm:mb-4 text-center tamil">{{ __('site.home.vck-history-title') }}</h3>
            
            <!-- <div class="py-6 flex justify-center space-x-4 overflow-x-auto">
                <button @click="document.getElementById('journey-carousel').scrollLeft = 0 * document.getElementById('journey-carousel').clientWidth"
                        class="w-12 h-12 rounded-full flex items-center justify-center font-semibold bg-gray-300 text-gray-700 hover:bg-blue-600 hover:text-white transition-all flex-shrink-0">
                    1989
                </button>
                <button @click="document.getElementById('journey-carousel').scrollLeft = 1 * document.getElementById('journey-carousel').clientWidth"
                        class="w-12 h-12 rounded-full flex items-center justify-center font-semibold bg-gray-300 text-gray-700 hover:bg-blue-600 hover:text-white transition-all flex-shrink-0">
                    1990
                </button>
                <button @click="document.getElementById('journey-carousel').scrollLeft = 2 * document.getElementById('journey-carousel').clientWidth"
                        class="w-12 h-12 rounded-full flex items-center justify-center font-semibold bg-gray-300 text-gray-700 hover:bg-blue-600 hover:text-white transition-all flex-shrink-0">
                    1991
                </button>
                <button @click="document.getElementById('journey-carousel').scrollLeft = 3 * document.getElementById('journey-carousel').clientWidth"
                        class="w-12 h-12 rounded-full flex items-center justify-center font-semibold bg-gray-300 text-gray-700 hover:bg-blue-600 hover:text-white transition-all flex-shrink-0">
                    1999
                </button>
                <button @click="document.getElementById('journey-carousel').scrollLeft = 4 * document.getElementById('journey-carousel').clientWidth"
                        class="w-12 h-12 rounded-full flex items-center justify-center font-semibold bg-gray-300 text-gray-700 hover:bg-blue-600 hover:text-white transition-all flex-shrink-0">
                    2004
                </button>
                <button @click="document.getElementById('journey-carousel').scrollLeft = 5 * document.getElementById('journey-carousel').clientWidth"
                        class="w-12 h-12 rounded-full flex items-center justify-center font-semibold bg-gray-300 text-gray-700 hover:bg-blue-600 hover:text-white transition-all flex-shrink-0">
                    1989
                </button>
                <button @click="document.getElementById('journey-carousel').scrollLeft = 6 * document.getElementById('journey-carousel').clientWidth"
                        class="w-12 h-12 rounded-full flex items-center justify-center font-semibold bg-gray-300 text-gray-700 hover:bg-blue-600 hover:text-white transition-all flex-shrink-0">
                    1990
                </button>
                <button @click="document.getElementById('journey-carousel').scrollLeft = 7 * document.getElementById('journey-carousel').clientWidth"
                        class="w-12 h-12 rounded-full flex items-center justify-center font-semibold bg-gray-300 text-gray-700 hover:bg-blue-600 hover:text-white transition-all flex-shrink-0">
                    1991
                </button>
                <button @click="document.getElementById('journey-carousel').scrollLeft = 8 * document.getElementById('journey-carousel').clientWidth"
                        class="w-12 h-12 rounded-full flex items-center justify-center font-semibold bg-gray-300 text-gray-700 hover:bg-blue-600 hover:text-white transition-all flex-shrink-0">
                    1999
                </button>
                <button @click="document.getElementById('journey-carousel').scrollLeft = 9 * document.getElementById('journey-carousel').clientWidth"
                        class="w-12 h-12 rounded-full flex items-center justify-center font-semibold bg-gray-300 text-gray-700 hover:bg-blue-600 hover:text-white transition-all flex-shrink-0">
                    2004
                </button>
            </div> -->
            
            <!-- Main Carousel Content -->
            <div class="flex-1 relative overflow-x-auto snap-x snap-mandatory" id="journey-carousel">
                <!-- Slides Container -->
                <div class="flex h-full">
                    
                    <!-- Slide 1: 1951 -->
                    <div class="w-full h-full flex-shrink-0 flex items-center justify-center p-8">
                        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 max-w-6xl w-full items-center">
                            <div class="w-full">
                                <img src="{{ asset('assets/images/bg/history.png') }}"
                                     alt="1989"
                                     class="w-full h-64 object-cover rounded-lg">
                            </div>
                            <div class="w-full">
                                <h2 class="text-2xl sm:text-3xl font-bold text-red-500 mb-3 sm:mb-4">1989</h2>
                                <p class="text-gray-700 text-sm sm:text-base md:text-lg">.</p>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Slide 2: 1952 -->
                    <div class="w-full h-full flex-shrink-0 flex items-center justify-center p-8">
                        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 max-w-6xl w-full items-center">
                            <div class="w-full">
                                <img src="{{ asset('assets/images/bg/history.png') }}"
                                     alt="1952 - First Elections"
                                     class="w-full h-64 object-cover rounded-lg">
                            </div>
                            <div class="w-full">
                                <h2 class="text-2xl sm:text-3xl font-bold text-red-500 mb-3 sm:mb-4">1952</h2>
                                <p class="text-gray-700 text-sm sm:text-base md:text-lg">In the 1951-1952 general elections to the Parliament of India, Bharatiya Jana Sangh wins 3 seats.</p>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Slide 3: 1953 -->
                    <div class="w-full h-full flex-shrink-0 flex items-center justify-center p-8">
                        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 max-w-6xl w-full items-center">
                            <div class="w-full">
                                <img src="{{ asset('assets/images/bg/history.png') }}"
                                     alt="1953 - Kashmir Agitation"
                                     class="w-full h-64 object-cover rounded-lg">
                            </div>
                            <div class="w-full">
                                <h2 class="text-2xl sm:text-3xl font-bold text-red-500 mb-3 sm:mb-4">1953</h2>
                                <p class="text-gray-700 text-sm sm:text-base md:text-lg">Kashmir Agitation: Bharatiya Jana Sangh starts a movement under the leadership of Dr. Syama Prasad Mookerjee on the issue of Kashmir; Mookerjee arrested and dies in jail.</p>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Slide 4: 1965 -->
                    <div class="w-full h-full flex-shrink-0 flex items-center justify-center p-8">
                        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 max-w-6xl w-full items-center">
                            <div class="w-full">
                                <img src="{{ asset('assets/images/bg/history.png') }}"
                                     alt="1965 - Integral Humanism"
                                     class="w-full h-64 object-cover rounded-lg">
                            </div>
                            <div class="w-full">
                                <h2 class="text-2xl sm:text-3xl font-bold text-red-500 mb-3 sm:mb-4">1965</h2>
                                <p class="text-gray-700 text-sm sm:text-base md:text-lg">Deendayal Upadhyaya formulates the philosophy of integral humanism, which becomes the official doctrine of the Jana Sangh.</p>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Slide 5: 1967 -->
                    <div class="w-full h-full flex-shrink-0 flex items-center justify-center p-8">
                        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 max-w-6xl w-full items-center">
                            <div class="w-full">
                                <img src="{{ asset('assets/images/bg/history.png') }}"
                                     alt="1967 - Coalition Governments"
                                     class="w-full h-64 object-cover rounded-lg">
                            </div>
                            <div class="w-full">
                                <h2 class="text-2xl sm:text-3xl font-bold text-red-500 mb-3 sm:mb-4">1967</h2>
                                <p class="text-gray-700 text-sm sm:text-base md:text-lg">Jana Sangh enters into coalitions with other parties, forming governments in states like Madhya Pradesh, Bihar, and Uttar Pradesh.</p>
                            </div>
                        </div>
                    </div>

                    <!-- Slide 5: 1967 -->
                    <div class="w-full h-full flex-shrink-0 flex items-center justify-center p-8">
                        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 max-w-6xl w-full items-center">
                            <div class="w-full">
                                <img src="{{ asset('assets/images/bg/history.png') }}"
                                     alt="1967 - Coalition Governments"
                                     class="w-full h-64 object-cover rounded-lg">
                            </div>
                            <div class="w-full">
                                <h2 class="text-2xl sm:text-3xl font-bold text-red-500 mb-3 sm:mb-4">1967</h2>
                                <p class="text-gray-700 text-sm sm:text-base md:text-lg">Jana Sangh enters into coalitions with other parties, forming governments in states like Madhya Pradesh, Bihar, and Uttar Pradesh.</p>
                            </div>
                        </div>
                    </div>

                    <!-- Slide 5: 1967 -->
                    <div class="w-full h-full flex-shrink-0 flex items-center justify-center p-8">
                        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 max-w-6xl w-full items-center">
                            <div class="w-full">
                                <img src="{{ asset('assets/images/bg/history.png') }}"
                                     alt="1967 - Coalition Governments"
                                     class="w-full h-64 object-cover rounded-lg">
                            </div>
                            <div class="w-full">
                                <h2 class="text-2xl sm:text-3xl font-bold text-red-500 mb-3 sm:mb-4">1967</h2>
                                <p class="text-gray-700 text-sm sm:text-base md:text-lg">Jana Sangh enters into coalitions with other parties, forming governments in states like Madhya Pradesh, Bihar, and Uttar Pradesh.</p>
                            </div>
                        </div>
                    </div>

                    <!-- Slide 5: 1967 -->
                    <div class="w-full h-full flex-shrink-0 flex items-center justify-center p-8">
                        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 max-w-6xl w-full items-center">
                            <div class="w-full">
                                <img src="{{ asset('assets/images/bg/history.png') }}"
                                     alt="1967 - Coalition Governments"
                                     class="w-full h-64 object-cover rounded-lg">
                            </div>
                            <div class="w-full">
                                <h2 class="text-2xl sm:text-3xl font-bold text-red-500 mb-3 sm:mb-4">1967</h2>
                                <p class="text-gray-700 text-sm sm:text-base md:text-lg">Jana Sangh enters into coalitions with other parties, forming governments in states like Madhya Pradesh, Bihar, and Uttar Pradesh.</p>
                            </div>
                        </div>
                    </div>

                    <!-- Slide 5: 1967 -->
                    <div class="w-full h-full flex-shrink-0 flex items-center justify-center p-8">
                        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 max-w-6xl w-full items-center">
                            <div class="w-full">
                                <img src="{{ asset('assets/images/bg/history.png') }}"
                                     alt="1967 - Coalition Governments"
                                     class="w-full h-64 object-cover rounded-lg">
                            </div>
                            <div class="w-full">
                                <h2 class="text-2xl sm:text-3xl font-bold text-red-500 mb-3 sm:mb-4">1967</h2>
                                <p class="text-gray-700 text-sm sm:text-base md:text-lg">Jana Sangh enters into coalitions with other parties, forming governments in states like Madhya Pradesh, Bihar, and Uttar Pradesh.</p>
                            </div>
                        </div>
                    </div>

                    <!-- Slide 5: 1967 -->
                    <div class="w-full h-full flex-shrink-0 flex items-center justify-center p-8">
                        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 max-w-6xl w-full items-center">
                            <div class="w-full">
                                <img src="{{ asset('assets/images/bg/history.png') }}"
                                     alt="1967 - Coalition Governments"
                                     class="w-full h-64 object-cover rounded-lg">
                            </div>
                            <div class="w-full">
                                <h2 class="text-2xl sm:text-3xl font-bold text-red-500 mb-3 sm:mb-4">1967</h2>
                                <p class="text-gray-700 text-sm sm:text-base md:text-lg">Jana Sangh enters into coalitions with other parties, forming governments in states like Madhya Pradesh, Bihar, and Uttar Pradesh.</p>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
            
            <!-- Timeline Indicator -->
            
        </div>
    </section>


    <!-- Gallery Section -->
    <section id="gallery" class="min-h-screen snap-start bg-white flex items-start justify-center overflow-auto pt-25 pb-25">
        <div class="container mx-auto px-4 mb-12">
            <h2 class="text-2xl sm:text-3xl md:text-4xl font-bold text-red-600 mb-6 sm:mb-8 text-center tamil">{{ __('site.home.interviews-title') }}</h2>
            <h3 class="text-lg sm:text-xl md:text-2xl font-semibold text-blue-600 mb-3 sm:mb-4 text-center tamil">{{ __('site.home.interviews-title-description') }}</h3>
            
            <!-- All News Tab Content -->
            @if($interviews->isNotEmpty())
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 sm:gap-6">
                @foreach($interviews as $interview)
                <div class="bg-white rounded-lg shadow-lg overflow-hidden video-card">
                    <img src="{{ $interview->featured_image_url }}" alt="News 1" class="w-full h-48 object-cover">
                    <div class="p-4">
                        <h3 class="text-lg sm:text-xl font-bold tamil text-red-600 mb-2">{{ $interview->title_ta }}</h3>
                        <p class="tamil text-sm text-gray-700 mb-3"></p>
                        <div class="flex justify-between items-center">
                            <span class="text-sm text-gray-600">{{ $interview->event_date ? $interview->event_date->format('d-M-Y') : 'N/A' }}</span>
                            <a href="{{ $interview->slug }}" class="bg-blue-600 text-white px-4 py-2 rounded tamil text-sm hover:bg-red-700 transition">Read more</a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            @endif

        </div>
    </section>
    

    <section id="youtube" class="h-screen snap-start bg-black flex items-center justify-center overflow-auto pt-25 pb-25">
        <div class="container mx-auto px-4 text-center">
            <h2 class="text-2xl sm:text-3xl md:text-4xl font-bold text-red-600 mb-6 sm:mb-8 tamil">{{ __('site.home.youtube-title') }}</h2>
            <div class="bg-gray-800 p-4 sm:p-8 rounded-lg">
                @php
                    // Get clean origin (scheme + host only, no path/port)
                    $origin = request()->getSchemeAndHttpHost();
                    // Remove port if it's a standard port
                    $parsed = parse_url($origin);
                    if ($parsed && isset($parsed['host'])) {
                        $scheme = $parsed['scheme'] ?? 'https';
                        $host = $parsed['host'];
                        $host = preg_replace('/:\d+$/', '', $host);
                        $origin = $scheme . '://' . $host;
                    }
                    $playlistEmbedUrl = "https://www.youtube.com/embed/videoseries?list=PLCz-e9HtsWft1NK5yfmBQfkrJ5qDm5aKj&rel=0&modestbranding=1&enablejsapi=1&origin=" . urlencode($origin) . "&widget_referrer=" . urlencode($origin);
                @endphp
                <iframe width="100%" src="{!! $playlistEmbedUrl !!}" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen referrerpolicy="strict-origin-when-cross-origin" class="rounded aspect-video"></iframe>
                <p class="text-white mt-4 tamil">{{ __('site.home.velicham_tv_desc') }}</p>
            </div>
        </div>
    </section>
    <!-- News Section -->
    <!-- <section id="news" class="h-screen snap-start bg-gray-100 flex items-center justify-center overflow-auto pt-25 pb-25">
        <div class="container mx-auto px-4">
            <h2 class="text-2xl sm:text-3xl md:text-4xl font-bold text-red-600 mb-6 sm:mb-8 text-center tamil">{{ __('site.home.news_title') }}</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4 sm:gap-6">
                <div class="bg-white p-4 sm:p-6 rounded-lg shadow-lg">
                    <h3 class="text-lg sm:text-xl font-bold tamil text-red-600">{{ __('site.home.news_item_1_title') }}</h3>
                    <p class="tamil mt-2">{{ __('site.home.news_item_1_desc') }}</p>
                    <a href="/news/item/1" class="mt-4 inline-block bg-blue-600 text-white px-4 py-2 rounded tamil">{{ __('site.home.read_more') }}</a>
                </div>
                <div class="bg-white p-4 sm:p-6 rounded-lg shadow-lg">
                    <h3 class="text-lg sm:text-xl font-bold tamil text-red-600">{{ __('site.home.news_item_2_title') }}</h3>
                    <p class="tamil mt-2">{{ __('site.home.news_item_2_desc') }}</p>
                    <a href="/news/item/2" class="mt-4 inline-block bg-blue-600 text-white px-3 sm:px-4 py-2 rounded tamil text-sm sm:text-base">{{ __('site.home.read_more') }}</a>
                </div>
                <div class="bg-white p-4 sm:p-6 rounded-lg shadow-lg">
                    <h3 class="text-lg sm:text-xl font-bold tamil text-red-600">{{ __('site.home.news_item_3_title') }}</h3>
                    <p class="tamil mt-2">{{ __('site.home.news_item_3_desc') }}</p>
                    <a href="/news/item/3" class="mt-4 inline-block bg-blue-600 text-white px-3 sm:px-4 py-2 rounded tamil text-sm sm:text-base">{{ __('site.home.read_more') }}</a>
                </div>
            </div>
        </div>
    </section> -->

    <!-- Velicham TV Live Section -->
    <section id="velicham-tv" class="h-screen snap-start bg-black flex items-center justify-center overflow-auto pt-25 pb-25">
        <div class="container mx-auto px-4 text-center">
            <h2 class="text-2xl sm:text-3xl md:text-4xl font-bold text-red-600 mb-6 sm:mb-8 tamil">{{ __('site.home.velicham_tv_title') }}</h2>
            <div class="bg-gray-800 p-4 sm:p-8 rounded-lg">
                @php
                    // Get clean origin (scheme + host only, no path/port)
                    $origin = request()->getSchemeAndHttpHost();
                    // Remove port if it's a standard port
                    $parsed = parse_url($origin);
                    if ($parsed && isset($parsed['host'])) {
                        $scheme = $parsed['scheme'] ?? 'https';
                        $host = $parsed['host'];
                        $host = preg_replace('/:\d+$/', '', $host);
                        $origin = $scheme . '://' . $host;
                    }
                    $liveStreamEmbedUrl = "https://www.youtube.com/embed/live_stream?channel=AIzaSyBJxCDkVF7wtpnvIL2SE9IWj3Dqevo4IpA&rel=0&modestbranding=1&enablejsapi=1&origin=" . urlencode($origin) . "&widget_referrer=" . urlencode($origin);
                @endphp
                <iframe width="100%" src="{!! $liveStreamEmbedUrl !!}" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen referrerpolicy="strict-origin-when-cross-origin" class="rounded aspect-video"></iframe>
                <p class="text-white mt-4 tamil">{{ __('site.home.velicham_tv_desc') }}</p>
            </div>
        </div>
    </section>

    <!-- Our Footprints Section -->
    <section id="footprints" x-data="youtubePlaylist()" class="h-screen snap-start bg-gradient-to-b from-blue-600 to-red-600 text-white flex items-center justify-center overflow-auto pt-25 pb-25">
        <div class="container mx-auto px-4 text-center">
            <h2 class="text-2xl sm:text-3xl md:text-4xl font-bold mb-6 sm:mb-8 tamil">{{ __('site.home.footprints_title') }}</h2>
            <p class="text-lg sm:text-xl md:text-2xl tamil mb-8">{{ __('site.home.footprints_stats') }}</p>
            
            <div class="flex justify-center space-x-6 mb-8">
                <a href="#" class="text-blue-600 hover:text-blue-800 text-3xl"><i class="fab fa-facebook">Facebook</i></a>
                <a href="#" class="text-black hover:text-gray-700 text-3xl"><i class="fab fa-x-twitter"></i></a>
                <a href="#" class="text-pink-600 hover:text-pink-800 text-3xl"><i class="fab fa-instagram"></i></a>
                <a href="#" class="text-red-600 hover:text-red-800 text-3xl"><i class="fab fa-youtube"></i></a>
                <a href="#" class="text-gray-800 hover:text-gray-600 text-3xl"><i class="fab fa-threads"></i></a>
                <a href="#" class="text-green-600 hover:text-green-800 text-3xl"><i class="fab fa-whatsapp"></i></a>
            </div>

            <!-- YouTube Playlist -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6" x-show="videos.length > 0">
                <template x-for="video in videos" :key="video.id.videoId">
                    <div class="bg-white text-black rounded-lg shadow-lg overflow-hidden">
                        <img :src="video.snippet.thumbnails.medium.url" :alt="video.snippet.title" class="w-full h-48 object-cover">
                        <div class="p-4">
                            <h3 class="text-lg font-bold mb-2" x-text="video.snippet.title"></h3>
                            <p class="text-sm text-gray-600 mb-4" x-text="video.snippet.description.substring(0, 100) + '...'"></p>
                            <a :href="'https://www.youtube.com/watch?v=' + video.id.videoId" target="_blank" class="bg-red-600 text-white px-4 py-2 rounded hover:bg-red-700 transition">Watch Video</a>
                        </div>
                    </div>
                </template>
            </div>

            <div x-show="loading" class="text-white">Loading videos...</div>
            <div x-show="error" class="text-red-300" x-text="error"></div>
        </div>
    </section>

    <!-- Join Us Section -->
    <section id="join" class="h-screen snap-start bg-gray-100 flex items-center justify-center overflow-auto pt-25 pb-25" style="background-image: url('{{ asset('assets/images/bg/slider1.png') }}'); background-size: cover; background-position: center;">
        <div class="container mx-auto px-4 text-center">
            <h2 class="text-2xl sm:text-3xl md:text-4xl font-bold text-red-600 mb-6 sm:mb-8 tamil">{{ __('site.home.join_title') }}</h2>
            <p class="text-base sm:text-lg tamil mb-8">{{ __('home.join_description') }}</p>

            <!-- Social Media Icons -->


            <a href="/join" class="bg-blue-600 text-white px-6 py-3 rounded-full font-bold tamil text-lg hover:bg-red-700 transition">Join VCK</a>
        </div>
    </section>

    <div class="fixed right-2 sm:right-4 top-1/2 transform -translate-y-1/2 flex flex-col space-y-1 sm:space-y-2">
        <button @click="$el.parentElement.parentElement.scrollTo({ top: 0 * window.innerHeight, behavior: 'smooth' })" class="w-2 h-2 sm:w-3 sm:h-3 rounded-full bg-red-600" :class="{ 'bg-blue-400': currentSection === 0 }"></button>
        <button @click="$el.parentElement.parentElement.scrollTo({ top: 1 * window.innerHeight, behavior: 'smooth' })" class="w-2 h-2 sm:w-3 sm:h-3 rounded-full bg-red-600" :class="{ 'bg-blue-400': currentSection === 1 }"></button>
        <button @click="$el.parentElement.parentElement.scrollTo({ top: 2 * window.innerHeight, behavior: 'smooth' })" class="w-2 h-2 sm:w-3 sm:h-3 rounded-full bg-red-600" :class="{ 'bg-blue-400': currentSection === 2 }"></button>
        <button @click="$el.parentElement.parentElement.scrollTo({ top: 3 * window.innerHeight, behavior: 'smooth' })" class="w-2 h-2 sm:w-3 sm:h-3 rounded-full bg-red-600" :class="{ 'bg-blue-400': currentSection === 3 }"></button>
        <button @click="$el.parentElement.parentElement.scrollTo({ top: 4 * window.innerHeight, behavior: 'smooth' })" class="w-2 h-2 sm:w-3 sm:h-3 rounded-full bg-red-600" :class="{ 'bg-blue-400': currentSection === 4 }"></button>
        <button @click="$el.parentElement.parentElement.scrollTo({ top: 5 * window.innerHeight, behavior: 'smooth' })" class="w-2 h-2 sm:w-3 sm:h-3 rounded-full bg-red-600" :class="{ 'bg-blue-400': currentSection === 5 }"></button>
        <button @click="$el.parentElement.parentElement.scrollTo({ top: 6 * window.innerHeight, behavior: 'smooth' })" class="w-2 h-2 sm:w-3 sm:h-3 rounded-full bg-red-600" :class="{ 'bg-blue-400': currentSection === 6 }"></button>
        <button @click="$el.parentElement.parentElement.scrollTo({ top: 7 * window.innerHeight, behavior: 'smooth' })" class="w-2 h-2 sm:w-3 sm:h-3 rounded-full bg-red-600" :class="{ 'bg-blue-400': currentSection === 7 }"></button>
        <button @click="$el.parentElement.parentElement.scrollTo({ top: 8 * window.innerHeight, behavior: 'smooth' })" class="w-2 h-2 sm:w-3 sm:h-3 rounded-full bg-red-600" :class="{ 'bg-blue-400': currentSection === 8 }"></button>
        <button @click="$el.parentElement.parentElement.scrollTo({ top: 9 * window.innerHeight, behavior: 'smooth' })" class="w-2 h-2 sm:w-3 sm:h-3 rounded-full bg-red-600" :class="{ 'bg-blue-400': currentSection === 9 }"></button>
        <button @click="$el.parentElement.parentElement.scrollTo({ top: 10 * window.innerHeight, behavior: 'smooth' })" class="w-2 h-2 sm:w-3 sm:h-3 rounded-full bg-red-600" :class="{ 'bg-blue-400': currentSection === 10 }"></button>
        <button @click="$el.parentElement.parentElement.scrollTo({ top: 11 * window.innerHeight, behavior: 'smooth' })" class="w-2 h-2 sm:w-3 sm:h-3 rounded-full bg-red-600" :class="{ 'bg-blue-400': currentSection === 11 }"></button>
        <button @click="$el.parentElement.parentElement.scrollTo({ top: 12 * window.innerHeight, behavior: 'smooth' })" class="w-2 h-2 sm:w-3 sm:h-3 rounded-full bg-red-600" :class="{ 'bg-blue-400': currentSection === 12 }"></button>
    </div>
</div>

<script>
    document.addEventListener('alpine:init', () => {
        Alpine.data('scrollTracker', () => ({
            currentSection: 0,
            init() {
                this.$el.addEventListener('scroll', () => {
                    this.currentSection = Math.round(this.$el.scrollTop / window.innerHeight);
                });
            }
        }));

        Alpine.data('youtubePlaylist', () => ({
            videos: [],
            loading: true,
            error: null,
            apiKey: '{{ env("YOUTUBE_API_KEY") }}',
            playlistId: 'PLfMp-SVlsmlWUE2qz6eLj_mM7S6iwNfT3', // Uploads playlist for channel UC3DxLfPlscTE

            async init() {
                try {
                    const response = await fetch(`https://www.googleapis.com/youtube/v3/playlistItems?part=snippet&maxResults=9&playlistId=${this.playlistId}&key=${this.apiKey}`);
                    const data = await response.json();
                    if (data.items) {
                        this.videos = data.items;
                    } else {
                        this.error = 'Failed to load videos';
                    }
                } catch (err) {
                    this.error = 'Error fetching videos: ' + err.message;
                } finally {
                    this.loading = false;
                }
            }
        }));
    });
</script>
@endsection
