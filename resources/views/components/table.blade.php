{{-- Table Component --}}
@props([
    'striped' => false, // Enable striped rows
    'hover' => true, // Enable hover effect
    'bordered' => true, // Show borders
    'shadow' => true, // Add shadow
    'responsive' => true, // Enable responsive wrapper
])

@php
    $wrapperClass = $responsive ? 'relative overflow-x-auto' : '';
    $shadowClass = $shadow ? 'shadow-md sm:rounded-lg' : '';

    $tableClasses = 'w-full text-sm text-left text-gray-500 dark:text-gray-400';

    if ($bordered) {
        $tableClasses .= ' border border-gray-200 dark:border-gray-700';
    }
@endphp

@if($responsive)
    <div class="{{ $wrapperClass }} {{ $shadowClass }}">
@endif

<table {{ $attributes->merge(['class' => $tableClasses]) }}>
    {{ $slot }}
</table>

@if($responsive)
    </div>
@endif