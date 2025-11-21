{{-- Rating Component --}}
@props([
    'rating' => 0,
    'maxRating' => 5,
    'size' => 'default', // sm, default, lg, xl
    'color' => 'yellow', // yellow, red, green, blue, purple
    'interactive' => false,
    'readonly' => false,
    'showValue' => false,
    'valuePosition' => 'after', // before, after
    'reviewCount' => null,
    'name' => null,
])

@php
    // Size classes
    $sizeClasses = [
        'sm' => 'w-4 h-4',
        'default' => 'w-5 h-5',
        'lg' => 'w-6 h-6',
        'xl' => 'w-7 h-7',
    ];

    // Color classes for filled stars
    $colorClasses = [
        'yellow' => 'text-yellow-400',
        'red' => 'text-red-500',
        'green' => 'text-green-500',
        'blue' => 'text-blue-500',
        'purple' => 'text-purple-500',
    ];

    // Text size classes
    $textSizeClasses = [
        'sm' => 'text-xs',
        'default' => 'text-sm',
        'lg' => 'text-base',
        'xl' => 'text-lg',
    ];

    $sizeClass = $sizeClasses[$size] ?? $sizeClasses['default'];
    $colorClass = $colorClasses[$color] ?? $colorClasses['yellow'];
    $textSizeClass = $textSizeClasses[$size] ?? $textSizeClasses['default'];

    // Calculate filled and empty stars
    $fullStars = floor($rating);
    $hasHalfStar = ($rating - $fullStars) >= 0.5;
    $emptyStars = $maxRating - $fullStars - ($hasHalfStar ? 1 : 0);

    // Generate unique ID for interactive rating
    $uniqueId = $name ?? 'rating-' . uniqid();
@endphp

<div {{ $attributes->merge(['class' => 'flex items-center gap-1']) }}
    @if($interactive && !$readonly)
        x-data="{
            rating: {{ $rating }},
            hoverRating: 0,
            setRating(value) {
                this.rating = value;
                @if($name)
                    $wire.set('{{ $name }}', value);
                @endif
                $dispatch('rating-changed', { rating: value });
            }
        }"
    @endif
>
    @if($showValue && $valuePosition === 'before')
        <span class="font-semibold {{ $textSizeClass }} text-gray-900 dark:text-white me-1">
            {{ number_format($rating, 1) }}
        </span>
    @endif

    <div class="flex items-center gap-1"
        @if($interactive && !$readonly)
            @mouseleave="hoverRating = 0"
        @endif
    >
        @for($i = 1; $i <= $maxRating; $i++)
            @php
                $isFilled = $i <= $fullStars;
                $isHalf = $i === ($fullStars + 1) && $hasHalfStar;
            @endphp

            <button
                type="button"
                @if($interactive && !$readonly)
                    @click="setRating({{ $i }})"
                    @mouseenter="hoverRating = {{ $i }}"
                    :class="{
                        '{{ $colorClass }}': hoverRating >= {{ $i }} || (hoverRating === 0 && rating >= {{ $i }}),
                        'text-gray-300 dark:text-gray-500': hoverRating < {{ $i }} && (hoverRating > 0 || rating < {{ $i }})
                    }"
                    class="transition-colors duration-150 {{ $sizeClass }}"
                @else
                    class="{{ $isFilled || $isHalf ? $colorClass : 'text-gray-300 dark:text-gray-500' }} {{ $sizeClass }}"
                    @if($readonly)
                        disabled
                    @endif
                @endif
                aria-label="Rate {{ $i }} out of {{ $maxRating }}"
            >
                @if($isHalf)
                    {{-- Half star --}}
                    <svg class="{{ $sizeClass }}" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <defs>
                            <linearGradient id="half-{{ $uniqueId }}-{{ $i }}">
                                <stop offset="50%" stop-color="currentColor"/>
                                <stop offset="50%" stop-color="rgb(209 213 219)" stop-opacity="1"/>
                            </linearGradient>
                        </defs>
                        <path fill="url(#half-{{ $uniqueId }}-{{ $i }})" d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                    </svg>
                @else
                    {{-- Full or empty star --}}
                    <svg class="{{ $sizeClass }}" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                    </svg>
                @endif
            </button>
        @endfor
    </div>

    @if($showValue && $valuePosition === 'after')
        <span class="font-semibold {{ $textSizeClass }} text-gray-900 dark:text-white ms-1">
            {{ number_format($rating, 1) }}
        </span>
    @endif

    @if($reviewCount !== null)
        <span class="{{ $textSizeClass }} text-gray-500 dark:text-gray-400 ms-1">
            ({{ number_format($reviewCount) }})
        </span>
    @endif

    @if($slot->isNotEmpty())
        <div class="ms-2">
            {{ $slot }}
        </div>
    @endif

    @if($interactive && $name)
        <input type="hidden" name="{{ $name }}" x-model="rating">
    @endif
</div>