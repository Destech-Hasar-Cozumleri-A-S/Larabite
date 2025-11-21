# Tabs

Interactive tabbed interface component for organizing content into separate panels. Built with Alpine.js following Flowbite design patterns.

## Component Location

- **Base Component**: `resources/views/components/ui/tabs.blade.php`
- **Tab Item**: `resources/views/components/ui/tabs/item.blade.php`
- **Tab Panel**: `resources/views/components/ui/tabs/panel.blade.php`

## Features

- Three style variants (default, underline, pills)
- Horizontal and vertical orientation
- Full-width tabs support
- Icons and badges in tabs
- Smooth transitions between panels
- Disabled tab states
- Alpine.js powered (no external dependencies)
- Full dark mode support
- Accessible with ARIA attributes
- Keyboard navigation support
- Responsive design

## Usage

### Default Tabs

```blade
<x-ui::tabs defaultTab="tab1">
    <x-slot:tabs>
        <x-ui::tabs.item id="tab1" variant="default">
            Profile
        </x-ui::tabs.item>
        <x-ui::tabs.item id="tab2" variant="default">
            Settings
        </x-ui::tabs.item>
        <x-ui::tabs.item id="tab3" variant="default">
            Contacts
        </x-ui::tabs.item>
    </x-slot:tabs>

    <x-ui::tabs.panel id="tab1">
        <p>This is the profile tab content.</p>
    </x-ui::tabs.panel>

    <x-ui::tabs.panel id="tab2">
        <p>This is the settings tab content.</p>
    </x-ui::tabs.panel>

    <x-ui::tabs.panel id="tab3">
        <p>This is the contacts tab content.</p>
    </x-ui::tabs.panel>
</x-ui::tabs>
```

### Underline Tabs

```blade
<x-ui::tabs variant="underline" defaultTab="dashboard">
    <x-slot:tabs>
        <x-ui::tabs.item id="dashboard" variant="underline">
            Dashboard
        </x-ui::tabs.item>
        <x-ui::tabs.item id="analytics" variant="underline">
            Analytics
        </x-ui::tabs.item>
        <x-ui::tabs.item id="reports" variant="underline">
            Reports
        </x-ui::tabs.item>
    </x-slot:tabs>

    <x-ui::tabs.panel id="dashboard">
        {{-- Dashboard content --}}
    </x-ui::tabs.panel>

    <x-ui::tabs.panel id="analytics">
        {{-- Analytics content --}}
    </x-ui::tabs.panel>

    <x-ui::tabs.panel id="reports">
        {{-- Reports content --}}
    </x-ui::tabs.panel>
</x-ui::tabs>
```

### Pills Tabs

```blade
<x-ui::tabs variant="pills" defaultTab="home">
    <x-slot:tabs>
        <x-ui::tabs.item id="home" variant="pills">
            Home
        </x-ui::tabs.item>
        <x-ui::tabs.item id="about" variant="pills">
            About
        </x-ui::tabs.item>
        <x-ui::tabs.item id="contact" variant="pills">
            Contact
        </x-ui::tabs.item>
    </x-slot:tabs>

    <x-ui::tabs.panel id="home">
        {{-- Home content --}}
    </x-ui::tabs.panel>

    <x-ui::tabs.panel id="about">
        {{-- About content --}}
    </x-ui::tabs.panel>

    <x-ui::tabs.panel id="contact">
        {{-- Contact content --}}
    </x-ui::tabs.panel>
</x-ui::tabs>
```

### Tabs with Icons

