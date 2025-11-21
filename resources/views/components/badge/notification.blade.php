@props([
    'count' => 0,
    'variant' => 'danger', // primary, success, warning, danger, info
    'dot' => false,
    'position' => 'top-right', // top-right, top-left, bottom-right, bottom-left
])

@php
    $variantClasses = [
        'primary' => 'bg-blue-600 text-white',
        'success' => 'bg-green-600 text-white',
        'warning' => 'bg-yellow-400 text-gray-900',
        'danger' => 'bg-red-600 text-white',
        'info' => 'bg-cyan-600 text-white',
    ];

    $positionClasses = [
        'top-right' => '-top-2 -end-2',
        'top-left' => '-top-2 -start-2',
        'bottom-right' => '-bottom-2 -end-2',
        'bottom-left' => '-bottom-2 -start-2',
    ];

    $displayCount = $count > 99 ? '99+' : $count;
@endphp

<div class="relative inline-flex">
    {{ $slot }}
    @if($dot)
        <span class="absolute {{ $positionClasses[$position] }} flex h-3 w-3">
            <span class="animate-ping absolute inline-flex h-full w-full rounded-full {{ $variantClasses[$variant] }} opacity-75"></span>
            <span class="relative inline-flex rounded-full h-3 w-3 {{ $variantClasses[$variant] }}"></span>
        </span>
    @else
        <div class="absolute inline-flex items-center justify-center w-6 h-6 text-xs font-bold {{ $variantClasses[$variant] }} border-2 border-white rounded-full {{ $positionClasses[$position] }}">
            {{ $displayCount }}
        </div>
    @endif
</div>