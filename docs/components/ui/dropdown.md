# Dropdown Components

Contextual menu bileşenleri. User menus, action menus, filters ve notifications için kullanılır. Alpine.js ile state management ve smooth transitions sunar.

## 📦 Available Components

- **Dropdown** - Base dropdown container
- **Dropdown Item** - Menu item (link or button)
- **Dropdown Divider** - Separator line
- **Dropdown Header** - User info card header
- **Dropdown Search** - Search input for filtering
- **Dropdown Checkbox** - Checkbox menu item
- **Dropdown Notification** - Notification item with avatar

---

## Base Dropdown Component

Temel dropdown container bileşeni. Alpine.js kullanarak açma/kapama state'ini yönetir.

**Location:** `resources/views/components/ui/dropdown.blade.php`

### Features

- Click to toggle
- Click away to close
- Left/right alignment
- Customizable width
- Smooth transitions
- Dark mode support
- Z-index layering
- Accessible

### Usage

```blade
{{-- Basic Dropdown --}}
<x-ui.dropdown align="right" width="56">
    <x-slot:trigger>
        <button class="px-4 py-2 bg-blue-600 text-white rounded-lg">
            Options
        </button>
    </x-slot:trigger>

    <x-ui.dropdown.item href="/profile">
        Profile
    </x-ui.dropdown.item>

    <x-ui.dropdown.item href="/settings">
        Settings
    </x-ui.dropdown.item>

    <x-ui.dropdown.divider />

    <x-ui.dropdown.item variant="danger" wire:click="logout">
        Logout
    </x-ui.dropdown.item>
</x-ui.dropdown>

{{-- Left Aligned --}}
<x-ui.dropdown align="left" width="48">
    <x-slot:trigger>
        <button>Menu</button>
    </x-slot:trigger>

    <x-ui.dropdown.item href="/">Home</x-ui.dropdown.item>
    <x-ui.dropdown.item href="/about">About</x-ui.dropdown.item>
</x-ui.dropdown>

{{-- Custom Width --}}
<x-ui.dropdown width="64">
    <x-slot:trigger>
        <button>Wide Menu</button>
    </x-slot:trigger>

    {{-- Items --}}
</x-ui.dropdown>
```

### Props

| Prop | Type | Default | Options | Description |
|------|------|---------|---------|-------------|
| `align` | string | 'right' | left, right | Dropdown alignment |
| `width` | string | '56' | any Tailwind width | Dropdown width in rem |

---

## Dropdown Item Component

Menu item bileşeni. Link veya button olarak kullanılabilir.

**Location:** `resources/views/components/ui/dropdown/item.blade.php`

### Features

- Link or button mode
- Icon support
- Danger variant (destructive actions)
- Hover effects
- Dark mode support
- Livewire support

### Usage

```blade
{{-- Link Item --}}
<x-ui.dropdown.item href="/profile" wire:navigate>
    Profile
</x-ui.dropdown.item>

{{-- Button Item with Livewire --}}
<x-ui.dropdown.item wire:click="doSomething">
    Click Me
</x-ui.dropdown.item>

{{-- Danger Variant --}}
<x-ui.dropdown.item variant="danger" wire:click="delete">
    Delete
</x-ui.dropdown.item>

{{-- With Inline Icon --}}
<x-ui.dropdown.item href="/settings">
    <svg class="w-4 h-4 me-2" fill="currentColor" viewBox="0 0 20 20">
        <path d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z"/>
    </svg>
    Settings
</x-ui.dropdown.item>
```

### Props

| Prop | Type | Default | Options | Description |
|------|------|---------|---------|-------------|
| `href` | string | null | - | Link URL (makes it an anchor) |
| `icon` | string | null | - | SVG icon content |
| `variant` | string | 'default' | default, danger | Item style variant |

---

## Dropdown Divider

Separator line between menu sections.

**Location:** `resources/views/components/ui/dropdown/divider.blade.php`

### Usage

```blade
<x-ui.dropdown.item href="/profile">Profile</x-ui.dropdown.item>
<x-ui.dropdown.divider />
<x-ui.dropdown.item variant="danger">Logout</x-ui.dropdown.item>
```

---

## Dropdown Header

User info card header with avatar, name, email, and badge.

**Location:** `resources/views/components/ui/dropdown/header.blade.php`

### Features

