{{-- User Profile Popover --}}
@props([
    'user' => null,
    'trigger' => 'hover',
    'placement' => 'bottom',
])

<x-ui.popover :trigger="$trigger" :placement="$placement" width="md" {{ $attributes }}>
    <x-slot:trigger>
        {{ $slot }}
    </x-slot:trigger>

    <x-slot:content>
        @if($user)
            <div class="p-3">
                <div class="flex items-center justify-between mb-2">
                    <x-ui.avatar
                        :src="$user->avatar"
                        :alt="$user->name"
                        size="lg"
                    />
                </div>

                <p class="text-base font-semibold leading-none text-gray-900 dark:text-white">
                    {{ $user->name }}
                </p>

                @if($user->email)
                    <p class="mb-3 text-sm font-normal">
                        {{ $user->email }}
                    </p>
                @endif

                @if($user->bio)
                    <p class="mb-4 text-sm">
                        {{ Str::limit($user->bio, 100) }}
                    </p>
                @endif

                @if(isset($user->followers_count) && isset($user->following_count))
                    <ul class="flex text-sm mb-4">
                        <li class="me-2">
                            <span class="font-semibold text-gray-900 dark:text-white">
                                {{ $user->followers_count }}
                            </span>
                            <span>Followers</span>
                        </li>
                        <li>
                            <span class="font-semibold text-gray-900 dark:text-white">
                                {{ $user->following_count }}
                            </span>
                            <span>Following</span>
                        </li>
                    </ul>
                @endif

                @auth
                    @if(auth()->id() !== $user->id)
                        <x-ui.button
                            variant="primary"
                            size="sm"
                            class="w-full"
                            wire:click="follow({{ $user->id }})"
                        >
                            Follow
                        </x-ui.button>
                    @endif
                @endauth
            </div>
        @else
            {{ $content ?? '' }}
        @endif
    </x-slot:content>
</x-ui.popover>