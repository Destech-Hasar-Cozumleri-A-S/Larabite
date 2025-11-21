{{-- Desktop (iMac) Device Mockup --}}
@props([])

<div {{ $attributes->merge(['class' => 'relative mx-auto']) }}>
    {{-- Monitor Screen --}}
    <div class="relative mx-auto border-gray-800 dark:border-gray-800 bg-gray-800 border-[16px] rounded-t-xl h-[172px] max-w-[301px] md:h-[406px] md:max-w-[512px]">
        <div class="rounded-xl overflow-hidden h-[140px] md:h-[374px] bg-white dark:bg-gray-800">
            {{ $slot }}
        </div>
    </div>

    {{-- Monitor Stand --}}
    <div class="relative mx-auto bg-gray-900 dark:bg-gray-700 rounded-b-xl h-[24px] max-w-[301px] md:h-[42px] md:max-w-[512px]"></div>

    {{-- Monitor Base --}}
    <div class="relative mx-auto bg-gray-800 rounded-b-xl h-[55px] max-w-[83px] md:h-[90px] md:max-w-[142px]"></div>
</div>