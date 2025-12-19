@extends('layouts.app')

@section('title', 'Order Book - ' . $book->title)

@section('content')
@php
use Illuminate\Support\Facades\Storage;
@endphp

{{-- Page Header --}}
<x-page-header-simple
    :title="'Order: ' . $book->title"
    :subtitle="'Complete your order to purchase this book'"
/>

{{-- Order Form --}}
<section class="py-20 lg:py-28 px-4 bg-gray-50 dark:bg-gray-900">
    <div class="max-w-4xl mx-auto">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            {{-- Book Summary --}}
            <div class="lg:col-span-1">
                <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-lg p-6 sticky top-4">
                    <div class="mb-4">
                        @if($book->cover_image_url)
                            <img src="{{ $book->cover_image_url }}" alt="{{ $book->title }}" class="w-full rounded-lg mb-4">
                        @endif
                        <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-2">{{ $book->title }}</h3>
                        @if($book->author)
                            <p class="text-sm text-gray-600 dark:text-gray-400 mb-4">by {{ $book->author }}</p>
                        @endif
                    </div>
                    <div class="border-t pt-4">
                        <div class="flex justify-between items-center mb-2">
                            <span class="text-gray-600 dark:text-gray-400">Price:</span>
                            <span class="text-2xl font-bold text-gray-900 dark:text-white">₹{{ number_format($book->price, 2) }}</span>
                        </div>
                        <div class="flex justify-between items-center mb-4">
                            <span class="text-gray-600 dark:text-gray-400">Quantity:</span>
                            <span class="text-lg font-semibold text-gray-900 dark:text-white" id="quantity-display">1</span>
                        </div>
                        <div class="border-t pt-4">
                            <div class="flex justify-between items-center">
                                <span class="text-lg font-semibold text-gray-900 dark:text-white">Total:</span>
                                <span class="text-2xl font-bold text-amber-600 dark:text-amber-400" id="total-amount">₹{{ number_format($book->price, 2) }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Order Form --}}
            <div class="lg:col-span-2">
                <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-lg p-8">
                    <h2 class="text-2xl font-bold text-gray-900 dark:text-white mb-6">Shipping Information</h2>
                    
                    <form id="book-order-form">
                        @csrf
                        <input type="hidden" name="book_id" value="{{ $book->id }}">
                        <input type="hidden" name="quantity" id="quantity-input" value="1">

                        {{-- Quantity Selector --}}
                        <div class="mb-6">
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Quantity</label>
                            <select id="quantity-select" class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-amber-500 focus:border-transparent dark:bg-gray-700 dark:text-white">
                                @for($i = 1; $i <= min(10, $book->stock); $i++)
                                    <option value="{{ $i }}">{{ $i }}</option>
                                @endfor
                            </select>
                        </div>

                        {{-- Customer Name --}}
                        <div class="mb-6">
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Full Name <span class="text-red-500">*</span></label>
                            <input type="text" name="customer_name" required class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-amber-500 focus:border-transparent dark:bg-gray-700 dark:text-white" placeholder="Enter your full name">
                        </div>

                        {{-- Email and Phone --}}
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Email <span class="text-red-500">*</span></label>
                                <input type="email" name="customer_email" required class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-amber-500 focus:border-transparent dark:bg-gray-700 dark:text-white" placeholder="your@email.com">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Phone <span class="text-red-500">*</span></label>
                                <input type="tel" name="customer_phone" required class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-amber-500 focus:border-transparent dark:bg-gray-700 dark:text-white" placeholder="+91 1234567890">
                            </div>
                        </div>

                        {{-- Shipping Address --}}
                        <div class="mb-6">
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Shipping Address <span class="text-red-500">*</span></label>
                            <textarea name="shipping_address" required rows="3" class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-amber-500 focus:border-transparent dark:bg-gray-700 dark:text-white" placeholder="Enter your complete address"></textarea>
                        </div>

                        {{-- City, State, Pincode --}}
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">City <span class="text-red-500">*</span></label>
                                <input type="text" name="city" required class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-amber-500 focus:border-transparent dark:bg-gray-700 dark:text-white" placeholder="City">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">State <span class="text-red-500">*</span></label>
                                <input type="text" name="state" required class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-amber-500 focus:border-transparent dark:bg-gray-700 dark:text-white" placeholder="State">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Pincode <span class="text-red-500">*</span></label>
                                <input type="text" name="pincode" required class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-amber-500 focus:border-transparent dark:bg-gray-700 dark:text-white" placeholder="123456">
                            </div>
                        </div>

                        {{-- Submit Button --}}
                        <div class="mt-8">
                            <button type="submit" id="pay-btn" class="w-full bg-gradient-to-r from-blue-600 to-blue-700 text-white px-8 py-4 rounded-xl font-semibold text-lg transition-all duration-300 transform hover:scale-105 shadow-lg hover:shadow-2xl">
                                <span id="submit-text">Proceed to Payment</span>
                                <span id="loading-text" class="hidden">Processing...</span>
                            </button>
                        </div>

                        <div id="ajax-message" class="mt-4 hidden"></div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('book-order-form');
    const payBtn = document.getElementById('pay-btn');
    const submitText = document.getElementById('submit-text');
    const loadingText = document.getElementById('loading-text');
    const ajaxMessage = document.getElementById('ajax-message');
    const quantitySelect = document.getElementById('quantity-select');
    const quantityInput = document.getElementById('quantity-input');
    const quantityDisplay = document.getElementById('quantity-display');
    const totalAmount = document.getElementById('total-amount');
    const bookPrice = {{ $book->price }};

    // Update quantity and total
    quantitySelect.addEventListener('change', function() {
        const qty = parseInt(this.value);
        quantityInput.value = qty;
        quantityDisplay.textContent = qty;
        const total = bookPrice * qty;
        totalAmount.textContent = '₹' + total.toFixed(2);
    });

    function showAjaxMessage(message, isSuccess) {
        ajaxMessage.textContent = message;
        ajaxMessage.className = 'mt-4 p-4 rounded-lg ' + (isSuccess ? 'bg-green-100 text-green-700' : 'bg-red-100 text-red-700');
        ajaxMessage.classList.remove('hidden');
        setTimeout(() => {
            ajaxMessage.classList.add('hidden');
        }, 5000);
    }

    form.addEventListener('submit', function(e) {
        e.preventDefault();

        const formData = new FormData(form);
        const data = Object.fromEntries(formData);

        // Show loading state
        payBtn.disabled = true;
        submitText.classList.add('hidden');
        loadingText.classList.remove('hidden');
        ajaxMessage.classList.add('hidden');

        // Send data to create order
        fetch('{{ route("book-orders.store") }}', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                'Accept': 'application/json'
            },
            body: JSON.stringify(data)
        })
        .then(response => response.json().then(body => ({ status: response.status, body: body })))
        .then(({ status, body }) => {
            if (status === 200 || status === 201) {
                const order = body;
                const options = {
                    key: '{{ env("RAZORPAY_KEY") }}',
                    amount: order.amount,
                    currency: order.currency,
                    order_id: order.order_id,
                    name: 'VCK - Book Order',
                    description: 'Order for {{ $book->title }}',
                    handler: function (response) {
                        // Verify and save payment
                        fetch('{{ route("book-orders.verify") }}', {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                                'Accept': 'application/json'
                            },
                            body: JSON.stringify({
                                razorpay_order_id: response.razorpay_order_id,
                                razorpay_payment_id: response.razorpay_payment_id,
                                razorpay_signature: response.razorpay_signature
                            })
                        })
                        .then(res => res.json())
                        .then(result => {
                            if (result.success) {
                                window.location.href = '{{ route("book-orders.success") }}?order_id=' + result.order_id;
                            } else {
                                showAjaxMessage('Payment verification failed. Please contact support.', false);
                                payBtn.disabled = false;
                                submitText.classList.remove('hidden');
                                loadingText.classList.add('hidden');
                            }
                        });
                    },
                    modal: {
                        ondismiss: function() {
                            payBtn.disabled = false;
                            submitText.classList.remove('hidden');
                            loadingText.classList.add('hidden');
                        }
                    }
                };

                const razorpay = new Razorpay(options);
                razorpay.open();
            } else {
                showAjaxMessage(body.message || 'Failed to create order. Please try again.', false);
                payBtn.disabled = false;
                submitText.classList.remove('hidden');
                loadingText.classList.add('hidden');
            }
        })
        .catch(error => {
            showAjaxMessage('An error occurred. Please try again.', false);
            payBtn.disabled = false;
            submitText.classList.remove('hidden');
            loadingText.classList.add('hidden');
        });
    });
});
</script>
@endsection

