@props(['id', 'mobile' => false])

<div class="{{ $mobile ? '' : 'ml-4' }} relative lang-switcher-container">
    <button id="{{ $id }}-button"
            class="flex items-center text-sm font-medium text-gray-700 hover:text-[var(--color-mjk-red)] dark:text-gray-300 dark:hover:text-[var(--color-mjk-red)] p-2 transition-colors rounded-lg hover:bg-gray-100"
            type="button"
            aria-controls="{{ $id }}"
            aria-expanded="false">
        {{ app()->getLocale() === 'ta' ? 'தமிழ்' : 'English' }}
        <svg class="w-4 h-4 ms-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
        </svg>
    </button>

    <div id="{{ $id }}"
         class="lang-dropdown absolute {{ $mobile ? 'right-0' : 'left-0' }} mt-2 z-50 hidden bg-white rounded-lg shadow-lg w-32 dark:bg-gray-700 py-1 border border-gray-200">
        @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
            <a hreflang="{{ $localeCode }}"
               href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}"
               class="block px-4 py-2 text-sm text-gray-700 hover:bg-red-50 hover:text-[var(--color-mjk-red)] dark:text-gray-200 dark:hover:bg-gray-600 dark:hover:text-white transition-colors {{ app()->getLocale() === $localeCode ? 'bg-red-50 text-[var(--color-mjk-red)] font-semibold' : '' }}">
                {{ $properties['native'] }}
            </a>
        @endforeach
    </div>
</div>

<script>
    // Hover functionality for language switcher
    document.addEventListener('DOMContentLoaded', function() {
        const containers = document.querySelectorAll('.lang-switcher-container');

        containers.forEach(container => {
            const button = container.querySelector('button');
            const dropdown = container.querySelector('.lang-dropdown');

            if (!button || !dropdown) return;

            let hoverTimeout;

            // Show dropdown on hover
            container.addEventListener('mouseenter', function() {
                clearTimeout(hoverTimeout);
                dropdown.classList.remove('hidden');
                button.setAttribute('aria-expanded', 'true');
            });

            // Hide dropdown when mouse leaves
            container.addEventListener('mouseleave', function() {
                hoverTimeout = setTimeout(() => {
                    dropdown.classList.add('hidden');
                    button.setAttribute('aria-expanded', 'false');
                }, 200); // Small delay to prevent flickering
            });

            // Also allow click/tap for mobile
            button.addEventListener('click', function(e) {
                e.preventDefault();
                const isHidden = dropdown.classList.contains('hidden');

                // Close all other dropdowns
                document.querySelectorAll('.lang-dropdown').forEach(menu => {
                    if (menu !== dropdown) {
                        menu.classList.add('hidden');
                    }
                });

                // Toggle current dropdown
                if (isHidden) {
                    dropdown.classList.remove('hidden');
                    button.setAttribute('aria-expanded', 'true');
                } else {
                    dropdown.classList.add('hidden');
                    button.setAttribute('aria-expanded', 'false');
                }
            });
        });

        // Close dropdown when clicking outside
        document.addEventListener('click', function(event) {
            const containers = document.querySelectorAll('.lang-switcher-container');
            containers.forEach(container => {
                const button = container.querySelector('button');
                const dropdown = container.querySelector('.lang-dropdown');

                if (button && dropdown && !container.contains(event.target)) {
                    dropdown.classList.add('hidden');
                    button.setAttribute('aria-expanded', 'false');
                }
            });
        });
    });
</script>
