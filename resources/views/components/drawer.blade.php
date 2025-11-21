{{-- Drawer Component --}}
@props([
    'id' => null,
    'position' => 'left', // left, right, top, bottom
    'backdrop' => true,
    'bodyScrolling' => false,
    'closeButton' => true,
    'title' => null,
    'width' => 'default', // default, large, full
])

@php
    $drawerId = $id ?? 'drawer-' . uniqid();
    $backdropId = $drawerId . '-backdrop';

    // Position classes
    $positionClasses = [
        'left' => 'top-0 left-0 h-screen w-80',
        'right' => 'top-0 right-0 h-screen w-80',
        'top' => 'left-0 right-0 top-0 w-full h-80',
        'bottom' => 'left-0 right-0 bottom-0 w-full h-80',
    ];

    // Transform classes for hiding
    $transformClasses = [
        'left' => '-translate-x-full',
        'right' => 'translate-x-full',
        'top' => '-translate-y-full',
        'bottom' => 'translate-y-full',
    ];

    // Width classes for left/right drawers
    $widthClasses = [
        'default' => 'w-80',
        'large' => 'w-96',
        'full' => 'w-full sm:w-96',
    ];

    $baseClasses = 'fixed z-40 overflow-y-auto transition-transform bg-white dark:bg-gray-800';

    if (in_array($position, ['left', 'right'])) {
        $sizeClass = $widthClasses[$width];
        $drawerClasses = $baseClasses . ' ' . 'top-0 h-screen ' . $sizeClass;
        $drawerClasses .= $position === 'left' ? ' left-0' : ' right-0';
    } else {
        $drawerClasses = $baseClasses . ' ' . $positionClasses[$position];
    }

    $initialTransform = $transformClasses[$position];
@endphp

<div
    x-data="{ open: false }"
    x-on:open-drawer-{{ $drawerId }}.window="open = true"
    x-on:close-drawer-{{ $drawerId }}.window="open = false"
    x-on:keydown.escape.window="open = false"
>
    {{-- Backdrop --}}
    @if($backdrop)
        <div
            x-show="open"
            x-transition:enter="transition-opacity ease-linear duration-300"
            x-transition:enter-start="opacity-0"
            x-transition:enter-end="opacity-100"
            x-transition:leave="transition-opacity ease-linear duration-300"
            x-transition:leave-start="opacity-100"
            x-transition:leave-end="opacity-0"
            @click="open = false"
            class="fixed inset-0 bg-gray-900/50 dark:bg-gray-900/80 z-30"
            style="display: none;"
        ></div>
    @endif

    {{-- Drawer --}}
    <div
        id="{{ $drawerId }}"
        x-show="open"
        x-transition:enter="transition ease-in-out duration-300 transform"
        x-transition:enter-start="{{ $initialTransform }}"
        x-transition:enter-end="translate-x-0 translate-y-0"
        x-transition:leave="transition ease-in-out duration-300 transform"
        x-transition:leave-start="translate-x-0 translate-y-0"
        x-transition:leave-end="{{ $initialTransform }}"
        class="{{ $drawerClasses }}"
        tabindex="-1"
        aria-labelledby="{{ $drawerId }}-label"
        style="display: none;"
        @if(!$bodyScrolling)
            x-on:open-drawer-{{ $drawerId }}.window="document.body.style.overflow = 'hidden'"
            x-on:close-drawer-{{ $drawerId }}.window="document.body.style.overflow = ''"
        @endif
    >
        {{-- Header --}}
        @if($title || $closeButton)
            <div class="flex items-center justify-between p-4 border-b border-gray-200 dark:border-gray-700">
                @if($title)
                    <h5 id="{{ $drawerId }}-label" class="text-base font-semibold text-gray-500 uppercase dark:text-gray-400">
                        {{ $title }}
                    </h5>
                @endif

                @if($closeButton)
                    <button
                        type="button"
                        @click="open = false"
                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 inline-flex items-center justify-center dark:hover:bg-gray-600 dark:hover:text-white"
                    >
                        <x-ui::icon.close />
                        <span class="sr-only">Close menu</span>
                    </button>
                @endif
            </div>
        @endif

        {{-- Content --}}
        <div class="p-4">
            {{ $slot }}
        </div>
    </div>
</div>

@push('scripts')
<script>
    // Helper functions for opening/closing drawer
    window.openDrawer = function(drawerId) {
        window.dispatchEvent(new CustomEvent('open-drawer-' + drawerId));
    };

    window.closeDrawer = function(drawerId) {
        window.dispatchEvent(new CustomEvent('close-drawer-' + drawerId));
    };
</script>
@endpush