{{-- Footer Social Icon --}}
@props([
    'href' => '#',
    'label' => '',
    'icon' => null,
])

<a
    href="{{ $href }}"
    class="text-gray-500 hover:text-gray-900 dark:hover:text-white"
    {{ $attributes }}
>
    <span class="sr-only">{{ $label }}</span>

    @if($icon)
        {!! $icon !!}
    @else
        {{ $slot }}
    @endif
</a>