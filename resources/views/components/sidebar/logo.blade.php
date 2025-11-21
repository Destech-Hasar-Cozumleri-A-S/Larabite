{{-- Sidebar Logo --}}
@props([
    'href' => '/',
    'src' => null,
    'alt' => 'Logo',
])

<a href="{{ $href }}" {{ $attributes->merge(['class' => 'flex items-center ps-2.5 mb-5']) }}>
    @if($src)
        <img src="{{ $src }}" class="h-6 me-3 sm:h-7" alt="{{ $alt }}" />
    @endif

    @if($slot->isNotEmpty())
        <span class="self-center text-xl font-semibold whitespace-nowrap dark:text-white">
            {{ $slot }}
        </span>
    @endif
</a>