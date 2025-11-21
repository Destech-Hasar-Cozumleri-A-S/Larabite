{{-- Clipboard Input with Icon Button --}}
@props([
    'label' => null,
    'value' => '',
    'placeholder' => 'Enter text...',
    'tooltip' => true,
    'tooltipText' => 'Copy to clipboard',
    'copiedTooltipText' => 'Copied!',
    'timeout' => 2000,
    'size' => 'base', // sm, base, lg
    'disabled' => false,
])

@php
    $targetId = 'clipboard-input-' . uniqid();
    $buttonId = 'clipboard-btn-' . uniqid();
    $tooltipId = 'tooltip-' . uniqid();
    $defaultIconId = 'icon-default-' . uniqid();
    $successIconId = 'icon-success-' . uniqid();

    $sizeClasses = [
        'sm' => 'px-2.5 py-2 text-sm pe-10',
        'base' => 'px-3 py-2.5 text-sm pe-10',
        'lg' => 'px-3.5 py-3 text-base pe-12',
    ];

    $buttonSizeClasses = [
        'sm' => 'p-2',
        'base' => 'p-2.5',
        'lg' => 'p-3',
    ];

    $inputClasses = 'block w-full border border-gray-300 bg-gray-50 text-gray-900 rounded-lg focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 ' . $sizeClasses[$size];

    if ($disabled) {
        $inputClasses .= ' cursor-not-allowed opacity-60';
    }
@endphp

<div {{ $attributes->only(['class', 'wire:key']) }}>
    @if($label)
        <label for="{{ $targetId }}" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
            {{ $label }}
        </label>
    @endif

    <div class="relative">
        <input
            id="{{ $targetId }}"
            type="text"
            class="{{ $inputClasses }}"
            value="{{ $value }}"
            placeholder="{{ $placeholder }}"
            {{ $disabled ? 'disabled' : '' }}
            {{ $attributes->except(['class', 'wire:key']) }}
            readonly
        >

        <button
            id="{{ $buttonId }}"
            data-copy-to-clipboard-target="{{ $targetId }}"
            @if($tooltip)
                data-tooltip-target="{{ $tooltipId }}"
            @endif
            class="absolute end-2 inset-y-0 flex items-center text-gray-500 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800 rounded-lg {{ $buttonSizeClasses[$size] }} {{ $disabled ? 'cursor-not-allowed opacity-60' : '' }}"
            type="button"
            {{ $disabled ? 'disabled' : '' }}
        >
            <span id="{{ $defaultIconId }}">
                <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 20">
                    <path d="M16 1h-3.278A1.992 1.992 0 0 0 11 0H7a1.993 1.993 0 0 0-1.722 1H2a2 2 0 0 0-2 2v15a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V3a2 2 0 0 0-2-2Zm-3 14H5a1 1 0 0 1 0-2h8a1 1 0 0 1 0 2Zm0-4H5a1 1 0 0 1 0-2h8a1 1 0 1 1 0 2Zm0-5H5a1 1 0 0 1 0-2h2V2h4v2h2a1 1 0 1 1 0 2Z"/>
                </svg>
            </span>
            <span id="{{ $successIconId }}" class="hidden">
                <svg class="w-4 h-4 text-blue-700 dark:text-blue-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 16 12">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5.917 5.724 10.5 15 1.5"/>
                </svg>
            </span>
        </button>

        @if($tooltip)
            <div id="{{ $tooltipId }}" role="tooltip" class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                <span id="default-tooltip-message">{{ $tooltipText }}</span>
                <span id="success-tooltip-message" class="hidden">{{ $copiedTooltipText }}</span>
                <div class="tooltip-arrow" data-popper-arrow></div>
            </div>
        @endif
    </div>
</div>

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const button = document.getElementById('{{ $buttonId }}');
        const input = document.getElementById('{{ $targetId }}');
        const defaultIcon = document.getElementById('{{ $defaultIconId }}');
        const successIcon = document.getElementById('{{ $successIconId }}');
        @if($tooltip)
        const defaultTooltipMessage = document.getElementById('default-tooltip-message');
        const successTooltipMessage = document.getElementById('success-tooltip-message');
        @endif

        if (button && input && !{{ $disabled ? 'true' : 'false' }}) {
            button.addEventListener('click', function() {
                // Copy text to clipboard
                navigator.clipboard.writeText(input.value).then(function() {
                    // Show success state
                    defaultIcon.classList.add('hidden');
                    successIcon.classList.remove('hidden');

                    @if($tooltip)
                    // Update tooltip
                    defaultTooltipMessage.classList.add('hidden');
                    successTooltipMessage.classList.remove('hidden');
                    @endif

                    // Reset after timeout
                    setTimeout(function() {
                        defaultIcon.classList.remove('hidden');
                        successIcon.classList.add('hidden');

                        @if($tooltip)
                        defaultTooltipMessage.classList.remove('hidden');
                        successTooltipMessage.classList.add('hidden');
                        @endif
                    }, {{ $timeout }});
                });
            });
        }
    });
</script>
@endpush