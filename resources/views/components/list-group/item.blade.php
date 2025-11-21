{{-- List Group Item (Text) --}}
@props([
    'active' => false,
    'first' => false,
    'last' => false,
])

@php
    $baseClasses = 'px-4 py-2 w-full';

    if ($active) {
        $baseClasses .= ' text-white bg-blue-700 dark:bg-blue-600';
    } else {
        $baseClasses .= ' text-gray-900 bg-white dark:bg-gray-700 dark:text-white';
    }

    if ($first) {
        $baseClasses .= ' rounded-t-lg';
    }

    if ($last) {
        $baseClasses .= ' rounded-b-lg';
    }
@endphp

<li {{ $attributes->merge(['class' => $baseClasses]) }}>
    {{ $slot }}
</li>