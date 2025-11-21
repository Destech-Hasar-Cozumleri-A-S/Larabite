{{-- Skeleton List --}}
@props([
    'items' => 3,
    'animated' => true,
    'divided' => true,
])

@php
    $animateClass = $animated ? 'animate-pulse' : '';
    $dividerClass = $divided ? 'border-b border-gray-200 dark:border-gray-700' : '';
@endphp

<div {{ $attributes->merge(['class' => 'space-y-3']) }} role="status" aria-label="Loading">
    @for($i = 0; $i < $items; $i++)
        <div class="flex items-center justify-between p-4 {{ $dividerClass }}">
            <div class="flex-1">
                <div class="h-2.5 bg-gray-300 rounded-full dark:bg-gray-600 w-24 mb-2.5 {{ $animateClass }}"></div>
                <div class="w-32 h-2 bg-gray-200 rounded-full dark:bg-gray-700 {{ $animateClass }}"></div>
            </div>
            <div class="h-2.5 bg-gray-300 rounded-full dark:bg-gray-700 w-12 {{ $animateClass }}"></div>
        </div>
    @endfor

    <span class="sr-only">Loading...</span>
</div>