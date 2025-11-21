@props([
    'variant' => 'default', // default, trimmed, icon, text, shape
    'text' => null, // Text to display in center (for text variant)
    'icon' => null, // SVG icon (for icon variant)
])

@php
    $baseClasses = 'bg-gray-200 border-0 dark:bg-gray-700';
@endphp

@if($variant === 'default')
    <hr {{ $attributes->merge(['class' => 'h-px my-8 ' . $baseClasses]) }}>

@elseif($variant === 'trimmed')
    <hr {{ $attributes->merge(['class' => 'w-48 h-1 mx-auto my-4 rounded md:my-10 ' . $baseClasses]) }}>

@elseif($variant === 'icon')
    <div class="inline-flex items-center justify-center w-full">
        <hr class="w-64 h-px my-8 bg-gray-200 border-0 dark:bg-gray-700">
        <span class="absolute px-3 font-medium text-gray-900 -translate-x-1/2 bg-white left-1/2 dark:text-white dark:bg-gray-900">
            @if($icon)
                {!! $icon !!}
            @else
                <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 14">
                    <path d="M6 0H2a2 2 0 0 0-2 2v4a2 2 0 0 0 2 2h4v1a3 3 0 0 1-3 3H2a1 1 0 0 0 0 2h1a5.006 5.006 0 0 0 5-5V2a2 2 0 0 0-2-2Zm10 0h-4a2 2 0 0 0-2 2v4a2 2 0 0 0 2 2h4v1a3 3 0 0 1-3 3h-1a1 1 0 0 0 0 2h1a5.006 5.006 0 0 0 5-5V2a2 2 0 0 0-2-2Z"/>
                </svg>
            @endif
        </span>
    </div>

@elseif($variant === 'text')
    <div class="inline-flex items-center justify-center w-full">
        <hr class="w-64 h-px my-8 bg-gray-200 border-0 dark:bg-gray-700">
        <span class="absolute px-3 font-medium text-gray-900 -translate-x-1/2 bg-white left-1/2 dark:text-white dark:bg-gray-900">
            {{ $text ?? 'or' }}
        </span>
    </div>

@elseif($variant === 'shape')
    <hr {{ $attributes->merge(['class' => 'w-8 h-8 mx-auto my-8 rounded ' . $baseClasses]) }}>
@endif