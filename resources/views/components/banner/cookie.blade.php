@props([
    'position' => 'bottom', // top, bottom
    'title' => 'Cookie Consent',
    'description' => 'We use cookies to enhance your browsing experience, serve personalized ads or content, and analyze our traffic.',
    'acceptText' => 'Accept All',
    'declineText' => 'Decline',
    'settingsText' => 'Settings',
    'acceptAction' => null,
    'declineAction' => null,
    'settingsAction' => null,
    'id' => null,
])

@php
    $positionClasses = [
        'top' => 'top-0',
        'bottom' => 'bottom-0',
    ];

    $bannerId = $id ?? 'banner-cookie-' . uniqid();
@endphp

<div
    id="{{ $bannerId }}"
    tabindex="-1"
    {{ $attributes->merge(['class' => "fixed {$positionClasses[$position]} start-0 z-50 w-full bg-white border-t border-gray-200 shadow-lg"]) }}
>
    <div class="flex flex-col md:flex-row items-start md:items-center justify-between w-full p-4 md:p-6 lg:px-8">
        <div class="flex items-start mb-3 md:mb-0 md:me-4">
            <svg class="flex-shrink-0 w-5 h-5 text-gray-500 mt-0.5 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
            </svg>
            <div>
                <h3 class="text-sm font-semibold text-gray-900">{{ $title }}</h3>
                <p class="text-sm font-normal text-gray-500 mt-1">{{ $description }}</p>
            </div>
        </div>

        <div class="flex items-center flex-shrink-0 space-x-2">
            @if($settingsText && $settingsAction)
                <button
                    type="button"
                    @if(str_starts_with($settingsAction, 'http'))
                        onclick="window.location.href='{{ $settingsAction }}'"
                    @else
                        wire:click="{{ $settingsAction }}"
                    @endif
                    class="px-3 py-2 text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-lg hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-200"
                >
                    {{ $settingsText }}
                </button>
            @endif

            @if($declineText && $declineAction)
                <button
                    type="button"
                    @if(str_starts_with($declineAction, 'http'))
                        onclick="window.location.href='{{ $declineAction }}'"
                    @else
                        wire:click="{{ $declineAction }}"
                    @endif
                    data-dismiss-target="#{{ $bannerId }}"
                    class="px-3 py-2 text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-lg hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-200"
                >
                    {{ $declineText }}
                </button>
            @endif

            @if($acceptText && $acceptAction)
                <button
                    type="button"
                    @if(str_starts_with($acceptAction, 'http'))
                        onclick="window.location.href='{{ $acceptAction }}'"
                    @else
                        wire:click="{{ $acceptAction }}"
                    @endif
                    data-dismiss-target="#{{ $bannerId }}"
                    class="px-3 py-2 text-sm font-medium text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:ring-blue-300"
                >
                    {{ $acceptText }}
                </button>
            @endif
        </div>
    </div>
</div>