{{-- Keyboard Combo Component --}}
@props([
    'keys' => [], // Array of keys or slot content
    'separator' => '+',
    'size' => 'default',
])

@php
    $separatorClasses = 'mx-1 text-gray-500 dark:text-gray-400';
@endphp

<span {{ $attributes->merge(['class' => 'inline-flex items-center']) }}>
    @if(count($keys) > 0)
        @foreach($keys as $index => $key)
            <x-ui::kbd :size="$size">{{ $key }}</x-ui::kbd>
            @if($index < count($keys) - 1)
                <span class="{{ $separatorClasses }}">{{ $separator }}</span>
            @endif
        @endforeach
    @else
        {{ $slot }}
    @endif
</span>