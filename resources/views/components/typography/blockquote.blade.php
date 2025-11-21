@props([
    'variant' => 'default', // default, solid, icon, testimonial, review
    'size' => 'xl', // lg, xl, 2xl
    'align' => 'left', // left, center, right
    'cite' => null, // Citation text
    'author' => null, // Author name
    'authorTitle' => null, // Author title/position
    'authorImage' => null, // Author avatar URL
    'rating' => null, // Rating (1-5) for review variant
])

@php
    // Size classes
    $sizeClasses = [
        'lg' => 'text-lg',
        'xl' => 'text-xl',
        '2xl' => 'text-2xl',
    ];

    // Alignment classes
    $alignClasses = [
        'left' => 'text-left',
        'center' => 'text-center',
        'right' => 'text-right',
    ];

    $baseClasses = 'italic font-semibold text-gray-900 dark:text-white';
    $classes = $baseClasses . ' ' . $sizeClasses[$size] . ' ' . $alignClasses[$align];

    // Quote icon SVG
    $quoteIcon = '<svg class="w-8 h-8 text-gray-400 dark:text-gray-600 mb-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 14">
        <path d="M6 0H2a2 2 0 0 0-2 2v4a2 2 0 0 0 2 2h4v1a3 3 0 0 1-3 3H2a1 1 0 0 0 0 2h1a5.006 5.006 0 0 0 5-5V2a2 2 0 0 0-2-2Zm10 0h-4a2 2 0 0 0-2 2v4a2 2 0 0 0 2 2h4v1a3 3 0 0 1-3 3h-1a1 1 0 0 0 0 2h1a5.006 5.006 0 0 0 5-5V2a2 2 0 0 0-2-2Z"/>
    </svg>';
@endphp

@if($variant === 'default')
    <blockquote {{ $attributes->merge(['class' => $classes]) }}>
        <p>{{ $slot }}</p>
        @if($cite)
            <cite class="block mt-2 text-sm font-normal not-italic text-gray-500 dark:text-gray-400">{{ $cite }}</cite>
        @endif
    </blockquote>

@elseif($variant === 'solid')
    <blockquote {{ $attributes->merge(['class' => 'p-4 my-4 border-s-4 border-gray-300 bg-gray-50 dark:border-gray-500 dark:bg-gray-800']) }}>
        <p class="{{ $classes }}">{{ $slot }}</p>
    </blockquote>

@elseif($variant === 'icon')
    <blockquote {{ $attributes->merge(['class' => '']) }}>
        {!! $quoteIcon !!}
        <p class="{{ $classes }}">{{ $slot }}</p>
    </blockquote>

@elseif($variant === 'testimonial')
    <figure {{ $attributes->merge(['class' => 'max-w-screen-md mx-auto ' . $alignClasses[$align]]) }}>
        {!! $quoteIcon !!}
        <blockquote>
            <p class="{{ $classes }}">{{ $slot }}</p>
        </blockquote>
        @if($author || $authorTitle)
            <figcaption class="flex items-center justify-center mt-6 space-x-3 rtl:space-x-reverse">
                @if($authorImage)
                    <img class="w-6 h-6 rounded-full" src="{{ $authorImage }}" alt="{{ $author }}">
                @endif
                <div class="flex items-center divide-x-2 rtl:divide-x-reverse divide-gray-500 dark:divide-gray-700">
                    @if($author)
                        <cite class="pe-3 font-medium text-gray-900 dark:text-white">{{ $author }}</cite>
                    @endif
                    @if($authorTitle)
                        <cite class="ps-3 text-sm text-gray-500 dark:text-gray-400">{{ $authorTitle }}</cite>
                    @endif
                </div>
            </figcaption>
        @endif
    </figure>

@elseif($variant === 'review')
    <figure {{ $attributes->merge(['class' => 'max-w-screen-md mx-auto ' . $alignClasses[$align]]) }}>
        @if($rating)
            <div class="flex items-center mb-4">
                @for($i = 1; $i <= 5; $i++)
                    <svg class="w-5 h-5 {{ $i <= $rating ? 'text-yellow-400' : 'text-gray-300 dark:text-gray-500' }}" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                        <path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z"/>
                    </svg>
                @endfor
            </div>
        @endif
        <blockquote>
            <p class="{{ $classes }}">{{ $slot }}</p>
        </blockquote>
        @if($author || $authorTitle)
            <figcaption class="flex items-center mt-6 space-x-3 rtl:space-x-reverse">
                @if($authorImage)
                    <img class="w-6 h-6 rounded-full" src="{{ $authorImage }}" alt="{{ $author }}">
                @endif
                <div class="flex items-center divide-x-2 rtl:divide-x-reverse divide-gray-500 dark:divide-gray-700">
                    @if($author)
                        <cite class="pe-3 font-medium text-gray-900 dark:text-white">{{ $author }}</cite>
                    @endif
                    @if($authorTitle)
                        <cite class="ps-3 text-sm text-gray-500 dark:text-gray-400">{{ $authorTitle }}</cite>
                    @endif
                </div>
            </figcaption>
        @endif
    </figure>
@endif