{{-- Mega Menu Simple Link --}}
@props([
    'href' => '#',
    'active' => false,
])

@php
    $baseClasses = 'block px-3 py-2 text-sm rounded-lg transition-colors';

    if ($active) {
        $baseClasses .= ' text-blue-700 bg-blue-50 dark:text-blue-500 dark:bg-gray-700';
    } else {
        $baseClasses .= ' text-gray-700 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-700';
    }
@endphp

<a
    href="{{ $href }}"
    @if($active) aria-current="page" @endif
    {{ $attributes->merge(['class' => $baseClasses]) }}
>
    {{ $slot }}
</a>