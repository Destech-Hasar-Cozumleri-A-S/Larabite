@props([
    'href' => '#',
    'variant' => 'default', // default, button, card, cta
    'underline' => 'hover', // always, hover, never
    'external' => false, // Opens in new tab
])

@php
    // Underline classes
    $underlineClasses = [
        'always' => 'underline',
        'hover' => 'hover:underline',
        'never' => 'no-underline',
    ];

    // Variant classes
    if ($variant === 'default') {
        $classes = 'font-medium text-blue-600 dark:text-blue-500 ' . $underlineClasses[$underline];
    } elseif ($variant === 'button') {
        $classes = 'inline-flex items-center justify-center px-5 py-2.5 text-sm font-medium text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800';
    } elseif ($variant === 'card') {
        $classes = 'block max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700';
    } elseif ($variant === 'cta') {
        $classes = 'inline-flex items-center justify-center p-5 text-base font-medium text-gray-500 rounded-lg bg-gray-50 hover:text-gray-900 hover:bg-gray-100 dark:text-gray-400 dark:bg-gray-800 dark:hover:bg-gray-700 dark:hover:text-white';
    }

    $externalAttrs = $external ? 'target="_blank" rel="noopener noreferrer"' : '';
@endphp

<a href="{{ $href }}" {{ $attributes->merge(['class' => $classes]) }} {!! $externalAttrs !!}>
    {{ $slot }}
</a>