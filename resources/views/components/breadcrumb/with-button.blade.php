@props([
    'buttonText' => '',
    'buttonIcon' => null,
    'buttonWire' => null,
    'buttonHref' => null,
    'dropdownId' => null,
])

<div {{ $attributes->merge(['class' => 'flex items-center']) }}>
    <nav aria-label="Breadcrumb" class="flex">
        <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
            {{ $breadcrumb }}
        </ol>
    </nav>

    @if(isset($button))
        {{ $button }}
    @elseif($buttonText)
        <div class="ms-2.5">
            @if($dropdownId)
                <button
                    type="button"
                    data-dropdown-toggle="{{ $dropdownId }}"
                    class="inline-flex items-center px-3 py-2 text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-lg hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-700"
                >
                    @if($buttonIcon)
                        <span class="w-4 h-4 me-2">{{ $buttonIcon }}</span>
                    @endif
                    {{ $buttonText }}
                </button>

                @if(isset($dropdown))
                    <div id="{{ $dropdownId }}" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
                        <ul class="py-2 text-sm text-gray-700 dark:text-gray-200">
                            {{ $dropdown }}
                        </ul>
                    </div>
                @endif
            @elseif($buttonWire)
                <button
                    type="button"
                    wire:click="{{ $buttonWire }}"
                    class="inline-flex items-center px-3 py-2 text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-lg hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-700"
                >
                    @if($buttonIcon)
                        <span class="w-4 h-4 me-2">{{ $buttonIcon }}</span>
                    @endif
                    {{ $buttonText }}
                </button>
            @else
                <a
                    href="{{ $buttonHref ?? '#' }}"
                    class="inline-flex items-center px-3 py-2 text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-lg hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-700"
                >
                    @if($buttonIcon)
                        <span class="w-4 h-4 me-2">{{ $buttonIcon }}</span>
                    @endif
                    {{ $buttonText }}
                </a>
            @endif
        </div>
    @endif
</div>