- Avatar support
- Name and email display
- Optional badge
- Custom content slot
- Dark mode support

### Usage

```blade
<x-ui.dropdown align="right" width="64">
    <x-slot:trigger>
        <button>{{ auth()->user()->name }}</button>
    </x-slot:trigger>

    <x-ui.dropdown.header
        :avatar="auth()->user()->avatar"
        :name="auth()->user()->name"
        :email="auth()->user()->email"
        badge="Pro"
    />

    <x-ui.dropdown.divider />

    <x-ui.dropdown.item href="/profile">Profile</x-ui.dropdown.item>
    <x-ui.dropdown.item href="/settings">Settings</x-ui.dropdown.item>

    <x-ui.dropdown.divider />

    <x-ui.dropdown.item variant="danger">Logout</x-ui.dropdown.item>
</x-ui.dropdown>

{{-- With Custom Content --}}
<x-ui.dropdown.header
    :avatar="$user->avatar"
    :name="$user->name"
    :email="$user->email"
>
    <div class="text-xs text-gray-500 mt-1">
        Member since {{ $user->created_at->format('Y') }}
    </div>
</x-ui.dropdown.header>
```

### Props

| Prop | Type | Default | Options | Description |
|------|------|---------|---------|-------------|
| `avatar` | string | null | - | Avatar image URL |
| `name` | string | null | - | User name |
| `email` | string | null | - | User email |
| `badge` | string | null | - | Badge text (e.g., "Pro") |

---

## Dropdown Search

Search input for filtering dropdown items.

**Location:** `resources/views/components/ui/dropdown/search.blade.php`

### Features

- Search icon
- Placeholder customization
- Dark mode support
- Livewire model binding support

### Usage

```blade
<x-ui.dropdown align="left" width="72">
    <x-slot:trigger>
        <button>Select User</button>
    </x-slot:trigger>

    <x-ui.dropdown.search placeholder="Search users..." />

    <div class="overflow-y-auto max-h-48">
        @foreach($users as $user)
            <x-ui.dropdown.item href="/users/{{ $user->id }}">
                {{ $user->name }}
            </x-ui.dropdown.item>
        @endforeach
    </div>
</x-ui.dropdown>

{{-- With Livewire --}}
<x-ui.dropdown.search
    placeholder="Search..."
    wire:model.live="search"
/>
```

### Props

| Prop | Type | Default | Options | Description |
|------|------|---------|---------|-------------|
| `placeholder` | string | 'Search...' | - | Input placeholder text |

---

## Dropdown Checkbox

Checkbox item for multi-selection menus.

**Location:** `resources/views/components/ui/dropdown/checkbox.blade.php`

### Features

- Checkbox input
- Label and helper text
- Hover background
- Dark mode support
- Livewire support

### Usage

```blade
<x-ui.dropdown align="left" width="64">
    <x-slot:trigger>
        <button>Filter Options</button>
    </x-slot:trigger>

    <div class="py-2">
        <x-ui.dropdown.checkbox
            name="categories[]"
            value="electronics"
            label="Electronics"
        />

        <x-ui.dropdown.checkbox
            name="categories[]"
            value="clothing"
            label="Clothing"
            helper="All types of clothing"
        />

        <x-ui.dropdown.checkbox
            name="categories[]"
            value="books"
            :checked="true"
            label="Books"
        />
    </div>

    <x-ui.dropdown.divider />

    <x-ui.dropdown.item>
        <button type="submit" class="w-full text-left">Apply Filters</button>
    </x-ui.dropdown.item>
</x-ui.dropdown>

{{-- With Livewire --}}
<x-ui.dropdown.checkbox
    label="Email Notifications"
    wire:model="notifications.email"
/>
```

### Props

| Prop | Type | Default | Options | Description |
|------|------|---------|---------|-------------|
| `name` | string | null | - | Input name attribute |
| `value` | string | null | - | Checkbox value |
| `checked` | bool | false | - | Checked state |
| `label` | string | null | - | Checkbox label |
| `helper` | string | null | - | Helper text |

---

## Dropdown Notification

Notification item with avatar, message, and timestamp.

**Location:** `resources/views/components/ui/dropdown/notification.blade.php`

### Features

- Avatar display
- Title and message
- Timestamp
- Unread indicator
- Hover effects
- Link support
- Dark mode support

### Usage

