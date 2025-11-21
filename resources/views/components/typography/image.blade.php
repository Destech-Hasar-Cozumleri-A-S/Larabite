@props([
    'src' => null,
    'alt' => '',
    'caption' => null,
    'align' => 'left', // left, center, right
    'size' => 'full', // xs, md, xl, full
    'rounded' => 'base', // none, base, lg, full
    'shadow' => false,
])

@php
    $baseClasses = 'h-auto';

    // Size classes
    $sizeClasses = [
        'xs' => 'max-w-xs',
        'md' => 'max-w-md',
        'xl' => 'max-w-xl',
        'full' => 'max-w-full',
    ];

    // Alignment classes
    $alignClasses = [
        'left' => '',
        'center' => 'mx-auto',
        'right' => 'ms-auto',
    ];

    // Rounded classes
    $roundedClasses = [
        'none' => '',
        'base' => 'rounded-lg',
        'lg' => 'rounded-xl',
        'full' => 'rounded-full',
    ];

    $classes = $baseClasses . ' ' . $sizeClasses[$size] . ' ' . $alignClasses[$align] . ' ' . $roundedClasses[$rounded];

    if ($shadow) {
        $classes .= ' shadow-xl dark:shadow-gray-800';
    }
@endphp

@if($caption)
    <figure {{ $attributes->merge(['class' => $alignClasses[$align]]) }}>
        <img src="{{ $src }}" alt="{{ $alt }}" class="{{ $classes }}">
        <figcaption class="mt-2 text-sm text-center text-gray-500 dark:text-gray-400">
            {{ $caption }}
        </figcaption>
    </figure>
@else
    <img src="{{ $src }}" alt="{{ $alt }}" {{ $attributes->merge(['class' => $classes]) }}>
@endif