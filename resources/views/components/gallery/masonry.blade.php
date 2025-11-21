{{-- Masonry Gallery Layout --}}
@props([
    'columns' => 4, // 2, 3, 4
    'gap' => 4,
])

@php
    $columnClasses = [
        2 => 'grid-cols-2',
        3 => 'grid-cols-2 md:grid-cols-3',
        4 => 'grid-cols-2 md:grid-cols-4',
    ];

    $gapClasses = [
        2 => 'gap-2',
        4 => 'gap-4',
        6 => 'gap-6',
        8 => 'gap-8',
    ];

    $gridClasses = 'grid ' . ($columnClasses[$columns] ?? $columnClasses[4]) . ' ' . ($gapClasses[$gap] ?? $gapClasses[4]);
@endphp

<div {{ $attributes->merge(['class' => $gridClasses]) }}>
    @foreach(range(1, $columns) as $column)
        <div class="grid gap-{{ $gap }}">
            {{ ${'column' . $column} ?? '' }}
        </div>
    @endforeach
</div>