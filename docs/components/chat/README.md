# Chat Bubble / Message Components

Chat bubble components are used for instant messaging, comments, social feeds, and any interface requiring conversational UI patterns. These components visualize sent and received messages with avatars, timestamps, status indicators, and interactive elements.

## Overview

Chat bubbles provide a familiar messaging interface pattern with:
- Message direction (sent/received)
- User avatars and names
- Timestamps
- Delivery/read status
- File attachments support
- Voice messages
- Link previews
- Nested replies/threads

---

## 1. Basic Chat Bubbles

### Sent Message (Right-Aligned)

```blade
<div class="flex items-start gap-2.5 justify-end">
    <div class="flex flex-col gap-1 max-w-[320px]">
        <div class="flex items-center space-x-2 justify-end">
            <span class="text-sm font-semibold text-gray-900 dark:text-white">You</span>
        </div>
        <div class="flex flex-col leading-1.5 p-4 border-gray-200 bg-blue-600 rounded-s-xl rounded-ee-xl">
            <p class="text-sm font-normal text-white">
                That's awesome. I think our users will really appreciate the improvements.
            </p>
        </div>
        <span class="text-sm font-normal text-gray-500 dark:text-gray-400 text-right">11:46</span>
    </div>
    <img class="w-8 h-8 rounded-full" src="https://ui-avatars.com/api/?name=You" alt="User avatar">
</div>
```

### Received Message (Left-Aligned)

```blade
<div class="flex items-start gap-2.5">
    <img class="w-8 h-8 rounded-full" src="https://ui-avatars.com/api/?name=Jese+Leos" alt="Jese Leos">
    <div class="flex flex-col gap-1 max-w-[320px]">
        <div class="flex items-center space-x-2">
            <span class="text-sm font-semibold text-gray-900 dark:text-white">Jese Leos</span>
        </div>
        <div class="flex flex-col leading-1.5 p-4 border-gray-200 bg-gray-100 rounded-e-xl rounded-es-xl dark:bg-gray-700">
            <p class="text-sm font-normal text-gray-900 dark:text-white">
                That's awesome. I think our users will really appreciate the improvements.
            </p>
        </div>
        <span class="text-sm font-normal text-gray-500 dark:text-gray-400">11:46</span>
    </div>
</div>
```

### Key Design Patterns

**Border Radius:**
- Received messages: `rounded-e-xl rounded-es-xl` (right and bottom-left corners)
- Sent messages: `rounded-s-xl rounded-ee-xl` (left and bottom-right corners)
- This creates the characteristic speech bubble appearance

**Colors:**
- Sent messages: Blue background (`bg-blue-600`), white text
- Received messages: Gray background (`bg-gray-100`), dark text
- Dark mode variants included

**Layout:**
- Sent: `justify-end` (right-aligned), avatar on right
- Received: `justify-start` (left-aligned), avatar on left
- Max width: `max-w-[320px]` prevents overly wide messages

---

## 2. Message with Actions

```blade
<div class="flex items-start gap-2.5">
    <img class="w-8 h-8 rounded-full" src="https://ui-avatars.com/api/?name=Jese+Leos" alt="Jese Leos">
    <div class="flex flex-col gap-1 w-full max-w-[320px]">
        <div class="flex items-center space-x-2">
            <span class="text-sm font-semibold text-gray-900 dark:text-white">Jese Leos</span>
            <span class="text-sm font-normal text-gray-500 dark:text-gray-400">11:46</span>
        </div>
        <div class="flex flex-col leading-1.5 p-4 border-gray-200 bg-gray-100 rounded-e-xl rounded-es-xl dark:bg-gray-700">
            <p class="text-sm font-normal text-gray-900 dark:text-white">
                That's awesome. I think our users will really appreciate the improvements.
            </p>
        </div>
        <div class="flex items-center space-x-3 text-xs">
            {{-- Like Button --}}
            <button class="text-gray-500 hover:text-gray-700 dark:text-gray-400 dark:hover:text-gray-300">
                <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z" clip-rule="evenodd" />
                </svg>
            </button>
            {{-- Reply Button --}}
            <button class="text-gray-500 hover:text-gray-700 dark:text-gray-400 dark:hover:text-gray-300">
                <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h10a8 8 0 018 8v2M3 10l6 6m-6-6l6-6" />
                </svg>
            </button>
            {{-- More Options --}}
            <button class="text-gray-500 hover:text-gray-700 dark:text-gray-400 dark:hover:text-gray-300">
                •••
            </button>
        </div>
    </div>
</div>
```