```blade
<x-ui.dropdown align="right" width="80">
    <x-slot:trigger>
        <button class="relative">
            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20">
                <path d="M10 2a6 6 0 00-6 6v3.586l-.707.707A1 1 0 004 14h12a1 1 0 00.707-1.707L16 11.586V8a6 6 0 00-6-6zM10 18a3 3 0 01-3-3h6a3 3 0 01-3 3z"/>
            </svg>
            <span class="absolute top-0 right-0 w-2 h-2 bg-red-600 rounded-full"></span>
        </button>
    </x-slot:trigger>

    <div class="divide-y divide-gray-100 dark:divide-gray-700">
        <div class="px-4 py-3 font-semibold text-gray-900 dark:text-white">
            Notifications
        </div>

        <x-ui.dropdown.notification
            avatar="/images/user1.jpg"
            title="John Doe"
            message="commented on your post"
            time="a few moments ago"
            :unread="true"
            href="/notifications/1"
        />

        <x-ui.dropdown.notification
            avatar="/images/user2.jpg"
            title="Jane Smith"
            message="liked your photo"
            time="2 hours ago"
            href="/notifications/2"
        />

        <x-ui.dropdown.notification
            avatar="/images/user3.jpg"
            title="Mike Johnson"
            message="started following you"
            time="1 day ago"
            href="/notifications/3"
        />
    </div>

    <x-ui.dropdown.divider />

    <x-ui.dropdown.item href="/notifications">
        View All Notifications
    </x-ui.dropdown.item>
</x-ui.dropdown>

{{-- Custom Content --}}
<x-ui.dropdown.notification
    avatar="/avatar.jpg"
    time="5 min ago"
    href="/post/123"
>
    <span class="font-semibold">Sarah</span> shared your post with
    <span class="font-semibold">Mike</span> and <span class="font-semibold">3 others</span>
</x-ui.dropdown.notification>
```

### Props

| Prop | Type | Default | Options | Description |
|------|------|---------|---------|-------------|
| `avatar` | string | null | - | Avatar image URL |
| `title` | string | null | - | Notification title |
| `message` | string | null | - | Notification message |
| `time` | string | null | - | Timestamp text |
| `href` | string | '#' | - | Link URL |
| `unread` | bool | false | - | Unread indicator |

---

## Real-World Examples

### User Profile Dropdown

```blade
<x-ui.dropdown align="right" width="64">
    <x-slot:trigger>
        <button class="flex items-center gap-2">
            <img src="{{ auth()->user()->avatar }}" class="w-8 h-8 rounded-full">
            <span>{{ auth()->user()->name }}</span>
            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"/>
            </svg>
        </button>
    </x-slot:trigger>

    <x-ui.dropdown.header
        :avatar="auth()->user()->avatar"
        :name="auth()->user()->name"
        :email="auth()->user()->email"
    />

    <x-ui.dropdown.divider />

    <x-ui.dropdown.item href="/dashboard" wire:navigate>
        <svg class="w-4 h-4 me-2" fill="currentColor" viewBox="0 0 20 20">
            <path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"/>
        </svg>
        Dashboard
    </x-ui.dropdown.item>

    <x-ui.dropdown.item href="/profile" wire:navigate>
        <svg class="w-4 h-4 me-2" fill="currentColor" viewBox="0 0 20 20">
            <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"/>
        </svg>
        Profile
    </x-ui.dropdown.item>

    <x-ui.dropdown.item href="/settings" wire:navigate>
        <svg class="w-4 h-4 me-2" fill="currentColor" viewBox="0 0 20 20">
            <path fill-rule="evenodd" d="M11.49 3.17c-.38-1.56-2.6-1.56-2.98 0a1.532 1.532 0 01-2.286.948c-1.372-.836-2.942.734-2.106 2.106.54.886.061 2.042-.947 2.287-1.561.379-1.561 2.6 0 2.978a1.532 1.532 0 01.947 2.287c-.836 1.372.734 2.942 2.106 2.106a1.532 1.532 0 012.287.947c.379 1.561 2.6 1.561 2.978 0a1.533 1.533 0 012.287-.947c1.372.836 2.942-.734 2.106-2.106a1.533 1.533 0 01.947-2.287c1.561-.379 1.561-2.6 0-2.978a1.532 1.532 0 01-.947-2.287c.836-1.372-.734-2.942-2.106-2.106a1.532 1.532 0 01-2.287-.947zM10 13a3 3 0 100-6 3 3 0 000 6z" clip-rule="evenodd"/>
        </svg>
        Settings
    </x-ui.dropdown.item>

    <x-ui.dropdown.divider />

    <x-ui.dropdown.item variant="danger" wire:click="logout">
        <svg class="w-4 h-4 me-2" fill="currentColor" viewBox="0 0 20 20">
            <path fill-rule="evenodd" d="M3 3a1 1 0 00-1 1v12a1 1 0 102 0V4a1 1 0 00-1-1zm10.293 9.293a1 1 0 001.414 1.414l3-3a1 1 0 000-1.414l-3-3a1 1 0 10-1.414 1.414L14.586 9H7a1 1 0 100 2h7.586l-1.293 1.293z" clip-rule="evenodd"/>
        </svg>
        Logout
    </x-ui.dropdown.item>
</x-ui.dropdown>
```

