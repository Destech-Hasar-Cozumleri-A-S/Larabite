{{-- Footer Container --}}
@props([
    'sticky' => false,
    'container' => true,
])

@php
    $baseClasses = 'bg-white dark:bg-gray-900';

    if ($sticky) {
        $baseClasses .= ' fixed bottom-0 left-0 z-20 w-full';
    }

    $containerClasses = $container ? 'mx-auto w-full max-w-screen-xl p-4 py-6 lg:py-8' : 'w-full p-4 py-6 lg:py-8';
@endphp

<footer {{ $attributes->merge(['class' => $baseClasses]) }}>
    <div class="{{ $containerClasses }}">
        {{ $slot }}
    </div>
</footer>