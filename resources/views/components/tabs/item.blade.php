{{-- Tab Item Component --}}
@props([
    'id' => null,
    'variant' => 'default', // default, underline, pills
    'active' => false,
    'disabled' => false,
    'icon' => null,
    'badge' => null,
    'fullWidth' => false,
])

@php
    $tabId = $id ?? 'tab-' . uniqid();

    // Base classes
    $baseClasses = 'inline-flex items-center justify-center gap-2 px-4 py-2 text-sm font-medium transition-colors';

    if ($disabled) {
        $baseClasses .= ' cursor-not-allowed opacity-50';
    } else {
        $baseClasses .= ' cursor-pointer';
    }

    if ($fullWidth) {
        $baseClasses .= ' flex-1';
    }

    // Variant-specific classes
    $variantClasses = match($variant) {
        'underline' => 'border-b-2 border-transparent hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300',
        'pills' => 'rounded-lg hover:bg-gray-100 dark:hover:bg-gray-700',
        default => 'rounded-t-lg hover:bg-gray-50 dark:hover:bg-gray-700',
    };

    // Active state classes
    $activeClasses = match($variant) {
        'underline' => 'text-blue-600 border-blue-600 dark:text-blue-500 dark:border-blue-500',
        'pills' => 'text-white bg-blue-600 dark:bg-blue-500',
        default => 'text-blue-600 bg-gray-100 dark:bg-gray-700 dark:text-blue-500',
    };

    // Inactive state classes
    $inactiveClasses = 'text-gray-500 dark:text-gray-400';

    $classes = $baseClasses . ' ' . $variantClasses;
@endphp

<button
    type="button"
    role="tab"
    data-tab-id="{{ $tabId }}"
    :aria-selected="activeTab === '{{ $tabId }}' ? 'true' : 'false'"
    :class="activeTab === '{{ $tabId }}' ? '{{ $activeClasses }}' : '{{ $inactiveClasses }}'"
    @click="activeTab = '{{ $tabId }}'"
    @if($disabled)
        disabled
    @endif
    {{ $attributes->merge(['class' => $classes]) }}
>
    @if($icon)
        <span class="w-4 h-4">
            {!! $icon !!}
        </span>
    @endif

    {{ $slot }}

    @if($badge)
        <x-ui::badge size="sm" :color="$active ? 'white' : 'gray'">
            {{ $badge }}
        </x-ui::badge>
    @endif
</button>
