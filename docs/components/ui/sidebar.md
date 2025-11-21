# Sidebar Component

Vertical navigation sidebars with support for multi-level menus, branding, and responsive behavior.

## Overview

The Sidebar component provides a flexible vertical navigation system with support for fixed positioning, off-canvas drawers, multi-level dropdown menus, branding sections, call-to-action blocks, and content separators. Built with Alpine.js for smooth interactions and includes responsive mobile support.

## Component Files

- `resources/views/components/ui/sidebar.blade.php` - Base sidebar container
- `resources/views/components/ui/sidebar/item.blade.php` - Menu item
- `resources/views/components/ui/sidebar/group.blade.php` - Menu group with heading
- `resources/views/components/ui/sidebar/dropdown.blade.php` - Collapsible dropdown menu
- `resources/views/components/ui/sidebar/dropdown-item.blade.php` - Dropdown menu item
- `resources/views/components/ui/sidebar/logo.blade.php` - Logo/branding section
- `resources/views/components/ui/sidebar/cta.blade.php` - Call-to-action block
- `resources/views/components/ui/sidebar/separator.blade.php` - Content divider

## Basic Usage

### Simple Sidebar

```blade
<x-ui.sidebar>
    <x-ui.sidebar.logo href="/" src="/images/logo.svg">
        Flowbite
    </x-ui.sidebar.logo>

    <x-ui.sidebar.group>
        <x-ui.sidebar.item href="/dashboard" :active="true">
            Dashboard
        </x-ui.sidebar.item>

        <x-ui.sidebar.item href="/users">
            Users
        </x-ui.sidebar.item>

        <x-ui.sidebar.item href="/settings">
            Settings
        </x-ui.sidebar.item>
    </x-ui.sidebar.group>
</x-ui.sidebar>
```

### Off-Canvas Sidebar

```blade
<x-ui.sidebar id="drawer-sidebar" :offCanvas="true">
    {{-- Sidebar content --}}
</x-ui.sidebar>

{{-- Toggle button --}}
<button data-sidebar-toggle="drawer-sidebar">
    Open Sidebar
</button>
```

## Props

### Sidebar Props

| Prop | Type | Default | Options | Description |
|------|------|---------|---------|-------------|
| `id` | string | `'sidebar'` | - | Unique identifier |
| `fixed` | bool | `true` | - | Fixed positioning |
| `width` | string | `'default'` | `'sm'`, `'default'`, `'lg'`, `'xl'` | Sidebar width |
| `position` | string | `'left'` | `'left'`, `'right'` | Side of screen |
| `offCanvas` | bool | `false` | - | Drawer-style toggle |
| `backdrop` | bool | `true` | - | Show backdrop when open |

### Item Props

| Prop | Type | Default | Description |
|------|------|---------|-------------|
| `href` | string | `null` | Link URL |
| `active` | bool | `false` | Active state |
| `icon` | string | `null` | SVG icon HTML |
| `badge` | string | `null` | Badge text |
| `badgeColor` | string | `'blue'` | Badge color variant |

### Group Props

| Prop | Type | Default | Description |
|------|------|---------|-------------|
| `heading` | string | `null` | Group heading text |

### Dropdown Props

| Prop | Type | Default | Description |
|------|------|---------|-------------|
| `label` | string | `null` | Dropdown label |
| `icon` | string | `null` | SVG icon HTML |
| `open` | bool | `false` | Initial open state |
| `id` | string | `null` | Unique identifier |

### Logo Props

| Prop | Type | Default | Description |
|------|------|---------|-------------|
| `href` | string | `'/'` | Logo link URL |
| `src` | string | `null` | Logo image source |
| `alt` | string | `'Logo'` | Image alt text |

### CTA Props

| Prop | Type | Default | Options | Description |
|------|------|---------|---------|-------------|
| `dismissible` | bool | `false` | - | Show close button |
| `color` | string | `'blue'` | `'blue'`, `'red'`, `'green'`, `'yellow'`, `'purple'` | Background color |

## Sidebar Variants

### 1. Default Sidebar

