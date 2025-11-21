{{-- Quad Gallery Layout (2x2 Grid) --}}
@props([
    'gap' => 2,
])

@php
    $gapClasses = [
        1 => 'gap-1',
        2 => 'gap-2',
        4 => 'gap-4',
    ];

    $gridClasses = 'grid grid-cols-2 ' . ($gapClasses[$gap] ?? $gapClasses[2]);
@endphp

<div {{ $attributes->merge(['class' => $gridClasses]) }}>
    {{ $slot }}
</div>