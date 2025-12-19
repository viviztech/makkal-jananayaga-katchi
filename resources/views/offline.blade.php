@extends('layouts.app')

@section('title', 'Offline - VCK')

@section('content')
    <section class="min-h-screen flex items-center justify-center bg-gray-50 px-4">
        <div class="max-w-md w-full bg-white rounded-lg shadow-lg p-8 text-center">
            <div class="mb-6">
                <svg class="w-20 h-20 text-gray-400 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 5.636l-3.536 3.536m0 5.656l3.536 3.536M9.172 9.172L5.636 5.636m3.536 9.192L5.636 18.364M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
                <h1 class="text-2xl font-bold text-gray-900 mb-2">You're Offline</h1>
                <p class="text-gray-600 mb-6">It looks like you're not connected to the internet. Some features may not be available.</p>
            </div>

            <div class="space-y-4">
                <button onclick="window.location.reload()" class="w-full bg-blue-600 text-white py-3 px-6 rounded-lg font-medium hover:bg-blue-700 transition-colors">
                    Try Again
                </button>

                <div class="text-sm text-gray-500">
                    <p>You can still browse cached content while offline.</p>
                </div>
            </div>
        </div>
    </section>

    <script>
        // Check network status and redirect when back online
        function checkOnline() {
            if (navigator.onLine) {
                window.location.href = '/';
            }
        }

        // Check every 5 seconds when offline
        if (!navigator.onLine) {
            setInterval(checkOnline, 5000);
        }

        // Listen for online event
        window.addEventListener('online', function() {
            window.location.href = '/';
        });
    </script>
@endsection