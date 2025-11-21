{{-- Skeleton Text Lines --}}
@props([
    'lines' => 3,
    'animated' => true,
])

@php
    $baseClass = 'h-2.5 bg-gray-200 rounded-full dark:bg-gray-700';

    if ($animated) {
        $baseClass .= ' animate-pulse';
    }

    // Different widths for each line to look natural
    $widths = ['w-32', 'w-48', 'w-full', 'w-64', 'w-80', 'w-56', 'w-72', 'w-96'];
@endphp

<div {{ $attributes->merge(['class' => 'space-y-2.5']) }} role="status" aria-label="Loading">
    @for($i = 0; $i < $lines; $i++)
        <div class="{{ $baseClass }} {{ $widths[$i % count($widths)] }}"></div>
    @endfor
    <span class="sr-only">Loading...</span>
</div>