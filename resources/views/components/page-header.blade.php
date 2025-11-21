@props([
    'title',
    'description' => null,
])

<div class="mb-6 md:mb-8">
    <h1 class="mb-2 text-2xl md:text-4xl font-extrabold tracking-tight text-gray-900 dark:text-white">
        {{ $title }}
    </h1>
    @if($description)
        <p class="text-sm md:text-lg font-normal text-gray-500 dark:text-gray-400">
            {{ $description }}
        </p>
    @endif
</div>