@extends('layouts.app')

@section('title', __('site.donation.title'))

@section('content')

      {{-- Page Header --}}
    <section class="relative bg-gray-900 dark:bg-gray-950 py-24 md:py-32">
        <div class="relative max-w-7xl mx-auto px-4 text-center">
        <h1 class="text-4xl md:text-6xl font-extrabold text-white mb-4">{{ __('site.donation.title') }}</h1>
            <p class="text-xl text-gray-300 max-w-3xl mx-auto">{{ __('site.donation.description') }}</p>
        </div>
    </section>

    {{-- Main Content --}}
    <section class="py-16 lg:py-24 px-4 bg-gray-50 dark:bg-gray-900">
        <div class="max-w-7xl mx-auto">

            {{-- Message Container --}}
            <div class="mb-8 space-y-4">
                {{-- Session Success Message --}}
                @if(session('success'))
                    <div class="p-4 flex items-start bg-green-50 dark:bg-green-900/30 border border-green-200 dark:border-green-800 text-green-700 dark:text-green-300 rounded-xl">
                        <svg class="w-5 h-5 mr-3 flex-shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>
                        <span>{{ session('success') }}</span>
                    </div>
                @endif

                {{-- Session Error Message --}}
                @if(session('error'))
                    <div class="p-4 flex items-start bg-red-50 dark:bg-red-900/30 border border-red-200 dark:border-red-800 text-red-700 dark:text-red-300 rounded-xl">
                        <svg class="w-5 h-5 mr-3 flex-shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-13a1 1 0 10-2 0v5a1 1 0 102 0V5zm-1 9a1 1 0 100-2 1 1 0 000 2z" clip-rule="evenodd"></path></svg>
                        <span>{{ session('error') }}</span>
                    </div>
                @endif

                {{-- AJAX Response Placeholder --}}
                <div id="ajaxMessage" class="hidden p-4 rounded-xl items-start"></div>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                {{-- Donation Form Container --}}
                <div class="lg:col-span-2 bg-white dark:bg-gray-800 rounded-2xl shadow-xl p-8 lg:p-12">
                    <div class="mb-10">
                        <h2 class="text-3xl lg:text-4xl font-bold text-gray-900 dark:text-white mb-3">{{ __('site.donation.make_donation') }}</h2>
                        <p class="text-gray-600 dark:text-gray-400 text-lg">{{ __('site.donation.form_description') }}</p>
                    </div>

                    <form id="donationForm" class="space-y-6">
                        @csrf

                        {{-- Personal Information Section --}}
                        <div class="border-b border-gray-200 dark:border-gray-700 pb-6">
                            <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-4">{{ __('site.donation.personal_info') }}</h3>

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                {{-- Name --}}
                                <div>
                                    <label for="name" class="block text-base font-medium text-gray-700 dark:text-gray-300 mb-2">{{ __('site.donation.name') }} <span class="text-red-500">*</span></label>
                                    <input type="text" id="name" name="name" class="w-full px-4 py-3 bg-gray-50 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-xl focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-red-500 transition duration-200 text-gray-900 dark:text-white placeholder-gray-400 dark:placeholder-gray-500" required>
                                </div>

                                {{-- Email --}}
                                <div>
                                    <label for="email" class="block text-base font-medium text-gray-700 dark:text-gray-300 mb-2">{{ __('site.donation.email') }} <span class="text-red-500">*</span></label>
                                    <input type="email" id="email" name="email" class="w-full px-4 py-3 bg-gray-50 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-xl focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-red-500 transition duration-200 text-gray-900 dark:text-white placeholder-gray-400 dark:placeholder-gray-500" required>
                                </div>

                                {{-- Phone --}}
                                <div>
                                    <label for="phone" class="block text-base font-medium text-gray-700 dark:text-gray-300 mb-2">{{ __('site.donation.phone') }} <span class="text-red-500">*</span></label>
                                    <input type="tel" id="phone" name="phone" class="w-full px-4 py-3 bg-gray-50 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-xl focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-red-500 transition duration-200 text-gray-900 dark:text-white placeholder-gray-400 dark:placeholder-gray-500" required>
                                </div>

                                {{-- Member ID --}}
                                <div>
                                    <label for="member_id" class="block text-base font-medium text-gray-700 dark:text-gray-300 mb-2">{{ __('site.donation.member_id') }} <span class="text-gray-500 text-sm">{{ __('site.donation.optional') }}</span></label>
                                    <input type="text" id="member_id" name="member_id" class="w-full px-4 py-3 bg-gray-50 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-xl focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-red-500 transition duration-200 text-gray-900 dark:text-white placeholder-gray-400 dark:placeholder-gray-500">
                                </div>
                            </div>
                        </div>

                        {{-- Address Section --}}
                        <div class="border-b border-gray-200 dark:border-gray-700 pb-6">
                            <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-4">{{ __('site.donation.address_details') }}</h3>

                            <div class="space-y-6">
                                {{-- Address --}}
                                <div>
                                    <label for="address" class="block text-base font-medium text-gray-700 dark:text-gray-300 mb-2">{{ __('site.donation.address') }}</label>
                                    <textarea id="address" name="address" rows="2" class="w-full px-4 py-3 bg-gray-50 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-xl focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-red-500 transition duration-200 resize-y text-gray-900 dark:text-white placeholder-gray-400 dark:placeholder-gray-500"></textarea>
                                </div>

                                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                                    {{-- City --}}
                                    <div>
                                        <label for="city" class="block text-base font-medium text-gray-700 dark:text-gray-300 mb-2">{{ __('site.donation.city') }}</label>
                                        <input type="text" id="city" name="city" class="w-full px-4 py-3 bg-gray-50 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-xl focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-red-500 transition duration-200 text-gray-900 dark:text-white placeholder-gray-400 dark:placeholder-gray-500">
                                    </div>

                                    {{-- State --}}
                                    <div>
                                        <label for="state" class="block text-base font-medium text-gray-700 dark:text-gray-300 mb-2">{{ __('site.donation.state') }}</label>
                                        <input type="text" id="state" name="state" class="w-full px-4 py-3 bg-gray-50 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-xl focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-red-500 transition duration-200 text-gray-900 dark:text-white placeholder-gray-400 dark:placeholder-gray-500">
                                    </div>

                                    {{-- Pincode --}}
                                    <div>
                                        <label for="pincode" class="block text-base font-medium text-gray-700 dark:text-gray-300 mb-2">{{ __('site.donation.pincode') }}</label>
                                        <input type="text" id="pincode" name="pincode" maxlength="6" class="w-full px-4 py-3 bg-gray-50 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-xl focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-red-500 transition duration-200 text-gray-900 dark:text-white placeholder-gray-400 dark:placeholder-gray-500">
                                    </div>
                                </div>

                                {{-- District --}}
                                <div>
                                    <label for="district_id" class="block text-base font-medium text-gray-700 dark:text-gray-300 mb-2">{{ __('site.donation.district') }}</label>
                                    <select id="district_id" name="district_id" class="w-full px-4 py-3 bg-gray-50 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-xl focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-red-500 transition duration-200 text-gray-900 dark:text-white">
                                        <option value="">{{ __('site.donation.select_district') }}</option>
                                        @foreach(\App\Models\District::orderBy('name_en')->get() as $district)
                                            <option value="{{ $district->id }}">{{ $district->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>

                        {{-- Donation Details Section --}}
                        <div class="pb-6">
                            <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-4">{{ __('site.donation.donation_details') }}</h3>

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                {{-- Amount --}}
                                <div>
                                    <label for="amount" class="block text-base font-medium text-gray-700 dark:text-gray-300 mb-2">{{ __('site.donation.amount') }} <span class="text-red-500">*</span></label>
                                    <input type="number" id="amount" name="amount" min="1" step="0.01" class="w-full px-4 py-3 bg-gray-50 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-xl focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-red-500 transition duration-200 text-gray-900 dark:text-white placeholder-gray-400 dark:placeholder-gray-500" required>
                                </div>

                                {{-- PAN Number --}}
                                <div>
                                    <label for="pan_number" class="block text-base font-medium text-gray-700 dark:text-gray-300 mb-2">{{ __('site.donation.pan_number') }} <span class="text-gray-500 text-sm">{{ __('site.donation.pan_help') }}</span></label>
                                    <input type="text" id="pan_number" name="pan_number" maxlength="10" placeholder="ABCDE1234F" class="w-full px-4 py-3 bg-gray-50 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-xl focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-red-500 transition duration-200 text-gray-900 dark:text-white placeholder-gray-400 dark:placeholder-gray-500 uppercase">
                                </div>
                            </div>
                        </div>

                        {{-- Submit Button --}}
                        <div class="pt-4">
                            <button type="submit" id="payBtn" class="w-full inline-flex items-center justify-center bg-red-600 text-white px-8 py-4 rounded-xl font-semibold text-lg hover:bg-red-700 dark:hover:bg-red-500 transform hover:scale-105 hover:shadow-xl transition-all duration-300 focus:outline-none focus:ring-4 focus:ring-red-500/50 disabled:opacity-50 disabled:cursor-not-allowed">
                                <span id="submitText" class="flex items-center">
                                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"/>
                                    </svg>
                                    {{ __('site.donation.donate_now') }}
                                </span>
                                <span id="loadingText" class="hidden items-center">
                                    <svg class="animate-spin -ml-1 mr-3 h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                                    </svg>
                                    {{ __('site.donation.processing') }}
                                </span>
                            </button>
                        </div>
                    </form>
                </div>

                {{-- Sidebar: QR Code and Description --}}
                <div class="lg:col-span-1 space-y-8">
                    {{-- QR Code Section --}}
                    <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-xl p-8 text-center">
                        <h3 class="text-2xl font-bold text-gray-900 dark:text-white mb-6">{{ __('site.donation.scan_to_donate') }}</h3>
                        <div class="space-y-6">
                            {{-- UPI QR Code --}}
                            <div class="space-y-3">
                                <h4 class="text-lg font-semibold text-gray-800 dark:text-white">{{ __('site.donation.upi') }}</h4>
                                <div class="p-4 rounded-lg border-2 border-gray-200 dark:border-gray-700 inline-block">
                                    <img src="{{ asset('assets/images/qr.jpeg') }}" alt="UPI QR Code" class="mx-auto w-48 h-48">
                                </div>
                                <p class="text-sm text-gray-600 dark:text-gray-400">{{ __('site.donation.scan_with_app') }}</p>
                            </div>
                        </div>
                    </div>

                    {{-- Donation Description --}}
                    <!-- <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-xl p-8">
                        <h3 class="text-2xl font-bold text-gray-900 dark:text-white mb-6">{{ __('site.donation.why_donate') }}</h3>
                        <div class="space-y-5 text-gray-700 dark:text-gray-300">
                            <ul class="space-y-3">
                                <li class="flex items-start">
                                    <svg class="w-6 h-6 text-red-600 mr-3 mt-1 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                    </svg>
                                    <span>{{ __('site.donation.support_educational') }}</span>
                                </li>
                                <li class="flex items-start">
                                    <svg class="w-6 h-6 text-red-600 mr-3 mt-1 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                    </svg>
                                    <span>{{ __('site.donation.fund_legal_aid') }}</span>
                                </li>
                                <li class="flex items-start">
                                    <svg class="w-6 h-6 text-red-600 mr-3 mt-1 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                    </svg>
                                    <span>{{ __('site.donation.strengthen_community') }}</span>
                                </li>
                                <li class="flex items-start">
                                    <svg class="w-6 h-6 text-red-600 mr-3 mt-1 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                    </svg>
                                    <span>{{ __('site.donation.promote_social_equality') }}</span>
                                </li>
                            </ul>

                            <div class="mt-8 p-4 bg-red-50 dark:bg-red-900/30 border-l-4 border-red-500 rounded-r-lg">
                                <p class="text-sm text-red-800 dark:text-red-200">
                                    <strong class="font-semibold">{{ __('site.donation.tax_benefit') }}</strong>
                                </p>
                            </div>
                        </div>
                    </div> -->
                </div>
            </div>
        </div>
    </section>
@endsection

@push('scripts')
<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<script>
    // Translation strings for JavaScript
    const translations = {
        paymentVerificationFailed: @json(__('site.donation.payment_verification_failed')),
        paymentCancelled: @json(__('site.donation.payment_cancelled')),
        paymentFailed: @json(__('site.donation.payment_failed')),
        validationErrors: @json(__('site.donation.validation_errors')),
        errorOccurred: @json(__('site.donation.error_occurred'))
    };

    document.addEventListener('DOMContentLoaded', function() {
        const form = document.getElementById('donationForm');
        const payBtn = document.getElementById('payBtn');
        const submitText = document.getElementById('submitText');
        const loadingText = document.getElementById('loadingText');
        const ajaxMessage = document.getElementById('ajaxMessage');

        // Function to show AJAX messages
        function showAjaxMessage(message, isSuccess) {
            ajaxMessage.innerHTML = '';
            ajaxMessage.className = 'hidden p-4 rounded-xl flex items-start';
            ajaxMessage.classList.remove('hidden');

            const iconSvg = isSuccess ?
                '<svg class="w-5 h-5 mr-3 flex-shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>' :
                '<svg class="w-5 h-5 mr-3 flex-shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-13a1 1 0 10-2 0v5a1 1 0 102 0V5zm-1 9a1 1 0 100-2 1 1 0 000 2z" clip-rule="evenodd"></path></svg>';

            if (isSuccess) {
                ajaxMessage.classList.add('bg-green-50', 'dark:bg-green-900/30', 'border', 'border-green-200', 'dark:border-green-800', 'text-green-700', 'dark:text-green-300');
                ajaxMessage.innerHTML = iconSvg + `<span>${message}</span>`;
            } else {
                ajaxMessage.classList.add('bg-red-50', 'dark:bg-red-900/30', 'border', 'border-red-200', 'dark:border-red-800', 'text-red-700', 'dark:text-red-300');
                ajaxMessage.innerHTML = iconSvg + `<div>${message}</div>`;
            }
            ajaxMessage.scrollIntoView({ behavior: 'smooth', block: 'center' });
        }

        form.addEventListener('submit', function(e) {
            e.preventDefault();

            const formData = new FormData(form);
            const data = Object.fromEntries(formData);

            // Show loading state
            payBtn.disabled = true;
            submitText.classList.add('hidden');
            loadingText.classList.remove('hidden');
            loadingText.style.display = 'flex';
            ajaxMessage.classList.add('hidden');

            // Send data to create order
            fetch('{{ route("donation.store") }}', {
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
                        name: 'VCK - Viduthalai Chiruthaigal Katchi',
                        description: 'Party Donation',
                        handler: function (response) {
                            // Verify and save payment
                            fetch('{{ route("donation.verify") }}', {
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
                                    window.location.href = '{{ route("donation.success") }}?donation_id=' + result.donation_id;
                                } else {
                                    showAjaxMessage(translations.paymentVerificationFailed, false);
                                }
                            });
                        },
                        modal: {
                            ondismiss: function(){
                                payBtn.disabled = false;
                                submitText.classList.remove('hidden');
                                loadingText.classList.add('hidden');
                                showAjaxMessage(translations.paymentCancelled, false);
                            }
                        },
                        prefill: {
                            name: data.name,
                            email: data.email,
                            contact: data.phone
                        },
                        notes: {
                            member_id: data.member_id || '',
                            district_id: data.district_id || ''
                        },
                        theme: {
                            color: '#dc2626'
                        }
                    };

                    const rzp = new Razorpay(options);

                    rzp.on('payment.failed', function (response){
                        console.error('Razorpay Payment Failed:', response.error);
                        showAjaxMessage(translations.paymentFailed + ': ' + response.error.description, false);
                        payBtn.disabled = false;
                        submitText.classList.remove('hidden');
                        loadingText.classList.add('hidden');
                    });

                    rzp.open();

                } else if (status === 422) {
                    let errorContent = '<strong>' + translations.validationErrors + '</strong><ul class="list-disc list-inside mt-1">';
                    for (let field in body.errors) {
                        body.errors[field].forEach(error => {
                            errorContent += `<li>${error}</li>`;
                        });
                    }
                    errorContent += '</ul>';
                    showAjaxMessage(errorContent, false);
                    payBtn.disabled = false;
                    submitText.classList.remove('hidden');
                    loadingText.classList.add('hidden');

                } else {
                    throw new Error(body.message || translations.paymentFailed);
                }
            })
            .catch(error => {
                console.error('Fetch Error:', error);
                showAjaxMessage(translations.errorOccurred + ' ' + error.message, false);
                payBtn.disabled = false;
                submitText.classList.remove('hidden');
                loadingText.classList.add('hidden');
            });
        });
    });
</script>
@endpush
