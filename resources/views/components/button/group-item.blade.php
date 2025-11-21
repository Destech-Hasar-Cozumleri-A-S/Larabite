@props([
    'position' => 'middle', // first, middle, last
    'vertical' => false,
])

@php
    // Position classes (rounded corners) - will override the rounded-lg from base button
    if ($vertical) {
        $positionClasses = [
            'first' => '!rounded-b-none',
            'middle' => '!rounded-none',
            'last' => '!rounded-t-none',
        ];
    } else {
        $positionClasses = [
            'first' => '!rounded-e-none rtl:!rounded-e-lg rtl:!rounded-s-none',
            'middle' => '!rounded-none',
            'last' => '!rounded-s-none rtl:!rounded-s-lg rtl:!rounded-e-none',
        ];
    }

    // Add focus z-index to ensure focused button appears above siblings
    $focusClasses = 'focus:z-10';
@endphp

<x-ui.button
    {{ $attributes->merge(['class' => $positionClasses[$position] . ' ' . $focusClasses]) }}
>
    {{ $slot }}
</x-ui.button>