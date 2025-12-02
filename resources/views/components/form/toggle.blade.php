@props([
    'label' => null,
    'name' => null,
    'value' => '1',
    'checked' => false,
    'disabled' => false,
    'required' => false,
    'error' => null,
    'success' => null,
    'helper' => null,
    'size' => 'base', // base, lg
    'color' => 'blue', // blue, red, green, purple, teal, yellow, orange
    'variant' => 'default', // default, double-label, icon, card
    'labelBefore' => null,
    'labelAfter' => null,
    'description' => null,
    'icon' => null,
])

@php
    // Size classes for toggle switch
    $sizeClasses = [
        'base' => [
            'toggle' => 'w-9 h-5',
            'circle' => 'w-4 h-4',
            'translate' => 'translate-x-full rtl:-translate-x-full',
        ],
        'lg' => [
            'toggle' => 'w-11 h-6',
            'circle' => 'w-5 h-5',
            'translate' => 'translate-x-full rtl:-translate-x-full',
        ],
    ];

    // Color classes
    $colorClasses = [
        'blue' => 'peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 peer-checked:bg-blue-600',
        'red' => 'peer-focus:ring-red-300 dark:peer-focus:ring-red-800 peer-checked:bg-red-600',
        'green' => 'peer-focus:ring-green-300 dark:peer-focus:ring-green-800 peer-checked:bg-green-600',
        'purple' => 'peer-focus:ring-purple-300 dark:peer-focus:ring-purple-800 peer-checked:bg-purple-600',
        'teal' => 'peer-focus:ring-teal-300 dark:peer-focus:ring-teal-800 peer-checked:bg-teal-600',
        'yellow' => 'peer-focus:ring-yellow-300 dark:peer-focus:ring-yellow-800 peer-checked:bg-yellow-400',
        'orange' => 'peer-focus:ring-orange-300 dark:peer-focus:ring-orange-800 peer-checked:bg-orange-500',
    ];

    $toggleClasses = $sizeClasses[$size]['toggle'];
    $circleClasses = $sizeClasses[$size]['circle'];
    $translateClasses = $sizeClasses[$size]['translate'];
    $colorClass = $colorClasses[$color];

    $id = $name ?? 'toggle-' . uniqid();
    $helperId = $id . '-helper';
@endphp

@if($variant === 'default')
    {{-- Default Toggle with Label --}}
    <div {{ $attributes->only(['wire:key']) }}>
        <label class="inline-flex items-center cursor-pointer {{ $disabled ? 'cursor-not-allowed opacity-50' : '' }}">
            <input
                type="checkbox"
                id="{{ $id }}"
                name="{{ $name }}"
                value="{{ $value }}"
                {{ $checked ? 'checked' : '' }}
                {{ $disabled ? 'disabled' : '' }}
                {{ $required ? 'required' : '' }}
                @if($helper) aria-describedby="{{ $helperId }}" @endif
                class="sr-only peer"
                {{ $attributes->except(['class', 'wire:key']) }}
            >
            <div class="relative {{ $toggleClasses }} bg-gray-200 peer-focus:outline-none peer-focus:ring-4 {{ $colorClass }} rounded-full peer dark:bg-gray-700 peer-checked:after:{{ $translateClasses }} peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:{{ $circleClasses }} after:transition-all dark:border-gray-600"></div>
            @if($label)
                <span class="ms-3 text-sm font-medium text-gray-900 dark:text-gray-300">
                    {{ $label }}
                    @if($required)
                        <span class="text-red-500">*</span>
                    @endif
                </span>
            @endif
        </label>

        @if($error)
            <p class="mt-2 text-sm text-red-600 dark:text-red-500">
                <span class="font-medium">{{ $error }}</span>
            </p>
        @elseif($success)
            <p class="mt-2 text-sm text-green-600 dark:text-green-500">
                <span class="font-medium">{{ $success }}</span>
            </p>
        @elseif($helper)
            <p id="{{ $helperId }}" class="mt-2 text-sm text-gray-500 dark:text-gray-400">
                {{ $helper }}
            </p>
        @endif
    </div>

