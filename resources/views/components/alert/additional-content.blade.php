@props([
    'type' => 'info', // success, error, warning, info
    'title' => null,
    'actionText' => null,
    'actionHref' => null,
    'actionWireClick' => null,
    'dismissible' => true,
    'id' => null,
])

@php
    $types = include __DIR__ . '/../config/alert-types.blade.php';
    $config = $types[$type];
    $alertId = $id ?? 'alert-additional-' . $type;

    // Use light background and text for additional content variant
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
    class="p-4 mb-4 {{ $config['bg'] }} rounded-lg"
    role="alert"
>
    {{-- Header --}}
    <div class="flex items-center">
        <svg class="flex-shrink-0 w-4 h-4 me-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
            {!! $config['icon'] !!}
        </svg>
        <span class="sr-only">{{ ucfirst($type) }}</span>
        <h3 class="text-lg font-medium {{ $config['titleText'] }}">{{ $title }}</h3>

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

    {{-- Content --}}
    <div class="mt-2 mb-4 text-sm {{ $config['text'] }}">
        {{ $slot }}
    </div>

    {{-- Action Button --}}
    @if($actionText)
        <div class="flex">
            @if($actionHref)
                <a
                    href="{{ $actionHref }}"
                    class="text-white {{ $config['actionBg'] }} focus:ring-4 {{ $config['ring'] }} font-medium rounded-lg text-xs px-3 py-1.5 me-2 text-center inline-flex items-center"
                >
                    <svg class="me-2 h-3 w-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 14">
                        <path d="M10 0C4.612 0 0 5.336 0 7c0 1.742 3.546 7 10 7 6.454 0 10-5.258 10-7 0-1.664-4.612-7-10-7Zm0 10a3 3 0 1 1 0-6 3 3 0 0 1 0 6Z"/>
                    </svg>
                    {{ $actionText }}
                </a>
            @elseif($actionWireClick)
                <button
                    type="button"
                    wire:click="{{ $actionWireClick }}"
                    class="text-white {{ $config['actionBg'] }} focus:ring-4 {{ $config['ring'] }} font-medium rounded-lg text-xs px-3 py-1.5 me-2 text-center inline-flex items-center"
                >
                    {{ $actionText }}
                </button>
            @endif

            <button
                type="button"
                class="text-{{ $type === 'warning' ? 'yellow' : ($type === 'error' ? 'red' : ($type === 'success' ? 'green' : 'blue')) }}-800 bg-transparent border border-{{ $type === 'warning' ? 'yellow' : ($type === 'error' ? 'red' : ($type === 'success' ? 'green' : 'blue')) }}-800 hover:bg-{{ $type === 'warning' ? 'yellow' : ($type === 'error' ? 'red' : ($type === 'success' ? 'green' : 'blue')) }}-900 hover:text-white focus:ring-4 {{ $config['ring'] }} font-medium rounded-lg text-xs px-3 py-1.5 text-center"
                data-dismiss-target="#{{ $alertId }}"
                aria-label="Close"
            >
                Dismiss
            </button>
        </div>
    @endif
</div>