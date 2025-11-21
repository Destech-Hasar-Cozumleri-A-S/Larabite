{{-- Split Hero (Two Column Layout) --}}
@props([
    'reverse' => false,
])

@php
    $gridClasses = 'grid gap-8 items-center lg:gap-16 lg:grid-cols-2';
@endphp

<section {{ $attributes->merge(['class' => 'bg-white dark:bg-gray-900']) }}>
    <div class="px-4 mx-auto max-w-screen-xl py-8 lg:py-16">
        <div class="{{ $gridClasses }}">
            @if($reverse)
                <div class="order-2 lg:order-1">
                    {{ $media ?? '' }}
                </div>
                <div class="order-1 lg:order-2">
                    {{ $content ?? $slot }}
                </div>
            @else
                <div>
                    {{ $content ?? $slot }}
                </div>
                <div>
                    {{ $media ?? '' }}
                </div>
            @endif
        </div>
    </div>
</section>