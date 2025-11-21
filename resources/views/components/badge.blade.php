@props([
    'variant' => 'default', // default, primary, success, warning, danger, info
    'size' => 'md', // sm, md, lg
    'rounded' => 'full', // none, md, lg, full
    'icon' => null,
    'href' => null,
    'bordered' => false,
])

@php
    $baseClasses = 'inline-flex items-center font-medium';

    if ($bordered) {
        $baseClasses .= ' border';
    }

    // Variant classes - with hover states for links
    if ($href) {
        $variantClasses = [
            'default' => 'bg-gray-100 text-gray-800 hover:bg-gray-200 dark:bg-gray-700 dark:text-gray-300 dark:hover:bg-gray-600',
            'primary' => 'bg-blue-100 text-blue-800 hover:bg-blue-200 dark:bg-blue-900 dark:text-blue-300 dark:hover:bg-blue-800',
            'success' => 'bg-green-100 text-green-800 hover:bg-green-200 dark:bg-green-900 dark:text-green-300 dark:hover:bg-green-800',
            'warning' => 'bg-yellow-100 text-yellow-800 hover:bg-yellow-200 dark:bg-yellow-900 dark:text-yellow-300 dark:hover:bg-yellow-800',
            'danger' => 'bg-red-100 text-red-800 hover:bg-red-200 dark:bg-red-900 dark:text-red-300 dark:hover:bg-red-800',
            'info' => 'bg-cyan-100 text-cyan-800 hover:bg-cyan-200 dark:bg-cyan-900 dark:text-cyan-300 dark:hover:bg-cyan-800',
        ];
    } else {
        $variantClasses = [
            'default' => 'bg-gray-100 text-gray-800 dark:bg-gray-700 dark:text-gray-300',
            'primary' => 'bg-blue-100 text-blue-800 dark:bg-blue-900 dark:text-blue-300',
            'success' => 'bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-300',
            'warning' => 'bg-yellow-100 text-yellow-800 dark:bg-yellow-900 dark:text-yellow-300',
            'danger' => 'bg-red-100 text-red-800 dark:bg-red-900 dark:text-red-300',
            'info' => 'bg-cyan-100 text-cyan-800 dark:bg-cyan-900 dark:text-cyan-300',
        ];
    }

    // Add border colors for bordered variant
    if ($bordered) {
        $borderColors = [
            'default' => 'border-gray-400',
            'primary' => 'border-blue-400',
            'success' => 'border-green-400',
            'warning' => 'border-yellow-300',
            'danger' => 'border-red-400',
            'info' => 'border-cyan-400',
        ];
        $variantClasses[$variant] .= ' ' . $borderColors[$variant];
    }

    $sizeClasses = [
        'sm' => 'px-2 py-0.5 text-xs',
        'md' => 'px-2.5 py-0.5 text-xs',
        'lg' => 'px-3 py-1 text-sm',
    ];

    $roundedClasses = [
        'none' => 'rounded-none',
        'md' => 'rounded',
        'lg' => 'rounded-lg',
        'full' => 'rounded-full',
    ];

    $classes = "{$baseClasses} {$variantClasses[$variant]} {$sizeClasses[$size]} {$roundedClasses[$rounded]}";
    $tag = $href ? 'a' : 'span';
@endphp

<{{ $tag }}
    @if($href) href="{{ $href }}" @endif
    {{ $attributes->merge(['class' => $classes]) }}
>
    @if($icon)
        <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20">
            {!! $icon !!}
        </svg>
    @endif
    {{ $slot }}
</{{ $tag }}>