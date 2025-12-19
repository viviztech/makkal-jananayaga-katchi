@props([
    'title',
    'date' => '',
    'location' => '',
    'ctaUrl' => '#',
    'ctaText' => 'Register Now',
    'showCta' => true
])

<div class="rally-banner" data-aos="zoom-in">
    <div class="rally-banner-content">
        <div class="flex items-start gap-3">
            <span class="text-3xl">📢</span>
            <div>
                <h3 class="rally-banner-title">{{ $title }}</h3>
                @if($date || $location)
                    <div class="rally-banner-details">
                        @if($date)
                            <span>📅 {{ $date }}</span>
                        @endif
                        @if($date && $location)
                            <span class="mx-2">|</span>
                        @endif
                        @if($location)
                            <span>📍 {{ $location }}</span>
                        @endif
                    </div>
                @endif
                {{ $slot }}
            </div>
        </div>
    </div>
    @if($showCta)
        <a href="{{ $ctaUrl }}" class="btn-campaign btn-campaign-primary">
            {{ $ctaText }}
        </a>
    @endif
</div>
