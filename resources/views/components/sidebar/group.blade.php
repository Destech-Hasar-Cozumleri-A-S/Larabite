{{-- Sidebar Menu Group --}}
@props([
    'heading' => null,
])

<ul {{ $attributes->merge(['class' => 'space-y-2 font-medium']) }}>
    @if($heading)
        <li class="px-3 pt-4 pb-2">
            <span class="text-xs font-semibold text-gray-500 uppercase dark:text-gray-400">
                {{ $heading }}
            </span>
        </li>
    @endif

    {{ $slot }}
</ul>