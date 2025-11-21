@props([
    'label' => null,
    'name' => null,
    'type' => 'text',
    'placeholder' => null,
    'value' => null,
    'size' => 'base', // sm, base, lg, xl
    'disabled' => false,
    'required' => false,
    'error' => null,
    'success' => null,
    'helper' => null,
    'leadingIcon' => null, // SVG icon
    'trailingIcon' => null, // SVG icon
    'prefix' => null, // Text prefix (e.g., "$")
    'suffix' => null, // Text suffix (e.g., "USD")
])

@php
    $baseClasses = 'block w-full border rounded-lg focus:outline-none focus:ring-4 transition-colors';

    // Size classes
    $sizeClasses = [
        'sm' => 'px-2.5 py-2 text-sm',
        'base' => 'px-3 py-2.5 text-sm',
        'lg' => 'px-3.5 py-3 text-base',
        'xl' => 'px-4 py-3.5 text-base',
    ];

    // State classes
    if ($disabled) {
        $stateClasses = 'bg-gray-100 border-gray-300 text-gray-400 cursor-not-allowed dark:bg-gray-700 dark:border-gray-600 dark:text-gray-500';
    } elseif ($error) {
        $stateClasses = 'bg-red-50 border-red-500 text-red-900 placeholder-red-700 focus:ring-red-500 focus:border-red-500 dark:bg-red-100 dark:border-red-400 dark:text-red-900';
    } elseif ($success) {
        $stateClasses = 'bg-green-50 border-green-500 text-green-900 placeholder-green-700 focus:ring-green-500 focus:border-green-500 dark:bg-green-100 dark:border-green-400 dark:text-green-900';
    } else {
        $stateClasses = 'bg-gray-50 border-gray-300 text-gray-900 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500';
    }

    $inputClasses = $baseClasses . ' ' . $sizeClasses[$size] . ' ' . $stateClasses;

    // Add padding for icons
    if ($leadingIcon || $prefix) {
        $inputClasses .= ' ps-10';
    }
    if ($trailingIcon || $suffix) {
        $inputClasses .= ' pe-10';
    }

    $id = $name ?? 'input-' . uniqid();
@endphp

<div {{ $attributes->only(['class', 'wire:key']) }}>
    @if($label)
        <x-form.label :for="$id" :required="$required">
            {{ $label }}
        </x-form.label>
    @endif

    <div class="relative">
        @if($prefix)
            <div class="absolute inset-y-0 start-0 flex items-center ps-3.5 pointer-events-none">
                <span class="text-sm text-gray-500 dark:text-gray-400">{{ $prefix }}</span>
            </div>
        @elseif($leadingIcon)
            <div class="absolute inset-y-0 start-0 flex items-center ps-3.5 pointer-events-none">
                {!! $leadingIcon !!}
            </div>
        @endif

        <input
            type="{{ $type }}"
            id="{{ $id }}"
            name="{{ $name }}"
            value="{{ $value }}"
            placeholder="{{ $placeholder }}"
            {{ $disabled ? 'disabled' : '' }}
            {{ $required ? 'required' : '' }}
            {{ $attributes->except(['class', 'wire:key'])->merge(['class' => $inputClasses]) }}
        >

        @if($suffix)
            <div class="absolute inset-y-0 end-0 flex items-center pe-3.5 pointer-events-none">
                <span class="text-sm text-gray-500 dark:text-gray-400">{{ $suffix }}</span>
            </div>
        @elseif($trailingIcon)
            <div class="absolute inset-y-0 end-0 flex items-center pe-3.5 pointer-events-none">
                {!! $trailingIcon !!}
            </div>
        @endif
    </div>

    <x-form.validation-message :error="$error" :success="$success" :helper="$helper" />
</div>