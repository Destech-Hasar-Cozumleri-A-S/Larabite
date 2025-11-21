@props([
    'variant' => 'default', // default, primary, success, warning, danger, info
    'size' => 'md', // sm, md
])

@php
    $variantClasses = [
        'default' => 'bg-gray-100 text-gray-800',
        'primary' => 'bg-blue-100 text-blue-800',
        'success' => 'bg-green-100 text-green-800',
        'warning' => 'bg-yellow-100 text-yellow-800',
        'danger' => 'bg-red-100 text-red-800',
        'info' => 'bg-cyan-100 text-cyan-800',
    ];

    $sizeClasses = [
        'sm' => 'w-5 h-5',
        'md' => 'w-6 h-6',
    ];

    $iconSizes = [
        'sm' => 'w-2.5 h-2.5',
        'md' => 'w-3 h-3',
    ];
@endphp

<span {{ $attributes->merge(['class' => "inline-flex items-center justify-center {$sizeClasses[$size]} {$variantClasses[$variant]} rounded-full"]) }}>
    <svg class="{{ $iconSizes[$size] }}" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
        {{ $slot }}
    </svg>
</span>