{{-- Smartphone Device Mockup --}}
@props([
    'variant' => 'default', // default, iphone, android
    'darkMode' => false,
])

@php
    // Base classes for smartphone frame
    $frameClasses = 'relative mx-auto border-gray-800 dark:border-gray-800 bg-gray-800 border-[14px] rounded-[2.5rem] h-[600px] w-[300px]';

    // Variant-specific modifications
    $notchClasses = '';
    $buttonClasses = '';

    if ($variant === 'iphone') {
        // iPhone notch
        $notchClasses = 'w-[148px] h-[18px] bg-gray-800 top-0 rounded-b-[1rem] left-1/2 -translate-x-1/2 absolute';
        $buttonClasses = 'h-[46px] w-[3px] bg-gray-800 absolute -start-[17px] top-[124px] rounded-s-lg';
    } elseif ($variant === 'android') {
        // Android camera hole
        $notchClasses = 'w-[10px] h-[10px] bg-gray-800 rounded-full absolute top-[12px] left-1/2 -translate-x-1/2';
    }
@endphp

<div {{ $attributes->merge(['class' => $frameClasses]) }}>
    @if($variant === 'iphone')
        {{-- iPhone Notch --}}
        <div class="{{ $notchClasses }}"></div>

        {{-- Side Buttons --}}
        <div class="h-[46px] w-[3px] bg-gray-800 absolute -start-[17px] top-[124px] rounded-s-lg"></div>
        <div class="h-[46px] w-[3px] bg-gray-800 absolute -start-[17px] top-[178px] rounded-s-lg"></div>
        <div class="h-[64px] w-[3px] bg-gray-800 absolute -end-[17px] top-[142px] rounded-e-lg"></div>
    @elseif($variant === 'android')
        {{-- Android Camera Hole --}}
        <div class="{{ $notchClasses }}"></div>

        {{-- Side Buttons --}}
        <div class="h-[32px] w-[3px] bg-gray-800 absolute -start-[17px] top-[72px] rounded-s-lg"></div>
        <div class="h-[46px] w-[3px] bg-gray-800 absolute -start-[17px] top-[124px] rounded-s-lg"></div>
        <div class="h-[46px] w-[3px] bg-gray-800 absolute -start-[17px] top-[178px] rounded-s-lg"></div>
        <div class="h-[64px] w-[3px] bg-gray-800 absolute -end-[17px] top-[142px] rounded-e-lg"></div>
    @else
        {{-- Default Phone - Simple top bar --}}
        <div class="w-[120px] h-[18px] bg-gray-800 top-0 rounded-b-[0.5rem] left-1/2 -translate-x-1/2 absolute"></div>

        {{-- Side Buttons --}}
        <div class="h-[32px] w-[3px] bg-gray-800 absolute -start-[17px] top-[72px] rounded-s-lg"></div>
        <div class="h-[46px] w-[3px] bg-gray-800 absolute -start-[17px] top-[124px] rounded-s-lg"></div>
        <div class="h-[46px] w-[3px] bg-gray-800 absolute -start-[17px] top-[178px] rounded-s-lg"></div>
        <div class="h-[64px] w-[3px] bg-gray-800 absolute -end-[17px] top-[142px] rounded-e-lg"></div>
    @endif

    {{-- Screen Content --}}
    <div class="rounded-[2rem] overflow-hidden w-[272px] h-[572px] bg-white dark:bg-gray-800">
        {{ $slot }}
    </div>
</div>