### Actions Menu (Three Dots)

```blade
<x-ui.dropdown align="right" width="48">
    <x-slot:trigger>
        <button class="p-2 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-700">
            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                <path d="M10 6a2 2 0 110-4 2 2 0 010 4zM10 12a2 2 0 110-4 2 2 0 010 4zM10 18a2 2 0 110-4 2 2 0 010 4z"/>
            </svg>
        </button>
    </x-slot:trigger>

    <x-ui.dropdown.item wire:click="edit({{ $post->id }})">
        <svg class="w-4 h-4 me-2" fill="currentColor" viewBox="0 0 20 20">
            <path d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z"/>
            <path fill-rule="evenodd" d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z" clip-rule="evenodd"/>
        </svg>
        Edit
    </x-ui.dropdown.item>

    <x-ui.dropdown.item wire:click="duplicate({{ $post->id }})">
        <svg class="w-4 h-4 me-2" fill="currentColor" viewBox="0 0 20 20">
            <path d="M7 9a2 2 0 012-2h6a2 2 0 012 2v6a2 2 0 01-2 2H9a2 2 0 01-2-2V9z"/>
            <path d="M5 3a2 2 0 00-2 2v6a2 2 0 002 2V5h8a2 2 0 00-2-2H5z"/>
        </svg>
        Duplicate
    </x-ui.dropdown.item>

    <x-ui.dropdown.divider />

    <x-ui.dropdown.item variant="danger" wire:click="delete({{ $post->id }})">
        <svg class="w-4 h-4 me-2" fill="currentColor" viewBox="0 0 20 20">
            <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"/>
        </svg>
        Delete
    </x-ui.dropdown.item>
</x-ui.dropdown>
```

### Filter Dropdown with Checkboxes

```blade
<form action="/products" method="GET">
    <x-ui.dropdown align="left" width="64">
        <x-slot:trigger>
            <button type="button" class="px-4 py-2 border border-gray-300 rounded-lg">
                <svg class="w-5 h-5 inline me-2" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M3 3a1 1 0 011-1h12a1 1 0 011 1v3a1 1 0 01-.293.707L12 11.414V15a1 1 0 01-.293.707l-2 2A1 1 0 018 17v-5.586L3.293 6.707A1 1 0 013 6V3z"/>
                </svg>
                Filters
            </button>
        </x-slot:trigger>

        <div class="p-3">
            <div class="font-semibold text-sm text-gray-900 dark:text-white mb-2">
                Categories
            </div>

            <x-ui.dropdown.checkbox
                name="categories[]"
                value="electronics"
                label="Electronics"
                helper="Phones, laptops, etc."
            />

            <x-ui.dropdown.checkbox
                name="categories[]"
                value="clothing"
                label="Clothing"
            />

            <x-ui.dropdown.checkbox
                name="categories[]"
                value="books"
                label="Books"
            />
        </div>

        <x-ui.dropdown.divider />

        <div class="p-3">
            <div class="font-semibold text-sm text-gray-900 dark:text-white mb-2">
                Price Range
            </div>

            <x-ui.dropdown.checkbox
                name="price[]"
                value="0-50"
                label="$0 - $50"
            />

            <x-ui.dropdown.checkbox
                name="price[]"
                value="50-100"
                label="$50 - $100"
            />

            <x-ui.dropdown.checkbox
                name="price[]"
                value="100+"
                label="$100+"
            />
        </div>

        <x-ui.dropdown.divider />

        <div class="p-3">
            <button type="submit" class="w-full px-4 py-2 text-white bg-blue-700 rounded-lg hover:bg-blue-800">
                Apply Filters
            </button>
        </div>
    </x-ui.dropdown>
</form>
```