---

## 3. Delivery Status Indicators

```blade
<div class="flex items-start gap-2.5 justify-end" x-data="{ status: 'delivered' }">
    <div class="flex flex-col gap-1 max-w-[320px]">
        <div class="flex items-center space-x-2 justify-end">
            <span class="text-sm font-semibold text-gray-900 dark:text-white">You</span>
        </div>
        <div class="flex flex-col leading-1.5 p-4 border-gray-200 bg-blue-600 rounded-s-xl rounded-ee-xl">
            <p class="text-sm font-normal text-white">
                Just sent you the updated files!
            </p>
        </div>
        <div class="flex items-center justify-end space-x-2">
            <span class="text-sm font-normal text-gray-500 dark:text-gray-400">11:46</span>
            {{-- Delivery Status Icons --}}
            <template x-if="status === 'sent'">
                {{-- Single Check (Sent) --}}
                <svg class="w-4 h-4 text-gray-500" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"/>
                </svg>
            </template>
            <template x-if="status === 'delivered'">
                {{-- Double Check (Delivered) --}}
                <div class="flex -space-x-1">
                    <svg class="w-4 h-4 text-blue-500" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"/>
                    </svg>
                    <svg class="w-4 h-4 text-blue-500" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"/>
                    </svg>
                </div>
            </template>
            <template x-if="status === 'read'">
                {{-- Avatar (Read) --}}
                <img class="w-4 h-4 rounded-full" src="https://ui-avatars.com/api/?name=Jese" alt="Read by">
            </template>
        </div>
    </div>
    <img class="w-8 h-8 rounded-full" src="https://ui-avatars.com/api/?name=You" alt="Your avatar">
</div>
```

**Status Types:**
- **Sent:** Single gray checkmark ✓
- **Delivered:** Double blue checkmarks ✓✓
- **Read:** Small avatar of reader or blue double checkmark

---

## 4. Voice Note Message

```blade
<div class="flex items-start gap-2.5">
    <img class="w-8 h-8 rounded-full" src="https://ui-avatars.com/api/?name=Bonnie+Green" alt="Bonnie Green">
    <div class="flex flex-col gap-1 max-w-[320px]">
        <div class="flex items-center space-x-2">
            <span class="text-sm font-semibold text-gray-900 dark:text-white">Bonnie Green</span>
            <span class="text-sm font-normal text-gray-500 dark:text-gray-400">11:42</span>
        </div>
        <div class="flex flex-col leading-1.5 p-4 border-gray-200 bg-gray-100 rounded-e-xl rounded-es-xl dark:bg-gray-700">
            <div class="flex items-center space-x-3">
                {{-- Play Button --}}
                <button class="inline-flex self-center items-center p-2 text-sm font-medium text-center text-gray-900 bg-gray-100 rounded-full hover:bg-gray-200 dark:text-white dark:bg-gray-700 dark:hover:bg-gray-600">
                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M6.3 2.841A1.5 1.5 0 004 4.11V15.89a1.5 1.5 0 002.3 1.269l9.344-5.89a1.5 1.5 0 000-2.538L6.3 2.84z"/>
                    </svg>
                </button>

                {{-- Waveform Visualization --}}
                <div class="flex-1 flex items-center gap-1">
                    <div class="w-1 h-2 bg-gray-400 rounded-full"></div>
                    <div class="w-1 h-4 bg-gray-400 rounded-full"></div>
                    <div class="w-1 h-6 bg-gray-400 rounded-full"></div>
                    <div class="w-1 h-4 bg-gray-400 rounded-full"></div>
                    <div class="w-1 h-8 bg-blue-600 rounded-full"></div>
                    <div class="w-1 h-4 bg-gray-300 rounded-full"></div>
                    <div class="w-1 h-3 bg-gray-300 rounded-full"></div>
                    <div class="w-1 h-5 bg-gray-300 rounded-full"></div>
                </div>

                {{-- Duration --}}
                <span class="text-sm font-medium text-gray-900 dark:text-white">3:42</span>
            </div>
        </div>
    </div>
</div>
```

