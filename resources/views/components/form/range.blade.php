@props([
    'label' => null,
    'name' => null,
    'value' => 50,
    'min' => 0,
    'max' => 100,
    'step' => 1,
    'size' => 'base', // sm, base, lg
    'disabled' => false,
    'required' => false,
    'error' => null,
    'success' => null,
    'helper' => null,
    'showValue' => false, // Show current value
    'valuePrefix' => '', // Prefix for value display (e.g., "$")
    'valueSuffix' => '', // Suffix for value display (e.g., "%")
    'showMinMax' => false, // Show min/max labels
    'variant' => 'default', // default, steps, labels
    'steps' => [], // For steps variant: [0, 25, 50, 75, 100]
])

@php
    // Size classes for range slider
    $sizeClasses = [
        'sm' => 'h-1 range-sm',
        'base' => 'h-2',
        'lg' => 'h-3 range-lg',
    ];

    $rangeClasses = 'w-full bg-gray-200 rounded-lg appearance-none cursor-pointer dark:bg-gray-700 ' . $sizeClasses[$size];

    if ($disabled) {
        $rangeClasses .= ' opacity-50 cursor-not-allowed';
    }

    $id = $name ?? 'range-' . uniqid();
    $valueId = $id . '-value';
@endphp

<div {{ $attributes->only(['class', 'wire:key']) }}>
    @if($label)
        <div class="flex justify-between items-center mb-2">
            <label for="{{ $id }}" class="block text-sm font-medium text-gray-900 dark:text-white">
                {{ $label }}
                @if($required)
                    <span class="text-red-500">*</span>
                @endif
            </label>

            @if($showValue)
                <span id="{{ $valueId }}" class="text-sm font-medium text-gray-900 dark:text-white">
                    {{ $valuePrefix }}{{ $value }}{{ $valueSuffix }}
                </span>
            @endif
        </div>
    @endif

    @if($variant === 'default')
        {{-- Default Range Slider --}}
        <input
            type="range"
            id="{{ $id }}"
            name="{{ $name }}"
            value="{{ $value }}"
            min="{{ $min }}"
            max="{{ $max }}"
            step="{{ $step }}"
            {{ $disabled ? 'disabled' : '' }}
            {{ $required ? 'required' : '' }}
            class="{{ $rangeClasses }}"
            {{ $attributes->except(['class', 'wire:key']) }}
            @if($showValue)
                oninput="document.getElementById('{{ $valueId }}').textContent = '{{ $valuePrefix }}' + this.value + '{{ $valueSuffix }}'"
            @endif
        >

        @if($showMinMax)
            <div class="flex justify-between text-xs text-gray-500 dark:text-gray-400 mt-2">
                <span>{{ $valuePrefix }}{{ $min }}{{ $valueSuffix }}</span>
                <span>{{ $valuePrefix }}{{ $max }}{{ $valueSuffix }}</span>
            </div>
        @endif

    @elseif($variant === 'steps')
        {{-- Range Slider with Step Labels --}}
        <input
            type="range"
            id="{{ $id }}"
            name="{{ $name }}"
            value="{{ $value }}"
            min="{{ $min }}"
            max="{{ $max }}"
            step="{{ $step }}"
            {{ $disabled ? 'disabled' : '' }}
            {{ $required ? 'required' : '' }}
            class="{{ $rangeClasses }}"
            {{ $attributes->except(['class', 'wire:key']) }}
            @if($showValue)
                oninput="document.getElementById('{{ $valueId }}').textContent = '{{ $valuePrefix }}' + this.value + '{{ $valueSuffix }}'"
            @endif
        >

        @if(!empty($steps))
            <div class="relative mt-2">
                <div class="flex justify-between text-xs text-gray-500 dark:text-gray-400">
                    @foreach($steps as $stepValue)
                        <span>{{ $valuePrefix }}{{ $stepValue }}{{ $valueSuffix }}</span>
                    @endforeach
                </div>
            </div>
        @endif

    @elseif($variant === 'labels')
        {{-- Range Slider with Custom Labels --}}
        <input
            type="range"
            id="{{ $id }}"
            name="{{ $name }}"
            value="{{ $value }}"
            min="{{ $min }}"
            max="{{ $max }}"
            step="{{ $step }}"
            {{ $disabled ? 'disabled' : '' }}
            {{ $required ? 'required' : '' }}
            class="{{ $rangeClasses }}"
            {{ $attributes->except(['class', 'wire:key']) }}
            @if($showValue)
                oninput="document.getElementById('{{ $valueId }}').textContent = '{{ $valuePrefix }}' + this.value + '{{ $valueSuffix }}'"
            @endif
        >

        @if($slot->isNotEmpty())
            <div class="mt-2">
                {{ $slot }}
            </div>
        @endif

    @else
        {{-- Fallback to default --}}
        <input
            type="range"
            id="{{ $id }}"
            name="{{ $name }}"
            value="{{ $value }}"
            min="{{ $min }}"
            max="{{ $max }}"
            step="{{ $step }}"
            {{ $disabled ? 'disabled' : '' }}
            {{ $required ? 'required' : '' }}
            class="{{ $rangeClasses }}"
            {{ $attributes->except(['class', 'wire:key']) }}
        >
    @endif

    @if($error)
        <p class="mt-2 text-sm text-red-600 dark:text-red-500">
            <span class="font-medium">{{ $error }}</span>
        </p>
    @elseif($success)
        <p class="mt-2 text-sm text-green-600 dark:text-green-500">
            <span class="font-medium">{{ $success }}</span>
        </p>
    @elseif($helper)
        <p class="mt-2 text-sm text-gray-500 dark:text-gray-400">
            {{ $helper }}
        </p>
    @endif
</div>