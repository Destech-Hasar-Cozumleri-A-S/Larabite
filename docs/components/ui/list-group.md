# List Group Component

The List Group component displays a series of items, buttons, or links within a single container. It's perfect for navigation menus, feature lists, statistics displays, user listings, and any content that needs to be organized in a vertical list format.

## Components

- `<x-ui::list-group>` - Container for list items
- `<x-ui::list-group.item>` - Basic text list item
- `<x-ui::list-group.link>` - Interactive link item
- `<x-ui::list-group.button>` - Interactive button item
- `<x-ui::list-group.icon>` - Icon wrapper for list items
- `<x-ui::list-group.divider>` - Section divider/header

## Basic Usage

### Default List Group

Display a simple list of text items:

```blade
<x-ui::list-group width="md">
    <x-ui::list-group.item first>Profile</x-ui::list-group.item>
    <x-ui::list-group.item>Settings</x-ui::list-group.item>
    <x-ui::list-group.item>Messages</x-ui::list-group.item>
    <x-ui::list-group.item last>Download</x-ui::list-group.item>
</x-ui::list-group>
```

### List Group with Links

Create a navigational menu with links:

```blade
<x-ui::list-group width="md">
    <x-ui::list-group.link href="/profile" first active>
        Profile
    </x-ui::list-group.link>
    <x-ui::list-group.link href="/settings">
        Settings
    </x-ui::list-group.link>
    <x-ui::list-group.link href="/messages">
        Messages
    </x-ui::list-group.link>
    <x-ui::list-group.link href="/download" last>
        Download
    </x-ui::list-group.link>
</x-ui::list-group>
```

### List Group with Buttons

Create interactive button lists:

```blade
<x-ui::list-group width="md">
    <x-ui::list-group.button first active>
        Profile
    </x-ui::list-group.button>
    <x-ui::list-group.button>
        Settings
    </x-ui::list-group.button>
    <x-ui::list-group.button>
        Messages
    </x-ui::list-group.button>
    <x-ui::list-group.button last disabled>
        Download
    </x-ui::list-group.button>
</x-ui::list-group>
```

## List Group with Icons

Add icons to your list items for visual enhancement:

```blade
<x-ui::list-group width="md">
    <x-ui::list-group.link href="/profile" first>
        <x-ui::list-group.icon>
            <svg fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"></path>
            </svg>
        </x-ui::list-group.icon>
        Profile
    </x-ui::list-group.link>

    <x-ui::list-group.link href="/settings">
        <x-ui::list-group.icon>
            <svg fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                <path d="M5 4a1 1 0 00-2 0v7.268a2 2 0 000 3.464V16a1 1 0 102 0v-1.268a2 2 0 000-3.464V4zM11 4a1 1 0 10-2 0v1.268a2 2 0 000 3.464V16a1 1 0 102 0V8.732a2 2 0 000-3.464V4zM16 3a1 1 0 011 1v7.268a2 2 0 010 3.464V16a1 1 0 11-2 0v-1.268a2 2 0 010-3.464V4a1 1 0 011-1z"></path>
            </svg>
        </x-ui::list-group.icon>
        Settings
    </x-ui::list-group.link>

    <x-ui::list-group.link href="/messages">
        <x-ui::list-group.icon>
            <svg fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                <path d="M2 5a2 2 0 012-2h7a2 2 0 012 2v4a2 2 0 01-2 2H9l-3 3v-3H4a2 2 0 01-2-2V5z"></path>
                <path d="M15 7v2a4 4 0 01-4 4H9.828l-1.766 1.767c.28.149.599.233.938.233h2l3 3v-3h2a2 2 0 002-2V9a2 2 0 00-2-2h-1z"></path>
            </svg>
        </x-ui::list-group.icon>
        Messages
    </x-ui::list-group.link>

    <x-ui::list-group.link href="/download" last>
        <x-ui::list-group.icon>
            <svg fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M3 17a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm3.293-7.707a1 1 0 011.414 0L9 10.586V3a1 1 0 112 0v7.586l1.293-1.293a1 1 0 111.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z" clip-rule="evenodd"></path>
            </svg>
        </x-ui::list-group.icon>
        Download
    </x-ui::list-group.link>
</x-ui::list-group>
```

