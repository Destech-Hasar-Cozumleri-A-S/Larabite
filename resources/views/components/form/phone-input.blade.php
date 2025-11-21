@props([
    'label' => null,
    'name' => 'phone',
    'placeholder' => null,
    'value' => null,
    'size' => 'base', // sm, base, lg
    'required' => false,
    'error' => null,
    'success' => null,
    'helper' => null,
    'disabled' => false,
    'variant' => 'default', // default, dropdown, floating
    // Country dropdown options
    'countries' => null, // Array of countries with code, name, flag
    'selectedCountry' => null,
    'showCountryDropdown' => true,
    'pattern' => null, // Phone validation pattern
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

    $id = $name ?? 'phone-input-' . uniqid();
    $dropdownId = $id . '-dropdown';

    // Default countries if not provided
    if (!$countries) {
        $countries = [
            ['code' => '+90', 'name' => 'Turkey', 'flag' => '🇹🇷', 'iso' => 'TR'],
            ['code' => '+1', 'name' => 'United States', 'flag' => '🇺🇸', 'iso' => 'US'],
            ['code' => '+44', 'name' => 'United Kingdom', 'flag' => '🇬🇧', 'iso' => 'GB'],
            ['code' => '+33', 'name' => 'France', 'flag' => '🇫🇷', 'iso' => 'FR'],
            ['code' => '+49', 'name' => 'Germany', 'flag' => '🇩🇪', 'iso' => 'DE'],
            ['code' => '+61', 'name' => 'Australia', 'flag' => '🇦🇺', 'iso' => 'AU'],
        ];
    }

    // Default selected country
    if (!$selectedCountry) {
        $selectedCountry = $countries[0];
    }
@endphp

@if($variant === 'default')
    {{-- Default Phone Input with Icon --}}
    <div {{ $attributes->only(['class', 'wire:key']) }}>
        @if($label)
            <x-ui::form.label :for="$id" :required="$required">
                {{ $label }}
            </x-form.label>
        @endif

        <div class="relative">
            <div class="absolute inset-y-0 start-0 top-0 flex items-center ps-3.5 pointer-events-none">
                <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 19 18">
                    <path d="M18 13.446a3.02 3.02 0 0 0-.946-1.985l-1.4-1.4a3.054 3.054 0 0 0-4.218 0l-.7.7a.983.983 0 0 1-1.39 0l-2.1-2.1a.983.983 0 0 1 0-1.389l.7-.7a2.98 2.98 0 0 0 0-4.217l-1.4-1.4a2.824 2.824 0 0 0-4.218 0c-3.619 3.619-3 8.229 1.752 12.979C6.785 16.639 9.45 18 11.912 18a7.175 7.175 0 0 0 5.139-2.325A2.9 2.9 0 0 0 18 13.446Z"/>
                </svg>
            </div>

            <input
                type="tel"
                id="{{ $id }}"
                name="{{ $name }}"
                value="{{ $value }}"
                placeholder="{{ $placeholder }}"
                {{ $disabled ? 'disabled' : '' }}
                {{ $required ? 'required' : '' }}
                @if($pattern) pattern="{{ $pattern }}" @endif
                {{ $attributes->except(['class', 'wire:key'])->merge(['class' => $inputClasses . ' ps-10']) }}
            >
        </div>

        <x-ui::form.validation-message :error="$error" :success="$success" :helper="$helper" />
    </div>

@elseif($variant === 'dropdown')
    {{-- Phone Input with Country Dropdown --}}
    <div {{ $attributes->only(['class', 'wire:key']) }}>
        @if($label)
            <x-ui::form.label :for="$id" :required="$required">
                {{ $label }}
            </x-form.label>
        @endif

        <div class="flex">
            @if($showCountryDropdown)
                <button
                    id="{{ $dropdownId }}-button"
                    data-dropdown-toggle="{{ $dropdownId }}"
                    class="flex-shrink-0 z-10 inline-flex items-center py-2.5 px-4 text-sm font-medium text-center text-gray-900 bg-gray-100 border border-gray-300 rounded-s-lg hover:bg-gray-200 focus:ring-4 focus:outline-none focus:ring-gray-100 dark:bg-gray-700 dark:hover:bg-gray-600 dark:focus:ring-gray-700 dark:text-white dark:border-gray-600"
                    type="button"
                >
                    <span class="me-2">{{ $selectedCountry['flag'] }}</span>
                    {{ $selectedCountry['code'] }}
                    <svg class="w-2.5 h-2.5 ms-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                    </svg>
                </button>

                <div id="{{ $dropdownId }}" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-52 dark:bg-gray-700">
                    <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="{{ $dropdownId }}-button">
                        @foreach($countries as $country)
                            <li>
                                <button type="button" class="inline-flex w-full px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-200 dark:hover:bg-gray-600 dark:hover:text-white" role="menuitem">
                                    <span class="inline-flex items-center">
                                        <span class="me-2">{{ $country['flag'] }}</span>
                                        {{ $country['name'] }} ({{ $country['code'] }})
                                    </span>
                                </button>
                            </li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="relative w-full">
                <input
                    type="tel"
                    id="{{ $id }}"
                    name="{{ $name }}"
                    value="{{ $value }}"
                    placeholder="{{ $placeholder }}"
                    {{ $disabled ? 'disabled' : '' }}
                    {{ $required ? 'required' : '' }}
                    @if($pattern) pattern="{{ $pattern }}" @endif
                    {{ $attributes->except(['class', 'wire:key'])->merge(['class' => $inputClasses . ($showCountryDropdown ? ' rounded-s-none rounded-e-lg' : '')]) }}
                >
            </div>
        </div>

        <x-ui::form.validation-message :error="$error" :success="$success" :helper="$helper" />
    </div>

@elseif($variant === 'floating')
    {{-- Floating Label Phone Input --}}
    <div class="relative" {{ $attributes->only(['class', 'wire:key']) }}>
        <input
            type="tel"
            id="{{ $id }}"
            name="{{ $name }}"
            value="{{ $value }}"
            placeholder=" "
            {{ $disabled ? 'disabled' : '' }}
            {{ $required ? 'required' : '' }}
            @if($pattern) pattern="{{ $pattern }}" @endif
            {{ $attributes->except(['class', 'wire:key'])->merge(['class' => 'block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer']) }}
        >

        @if($label)
            <label for="{{ $id }}" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white dark:bg-gray-900 px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1">
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

        <input
            type="tel"
            id="{{ $id }}"
            name="{{ $name }}"
            value="{{ $value }}"
            placeholder="{{ $placeholder }}"
            {{ $disabled ? 'disabled' : '' }}
            {{ $required ? 'required' : '' }}
            @if($pattern) pattern="{{ $pattern }}" @endif
            {{ $attributes->except(['class', 'wire:key'])->merge(['class' => $inputClasses]) }}
        >

        <x-ui::form.validation-message :error="$error" :success="$success" :helper="$helper" />
    </div>
@endif