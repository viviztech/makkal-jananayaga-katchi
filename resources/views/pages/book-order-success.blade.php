@extends('layouts.app')

@section('title', 'Order Successful')

@section('content')
<section class="py-20 lg:py-28 px-4 bg-gray-50 dark:bg-gray-900">
    <div class="max-w-2xl mx-auto">
        <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-lg p-8 text-center">
            {{-- Success Icon --}}
            <div class="w-20 h-20 mx-auto mb-6 bg-green-100 dark:bg-green-900/30 rounded-full flex items-center justify-center">
                <svg class="w-12 h-12 text-green-600 dark:text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                </svg>
            </div>

            <h1 class="text-3xl font-bold text-gray-900 dark:text-white mb-4">Order Successful!</h1>
            <p class="text-lg text-gray-600 dark:text-gray-400 mb-8">Thank you for your order. Your payment has been confirmed.</p>

            {{-- Order Details --}}
            @if($order)
            <div class="bg-gray-50 dark:bg-gray-700 rounded-lg p-6 mb-6 text-left">
                <h2 class="text-xl font-semibold text-gray-900 dark:text-white mb-4">Order Details</h2>
                <div class="space-y-2">
                    <div class="flex justify-between">
                        <span class="text-gray-600 dark:text-gray-400">Order Number:</span>
                        <span class="font-semibold text-gray-900 dark:text-white">{{ $order->order_number }}</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-gray-600 dark:text-gray-400">Book:</span>
                        <span class="font-semibold text-gray-900 dark:text-white">{{ $order->book->title }}</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-gray-600 dark:text-gray-400">Quantity:</span>
                        <span class="font-semibold text-gray-900 dark:text-white">{{ $order->quantity }}</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-gray-600 dark:text-gray-400">Total Amount:</span>
                        <span class="font-semibold text-amber-600 dark:text-amber-400">₹{{ number_format($order->total_amount, 2) }}</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-gray-600 dark:text-gray-400">Payment Status:</span>
                        <span class="px-3 py-1 rounded-full text-sm font-semibold bg-green-100 text-green-800 dark:bg-green-900/30 dark:text-green-400">
                            {{ ucfirst($order->payment_status) }}
                        </span>
                    </div>
                </div>
            </div>
            @endif

            {{-- Actions --}}
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="{{ route('books') }}" class="inline-block px-6 py-3 bg-amber-600 text-white rounded-lg hover:bg-amber-700 transition-colors">
                    Browse More Books
                </a>
                <a href="{{ route('home') }}" class="inline-block px-6 py-3 bg-gray-200 dark:bg-gray-700 text-gray-900 dark:text-white rounded-lg hover:bg-gray-300 dark:hover:bg-gray-600 transition-colors">
                    Go to Home
                </a>
            </div>
        </div>
    </div>
</section>
@endsection

