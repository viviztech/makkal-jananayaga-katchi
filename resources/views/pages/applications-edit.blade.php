@extends('layouts.app')

@section('title', __('site.applications.edit_title'))

@section('content')
    {{-- Page Header --}}
    <section class="relative bg-gray-900 dark:bg-gray-950 py-24 md:py-32">
        <div class="relative max-w-7xl mx-auto px-4 text-center">
            <h1 class="text-5xl md:text-6xl font-extrabold text-white mb-4">{{ __('site.applications.edit_title') }}</h1>
            <p class="text-xl text-gray-300 max-w-3xl mx-auto">{{ __('site.applications.edit_subtitle') }}</p>
        </div>
    </section>

    {{-- Application Form Section --}}
    <section class="py-20 lg:py-28 px-4 bg-gray-100 dark:bg-gray-900">
        <div class="max-w-6xl mx-auto">
            <div class="bg-white dark:bg-gray-800 rounded-xl shadow-2xl p-8 lg:p-12">
                <div class="text-center mb-10">
                    <h2 class="text-3xl lg:text-4xl font-extrabold text-gray-900 dark:text-white mb-3">{{ __('site.applications.edit_form_title') }}</h2>
                    <p class="text-lg text-gray-600 dark:text-gray-400">{{ __('site.applications.edit_form_description') }}</p>
                </div>

                {{-- Display Session Messages --}}
                @if(session('success'))
                    <div class="mb-6 p-4 flex items-start bg-green-50 dark:bg-green-900/30 border border-green-200 dark:border-green-800 text-green-700 dark:text-green-300 rounded-lg">
                        <svg class="w-5 h-5 mr-3 flex-shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>
                        <span>{{ session('success') }}</span>
                    </div>
                @endif
                @if(session('error'))
                     <div class="mb-6 p-4 flex items-start bg-red-50 dark:bg-red-900/30 border border-red-200 dark:border-red-800 text-red-700 dark:text-red-300 rounded-lg">
                         <svg class="w-5 h-5 mr-3 flex-shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-13a1 1 0 10-2 0v5a1 1 0 102 0V5zm-1 9a1 1 0 100-2 1 1 0 000 2z" clip-rule="evenodd"></path></svg>
                        <span>{{ session('error') }}</span>
                    </div>
                @endif

                <form action="{{ route('applications.update', $application->id) }}" method="POST" enctype="multipart/form-data" class="space-y-10">
                    @csrf
                    @method('PUT')
                    @php
                        $t = app()->getLocale() === 'ta';
                    @endphp

                    {{-- Personal Information Section --}}
                    <div class="border-b border-gray-200 dark:border-gray-700 pb-8">
                        <h3 class="text-2xl font-semibold text-gray-900 dark:text-white mb-6 flex items-center">
                            <svg class="w-6 h-6 mr-3 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                            </svg>
                            {{ __('site.applications.personal_info') }}
                        </h3>
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                            {{-- Name --}}
                            <div>
                                <label for="name" class="block text-base font-medium text-gray-700 dark:text-gray-300 mb-2">{{ __('site.applications.full_name') }} <span class="text-red-500">*</span></label>
                                <input type="text" id="name" name="name" value="{{ old('name', $application->name) }}" class="w-full px-4 py-3 bg-gray-50 dark:bg-gray-700 border @error('name') border-red-500 @else border-gray-300 dark:border-gray-600 @enderror rounded-lg focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-red-500 transition duration-200 text-gray-900 dark:text-white dark:placeholder-gray-400" required placeholder="{{ __('site.applications.full_name') }}">
                                @error('name')<p class="text-red-500 text-sm mt-1">{{ $message }}</p>@enderror
                            </div>

                            {{-- Membership ID --}}
                            <div>
                                <label for="membership_id" class="block text-base font-medium text-gray-700 dark:text-gray-300 mb-2">{{ $t ? 'உறுப்பினர் ஐடி' : 'Membership ID' }}</label>
                                <input type="text" id="membership_id" name="membership_id" value="{{ old('membership_id', $application->membership_id) }}" class="w-full px-4 py-3 bg-gray-50 dark:bg-gray-700 border @error('membership_id') border-red-500 @else border-gray-300 dark:border-gray-600 @enderror rounded-lg focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-red-500 transition duration-200 text-gray-900 dark:text-white dark:placeholder-gray-400" placeholder="{{ $t ? 'விருப்பமானது' : 'Optional' }}">
                                @error('membership_id')<p class="text-red-500 text-sm mt-1">{{ $message }}</p>@enderror
                            </div>

                            {{-- Aadhar Number --}}
                            <div>
                                <label for="aadhar_no" class="block text-base font-medium text-gray-700 dark:text-gray-300 mb-2">{{ $t ? 'ஆதார் எண்' : 'Aadhar Number' }}</label>
                                <input type="text" id="aadhar_no" name="aadhar_no" value="{{ old('aadhar_no', $application->aadhar_no) }}" inputmode="numeric" pattern="\d*" maxlength="12" class="w-full px-4 py-3 bg-gray-50 dark:bg-gray-700 border @error('aadhar_no') border-red-500 @else border-gray-300 dark:border-gray-600 @enderror rounded-lg focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-red-500 transition duration-200 text-gray-900 dark:text-white dark:placeholder-gray-400" placeholder="{{ $t ? '12 இலக்க ஆதார்' : '12 digit Aadhar' }}">
                                @error('aadhar_no')<p class="text-red-500 text-sm mt-1">{{ $message }}</p>@enderror
                            </div>

                            {{-- Voter ID --}}
                            <div>
                                <label for="voterid_no" class="block text-base font-medium text-gray-700 dark:text-gray-300 mb-2">{{ $t ? 'வோட்டர் ஐடி' : 'Voter ID' }}</label>
                                <input type="text" id="voterid_no" name="voterid_no" value="{{ old('voterid_no', $application->voterid_no) }}" class="w-full px-4 py-3 bg-gray-50 dark:bg-gray-700 border @error('voterid_no') border-red-500 @else border-gray-300 dark:border-gray-600 @enderror rounded-lg focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-red-500 transition duration-200 text-gray-900 dark:text-white dark:placeholder-gray-400" placeholder="{{ $t ? 'விருப்பமானது' : 'Optional' }}">
                                @error('voterid_no')<p class="text-red-500 text-sm mt-1">{{ $message }}</p>@enderror
                            </div>

                            {{-- Father's Name --}}
                            <div>
                                <label for="father_name" class="block text-base font-medium text-gray-700 dark:text-gray-300 mb-2">{{ __('site.applications.fathers_name') }}</label>
                                <input type="text" id="father_name" name="father_name" value="{{ old('father_name', $application->father_name) }}" class="w-full px-4 py-3 bg-gray-50 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-lg focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-red-500 transition duration-200 text-gray-900 dark:text-white dark:placeholder-gray-400" placeholder="{{ __('site.applications.fathers_name') }}">
                            </div>

                            {{-- Mother's Name --}}
                            <div>
                                <label for="mother_name" class="block text-base font-medium text-gray-700 dark:text-gray-300 mb-2">{{ __('site.applications.mothers_name') }}</label>
                                <input type="text" id="mother_name" name="mother_name" value="{{ old('mother_name', $application->mother_name) }}" class="w-full px-4 py-3 bg-gray-50 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-lg focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-red-500 transition duration-200 text-gray-900 dark:text-white dark:placeholder-gray-400" placeholder="{{ __('site.applications.mothers_name') }}">
                            </div>

                            {{-- Spouse Name --}}
                            <div>
                                <label for="spouse_name" class="block text-base font-medium text-gray-700 dark:text-gray-300 mb-2">{{ __('site.applications.spouse_name') }}</label>
                                <input type="text" id="spouse_name" name="spouse_name" value="{{ old('spouse_name', $application->spouse_name) }}" class="w-full px-4 py-3 bg-gray-50 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-lg focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-red-500 transition duration-200 text-gray-900 dark:text-white dark:placeholder-gray-400" placeholder="{{ __('site.applications.spouse_name') }}">
                            </div>

                            {{-- DOB --}}
                            <div>
                                <label for="dob" class="block text-base font-medium text-gray-700 dark:text-gray-300 mb-2">{{ __('site.applications.date_of_birth') }}</label>
                                <input type="date" id="dob" name="dob" value="{{ old('dob', $application->dob) }}" class="w-full px-4 py-3 bg-gray-50 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-lg focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-red-500 transition duration-200 text-gray-900 dark:text-white dark:placeholder-gray-400" placeholder="{{ __('site.applications.date_of_birth') }}">
                            </div>

                            {{-- Gender --}}
                            <div>
                                <label for="gender" class="block text-base font-medium text-gray-700 dark:text-gray-300 mb-2">{{ __('site.applications.gender') }}</label>
                                <select id="gender" name="gender" class="w-full px-4 py-3 bg-gray-50 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-lg focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-red-500 transition duration-200 text-gray-900 dark:text-white">
                                    <option value="">{{ __('site.applications.select_gender') }}</option>
                                    <option value="Male" {{ old('gender', $application->gender) == 'Male' ? 'selected' : '' }}>{{ __('site.applications.male') }}</option>
                                    <option value="Female" {{ old('gender', $application->gender) == 'Female' ? 'selected' : '' }}>{{ __('site.applications.female') }}</option>
                                    <option value="Other" {{ old('gender', $application->gender) == 'Other' ? 'selected' : '' }}>{{ __('site.applications.other') }}</option>
                                </select>
                            </div>

                            {{-- Education --}}
                            <div>
                                <label for="education" class="block text-base font-medium text-gray-700 dark:text-gray-300 mb-2">{{ __('site.applications.education') }}</label>
                                <input type="text" id="education" name="education" value="{{ old('education', $application->education) }}" class="w-full px-4 py-3 bg-gray-50 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-lg focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-red-500 transition duration-200 text-gray-900 dark:text-white dark:placeholder-gray-400" placeholder="{{ __('site.applications.education') }}">
                            </div>

                            {{-- Occupation --}}
                            <div>
                                <label for="occupation" class="block text-base font-medium text-gray-700 dark:text-gray-300 mb-2">{{ __('site.applications.occupation') }}</label>
                                <input type="text" id="occupation" name="occupation" value="{{ old('occupation', $application->occupation) }}" class="w-full px-4 py-3 bg-gray-50 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-lg focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-red-500 transition duration-200 text-gray-900 dark:text-white dark:placeholder-gray-400" placeholder="{{ __('site.applications.occupation') }}">
                            </div>

                            {{-- Marital Status --}}
                            <div>
                                <label for="marital_status" class="block text-base font-medium text-gray-700 dark:text-gray-300 mb-2">{{ __('site.applications.marital_status') }}</label>
                                <select id="marital_status" name="marital_status" class="w-full px-4 py-3 bg-gray-50 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-lg focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-red-500 transition duration-200 text-gray-900 dark:text-white">
                                    <option value="">{{ __('site.applications.select_status') }}</option>
                                    <option value="Single" {{ old('marital_status', $application->marital_status) == 'Single' ? 'selected' : '' }}>{{ __('site.applications.single') }}</option>
                                    <option value="Married" {{ old('marital_status', $application->marital_status) == 'Married' ? 'selected' : '' }}>{{ __('site.applications.married') }}</option>
                                    <option value="Divorced" {{ old('marital_status', $application->marital_status) == 'Divorced' ? 'selected' : '' }}>{{ __('site.applications.divorced') }}</option>
                                    <option value="Widowed" {{ old('marital_status', $application->marital_status) == 'Widowed' ? 'selected' : '' }}>{{ __('site.applications.widowed') }}</option>
                                </select>
                            </div>

                            {{-- Social Category --}}
                            <div>
                                <label for="social_category" class="block text-base font-medium text-gray-700 dark:text-gray-300 mb-2">{{ __('site.applications.social_category') }}</label>
                                <select id="social_category" name="social_category" class="w-full px-4 py-3 bg-gray-50 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-lg focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-red-500 transition duration-200 text-gray-900 dark:text-white">
                                    <option value="">{{ __('site.applications.select_status') }}</option>
                                    <option value="General" {{ old('social_category', $application->social_category) == 'General' ? 'selected' : '' }}>General</option>
                                    <option value="OBC" {{ old('social_category', $application->social_category) == 'OBC' ? 'selected' : '' }}>OBC</option>
                                    <option value="SC" {{ old('social_category', $application->social_category) == 'SC' ? 'selected' : '' }}>SC</option>
                                    <option value="ST" {{ old('social_category', $application->social_category) == 'ST' ? 'selected' : '' }}>ST</option>
                                </select>
                            </div>

                            {{-- Joining Date --}}
                            <div>
                                <label for="joining_date" class="block text-base font-medium text-gray-700 dark:text-gray-300 mb-2">{{ __('site.applications.joining_date') }}</label>
                                <input type="date" id="joining_date" name="joining_date" value="{{ old('joining_date', $application->joining_date) }}" class="w-full px-4 py-3 bg-gray-50 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-lg focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-red-500 transition duration-200 text-gray-900 dark:text-white dark:placeholder-gray-400" placeholder="{{ __('site.applications.joining_date') }}">
                            </div>

                            {{-- Current Post --}}
                            <div>
                                <label for="current_post" class="block text-base font-medium text-gray-700 dark:text-gray-300 mb-2">{{ __('site.applications.current_post') }}</label>
                                <input type="text" id="current_post" name="current_post" value="{{ old('current_post', $application->current_post) }}" class="w-full px-4 py-3 bg-gray-50 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-lg focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-red-500 transition duration-200 text-gray-900 dark:text-white dark:placeholder-gray-400" placeholder="{{ __('site.applications.current_post') }}">
                            </div>

                            {{-- Address --}}
                            <div class="md:col-span-2 lg:col-span-3">
                                <label for="address" class="block text-base font-medium text-gray-700 dark:text-gray-300 mb-2">{{ __('site.applications.address') }}</label>
                                <textarea id="address" name="address" rows="3" class="w-full px-4 py-3 bg-gray-50 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-lg focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-red-500 transition duration-200 resize-none text-gray-900 dark:text-white dark:placeholder-gray-400" placeholder="{{ __('site.applications.address') }}">{{ old('address', $application->address) }}</textarea>
                            </div>

                            {{-- Mobile Number --}}
                            <div>
                                <label for="mobile_number" class="block text-base font-medium text-gray-700 dark:text-gray-300 mb-2">{{ __('site.applications.mobile_number') }}</label>
                                <input type="tel" id="mobile_number" name="mobile_number" value="{{ old('mobile_number', $application->mobile_number) }}" class="w-full px-4 py-3 bg-gray-50 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-lg focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-red-500 transition duration-200 text-gray-900 dark:text-white dark:placeholder-gray-400" placeholder="{{ __('site.applications.mobile_number') }}">
                            </div>

                            {{-- Email ID --}}
                            <div>
                                <label for="email_id" class="block text-base font-medium text-gray-700 dark:text-gray-300 mb-2">{{ __('site.applications.email_id') }}</label>
                                <input type="email" id="email_id" name="email_id" value="{{ old('email_id', $application->email_id) }}" class="w-full px-4 py-3 bg-gray-50 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-lg focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-red-500 transition duration-200 text-gray-900 dark:text-white dark:placeholder-gray-400" placeholder="{{ __('site.applications.email_id') }}">
                            </div>
                        </div>
                    </div>
{{-- Location Information Section --}}
                    <div class="border-b border-gray-200 dark:border-gray-700 pb-8">
                        <h3 class="text-2xl font-semibold text-gray-900 dark:text-white mb-6 flex items-center">
                            <svg class="w-6 h-6 mr-3 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                            </svg>
                            {{ __('site.applications.location_position_info') }}
                        </h3>
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                            {{-- State --}}
                            <div>
                                <label for="state_id" class="block text-base font-medium text-gray-700 dark:text-gray-300 mb-2">{{ __('site.applications.state') }}</label>
                                <select id="state_id" name="state_id" class="w-full px-4 py-3 bg-gray-50 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-lg focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-red-500 transition duration-200 text-gray-900 dark:text-white">
                                    <option value="">{{ __('site.applications.select_state') }}</option>
                                    @foreach(\App\Models\State::orderBy('name_en')->get() as $state)
                                        <option value="{{ $state->id }}" {{ old('state_id', $application->state_id) == $state->id ? 'selected' : '' }}>{{ app()->getLocale() === 'en' ? $state->name_en : $state->name_ta }}</option>
                                    @endforeach
                                </select>
                                @error('state_id')<p class="text-red-500 text-sm mt-1">{{ $message }}</p>@enderror
                            </div>

                            {{-- District --}}
                            <div>
                                <label for="district_id" class="block text-base font-medium text-gray-700 dark:text-gray-300 mb-2">{{ __('site.applications.district') }}</label>
                                <select id="district_id" name="district_id" class="w-full px-4 py-3 bg-gray-50 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-lg focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-red-500 transition duration-200 text-gray-900 dark:text-white" disabled>
                                    <option value="">{{ __('site.applications.select_district') }}</option>
                                </select>
                                @error('district_id')<p class="text-red-500 text-sm mt-1">{{ $message }}</p>@enderror
                            </div>

                            {{-- Assembly --}}
                            <div>
                                <label for="assembly_id" class="block text-base font-medium text-gray-700 dark:text-gray-300 mb-2">{{ __('site.applications.assembly') }}</label>
                                <select id="assembly_id" name="assembly_id" class="w-full px-4 py-3 bg-gray-50 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-lg focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-red-500 transition duration-200 text-gray-900 dark:text-white" disabled>
                                    <option value="">{{ __('site.applications.select_assembly') }}</option>
                                </select>
                                @error('assembly_id')<p class="text-red-500 text-sm mt-1">{{ $message }}</p>@enderror
                            </div>

                            {{-- Posting Stage --}}
                            <div>
                                <label for="postingstage_id" class="block text-base font-medium text-gray-700 dark:text-gray-300 mb-2">{{ __('site.applications.posting_stage') }} <span class="text-red-500">*</span></label>
                                <select id="postingstage_id" name="postingstage_id" class="w-full px-4 py-3 bg-gray-50 dark:bg-gray-700 border @error('postingstage_id') border-red-500 @else border-gray-300 dark:border-gray-600 @enderror rounded-lg focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-red-500 transition duration-200 text-gray-900 dark:text-white" required>
                                    <option value="">{{ __('site.applications.select_posting_stage') }}</option>
                                    @foreach(\App\Models\Postingstage::orderBy('name_en')->get() as $stage)
                                        <option value="{{ $stage->id }}" data-name="{{ $stage->name_en }}" {{ old('postingstage_id', $application->postingstage_id) == $stage->id ? 'selected' : '' }}>{{ app()->getLocale() === 'en' ? $stage->name_en : $stage->name_ta }}</option>
                                    @endforeach
                                </select>
                                @error('postingstage_id')<p class="text-red-500 text-sm mt-1">{{ $message }}</p>@enderror
                            </div>

                            {{-- Sub Body --}}
                            <div>
                                <label for="subbody_id" class="block text-base font-medium text-gray-700 dark:text-gray-300 mb-2">{{ __('site.applications.sub_body') }}</label>
                                <select id="subbody_id" name="subbody_id" class="w-full px-4 py-3 bg-gray-50 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-lg focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-red-500 transition duration-200 text-gray-900 dark:text-white" disabled>
                                    <option value="">{{ __('site.applications.select_sub_body') }}</option>
                                </select>
                                @error('subbody_id')<p class="text-red-500 text-sm mt-1">{{ $message }}</p>@enderror
                            </div>

                            {{-- Post --}}
                            <div>
                                <label for="post_id" class="block text-base font-medium text-gray-700 dark:text-gray-300 mb-2">{{ __('site.applications.applied_post') }}</label>
                                <select id="post_id" name="post_id" class="w-full px-4 py-3 bg-gray-50 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-lg focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-red-500 transition duration-200 text-gray-900 dark:text-white" disabled>
                                    <option value="">{{ __('site.applications.select_post') }}</option>
                                </select>
                                @error('post_id')<p class="text-red-500 text-sm mt-1">{{ $message }}</p>@enderror
                            </div>

                            {{-- Block (conditional) --}}
                            <div id="block_wrapper" style="display: none;">
                                <label for="block_id" class="block text-base font-medium text-gray-700 dark:text-gray-300 mb-2">{{ __('site.applications.block') }}</label>
                                <select id="block_id" name="block_id" class="w-full px-4 py-3 bg-gray-50 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-lg focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-red-500 transition duration-200 text-gray-900 dark:text-white" disabled>
                                    <option value="">{{ __('site.applications.select_block') }}</option>
                                </select>
                            </div>

                            {{-- City (conditional) --}}
                            <div id="city_wrapper" style="display: none;">
                                <label for="city_id" class="block text-base font-medium text-gray-700 dark:text-gray-300 mb-2">{{ __('site.applications.city') }}</label>
                                <select id="city_id" name="city_id" class="w-full px-4 py-3 bg-gray-50 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-lg focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-red-500 transition duration-200 text-gray-900 dark:text-white" disabled>
                                    <option value="">{{ __('site.applications.select_city') }}</option>
                                </select>
                            </div>

                            {{-- Perur (conditional) --}}
                            <div id="perur_wrapper" style="display: none;">
                                <label for="perur_id" class="block text-base font-medium text-gray-700 dark:text-gray-300 mb-2">{{ __('site.applications.perur') }}</label>
                                <select id="perur_id" name="perur_id" class="w-full px-4 py-3 bg-gray-50 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-lg focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-red-500 transition duration-200 text-gray-900 dark:text-white" disabled>
                                    <option value="">{{ __('site.applications.select_perur') }}</option>
                                </select>
                            </div>

                            {{-- Paguthi (conditional) --}}
                            <div id="paguthi_wrapper" style="display: none;">
                                <label for="paguthi_id" class="block text-base font-medium text-gray-700 dark:text-gray-300 mb-2">{{ __('site.applications.paguthi') }}</label>
                                <select id="paguthi_id" name="paguthi_id" class="w-full px-4 py-3 bg-gray-50 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-lg focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-red-500 transition duration-200 text-gray-900 dark:text-white" disabled>
                                    <option value="">{{ __('site.applications.select_paguthi') }}</option>
                                </select>
                            </div>

                            {{-- Vattam (conditional) --}}
                            <div id="vattam_wrapper" style="display: none;">
                                <label for="vattam_id" class="block text-base font-medium text-gray-700 dark:text-gray-300 mb-2">{{ __('site.applications.vattam') }}</label>
                                <select id="vattam_id" name="vattam_id" class="w-full px-4 py-3 bg-gray-50 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-lg focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-red-500 transition duration-200 text-gray-900 dark:text-white" disabled>
                                    <option value="">{{ __('site.applications.select_vattam') }}</option>
                                </select>
                            </div>

                            {{-- Corporation (conditional) --}}
                            <div id="corporation_wrapper" style="display: none;">
                                <label for="corporation_id" class="block text-base font-medium text-gray-700 dark:text-gray-300 mb-2">{{ __('site.applications.corporation') }}</label>
                                <select id="corporation_id" name="corporation_id" class="w-full px-4 py-3 bg-gray-50 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-lg focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-red-500 transition duration-200 text-gray-900 dark:text-white" disabled>
                                    <option value="">{{ __('site.applications.select_corporation') }}</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    {{-- Photo Upload Section at Top --}}
                    <div class="border-b border-gray-200 dark:border-gray-700 pb-8">
                        <h3 class="text-2xl font-semibold text-gray-900 dark:text-white mb-6 flex items-center">
                            <svg class="w-6 h-6 mr-3 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                            </svg>
                            {{ __('site.applications.photo') }}
                        </h3>
                        <div class="max-w-md mx-auto">
                            <div class="relative">
                                <label for="photo" class="block text-base font-medium text-gray-700 dark:text-gray-300 mb-3 text-center">{{ __('site.applications.upload_photo') }}</label>
                                <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 dark:border-gray-600 border-dashed rounded-xl hover:border-red-500 dark:hover:border-red-500 transition-colors duration-200">
                                    <div class="space-y-1 text-center">
                                        <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48" aria-hidden="true">
                                            <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                        <div class="flex text-sm text-gray-600 dark:text-gray-400">
                                            <label for="photo" class="relative cursor-pointer bg-white dark:bg-gray-800 rounded-md font-medium text-red-600 hover:text-red-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-red-500">
                                                <span>Upload a file</span>
                                                <input id="photo" name="photo" type="file" accept="image/*" class="sr-only">
                                            </label>
                                            <p class="pl-1">or drag and drop</p>
                                        </div>
                                        <p class="text-xs text-gray-500 dark:text-gray-400">PNG, JPG, GIF up to 2MB</p>
                                    </div>
                                </div>
                                <div id="photo-preview" class="mt-4 text-center hidden">
                                    <img id="photo-preview-img" src="" alt="Photo preview" class="mx-auto h-48 w-48 object-cover rounded-lg border-4 border-red-600 shadow-lg">
                                </div>
                            </div>
                            @error('photo')<p class="text-red-500 text-sm mt-2 text-center">{{ $message }}</p>@enderror
                        </div>
                    </div>

                    {{-- Document Upload Section at Bottom --}}
                    <div class="border-b border-gray-200 dark:border-gray-700 pb-8">
                        <h3 class="text-2xl font-semibold text-gray-900 dark:text-white mb-6 flex items-center">
                            <svg class="w-6 h-6 mr-3 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                            </svg>
                            {{ __('site.applications.supporting_document') }}
                        </h3>
                        <div class="max-w-2xl mx-auto">
                            <label for="document" class="block text-base font-medium text-gray-700 dark:text-gray-300 mb-3 text-center">{{ __('site.applications.upload_documents') }}</label>
                            <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 dark:border-gray-600 border-dashed rounded-xl hover:border-red-500 dark:hover:border-red-500 transition-colors duration-200">
                                <div class="space-y-1 text-center w-full">
                                    <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z"/>
                                    </svg>
                                    <div class="flex text-sm text-gray-600 dark:text-gray-400 justify-center">
                                        <label for="document" class="relative cursor-pointer bg-white dark:bg-gray-800 rounded-md font-medium text-red-600 hover:text-red-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-red-500">
                                            <span>Upload a file</span>
                                            <input id="document" name="document" type="file" accept="application/pdf,image/*" class="sr-only">
                                        </label>
                                        <p class="pl-1">or drag and drop</p>
                                    </div>
                                    <p class="text-xs text-gray-500 dark:text-gray-400">PDF, PNG, JPG up to 5MB</p>
                                    <p class="text-xs text-gray-400 dark:text-gray-500 mt-2">(Identity proof, certificates, or other relevant documents)</p>
                                </div>
                            </div>
                            <div id="document-preview" class="mt-4 text-center hidden">
                                <div class="inline-flex items-center px-4 py-2 bg-gray-100 dark:bg-gray-700 rounded-lg">
                                    <svg class="w-5 h-5 mr-2 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                                    </svg>
                                    <span id="document-name" class="text-sm text-gray-700 dark:text-gray-300"></span>
                                </div>
                            </div>
                            @error('document')<p class="text-red-500 text-sm mt-2 text-center">{{ $message }}</p>@enderror
                        </div>
                    </div>

                    {{-- Submit Section --}}
                    <div>
                        <div class="text-center">
                            <button type="submit" class="inline-flex items-center justify-center bg-red-600 text-white px-10 py-3 rounded-lg font-semibold text-lg hover:bg-red-700 dark:hover:bg-red-500 transform hover:scale-105 hover:shadow-lg transition-all duration-300 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"/>
                                </svg>
                                {{ __('site.applications.submit_application') }}
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>

    @push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const currentLocale = '{{ app()->getLocale() }}';
            // Translations for JavaScript
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
                district_id: '{{ old('district_id', $application->district_id) }}',
                assembly_id: '{{ old('assembly_id', $application->assembly_id) }}',
                subbody_id: '{{ old('subbody_id', $application->subbody_id) }}',
                post_id: '{{ old('post_id', $application->post_id) }}',
                block_id: '{{ old('block_id', $application->block_id) }}',
                city_id: '{{ old('city_id', $application->city_id) }}',
                perur_id: '{{ old('perur_id', $application->perur_id) }}',
                paguthi_id: '{{ old('paguthi_id', $application->paguthi_id) }}',
                vattam_id: '{{ old('vattam_id', $application->vattam_id) }}',
                corporation_id: '{{ old('corporation_id', $application->corporation_id) }}'
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

                // Show and populate relevant fields based on posting stage
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

                // Populate subbody and post based on postingstage
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
                    handlePostingstageChange(); // Refresh conditional fields
                } else {
                    populateOptions(assemblySelect, [], translations.selectAssembly);
                    hideAllConditionalFields();
                }
            });

            postingstageSelect.addEventListener('change', handlePostingstageChange);

            // Initial population on page load
            const oldStateId = '{{ old('state_id', $application->state_id) }}';
            const oldPostingstageId = '{{ old('postingstage_id', $application->postingstage_id) }}';

            if (oldStateId) {
                stateSelect.value = oldStateId;
                fetchAndPopulate(`/api/districts/${oldStateId}`, districtSelect, translations.selectDistrict, oldValues.district_id);

                // Wait a bit before triggering assembly and postingstage
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
        });
    </script>
    @endpush
@endsection
