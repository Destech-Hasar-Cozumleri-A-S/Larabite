{{-- Gallery Container --}}
@props([
    'columns' => 3, // 2, 3, 4, 5
    'gap' => 4, // 2, 4, 6, 8
    'layout' => 'default', // default, masonry, featured, quad
])

@php
    // Column classes
    $columnClasses = [
        2 => 'grid-cols-2',
        3 => 'grid-cols-2 md:grid-cols-3',
        4 => 'grid-cols-2 md:grid-cols-4',
        5 => 'grid-cols-2 md:grid-cols-5',
    ];

    // Gap classes
    $gapClasses = [
        2 => 'gap-2',
        4 => 'gap-4',
        6 => 'gap-6',
        8 => 'gap-8',
    ];

    $gridClasses = 'grid ' . ($columnClasses[$columns] ?? $columnClasses[3]) . ' ' . ($gapClasses[$gap] ?? $gapClasses[4]);
@endphp

<div {{ $attributes->merge(['class' => $gridClasses]) }}>
    {{ $slot }}
</div>