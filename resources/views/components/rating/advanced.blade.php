{{-- Advanced Rating with Distribution --}}
@props([
    'rating' => 0,
    'totalReviews' => 0,
    'distribution' => [], // Array of [star => count] e.g., [5 => 70, 4 => 17, 3 => 8, 2 => 4, 1 => 1]
    'showPercentages' => true,
    'color' => 'yellow',
])

@php
    // Calculate percentages
    $distributionData = [];
    foreach([5, 4, 3, 2, 1] as $star) {
        $count = $distribution[$star] ?? 0;
        $percentage = $totalReviews > 0 ? ($count / $totalReviews) * 100 : 0;
        $distributionData[$star] = [
            'count' => $count,
            'percentage' => $percentage,
        ];
    }

    // Color classes
    $colorClasses = [
        'yellow' => 'bg-yellow-400',
        'red' => 'bg-red-500',
        'green' => 'bg-green-500',
        'blue' => 'bg-blue-500',
        'purple' => 'bg-purple-500',
    ];

    $colorClass = $colorClasses[$color] ?? $colorClasses['yellow'];
@endphp

<div {{ $attributes->merge(['class' => 'space-y-4']) }}>
    {{-- Overall Rating --}}
    <div class="flex items-center gap-4">
        <div class="text-center">
            <div class="text-4xl font-bold text-gray-900 dark:text-white">
                {{ number_format($rating, 1) }}
            </div>
            <x-ui::rating
                :rating="$rating"
                size="default"
                :color="$color"
                readonly
                class="justify-center mt-2"
            />
            <div class="text-sm text-gray-500 dark:text-gray-400 mt-1">
                {{ number_format($totalReviews) }} {{ Str::plural('review', $totalReviews) }}
            </div>
        </div>

        {{-- Distribution Bars --}}
        <div class="flex-1 space-y-2">
            @foreach($distributionData as $star => $data)
                <div class="flex items-center gap-3">
                    <span class="text-sm font-medium text-gray-900 dark:text-white w-8">
                        {{ $star }} star
                    </span>

                    <div class="flex-1 h-4 bg-gray-200 rounded-full dark:bg-gray-700 overflow-hidden">
                        <div
                            class="{{ $colorClass }} h-full rounded-full transition-all duration-300"
                            style="width: {{ $data['percentage'] }}%"
                        ></div>
                    </div>

                    @if($showPercentages)
                        <span class="text-sm text-gray-500 dark:text-gray-400 w-12 text-right">
                            {{ number_format($data['percentage'], 0) }}%
                        </span>
                    @else
                        <span class="text-sm text-gray-500 dark:text-gray-400 w-12 text-right">
                            {{ number_format($data['count']) }}
                        </span>
                    @endif
                </div>
            @endforeach
        </div>
    </div>

    @if($slot->isNotEmpty())
        <div class="pt-4 border-t border-gray-200 dark:border-gray-700">
            {{ $slot }}
        </div>
    @endif
</div>