# Popover Component

Contextual tooltips and information displays that appear on hover or click interactions.

## Overview

The Popover component provides contextual information and tooltips using Alpine.js for smooth interactions. It supports multiple trigger methods, placements, and includes specialized variants for common use cases like user profiles and help text.

## Component Files

- `resources/views/components/ui/popover.blade.php` - Base popover component
- `resources/views/components/ui/popover/content.blade.php` - Content wrapper with optional title
- `resources/views/components/ui/popover/profile.blade.php` - User profile popover
- `resources/views/components/ui/popover/description.blade.php` - Help/info popover

## Basic Usage

### Simple Popover

```blade
<x-ui::popover trigger="hover" placement="top">
    <x-slot:trigger>
        <button>Hover me</button>
    </x-slot:trigger>

    <x-slot:content>
        <x-ui::popover.content title="Information">
            This is a helpful popover message.
        </x-ui::popover.content>
    </x-slot:content>
</x-ui::popover>
```

### Click Trigger

```blade
<x-ui::popover trigger="click" placement="bottom">
    <x-slot:trigger>
        <button>Click me</button>
    </x-slot:trigger>

    <x-slot:content>
        <div class="p-3">
            <p>This popover appears on click</p>
        </div>
    </x-slot:content>
</x-ui::popover>
```

## Props

### Base Popover Props

| Prop | Type | Default | Options | Description |
|------|------|---------|---------|-------------|
| `id` | string | `'popover-{uniqid}'` | - | Unique identifier for the popover |
| `trigger` | string | `'hover'` | `'hover'`, `'click'` | How the popover is activated |
| `placement` | string | `'top'` | `'top'`, `'bottom'`, `'left'`, `'right'` | Where the popover appears |
| `offset` | int | `8` | - | Distance from trigger element (pixels) |
| `width` | string | `'auto'` | `'auto'`, `'sm'`, `'md'`, `'lg'` | Popover width variant |
| `arrow` | bool | `true` | - | Show/hide the arrow pointer |

### Width Variants

| Variant | Width Class | Description |
|---------|-------------|-------------|
| `auto` | - | Natural width based on content |
| `sm` | `w-64` | Small (256px) |
| `md` | `w-80` | Medium (320px) |
| `lg` | `w-96` | Large (384px) |

### Content Props

| Prop | Type | Default | Description |
|------|------|---------|-------------|
| `title` | string | `null` | Optional header title |

### Profile Popover Props

| Prop | Type | Default | Description |
|------|------|---------|-------------|
| `user` | User | `null` | User model instance |
| `trigger` | string | `'hover'` | Activation method |
| `placement` | string | `'bottom'` | Popover position |

### Description Popover Props

| Prop | Type | Default | Description |
|------|------|---------|-------------|
| `title` | string | `null` | Optional tooltip title |
| `description` | string | `null` | Help text content |
| `trigger` | string | `'hover'` | Activation method |
| `placement` | string | `'top'` | Popover position |

## Popover Variants

### 1. Profile Popover

Display user information on hover/click of username or avatar.

```blade
<x-ui::popover.profile :user="$post->user" trigger="hover" placement="bottom">
    <a href="{{ route('profile.show', $post->user) }}" class="font-semibold hover:underline">
        {{ $post->user->name }}
    </a>
</x-ui::popover.profile>
```

**Profile Popover Features:**
- User avatar display
- Name and email
- Bio text (limited to 100 characters)
- Follower/following counts
- Follow button (for other users)

**Example with Avatar:**

```blade
<x-ui::popover.profile :user="$comment->user">
    <x-ui::avatar
        :src="$comment->user->avatar"
        :alt="$comment->user->name"
        size="md"
        class="cursor-pointer"
    />
</x-ui::popover.profile>
```

### 2. Description/Help Popover

Quick help text with question mark icon.

```blade
<div class="flex items-center gap-2">
    <label>Privacy Settings</label>
    <x-ui::popover.description
        title="Privacy"
        description="Control who can see your posts and profile information."
    />
</div>
```

**Custom Description Content:**

