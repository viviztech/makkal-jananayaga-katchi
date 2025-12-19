@props(['id', 'mobile' => false])

<div class="{{ $mobile ? '' : 'ml-4' }}">
    <button id="{{ $id }}-button"
            data-dropdown-toggle="{{ $id }}"
            class="flex items-center text-sm font-medium text-gray-700 hover:text-blue-700 dark:text-gray-300 dark:hover:text-blue-400 p-2 transition-colors"
            type="button"
            aria-controls="{{ $id }}"
            aria-expanded="false">
        {{ app()->getLocale() === 'ta' ? 'TA' : 'EN' }}
        <svg class="w-4 h-4 ms-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
        </svg>
    </button>

    <div id="{{ $id }}"
         class="absolute {{ $mobile ? 'right-4' : '' }} z-50 hidden bg-white rounded-lg shadow-lg w-28 dark:bg-gray-700 py-1">
        @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
            <a hreflang="{{ $localeCode }}"
               href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}"
               class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-200 dark:hover:bg-gray-600 dark:hover:text-white transition-colors {{ app()->getLocale() === $localeCode ? 'bg-blue-50 dark:bg-gray-600 font-semibold' : '' }}">
                {{ $properties['native'] }}
            </a>
        @endforeach
    </div>
</div>
