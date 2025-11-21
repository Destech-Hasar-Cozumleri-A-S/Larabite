{{-- Stepper Component --}}
@props([
    'orientation' => 'horizontal', // horizontal, vertical
    'variant' => 'default', // default, progress, detailed, breadcrumb
    'currentStep' => 1,
])

@php
    // Orientation classes
    $orientationClasses = [
        'horizontal' => 'flex items-center',
        'vertical' => 'space-y-4',
    ];

    $orientationClass = $orientationClasses[$orientation] ?? $orientationClasses['horizontal'];

    // Spacing classes
    $spacingClass = $orientation === 'horizontal' ? 'space-x-4' : '';
@endphp

<ol {{ $attributes->merge(['class' => "{$orientationClass} {$spacingClass}"]) }}>
    {{ $slot }}
</ol>