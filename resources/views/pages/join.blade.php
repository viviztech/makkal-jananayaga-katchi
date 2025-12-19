@extends('layouts.app')

@section('title', __('site.join.title'))

@section('content')

{{-- Campaign Hero Section --}}
<section class="bg-gradient-to-br from-[var(--color-vck-red)] via-[var(--color-vck-red)] to-[var(--color-vck-blue)] py-20">
    <div class="max-w-7xl mx-auto px-4 text-center" data-aos="fade-up">
        <h1 class="text-5xl md:text-6xl font-extrabold text-white mb-6">
            {{ __('site.join.title') }}
        </h1>
        <p class="text-xl md:text-2xl text-white/90 max-w-3xl mx-auto">
            {{ __('site.join.subtitle') }}
        </p>
    </div>
</section>

{{-- Benefits Section --}}
<section class="bg-gray-50 py-16">
    <div class="max-w-7xl mx-auto px-4">
        <h2 class="text-3xl md:text-4xl font-extrabold text-center mb-12 text-gray-900" data-aos="fade-up">
            {{ __('site.join.why_join') }}
        </h2>
        <div class="grid md:grid-cols-3 gap-8">
            <x-impact-card
                :title="__('site.join.benefit_1_title')"
                :description="__('site.join.benefit_1_desc')"
                color="primary"
                data-aos-delay="200"
            >
                <x-slot name="icon">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path>
                    </svg>
                </x-slot>
            </x-impact-card>

            <x-impact-card
                :title="__('site.join.benefit_2_title')"
                :description="__('site.join.benefit_2_desc')"
                color="secondary"
                data-aos-delay="300"
            >
                <x-slot name="icon">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                    </svg>
                </x-slot>
            </x-impact-card>

            <x-impact-card
                :title="__('site.join.benefit_3_title')"
                :description="__('site.join.benefit_3_desc')"
                color="success"
                data-aos-delay="400"
            >
                <x-slot name="icon">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                    </svg>
                </x-slot>
            </x-impact-card>
        </div>
    </div>
</section>

