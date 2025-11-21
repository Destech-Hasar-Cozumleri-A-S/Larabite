{{-- Indicator Count Badge --}}
@props([
    'count' => null,
    'max' => 99,
    'position' => 'top-right', // top-left, top-center, top-right, middle-left, middle-center, middle-right, bottom-left, bottom-center, bottom-right
    'color' => 'red', // red, blue, green, gray
    'size' => 'default', // sm, default, lg
])

@php
    // Color classes
    $colorClasses = [
        'red' => 'bg-red-500 text-white',
        'blue' => 'bg-blue-500 text-white',
        'green' => 'bg-green-500 text-white',
        'gray' => 'bg-gray-500 text-white',
    ];

    // Size classes
    $sizeClasses = [
        'sm' => 'w-5 h-5 text-xs',
        'default' => 'w-6 h-6 text-xs',
        'lg' => 'w-7 h-7 text-sm',
    ];

    // Position classes
    $positionClasses = [
        'top-left' => '-top-2 -start-2',
        'top-center' => '-top-2 start-1/2 -translate-x-1/2',
        'top-right' => '-top-2 -end-2',
        'middle-left' => 'top-1/2 -translate-y-1/2 -start-2',
        'middle-center' => 'top-1/2 start-1/2 -translate-x-1/2 -translate-y-1/2',
        'middle-right' => 'top-1/2 -translate-y-1/2 -end-2',
        'bottom-left' => '-bottom-2 -start-2',
        'bottom-center' => '-bottom-2 start-1/2 -translate-x-1/2',
        'bottom-right' => '-bottom-2 -end-2',
    ];

    $badgeClasses = 'absolute inline-flex items-center justify-center rounded-full border-2 border-white dark:border-gray-900 '
        . ($colorClasses[$color] ?? $colorClasses['red']) . ' '
        . ($sizeClasses[$size] ?? $sizeClasses['default']) . ' '
        . ($positionClasses[$position] ?? $positionClasses['top-right']);

    $displayCount = $count > $max ? $max . '+' : $count;
@endphp

<span {{ $attributes->merge(['class' => $badgeClasses]) }}>
    {{ $displayCount ?? $slot }}
</span>