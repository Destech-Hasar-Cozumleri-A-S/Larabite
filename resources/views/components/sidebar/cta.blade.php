{{-- Sidebar Call to Action --}}
@props([
    'dismissible' => false,
    'color' => 'blue', // blue, red, green, yellow, purple
])

@php
    // Color classes
    $colorClasses = [
        'blue' => 'bg-blue-50 dark:bg-blue-900',
        'red' => 'bg-red-50 dark:bg-red-900',
        'green' => 'bg-green-50 dark:bg-green-900',
        'yellow' => 'bg-yellow-50 dark:bg-yellow-900',
        'purple' => 'bg-purple-50 dark:bg-purple-900',
    ];

    $colorClass = $colorClasses[$color] ?? $colorClasses['blue'];
@endphp

<div
    @if($dismissible)
        x-data="{ show: true }"
        x-show="show"
        x-transition
    @endif
    {{ $attributes->merge(['class' => "p-4 mt-6 rounded-lg {$colorClass}"]) }}
    role="alert"
>
    @if($dismissible)
        <button
            type="button"
            @click="show = false"
            class="absolute top-2.5 end-2.5 inline-flex items-center justify-center w-6 h-6 text-gray-400 hover:bg-gray-200 hover:text-gray-900 rounded-lg dark:hover:bg-gray-600 dark:hover:text-white"
            aria-label="Close"
        >
            <x-icon.close size="sm" />
        </button>
    @endif

    {{ $slot }}
</div>