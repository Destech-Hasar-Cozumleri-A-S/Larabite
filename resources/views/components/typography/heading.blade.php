@props([
    'level' => 1, // 1-6
    'variant' => 'default', // default, highlight, mark, gradient, underline
    'gradient' => 'blue-purple', // blue-purple, cyan-blue, green-blue, purple-pink, etc.
    'highlightColor' => 'blue', // blue, green, purple, pink, etc.
])

@php
    // Base classes for each heading level
    $levelClasses = [
        1 => 'text-5xl',
        2 => 'text-4xl',
        3 => 'text-3xl',
        4 => 'text-2xl',
        5 => 'text-xl',
        6 => 'text-lg',
    ];

    $baseClasses = 'font-bold text-gray-900 dark:text-white';
    $sizeClass = $levelClasses[$level] ?? $levelClasses[1];

    // Gradient classes
    $gradientClasses = [
        'blue-purple' => 'bg-gradient-to-r from-blue-600 to-purple-600',
        'cyan-blue' => 'bg-gradient-to-r from-cyan-500 to-blue-500',
        'green-blue' => 'bg-gradient-to-r from-green-400 to-blue-600',
        'purple-pink' => 'bg-gradient-to-r from-purple-500 to-pink-500',
        'teal-lime' => 'bg-gradient-to-r from-teal-400 to-lime-400',
        'red-yellow' => 'bg-gradient-to-r from-red-400 to-yellow-400',
    ];

    // Highlight color classes
    $highlightColors = [
        'blue' => 'text-blue-600 dark:text-blue-500',
        'green' => 'text-green-600 dark:text-green-500',
        'purple' => 'text-purple-600 dark:text-purple-500',
        'pink' => 'text-pink-600 dark:text-pink-500',
        'red' => 'text-red-600 dark:text-red-500',
        'yellow' => 'text-yellow-400 dark:text-yellow-300',
        'cyan' => 'text-cyan-600 dark:text-cyan-500',
    ];

    if ($variant === 'gradient') {
        $classes = $sizeClass . ' font-extrabold text-transparent bg-clip-text ' . $gradientClasses[$gradient];
    } else {
        $classes = $baseClasses . ' ' . $sizeClass;
    }

    $tag = 'h' . $level;
@endphp

@if($variant === 'default' || $variant === 'highlight')
    <{{ $tag }} {{ $attributes->merge(['class' => $classes]) }}>
        {{ $slot }}
    </{{ $tag }}>
@elseif($variant === 'mark')
    <{{ $tag }} {{ $attributes->merge(['class' => $classes]) }}>
        {{ $slot }}
    </{{ $tag }}>
@elseif($variant === 'gradient')
    <{{ $tag }} {{ $attributes->merge(['class' => $classes]) }}>
        {{ $slot }}
    </{{ $tag }}>
@elseif($variant === 'underline')
    <{{ $tag }} {{ $attributes->merge(['class' => $classes . ' underline underline-offset-3 decoration-8 decoration-blue-400 dark:decoration-blue-600']) }}>
        {{ $slot }}
    </{{ $tag }}>
@endif