---

## 5. File Attachment Message

```blade
<div class="flex items-start gap-2.5">
    <img class="w-8 h-8 rounded-full" src="https://ui-avatars.com/api/?name=Bonnie+Green" alt="Bonnie Green">
    <div class="flex flex-col gap-1 max-w-[320px]">
        <div class="flex items-center space-x-2">
            <span class="text-sm font-semibold text-gray-900 dark:text-white">Bonnie Green</span>
            <span class="text-sm font-normal text-gray-500 dark:text-gray-400">11:42</span>
        </div>
        <div class="flex flex-col leading-1.5 p-4 border-gray-200 bg-gray-100 rounded-e-xl rounded-es-xl dark:bg-gray-700">
            {{-- File Info --}}
            <div class="flex items-start bg-gray-50 dark:bg-gray-600 rounded-xl p-2">
                <div class="me-2">
                    <span class="flex items-center gap-2 text-sm font-medium text-gray-900 dark:text-white pb-2">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M4 4a2 2 0 012-2h4.586A2 2 0 0112 2.586L15.414 6A2 2 0 0116 7.414V16a2 2 0 01-2 2H6a2 2 0 01-2-2V4z"/>
                        </svg>
                        Project_Report.pdf
                    </span>
                    <span class="flex text-xs font-normal text-gray-500 dark:text-gray-400 gap-2">
                        12 Pages
                        <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M4 4a2 2 0 012-2h4.586A2 2 0 0112 2.586L15.414 6A2 2 0 0116 7.414V16a2 2 0 01-2 2H6a2 2 0 01-2-2V4z"/>
                        </svg>
                        2.3 MB
                    </span>
                </div>
                <div class="inline-flex self-center items-center">
                    <button class="inline-flex self-center items-center p-2 text-sm font-medium text-center text-gray-900 bg-gray-50 rounded-lg hover:bg-gray-100 dark:text-white dark:bg-gray-600 dark:hover:bg-gray-500">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M10 12a2 2 0 100-4 2 2 0 000 4z"/>
                            <path fill-rule="evenodd" d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z" clip-rule="evenodd"/>
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
```

---

## 6. Image Message

### Single Image

```blade
<div class="flex items-start gap-2.5">
    <img class="w-8 h-8 rounded-full" src="https://ui-avatars.com/api/?name=Bonnie+Green" alt="Bonnie Green">
    <div class="flex flex-col gap-1 max-w-[320px]">
        <div class="flex items-center space-x-2">
            <span class="text-sm font-semibold text-gray-900 dark:text-white">Bonnie Green</span>
            <span class="text-sm font-normal text-gray-500 dark:text-gray-400">11:42</span>
        </div>
        <div class="flex flex-col leading-1.5 p-4 border-gray-200 bg-gray-100 rounded-e-xl rounded-es-xl dark:bg-gray-700">
            <p class="text-sm font-normal text-gray-900 dark:text-white pb-2.5">
                Check out this cute photo!
            </p>
            <div class="group relative">
                <img src="/images/pet-photo.jpg" class="rounded-lg" alt="Pet photo">
                <button class="absolute top-2 right-2 inline-flex self-center items-center p-2 text-sm font-medium text-center text-white bg-gray-900/50 rounded-lg hover:bg-gray-900/70 opacity-0 group-hover:opacity-100 transition-opacity">
                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M10 12a2 2 0 100-4 2 2 0 000 4z"/>
                        <path fill-rule="evenodd" d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z" clip-rule="evenodd"/>
                    </svg>
                </button>
            </div>
        </div>
    </div>
</div>
```

### Multiple Images (Gallery)

