{{-- Mega Menu Trigger Button --}}
@props([
    'target' => null,
    'icon' => true,
])

@php
    $baseClasses = 'inline-flex items-center justify-center p-2 w-10 h-10 text-sm text-gray-500 rounded-lg hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 md:hidden dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600';
@endphp

<button
    type="button"
    @if($target) @click="document.getElementById('{{ $target }}').dispatchEvent(new CustomEvent('toggle'))" @endif
    {{ $attributes->merge(['class' => $baseClasses]) }}
>
    <span class="sr-only">Open main menu</span>
    @if($icon)
        <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15"/>
        </svg>
    @else
        {{ $slot }}
    @endif
</button>