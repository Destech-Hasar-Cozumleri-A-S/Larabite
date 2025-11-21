{{-- Timeline Component --}}
@props([
    'orientation' => 'vertical', // vertical, horizontal
])

@php
    $containerClass = $orientation === 'horizontal'
        ? 'flex items-start'
        : 'relative border-s border-gray-200 dark:border-gray-700';
@endphp

<ol {{ $attributes->merge(['class' => $containerClass]) }}>
    {{ $slot }}
</ol>