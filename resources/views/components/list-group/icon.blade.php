{{-- List Group Icon Component --}}
@props([
    'size' => 'default', // sm, default, lg
])

@php
    $sizeClasses = [
        'sm' => 'w-3 h-3',
        'default' => 'w-4 h-4',
        'lg' => 'w-5 h-5',
    ];

    $classes = 'me-2 flex-shrink-0 ' . ($sizeClasses[$size] ?? $sizeClasses['default']);
@endphp

<span {{ $attributes->merge(['class' => $classes]) }} aria-hidden="true">
    {{ $slot }}
</span>