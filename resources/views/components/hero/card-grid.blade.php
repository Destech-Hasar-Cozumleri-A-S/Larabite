{{-- Hero with Card Grid Below --}}
@props([
    'columns' => 3, // 2, 3, 4
])

@php
    $columnClasses = [
        2 => 'md:grid-cols-2',
        3 => 'md:grid-cols-3',
        4 => 'md:grid-cols-2 lg:grid-cols-4',
    ];

    $gridClasses = 'grid gap-8 ' . ($columnClasses[$columns] ?? $columnClasses[3]);
@endphp

<section {{ $attributes->merge(['class' => 'bg-white dark:bg-gray-900']) }}>
    <div class="px-4 mx-auto max-w-screen-xl py-8 lg:py-16">
        {{-- Hero Content --}}
        <div class="text-center mb-12">
            {{ $hero ?? '' }}
        </div>

        {{-- Card Grid --}}
        <div class="{{ $gridClasses }}">
            {{ $cards ?? $slot }}
        </div>
    </div>
</section>