@props([
    'title',
    'subtitle' => '',
    'ctaText' => 'Join VCK Today',
    'ctaUrl' => '/join',
    'backgroundImage' => null,
    'showCta' => true
])

<div class="hero-campaign" @if($backgroundImage) style="background-image: url({{ $backgroundImage }});" @endif>
    <div class="hero-campaign-overlay"></div>
    <div class="hero-campaign-content" data-aos="fade-up">
        <h1 class="hero-campaign-title">{{ $title }}</h1>
        @if($subtitle)
            <p class="hero-campaign-subtitle">{{ $subtitle }}</p>
        @endif
        @if($showCta)
            <a href="{{ $ctaUrl }}" class="btn-campaign btn-campaign-cta text-xl px-10">
                {{ $ctaText }} →
            </a>
        @endif
        {{ $slot }}
    </div>
</div>
