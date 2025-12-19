@extends('layouts.app')

@section('title', 'Donation Successful')

@section('content')
    {{-- Success Header --}}
    <section class="relative bg-gradient-to-br from-green-900 via-green-800 to-green-900 dark:from-gray-900 dark:via-gray-800 dark:to-gray-900 py-20 md:py-28 overflow-hidden">
        {{-- Background Pattern --}}
        <div class="absolute inset-0 opacity-10">
            <div class="absolute inset-0" style="background-image: radial-gradient(circle at 2px 2px, white 1px, transparent 0); background-size: 40px 40px;"></div>
        </div>

        <div class="relative max-w-7xl mx-auto px-4 text-center">
            {{-- Success Icon --}}
            <div class="inline-flex items-center justify-center w-24 h-24 mb-6 bg-white rounded-full">
                <svg class="w-16 h-16 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                </svg>
            </div>

            <h1 class="text-4xl md:text-5xl lg:text-6xl font-extrabold text-white mb-6 leading-tight">
                Payment Successful!
            </h1>
            <p class="text-lg md:text-xl text-green-100 dark:text-gray-300 max-w-3xl mx-auto leading-relaxed">
                Thank you for your generous donation to VCK. Your support helps us continue our mission.
            </p>
        </div>
    </section>

    {{-- Payment Details Section --}}
    <section class="py-16 lg:py-24 px-4 bg-gray-50 dark:bg-gray-900">
        <div class="max-w-4xl mx-auto">
            {{-- Success Message Card --}}
            <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-xl overflow-hidden mb-8">
                <div class="bg-gradient-to-r from-green-600 to-green-700 p-6 text-center">
                    <h2 class="text-3xl font-bold text-white">Transaction Completed</h2>
                    <p class="text-green-100 mt-2">Your donation has been successfully processed</p>
                </div>

                <div class="p-8 lg:p-12">
                    {{-- Transaction Details --}}
                    <div class="space-y-6">
                        <div class="border-b border-gray-200 dark:border-gray-700 pb-6">
                            <h3 class="text-2xl font-bold text-gray-900 dark:text-white mb-6">Payment Information</h3>

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                {{-- Transaction ID --}}
                                <div class="bg-gray-50 dark:bg-gray-700 rounded-xl p-4">
                                    <label class="block text-sm font-medium text-gray-600 dark:text-gray-400 mb-2">Transaction ID</label>
                                    <p class="text-lg font-semibold text-gray-900 dark:text-white break-all">{{ $donation->razorpay_payment_id }}</p>
                                </div>

                                {{-- Order ID --}}
                                <div class="bg-gray-50 dark:bg-gray-700 rounded-xl p-4">
                                    <label class="block text-sm font-medium text-gray-600 dark:text-gray-400 mb-2">Order ID</label>
                                    <p class="text-lg font-semibold text-gray-900 dark:text-white break-all">{{ $donation->razorpay_order_id }}</p>
                                </div>

                                {{-- Donation Amount --}}
                                <div class="bg-gray-50 dark:bg-gray-700 rounded-xl p-4">
                                    <label class="block text-sm font-medium text-gray-600 dark:text-gray-400 mb-2">Donation Amount</label>
                                    <p class="text-3xl font-bold text-green-600 dark:text-green-400">₹{{ number_format($donation->amount, 2) }}</p>
                                </div>

                                {{-- Date & Time --}}
                                <div class="bg-gray-50 dark:bg-gray-700 rounded-xl p-4">
                                    <label class="block text-sm font-medium text-gray-600 dark:text-gray-400 mb-2">Date & Time</label>
                                    <p class="text-lg font-semibold text-gray-900 dark:text-white">{{ $donation->updated_at->format('d M Y, h:i A') }}</p>
                                </div>
                            </div>
                        </div>

                        {{-- Donor Details --}}
                        <div class="border-b border-gray-200 dark:border-gray-700 pb-6">
                            <h3 class="text-2xl font-bold text-gray-900 dark:text-white mb-6">Donor Information</h3>

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                {{-- Name --}}
                                <div>
                                    <label class="block text-sm font-medium text-gray-600 dark:text-gray-400 mb-2">Name</label>
                                    <p class="text-lg text-gray-900 dark:text-white">{{ $donation->name }}</p>
                                </div>

                                {{-- Email --}}
                                <div>
                                    <label class="block text-sm font-medium text-gray-600 dark:text-gray-400 mb-2">Email</label>
                                    <p class="text-lg text-gray-900 dark:text-white break-all">{{ $donation->email }}</p>
                                </div>

                                {{-- Phone --}}
                                <div>
                                    <label class="block text-sm font-medium text-gray-600 dark:text-gray-400 mb-2">Phone</label>
                                    <p class="text-lg text-gray-900 dark:text-white">{{ $donation->phone }}</p>
                                </div>

                                {{-- Member ID --}}
                                @if($donation->member_id)
                                <div>
                                    <label class="block text-sm font-medium text-gray-600 dark:text-gray-400 mb-2">Member ID</label>
                                    <p class="text-lg text-gray-900 dark:text-white">{{ $donation->member_id }}</p>
                                </div>
                                @endif

                                {{-- District --}}
                                @if($donation->district)
                                <div>
                                    <label class="block text-sm font-medium text-gray-600 dark:text-gray-400 mb-2">District</label>
                                    <p class="text-lg text-gray-900 dark:text-white">{{ $donation->district->name }}</p>
                                </div>
                                @endif

                                {{-- PAN Number --}}
                                @if($donation->pan_number)
                                <div>
                                    <label class="block text-sm font-medium text-gray-600 dark:text-gray-400 mb-2">PAN Number</label>
                                    <p class="text-lg text-gray-900 dark:text-white font-mono">{{ $donation->pan_number }}</p>
                                </div>
                                @endif
                            </div>

                            {{-- Address if provided --}}
                            @if($donation->address)
                            <div class="mt-6">
                                <label class="block text-sm font-medium text-gray-600 dark:text-gray-400 mb-2">Address</label>
                                <p class="text-lg text-gray-900 dark:text-white">
                                    {{ $donation->address }}
                                    @if($donation->city || $donation->state || $donation->pincode)
                                        <br>
                                        {{ $donation->city ? $donation->city . ', ' : '' }}
                                        {{ $donation->state ? $donation->state . ' ' : '' }}
                                        {{ $donation->pincode ? '- ' . $donation->pincode : '' }}
                                    @endif
                                </p>
                            </div>
                            @endif
                        </div>

                        {{-- Important Information --}}
                        <div class="bg-blue-50 dark:bg-blue-900/30 border-l-4 border-blue-500 rounded-r-xl p-6">
                            <div class="flex items-start">
                                <svg class="w-6 h-6 text-blue-600 dark:text-blue-400 mr-3 mt-1 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path>
                                </svg>
                                <div class="text-blue-800 dark:text-blue-200">
                                    <h4 class="font-semibold mb-2">Important Information</h4>
                                    <ul class="space-y-1 text-sm">
                                        <li>A confirmation email has been sent to {{ $donation->email }}</li>
                                        <li>Please save this page or take a screenshot for your records</li>
                                        <li>For tax benefits, keep this transaction ID: <span class="font-mono font-semibold">{{ $donation->razorpay_payment_id }}</span></li>
                                        @if($donation->pan_number)
                                        <li>Tax exemption certificate will be sent to your email within 7 working days</li>
                                        @endif
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Action Buttons --}}
                    <div class="flex flex-col sm:flex-row gap-4 mt-8 pt-6 border-t border-gray-200 dark:border-gray-700">
                        <button onclick="window.print()" class="flex-1 inline-flex items-center justify-center bg-gray-600 text-white px-6 py-3 rounded-xl font-semibold hover:bg-gray-700 transition-all duration-300">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z"/>
                            </svg>
                            Print Receipt
                        </button>
                        <a href="{{ route('donation') }}" class="flex-1 inline-flex items-center justify-center bg-red-600 text-white px-6 py-3 rounded-xl font-semibold hover:bg-red-700 transition-all duration-300">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/>
                            </svg>
                            Donate Again
                        </a>
                        <a href="{{ route('home') }}" class="flex-1 inline-flex items-center justify-center bg-blue-600 text-white px-6 py-3 rounded-xl font-semibold hover:bg-blue-700 transition-all duration-300">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                            </svg>
                            Back to Home
                        </a>
                    </div>
                </div>
            </div>

            {{-- Thank You Message --}}
            <div class="bg-gradient-to-r from-red-600 to-red-700 rounded-2xl shadow-xl p-8 lg:p-12 text-center text-white">
                <h3 class="text-3xl font-bold mb-4">Thank You for Your Support!</h3>
                <p class="text-lg text-red-100 max-w-2xl mx-auto">
                    Your generous contribution helps us in our mission to work for social justice, equality, and the welfare of marginalized communities. Together, we can make a difference.
                </p>
            </div>
        </div>
    </section>
@endsection

@push('styles')
<style>
    @media print {
        .no-print {
            display: none !important;
        }
        body {
            background: white !important;
        }
    }
</style>
@endpush
