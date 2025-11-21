@props([
    'id',
    'title',
    'active' => false,
    'flush' => false,
])

@php
    $buttonClasses = $flush
        ? 'flex items-center justify-between w-full py-5 font-medium text-left text-gray-500 border-b border-gray-200'
        : 'flex items-center justify-between w-full p-5 font-medium text-left text-gray-500 border-b border-gray-200';

    $contentClasses = $flush
        ? 'py-5 border-b border-gray-200'
        : 'p-5 border-b border-gray-200';
@endphp

<div x-data="{ open: {{ $active ? 'true' : 'false' }} }">
    {{-- Accordion Header --}}
    <h2>
        <button
            type="button"
            @click="
                open = !open;
                @if(!$attributes->has('data-always-open'))
                if (open) {
                    activeItems = ['{{ $id }}'];
                }
                @else
                if (open) {
                    if (!activeItems.includes('{{ $id }}')) {
                        activeItems.push('{{ $id }}');
                    }
                } else {
                    activeItems = activeItems.filter(item => item !== '{{ $id }}');
                }
                @endif
            "
            :aria-expanded="open.toString()"
            aria-controls="accordion-body-{{ $id }}"
            class="{{ $buttonClasses }} hover:bg-gray-50 focus:ring-4 focus:ring-gray-200"
            :class="{ 'text-gray-900': open, 'text-gray-500': !open }"
        >
            <span>{{ $title }}</span>
            <svg
                class="w-3 h-3 shrink-0 transition-transform duration-200"
                :class="{ 'rotate-180': open }"
                xmlns="http://www.w3.org/2000/svg"
                fill="none"
                viewBox="0 0 10 6"
            >
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5 5 1 1 5"/>
            </svg>
        </button>
    </h2>

    {{-- Accordion Content --}}
    <div
        x-show="open"
        x-collapse
        id="accordion-body-{{ $id }}"
        aria-labelledby="accordion-heading-{{ $id }}"
    >
        <div class="{{ $contentClasses }} text-gray-500">
            {{ $slot }}
        </div>
    </div>
</div>