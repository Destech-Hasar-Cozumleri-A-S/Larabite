{{-- Stepper Indicator --}}
@props([
    'step' => 1,
    'status' => 'pending', // completed, active, pending
    'size' => 'default', // sm, default, lg
])

@php
    // Size classes
    $sizeClasses = [
        'sm' => 'w-6 h-6 text-xs',
        'default' => 'w-8 h-8 text-sm',
        'lg' => 'w-10 h-10 text-base',
    ];

    $iconSizes = [
        'sm' => 'w-3 h-3',
        'default' => 'w-4 h-4',
        'lg' => 'w-5 h-5',
    ];

    $baseClasses = 'flex items-center justify-center rounded-full border-2 font-medium ' . ($sizeClasses[$size] ?? $sizeClasses['default']);

    if ($status === 'completed') {
        $classes = $baseClasses . ' bg-blue-600 border-blue-600 text-white';
    } elseif ($status === 'active') {
        $classes = $baseClasses . ' bg-blue-100 border-blue-600 text-blue-600 dark:bg-blue-900 dark:border-blue-600 dark:text-blue-400';
    } else {
        $classes = $baseClasses . ' bg-gray-100 border-gray-300 text-gray-500 dark:bg-gray-800 dark:border-gray-600 dark:text-gray-400';
    }
@endphp

<span {{ $attributes->merge(['class' => $classes]) }}>
    @if($status === 'completed')
        {{-- Checkmark icon --}}
        <svg class="{{ $iconSizes[$size] ?? $iconSizes['default'] }}" fill="currentColor" viewBox="0 0 20 20">
            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
        </svg>
    @else
        {{ $step }}
    @endif
</span>