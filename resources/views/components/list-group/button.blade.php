{{-- List Group Button Item --}}
@props([
    'active' => false,
    'disabled' => false,
    'first' => false,
    'last' => false,
])

@php
    $baseClasses = 'inline-flex items-center px-4 py-2 w-full text-sm font-medium border-b border-gray-200 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:border-gray-600 dark:focus:ring-gray-500 dark:focus:text-white';

    if ($disabled) {
        $baseClasses .= ' cursor-not-allowed text-gray-400 bg-gray-100 dark:bg-gray-600 dark:text-gray-500';
    } elseif ($active) {
        $baseClasses .= ' text-white bg-blue-700 dark:bg-blue-600';
    } else {
        $baseClasses .= ' text-gray-900 bg-white hover:bg-gray-100 hover:text-blue-700 dark:bg-gray-700 dark:text-white dark:hover:bg-gray-600 dark:hover:text-white cursor-pointer';
    }

    if ($first) {
        $baseClasses .= ' rounded-t-lg';
    }

    if ($last) {
        $baseClasses .= ' border-b-0 rounded-b-lg';
    }
@endphp

<button
    type="button"
    @if($disabled) disabled @endif
    @if($active) aria-current="true" @endif
    {{ $attributes->merge(['class' => $baseClasses]) }}
>
    {{ $slot }}
</button>