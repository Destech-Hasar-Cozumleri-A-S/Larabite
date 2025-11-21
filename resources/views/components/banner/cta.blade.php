@props([
    'position' => 'top', // top, bottom
    'title' => '',
    'description' => '',
    'ctaText' => '',
    'ctaHref' => '#',
    'dismissible' => true,
    'id' => null,
])

@php
    $positionClasses = [
        'top' => 'top-0',
        'bottom' => 'bottom-0',
    ];

    $bannerId = $id ?? 'banner-cta-' . uniqid();
@endphp

<div
    id="{{ $bannerId }}"
    tabindex="-1"
    {{ $attributes->merge(['class' => "fixed {$positionClasses[$position]} start-0 z-50 w-full bg-white border-b border-gray-200"]) }}
>
    <div class="flex flex-col md:flex-row items-start md:items-center justify-between w-full p-4 md:p-6 lg:px-8">
        <div class="flex flex-col items-start mb-3 md:mb-0 md:flex-row md:items-center">
            @if(isset($icon))
                <div class="flex items-center flex-shrink-0 mb-2 md:mb-0 md:me-4">
                    {{ $icon }}
                </div>
            @endif
            <div>
                <h3 class="text-base font-semibold text-gray-900">{{ $title }}</h3>
                <p class="text-sm font-normal text-gray-500">{{ $description }}</p>
            </div>
        </div>

        <div class="flex items-center flex-shrink-0 space-x-2">
            @if($ctaText && $ctaHref)
                <x-ui::button
                    href="{{ $ctaHref }}"
                    variant="primary"
                    size="sm"
                >
                    {{ $ctaText }}
                </x-button>
            @endif

            @if($dismissible)
                <button
                    data-dismiss-target="#{{ $bannerId }}"
                    type="button"
                    class="flex-shrink-0 inline-flex justify-center w-7 h-7 items-center text-gray-400 hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5"
                >
                    <x-ui::icon.close />
                    <span class="sr-only">Close banner</span>
                </button>
            @endif
        </div>
    </div>
</div>