@props([
    'align' => 'right', // left, right
    'width' => '56', // width in rem
])

@php
    $alignmentClasses = [
        'left' => 'left-0',
        'right' => 'right-0',
    ];
@endphp

<div class="relative" x-data="{ open: false }" @click.away="open = false">
    {{-- Trigger --}}
    <div @click="open = !open">
        {{ $trigger }}
    </div>

    {{-- Dropdown Content --}}
    <div
        x-show="open"
        x-transition:enter="transition ease-out duration-200"
        x-transition:enter-start="opacity-0 scale-95"
        x-transition:enter-end="opacity-100 scale-100"
        x-transition:leave="transition ease-in duration-75"
        x-transition:leave-start="opacity-100 scale-100"
        x-transition:leave-end="opacity-0 scale-95"
        class="absolute {{ $alignmentClasses[$align] }} mt-2 w-{{ $width }} bg-white border border-gray-200 rounded-lg shadow-lg z-50"
        style="display: none;"
        @click="open = false"
    >
        {{ $slot }}
    </div>
</div>