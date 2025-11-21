@props([
    'src' => null,
    'alt' => '',
    'size' => 'md', // xs, sm, md, lg, xl, 2xl
    'ring' => false,
    'ringColor' => 'gray',
    'rounded' => 'full', // full, lg, md
    'status' => null, // online, offline, away, busy
    'statusPosition' => 'bottom-right', // bottom-right, bottom-left, top-right, top-left
])

@php
    $sizeClasses = [
        'xs' => 'w-6 h-6',
        'sm' => 'w-8 h-8',
        'md' => 'w-10 h-10',
        'lg' => 'w-16 h-16',
        'xl' => 'w-24 h-24',
        '2xl' => 'w-32 h-32',
    ];

    $roundedClasses = [
        'full' => 'rounded-full',
        'lg' => 'rounded-lg',
        'md' => 'rounded-md',
    ];

    $ringClasses = $ring ? "ring-2 ring-{$ringColor}-300 p-1" : '';
    $fallbackUrl = 'https://ui-avatars.com/api/?name=' . urlencode($alt);

    // Status indicator
    $statusColors = [
        'online' => 'bg-green-500',
        'offline' => 'bg-gray-500',
        'away' => 'bg-yellow-500',
        'busy' => 'bg-red-500',
    ];

    $statusPositions = [
        'bottom-right' => 'bottom-0 right-0',
        'bottom-left' => 'bottom-0 left-0',
        'top-right' => 'top-0 right-0',
        'top-left' => 'top-0 left-0',
    ];
@endphp

@if($status)
    <div class="relative inline-block">
        <img
            src="{{ $src ?? $fallbackUrl }}"
            alt="{{ $alt }}"
            {{ $attributes->merge(['class' => "{$sizeClasses[$size]} {$roundedClasses[$rounded]} object-cover {$ringClasses}"]) }}
        >
        <span class="absolute {{ $statusPositions[$statusPosition] }} w-3.5 h-3.5 {{ $statusColors[$status] }} border-2 border-white rounded-full"></span>
    </div>
@else
    <img
        src="{{ $src ?? $fallbackUrl }}"
        alt="{{ $alt }}"
        {{ $attributes->merge(['class' => "{$sizeClasses[$size]} {$roundedClasses[$rounded]} object-cover {$ringClasses}"]) }}
    >
@endif