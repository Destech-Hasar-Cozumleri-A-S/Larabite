@props([
    'label' => null,
    'name' => null,
    'size' => 'base', // base, lg
    'helper' => null,
    'error' => null,
    'success' => null,
    'multiple' => false,
    'accept' => null,
    'required' => false,
    'variant' => 'default', // default, dropzone, dropzone-button
])

@php
    $baseClasses = 'block w-full border rounded-lg cursor-pointer focus:outline-none focus:ring-4 transition-colors';

    // Size classes
    $sizeClasses = [
        'base' => 'text-sm',
        'lg' => 'text-lg',
    ];

    // State classes
    if ($error) {
        $stateClasses = 'bg-red-50 border-red-500 text-red-900 focus:ring-red-500 focus:border-red-500 dark:bg-red-100 dark:border-red-400';
    } elseif ($success) {
        $stateClasses = 'bg-green-50 border-green-500 text-green-900 focus:ring-green-500 focus:border-green-500 dark:bg-green-100 dark:border-green-400';
    } else {
        $stateClasses = 'bg-gray-50 border-gray-300 text-gray-900 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white';
    }

    $inputClasses = $baseClasses . ' ' . $sizeClasses[$size] . ' ' . $stateClasses;

    $id = $name ?? 'file-input-' . uniqid();
    $helperId = $id . '-helper';
@endphp

@if($variant === 'default')
    <div {{ $attributes->only(['class', 'wire:key']) }}>
        @if($label)
            <x-ui::form.label :for="$id" :required="$required">
                {{ $label }}
            </x-form.label>
        @endif

        <input
            type="file"
            id="{{ $id }}"
            name="{{ $name }}"
            {{ $multiple ? 'multiple' : '' }}
            {{ $required ? 'required' : '' }}
            @if($accept) accept="{{ $accept }}" @endif
            @if($helper) aria-describedby="{{ $helperId }}" @endif
            {{ $attributes->except(['class', 'wire:key'])->merge(['class' => $inputClasses]) }}
        >

        @if($error)
            <p class="mt-2 text-sm text-red-600 dark:text-red-500">
                <span class="font-medium">{{ $error }}</span>
            </p>
        @elseif($success)
            <p class="mt-2 text-sm text-green-600 dark:text-green-500">
                <span class="font-medium">{{ $success }}</span>
            </p>
        @elseif($helper)
            <p id="{{ $helperId }}" class="mt-1 text-sm text-gray-500 dark:text-gray-300">
                {{ $helper }}
            </p>
        @endif
    </div>

@elseif($variant === 'dropzone')
    <div {{ $attributes->only(['class', 'wire:key']) }}>
        @if($label)
            <div class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                {{ $label }}
                @if($required)
                    <span class="text-red-500">*</span>
                @endif
            </div>
        @endif

        <label for="{{ $id }}" class="flex flex-col items-center justify-center w-full h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 hover:bg-gray-100 dark:bg-gray-700 dark:border-gray-600 dark:hover:bg-gray-600">
            <div class="flex flex-col items-center justify-center pt-5 pb-6">
                <svg class="w-8 h-8 mb-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2"/>
                </svg>
                <p class="mb-2 text-sm text-gray-500 dark:text-gray-400">
                    <span class="font-semibold">Click to upload</span> or drag and drop
                </p>
                <p class="text-xs text-gray-500 dark:text-gray-400">
                    {{ $helper ?? 'SVG, PNG, JPG or GIF (MAX. 800x400px)' }}
                </p>
            </div>
            <input
                type="file"
                id="{{ $id }}"
                name="{{ $name }}"
                class="hidden"
                {{ $multiple ? 'multiple' : '' }}
                {{ $required ? 'required' : '' }}
                @if($accept) accept="{{ $accept }}" @endif
                {{ $attributes->except(['class', 'wire:key']) }}
            >
        </label>

        <x-ui::form.validation-message :error="$error" :success="$success" :helper="$helper" />
    </div>

@elseif($variant === 'dropzone-button')
    <div {{ $attributes->only(['class', 'wire:key']) }}>
        @if($label)
            <div class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                {{ $label }}
                @if($required)
                    <span class="text-red-500">*</span>
                @endif
            </div>
        @endif

        <div class="flex items-center justify-center w-full">
            <label for="{{ $id }}" class="flex flex-col items-center justify-center w-full h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 hover:bg-gray-100 dark:bg-gray-700 dark:border-gray-600 dark:hover:bg-gray-600">
                <div class="flex flex-col items-center justify-center pt-5 pb-6">
                    <svg class="w-8 h-8 mb-3 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2"/>
                    </svg>
                    <p class="mb-2 text-sm text-gray-500 dark:text-gray-400 text-center px-4">
                        Drag and drop your file here or
                    </p>
                    <button type="button" onclick="document.getElementById('{{ $id }}').click()" class="px-4 py-2 text-sm font-medium text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        Browse Files
                    </button>
                    @if($helper)
                        <p class="mt-2 text-xs text-gray-500 dark:text-gray-400">
                            {{ $helper }}
                        </p>
                    @endif
                </div>
                <input
                    type="file"
                    id="{{ $id }}"
                    name="{{ $name }}"
                    class="hidden"
                    {{ $multiple ? 'multiple' : '' }}
                    {{ $required ? 'required' : '' }}
                    @if($accept) accept="{{ $accept }}" @endif
                    {{ $attributes->except(['class', 'wire:key']) }}
                >
            </label>
        </div>

        <x-ui::form.validation-message :error="$error" :success="$success" :helper="$helper" />
    </div>
@endif