@elseif($variant === 'double-label')
    {{-- Toggle with Labels Before and After --}}
    <div {{ $attributes->only(['wire:key']) }}>
        <label class="inline-flex items-center cursor-pointer {{ $disabled ? 'cursor-not-allowed opacity-50' : '' }}">
            @if($labelBefore)
                <span class="me-3 text-sm font-medium text-gray-900 dark:text-gray-300">{{ $labelBefore }}</span>
            @endif

            <input
                type="checkbox"
                id="{{ $id }}"
                name="{{ $name }}"
                value="{{ $value }}"
                {{ $checked ? 'checked' : '' }}
                {{ $disabled ? 'disabled' : '' }}
                {{ $required ? 'required' : '' }}
                @if($helper) aria-describedby="{{ $helperId }}" @endif
                class="sr-only peer"
                {{ $attributes->except(['class', 'wire:key']) }}
            >
            <div class="relative {{ $toggleClasses }} bg-gray-200 peer-focus:outline-none peer-focus:ring-4 {{ $colorClass }} rounded-full peer dark:bg-gray-700 peer-checked:after:{{ $translateClasses }} peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:{{ $circleClasses }} after:transition-all dark:border-gray-600"></div>

            @if($labelAfter)
                <span class="ms-3 text-sm font-medium text-gray-900 dark:text-gray-300">
                    {{ $labelAfter }}
                    @if($required)
                        <span class="text-red-500">*</span>
                    @endif
                </span>
            @endif
        </label>

        @if($error)
            <p class="mt-2 text-sm text-red-600 dark:text-red-500">
                <span class="font-medium">{{ $error }}</span>
            </p>
        @elseif($success)
            <p class="mt-2 text-sm text-green-600 dark:text-green-500">
                <span class="font-medium">{{ $success }}</span>
            </p>
        @elseif($helper)
            <p id="{{ $helperId }}" class="mt-2 text-sm text-gray-500 dark:text-gray-400">
                {{ $helper }}
            </p>
        @endif
    </div>

@elseif($variant === 'icon')
    {{-- Toggle with Icons --}}
    <div {{ $attributes->only(['wire:key']) }}>
        <label class="inline-flex items-center cursor-pointer {{ $disabled ? 'cursor-not-allowed opacity-50' : '' }}">
            <input
                type="checkbox"
                id="{{ $id }}"
                name="{{ $name }}"
                value="{{ $value }}"
                {{ $checked ? 'checked' : '' }}
                {{ $disabled ? 'disabled' : '' }}
                {{ $required ? 'required' : '' }}
                @if($helper) aria-describedby="{{ $helperId }}" @endif
                class="sr-only peer"
                {{ $attributes->except(['class', 'wire:key']) }}
            >
            <div class="relative {{ $toggleClasses }} bg-gray-200 rounded-full peer dark:bg-gray-700 peer-focus:ring-4 {{ $colorClass }} peer-checked:after:{{ $translateClasses }} after:content-[''] after:absolute after:top-0.5 after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:{{ $circleClasses }} after:transition-all dark:border-gray-600 peer-checked:bg-blue-600">
                @if($icon)
                    {!! $icon !!}
                @else
                    {{-- Default check and X icons --}}
                    <svg class="w-3 h-3 text-white absolute top-1 start-1 hidden peer-checked:block" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                    </svg>
                    <svg class="w-3 h-3 text-gray-500 dark:text-gray-400 absolute top-1 end-1 peer-checked:hidden" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"/>
                    </svg>
                @endif
            </div>
            @if($label)
                <span class="ms-3 text-sm font-medium text-gray-900 dark:text-gray-300">
                    {{ $label }}
                    @if($required)
                        <span class="text-red-500">*</span>
                    @endif
                </span>
            @endif
        </label>

        @if($error)
            <p class="mt-2 text-sm text-red-600 dark:text-red-500">
                <span class="font-medium">{{ $error }}</span>
            </p>
        @elseif($success)
            <p class="mt-2 text-sm text-green-600 dark:text-green-500">
                <span class="font-medium">{{ $success }}</span>
            </p>
        @elseif($helper)
            <p id="{{ $helperId }}" class="mt-2 text-sm text-gray-500 dark:text-gray-400">
                {{ $helper }}
            </p>
        @endif
    </div>

