@props([
    'type' => 'info', // success, error, warning, info
    'dismissible' => true,
    'id' => null,
])

@php
    $types = include base_path('vendor/destech-hasar-cozumleri-a-s/larabite/resources/views/components/config/alert-types.php');

    // Handle danger alias (same as error)
    $actualType = $type === 'danger' ? 'error' : $type;
    $config = $types[$actualType];
    $alertId = $id ?? 'alert-' . $type;

    // Use iconInfo for standard alert (info icon)
    $config['icon'] = $config['iconInfo'];
@endphp

<div
    id="{{ $alertId }}"
    class="flex items-center p-4 mb-4 {{ $config['text'] }} rounded-lg {{ $config['bg'] }}"
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
            <x-ui::icon.close />
        </button>
    @endif
</div>