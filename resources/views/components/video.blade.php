{{-- Video Component --}}
@props([
    'type' => 'local', // local, youtube, vimeo
    'src' => null,
    'poster' => null, // Thumbnail image
    'aspectRatio' => '16:9', // 16:9, 4:3, 1:1, 21:9
    'controls' => true,
    'autoplay' => false,
    'muted' => false,
    'loop' => false,
    'width' => 'full', // full, 1/2, 1/3, 2/3, auto, or custom
    'rounded' => true,
    'shadow' => false,
    'title' => null, // For accessibility
])

@php
    // Aspect ratio classes
    $aspectRatios = [
        '16:9' => 'aspect-video', // 16:9
        '4:3' => 'aspect-[4/3]',
        '1:1' => 'aspect-square',
        '21:9' => 'aspect-[21/9]',
    ];

    // Width classes
    $widthClasses = [
        'full' => 'w-full',
        '1/2' => 'w-1/2',
        '1/3' => 'w-1/3',
        '2/3' => 'w-2/3',
        'auto' => 'w-auto',
    ];

    $aspectClass = $aspectRatios[$aspectRatio] ?? $aspectRatios['16:9'];
    $widthClass = $widthClasses[$width] ?? $width;
    $roundedClass = $rounded ? 'rounded-lg' : '';
    $shadowClass = $shadow ? 'shadow-lg' : '';

    // Container classes
    $containerClasses = "{$widthClass} max-w-full";

    // Parse YouTube URL
    $youtubeId = null;
    if ($type === 'youtube' && $src) {
        if (preg_match('/(?:youtube\.com\/(?:[^\/]+\/.+\/|(?:v|e(?:mbed)?)\/|.*[?&]v=)|youtu\.be\/)([^"&?\/ ]{11})/', $src, $matches)) {
            $youtubeId = $matches[1];
        }
    }

    // Parse Vimeo URL
    $vimeoId = null;
    if ($type === 'vimeo' && $src) {
        if (preg_match('/(?:vimeo\.com\/)([0-9]+)/', $src, $matches)) {
            $vimeoId = $matches[1];
        }
    }
@endphp

<div {{ $attributes->merge(['class' => $containerClasses]) }}>
    @if($type === 'youtube' && $youtubeId)
        {{-- YouTube Embed --}}
        <div class="relative {{ $aspectClass }} {{ $roundedClass }} {{ $shadowClass }} overflow-hidden bg-gray-200 dark:bg-gray-700">
            <iframe
                class="absolute top-0 left-0 w-full h-full"
                src="https://www.youtube.com/embed/{{ $youtubeId }}?{{ $autoplay ? 'autoplay=1&' : '' }}{{ $muted ? 'mute=1&' : '' }}{{ $loop ? 'loop=1&playlist=' . $youtubeId . '&' : '' }}{{ $controls ? 'controls=1' : 'controls=0' }}"
                title="{{ $title ?? 'YouTube video player' }}"
                frameborder="0"
                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                allowfullscreen
            ></iframe>
        </div>

    @elseif($type === 'vimeo' && $vimeoId)
        {{-- Vimeo Embed --}}
        <div class="relative {{ $aspectClass }} {{ $roundedClass }} {{ $shadowClass }} overflow-hidden bg-gray-200 dark:bg-gray-700">
            <iframe
                class="absolute top-0 left-0 w-full h-full"
                src="https://player.vimeo.com/video/{{ $vimeoId }}?{{ $autoplay ? 'autoplay=1&' : '' }}{{ $muted ? 'muted=1&' : '' }}{{ $loop ? 'loop=1&' : '' }}"
                title="{{ $title ?? 'Vimeo video player' }}"
                frameborder="0"
                allow="autoplay; fullscreen; picture-in-picture"
                allowfullscreen
            ></iframe>
        </div>

    @else
        {{-- Local Video --}}
        <video
            class="w-full h-auto max-w-full {{ $roundedClass }} {{ $shadowClass }} bg-gray-200 dark:bg-gray-700"
            @if($controls) controls @endif
            @if($autoplay) autoplay @endif
            @if($muted) muted @endif
            @if($loop) loop @endif
            @if($poster) poster="{{ $poster }}" @endif
        >
            @if($src)
                <source src="{{ $src }}" type="video/mp4">
            @endif
            {{ $slot }}
            <p class="text-sm text-gray-500 dark:text-gray-400 p-4">
                Your browser does not support the video tag.
            </p>
        </video>
    @endif
</div>