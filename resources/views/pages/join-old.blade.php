@extends('layouts.app')

@section('title', __('site.join.title'))

@section('content')
    {{-- Page Header --}}
    <section class="relative bg-gray-900 dark:bg-gray-950 py-24 md:py-32">
        <div class="relative max-w-7xl mx-auto px-4 text-center">
            <h1 class="text-5xl md:text-6xl font-extrabold text-white mb-4">{{ __('site.join.title') }}</h1>
            <p class="text-xl text-gray-300 max-w-3xl mx-auto">{{ __('site.join.subtitle') }}</p>
        </div>
    </section>

    {{-- Join Form Section --}}
    <section class="py-20 lg:py-28 px-4 bg-gray-100 dark:bg-gray-900">
        <div class="max-w-4xl mx-auto">
            <div class="bg-white dark:bg-gray-800 rounded-xl shadow-2xl p-8 lg:p-12">
                <div class="text-center mb-10">
                    <h2 class="text-3xl lg:text-4xl font-extrabold text-gray-900 dark:text-white mb-3">{{ __('site.join.form_title') }}</h2>
                    <p class="text-lg text-gray-600 dark:text-gray-400">{{ __('site.join.form_description') }}</p>
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


                <form action="{{ route('join.store') }}" method="POST" enctype="multipart/form-data" class="space-y-10" id="joinForm">
                    @csrf

                    {{-- Honeypot field - hidden from users, bots will fill it --}}
                    <input type="text" name="website" id="website" style="position:absolute;left:-9999px;width:1px;height:1px;" tabindex="-1" autocomplete="off">

                    {{-- Timestamp for form submission validation --}}
                    <input type="hidden" name="form_timestamp" value="{{ time() }}">

                    {{-- Personal Information Section --}}
                    <div class="border-b border-gray-200 dark:border-gray-700 pb-8">
                        <h3 class="text-2xl font-semibold text-gray-900 dark:text-white mb-6 flex items-center">
                             <svg class="w-6 h-6 mr-3 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                            </svg>
                            {{ __('site.join.personal_info') }}
                        </h3>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            {{-- Name --}}
                            <div>
                                <label for="name" class="block text-base font-medium text-gray-700 dark:text-gray-300 mb-2">{{ __('site.join.name') }} <span class="text-red-500">*</span></label>
                                <input type="text" id="name" name="name" value="{{ old('name') }}" class="w-full px-4 py-3 bg-gray-50 dark:bg-gray-700 border @error('name') border-red-500 @else border-gray-300 dark:border-gray-600 @enderror rounded-lg focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-red-500 transition duration-200 text-gray-900 dark:text-white dark:placeholder-gray-400" required>
                                @error('name')<p class="text-red-500 text-sm mt-1">{{ $message }}</p>@enderror
                            </div>
                            {{-- Father's Name --}}
                            <div>
                                <label for="father_name" class="block text-base font-medium text-gray-700 dark:text-gray-300 mb-2">{{ __('site.join.father_name') }}</label>
                                <input type="text" id="father_name" name="father_name" value="{{ old('father_name') }}" class="w-full px-4 py-3 bg-gray-50 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-lg focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-red-500 transition duration-200 text-gray-900 dark:text-white dark:placeholder-gray-400">
                                {{-- No error display needed if not required --}}
                            </div>
                            {{-- Phone --}}
                            <div>
                                <label for="phone_no" class="block text-base font-medium text-gray-700 dark:text-gray-300 mb-2">{{ __('site.join.phone') }} <span class="text-red-500">*</span></label>
                                <input type="tel" id="phone_no" name="phone_no" value="{{ old('phone_no') }}" class="w-full px-4 py-3 bg-gray-50 dark:bg-gray-700 border @error('phone_no') border-red-500 @else border-gray-300 dark:border-gray-600 @enderror rounded-lg focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-red-500 transition duration-200 text-gray-900 dark:text-white dark:placeholder-gray-400" required>
                                @error('phone_no')<p class="text-red-500 text-sm mt-1">{{ $message }}</p>@enderror
                                <button type="button" id="verifyPhoneBtn" class="mt-2 px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white text-sm font-medium rounded-lg transition duration-200 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                                    <svg class="w-4 h-4 inline-block mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path></svg>
                                    Verify Mobile Number
                                </button>
                                <input type="hidden" id="phoneVerified" name="phone_verified" value="0">
                            </div>
                            {{-- Email --}}
                            <div>
                                <label for="email_id" class="block text-base font-medium text-gray-700 dark:text-gray-300 mb-2">{{ __('site.join.email') }} <span class="text-red-500">*</span></label>
                                <input type="email" id="email_id" name="email_id" value="{{ old('email_id') }}" class="w-full px-4 py-3 bg-gray-50 dark:bg-gray-700 border @error('email_id') border-red-500 @else border-gray-300 dark:border-gray-600 @enderror rounded-lg focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-red-500 transition duration-200 text-gray-900 dark:text-white dark:placeholder-gray-400" required>
                                @error('email_id')<p class="text-red-500 text-sm mt-1">{{ $message }}</p>@enderror
                            </div>
                            {{-- DOB --}}
                            <div>
                                <label for="dob" class="block text-base font-medium text-gray-700 dark:text-gray-300 mb-2">{{ __('site.join.dob') }}</label>
                                <input type="date" id="dob" name="dob" value="{{ old('dob') }}" class="w-full px-4 py-3 bg-gray-50 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-lg focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-red-500 transition duration-200 text-gray-900 dark:text-white dark:placeholder-gray-400">
                            </div>
                            {{-- Gender --}}
                            <div>
                                <label for="gender" class="block text-base font-medium text-gray-700 dark:text-gray-300 mb-2">{{ __('site.join.gender') }}</label>
                                <select id="gender" name="gender" class="w-full px-4 py-3 bg-gray-50 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-lg focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-red-500 transition duration-200 text-gray-900 dark:text-white">
                                    <option value="">{{ __('site.join.select_gender') }}</option>
                                    <option value="Male" {{ old('gender') == 'Male' ? 'selected' : '' }}>{{ __('site.join.male') }}</option>
                                    <option value="Female" {{ old('gender') == 'Female' ? 'selected' : '' }}>{{ __('site.join.female') }}</option>
                                    <option value="Other" {{ old('gender') == 'Other' ? 'selected' : '' }}>{{ __('site.join.other') }}</option>
                                </select>
                            </div>
                             {{-- Blood Group --}}
                            <div>
                                <label for="blood_group" class="block text-base font-medium text-gray-700 dark:text-gray-300 mb-2">{{ __('site.join.blood_group') }}</label>
                                <select id="blood_group" name="blood_group" class="w-full px-4 py-3 bg-gray-50 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-lg focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-red-500 transition duration-200 text-gray-900 dark:text-white">
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
                             {{-- Voter ID --}}
                            <div>
                                <label for="voterid" class="block text-base font-medium text-gray-700 dark:text-gray-300 mb-2">{{ __('site.join.voter_id') }}</label>
                                <input type="text" id="voterid" name="voterid" value="{{ old('voterid') }}" class="w-full px-4 py-3 bg-gray-50 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-lg focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-red-500 transition duration-200 text-gray-900 dark:text-white dark:placeholder-gray-400" placeholder="e.g., ABC1234567">
                            </div>
                            {{-- Aadhar Number --}}
                            <div>
                                <label for="aadhar_no" class="block text-base font-medium text-gray-700 dark:text-gray-300 mb-2">{{ __('site.join.aadhar_number') }}</label>
                                <input type="text" id="aadhar_no" name="aadhar_no" value="{{ old('aadhar_no') }}" inputmode="numeric" pattern="\d*" maxlength="12" class="w-full px-4 py-3 bg-gray-50 dark:bg-gray-700 border @error('aadhar_no') border-red-500 @else border-gray-300 dark:border-gray-600 @enderror rounded-lg focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-red-500 transition duration-200 text-gray-900 dark:text-white dark:placeholder-gray-400" placeholder="12 digit Aadhar number">
                                @error('aadhar_no')<p class="text-red-500 text-sm mt-1">{{ $message }}</p>@enderror
                            </div>
                        </div>
                    </div>

                    {{-- Address Information Section --}}
                    <div class="border-b border-gray-200 dark:border-gray-700 pb-8">
                         <h3 class="text-2xl font-semibold text-gray-900 dark:text-white mb-6 flex items-center">
                            <svg class="w-6 h-6 mr-3 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path></svg>
                            {{ __('site.join.address_info') }}
                        </h3>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            {{-- Address --}}
                            <div class="md:col-span-2">
                                <label for="address" class="block text-base font-medium text-gray-700 dark:text-gray-300 mb-2">{{ __('site.join.address') }}</label>
                                <textarea id="address" name="address" rows="3" class="w-full px-4 py-3 bg-gray-50 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-lg focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-red-500 transition duration-200 resize-none text-gray-900 dark:text-white dark:placeholder-gray-400">{{ old('address') }}</textarea>
                            </div>
                            {{-- Pincode --}}
                            <div>
                                <label for="pincode" class="block text-base font-medium text-gray-700 dark:text-gray-300 mb-2">{{ __('site.join.pincode') }}</label>
                                <input type="text" id="pincode" name="pincode" value="{{ old('pincode') }}" class="w-full px-4 py-3 bg-gray-50 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-lg focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-red-500 transition duration-200 text-gray-900 dark:text-white dark:placeholder-gray-400" maxlength="6" pattern="\d{6}">
                            </div>
                            {{-- Photo Upload --}}
                            <div>
                                <label for="photo" class="block text-base font-medium text-gray-700 dark:text-gray-300 mb-2">{{ __('site.join.photo') }}</label>
                                <input type="file" id="photo" name="photo" accept="image/*" class="block w-full text-sm text-gray-500 dark:text-gray-400 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-red-50 file:text-red-700 hover:file:bg-red-100 dark:file:bg-red-900/40 dark:file:text-red-300 dark:hover:file:bg-red-900/60 transition duration-200">
                                <p class="text-sm text-gray-500 dark:text-gray-400 mt-1">{{ __('site.join.photo_help') }}</p>
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
                            {{ __('site.join.location_info') }}
                        </h3>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            {{-- State --}}
                            <div>
                                <label for="state_id" class="block text-base font-medium text-gray-700 dark:text-gray-300 mb-2">{{ __('site.join.state') }}</label>
                                <select id="state_id" name="state_id" class="w-full px-4 py-3 bg-gray-50 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-lg focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-red-500 transition duration-200 text-gray-900 dark:text-white">
                                    <option value="">{{ __('site.join.select_state') }}</option>
                                    @foreach(\App\Models\State::all() as $state)
                                        <option value="{{ $state->id }}" {{ old('state_id') == $state->id ? 'selected' : '' }}>{{ $state->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            {{-- District --}}
                            <div>
                                <label for="district_id" class="block text-base font-medium text-gray-700 dark:text-gray-300 mb-2">{{ __('site.join.district') }}</label>
                                <select id="district_id" name="district_id" class="w-full px-4 py-3 bg-gray-50 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-lg focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-red-500 transition duration-200 text-gray-900 dark:text-white" disabled>
                                    <option value="">{{ __('site.join.select_district') }}</option>
                                </select>
                            </div>
                            {{-- Assembly --}}
                             <div>
                                <label for="assembly_id" class="block text-base font-medium text-gray-700 dark:text-gray-300 mb-2">{{ __('site.join.assembly') }}</label>
                                <select id="assembly_id" name="assembly_id" class="w-full px-4 py-3 bg-gray-50 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-lg focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-red-500 transition duration-200 text-gray-900 dark:text-white" disabled>
                                    <option value="">{{ __('site.join.select_assembly') }}</option>
                                </select>
                            </div>
                            {{-- Place Type --}}
                            <div>
                                <label for="place_type" class="block text-base font-medium text-gray-700 dark:text-gray-300 mb-2">{{ __('site.join.place_type') }}</label>
                                <select id="place_type" name="place_type" class="w-full px-4 py-3 bg-gray-50 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-lg focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-red-500 transition duration-200 text-gray-900 dark:text-white">
                                    <option value="">{{ __('site.join.select_place_type') }}</option>
                                    <option value="ஊராட்சி ஒன்றியம்" @if(old('place_type') == 'ஊராட்சி ஒன்றியம்') selected @endif>{{ __('site.join.block') }}</option>
                                    <option value="பேரூராட்சி" @if(old('place_type') == 'பேரூராட்சி') selected @endif>{{ __('site.join.perur') }}</option>
                                    <option value="நகராட்சி" @if(old('place_type') == 'நகராட்சி') selected @endif>{{ __('site.join.city') }}</option>
                                    <option value="மாநகராட்சி" @if(old('place_type') == 'மாநகராட்சி') selected @endif>{{ __('site.join.corporation') }}</option>
                                </select>
                            </div>
                            {{-- Dynamic Place Selects --}}
                            <div id="block_id_wrapper" style="display: none;">
                                <label for="block_id" class="block text-base font-medium text-gray-700 dark:text-gray-300 mb-2">{{ __('site.join.block') }}</label>
                                <select id="block_id" name="block_id" class="w-full px-4 py-3 bg-gray-50 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-lg focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-red-500 transition duration-200 text-gray-900 dark:text-white" disabled>
                                    <option value="">{{ __('site.join.select_block') }}</option>
                                </select></div>
                            <div id="perur_id_wrapper" style="display: none;">
                                <label for="perur_id" class="block text-base font-medium text-gray-700 dark:text-gray-300 mb-2">{{ __('site.join.perur') }}</label>
                                <select id="perur_id" name="perur_id" class="w-full px-4 py-3 bg-gray-50 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-lg focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-red-500 transition duration-200 text-gray-900 dark:text-white" disabled>
                                    <option value="">{{ __('site.join.select_perur') }}</option>
                                </select>
                            </div>
                            <div id="city_id_wrapper" style="display: none;">
                                <label for="city_id" class="block text-base font-medium text-gray-700 dark:text-gray-300 mb-2">{{ __('site.join.city') }}</label>
                                <select id="city_id" name="city_id" class="w-full px-4 py-3 bg-gray-50 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-lg focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-red-500 transition duration-200 text-gray-900 dark:text-white" disabled>
                                    <option value="">{{ __('site.join.select_city') }}</option>
                                </select>
                            </div>
                            <div id="corporation_id_wrapper" style="display: none;">
                                <label for="corporation_id" class="block text-base font-medium text-gray-700 dark:text-gray-300 mb-2">{{ __('site.join.corporation') }}</label>
                                <select id="corporation_id" name="corporation_id" class="w-full px-4 py-3 bg-gray-50 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-lg focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-red-500 transition duration-200 text-gray-900 dark:text-white" disabled>
                                    <option value="">{{ __('site.join.select_corporation') }}</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    {{-- Terms and Submit Section --}}
                    <div>
                         <h3 class="text-2xl font-semibold text-gray-900 dark:text-white mb-6 flex items-center">
                            <svg class="w-6 h-6 mr-3 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                            {{ __('site.join.final_step') }} {{-- Assuming a translation key like this exists --}}
                        </h3>
                        <div class="flex items-start mb-6">
                            <input id="terms" name="terms" type="checkbox" class="mt-1 h-5 w-5 text-red-600 focus:ring-red-500 border-gray-300 dark:border-gray-600 rounded dark:bg-gray-700 dark:focus:ring-offset-gray-800" required>
                            <label for="terms" class="ml-3 text-base text-gray-700 dark:text-gray-300">
                                {{ __('site.join.terms_agreement') }} <span class="text-red-500">*</span>
                            </label>
                        </div>

                        <div class="text-center">
                            <button type="submit" class="inline-flex items-center justify-center bg-red-600 text-white px-10 py-3 rounded-lg font-semibold text-lg hover:bg-red-700 dark:hover:bg-red-500 transform hover:scale-105 hover:shadow-lg transition-all duration-300 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"/>
                                </svg>
                                {{ __('site.join.submit_application') }}
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>

    {{-- Include OTP Modal --}}
    @include('components.otp-modal')

 {{-- Keep existing script --}}
 @push('scripts')
 {{-- Include OTP Verification JavaScript --}}
 <script src="{{ asset('js/otp-verification.js') }}"></script>

 <script>
    document.addEventListener('DOMContentLoaded', function() {
        // ... (Keep ALL your existing JavaScript code for dynamic dropdowns) ...
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
             select.innerHTML = `<option value="">${placeholder}</option>`; // Use placeholder text
            if (data && Array.isArray(data)) {
                data.forEach(item => {
                    const itemName = currentLocale === 'en' ? (item.name_en || item.name) : (item.name_ta || item.name); // Handle potential missing names
                    const selected = (item.id == oldValue) ? 'selected' : '';
                    if (itemName) { // Only add if name exists
                       select.innerHTML += `<option value="${item.id}" ${selected}>${itemName}</option>`;
                    }
                });
            }
             select.disabled = !(data && data.length > 0); // Disable if no options
        }


        function populatePlace(placeType, districtId) {
            const select = selects[placeType];
            const wrapper = wrappers[placeType];
            const oldValue = oldValues[placeType];
            let url = '';
            let placeholder = '';

            if (!placeType || !districtId || !select || !wrapper) return;

             // Ensure select is enabled before fetching
             select.disabled = true;
             wrapper.style.display = 'block'; // Show wrapper while loading

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
                         // Re-select old value if it exists after populating
                         if(oldValue && select.querySelector(`option[value="${oldValue}"]`)) {
                             select.value = oldValue;
                         }
                    })
                    .catch(error => {
                        console.error(`Error fetching ${placeType}:`, error);
                         populateOptions(select, [], placeholder, null); // Clear on error, keep disabled
                         wrapper.style.display = 'block'; // Keep wrapper visible to show empty select
                    });
            } else {
                 populateOptions(select, [], placeholder, null); // Clear if no URL
                 wrapper.style.display = 'block'; // Keep wrapper visible
            }
        }


        function handlePlaceTypeChange() {
            const placeType = placeTypeSelect.value;
            const districtId = districtSelect.value;

            // Hide all dynamic wrappers and disable selects first
            for (const key in wrappers) {
                if (wrappers[key]) wrappers[key].style.display = 'none';
                if (selects[key]) {
                     selects[key].innerHTML = `<option value="">Select...</option>`; // Generic placeholder
                     selects[key].disabled = true;
                }
            }

            if (placeType && districtId && wrappers[placeType]) {
                // wrappers[placeType].style.display = 'block'; // Moved to populatePlace
                populatePlace(placeType, districtId);
            }
        }

        function populateDistricts(stateId, callback) {
            const placeholder = '{{ __("site.join.select_district") }}';
            if (!stateId) {
                populateOptions(districtSelect, [], placeholder, null);
                populateOptions(assemblySelect, [], '{{ __("site.join.select_assembly") }}', null);
                handlePlaceTypeChange(); // Reset place type section
                if (callback) callback();
                return;
            }

            fetch(`/api/districts/${stateId}`)
                .then(response => response.ok ? response.json() : Promise.reject('Network response was not ok.'))
                .then(data => {
                    const oldDistrictId = '{{ old('district_id') }}';
                    populateOptions(districtSelect, data, placeholder, oldDistrictId);
                    // If oldDistrictId exists, trigger change to load assemblies
                    if (oldDistrictId && districtSelect.querySelector(`option[value="${oldDistrictId}"]`)) {
                         districtSelect.value = oldDistrictId; // Set value before dispatching
                         // Delay slightly to ensure DOM updates before triggering next fetch
                         setTimeout(() => {
                            districtSelect.dispatchEvent(new Event('change'));
                            if (callback) callback();
                         }, 50);
                    } else {
                        // If no oldDistrictId, still need to reset assembly & place type
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
                     // If oldAssemblyId exists, set it
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
            // Reset downstream selects immediately on state change
            populateOptions(assemblySelect, [], '{{ __("site.join.select_assembly") }}', null);
            handlePlaceTypeChange(); // This also resets dynamic place selects
        });

        districtSelect.addEventListener('change', function() {
            populateAssemblies(this.value);
            // Reset place type select when district changes, then trigger its logic
            handlePlaceTypeChange();
        });

        placeTypeSelect.addEventListener('change', handlePlaceTypeChange);

        // --- Initial population on page load ---
        const oldStateId = '{{ old('state_id') }}';
         const oldPlaceType = '{{ old('place_type') }}';

         if (oldStateId) {
             stateSelect.value = oldStateId;
             populateDistricts(oldStateId, () => {
                 // This callback runs *after* districts (and potentially assemblies) are populated/selected based on old values
                 if (oldPlaceType) {
                     placeTypeSelect.value = oldPlaceType;
                     // Ensure district has a value before triggering place type population
                     if (districtSelect.value) {
                         handlePlaceTypeChange();
                     }
                 }
             });
         } else {
              // If no old state, ensure everything below is reset/disabled
              populateOptions(districtSelect, [], '{{ __("site.join.select_district") }}', null);
              populateOptions(assemblySelect, [], '{{ __("site.join.select_assembly") }}', null);
              handlePlaceTypeChange();
         }

        // --- OTP Verification Integration ---
        const verifyPhoneBtn = document.getElementById('verifyPhoneBtn');
        if (verifyPhoneBtn) {
            verifyPhoneBtn.addEventListener('click', function() {
                const phoneInput = document.getElementById('phone_no');
                const phoneNumber = phoneInput ? phoneInput.value.trim() : '';

                if (!phoneNumber) {
                    alert('Please enter your mobile number first.');
                    return;
                }

                // Validate phone format
                if (!/^[6-9][0-9]{9}$/.test(phoneNumber)) {
                    alert('Please enter a valid 10-digit Indian mobile number.');
                    return;
                }

                // Open OTP modal
                if (typeof otpVerification !== 'undefined') {
                    otpVerification.openModal(phoneNumber);
                } else {
                    alert('OTP verification system is not loaded. Please refresh the page.');
                }
            });
        }

        // Listen for successful verification
        window.addEventListener('otpVerified', function(e) {
            const phoneVerifiedInput = document.getElementById('phoneVerified');
            const verifyBtn = document.getElementById('verifyPhoneBtn');

            if (phoneVerifiedInput) {
                phoneVerifiedInput.value = '1';
            }

            if (verifyBtn) {
                verifyBtn.classList.remove('bg-blue-600', 'hover:bg-blue-700');
                verifyBtn.classList.add('bg-green-600', 'cursor-not-allowed');
                verifyBtn.innerHTML = '<svg class="w-4 h-4 inline-block mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>Mobile Verified';
                verifyBtn.disabled = true;
            }
        });

        // --- Client-Side Validation ---
        const form = document.getElementById('joinForm');

        form.addEventListener('submit', function(e) {
            // Check OTP verification
            const phoneVerifiedInput = document.getElementById('phoneVerified');
            let phoneInput = document.getElementById('phone_no');

            if (!phoneVerifiedInput || phoneVerifiedInput.value !== '1') {
                e.preventDefault();
                alert('Please verify your mobile number before submitting the form.');
                if (phoneInput) phoneInput.focus();
                return false;
            }

            // Validate phone number format (Indian)
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

            // Validate Aadhar number format
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

            // Validate Voter ID format
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

            // Validate name format
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

            // Disable submit button to prevent double submission
            const submitBtn = form.querySelector('button[type="submit"]');
            if (submitBtn) {
                submitBtn.disabled = true;
                submitBtn.innerHTML = '<svg class="animate-spin h-5 w-5 mr-2 inline-block" fill="none" stroke="currentColor" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path></svg> Submitting...';
            }
        });

        // Prevent form resubmission on page reload
        if (window.history.replaceState) {
            window.history.replaceState(null, null, window.location.href);
        }
    });
</script>
 @endpush
@endsection