## Width Options

Control the width of your list group:

```blade
{{-- Small (w-48) --}}
<x-ui::list-group width="sm">
    <x-ui::list-group.item first last>Small width</x-ui::list-group.item>
</x-ui::list-group>

{{-- Medium (w-72) --}}
<x-ui::list-group width="md">
    <x-ui::list-group.item first last>Medium width</x-ui::list-group.item>
</x-ui::list-group>

{{-- Large (w-96) --}}
<x-ui::list-group width="lg">
    <x-ui::list-group.item first last>Large width</x-ui::list-group.item>
</x-ui::list-group>

{{-- Full width --}}
<x-ui::list-group width="full">
    <x-ui::list-group.item first last>Full width</x-ui::list-group.item>
</x-ui::list-group>

{{-- Auto (default - fits content) --}}
<x-ui::list-group>
    <x-ui::list-group.item first last>Auto width</x-ui::list-group.item>
</x-ui::list-group>
```

## Divided List Group

Add visual dividers between items:

```blade
<x-ui::list-group divided width="md">
    <x-ui::list-group.item first>Profile</x-ui::list-group.item>
    <x-ui::list-group.item>Settings</x-ui::list-group.item>
    <x-ui::list-group.item>Messages</x-ui::list-group.item>
    <x-ui::list-group.item last>Download</x-ui::list-group.item>
</x-ui::list-group>
```

## Section Dividers

Organize list items into categories:

```blade
<x-ui::list-group width="lg">
    <x-ui::list-group.divider first>Account</x-ui::list-group.divider>
    <x-ui::list-group.link href="/profile">Profile</x-ui::list-group.link>
    <x-ui::list-group.link href="/settings">Settings</x-ui::list-group.link>

    <x-ui::list-group.divider>Communication</x-ui::list-group.divider>
    <x-ui::list-group.link href="/messages">Messages</x-ui::list-group.link>
    <x-ui::list-group.link href="/notifications">Notifications</x-ui::list-group.link>

    <x-ui::list-group.divider>Resources</x-ui::list-group.divider>
    <x-ui::list-group.link href="/download" last>Downloads</x-ui::list-group.link>
</x-ui::list-group>
```

## Props

### List Group Container (`ui::list-group`)

| Prop | Type | Default | Description |
|------|------|---------|-------------|
| `divided` | boolean | `false` | Add divider lines between items |
| `width` | string | `'auto'` | Width variant: `auto`, `sm`, `md`, `lg`, `full` |

### List Group Item (`ui::list-group.item`)

| Prop | Type | Default | Description |
|------|------|---------|-------------|
| `active` | boolean | `false` | Mark item as active/current |
| `first` | boolean | `false` | First item in list (adds rounded top) |
| `last` | boolean | `false` | Last item in list (adds rounded bottom) |

### List Group Link (`ui::list-group.link`)

| Prop | Type | Default | Description |
|------|------|---------|-------------|
| `href` | string | `'#'` | Link destination URL |
| `active` | boolean | `false` | Mark link as active/current |
| `first` | boolean | `false` | First item in list |
| `last` | boolean | `false` | Last item in list |

### List Group Button (`ui::list-group.button`)

| Prop | Type | Default | Description |
|------|------|---------|-------------|
| `active` | boolean | `false` | Mark button as active/current |
| `disabled` | boolean | `false` | Disable button interaction |
| `first` | boolean | `false` | First item in list |
| `last` | boolean | `false` | Last item in list |

### List Group Icon (`ui::list-group.icon`)

| Prop | Type | Default | Description |
|------|------|---------|-------------|
| `size` | string | `'default'` | Icon size: `sm`, `default`, `lg` |

### List Group Divider (`ui::list-group.divider`)

| Prop | Type | Default | Description |
|------|------|---------|-------------|
| `label` | string | `null` | Divider label text |

## Real-World Examples

### Sidebar Navigation

