@extends('layouts.app')

@section('title', __('site.applications.success_title'))

@section('content')
    {{-- Page Header --}}
    <section class="relative bg-gray-900 dark:bg-gray-950 py-24 md:py-32">
        <div class="relative max-w-7xl mx-auto px-4 text-center">
            <div class="inline-flex items-center justify-center w-20 h-20 bg-green-500 rounded-full mb-6">
                <svg class="w-12 h-12 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"/>
                </svg>
            </div>
            <h1 class="text-5xl md:text-6xl font-extrabold text-white mb-4">{{ __('site.applications.success_title') }}</h1>
            <p class="text-xl text-gray-300 max-w-3xl mx-auto">{{ __('site.applications.success_subtitle') }}</p>
        </div>
    </section>

    {{-- Success Section --}}
    <section class="py-20 lg:py-28 px-4 bg-gray-100 dark:bg-gray-900">
        <div class="max-w-4xl mx-auto">
            <div class="bg-white dark:bg-gray-800 rounded-xl shadow-2xl p-8 lg:p-12">
                {{-- Success Message --}}
                <div class="text-center mb-10 pb-8 border-b border-gray-200 dark:border-gray-700">
                    <div class="inline-flex items-center justify-center w-16 h-16 bg-green-100 dark:bg-green-900/30 rounded-full mb-4">
                        <svg class="w-10 h-10 text-green-600 dark:text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                    </div>
                    <h2 class="text-3xl lg:text-4xl font-extrabold text-gray-900 dark:text-white mb-3">{{ __('site.applications.application_submitted') }}</h2>
                    <p class="text-lg text-gray-600 dark:text-gray-400">{{ __('site.applications.application_submitted_desc') }}</p>
                </div>

                {{-- Application Details --}}
                <div class="space-y-6 mb-10">
                    <div class="bg-gray-50 dark:bg-gray-700 rounded-lg p-6">
                        <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-4">{{ __('site.applications.application_details') }}</h3>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <p class="text-sm font-medium text-gray-500 dark:text-gray-400">{{ __('site.applications.application_id') }}</p>
                                <p class="mt-1 text-lg font-bold text-gray-900 dark:text-white">#{{ str_pad($application->id, 6, '0', STR_PAD_LEFT) }}</p>
                            </div>
                            <div>
                                <p class="text-sm font-medium text-gray-500 dark:text-gray-400">{{ __('site.applications.applicant_name') }}</p>
                                <p class="mt-1 text-lg font-semibold text-gray-900 dark:text-white">{{ $application->name }}</p>
                            </div>
                            @if($application->post)
                            <div>
                                <p class="text-sm font-medium text-gray-500 dark:text-gray-400">{{ __('site.applications.applied_post') }}</p>
                                <p class="mt-1 text-base font-semibold text-gray-900 dark:text-white">{{ app()->getLocale() === 'en' ? $application->post->name_en : $application->post->name_ta }}</p>
                            </div>
                            @endif
                            <div>
                                <p class="text-sm font-medium text-gray-500 dark:text-gray-400">{{ __('site.applications.submission_date') }}</p>
                                <p class="mt-1 text-base font-semibold text-gray-900 dark:text-white">{{ $application->created_at->format('d-m-Y H:i') }}</p>
                            </div>
                        </div>
                    </div>

                    {{-- Payment Details --}}
                    @if($application->payment_status === 'completed')
                    <div class="bg-green-50 dark:bg-green-900/20 border-2 border-green-200 dark:border-green-800 rounded-lg p-6">
                        <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-4 flex items-center">
                            <svg class="w-6 h-6 mr-2 text-green-600 dark:text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                            {{ __('site.applications.payment_details') }}
                        </h3>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <p class="text-sm font-medium text-gray-600 dark:text-gray-300">{{ __('site.applications.payment_status') }}</p>
                                <p class="mt-1 text-base font-semibold text-green-700 dark:text-green-400">{{ __('site.applications.payment_completed') }}</p>
                            </div>
                            <div>
                                <p class="text-sm font-medium text-gray-600 dark:text-gray-300">{{ __('site.applications.payment_amount') }}</p>
                                <p class="mt-1 text-lg font-bold text-gray-900 dark:text-white">₹{{ number_format($application->application_fee, 2) }}</p>
                            </div>
                            <div>
                                <p class="text-sm font-medium text-gray-600 dark:text-gray-300">{{ __('site.applications.payment_method') }}</p>
                                <p class="mt-1 text-base font-semibold text-gray-900 dark:text-white capitalize">{{ $application->payment_method }}</p>
                            </div>
                            @if($application->payment_transaction_id)
                            <div>
                                <p class="text-sm font-medium text-gray-600 dark:text-gray-300">{{ __('site.applications.transaction_id') }}</p>
                                <p class="mt-1 text-base font-semibold text-gray-900 dark:text-white">{{ $application->payment_transaction_id }}</p>
                            </div>
                            @endif
                            <div>
                                <p class="text-sm font-medium text-gray-600 dark:text-gray-300">{{ __('site.applications.payment_date') }}</p>
                                <p class="mt-1 text-base font-semibold text-gray-900 dark:text-white">{{ $application->payment_completed_at->format('d-m-Y H:i') }}</p>
                            </div>
                        </div>
                    </div>
                    @endif
                </div>

                {{-- Next Steps --}}
                <div class="mb-10 p-6 bg-blue-50 dark:bg-blue-900/20 border-2 border-blue-200 dark:border-blue-800 rounded-lg">
                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-4 flex items-center">
                        <svg class="w-6 h-6 mr-2 text-blue-600 dark:text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                        {{ __('site.applications.next_steps') }}
                    </h3>
                    <ul class="space-y-3 text-gray-700 dark:text-gray-300">
                        <li class="flex items-start">
                            <svg class="w-5 h-5 mr-2 text-blue-600 dark:text-blue-400 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                            <span>{{ __('site.applications.next_step_1') }}</span>
                        </li>
                        <li class="flex items-start">
                            <svg class="w-5 h-5 mr-2 text-blue-600 dark:text-blue-400 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                            <span>{{ __('site.applications.next_step_2') }}</span>
                        </li>
                        <li class="flex items-start">
                            <svg class="w-5 h-5 mr-2 text-blue-600 dark:text-blue-400 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                            <span>{{ __('site.applications.next_step_3') }}</span>
                        </li>
                    </ul>
                </div>

                {{-- Download Options --}}
                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    <a href="{{ route('applications.pdf', $application->id) }}" class="inline-flex items-center justify-center bg-red-600 text-white px-8 py-3 rounded-lg font-semibold text-lg hover:bg-red-700 dark:hover:bg-red-500 transform hover:scale-105 hover:shadow-lg transition-all duration-300 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                        </svg>
                        {{ __('site.applications.download_application') }}
                    </a>
                    <a href="{{ route('home') }}" class="inline-flex items-center justify-center bg-gray-600 text-white px-8 py-3 rounded-lg font-semibold text-lg hover:bg-gray-700 transform hover:scale-105 hover:shadow-lg transition-all duration-300 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                        </svg>
                        {{ __('site.applications.back_to_home') }}
                    </a>
                </div>

                {{-- Contact Information --}}
                <div class="mt-10 pt-8 border-t border-gray-200 dark:border-gray-700 text-center">
                    <p class="text-gray-600 dark:text-gray-400">
                        {{ __('site.applications.questions_contact') }}
                        <a href="{{ route('contact') }}" class="text-red-600 hover:text-red-700 dark:text-red-400 dark:hover:text-red-300 font-semibold">{{ __('site.applications.contact_us') }}</a>
                    </p>
                </div>
            </div>
        </div>
    </section>
@endsection