```blade
<x-ui.sidebar>
    <x-ui.sidebar.logo href="/" src="/images/logo.svg">
        Flowbite
    </x-ui.sidebar.logo>

    <x-ui.sidebar.group>
        <x-ui.sidebar.item
            href="{{ route('dashboard') }}"
            :active="request()->routeIs('dashboard')"
            :icon="'<svg class=\'w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white\' fill=\'currentColor\' viewBox=\'0 0 20 20\'><path d=\'M2 10a8 8 0 018-8v8h8a8 8 0 11-16 0z\'></path><path d=\'M12 2.252A8.014 8.014 0 0117.748 8H12V2.252z\'></path></svg>'"
        >
            Dashboard
        </x-ui.sidebar.item>

        <x-ui.sidebar.item
            href="{{ route('users.index') }}"
            :active="request()->routeIs('users.*')"
            :icon="'<svg class=\'flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white\' fill=\'currentColor\' viewBox=\'0 0 20 20\'><path d=\'M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z\'></path></svg>'"
        >
            Users
        </x-ui.sidebar.item>

        <x-ui.sidebar.item
            href="{{ route('inbox') }}"
            :active="request()->routeIs('inbox')"
            :icon="'<svg class=\'flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white\' fill=\'currentColor\' viewBox=\'0 0 20 20\'><path d=\'M8.707 7.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l2-2a1 1 0 00-1.414-1.414L11 7.586V3a1 1 0 10-2 0v4.586l-.293-.293z\'></path><path d=\'M3 5a2 2 0 012-2h1a1 1 0 010 2H5v7h2l1 2h4l1-2h2V5h-1a1 1 0 110-2h1a2 2 0 012 2v10a2 2 0 01-2 2H5a2 2 0 01-2-2V5z\'></path></svg>'"
            badge="3"
        >
            Inbox
        </x-ui.sidebar.item>
    </x-ui.sidebar.group>
</x-ui.sidebar>
```

### 2. Multi-Level Menu

```blade
<x-ui.sidebar>
    <x-ui.sidebar.logo href="/">
        Flowbite
    </x-ui.sidebar.logo>

    <x-ui.sidebar.group>
        <x-ui.sidebar.item href="/dashboard">
            Dashboard
        </x-ui.sidebar.item>

        {{-- Dropdown menu --}}
        <x-ui.sidebar.dropdown
            label="E-commerce"
            :icon="'<svg class=\'flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 group-hover:text-gray-900 dark:text-gray-400 dark:group-hover:text-white\' fill=\'currentColor\' viewBox=\'0 0 20 20\'><path d=\'M5 3a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2V5a2 2 0 00-2-2H5zM5 11a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2v-2a2 2 0 00-2-2H5zM11 5a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V5zM11 13a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z\'></path></svg>'"
        >
            <x-ui.sidebar.dropdown-item href="/products">
                Products
            </x-ui.sidebar.dropdown-item>

            <x-ui.sidebar.dropdown-item href="/billing">
                Billing
            </x-ui.sidebar.dropdown-item>

            <x-ui.sidebar.dropdown-item href="/invoices">
                Invoice
            </x-ui.sidebar.dropdown-item>
        </x-ui.sidebar.dropdown>

        <x-ui.sidebar.item href="/kanban">
            Kanban
        </x-ui.sidebar.item>
    </x-ui.sidebar.group>
</x-ui.sidebar>
```

### 3. With Content Separator

```blade
<x-ui.sidebar>
    <x-ui.sidebar.logo href="/">
        Flowbite
    </x-ui.sidebar.logo>

    {{-- Primary navigation --}}
    <x-ui.sidebar.group heading="Main">
        <x-ui.sidebar.item href="/dashboard" :active="true">
            Dashboard
        </x-ui.sidebar.item>

        <x-ui.sidebar.item href="/services">
            Services
        </x-ui.sidebar.item>

        <x-ui.sidebar.item href="/bookings">
            Bookings
        </x-ui.sidebar.item>
    </x-ui.sidebar.group>

    <x-ui.sidebar.separator />

    {{-- Secondary navigation --}}
    <x-ui.sidebar.group heading="Support">
        <x-ui.sidebar.item href="/help">
            Documentation
        </x-ui.sidebar.item>

        <x-ui.sidebar.item href="/support">
            Support
        </x-ui.sidebar.item>
    </x-ui.sidebar.group>
</x-ui.sidebar>
```