```blade
<aside class="w-64">
    <x-ui::list-group width="full">
        <x-ui::list-group.link href="/dashboard" first :active="request()->is('dashboard')">
            <x-ui::list-group.icon>
                <svg fill="currentColor" viewBox="0 0 20 20">
                    <path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"></path>
                </svg>
            </x-ui::list-group.icon>
            Dashboard
        </x-ui::list-group.link>

        <x-ui::list-group.link href="/pets" :active="request()->is('pets*')">
            <x-ui::list-group.icon>
                <svg fill="currentColor" viewBox="0 0 20 20">
                    <path d="M3 12v3c0 1.657 3.134 3 7 3s7-1.343 7-3v-3c0 1.657-3.134 3-7 3s-7-1.343-7-3z"></path>
                    <path d="M3 7v3c0 1.657 3.134 3 7 3s7-1.343 7-3V7c0 1.657-3.134 3-7 3S3 8.657 3 7z"></path>
                    <path d="M17 5c0 1.657-3.134 3-7 3S3 6.657 3 5s3.134-3 7-3 7 1.343 7 3z"></path>
                </svg>
            </x-ui::list-group.icon>
            My Pets
        </x-ui::list-group.link>

        <x-ui::list-group.link href="/services" :active="request()->is('services*')">
            <x-ui::list-group.icon>
                <svg fill="currentColor" viewBox="0 0 20 20">
                    <path d="M9 2a1 1 0 000 2h2a1 1 0 100-2H9z"></path>
                    <path fill-rule="evenodd" d="M4 5a2 2 0 012-2 3 3 0 003 3h2a3 3 0 003-3 2 2 0 012 2v11a2 2 0 01-2 2H6a2 2 0 01-2-2V5zm9.707 5.707a1 1 0 00-1.414-1.414L9 12.586l-1.293-1.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                </svg>
            </x-ui::list-group.icon>
            Services
        </x-ui::list-group.link>

        <x-ui::list-group.link href="/settings" last :active="request()->is('settings*')">
            <x-ui::list-group.icon>
                <svg fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M11.49 3.17c-.38-1.56-2.6-1.56-2.98 0a1.532 1.532 0 01-2.286.948c-1.372-.836-2.942.734-2.106 2.106.54.886.061 2.042-.947 2.287-1.561.379-1.561 2.6 0 2.978a1.532 1.532 0 01.947 2.287c-.836 1.372.734 2.942 2.106 2.106a1.532 1.532 0 012.287.947c.379 1.561 2.6 1.561 2.978 0a1.533 1.533 0 012.287-.947c1.372.836 2.942-.734 2.106-2.106a1.533 1.533 0 01.947-2.287c1.561-.379 1.561-2.6 0-2.978a1.532 1.532 0 01-.947-2.287c.836-1.372-.734-2.942-2.106-2.106a1.532 1.532 0 01-2.287-.947zM10 13a3 3 0 100-6 3 3 0 000 6z" clip-rule="evenodd"></path>
                </svg>
            </x-ui::list-group.icon>
            Settings
        </x-ui::list-group.link>
    </x-ui::list-group>
</aside>
```

### Features List

```blade
<x-ui::card>
    <x-slot:header>
        <h3 class="text-xl font-semibold">Premium Plan</h3>
        <p class="text-3xl font-bold mt-2">$29<span class="text-base font-normal">/month</span></p>
    </x-slot:header>

    <x-ui::list-group divided width="full">
        <x-ui::list-group.item first>
            <x-ui::list-group.icon class="text-green-500">
                <svg fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                </svg>
            </x-ui::list-group.icon>
            Unlimited pets
        </x-ui::list-group.item>

        <x-ui::list-group.item>
            <x-ui::list-group.icon class="text-green-500">
                <svg fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                </svg>
            </x-ui::list-group.icon>
            Priority support
        </x-ui::list-group.item>

        <x-ui::list-group.item>
            <x-ui::list-group.icon class="text-green-500">
                <svg fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                </svg>
            </x-ui::list-group.icon>
            Advanced analytics
        </x-ui::list-group.item>

        <x-ui::list-group.item class="text-gray-400 line-through">
            <x-ui::list-group.icon class="text-gray-400">
                <svg fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                </svg>
            </x-ui::list-group.icon>
            White label
        </x-ui::list-group.item>

        <x-ui::list-group.item last class="text-gray-400 line-through">
            <x-ui::list-group.icon class="text-gray-400">
                <svg fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                </svg>
            </x-ui::list-group.icon>
            API access
        </x-ui::list-group.item>
    </x-ui::list-group>

    <x-slot:footer>
        <x-ui::button variant="primary" class="w-full">
            Choose Plan
        </x-ui::button>
    </x-slot:footer>
</x-ui::card>
```

