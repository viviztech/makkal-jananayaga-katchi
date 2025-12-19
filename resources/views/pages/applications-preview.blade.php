@extends('layouts.app')

@section('title', __('site.applications.preview_title'))

@section('content')
    {{-- Page Header --}}
    <section class="relative bg-gray-900 dark:bg-gray-950 py-24 md:py-32">
        <div class="relative max-w-7xl mx-auto px-4 text-center">
            <h1 class="text-5xl md:text-6xl font-extrabold text-white mb-4">{{ __('site.applications.preview_title') }}</h1>
            <p class="text-xl text-gray-300 max-w-3xl mx-auto">{{ __('site.applications.preview_subtitle') }}</p>
        </div>
    </section>

    {{-- Preview Section --}}
    <section class="py-20 lg:py-28 px-4 bg-gray-100 dark:bg-gray-900">
        <div class="max-w-6xl mx-auto">
            <div class="bg-white dark:bg-gray-800 rounded-xl shadow-2xl p-8 lg:p-12">
                {{-- Success Message --}}
                @if(session('success'))
                    <div class="mb-6 p-4 flex items-start bg-green-50 dark:bg-green-900/30 border border-green-200 dark:border-green-800 text-green-700 dark:text-green-300 rounded-lg">
                        <svg class="w-5 h-5 mr-3 flex-shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>
                        <span>{{ session('success') }}</span>
                    </div>
                @endif

                <div class="text-center mb-10">
                    <h2 class="text-3xl lg:text-4xl font-extrabold text-gray-900 dark:text-white mb-3">{{ __('site.applications.verify_details') }}</h2>
                    <p class="text-lg text-gray-600 dark:text-gray-400">{{ __('site.applications.verify_description') }}</p>
                </div>

                {{-- Application Details --}}
                <div class="space-y-8">
                    {{-- Photo Section --}}
                    @if($application->photo_url)
                    <div class="flex justify-center pb-8 border-b border-gray-200 dark:border-gray-700">
                        <div class="text-center">
                            <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-4">{{ __('site.applications.photo') }}</h3>
                            <img src="{{ $application->photo_url }}" alt="{{ $application->name }}" class="h-48 w-48 object-cover rounded-lg border-4 border-red-600 shadow-lg mx-auto">
                        </div>
                    </div>
                    @endif

                    {{-- Personal Information --}}
                    <div class="pb-8 border-b border-gray-200 dark:border-gray-700">
                        <h3 class="text-2xl font-semibold text-gray-900 dark:text-white mb-6 flex items-center">
                            <svg class="w-6 h-6 mr-3 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                            </svg>
                            {{ __('site.applications.personal_info') }}
                        </h3>
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                            <div>
                                <p class="text-sm font-medium text-gray-500 dark:text-gray-400">{{ __('site.applications.full_name') }}</p>
                                <p class="mt-1 text-base text-gray-900 dark:text-white font-semibold">{{ $application->name }}</p>
                            </div>
                            @if($application->membership_id)
                            <div>
                                <p class="text-sm font-medium text-gray-500 dark:text-gray-400">{{ app()->getLocale() === 'ta' ? 'உறுப்பினர் ஐடி' : 'Membership ID' }}</p>
                                <p class="mt-1 text-base text-gray-900 dark:text-white font-semibold">{{ $application->membership_id }}</p>
                            </div>
                            @endif
                            @if($application->aadhar_no)
                            <div>
                                <p class="text-sm font-medium text-gray-500 dark:text-gray-400">{{ app()->getLocale() === 'ta' ? 'ஆதார் எண்' : 'Aadhar Number' }}</p>
                                <p class="mt-1 text-base text-gray-900 dark:text-white font-semibold">{{ $application->aadhar_no }}</p>
                            </div>
                            @endif
                            @if($application->voterid_no)
                            <div>
                                <p class="text-sm font-medium text-gray-500 dark:text-gray-400">{{ app()->getLocale() === 'ta' ? 'வோட்டர் ஐடி' : 'Voter ID' }}</p>
                                <p class="mt-1 text-base text-gray-900 dark:text-white font-semibold">{{ $application->voterid_no }}</p>
                            </div>
                            @endif
                            @if($application->father_name)
                            <div>
                                <p class="text-sm font-medium text-gray-500 dark:text-gray-400">{{ __('site.applications.fathers_name') }}</p>
                                <p class="mt-1 text-base text-gray-900 dark:text-white font-semibold">{{ $application->father_name }}</p>
                            </div>
                            @endif
                            @if($application->mother_name)
                            <div>
                                <p class="text-sm font-medium text-gray-500 dark:text-gray-400">{{ __('site.applications.mothers_name') }}</p>
                                <p class="mt-1 text-base text-gray-900 dark:text-white font-semibold">{{ $application->mother_name }}</p>
                            </div>
                            @endif
                            @if($application->spouse_name)
                            <div>
                                <p class="text-sm font-medium text-gray-500 dark:text-gray-400">{{ __('site.applications.spouse_name') }}</p>
                                <p class="mt-1 text-base text-gray-900 dark:text-white font-semibold">{{ $application->spouse_name }}</p>
                            </div>
                            @endif
                            @if($application->dob)
                            <div>
                                <p class="text-sm font-medium text-gray-500 dark:text-gray-400">{{ __('site.applications.date_of_birth') }}</p>
                                <p class="mt-1 text-base text-gray-900 dark:text-white font-semibold">{{ \Carbon\Carbon::parse($application->dob)->format('d-m-Y') }}</p>
                            </div>
                            @endif
                            @if($application->gender)
                            <div>
                                <p class="text-sm font-medium text-gray-500 dark:text-gray-400">{{ __('site.applications.gender') }}</p>
                                <p class="mt-1 text-base text-gray-900 dark:text-white font-semibold">{{ $application->gender }}</p>
                            </div>
                            @endif
                            @if($application->education)
                            <div>
                                <p class="text-sm font-medium text-gray-500 dark:text-gray-400">{{ __('site.applications.education') }}</p>
                                <p class="mt-1 text-base text-gray-900 dark:text-white font-semibold">{{ $application->education }}</p>
                            </div>
                            @endif
                            @if($application->occupation)
                            <div>
                                <p class="text-sm font-medium text-gray-500 dark:text-gray-400">{{ __('site.applications.occupation') }}</p>
                                <p class="mt-1 text-base text-gray-900 dark:text-white font-semibold">{{ $application->occupation }}</p>
                            </div>
                            @endif
                            @if($application->marital_status)
                            <div>
                                <p class="text-sm font-medium text-gray-500 dark:text-gray-400">{{ __('site.applications.marital_status') }}</p>
                                <p class="mt-1 text-base text-gray-900 dark:text-white font-semibold">{{ $application->marital_status }}</p>
                            </div>
                            @endif
                            @if($application->social_category)
                            <div>
                                <p class="text-sm font-medium text-gray-500 dark:text-gray-400">{{ __('site.applications.social_category') }}</p>
                                <p class="mt-1 text-base text-gray-900 dark:text-white font-semibold">{{ $application->social_category }}</p>
                            </div>
                            @endif
                            @if($application->joining_date)
                            <div>
                                <p class="text-sm font-medium text-gray-500 dark:text-gray-400">{{ __('site.applications.joining_date') }}</p>
                                <p class="mt-1 text-base text-gray-900 dark:text-white font-semibold">{{ \Carbon\Carbon::parse($application->joining_date)->format('d-m-Y') }}</p>
                            </div>
                            @endif
                            @if($application->current_post)
                            <div>
                                <p class="text-sm font-medium text-gray-500 dark:text-gray-400">{{ __('site.applications.current_post') }}</p>
                                <p class="mt-1 text-base text-gray-900 dark:text-white font-semibold">{{ $application->current_post }}</p>
                            </div>
                            @endif
                            @if($application->mobile_number)
                            <div>
                                <p class="text-sm font-medium text-gray-500 dark:text-gray-400">{{ __('site.applications.mobile_number') }}</p>
                                <p class="mt-1 text-base text-gray-900 dark:text-white font-semibold">{{ $application->mobile_number }}</p>
                            </div>
                            @endif
                            @if($application->email_id)
                            <div>
                                <p class="text-sm font-medium text-gray-500 dark:text-gray-400">{{ __('site.applications.email_id') }}</p>
                                <p class="mt-1 text-base text-gray-900 dark:text-white font-semibold">{{ $application->email_id }}</p>
                            </div>
                            @endif
                            @if($application->address)
                            <div class="md:col-span-2 lg:col-span-3">
                                <p class="text-sm font-medium text-gray-500 dark:text-gray-400">{{ __('site.applications.address') }}</p>
                                <p class="mt-1 text-base text-gray-900 dark:text-white font-semibold">{{ $application->address }}</p>
                            </div>
                            @endif
                        </div>
                    </div>

                    {{-- Location Information --}}
                    <div class="pb-8 border-b border-gray-200 dark:border-gray-700">
                        <h3 class="text-2xl font-semibold text-gray-900 dark:text-white mb-6 flex items-center">
                            <svg class="w-6 h-6 mr-3 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                            </svg>
                            {{ __('site.applications.location_position_info') }}
                        </h3>
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                            @if($application->state)
                            <div>
                                <p class="text-sm font-medium text-gray-500 dark:text-gray-400">{{ __('site.applications.state') }}</p>
                                <p class="mt-1 text-base text-gray-900 dark:text-white font-semibold">{{ app()->getLocale() === 'en' ? $application->state->name_en : $application->state->name_ta }}</p>
                            </div>
                            @endif
                            @if($application->district)
                            <div>
                                <p class="text-sm font-medium text-gray-500 dark:text-gray-400">{{ __('site.applications.district') }}</p>
                                <p class="mt-1 text-base text-gray-900 dark:text-white font-semibold">{{ app()->getLocale() === 'en' ? $application->district->name_en : $application->district->name_ta }}</p>
                            </div>
                            @endif
                            @if($application->assembly)
                            <div>
                                <p class="text-sm font-medium text-gray-500 dark:text-gray-400">{{ __('site.applications.assembly') }}</p>
                                <p class="mt-1 text-base text-gray-900 dark:text-white font-semibold">{{ app()->getLocale() === 'en' ? $application->assembly->name_en : $application->assembly->name_ta }}</p>
                            </div>
                            @endif
                            @if($application->postingstage)
                            <div>
                                <p class="text-sm font-medium text-gray-500 dark:text-gray-400">{{ __('site.applications.posting_stage') }}</p>
                                <p class="mt-1 text-base text-gray-900 dark:text-white font-semibold">{{ app()->getLocale() === 'en' ? $application->postingstage->name_en : $application->postingstage->name_ta }}</p>
                            </div>
                            @endif
                            @if($application->subbody)
                            <div>
                                <p class="text-sm font-medium text-gray-500 dark:text-gray-400">{{ __('site.applications.sub_body') }}</p>
                                <p class="mt-1 text-base text-gray-900 dark:text-white font-semibold">{{ app()->getLocale() === 'en' ? $application->subbody->name_en : $application->subbody->name_ta }}</p>
                            </div>
                            @endif
                            @if($application->post)
                            <div>
                                <p class="text-sm font-medium text-gray-500 dark:text-gray-400">{{ __('site.applications.applied_post') }}</p>
                                <p class="mt-1 text-base text-gray-900 dark:text-white font-semibold">{{ app()->getLocale() === 'en' ? $application->post->name_en : $application->post->name_ta }}</p>
                            </div>
                            @endif
                            @if($application->block)
                            <div>
                                <p class="text-sm font-medium text-gray-500 dark:text-gray-400">{{ __('site.applications.block') }}</p>
                                <p class="mt-1 text-base text-gray-900 dark:text-white font-semibold">{{ app()->getLocale() === 'en' ? $application->block->name_en : $application->block->name_ta }}</p>
                            </div>
                            @endif
                            @if($application->city)
                            <div>
                                <p class="text-sm font-medium text-gray-500 dark:text-gray-400">{{ __('site.applications.city') }}</p>
                                <p class="mt-1 text-base text-gray-900 dark:text-white font-semibold">{{ app()->getLocale() === 'en' ? $application->city->name_en : $application->city->name_ta }}</p>
                            </div>
                            @endif
                            @if($application->perur)
                            <div>
                                <p class="text-sm font-medium text-gray-500 dark:text-gray-400">{{ __('site.applications.perur') }}</p>
                                <p class="mt-1 text-base text-gray-900 dark:text-white font-semibold">{{ app()->getLocale() === 'en' ? $application->perur->name_en : $application->perur->name_ta }}</p>
                            </div>
                            @endif
                            @if($application->paguthi)
                            <div>
                                <p class="text-sm font-medium text-gray-500 dark:text-gray-400">{{ __('site.applications.paguthi') }}</p>
                                <p class="mt-1 text-base text-gray-900 dark:text-white font-semibold">{{ app()->getLocale() === 'en' ? $application->paguthi->name_en : $application->paguthi->name_ta }}</p>
                            </div>
                            @endif
                            @if($application->vattam)
                            <div>
                                <p class="text-sm font-medium text-gray-500 dark:text-gray-400">{{ __('site.applications.vattam') }}</p>
                                <p class="mt-1 text-base text-gray-900 dark:text-white font-semibold">{{ app()->getLocale() === 'en' ? $application->vattam->name_en : $application->vattam->name_ta }}</p>
                            </div>
                            @endif
                            @if($application->corporation)
                            <div>
                                <p class="text-sm font-medium text-gray-500 dark:text-gray-400">{{ __('site.applications.corporation') }}</p>
                                <p class="mt-1 text-base text-gray-900 dark:text-white font-semibold">{{ app()->getLocale() === 'en' ? $application->corporation->name_en : $application->corporation->name_ta }}</p>
                            </div>
                            @endif
                        </div>
                    </div>

                    {{-- Document --}}
                    @if($application->document_url)
                    <div class="pb-8">
                        <h3 class="text-2xl font-semibold text-gray-900 dark:text-white mb-6 flex items-center">
                            <svg class="w-6 h-6 mr-3 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                            </svg>
                            {{ __('site.applications.supporting_document') }}
                        </h3>
                        <div>
                            <a href="{{ $application->document_url }}" target="_blank" class="inline-flex items-center px-6 py-3 bg-gray-100 dark:bg-gray-700 text-gray-900 dark:text-white rounded-lg hover:bg-gray-200 dark:hover:bg-gray-600 transition-colors duration-200">
                                <svg class="w-5 h-5 mr-2 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                </svg>
                                {{ __('site.applications.view_document') }}
                            </a>
                        </div>
                    </div>
                    @endif
                </div>

                {{-- Action Buttons --}}
                <div class="mt-10 flex flex-col sm:flex-row gap-4 justify-center">
                    <a href="{{ route('applications.edit', $application->id) }}" class="inline-flex items-center justify-center bg-gray-600 text-white px-8 py-3 rounded-lg font-semibold text-lg hover:bg-gray-700 transform hover:scale-105 hover:shadow-lg transition-all duration-300 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                        </svg>
                        {{ __('site.applications.edit_application') }}
                    </a>
                    <form action="{{ route('applications.confirm', $application->id) }}" method="POST" class="inline-block">
                        @csrf
                        <button type="submit" class="inline-flex items-center justify-center bg-red-600 text-white px-8 py-3 rounded-lg font-semibold text-lg hover:bg-red-700 dark:hover:bg-red-500 transform hover:scale-105 hover:shadow-lg transition-all duration-300 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                            {{ __('site.applications.confirm_proceed') }}
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
