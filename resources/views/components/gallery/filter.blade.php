{{-- Gallery Filter Button --}}
@props([
    'active' => false,
    'category' => null,
])

@php
    if ($active) {
        $buttonClasses = 'inline-flex items-center px-4 py-2 text-sm font-medium text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800';
    } else {
        $buttonClasses = 'inline-flex items-center px-4 py-2 text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-lg hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-200 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700 dark:focus:ring-gray-700';
    }
@endphp

<button
    type="button"
    @if($category) data-filter="{{ $category }}" @endif
    {{ $attributes->merge(['class' => $buttonClasses]) }}
>
    {{ $slot }}
</button>