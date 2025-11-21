@props([
    'label' => null,
    'name' => null,
    'value' => null,
    'checked' => false,
    'disabled' => false,
    'required' => false,
    'error' => null,
    'success' => null,
    'helper' => null,
    'variant' => 'default', // default, inline, list-group, bordered, color
    'color' => 'blue', // blue, red, green, purple, teal, yellow, orange
    'description' => null,
    'icon' => null,
])

@php
    $baseClasses = 'w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600';

    // Color variants
    $colorClasses = [
        'blue' => 'text-blue-600 focus:ring-blue-500 dark:focus:ring-blue-600',
        'red' => 'text-red-600 focus:ring-red-500 dark:focus:ring-red-600',
        'green' => 'text-green-600 focus:ring-green-500 dark:focus:ring-green-600',
        'purple' => 'text-purple-600 focus:ring-purple-500 dark:focus:ring-purple-600',
        'teal' => 'text-teal-600 focus:ring-teal-500 dark:focus:ring-teal-600',
        'yellow' => 'text-yellow-400 focus:ring-yellow-500 dark:focus:ring-yellow-600',
        'orange' => 'text-orange-500 focus:ring-orange-500 dark:focus:ring-orange-600',
    ];

    if ($error) {
        $radioClasses = 'w-4 h-4 text-red-600 bg-red-50 border-red-500 focus:ring-red-500 dark:bg-red-100 dark:border-red-400';
    } elseif ($success) {
        $radioClasses = 'w-4 h-4 text-green-600 bg-green-50 border-green-500 focus:ring-green-500 dark:bg-green-100 dark:border-green-400';
    } elseif ($variant === 'color') {
        $radioClasses = 'w-4 h-4 bg-gray-100 border-gray-300 dark:bg-gray-700 dark:border-gray-600 ' . $colorClasses[$color];
    } else {
        $radioClasses = $baseClasses;
    }

    $id = $name . '-' . $value ?? 'radio-' . uniqid();
    $helperId = $id . '-helper';
@endphp

@if($variant === 'default')
    {{-- Default Radio Button --}}
    <div class="flex items-center" {{ $attributes->only(['class', 'wire:key']) }}>
        <input
            id="{{ $id }}"
            type="radio"
            name="{{ $name }}"
            value="{{ $value }}"
            {{ $checked ? 'checked' : '' }}
            {{ $disabled ? 'disabled' : '' }}
            {{ $required ? 'required' : '' }}
            @if($helper) aria-describedby="{{ $helperId }}" @endif
            {{ $attributes->except(['class', 'wire:key'])->merge(['class' => $radioClasses]) }}
        >
        @if($label)
            <label for="{{ $id }}" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                {{ $label }}
                @if($required)
                    <span class="text-red-500">*</span>
                @endif
            </label>
        @endif
    </div>

    @if($error)
        <p class="mt-2 text-sm text-red-600 dark:text-red-500">
            <span class="font-medium">{{ $error }}</span>
        </p>
    @elseif($success)
        <p class="mt-2 text-sm text-green-600 dark:text-green-500">
            <span class="font-medium">{{ $success }}</span>
        </p>
    @elseif($helper)
        <p id="{{ $helperId }}" class="ms-6 text-sm text-gray-500 dark:text-gray-400">
            {{ $helper }}
        </p>
    @endif

@elseif($variant === 'inline')
    {{-- Inline Radio Button --}}
    <div class="flex items-center" {{ $attributes->only(['class', 'wire:key']) }}>
        <input
            id="{{ $id }}"
            type="radio"
            name="{{ $name }}"
            value="{{ $value }}"
            {{ $checked ? 'checked' : '' }}
            {{ $disabled ? 'disabled' : '' }}
            {{ $required ? 'required' : '' }}
            {{ $attributes->except(['class', 'wire:key'])->merge(['class' => $radioClasses]) }}
        >
        <label for="{{ $id }}" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">
            {{ $label }}
        </label>
    </div>

@elseif($variant === 'list-group')
    {{-- List Group Item --}}
    <li class="w-full border-b border-gray-200 dark:border-gray-600" {{ $attributes->only(['class', 'wire:key']) }}>
        <div class="flex items-center ps-3">
            <input
                id="{{ $id }}"
                type="radio"
                name="{{ $name }}"
                value="{{ $value }}"
                {{ $checked ? 'checked' : '' }}
                {{ $disabled ? 'disabled' : '' }}
                {{ $required ? 'required' : '' }}
                {{ $attributes->except(['class', 'wire:key'])->merge(['class' => $radioClasses]) }}
            >
            <label for="{{ $id }}" class="w-full py-3 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                {{ $label }}
            </label>
        </div>
    </li>

@elseif($variant === 'bordered')
    {{-- Bordered Radio (Card Style) --}}
    <div class="flex items-center ps-4 border border-gray-200 rounded dark:border-gray-700" {{ $attributes->only(['class', 'wire:key']) }}>
        <input
            id="{{ $id }}"
            type="radio"
            name="{{ $name }}"
            value="{{ $value }}"
            {{ $checked ? 'checked' : '' }}
            {{ $disabled ? 'disabled' : '' }}
            {{ $required ? 'required' : '' }}
            @if($description) aria-describedby="{{ $helperId }}" @endif
            {{ $attributes->except(['class', 'wire:key'])->merge(['class' => $radioClasses]) }}
        >
        <label for="{{ $id }}" class="w-full py-4 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">
            @if($icon)
                <div class="flex items-center">
                    <div class="me-2">
                        {!! $icon !!}
                    </div>
                    <div>
                        <div>{{ $label }}</div>
                        @if($description)
                            <div id="{{ $helperId }}" class="text-xs text-gray-500 dark:text-gray-400">
                                {{ $description }}
                            </div>
                        @endif
                    </div>
                </div>
            @else
                <div>{{ $label }}</div>
                @if($description)
                    <div id="{{ $helperId }}" class="text-xs text-gray-500 dark:text-gray-400">
                        {{ $description }}
                    </div>
                @endif
            @endif
        </label>
    </div>

@elseif($variant === 'color')
    {{-- Color Variant Radio Button --}}
    <div class="flex items-center" {{ $attributes->only(['class', 'wire:key']) }}>
        <input
            id="{{ $id }}"
            type="radio"
            name="{{ $name }}"
            value="{{ $value }}"
            {{ $checked ? 'checked' : '' }}
            {{ $disabled ? 'disabled' : '' }}
            {{ $required ? 'required' : '' }}
            {{ $attributes->except(['class', 'wire:key'])->merge(['class' => $radioClasses]) }}
        >
        @if($label)
            <label for="{{ $id }}" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                {{ $label }}
            </label>
        @endif
    </div>

@else
    {{-- Fallback to default --}}
    <div class="flex items-center" {{ $attributes->only(['class', 'wire:key']) }}>
        <input
            id="{{ $id }}"
            type="radio"
            name="{{ $name }}"
            value="{{ $value }}"
            {{ $checked ? 'checked' : '' }}
            {{ $disabled ? 'disabled' : '' }}
            {{ $required ? 'required' : '' }}
            {{ $attributes->except(['class', 'wire:key'])->merge(['class' => $radioClasses]) }}
        >
        @if($label)
            <label for="{{ $id }}" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                {{ $label }}
            </label>
        @endif
    </div>
@endif