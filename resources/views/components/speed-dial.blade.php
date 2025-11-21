{{-- Speed Dial Component --}}
@props([
    'id' => null,
    'position' => 'bottom-right', // top-left, top-right, bottom-left, bottom-right
    'direction' => 'vertical', // vertical, horizontal
    'trigger' => 'hover', // hover, click
    'buttonShape' => 'circle', // circle, square
    'tooltipPosition' => 'left', // left, right, top, bottom
])

@php
    $uniqueId = $id ?? 'speed-dial-' . uniqid();

    // Position classes
    $positions = [
        'top-left' => 'top-6 start-6',
        'top-right' => 'top-6 end-6',
        'bottom-left' => 'bottom-6 start-6',
        'bottom-right' => 'end-6 bottom-6',
    ];

    $positionClass = $positions[$position] ?? $positions['bottom-right'];

    // Direction classes
    $directionClasses = [
        'vertical' => 'flex-col',
        'horizontal' => 'flex-row',
    ];

    $directionClass = $directionClasses[$direction] ?? $directionClasses['vertical'];

    // Menu position based on dial position
    $menuPositionClasses = [
        'top-left' => 'mb-4',
        'top-right' => 'mb-4',
        'bottom-left' => 'mb-4',
        'bottom-right' => 'mb-4',
    ];

    $menuPositionClass = $menuPositionClasses[$position] ?? 'mb-4';

    // Spacing class based on direction
    $spacingClass = $direction === 'horizontal' ? 'space-x-2' : 'space-y-2';
@endphp

<div
    {{ $attributes->merge(['class' => "fixed {$positionClass} group"]) }}
    x-data="{
        open: false,
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
    @endif
>
    {{-- Menu Items --}}
    <div
        id="{{ $uniqueId }}-menu"
        class="flex {{ $directionClass }} items-center {{ $menuPositionClass }} {{ $spacingClass }}"
        x-show="open"
        x-transition:enter="transition ease-out duration-200"
        x-transition:enter-start="opacity-0 scale-95"
        x-transition:enter-end="opacity-100 scale-100"
        x-transition:leave="transition ease-in duration-150"
        x-transition:leave-start="opacity-100 scale-100"
        x-transition:leave-end="opacity-0 scale-95"
        style="display: none;"
        role="menu"
        aria-label="Speed dial menu"
    >
        {{ $actions ?? '' }}
    </div>

    {{-- Trigger Button --}}
    <button
        type="button"
        @if($trigger === 'click')
            @click="toggle()"
        @endif
        :aria-expanded="open"
        aria-controls="{{ $uniqueId }}-menu"
        aria-haspopup="true"
        {{ $trigger->attributes->merge(['class' => "flex items-center justify-center text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 focus:outline-none dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 transition-all duration-200 " . ($buttonShape === 'circle' ? 'rounded-full w-14 h-14' : 'rounded-lg w-14 h-14')]) }}
    >
        <svg
            class="w-5 h-5 transition-transform"
            :class="{ 'rotate-45': open }"
            aria-hidden="true"
            xmlns="http://www.w3.org/2000/svg"
            fill="none"
            viewBox="0 0 18 18"
        >
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 1v16M1 9h16"/>
        </svg>
        <span class="sr-only">Toggle speed dial menu</span>
    </button>

    {{ $slot }}
</div>
