@props([
    'label' => null,
    'name' => null,
    'placeholder' => 'Choose an option',
    'size' => 'base', // sm, base, lg
    'required' => false,
    'disabled' => false,
    'error' => null,
    'success' => null,
    'helper' => null,
    'variant' => 'default', // default, underline
    'multiple' => false,
    'selectSize' => null, // Number of visible options for multiple select
])

@php
    $baseClasses = 'block w-full rounded-lg focus:outline-none focus:ring-4 transition-colors';

    // Size classes
    $sizeClasses = [
        'sm' => 'px-2.5 py-2 text-sm',
        'base' => 'px-3 py-2.5 text-sm',
        'lg' => 'px-4 py-3 text-base',
    ];

    // State classes
    if ($disabled) {
        $stateClasses = 'bg-gray-100 border-gray-300 text-gray-400 cursor-not-allowed dark:bg-gray-700 dark:border-gray-600 dark:text-gray-500';
    } elseif ($error) {
        $stateClasses = 'bg-red-50 border-red-500 text-red-900 focus:ring-red-500 focus:border-red-500 dark:bg-red-100 dark:border-red-400';
    } elseif ($success) {
        $stateClasses = 'bg-green-50 border-green-500 text-green-900 focus:ring-green-500 focus:border-green-500 dark:bg-green-100 dark:border-green-400';
    } else {
        $stateClasses = 'bg-gray-50 border-gray-300 text-gray-900 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white';
    }

    if ($variant === 'underline') {
        $selectClasses = 'block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer';
    } else {
        $selectClasses = $baseClasses . ' border ' . $sizeClasses[$size] . ' ' . $stateClasses;
    }

    $id = $name ?? 'select-' . uniqid();
@endphp

@if($variant === 'default')
    {{-- Default Select --}}
    <div {{ $attributes->only(['class', 'wire:key']) }}>
        @if($label)
            <x-ui::form.label :for="$id" :required="$required">
                {{ $label }}
            </x-form.label>
        @endif

        <select
            id="{{ $id }}"
            name="{{ $name }}"
            {{ $disabled ? 'disabled' : '' }}
            {{ $required ? 'required' : '' }}
            {{ $multiple ? 'multiple' : '' }}
            @if($selectSize) size="{{ $selectSize }}" @endif
            {{ $attributes->except(['class', 'wire:key'])->merge(['class' => $selectClasses]) }}
        >
            @if(!$multiple && $placeholder)
                <option value="" selected>{{ $placeholder }}</option>
            @endif
            {{ $slot }}
        </select>

        <x-ui::form.validation-message :error="$error" :success="$success" :helper="$helper" />
    </div>

@elseif($variant === 'underline')
    {{-- Underline Select --}}
    <div class="relative z-0" {{ $attributes->only(['class', 'wire:key']) }}>
        <select
            id="{{ $id }}"
            name="{{ $name }}"
            {{ $disabled ? 'disabled' : '' }}
            {{ $required ? 'required' : '' }}
            {{ $multiple ? 'multiple' : '' }}
            @if($selectSize) size="{{ $selectSize }}" @endif
            {{ $attributes->except(['class', 'wire:key'])->merge(['class' => $selectClasses]) }}
        >
            @if(!$multiple && $placeholder)
                <option value="" selected>{{ $placeholder }}</option>
            @endif
            {{ $slot }}
        </select>

        @if($label)
            <label for="{{ $id }}" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto">
                {{ $label }}
                @if($required)
                    <span class="text-red-500">*</span>
                @endif
            </label>
        @endif

        <x-ui::form.validation-message :error="$error" :success="$success" :helper="$helper" />
    </div>

@else
    {{-- Fallback to default --}}
    <div {{ $attributes->only(['class', 'wire:key']) }}>
        @if($label)
            <x-ui::form.label :for="$id" :required="$required">
                {{ $label }}
            </x-form.label>
        @endif

        <select
            id="{{ $id }}"
            name="{{ $name }}"
            {{ $disabled ? 'disabled' : '' }}
            {{ $required ? 'required' : '' }}
            {{ $multiple ? 'multiple' : '' }}
            @if($selectSize) size="{{ $selectSize }}" @endif
            {{ $attributes->except(['class', 'wire:key'])->merge(['class' => $selectClasses]) }}
        >
            @if(!$multiple && $placeholder)
                <option value="" selected>{{ $placeholder }}</option>
            @endif
            {{ $slot }}
        </select>

        <x-ui::form.validation-message :error="$error" :success="$success" :helper="$helper" />
    </div>
@endif