```blade
<x-ui::popover.description title="Advanced Options">
    <ul class="list-disc list-inside space-y-1">
        <li>Enable notifications</li>
        <li>Auto-save drafts</li>
        <li>Two-factor authentication</li>
    </ul>
</x-ui::popover.description>
```

### 3. Image Popover

Preview images on hover.

```blade
<x-ui::popover trigger="hover" placement="right" width="lg">
    <x-slot:trigger>
        <img src="{{ $thumbnail }}" alt="Preview" class="w-16 h-16 rounded cursor-pointer">
    </x-slot:trigger>

    <x-slot:content>
        <img src="{{ $fullImage }}" alt="Full size" class="w-full rounded-lg">
    </x-slot:content>
</x-ui::popover>
```

### 4. Company/Product Info

Display additional details about items.

```blade
<x-ui::popover trigger="hover" placement="top" width="md">
    <x-slot:trigger>
        <span class="text-blue-600 cursor-help border-b border-dashed border-blue-600">
            Flowbite Premium
        </span>
    </x-slot:trigger>

    <x-slot:content>
        <x-ui::popover.content title="Premium Subscription">
            <ul class="space-y-2 text-sm">
                <li class="flex items-center">
                    <svg class="w-4 h-4 mr-2 text-green-500" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                    </svg>
                    Unlimited posts
                </li>
                <li class="flex items-center">
                    <svg class="w-4 h-4 mr-2 text-green-500" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                    </svg>
                    Priority support
                </li>
                <li class="flex items-center">
                    <svg class="w-4 h-4 mr-2 text-green-500" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                    </svg>
                    Advanced analytics
                </li>
            </ul>
        </x-ui::popover.content>
    </x-slot:content>
</x-ui::popover>
```

## Placement Options

### Top Placement

```blade
<x-ui::popover placement="top">
    <x-slot:trigger>
        <button>Top</button>
    </x-slot:trigger>
    <x-slot:content>
        <div class="p-3">Appears above the element</div>
    </x-slot:content>
</x-ui::popover>
```

### Bottom Placement

```blade
<x-ui::popover placement="bottom">
    <x-slot:trigger>
        <button>Bottom</button>
    </x-slot:trigger>
    <x-slot:content>
        <div class="p-3">Appears below the element</div>
    </x-slot:content>
</x-ui::popover>
```

### Left Placement

```blade
<x-ui::popover placement="left">
    <x-slot:trigger>
        <button>Left</button>
    </x-slot:trigger>
    <x-slot:content>
        <div class="p-3">Appears to the left</div>
    </x-slot:content>
</x-ui::popover>
```

### Right Placement

```blade
<x-ui::popover placement="right">
    <x-slot:trigger>
        <button>Right</button>
    </x-slot:trigger>
    <x-slot:content>
        <div class="p-3">Appears to the right</div>
    </x-slot:content>
</x-ui::popover>
```

## Trigger Methods

### Hover Trigger (Default)

Shows popover when mouse enters, hides when mouse leaves.

```blade
<x-ui::popover trigger="hover">
    <x-slot:trigger>
        <span class="cursor-help">Hover over me</span>
    </x-slot:trigger>
    <x-slot:content>
        <div class="p-3">I appear on hover!</div>
    </x-slot:content>
</x-ui::popover>
```

**Best for:**
- Quick information displays
- User profile previews
- Help text and tooltips
- Non-critical content

### Click Trigger

Shows popover on click, hides when clicking outside.

```blade
<x-ui::popover trigger="click">
    <x-slot:trigger>
        <button>Click to toggle</button>
    </x-slot:trigger>
    <x-slot:content>
        <div class="p-3">
            <p class="mb-2">I stay open until you click outside!</p>
            <button class="text-blue-600 hover:underline">Take action</button>
        </div>
    </x-slot:content>
</x-ui::popover>
```

**Best for:**
- Interactive content
- Forms or actions
- Content that requires user interaction
- Mobile-friendly interactions

## Real-World Examples

### Example 1: Social Feed with User Popovers

