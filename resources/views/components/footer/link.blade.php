{{-- Footer Link Item --}}
@props([
    'href' => '#',
])

<li {{ $attributes->merge(['class' => 'mb-4']) }}>
    <a href="{{ $href }}" class="hover:underline">
        {{ $slot }}
    </a>
</li>