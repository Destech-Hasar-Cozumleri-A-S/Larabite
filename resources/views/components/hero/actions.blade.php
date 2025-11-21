{{-- Hero Actions (CTA Buttons) --}}
@props([
    'align' => 'center', // left, center
])

@php
    $containerClasses = 'flex flex-col space-y-4 sm:flex-row sm:space-y-0 sm:space-x-4';

    if ($align === 'center') {
        $containerClasses .= ' sm:justify-center';
    } elseif ($align === 'left') {
        $containerClasses .= ' sm:justify-start';
    }
@endphp

<div {{ $attributes->merge(['class' => $containerClasses]) }}>
    {{ $slot }}
</div>