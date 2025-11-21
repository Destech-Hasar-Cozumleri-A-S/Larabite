{{-- Dropdown Checkbox Item --}}
@props([
    'name' => null,
    'value' => null,
    'checked' => false,
    'label' => null,
    'helper' => null,
])

@php
    $id = $name ? $name . '-' . uniqid() : 'checkbox-' . uniqid();
@endphp

<div class="flex items-center px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600">
    <input
        id="{{ $id }}"
        type="checkbox"
        name="{{ $name }}"
        value="{{ $value }}"
        {{ $checked ? 'checked' : '' }}
        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500"
        {{ $attributes }}
    >
    <label for="{{ $id }}" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300 cursor-pointer flex-1">
        {{ $label ?? $slot }}
        @if($helper)
            <span class="block text-xs font-normal text-gray-500 dark:text-gray-400 mt-0.5">
                {{ $helper }}
            </span>
        @endif
    </label>
</div>