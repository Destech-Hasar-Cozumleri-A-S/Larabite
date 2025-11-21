{{-- Tabs Component --}}
@props([
    'variant' => 'default', // default, underline, pills
    'orientation' => 'horizontal', // horizontal, vertical
    'defaultTab' => null,
    'fullWidth' => false,
])

@php
    $uniqueId = 'tabs-' . uniqid();

    // Container classes based on orientation
    $containerClass = $orientation === 'vertical'
        ? 'flex gap-4'
        : '';

    // Tab list classes
    $tabListClass = $orientation === 'vertical'
        ? 'flex flex-col space-y-2'
        : 'flex flex-wrap';

    if ($fullWidth && $orientation === 'horizontal') {
        $tabListClass .= ' w-full';
    }

    // Border class for default and underline variants
    if ($variant === 'underline' && $orientation === 'horizontal') {
        $tabListClass .= ' border-b border-gray-200 dark:border-gray-700 -mb-px';
    }
@endphp

<div
    {{ $attributes->merge(['class' => $containerClass]) }}
    x-data="{
        activeTab: '{{ $defaultTab }}',
        init() {
            if (!this.activeTab && this.$refs.tabList) {
                const firstTab = this.$refs.tabList.querySelector('[role=tab]');
                if (firstTab) {
                    this.activeTab = firstTab.getAttribute('data-tab-id');
                }
            }
        }
    }"
    x-id="['{{ $uniqueId }}']"
>
    {{-- Tab List --}}
    <div
        role="tablist"
        x-ref="tabList"
        class="{{ $tabListClass }}"
        aria-label="Tabs"
    >
        {{ $tabs ?? '' }}
    </div>

    {{-- Tab Panels --}}
    <div class="{{ $orientation === 'vertical' ? 'flex-1' : 'mt-3' }}">
        {{ $slot }}
    </div>
</div>