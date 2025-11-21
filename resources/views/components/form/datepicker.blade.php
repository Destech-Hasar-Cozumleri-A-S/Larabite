{{-- Datepicker Component --}}
@props([
    'label' => null,
    'name' => null,
    'value' => null,
    'placeholder' => 'Select date',
    'size' => 'base', // sm, base, lg
    'disabled' => false,
    'required' => false,
    'error' => null,
    'helper' => null,
    // Datepicker specific props
    'format' => 'mm/dd/yyyy',
    'autohide' => true,
    'autoselect' => false,
    'buttons' => false,
    'title' => null,
    'minDate' => null,
    'maxDate' => null,
    'orientation' => 'bottom',
])

@php
    $id = $name ?? 'datepicker-' . uniqid();

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
        'datepicker' => '',
        'datepicker-format' => $format,
    ];

    if ($autohide) {
        $dataAttributes['datepicker-autohide'] = '';
    }

    if ($autoselect) {
        $dataAttributes['datepicker-autoselect-today'] = '';
    }

    if ($buttons) {
        $dataAttributes['datepicker-buttons'] = '';
    }

    if ($title) {
        $dataAttributes['datepicker-title'] = $title;
    }

    if ($minDate) {
        $dataAttributes['datepicker-min-date'] = $minDate;
    }

    if ($maxDate) {
        $dataAttributes['datepicker-max-date'] = $maxDate;
    }

    if ($orientation) {
        $dataAttributes['datepicker-orientation'] = $orientation;
    }
@endphp

<div {{ $attributes->only(['class', 'wire:key']) }}>
    @if($label)
        <x-form.label :for="$id" :required="$required">
            {{ $label }}
        </x-form.label>
    @endif

    <div class="relative">
        <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
            <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                <path d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z"/>
            </svg>
        </div>
        <input
            id="{{ $id }}"
            name="{{ $name }}"
            type="text"
            class="{{ $inputClasses }}"
            placeholder="{{ $placeholder }}"
            value="{{ $value }}"
            {{ $disabled ? 'disabled' : '' }}
            {{ $required ? 'required' : '' }}
            @foreach($dataAttributes as $key => $val)
                {{ $key }}="{{ $val }}"
            @endforeach
            {{ $attributes->except(['class', 'wire:key']) }}
        >
    </div>

    <x-form.validation-message :error="$error" :helper="$helper" />
</div>