@props([
    'background' => false, // solid background variant
])

@php
    $containerClasses = $background
        ? 'bg-gray-50 border border-gray-200 rounded-lg p-3'
        : '';
@endphp

<nav aria-label="Breadcrumb" {{ $attributes->merge(['class' => $containerClasses]) }}>
    <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
        {{ $slot }}
    </ol>
</nav>