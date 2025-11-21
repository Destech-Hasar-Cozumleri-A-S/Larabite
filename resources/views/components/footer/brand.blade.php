{{-- Footer Brand (Logo and Company Name) --}}
@props([
    'logo' => null,
    'href' => '/',
    'name' => null,
])

<div {{ $attributes->merge(['class' => 'mb-6 md:mb-0']) }}>
    <a href="{{ $href }}" class="flex items-center">
        @if($logo)
            <img src="{{ $logo }}" class="h-8 me-3" alt="{{ $name }} Logo" />
        @endif

        @if($name)
            <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">
                {{ $name }}
            </span>
        @endif

        @if($slot->isNotEmpty())
            {{ $slot }}
        @endif
    </a>
</div>