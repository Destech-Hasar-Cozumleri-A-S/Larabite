{{-- Tooltip Component --}}
@props([
    'id' => null,
    'content' => null,
    'placement' => 'top', // top, right, bottom, left
    'trigger' => 'hover', // hover, click
    'style' => 'dark', // dark, light
    'arrow' => true,
    'animation' => true,
    'delay' => 0,
])

@php
    $tooltipId = $id ?? 'tooltip-' . uniqid();

    // Style classes
    $styleClasses = [
        'dark' => 'bg-gray-900 text-white dark:bg-gray-700',
        'light' => 'bg-white text-gray-900 border border-gray-200 dark:border-gray-600 dark:bg-gray-800 dark:text-white',
    ];

    $arrowStyleClasses = [
        'dark' => 'before:border-gray-900 dark:before:border-gray-700',
        'light' => 'before:border-white dark:before:border-gray-800 after:border-gray-200 dark:after:border-gray-600',
    ];

    $styleClass = $styleClasses[$style] ?? $styleClasses['dark'];
    $arrowStyleClass = $arrowStyleClasses[$style] ?? $arrowStyleClasses['dark'];

    // Animation classes
    $animationClass = $animation ? 'transition-opacity duration-300' : '';
@endphp

<div
    x-data="{
        show: false,
        placement: '{{ $placement }}',
        init() {
            @if($trigger === 'hover')
                this.$refs.trigger.addEventListener('mouseenter', () => {
                    @if($delay > 0)
                        setTimeout(() => this.show = true, {{ $delay }});
                    @else
                        this.show = true;
                    @endif
                });
                this.$refs.trigger.addEventListener('mouseleave', () => this.show = false);
            @elseif($trigger === 'click')
                this.$refs.trigger.addEventListener('click', () => this.show = !this.show);
                document.addEventListener('click', (e) => {
                    if (!this.$refs.trigger.contains(e.target) && !this.$refs.tooltip.contains(e.target)) {
                        this.show = false;
                    }
                });
            @endif
        }
    }"
    {{ $attributes->only(['class', 'wire:key']) }}
>
    {{-- Trigger Element --}}
    <div x-ref="trigger" class="inline-flex">
        {{ $slot }}
    </div>

    {{-- Tooltip Content --}}
    <div
        x-ref="tooltip"
        x-show="show"
        x-transition:enter="{{ $animationClass }}"
        x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100"
        x-transition:leave="{{ $animationClass }}"
        x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0"
        id="{{ $tooltipId }}"
        role="tooltip"
        class="absolute z-50 inline-block px-3 py-2 text-sm font-medium rounded-lg shadow-sm {{ $styleClass }} {{ $animationClass }}"
        style="display: none;"
        x-cloak
    >
        @if($content)
            {{ $content }}
        @else
            {{ $contentSlot ?? '' }}
        @endif

        @if($arrow)
            <div
                data-popper-arrow
                class="tooltip-arrow {{ $arrowStyleClass }}"
                x-bind:class="{
                    'before:absolute before:w-2 before:h-2 before:bg-inherit before:rotate-45': true,
                    'before:bottom-[-4px] before:left-1/2 before:-translate-x-1/2': placement === 'top',
                    'before:top-[-4px] before:left-1/2 before:-translate-x-1/2': placement === 'bottom',
                    'before:right-[-4px] before:top-1/2 before:-translate-y-1/2': placement === 'left',
                    'before:left-[-4px] before:top-1/2 before:-translate-y-1/2': placement === 'right'
                }"
            >
                @if($style === 'light')
                    <div
                        class="absolute w-2 h-2 border"
                        x-bind:class="{
                            'border-t border-l border-gray-200 dark:border-gray-600 rotate-45 bottom-[-5px] left-1/2 -translate-x-1/2': placement === 'top',
                            'border-b border-r border-gray-200 dark:border-gray-600 rotate-45 top-[-5px] left-1/2 -translate-x-1/2': placement === 'bottom',
                            'border-t border-r border-gray-200 dark:border-gray-600 rotate-45 right-[-5px] top-1/2 -translate-y-1/2': placement === 'left',
                            'border-b border-l border-gray-200 dark:border-gray-600 rotate-45 left-[-5px] top-1/2 -translate-y-1/2': placement === 'right'
                        }"
                    ></div>
                @endif
            </div>
        @endif
    </div>
</div>

@once
@push('styles')
<style>
    [x-cloak] { display: none !important; }
</style>
@endpush
@endonce