{{-- Gallery Item --}}
@props([
    'src' => null,
    'alt' => '',
    'caption' => null,
    'href' => null,
    'lightbox' => false,
    'aspectRatio' => null, // auto, square, video, portrait
])

@php
    $imageClasses = 'h-auto max-w-full rounded-lg object-cover';

    if ($aspectRatio === 'square') {
        $imageClasses .= ' aspect-square';
    } elseif ($aspectRatio === 'video') {
        $imageClasses .= ' aspect-video';
    } elseif ($aspectRatio === 'portrait') {
        $imageClasses .= ' aspect-[3/4]';
    }

    $wrapperClasses = 'relative group overflow-hidden rounded-lg';
@endphp

<div {{ $attributes->merge(['class' => $wrapperClasses]) }}>
    @if($href || $lightbox)
        <a
            href="{{ $href ?? $src }}"
            @if($lightbox) data-lightbox="gallery" @endif
            class="block"
        >
            <img
                src="{{ $src }}"
                alt="{{ $alt }}"
                class="{{ $imageClasses }} transition-transform duration-300 group-hover:scale-110"
            >

            {{-- Overlay on Hover --}}
            <div class="absolute inset-0 bg-black bg-opacity-0 group-hover:bg-opacity-40 transition-all duration-300 flex items-center justify-center">
                <svg class="w-8 h-8 text-white opacity-0 group-hover:opacity-100 transition-opacity duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0zM10 7v3m0 0v3m0-3h3m-3 0H7"/>
                </svg>
            </div>
        </a>
    @else
        <img
            src="{{ $src }}"
            alt="{{ $alt }}"
            class="{{ $imageClasses }}"
        >
    @endif

    @if($caption)
        <div class="mt-2 text-sm text-gray-700 dark:text-gray-300">
            {{ $caption }}
        </div>
    @endif

    @if($slot->isNotEmpty())
        {{ $slot }}
    @endif
</div>