{{-- Skeleton Image --}}
@props([
    'animated' => true,
    'width' => null,
    'height' => null,
    'aspectRatio' => 'video', // square, video, portrait
])

@php
    $animateClass = $animated ? 'animate-pulse' : '';

    // Aspect ratio classes
    $aspectClasses = [
        'square' => 'aspect-square',
        'video' => 'aspect-video',
        'portrait' => 'aspect-[3/4]',
    ];

    $aspectClass = $aspectClasses[$aspectRatio] ?? '';

    // Inline styles
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
    {{ $attributes->merge(['class' => "flex items-center justify-center bg-gray-300 rounded dark:bg-gray-700 {$aspectClass} {$animateClass}"]) }}
    @if($styleAttr)
        style="{{ $styleAttr }}"
    @endif
    role="status"
    aria-label="Loading"
>
    <svg class="w-10 h-10 text-gray-200 dark:text-gray-600" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 18">
        <path d="M18 0H2a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2Zm-5.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Zm4.376 10.481A1 1 0 0 1 16 15H4a1 1 0 0 1-.895-1.447l3.5-7A1 1 0 0 1 7.468 6a.965.965 0 0 1 .9.5l2.775 4.757 1.546-1.887a1 1 0 0 1 1.618.1l2.541 4a1 1 0 0 1 .028 1.011Z"/>
    </svg>
    <span class="sr-only">Loading...</span>
</div>