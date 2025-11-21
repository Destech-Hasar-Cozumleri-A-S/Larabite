{{-- Modal Body --}}
@props([
    'scrollable' => true,
])

@php
    $baseClasses = 'p-4 md:p-5 space-y-4';

    if ($scrollable) {
        $baseClasses .= ' max-h-[60vh] overflow-y-auto';
    }
@endphp

<div {{ $attributes->merge(['class' => $baseClasses]) }}>
    {{ $slot }}
</div>