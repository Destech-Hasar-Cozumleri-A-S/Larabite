{{-- Navbar Dropdown --}}
@props([
    'label' => 'Menu',
    'id' => null,
])

@php
    $id = $id ?? 'navbar-dropdown-' . uniqid();
@endphp

<li x-data="{ open: false }" @click.away="open = false">
    <button
        @click="open = !open"
        {{ $attributes->merge(['class' => 'flex items-center justify-between w-full py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 md:w-auto dark:text-white md:dark:hover:text-blue-500 dark:focus:text-white dark:border-gray-700 dark:hover:bg-gray-700 md:dark:hover:bg-transparent']) }}
    >
        {{ $label }}
        <svg
            class="w-2.5 h-2.5 ms-2.5 transition-transform"
            :class="{ 'rotate-180': open }"
            aria-hidden="true"
            xmlns="http://www.w3.org/2000/svg"
            fill="none"
            viewBox="0 0 10 6"
        >
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
        </svg>
    </button>

    <div
        x-show="open"
        x-transition:enter="transition ease-out duration-100"
        x-transition:enter-start="opacity-0 scale-95"
        x-transition:enter-end="opacity-100 scale-100"
        x-transition:leave="transition ease-in duration-75"
        x-transition:leave-start="opacity-100 scale-100"
        x-transition:leave-end="opacity-0 scale-95"
        style="display: none;"
        class="z-10 font-normal bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700 dark:divide-gray-600 absolute"
    >
        <ul class="py-2 text-sm text-gray-700 dark:text-gray-400">
            {{ $slot }}
        </ul>
    </div>
</li>