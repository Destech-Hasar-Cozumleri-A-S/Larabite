@props([
    'type' => 'unordered', // unordered, ordered, description, unstyled
    'position' => 'inside', // inside, outside
    'spacing' => '1', // 1, 2, 4
    'icon' => null, // SVG icon for custom lists
])

@php
    $baseClasses = 'text-gray-700 dark:text-gray-400';

    // Type classes
    $typeClasses = [
        'unordered' => 'list-disc',
        'ordered' => 'list-decimal',
        'description' => '',
        'unstyled' => 'list-none',
    ];

    // Position classes
    $positionClasses = [
        'inside' => 'list-inside',
        'outside' => 'list-outside',
    ];

    // Spacing classes
    $spacingClasses = [
        '1' => 'space-y-1',
        '2' => 'space-y-2',
        '4' => 'space-y-4',
    ];

    if ($type === 'description') {
        $classes = 'text-gray-900 dark:text-white divide-y divide-gray-200 dark:divide-gray-700';
    } else {
        $classes = $baseClasses . ' ' . $typeClasses[$type] . ' ' . $positionClasses[$position] . ' ' . $spacingClasses[$spacing];
    }

    $tag = match($type) {
        'ordered' => 'ol',
        'description' => 'dl',
        default => 'ul',
    };
@endphp

<{{ $tag }} {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</{{ $tag }}>