### 4. With CTA Block

```blade
<x-ui.sidebar>
    <x-ui.sidebar.logo href="/">
        Flowbite
    </x-ui.sidebar.logo>

    <x-ui.sidebar.group>
        <x-ui.sidebar.item href="/dashboard">
            Dashboard
        </x-ui.sidebar.item>

        <x-ui.sidebar.item href="/services">
            Services
        </x-ui.sidebar.item>
    </x-ui.sidebar.group>

    <x-ui.sidebar.cta :dismissible="true" color="blue">
        <div class="flex items-center mb-3">
            <span class="bg-orange-100 text-orange-800 text-xs font-semibold px-2.5 py-0.5 rounded dark:bg-orange-200 dark:text-orange-900">
                Beta
            </span>
        </div>

        <p class="mb-3 text-sm text-blue-800 dark:text-blue-400">
            Preview the new design dashboard experience for Flowbite.
        </p>

        <a href="/preview" class="text-sm text-blue-800 underline font-medium hover:text-blue-900 dark:text-blue-400 dark:hover:text-blue-300">
            Try it now
        </a>
    </x-ui.sidebar.cta>
</x-ui.sidebar>
```

### 5. Width Variants

```blade
{{-- Small (w-56) --}}
<x-ui.sidebar width="sm">
    {{-- Content --}}
</x-ui.sidebar>

{{-- Default (w-64) --}}
<x-ui.sidebar width="default">
    {{-- Content --}}
</x-ui.sidebar>

{{-- Large (w-72) --}}
<x-ui.sidebar width="lg">
    {{-- Content --}}
</x-ui.sidebar>

{{-- Extra Large (w-80) --}}
<x-ui.sidebar width="xl">
    {{-- Content --}}
</x-ui.sidebar>
```

### 6. Right-Positioned Sidebar

```blade
<x-ui.sidebar position="right">
    <x-ui.sidebar.group heading="Settings">
        <x-ui.sidebar.item href="/profile">
            Profile
        </x-ui.sidebar.item>

        <x-ui.sidebar.item href="/preferences">
            Preferences
        </x-ui.sidebar.item>
    </x-ui.sidebar.group>
</x-ui.sidebar>
```

### 7. Off-Canvas Drawer

```blade
{{-- Sidebar --}}
<x-ui.sidebar id="mobile-sidebar" :offCanvas="true">
    <x-ui.sidebar.logo href="/">
        Flowbite
    </x-ui.sidebar.logo>

    <x-ui.sidebar.group>
        <x-ui.sidebar.item href="/dashboard">
            Dashboard
        </x-ui.sidebar.item>

        <x-ui.sidebar.item href="/services">
            Services
        </x-ui.sidebar.item>
    </x-ui.sidebar.group>
</x-ui.sidebar>

{{-- Toggle button --}}
<button
    data-sidebar-toggle="mobile-sidebar"
    class="p-2 text-gray-600 rounded cursor-pointer lg:hidden hover:text-gray-900 hover:bg-gray-100 dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-700"
>
    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20">
        <path fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"></path>
    </svg>
</button>
```

## Real-World Examples

### Example 1: Admin Dashboard Sidebar