### Statistics with Dividers

```blade
<x-ui::list-group divided width="lg">
    <x-ui::list-group.divider first>This Week</x-ui::list-group.divider>

    <x-ui::list-group.item>
        <div class="flex items-center justify-between w-full">
            <div class="flex items-center">
                <x-ui::list-group.icon class="text-blue-600">
                    <svg fill="currentColor" viewBox="0 0 20 20">
                        <path d="M8.433 7.418c.155-.103.346-.196.567-.267v1.698a2.305 2.305 0 01-.567-.267C8.07 8.34 8 8.114 8 8c0-.114.07-.34.433-.582zM11 12.849v-1.698c.22.071.412.164.567.267.364.243.433.468.433.582 0 .114-.07.34-.433.582a2.305 2.305 0 01-.567.267z"></path>
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-13a1 1 0 10-2 0v.092a4.535 4.535 0 00-1.676.662C6.602 6.234 6 7.009 6 8c0 .99.602 1.765 1.324 2.246.48.32 1.054.545 1.676.662v1.941c-.391-.127-.68-.317-.843-.504a1 1 0 10-1.51 1.31c.562.649 1.413 1.076 2.353 1.253V15a1 1 0 102 0v-.092a4.535 4.535 0 001.676-.662C13.398 13.766 14 12.991 14 12c0-.99-.602-1.765-1.324-2.246A4.535 4.535 0 0011 9.092V7.151c.391.127.68.317.843.504a1 1 0 101.511-1.31c-.563-.649-1.413-1.076-2.354-1.253V5z" clip-rule="evenodd"></path>
                    </svg>
                </x-ui::list-group.icon>
                <span class="text-sm font-medium">Sales</span>
            </div>
            <span class="text-sm font-semibold">$2,340</span>
        </div>
    </x-ui::list-group.item>

    <x-ui::list-group.item>
        <div class="flex items-center justify-between w-full">
            <div class="flex items-center">
                <x-ui::list-group.icon class="text-green-600">
                    <svg fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"></path>
                    </svg>
                </x-ui::list-group.icon>
                <span class="text-sm font-medium">New Users</span>
            </div>
            <span class="text-sm font-semibold">142</span>
        </div>
    </x-ui::list-group.item>

    <x-ui::list-group.divider>This Month</x-ui::list-group.divider>

    <x-ui::list-group.item>
        <div class="flex items-center justify-between w-full">
            <div class="flex items-center">
                <x-ui::list-group.icon class="text-blue-600">
                    <svg fill="currentColor" viewBox="0 0 20 20">
                        <path d="M8.433 7.418c.155-.103.346-.196.567-.267v1.698a2.305 2.305 0 01-.567-.267C8.07 8.34 8 8.114 8 8c0-.114.07-.34.433-.582zM11 12.849v-1.698c.22.071.412.164.567.267.364.243.433.468.433.582 0 .114-.07.34-.433.582a2.305 2.305 0 01-.567.267z"></path>
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-13a1 1 0 10-2 0v.092a4.535 4.535 0 00-1.676.662C6.602 6.234 6 7.009 6 8c0 .99.602 1.765 1.324 2.246.48.32 1.054.545 1.676.662v1.941c-.391-.127-.68-.317-.843-.504a1 1 0 10-1.51 1.31c.562.649 1.413 1.076 2.353 1.253V15a1 1 0 102 0v-.092a4.535 4.535 0 001.676-.662C13.398 13.766 14 12.991 14 12c0-.99-.602-1.765-1.324-2.246A4.535 4.535 0 0011 9.092V7.151c.391.127.68.317.843.504a1 1 0 101.511-1.31c-.563-.649-1.413-1.076-2.354-1.253V5z" clip-rule="evenodd"></path>
                    </svg>
                </x-ui::list-group.icon>
                <span class="text-sm font-medium">Sales</span>
            </div>
            <span class="text-sm font-semibold">$8,920</span>
        </div>
    </x-ui::list-group.item>

    <x-ui::list-group.item last>
        <div class="flex items-center justify-between w-full">
            <div class="flex items-center">
                <x-ui::list-group.icon class="text-green-600">
                    <svg fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"></path>
                    </svg>
                </x-ui::list-group.icon>
                <span class="text-sm font-medium">New Users</span>
            </div>
            <span class="text-sm font-semibold">567</span>
        </div>
    </x-ui::list-group.item>
</x-ui::list-group>
```

