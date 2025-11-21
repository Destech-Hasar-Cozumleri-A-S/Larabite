@props([
    'columns' => 5, // Number of columns in grid
])

@php
    $gridCols = [
        1 => 'grid-cols-1',
        2 => 'grid-cols-2',
        3 => 'grid-cols-3 md:grid-cols-3',
        4 => 'grid-cols-4',
        5 => 'grid-cols-5',
        6 => 'grid-cols-6',
    ];
@endphp

<div
    {{ $attributes->merge(['class' => "fixed bottom-0 start-0 z-50 w-full h-16 bg-white border-t border-gray-200 dark:bg-gray-700 dark:border-gray-600"]) }}
>
    <div class="grid h-full max-w-lg {{ $gridCols[$columns] }} mx-auto">
        {{ $slot }}
    </div>
</div>