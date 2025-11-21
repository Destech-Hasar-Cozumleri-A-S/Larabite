@props([
    'id' => null,
    'label' => '',
])

@php
    $dropdownId = $id ?? 'breadcrumb-dropdown-' . uniqid();
@endphp

<li class="inline-flex items-center">
    <button
        type="button"
        data-dropdown-toggle="{{ $dropdownId }}"
        class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600 dark:text-gray-400 dark:hover:text-white"
    >
        {{ $label }}
        <svg class="w-2.5 h-2.5 ms-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
        </svg>
    </button>

    <div id="{{ $dropdownId }}" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
        <ul class="py-2 text-sm text-gray-700 dark:text-gray-200">
            {{ $slot }}
        </ul>
    </div>

    <svg class="rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
    </svg>
</li>