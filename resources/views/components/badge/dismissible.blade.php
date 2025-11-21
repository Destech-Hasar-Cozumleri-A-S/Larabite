@props([
    'variant' => 'default',
    'size' => 'md',
    'id' => null,
])

@php
    $buttonClasses = [
        'default' => 'text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900',
        'primary' => 'text-blue-400 bg-transparent hover:bg-blue-200 hover:text-blue-900',
        'success' => 'text-green-400 bg-transparent hover:bg-green-200 hover:text-green-900',
        'warning' => 'text-yellow-400 bg-transparent hover:bg-yellow-200 hover:text-yellow-900',
        'danger' => 'text-red-400 bg-transparent hover:bg-red-200 hover:text-red-900',
        'info' => 'text-cyan-400 bg-transparent hover:bg-cyan-200 hover:text-cyan-900',
    ];

    $badgeId = $id ?? 'badge-dismiss-' . uniqid();
@endphp

<x-badge
    :id="$badgeId"
    :variant="$variant"
    :size="$size"
    {{ $attributes }}
>
    {{ $slot }}
    <button
        type="button"
        class="inline-flex items-center p-1 ms-2 {{ $buttonClasses[$variant] }} rounded-full focus:ring-2 focus:ring-gray-400"
        data-dismiss-target="#{{ $badgeId }}"
        aria-label="Remove"
    >
        <x-icon.close size="sm" />
        <span class="sr-only">Remove badge</span>
    </button>
</x-badge>