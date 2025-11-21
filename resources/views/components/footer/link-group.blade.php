{{-- Footer Link Group (Section with Title and Links) --}}
@props([
    'title' => null,
])

<div {{ $attributes->merge(['class' => '']) }}>
    @if($title)
        <h2 class="mb-6 text-sm font-semibold text-gray-900 uppercase dark:text-white">
            {{ $title }}
        </h2>
    @endif

    <ul class="text-gray-500 dark:text-gray-400 font-medium">
        {{ $slot }}
    </ul>
</div>