### User List with Actions

```blade
<x-ui::list-group divided width="full">
    @foreach($users as $user)
        <x-ui::list-group.item :first="$loop->first" :last="$loop->last">
            <div class="flex items-center justify-between w-full">
                <div class="flex items-center gap-3">
                    <x-ui::avatar
                        :src="$user->avatar"
                        :alt="$user->name"
                        size="md"
                    />
                    <div>
                        <p class="text-sm font-medium text-gray-900 dark:text-white">
                            {{ $user->name }}
                        </p>
                        <p class="text-sm text-gray-500 dark:text-gray-400">
                            {{ $user->email }}
                        </p>
                    </div>
                </div>

                <div class="flex gap-2">
                    @if($user->is_following)
                        <x-ui::button
                            variant="light"
                            size="sm"
                            wire:click="unfollow({{ $user->id }})"
                        >
                            Following
                        </x-ui::button>
                    @else
                        <x-ui::button
                            variant="primary"
                            size="sm"
                            wire:click="follow({{ $user->id }})"
                        >
                            Follow
                        </x-ui::button>
                    @endif
                </div>
            </div>
        </x-ui::list-group.item>
    @endforeach
</x-ui::list-group>
```

### Settings Menu with Icons

```blade
<x-ui::card>
    <x-slot:header>
        <h3 class="text-lg font-semibold">Account Settings</h3>
    </x-slot:header>

    <x-ui::list-group width="full">
        <x-ui::list-group.link href="/settings/profile" first>
            <x-ui::list-group.icon>
                <svg fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"></path>
                </svg>
            </x-ui::list-group.icon>
            <div class="flex-1">
                <p class="font-medium">Profile Information</p>
                <p class="text-xs text-gray-500 dark:text-gray-400">Update your name, email, and avatar</p>
            </div>
        </x-ui::list-group.link>

        <x-ui::list-group.link href="/settings/security">
            <x-ui::list-group.icon>
                <svg fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd"></path>
                </svg>
            </x-ui::list-group.icon>
            <div class="flex-1">
                <p class="font-medium">Security</p>
                <p class="text-xs text-gray-500 dark:text-gray-400">Change password and enable 2FA</p>
            </div>
        </x-ui::list-group.link>

        <x-ui::list-group.link href="/settings/notifications">
            <x-ui::list-group.icon>
                <svg fill="currentColor" viewBox="0 0 20 20">
                    <path d="M10 2a6 6 0 00-6 6v3.586l-.707.707A1 1 0 004 14h12a1 1 0 00.707-1.707L16 11.586V8a6 6 0 00-6-6zM10 18a3 3 0 01-3-3h6a3 3 0 01-3 3z"></path>
                </svg>
            </x-ui::list-group.icon>
            <div class="flex-1">
                <p class="font-medium">Notifications</p>
                <p class="text-xs text-gray-500 dark:text-gray-400">Manage email and push notifications</p>
            </div>
        </x-ui::list-group.link>

        <x-ui::list-group.link href="/settings/privacy" last>
            <x-ui::list-group.icon>
                <svg fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M2.166 4.999A11.954 11.954 0 0010 1.944 11.954 11.954 0 0017.834 5c.11.65.166 1.32.166 2.001 0 5.225-3.34 9.67-8 11.317C5.34 16.67 2 12.225 2 7c0-.682.057-1.35.166-2.001zm11.541 3.708a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                </svg>
            </x-ui::list-group.icon>
            <div class="flex-1">
                <p class="font-medium">Privacy</p>
                <p class="text-xs text-gray-500 dark:text-gray-400">Control who can see your content</p>
            </div>
        </x-ui::list-group.link>
    </x-ui::list-group>
</x-ui::card>
```

