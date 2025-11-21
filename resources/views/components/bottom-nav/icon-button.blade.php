@props([
    'href' => '#',
    'active' => false,
    'label' => '',
    'tooltip' => null,
    'wire' => null,
])

@php
    $activeClasses = $active
        ? 'text-blue-600 dark:text-blue-500'
        : 'text-gray-500 dark:text-gray-400 hover:bg-gray-50 dark:hover:bg-gray-800';

    $buttonId = 'bottom-nav-' . uniqid();
@endphp

@if($wire)
    <button
        type="button"
        wire:click="{{ $wire }}"
        @if($tooltip) data-tooltip-target="tooltip-{{ $buttonId }}" @endif
        {{ $attributes->merge(['class' => "inline-flex flex-col items-center justify-center px-5 rounded-s-full {$activeClasses} group"]) }}
    >
        {{ $slot }}
        <span class="sr-only">{{ $label }}</span>
    </button>
@else
    <a
        href="{{ $href }}"
        @if($tooltip) data-tooltip-target="tooltip-{{ $buttonId }}" @endif
        {{ $attributes->merge(['class' => "inline-flex flex-col items-center justify-center px-5 rounded-s-full {$activeClasses} group"]) }}
    >
        {{ $slot }}
        <span class="sr-only">{{ $label }}</span>
    </a>
@endif

@if($tooltip)
    <div id="tooltip-{{ $buttonId }}" role="tooltip" class="absolute z-10 invisible px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
        {{ $tooltip }}
        <div class="tooltip-arrow" data-popper-arrow></div>
    </div>
@endif