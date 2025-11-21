@props([
    'label' => null,
    'name' => 'search',
    'placeholder' => 'Search...',
    'value' => null,
    'size' => 'base', // sm, base, lg
    'required' => false,
    'error' => null,
    'helper' => null,
    'variant' => 'default', // default, simple, voice, dropdown, location, advanced
    'buttonText' => 'Search',
    'showButton' => true,
    'dropdownItems' => [], // For dropdown variant
    'dropdownPlaceholder' => 'All categories',
    'voiceSearch' => false, // Add voice search button
])

@php
    $baseClasses = 'block w-full border rounded-lg focus:outline-none focus:ring-4 transition-colors';

    // Size classes
    $sizeClasses = [
        'sm' => 'px-2.5 py-2 text-sm',
        'base' => 'px-3 py-2.5 text-sm',
        'lg' => 'px-4 py-3 text-base',
    ];

    // State classes
    if ($error) {
        $stateClasses = 'bg-red-50 border-red-500 text-red-900 placeholder-red-700 focus:ring-red-500 focus:border-red-500 dark:bg-red-100 dark:border-red-400';
    } else {
        $stateClasses = 'bg-gray-50 border-gray-300 text-gray-900 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white';
    }

    $inputClasses = $baseClasses . ' ' . $sizeClasses[$size] . ' ' . $stateClasses;

    $id = $name ?? 'search-input-' . uniqid();
    $dropdownId = $id . '-dropdown';
@endphp

@if($variant === 'default')
    {{-- Search Bar with Icon and Button Inside --}}
    <div {{ $attributes->only(['class', 'wire:key']) }}>
        @if($label)
            <x-form.label :for="$id" :required="$required">
                {{ $label }}
            </x-form.label>
        @endif

        <div class="relative">
            <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                </svg>
            </div>
            <input
                type="search"
                id="{{ $id }}"
                name="{{ $name }}"
                value="{{ $value }}"
                placeholder="{{ $placeholder }}"
                {{ $required ? 'required' : '' }}
                {{ $attributes->except(['class', 'wire:key'])->merge(['class' => $inputClasses . ' ps-10 ' . ($showButton ? 'pe-20' : ($voiceSearch ? 'pe-10' : ''))]) }}
            >
            @if($voiceSearch)
                <button type="button" class="absolute inset-y-0 end-0 flex items-center pe-3">
                    <svg class="w-4 h-4 text-gray-500 dark:text-gray-400 hover:text-gray-900 dark:hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 16 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 7v3a5.006 5.006 0 0 1-5 5H6a5.006 5.006 0 0 1-5-5V7m7 9v3m-3 0h6M7 1h2a3 3 0 0 1 3 3v5a3 3 0 0 1-3 3H7a3 3 0 0 1-3-3V4a3 3 0 0 1 3-3Z"/>
                    </svg>
                    <span class="sr-only">Voice search</span>
                </button>
            @elseif($showButton)
                <button type="submit" class="text-white absolute end-1 bottom-1 top-1 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-1.5 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    {{ $buttonText }}
                </button>
            @endif
        </div>

        <x-form.validation-message :error="$error" :success="$success" :helper="$helper" />
    </div>

@elseif($variant === 'simple')
    {{-- Simple Search with Separate Button --}}
    <div {{ $attributes->only(['class', 'wire:key']) }}>
        @if($label)
            <label for="{{ $id }}" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">{{ $label }}</label>
        @endif

        <div class="flex">
            <div class="relative w-full">
                <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                    <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                    </svg>
                </div>
                <input
                    type="search"
                    id="{{ $id }}"
                    name="{{ $name }}"
                    value="{{ $value }}"
                    placeholder="{{ $placeholder }}"
                    {{ $required ? 'required' : '' }}
                    {{ $attributes->except(['class', 'wire:key'])->merge(['class' => $inputClasses . ' ps-10 rounded-e-none']) }}
                >
            </div>
            <button type="submit" class="p-2.5 text-sm font-medium text-white bg-blue-700 rounded-e-lg border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                </svg>
                <span class="sr-only">{{ $buttonText }}</span>
            </button>
        </div>

        <x-form.validation-message :error="$error" :success="$success" :helper="$helper" />
    </div>

