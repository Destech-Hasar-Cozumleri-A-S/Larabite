{{-- Mega Menu Dropdown Item --}}
@props([
    'href' => '#',
    'icon' => null,
    'description' => null,
])

@php
    $baseClasses = 'flex items-start gap-3 p-3 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-700';
@endphp

<a href="{{ $href }}" {{ $attributes->merge(['class' => $baseClasses]) }}>
    @if($icon)
        <div class="flex-shrink-0 w-5 h-5 text-gray-500 dark:text-gray-400 mt-0.5" aria-hidden="true">
            {{ $icon }}
        </div>
    @endif

    <div class="flex-1">
        <div class="font-semibold text-gray-900 dark:text-white">
            {{ $slot }}
        </div>
        @if($description)
            <p class="text-sm text-gray-500 dark:text-gray-400 mt-1">
                {{ $description }}
            </p>
        @endif
    </div>
</a>