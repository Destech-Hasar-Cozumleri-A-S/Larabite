{{-- Clipboard Code Block --}}
@props([
    'code' => '',
    'language' => 'text',
    'showLineNumbers' => false,
    'copyText' => 'Copy',
    'copiedText' => 'Copied!',
    'timeout' => 2000,
])

@php
    $targetId = 'code-block-' . uniqid();
    $buttonId = 'copy-code-btn-' . uniqid();
    $defaultTextId = 'text-default-' . uniqid();
    $successTextId = 'text-success-' . uniqid();
    $defaultIconId = 'icon-default-' . uniqid();
    $successIconId = 'icon-success-' . uniqid();
@endphp

<div {{ $attributes->merge(['class' => 'relative']) }}>
    <div class="absolute top-2 end-2 z-10">
        <button
            id="{{ $buttonId }}"
            data-copy-to-clipboard-target="{{ $targetId }}"
            data-copy-to-clipboard-content-type="innerHTML"
            data-copy-to-clipboard-html-entities="true"
            class="inline-flex items-center gap-x-1.5 px-2.5 py-1.5 text-xs font-medium text-gray-900 bg-white border border-gray-200 rounded-lg hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-blue-700 dark:bg-gray-800 dark:border-gray-600 dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-700"
            type="button"
        >
            <span id="{{ $defaultIconId }}">
                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 20">
                    <path d="M16 1h-3.278A1.992 1.992 0 0 0 11 0H7a1.993 1.993 0 0 0-1.722 1H2a2 2 0 0 0-2 2v15a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V3a2 2 0 0 0-2-2Zm-3 14H5a1 1 0 0 1 0-2h8a1 1 0 0 1 0 2Zm0-4H5a1 1 0 0 1 0-2h8a1 1 0 1 1 0 2Zm0-5H5a1 1 0 0 1 0-2h2V2h4v2h2a1 1 0 1 1 0 2Z"/>
                </svg>
            </span>
            <span id="{{ $successIconId }}" class="hidden">
                <svg class="w-3 h-3 text-blue-700 dark:text-blue-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 16 12">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5.917 5.724 10.5 15 1.5"/>
                </svg>
            </span>
            <span id="{{ $defaultTextId }}">{{ $copyText }}</span>
            <span id="{{ $successTextId }}" class="hidden">{{ $copiedText }}</span>
        </button>
    </div>

    <div class="overflow-x-auto">
        <pre class="p-4 mb-4 text-sm bg-gray-50 rounded-lg border border-gray-200 dark:bg-gray-800 dark:border-gray-700"><code id="{{ $targetId }}" class="language-{{ $language }} text-gray-900 dark:text-white whitespace-pre">{{ $code ?? $slot }}</code></pre>
    </div>
</div>

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const button = document.getElementById('{{ $buttonId }}');
        const codeBlock = document.getElementById('{{ $targetId }}');
        const defaultIcon = document.getElementById('{{ $defaultIconId }}');
        const successIcon = document.getElementById('{{ $successIconId }}');
        const defaultText = document.getElementById('{{ $defaultTextId }}');
        const successText = document.getElementById('{{ $successTextId }}');

        if (button && codeBlock) {
            button.addEventListener('click', function() {
                // Get the text content (decode HTML entities)
                const text = codeBlock.textContent || codeBlock.innerText;

                // Copy text to clipboard
                navigator.clipboard.writeText(text).then(function() {
                    // Show success state
                    defaultIcon.classList.add('hidden');
                    successIcon.classList.remove('hidden');
                    defaultText.classList.add('hidden');
                    successText.classList.remove('hidden');

                    // Reset after timeout
                    setTimeout(function() {
                        defaultIcon.classList.remove('hidden');
                        successIcon.classList.add('hidden');
                        defaultText.classList.remove('hidden');
                        successText.classList.add('hidden');
                    }, {{ $timeout }});
                }).catch(function(err) {
                    console.error('Failed to copy text: ', err);
                });
            });
        }
    });
</script>
@endpush