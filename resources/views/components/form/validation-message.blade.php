@props([
    'error' => null,
    'success' => null,
    'helper' => null,
])

@if($error)
    <p {{ $attributes->merge(['class' => 'mt-2 text-sm text-red-600 dark:text-red-500']) }}>
        <span class="font-medium">{{ $error }}</span>
    </p>
@elseif($success)
    <p {{ $attributes->merge(['class' => 'mt-2 text-sm text-green-600 dark:text-green-500']) }}>
        <span class="font-medium">{{ $success }}</span>
    </p>
@elseif($helper)
    <p {{ $attributes->merge(['class' => 'mt-2 text-sm text-gray-500 dark:text-gray-400']) }}>
        {{ $helper }}
    </p>
@endif