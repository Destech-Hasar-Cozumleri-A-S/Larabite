@props([
    'vertical' => false, // Horizontal or vertical layout
])

@php
    $classes = $vertical
        ? 'inline-flex flex-col rounded-lg shadow-sm -space-y-px'
        : 'inline-flex rounded-lg shadow-sm -space-x-px rtl:space-x-reverse';
@endphp

<div {{ $attributes->merge(['class' => $classes]) }} role="group">
    {{ $slot }}
</div>