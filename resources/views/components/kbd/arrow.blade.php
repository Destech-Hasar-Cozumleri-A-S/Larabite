{{-- Arrow Key Component --}}
@props([
    'direction' => 'up', // up, down, left, right
    'size' => 'default',
])

@php
    $sizeClasses = [
        'sm' => 'px-1.5 py-1 text-xs',
        'default' => 'px-2 py-1.5 text-xs',
        'lg' => 'px-2.5 py-2 text-sm',
    ];

    $baseClasses = 'inline-flex items-center justify-center font-semibold text-gray-800 bg-gray-100 border border-gray-200 rounded-lg dark:bg-gray-600 dark:text-gray-100 dark:border-gray-500';

    $classes = $baseClasses . ' ' . ($sizeClasses[$size] ?? $sizeClasses['default']);

    $rotations = [
        'up' => '',
        'down' => 'rotate-180',
        'left' => '-rotate-90 rtl:rotate-90',
        'right' => 'rotate-90 rtl:-rotate-90',
    ];

    $rotation = $rotations[$direction] ?? '';

    $labels = [
        'up' => 'Arrow key up',
        'down' => 'Arrow key down',
        'left' => 'Arrow key left',
        'right' => 'Arrow key right',
    ];

    $label = $labels[$direction] ?? 'Arrow key';
@endphp

<kbd {{ $attributes->merge(['class' => $classes]) }}>
    <svg class="w-4 h-4 {{ $rotation }}" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 16 20">
        <path d="M8 0 0 8h4v12h8V8h4L8 0Z"/>
    </svg>
    <span class="sr-only">{{ $label }}</span>
</kbd>