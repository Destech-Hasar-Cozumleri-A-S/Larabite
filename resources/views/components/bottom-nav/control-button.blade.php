@props([
    'active' => false,
    'wire' => null,
    'href' => null,
    'label' => '',
    'size' => 'md', // sm, md, lg
])

@php
    $activeClasses = $active
        ? 'text-blue-600 dark:text-blue-500'
        : 'text-gray-500 dark:text-gray-400';

    $sizeClasses = [
        'sm' => 'p-2.5',
        'md' => 'p-4',
        'lg' => 'p-5',
    ];
@endphp

@if($wire)
    <button
        type="button"
        wire:click="{{ $wire }}"
        {{ $attributes->merge(['class' => "inline-flex items-center justify-center {$sizeClasses[$size]} hover:bg-gray-50 dark:hover:bg-gray-800 group {$activeClasses}"]) }}
    >
        {{ $slot }}
        @if($label)
            <span class="sr-only">{{ $label }}</span>
        @endif
    </button>
@elseif($href)
    <a
        href="{{ $href }}"
        {{ $attributes->merge(['class' => "inline-flex items-center justify-center {$sizeClasses[$size]} hover:bg-gray-50 dark:hover:bg-gray-800 group {$activeClasses}"]) }}
    >
        {{ $slot }}
        @if($label)
            <span class="sr-only">{{ $label }}</span>
        @endif
    </a>
@else
    <button
        type="button"
        {{ $attributes->merge(['class' => "inline-flex items-center justify-center {$sizeClasses[$size]} hover:bg-gray-50 dark:hover:bg-gray-800 group {$activeClasses}"]) }}
    >
        {{ $slot }}
        @if($label)
            <span class="sr-only">{{ $label }}</span>
        @endif
    </button>
@endif