```blade
<div class="flex items-start gap-2.5">
    <img class="w-8 h-8 rounded-full" src="https://ui-avatars.com/api/?name=Bonnie+Green" alt="Bonnie Green">
    <div class="flex flex-col gap-1 max-w-[320px]">
        <div class="flex items-center space-x-2">
            <span class="text-sm font-semibold text-gray-900 dark:text-white">Bonnie Green</span>
            <span class="text-sm font-normal text-gray-500 dark:text-gray-400">11:42</span>
        </div>
        <div class="flex flex-col leading-1.5 p-4 border-gray-200 bg-gray-100 rounded-e-xl rounded-es-xl dark:bg-gray-700">
            <p class="text-sm font-normal text-gray-900 dark:text-white pb-2.5">
                Here are the photos from the event
            </p>
            <div class="grid grid-cols-2 gap-2">
                <div class="group relative">
                    <img src="/images/photo1.jpg" class="rounded-lg" alt="Photo 1">
                </div>
                <div class="group relative">
                    <img src="/images/photo2.jpg" class="rounded-lg" alt="Photo 2">
                </div>
                <div class="group relative">
                    <img src="/images/photo3.jpg" class="rounded-lg" alt="Photo 3">
                </div>
                <div class="group relative">
                    <div class="absolute w-full h-full bg-gray-900/50 rounded-lg flex items-center justify-center">
                        <span class="text-2xl font-bold text-white">+3</span>
                    </div>
                    <img src="/images/photo4.jpg" class="rounded-lg" alt="Photo 4">
                </div>
            </div>
            <button class="text-sm font-medium text-blue-600 hover:underline dark:text-blue-500 text-left mt-2">
                Save all
            </button>
        </div>
    </div>
</div>
```

---

## 7. Link Preview

```blade
<div class="flex items-start gap-2.5">
    <img class="w-8 h-8 rounded-full" src="https://ui-avatars.com/api/?name=Bonnie+Green" alt="Bonnie Green">
    <div class="flex flex-col gap-1 max-w-[320px]">
        <div class="flex items-center space-x-2">
            <span class="text-sm font-semibold text-gray-900 dark:text-white">Bonnie Green</span>
            <span class="text-sm font-normal text-gray-500 dark:text-gray-400">11:42</span>
        </div>
        <div class="flex flex-col leading-1.5 p-4 border-gray-200 bg-gray-100 rounded-e-xl rounded-es-xl dark:bg-gray-700">
            <p class="text-sm font-normal text-gray-900 dark:text-white pb-2">
                Check out this article!
            </p>
            {{-- URL Preview Card --}}
            <a href="#" class="bg-gray-50 dark:bg-gray-600 rounded-xl p-3 hover:bg-gray-100 dark:hover:bg-gray-500 transition-colors">
                <img src="/images/article-thumb.jpg" class="rounded-lg mb-2" alt="Article thumbnail">
                <span class="text-sm font-medium text-gray-900 dark:text-white mb-1 block">
                    Complete Guide to Pet Care
                </span>
                <span class="text-xs font-normal text-gray-500 dark:text-gray-400 block">
                    Learn everything you need to know about taking care of your beloved pets...
                </span>
                <span class="text-xs font-normal text-blue-600 dark:text-blue-500 mt-1 inline-flex items-center">
                    <svg class="w-3 h-3 me-1" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M12.586 4.586a2 2 0 112.828 2.828l-3 3a2 2 0 01-2.828 0 1 1 0 00-1.414 1.414 4 4 0 005.656 0l3-3a4 4 0 00-5.656-5.656l-1.5 1.5a1 1 0 101.414 1.414l1.5-1.5zm-5 5a2 2 0 012.828 0 1 1 0 101.414-1.414 4 4 0 00-5.656 0l-3 3a4 4 0 105.656 5.656l1.5-1.5a1 1 0 10-1.414-1.414l-1.5 1.5a2 2 0 11-2.828-2.828l3-3z" clip-rule="evenodd"/>
                    </svg>
                    Flowbite.com
                </span>
            </a>
        </div>
    </div>
</div>
```

