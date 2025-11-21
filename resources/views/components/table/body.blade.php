{{-- Table Body Component --}}
@props([
    'striped' => false,
    'hover' => true,
])

@php
    $baseClass = 'bg-white dark:bg-gray-800';

    if ($striped) {
        $baseClass = '';
    }
@endphp

<tbody {{ $attributes->merge(['class' => $baseClass]) }}>
    {{ $slot }}
</tbody>