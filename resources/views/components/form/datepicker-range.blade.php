{{-- Date Range Picker Component --}}
@props([
    'label' => null,
    'startName' => 'start_date',
    'endName' => 'end_date',
    'startValue' => null,
    'endValue' => null,
    'startPlaceholder' => 'Start date',
    'endPlaceholder' => 'End date',
    'size' => 'base', // sm, base, lg
    'disabled' => false,
    'required' => false,
    'error' => null,
    'helper' => null,
    // Datepicker specific props
    'format' => 'mm/dd/yyyy',
    'autohide' => true,
    'buttons' => false,
    'minDate' => null,
    'maxDate' => null,
])

@php
    $containerId = 'date-range-' . uniqid();
    $startId = $startName . '-' . uniqid();
    $endId = $endName . '-' . uniqid();

    $sizeClasses = [
        'sm' => 'px-2.5 py-2 text-sm',
        'base' => 'px-3 py-2.5 text-sm',
        'lg' => 'px-3.5 py-3 text-base',
    ];

    $inputClasses = 'bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 ' . $sizeClasses[$size];

    if ($error) {
        $inputClasses = 'bg-red-50 border border-red-500 text-red-900 placeholder-red-700 rounded-lg focus:ring-red-500 focus:border-red-500 block w-full ps-10 dark:bg-red-100 dark:border-red-400 ' . $sizeClasses[$size];
    }

    if ($disabled) {
        $inputClasses .= ' cursor-not-allowed opacity-60';
    }

    // Build data attributes
    $dataAttributes = [
        'date-rangepicker' => '',
        'datepicker-format' => $format,
    ];

    if ($autohide) {
        $dataAttributes['datepicker-autohide'] = '';
    }

    if ($buttons) {
        $dataAttributes['datepicker-buttons'] = '';
    }

    if ($minDate) {
        $dataAttributes['datepicker-min-date'] = $minDate;
    }

    if ($maxDate) {
        $dataAttributes['datepicker-max-date'] = $maxDate;
    }
@endphp

<div {{ $attributes->only(['class', 'wire:key']) }}>
    @if($label)
        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
            {{ $label }}
            @if($required)
                <span class="text-red-500">*</span>
            @endif
        </label>
    @endif

    <div
        id="{{ $containerId }}"
        @foreach($dataAttributes as $key => $val)
            {{ $key }}="{{ $val }}"
        @endforeach
        class="flex items-center"
    >
        <div class="relative flex-1">
            <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z"/>
                </svg>
            </div>
            <input
                id="{{ $startId }}"
                name="{{ $startName }}"
                type="text"
                class="{{ $inputClasses }}"
                placeholder="{{ $startPlaceholder }}"
                value="{{ $startValue }}"
                {{ $disabled ? 'disabled' : '' }}
                {{ $required ? 'required' : '' }}
            >
        </div>

        <span class="mx-4 text-gray-500 dark:text-gray-400">to</span>

        <div class="relative flex-1">
            <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z"/>
                </svg>
            </div>
            <input
                id="{{ $endId }}"
                name="{{ $endName }}"
                type="text"
                class="{{ $inputClasses }}"
                placeholder="{{ $endPlaceholder }}"
                value="{{ $endValue }}"
                {{ $disabled ? 'disabled' : '' }}
                {{ $required ? 'required' : '' }}
            >
        </div>
    </div>

    <x-ui::form.validation-message :error="$error" :helper="$helper" />
</div>