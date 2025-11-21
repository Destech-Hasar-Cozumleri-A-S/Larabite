@props([
    'variant' => 'primary', // primary, secondary, tertiary, success, danger, warning, dark, ghost, link
    'size' => 'md', // xs, sm, md, lg, xl
    'href' => null,
    'wire:navigate' => false,
    'type' => 'button',
    'loading' => false,
    'pill' => false, // Rounded-full style
    'outline' => false, // Outlined button style
])

@php
    $baseClasses = 'inline-flex items-center justify-center font-medium focus:outline-none focus:ring-4 disabled:opacity-50 disabled:cursor-not-allowed';

    // Rounded style
    $roundedClass = $pill ? 'rounded-full' : 'rounded-lg';

    // Variant classes
    if ($outline) {
        $variantClasses = [
            'primary' => 'text-blue-700 border border-blue-700 hover:bg-blue-700 hover:text-white focus:ring-blue-300 dark:border-blue-500 dark:text-blue-500 dark:hover:text-white dark:hover:bg-blue-500 dark:focus:ring-blue-800',
            'secondary' => 'text-gray-900 border border-gray-300 hover:bg-gray-100 focus:ring-gray-100 dark:border-gray-600 dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-700',
            'tertiary' => 'text-gray-900 border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:ring-gray-100 dark:border-gray-600 dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-700 dark:focus:ring-gray-700',
            'success' => 'text-green-700 border border-green-700 hover:bg-green-800 hover:text-white focus:ring-green-300 dark:border-green-500 dark:text-green-500 dark:hover:text-white dark:hover:bg-green-600 dark:focus:ring-green-800',
            'danger' => 'text-red-700 border border-red-700 hover:bg-red-800 hover:text-white focus:ring-red-300 dark:border-red-500 dark:text-red-500 dark:hover:text-white dark:hover:bg-red-600 dark:focus:ring-red-900',
            'warning' => 'text-yellow-400 border border-yellow-400 hover:bg-yellow-500 hover:text-white focus:ring-yellow-300 dark:border-yellow-300 dark:text-yellow-300 dark:hover:text-white dark:hover:bg-yellow-400 dark:focus:ring-yellow-900',
            'dark' => 'text-gray-900 border border-gray-800 hover:bg-gray-900 hover:text-white focus:ring-gray-300 dark:border-gray-600 dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-800',
        ];
    } else {
        $variantClasses = [
            'primary' => 'text-white bg-blue-700 hover:bg-blue-800 focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800',
            'secondary' => 'text-gray-900 bg-white border border-gray-300 hover:bg-gray-100 focus:ring-gray-100 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700',
            'tertiary' => 'text-gray-900 bg-gray-50 hover:bg-gray-100 focus:ring-gray-100 dark:bg-gray-700 dark:text-gray-300 dark:hover:bg-gray-600 dark:focus:ring-gray-700',
            'success' => 'text-white bg-green-700 hover:bg-green-800 focus:ring-green-300 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800',
            'danger' => 'text-white bg-red-700 hover:bg-red-800 focus:ring-red-300 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900',
            'warning' => 'text-white bg-yellow-400 hover:bg-yellow-500 focus:ring-yellow-300 dark:focus:ring-yellow-900',
            'dark' => 'text-white bg-gray-800 hover:bg-gray-900 focus:ring-gray-300 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-700 dark:border-gray-700',
            'ghost' => 'text-gray-700 hover:bg-gray-100 focus:ring-gray-100 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-700',
            'link' => 'text-blue-700 hover:text-blue-800 focus:ring-blue-300 dark:text-blue-500 dark:hover:text-blue-600',
        ];
    }

    $sizeClasses = [
        'xs' => 'px-3 py-1.5 text-xs',
        'sm' => 'px-3 py-2 text-sm',
        'md' => 'px-5 py-2.5 text-sm',
        'lg' => 'px-5 py-3 text-base',
        'xl' => 'px-6 py-3.5 text-base',
    ];

    $classes = $baseClasses . ' ' . $roundedClass . ' ' . $variantClasses[$variant] . ' ' . $sizeClasses[$size];
@endphp

@if($href)
    <a
        href="{{ $href }}"
        @if($attributes->has('wire:navigate')) wire:navigate @endif
        {{ $attributes->merge(['class' => $classes]) }}
    >
        @if($loading)
            <x-icon.spinner class="-ml-1 mr-2" />
        @endif
        {{ $slot }}
    </a>
@else
    <button
        type="{{ $type }}"
        {{ $attributes->merge(['class' => $classes]) }}
        @if($loading) disabled @endif
    >
        @if($loading)
            <x-icon.spinner class="-ml-1 mr-2" />
        @endif
        {{ $slot }}
    </button>
@endif