```blade
<x-ui.sidebar>
    {{-- Logo --}}
    <x-ui.sidebar.logo href="{{ route('dashboard') }}" src="{{ asset('images/logo.svg') }}">
        {{ config('app.name') }}
    </x-ui.sidebar.logo>

    {{-- Main Navigation --}}
    <x-ui.sidebar.group>
        <x-ui.sidebar.item
            href="{{ route('dashboard') }}"
            :active="request()->routeIs('dashboard')"
            :icon="'<svg class=\'w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white\' fill=\'currentColor\' viewBox=\'0 0 20 20\'><path d=\'M2 10a8 8 0 018-8v8h8a8 8 0 11-16 0z\'></path><path d=\'M12 2.252A8.014 8.014 0 0117.748 8H12V2.252z\'></path></svg>'"
        >
            Dashboard
        </x-ui.sidebar.item>

        <x-ui.sidebar.dropdown
            label="Services"
            :open="request()->routeIs('services.*')"
            :icon="'<svg class=\'flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 group-hover:text-gray-900 dark:text-gray-400 dark:group-hover:text-white\' fill=\'currentColor\' viewBox=\'0 0 20 20\'><path d=\'M5 3a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2V5a2 2 0 00-2-2H5zM5 11a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2v-2a2 2 0 00-2-2H5zM11 5a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V5zM11 13a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z\'></path></svg>'"
        >
            <x-ui.sidebar.dropdown-item
                href="{{ route('services.index') }}"
                :active="request()->routeIs('services.index')"
            >
                All Services
            </x-ui.sidebar.dropdown-item>

            <x-ui.sidebar.dropdown-item
                href="{{ route('services.create') }}"
                :active="request()->routeIs('services.create')"
            >
                Add Service
            </x-ui.sidebar.dropdown-item>

            <x-ui.sidebar.dropdown-item
                href="{{ route('services.categories') }}"
                :active="request()->routeIs('services.categories')"
            >
                Categories
            </x-ui.sidebar.dropdown-item>
        </x-ui.sidebar.dropdown>

        <x-ui.sidebar.item
            href="{{ route('bookings.index') }}"
            :active="request()->routeIs('bookings.*')"
            :icon="'<svg class=\'flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white\' fill=\'currentColor\' viewBox=\'0 0 20 20\'><path fill-rule=\'evenodd\' d=\'M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z\' clip-rule=\'evenodd\'></path></svg>'"
            :badge="$pendingBookingsCount"
            badgeColor="red"
        >
            Bookings
        </x-ui.sidebar.item>

        <x-ui.sidebar.item
            href="{{ route('customers.index') }}"
            :active="request()->routeIs('customers.*')"
            :icon="'<svg class=\'flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white\' fill=\'currentColor\' viewBox=\'0 0 20 20\'><path d=\'M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z\'></path></svg>'"
        >
            Customers
        </x-ui.sidebar.item>

        <x-ui.sidebar.item
            href="{{ route('messages.index') }}"
            :active="request()->routeIs('messages.*')"
            :icon="'<svg class=\'flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white\' fill=\'currentColor\' viewBox=\'0 0 20 20\'><path d=\'M8.707 7.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l2-2a1 1 0 00-1.414-1.414L11 7.586V3a1 1 0 10-2 0v4.586l-.293-.293z\'></path><path d=\'M3 5a2 2 0 012-2h1a1 1 0 010 2H5v7h2l1 2h4l1-2h2V5h-1a1 1 0 110-2h1a2 2 0 012 2v10a2 2 0 01-2 2H5a2 2 0 01-2-2V5z\'></path></svg>'"
            :badge="$unreadMessagesCount"
            badgeColor="blue"
        >
            Messages
        </x-ui.sidebar.item>
    </x-ui.sidebar.group>

    <x-ui.sidebar.separator />

    {{-- Settings & Support --}}
    <x-ui.sidebar.group heading="Settings">
        <x-ui.sidebar.item
            href="{{ route('settings.general') }}"
            :active="request()->routeIs('settings.*')"
            :icon="'<svg class=\'flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white\' fill=\'currentColor\' viewBox=\'0 0 20 20\'><path fill-rule=\'evenodd\' d=\'M11.49 3.17c-.38-1.56-2.6-1.56-2.98 0a1.532 1.532 0 01-2.286.948c-1.372-.836-2.942.734-2.106 2.106.54.886.061 2.042-.947 2.287-1.561.379-1.561 2.6 0 2.978a1.532 1.532 0 01.947 2.287c-.836 1.372.734 2.942 2.106 2.106a1.532 1.532 0 012.287.947c.379 1.561 2.6 1.561 2.978 0a1.533 1.533 0 012.287-.947c1.372.836 2.942-.734 2.106-2.106a1.533 1.533 0 01.947-2.287c1.561-.379 1.561-2.6 0-2.978a1.532 1.532 0 01-.947-2.287c.836-1.372-.734-2.942-2.106-2.106a1.532 1.532 0 01-2.287-.947zM10 13a3 3 0 100-6 3 3 0 000 6z\' clip-rule=\'evenodd\'></path></svg>'"
        >
            Settings
        </x-ui.sidebar.item>

        <x-ui.sidebar.item
            href="{{ route('help') }}"
            :icon="'<svg class=\'flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white\' fill=\'currentColor\' viewBox=\'0 0 20 20\'><path fill-rule=\'evenodd\' d=\'M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-8-3a1 1 0 00-.867.5 1 1 0 11-1.731-1A3 3 0 0113 8a3.001 3.001 0 01-2 2.83V11a1 1 0 11-2 0v-1a1 1 0 011-1 1 1 0 100-2zm0 8a1 1 0 100-2 1 1 0 000 2z\' clip-rule=\'evenodd\'></path></svg>'"
        >
            Help
        </x-ui.sidebar.item>
    </x-ui.sidebar.group>

    {{-- Upgrade CTA --}}
    @if(!auth()->user()->isPro())
        <x-ui.sidebar.cta color="purple">
            <div class="flex items-center mb-3">
                <span class="bg-purple-100 text-purple-800 text-xs font-semibold px-2.5 py-0.5 rounded dark:bg-purple-900 dark:text-purple-300">
                    Pro
                </span>
            </div>

            <p class="mb-3 text-sm text-purple-800 dark:text-purple-400">
                Upgrade to Pro to unlock all features and get priority support.
            </p>

            <a href="{{ route('upgrade') }}" class="inline-flex items-center text-sm font-medium text-purple-800 hover:underline dark:text-purple-400">
                Upgrade Now
                <svg class="w-3 h-3 ms-1" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M12.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                </svg>
            </a>
        </x-ui.sidebar.cta>
    @endif
</x-ui.sidebar>
```

