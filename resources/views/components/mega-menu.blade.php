{{-- Mega Menu Dropdown Container --}}
@props([
    'id' => null,
    'columns' => 3, // 1, 2, 3, 4
    'fullWidth' => false,
])

@php
    $id = $id ?? 'mega-menu-' . uniqid();

    $columnClasses = [
        1 => 'grid-cols-1',
        2 => 'grid-cols-1 md:grid-cols-2',
        3 => 'grid-cols-1 md:grid-cols-2 lg:grid-cols-3',
        4 => 'grid-cols-1 md:grid-cols-2 lg:grid-cols-4',
    ];

    if ($fullWidth) {
        $baseClasses = 'absolute left-0 right-0 z-10 w-full bg-white border-y border-gray-200 shadow-sm dark:bg-gray-800 dark:border-gray-700';
    } else {
        $baseClasses = 'absolute z-10 w-auto bg-white rounded-lg shadow-lg border border-gray-200 dark:bg-gray-700 dark:border-gray-600';
    }

    $gridClasses = 'grid ' . ($columnClasses[$columns] ?? $columnClasses[3]) . ' gap-6 p-4 md:p-6';
@endphp

<div
    id="{{ $id }}"
    x-data="{ open: false }"
    x-show="open"
    @click.away="open = false"
    x-transition:enter="transition ease-out duration-200"
    x-transition:enter-start="opacity-0 transform scale-95"
    x-transition:enter-end="opacity-100 transform scale-100"
    x-transition:leave="transition ease-in duration-150"
    x-transition:leave-start="opacity-100 transform scale-100"
    x-transition:leave-end="opacity-0 transform scale-95"
    style="display: none;"
    {{ $attributes->merge(['class' => $baseClasses]) }}
>
    <div class="{{ $gridClasses }}">
        {{ $slot }}
    </div>
</div>