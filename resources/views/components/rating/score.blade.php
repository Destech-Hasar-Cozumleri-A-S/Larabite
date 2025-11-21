{{-- Score Rating Component --}}
@props([
    'scores' => [], // Array of ['label' => 'Staff', 'score' => 8.8, 'max' => 10]
    'color' => 'blue',
    'showValue' => true,
])

@php
    // Color classes
    $colorClasses = [
        'yellow' => 'bg-yellow-400',
        'red' => 'bg-red-500',
        'green' => 'bg-green-500',
        'blue' => 'bg-blue-500',
        'purple' => 'bg-purple-500',
    ];

    $badgeColorClasses = [
        'yellow' => 'bg-yellow-100 text-yellow-800 dark:bg-yellow-900 dark:text-yellow-300',
        'red' => 'bg-red-100 text-red-800 dark:bg-red-900 dark:text-red-300',
        'green' => 'bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-300',
        'blue' => 'bg-blue-100 text-blue-800 dark:bg-blue-900 dark:text-blue-300',
        'purple' => 'bg-purple-100 text-purple-800 dark:bg-purple-900 dark:text-purple-300',
    ];

    $colorClass = $colorClasses[$color] ?? $colorClasses['blue'];
    $badgeColorClass = $badgeColorClasses[$color] ?? $badgeColorClasses['blue'];
@endphp

<div {{ $attributes->merge(['class' => 'space-y-3']) }}>
    @foreach($scores as $item)
        @php
            $label = is_array($item) ? ($item['label'] ?? '') : '';
            $score = is_array($item) ? ($item['score'] ?? 0) : 0;
            $max = is_array($item) ? ($item['max'] ?? 10) : 10;
            $percentage = $max > 0 ? ($score / $max) * 100 : 0;
        @endphp

        <div class="flex items-center gap-3">
            <span class="text-sm font-medium text-gray-900 dark:text-white w-24 flex-shrink-0">
                {{ $label }}
            </span>

            <div class="flex-1 h-2.5 bg-gray-200 rounded-full dark:bg-gray-700 overflow-hidden">
                <div
                    class="{{ $colorClass }} h-full rounded-full transition-all duration-300"
                    style="width: {{ $percentage }}%"
                ></div>
            </div>

            @if($showValue)
                <span class="text-sm font-semibold {{ $badgeColorClass }} px-2.5 py-0.5 rounded flex-shrink-0">
                    {{ number_format($score, 1) }}
                </span>
            @endif
        </div>
    @endforeach

    @if($slot->isNotEmpty())
        <div class="pt-3 border-t border-gray-200 dark:border-gray-700">
            {{ $slot }}
        </div>
    @endif
</div>