```blade
<div class="space-y-4">
    @foreach($posts as $post)
        <div class="bg-white dark:bg-gray-800 rounded-lg p-4">
            <div class="flex items-center gap-3 mb-4">
                <x-ui::popover.profile :user="$post->user">
                    <x-ui::avatar
                        :src="$post->user->avatar"
                        :alt="$post->user->name"
                        size="md"
                    />
                </x-ui::popover.profile>

                <div>
                    <x-ui::popover.profile :user="$post->user">
                        <a href="{{ route('profile.show', $post->user) }}"
                           class="font-semibold hover:underline">
                            {{ $post->user->name }}
                        </a>
                    </x-ui::popover.profile>
                    <p class="text-sm text-gray-500">{{ $post->created_at->diffForHumans() }}</p>
                </div>
            </div>

            <p>{{ $post->content }}</p>
        </div>
    @endforeach
</div>
```

### Example 2: Form with Help Tooltips

```blade
<form wire:submit="save">
    <div class="space-y-4">
        <div>
            <div class="flex items-center gap-2 mb-2">
                <label for="title" class="font-medium">
                    Post Title
                </label>
                <x-ui::popover.description
                    title="Title Guidelines"
                    description="Keep your title clear and concise. Maximum 100 characters."
                    placement="right"
                />
            </div>
            <x-ui::form.input
                id="title"
                wire:model="title"
                placeholder="Enter post title"
            />
        </div>

        <div>
            <div class="flex items-center gap-2 mb-2">
                <label for="visibility" class="font-medium">
                    Visibility
                </label>
                <x-ui::popover.description
                    title="Post Visibility"
                    placement="right"
                >
                    <ul class="text-sm space-y-1">
                        <li><strong>Public:</strong> Everyone can see</li>
                        <li><strong>Followers:</strong> Only followers</li>
                        <li><strong>Private:</strong> Only you</li>
                    </ul>
                </x-ui::popover.description>
            </div>
            <x-ui::form.select
                id="visibility"
                wire:model="visibility"
            >
                <option value="public">Public</option>
                <option value="followers">Followers Only</option>
                <option value="private">Private</option>
            </x-ui::form.select>
        </div>

        <div>
            <div class="flex items-center gap-2 mb-2">
                <label class="font-medium">
                    Comments
                </label>
                <x-ui::popover.description
                    description="Allow users to comment on your post. You can moderate comments later."
                />
            </div>
            <x-ui::form.toggle
                wire:model="allow_comments"
                label="Enable comments"
            />
        </div>
    </div>

    <x-ui::button type="submit" variant="primary" class="mt-6">
        Publish Post
    </x-ui::button>
</form>
```

### Example 3: Product Catalog with Feature Popovers

```blade
<div class="grid grid-cols-1 md:grid-cols-3 gap-6">
    @foreach($products as $product)
        <div class="bg-white dark:bg-gray-800 rounded-lg shadow-md overflow-hidden">
            <x-ui::popover trigger="hover" placement="right" width="lg">
                <x-slot:trigger>
                    <img src="{{ $product->image }}"
                         alt="{{ $product->name }}"
                         class="w-full h-48 object-cover cursor-pointer">
                </x-slot:trigger>
                <x-slot:content>
                    <img src="{{ $product->high_res_image }}"
                         alt="{{ $product->name }}"
                         class="w-full rounded-lg">
                </x-slot:content>
            </x-ui::popover>

            <div class="p-4">
                <h3 class="text-lg font-semibold mb-2">{{ $product->name }}</h3>

                <div class="flex items-center gap-2 mb-3">
                    <span class="text-xl font-bold">${{ $product->price }}</span>

                    @if($product->has_discount)
                        <x-ui::popover trigger="hover" placement="top" width="sm">
                            <x-slot:trigger>
                                <x-ui::badge color="red">
                                    -{{ $product->discount_percentage }}%
                                </x-ui::badge>
                            </x-slot:trigger>
                            <x-slot:content>
                                <x-ui::popover.content title="Special Offer">
                                    <p class="text-sm">
                                        Save ${{ $product->discount_amount }}!
                                        Offer ends {{ $product->discount_ends_at->format('M d') }}
                                    </p>
                                </x-ui::popover.content>
                            </x-slot:content>
                        </x-ui::popover>
                    @endif
                </div>

                <p class="text-sm text-gray-600 dark:text-gray-400 mb-4">
                    {{ Str::limit($product->description, 100) }}
                </p>

                <div class="flex items-center justify-between">
                    <x-ui::popover trigger="click" placement="top" width="md">
                        <x-slot:trigger>
                            <button class="text-blue-600 hover:underline text-sm">
                                View Features
                            </button>
                        </x-slot:trigger>
                        <x-slot:content>
                            <x-ui::popover.content title="Product Features">
                                <ul class="space-y-2 text-sm">
                                    @foreach($product->features as $feature)
                                        <li class="flex items-start">
                                            <svg class="w-4 h-4 mr-2 mt-0.5 text-green-500 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                                            </svg>
                                            {{ $feature }}
                                        </li>
                                    @endforeach
                                </ul>
                            </x-ui::popover.content>
                        </x-slot:content>
                    </x-ui::popover>

                    <x-ui::button variant="primary" size="sm">
                        Add to Cart
                    </x-ui::button>
                </div>
            </div>
        </div>
    @endforeach
</div>
```

