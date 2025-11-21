@props([
    'src' => null,
    'alt' => '',
    'name' => '',
    'description' => null,
    'size' => 'md',
    'rounded' => 'full',
    'ring' => false,
    'ringColor' => 'gray',
])

@php
    $sizeClasses = [
        'xs' => 'w-6 h-6',
        'sm' => 'w-8 h-8',
        'md' => 'w-10 h-10',
        'lg' => 'w-16 h-16',
        'xl' => 'w-24 h-24',
    ];

    $roundedClasses = [
        'full' => 'rounded-full',
        'lg' => 'rounded-lg',
        'md' => 'rounded-md',
    ];

    $ringClasses = $ring ? "ring-2 ring-{$ringColor}-300 p-1" : '';
    $fallbackUrl = 'https://ui-avatars.com/api/?name=' . urlencode($alt ?: $name);
@endphp

<div {{ $attributes->merge(['class' => 'flex items-center gap-3']) }}>
    <img
        class="{{ $sizeClasses[$size] }} {{ $roundedClasses[$rounded] }} object-cover {{ $ringClasses }}"
        src="{{ $src ?? $fallbackUrl }}"
        alt="{{ $alt ?: $name }}"
    >
    <div class="flex-1 min-w-0">
        <p class="text-sm font-medium text-gray-900 truncate">
            {{ $name }}
        </p>
        @if($description)
            <p class="text-sm text-gray-500 truncate">
                {{ $description }}
            </p>
        @endif
        @if($slot->isNotEmpty())
            {{ $slot }}
        @endif
    </div>
</div>