### Interactive Tab-like Navigation

```blade
<div x-data="{ active: 'profile' }">
    <x-ui::list-group width="full">
        <x-ui::list-group.button
            first
            @click="active = 'profile'"
            :active="x-bind:class=\"active === 'profile' && 'active'\""
        >
            <x-ui::list-group.icon>
                <svg fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"></path>
                </svg>
            </x-ui::list-group.icon>
            Profile
        </x-ui::list-group.button>

        <x-ui::list-group.button
            @click="active = 'settings'"
            :active="x-bind:class=\"active === 'settings' && 'active'\""
        >
            <x-ui::list-group.icon>
                <svg fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M11.49 3.17c-.38-1.56-2.6-1.56-2.98 0a1.532 1.532 0 01-2.286.948c-1.372-.836-2.942.734-2.106 2.106.54.886.061 2.042-.947 2.287-1.561.379-1.561 2.6 0 2.978a1.532 1.532 0 01.947 2.287c-.836 1.372.734 2.942 2.106 2.106a1.532 1.532 0 012.287.947c.379 1.561 2.6 1.561 2.978 0a1.533 1.533 0 012.287-.947c1.372.836 2.942-.734 2.106-2.106a1.533 1.533 0 01.947-2.287c1.561-.379 1.561-2.6 0-2.978a1.532 1.532 0 01-.947-2.287c.836-1.372-.734-2.942-2.106-2.106a1.532 1.532 0 01-2.287-.947zM10 13a3 3 0 100-6 3 3 0 000 6z" clip-rule="evenodd"></path>
                </svg>
            </x-ui::list-group.icon>
            Settings
        </x-ui::list-group.button>

        <x-ui::list-group.button
            last
            @click="active = 'messages'"
            :active="x-bind:class=\"active === 'messages' && 'active'\""
        >
            <x-ui::list-group.icon>
                <svg fill="currentColor" viewBox="0 0 20 20">
                    <path d="M2 5a2 2 0 012-2h7a2 2 0 012 2v4a2 2 0 01-2 2H9l-3 3v-3H4a2 2 0 01-2-2V5z"></path>
                    <path d="M15 7v2a4 4 0 01-4 4H9.828l-1.766 1.767c.28.149.599.233.938.233h2l3 3v-3h2a2 2 0 002-2V9a2 2 0 00-2-2h-1z"></path>
                </svg>
            </x-ui::list-group.icon>
            Messages
        </x-ui::list-group.button>
    </x-ui::list-group>

    <div class="mt-4 p-4 bg-gray-50 dark:bg-gray-800 rounded-lg">
        <div x-show="active === 'profile'">Profile content...</div>
        <div x-show="active === 'settings'">Settings content...</div>
        <div x-show="active === 'messages'">Messages content...</div>
    </div>
</div>
```

## Livewire Integration

### Dynamic List with Livewire

```blade
<div>
    <x-ui::list-group width="full">
        @forelse($items as $item)
            <x-ui::list-group.button
                :first="$loop->first"
                :last="$loop->last"
                :active="$selectedId === $item->id"
                wire:click="selectItem({{ $item->id }})"
            >
                <x-ui::list-group.icon>
                    {!! $item->icon !!}
                </x-ui::list-group.icon>
                <div class="flex-1 text-left">
                    <p class="font-medium">{{ $item->title }}</p>
                    @if($item->description)
                        <p class="text-xs text-gray-500 dark:text-gray-400">
                            {{ $item->description }}
                        </p>
                    @endif
                </div>
                @if($item->badge)
                    <x-ui::badge variant="primary" size="sm">
                        {{ $item->badge }}
                    </x-ui::badge>
                @endif
            </x-ui::list-group.button>
        @empty
            <x-ui::list-group.item first last>
                <p class="text-center text-gray-500 dark:text-gray-400">No items found</p>
            </x-ui::list-group.item>
        @endforelse
    </x-ui::list-group>

    @if($selectedItem)
        <div class="mt-4">
            <h3 class="text-lg font-semibold">{{ $selectedItem->title }}</h3>
            <p>{{ $selectedItem->content }}</p>
        </div>
    @endif
</div>
```