### Example 2: E-commerce Sidebar

```blade
<x-ui.sidebar>
    <x-ui.sidebar.logo href="/" src="/images/logo.svg">
        Shop
    </x-ui.sidebar.logo>

    <x-ui.sidebar.group heading="Browse">
        <x-ui.sidebar.item href="/">
            Home
        </x-ui.sidebar.item>

        <x-ui.sidebar.dropdown
            label="Categories"
            :open="request()->routeIs('categories.*')"
        >
            @foreach($categories as $category)
                <x-ui.sidebar.dropdown-item
                    href="{{ route('categories.show', $category) }}"
                    :active="request()->route('category')?->id === $category->id"
                >
                    {{ $category->name }}
                </x-ui.sidebar.dropdown-item>
            @endforeach
        </x-ui.sidebar.dropdown>

        <x-ui.sidebar.item href="/deals" badge="Sale" badgeColor="red">
            Special Deals
        </x-ui.sidebar.item>
    </x-ui.sidebar.group>

    <x-ui.sidebar.separator />

    <x-ui.sidebar.group heading="Account">
        @auth
            <x-ui.sidebar.item href="/orders">
                My Orders
            </x-ui.sidebar.item>

            <x-ui.sidebar.item href="/wishlist">
                Wishlist
            </x-ui.sidebar.item>

            <x-ui.sidebar.item href="/account">
                Account Settings
            </x-ui.sidebar.item>
        @else
            <x-ui.sidebar.item href="/login">
                Sign In
            </x-ui.sidebar.item>

            <x-ui.sidebar.item href="/register">
                Create Account
            </x-ui.sidebar.item>
        @endauth
    </x-ui.sidebar.group>
</x-ui.sidebar>
```

### Example 3: Responsive Mobile Sidebar

