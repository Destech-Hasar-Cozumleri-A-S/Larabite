{{-- Dropdown Notification Item --}}
@props([
    'avatar' => null,
    'title' => null,
    'message' => null,
    'time' => null,
    'href' => '#',
    'unread' => false,
])

<a
    href="{{ $href }}"
    {{ $attributes->merge(['class' => 'flex px-4 py-3 hover:bg-gray-100 dark:hover:bg-gray-700 ' . ($unread ? 'bg-blue-50 dark:bg-gray-800' : '')]) }}
>
    @if($avatar)
        <div class="flex-shrink-0">
            <img class="w-11 h-11 rounded-full" src="{{ $avatar }}" alt="{{ $title }}">
            @if($unread)
                <div class="absolute flex items-center justify-center w-5 h-5 ms-6 -mt-5 bg-blue-600 border border-white rounded-full dark:border-gray-800">
                    <svg class="w-2 h-2 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 18">
                        <path d="M1 18h16a1 1 0 0 0 1-1v-6h-4.439a.99.99 0 0 0-.908.6 3.978 3.978 0 0 1-7.306 0 .99.99 0 0 0-.908-.6H0v6a1 1 0 0 0 1 1Z"/>
                        <path d="M4.439 9a2.99 2.99 0 0 1 2.742 1.8 1.977 1.977 0 0 0 3.638 0A2.99 2.99 0 0 1 13.561 9H17.8L15.977.783A1 1 0 0 0 15 0H3a1 1 0 0 0-.977.783L.2 9h4.239Z"/>
                    </svg>
                </div>
            @endif
        </div>
    @endif

    <div class="w-full {{ $avatar ? 'ps-3' : '' }}">
        @if($title)
            <div class="text-gray-500 text-sm mb-1.5 dark:text-gray-400">
                <span class="font-semibold text-gray-900 dark:text-white">{{ $title }}</span>
                @if($message)
                    {{ $message }}
                @endif
            </div>
        @else
            <div class="text-sm text-gray-500 dark:text-gray-400">
                {{ $slot }}
            </div>
        @endif

        @if($time)
            <div class="text-xs text-blue-600 dark:text-blue-500">
                {{ $time }}
            </div>
        @endif
    </div>
</a>