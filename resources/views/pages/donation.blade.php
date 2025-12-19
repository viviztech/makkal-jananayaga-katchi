@extends('layouts.app')

@section('title', __('site.donation.title'))

@section('content')

{{-- Campaign Hero Section --}}
<section class="bg-gradient-to-br from-[var(--color-mjk-red)] via-[var(--color-mjk-red)] to-[var(--color-mjk-blue)] py-20">
    <div class="max-w-7xl mx-auto px-4 text-center" data-aos="fade-up">
        <h1 class="text-5xl md:text-6xl font-extrabold text-white mb-6">
            {{ __('site.donation.title') }}
        </h1>
        <p class="text-xl md:text-2xl text-white/90 max-w-3xl mx-auto">
            {{ __('site.donation.description') }}
        </p>
    </div>
</section>

{{-- Impact Section --}}
<section class="bg-gray-50 py-16">
    <div class="max-w-7xl mx-auto px-4">
        <h2 class="text-3xl md:text-4xl font-extrabold text-center mb-12 text-gray-900" data-aos="fade-up">
            {{ __('site.donation.why_donate') }}
        </h2>
        <div class="grid md:grid-cols-3 gap-8">
            <x-impact-card
                :title="__('site.donation.impact_1_title')"
                :description="__('site.donation.support_educational')"
                color="primary"
                data-aos-delay="200"
            >
                <x-slot name="icon">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                    </svg>
                </x-slot>
            </x-impact-card>

            <x-impact-card
                :title="__('site.donation.impact_2_title')"
                :description="__('site.donation.fund_legal_aid')"
                color="secondary"
                data-aos-delay="300"
            >
                <x-slot name="icon">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 6l3 1m0 0l-3 9a5.002 5.002 0 006.001 0M6 7l3 9M6 7l6-2m6 2l3-1m-3 1l-3 9a5.002 5.002 0 006.001 0M18 7l3 9m-3-9l-6-2m0-2v2m0 16V5m0 16H9m3 0h3"></path>
                    </svg>
                </x-slot>
            </x-impact-card>

            <x-impact-card
                :title="__('site.donation.impact_3_title')"
                :description="__('site.donation.strengthen_community')"
                color="success"
                data-aos-delay="400"
            >
                <x-slot name="icon">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                    </svg>
                </x-slot>
            </x-impact-card>
        </div>
    </div>
</section>

