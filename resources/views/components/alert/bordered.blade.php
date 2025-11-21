@props([
    'type' => 'info', // success, error, warning, info
    'dismissible' => true,
    'id' => null,
    'accent' => false, // top border accent style
])

@php
    $types = include __DIR__ . '/../config/alert-types.blade.php';
    $config = $types[$type];
    $alertId = $id ?? 'alert-bordered-' . $type;
    $borderClass = $accent ? 'border-t-4' : 'border';

    // Use light background for bordered variant
    $config['bg'] = $config['bgLight'];
    $config['text'] = $config['textLight'];
    $config['buttonBg'] = str_replace(' dark:bg-gray-800 dark:hover:bg-gray-700', '', $config['buttonBg']);
    $config['buttonText'] = str_replace(' dark:text-green-400', '', $config['buttonText']);
    $config['buttonText'] = str_replace(' dark:text-red-400', '', $config['buttonText']);
    $config['buttonText'] = str_replace(' dark:text-yellow-400', '', $config['buttonText']);
    $config['buttonText'] = str_replace(' dark:text-blue-400', '', $config['buttonText']);
@endphp

<div
    id="{{ $alertId }}"
    class="flex items-center p-4 mb-4 {{ $config['text'] }} {{ $borderClass }} {{ $config['border'] }} rounded-lg {{ $config['bg'] }}"
    role="alert"
>
    <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
        {!! $config['icon'] !!}
    </svg>
    <span class="sr-only">{{ ucfirst($type) }}</span>
    <div class="ms-3 text-sm font-medium">
        {{ $slot }}
    </div>

    @if($dismissible)
        <button
            type="button"
            class="ms-auto -mx-1.5 -my-1.5 {{ $config['buttonBg'] }} {{ $config['buttonText'] }} rounded-lg {{ $config['ring'] }} focus:ring-2 p-1.5 inline-flex items-center justify-center h-8 w-8"
            data-dismiss-target="#{{ $alertId }}"
            aria-label="Close"
        >
            <span class="sr-only">Close</span>
            <x-icon.close />
        </button>
    @endif
</div>