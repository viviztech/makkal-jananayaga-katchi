@props(['type' => 'info', 'message' => null, 'title' => null])

@php
    $styles = [
        'success' => [
            'container' => 'alert-campaign-success',
            'icon' => 'M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z'
        ],
        'error' => [
            'container' => 'alert-campaign-error',
            'icon' => 'M10 18a8 8 0 100-16 8 8 0 000 16zm1-13a1 1 0 10-2 0v5a1 1 0 102 0V5zm-1 9a1 1 0 100-2 1 1 0 000 2z'
        ],
        'warning' => [
            'container' => 'alert-campaign-warning',
            'icon' => 'M10 18a8 8 0 100-16 8 8 0 000 16zm1-13a1 1 0 10-2 0v5a1 1 0 102 0V5zm-1 9a1 1 0 100-2 1 1 0 000 2z'
        ],
        'info' => [
            'container' => 'alert-campaign-info',
            'icon' => 'M10 18a8 8 0 100-16 8 8 0 000 16zm1-11a1 1 0 10-2 0v3a1 1 0 102 0V7zm-1 6a1 1 0 100 2 1 1 0 000-2z'
        ]
    ];

    $style = $styles[$type] ?? $styles['info'];
@endphp

<div {{ $attributes->merge(['class' => 'alert-campaign ' . $style['container']]) }}>
    <svg class="w-6 h-6 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
        <path fill-rule="evenodd" d="{{ $style['icon'] }}" clip-rule="evenodd"></path>
    </svg>
    <div class="flex-1">
        @if($title)
            <p class="font-semibold mb-1">{{ $title }}</p>
        @endif
        @if($message)
            <p>{{ $message }}</p>
        @else
            {{ $slot }}
        @endif
    </div>
</div>