---

## 8. Real-World Example: Comment System

The existing comment component in Flowbite already uses the chat bubble pattern:

**Location:** `resources/views/components/feed/comment-item.blade.php`

```blade
<div class="space-y-2">
    {{-- Main Comment (Chat Bubble Style) --}}
    <div class="flex items-start space-x-2">
        <img
            src="{{ $comment->user->primaryDocument('avatar')->first()?->url ?? 'https://ui-avatars.com/api/?name='.urlencode($comment->user->name) }}"
            alt="{{ $comment->user->name }}"
            class="w-8 h-8 rounded-full object-cover"
        >
        <div class="flex-1">
            {{-- Message Bubble --}}
            <div class="bg-gray-100 rounded-lg px-3 py-2">
                <p class="font-semibold text-sm">{{ $comment->user->name }}</p>
                <p class="text-sm text-gray-900">
                    {!! app(\App\Services\CommentParserService::class)->formatContent($comment->content, $comment) !!}
                </p>
            </div>

            {{-- Action Buttons (Like, Reply, etc.) --}}
            <div class="flex items-center space-x-4 mt-1 text-xs text-gray-500">
                <span>{{ $comment->created_at->diffForHumans() }}</span>

                {{-- Like Button --}}
                <button wire:click="toggleCommentLike({{ $comment->id }})" class="flex items-center space-x-1 hover:text-gray-700">
                    <!-- Like icon and count -->
                </button>

                {{-- Reply Button --}}
                <button wire:click="replyToComment({{ $comment->id }})" class="flex items-center space-x-1 hover:text-gray-700">
                    <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h10a8 8 0 018 8v2M3 10l6 6m-6-6l6-6" />
                    </svg>
                    <span>{{ __('Reply') }}</span>
                </button>

                {{-- Show Replies Button --}}
                @if ($comment->replies()->count() > 0)
                    <button wire:click="toggleReplies({{ $comment->id }})" class="font-semibold hover:text-gray-700">
                        {{ $comment->replies()->count() }} {{ $comment->replies()->count() === 1 ? __('reply') : __('replies') }}
                    </button>
                @endif
            </div>
        </div>
    </div>

    {{-- Nested Replies (Chat Thread) with ml-10 indent --}}
    @if ($showRepliesForCommentId === $comment->id)
        @foreach ($comment->replies as $reply)
            <div class="ml-10 flex items-start space-x-2">
                <!-- Reply content with smaller avatar (w-6 h-6) -->
            </div>
        @endforeach
    @endif
</div>
```

---

## 9. Full Chat Interface with Livewire

### Conversation Component

