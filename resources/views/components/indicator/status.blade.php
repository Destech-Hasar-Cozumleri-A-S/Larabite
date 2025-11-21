{{-- Status Indicator --}}
@props([
    'status' => 'online', // online, offline, away, busy
    'position' => 'bottom-right', // top-left, top-right, bottom-left, bottom-right
    'size' => 'default', // sm, default, lg
    'animate' => false,
])

@php
    // Status color mapping
    $statusColors = [
        'online' => 'bg-green-500',
        'offline' => 'bg-gray-500',
        'away' => 'bg-yellow-500',
        'busy' => 'bg-red-500',
    ];

    // Size classes
    $sizeClasses = [
        'sm' => 'w-2.5 h-2.5',
        'default' => 'w-3.5 h-3.5',
        'lg' => 'w-4 h-4',
    ];

    // Position classes
    $positionClasses = [
        'top-left' => 'top-0 start-0',
        'top-right' => 'top-0 end-0',
        'bottom-left' => 'bottom-0 start-0',
        'bottom-right' => 'bottom-0 end-0',
    ];

    $indicatorClasses = 'absolute rounded-full border-2 border-white dark:border-gray-800 '
        . ($statusColors[$status] ?? $statusColors['online']) . ' '
        . ($sizeClasses[$size] ?? $sizeClasses['default']) . ' '
        . ($positionClasses[$position] ?? $positionClasses['bottom-right']);

    if ($animate) {
        $indicatorClasses .= ' animate-pulse';
    }
@endphp

<span {{ $attributes->merge(['class' => $indicatorClasses]) }}></span>