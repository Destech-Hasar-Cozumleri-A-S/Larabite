@props([
    'alwaysOpen' => false,
    'flush' => false,
])

@php
    $containerClasses = $flush
        ? '' // Flush accordion has no border or shadow
        : 'border border-gray-200 rounded-lg shadow-sm overflow-hidden';
@endphp

<div
    {{ $attributes->merge(['class' => $containerClasses]) }}
    x-data="{ activeItems: [] }"
>
    {{ $slot }}
</div>