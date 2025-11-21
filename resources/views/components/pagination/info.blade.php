{{-- Pagination Info --}}
@props([
    'paginator' => null,
])

@if($paginator && $paginator->total() > 0)
    <div {{ $attributes->merge(['class' => 'text-sm text-gray-700 dark:text-gray-400']) }}>
        Showing
        <span class="font-semibold text-gray-900 dark:text-white">{{ $paginator->firstItem() }}</span>
        to
        <span class="font-semibold text-gray-900 dark:text-white">{{ $paginator->lastItem() }}</span>
        of
        <span class="font-semibold text-gray-900 dark:text-white">{{ $paginator->total() }}</span>
        {{ Str::plural('entry', $paginator->total()) }}
    </div>
@endif