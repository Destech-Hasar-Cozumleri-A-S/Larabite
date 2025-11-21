{{-- Navbar Brand (Logo) --}}
@props([
    'href' => '/',
    'logo' => null,
    'text' => null,
])

<a
    href="{{ $href }}"
    {{ $attributes->merge(['class' => 'flex items-center space-x-3 rtl:space-x-reverse']) }}
>
    @if($logo)
        <img src="{{ $logo }}" class="h-8" alt="Logo" />
    @endif

    @if($text)
        <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">
            {{ $text }}
        </span>
    @else
        {{ $slot }}
    @endif
</a>