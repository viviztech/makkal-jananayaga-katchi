@extends('layouts.app')

@section('title', 'VCK - Viduthalai Chiruthaigal Katchi')

@section('content')
    {{-- Enhanced Hero Section --}}
    <section class="relative min-h-screen flex items-center bg-gradient-to-br from-blue-900 via-blue-800 to-indigo-900 overflow-hidden">
        {{-- Animated Background Elements --}}
        <div class="absolute inset-0">
            <div class="absolute top-20 left-10 w-72 h-72 bg-blue-500 rounded-full mix-blend-multiply filter blur-xl opacity-70 animate-blob"></div>
            <div class="absolute top-40 right-10 w-72 h-72 bg-purple-500 rounded-full mix-blend-multiply filter blur-xl opacity-70 animate-blob animation-delay-2000"></div>
            <div class="absolute bottom-20 left-1/2 w-72 h-72 bg-pink-500 rounded-full mix-blend-multiply filter blur-xl opacity-70 animate-blob animation-delay-4000"></div>
        </div>

        <div class="relative z-10 max-w-7xl mx-auto px-4 py-20">
            <div class="grid lg:grid-cols-2 gap-12 items-center">
                {{-- Hero Content --}}
                <div class="text-white space-y-8">
                    <div class="space-y-4">
                        <h1 class="text-5xl lg:text-7xl font-bold leading-tight">
                            விடுதலைச்
                            <span class="block text-red-400">சிறுத்தைகள்</span>
                            கட்சி
                        </h1>
                        <p class="text-xl lg:text-2xl text-blue-100 leading-relaxed">
                            Empowering the Marginalized, Fighting for Justice, Building a Casteless Society
                        </p>
                    </div>

                    <div class="flex flex-col sm:flex-row gap-4">
                        <a href="{{ route('join') }}" class="bg-red-600 hover:bg-red-700 text-white px-8 py-4 rounded-full font-semibold text-lg transition-all duration-300 transform hover:scale-105 hover:shadow-2xl">
                            Join VCK Movement
                        </a>
                        <a href="{{ route('ideology') }}" class="border-2 border-white text-white hover:bg-white hover:text-blue-900 px-8 py-4 rounded-full font-semibold text-lg transition-all duration-300">
                            Our Ideology
                        </a>
                    </div>
                </div>

                {{-- Hero Visual --}}
                <div class="relative">
                    <div class="relative w-full h-96 lg:h-[500px] rounded-2xl overflow-hidden shadow-2xl">
                        <img src="{{ asset('assets/images/about/vck-about.webp') }}" alt="VCK Movement" class="w-full h-full object-cover">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/50 to-transparent"></div>
                    </div>

                    {{-- Floating Stats --}}
                    <div class="absolute -bottom-8 -left-8 bg-white rounded-xl shadow-xl p-6 animate-float">
                        <div class="text-center">
                            <div class="text-3xl font-bold text-blue-600">2015</div>
                            <div class="text-sm text-gray-600">Founded</div>
                        </div>
                    </div>

                    <div class="absolute -top-8 -right-8 bg-red-600 text-white rounded-xl shadow-xl p-6 animate-float animation-delay-1000">
                        <div class="text-center">
                            <div class="text-3xl font-bold">10M+</div>
                            <div class="text-sm">Followers</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Scroll Indicator --}}
        <div class="absolute bottom-8 left-1/2 transform -translate-x-1/2 animate-bounce">
            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3"></path>
            </svg>
        </div>
    </section>

    {{-- Featured Sections Grid --}}
    <section class="py-20 px-4 bg-gray-50">
        <div class="max-w-7xl mx-auto">
            <div class="text-center mb-16">
                <h2 class="text-4xl font-bold text-gray-900 mb-4">Explore VCK</h2>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">Discover our comprehensive platform dedicated to social justice, political transparency, and community empowerment</p>
            </div>

            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                {{-- Party Section --}}
                <div class="group bg-white rounded-2xl shadow-lg overflow-hidden hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2">
                    <div class="h-48 bg-gradient-to-br from-blue-600 to-blue-800 flex items-center justify-center">
                        <div class="text-center text-white">
                            <svg class="w-16 h-16 mx-auto mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21H5a2 2 0 01-2-2V7a2 2 0 012-2h14a2 2 0 012 2v12a2 2 0 01-2 2z"/>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 7h6m-6 4h6m-6 4h6"/>
                            </svg>
                            <h3 class="text-xl font-bold">Party</h3>
                        </div>
                    </div>
                    <div class="p-6">
                        <p class="text-gray-600 mb-4">Learn about our ideology, history, leadership, and organizational structure.</p>
                        <div class="space-y-2">
                            <a href="{{ route('ideology') }}" class="block text-blue-600 hover:text-blue-800 text-sm">• Ideology & Principles</a>
                            <a href="{{ route('history') }}" class="block text-blue-600 hover:text-blue-800 text-sm">• Our History</a>
                            <a href="{{ route('leadership') }}" class="block text-blue-600 hover:text-blue-800 text-sm">• Leadership</a>
                            <a href="{{ route('elected-members') }}" class="block text-blue-600 hover:text-blue-800 text-sm">• Elected Members</a>
                            <a href="{{ route('office-bearers') }}" class="block text-blue-600 hover:text-blue-800 text-sm">• Office Bearers</a>
                            <a href="{{ route('party-representatives') }}" class="block text-blue-600 hover:text-blue-800 text-sm">• Party Representatives</a>
                        </div>
                        <a href="{{ route('ideology') }}" class="inline-block mt-4 bg-blue-600 text-white px-6 py-2 rounded-full text-sm font-medium hover:bg-blue-700 transition-colors">
                            Explore Party
                        </a>
                    </div>
                </div>

                {{-- Media Section --}}
                <div class="group bg-white rounded-2xl shadow-lg overflow-hidden hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2">
                    <div class="h-48 bg-gradient-to-br from-green-600 to-green-800 flex items-center justify-center">
                        <div class="text-center text-white">
                            <svg class="w-16 h-16 mx-auto mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z"/>
                            </svg>
                            <h3 class="text-xl font-bold">Media</h3>
                        </div>
                    </div>
                    <div class="p-6">
                        <p class="text-gray-600 mb-4">Explore our photo gallery, videos, and exclusive interviews.</p>
                        <div class="space-y-2">
                            <a href="{{ route('gallery') }}" class="block text-green-600 hover:text-green-800 text-sm">• Photo Gallery</a>
                            <a href="{{ route('videos') }}" class="block text-green-600 hover:text-green-800 text-sm">• Videos</a>
                            <a href="{{ route('interviews') }}" class="block text-green-600 hover:text-green-800 text-sm">• Exclusive Interviews</a>
                        </div>
                        <a href="{{ route('gallery') }}" class="inline-block mt-4 bg-green-600 text-white px-6 py-2 rounded-full text-sm font-medium hover:bg-green-700 transition-colors">
                            View Media
                        </a>
                    </div>
                </div>

                {{-- News Section --}}
                <div class="group bg-white rounded-2xl shadow-lg overflow-hidden hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2">
                    <div class="h-48 bg-gradient-to-br from-purple-600 to-purple-800 flex items-center justify-center">
                        <div class="text-center text-white">
                            <svg class="w-16 h-16 mx-auto mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"/>
                            </svg>
                            <h3 class="text-xl font-bold">News</h3>
                        </div>
                    </div>
                    <div class="p-6">
                        <p class="text-gray-600 mb-4">Stay updated with latest news, press releases, and events.</p>
                        <div class="space-y-2">
                            <a href="{{ route('latest-news') }}" class="block text-purple-600 hover:text-purple-800 text-sm">• Latest News</a>
                            <a href="{{ route('press-releases') }}" class="block text-purple-600 hover:text-purple-800 text-sm">• Press Releases</a>
                            <a href="{{ route('events') }}" class="block text-purple-600 hover:text-purple-800 text-sm">• Events</a>
                            <a href="{{ route('kalaththil-siruthaigal') }}" class="block text-purple-600 hover:text-purple-800 text-sm">• Kalaththil Siruthaigal</a>
                        </div>
                        <a href="{{ route('latest-news') }}" class="inline-block mt-4 bg-purple-600 text-white px-6 py-2 rounded-full text-sm font-medium hover:bg-purple-700 transition-colors">
                            Read News
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Quick Actions Section --}}
    <section class="py-16 px-4 bg-white">
        <div class="max-w-7xl mx-auto">
            <div class="grid md:grid-cols-3 gap-8 text-center">
                <div class="p-8 rounded-xl border-2 border-blue-100 hover:border-blue-300 transition-colors">
                    <div class="w-16 h-16 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-8 h-8 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 5.636l-3.536 3.536m0 5.656l3.536 3.536M9.172 9.172L5.636 5.636m3.536 9.192L5.636 18.364M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-2">Join VCK</h3>
                    <p class="text-gray-600 mb-4">Become part of our movement for social justice and equality.</p>
                    <a href="{{ route('join') }}" class="bg-blue-600 text-white px-6 py-3 rounded-full font-medium hover:bg-blue-700 transition-colors">
                        Join Now
                    </a>
                </div>

                <div class="p-8 rounded-xl border-2 border-green-100 hover:border-green-300 transition-colors">
                    <div class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-8 h-8 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-2">Contact Us</h3>
                    <p class="text-gray-600 mb-4">Get in touch with our team for inquiries and support.</p>
                    <a href="{{ route('contact') }}" class="bg-green-600 text-white px-6 py-3 rounded-full font-medium hover:bg-green-700 transition-colors">
                        Contact Us
                    </a>
                </div>

                <div class="p-8 rounded-xl border-2 border-red-100 hover:border-red-300 transition-colors">
                    <div class="w-16 h-16 bg-red-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-8 h-8 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-2">Make Impact</h3>
                    <p class="text-gray-600 mb-4">Support our initiatives and help build a better society.</p>
                    <a href="{{ route('contact') }}" class="bg-red-600 text-white px-6 py-3 rounded-full font-medium hover:bg-red-700 transition-colors">
                        Donate
                    </a>
                </div>
            </div>
        </div>
    </section>

    {{-- Featured Content Preview --}}
    <section class="py-20 px-4 bg-gradient-to-r from-blue-50 to-indigo-50">
        <div class="max-w-7xl mx-auto">
            <div class="text-center mb-16">
                <h2 class="text-4xl font-bold text-gray-900 mb-4">Latest Updates</h2>
                <p class="text-xl text-gray-600">Stay informed with our recent activities and announcements</p>
            </div>

            <div class="grid lg:grid-cols-3 gap-8">
                {{-- Latest News Preview --}}
                <div class="bg-white rounded-xl shadow-lg overflow-hidden">
                    <div class="h-48 bg-gradient-to-br from-blue-500 to-blue-700 flex items-center justify-center">
                        <svg class="w-16 h-16 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"/>
                        </svg>
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-bold text-gray-900 mb-2">Latest News</h3>
                        <p class="text-gray-600 mb-4">Stay updated with the latest developments and announcements from VCK.</p>
                        <a href="{{ route('latest-news') }}" class="text-blue-600 font-medium hover:text-blue-800">Read More →</a>
                    </div>
                </div>

                {{-- Events Preview --}}
                <div class="bg-white rounded-xl shadow-lg overflow-hidden">
                    <div class="h-48 bg-gradient-to-br from-green-500 to-green-700 flex items-center justify-center">
                        <svg class="w-16 h-16 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                        </svg>
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-bold text-gray-900 mb-2">Upcoming Events</h3>
                        <p class="text-gray-600 mb-4">Join us in our upcoming events and community gatherings.</p>
                        <a href="{{ route('events') }}" class="text-green-600 font-medium hover:text-green-800">View Events →</a>
                    </div>
                </div>

                {{-- Gallery Preview --}}
                <div class="bg-white rounded-xl shadow-lg overflow-hidden">
                    <div class="h-48 bg-gradient-to-br from-purple-500 to-purple-700 flex items-center justify-center">
                        <svg class="w-16 h-16 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                        </svg>
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-bold text-gray-900 mb-2">Photo Gallery</h3>
                        <p class="text-gray-600 mb-4">Explore our collection of images from events and activities.</p>
                        <a href="{{ route('gallery') }}" class="text-purple-600 font-medium hover:text-purple-800">View Gallery →</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Social Media Section --}}
    <section class="py-16 px-4 bg-red-600">
        <div class="max-w-4xl mx-auto text-center">
            <h2 class="text-2xl font-bold text-white mb-4">{{ __('site.contact.follow_social') }}</h2>
            <p class="text-red-100 mb-8">{{ __('site.contact.stay_connected') }}</p>
            <div class="flex justify-center space-x-6">
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
@endsection

@push('styles')
<style>
    .animate-blob {
        animation: blob 7s infinite;
    }

    .animation-delay-2000 {
        animation-delay: 2s;
    }

    .animation-delay-4000 {
        animation-delay: 4s;
    }

    @keyframes blob {
        0% {
            transform: translate(0px, 0px) scale(1);
        }
        33% {
            transform: translate(30px, -50px) scale(1.1);
        }
        66% {
            transform: translate(-20px, 20px) scale(0.9);
        }
        100% {
            transform: translate(0px, 0px) scale(1);
        }
    }

    .animate-float {
        animation: float 6s ease-in-out infinite;
    }

    .animation-delay-1000 {
        animation-delay: 1s;
    }

    @keyframes float {
        0%, 100% {
            transform: translateY(0px);
        }
        50% {
            transform: translateY(-20px);
        }
    }
</style>
@endpush