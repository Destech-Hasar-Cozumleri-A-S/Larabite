{{-- Table Caption Component --}}
@props([
    'position' => 'top', // top, bottom
])

@php
    $classes = 'p-5 text-lg font-semibold text-left text-gray-900 bg-white dark:text-white dark:bg-gray-800';

    if ($position === 'bottom') {
        $classes .= ' caption-bottom';
    } else {
        $classes .= ' caption-top';
    }
@endphp

<caption {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</caption>