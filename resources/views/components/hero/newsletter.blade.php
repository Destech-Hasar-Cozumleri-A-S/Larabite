{{-- Hero Newsletter Signup --}}
@props([
    'placeholder' => 'Enter your email',
    'buttonText' => 'Subscribe',
    'action' => null,
    'helper' => null,
])

<form
    @if($action) action="{{ $action }}" @endif
    method="POST"
    {{ $attributes->merge(['class' => 'w-full max-w-md mx-auto']) }}
>
    @csrf

    <div class="flex flex-col sm:flex-row gap-2">
        <div class="flex-1">
            <x-ui::form.input
                type="email"
                name="email"
                :placeholder="$placeholder"
                required
                leadingIcon='<svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 16">
                    <path d="m10.036 8.278 9.258-7.79A1.979 1.979 0 0 0 18 0H2A1.987 1.987 0 0 0 .641.541l9.395 7.737Z"/>
                    <path d="M11.241 9.817c-.36.275-.801.425-1.255.427-.428 0-.845-.138-1.187-.395L0 2.6V14a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V2.5l-8.759 7.317Z"/>
                </svg>'
            />
        </div>
        <x-ui::button
            type="submit"
            variant="primary"
            size="md"
        >
            {{ $buttonText }}
        </x-button>
    </div>

    @if($helper)
        <p class="mt-2 text-sm text-gray-500 dark:text-gray-400">
            {{ $helper }}
        </p>
    @endif
</form>