```blade
{{-- Desktop Layout --}}
<div class="flex min-h-screen bg-gray-50 dark:bg-gray-900">
    {{-- Desktop Sidebar (hidden on mobile) --}}
    <div class="hidden lg:block">
        <x-ui.sidebar>
            {{-- Sidebar content --}}
        </x-ui.sidebar>
    </div>

    {{-- Main Content --}}
    <div class="flex-1 lg:ml-64">
        {{-- Mobile Header --}}
        <header class="bg-white border-b border-gray-200 dark:bg-gray-800 dark:border-gray-700 lg:hidden">
            <div class="flex items-center justify-between p-4">
                {{-- Mobile Menu Toggle --}}
                <button
                    data-sidebar-toggle="mobile-sidebar"
                    class="p-2 text-gray-600 rounded cursor-pointer hover:text-gray-900 hover:bg-gray-100 dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-700"
                >
                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"></path>
                    </svg>
                </button>

                {{-- Logo --}}
                <a href="/" class="flex items-center">
                    <img src="/images/logo.svg" class="h-8" alt="Logo">
                </a>

                {{-- User Menu --}}
                <x-ui.dropdown align="right">
                    <x-slot:trigger>
                        <button class="flex items-center">
                            <x-ui.avatar :src="auth()->user()->avatar" size="sm" />
                        </button>
                    </x-slot:trigger>

                    <x-slot:content>
                        {{-- Dropdown menu items --}}
                    </x-slot:content>
                </x-ui.dropdown>
            </div>
        </header>

        {{-- Page Content --}}
        <main class="p-4 lg:p-8">
            {{ $slot }}
        </main>
    </div>
</div>

{{-- Mobile Off-Canvas Sidebar --}}
<x-ui.sidebar id="mobile-sidebar" :offCanvas="true">
    {{-- Sidebar content (same as desktop) --}}
</x-ui.sidebar>
```

### Example 4: Sidebar with User Profile

```blade
<x-ui.sidebar>
    {{-- Logo --}}
    <x-ui.sidebar.logo href="/">
        Flowbite
    </x-ui.sidebar.logo>

    {{-- Navigation --}}
    <x-ui.sidebar.group>
        <x-ui.sidebar.item href="/dashboard" :active="true">
            Dashboard
        </x-ui.sidebar.item>

        <x-ui.sidebar.item href="/services">
            Services
        </x-ui.sidebar.item>

        <x-ui.sidebar.item href="/bookings">
            Bookings
        </x-ui.sidebar.item>
    </x-ui.sidebar.group>

    <x-ui.sidebar.separator />

    {{-- User Profile Section --}}
    <div class="mt-auto px-3 py-4">
        <x-ui.dropdown align="top" width="full">
            <x-slot:trigger>
                <button class="flex items-center w-full p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
                    <x-ui.avatar
                        :src="auth()->user()->avatar"
                        :alt="auth()->user()->name"
                        size="sm"
                    />

                    <div class="flex-1 ms-3 text-left">
                        <p class="text-sm font-medium">{{ auth()->user()->name }}</p>
                        <p class="text-xs text-gray-500 dark:text-gray-400">{{ auth()->user()->email }}</p>
                    </div>

                    <svg class="w-4 h-4 text-gray-500" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                    </svg>
                </button>
            </x-slot:trigger>

            <x-slot:content>
                <x-ui.dropdown.item href="/profile">
                    Profile
                </x-ui.dropdown.item>

                <x-ui.dropdown.item href="/settings">
                    Settings
                </x-ui.dropdown.item>

                <x-ui.dropdown.divider />

                <x-ui.dropdown.item
                    href="/logout"
                    @click.prevent="$refs.logoutForm.submit()"
                >
                    Logout
                </x-ui.dropdown.item>
            </x-slot:content>
        </x-ui.dropdown>

        <form ref="logoutForm" method="POST" action="/logout" class="hidden">
            @csrf
        </form>
    </div>
</x-ui.sidebar>
```

## Accessibility

### ARIA Attributes

```blade
<aside aria-label="Sidebar">
    {{-- Sidebar content --}}
</aside>

<a href="/dashboard" aria-current="page">
    Dashboard
</a>

<button
    aria-expanded="false"
    aria-controls="dropdown-menu"
>
    Menu
</button>
```

### Keyboard Navigation

- Tab to navigate through menu items
- Enter/Space to activate links and buttons
- Arrow keys for dropdown navigation
- Escape to close off-canvas sidebar

### Screen Reader Support