### Example 4: Status Indicators with Details

```blade
<div class="space-y-3">
    @foreach($services as $service)
        <div class="flex items-center justify-between p-4 bg-white dark:bg-gray-800 rounded-lg">
            <div class="flex items-center gap-3">
                <span class="font-medium">{{ $service->name }}</span>

                <x-ui::popover trigger="hover" placement="top" width="sm">
                    <x-slot:trigger>
                        <x-ui::badge
                            :color="$service->status === 'active' ? 'green' : 'red'"
                            class="cursor-help"
                        >
                            {{ ucfirst($service->status) }}
                        </x-ui::badge>
                    </x-slot:trigger>
                    <x-slot:content>
                        <x-ui::popover.content title="Service Status">
                            <div class="text-sm space-y-2">
                                <p><strong>Status:</strong> {{ ucfirst($service->status) }}</p>
                                <p><strong>Last Check:</strong> {{ $service->last_check->diffForHumans() }}</p>
                                <p><strong>Uptime:</strong> {{ $service->uptime_percentage }}%</p>
                            </div>
                        </x-ui::popover.content>
                    </x-slot:content>
                </x-ui::popover>
            </div>

            <button class="text-gray-500 hover:text-gray-700">
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z"></path>
                </svg>
            </button>
        </div>
    @endforeach
</div>
```

### Example 5: Comment Thread with Nested Popovers

```blade
<div class="space-y-4">
    @foreach($comments as $comment)
        <div class="flex gap-3">
            <x-ui::popover.profile :user="$comment->user">
                <x-ui::avatar
                    :src="$comment->user->avatar"
                    :alt="$comment->user->name"
                    size="sm"
                />
            </x-ui::popover.profile>

            <div class="flex-1">
                <div class="bg-gray-100 dark:bg-gray-700 rounded-lg p-3">
                    <div class="flex items-center gap-2 mb-1">
                        <x-ui::popover.profile :user="$comment->user">
                            <span class="font-semibold text-sm cursor-pointer hover:underline">
                                {{ $comment->user->name }}
                            </span>
                        </x-ui::popover.profile>

                        <span class="text-xs text-gray-500">
                            {{ $comment->created_at->diffForHumans() }}
                        </span>

                        @if($comment->edited)
                            <x-ui::popover trigger="hover" placement="top" width="sm">
                                <x-slot:trigger>
                                    <span class="text-xs text-gray-500 cursor-help">(edited)</span>
                                </x-slot:trigger>
                                <x-slot:content>
                                    <div class="p-2 text-xs">
                                        Last edited {{ $comment->updated_at->diffForHumans() }}
                                    </div>
                                </x-slot:content>
                            </x-ui::popover>
                        @endif
                    </div>

                    <p class="text-sm">{{ $comment->content }}</p>
                </div>

                <div class="flex items-center gap-3 mt-1 ml-3">
                    <button class="text-xs text-gray-500 hover:text-gray-700">Like</button>
                    <button class="text-xs text-gray-500 hover:text-gray-700">Reply</button>

                    @if($comment->likes_count > 0)
                        <x-ui::popover trigger="click" placement="bottom" width="sm">
                            <x-slot:trigger>
                                <span class="text-xs text-gray-500 cursor-pointer hover:underline">
                                    {{ $comment->likes_count }} likes
                                </span>
                            </x-slot:trigger>
                            <x-slot:content>
                                <div class="p-3">
                                    <h4 class="font-semibold text-sm mb-2">Liked by</h4>
                                    <div class="space-y-2">
                                        @foreach($comment->likedBy->take(10) as $user)
                                            <div class="flex items-center gap-2">
                                                <x-ui::avatar
                                                    :src="$user->avatar"
                                                    :alt="$user->name"
                                                    size="xs"
                                                />
                                                <span class="text-sm">{{ $user->name }}</span>
                                            </div>
                                        @endforeach

                                        @if($comment->likes_count > 10)
                                            <p class="text-xs text-gray-500 mt-2">
                                                and {{ $comment->likes_count - 10 }} others
                                            </p>
                                        @endif
                                    </div>
                                </div>
                            </x-slot:content>
                        </x-ui::popover>
                    @endif
                </div>
            </div>
        </div>
    @endforeach
</div>
```

