@props([
    'label' => null,
    'name' => null,
    'placeholder' => null,
    'value' => null,
    'rows' => 4,
    'size' => 'base', // sm, base, lg
    'disabled' => false,
    'required' => false,
    'readonly' => false,
    'error' => null,
    'success' => null,
    'helper' => null,
    'maxlength' => null,
    'showCharCount' => false,
])

@php
    $baseClasses = 'block w-full border rounded-lg focus:outline-none focus:ring-4 transition-colors resize-y';

    // Size classes
    $sizeClasses = [
        'sm' => 'px-2.5 py-2 text-sm',
        'base' => 'px-3 py-2.5 text-sm',
        'lg' => 'px-3.5 py-3 text-base',
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

    $textareaClasses = $baseClasses . ' ' . $sizeClasses[$size] . ' ' . $stateClasses;

    $id = $name ?? 'textarea-' . uniqid();
@endphp

<div {{ $attributes->only(['wire:key']) }}>
    @if($label)
        <x-ui::form.label :for="$id" :required="$required">
            {{ $label }}
        </x-form.label>
    @endif

    <textarea
        id="{{ $id }}"
        name="{{ $name }}"
        rows="{{ $rows }}"
        placeholder="{{ $placeholder }}"
        {{ $disabled ? 'disabled' : '' }}
        {{ $required ? 'required' : '' }}
        {{ $readonly ? 'readonly' : '' }}
        @if($maxlength) maxlength="{{ $maxlength }}" @endif
        {{ $attributes->except(['wire:key'])->merge(['class' => $textareaClasses]) }}
    >{{ $value ?? $slot }}</textarea>

    @if($showCharCount && $maxlength)
        <div class="flex justify-end mt-1">
            <span class="text-xs text-gray-500 dark:text-gray-400">
                <span x-data="{ count: {{ strlen($value ?? '') }} }" x-text="count">{{ strlen($value ?? '') }}</span> / {{ $maxlength }}
            </span>
        </div>
    @endif

    <x-ui::form.validation-message :error="$error" :success="$success" :helper="$helper" />
</div>