```blade
<div class="flex flex-col h-screen bg-gray-50 dark:bg-gray-900">
    {{-- Chat Header --}}
    <div class="flex items-center justify-between p-4 bg-white dark:bg-gray-800 border-b border-gray-200 dark:border-gray-700">
        <div class="flex items-center space-x-3">
            <img class="w-10 h-10 rounded-full" src="{{ $recipient->avatar_url }}" alt="{{ $recipient->name }}">
            <div>
                <h3 class="text-sm font-semibold text-gray-900 dark:text-white">{{ $recipient->name }}</h3>
                <p class="text-xs text-gray-500 dark:text-gray-400">
                    {{ $recipient->is_online ? 'Online' : 'Offline' }}
                </p>
            </div>
        </div>
    </div>

    {{-- Messages Container --}}
    <div class="flex-1 overflow-y-auto p-4 space-y-4" x-ref="messagesContainer">
        @foreach($messages as $message)
            @if($message->sender_id === auth()->id())
                {{-- Sent Message --}}
                <div class="flex items-start gap-2.5 justify-end">
                    <!-- Sent message content -->
                </div>
            @else
                {{-- Received Message --}}
                <div class="flex items-start gap-2.5">
                    <!-- Received message content -->
                </div>
            @endif
        @endforeach

        {{-- Typing Indicator --}}
        @if($isTyping)
            <div class="flex items-start gap-2.5">
                <img class="w-8 h-8 rounded-full" src="{{ $recipient->avatar_url }}" alt="{{ $recipient->name }}">
                <div class="flex flex-col leading-1.5 p-4 border-gray-200 bg-gray-100 rounded-e-xl rounded-es-xl dark:bg-gray-700">
                    <div class="flex space-x-1">
                        <div class="w-2 h-2 bg-gray-400 rounded-full animate-bounce" style="animation-delay: 0s"></div>
                        <div class="w-2 h-2 bg-gray-400 rounded-full animate-bounce" style="animation-delay: 0.2s"></div>
                        <div class="w-2 h-2 bg-gray-400 rounded-full animate-bounce" style="animation-delay: 0.4s"></div>
                    </div>
                </div>
            </div>
        @endif
    </div>

    {{-- Message Input --}}
    <div class="p-4 bg-white dark:bg-gray-800 border-t border-gray-200 dark:border-gray-700">
        <form wire:submit.prevent="sendMessage" class="flex items-center space-x-2">
            <button type="button" class="text-gray-500 hover:text-gray-700 dark:text-gray-400 dark:hover:text-gray-300">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.172 7l-6.586 6.586a2 2 0 102.828 2.828l6.414-6.586a4 4 0 00-5.656-5.656l-6.415 6.585a6 6 0 108.486 8.486L20.5 13"/>
                </svg>
            </button>
            <input
                type="text"
                wire:model="newMessage"
                wire:keydown="notifyTyping"
                placeholder="Type a message..."
                class="flex-1 px-4 py-2 border border-gray-300 rounded-full focus:ring-2 focus:ring-blue-500 focus:border-transparent dark:bg-gray-700 dark:border-gray-600 dark:text-white"
            >
            <button type="submit" class="inline-flex items-center justify-center p-2 text-white bg-blue-600 rounded-full hover:bg-blue-700">
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M10.894 2.553a1 1 0 00-1.788 0l-7 14a1 1 0 001.169 1.409l5-1.429A1 1 0 009 15.571V11a1 1 0 112 0v4.571a1 1 0 00.725.962l5 1.428a1 1 0 001.17-1.408l-7-14z"/>
                </svg>
            </button>
        </form>
    </div>
</div>
```

---

## Best Practices

### 1. Avatar Handling
- Default avatar: `https://ui-avatars.com/api/?name=User+Name`
- Sizes: Main (w-8 h-8), Reply (w-6 h-6), List (w-10/w-12)
- Always provide alt text
- Use rounded-full class

### 2. Timestamp Formatting
- Use `diffForHumans()` for relative times
- Today: "11:46"
- Yesterday: "Yesterday 11:46"
- Older: "Jan 15, 11:46"

### 3. Message Direction
- Sent: `justify-end`, blue background, right-aligned
- Received: `justify-start`, gray background, left-aligned
- Avatar follows message direction

### 4. Max Width
- Messages: `max-w-[320px]` or `max-w-md`
- Prevents overly wide messages
- Better mobile experience

### 5. Delivery Status
- Sent: Single checkmark ✓
- Delivered: Double checkmark ✓✓
- Read: Blue checkmarks or avatar

### 6. Typing Indicator
- 3 animated dots (bounce)
- Stagger animation with `animation-delay`
- Show recipient avatar

### 7. Nested Replies
- Indent with `ml-10`
- Smaller avatars (w-6 h-6)
- Collapse/expand functionality

### 8. Real-time Updates
- Livewire Events + Broadcasting
- WebSocket with Laravel Echo
- Auto-scroll to latest message

### 9. Accessibility
- Proper ARIA labels
- Keyboard navigation
- Screen reader support
- Semantic HTML

### 10. Dark Mode
- Include `dark:` variants
- Maintain proper contrast
- Test in both modes

---

## Notes

- Chat bubbles use Tailwind CSS for styling
- Border radius pattern creates speech bubble effect
- Alpine.js for interactivity (typing, status)
- Livewire for real-time messaging
- Support for various content types (text, images, files, voice)
- Responsive design (mobile-first)
- Touch-friendly button sizes (min 44x44px)
- Accessibility features included
- Dark mode support throughout
