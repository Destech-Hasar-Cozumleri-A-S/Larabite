{{-- Featured Gallery Layout --}}
@props([
    'featuredSrc' => null,
    'featuredAlt' => '',
    'thumbnailColumns' => 5,
    'gap' => 4,
])

@php
    $columnClasses = [
        4 => 'grid-cols-4',
        5 => 'grid-cols-5',
        6 => 'grid-cols-6',
    ];

    $gapClasses = [
        2 => 'gap-2',
        4 => 'gap-4',
        6 => 'gap-6',
    ];

    $thumbnailGrid = 'grid ' . ($columnClasses[$thumbnailColumns] ?? $columnClasses[5]) . ' ' . ($gapClasses[$gap] ?? $gapClasses[4]);
@endphp

<div {{ $attributes->merge(['class' => 'space-y-' . $gap]) }}>
    {{-- Featured Image --}}
    @if($featuredSrc)
        <div class="w-full">
            <img
                src="{{ $featuredSrc }}"
                alt="{{ $featuredAlt }}"
                class="h-auto max-w-full rounded-lg w-full object-cover"
            >
        </div>
    @else
        {{ $featured ?? '' }}
    @endif

    {{-- Thumbnail Grid --}}
    <div class="{{ $thumbnailGrid }}">
        {{ $thumbnails ?? $slot }}
    </div>
</div>