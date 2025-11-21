{{-- Table Header Cell Component --}}
@props([
    'sortable' => false,
    'sorted' => null, // 'asc', 'desc', null
    'align' => 'left', // left, center, right
])

@php
    $alignClasses = [
        'left' => 'text-left',
        'center' => 'text-center',
        'right' => 'text-right',
    ];

    $alignClass = $alignClasses[$align] ?? $alignClasses['left'];

    $classes = "px-6 py-3 {$alignClass}";

    if ($sortable) {
        $classes .= ' cursor-pointer select-none';
    }
@endphp

<th scope="col" {{ $attributes->merge(['class' => $classes]) }}>
    @if($sortable)
        <div class="flex items-center {{ $align === 'right' ? 'justify-end' : ($align === 'center' ? 'justify-center' : '') }}">
            {{ $slot }}
            <svg class="w-3 h-3 ms-1.5 {{ $sorted ? 'text-gray-900 dark:text-white' : '' }}" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                @if($sorted === 'asc')
                    <path d="m5 15 7-7 7 7"/>
                @elseif($sorted === 'desc')
                    <path d="m19 9-7 7-7-7"/>
                @else
                    <path fill-rule="evenodd" d="M5.575 13.729C4.501 15.033 5.43 17 7.12 17h9.762c1.69 0 2.618-1.967 1.544-3.271l-4.881-5.927a2 2 0 0 0-3.088 0l-4.88 5.927Z" clip-rule="evenodd"/>
                @endif
            </svg>
        </div>
    @else
        {{ $slot }}
    @endif
</th>