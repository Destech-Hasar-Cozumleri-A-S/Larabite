{{-- Sidebar Dropdown Menu --}}
@props([
    'label' => null,
    'icon' => null,
    'open' => false,
    'id' => null,
])

@php
    $uniqueId = $id ?? 'dropdown-' . uniqid();
@endphp

<li x-data="{ open: {{ $open ? 'true' : 'false' }} }">
    <button
        type="button"
        @click="open = !open"
        class="flex items-center w-full p-2 text-base text-gray-900 transition duration-75 rounded-lg group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700"
        :aria-expanded="open"
        aria-controls="{{ $uniqueId }}"
    >
        @if($icon)
            <span class="flex-shrink-0">
                {!! $icon !!}
            </span>
        @endif

        <span class="flex-1 ms-3 text-left rtl:text-right whitespace-nowrap">
            {{ $label }}
        </span>

        <svg
            class="w-3 h-3 transition-transform"
            :class="{ 'rotate-180': open }"
            aria-hidden="true"
            xmlns="http://www.w3.org/2000/svg"
            fill="none"
            viewBox="0 0 10 6"
        >
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
        </svg>
    </button>

    <ul
        id="{{ $uniqueId }}"
        x-show="open"
        x-collapse
        class="py-2 space-y-2"
    >
        {{ $slot }}
    </ul>
</li>