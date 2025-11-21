{{-- Hero with Search Form --}}
@props([
    'placeholder' => 'Search...',
    'buttonText' => 'Search',
    'action' => null,
    'method' => 'GET',
])

<form
    @if($action) action="{{ $action }}" @endif
    method="{{ $method }}"
    {{ $attributes->merge(['class' => 'w-full max-w-md mx-auto']) }}
>
    @if($method !== 'GET')
        @csrf
    @endif

    <x-ui::form.search-input
        id="default-search"
        name="q"
        :placeholder="$placeholder"
        required
        size="lg"
    >
        <x-slot name="button">
            <x-ui::button
                type="submit"
                variant="primary"
                size="sm"
                class="absolute end-2.5 bottom-2.5"
            >
                {{ $buttonText }}
            </x-button>
        </x-slot>
    </x-form.search-input>
</form>