```blade
<x-ui::tabs defaultTab="profile" variant="underline">
    <x-slot:tabs>
        <x-ui::tabs.item id="profile" variant="underline">
            <x-slot:icon>
                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z"/>
                </svg>
            </x-slot:icon>
            Profile
        </x-ui::tabs.item>

        <x-ui::tabs.item id="messages" variant="underline">
            <x-slot:icon>
                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z"/>
                    <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z"/>
                </svg>
            </x-slot:icon>
            Messages
        </x-ui::tabs.item>

        <x-ui::tabs.item id="settings" variant="underline">
            <x-slot:icon>
                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M11.49 3.17c-.38-1.56-2.6-1.56-2.98 0a1.532 1.532 0 01-2.286.948c-1.372-.836-2.942.734-2.106 2.106.54.886.061 2.042-.947 2.287-1.561.379-1.561 2.6 0 2.978a1.532 1.532 0 01.947 2.287c-.836 1.372.734 2.942 2.106 2.106a1.532 1.532 0 012.287.947c.379 1.561 2.6 1.561 2.978 0a1.533 1.533 0 012.287-.947c1.372.836 2.942-.734 2.106-2.106a1.533 1.533 0 01.947-2.287c1.561-.379 1.561-2.6 0-2.978a1.532 1.532 0 01-.947-2.287c.836-1.372-.734-2.942-2.106-2.106a1.532 1.532 0 01-2.287-.947zM10 13a3 3 0 100-6 3 3 0 000 6z"/>
                </svg>
            </x-slot:icon>
            Settings
        </x-ui::tabs.item>
    </x-slot:tabs>

    <x-ui::tabs.panel id="profile">
        {{-- Profile content --}}
    </x-ui::tabs.panel>

    <x-ui::tabs.panel id="messages">
        {{-- Messages content --}}
    </x-ui::tabs.panel>

    <x-ui::tabs.panel id="settings">
        {{-- Settings content --}}
    </x-ui::tabs.panel>
</x-ui::tabs>
```

### Tabs with Badges

```blade
<x-ui::tabs defaultTab="all" variant="pills">
    <x-slot:tabs>
        <x-ui::tabs.item id="all" variant="pills" badge="120">
            All
        </x-ui::tabs.item>
        <x-ui::tabs.item id="unread" variant="pills" badge="5">
            Unread
        </x-ui::tabs.item>
        <x-ui::tabs.item id="archived" variant="pills" badge="45">
            Archived
        </x-ui::tabs.item>
    </x-slot:tabs>

    <x-ui::tabs.panel id="all">
        {{-- All messages --}}
    </x-ui::tabs.panel>

    <x-ui::tabs.panel id="unread">
        {{-- Unread messages --}}
    </x-ui::tabs.panel>

    <x-ui::tabs.panel id="archived">
        {{-- Archived messages --}}
    </x-ui::tabs.panel>
</x-ui::tabs>
```

### Vertical Tabs

```blade
<x-ui::tabs orientation="vertical" defaultTab="general">
    <x-slot:tabs>
        <x-ui::tabs.item id="general" variant="default">
            General
        </x-ui::tabs.item>
        <x-ui::tabs.item id="security" variant="default">
            Security
        </x-ui::tabs.item>
        <x-ui::tabs.item id="notifications" variant="default">
            Notifications
        </x-ui::tabs.item>
        <x-ui::tabs.item id="billing" variant="default">
            Billing
        </x-ui::tabs.item>
    </x-slot:tabs>

    <x-ui::tabs.panel id="general">
        {{-- General settings --}}
    </x-ui::tabs.panel>

    <x-ui::tabs.panel id="security">
        {{-- Security settings --}}
    </x-ui::tabs.panel>

    <x-ui::tabs.panel id="notifications">
        {{-- Notification settings --}}
    </x-ui::tabs.panel>

    <x-ui::tabs.panel id="billing">
        {{-- Billing settings --}}
    </x-ui::tabs.panel>
</x-ui::tabs>
```

### Full Width Tabs

