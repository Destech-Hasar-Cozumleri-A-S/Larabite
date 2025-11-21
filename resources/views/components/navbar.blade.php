{{-- Navbar Container --}}
@props([
    'fixed' => false,
    'sticky' => false,
    'border' => true,
    'shadow' => false,
    'transparent' => false,
])

@php
    $baseClasses = 'w-full z-50';

    if ($fixed) {
        $baseClasses .= ' fixed top-0 start-0';
    } elseif ($sticky) {
        $baseClasses .= ' sticky top-0';
    }

    if (!$transparent) {
        $baseClasses .= ' bg-white dark:bg-gray-900';
    }

    if ($border) {
        $baseClasses .= ' border-b border-gray-200 dark:border-gray-700';
    }

    if ($shadow) {
        $baseClasses .= ' shadow-md';
    }
@endphp

<nav {{ $attributes->merge(['class' => $baseClasses]) }}>
    <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
        {{ $slot }}
    </div>
</nav>