@extends('layouts.app')

@section('title', __('site.menu.contact'))

@section('content')

    {{-- Campaign Hero Section --}}
    <section
        class="bg-gradient-to-br from-[var(--color-mjk-red)] via-[var(--color-mjk-red)] to-[var(--color-mjk-blue)] py-20">
        <div class="max-w-7xl mx-auto px-4 text-center" data-aos="fade-up">
            <h1 class="text-5xl md:text-6xl font-extrabold text-white mb-6">
                {{ __('site.contact.title') }}
            </h1>
            <p class="text-xl md:text-2xl text-white/90 max-w-3xl mx-auto">
                {{ __('site.contact.get_in_touch') }}
            </p>
        </div>
    </section>

    {{-- Contact Information Cards --}}
    <section class="bg-gray-50 py-16">
        <div class="max-w-7xl mx-auto px-4">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                {{-- Address Card --}}
                <x-impact-card :title="__('site.contact.visit_office')" :description="__('site.contact.address')"
                    color="primary" data-aos-delay="100">
                    <x-slot name="icon">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                    </x-slot>
                </x-impact-card>

                {{-- Phone Card --}}
                <x-impact-card :title="__('site.contact.call_us')" color="secondary" data-aos-delay="200">
                    <x-slot name="icon">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                        </svg>
                    </x-slot>
                    <x-slot name="description">
                        <a href="tel:{{ str_replace(' ', '', __('site.contact.phone')) }}"
                            class="text-[var(--color-mjk-blue)] hover:text-[var(--color-mjk-red)] font-semibold transition-colors">
                            {{ __('site.contact.phone') }}
                        </a>
                        <p class="text-sm text-gray-500 mt-2">{{ __('site.contact.office_hours') }}</p>
                    </x-slot>
                </x-impact-card>

                {{-- Email Card --}}
                <x-impact-card :title="__('site.contact.email_us')" color="success" data-aos-delay="300">
                    <x-slot name="icon">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                        </svg>
                    </x-slot>
                    <x-slot name="description">
                        <a href="mailto:{{ __('site.contact.email') }}"
                            class="text-[var(--color-mjk-green)] hover:text-[var(--color-mjk-red)] font-semibold transition-colors break-all">
                            {{ __('site.contact.email') }}
                        </a>
                        <p class="text-sm text-gray-500 mt-2">{{ __('site.contact.response_time') }}</p>
                    </x-slot>
                </x-impact-card>
            </div>
        </div>
    </section>

    {{-- Contact Form Section --}}
    <section class="bg-white py-20">
        <div class="max-w-7xl mx-auto px-4">
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                {{-- Form --}}
                <div class="lg:col-span-2">
                    <div class="card-campaign" data-aos="fade-up">
                        <div class="p-8 lg:p-12">
                            <div class="text-center mb-10">
                                <h2 class="text-4xl md:text-5xl font-extrabold text-gray-900 mb-4">
                                    {{ __('site.contact.send_message') }}
                                </h2>
                                <p class="text-xl text-gray-600">
                                    {{ __('site.contact.questions_prompt') }}
                                </p>
                            </div>

                            {{-- Alert Messages --}}
                            @if(session('success'))
                                <x-alert type="success" class="mb-8">
                                    {{ session('success') }}
                                </x-alert>
                            @endif

                            @if(session('error'))
                                <x-alert type="error" class="mb-8">
                                    {{ session('error') }}
                                </x-alert>
                            @endif

                            @if($errors->any())
                                <x-alert type="error" class="mb-8">
                                    <p class="font-semibold mb-1">{{ __('site.applications.validation_errors') }}</p>
                                    <ul class="list-disc list-inside mt-2 space-y-1">
                                        @foreach($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </x-alert>
                            @endif

                            {{-- Contact Form --}}
                            <form action="{{ route('contact.store') }}" method="POST" class="space-y-6">
                                @csrf

                                {{-- Name and Email Row --}}
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                    <x-form-input id="name" name="name" :label="__('site.contact.name')" type="text"
                                        :value="old('name')" required />
                                    <x-form-input id="email" name="email" :label="__('site.contact.email-title')"
                                        type="email" :value="old('email')" required />
                                </div>

                                {{-- Subject --}}
                                <x-form-input id="subject" name="subject" :label="__('site.contact.subject')" type="text"
                                    :value="old('subject')" required />

                                {{-- Message --}}
                                <x-form-textarea id="message" name="message" :label="__('site.contact.message')"
                                    :value="old('message')" rows="6" required />

                                {{-- Submit Button --}}
                                <div class="text-center pt-4">
                                    <button type="submit" class="btn-campaign btn-campaign-cta text-xl px-10">
                                        <svg class="w-5 h-5 mr-2 inline-block" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8" />
                                        </svg>
                                        {{ __('site.contact.send') }}
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                {{-- Sidebar: Social & Info --}}
                <div class="lg:col-span-1">
                    <div class="card-campaign sticky top-24" data-aos="fade-up" data-aos-delay="200">
                        <div
                            class="p-8 bg-gradient-to-br from-[var(--color-mjk-red)] to-[var(--color-mjk-blue)] text-white">
                            <h3 class="text-2xl font-bold mb-6 text-center">
                                {{ __('site.contact.follow_social') }}
                            </h3>
                            <p class="text-white/90 text-center mb-8">
                                {{ __('site.contact.questions_prompt') }}
                            </p>

                            {{-- Social Links --}}
                            <div class="flex flex-wrap justify-center gap-3">
                                <div class="w-12 h-12 rounded-full bg-white/20 hover:bg-white/30 flex items-center justify-center transition-all transform hover:scale-110"
                                    aria-label="Facebook">
                                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                                        <path
                                            d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z" />
                                    </svg>
                                </div>
                                <div class="w-12 h-12 rounded-full bg-white/20 hover:bg-white/30 flex items-center justify-center transition-all transform hover:scale-110"
                                    aria-label="X (Twitter)">
                                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                                        <path
                                            d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z" />
                                    </svg>
                                </div>
                                <div class="w-12 h-12 rounded-full bg-white/20 hover:bg-white/30 flex items-center justify-center transition-all transform hover:scale-110"
                                    aria-label="Instagram">
                                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                                        <path
                                            d="M12 2.163c3.204 0 3.584.012 4.85.07 1.172.053 1.905.242 2.49.449.586.206.96.478 1.48.977.52.499.773.894.978 1.48.207.585.397 1.318.45 2.49.058 1.266.07 1.646.07 4.85s-.012 3.584-.07 4.85c-.053 1.172-.242 1.905-.45 2.49-.206.586-.478.96-.978 1.48-.499.52-.894.773-1.48.978-.585.207-1.318.397-2.49.45-1.266.058-1.646.07-4.85.07s-3.584-.012-4.85-.07c-1.172-.053-1.905-.242-2.49-.45-.586-.206-.96-.478-1.48-.978-.52-.499-.773-.894-.978-1.48-.207-.585-.397-1.318-.45-2.49-.058-1.266-.07-1.646-.07-4.85s.012-3.584.07-4.85c.053-1.172.242-1.905.45-2.49.206-.586.478-.96.978-1.48.499-.52.894-.773 1.48-.978.585-.207 1.318-.397 2.49-.45 1.266-.057 1.646-.07 4.85-.07M12 0C8.741 0 8.333.014 7.053.072 5.775.132 4.905.333 4.14.63c-.789.306-1.459.717-2.126 1.384S.936 3.35.63 4.14C.333 4.905.131 5.775.072 7.053.014 8.333 0 8.741 0 12s.014 3.667.072 4.947c.06 1.277.261 2.148.558 2.913.306.788.717 1.459 1.384 2.126.667.666 1.336 1.079 2.126 1.384.766.296 1.636.499 2.913.558C8.333 23.986 8.741 24 12 24s3.667-.014 4.947-.072c1.277-.06 2.148-.262 2.913-.558.788-.306 1.459-.717 2.126-1.384.666-.667 1.079-1.335 1.384-2.126.296-.765.499-1.636.558-2.913.058-1.266.072-1.646.072-4.947s-.014-3.667-.072-4.947c-.06-1.277-.262-2.148-.558-2.913-.306-.789-.717-1.459-1.384-2.126C20.644.936 19.974.522 19.184.217c-.765-.297-1.636-.499-2.913-.558C14.986.014 14.559 0 12 0zm0 5.838a6.162 6.162 0 100 12.324 6.162 6.162 0 000-12.324M12 16a4 4 0 110-8 4 4 0 010 8m6.406-11.845a1.44 1.44 0 11-2.881.001 1.44 1.44 0 012.881-.001" />
                                    </svg>
                                </div>
                                <div class="w-12 h-12 rounded-full bg-white/20 hover:bg-white/30 flex items-center justify-center transition-all transform hover:scale-110"
                                    aria-label="Threads">
                                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                                        <path
                                            d="M12.186 5.595c-3.323 0-5.909 2.27-5.909 5.337 0 2.946 2.365 5.338 5.909 5.338 3.323 0 5.908-2.27 5.908-5.338 0-3.067-2.585-5.337-5.908-5.337zm0 9.433c-2.42 0-4.282-1.721-4.282-4.096 0-2.374 1.862-4.095 4.282-4.095 2.42 0 4.282 1.721 4.282 4.095 0 2.375-1.862 4.096-4.282 4.096zM19.93 5.339a1.38 1.38 0 11-2.76 0 1.38 1.38 0 012.76 0zM12 2.163c3.204 0 3.584.012 4.85.07 1.17.053 1.805.245 2.227.408.56.217.96.477 1.382.896.419.42.679.822.896 1.381.163.423.355 1.057.408 2.227.058 1.265.07 1.645.07 4.85s-.012 3.584-.07 4.849c-.053 1.17-.245 1.804-.408 2.227-.217.56-.477.96-.896 1.381-.42.419-.822.679-1.382.896-.422.163-1.057.355-2.227.408-1.265.058-1.645.07-4.85.07s-3.584-.012-4.849-.07c-1.17-.053-1.805-.245-2.228-.408a3.736 3.736 0 01-1.38-.896 3.736 3.736 0 01-.897-1.381c-.163-.423-.355-1.057-.408-2.227-.058-1.265-.07-1.645-.07-4.85s.012-3.584.07-4.849c.053-1.17.245-1.804.408-2.227.217-.56.477-.96.896-1.382.42-.419.822-.679 1.381-.896.423-.163 1.057-.355 2.228-.408 1.265-.058 1.645-.07 4.849-.07M12 0C8.741 0 8.332.014 7.052.072 5.775.13 4.905.333 4.14.63a5.9 5.9 0 00-2.126 1.384A5.9 5.9 0 00.63 4.14C.333 4.905.13 5.775.072 7.052.014 8.332 0 8.741 0 12c0 3.259.014 3.668.072 4.948.058 1.277.261 2.147.558 2.913a5.9 5.9 0 001.384 2.126A5.9 5.9 0 004.14 23.37c.765.297 1.636.5 2.913.558C8.332 23.986 8.741 24 12 24c3.259 0 3.668-.014 4.948-.072 1.277-.058 2.147-.261 2.913-.558a5.9 5.9 0 002.126-1.384 5.9 5.9 0 001.384-2.126c.297-.766.5-1.636.558-2.913.058-1.28.072-1.689.072-4.948 0-3.259-.014-3.668-.072-4.948-.058-1.277-.261-2.147-.558-2.913a5.9 5.9 0 00-1.384-2.126A5.9 5.9 0 0019.86.63C19.095.333 18.225.13 16.948.072 15.668.014 15.259 0 12 0z" />
                                    </svg>
                                </div>
                                <div class="w-12 h-12 rounded-full bg-white/20 hover:bg-white/30 flex items-center justify-center transition-all transform hover:scale-110"
                                    aria-label="YouTube">
                                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                                        <path
                                            d="M23.498 6.186a2.998 2.998 0 00-2.124-2.124C19.215 3.545 12 3.545 12 3.545s-7.215 0-9.374.517A2.998 2.998 0 00.502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a2.998 2.998 0 002.124 2.124c2.159.517 9.374.517 9.374.517s7.215 0 9.374-.517a2.998 2.998 0 002.124-2.124C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z" />
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection