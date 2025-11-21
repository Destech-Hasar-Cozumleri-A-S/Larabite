{{-- Toast Component --}}
@props([
    'id' => null,
    'type' => 'default', // default, success, warning, error, info
    'position' => 'top-right', // top-left, top-right, bottom-left, bottom-right
    'dismissible' => true,
    'autoDismiss' => true,
    'duration' => 5000, // milliseconds
    'icon' => null,
])

@php
    $toastId = $id ?? 'toast-' . uniqid();

    // Position classes
    $positions = [
        'top-left' => 'top-5 start-5',
        'top-right' => 'top-5 end-5',
        'bottom-left' => 'bottom-5 start-5',
        'bottom-right' => 'bottom-5 end-5',
    ];

    $positionClass = $positions[$position] ?? $positions['top-right'];

    // Type-based styling
    $typeClasses = [
        'default' => 'text-gray-500 bg-white dark:text-gray-400 dark:bg-gray-800',
        'success' => 'text-green-500 bg-white dark:text-green-400 dark:bg-gray-800',
        'warning' => 'text-yellow-500 bg-white dark:text-yellow-400 dark:bg-gray-800',
        'error' => 'text-red-500 bg-white dark:text-red-400 dark:bg-gray-800',
        'info' => 'text-blue-500 bg-white dark:text-blue-400 dark:bg-gray-800',
    ];

    $typeClass = $typeClasses[$type] ?? $typeClasses['default'];

    // Type-based icons
    $typeIcons = [
        'success' => '<svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20"><path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z"/></svg>',
        'error' => '<svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20"><path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 11.793a1 1 0 1 1-1.414 1.414L10 11.414l-2.293 2.293a1 1 0 0 1-1.414-1.414L8.586 10 6.293 7.707a1 1 0 0 1 1.414-1.414L10 8.586l2.293-2.293a1 1 0 0 1 1.414 1.414L11.414 10l2.293 2.293Z"/></svg>',
        'warning' => '<svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20"><path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM10 15a1 1 0 1 1 0-2 1 1 0 0 1 0 2Zm1-4a1 1 0 0 1-2 0V6a1 1 0 0 1 2 0v5Z"/></svg>',
        'info' => '<svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20"><path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/></svg>',
        'default' => '<svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20"><path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/></svg>',
    ];

    $defaultIcon = $typeIcons[$type] ?? $typeIcons['default'];
@endphp

<div
    id="{{ $toastId }}"
    x-data="{
        show: true,
        init() {
            @if($autoDismiss)
                setTimeout(() => {
                    this.show = false;
                    setTimeout(() => {
                        this.$el.remove();
                    }, 300);
                }, {{ $duration }});
            @endif
        },
        dismiss() {
            this.show = false;
            setTimeout(() => {
                this.$el.remove();
            }, 300);
        }
    }"
    x-show="show"
    x-transition:enter="transition ease-out duration-300"
    x-transition:enter-start="opacity-0 transform scale-90"
    x-transition:enter-end="opacity-100 transform scale-100"
    x-transition:leave="transition ease-in duration-300"
    x-transition:leave-start="opacity-100 transform scale-100"
    x-transition:leave-end="opacity-0 transform scale-90"
    {{ $attributes->merge(['class' => "fixed {$positionClass} flex items-center w-full max-w-xs p-4 mb-4 {$typeClass} rounded-lg shadow dark:divide-gray-700 z-50", 'role' => 'alert']) }}
>
    {{-- Icon --}}
    <div class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 rounded-lg">
        @if($icon)
            {!! $icon !!}
        @else
            {!! $defaultIcon !!}
        @endif
    </div>

    {{-- Content --}}
    <div class="ms-3 text-sm font-normal flex-1">
        {{ $slot }}
    </div>

    {{-- Close Button --}}
    @if($dismissible)
        <button
            type="button"
            @click="dismiss()"
            class="ms-auto -mx-1.5 -my-1.5 bg-white text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex items-center justify-center h-8 w-8 dark:text-gray-500 dark:hover:text-white dark:bg-gray-800 dark:hover:bg-gray-700"
            aria-label="Close"
        >
            <span class="sr-only">Close</span>
            <x-icon.close />
        </button>
    @endif
</div>