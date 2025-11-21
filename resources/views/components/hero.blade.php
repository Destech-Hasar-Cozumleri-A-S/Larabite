{{-- Hero/Jumbotron Component --}}
@props([
    'title' => null,
    'subtitle' => null,
    'description' => null,
    'align' => 'center', // left, center
    'size' => 'default', // sm, default, lg, xl
    'background' => null, // null, 'image', 'gradient', 'pattern'
    'backgroundImage' => null,
    'overlay' => false,
])

@php
    // Container alignment
    $alignClasses = [
        'left' => 'text-left',
        'center' => 'text-center',
    ];

    // Title size variants
    $titleSizes = [
        'sm' => 'text-3xl md:text-4xl',
        'default' => 'text-4xl md:text-5xl lg:text-6xl',
        'lg' => 'text-5xl md:text-6xl lg:text-7xl',
        'xl' => 'text-6xl md:text-7xl lg:text-8xl',
    ];

    $containerClasses = 'px-4 mx-auto max-w-screen-xl py-8 lg:py-16 ' . ($alignClasses[$align] ?? $alignClasses['center']);
    $titleClasses = 'mb-4 font-extrabold tracking-tight leading-none text-gray-900 dark:text-white ' . ($titleSizes[$size] ?? $titleSizes['default']);

    // Background styling
    $sectionClasses = 'w-full';

    if ($background === 'image' && $backgroundImage) {
        $sectionClasses .= ' bg-cover bg-center bg-no-repeat';
        if ($overlay) {
            $sectionClasses .= ' bg-gray-700 bg-blend-multiply';
        }
    } elseif ($background === 'gradient') {
        $sectionClasses .= ' bg-gradient-to-b from-blue-50 to-transparent dark:from-blue-900';
    } elseif ($background === 'pattern') {
        $sectionClasses .= ' bg-white dark:bg-gray-900';
    } else {
        $sectionClasses .= ' bg-white dark:bg-gray-900';
    }
@endphp

<section
    {{ $attributes->merge(['class' => $sectionClasses]) }}
    @if($background === 'image' && $backgroundImage)
        style="background-image: url('{{ $backgroundImage }}');"
    @endif
>
    <div class="{{ $containerClasses }}">
        @if($subtitle)
            <p class="mb-4 text-lg font-normal text-gray-500 lg:text-xl dark:text-gray-400">
                {{ $subtitle }}
            </p>
        @endif

        @if($title)
            <h1 class="{{ $titleClasses }}">
                {{ $title }}
            </h1>
        @endif

        @if($description)
            <p class="mb-8 text-lg font-normal text-gray-500 lg:text-xl sm:px-16 lg:px-48 dark:text-gray-400">
                {{ $description }}
            </p>
        @endif

        {{ $slot }}
    </div>
</section>