```blade
<x-ui::tabs variant="default" fullWidth defaultTab="week">
    <x-slot:tabs>
        <x-ui::tabs.item id="day" variant="default" :fullWidth="true">
            Day
        </x-ui::tabs.item>
        <x-ui::tabs.item id="week" variant="default" :fullWidth="true">
            Week
        </x-ui::tabs.item>
        <x-ui::tabs.item id="month" variant="default" :fullWidth="true">
            Month
        </x-ui::tabs.item>
        <x-ui::tabs.item id="year" variant="default" :fullWidth="true">
            Year
        </x-ui::tabs.item>
    </x-slot:tabs>

    <x-ui::tabs.panel id="day">
        {{-- Day view --}}
    </x-ui::tabs.panel>

    <x-ui::tabs.panel id="week">
        {{-- Week view --}}
    </x-ui::tabs.panel>

    <x-ui::tabs.panel id="month">
        {{-- Month view --}}
    </x-ui::tabs.panel>

    <x-ui::tabs.panel id="year">
        {{-- Year view --}}
    </x-ui::tabs.panel>
</x-ui::tabs>
```

### Disabled Tabs

```blade
<x-ui::tabs defaultTab="active">
    <x-slot:tabs>
        <x-ui::tabs.item id="active" variant="default">
            Active Tab
        </x-ui::tabs.item>
        <x-ui::tabs.item id="disabled" variant="default" :disabled="true">
            Disabled Tab
        </x-ui::tabs.item>
        <x-ui::tabs.item id="another" variant="default">
            Another Tab
        </x-ui::tabs.item>
    </x-slot:tabs>

    <x-ui::tabs.panel id="active">
        {{-- Active content --}}
    </x-ui::tabs.panel>

    <x-ui::tabs.panel id="disabled">
        {{-- This won't be accessible --}}
    </x-ui::tabs.panel>

    <x-ui::tabs.panel id="another">
        {{-- Another content --}}
    </x-ui::tabs.panel>
</x-ui::tabs>
```

## Props

### Tabs Component

| Prop | Type | Default | Description |
|------|------|---------|-------------|
| `variant` | string | 'default' | Tab style: default, underline, pills |
| `orientation` | string | 'horizontal' | Layout: horizontal, vertical |
| `defaultTab` | string | null | ID of initially active tab |
| `fullWidth` | boolean | false | Make tabs fill container width |

### Tabs Item Component

| Prop | Type | Default | Description |
|------|------|---------|-------------|
| `id` | string | auto-generated | Unique tab identifier |
| `variant` | string | 'default' | Tab style (must match parent) |
| `active` | boolean | false | Initial active state |
| `disabled` | boolean | false | Disable tab interaction |
| `icon` | string | null | SVG icon slot |
| `badge` | string/int | null | Badge content |
| `fullWidth` | boolean | false | Make tab fill available width |

### Tabs Panel Component

| Prop | Type | Default | Description |
|------|------|---------|-------------|
| `id` | string | auto-generated | Panel identifier (must match tab ID) |

## Variants

### Default
- Rounded top corners
- Background color on active state
- Subtle hover effect
- Best for content sections

### Underline
- Bottom border indicator
- Clean, minimal design
- Active state with colored border
- Best for navigation

### Pills
- Fully rounded corners
- Solid background on active
- Bold, prominent style
- Best for filters or categories

## Real-World Examples

### 1. User Dashboard Tabs

