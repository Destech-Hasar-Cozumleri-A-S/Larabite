{{-- KBD (Keyboard) Component --}}
@props([
    'size' => 'default', // sm, default, lg
])

@php
    $sizeClasses = [
        'sm' => 'px-1.5 py-1 text-xs',
        'default' => 'px-2 py-1.5 text-xs',
        'lg' => 'px-2.5 py-2 text-sm',
    ];

    $baseClasses = 'font-semibold text-gray-800 bg-gray-100 border border-gray-200 rounded-lg dark:bg-gray-600 dark:text-gray-100 dark:border-gray-500';

    $classes = $baseClasses . ' ' . ($sizeClasses[$size] ?? $sizeClasses['default']);
@endphp

<kbd {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</kbd>