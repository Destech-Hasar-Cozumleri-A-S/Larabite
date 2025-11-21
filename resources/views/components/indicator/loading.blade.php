{{-- Loading Indicator --}}
@props([
    'text' => 'Loading...',
    'size' => 'default', // sm, default, lg
])

@php
    $sizeClasses = [
        'sm' => 'text-xs',
        'default' => 'text-sm',
        'lg' => 'text-base',
    ];

    $textClasses = 'text-gray-500 dark:text-gray-400 animate-pulse ' . ($sizeClasses[$size] ?? $sizeClasses['default']);
@endphp

<div {{ $attributes->merge(['class' => 'flex items-center']) }}>
    <span class="{{ $textClasses }}">{{ $text }}</span>
</div>