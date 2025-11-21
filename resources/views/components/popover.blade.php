{{-- Popover Component --}}
@props([
    'id' => null,
    'trigger' => 'hover', // hover, click
    'placement' => 'top', // top, bottom, left, right
    'offset' => 8,
    'width' => 'auto', // auto, sm (w-64), md (w-80), lg (w-96)
    'arrow' => true,
])

@php
    $id = $id ?? 'popover-' . uniqid();

    $widthClasses = [
        'auto' => '',
        'sm' => 'w-64',
        'md' => 'w-80',
        'lg' => 'w-96',
    ];

    $widthClass = $widthClasses[$width] ?? '';
@endphp

<div
    x-data="{
        open: false,
        trigger: '{{ $trigger }}',
        placement: '{{ $placement }}',
        toggle() {
            this.open = !this.open;
        },
        show() {
            this.open = true;
        },
        hide() {
            this.open = false;
        }
    }"
    @if($trigger === 'hover')
        @mouseenter="show()"
        @mouseleave="hide()"
    @else
        @click="toggle()"
        @click.away="hide()"
    @endif
    class="relative inline-block"
>
    {{-- Trigger Element --}}
    <div>
        {{ $trigger ?? $slot }}
    </div>

    {{-- Popover Content --}}
    <div
        x-show="open"
        x-transition:enter="transition ease-out duration-200"
        x-transition:enter-start="opacity-0 scale-95"
        x-transition:enter-end="opacity-100 scale-100"
        x-transition:leave="transition ease-in duration-150"
        x-transition:leave-start="opacity-100 scale-100"
        x-transition:leave-end="opacity-0 scale-95"
        style="display: none;"
        role="tooltip"
        {{ $attributes->merge(['class' => "absolute z-10 inline-block text-sm text-gray-500 bg-white border border-gray-200 rounded-lg shadow-sm dark:text-gray-400 dark:border-gray-600 dark:bg-gray-800 {$widthClass}"]) }}
        :class="{
            'bottom-full left-1/2 -translate-x-1/2 mb-2': placement === 'top',
            'top-full left-1/2 -translate-x-1/2 mt-2': placement === 'bottom',
            'right-full top-1/2 -translate-y-1/2 mr-2': placement === 'left',
            'left-full top-1/2 -translate-y-1/2 ml-2': placement === 'right'
        }"
    >
        {{ $content ?? '' }}

        @if($arrow)
            <div
                class="absolute w-2 h-2 bg-white border-gray-200 dark:bg-gray-800 dark:border-gray-600 rotate-45"
                :class="{
                    'bottom-[-4px] left-1/2 -translate-x-1/2 border-b border-r': placement === 'top',
                    'top-[-4px] left-1/2 -translate-x-1/2 border-t border-l': placement === 'bottom',
                    'right-[-4px] top-1/2 -translate-y-1/2 border-r border-t': placement === 'left',
                    'left-[-4px] top-1/2 -translate-y-1/2 border-l border-b': placement === 'right'
                }"
            ></div>
        @endif
    </div>
</div>