{{-- Table Cell Component --}}
@props([
    'align' => 'left', // left, center, right
    'nowrap' => false,
])

@php
    $alignClasses = [
        'left' => 'text-left',
        'center' => 'text-center',
        'right' => 'text-right',
    ];

    $alignClass = $alignClasses[$align] ?? $alignClasses['left'];

    $classes = "px-6 py-4 {$alignClass}";

    if ($nowrap) {
        $classes .= ' whitespace-nowrap';
    }
@endphp

<td {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</td>