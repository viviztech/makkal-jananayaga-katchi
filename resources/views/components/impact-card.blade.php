@props([
    'title',
    'description' => '',
    'color' => 'primary',
    'stat' => null,
    'icon' => null
])

<div class="impact-card impact-card-{{ $color }}" data-aos="fade-up">
    @if($icon || $stat)
        <div class="impact-card-icon">
            @if($stat)
                <span class="text-3xl font-extrabold">{{ $stat }}</span>
            @elseif($icon)
                {!! $icon !!}
            @endif
        </div>
    @endif
    <h3 class="text-2xl font-bold mb-3 text-gray-900">{{ $title }}</h3>
    @if($description)
        <p class="text-base text-gray-600">{{ $description }}</p>
    @endif
    {{ $slot }}
</div>
