{{-- Mega Menu Call-to-Action Section --}}
@props([
    'title' => null,
    'description' => null,
    'image' => null,
])

@php
    $baseClasses = 'p-6 rounded-lg';

    if ($image) {
        $baseClasses .= ' bg-cover bg-center bg-no-repeat relative';
    } else {
        $baseClasses .= ' bg-gray-50 dark:bg-gray-700';
    }
@endphp

<div
    {{ $attributes->merge(['class' => $baseClasses]) }}
    @if($image) style="background-image: url('{{ $image }}');" @endif
>
    @if($image)
        {{-- Overlay for better text readability --}}
        <div class="absolute inset-0 bg-gradient-to-r from-blue-600/90 to-purple-600/90 rounded-lg"></div>
    @endif

    <div class="relative z-10">
        @if($title)
            <h3 class="text-xl font-bold {{ $image ? 'text-white' : 'text-gray-900 dark:text-white' }} mb-2">
                {{ $title }}
            </h3>
        @endif

        @if($description)
            <p class="text-sm {{ $image ? 'text-white/90' : 'text-gray-600 dark:text-gray-400' }} mb-4">
                {{ $description }}
            </p>
        @endif

        <div class="flex flex-col sm:flex-row gap-2">
            {{ $slot }}
        </div>
    </div>
</div>