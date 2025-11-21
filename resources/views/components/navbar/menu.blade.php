{{-- Navbar Menu Container --}}
@props([
    'id' => 'navbar-default',
])

<div
    id="{{ $id }}"
    {{ $attributes->merge(['class' => 'hidden w-full md:block md:w-auto']) }}
>
    <ul class="flex flex-col font-medium p-4 md:p-0 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:flex-row md:space-x-8 rtl:space-x-reverse md:mt-0 md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
        {{ $slot }}
    </ul>
</div>