{{-- Main Donation Section --}}
<section class="bg-white py-20">
    <div class="max-w-7xl mx-auto px-4">
        {{-- Message Container --}}
        <div class="mb-8 space-y-4 max-w-4xl mx-auto">
            @if(session('success'))
                <x-alert type="success" data-aos="fade-down">
                    {{ session('success') }}
                </x-alert>
            @endif
            @if(session('error'))
                <x-alert type="error" data-aos="fade-down">
                    {{ session('error') }}
                </x-alert>
            @endif
            <div id="ajaxMessage" class="hidden"></div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            {{-- Donation Form --}}
            <div class="lg:col-span-2">
                <div class="card-campaign" data-aos="fade-up">
                    <div class="p-8 lg:p-12">
                        <div class="text-center mb-10">
                            <h2 class="text-4xl md:text-5xl font-extrabold text-gray-900 mb-4">
                                {{ __('site.donation.make_donation') }}
                            </h2>
                            <p class="text-xl text-gray-600">
                                {{ __('site.donation.form_description') }}
                            </p>
                        </div>

                        <form id="donationForm" class="space-y-8">
                            @csrf

                            {{-- Personal Information --}}
                            <div class="border-b border-gray-200 pb-8">
                                <h3 class="text-2xl font-bold text-gray-900 mb-6 flex items-center">
                                    <svg class="w-6 h-6 mr-3 text-[var(--color-mjk-red)]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                                    </svg>
                                    {{ __('site.donation.personal_info') }}
                                </h3>
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                    <x-form-input
                                        id="name"
                                        name="name"
                                        :label="__('site.donation.name')"
                                        type="text"
                                        required
                                    />
                                    <x-form-input
                                        id="email"
                                        name="email"
                                        :label="__('site.donation.email')"
                                        type="email"
                                        required
                                    />
                                    <x-form-input
                                        id="phone"
                                        name="phone"
                                        :label="__('site.donation.phone')"
                                        type="tel"
                                        required
                                    />
                                    <x-form-input
                                        id="member_id"
                                        name="member_id"
                                        :label="__('site.donation.member_id') . ' (' . __('site.donation.optional') . ')'"
                                        type="text"
                                    />
                                </div>
                            </div>

                            {{-- Address Details --}}
                            <div class="border-b border-gray-200 pb-8">
                                <h3 class="text-2xl font-bold text-gray-900 mb-6 flex items-center">
                                    <svg class="w-6 h-6 mr-3 text-[var(--color-mjk-red)]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                                    </svg>
                                    {{ __('site.donation.address_details') }}
                                </h3>
                                <div class="space-y-6">
                                    <x-form-textarea
                                        id="address"
                                        name="address"
                                        :label="__('site.donation.address')"
                                        rows="2"
                                    />
                                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                                        <x-form-input
                                            id="city"
                                            name="city"
                                            :label="__('site.donation.city')"
                                            type="text"
                                        />
                                        <x-form-input
                                            id="state"
                                            name="state"
                                            :label="__('site.donation.state')"
                                            type="text"
                                        />
                                        <x-form-input
                                            id="pincode"
                                            name="pincode"
                                            :label="__('site.donation.pincode')"
                                            type="text"
                                            maxlength="6"
                                        />
                                    </div>
                                    <div>
                                        <label for="district_id" class="block text-base font-medium text-gray-700 mb-2">{{ __('site.donation.district') }}</label>
                                        <select id="district_id" name="district_id" class="form-input-campaign">
                                            <option value="">{{ __('site.donation.select_district') }}</option>
                                            @foreach(\App\Models\District::orderBy('name_en')->get() as $district)
                                                <option value="{{ $district->id }}">{{ $district->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>

                            {{-- Donation Details --}}
                            <div class="pb-8">
                                <h3 class="text-2xl font-bold text-gray-900 mb-6 flex items-center">
                                    <svg class="w-6 h-6 mr-3 text-[var(--color-mjk-red)]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                    {{ __('site.donation.donation_details') }}
                                </h3>
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                    <x-form-input
                                        id="amount"
                                        name="amount"
                                        :label="__('site.donation.amount')"
                                        type="number"
                                        min="1"
                                        step="0.01"
                                        required
                                    />
                                    <x-form-input
                                        id="pan_number"
                                        name="pan_number"
                                        :label="__('site.donation.pan_number') . ' (' . __('site.donation.pan_help') . ')'"
                                        type="text"
                                        maxlength="10"
                                        placeholder="ABCDE1234F"
                                    />
                                </div>
                            </div>

                            {{-- Submit Button --}}
                            <div class="text-center">
                                <button type="submit" id="payBtn" class="btn-campaign btn-campaign-cta text-xl px-10">
                                    <span id="submitText" class="flex items-center justify-center">
                                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"/>
                                        </svg>
                                        {{ __('site.donation.donate_now') }}
                                    </span>
                                    <span id="loadingText" class="hidden items-center justify-center">
                                        <svg class="animate-spin h-5 w-5 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                                        </svg>
                                        {{ __('site.donation.processing') }}
                                    </span>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            {{-- Sidebar: QR Code --}}
            <div class="lg:col-span-1">
                <div class="card-campaign sticky top-24" data-aos="fade-up" data-aos-delay="200">
                    <div class="p-8 text-center">
                        <h3 class="text-2xl font-bold text-gray-900 mb-6">
                            {{ __('site.donation.scan_to_donate') }}
                        </h3>
                        <div class="space-y-6">
                            <div class="space-y-3">
                                <h4 class="text-lg font-semibold text-gray-800">{{ __('site.donation.upi') }}</h4>
                                <div class="p-4 rounded-lg border-2 border-gray-200 inline-block">
                                    <img src="{{ asset('assets/images/qr.jpeg') }}" alt="UPI QR Code" class="mx-auto w-48 h-48">
                                </div>
                                <p class="text-sm text-gray-600">{{ __('site.donation.scan_with_app') }}</p>
                            </div>
                        </div>

                        {{-- Tax Benefit Notice --}}
                        <div class="mt-8 p-4 bg-[var(--color-mjk-red)]/10 border-l-4 border-[var(--color-mjk-red)] rounded-r-lg text-left">
                            <p class="text-sm text-gray-800">
                                <strong class="font-semibold">{{ __('site.donation.tax_benefit') }}</strong>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection

@push('scripts')
<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<script>
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

    function showAjaxMessage(message, isSuccess) {
        ajaxMessage.innerHTML = '';
        ajaxMessage.className = 'hidden';
        ajaxMessage.classList.remove('hidden');

        const alertType = isSuccess ? 'success' : 'error';
        const alertHtml = `
            <div class="alert-campaign alert-campaign-${alertType}">
                ${message}
            </div>
        `;
        ajaxMessage.innerHTML = alertHtml;
        ajaxMessage.scrollIntoView({ behavior: 'smooth', block: 'center' });
    }

    form.addEventListener('submit', function(e) {
        e.preventDefault();

        const formData = new FormData(form);
        const data = Object.fromEntries(formData);

        payBtn.disabled = true;
        submitText.classList.add('hidden');
        loadingText.classList.remove('hidden');
        loadingText.style.display = 'flex';
        ajaxMessage.classList.add('hidden');

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
                    name: 'MJK - Makkal Jananayaga Katchi',
                    description: 'Party Donation',
                    handler: function (response) {
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