## Livewire Integration

### Interactive Profile Popover

```blade
{{-- Livewire Component: app/Livewire/Components/UserPopover.php --}}
<div>
    <x-ui::popover trigger="hover" placement="bottom" width="md">
        <x-slot:trigger>
            <a href="{{ route('profile.show', $user) }}" class="font-semibold hover:underline">
                {{ $user->name }}
            </a>
        </x-slot:trigger>

        <x-slot:content>
            <div class="p-3">
                <div class="flex items-center gap-3 mb-3">
                    <x-ui::avatar
                        :src="$user->avatar"
                        :alt="$user->name"
                        size="lg"
                    />

                    <div>
                        <p class="font-semibold">{{ $user->name }}</p>
                        <p class="text-sm text-gray-500">{{ $user->email }}</p>
                    </div>
                </div>

                @if($user->bio)
                    <p class="text-sm mb-3">{{ Str::limit($user->bio, 100) }}</p>
                @endif

                <div class="flex gap-4 mb-3 text-sm">
                    <div>
                        <span class="font-semibold">{{ $user->followers_count }}</span>
                        Followers
                    </div>
                    <div>
                        <span class="font-semibold">{{ $user->following_count }}</span>
                        Following
                    </div>
                </div>

                @auth
                    @if(auth()->id() !== $user->id)
                        <x-ui::button
                            variant="{{ $isFollowing ? 'secondary' : 'primary' }}"
                            size="sm"
                            class="w-full"
                            wire:click="toggleFollow"
                            wire:loading.attr="disabled"
                        >
                            <span wire:loading.remove wire:target="toggleFollow">
                                {{ $isFollowing ? 'Unfollow' : 'Follow' }}
                            </span>
                            <span wire:loading wire:target="toggleFollow">
                                <x-ui::spinner size="sm" />
                            </span>
                        </x-ui::button>
                    @endif
                @endauth
            </div>
        </x-slot:content>
    </x-ui::popover>
</div>
```

```php
// app/Livewire/Components/UserPopover.php
namespace App\Livewire\Components;

use App\Models\User;
use Livewire\Component;

class UserPopover extends Component
{
    public User $user;
    public bool $isFollowing = false;

    public function mount(User $user)
    {
        $this->user = $user;

        if (auth()->check()) {
            $this->isFollowing = auth()->user()->isFollowing($user);
        }
    }

    public function toggleFollow()
    {
        if (!auth()->check()) {
            return redirect()->route('login');
        }

        if ($this->isFollowing) {
            auth()->user()->unfollow($this->user);
            $this->isFollowing = false;
        } else {
            auth()->user()->follow($this->user);
            $this->isFollowing = true;
        }

        $this->dispatch('user-followed', userId: $this->user->id);
    }

    public function render()
    {
        return view('livewire.components.user-popover');
    }
}
```

### Dynamic Content Loading

