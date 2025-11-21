{{-- Text Utility Component --}}
@props([
    'variant' => 'default', // default, lead, secondary, muted, small
    'weight' => null, // light, normal, medium, semibold, bold, extrabold, black
    'decoration' => null, // underline, line-through, none
    'transform' => null, // uppercase, lowercase, capitalize, normal-case
    'align' => null, // left, center, right, justify
    'color' => null, // Custom color classes
    'size' => null, // xs, sm, base, lg, xl, 2xl, 3xl, 4xl, 5xl, 6xl, 7xl, 8xl, 9xl
    'italic' => false,
    'truncate' => false,
])

@php
    $baseClasses = '';

    // Variant-based styling
    $variantClasses = [
        'default' => 'text-gray-900 dark:text-white',
        'lead' => 'text-xl font-normal text-gray-500 lg:text-2xl dark:text-gray-400',
        'secondary' => 'text-lg font-normal text-gray-500 dark:text-gray-400',
        'muted' => 'text-sm font-normal text-gray-500 dark:text-gray-400',
        'small' => 'text-xs font-normal text-gray-500 dark:text-gray-400',
    ];

    // Weight classes
    $weightClasses = [
        'light' => 'font-light',
        'normal' => 'font-normal',
        'medium' => 'font-medium',
        'semibold' => 'font-semibold',
        'bold' => 'font-bold',
        'extrabold' => 'font-extrabold',
        'black' => 'font-black',
    ];

    // Decoration classes
    $decorationClasses = [
        'underline' => 'underline',
        'line-through' => 'line-through',
        'none' => 'no-underline',
    ];

    // Transform classes
    $transformClasses = [
        'uppercase' => 'uppercase',
        'lowercase' => 'lowercase',
        'capitalize' => 'capitalize',
        'normal-case' => 'normal-case',
    ];

    // Alignment classes
    $alignClasses = [
        'left' => 'text-left',
        'center' => 'text-center',
        'right' => 'text-right',
        'justify' => 'text-justify',
    ];

    // Size classes
    $sizeClasses = [
        'xs' => 'text-xs',
        'sm' => 'text-sm',
        'base' => 'text-base',
        'lg' => 'text-lg',
        'xl' => 'text-xl',
        '2xl' => 'text-2xl',
        '3xl' => 'text-3xl',
        '4xl' => 'text-4xl',
        '5xl' => 'text-5xl',
        '6xl' => 'text-6xl',
        '7xl' => 'text-7xl',
        '8xl' => 'text-8xl',
        '9xl' => 'text-9xl',
    ];

    // Build classes
    $classes = $variantClasses[$variant] ?? '';

    if ($size) {
        $classes .= ' ' . ($sizeClasses[$size] ?? '');
    }

    if ($weight) {
        $classes .= ' ' . ($weightClasses[$weight] ?? '');
    }

    if ($decoration) {
        $classes .= ' ' . ($decorationClasses[$decoration] ?? '');
    }

    if ($transform) {
        $classes .= ' ' . ($transformClasses[$transform] ?? '');
    }

    if ($align) {
        $classes .= ' ' . ($alignClasses[$align] ?? '');
    }

    if ($italic) {
        $classes .= ' italic';
    }

    if ($truncate) {
        $classes .= ' truncate';
    }

    if ($color) {
        $classes .= ' ' . $color;
    }
@endphp

<span {{ $attributes->merge(['class' => trim($classes)]) }}>
    {{ $slot }}
</span>