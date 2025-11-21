{{-- Modal Component --}}
@props([
    'id' => null,
    'size' => 'md', // sm, md, lg, xl, full
    'position' => 'center', // top, center, bottom
    'staticBackdrop' => false,
    'show' => false,
])

@php
    $id = $id ?? 'modal-' . uniqid();

    $sizeClasses = [
        'sm' => 'max-w-md',
        'md' => 'max-w-lg',
        'lg' => 'max-w-4xl',
        'xl' => 'max-w-7xl',
        'full' => 'max-w-full m-0',
    ];

    $positionClasses = [
        'top' => 'items-start',
        'center' => 'items-center',
        'bottom' => 'items-end',
    ];

    $modalClasses = 'relative w-full ' . ($sizeClasses[$size] ?? $sizeClasses['md']);
    $containerClasses = 'flex overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full ' . ($positionClasses[$position] ?? $positionClasses['center']);
@endphp

<div
    id="{{ $id }}"
    x-data="{ open: {{ $show ? 'true' : 'false' }} }"
    x-show="open"
    @keydown.escape.window="@if(!$staticBackdrop) open = false @endif"
    x-transition:enter="transition ease-out duration-200"
    x-transition:enter-start="opacity-0"
    x-transition:enter-end="opacity-100"
    x-transition:leave="transition ease-in duration-150"
    x-transition:leave-start="opacity-100"
    x-transition:leave-end="opacity-0"
    style="display: none;"
    tabindex="-1"
    aria-hidden="true"
    {{ $attributes->merge(['class' => $containerClasses]) }}
>
    {{-- Backdrop --}}
    <div
        @if(!$staticBackdrop) @click="open = false" @endif
        class="fixed inset-0 bg-gray-900 bg-opacity-50 dark:bg-opacity-80"
    ></div>

    {{-- Modal Content --}}
    <div class="{{ $modalClasses }}">
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            {{ $slot }}
        </div>
    </div>
</div>