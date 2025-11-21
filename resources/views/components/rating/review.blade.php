{{-- Review Card Component --}}
@props([
    'rating' => 0,
    'author' => null,
    'authorAvatar' => null,
    'date' => null,
    'verified' => false,
    'helpful' => null,
    'content' => null,
])

@php
    $dateFormatted = $date ? ($date instanceof \Carbon\Carbon ? $date->diffForHumans() : $date) : null;
@endphp

<div {{ $attributes->merge(['class' => 'bg-white dark:bg-gray-800 rounded-lg p-4 border border-gray-200 dark:border-gray-700']) }}>
    {{-- Header --}}
    <div class="flex items-start justify-between mb-3">
        <div class="flex items-center gap-3">
            @if($authorAvatar)
                <x-ui.avatar
                    :src="$authorAvatar"
                    :alt="$author ?? 'User'"
                    size="md"
                />
            @endif

            <div>
                <div class="flex items-center gap-2">
                    @if($author)
                        <span class="font-semibold text-gray-900 dark:text-white">
                            {{ $author }}
                        </span>
                    @endif

                    @if($verified)
                        <span class="inline-flex items-center gap-1 text-xs text-green-600 dark:text-green-400">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M6.267 3.455a3.066 3.066 0 001.745-.723 3.066 3.066 0 013.976 0 3.066 3.066 0 001.745.723 3.066 3.066 0 012.812 2.812c.051.643.304 1.254.723 1.745a3.066 3.066 0 010 3.976 3.066 3.066 0 00-.723 1.745 3.066 3.066 0 01-2.812 2.812 3.066 3.066 0 00-1.745.723 3.066 3.066 0 01-3.976 0 3.066 3.066 0 00-1.745-.723 3.066 3.066 0 01-2.812-2.812 3.066 3.066 0 00-.723-1.745 3.066 3.066 0 010-3.976 3.066 3.066 0 00.723-1.745 3.066 3.066 0 012.812-2.812zm7.44 5.252a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                            </svg>
                            Verified
                        </span>
                    @endif
                </div>

                @if($dateFormatted)
                    <span class="text-xs text-gray-500 dark:text-gray-400">
                        {{ $dateFormatted }}
                    </span>
                @endif
            </div>
        </div>

        <x-ui.rating
            :rating="$rating"
            size="sm"
            readonly
        />
    </div>

    {{-- Content --}}
    @if($content || $slot->isNotEmpty())
        <div class="text-sm text-gray-700 dark:text-gray-300 mb-3">
            {{ $content ?? $slot }}
        </div>
    @endif

    {{-- Footer --}}
    @if($helpful !== null)
        <div class="flex items-center gap-4 pt-3 border-t border-gray-200 dark:border-gray-700">
            <span class="text-xs text-gray-500 dark:text-gray-400">
                Was this helpful?
            </span>

            <div class="flex items-center gap-2">
                <button
                    type="button"
                    wire:click="markHelpful({{ $helpful['id'] ?? 0 }}, true)"
                    class="inline-flex items-center gap-1 text-xs text-gray-500 hover:text-gray-700 dark:text-gray-400 dark:hover:text-gray-300"
                >
                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M2 10.5a1.5 1.5 0 113 0v6a1.5 1.5 0 01-3 0v-6zM6 10.333v5.43a2 2 0 001.106 1.79l.05.025A4 4 0 008.943 18h5.416a2 2 0 001.962-1.608l1.2-6A2 2 0 0015.56 8H12V4a2 2 0 00-2-2 1 1 0 00-1 1v.667a4 4 0 01-.8 2.4L6.8 7.933a4 4 0 00-.8 2.4z"></path>
                    </svg>
                    <span>{{ $helpful['yes'] ?? 0 }}</span>
                </button>

                <button
                    type="button"
                    wire:click="markHelpful({{ $helpful['id'] ?? 0 }}, false)"
                    class="inline-flex items-center gap-1 text-xs text-gray-500 hover:text-gray-700 dark:text-gray-400 dark:hover:text-gray-300"
                >
                    <svg class="w-4 h-4 rotate-180" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M2 10.5a1.5 1.5 0 113 0v6a1.5 1.5 0 01-3 0v-6zM6 10.333v5.43a2 2 0 001.106 1.79l.05.025A4 4 0 008.943 18h5.416a2 2 0 001.962-1.608l1.2-6A2 2 0 0015.56 8H12V4a2 2 0 00-2-2 1 1 0 00-1 1v.667a4 4 0 01-.8 2.4L6.8 7.933a4 4 0 00-.8 2.4z"></path>
                    </svg>
                    <span>{{ $helpful['no'] ?? 0 }}</span>
                </button>
            </div>
        </div>
    @endif
</div>