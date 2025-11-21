{{-- Circular Progress Component --}}
@props([
    'value' => 0,
    'max' => 100,
    'size' => 'default', // sm, default, lg, xl
    'color' => 'blue', // blue, dark, red, green, yellow, indigo, purple
    'strokeWidth' => null,
    'showPercentage' => true,
    'label' => null,
])

@php
    // Calculate percentage
    $percentage = $max > 0 ? min(100, ($value / $max) * 100) : 0;
    $percentageFormatted = number_format($percentage, 0) . '%';

    // Size configurations
    $sizeConfigs = [
        'sm' => ['size' => 56, 'stroke' => 4, 'fontSize' => 'text-xs'],
        'default' => ['size' => 80, 'stroke' => 6, 'fontSize' => 'text-sm'],
        'lg' => ['size' => 120, 'stroke' => 8, 'fontSize' => 'text-lg'],
        'xl' => ['size' => 160, 'stroke' => 10, 'fontSize' => 'text-xl'],
    ];

    $config = $sizeConfigs[$size] ?? $sizeConfigs['default'];
    $svgSize = $config['size'];
    $stroke = $strokeWidth ?? $config['stroke'];
    $fontSize = $config['fontSize'];

    // Calculate circle dimensions
    $radius = ($svgSize - $stroke) / 2;
    $circumference = 2 * pi() * $radius;
    $offset = $circumference - ($percentage / 100 * $circumference);

    // Color classes
    $colorClasses = [
        'blue' => 'stroke-blue-600 dark:stroke-blue-500',
        'dark' => 'stroke-gray-800 dark:stroke-gray-300',
        'red' => 'stroke-red-600 dark:stroke-red-500',
        'green' => 'stroke-green-600 dark:stroke-green-500',
        'yellow' => 'stroke-yellow-400 dark:stroke-yellow-300',
        'indigo' => 'stroke-indigo-600 dark:stroke-indigo-500',
        'purple' => 'stroke-purple-600 dark:stroke-purple-500',
    ];

    $colorClass = $colorClasses[$color] ?? $colorClasses['blue'];

    // Text color mapping
    $textColorClasses = [
        'blue' => 'text-blue-600 dark:text-blue-500',
        'dark' => 'text-gray-800 dark:text-gray-300',
        'red' => 'text-red-600 dark:text-red-500',
        'green' => 'text-green-600 dark:text-green-500',
        'yellow' => 'text-yellow-600 dark:text-yellow-500',
        'indigo' => 'text-indigo-600 dark:text-indigo-500',
        'purple' => 'text-purple-600 dark:text-purple-500',
    ];

    $textColorClass = $textColorClasses[$color] ?? $textColorClasses['blue'];
@endphp

<div {{ $attributes->merge(['class' => 'inline-flex flex-col items-center']) }}>
    <div class="relative" style="width: {{ $svgSize }}px; height: {{ $svgSize }}px;">
        <svg
            class="transform -rotate-90"
            width="{{ $svgSize }}"
            height="{{ $svgSize }}"
            role="progressbar"
            aria-valuenow="{{ $value }}"
            aria-valuemin="0"
            aria-valuemax="{{ $max }}"
        >
            {{-- Background circle --}}
            <circle
                class="stroke-gray-200 dark:stroke-gray-700"
                stroke-width="{{ $stroke }}"
                fill="transparent"
                r="{{ $radius }}"
                cx="{{ $svgSize / 2 }}"
                cy="{{ $svgSize / 2 }}"
            />

            {{-- Progress circle --}}
            <circle
                class="{{ $colorClass }} transition-all duration-300 ease-in-out"
                stroke-width="{{ $stroke }}"
                stroke-linecap="round"
                fill="transparent"
                r="{{ $radius }}"
                cx="{{ $svgSize / 2 }}"
                cy="{{ $svgSize / 2 }}"
                style="stroke-dasharray: {{ $circumference }}; stroke-dashoffset: {{ $offset }};"
            />
        </svg>

        {{-- Center content --}}
        <div class="absolute inset-0 flex flex-col items-center justify-center">
            @if($showPercentage)
                <span class="font-bold {{ $fontSize }} {{ $textColorClass }}">
                    {{ $percentageFormatted }}
                </span>
            @endif
            @if($label)
                <span class="text-xs text-gray-500 dark:text-gray-400 mt-1">
                    {{ $label }}
                </span>
            @endif
        </div>
    </div>

    @if($slot->isNotEmpty())
        <div class="mt-2 text-center">
            {{ $slot }}
        </div>
    @endif
</div>