```blade
<button aria-label="Open navigation menu">
    <svg aria-hidden="true">...</svg>
</button>

<span class="sr-only">Close sidebar</span>
```

## Best Practices

### 1. Organize Menu Logically

```blade
{{-- Group related items --}}
<x-ui.sidebar.group heading="Content">
    <x-ui.sidebar.item href="/posts">Posts</x-ui.sidebar.item>
    <x-ui.sidebar.item href="/pages">Pages</x-ui.sidebar.item>
    <x-ui.sidebar.item href="/media">Media</x-ui.sidebar.item>
</x-ui.sidebar.group>

<x-ui.sidebar.separator />

<x-ui.sidebar.group heading="Settings">
    <x-ui.sidebar.item href="/general">General</x-ui.sidebar.item>
    <x-ui.sidebar.item href="/users">Users</x-ui.sidebar.item>
</x-ui.sidebar.group>
```

### 2. Indicate Active States

```blade
<x-ui.sidebar.item
    href="{{ route('dashboard') }}"
    :active="request()->routeIs('dashboard')"
>
    Dashboard
</x-ui.sidebar.item>
```

### 3. Use Badges Sparingly

```blade
{{-- Good: Important notifications --}}
<x-ui.sidebar.item href="/inbox" badge="5" badgeColor="red">
    Inbox
</x-ui.sidebar.item>

{{-- Avoid: Too many badges --}}
<x-ui.sidebar.item href="/dashboard" badge="12">Dashboard</x-ui.sidebar.item>
<x-ui.sidebar.item href="/users" badge="3">Users</x-ui.sidebar.item>
<x-ui.sidebar.item href="/posts" badge="8">Posts</x-ui.sidebar.item>
```

### 4. Mobile Responsiveness

```blade
{{-- Fixed sidebar on desktop, drawer on mobile --}}
<div class="hidden lg:block">
    <x-ui.sidebar>
        {{-- Content --}}
    </x-ui.sidebar>
</div>

<x-ui.sidebar id="mobile-menu" :offCanvas="true" class="lg:hidden">
    {{-- Same content --}}
</x-ui.sidebar>
```

### 5. Performance Optimization

```blade
{{-- Lazy load dropdown content --}}
<x-ui.sidebar.dropdown label="Reports">
    @if($showReports)
        <x-ui.sidebar.dropdown-item href="/sales">Sales</x-ui.sidebar.dropdown-item>
        <x-ui.sidebar.dropdown-item href="/analytics">Analytics</x-ui.sidebar.dropdown-item>
    @endif
</x-ui.sidebar.dropdown>
```

## Dark Mode Support

All sidebar components include full dark mode support:

```blade
{{-- Automatically adapts to dark mode --}}
<x-ui.sidebar>
    <x-ui.sidebar.item href="/dashboard">
        Dashboard
    </x-ui.sidebar.item>
</x-ui.sidebar>
```

## Testing

### Component Testing

```php
public function test_sidebar_renders()
{
    $view = $this->blade('<x-ui.sidebar><x-ui.sidebar.item href="/test">Test</x-ui.sidebar.item></x-ui.sidebar>');

    $view->assertSee('Test');
}

public function test_sidebar_item_shows_active_state()
{
    $view = $this->blade('<x-ui.sidebar.item href="/test" :active="true">Test</x-ui.sidebar.item>');

    $view->assertSee('aria-current="page"', false);
}
```

## Related Components

- [Navbar](navbar.md) - Top navigation bar
- [Dropdown](dropdown.md) - Dropdown menus
- [Drawer](drawer.md) - Off-canvas panels
- [Breadcrumb](breadcrumb.md) - Breadcrumb navigation

## Resources

- [Flowbite Sidebar Documentation](https://flowbite.com/docs/components/sidebar/)
- [ARIA Navigation Patterns](https://www.w3.org/WAI/ARIA/apg/patterns/navigation/)
- [Mobile Navigation Best Practices](https://www.nngroup.com/articles/mobile-navigation-patterns/)

---

**Component Version:** 1.0.0
**Last Updated:** 2025-11-20
**Flowbite Version:** 2.x
