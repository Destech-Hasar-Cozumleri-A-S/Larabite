@props([
    'position' => 'bottom', // top, bottom
    'title' => '',
    'description' => '',
    'placeholder' => 'Enter your email',
    'buttonText' => 'Subscribe',
    'dismissible' => true,
    'id' => null,
    'wireSubmit' => null,
])

@php
    $positionClasses = [
        'top' => 'top-0',
        'bottom' => 'bottom-0',
    ];

    $bannerId = $id ?? 'banner-newsletter-' . uniqid();
@endphp

<div
    id="{{ $bannerId }}"
    tabindex="-1"
    {{ $attributes->merge(['class' => "fixed {$positionClasses[$position]} start-0 z-50 w-full bg-white border-t border-gray-200"]) }}
>
    <div class="flex flex-col md:flex-row items-start md:items-center justify-between w-full p-4 md:p-6 lg:px-8">
        <div class="flex flex-col items-start mb-3 md:mb-0 md:me-4">
            <h3 class="text-base font-semibold text-gray-900">{{ $title }}</h3>
            <p class="text-sm font-normal text-gray-500">{{ $description }}</p>
        </div>

        <form class="flex flex-col md:flex-row items-start md:items-center w-full md:w-auto space-y-2 md:space-y-0 md:space-x-2"
              @if($wireSubmit) wire:submit.prevent="{{ $wireSubmit }}" @endif
        >
            <x-ui::form.input
                type="email"
                name="email"
                :placeholder="$placeholder"
                size="base"
                :required="true"
                class="w-full md:w-64"
                {{ $attributes->whereStartsWith('wire:model') }}
            />
            <x-ui::button
                type="submit"
                variant="primary"
                size="md"
                class="w-full md:w-auto"
            >
                {{ $buttonText }}
            </x-button>
        </form>

        @if($dismissible)
            <button
                data-dismiss-target="#{{ $bannerId }}"
                type="button"
                class="flex-shrink-0 inline-flex justify-center w-7 h-7 items-center text-gray-400 hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ms-2"
            >
                <x-ui::icon.close />
                <span class="sr-only">Close banner</span>
            </button>
        @endif
    </div>
</div>