```blade
<x-ui::card>
    <x-ui::tabs variant="underline" defaultTab="overview">
        <x-slot:tabs>
            <x-ui::tabs.item id="overview" variant="underline">
                <x-slot:icon>
                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M3 4a1 1 0 011-1h12a1 1 0 011 1v2a1 1 0 01-1 1H4a1 1 0 01-1-1V4zM3 10a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H4a1 1 0 01-1-1v-6zM14 9a1 1 0 00-1 1v6a1 1 0 001 1h2a1 1 0 001-1v-6a1 1 0 00-1-1h-2z"/>
                    </svg>
                </x-slot:icon>
                Overview
            </x-ui::tabs.item>

            <x-ui::tabs.item id="activity" variant="underline" badge="12">
                <x-slot:icon>
                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z"/>
                    </svg>
                </x-slot:icon>
                Activity
            </x-ui::tabs.item>

            <x-ui::tabs.item id="analytics" variant="underline">
                <x-slot:icon>
                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M2 11a1 1 0 011-1h2a1 1 0 011 1v5a1 1 0 01-1 1H3a1 1 0 01-1-1v-5zM8 7a1 1 0 011-1h2a1 1 0 011 1v9a1 1 0 01-1 1H9a1 1 0 01-1-1V7zM14 4a1 1 0 011-1h2a1 1 0 011 1v12a1 1 0 01-1 1h-2a1 1 0 01-1-1V4z"/>
                    </svg>
                </x-slot:icon>
                Analytics
            </x-ui::tabs.item>
        </x-slot:tabs>

        <x-ui::tabs.panel id="overview">
            <div class="space-y-4">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <x-ui::card>
                        <div class="text-sm text-gray-500 dark:text-gray-400">Total Users</div>
                        <div class="text-2xl font-bold text-gray-900 dark:text-white mt-1">2,543</div>
                        <div class="text-sm text-green-600 mt-1">+12% from last month</div>
                    </x-ui::card>

                    <x-ui::card>
                        <div class="text-sm text-gray-500 dark:text-gray-400">Revenue</div>
                        <div class="text-2xl font-bold text-gray-900 dark:text-white mt-1">$45,231</div>
                        <div class="text-sm text-green-600 mt-1">+8% from last month</div>
                    </x-ui::card>

                    <x-ui::card>
                        <div class="text-sm text-gray-500 dark:text-gray-400">Conversion</div>
                        <div class="text-2xl font-bold text-gray-900 dark:text-white mt-1">3.2%</div>
                        <div class="text-sm text-red-600 mt-1">-2% from last month</div>
                    </x-ui::card>
                </div>
            </div>
        </x-ui::tabs.panel>

        <x-ui::tabs.panel id="activity">
            <div class="space-y-4">
                @foreach($activities as $activity)
                    <div class="flex items-start gap-3 p-3 rounded-lg hover:bg-gray-50 dark:hover:bg-gray-700">
                        <div class="w-2 h-2 mt-2 rounded-full bg-blue-600"></div>
                        <div class="flex-1">
                            <p class="text-sm text-gray-900 dark:text-white">{{ $activity->description }}</p>
                            <p class="text-xs text-gray-500 dark:text-gray-400 mt-1">
                                {{ $activity->created_at->diffForHumans() }}
                            </p>
                        </div>
                    </div>
                @endforeach
            </div>
        </x-ui::tabs.panel>

        <x-ui::tabs.panel id="analytics">
            {{-- Analytics charts and data --}}
            <div class="space-y-6">
                <div>
                    <h3 class="text-lg font-semibold mb-3">Page Views</h3>
                    {{-- Chart component --}}
                </div>
                <div>
                    <h3 class="text-lg font-semibold mb-3">Top Pages</h3>
                    {{-- Table component --}}
                </div>
            </div>
        </x-ui::tabs.panel>
    </x-ui::tabs>
</x-ui::card>
```

### 2. Product Listing with Filters

```blade
<div class="space-y-4">
    <x-ui::tabs variant="pills" defaultTab="all">
        <x-slot:tabs>
            <x-ui::tabs.item id="all" variant="pills" badge="{{ $totalProducts }}">
                All Products
            </x-ui::tabs.item>
            <x-ui::tabs.item id="active" variant="pills" badge="{{ $activeProducts }}">
                Active
            </x-ui::tabs.item>
            <x-ui::tabs.item id="draft" variant="pills" badge="{{ $draftProducts }}">
                Drafts
            </x-ui::tabs.item>
            <x-ui::tabs.item id="archived" variant="pills" badge="{{ $archivedProducts }}">
                Archived
            </x-ui::tabs.item>
        </x-slot:tabs>

        <x-ui::tabs.panel id="all">
            <x-ui::table striped>
                {{-- All products table --}}
            </x-ui::table>
        </x-ui::tabs.panel>

        <x-ui::tabs.panel id="active">
            <x-ui::table striped>
                {{-- Active products table --}}
            </x-ui::table>
        </x-ui::tabs.panel>

        <x-ui::tabs.panel id="draft">
            <x-ui::table striped>
                {{-- Draft products table --}}
            </x-ui::table>
        </x-ui::tabs.panel>

        <x-ui::tabs.panel id="archived">
            <x-ui::table striped>
                {{-- Archived products table --}}
            </x-ui::table>
        </x-ui::tabs.panel>
    </x-ui::tabs>
</div>
```

