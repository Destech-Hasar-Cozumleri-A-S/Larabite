{{-- Indicator Dot --}}
@props([
    'color' => 'gray', // gray, blue, red, green, yellow, purple, indigo, teal, orange
    'size' => 'default', // sm, default, lg
    'label' => null,
    'border' => false,
])

@php
    // Color classes
    $colorClasses = [
        'gray' => 'bg-gray-500 dark:bg-gray-400',
        'blue' => 'bg-blue-600 dark:bg-blue-500',
        'red' => 'bg-red-600 dark:bg-red-500',
        'green' => 'bg-green-600 dark:bg-green-500',
        'yellow' => 'bg-yellow-400 dark:bg-yellow-300',
        'purple' => 'bg-purple-600 dark:bg-purple-500',
        'indigo' => 'bg-indigo-600 dark:bg-indigo-500',
        'teal' => 'bg-teal-600 dark:bg-teal-500',
        'orange' => 'bg-orange-600 dark:bg-orange-500',
    ];

    // Size classes
    $sizeClasses = [
        'sm' => 'w-2.5 h-2.5',
        'default' => 'w-3 h-3',
        'lg' => 'w-3.5 h-3.5',
    ];

    $dotClasses = 'rounded-full ' . ($colorClasses[$color] ?? $colorClasses['gray']) . ' ' . ($sizeClasses[$size] ?? $sizeClasses['default']);

    if ($border) {
        $dotClasses .= ' border-2 border-white dark:border-gray-800';
    }
@endphp

@if($label)
    {{-- Legend Indicator with Label --}}
    <div {{ $attributes->merge(['class' => 'flex items-center']) }}>
        <span class="{{ $dotClasses }}"></span>
        <span class="text-sm font-medium text-gray-900 dark:text-white ms-2">{{ $label }}</span>
    </div>
@else
    {{-- Simple Dot --}}
    <span {{ $attributes->merge(['class' => $dotClasses]) }}></span>
@endif