@elseif($variant === 'card')
    {{-- Toggle in Card Format --}}
    <div class="p-4 bg-white border border-gray-200 rounded-lg dark:bg-gray-800 dark:border-gray-700" {{ $attributes->only(['wire:key']) }}>
        <label class="flex items-center justify-between cursor-pointer {{ $disabled ? 'cursor-not-allowed opacity-50' : '' }}">
            <div class="flex items-center {{ $icon ? 'space-x-3' : '' }}">
                @if($icon)
                    <div class="flex-shrink-0">
                        {!! $icon !!}
                    </div>
                @endif
                <div>
                    @if($label)
                        <div class="text-sm font-medium text-gray-900 dark:text-white">
                            {{ $label }}
                            @if($required)
                                <span class="text-red-500">*</span>
                            @endif
                        </div>
                    @endif
                    @if($description)
                        <div class="text-xs text-gray-500 dark:text-gray-400 mt-1">
                            {{ $description }}
                        </div>
                    @endif
                </div>
            </div>

            <input
                type="checkbox"
                id="{{ $id }}"
                name="{{ $name }}"
                value="{{ $value }}"
                {{ $checked ? 'checked' : '' }}
                {{ $disabled ? 'disabled' : '' }}
                {{ $required ? 'required' : '' }}
                @if($helper) aria-describedby="{{ $helperId }}" @endif
                class="sr-only peer"
                {{ $attributes->except(['class', 'wire:key']) }}
            >
            <div class="relative {{ $toggleClasses }} bg-gray-200 peer-focus:outline-none peer-focus:ring-4 {{ $colorClass }} rounded-full peer dark:bg-gray-700 peer-checked:after:{{ $translateClasses }} peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:{{ $circleClasses }} after:transition-all dark:border-gray-600"></div>
        </label>

        @if($error)
            <p class="mt-2 text-sm text-red-600 dark:text-red-500">
                <span class="font-medium">{{ $error }}</span>
            </p>
        @elseif($success)
            <p class="mt-2 text-sm text-green-600 dark:text-green-500">
                <span class="font-medium">{{ $success }}</span>
            </p>
        @elseif($helper)
            <p id="{{ $helperId }}" class="mt-2 text-sm text-gray-500 dark:text-gray-400">
                {{ $helper }}
            </p>
        @endif
    </div>

@else
    {{-- Fallback to default --}}
    <div {{ $attributes->only(['wire:key']) }}>
        <label class="inline-flex items-center cursor-pointer {{ $disabled ? 'cursor-not-allowed opacity-50' : '' }}">
            <input
                type="checkbox"
                id="{{ $id }}"
                name="{{ $name }}"
                value="{{ $value }}"
                {{ $checked ? 'checked' : '' }}
                {{ $disabled ? 'disabled' : '' }}
                {{ $required ? 'required' : '' }}
                class="sr-only peer"
                {{ $attributes->except(['class', 'wire:key']) }}
            >
            <div class="relative {{ $toggleClasses }} bg-gray-200 peer-focus:outline-none peer-focus:ring-4 {{ $colorClass }} rounded-full peer dark:bg-gray-700 peer-checked:after:{{ $translateClasses }} peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:{{ $circleClasses }} after:transition-all dark:border-gray-600"></div>
            @if($label)
                <span class="ms-3 text-sm font-medium text-gray-900 dark:text-gray-300">{{ $label }}</span>
            @endif
        </label>
    </div>
@endif