### 3. Settings Page with Vertical Tabs

```blade
<div class="container mx-auto px-4 py-8">
    <h1 class="text-2xl font-bold mb-6">Account Settings</h1>

    <x-ui::tabs orientation="vertical" variant="default" defaultTab="profile">
        <x-slot:tabs>
            <x-ui::tabs.item id="profile" variant="default">
                <x-slot:icon>
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z"/>
                    </svg>
                </x-slot:icon>
                Profile
            </x-ui::tabs.item>

            <x-ui::tabs.item id="account" variant="default">
                <x-slot:icon>
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-6-3a2 2 0 11-4 0 2 2 0 014 0zm-2 4a5 5 0 00-4.546 2.916A5.986 5.986 0 0010 16a5.986 5.986 0 004.546-2.084A5 5 0 0010 11z"/>
                    </svg>
                </x-slot:icon>
                Account
            </x-ui::tabs.item>

            <x-ui::tabs.item id="security" variant="default">
                <x-slot:icon>
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z"/>
                    </svg>
                </x-slot:icon>
                Security
            </x-ui::tabs.item>

            <x-ui::tabs.item id="notifications" variant="default" badge="3">
                <x-slot:icon>
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M10 2a6 6 0 00-6 6v3.586l-.707.707A1 1 0 004 14h12a1 1 0 00.707-1.707L16 11.586V8a6 6 0 00-6-6zM10 18a3 3 0 01-3-3h6a3 3 0 01-3 3z"/>
                    </svg>
                </x-slot:icon>
                Notifications
            </x-ui::tabs.item>

            <x-ui::tabs.item id="billing" variant="default">
                <x-slot:icon>
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M4 4a2 2 0 00-2 2v1h16V6a2 2 0 00-2-2H4z"/>
                        <path fill-rule="evenodd" d="M18 9H2v5a2 2 0 002 2h12a2 2 0 002-2V9zM4 13a1 1 0 011-1h1a1 1 0 110 2H5a1 1 0 01-1-1zm5-1a1 1 0 100 2h1a1 1 0 100-2H9z"/>
                    </svg>
                </x-slot:icon>
                Billing
            </x-ui::tabs.item>
        </x-slot:tabs>

        <x-ui::tabs.panel id="profile">
            <x-ui::card>
                <h2 class="text-xl font-bold mb-4">Profile Information</h2>
                <form wire:submit.prevent="updateProfile" class="space-y-4">
                    <x-ui::form.input
                        label="Full Name"
                        wire:model="name"
                    />
                    <x-ui::form.input
                        label="Email"
                        type="email"
                        wire:model="email"
                    />
                    <x-ui::form.textarea
                        label="Bio"
                        wire:model="bio"
                        rows="4"
                    />
                    <x-ui::button variant="primary" type="submit">
                        Save Changes
                    </x-ui::button>
                </form>
            </x-ui::card>
        </x-ui::tabs.panel>

        <x-ui::tabs.panel id="account">
            <x-ui::card>
                <h2 class="text-xl font-bold mb-4">Account Settings</h2>
                {{-- Account settings form --}}
            </x-ui::card>
        </x-ui::tabs.panel>

        <x-ui::tabs.panel id="security">
            <x-ui::card>
                <h2 class="text-xl font-bold mb-4">Security Settings</h2>
                {{-- Security settings form --}}
            </x-ui::card>
        </x-ui::tabs.panel>

        <x-ui::tabs.panel id="notifications">
            <x-ui::card>
                <h2 class="text-xl font-bold mb-4">Notification Preferences</h2>
                {{-- Notification settings --}}
            </x-ui::card>
        </x-ui::tabs.panel>

        <x-ui::tabs.panel id="billing">
            <x-ui::card>
                <h2 class="text-xl font-bold mb-4">Billing & Subscription</h2>
                {{-- Billing information --}}
            </x-ui::card>
        </x-ui::tabs.panel>
    </x-ui::tabs>
</div>
```

