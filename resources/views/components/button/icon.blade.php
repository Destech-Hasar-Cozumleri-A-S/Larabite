@props([
    'variant' => 'primary',
    'size' => 'md',
    'href' => null,
    'type' => 'button',
    'outline' => false,
    'pill' => true,
    'label' => '', // Screen reader label
])

@php
    $baseClasses = 'inline-flex items-center justify-center font-medium focus:outline-none focus:ring-4 disabled:opacity-50 disabled:cursor-not-allowed';

    // Always rounded-full for icon buttons
    $roundedClass = 'rounded-full';

    // Size classes (square dimensions)
    $sizeClasses = [
        'xs' => 'w-8 h-8 text-xs',
        'sm' => 'w-9 h-9 text-sm',
        'md' => 'w-10 h-10 text-sm',
        'lg' => 'w-11 h-11 text-base',
        'xl' => 'w-12 h-12 text-base',
    ];

    // Variant classes
    if ($outline) {
        $variantClasses = [
            'primary' => 'text-blue-700 border border-blue-700 hover:bg-blue-700 hover:text-white focus:ring-blue-300 dark:border-blue-500 dark:text-blue-500 dark:hover:text-white dark:hover:bg-blue-500 dark:focus:ring-blue-800',
            'secondary' => 'text-gray-900 border border-gray-300 hover:bg-gray-100 focus:ring-gray-100 dark:border-gray-600 dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-700',
            'success' => 'text-green-700 border border-green-700 hover:bg-green-800 hover:text-white focus:ring-green-300 dark:border-green-500 dark:text-green-500 dark:hover:text-white dark:hover:bg-green-600 dark:focus:ring-green-800',
            'danger' => 'text-red-700 border border-red-700 hover:bg-red-800 hover:text-white focus:ring-red-300 dark:border-red-500 dark:text-red-500 dark:hover:text-white dark:hover:bg-red-600 dark:focus:ring-red-900',
            'dark' => 'text-gray-900 border border-gray-800 hover:bg-gray-900 hover:text-white focus:ring-gray-300 dark:border-gray-600 dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-800',
        ];
    } else {
        $variantClasses = [
            'primary' => 'text-white bg-blue-700 hover:bg-blue-800 focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800',
            'secondary' => 'text-gray-900 bg-white border border-gray-300 hover:bg-gray-100 focus:ring-gray-100 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:focus:ring-gray-700',
            'success' => 'text-white bg-green-700 hover:bg-green-800 focus:ring-green-300 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800',
            'danger' => 'text-white bg-red-700 hover:bg-red-800 focus:ring-red-300 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900',
            'dark' => 'text-white bg-gray-800 hover:bg-gray-900 focus:ring-gray-300 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-700',
        ];
    }

    $classes = $baseClasses . ' ' . $roundedClass . ' ' . $variantClasses[$variant] . ' ' . $sizeClasses[$size];
@endphp

@if($href)
    <a
        href="{{ $href }}"
        {{ $attributes->merge(['class' => $classes]) }}
    >
        {{ $slot }}
        @if($label)
            <span class="sr-only">{{ $label }}</span>
        @endif
    </a>
@else
    <button
        type="{{ $type }}"
        {{ $attributes->merge(['class' => $classes]) }}
    >
        {{ $slot }}
        @if($label)
            <span class="sr-only">{{ $label }}</span>
        @endif
    </button>
@endif