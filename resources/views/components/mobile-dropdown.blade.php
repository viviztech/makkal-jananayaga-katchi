@props(['id', 'label', 'items'])

<li>
    <button data-collapse-toggle="{{ $id }}"
            class="flex items-center justify-between w-full py-2 px-3 text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 rounded transition-colors"
            aria-controls="{{ $id }}"
            aria-expanded="false">
        <span>{{ $label }}</span>
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
        </svg>
    </button>

    <ul id="{{ $id }}" class="ml-4 mt-2 space-y-1 hidden py-1">
        @foreach($items as $item)
            @if(isset($item['divider']) && $item['divider'])
                <li class="border-t border-gray-200 dark:border-gray-600 pt-2 mt-2"></li>
            @else
                <li>
                    <a href="{{ route($item['route']) }}"
                       class="block py-2 px-3 text-sm rounded {{ Request::routeIs($item['route']) ? 'bg-blue-100 dark:bg-gray-700 text-blue-700 dark:text-white font-semibold' : 'text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700' }}">
                        {{ __($item['label']) }}
                    </a>
                </li>
            @endif
        @endforeach
    </ul>
</li>
