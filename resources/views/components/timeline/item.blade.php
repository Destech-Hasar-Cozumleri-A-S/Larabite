{{-- Timeline Item Component --}}
@props([
    'time' => null,
    'title' => null,
    'icon' => null,
    'iconColor' => 'blue', // blue, green, red, yellow, gray, purple
    'avatar' => null,
    'orientation' => 'vertical', // vertical, horizontal
    'isLast' => false,
])

@php
    // Icon color classes
    $iconColors = [
        'blue' => 'bg-blue-100 dark:bg-blue-900',
        'green' => 'bg-green-100 dark:bg-green-900',
        'red' => 'bg-red-100 dark:bg-red-900',
        'yellow' => 'bg-yellow-100 dark:bg-yellow-900',
        'gray' => 'bg-gray-100 dark:bg-gray-700',
        'purple' => 'bg-purple-100 dark:bg-purple-900',
    ];

    $iconTextColors = [
        'blue' => 'text-blue-600 dark:text-blue-500',
        'green' => 'text-green-600 dark:text-green-500',
        'red' => 'text-red-600 dark:text-red-500',
        'yellow' => 'text-yellow-600 dark:text-yellow-500',
        'gray' => 'text-gray-600 dark:text-gray-400',
        'purple' => 'text-purple-600 dark:text-purple-500',
    ];

    $iconBgClass = $iconColors[$iconColor] ?? $iconColors['blue'];
    $iconTextClass = $iconTextColors[$iconColor] ?? $iconTextColors['blue'];

    if ($orientation === 'horizontal') {
        $itemClass = 'flex flex-col items-center flex-1';
        $contentClass = 'mt-3 text-center';
    } else {
        $itemClass = 'mb-10 ms-6';
        $contentClass = '';
    }
@endphp

<li {{ $attributes->merge(['class' => $itemClass]) }}>
    {{-- Timeline Marker --}}
    <span class="absolute flex items-center justify-center {{ $avatar ? 'w-12 h-12 -start-6' : 'w-10 h-10 -start-5' }} {{ $iconBgClass }} rounded-full ring-8 ring-white dark:ring-gray-900">
        @if($avatar)
            <img
                src="{{ $avatar }}"
                alt="Avatar"
                class="w-full h-full rounded-full object-cover"
            />
        @elseif($icon)
            <span class="{{ $iconTextClass }}">
                {!! $icon !!}
            </span>
        @else
            <svg class="w-3 h-3 {{ $iconTextClass }}" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                <path d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z"/>
            </svg>
        @endif
    </span>

    {{-- Horizontal connector line --}}
    @if($orientation === 'horizontal' && !$isLast)
        <div class="hidden sm:flex w-full bg-gray-200 h-0.5 dark:bg-gray-700"></div>
    @endif

    {{-- Content --}}
    <div class="{{ $contentClass }}">
        @if($time)
            <time class="block mb-2 text-sm font-normal leading-none text-gray-400 dark:text-gray-500">
                {{ $time }}
            </time>
        @endif

        @if($title)
            <h3 class="flex items-center mb-1 text-lg font-semibold text-gray-900 dark:text-white">
                {{ $title }}
            </h3>
        @endif

        <div class="text-base font-normal text-gray-500 dark:text-gray-400">
            {{ $slot }}
        </div>
    </div>
</li>