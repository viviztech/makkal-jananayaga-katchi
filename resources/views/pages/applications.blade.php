@extends('layouts.app')

@section('title', __('site.applications.title'))

@section('content')

{{-- Campaign Hero Section --}}
<section class="bg-gradient-to-br from-[var(--color-mjk-red)] via-[var(--color-mjk-red)] to-[var(--color-mjk-blue)] py-20">
    <div class="max-w-7xl mx-auto px-4 text-center" data-aos="fade-up">
        <h1 class="text-5xl md:text-6xl font-extrabold text-white mb-6">
            {{ __('site.applications.title') }}
        </h1>
        <p class="text-xl md:text-2xl text-white/90 max-w-3xl mx-auto">
            {{ __('site.applications.subtitle') }}
        </p>
    </div>
</section>

{{-- Application Form Section --}}
<section class="bg-gray-50 py-20">
    <div class="max-w-6xl mx-auto px-4">
        <div class="card-campaign" data-aos="fade-up">
            <div class="p-8 lg:p-12">
                <div class="text-center mb-10">
                    <h2 class="text-3xl lg:text-4xl font-extrabold text-gray-900 mb-3">
                        {{ __('site.applications.form_title') }}
                    </h2>
                    <p class="text-lg text-gray-600">
                        {{ __('site.applications.form_description') }}
                    </p>
                </div>

                {{-- Display Session Messages --}}
                @if(session('success'))
                    <x-alert type="success">
                        {{ session('success') }}
                    </x-alert>
                @endif
                @if(session('error'))
                    <x-alert type="error">
                        {{ session('error') }}
                    </x-alert>
                @endif

                <form action="{{ route('applications.store') }}" method="POST" enctype="multipart/form-data" class="space-y-10" id="applicationForm">
                    @csrf

                    {{-- Honeypot field --}}
                    <input type="text" name="website" id="website" style="position:absolute;left:-9999px;width:1px;height:1px;" tabindex="-1" autocomplete="off">
                    <input type="hidden" name="form_timestamp" value="{{ time() }}">

                    @php
                        $t = app()->getLocale() === 'ta';
                    @endphp

                    {{-- Personal Information Section --}}
                    <div class="border-b border-gray-200 pb-8">
                        <h3 class="text-2xl font-bold text-gray-900 mb-6 flex items-center">
                            <svg class="w-6 h-6 mr-3 text-[var(--color-mjk-red)]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                            </svg>
                            {{ __('site.applications.personal_info') }}
                        </h3>
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                            {{-- Name --}}
                            <x-form-input
                                name="name"
                                :label="__('site.applications.full_name')"
                                :placeholder="__('site.applications.full_name')"
                                required
                                :value="old('name')"
                            />

                            {{-- Membership ID --}}
                            <x-form-input
                                name="membership_id"
                                :label="$t ? 'உறுப்பினர் ஐடி' : 'Membership ID'"
                                :placeholder="$t ? 'விருப்பமானது' : 'Optional'"
                                :value="old('membership_id')"
                            />

                            {{-- Aadhar Number --}}
                            <x-form-input
                                name="aadhar_no"
                                :label="$t ? 'ஆதார் எண்' : 'Aadhar Number'"
                                :placeholder="$t ? '12 இலக்க ஆதார்' : '12 digit Aadhar'"
                                type="text"
                                inputmode="numeric"
                                pattern="\d*"
                                maxlength="12"
                                :value="old('aadhar_no')"
                            />

                            {{-- Voter ID --}}
                            <x-form-input
                                name="voterid_no"
                                :label="$t ? 'வோட்டர் ஐடி' : 'Voter ID'"
                                :placeholder="$t ? 'விருப்பமானது' : 'Optional'"
                                :value="old('voterid_no')"
                            />

                            {{-- Father's Name --}}
                            <x-form-input
                                name="father_name"
                                :label="__('site.applications.fathers_name')"
                                :placeholder="__('site.applications.fathers_name')"
                                :value="old('father_name')"
                            />

                            {{-- Mother's Name --}}
                            <x-form-input
                                name="mother_name"
                                :label="__('site.applications.mothers_name')"
                                :placeholder="__('site.applications.mothers_name')"
                                :value="old('mother_name')"
                            />

                            {{-- Spouse Name --}}
                            <x-form-input
                                name="spouse_name"
                                :label="__('site.applications.spouse_name')"
                                :placeholder="__('site.applications.spouse_name')"
                                :value="old('spouse_name')"
                            />

                            {{-- DOB --}}
                            <x-form-input
                                name="dob"
                                type="date"
                                :label="__('site.applications.date_of_birth')"
                                :value="old('dob')"
                            />

                            {{-- Gender --}}
                            <div>
                                <label for="gender" class="block text-base font-medium text-gray-700 mb-2">
                                    {{ __('site.applications.gender') }}
                                </label>
                                <select id="gender" name="gender" class="w-full px-4 py-3 bg-gray-50 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[var(--color-mjk-red)] focus:border-[var(--color-mjk-red)] transition duration-200 text-gray-900">
                                    <option value="">{{ __('site.applications.select_gender') }}</option>
                                    <option value="Male" {{ old('gender') == 'Male' ? 'selected' : '' }}>{{ __('site.applications.male') }}</option>
                                    <option value="Female" {{ old('gender') == 'Female' ? 'selected' : '' }}>{{ __('site.applications.female') }}</option>
                                    <option value="Other" {{ old('gender') == 'Other' ? 'selected' : '' }}>{{ __('site.applications.other') }}</option>
                                </select>
                            </div>

                            {{-- Education --}}
                            <x-form-input
                                name="education"
                                :label="__('site.applications.education')"
                                :placeholder="__('site.applications.education')"
                                :value="old('education')"
                            />

                            {{-- Occupation --}}
                            <x-form-input
                                name="occupation"
                                :label="__('site.applications.occupation')"
                                :placeholder="__('site.applications.occupation')"
                                :value="old('occupation')"
                            />

                            {{-- Marital Status --}}
                            <div>
                                <label for="marital_status" class="block text-base font-medium text-gray-700 mb-2">
                                    {{ __('site.applications.marital_status') }}
                                </label>
                                <select id="marital_status" name="marital_status" class="w-full px-4 py-3 bg-gray-50 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[var(--color-mjk-red)] focus:border-[var(--color-mjk-red)] transition duration-200 text-gray-900">
                                    <option value="">{{ __('site.applications.select_status') }}</option>
                                    <option value="Single" {{ old('marital_status') == 'Single' ? 'selected' : '' }}>{{ __('site.applications.single') }}</option>
                                    <option value="Married" {{ old('marital_status') == 'Married' ? 'selected' : '' }}>{{ __('site.applications.married') }}</option>
                                    <option value="Divorced" {{ old('marital_status') == 'Divorced' ? 'selected' : '' }}>{{ __('site.applications.divorced') }}</option>
                                    <option value="Widowed" {{ old('marital_status') == 'Widowed' ? 'selected' : '' }}>{{ __('site.applications.widowed') }}</option>
                                </select>
                            </div>

                            {{-- Social Category --}}
                            <div>
                                <label for="social_category" class="block text-base font-medium text-gray-700 mb-2">
                                    {{ __('site.applications.social_category') }}
                                </label>
                                <select id="social_category" name="social_category" class="w-full px-4 py-3 bg-gray-50 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[var(--color-mjk-red)] focus:border-[var(--color-mjk-red)] transition duration-200 text-gray-900">
                                    <option value="">{{ __('site.applications.select_status') }}</option>
                                    <option value="General" {{ old('social_category') == 'General' ? 'selected' : '' }}>General</option>
                                    <option value="OBC" {{ old('social_category') == 'OBC' ? 'selected' : '' }}>OBC</option>
                                    <option value="SC" {{ old('social_category') == 'SC' ? 'selected' : '' }}>SC</option>
                                    <option value="ST" {{ old('social_category') == 'ST' ? 'selected' : '' }}>ST</option>
                                </select>
                            </div>

                            {{-- Joining Date --}}
                            <x-form-input
                                name="joining_date"
                                type="date"
                                :label="__('site.applications.joining_date')"
                                :value="old('joining_date')"
                            />

                            {{-- Current Post --}}
                            <x-form-input
                                name="current_post"
                                :label="__('site.applications.current_post')"
                                :placeholder="__('site.applications.current_post')"
                                :value="old('current_post')"
                            />

                            {{-- Address --}}
                            <div class="md:col-span-2 lg:col-span-3">
                                <x-form-textarea
                                    name="address"
                                    :label="__('site.applications.address')"
                                    :placeholder="__('site.applications.address')"
                                    rows="3"
                                    :value="old('address')"
                                />
                            </div>

                            {{-- Mobile Number --}}
                            <div>
                                <x-form-input
                                    name="mobile_number"
                                    type="tel"
                                    :label="__('site.applications.mobile_number')"
                                    :placeholder="__('site.applications.mobile_number')"
                                    :value="old('mobile_number')"
                                />
                                <button type="button" id="verifyMobileBtn" class="mt-2 px-4 py-2 bg-[var(--color-mjk-blue)] hover:bg-blue-700 text-white text-sm font-medium rounded-lg transition duration-200 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                                    <svg class="w-4 h-4 inline-block mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path></svg>
                                    Verify Mobile Number
                                </button>
                                <input type="hidden" id="mobileVerified" name="mobile_verified" value="0">
                            </div>

                            {{-- Email ID --}}
                            <x-form-input
                                name="email_id"
                                type="email"
                                :label="__('site.applications.email_id')"
                                :placeholder="__('site.applications.email_id')"
                                :value="old('email_id')"
                            />
                        </div>
                    </div>

                    {{-- Location Information Section --}}
                    <div class="border-b border-gray-200 pb-8">
                        <h3 class="text-2xl font-bold text-gray-900 mb-6 flex items-center">
                            <svg class="w-6 h-6 mr-3 text-[var(--color-mjk-red)]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                            </svg>
                            {{ __('site.applications.location_position_info') }}
                        </h3>
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                            {{-- State --}}
                            <div>
                                <label for="state_id" class="block text-base font-medium text-gray-700 mb-2">
                                    {{ __('site.applications.state') }}
                                </label>
                                <select id="state_id" name="state_id" class="w-full px-4 py-3 bg-gray-50 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[var(--color-mjk-red)] focus:border-[var(--color-mjk-red)] transition duration-200 text-gray-900">
                                    <option value="">{{ __('site.applications.select_state') }}</option>
                                    @foreach(\App\Models\State::orderBy('name_en')->get() as $state)
                                        <option value="{{ $state->id }}" {{ old('state_id') == $state->id ? 'selected' : '' }}>{{ app()->getLocale() === 'en' ? $state->name_en : $state->name_ta }}</option>
                                    @endforeach
                                </select>
                                @error('state_id')<p class="text-red-500 text-sm mt-1">{{ $message }}</p>@enderror
                            </div>

                            {{-- District --}}
                            <div>
                                <label for="district_id" class="block text-base font-medium text-gray-700 mb-2">
                                    {{ __('site.applications.district') }}
                                </label>
                                <select id="district_id" name="district_id" class="w-full px-4 py-3 bg-gray-50 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[var(--color-mjk-red)] focus:border-[var(--color-mjk-red)] transition duration-200 text-gray-900" disabled>
                                    <option value="">{{ __('site.applications.select_district') }}</option>
                                </select>
                                @error('district_id')<p class="text-red-500 text-sm mt-1">{{ $message }}</p>@enderror
                            </div>

                            {{-- Assembly --}}
                            <div>
                                <label for="assembly_id" class="block text-base font-medium text-gray-700 mb-2">
                                    {{ __('site.applications.assembly') }}
                                </label>
                                <select id="assembly_id" name="assembly_id" class="w-full px-4 py-3 bg-gray-50 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[var(--color-mjk-red)] focus:border-[var(--color-mjk-red)] transition duration-200 text-gray-900" disabled>
                                    <option value="">{{ __('site.applications.select_assembly') }}</option>
                                </select>
                                @error('assembly_id')<p class="text-red-500 text-sm mt-1">{{ $message }}</p>@enderror
                            </div>

                            {{-- Posting Stage --}}
                            <div>
                                <label for="postingstage_id" class="block text-base font-medium text-gray-700 mb-2">
                                    {{ __('site.applications.posting_stage') }} <span class="text-red-500">*</span>
                                </label>
                                <select id="postingstage_id" name="postingstage_id" class="w-full px-4 py-3 bg-gray-50 border @error('postingstage_id') border-red-500 @else border-gray-300 @enderror rounded-lg focus:outline-none focus:ring-2 focus:ring-[var(--color-mjk-red)] focus:border-[var(--color-mjk-red)] transition duration-200 text-gray-900" required>
                                    <option value="">{{ __('site.applications.select_posting_stage') }}</option>
                                    @foreach(\App\Models\Postingstage::orderBy('name_en')->get() as $stage)
                                        <option value="{{ $stage->id }}" data-name="{{ $stage->name_en }}" {{ old('postingstage_id') == $stage->id ? 'selected' : '' }}>{{ app()->getLocale() === 'en' ? $stage->name_en : $stage->name_ta }}</option>
                                    @endforeach
                                </select>
                                @error('postingstage_id')<p class="text-red-500 text-sm mt-1">{{ $message }}</p>@enderror
                            </div>

                            {{-- Sub Body --}}
                            <div>
                                <label for="subbody_id" class="block text-base font-medium text-gray-700 mb-2">
                                    {{ __('site.applications.sub_body') }}
                                </label>
                                <select id="subbody_id" name="subbody_id" class="w-full px-4 py-3 bg-gray-50 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[var(--color-mjk-red)] focus:border-[var(--color-mjk-red)] transition duration-200 text-gray-900" disabled>
                                    <option value="">{{ __('site.applications.select_sub_body') }}</option>
                                </select>
                                @error('subbody_id')<p class="text-red-500 text-sm mt-1">{{ $message }}</p>@enderror
                            </div>

                            {{-- Post --}}
                            <div>
                                <label for="post_id" class="block text-base font-medium text-gray-700 mb-2">
                                    {{ __('site.applications.applied_post') }}
                                </label>
                                <select id="post_id" name="post_id" class="w-full px-4 py-3 bg-gray-50 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[var(--color-mjk-red)] focus:border-[var(--color-mjk-red)] transition duration-200 text-gray-900" disabled>
                                    <option value="">{{ __('site.applications.select_post') }}</option>
                                </select>
                                @error('post_id')<p class="text-red-500 text-sm mt-1">{{ $message }}</p>@enderror
                            </div>

                            {{-- Conditional Fields --}}
                            <div id="block_wrapper" style="display: none;">
                                <label for="block_id" class="block text-base font-medium text-gray-700 mb-2">{{ __('site.applications.block') }}</label>
                                <select id="block_id" name="block_id" class="w-full px-4 py-3 bg-gray-50 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[var(--color-mjk-red)] focus:border-[var(--color-mjk-red)] transition duration-200 text-gray-900" disabled>
                                    <option value="">{{ __('site.applications.select_block') }}</option>
                                </select>
                            </div>

                            <div id="city_wrapper" style="display: none;">
                                <label for="city_id" class="block text-base font-medium text-gray-700 mb-2">{{ __('site.applications.city') }}</label>
                                <select id="city_id" name="city_id" class="w-full px-4 py-3 bg-gray-50 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[var(--color-mjk-red)] focus:border-[var(--color-mjk-red)] transition duration-200 text-gray-900" disabled>
                                    <option value="">{{ __('site.applications.select_city') }}</option>
                                </select>
                            </div>

                            <div id="perur_wrapper" style="display: none;">
                                <label for="perur_id" class="block text-base font-medium text-gray-700 mb-2">{{ __('site.applications.perur') }}</label>
                                <select id="perur_id" name="perur_id" class="w-full px-4 py-3 bg-gray-50 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[var(--color-mjk-red)] focus:border-[var(--color-mjk-red)] transition duration-200 text-gray-900" disabled>
                                    <option value="">{{ __('site.applications.select_perur') }}</option>
                                </select>
                            </div>

                            <div id="paguthi_wrapper" style="display: none;">
                                <label for="paguthi_id" class="block text-base font-medium text-gray-700 mb-2">{{ __('site.applications.paguthi') }}</label>
                                <select id="paguthi_id" name="paguthi_id" class="w-full px-4 py-3 bg-gray-50 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[var(--color-mjk-red)] focus:border-[var(--color-mjk-red)] transition duration-200 text-gray-900" disabled>
                                    <option value="">{{ __('site.applications.select_paguthi') }}</option>
                                </select>
                            </div>

                            <div id="vattam_wrapper" style="display: none;">
                                <label for="vattam_id" class="block text-base font-medium text-gray-700 mb-2">{{ __('site.applications.vattam') }}</label>
                                <select id="vattam_id" name="vattam_id" class="w-full px-4 py-3 bg-gray-50 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[var(--color-mjk-red)] focus:border-[var(--color-mjk-red)] transition duration-200 text-gray-900" disabled>
                                    <option value="">{{ __('site.applications.select_vattam') }}</option>
                                </select>
                            </div>

                            <div id="corporation_wrapper" style="display: none;">
                                <label for="corporation_id" class="block text-base font-medium text-gray-700 mb-2">{{ __('site.applications.corporation') }}</label>
                                <select id="corporation_id" name="corporation_id" class="w-full px-4 py-3 bg-gray-50 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[var(--color-mjk-red)] focus:border-[var(--color-mjk-red)] transition duration-200 text-gray-900" disabled>
                                    <option value="">{{ __('site.applications.select_corporation') }}</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    {{-- Photo Upload Section --}}
                    <div class="border-b border-gray-200 pb-8">
                        <h3 class="text-2xl font-bold text-gray-900 mb-6 flex items-center">
                            <svg class="w-6 h-6 mr-3 text-[var(--color-mjk-red)]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                            </svg>
                            {{ __('site.applications.photo') }}
                        </h3>
                        <div class="max-w-md mx-auto">
                            <div class="relative">
                                <label for="photo" class="block text-base font-medium text-gray-700 mb-3 text-center">{{ __('site.applications.upload_photo') }}</label>
                                <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-xl hover:border-[var(--color-mjk-red)] transition-colors duration-200">
                                    <div class="space-y-1 text-center">
                                        <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48" aria-hidden="true">
                                            <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                        <div class="flex text-sm text-gray-600">
                                            <label for="photo" class="relative cursor-pointer bg-white rounded-md font-medium text-[var(--color-mjk-red)] hover:text-red-700 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-[var(--color-mjk-red)]">
                                                <span>Upload a file</span>
                                                <input id="photo" name="photo" type="file" accept="image/*" class="sr-only">
                                            </label>
                                            <p class="pl-1">or drag and drop</p>
                                        </div>
                                        <p class="text-xs text-gray-500">PNG, JPG, GIF up to 2MB</p>
                                    </div>
                                </div>
                                <div id="photo-preview" class="mt-4 text-center hidden">
                                    <img id="photo-preview-img" src="" alt="Photo preview" class="mx-auto h-48 w-48 object-cover rounded-lg border-4 border-[var(--color-mjk-red)] shadow-lg">
                                </div>
                            </div>
                            @error('photo')<p class="text-red-500 text-sm mt-2 text-center">{{ $message }}</p>@enderror
                        </div>
                    </div>

                    {{-- Document Upload Section --}}
                    <div class="border-b border-gray-200 pb-8">
                        <h3 class="text-2xl font-bold text-gray-900 mb-6 flex items-center">
                            <svg class="w-6 h-6 mr-3 text-[var(--color-mjk-red)]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                            </svg>
                            {{ __('site.applications.supporting_document') }}
                        </h3>
                        <div class="max-w-2xl mx-auto">
                            <label for="document" class="block text-base font-medium text-gray-700 mb-3 text-center">{{ __('site.applications.upload_documents') }}</label>
                            <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-xl hover:border-[var(--color-mjk-red)] transition-colors duration-200">
                                <div class="space-y-1 text-center w-full">
                                    <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z"/>
                                    </svg>
                                    <div class="flex text-sm text-gray-600 justify-center">
                                        <label for="document" class="relative cursor-pointer bg-white rounded-md font-medium text-[var(--color-mjk-red)] hover:text-red-700 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-[var(--color-mjk-red)]">
                                            <span>Upload a file</span>
                                            <input id="document" name="document" type="file" accept="application/pdf,image/*" class="sr-only">
                                        </label>
                                        <p class="pl-1">or drag and drop</p>
                                    </div>
                                    <p class="text-xs text-gray-500">PDF, PNG, JPG up to 5MB</p>
                                    <p class="text-xs text-gray-400 mt-2">(Identity proof, certificates, or other relevant documents)</p>
                                </div>
                            </div>
                            <div id="document-preview" class="mt-4 text-center hidden">
                                <div class="inline-flex items-center px-4 py-2 bg-gray-100 rounded-lg">
                                    <svg class="w-5 h-5 mr-2 text-[var(--color-mjk-red)]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                                    </svg>
                                    <span id="document-name" class="text-sm text-gray-700"></span>
                                </div>
                            </div>
                            @error('document')<p class="text-red-500 text-sm mt-2 text-center">{{ $message }}</p>@enderror
                        </div>
                    </div>

                    {{-- Submit Section --}}
                    <div>
                        <div class="text-center">
                            <button type="submit" class="btn-campaign btn-campaign-primary text-xl px-10">
                                <svg class="w-5 h-5 mr-2 inline-block" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"/>
                                </svg>
                                {{ __('site.applications.submit_application') }}
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
        const currentLocale = '{{ app()->getLocale() }}';
        const translations = {
            selectDistrict: '{{ __('site.applications.select_district') }}',
            selectAssembly: '{{ __('site.applications.select_assembly') }}',
            selectBlock: '{{ __('site.applications.select_block') }}',
            selectCity: '{{ __('site.applications.select_city') }}',
            selectPerur: '{{ __('site.applications.select_perur') }}',
            selectPaguthi: '{{ __('site.applications.select_paguthi') }}',
            selectVattam: '{{ __('site.applications.select_vattam') }}',
            selectCorporation: '{{ __('site.applications.select_corporation') }}',
            selectSubBody: '{{ __('site.applications.select_sub_body') }}',
            selectPost: '{{ __('site.applications.select_post') }}'
        };

        // Photo preview functionality
        const photoInput = document.getElementById('photo');
        const photoPreview = document.getElementById('photo-preview');
        const photoPreviewImg = document.getElementById('photo-preview-img');

        if (photoInput) {
            photoInput.addEventListener('change', function(e) {
                const file = e.target.files[0];
                if (file) {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        photoPreviewImg.src = e.target.result;
                        photoPreview.classList.remove('hidden');
                    };
                    reader.readAsDataURL(file);
                } else {
                    photoPreview.classList.add('hidden');
                }
            });
        }

        // Document preview functionality
        const documentInput = document.getElementById('document');
        const documentPreview = document.getElementById('document-preview');
        const documentName = document.getElementById('document-name');

        if (documentInput) {
            documentInput.addEventListener('change', function(e) {
                const file = e.target.files[0];
                if (file) {
                    documentName.textContent = file.name;
                    documentPreview.classList.remove('hidden');
                } else {
                    documentPreview.classList.add('hidden');
                }
            });
        }

        // Element references
        const stateSelect = document.getElementById('state_id');
        const districtSelect = document.getElementById('district_id');
        const assemblySelect = document.getElementById('assembly_id');
        const postingstageSelect = document.getElementById('postingstage_id');
        const subbodySelect = document.getElementById('subbody_id');
        const postSelect = document.getElementById('post_id');

        const blockSelect = document.getElementById('block_id');
        const citySelect = document.getElementById('city_id');
        const perurSelect = document.getElementById('perur_id');
        const paguthiSelect = document.getElementById('paguthi_id');
        const vattamSelect = document.getElementById('vattam_id');
        const corporationSelect = document.getElementById('corporation_id');

        const blockWrapper = document.getElementById('block_wrapper');
        const cityWrapper = document.getElementById('city_wrapper');
        const perurWrapper = document.getElementById('perur_wrapper');
        const paguthiWrapper = document.getElementById('paguthi_wrapper');
        const vattamWrapper = document.getElementById('vattam_wrapper');
        const corporationWrapper = document.getElementById('corporation_wrapper');

        // Old values for preserving state on validation errors
        const oldValues = {
            district_id: '{{ old('district_id') }}',
            assembly_id: '{{ old('assembly_id') }}',
            subbody_id: '{{ old('subbody_id') }}',
            post_id: '{{ old('post_id') }}',
            block_id: '{{ old('block_id') }}',
            city_id: '{{ old('city_id') }}',
            perur_id: '{{ old('perur_id') }}',
            paguthi_id: '{{ old('paguthi_id') }}',
            vattam_id: '{{ old('vattam_id') }}',
            corporation_id: '{{ old('corporation_id') }}'
        };

        function populateOptions(select, data, placeholder, oldValue = '') {
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

        function hideAllConditionalFields() {
            blockWrapper.style.display = 'none';
            cityWrapper.style.display = 'none';
            perurWrapper.style.display = 'none';
            paguthiWrapper.style.display = 'none';
            vattamWrapper.style.display = 'none';
            corporationWrapper.style.display = 'none';

            blockSelect.disabled = true;
            citySelect.disabled = true;
            perurSelect.disabled = true;
            paguthiSelect.disabled = true;
            vattamSelect.disabled = true;
            corporationSelect.disabled = true;
        }

        function handlePostingstageChange() {
            const selectedOption = postingstageSelect.options[postingstageSelect.selectedIndex];
            const stageName = selectedOption.getAttribute('data-name');
            const districtId = districtSelect.value;

            hideAllConditionalFields();

            if (!stageName || !districtId) return;

            if (stageName === 'Block') {
                blockWrapper.style.display = 'block';
                fetchAndPopulate(`/api/blocks/by-district/${districtId}`, blockSelect, translations.selectBlock, oldValues.block_id);
            } else if (stageName === 'City') {
                cityWrapper.style.display = 'block';
                fetchAndPopulate(`/api/cities/by-district/${districtId}`, citySelect, translations.selectCity, oldValues.city_id);
            } else if (stageName === 'Perur') {
                perurWrapper.style.display = 'block';
                fetchAndPopulate(`/api/perurs/by-district/${districtId}`, perurSelect, translations.selectPerur, oldValues.perur_id);
            } else if (stageName === 'Paguthi') {
                paguthiWrapper.style.display = 'block';
                fetchAndPopulate(`/api/paguthis/by-district/${districtId}`, paguthiSelect, translations.selectPaguthi, oldValues.paguthi_id);
            } else if (stageName === 'Vattam') {
                vattamWrapper.style.display = 'block';
                fetchAndPopulate(`/api/vattams/by-district/${districtId}`, vattamSelect, translations.selectVattam, oldValues.vattam_id);
            } else if (stageName === 'Corporation') {
                corporationWrapper.style.display = 'block';
                fetchAndPopulate(`/api/corporations/by-district/${districtId}`, corporationSelect, translations.selectCorporation, oldValues.corporation_id);
            }

            const postingstageId = postingstageSelect.value;
            if (postingstageId) {
                fetchAndPopulate(`/api/subbodies/by-postingstage/${postingstageId}`, subbodySelect, translations.selectSubBody, oldValues.subbody_id);
                fetchAndPopulate(`/api/posts/by-postingstage/${postingstageId}`, postSelect, translations.selectPost, oldValues.post_id);
            }
        }

        function fetchAndPopulate(url, select, placeholder, oldValue = '') {
            select.disabled = true;
            fetch(url)
                .then(response => response.ok ? response.json() : Promise.reject('Network error'))
                .then(data => {
                    populateOptions(select, data, placeholder, oldValue);
                    if (oldValue && select.querySelector(`option[value="${oldValue}"]`)) {
                        select.value = oldValue;
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    populateOptions(select, [], placeholder);
                });
        }

        // Event listeners
        stateSelect.addEventListener('change', function() {
            const stateId = this.value;
            if (stateId) {
                fetchAndPopulate(`/api/districts/${stateId}`, districtSelect, translations.selectDistrict, oldValues.district_id);
            } else {
                populateOptions(districtSelect, [], translations.selectDistrict);
                populateOptions(assemblySelect, [], translations.selectAssembly);
                hideAllConditionalFields();
            }
        });

        districtSelect.addEventListener('change', function() {
            const districtId = this.value;
            if (districtId) {
                fetchAndPopulate(`/api/assemblies/${districtId}`, assemblySelect, translations.selectAssembly, oldValues.assembly_id);
                handlePostingstageChange();
            } else {
                populateOptions(assemblySelect, [], translations.selectAssembly);
                hideAllConditionalFields();
            }
        });

        postingstageSelect.addEventListener('change', handlePostingstageChange);

        // Initial population on page load
        const oldStateId = '{{ old('state_id') }}';
        const oldPostingstageId = '{{ old('postingstage_id') }}';

        if (oldStateId) {
            stateSelect.value = oldStateId;
            fetchAndPopulate(`/api/districts/${oldStateId}`, districtSelect, translations.selectDistrict, oldValues.district_id);

            setTimeout(() => {
                if (oldValues.district_id) {
                    districtSelect.value = oldValues.district_id;
                    fetchAndPopulate(`/api/assemblies/${oldValues.district_id}`, assemblySelect, translations.selectAssembly, oldValues.assembly_id);

                    if (oldPostingstageId) {
                        postingstageSelect.value = oldPostingstageId;
                        handlePostingstageChange();
                    }
                }
            }, 500);
        }

        // OTP Verification Integration
        const verifyMobileBtn = document.getElementById('verifyMobileBtn');
        if (verifyMobileBtn) {
            verifyMobileBtn.addEventListener('click', function() {
                const mobileInput = document.getElementById('mobile_number');
                const mobileNumber = mobileInput ? mobileInput.value.trim() : '';

                if (!mobileNumber) {
                    alert('Please enter your mobile number first.');
                    return;
                }

                if (!/^[6-9][0-9]{9}$/.test(mobileNumber)) {
                    alert('Please enter a valid 10-digit Indian mobile number.');
                    return;
                }

                if (typeof otpVerification !== 'undefined') {
                    otpVerification.openModal(mobileNumber);
                } else {
                    alert('OTP verification system is not loaded. Please refresh the page.');
                }
            });
        }

        window.addEventListener('otpVerified', function(e) {
            const mobileVerifiedInput = document.getElementById('mobileVerified');
            const verifyBtn = document.getElementById('verifyMobileBtn');

            if (mobileVerifiedInput) {
                mobileVerifiedInput.value = '1';
            }

            if (verifyBtn) {
                verifyBtn.classList.remove('bg-[var(--color-mjk-blue)]', 'hover:bg-blue-700');
                verifyBtn.classList.add('bg-green-600', 'cursor-not-allowed');
                verifyBtn.innerHTML = '<svg class="w-4 h-4 inline-block mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>Mobile Verified';
                verifyBtn.disabled = true;
            }
        });

        // Client-side form validation
        const form = document.getElementById('applicationForm');

        form.addEventListener('submit', function(e) {
            const mobileVerifiedInput = document.getElementById('mobileVerified');
            const mobileInput = document.getElementById('mobile_number');

            if (!mobileVerifiedInput || mobileVerifiedInput.value !== '1') {
                e.preventDefault();
                alert('Please verify your mobile number before submitting the form.');
                if (mobileInput) mobileInput.focus();
                return false;
            }

            if (mobileInput && mobileInput.value) {
                const mobilePattern = /^[6-9][0-9]{9}$/;
                if (!mobilePattern.test(mobileInput.value.replace(/[^0-9]/g, ''))) {
                    e.preventDefault();
                    alert('Please enter a valid 10-digit Indian mobile number starting with 6-9');
                    mobileInput.focus();
                    return false;
                }
            }

            const aadharInput = document.getElementById('aadhar_no');
            if (aadharInput && aadharInput.value) {
                const aadharPattern = /^[2-9][0-9]{11}$/;
                if (!aadharPattern.test(aadharInput.value.replace(/[^0-9]/g, ''))) {
                    e.preventDefault();
                    alert('Please enter a valid 12-digit Aadhar number');
                    aadharInput.focus();
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
                submitBtn.innerHTML = '<svg class="animate-spin h-5 w-5 mr-2 inline-block" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path></svg> {{ __("site.applications.submitting") }}';
            }
        });

        if (window.history.replaceState) {
            window.history.replaceState(null, null, window.location.href);
        }
    });
</script>
@endpush
@endsection
