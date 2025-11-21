@props([
    'href' => null,
    'icon' => null,
    'variant' => 'default', // default, danger
])

@php
    $variantClasses = [
        'default' => 'text-gray-700 hover:bg-gray-100',
        'danger' => 'text-red-600 hover:bg-red-50',
    ];
@endphp

@if($href)
    <a
        href="{{ $href }}"
        {{ $attributes->merge(['class' => "w-full text-left px-4 py-2 text-sm flex items-center space-x-2 cursor-pointer {$variantClasses[$variant]}"]) }}
    >
        @if($icon)
            <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                {!! $icon !!}
            </svg>
        @endif
        <span>{{ $slot }}</span>
    </a>
@else
    <button
        type="button"
        {{ $attributes->merge(['class' => "w-full text-left px-4 py-2 text-sm flex items-center space-x-2 cursor-pointer {$variantClasses[$variant]}"]) }}
    >
        @if($icon)
            <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                {!! $icon !!}
            </svg>
        @endif
        <span>{{ $slot }}</span>
    </button>
@endif