@props([
    'label' => null,
    'name' => null,
    'placeholder' => null,
    'value' => null,
    'size' => 'base', // sm, base, lg
    'required' => false,
    'error' => null,
    'success' => null,
    'helper' => null,
    'min' => null,
    'max' => null,
    'step' => 1,
    'variant' => 'default', // default, buttons, counter, currency, phone
    'leadingIcon' => null,
    'disabled' => false,
    // Button controls
    'showButtons' => false,
    'buttonPosition' => 'horizontal', // horizontal, vertical
    // Currency
    'currencySymbol' => '$',
    'currencyPosition' => 'left', // left, right
    // Phone
    'countryCode' => '+1',
    'countryFlag' => null,
    'showCountryDropdown' => false,
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
    if ($disabled) {
        $stateClasses = 'bg-gray-100 border-gray-300 text-gray-400 cursor-not-allowed dark:bg-gray-700 dark:border-gray-600 dark:text-gray-500';
    } elseif ($error) {
        $stateClasses = 'bg-red-50 border-red-500 text-red-900 placeholder-red-700 focus:ring-red-500 focus:border-red-500 dark:bg-red-100 dark:border-red-400';
    } elseif ($success) {
        $stateClasses = 'bg-green-50 border-green-500 text-green-900 placeholder-green-700 focus:ring-green-500 focus:border-green-500 dark:bg-green-100 dark:border-green-400';
    } else {
        $stateClasses = 'bg-gray-50 border-gray-300 text-gray-900 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white';
    }

    $inputClasses = $baseClasses . ' ' . $sizeClasses[$size] . ' ' . $stateClasses;

    // Add padding for icons/buttons
    if ($leadingIcon || ($variant === 'currency' && $currencyPosition === 'left') || $variant === 'phone') {
        $inputClasses .= ' ps-10';
    }
    if ($variant === 'currency' && $currencyPosition === 'right') {
        $inputClasses .= ' pe-10';
    }
    if (($variant === 'buttons' || $variant === 'counter') && $buttonPosition === 'horizontal') {
        $inputClasses .= ' text-center';
    }

    $id = $name ?? 'number-input-' . uniqid();
@endphp

@if($variant === 'default')
    {{-- Default Number Input --}}
    <div {{ $attributes->only(['class', 'wire:key']) }}>
        @if($label)
            <x-ui::form.label :for="$id" :required="$required">
                {{ $label }}
            </x-form.label>
        @endif

        <div class="relative">
            @if($leadingIcon)
                <div class="absolute inset-y-0 start-0 flex items-center ps-3.5 pointer-events-none">
                    {!! $leadingIcon !!}
                </div>
            @endif

            <input
                type="number"
                id="{{ $id }}"
                name="{{ $name }}"
                value="{{ $value }}"
                placeholder="{{ $placeholder }}"
                {{ $disabled ? 'disabled' : '' }}
                {{ $required ? 'required' : '' }}
                @if($min !== null) min="{{ $min }}" @endif
                @if($max !== null) max="{{ $max }}" @endif
                @if($step !== null) step="{{ $step }}" @endif
                {{ $attributes->except(['class', 'wire:key'])->merge(['class' => $inputClasses]) }}
            >
        </div>

        <x-ui::form.validation-message :error="$error" :success="$success" :helper="$helper" />
    </div>

@elseif($variant === 'buttons')
    {{-- Number Input with Increment/Decrement Buttons --}}
    <div {{ $attributes->only(['class', 'wire:key']) }}>
        @if($label)
            <x-ui::form.label :for="$id" :required="$required">
                {{ $label }}
            </x-form.label>
        @endif

        <div class="flex items-center {{ $buttonPosition === 'horizontal' ? '' : 'max-w-[8rem]' }}">
            @if($buttonPosition === 'horizontal')
                {{-- Horizontal Layout --}}
                <button
                    type="button"
                    id="{{ $id }}-decrement"
                    data-input-counter-decrement="{{ $id }}"
                    class="bg-gray-100 dark:bg-gray-700 dark:hover:bg-gray-600 dark:border-gray-600 hover:bg-gray-200 border border-gray-300 rounded-s-lg p-3 h-11 focus:ring-gray-100 dark:focus:ring-gray-700 focus:ring-2 focus:outline-none"
                >
                    <svg class="w-3 h-3 text-gray-900 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 2">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h16"/>
                    </svg>
                </button>

                <input
                    type="text"
                    id="{{ $id }}"
                    name="{{ $name }}"
                    data-input-counter
                    @if($min !== null) data-input-counter-min="{{ $min }}" @endif
                    @if($max !== null) data-input-counter-max="{{ $max }}" @endif
                    value="{{ $value }}"
                    {{ $disabled ? 'disabled' : '' }}
                    {{ $required ? 'required' : '' }}
                    {{ $attributes->except(['class', 'wire:key'])->merge(['class' => 'border-x-0 border-gray-300 h-11 font-medium text-center text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 block w-full pb-6 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500']) }}
                >

                <button
                    type="button"
                    id="{{ $id }}-increment"
                    data-input-counter-increment="{{ $id }}"
                    class="bg-gray-100 dark:bg-gray-700 dark:hover:bg-gray-600 dark:border-gray-600 hover:bg-gray-200 border border-gray-300 rounded-e-lg p-3 h-11 focus:ring-gray-100 dark:focus:ring-gray-700 focus:ring-2 focus:outline-none"
                >
                    <svg class="w-3 h-3 text-gray-900 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 1v16M1 9h16"/>
                    </svg>
                </button>
            @else
                {{-- Vertical Layout --}}
                <div class="relative flex items-center max-w-[11rem]">
                    <button
                        type="button"
                        id="{{ $id }}-decrement"
                        data-input-counter-decrement="{{ $id }}"
                        class="bg-gray-100 dark:bg-gray-700 dark:hover:bg-gray-600 dark:border-gray-600 hover:bg-gray-200 border border-gray-300 rounded-s-lg p-3 h-11 focus:ring-gray-100 dark:focus:ring-gray-700 focus:ring-2 focus:outline-none"
                    >
                        <svg class="w-3 h-3 text-gray-900 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 2">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h16"/>
                        </svg>
                    </button>

                    <input
                        type="text"
                        id="{{ $id }}"
                        name="{{ $name }}"
                        data-input-counter
                        @if($min !== null) data-input-counter-min="{{ $min }}" @endif
                        @if($max !== null) data-input-counter-max="{{ $max }}" @endif
                        value="{{ $value }}"
                        {{ $disabled ? 'disabled' : '' }}
                        {{ $required ? 'required' : '' }}
                        {{ $attributes->except(['class', 'wire:key'])->merge(['class' => 'bg-gray-50 border-x-0 border-gray-300 h-11 text-center text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 block w-full py-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500']) }}
                    >

                    <button
                        type="button"
                        id="{{ $id }}-increment"
                        data-input-counter-increment="{{ $id }}"
                        class="bg-gray-100 dark:bg-gray-700 dark:hover:bg-gray-600 dark:border-gray-600 hover:bg-gray-200 border border-gray-300 rounded-e-lg p-3 h-11 focus:ring-gray-100 dark:focus:ring-gray-700 focus:ring-2 focus:outline-none"
                    >
                        <svg class="w-3 h-3 text-gray-900 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 1v16M1 9h16"/>
                        </svg>
                    </button>
                </div>
            @endif
        </div>

        <x-ui::form.validation-message :error="$error" :success="$success" :helper="$helper" />
    </div>

@elseif($variant === 'counter')
    {{-- Counter Input with Rounded Buttons --}}
    <div {{ $attributes->only(['class', 'wire:key']) }}>
        @if($label)
            <x-ui::form.label :for="$id" :required="$required">
                {{ $label }}
            </x-form.label>
        @endif

        <div class="relative flex items-center max-w-[11rem]">
            <button
                type="button"
                id="{{ $id }}-decrement"
                data-input-counter-decrement="{{ $id }}"
                class="flex-shrink-0 bg-gray-100 dark:bg-gray-700 dark:hover:bg-gray-600 dark:border-gray-600 hover:bg-gray-200 inline-flex items-center justify-center border border-gray-300 rounded-md h-5 w-5 focus:ring-gray-100 dark:focus:ring-gray-700 focus:ring-2 focus:outline-none"
            >
                <svg class="w-2.5 h-2.5 text-gray-900 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 2">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h16"/>
                </svg>
            </button>

            <input
                type="text"
                id="{{ $id }}"
                name="{{ $name }}"
                data-input-counter
                @if($min !== null) data-input-counter-min="{{ $min }}" @endif
                @if($max !== null) data-input-counter-max="{{ $max }}" @endif
                value="{{ $value }}"
                {{ $disabled ? 'disabled' : '' }}
                {{ $required ? 'required' : '' }}
                {{ $attributes->except(['class', 'wire:key'])->merge(['class' => 'flex-shrink-0 text-gray-900 dark:text-white border-0 bg-transparent text-sm font-normal focus:outline-none focus:ring-0 max-w-[2.5rem] text-center']) }}
            >

            <button
                type="button"
                id="{{ $id }}-increment"
                data-input-counter-increment="{{ $id }}"
                class="flex-shrink-0 bg-gray-100 dark:bg-gray-700 dark:hover:bg-gray-600 dark:border-gray-600 hover:bg-gray-200 inline-flex items-center justify-center border border-gray-300 rounded-md h-5 w-5 focus:ring-gray-100 dark:focus:ring-gray-700 focus:ring-2 focus:outline-none"
            >
                <svg class="w-2.5 h-2.5 text-gray-900 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 1v16M1 9h16"/>
                </svg>
            </button>
        </div>

        <x-ui::form.validation-message :error="$error" :success="$success" :helper="$helper" />
    </div>

@elseif($variant === 'currency')
    {{-- Currency Input --}}
    <div {{ $attributes->only(['class', 'wire:key']) }}>
        @if($label)
            <x-ui::form.label :for="$id" :required="$required">
                {{ $label }}
            </x-form.label>
        @endif

        <div class="relative">
            @if($currencyPosition === 'left')
                <div class="absolute inset-y-0 start-0 top-0 flex items-center ps-3.5 pointer-events-none">
                    <span class="text-gray-500 dark:text-gray-400">{{ $currencySymbol }}</span>
                </div>
            @endif

            <input
                type="number"
                id="{{ $id }}"
                name="{{ $name }}"
                value="{{ $value }}"
                placeholder="{{ $placeholder }}"
                {{ $disabled ? 'disabled' : '' }}
                {{ $required ? 'required' : '' }}
                @if($min !== null) min="{{ $min }}" @endif
                @if($max !== null) max="{{ $max }}" @endif
                step="{{ $step }}"
                {{ $attributes->except(['class', 'wire:key'])->merge(['class' => $inputClasses]) }}
            >

            @if($currencyPosition === 'right')
                <div class="absolute inset-y-0 end-0 top-0 flex items-center pe-3.5 pointer-events-none">
                    <span class="text-gray-500 dark:text-gray-400">{{ $currencySymbol }}</span>
                </div>
            @endif
        </div>

        <x-ui::form.validation-message :error="$error" :success="$success" :helper="$helper" />
    </div>

@elseif($variant === 'phone')
    {{-- Phone Number Input --}}
    <div {{ $attributes->only(['class', 'wire:key']) }}>
        @if($label)
            <x-ui::form.label :for="$id" :required="$required">
                {{ $label }}
            </x-form.label>
        @endif

        <div class="relative">
            <div class="absolute inset-y-0 start-0 top-0 flex items-center ps-3.5 pointer-events-none">
                @if($countryFlag)
                    <span class="me-1">{{ $countryFlag }}</span>
                @endif
                <span class="text-gray-500 dark:text-gray-400 text-sm">{{ $countryCode }}</span>
            </div>

            <input
                type="tel"
                id="{{ $id }}"
                name="{{ $name }}"
                value="{{ $value }}"
                placeholder="{{ $placeholder }}"
                {{ $disabled ? 'disabled' : '' }}
                {{ $required ? 'required' : '' }}
                {{ $attributes->except(['class', 'wire:key'])->merge(['class' => $inputClasses]) }}
            >
        </div>

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

        <input
            type="number"
            id="{{ $id }}"
            name="{{ $name }}"
            value="{{ $value }}"
            placeholder="{{ $placeholder }}"
            {{ $disabled ? 'disabled' : '' }}
            {{ $required ? 'required' : '' }}
            @if($min !== null) min="{{ $min }}" @endif
            @if($max !== null) max="{{ $max }}" @endif
            step="{{ $step }}"
            {{ $attributes->except(['class', 'wire:key'])->merge(['class' => $inputClasses]) }}
        >

        <x-ui::form.validation-message :error="$error" :success="$success" :helper="$helper" />
    </div>
@endif