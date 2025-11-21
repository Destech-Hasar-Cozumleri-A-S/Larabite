{{-- Function Key Component --}}
@props([
    'number' => 1, // 1-12
    'size' => 'default',
])

@php
    // Validate number is between 1-12
    $number = max(1, min(12, (int) $number));
@endphp

<x-ui.kbd :size="$size" {{ $attributes }}>
    F{{ $number }}
</x-ui.kbd>