{{-- Base Skeleton Component --}}
@props([
    'animated' => true,
    'width' => null,
    'height' => null,
    'rounded' => 'default', // none, sm, default, md, lg, full
])

@php
    // Rounded classes
    $roundedClasses = [
        'none' => '',
        'sm' => 'rounded-sm',
        'default' => 'rounded',
        'md' => 'rounded-md',
        'lg' => 'rounded-lg',
        'full' => 'rounded-full',
    ];

    $roundedClass = $roundedClasses[$rounded] ?? $roundedClasses['default'];

    $baseClasses = 'bg-gray-200 dark:bg-gray-700 ' . $roundedClass;

    if ($animated) {
        $baseClasses .= ' animate-pulse';
    }

    // Width and height
    $styles = [];
    if ($width) {
        $styles[] = "width: {$width}";
    }
    if ($height) {
        $styles[] = "height: {$height}";
    }
    $styleAttr = !empty($styles) ? implode('; ', $styles) : null;
@endphp

<div
    {{ $attributes->merge(['class' => $baseClasses]) }}
    @if($styleAttr)
        style="{{ $styleAttr }}"
    @endif
    role="status"
    aria-label="Loading"
>
    <span class="sr-only">Loading...</span>
    {{ $slot }}
</div>