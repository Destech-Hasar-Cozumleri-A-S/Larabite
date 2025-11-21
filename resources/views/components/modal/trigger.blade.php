{{-- Modal Trigger Button --}}
@props([
    'target' => null,
])

<button
    type="button"
    @if($target) @click="document.getElementById('{{ $target }}').querySelector('[x-data]').__x.$data.open = true" @endif
    {{ $attributes->merge(['class' => '']) }}
>
    {{ $slot }}
</button>