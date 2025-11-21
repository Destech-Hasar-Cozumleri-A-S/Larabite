{{-- Speed Dial Action Item --}}
@props([
    'href' => null,
    'icon' => null,
    'label' => null,
    'tooltipPosition' => 'left', // left, right, top, bottom
    'shape' => 'circle', // circle, square
])

@php
    $tag = $href ? 'a' : 'button';

    // Tooltip position classes
    $tooltipPositions = [
        'left' => 'end-14 me-2',
        'right' => 'start-14 ms-2',
        'top' => 'bottom-14 mb-2',
        'bottom' => 'top-14 mt-2',
    ];

    $tooltipPositionClass = $tooltipPositions[$tooltipPosition] ?? $tooltipPositions['left'];

    // Shape classes
    $shapeClass = $shape === 'circle' ? 'rounded-full' : 'rounded-lg';
@endphp

<div class="relative">
    <{{ $tag }}
        @if($href)
            href="{{ $href }}"
        @endif
        type="{{ $tag === 'button' ? 'button' : null }}"
        {{ $attributes->merge(['class' => "flex items-center justify-center w-14 h-14 text-gray-500 hover:text-gray-900 bg-white {$shapeClass} border border-gray-200 dark:border-gray-600 shadow-sm dark:hover:text-white dark:text-gray-400 hover:bg-gray-50 dark:bg-gray-700 dark:hover:bg-gray-600 focus:ring-4 focus:ring-gray-300 focus:outline-none dark:focus:ring-gray-400"]) }}
        @if($label)
            aria-label="{{ $label }}"
        @endif
    >
        @if($icon)
            {!! $icon !!}
        @else
            {{ $slot }}
        @endif

        <span class="sr-only">{{ $label ?? 'Action' }}</span>
    </{{ $tag }}>

    @if($label)
        {{-- Tooltip --}}
        <div
            class="absolute {{ $tooltipPositionClass }} px-3 py-2 text-sm font-medium text-white bg-gray-900 rounded-lg shadow-sm opacity-0 group-hover:opacity-100 dark:bg-gray-700 transition-opacity duration-300 whitespace-nowrap"
            role="tooltip"
        >
            {{ $label }}
        </div>
    @endif
</div>