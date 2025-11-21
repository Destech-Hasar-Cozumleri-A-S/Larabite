{{-- List Group Link Item --}}
@props([
    'href' => '#',
    'active' => false,
    'first' => false,
    'last' => false,
])

@php
    $baseClasses = 'block px-4 py-2 w-full border-b border-gray-200 cursor-pointer hover:bg-gray-100 hover:text-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:border-gray-600 dark:hover:bg-gray-600 dark:hover:text-white dark:focus:ring-gray-500 dark:focus:text-white';

    if ($active) {
        $baseClasses .= ' text-white bg-blue-700 dark:bg-blue-600';
    } else {
        $baseClasses .= ' text-gray-900 dark:text-white';
    }

    if ($first) {
        $baseClasses .= ' rounded-t-lg';
    }

    if ($last) {
        $baseClasses .= ' border-b-0 rounded-b-lg';
    }
@endphp

<a
    href="{{ $href }}"
    @if($active) aria-current="true" @endif
    {{ $attributes->merge(['class' => $baseClasses]) }}
>
    {{ $slot }}
</a>