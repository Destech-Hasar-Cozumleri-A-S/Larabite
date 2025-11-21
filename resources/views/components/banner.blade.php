@props([
    'position' => 'top', // top, bottom
    'variant' => 'info', // info, success, warning, danger
    'dismissible' => true,
    'id' => null,
])

@php
    $variantClasses = [
        'info' => 'bg-blue-50 border-blue-300',
        'success' => 'bg-green-50 border-green-300',
        'warning' => 'bg-yellow-50 border-yellow-300',
        'danger' => 'bg-red-50 border-red-300',
    ];

    $textColors = [
        'info' => 'text-blue-800',
        'success' => 'text-green-800',
        'warning' => 'text-yellow-800',
        'danger' => 'text-red-800',
    ];

    $positionClasses = [
        'top' => 'top-0',
        'bottom' => 'bottom-0',
    ];

    $bannerId = $id ?? 'banner-' . uniqid();
@endphp

<div
    id="{{ $bannerId }}"
    tabindex="-1"
    {{ $attributes->merge(['class' => "fixed start-0 z-50 flex justify-between w-full p-4 border-b {$positionClasses[$position]} {$variantClasses[$variant]}"]) }}
>
    <div class="flex items-center mx-auto">
        <p class="flex items-center text-sm font-normal {{ $textColors[$variant] }}">
            {{ $slot }}
        </p>
    </div>

    @if($dismissible)
        <div class="flex items-center">
            <button
                data-dismiss-target="#{{ $bannerId }}"
                type="button"
                class="flex-shrink-0 inline-flex justify-center w-7 h-7 items-center {{ $textColors[$variant] }} hover:bg-gray-200 rounded-lg text-sm p-1.5"
            >
                <x-ui::icon.close />
                <span class="sr-only">Close banner</span>
            </button>
        </div>
    @endif
</div>