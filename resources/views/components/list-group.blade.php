{{-- List Group Container --}}
@props([
    'divided' => false,
    'width' => 'auto', // auto, sm (w-48), md (w-72), lg (w-96), full
])

@php
    $widthClasses = [
        'auto' => '',
        'sm' => 'w-48',
        'md' => 'w-72',
        'lg' => 'w-96',
        'full' => 'w-full',
    ];

    $baseClasses = 'text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-lg dark:bg-gray-700 dark:border-gray-600 dark:text-white';

    $dividerClasses = $divided ? 'divide-y divide-gray-200 dark:divide-gray-600' : '';

    $widthClass = $widthClasses[$width] ?? $widthClasses['auto'];

    $classes = trim("{$baseClasses} {$dividerClasses} {$widthClass}");
@endphp

<ul {{ $attributes->merge(['class' => $classes]) }} role="list">
    {{ $slot }}
</ul>