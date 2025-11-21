{{-- Step Progress Component --}}
@props([
    'currentStep' => 1,
    'totalSteps' => 4,
    'color' => 'blue', // blue, dark, red, green, yellow, indigo, purple
    'size' => 'default', // sm, default
    'orientation' => 'horizontal', // horizontal, vertical
])

@php
    // Color classes
    $colorClasses = [
        'blue' => [
            'active' => 'bg-blue-600 border-blue-600 dark:bg-blue-500 dark:border-blue-500',
            'text' => 'text-blue-600 dark:text-blue-500',
        ],
        'dark' => [
            'active' => 'bg-gray-800 border-gray-800 dark:bg-gray-300 dark:border-gray-300',
            'text' => 'text-gray-800 dark:text-gray-300',
        ],
        'red' => [
            'active' => 'bg-red-600 border-red-600 dark:bg-red-500 dark:border-red-500',
            'text' => 'text-red-600 dark:text-red-500',
        ],
        'green' => [
            'active' => 'bg-green-600 border-green-600 dark:bg-green-500 dark:border-green-500',
            'text' => 'text-green-600 dark:text-green-500',
        ],
        'yellow' => [
            'active' => 'bg-yellow-400 border-yellow-400 dark:bg-yellow-300 dark:border-yellow-300',
            'text' => 'text-yellow-600 dark:text-yellow-500',
        ],
        'indigo' => [
            'active' => 'bg-indigo-600 border-indigo-600 dark:bg-indigo-500 dark:border-indigo-500',
            'text' => 'text-indigo-600 dark:text-indigo-500',
        ],
        'purple' => [
            'active' => 'bg-purple-600 border-purple-600 dark:bg-purple-500 dark:border-purple-500',
            'text' => 'text-purple-600 dark:text-purple-500',
        ],
    ];

    $colors = $colorClasses[$color] ?? $colorClasses['blue'];

    // Size classes
    $sizeClasses = [
        'sm' => [
            'circle' => 'w-8 h-8 text-xs',
            'line' => 'h-0.5',
        ],
        'default' => [
            'circle' => 'w-10 h-10 text-sm',
            'line' => 'h-1',
        ],
    ];

    $sizes = $sizeClasses[$size] ?? $sizeClasses['default'];
@endphp

<div {{ $attributes->merge(['class' => $orientation === 'vertical' ? 'flex flex-col' : 'flex items-center w-full']) }}>
    @for($step = 1; $step <= $totalSteps; $step++)
        {{-- Step Circle --}}
        <div class="flex {{ $orientation === 'vertical' ? 'flex-row items-center' : 'flex-col items-center' }} relative">
            <div class="flex items-center justify-center {{ $sizes['circle'] }} rounded-full border-2
                {{ $step <= $currentStep ? $colors['active'] . ' text-white' : 'bg-gray-200 border-gray-300 text-gray-500 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-400' }}
                font-semibold transition-all duration-300"
                role="status"
                aria-label="Step {{ $step }} {{ $step < $currentStep ? 'completed' : ($step === $currentStep ? 'current' : 'pending') }}"
            >
                @if($step < $currentStep)
                    {{-- Checkmark for completed steps --}}
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                    </svg>
                @else
                    {{ $step }}
                @endif
            </div>

            {{-- Slot for step label/content --}}
            @if($slot->isNotEmpty())
                <div class="{{ $orientation === 'vertical' ? 'ml-4' : 'mt-2' }}">
                    {{ $slot }}
                </div>
            @endif
        </div>

        {{-- Connecting Line --}}
        @if($step < $totalSteps)
            <div class="
                {{ $orientation === 'vertical' ? 'w-0.5 h-12 ml-5' : $sizes['line'] . ' flex-1 mx-2' }}
                {{ $step < $currentStep ? $colors['active'] : 'bg-gray-300 dark:bg-gray-600' }}
                transition-all duration-300"
            ></div>
        @endif
    @endfor
</div>