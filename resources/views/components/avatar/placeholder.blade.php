@props([
    'size' => 'md', // xs, sm, md, lg, xl, 2xl
    'type' => 'icon', // icon, initials
    'initials' => '',
    'rounded' => 'full', // full, lg, md
])

@php
    $sizeClasses = [
        'xs' => 'w-6 h-6 text-xs',
        'sm' => 'w-8 h-8 text-sm',
        'md' => 'w-10 h-10 text-base',
        'lg' => 'w-16 h-16 text-xl',
        'xl' => 'w-24 h-24 text-3xl',
        '2xl' => 'w-32 h-32 text-4xl',
    ];

    $iconSizes = [
        'xs' => 'w-3 h-3',
        'sm' => 'w-4 h-4',
        'md' => 'w-5 h-5',
        'lg' => 'w-8 h-8',
        'xl' => 'w-12 h-12',
        '2xl' => 'w-16 h-16',
    ];

    $roundedClasses = [
        'full' => 'rounded-full',
        'lg' => 'rounded-lg',
        'md' => 'rounded-md',
    ];
@endphp

@if($type === 'initials')
    {{-- Initials Placeholder --}}
    <div
        {{ $attributes->merge(['class' => "relative inline-flex items-center justify-center {$sizeClasses[$size]} overflow-hidden bg-gray-100 {$roundedClasses[$rounded]}"]) }}
    >
        <span class="font-medium text-gray-600">{{ $initials }}</span>
    </div>
@else
    {{-- Icon Placeholder --}}
    <div
        {{ $attributes->merge(['class' => "relative inline-flex items-center justify-center {$sizeClasses[$size]} overflow-hidden bg-gray-100 {$roundedClasses[$rounded]}"]) }}
    >
        <svg class="{{ $iconSizes[$size] }} text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"></path>
        </svg>
    </div>
@endif