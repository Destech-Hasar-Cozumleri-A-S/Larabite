@props([
    'ctaLabel' => 'Create',
    'ctaHref' => '#',
    'ctaWire' => null,
])

<div
    {{ $attributes->merge(['class' => 'fixed bottom-0 start-0 z-50 w-full h-16']) }}
>
    <div class="grid h-full max-w-lg grid-cols-5 mx-auto">
        {{ $slot }}

        @if(isset($cta))
            {{ $cta }}
        @else
            <div class="flex items-center justify-center">
                @if($ctaWire)
                    <button
                        type="button"
                        wire:click="{{ $ctaWire }}"
                        class="inline-flex items-center justify-center w-10 h-10 font-medium bg-blue-600 rounded-full hover:bg-blue-700 group focus:ring-4 focus:ring-blue-300 focus:outline-none dark:focus:ring-blue-800"
                    >
                        <svg class="w-4 h-4 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 1v16M1 9h16"/>
                        </svg>
                        <span class="sr-only">{{ $ctaLabel }}</span>
                    </button>
                @else
                    <a
                        href="{{ $ctaHref }}"
                        class="inline-flex items-center justify-center w-10 h-10 font-medium bg-blue-600 rounded-full hover:bg-blue-700 group focus:ring-4 focus:ring-blue-300 focus:outline-none dark:focus:ring-blue-800"
                    >
                        <svg class="w-4 h-4 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 1v16M1 9h16"/>
                        </svg>
                        <span class="sr-only">{{ $ctaLabel }}</span>
                    </a>
                @endif
            </div>
        @endif
    </div>
</div>