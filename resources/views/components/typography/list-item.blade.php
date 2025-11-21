@props([
    'icon' => null, // SVG icon
    'type' => 'li', // li, dt, dd
])

@php
    $classes = '';

    if ($icon) {
        // If icon is provided, use flex layout
        $classes = 'flex items-center space-x-3 rtl:space-x-reverse';
    }
@endphp

@if($icon)
    <{{ $type }} {{ $attributes->merge(['class' => $classes]) }}>
        <span class="flex-shrink-0">
            {!! $icon !!}
        </span>
        <span>{{ $slot }}</span>
    </{{ $type }}>
@else
    <{{ $type }} {{ $attributes->merge(['class' => $classes]) }}>
        {{ $slot }}
    </{{ $type }}>
@endif