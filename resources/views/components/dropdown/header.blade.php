{{-- Dropdown Header (User Info Card) --}}
@props([
    'avatar' => null,
    'name' => null,
    'email' => null,
    'badge' => null,
])

<div class="px-4 py-3 text-sm text-gray-900 dark:text-white">
    <div class="flex items-center space-x-3">
        @if($avatar)
            <img class="w-10 h-10 rounded-full" src="{{ $avatar }}" alt="{{ $name }}">
        @endif

        <div class="flex-1 min-w-0">
            @if($name)
                <div class="font-semibold truncate">{{ $name }}</div>
            @endif

            @if($email)
                <div class="text-sm text-gray-500 truncate dark:text-gray-400">{{ $email }}</div>
            @endif

            @if($badge)
                <span class="inline-flex items-center px-2 py-0.5 mt-1 text-xs font-medium rounded bg-blue-100 text-blue-800 dark:bg-blue-900 dark:text-blue-300">
                    {{ $badge }}
                </span>
            @endif
        </div>
    </div>

    @if($slot->isNotEmpty())
        <div class="mt-2">
            {{ $slot }}
        </div>
    @endif
</div>