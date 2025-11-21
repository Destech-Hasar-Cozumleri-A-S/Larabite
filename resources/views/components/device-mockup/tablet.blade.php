{{-- Tablet Device Mockup --}}
@props([
    'orientation' => 'portrait', // portrait, landscape
])

@php
    if ($orientation === 'landscape') {
        $frameClasses = 'relative mx-auto border-gray-800 dark:border-gray-800 bg-gray-800 border-[14px] rounded-[2.5rem] h-[454px] w-[768px]';
        $screenClasses = 'rounded-[2rem] overflow-hidden w-[740px] h-[426px] bg-white dark:bg-gray-800';
        $cameraClasses = 'h-[10px] w-[10px] bg-gray-800 rounded-full absolute start-[12px] top-1/2 -translate-y-1/2';
    } else {
        $frameClasses = 'relative mx-auto border-gray-800 dark:border-gray-800 bg-gray-800 border-[14px] rounded-[2.5rem] h-[768px] w-[454px]';
        $screenClasses = 'rounded-[2rem] overflow-hidden w-[426px] h-[740px] bg-white dark:bg-gray-800';
        $cameraClasses = 'h-[10px] w-[10px] bg-gray-800 rounded-full absolute top-[12px] left-1/2 -translate-x-1/2';
    }
@endphp

<div {{ $attributes->merge(['class' => $frameClasses]) }}>
    {{-- Camera --}}
    <div class="{{ $cameraClasses }}"></div>

    {{-- Screen Content --}}
    <div class="{{ $screenClasses }}">
        {{ $slot }}
    </div>
</div>