## Accessibility

The List Group component includes several accessibility features:

1. **Semantic HTML**: Uses `<ul>` for the container and proper element types (`<a>`, `<button>`, `<li>`)
2. **ARIA Attributes**: `aria-current="true"` marks active items, `aria-hidden="true"` hides decorative icons
3. **Focus Management**: Visible focus rings for keyboard navigation
4. **Screen Reader Support**: Icons are hidden from screen readers with `aria-hidden`
5. **Keyboard Navigation**: Full keyboard support for links and buttons
6. **Disabled States**: Proper disabled styling and attributes prevent interaction

## Best Practices

### Do's

- Use `first` and `last` props for proper border radius on edge items
- Mark the current/active item with the `active` prop
- Use icons consistently across list items
- Provide meaningful link text and button labels
- Group related items with dividers
- Use appropriate element type (link vs button) based on action

### Don'ts

- Don't mix links and buttons in the same list group
- Don't forget to mark the first and last items
- Don't use excessively long text without truncation
- Don't create deeply nested list groups
- Don't use list groups for complex data tables

### Common Patterns

**Navigation Menu:**
```blade
<x-ui::list-group>
    <x-ui::list-group.link href="/dashboard" first :active="request()->is('dashboard')">
        Dashboard
    </x-ui::list-group.link>
    {{-- More links --}}
</x-ui::list-group>
```

**Feature List:**
```blade
<x-ui::list-group divided>
    <x-ui::list-group.item first>
        <x-ui::list-group.icon class="text-green-500">✓</x-ui::list-group.icon>
        Available feature
    </x-ui::list-group.item>
    {{-- More features --}}
</x-ui::list-group>
```

## Dark Mode

The List Group component automatically adapts to dark mode with appropriate color adjustments for:
- Background colors
- Border colors
- Text colors
- Hover states
- Active states
- Focus rings

## Browser Compatibility

The List Group component works across all modern browsers:
- Chrome/Edge (latest)
- Firefox (latest)
- Safari (latest)
- Opera (latest)

## Related Components

- [Card](card.md) - Container for list groups
- [Badge](badge.md) - Add badges to list items
- [Avatar](avatar.md) - User profile images in lists
- [Button](button.md) - Standalone buttons
- [Dropdown](dropdown.md) - Alternative navigation pattern

## Tips & Tricks

### Auto-detecting First/Last Items

```blade
<x-ui::list-group>
    @foreach($items as $item)
        <x-ui::list-group.link
            :href="$item->url"
            :first="$loop->first"
            :last="$loop->last"
            :active="request()->is($item->route)"
        >
            {{ $item->name }}
        </x-ui::list-group.link>
    @endforeach
</x-ui::list-group>
```

### Responsive Width

```blade
<x-ui::list-group class="w-full md:w-96">
    {{-- Full width on mobile, fixed width on desktop --}}
</x-ui::list-group>
```

### Custom Styling

```blade
<x-ui::list-group.link class="!bg-gradient-to-r from-blue-500 to-purple-500 !text-white">
    Custom styled link
</x-ui::list-group.link>
```

### Nested Content

```blade
<x-ui::list-group.item>
    <div class="w-full">
        <div class="flex justify-between items-start mb-2">
            <h4 class="font-semibold">Title</h4>
            <x-ui::badge>New</x-ui::badge>
        </div>
        <p class="text-sm text-gray-600 dark:text-gray-400">
            Description text with multiple lines that provides
            additional context about this list item.
        </p>
    </div>
</x-ui::list-group.item>
```

---

**Component Location:** `resources/views/components/ui/list-group.blade.php`
**Documentation:** `docs/components/ui/list-group.md`
**Flowbite Reference:** [List Group Component](https://flowbite.com/docs/components/list-group/)