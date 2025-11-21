{{-- Modal Footer --}}
@props([
    'align' => 'end', // start, center, end, between
])

@php
    $alignClasses = [
        'start' => 'justify-start',
        'center' => 'justify-center',
        'end' => 'justify-end',
        'between' => 'justify-between',
    ];

    $baseClasses = 'flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b dark:border-gray-600 space-x-3 ' . ($alignClasses[$align] ?? $alignClasses['end']);
@endphp

<div {{ $attributes->merge(['class' => $baseClasses]) }}>
    {{ $slot }}
</div>