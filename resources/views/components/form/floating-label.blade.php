@props([
    'label' => null,
    'name' => null,
    'type' => 'text', // text, email, password, number, tel, url, date, time, etc.
    'placeholder' => ' ', // Space for peer detection
    'value' => null,
    'size' => 'base', // base, sm
    'variant' => 'outlined', // filled, outlined, standard
    'disabled' => false,
    'required' => false,
    'error' => null,
    'success' => null,
    'helper' => null,
    'icon' => null,
])

@php
    // Base input classes
    $baseClasses = 'block w-full appearance-none focus:outline-none focus:ring-0 peer';

    // Size classes
    $sizeClasses = [
        'sm' => [
            'input' => 'pt-4 pb-1.5 px-2.5 text-sm',
            'label' => 'top-2',
            'translate' => '-translate-y-3',
        ],
        'base' => [
            'input' => 'pt-5 pb-2.5 px-2.5 text-sm',
            'label' => 'top-2',
            'translate' => '-translate-y-4',
        ],
    ];

    // Variant classes
    if ($variant === 'filled') {
        // Filled variant
        if ($disabled) {
            $inputClasses = $baseClasses . ' ' . $sizeClasses[$size]['input'] . ' bg-gray-100 border-0 border-b-2 border-gray-300 text-gray-400 cursor-not-allowed dark:bg-gray-700 dark:border-gray-600 dark:text-gray-500 rounded-t-lg';
        } elseif ($error) {
            $inputClasses = $baseClasses . ' ' . $sizeClasses[$size]['input'] . ' bg-red-50 border-0 border-b-2 border-red-600 text-gray-900 rounded-t-lg focus:border-red-600 dark:bg-red-100 dark:border-red-400';
        } elseif ($success) {
            $inputClasses = $baseClasses . ' ' . $sizeClasses[$size]['input'] . ' bg-green-50 border-0 border-b-2 border-green-600 text-gray-900 rounded-t-lg focus:border-green-600 dark:bg-green-100 dark:border-green-400';
        } else {
            $inputClasses = $baseClasses . ' ' . $sizeClasses[$size]['input'] . ' bg-gray-50 border-0 border-b-2 border-gray-300 text-gray-900 rounded-t-lg focus:border-blue-600 dark:bg-gray-700 dark:border-gray-600 dark:text-white';
        }

        $labelClasses = 'absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform ' . $sizeClasses[$size]['translate'] . ' scale-75 ' . $sizeClasses[$size]['label'] . ' z-10 origin-[0] start-2.5 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:' . $sizeClasses[$size]['translate'] . ' rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto';

    } elseif ($variant === 'outlined') {
        // Outlined variant
        if ($disabled) {
            $inputClasses = $baseClasses . ' ' . $sizeClasses[$size]['input'] . ' bg-transparent border border-gray-300 text-gray-400 cursor-not-allowed dark:border-gray-600 dark:text-gray-500 rounded-lg';
        } elseif ($error) {
            $inputClasses = $baseClasses . ' ' . $sizeClasses[$size]['input'] . ' bg-transparent border border-red-600 text-gray-900 rounded-lg focus:border-red-600 dark:border-red-400';
        } elseif ($success) {
            $inputClasses = $baseClasses . ' ' . $sizeClasses[$size]['input'] . ' bg-transparent border border-green-600 text-gray-900 rounded-lg focus:border-green-600 dark:border-green-400';
        } else {
            $inputClasses = $baseClasses . ' ' . $sizeClasses[$size]['input'] . ' bg-transparent border border-gray-300 text-gray-900 rounded-lg focus:border-blue-600 dark:border-gray-600 dark:text-white dark:focus:border-blue-500';
        }

        $labelClasses = 'absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform ' . $sizeClasses[$size]['translate'] . ' scale-75 ' . $sizeClasses[$size]['label'] . ' z-10 origin-[0] bg-white dark:bg-gray-900 px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:' . $sizeClasses[$size]['translate'] . ' rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1';

    } else {
        // Standard variant (bottom border only)
        if ($disabled) {
            $inputClasses = $baseClasses . ' ' . $sizeClasses[$size]['input'] . ' bg-transparent border-0 border-b-2 border-gray-300 text-gray-400 cursor-not-allowed dark:border-gray-600 dark:text-gray-500';
        } elseif ($error) {
            $inputClasses = $baseClasses . ' ' . $sizeClasses[$size]['input'] . ' bg-transparent border-0 border-b-2 border-red-600 text-gray-900 focus:border-red-600 dark:border-red-400';
        } elseif ($success) {
            $inputClasses = $baseClasses . ' ' . $sizeClasses[$size]['input'] . ' bg-transparent border-0 border-b-2 border-green-600 text-gray-900 focus:border-green-600 dark:border-green-400';
        } else {
            $inputClasses = $baseClasses . ' ' . $sizeClasses[$size]['input'] . ' bg-transparent border-0 border-b-2 border-gray-300 text-gray-900 focus:border-blue-600 dark:border-gray-600 dark:text-white dark:focus:border-blue-500';
        }

        $labelClasses = 'absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform ' . $sizeClasses[$size]['translate'] . ' scale-75 ' . $sizeClasses[$size]['label'] . ' -z-10 origin-[0] peer-focus:start-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:' . $sizeClasses[$size]['translate'] . ' rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto';
    }

    $id = $name ?? 'floating-' . uniqid();
    $helperId = $id . '-helper';
@endphp

<div class="relative" {{ $attributes->only(['class', 'wire:key']) }}>
    <input
        type="{{ $type }}"
        id="{{ $id }}"
        name="{{ $name }}"
        value="{{ $value }}"
        placeholder="{{ $placeholder }}"
        {{ $disabled ? 'disabled' : '' }}
        {{ $required ? 'required' : '' }}
        @if($helper || $error || $success) aria-describedby="{{ $helperId }}" @endif
        class="{{ $inputClasses }}"
        {{ $attributes->except(['class', 'wire:key']) }}
    >

    @if($label)
        <label for="{{ $id }}" class="{{ $labelClasses }}">
            @if($icon)
                <span class="inline-flex items-center">
                    {!! $icon !!}
                    <span class="ml-1">{{ $label }}</span>
                </span>
            @else
                {{ $label }}
                @if($required)
                    <span class="text-red-500">*</span>
                @endif
            @endif
        </label>
    @endif

    @if($error)
        <p id="{{ $helperId }}" class="mt-2 text-sm text-red-600 dark:text-red-500">
            <span class="font-medium">{{ $error }}</span>
        </p>
    @elseif($success)
        <p id="{{ $helperId }}" class="mt-2 text-sm text-green-600 dark:text-green-500">
            <span class="font-medium">{{ $success }}</span>
        </p>
    @elseif($helper)
        <p id="{{ $helperId }}" class="mt-2 text-sm text-gray-500 dark:text-gray-400">
            {{ $helper }}
        </p>
    @endif
</div>