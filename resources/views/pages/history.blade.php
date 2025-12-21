@extends('layouts.app')

@section('title', __('site.history.title'))

@section('content')

{{-- Page Hero --}}
<section class="bg-gradient-to-br from-[var(--color-mjk-red)] via-[var(--color-mjk-red)] to-[var(--color-mjk-blue)] py-20">
    <div class="max-w-7xl mx-auto px-4 text-center" data-aos="fade-up">
        <h1 class="text-5xl md:text-6xl font-extrabold text-white mb-6">
            {{ __('site.history.title') }}
        </h1>
        <p class="text-xl md:text-2xl text-white/90 max-w-3xl mx-auto">
            {{ __('site.history.subtitle') }}
        </p>
    </div>
</section>

{{-- Content Placeholder - To be added later --}}
<section class="bg-gray-50 py-20">
    <div class="max-w-7xl mx-auto px-4 text-center">
        <p class="text-xl text-gray-600">
            {{ __('site.history.content_coming_soon') }}
        </p>
    </div>
</section>

@endsection
