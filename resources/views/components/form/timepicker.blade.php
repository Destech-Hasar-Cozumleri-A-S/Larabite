@props([
    'label' => null,
    'name' => 'time',
    'placeholder' => null,
    'value' => null,
    'size' => 'base', // sm, base, lg
    'required' => false,
    'disabled' => false,
    'error' => null,
    'success' => null,
    'helper' => null,
    'variant' => 'default', // default, icon, dropdown, select, range, inline
    'min' => null, // Min time (e.g., "09:00")
    'max' => null, // Max time (e.g., "18:00")
    'step' => null, // Step in seconds (e.g., 900 for 15 minutes)
    // Range variant props
    'startName' => 'start_time',
    'endName' => 'end_time',
    'startLabel' => 'Start time',
    'endLabel' => 'End time',
    'startValue' => null,
    'endValue' => null,
    // Dropdown variant props
    'dropdownItems' => [], // Array of duration options
    'dropdownLabel' => 'Duration',
    'dropdownName' => 'duration',
    // Select variant props
    'timezones' => [],
    'timezoneLabel' => 'Timezone',
    'timezoneName' => 'timezone',
    'selectedTimezone' => null,
    // Inline variant props
    'intervals' => [], // Array of time intervals ['30 min', '1 hour', '2 hours']
    'intervalLabel' => 'Interval',
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

    $id = $name ?? 'timepicker-' . uniqid();
    $dropdownId = $id . '-dropdown';

    // Default durations if not provided
    if (empty($dropdownItems)) {
        $dropdownItems = [
            ['value' => '30', 'label' => '30 minutes'],
            ['value' => '60', 'label' => '1 hour'],
            ['value' => '120', 'label' => '2 hours'],
            ['value' => '180', 'label' => '3 hours'],
        ];
    }

    // Default timezones if not provided
    if (empty($timezones)) {
        $timezones = [
            ['value' => 'UTC', 'label' => 'UTC (GMT +0:00)'],
            ['value' => 'PST', 'label' => 'PST (GMT -8:00)'],
            ['value' => 'EST', 'label' => 'EST (GMT -5:00)'],
            ['value' => 'CET', 'label' => 'CET (GMT +1:00)'],
            ['value' => 'JST', 'label' => 'JST (GMT +9:00)'],
        ];
    }

    // Default intervals if not provided
    if (empty($intervals)) {
        $intervals = ['30 min', '1 hour', '2 hours'];
    }
@endphp

@if($variant === 'default')
    {{-- Default Timepicker --}}
    <div {{ $attributes->only(['class', 'wire:key']) }}>
        @if($label)
            <label for="{{ $id }}" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                {{ $label }}
                @if($required)
                    <span class="text-red-500">*</span>
                @endif
            </label>
        @endif

        <input
            type="time"
            id="{{ $id }}"
            name="{{ $name }}"
            value="{{ $value }}"
            {{ $disabled ? 'disabled' : '' }}
            {{ $required ? 'required' : '' }}
            @if($min) min="{{ $min }}" @endif
            @if($max) max="{{ $max }}" @endif
            @if($step) step="{{ $step }}" @endif
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
            <p class="mt-2 text-sm text-gray-500 dark:text-gray-400">
                {{ $helper }}
            </p>
        @endif
    </div>

@elseif($variant === 'icon')
    {{-- Timepicker with Icon --}}
    <div {{ $attributes->only(['class', 'wire:key']) }}>
        @if($label)
            <x-form.label :for="$id" :required="$required">
                {{ $label }}
            </x-form.label>
        @endif

        <div class="relative">
            <div class="absolute inset-y-0 end-0 top-0 flex items-center pe-3.5 pointer-events-none">
                <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                    <path fill-rule="evenodd" d="M2 12C2 6.477 6.477 2 12 2s10 4.477 10 10-4.477 10-10 10S2 17.523 2 12Zm11-4a1 1 0 1 0-2 0v4a1 1 0 0 0 .293.707l3 3a1 1 0 0 0 1.414-1.414L13 11.586V8Z" clip-rule="evenodd"/>
                </svg>
            </div>
            <input
                type="time"
                id="{{ $id }}"
                name="{{ $name }}"
                value="{{ $value }}"
                {{ $disabled ? 'disabled' : '' }}
                {{ $required ? 'required' : '' }}
                @if($min) min="{{ $min }}" @endif
                @if($max) max="{{ $max }}" @endif
                @if($step) step="{{ $step }}" @endif
                {{ $attributes->except(['class', 'wire:key'])->merge(['class' => $inputClasses]) }}
            >
        </div>

        <x-form.validation-message :error="$error" :success="$success" :helper="$helper" />
    </div>

@elseif($variant === 'dropdown')
    {{-- Timepicker with Dropdown --}}
    <div {{ $attributes->only(['class', 'wire:key']) }}>
        @if($label)
            <x-form.label :for="$id" :required="$required">
                {{ $label }}
            </x-form.label>
        @endif

        <div class="flex gap-2">
            <div class="relative flex-1">
                <div class="absolute inset-y-0 end-0 top-0 flex items-center pe-3.5 pointer-events-none">
                    <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                        <path fill-rule="evenodd" d="M2 12C2 6.477 6.477 2 12 2s10 4.477 10 10-4.477 10-10 10S2 17.523 2 12Zm11-4a1 1 0 1 0-2 0v4a1 1 0 0 0 .293.707l3 3a1 1 0 0 0 1.414-1.414L13 11.586V8Z" clip-rule="evenodd"/>
                    </svg>
                </div>
                <input
                    type="time"
                    id="{{ $id }}"
                    name="{{ $name }}"
                    value="{{ $value }}"
                    {{ $disabled ? 'disabled' : '' }}
                    {{ $required ? 'required' : '' }}
                    @if($min) min="{{ $min }}" @endif
                    @if($max) max="{{ $max }}" @endif
                    @if($step) step="{{ $step }}" @endif
                    {{ $attributes->except(['class', 'wire:key'])->merge(['class' => $inputClasses]) }}
                >
            </div>

            <button
                id="{{ $dropdownId }}-button"
                data-dropdown-toggle="{{ $dropdownId }}"
                class="flex-shrink-0 inline-flex items-center py-2.5 px-4 text-sm font-medium text-center text-gray-900 bg-gray-100 border border-gray-300 rounded-lg hover:bg-gray-200 focus:ring-4 focus:outline-none focus:ring-gray-100 dark:bg-gray-700 dark:hover:bg-gray-600 dark:focus:ring-gray-700 dark:text-white dark:border-gray-600"
                type="button"
            >
                {{ $dropdownLabel }}
                <svg class="w-2.5 h-2.5 ms-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                </svg>
            </button>

            <div id="{{ $dropdownId }}" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
                <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="{{ $dropdownId }}-button">
                    @foreach($dropdownItems as $item)
                        <li>
                            <button type="button" class="inline-flex w-full px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white" data-duration="{{ $item['value'] }}">
                                {{ $item['label'] }}
                            </button>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>

        <x-form.validation-message :error="$error" :success="$success" :helper="$helper" />
    </div>

@elseif($variant === 'select')
    {{-- Timepicker with Timezone Select --}}
    <div {{ $attributes->only(['class', 'wire:key']) }}>
        @if($label)
            <x-form.label :for="$id" :required="$required">
                {{ $label }}
            </x-form.label>
        @endif

        <div class="flex gap-2">
            <div class="relative flex-1">
                <div class="absolute inset-y-0 end-0 top-0 flex items-center pe-3.5 pointer-events-none">
                    <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                        <path fill-rule="evenodd" d="M2 12C2 6.477 6.477 2 12 2s10 4.477 10 10-4.477 10-10 10S2 17.523 2 12Zm11-4a1 1 0 1 0-2 0v4a1 1 0 0 0 .293.707l3 3a1 1 0 0 0 1.414-1.414L13 11.586V8Z" clip-rule="evenodd"/>
                    </svg>
                </div>
                <input
                    type="time"
                    id="{{ $id }}"
                    name="{{ $name }}"
                    value="{{ $value }}"
                    {{ $disabled ? 'disabled' : '' }}
                    {{ $required ? 'required' : '' }}
                    @if($min) min="{{ $min }}" @endif
                    @if($max) max="{{ $max }}" @endif
                    @if($step) step="{{ $step }}" @endif
                    {{ $attributes->except(['class', 'wire:key'])->merge(['class' => $inputClasses]) }}
                >
            </div>

            <select
                name="{{ $timezoneName }}"
                class="flex-shrink-0 inline-flex items-center py-2.5 px-4 text-sm font-medium text-center text-gray-900 bg-gray-100 border border-gray-300 rounded-lg hover:bg-gray-200 focus:ring-4 focus:outline-none focus:ring-gray-100 dark:bg-gray-700 dark:hover:bg-gray-600 dark:focus:ring-gray-700 dark:text-white dark:border-gray-600"
            >
                @foreach($timezones as $timezone)
                    <option value="{{ $timezone['value'] }}" {{ $selectedTimezone === $timezone['value'] ? 'selected' : '' }}>
                        {{ $timezone['label'] }}
                    </option>
                @endforeach
            </select>
        </div>

        <x-form.validation-message :error="$error" :success="$success" :helper="$helper" />
    </div>

@elseif($variant === 'range')
    {{-- Time Range Picker --}}
    <div {{ $attributes->only(['class', 'wire:key']) }}>
        @if($label)
            <div class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                {{ $label }}
                @if($required)
                    <span class="text-red-500">*</span>
                @endif
            </div>
        @endif

        <div class="flex items-center gap-2">
            <div class="relative flex-1">
                <label for="{{ $id }}-start" class="sr-only">{{ $startLabel }}</label>
                <div class="absolute inset-y-0 end-0 top-0 flex items-center pe-3.5 pointer-events-none">
                    <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                        <path fill-rule="evenodd" d="M2 12C2 6.477 6.477 2 12 2s10 4.477 10 10-4.477 10-10 10S2 17.523 2 12Zm11-4a1 1 0 1 0-2 0v4a1 1 0 0 0 .293.707l3 3a1 1 0 0 0 1.414-1.414L13 11.586V8Z" clip-rule="evenodd"/>
                    </svg>
                </div>
                <input
                    type="time"
                    id="{{ $id }}-start"
                    name="{{ $startName }}"
                    value="{{ $startValue }}"
                    {{ $disabled ? 'disabled' : '' }}
                    {{ $required ? 'required' : '' }}
                    @if($min) min="{{ $min }}" @endif
                    @if($max) max="{{ $max }}" @endif
                    @if($step) step="{{ $step }}" @endif
                    placeholder="{{ $startLabel }}"
                    {{ $attributes->except(['class', 'wire:key'])->merge(['class' => $inputClasses]) }}
                >
            </div>

            <span class="text-gray-500 dark:text-gray-400">to</span>

            <div class="relative flex-1">
                <label for="{{ $id }}-end" class="sr-only">{{ $endLabel }}</label>
                <div class="absolute inset-y-0 end-0 top-0 flex items-center pe-3.5 pointer-events-none">
                    <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                        <path fill-rule="evenodd" d="M2 12C2 6.477 6.477 2 12 2s10 4.477 10 10-4.477 10-10 10S2 17.523 2 12Zm11-4a1 1 0 1 0-2 0v4a1 1 0 0 0 .293.707l3 3a1 1 0 0 0 1.414-1.414L13 11.586V8Z" clip-rule="evenodd"/>
                    </svg>
                </div>
                <input
                    type="time"
                    id="{{ $id }}-end"
                    name="{{ $endName }}"
                    value="{{ $endValue }}"
                    {{ $disabled ? 'disabled' : '' }}
                    {{ $required ? 'required' : '' }}
                    @if($min) min="{{ $min }}" @endif
                    @if($max) max="{{ $max }}" @endif
                    @if($step) step="{{ $step }}" @endif
                    placeholder="{{ $endLabel }}"
                    {{ $attributes->except(['class', 'wire:key'])->merge(['class' => $inputClasses]) }}
                >
            </div>
        </div>

        <x-form.validation-message :error="$error" :success="$success" :helper="$helper" />
    </div>

@elseif($variant === 'inline')
    {{-- Inline Timepicker with Interval Buttons --}}
    <div {{ $attributes->only(['class', 'wire:key']) }}>
        @if($label)
            <div class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                {{ $label }}
                @if($required)
                    <span class="text-red-500">*</span>
                @endif
            </div>
        @endif

        <div class="space-y-3">
            <div class="relative">
                <div class="absolute inset-y-0 end-0 top-0 flex items-center pe-3.5 pointer-events-none">
                    <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                        <path fill-rule="evenodd" d="M2 12C2 6.477 6.477 2 12 2s10 4.477 10 10-4.477 10-10 10S2 17.523 2 12Zm11-4a1 1 0 1 0-2 0v4a1 1 0 0 0 .293.707l3 3a1 1 0 0 0 1.414-1.414L13 11.586V8Z" clip-rule="evenodd"/>
                    </svg>
                </div>
                <input
                    type="time"
                    id="{{ $id }}"
                    name="{{ $name }}"
                    value="{{ $value }}"
                    {{ $disabled ? 'disabled' : '' }}
                    {{ $required ? 'required' : '' }}
                    @if($min) min="{{ $min }}" @endif
                    @if($max) max="{{ $max }}" @endif
                    @if($step) step="{{ $step }}" @endif
                    {{ $attributes->except(['class', 'wire:key'])->merge(['class' => $inputClasses]) }}
                >
            </div>

            @if(!empty($intervals))
                <div>
                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ $intervalLabel }}</label>
                    <div class="flex flex-wrap gap-2">
                        @foreach($intervals as $index => $interval)
                            <div class="flex items-center">
                                <input
                                    id="interval-{{ $id }}-{{ $index }}"
                                    type="checkbox"
                                    value="{{ $interval }}"
                                    name="intervals[]"
                                    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"
                                >
                                <label for="interval-{{ $id }}-{{ $index }}" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                                    {{ $interval }}
                                </label>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif
        </div>

        <x-form.validation-message :error="$error" :success="$success" :helper="$helper" />
    </div>

@else
    {{-- Fallback to default --}}
    <div {{ $attributes->only(['class', 'wire:key']) }}>
        @if($label)
            <x-form.label :for="$id" :required="$required">
                {{ $label }}
            </x-form.label>
        @endif

        <input
            type="time"
            id="{{ $id }}"
            name="{{ $name }}"
            value="{{ $value }}"
            {{ $disabled ? 'disabled' : '' }}
            {{ $required ? 'required' : '' }}
            @if($min) min="{{ $min }}" @endif
            @if($max) max="{{ $max }}" @endif
            @if($step) step="{{ $step }}" @endif
            {{ $attributes->except(['class', 'wire:key'])->merge(['class' => $inputClasses]) }}
        >

        <x-form.validation-message :error="$error" :success="$success" :helper="$helper" />
    </div>
@endif