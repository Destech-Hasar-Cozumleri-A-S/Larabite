@props([
    'size' => 'md',
])

@php
$sizeClasses = [
    'xs' => 'w-2 h-2',
    'sm' => 'w-2.5 h-2.5',
    'md' => 'w-3 h-3',
    'lg' => 'w-4 h-4',
    'xl' => 'w-5 h-5',
];

$classes = ($sizeClasses[$size] ?? $sizeClasses['md']);
@endphp

<svg {{ $attributes->merge(['class' => $classes]) }} aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
</svg>