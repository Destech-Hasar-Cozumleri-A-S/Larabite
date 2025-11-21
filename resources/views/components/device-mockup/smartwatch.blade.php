{{-- Smartwatch Device Mockup --}}
@props([
    'showStraps' => true,
])

<div {{ $attributes->merge(['class' => 'relative mx-auto']) }}>
    @if($showStraps)
        {{-- Top Strap --}}
        <div class="h-[63px] w-[20px] md:h-[96px] md:w-[30px] bg-gray-800 dark:bg-gray-700 rounded-t-3xl -mb-[7px] mx-auto"></div>
    @endif

    {{-- Watch Face --}}
    <div class="relative mx-auto border-gray-900 dark:border-gray-800 bg-gray-900 dark:bg-gray-800 border-[10px] rounded-[2.5rem] h-[213px] w-[208px] shadow-xl">
        <div class="w-[188px] h-[193px] overflow-hidden rounded-[2rem] bg-white dark:bg-gray-800">
            {{ $slot }}
        </div>
    </div>

    @if($showStraps)
        {{-- Bottom Strap --}}
        <div class="h-[63px] w-[20px] md:h-[96px] md:w-[30px] bg-gray-800 dark:bg-gray-700 rounded-b-3xl -mt-[7px] mx-auto"></div>
    @endif
</div>