### 4. Order Status Tabs

```blade
<x-ui::card>
    <x-ui::tabs variant="underline" defaultTab="pending">
        <x-slot:tabs>
            <x-ui::tabs.item id="pending" variant="underline" badge="{{ $pendingCount }}">
                Pending
            </x-ui::tabs.item>
            <x-ui::tabs.item id="processing" variant="underline" badge="{{ $processingCount }}">
                Processing
            </x-ui::tabs.item>
            <x-ui::tabs.item id="shipped" variant="underline" badge="{{ $shippedCount }}">
                Shipped
            </x-ui::tabs.item>
            <x-ui::tabs.item id="delivered" variant="underline" badge="{{ $deliveredCount }}">
                Delivered
            </x-ui::tabs.item>
            <x-ui::tabs.item id="cancelled" variant="underline" badge="{{ $cancelledCount }}">
                Cancelled
            </x-ui::tabs.item>
        </x-slot:tabs>

        @foreach(['pending', 'processing', 'shipped', 'delivered', 'cancelled'] as $status)
            <x-ui::tabs.panel id="{{ $status }}">
                <div class="space-y-3">
                    @forelse($orders->where('status', $status) as $order)
                        <div class="flex items-center justify-between p-4 bg-gray-50 dark:bg-gray-700 rounded-lg">
                            <div>
                                <p class="font-medium text-gray-900 dark:text-white">
                                    Order #{{ $order->id }}
                                </p>
                                <p class="text-sm text-gray-500 dark:text-gray-400">
                                    {{ $order->customer->name }} • {{ $order->created_at->format('M d, Y') }}
                                </p>
                            </div>
                            <div class="text-right">
                                <p class="font-semibold text-gray-900 dark:text-white">
                                    ${{ number_format($order->total, 2) }}
                                </p>
                                <x-ui::button
                                    variant="outline"
                                    size="sm"
                                    href="{{ route('orders.show', $order) }}"
                                >
                                    View Details
                                </x-ui::button>
                            </div>
                        </div>
                    @empty
                        <div class="text-center py-8 text-gray-500 dark:text-gray-400">
                            No {{ $status }} orders
                        </div>
                    @endforelse
                </div>
            </x-ui::tabs.panel>
        @endforeach
    </x-ui::tabs>
</x-ui::card>
```

### 5. Documentation Tabs

```blade
<div class="bg-white dark:bg-gray-800 rounded-lg shadow">
    <x-ui::tabs variant="underline" defaultTab="preview">
        <x-slot:tabs>
            <x-ui::tabs.item id="preview" variant="underline">
                <x-slot:icon>
                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M10 12a2 2 0 100-4 2 2 0 000 4z"/>
                        <path fill-rule="evenodd" d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z"/>
                    </svg>
                </x-slot:icon>
                Preview
            </x-ui::tabs.item>

            <x-ui::tabs.item id="code" variant="underline">
                <x-slot:icon>
                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M12.316 3.051a1 1 0 01.633 1.265l-4 12a1 1 0 11-1.898-.632l4-12a1 1 0 011.265-.633zM5.707 6.293a1 1 0 010 1.414L3.414 10l2.293 2.293a1 1 0 11-1.414 1.414l-3-3a1 1 0 010-1.414l3-3a1 1 0 011.414 0zm8.586 0a1 1 0 011.414 0l3 3a1 1 0 010 1.414l-3 3a1 1 0 11-1.414-1.414L16.586 10l-2.293-2.293a1 1 0 010-1.414z"/>
                    </svg>
                </x-slot:icon>
                Code
            </x-ui::tabs.item>

            <x-ui::tabs.item id="api" variant="underline">
                <x-slot:icon>
                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M4 4a2 2 0 012-2h4.586A2 2 0 0112 2.586L15.414 6A2 2 0 0116 7.414V16a2 2 0 01-2 2H6a2 2 0 01-2-2V4z"/>
                    </svg>
                </x-slot:icon>
                API
            </x-ui::tabs.item>
        </x-slot:tabs>

        <x-ui::tabs.panel id="preview">
            <div class="p-6">
                {{-- Component preview --}}
            </div>
        </x-ui::tabs.panel>

        <x-ui::tabs.panel id="code">
            <div class="p-6">
                <pre class="bg-gray-900 text-gray-100 rounded-lg p-4 overflow-x-auto"><code>{{-- Code example --}}</code></pre>
            </div>
        </x-ui::tabs.panel>

        <x-ui::tabs.panel id="api">
            <div class="p-6">
                {{-- API documentation --}}
            </div>
        </x-ui::tabs.panel>
    </x-ui::tabs>
</div>
```

