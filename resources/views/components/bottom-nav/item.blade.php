@props([
    'href' => '#',
    'active' => false,
    'label' => '',
    'showBorder' => false,
    'wire' => null,
])

@php
    $activeClasses = $active
        ? 'text-blue-600 dark:text-blue-500'
        : 'text-gray-500 dark:text-gray-400 hover:bg-gray-50 dark:hover:bg-gray-800';

    $borderClass = $showBorder ? 'border-x border-gray-200' : '';
@endphp

@if($wire)
    <button
        type="button"
        wire:click="{{ $wire }}"
        {{ $attributes->merge(['class' => "inline-flex flex-col items-center justify-center px-5 {$activeClasses} {$borderClass} group"]) }}
    >
        @if(isset($icon))
            <div class="w-5 h-5 mb-2 group-hover:text-blue-600 dark:group-hover:text-blue-500">
                {{ $icon }}
            </div>
        @endif
        <span class="text-sm">{{ $label }}</span>
    </button>
@else
    <a
        href="{{ $href }}"
        {{ $attributes->merge(['class' => "inline-flex flex-col items-center justify-center px-5 {$activeClasses} {$borderClass} group"]) }}
    >
        @if(isset($icon))
            <div class="w-5 h-5 mb-2 group-hover:text-blue-600 dark:group-hover:text-blue-500">
                {{ $icon }}
            </div>
        @endif
        <span class="text-sm">{{ $label }}</span>
    </a>
@endif