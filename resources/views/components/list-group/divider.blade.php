{{-- List Group Divider --}}
@props([
    'label' => null,
])

@php
    $baseClasses = 'px-4 py-2 text-xs font-semibold text-gray-900 uppercase bg-gray-50 dark:bg-gray-600 dark:text-gray-400';
@endphp

<li {{ $attributes->merge(['class' => $baseClasses]) }}>
    {{ $label ?? $slot }}
</li>