@props([
    'href',
    'variant' => 'default',
    'size' => 'md',
    'rounded' => 'full',
])

<x-badge
    :href="$href"
    :variant="$variant"
    :size="$size"
    :rounded="$rounded"
    {{ $attributes }}
>
    {{ $slot }}
</x-badge>