## Best Practices

### 1. Tab Count

```blade
{{-- Good: 3-7 tabs --}}
<x-ui::tabs>
    <x-slot:tabs>
        <x-ui::tabs.item id="tab1">Tab 1</x-ui::tabs.item>
        <x-ui::tabs.item id="tab2">Tab 2</x-ui::tabs.item>
        <x-ui::tabs.item id="tab3">Tab 3</x-ui::tabs.item>
    </x-slot:tabs>
</x-ui::tabs>

{{-- Avoid: Too many tabs (consider dropdown or nested navigation) --}}
```

### 2. Consistent IDs

```blade
{{-- Tab IDs must match panel IDs --}}
<x-ui::tabs defaultTab="overview">
    <x-slot:tabs>
        <x-ui::tabs.item id="overview">Overview</x-ui::tabs.item>
    </x-slot:tabs>

    <x-ui::tabs.panel id="overview">
        {{-- Content --}}
    </x-ui::tabs.panel>
</x-ui::tabs>
```

### 3. Variant Consistency

```blade
{{-- All tab items should use the same variant --}}
<x-ui::tabs variant="underline">
    <x-slot:tabs>
        <x-ui::tabs.item id="tab1" variant="underline">Tab 1</x-ui::tabs.item>
        <x-ui::tabs.item id="tab2" variant="underline">Tab 2</x-ui::tabs.item>
    </x-slot:tabs>
</x-ui::tabs>
```

### 4. Loading States

```blade
<x-ui::tabs.panel id="data">
    <div wire:loading wire:target="loadData" class="py-12 text-center">
        <x-ui::spinner size="lg" />
        <p class="mt-4 text-gray-500">Loading data...</p>
    </div>

    <div wire:loading.remove wire:target="loadData">
        {{-- Tab content --}}
    </div>
</x-ui::tabs.panel>
```

### 5. Responsive Design

```blade
{{-- Use vertical tabs on mobile, horizontal on desktop --}}
<div class="hidden md:block">
    <x-ui::tabs variant="underline" orientation="horizontal">
        {{-- Tabs --}}
    </x-ui::tabs>
</div>

<div class="block md:hidden">
    <x-ui::tabs variant="pills" orientation="vertical">
        {{-- Tabs --}}
    </x-ui::tabs>
</div>
```

### 6. Badge Usage

```blade
{{-- Use badges for counts or notifications --}}
<x-ui::tabs.item id="messages" variant="pills" badge="{{ $unreadCount }}">
    Messages
</x-ui::tabs.item>

{{-- Hide badge when count is zero --}}
<x-ui::tabs.item id="alerts" variant="pills" :badge="$alertCount > 0 ? $alertCount : null">
    Alerts
</x-ui::tabs.item>
```

### 7. Icon Sizing

