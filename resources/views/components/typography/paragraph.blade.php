@props([
    'size' => 'base', // base, lg, xl
    'leading' => 'normal', // normal, relaxed, loose
    'align' => 'left', // left, center, right, justify
    'firstLetter' => false, // Drop cap effect
    'firstLine' => false, // First line special styling
])

@php
    $baseClasses = 'text-gray-700 dark:text-gray-400 mb-3';

    // Size classes
    $sizeClasses = [
        'base' => 'text-base',
        'lg' => 'text-lg md:text-xl',
        'xl' => 'text-xl md:text-2xl',
    ];

    // Leading classes
    $leadingClasses = [
        'normal' => 'leading-normal',
        'relaxed' => 'leading-relaxed',
        'loose' => 'leading-loose',
    ];

    // Alignment classes
    $alignClasses = [
        'left' => 'text-left rtl:text-right',
        'center' => 'text-center',
        'right' => 'text-right rtl:text-left',
        'justify' => 'text-justify',
    ];

    $classes = $baseClasses . ' ' . $sizeClasses[$size] . ' ' . $leadingClasses[$leading] . ' ' . $alignClasses[$align];

    // Drop cap and first line effects
    if ($firstLetter) {
        $classes .= ' first-letter:text-7xl first-letter:font-bold first-letter:text-gray-900 dark:first-letter:text-white first-letter:me-3 first-letter:float-start';
    }

    if ($firstLine) {
        $classes .= ' first-line:uppercase first-line:tracking-widest';
    }
@endphp

<p {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</p>