{{-- Join Form Section --}}
<section class="bg-white py-20">
    <div class="max-w-4xl mx-auto px-4">
        <div class="text-center mb-12" data-aos="fade-up">
            <h2 class="text-4xl md:text-5xl font-extrabold text-gray-900 mb-4">
                {{ __('site.join.form_title') }}
            </h2>
            <p class="text-xl text-gray-600">
                {{ __('site.join.form_description') }}
            </p>
        </div>

        {{-- Display Session Messages --}}
        @if(session('success'))
            <x-alert type="success" class="mb-8" data-aos="fade-down">
                {{ session('success') }}
            </x-alert>
        @endif
        @if(session('error'))
            <x-alert type="error" class="mb-8" data-aos="fade-down">
                {{ session('error') }}
            </x-alert>
        @endif

        <div class="card-campaign" data-aos="fade-up" data-aos-delay="200">
            <div class="p-8 lg:p-12">
                <form action="{{ route('join.store') }}" method="POST" enctype="multipart/form-data" class="space-y-10" id="joinForm">
                    @csrf

                    {{-- Honeypot & Timestamp --}}
                    <input type="text" name="website" id="website" style="position:absolute;left:-9999px;width:1px;height:1px;" tabindex="-1" autocomplete="off">
                    <input type="hidden" name="form_timestamp" value="{{ time() }}">

                    {{-- Personal Information Section --}}
                    <div class="border-b border-gray-200 pb-8">
                        <h3 class="text-2xl font-bold text-gray-900 mb-6 flex items-center">
                            <svg class="w-6 h-6 mr-3 text-[var(--color-vck-red)]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                            </svg>
                            {{ __('site.join.personal_info') }}
                        </h3>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <x-form-input
                                id="name"
                                name="name"
                                :label="__('site.join.name')"
                                type="text"
                                :value="old('name')"
                                required
                            />
                            <x-form-input
                                id="father_name"
                                name="father_name"
                                :label="__('site.join.father_name')"
                                type="text"
                                :value="old('father_name')"
                            />
                            <div>
                                <x-form-input
                                    id="phone_no"
                                    name="phone_no"
                                    :label="__('site.join.phone')"
                                    type="tel"
                                    :value="old('phone_no')"
                                    required
                                />
                                <button type="button" id="verifyPhoneBtn" class="mt-2 px-4 py-2 bg-[var(--color-vck-blue)] hover:bg-blue-700 text-white text-sm font-medium rounded-lg transition duration-200">
                                    <svg class="w-4 h-4 inline-block mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path></svg>
                                    Verify Mobile Number
                                </button>
                                <input type="hidden" id="phoneVerified" name="phone_verified" value="0">
                            </div>
                            <x-form-input
                                id="email_id"
                                name="email_id"
                                :label="__('site.join.email')"
                                type="email"
                                :value="old('email_id')"
                                required
                            />
                            <x-form-input
                                id="dob"
                                name="dob"
                                :label="__('site.join.dob')"
                                type="date"
                                :value="old('dob')"
                            />
                            <div>
                                <label for="gender" class="block text-base font-medium text-gray-700 mb-2">{{ __('site.join.gender') }}</label>
                                <select id="gender" name="gender" class="form-input-campaign">
                                    <option value="">{{ __('site.join.select_gender') }}</option>
                                    <option value="Male" {{ old('gender') == 'Male' ? 'selected' : '' }}>{{ __('site.join.male') }}</option>
                                    <option value="Female" {{ old('gender') == 'Female' ? 'selected' : '' }}>{{ __('site.join.female') }}</option>
                                    <option value="Other" {{ old('gender') == 'Other' ? 'selected' : '' }}>{{ __('site.join.other') }}</option>
                                </select>
                            </div>
                            <div>
                                <label for="blood_group" class="block text-base font-medium text-gray-700 mb-2">{{ __('site.join.blood_group') }}</label>
                                <select id="blood_group" name="blood_group" class="form-input-campaign">
                                    <option value="">{{ __('site.join.select_blood_group') }}</option>
                                    <option value="A+" {{ old('blood_group') == 'A+' ? 'selected' : '' }}>A+</option>
                                    <option value="A-" {{ old('blood_group') == 'A-' ? 'selected' : '' }}>A-</option>
                                    <option value="B+" {{ old('blood_group') == 'B+' ? 'selected' : '' }}>B+</option>
                                    <option value="B-" {{ old('blood_group') == 'B-' ? 'selected' : '' }}>B-</option>
                                    <option value="AB+" {{ old('blood_group') == 'AB+' ? 'selected' : '' }}>AB+</option>
                                    <option value="AB-" {{ old('blood_group') == 'AB-' ? 'selected' : '' }}>AB-</option>
                                    <option value="O+" {{ old('blood_group') == 'O+' ? 'selected' : '' }}>O+</option>
                                    <option value="O-" {{ old('blood_group') == 'O-' ? 'selected' : '' }}>O-</option>
                                </select>
                            </div>
                            <x-form-input
                                id="voterid"
                                name="voterid"
                                :label="__('site.join.voter_id')"
                                type="text"
                                :value="old('voterid')"
                                placeholder="e.g., ABC1234567"
                            />
                            <x-form-input
                                id="aadhar_no"
                                name="aadhar_no"
                                :label="__('site.join.aadhar_number')"
                                type="text"
                                :value="old('aadhar_no')"
                                placeholder="12 digit Aadhar number"
                                maxlength="12"
                            />
                        </div>
                    </div>

                    {{-- Address Information Section --}}
                    <div class="border-b border-gray-200 pb-8">
                        <h3 class="text-2xl font-bold text-gray-900 mb-6 flex items-center">
                            <svg class="w-6 h-6 mr-3 text-[var(--color-vck-red)]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path></svg>
                            {{ __('site.join.address_info') }}
                        </h3>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div class="md:col-span-2">
                                <x-form-textarea
                                    id="address"
                                    name="address"
                                    :label="__('site.join.address')"
                                    :value="old('address')"
                                    rows="3"
                                />
                            </div>
                            <x-form-input
                                id="pincode"
                                name="pincode"
                                :label="__('site.join.pincode')"
                                type="text"
                                :value="old('pincode')"
                                maxlength="6"
                                pattern="\d{6}"
                            />
                            <div>
                                <label for="photo" class="block text-base font-medium text-gray-700 mb-2">{{ __('site.join.photo') }}</label>
                                <input type="file" id="photo" name="photo" accept="image/*" class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-[var(--color-vck-red)]/10 file:text-[var(--color-vck-red)] hover:file:bg-[var(--color-vck-red)]/20 transition duration-200">
                                <p class="text-sm text-gray-500 mt-1">{{ __('site.join.photo_help') }}</p>
                            </div>
                        </div>
                    </div>

                    {{-- Location Information Section --}}
                    <div class="border-b border-gray-200 pb-8">
                        <h3 class="text-2xl font-bold text-gray-900 mb-6 flex items-center">
                            <svg class="w-6 h-6 mr-3 text-[var(--color-vck-red)]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                            </svg>
                            {{ __('site.join.location_info') }}
                        </h3>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label for="state_id" class="block text-base font-medium text-gray-700 mb-2">{{ __('site.join.state') }}</label>
                                <select id="state_id" name="state_id" class="form-input-campaign">
                                    <option value="">{{ __('site.join.select_state') }}</option>
                                    @foreach(\App\Models\State::all() as $state)
                                        <option value="{{ $state->id }}" {{ old('state_id') == $state->id ? 'selected' : '' }}>{{ $state->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div>
                                <label for="district_id" class="block text-base font-medium text-gray-700 mb-2">{{ __('site.join.district') }}</label>
                                <select id="district_id" name="district_id" class="form-input-campaign" disabled>
                                    <option value="">{{ __('site.join.select_district') }}</option>
                                </select>
                            </div>
                            <div>
                                <label for="assembly_id" class="block text-base font-medium text-gray-700 mb-2">{{ __('site.join.assembly') }}</label>
                                <select id="assembly_id" name="assembly_id" class="form-input-campaign" disabled>
                                    <option value="">{{ __('site.join.select_assembly') }}</option>
                                </select>
                            </div>
                            <div>
                                <label for="place_type" class="block text-base font-medium text-gray-700 mb-2">{{ __('site.join.place_type') }}</label>
                                <select id="place_type" name="place_type" class="form-input-campaign">
                                    <option value="">{{ __('site.join.select_place_type') }}</option>
                                    <option value="ஊராட்சி ஒன்றியம்" @if(old('place_type') == 'ஊராட்சி ஒன்றியம்') selected @endif>{{ __('site.join.block') }}</option>
                                    <option value="பேரூராட்சி" @if(old('place_type') == 'பேரூராட்சி') selected @endif>{{ __('site.join.perur') }}</option>
                                    <option value="நகராட்சி" @if(old('place_type') == 'நகராட்சி') selected @endif>{{ __('site.join.city') }}</option>
                                    <option value="மாநகராட்சி" @if(old('place_type') == 'மாநகராட்சி') selected @endif>{{ __('site.join.corporation') }}</option>
                                </select>
                            </div>
                            <div id="block_id_wrapper" style="display: none;">
                                <label for="block_id" class="block text-base font-medium text-gray-700 mb-2">{{ __('site.join.block') }}</label>
                                <select id="block_id" name="block_id" class="form-input-campaign" disabled>
                                    <option value="">{{ __('site.join.select_block') }}</option>
                                </select>
                            </div>
                            <div id="perur_id_wrapper" style="display: none;">
                                <label for="perur_id" class="block text-base font-medium text-gray-700 mb-2">{{ __('site.join.perur') }}</label>
                                <select id="perur_id" name="perur_id" class="form-input-campaign" disabled>
                                    <option value="">{{ __('site.join.select_perur') }}</option>
                                </select>
                            </div>
                            <div id="city_id_wrapper" style="display: none;">
                                <label for="city_id" class="block text-base font-medium text-gray-700 mb-2">{{ __('site.join.city') }}</label>
                                <select id="city_id" name="city_id" class="form-input-campaign" disabled>
                                    <option value="">{{ __('site.join.select_city') }}</option>
                                </select>
                            </div>
                            <div id="corporation_id_wrapper" style="display: none;">
                                <label for="corporation_id" class="block text-base font-medium text-gray-700 mb-2">{{ __('site.join.corporation') }}</label>
                                <select id="corporation_id" name="corporation_id" class="form-input-campaign" disabled>
                                    <option value="">{{ __('site.join.select_corporation') }}</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    {{-- Terms and Submit Section --}}
                    <div>
                        <h3 class="text-2xl font-bold text-gray-900 mb-6 flex items-center">
                            <svg class="w-6 h-6 mr-3 text-[var(--color-vck-red)]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                            {{ __('site.join.final_step') }}
                        </h3>
                        <div class="flex items-start mb-8">
                            <input id="terms" name="terms" type="checkbox" class="mt-1 h-5 w-5 text-[var(--color-vck-red)] focus:ring-[var(--color-vck-red)] border-gray-300 rounded" required>
                            <label for="terms" class="ml-3 text-base text-gray-700">
                                {{ __('site.join.terms_agreement') }} <span class="text-red-500">*</span>
                            </label>
                        </div>

                        <div class="text-center">
                            <button type="submit" class="btn-campaign btn-campaign-cta text-xl px-10">
                                <svg class="w-5 h-5 mr-2 inline-block" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"/>
                                </svg>
                                {{ __('site.join.submit_application') }}
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

{{-- Include OTP Modal --}}
@include('components.otp-modal')

@push('scripts')
{{-- Include OTP Verification JavaScript --}}
<script src="{{ asset('js/otp-verification.js') }}"></script>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const stateSelect = document.getElementById('state_id');
    const districtSelect = document.getElementById('district_id');
    const assemblySelect = document.getElementById('assembly_id');
    const placeTypeSelect = document.getElementById('place_type');

    const wrappers = {
        'ஊராட்சி ஒன்றியம்': document.getElementById('block_id_wrapper'),
        'பேரூராட்சி': document.getElementById('perur_id_wrapper'),
        'நகராட்சி': document.getElementById('city_id_wrapper'),
        'மாநகராட்சி': document.getElementById('corporation_id_wrapper'),
    };

    const selects = {
        'ஊராட்சி ஒன்றியம்': document.getElementById('block_id'),
        'பேரூராட்சி': document.getElementById('perur_id'),
        'நகராட்சி': document.getElementById('city_id'),
        'மாநகராட்சி': document.getElementById('corporation_id'),
    };

    const oldValues = {
        'ஊராட்சி ஒன்றியம்': '{{ old('block_id') }}',
        'பேரூராட்சி': '{{ old('perur_id') }}',
        'நகராட்சி': '{{ old('city_id') }}',
        'மாநகராட்சி': '{{ old('corporation_id') }}',
    };

    const currentLocale = '{{ app()->getLocale() }}';

    function populateOptions(select, data, placeholder, oldValue) {
        select.innerHTML = `<option value="">${placeholder}</option>`;
        if (data && Array.isArray(data)) {
            data.forEach(item => {
                const itemName = currentLocale === 'en' ? (item.name_en || item.name) : (item.name_ta || item.name);
                const selected = (item.id == oldValue) ? 'selected' : '';
                if (itemName) {
                    select.innerHTML += `<option value="${item.id}" ${selected}>${itemName}</option>`;
                }
            });
        }
        select.disabled = !(data && data.length > 0);
    }

    function populatePlace(placeType, districtId) {
        const select = selects[placeType];
        const wrapper = wrappers[placeType];
        const oldValue = oldValues[placeType];
        let url = '';
        let placeholder = '';

        if (!placeType || !districtId || !select || !wrapper) return;

        select.disabled = true;
        wrapper.style.display = 'block';

        switch (placeType) {
            case 'ஊராட்சி ஒன்றியம்':
                url = `/api/blocks/by-district/${districtId}`;
                placeholder = '{{ __("site.join.select_block") }}';
                break;
            case 'பேரூராட்சி':
                url = `/api/perurs/by-district/${districtId}`;
                placeholder = '{{ __("site.join.select_perur") }}';
                break;
            case 'நகராட்சி':
                url = `/api/cities/by-district/${districtId}`;
                placeholder = '{{ __("site.join.select_city") }}';
                break
            case 'மாநகராட்சி':
                url = `/api/corporations/by-district/${districtId}`;
                placeholder = '{{ __("site.join.select_corporation") }}';
                break;
        }

        if (url) {
            fetch(url)
                .then(response => response.ok ? response.json() : Promise.reject('Network response was not ok.'))
                .then(data => {
                    populateOptions(select, data, placeholder, oldValue);
                    if(oldValue && select.querySelector(`option[value="${oldValue}"]`)) {
                        select.value = oldValue;
                    }
                })
                .catch(error => {
                    console.error(`Error fetching ${placeType}:`, error);
                    populateOptions(select, [], placeholder, null);
                    wrapper.style.display = 'block';
                });
        } else {
            populateOptions(select, [], placeholder, null);
            wrapper.style.display = 'block';
        }
    }

    function handlePlaceTypeChange() {
        const placeType = placeTypeSelect.value;
        const districtId = districtSelect.value;

        for (const key in wrappers) {
            if (wrappers[key]) wrappers[key].style.display = 'none';
            if (selects[key]) {
                selects[key].innerHTML = `<option value="">Select...</option>`;
                selects[key].disabled = true;
            }
        }

        if (placeType && districtId && wrappers[placeType]) {
            populatePlace(placeType, districtId);
        }
    }

    function populateDistricts(stateId, callback) {
        const placeholder = '{{ __("site.join.select_district") }}';
        if (!stateId) {
            populateOptions(districtSelect, [], placeholder, null);
            populateOptions(assemblySelect, [], '{{ __("site.join.select_assembly") }}', null);
            handlePlaceTypeChange();
            if (callback) callback();
            return;
        }

        fetch(`/api/districts/${stateId}`)
            .then(response => response.ok ? response.json() : Promise.reject('Network response was not ok.'))
            .then(data => {
                const oldDistrictId = '{{ old('district_id') }}';
                populateOptions(districtSelect, data, placeholder, oldDistrictId);
                if (oldDistrictId && districtSelect.querySelector(`option[value="${oldDistrictId}"]`)) {
                    districtSelect.value = oldDistrictId;
                    setTimeout(() => {
                        districtSelect.dispatchEvent(new Event('change'));
                        if (callback) callback();
                    }, 50);
                } else {
                    populateOptions(assemblySelect, [], '{{ __("site.join.select_assembly") }}', null);
                    handlePlaceTypeChange();
                    if (callback) callback();
                }
            })
            .catch(error => {
                console.error('Error fetching districts:', error);
                populateOptions(districtSelect, [], placeholder, null);
                populateOptions(assemblySelect, [], '{{ __("site.join.select_assembly") }}', null);
                handlePlaceTypeChange();
                if (callback) callback();
            });
    }

    function populateAssemblies(districtId, callback) {
        const placeholder = '{{ __("site.join.select_assembly") }}';
        if (!districtId) {
            populateOptions(assemblySelect, [], placeholder, null);
            if (callback) callback();
            return;
        }

        fetch(`/api/assemblies/${districtId}`)
            .then(response => response.ok ? response.json() : Promise.reject('Network response was not ok.'))
            .then(data => {
                const oldAssemblyId = '{{ old('assembly_id') }}';
                populateOptions(assemblySelect, data, placeholder, oldAssemblyId);
                if(oldAssemblyId && assemblySelect.querySelector(`option[value="${oldAssemblyId}"]`)) {
                    assemblySelect.value = oldAssemblyId;
                }
                if (callback) callback();
            })
            .catch(error => {
                console.error('Error fetching assemblies:', error);
                populateOptions(assemblySelect, [], placeholder, null);
                if (callback) callback();
            });
    }

    stateSelect.addEventListener('change', function() {
        populateDistricts(this.value);
        populateOptions(assemblySelect, [], '{{ __("site.join.select_assembly") }}', null);
        handlePlaceTypeChange();
    });

    districtSelect.addEventListener('change', function() {
        populateAssemblies(this.value);
        handlePlaceTypeChange();
    });

    placeTypeSelect.addEventListener('change', handlePlaceTypeChange);

    const oldStateId = '{{ old('state_id') }}';
    const oldPlaceType = '{{ old('place_type') }}';

    if (oldStateId) {
        stateSelect.value = oldStateId;
        populateDistricts(oldStateId, () => {
            if (oldPlaceType) {
                placeTypeSelect.value = oldPlaceType;
                if (districtSelect.value) {
                    handlePlaceTypeChange();
                }
            }
        });
    } else {
        populateOptions(districtSelect, [], '{{ __("site.join.select_district") }}', null);
        populateOptions(assemblySelect, [], '{{ __("site.join.select_assembly") }}', null);
        handlePlaceTypeChange();
    }

    // OTP Verification Integration
    const verifyPhoneBtn = document.getElementById('verifyPhoneBtn');
    if (verifyPhoneBtn) {
        verifyPhoneBtn.addEventListener('click', function() {
            const phoneInput = document.getElementById('phone_no');
            const phoneNumber = phoneInput ? phoneInput.value.trim() : '';

            if (!phoneNumber) {
                alert('Please enter your mobile number first.');
                return;
            }

            if (!/^[6-9][0-9]{9}$/.test(phoneNumber)) {
                alert('Please enter a valid 10-digit Indian mobile number.');
                return;
            }

            if (typeof otpVerification !== 'undefined') {
                otpVerification.openModal(phoneNumber);
            } else {
                alert('OTP verification system is not loaded. Please refresh the page.');
            }
        });
    }

    window.addEventListener('otpVerified', function(e) {
        const phoneVerifiedInput = document.getElementById('phoneVerified');
        const verifyBtn = document.getElementById('verifyPhoneBtn');

        if (phoneVerifiedInput) {
            phoneVerifiedInput.value = '1';
        }

        if (verifyBtn) {
            verifyBtn.classList.remove('bg-[var(--color-vck-blue)]', 'hover:bg-blue-700');
            verifyBtn.classList.add('bg-green-600', 'cursor-not-allowed');
            verifyBtn.innerHTML = '<svg class="w-4 h-4 inline-block mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>Mobile Verified';
            verifyBtn.disabled = true;
        }
    });

    // Client-Side Validation
    const form = document.getElementById('joinForm');

    form.addEventListener('submit', function(e) {
        const phoneVerifiedInput = document.getElementById('phoneVerified');
        let phoneInput = document.getElementById('phone_no');

        if (!phoneVerifiedInput || phoneVerifiedInput.value !== '1') {
            e.preventDefault();
            alert('Please verify your mobile number before submitting the form.');
            if (phoneInput) phoneInput.focus();
            return false;
        }

        phoneInput = document.getElementById('phone_no');
        if (phoneInput && phoneInput.value) {
            const phonePattern = /^[6-9][0-9]{9}$/;
            const cleanPhone = phoneInput.value.replace(/[^0-9]/g, '');
            if (!phonePattern.test(cleanPhone)) {
                e.preventDefault();
                alert('Please enter a valid 10-digit Indian mobile number starting with 6-9');
                phoneInput.focus();
                return false;
            }
        }

        const aadharInput = document.getElementById('aadhar_no');
        if (aadharInput && aadharInput.value) {
            const aadharPattern = /^[2-9][0-9]{11}$/;
            const cleanAadhar = aadharInput.value.replace(/[^0-9]/g, '');
            if (!aadharPattern.test(cleanAadhar)) {
                e.preventDefault();
                alert('Please enter a valid 12-digit Aadhar number');
                aadharInput.focus();
                return false;
            }
        }

        const voterIdInput = document.getElementById('voterid');
        if (voterIdInput && voterIdInput.value) {
            const voterIdPattern = /^[A-Z]{3}[0-9]{7}$/;
            const cleanVoterId = voterIdInput.value.toUpperCase().replace(/\s/g, '');
            if (!voterIdPattern.test(cleanVoterId)) {
                e.preventDefault();
                alert('Please enter a valid Voter ID (3 letters followed by 7 digits, e.g., ABC1234567)');
                voterIdInput.focus();
                return false;
            }
        }

        const nameInput = document.getElementById('name');
        if (nameInput && nameInput.value) {
            const namePattern = /^[a-zA-Z\s\.]+$/;
            if (!namePattern.test(nameInput.value)) {
                e.preventDefault();
                alert('Name should only contain letters, spaces, and dots');
                nameInput.focus();
                return false;
            }
        }

        const submitBtn = form.querySelector('button[type="submit"]');
        if (submitBtn) {
            submitBtn.disabled = true;
            submitBtn.innerHTML = '<svg class="animate-spin h-5 w-5 mr-2 inline-block" fill="none" stroke="currentColor" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path></svg> Submitting...';
        }
    });

    if (window.history.replaceState) {
        window.history.replaceState(null, null, window.location.href);
    }
});
</script>
@endpush

@endsection
