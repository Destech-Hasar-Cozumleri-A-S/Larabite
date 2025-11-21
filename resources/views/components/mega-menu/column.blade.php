{{-- Mega Menu Column --}}
@props([
    'title' => null,
])

<div {{ $attributes->merge(['class' => 'space-y-3']) }}>
    @if($title)
        <h3 class="text-sm font-semibold text-gray-900 uppercase dark:text-white mb-3">
            {{ $title }}
        </h3>
    @endif

    <div class="space-y-1">
        {{ $slot }}
    </div>
</div>