{{-- Table Row Component --}}
@props([
    'striped' => false,
    'hover' => true,
])

@php
    $classes = 'border-b dark:border-gray-700';

    if ($striped) {
        $classes .= ' odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800';
    } else {
        $classes .= ' bg-white dark:bg-gray-800';
    }

    if ($hover) {
        $classes .= ' hover:bg-gray-50 dark:hover:bg-gray-600';
    }
@endphp

<tr {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</tr>