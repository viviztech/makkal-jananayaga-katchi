@extends('layouts.app')

@section('title', __('site.applications.payment_title'))

@section('content')
    {{-- Page Header --}}
    <section class="relative bg-gray-900 dark:bg-gray-950 py-24 md:py-32">
        <div class="relative max-w-7xl mx-auto px-4 text-center">
            <h1 class="text-5xl md:text-6xl font-extrabold text-white mb-4">{{ __('site.applications.payment_title') }}</h1>
            <p class="text-xl text-gray-300 max-w-3xl mx-auto">{{ __('site.applications.payment_subtitle') }}</p>
        </div>
    </section>

    {{-- Payment Section --}}
    <section class="py-20 lg:py-28 px-4 bg-gray-100 dark:bg-gray-900">
        <div class="max-w-4xl mx-auto">
            <div class="bg-white dark:bg-gray-800 rounded-xl shadow-2xl p-8 lg:p-12">
                <div class="text-center mb-10">
                    <h2 class="text-3xl lg:text-4xl font-extrabold text-gray-900 dark:text-white mb-3">{{ __('site.applications.payment_form_title') }}</h2>
                    <p class="text-lg text-gray-600 dark:text-gray-400">{{ __('site.applications.payment_form_description') }}</p>
                </div>

                {{-- Application Summary --}}
                <div class="mb-10 p-6 bg-gray-50 dark:bg-gray-700 rounded-lg">
                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-4">{{ __('site.applications.application_summary') }}</h3>
                    <div class="space-y-3">
                        <div class="flex justify-between items-center">
                            <span class="text-gray-600 dark:text-gray-300">{{ __('site.applications.applicant_name') }}</span>
                            <span class="font-semibold text-gray-900 dark:text-white">{{ $application->name }}</span>
                        </div>
                        @if($application->post)
                        <div class="flex justify-between items-center">
                            <span class="text-gray-600 dark:text-gray-300">{{ __('site.applications.applied_post') }}</span>
                            <span class="font-semibold text-gray-900 dark:text-white">{{ app()->getLocale() === 'en' ? $application->post->name_en : $application->post->name_ta }}</span>
                        </div>
                        @endif
                        <div class="flex justify-between items-center pt-3 border-t border-gray-300 dark:border-gray-600">
                            <span class="text-lg font-semibold text-gray-900 dark:text-white">{{ __('site.applications.application_fee') }}</span>
                            <span class="text-2xl font-bold text-red-600">₹{{ number_format($application->application_fee, 2) }}</span>
                        </div>
                    </div>
                </div>

                {{-- Payment Form --}}
                <form action="{{ route('applications.process-payment', $application->id) }}" method="POST" class="space-y-8">
                    @csrf

                    <div>
                        <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-6">{{ __('site.applications.select_payment_method') }}</h3>

                        <div class="space-y-4">
                            {{-- Online Payment --}}
                            <div class="relative">
                                <input type="radio" id="payment_online" name="payment_method" value="online" class="peer sr-only" required>
                                <label for="payment_online" class="flex items-center p-5 bg-gray-50 dark:bg-gray-700 border-2 border-gray-300 dark:border-gray-600 rounded-lg cursor-pointer hover:bg-gray-100 dark:hover:bg-gray-600 peer-checked:border-red-600 peer-checked:bg-red-50 dark:peer-checked:bg-red-900/20 transition-all duration-200">
                                    <div class="flex items-center justify-between w-full">
                                        <div class="flex items-center">
                                            <svg class="w-8 h-8 mr-4 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"/>
                                            </svg>
                                            <div>
                                                <p class="text-lg font-semibold text-gray-900 dark:text-white">{{ __('site.applications.online_payment') }}</p>
                                                <p class="text-sm text-gray-600 dark:text-gray-400">{{ __('site.applications.online_payment_desc') }}</p>
                                            </div>
                                        </div>
                                        <div class="ml-4">
                                            <div class="w-6 h-6 border-2 border-gray-400 dark:border-gray-500 rounded-full peer-checked:border-red-600 peer-checked:bg-red-600 flex items-center justify-center">
                                                <div class="w-3 h-3 bg-white rounded-full hidden peer-checked:block"></div>
                                            </div>
                                        </div>
                                    </div>
                                </label>
                            </div>

                            {{-- UPI Payment --}}
                            <div class="relative">
                                <input type="radio" id="payment_upi" name="payment_method" value="upi" class="peer sr-only">
                                <label for="payment_upi" class="flex items-center p-5 bg-gray-50 dark:bg-gray-700 border-2 border-gray-300 dark:border-gray-600 rounded-lg cursor-pointer hover:bg-gray-100 dark:hover:bg-gray-600 peer-checked:border-red-600 peer-checked:bg-red-50 dark:peer-checked:bg-red-900/20 transition-all duration-200">
                                    <div class="flex items-center justify-between w-full">
                                        <div class="flex items-center">
                                            <svg class="w-8 h-8 mr-4 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z"/>
                                            </svg>
                                            <div>
                                                <p class="text-lg font-semibold text-gray-900 dark:text-white">{{ __('site.applications.upi_payment') }}</p>
                                                <p class="text-sm text-gray-600 dark:text-gray-400">{{ __('site.applications.upi_payment_desc') }}</p>
                                            </div>
                                        </div>
                                        <div class="ml-4">
                                            <div class="w-6 h-6 border-2 border-gray-400 dark:border-gray-500 rounded-full peer-checked:border-red-600 peer-checked:bg-red-600 flex items-center justify-center">
                                                <div class="w-3 h-3 bg-white rounded-full hidden peer-checked:block"></div>
                                            </div>
                                        </div>
                                    </div>
                                </label>
                            </div>

                            {{-- Offline Payment --}}
                            <div class="relative">
                                <input type="radio" id="payment_offline" name="payment_method" value="offline" class="peer sr-only">
                                <label for="payment_offline" class="flex items-center p-5 bg-gray-50 dark:bg-gray-700 border-2 border-gray-300 dark:border-gray-600 rounded-lg cursor-pointer hover:bg-gray-100 dark:hover:bg-gray-600 peer-checked:border-red-600 peer-checked:bg-red-50 dark:peer-checked:bg-red-900/20 transition-all duration-200">
                                    <div class="flex items-center justify-between w-full">
                                        <div class="flex items-center">
                                            <svg class="w-8 h-8 mr-4 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z"/>
                                            </svg>
                                            <div>
                                                <p class="text-lg font-semibold text-gray-900 dark:text-white">{{ __('site.applications.offline_payment') }}</p>
                                                <p class="text-sm text-gray-600 dark:text-gray-400">{{ __('site.applications.offline_payment_desc') }}</p>
                                            </div>
                                        </div>
                                        <div class="ml-4">
                                            <div class="w-6 h-6 border-2 border-gray-400 dark:border-gray-500 rounded-full peer-checked:border-red-600 peer-checked:bg-red-600 flex items-center justify-center">
                                                <div class="w-3 h-3 bg-white rounded-full hidden peer-checked:block"></div>
                                            </div>
                                        </div>
                                    </div>
                                </label>
                            </div>
                        </div>
                        @error('payment_method')
                            <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Transaction ID --}}
                    <div>
                        <label for="payment_transaction_id" class="block text-base font-medium text-gray-700 dark:text-gray-300 mb-2">
                            {{ __('site.applications.transaction_id') }}
                            <span class="text-sm text-gray-500 dark:text-gray-400">({{ __('site.applications.optional') }})</span>
                        </label>
                        <input type="text" id="payment_transaction_id" name="payment_transaction_id" value="{{ old('payment_transaction_id') }}" class="w-full px-4 py-3 bg-gray-50 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-lg focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-red-500 transition duration-200 text-gray-900 dark:text-white dark:placeholder-gray-400" placeholder="{{ __('site.applications.enter_transaction_id') }}">
                        <p class="text-sm text-gray-500 dark:text-gray-400 mt-2">{{ __('site.applications.transaction_id_help') }}</p>
                        @error('payment_transaction_id')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Submit Button --}}
                    <div class="flex flex-col sm:flex-row gap-4 justify-center pt-6">
                        <a href="{{ route('applications.preview', $application->id) }}" class="inline-flex items-center justify-center bg-gray-600 text-white px-8 py-3 rounded-lg font-semibold text-lg hover:bg-gray-700 transform hover:scale-105 hover:shadow-lg transition-all duration-300 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                            </svg>
                            {{ __('site.applications.back') }}
                        </a>
                        <button type="button" id="payNowBtn" class="inline-flex items-center justify-center bg-red-600 text-white px-8 py-3 rounded-lg font-semibold text-lg hover:bg-red-700 dark:hover:bg-red-500 transform hover:scale-105 hover:shadow-lg transition-all duration-300 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                            {{ __('site.applications.complete_payment') }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </section>

    @push('scripts')
    <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const paymentForm = document.querySelector('form');
            const payNowBtn = document.getElementById('payNowBtn');
            const paymentMethodInputs = document.querySelectorAll('input[name="payment_method"]');
            const transactionIdInput = document.getElementById('payment_transaction_id');

            payNowBtn.addEventListener('click', function(e) {
                e.preventDefault();

                // Get selected payment method
                let selectedMethod = null;
                paymentMethodInputs.forEach(input => {
                    if (input.checked) {
                        selectedMethod = input.value;
                    }
                });

                if (!selectedMethod) {
                    alert('{{ __('site.applications.select_payment_method_error') }}');
                    return;
                }

                // If online payment is selected, use Razorpay
                if (selectedMethod === 'online') {
                    initiateRazorpayPayment();
                } else {
                    // For UPI and offline, submit the form directly
                    paymentForm.submit();
                }
            });

            function initiateRazorpayPayment() {
                const amount = {{ $application->application_fee * 100 }}; // Amount in paise
                const applicationId = '{{ $application->id }}';
                const applicantName = '{{ $application->name }}';
                const applicantEmail = '{{ $application->email_id ?? '' }}';
                const applicantPhone = '{{ $application->mobile_number ?? '' }}';

                const options = {
                    key: '{{ config('razorpay.key') }}',
                    amount: amount,
                    currency: '{{ config('razorpay.currency') }}',
                    name: '{{ config('app.name') }}',
                    description: 'Application Fee Payment',
                    image: '{{ asset('assets/images/logo.png') }}',
                    order_id: '', // Will be created by backend if needed
                    handler: function(response) {
                        // Payment successful
                        transactionIdInput.value = response.razorpay_payment_id;

                        // Create a hidden input for razorpay signature
                        const signatureInput = document.createElement('input');
                        signatureInput.type = 'hidden';
                        signatureInput.name = 'razorpay_signature';
                        signatureInput.value = response.razorpay_signature || '';
                        paymentForm.appendChild(signatureInput);

                        // Create a hidden input for razorpay order id
                        if (response.razorpay_order_id) {
                            const orderInput = document.createElement('input');
                            orderInput.type = 'hidden';
                            orderInput.name = 'razorpay_order_id';
                            orderInput.value = response.razorpay_order_id;
                            paymentForm.appendChild(orderInput);
                        }

                        // Set payment method to online
                        document.getElementById('payment_online').checked = true;

                        // Submit the form
                        paymentForm.submit();
                    },
                    prefill: {
                        name: applicantName,
                        email: applicantEmail,
                        contact: applicantPhone
                    },
                    notes: {
                        application_id: applicationId
                    },
                    theme: {
                        color: '{{ config('razorpay.theme_color') }}'
                    },
                    modal: {
                        ondismiss: function() {
                            console.log('Payment cancelled by user');
                        }
                    }
                };

                const razorpay = new Razorpay(options);
                razorpay.on('payment.failed', function(response) {
                    alert('Payment failed: ' + response.error.description);
                    console.error('Payment Error:', response.error);
                });

                razorpay.open();
            }
        });
    </script>
    @endpush
@endsection
