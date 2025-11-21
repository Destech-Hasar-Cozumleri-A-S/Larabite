{{-- Popover Content Wrapper --}}
@props([
    'title' => null,
])

<div {{ $attributes->merge(['class' => '']) }}>
    @if($title)
        <div class="px-3 py-2 bg-gray-100 border-b border-gray-200 rounded-t-lg dark:border-gray-600 dark:bg-gray-700">
            <h3 class="font-semibold text-gray-900 dark:text-white">{{ $title }}</h3>
        </div>
    @endif

    <div class="px-3 py-2">
        {{ $slot }}
    </div>
</div>