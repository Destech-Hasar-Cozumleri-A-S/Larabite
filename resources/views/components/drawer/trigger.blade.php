{{-- Drawer Trigger Button --}}
@props([
    'target' => null,
    'variant' => 'primary',
    'size' => 'md',
    'icon' => true,
])

@php
    if (!$target) {
        throw new \Exception('Drawer trigger requires a target ID');
    }
@endphp

<button
    type="button"
    @click="openDrawer('{{ $target }}')"
    {{ $attributes->merge([
        'class' => 'inline-flex items-center justify-center gap-x-2'
    ]) }}
>
    @if($icon && $slot->isEmpty())
        <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15"/>
        </svg>
    @endif

    {{ $slot }}
</button>