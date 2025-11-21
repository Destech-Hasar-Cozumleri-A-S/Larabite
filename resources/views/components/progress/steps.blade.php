{{-- Multi-Step Progress with Labels --}}
@props([
    'steps' => [],
    'currentStep' => 1,
    'color' => 'blue', // blue, dark, red, green, yellow, indigo, purple
    'size' => 'default', // sm, default
    'orientation' => 'horizontal', // horizontal, vertical
    'clickable' => false,
])

@php
    // Color classes
    $colorClasses = [
        'blue' => [
            'active' => 'bg-blue-600 border-blue-600 dark:bg-blue-500 dark:border-blue-500',
            'text' => 'text-blue-600 dark:text-blue-500',
            'line' => 'bg-blue-600 dark:bg-blue-500',
        ],
        'dark' => [
            'active' => 'bg-gray-800 border-gray-800 dark:bg-gray-300 dark:border-gray-300',
            'text' => 'text-gray-800 dark:text-gray-300',
            'line' => 'bg-gray-800 dark:bg-gray-300',
        ],
        'red' => [
            'active' => 'bg-red-600 border-red-600 dark:bg-red-500 dark:border-red-500',
            'text' => 'text-red-600 dark:text-red-500',
            'line' => 'bg-red-600 dark:bg-red-500',
        ],
        'green' => [
            'active' => 'bg-green-600 border-green-600 dark:bg-green-500 dark:border-green-500',
            'text' => 'text-green-600 dark:text-green-500',
            'line' => 'bg-green-600 dark:bg-green-500',
        ],
        'yellow' => [
            'active' => 'bg-yellow-400 border-yellow-400 dark:bg-yellow-300 dark:border-yellow-300',
            'text' => 'text-yellow-600 dark:text-yellow-500',
            'line' => 'bg-yellow-400 dark:bg-yellow-300',
        ],
        'indigo' => [
            'active' => 'bg-indigo-600 border-indigo-600 dark:bg-indigo-500 dark:border-indigo-500',
            'text' => 'text-indigo-600 dark:text-indigo-500',
            'line' => 'bg-indigo-600 dark:bg-indigo-500',
        ],
        'purple' => [
            'active' => 'bg-purple-600 border-purple-600 dark:bg-purple-500 dark:border-purple-500',
            'text' => 'text-purple-600 dark:text-purple-500',
            'line' => 'bg-purple-600 dark:bg-purple-500',
        ],
    ];

    $colors = $colorClasses[$color] ?? $colorClasses['blue'];

    // Size classes
    $sizeClasses = [
        'sm' => [
            'circle' => 'w-8 h-8 text-xs',
            'line' => 'h-0.5',
            'text' => 'text-xs',
        ],
        'default' => [
            'circle' => 'w-10 h-10 text-sm',
            'line' => 'h-1',
            'text' => 'text-sm',
        ],
    ];

    $sizes = $sizeClasses[$size] ?? $sizeClasses['default'];
    $totalSteps = count($steps);
@endphp

<div {{ $attributes->merge(['class' => $orientation === 'vertical' ? 'space-y-4' : 'flex items-start justify-between w-full']) }}>
    @foreach($steps as $index => $step)
        @php
            $stepNumber = $index + 1;
            $isCompleted = $stepNumber < $currentStep;
            $isCurrent = $stepNumber === $currentStep;
            $isPending = $stepNumber > $currentStep;

            $stepTitle = is_array($step) ? ($step['title'] ?? $step['label'] ?? "Step $stepNumber") : $step;
            $stepDescription = is_array($step) ? ($step['description'] ?? null) : null;
            $stepIcon = is_array($step) ? ($step['icon'] ?? null) : null;
        @endphp

        <div class="flex {{ $orientation === 'vertical' ? 'flex-row w-full' : 'flex-col' }} items-center relative
            {{ $orientation === 'horizontal' ? 'flex-1' : '' }}">

            <div class="flex {{ $orientation === 'vertical' ? 'flex-row items-start' : 'flex-col items-center' }} w-full">
                {{-- Step indicator and line container --}}
                <div class="flex {{ $orientation === 'vertical' ? 'flex-col items-center' : 'flex-row items-center w-full' }}">
                    {{-- Step Circle --}}
                    <div
                        @if($clickable)
                            wire:click="goToStep({{ $stepNumber }})"
                            class="cursor-pointer"
                        @endif
                        class="flex items-center justify-center {{ $sizes['circle'] }} rounded-full border-2 flex-shrink-0
                            {{ $isCompleted || $isCurrent ? $colors['active'] . ' text-white' : 'bg-gray-200 border-gray-300 text-gray-500 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-400' }}
                            font-semibold transition-all duration-300
                            {{ $clickable ? 'hover:scale-110' : '' }}"
                        role="status"
                        aria-current="{{ $isCurrent ? 'step' : 'false' }}"
                        aria-label="{{ $stepTitle }} - {{ $isCompleted ? 'completed' : ($isCurrent ? 'current' : 'pending') }}"
                    >
                        @if($stepIcon)
                            {!! $stepIcon !!}
                        @elseif($isCompleted)
                            {{-- Checkmark for completed steps --}}
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                            </svg>
                        @else
                            {{ $stepNumber }}
                        @endif
                    </div>

                    {{-- Connecting Line --}}
                    @if($stepNumber < $totalSteps)
                        <div class="
                            {{ $orientation === 'vertical' ? 'w-0.5 h-12' : $sizes['line'] . ' w-full mx-2' }}
                            {{ $isCompleted ? $colors['line'] : 'bg-gray-300 dark:bg-gray-600' }}
                            transition-all duration-300"
                        ></div>
                    @endif
                </div>

                {{-- Step content --}}
                <div class="
                    {{ $orientation === 'vertical' ? 'ml-4 flex-1' : 'mt-2 text-center' }}
                    {{ $clickable ? 'cursor-pointer' : '' }}"
                    @if($clickable)
                        wire:click="goToStep({{ $stepNumber }})"
                    @endif
                >
                    <div class="font-medium {{ $sizes['text'] }}
                        {{ $isCompleted || $isCurrent ? $colors['text'] : 'text-gray-500 dark:text-gray-400' }}
                        transition-colors duration-300">
                        {{ $stepTitle }}
                    </div>

                    @if($stepDescription)
                        <div class="text-xs text-gray-500 dark:text-gray-400 mt-1">
                            {{ $stepDescription }}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    @endforeach
</div>