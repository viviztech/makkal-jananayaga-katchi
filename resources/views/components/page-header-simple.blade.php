@props(['title', 'subtitle' => null])

{{-- Simple Page Header --}}
<section class="relative bg-gray-900 dark:bg-gray-950 py-24 md:py-32">
    <div class="relative max-w-7xl mx-auto px-4 text-center">
        <h1 class="text-5xl md:text-6xl font-extrabold text-white mb-4">{{ $title }}</h1>
        @if($subtitle)
            <p class="text-xl text-gray-300 max-w-3xl mx-auto">{{ $subtitle }}</p>
        @endif
    </div>
</section>
