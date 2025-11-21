{{-- Default Copy to Clipboard with Input and Button --}}
@props([
    'label' => null,
    'value' => '',
    'placeholder' => 'Enter text...',
    'buttonText' => 'Copy',
    'copiedText' => 'Copied!',
    'timeout' => 2000, // Time to show "copied" state in ms
    'inputSize' => 'base', // sm, base, lg
    'buttonSize' => 'md', // xs, sm, md, lg, xl
])

@php
    $targetId = 'clipboard-' . uniqid();
    $buttonId = 'clipboard-button-' . uniqid();
    $defaultIconId = 'default-icon-' . uniqid();
    $successIconId = 'success-icon-' . uniqid();
    $defaultMessageId = 'default-message-' . uniqid();
    $successMessageId = 'success-message-' . uniqid();
@endphp

<div {{ $attributes->only(['class', 'wire:key']) }}>
    <div class="flex items-center gap-x-3">
        <x-ui.form.input
            :id="$targetId"
            :label="$label"
            :value="$value"
            :placeholder="$placeholder"
            :size="$inputSize"
            readonly
            class="flex-1"
        />

        <x-ui.button
            :id="$buttonId"
            :size="$buttonSize"
            data-copy-to-clipboard-target="{{ $targetId }}"
            type="button"
            class="{{ $label ? 'mt-7' : '' }}"
        >
            <span :id="$defaultIconId">
                <svg class="w-3.5 h-3.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 20">
                    <path d="M16 1h-3.278A1.992 1.992 0 0 0 11 0H7a1.993 1.993 0 0 0-1.722 1H2a2 2 0 0 0-2 2v15a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V3a2 2 0 0 0-2-2Zm-3 14H5a1 1 0 0 1 0-2h8a1 1 0 0 1 0 2Zm0-4H5a1 1 0 0 1 0-2h8a1 1 0 1 1 0 2Zm0-5H5a1 1 0 0 1 0-2h2V2h4v2h2a1 1 0 1 1 0 2Z"/>
                </svg>
            </span>
            <span :id="$successIconId" class="hidden inline-flex">
                <svg class="w-3.5 h-3.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 16 12">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5.917 5.724 10.5 15 1.5"/>
                </svg>
            </span>
            <span :id="$defaultMessageId">{{ $buttonText }}</span>
            <span :id="$successMessageId" class="hidden">{{ $copiedText }}</span>
        </x-ui.button>
    </div>
</div>

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const button = document.getElementById('{{ $buttonId }}');
        const input = document.getElementById('{{ $targetId }}');
        const defaultIcon = document.getElementById('{{ $defaultIconId }}');
        const successIcon = document.getElementById('{{ $successIconId }}');
        const defaultMessage = document.getElementById('{{ $defaultMessageId }}');
        const successMessage = document.getElementById('{{ $successMessageId }}');

        if (button && input) {
            button.addEventListener('click', function() {
                // Copy text to clipboard
                navigator.clipboard.writeText(input.value).then(function() {
                    // Show success state
                    defaultIcon.classList.add('hidden');
                    successIcon.classList.remove('hidden');
                    defaultMessage.classList.add('hidden');
                    successMessage.classList.remove('hidden');

                    // Reset after timeout
                    setTimeout(function() {
                        defaultIcon.classList.remove('hidden');
                        successIcon.classList.add('hidden');
                        defaultMessage.classList.remove('hidden');
                        successMessage.classList.add('hidden');
                    }, {{ $timeout }});
                });
            });
        }
    });
</script>
@endpush