@elseif($variant === 'voice')
    {{-- Voice Search with Microphone Button --}}
    <div {{ $attributes->only(['class', 'wire:key']) }}>
        @if($label)
            <label for="{{ $id }}" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">{{ $label }}</label>
        @endif

        <div class="relative w-full">
            <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                </svg>
            </div>
            <input
                type="search"
                id="{{ $id }}"
                name="{{ $name }}"
                value="{{ $value }}"
                placeholder="{{ $placeholder }}"
                {{ $required ? 'required' : '' }}
                {{ $attributes->except(['class', 'wire:key'])->merge(['class' => $inputClasses . ' ps-10 pe-10']) }}
            >
            <button type="button" class="absolute inset-y-0 end-0 flex items-center pe-3">
                <svg class="w-4 h-4 text-gray-500 dark:text-gray-400 hover:text-gray-900 dark:hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 16 20">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 7v3a5.006 5.006 0 0 1-5 5H6a5.006 5.006 0 0 1-5-5V7m7 9v3m-3 0h6M7 1h2a3 3 0 0 1 3 3v5a3 3 0 0 1-3 3H7a3 3 0 0 1-3-3V4a3 3 0 0 1 3-3Z"/>
                </svg>
                <span class="sr-only">Voice search</span>
            </button>
        </div>

        <x-form.validation-message :error="$error" :success="$success" :helper="$helper" />
    </div>

@elseif($variant === 'dropdown')
    {{-- Search with Dropdown Categories --}}
    <div {{ $attributes->only(['class', 'wire:key']) }}>
        @if($label)
            <label for="{{ $id }}" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">{{ $label }}</label>
        @endif

        <div class="flex">
            <button id="{{ $dropdownId }}-button" data-dropdown-toggle="{{ $dropdownId }}" class="flex-shrink-0 z-10 inline-flex items-center py-2.5 px-4 text-sm font-medium text-center text-gray-900 bg-gray-100 border border-gray-300 rounded-s-lg hover:bg-gray-200 focus:ring-4 focus:outline-none focus:ring-gray-100 dark:bg-gray-700 dark:hover:bg-gray-600 dark:focus:ring-gray-700 dark:text-white dark:border-gray-600" type="button">
                {{ $dropdownPlaceholder }}
                <svg class="w-2.5 h-2.5 ms-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                </svg>
            </button>
            <div id="{{ $dropdownId }}" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
                <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="{{ $dropdownId }}-button">
                    @foreach($dropdownItems as $item)
                        <li>
                            <button type="button" class="inline-flex w-full px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                                {{ $item }}
                            </button>
                        </li>
                    @endforeach
                </ul>
            </div>
            <div class="relative w-full">
                <input
                    type="search"
                    id="{{ $id }}"
                    name="{{ $name }}"
                    value="{{ $value }}"
                    placeholder="{{ $placeholder }}"
                    {{ $required ? 'required' : '' }}
                    {{ $attributes->except(['class', 'wire:key'])->merge(['class' => $inputClasses . ' rounded-s-none']) }}
                >
                @if($showButton)
                    <button type="submit" class="absolute top-0 end-0 h-full px-4 text-sm font-medium text-white bg-blue-700 rounded-e-lg border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                        </svg>
                        <span class="sr-only">{{ $buttonText }}</span>
                    </button>
                @endif
            </div>
        </div>

        <x-form.validation-message :error="$error" :success="$success" :helper="$helper" />
    </div>

@else
    {{-- Default variant if invalid variant specified --}}
    <div {{ $attributes->only(['class', 'wire:key']) }}>
        @if($label)
            <x-form.label :for="$id" :required="$required">
                {{ $label }}
            </x-form.label>
        @endif

        <div class="relative">
            <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                </svg>
            </div>
            <input
                type="search"
                id="{{ $id }}"
                name="{{ $name }}"
                value="{{ $value }}"
                placeholder="{{ $placeholder }}"
                {{ $required ? 'required' : '' }}
                {{ $attributes->except(['class', 'wire:key'])->merge(['class' => $inputClasses . ' ps-10']) }}
            >
        </div>

        <x-form.validation-message :error="$error" :success="$success" :helper="$helper" />
    </div>
@endif