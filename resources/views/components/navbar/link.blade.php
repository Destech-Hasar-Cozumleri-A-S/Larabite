{{-- Navbar Link --}}
@props([
    'href' => '#',
    'active' => false,
])

@php
    $baseClasses = 'block py-2 px-3 rounded md:p-0';

    if ($active) {
        $baseClasses .= ' text-white bg-blue-700 md:bg-transparent md:text-blue-700 md:dark:text-blue-500';
    } else {
        $baseClasses .= ' text-gray-900 hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:dark:hover:text-blue-500 dark:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700';
    }
@endphp

<li>
    <a
        href="{{ $href }}"
        @if($active) aria-current="page" @endif
        {{ $attributes->merge(['class' => $baseClasses]) }}
    >
        {{ $slot }}
    </a>
</li>