```blade
<x-ui::popover
    trigger="click"
    placement="bottom"
    width="md"
    x-data="{ loaded: false }"
    @mouseenter="if (!loaded) { $wire.loadNotifications(); loaded = true; }"
>
    <x-slot:trigger>
        <button class="relative">
            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20">
                <path d="M10 2a6 6 0 00-6 6v3.586l-.707.707A1 1 0 004 14h12a1 1 0 00.707-1.707L16 11.586V8a6 6 0 00-6-6zM10 18a3 3 0 01-3-3h6a3 3 0 01-3 3z"></path>
            </svg>
            @if($unreadCount > 0)
                <span class="absolute -top-1 -right-1 bg-red-500 text-white text-xs rounded-full w-5 h-5 flex items-center justify-center">
                    {{ $unreadCount }}
                </span>
            @endif
        </button>
    </x-slot:trigger>

    <x-slot:content>
        <div class="p-3 max-h-96 overflow-y-auto">
            <h3 class="font-semibold mb-3">Notifications</h3>

            <div wire:loading wire:target="loadNotifications" class="text-center py-4">
                <x-ui::spinner />
            </div>

            <div wire:loading.remove wire:target="loadNotifications">
                @forelse($notifications as $notification)
                    <div class="flex gap-3 p-2 hover:bg-gray-50 dark:hover:bg-gray-700 rounded cursor-pointer"
                         wire:click="markAsRead({{ $notification->id }})">
                        <x-ui::avatar
                            :src="$notification->data['user']['avatar'] ?? null"
                            size="sm"
                        />
                        <div class="flex-1 text-sm">
                            <p>{!! $notification->data['message'] !!}</p>
                            <p class="text-xs text-gray-500 mt-1">
                                {{ $notification->created_at->diffForHumans() }}
                            </p>
                        </div>

                        @if(!$notification->read_at)
                            <span class="w-2 h-2 bg-blue-600 rounded-full flex-shrink-0 mt-1"></span>
                        @endif
                    </div>
                @empty
                    <p class="text-sm text-gray-500 text-center py-4">
                        No notifications
                    </p>
                @endforelse
            </div>

            @if($notifications->count() > 0)
                <div class="border-t border-gray-200 dark:border-gray-600 mt-3 pt-3">
                    <button wire:click="markAllAsRead"
                            class="text-sm text-blue-600 hover:underline w-full text-center">
                        Mark all as read
                    </button>
                </div>
            @endif
        </div>
    </x-slot:content>
</x-ui::popover>
```

## Accessibility

### ARIA Attributes

The popover component includes proper ARIA attributes:

```blade
<div role="tooltip">
    {{-- Popover content --}}
</div>
```

### Keyboard Navigation

For click-triggered popovers:

- Click or Enter/Space to open
- Escape or click outside to close
- Focus management for interactive content

### Screen Reader Support

```blade
<x-ui::popover.description>
    <x-slot:trigger>
        <button aria-label="Show help information">
            <svg aria-hidden="true">...</svg>
            <span class="sr-only">Show information</span>
        </button>
    </x-slot:trigger>
</x-ui::popover.description>
```

## Best Practices

### 1. Choose Appropriate Trigger

**Use Hover for:**
- Quick information
- Non-critical content
- Desktop-focused experiences
- User previews

**Use Click for:**
- Interactive content
- Mobile-friendly experiences
- Content requiring user action
- Important information

### 2. Position Strategically

```blade
{{-- Avoid viewport overflow --}}
<x-ui::popover :placement="$isMobile ? 'bottom' : 'right'">
    {{-- Content --}}
</x-ui::popover>

{{-- Consider content length --}}
<x-ui::popover
    placement="bottom"
    :width="$hasLongContent ? 'lg' : 'md'"
>
    {{-- Content --}}
</x-ui::popover>
```

### 3. Keep Content Concise

```blade
{{-- Good: Concise and focused --}}
<x-ui::popover.description
    title="Username"
    description="Choose a unique username. 3-20 characters, letters and numbers only."
/>

{{-- Avoid: Too much information --}}
<x-ui::popover.description
    title="Username Requirements"
    description="Your username must be unique across the platform. It should be between 3 and 20 characters long. You can use letters (a-z, A-Z) and numbers (0-9), but no special characters or spaces are allowed. Your username will be visible to other users and cannot be changed after registration. Please choose carefully as this will be your permanent identifier on the platform."
/>
```

