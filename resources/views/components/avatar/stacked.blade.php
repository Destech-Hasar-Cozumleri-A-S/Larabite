@props([
    'size' => 'md', // xs, sm, md, lg, xl
    'max' => 5,
])

@php
    $sizeClasses = [
        'xs' => 'w-6 h-6',
        'sm' => 'w-8 h-8',
        'md' => 'w-10 h-10',
        'lg' => 'w-16 h-16',
        'xl' => 'w-24 h-24',
    ];

    $textSizes = [
        'xs' => 'text-xs',
        'sm' => 'text-sm',
        'md' => 'text-base',
        'lg' => 'text-xl',
        'xl' => 'text-2xl',
    ];
@endphp

<div class="flex -space-x-4 rtl:space-x-reverse">
    {{ $slot }}

    @if(isset($remaining) && $remaining > 0)
        <div class="flex items-center justify-center {{ $sizeClasses[$size] }} {{ $textSizes[$size] }} font-medium text-white bg-gray-700 border-2 border-white rounded-full hover:bg-gray-600">
            +{{ $remaining }}
        </div>
    @endif
</div>