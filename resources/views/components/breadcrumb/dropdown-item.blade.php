@props([
    'href' => '#',
    'wire' => null,
])

<li>
    @if($wire)
        <button
            type="button"
            wire:click="{{ $wire }}"
            {{ $attributes->merge(['class' => 'block w-full text-left px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white']) }}
        >
            {{ $slot }}
        </button>
    @else
        <a
            href="{{ $href }}"
            {{ $attributes->merge(['class' => 'block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white']) }}
        >
            {{ $slot }}
        </a>
    @endif
</li>