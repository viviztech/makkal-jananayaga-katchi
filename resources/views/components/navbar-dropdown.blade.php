@props(['id', 'label', 'items'])

<div class="relative">
    <button id="{{ $id }}-button"
            data-dropdown-toggle="{{ $id }}"
            class="flex items-center gap-1 py-2 text-gray-700 hover:text-blue-700 dark:text-gray-300 dark:hover:text-blue-400 transition-colors"
            type="button"
            aria-controls="{{ $id }}"
            aria-expanded="false">
        {{ $label }}
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
        </svg>
    </button>

    <div id="{{ $id }}"
         class="absolute z-50 hidden bg-white rounded-lg shadow-lg w-48 dark:bg-gray-700 py-1">
        @foreach($items as $item)
            @if(isset($item['divider']) && $item['divider'])
                <div class="border-t border-gray-200 dark:border-gray-600 my-1"></div>
            @else
                <a href="{{ route($item['route']) }}"
                   class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-200 dark:hover:bg-gray-600 dark:hover:text-white {{ Request::routeIs($item['route']) ? 'bg-blue-50 dark:bg-gray-600 font-semibold' : '' }}">
                    {{ __($item['label']) }}
                </a>
            @endif
        @endforeach
    </div>
</div>
