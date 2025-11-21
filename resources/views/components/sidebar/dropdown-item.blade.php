{{-- Sidebar Dropdown Item --}}
@props([
    'href' => null,
    'active' => false,
])

@php
    $tag = $href ? 'a' : 'button';

    $baseClasses = 'flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700';

    if ($active) {
        $baseClasses .= ' bg-gray-100 dark:bg-gray-700';
    }
@endphp

<li>
    <{{ $tag }}
        @if($href)
            href="{{ $href }}"
        @endif
        {{ $attributes->merge(['class' => $baseClasses]) }}
        @if($active)
            aria-current="page"
        @endif
    >
        {{ $slot }}
    </{{ $tag }}>
</li>