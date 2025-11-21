@props([
    'border' => false,
])

@php
    $borderClass = $border ? 'border-t border-gray-200' : '';
@endphp

<div
    {{ $attributes->merge(['class' => "fixed bottom-0 start-0 z-50 w-full bg-white {$borderClass}"]) }}
>
    <div class="grid h-full max-w-lg grid-cols-4 mx-auto font-medium">
        {{ $slot }}
    </div>
</div>