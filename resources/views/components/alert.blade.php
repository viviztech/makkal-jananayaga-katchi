@props(['type' => 'info', 'message' => null, 'title' => null])

@php
    $styles = [
        'success' => [
            'container' => 'bg-green-50 dark:bg-green-900/30 border-green-200 dark:border-green-800 text-green-700 dark:text-green-300',
            'icon' => 'M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z'
        ],
        'error' => [
            'container' => 'bg-red-50 dark:bg-red-900/30 border-red-200 dark:border-red-800 text-red-700 dark:text-red-300',
            'icon' => 'M10 18a8 8 0 100-16 8 8 0 000 16zm1-13a1 1 0 10-2 0v5a1 1 0 102 0V5zm-1 9a1 1 0 100-2 1 1 0 000 2z'
        ],
        'warning' => [
            'container' => 'bg-yellow-50 dark:bg-yellow-900/30 border-yellow-200 dark:border-yellow-800 text-yellow-700 dark:text-yellow-300',
            'icon' => 'M10 18a8 8 0 100-16 8 8 0 000 16zm1-13a1 1 0 10-2 0v5a1 1 0 102 0V5zm-1 9a1 1 0 100-2 1 1 0 000 2z'
        ],
        'info' => [
            'container' => 'bg-blue-50 dark:bg-blue-900/30 border-blue-200 dark:border-blue-800 text-blue-700 dark:text-blue-300',
            'icon' => 'M10 18a8 8 0 100-16 8 8 0 000 16zm1-11a1 1 0 10-2 0v3a1 1 0 102 0V7zm-1 6a1 1 0 100 2 1 1 0 000-2z'
        ]
    ];

    $style = $styles[$type] ?? $styles['info'];
@endphp

<div {{ $attributes->merge(['class' => 'p-4 flex items-start border rounded-xl ' . $style['container']]) }}>
    <svg class="w-5 h-5 mr-3 flex-shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
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
