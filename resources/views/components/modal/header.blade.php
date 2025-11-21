{{-- Modal Header --}}
@props([
    'title' => null,
    'closeable' => true,
])

<div {{ $attributes->merge(['class' => 'flex items-center justify-between p-4 md:p-5 border-b border-gray-200 rounded-t dark:border-gray-600']) }}>
    @if($title)
        <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
            {{ $title }}
        </h3>
    @else
        <div class="text-xl font-semibold text-gray-900 dark:text-white">
            {{ $slot }}
        </div>
    @endif

    @if($closeable)
        <button
            type="button"
            @click="open = false"
            class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
        >
            <x-icon.close />
            <span class="sr-only">Close modal</span>
        </button>
    @endif
</div>