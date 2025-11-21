{{-- Sidebar Component --}}
@props([
    'id' => 'sidebar',
    'fixed' => true,
    'width' => 'default', // sm (w-56), default (w-64), lg (w-72), xl (w-80)
    'position' => 'left', // left, right
    'offCanvas' => false,
    'backdrop' => true,
])

@php
    // Width classes
    $widthClasses = [
        'sm' => 'w-56',
        'default' => 'w-64',
        'lg' => 'w-72',
        'xl' => 'w-80',
    ];

    $widthClass = $widthClasses[$width] ?? $widthClasses['default'];

    // Base classes
    $baseClasses = 'h-full bg-white border-gray-200 dark:bg-gray-800 dark:border-gray-700';

    if ($fixed) {
        $baseClasses .= ' fixed top-0 z-40';
        $baseClasses .= $position === 'right' ? ' right-0 border-l' : ' left-0 border-r';
    }

    if ($offCanvas) {
        $baseClasses .= ' -translate-x-full transition-transform';
        if ($position === 'right') {
            $baseClasses .= ' translate-x-full';
        }
    } else {
        $baseClasses .= ' sm:translate-x-0';
    }
@endphp

@if($offCanvas && $backdrop)
    {{-- Backdrop --}}
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

<aside
    id="{{ $id }}"
    {{ $attributes->merge(['class' => $baseClasses . ' ' . $widthClass]) }}
    @if($offCanvas)
        x-data="{ open: false }"
        :class="{ 'translate-x-0': open }"
        x-cloak
    @endif
    aria-label="Sidebar"
>
    <div class="h-full px-3 py-4 overflow-y-auto">
        {{ $slot }}
    </div>
</aside>

@if($offCanvas)
    @once
        @push('scripts')
        <script>
            document.addEventListener('alpine:init', () => {
                Alpine.data('sidebar', () => ({
                    open: false,
                    toggle() {
                        this.open = !this.open;
                    },
                    close() {
                        this.open = false;
                    }
                }));
            });

            // Toggle sidebar from external buttons
            document.addEventListener('DOMContentLoaded', function() {
                const toggleButtons = document.querySelectorAll('[data-sidebar-toggle="{{ $id }}"]');
                toggleButtons.forEach(button => {
                    button.addEventListener('click', function() {
                        const sidebar = document.getElementById('{{ $id }}');
                        if (sidebar.__x) {
                            sidebar.__x.$data.toggle();
                        }
                    });
                });
            });
        </script>
        @endpush
    @endonce
@endif