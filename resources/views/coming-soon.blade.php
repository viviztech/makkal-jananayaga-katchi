@extends('layouts.soon')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-blue-900 to-red-600 flex items-center justify-center">
    <div class="container mx-auto px-4 text-center text-white">
        <div class="max-w-4xl mx-auto">
            <!-- VCK Logo -->
            <div class="mb-8">
                <img src="{{ asset('assets/images/favicons/apple-touch-icon.png') }}" alt="VCK Logo" class="w-24 h-24 mx-auto mb-4">
                <h1 class="text-4xl text-blue-600 md:text-6xl font-bold mb-2">{{ __('site.title') }}</h1>
            </div>

            <!-- Coming Soon Text -->
            <h2 class="text-3xl md:text-5xl text-red-600 font-bold mb-4">Launching Soon</h2>
            <p class="text-lg md:text-xl mb-8 text-blue-800 opacity-90">
                We're working hard to bring you something amazing. Stay tuned for updates!
            </p>

            <!-- Social Media Links -->
            <div class="flex justify-center mx-auto mb-8">
                <a href="https://www.facebook.com/people/Viduthalai-Chiruthaigal-katchi/61578689859070/" class="text-white hover:text-blue-300 transition-colors">
                    <img src="{{ asset('assets/images/social/facebook.png') }}" alt="Facebook" class="w-8 h-8">
                </a>
                <a href="https://www.instagram.com/vck_officiall/" class="text-white hover:text-pink-300 transition-colors">
                    <img src="{{ asset('assets/images/social/instagram.png') }}" alt="Instagram" class="w-8 h-8">
                </a>
                <a href="https://x.com/vck_officiall" class="text-white hover:text-gray-300 transition-colors">
                    <img src="{{ asset('assets/images/social/twitter.png') }}" alt="X" class="w-8 h-8">
                </a>
                <a href="https://www.threads.com/@vck_officiall" class="text-white hover:text-gray-300 transition-colors">
                    <img src="{{ asset('assets/images/social/threads.png') }}" alt="Threads" class="w-8 h-8">
                </a>
                <a href="https://www.youtube.com/@Vck_Youtube" class="text-white hover:text-red-300 transition-colors">
                    <img src="{{ asset('assets/images/social/youtube.png') }}" alt="YouTube" class="w-8 h-8">
                </a>
                <a href="https://wa.me/1234567890" class="text-white hover:text-green-300 transition-colors">
                    <img src="{{ asset('assets/images/social/whatsapp.png') }}" alt="WhatsApp" class="w-8 h-8">
                </a>
            </div>

            <!-- Email Signup Form (Optional) -->
            <div class="bg-white bg-opacity-10 rounded-lg p-6 max-w-md mx-auto">
                <p class="text-lg mb-4 text-blue-600">Get notified when we launch:</p>
                <form class="flex flex-col md:flex-row gap-4">
                    <input type="email" placeholder="Enter your email" class="flex-1 px-4 py-2 rounded-lg text-gray-900" required>
                    <button type="submit" class="bg-red-600 hover:bg-red-700 px-6 py-2 rounded-lg font-bold transition-colors">
                        Notify Me
                    </button>
                </form>
            </div>

            <!-- Back to Home Link -->
            <!-- <div class="mt-8">
                <a href="{{ route('home') }}" class="inline-flex items-center text-white hover:text-blue-300 transition-colors">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                    </svg>
                    Back to Home
                </a>
            </div> -->
        </div>
    </div>
</div>
@endsection