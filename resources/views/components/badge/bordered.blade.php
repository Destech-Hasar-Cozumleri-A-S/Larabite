@props([
    'variant' => 'default',
    'size' => 'md',
    'rounded' => 'full',
])

<x-ui::badge
    :variant="$variant"
    :size="$size"
    :rounded="$rounded"
    :bordered="true"
    {{ $attributes }}
>
    {{ $slot }}
</x-badge>