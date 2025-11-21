{{-- Dropdown Search Input --}}
@props([
    'placeholder' => 'Search...',
])

<div class="p-3">
    <x-ui::form.search-input
        id="input-group-search"
        :placeholder="$placeholder"
        size="sm"
        {{ $attributes }}
    />
</div>