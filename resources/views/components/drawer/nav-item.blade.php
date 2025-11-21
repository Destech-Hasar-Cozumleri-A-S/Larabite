{{-- Drawer Navigation Item --}}
@props([
    'href' => '#',
    'active' => false,
    'icon' => null,
])

@php
    $classes = 'flex items-center p-2 text-base font-normal rounded-lg transition-colors';

    if ($active) {
        $classes .= ' text-white bg-blue-700 dark:bg-blue-600';
    } else {
        $classes .= ' text-gray-900 hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700';
    }
@endphp

<a href="{{ $href }}" {{ $attributes->merge(['class' => $classes]) }}>
    @if($icon)
        <span class="w-6 h-6 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white">
            {!! $icon !!}
        </span>
    @endif
    <span class="{{ $icon ? 'ms-3' : '' }}">{{ $slot }}</span>
</a>