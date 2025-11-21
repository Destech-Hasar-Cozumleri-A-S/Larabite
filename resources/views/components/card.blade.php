@props([
    'padding' => true,
    'shadow' => 'sm', // none, sm, md, lg, xl
    'hover' => false,
])

@php
    $baseClasses = 'bg-white rounded-lg border border-gray-200';

    $shadowClasses = [
        'none' => '',
        'sm' => 'shadow-sm',
        'md' => 'shadow-md',
        'lg' => 'shadow-lg',
        'xl' => 'shadow-xl',
    ];

    $paddingClass = $padding ? 'p-6' : '';
    $hoverClass = $hover ? 'hover:shadow-lg transition-shadow duration-300' : '';

    $classes = trim("{$baseClasses} {$shadowClasses[$shadow]} {$paddingClass} {$hoverClass}");
@endphp

<div {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</div>