### Searchable User List

```blade
<x-ui.dropdown align="left" width="80">
    <x-slot:trigger>
        <button>Assign to User</button>
    </x-slot:trigger>

    <x-ui.dropdown.search
        placeholder="Search users..."
        wire:model.live="userSearch"
    />

    <div class="max-h-64 overflow-y-auto">
        @forelse($users as $user)
            <x-ui.dropdown.item wire:click="assignUser({{ $user->id }})">
                <div class="flex items-center">
                    <img src="{{ $user->avatar }}" class="w-8 h-8 rounded-full me-3">
                    <div>
                        <div class="font-medium">{{ $user->name }}</div>
                        <div class="text-xs text-gray-500">{{ $user->email }}</div>
                    </div>
                </div>
            </x-ui.dropdown.item>
        @empty
            <div class="px-4 py-3 text-sm text-gray-500">
                No users found
            </div>
        @endforelse
    </div>
</x-ui.dropdown>
```

---

## Best Practices

### 1. Proper Trigger Buttons

```blade
{{-- Good: Clear trigger button --}}
<x-ui.dropdown align="right">
    <x-slot:trigger>
        <button class="flex items-center gap-2 px-4 py-2 border rounded-lg">
            Options
            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"/>
            </svg>
        </button>
    </x-slot:trigger>

    {{-- Items --}}
</x-ui.dropdown>
```

### 2. Use Dividers for Grouping

```blade
<x-ui.dropdown>
    {{-- Profile actions --}}
    <x-ui.dropdown.item href="/profile">Profile</x-ui.dropdown.item>
    <x-ui.dropdown.item href="/settings">Settings</x-ui.dropdown.item>

    <x-ui.dropdown.divider />

    {{-- Account actions --}}
    <x-ui.dropdown.item href="/billing">Billing</x-ui.dropdown.item>
    <x-ui.dropdown.item href="/api-keys">API Keys</x-ui.dropdown.item>

    <x-ui.dropdown.divider />

    {{-- Destructive action --}}
    <x-ui.dropdown.item variant="danger">Logout</x-ui.dropdown.item>
</x-ui.dropdown>
```

### 3. Scrollable Long Lists

```blade
<x-ui.dropdown width="64">
    <x-slot:trigger>
        <button>Select Country</button>
    </x-slot:trigger>

    <x-ui.dropdown.search placeholder="Search countries..." />

    {{-- Scrollable container --}}
    <div class="max-h-64 overflow-y-auto">
        @foreach($countries as $country)
            <x-ui.dropdown.item>{{ $country }}</x-ui.dropdown.item>
        @endforeach
    </div>
</x-ui.dropdown>
```

### 4. Accessibility

```blade
{{-- Add ARIA labels --}}
<x-ui.dropdown>
    <x-slot:trigger>
        <button aria-label="User menu">
            <img src="/avatar.jpg" alt="User avatar">
        </button>
    </x-slot:trigger>

    {{-- Items --}}
</x-ui.dropdown>
```

---

## Related Components

- [Button](button.md) - Button component
- [Avatar](avatar.md) - User avatars
- [Drawer](drawer.md) - Off-canvas panels

---

## Tips & Tricks

### Keep Dropdown Open on Item Click

By default, dropdown closes on any click inside. To prevent this for certain elements:

```blade
<x-ui.dropdown>
    <x-slot:trigger>
        <button>Options</button>
    </x-slot:trigger>

    {{-- This won't close the dropdown --}}
    <div @click.stop class="p-4">
        <label class="flex items-center">
            <input type="checkbox">
            <span class="ms-2">Remember me</span>
        </label>
    </div>

    {{-- These will close the dropdown --}}
    <x-ui.dropdown.item href="/">Home</x-ui.dropdown.item>
</x-ui.dropdown>
```

### Custom Positioning

```blade
{{-- Override the default positioning --}}
<x-ui.dropdown>
    <x-slot:trigger>
        <button>Custom Position</button>
    </x-slot:trigger>

    <div class="!mt-4 !w-96">
        {{-- Items --}}
    </div>
</x-ui.dropdown>
```