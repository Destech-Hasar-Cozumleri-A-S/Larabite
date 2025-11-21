{{-- Progress Bar Component --}}
@props([
    'value' => 0,
    'max' => 100,
    'size' => 'default', // sm, default, lg, xl
    'color' => 'blue', // blue, dark, red, green, yellow, indigo, purple
    'label' => null,
    'labelPosition' => 'none', // none, inside, outside
    'showPercentage' => false,
    'striped' => false,
    'animated' => false,
    'indeterminate' => false,
])

@php
    // Calculate percentage
    $percentage = $max > 0 ? min(100, ($value / $max) * 100) : 0;
    $percentageFormatted = number_format($percentage, 0) . '%';

    // Size classes
    $sizeClasses = [
        'sm' => 'h-1.5',
        'default' => 'h-2.5',
        'lg' => 'h-4',
        'xl' => 'h-6',
    ];

    // Color classes
    $colorClasses = [
        'blue' => 'bg-blue-600 dark:bg-blue-500',
        'dark' => 'bg-gray-800 dark:bg-gray-300',
        'red' => 'bg-red-600 dark:bg-red-500',
        'green' => 'bg-green-600 dark:bg-green-500',
        'yellow' => 'bg-yellow-400 dark:bg-yellow-300',
        'indigo' => 'bg-indigo-600 dark:bg-indigo-500',
        'purple' => 'bg-purple-600 dark:bg-purple-500',
    ];

    // Label size classes
    $labelSizeClasses = [
        'sm' => 'text-xs',
        'default' => 'text-xs',
        'lg' => 'text-sm',
        'xl' => 'text-sm',
    ];

    $sizeClass = $sizeClasses[$size] ?? $sizeClasses['default'];
    $colorClass = $colorClasses[$color] ?? $colorClasses['blue'];
    $labelSizeClass = $labelSizeClasses[$size] ?? $labelSizeClasses['default'];

    // Build bar classes
    $barClasses = $colorClass . ' ' . $sizeClass . ' rounded-full transition-all duration-300';

    if ($striped) {
        $barClasses .= ' bg-gradient-to-r from-transparent via-white/20 to-transparent bg-[length:40px_100%]';
    }

    if ($animated && $striped) {
        $barClasses .= ' animate-progress-stripes';
    }

    if ($indeterminate) {
        $barClasses .= ' animate-progress-indeterminate';
    }
@endphp

<div {{ $attributes->merge(['class' => 'w-full']) }}>
    @if($labelPosition === 'outside')
        <div class="flex justify-between items-center mb-1">
            @if($label)
                <span class="text-base font-medium text-gray-700 dark:text-white">
                    {{ $label }}
                </span>
            @endif
            @if($showPercentage)
                <span class="text-sm font-medium text-gray-700 dark:text-white">
                    {{ $percentageFormatted }}
                </span>
            @endif
        </div>
    @endif

    <div class="w-full bg-gray-200 rounded-full dark:bg-gray-700 {{ $sizeClass }}">
        @if($labelPosition === 'inside')
            <div
                class="{{ $barClasses }} text-white font-medium {{ $labelSizeClass }} text-center p-0.5 leading-none flex items-center justify-center"
                style="width: {{ $indeterminate ? '100%' : $percentage . '%' }}"
                role="progressbar"
                aria-valuenow="{{ $value }}"
                aria-valuemin="0"
                aria-valuemax="{{ $max }}"
            >
                @if($label)
                    {{ $label }}
                @elseif($showPercentage)
                    {{ $percentageFormatted }}
                @endif
            </div>
        @else
            <div
                class="{{ $barClasses }}"
                style="width: {{ $indeterminate ? '30%' : $percentage . '%' }}"
                role="progressbar"
                aria-valuenow="{{ $value }}"
                aria-valuemin="0"
                aria-valuemax="{{ $max }}"
            ></div>
        @endif
    </div>

    @if($slot->isNotEmpty())
        <div class="mt-1">
            {{ $slot }}
        </div>
    @endif
</div>

@once
    @push('styles')
    <style>
        @keyframes progress-stripes {
            0% {
                background-position: 40px 0;
            }
            100% {
                background-position: 0 0;
            }
        }

        @keyframes progress-indeterminate {
            0% {
                transform: translateX(-100%);
            }
            100% {
                transform: translateX(400%);
            }
        }

        .animate-progress-stripes {
            animation: progress-stripes 1s linear infinite;
        }

        .animate-progress-indeterminate {
            animation: progress-indeterminate 1.5s ease-in-out infinite;
        }
    </style>
    @endpush
@endonce