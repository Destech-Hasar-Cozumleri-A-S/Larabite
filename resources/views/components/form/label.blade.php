@props([
    'for' => null,
    'required' => false,
])

<label {{ $attributes->merge(['for' => $for, 'class' => 'block mb-2 text-sm font-medium text-gray-900 dark:text-white']) }}>
    {{ $slot }}
    @if($required)
        <span class="text-red-500">*</span>
    @endif
</label>