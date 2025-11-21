{{-- Stepper Item Component --}}
@props([
    'status' => 'inactive', // completed, active, inactive
    'title' => null,
    'description' => null,
    'step' => null,
    'icon' => null,
    'orientation' => 'horizontal', // horizontal, vertical
    'isLast' => false,
    'href' => null,
])

@php
    $tag = $href ? 'a' : 'li';

    // Status colors
    $statusClasses = [
        'completed' => [
            'indicator' => 'bg-blue-600 dark:bg-blue-500',
            'text' => 'text-blue-600 dark:text-blue-500',
            'connector' => 'bg-blue-600 dark:bg-blue-500',
        ],
        'active' => [
            'indicator' => 'bg-blue-600 dark:bg-blue-500',
            'text' => 'text-blue-600 dark:text-blue-500',
            'connector' => 'bg-gray-200 dark:bg-gray-700',
        ],
        'inactive' => [
            'indicator' => 'bg-gray-200 dark:bg-gray-700',
            'text' => 'text-gray-500 dark:text-gray-400',
            'connector' => 'bg-gray-200 dark:bg-gray-700',
        ],
    ];

    $colors = $statusClasses[$status] ?? $statusClasses['inactive'];

    // Layout classes
    $itemClass = $orientation === 'horizontal'
        ? 'flex items-center'
        : 'flex items-start';

    $contentClass = $orientation === 'horizontal'
        ? 'flex flex-col items-center'
        : 'ms-4';
@endphp

<{{ $tag }}
    @if($href)
        href="{{ $href }}"
    @endif
    {{ $attributes->merge(['class' => $itemClass . ' ' . ($orientation === 'horizontal' ? 'relative' : '')]) }}
>
    {{-- Step Indicator --}}
    <div class="flex items-center {{ $orientation === 'horizontal' ? 'flex-col' : '' }}">
        <div class="flex items-center justify-center w-10 h-10 {{ $colors['indicator'] }} rounded-full lg:h-12 lg:w-12 shrink-0">
            @if($status === 'completed' && !$icon)
                {{-- Checkmark icon for completed --}}
                <svg
                    class="w-5 h-5 text-white lg:w-6 lg:h-6"
                    aria-hidden="true"
                    xmlns="http://www.w3.org/2000/svg"
                    fill="none"
                    viewBox="0 0 16 12"
                >
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5.917 5.724 10.5 15 1.5"/>
                </svg>
            @elseif($icon)
                {{-- Custom icon --}}
                <div class="text-white">
                    {!! $icon !!}
                </div>
            @elseif($step)
                {{-- Step number --}}
                <span class="text-white font-semibold">{{ $step }}</span>
            @endif
        </div>

        {{-- Content --}}
        @if($title || $description || $slot)
            <div class="{{ $contentClass }} {{ $orientation === 'horizontal' ? 'mt-3' : '' }}">
                @if($title)
                    <h3 class="font-medium leading-tight {{ $colors['text'] }}">
                        {{ $title }}
                    </h3>
                @endif

                @if($description)
                    <p class="text-sm text-gray-500 dark:text-gray-400">
                        {{ $description }}
                    </p>
                @endif

                {{ $slot }}
            </div>
        @endif
    </div>

    {{-- Connector Line --}}
    @if(!$isLast)
        @if($orientation === 'horizontal')
            <div class="flex-1 h-0.5 {{ $colors['connector'] }} mx-4"></div>
        @else
            <div class="w-0.5 h-full {{ $colors['connector'] }} ms-5 -mt-2"></div>
        @endif
    @endif
</{{ $tag }}>