```blade
{{-- Keep icons consistent size (w-4 h-4 or w-5 h-5) --}}
<x-ui::tabs.item id="profile">
    <x-slot:icon>
        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
            {{-- Icon path --}}
        </svg>
    </x-slot:icon>
    Profile
</x-ui::tabs.item>
```

### 8. Content Organization

```blade
{{-- Keep related content together --}}
<x-ui::tabs defaultTab="general">
    <x-slot:tabs>
        <x-ui::tabs.item id="general">General</x-ui::tabs.item>
        <x-ui::tabs.item id="advanced">Advanced</x-ui::tabs.item>
    </x-slot:tabs>

    <x-ui::tabs.panel id="general">
        {{-- Basic settings --}}
    </x-ui::tabs.panel>

    <x-ui::tabs.panel id="advanced">
        {{-- Advanced settings --}}
    </x-ui::tabs.panel>
</x-ui::tabs>
```

### 9. Accessibility Labels

```blade
{{-- Provide meaningful labels --}}
<x-ui::tabs.item id="tab1" aria-label="View dashboard overview">
    Overview
</x-ui::tabs.item>
```

### 10. State Persistence

```blade
{{-- Use Livewire to persist active tab --}}
<x-ui::tabs :defaultTab="$activeTab">
    <x-slot:tabs>
        <x-ui::tabs.item
            id="tab1"
            wire:click="$set('activeTab', 'tab1')"
        >
            Tab 1
        </x-ui::tabs.item>
    </x-slot:tabs>
</x-ui::tabs>
```

## Accessibility

The tabs component follows WCAG 2.1 AA guidelines:

### ARIA Attributes

```html
<div role="tablist">
    <button
        role="tab"
        aria-selected="true"
        aria-controls="panel-id"
    >
        Tab Label
    </button>
</div>

<div
    role="tabpanel"
    aria-labelledby="tab-id"
>
    Panel content
</div>
```

### Keyboard Navigation

- **Tab**: Move focus between tabs
- **Enter/Space**: Activate focused tab
- **Arrow Keys**: Navigate between tabs (recommended enhancement)

### Screen Reader Support

- Tab roles communicate purpose
- ARIA selected state
- Panel labeling with aria-labelledby
- Meaningful tab labels

## Livewire Integration

### Example Component

```php
<?php

namespace App\Livewire\Dashboard;

use Livewire\Component;

class Stats extends Component
{
    public $activeTab = 'overview';
    public $dateRange = 'week';

    public function mount()
    {
        $this->loadData();
    }

    public function updatedActiveTab()
    {
        $this->loadData();
    }

    public function loadData()
    {
        // Load data based on active tab and date range
    }

    public function render()
    {
        return view('livewire.dashboard.stats');
    }
}
```

```blade
{{-- livewire/dashboard/stats.blade.php --}}
<div>
    <x-ui::tabs :defaultTab="$activeTab">
        <x-slot:tabs>
            <x-ui::tabs.item
                id="overview"
                wire:click="$set('activeTab', 'overview')"
            >
                Overview
            </x-ui::tabs.item>
            <x-ui::tabs.item
                id="sales"
                wire:click="$set('activeTab', 'sales')"
            >
                Sales
            </x-ui::tabs.item>
            <x-ui::tabs.item
                id="traffic"
                wire:click="$set('activeTab', 'traffic')"
            >
                Traffic
            </x-ui::tabs.item>
        </x-slot:tabs>

        <x-ui::tabs.panel id="overview">
            {{-- Overview content --}}
        </x-ui::tabs.panel>

        <x-ui::tabs.panel id="sales">
            {{-- Sales content --}}
        </x-ui::tabs.panel>

        <x-ui::tabs.panel id="traffic">
            {{-- Traffic content --}}
        </x-ui::tabs.panel>
    </x-ui::tabs>
</div>
```

## Related Components

- [Accordion](accordion.md) - Collapsible content sections
- [Breadcrumb](breadcrumb.md) - Navigation trail
- [Dropdown](dropdown.md) - Dropdown menus
- [Card](card.md) - Content containers
- [Badge](badge.md) - Status indicators