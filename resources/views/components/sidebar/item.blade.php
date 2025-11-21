{{-- Sidebar Menu Item --}}
@props([
    'href' => null,
    'active' => false,
    'icon' => null,
    'badge' => null,
    'badgeColor' => 'blue',
])

@php
    $tag = $href ? 'a' : 'button';

    $baseClasses = 'flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group transition-colors';

    if ($active) {
        $baseClasses .= ' bg-gray-100 dark:bg-gray-700';
    }

    // Badge color classes
    $badgeColors = [
        'blue' => 'bg-blue-100 text-blue-800 dark:bg-blue-900 dark:text-blue-300',
        'gray' => 'bg-gray-100 text-gray-800 dark:bg-gray-700 dark:text-gray-300',
        'red' => 'bg-red-100 text-red-800 dark:bg-red-900 dark:text-red-300',
        'green' => 'bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-300',
        'yellow' => 'bg-yellow-100 text-yellow-800 dark:bg-yellow-900 dark:text-yellow-300',
        'indigo' => 'bg-indigo-100 text-indigo-800 dark:bg-indigo-900 dark:text-indigo-300',
        'purple' => 'bg-purple-100 text-purple-800 dark:bg-purple-900 dark:text-purple-300',
        'pink' => 'bg-pink-100 text-pink-800 dark:bg-pink-900 dark:text-pink-300',
    ];

    $badgeColorClass = $badgeColors[$badgeColor] ?? $badgeColors['blue'];
@endphp

<li>
    <{{ $tag }}
        @if($href)
            href="{{ $href }}"
        @endif
        {{ $attributes->merge(['class' => $baseClasses]) }}
        @if($active)
            aria-current="page"
        @endif
    >
        @if($icon)
            <span class="flex-shrink-0">
                {!! $icon !!}
            </span>
        @endif

        <span class="flex-1 ms-3 whitespace-nowrap">
            {{ $slot }}
        </span>

        @if($badge)
            <span class="inline-flex items-center justify-center px-2 py-0.5 ms-3 text-xs font-medium {{ $badgeColorClass }} rounded-full">
                {{ $badge }}
            </span>
        @endif
    </{{ $tag }}>
</li>