### 4. Mobile Considerations

```blade
{{-- Add touch-friendly trigger areas --}}
<x-ui::popover trigger="click" placement="bottom">
    <x-slot:trigger>
        <button class="p-3 -m-3"> {{-- Larger touch target --}}
            <svg class="w-5 h-5">...</svg>
        </button>
    </x-slot:trigger>
    <x-slot:content>
        {{-- Content --}}
    </x-slot:content>
</x-ui::popover>

{{-- Use click trigger on mobile --}}
<x-ui::popover :trigger="$isMobile ? 'click' : 'hover'">
    {{-- Content --}}
</x-ui::popover>
```

### 5. Performance Tips

```blade
{{-- Lazy load heavy content --}}
<x-ui::popover
    trigger="click"
    x-data="{ loaded: false }"
    @click="if (!loaded) { $wire.loadDetails(); loaded = true; }"
>
    <x-slot:content>
        <div wire:loading>
            <x-ui::spinner />
        </div>
        <div wire:loading.remove>
            {{-- Heavy content --}}
        </div>
    </x-slot:content>
</x-ui::popover>
```

### 6. Avoid Nested Popovers

```blade
{{-- Avoid: Confusing nested interactions --}}
<x-ui::popover trigger="hover">
    <x-slot:content>
        <x-ui::popover trigger="hover">
            {{-- This creates poor UX --}}
        </x-ui::popover>
    </x-slot:content>
</x-ui::popover>

{{-- Better: Single level with clear hierarchy --}}
<x-ui::popover trigger="click">
    <x-slot:content>
        <div>
            <p>Main information</p>
            <a href="/more-details" class="text-blue-600 hover:underline">
                Learn more
            </a>
        </div>
    </x-slot:content>
</x-ui::popover>
```

## Dark Mode Support

All popover components include full dark mode support:

```blade
{{-- Automatically adapts to dark mode --}}
<x-ui::popover>
    <x-slot:content>
        <x-ui::popover.content title="Dark Mode Ready">
            Content automatically adjusts to light/dark theme.
        </x-ui::popover.content>
    </x-slot:content>
</x-ui::popover>
```

## Animation and Transitions

The popover uses Alpine.js transitions for smooth animations:

- **Enter:** 200ms ease-out, opacity 0→100%, scale 95→100%
- **Leave:** 150ms ease-in, opacity 100→0%, scale 100→95%

Customize transitions if needed:

```blade
<x-ui::popover>
    <x-slot:content>
        <div
            x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="opacity-0 translate-y-2"
            x-transition:enter-end="opacity-100 translate-y-0"
        >
            {{-- Custom animation --}}
        </div>
    </x-slot:content>
</x-ui::popover>
```

## Testing

### Browser Testing

Test popovers across:
- Different viewport sizes
- Touch vs mouse interactions
- Browser zoom levels
- Screen readers

### Livewire Testing

```php
public function test_user_popover_shows_follow_button()
{
    $currentUser = User::factory()->create();
    $otherUser = User::factory()->create();

    Livewire::actingAs($currentUser)
        ->test(UserPopover::class, ['user' => $otherUser])
        ->assertSee('Follow')
        ->call('toggleFollow')
        ->assertSee('Unfollow')
        ->assertDispatched('user-followed');
}
```

## Related Components

- [Tooltip](tooltip.md) - Simple text tooltips
- [Dropdown](dropdown.md) - Action menus
- [Modal](modal.md) - Larger dialog boxes
- [Badge](badge.md) - Status indicators

## Resources

- [Flowbite Popover Documentation](https://flowbite.com/docs/components/popover/)
- [Alpine.js Documentation](https://alpinejs.dev)
- [ARIA Tooltip Pattern](https://www.w3.org/WAI/ARIA/apg/patterns/tooltip/)

---

**Component Version:** 1.0.0
**Last Updated:** 2025-11-20
**Flowbite Version:** 2.x
