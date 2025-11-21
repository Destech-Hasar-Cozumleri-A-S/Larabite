# Indicator Components

Status indicators, count badges and loading state indicators. Used to add status information to avatars, buttons and other elements.

## 📦 Available Components

- **Indicator** - Base colored dot indicator
- **Indicator Count** - Notification count badge
- **Indicator Status** - Online/offline status dot
- **Indicator Loading** - Animated loading text
- **Indicator Stepper** - Progress step indicator

---

## Base Indicator Component

Base colored dot indicator. Used for legends and status indicators.

**Location:** `resources/views/components/ui/indicator.blade.php`

### Features

- 9 color variants
- 3 size options
- Optional label (legend style)
- Optional border
- Dark mode support

### Usage

```blade
{{-- Simple Dot --}}
<x-ui::indicator color="green" />

{{-- With Size --}}
<x-ui::indicator color="red" size="lg" />

{{-- With Label (Legend Style) --}}
<x-ui::indicator color="blue" label="Active Users" />

{{-- With Border --}}
<x-ui::indicator color="green" :border="true" />
```

### Props

| Prop | Type | Default | Options | Description |
|------|------|---------|---------|-------------|
| `color` | string | 'gray' | gray, blue, red, green, yellow, purple, indigo, teal, orange | Indicator color |
| `size` | string | 'default' | sm, default, lg | Indicator size |
| `label` | string | null | - | Optional label text |
| `border` | bool | false | - | Add white border |

---

## Indicator Count Component

Notification badge with count. Perfect for unread messages, notifications, cart items.

**Location:** `resources/views/components/ui/indicator/count.blade.php`

### Features

- Notification count display
- Max count with + suffix
- 9 position variants
- 4 color options
- 3 size options
- Border for contrast

### Usage

```blade
{{-- On Button --}}
<div class="relative inline-flex">
    <button class="px-4 py-2 bg-blue-600 text-white rounded-lg">
        Messages
    </button>
    <x-ui::indicator.count :count="5" />
</div>

{{-- On Icon --}}
<div class="relative inline-flex">
    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20">
        <path d="M10 2a6 6 0 00-6 6v3.586l-.707.707A1 1 0 004 14h12a1 1 0 00.707-1.707L16 11.586V8a6 6 0 00-6-6z"/>
    </svg>
    <x-ui::indicator.count :count="99" position="top-right" />
</div>

{{-- Large Count (with max) --}}
<div class="relative inline-flex">
    <button>Notifications</button>
    <x-ui::indicator.count :count="150" :max="99" color="red" />
</div>

{{-- Different Positions --}}
<x-ui::indicator.count :count="3" position="top-left" />
<x-ui::indicator.count :count="3" position="top-center" />
<x-ui::indicator.count :count="3" position="top-right" />
<x-ui::indicator.count :count="3" position="bottom-left" />
```

### Props

| Prop | Type | Default | Options | Description |
|------|------|---------|---------|-------------|
| `count` | int | null | - | Count to display |
| `max` | int | 99 | - | Maximum count (shows +) |
| `position` | string | 'top-right' | top-left, top-center, top-right, middle-left, middle-center, middle-right, bottom-left, bottom-center, bottom-right | Badge position |
| `color` | string | 'red' | red, blue, green, gray | Badge color |
| `size` | string | 'default' | sm, default, lg | Badge size |

---

## Indicator Status Component

Online/offline status indicator. Perfect for user avatars.

**Location:** `resources/views/components/ui/indicator/status.blade.php`

### Features

- 4 status types (online, offline, away, busy)
- 4 position variants
- 3 size options
- Optional pulse animation
- Border for contrast

### Usage

```blade
{{-- On Avatar --}}
<div class="relative">
    <img src="/avatar.jpg" class="w-10 h-10 rounded-full">
    <x-ui::indicator.status status="online" />
</div>

{{-- With Avatar Component --}}
<div class="relative">
    <x-ui::avatar src="/user.jpg" size="lg" />
    <x-ui::indicator.status status="away" position="bottom-right" />
</div>

{{-- With Animation --}}
<div class="relative">
    <x-ui::avatar src="/user.jpg" />
    <x-ui::indicator.status status="online" :animate="true" />
</div>

{{-- Different Statuses --}}
<x-ui::indicator.status status="online" />  {{-- Green --}}
<x-ui::indicator.status status="offline" /> {{-- Gray --}}
<x-ui::indicator.status status="away" />    {{-- Yellow --}}
<x-ui::indicator.status status="busy" />    {{-- Red --}}
```

### Props

| Prop | Type | Default | Options | Description |
|------|------|---------|---------|-------------|
| `status` | string | 'online' | online, offline, away, busy | User status |
| `position` | string | 'bottom-right' | top-left, top-right, bottom-left, bottom-right | Indicator position |
| `size` | string | 'default' | sm, default, lg | Indicator size |
| `animate` | bool | false | - | Pulse animation |

---

## Indicator Loading Component

Animated loading text indicator.

**Location:** `resources/views/components/ui/indicator/loading.blade.php`

### Features

- Pulse animation
- Custom text
- 3 size options
- Dark mode support

### Usage

```blade
{{-- Default --}}
<x-ui::indicator.loading />

{{-- Custom Text --}}
<x-ui::indicator.loading text="Processing..." />

{{-- Different Sizes --}}
<x-ui::indicator.loading size="sm" />
<x-ui::indicator.loading size="lg" text="Please wait..." />
```

### Props

| Prop | Type | Default | Options | Description |
|------|------|---------|---------|-------------|
| `text` | string | 'Loading...' | - | Loading text |
| `size` | string | 'default' | sm, default, lg | Text size |

---

## Indicator Stepper Component

Progress step indicator for multi-step forms.

**Location:** `resources/views/components/ui/indicator/stepper.blade.php`

### Features

- 3 status states (completed, active, pending)
- Checkmark for completed steps
- Number for active/pending steps
- 3 size options
- Dark mode support

### Usage

```blade
{{-- Progress Steps --}}
<div class="flex items-center space-x-4">
    <x-ui::indicator.stepper :step="1" status="completed" />
    <x-ui::indicator.stepper :step="2" status="active" />
    <x-ui::indicator.stepper :step="3" status="pending" />
    <x-ui::indicator.stepper :step="4" status="pending" />
</div>

{{-- With Lines --}}
<div class="flex items-center">
    <x-ui::indicator.stepper :step="1" status="completed" />
    <div class="w-16 h-0.5 bg-blue-600"></div>
    <x-ui::indicator.stepper :step="2" status="active" />
    <div class="w-16 h-0.5 bg-gray-300"></div>
    <x-ui::indicator.stepper :step="3" status="pending" />
</div>

{{-- Different Sizes --}}
<x-ui::indicator.stepper :step="1" status="completed" size="sm" />
<x-ui::indicator.stepper :step="2" status="active" size="lg" />
```

### Props

| Prop | Type | Default | Options | Description |
|------|------|---------|---------|-------------|
| `step` | int | 1 | - | Step number |
| `status` | string | 'pending' | completed, active, pending | Step status |
| `size` | string | 'default' | sm, default, lg | Indicator size |

---

## Real-World Examples

### User List with Status

```blade
<div class="space-y-4">
    @foreach($users as $user)
        <div class="flex items-center justify-between p-4 bg-white rounded-lg shadow">
            <div class="flex items-center space-x-3">
                <div class="relative">
                    <x-ui::avatar :src="$user->avatar" size="md" />
                    <x-ui::indicator.status
                        :status="$user->is_online ? 'online' : 'offline'"
                        :animate="$user->is_online"
                    />
                </div>
                <div>
                    <div class="font-semibold">{{ $user->name }}</div>
                    <div class="text-sm text-gray-500">
                        {{ $user->is_online ? 'Active now' : 'Last seen ' . $user->last_seen_at->diffForHumans() }}
                    </div>
                </div>
            </div>
            <button class="text-blue-600 hover:underline">Message</button>
        </div>
    @endforeach
</div>
```

### Navigation with Notification Badges

```blade
<nav class="flex items-center space-x-6">
    {{-- Messages --}}
    <div class="relative">
        <a href="/messages" class="text-gray-700 hover:text-gray-900">
            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20">
                <path d="M2 5a2 2 0 012-2h12a2 2 0 012 2v10a2 2 0 01-2 2H4a2 2 0 01-2-2V5z"/>
            </svg>
        </a>
        @if($unreadMessages > 0)
            <x-ui::indicator.count :count="$unreadMessages" color="red" />
        @endif
    </div>

    {{-- Notifications --}}
    <div class="relative">
        <a href="/notifications" class="text-gray-700 hover:text-gray-900">
            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20">
                <path d="M10 2a6 6 0 00-6 6v3.586l-.707.707A1 1 0 004 14h12a1 1 0 00.707-1.707L16 11.586V8a6 6 0 00-6-6z"/>
            </svg>
        </a>
        @if($notifications > 0)
            <x-ui::indicator.count :count="$notifications" color="blue" />
        @endif
    </div>

    {{-- Cart --}}
    <div class="relative">
        <a href="/cart" class="text-gray-700 hover:text-gray-900">
            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20">
                <path d="M3 1a1 1 0 000 2h1.22l.305 1.222a.997.997 0 00.01.042l1.358 5.43-.893.892C3.74 11.846 4.632 14 6.414 14H15a1 1 0 000-2H6.414l1-1H14a1 1 0 00.894-.553l3-6A1 1 0 0017 3H6.28l-.31-1.243A1 1 0 005 1H3z"/>
            </svg>
        </a>
        @if($cartItems > 0)
            <x-ui::indicator.count :count="$cartItems" color="green" />
        @endif
    </div>
</nav>
```

### Chart Legend

```blade
<div class="flex flex-wrap gap-4">
    <x-ui::indicator color="blue" label="Visitors" />
    <x-ui::indicator color="green" label="Conversions" />
    <x-ui::indicator color="purple" label="Revenue" />
    <x-ui::indicator color="orange" label="Bounce Rate" />
</div>
```

### Multi-Step Form

```blade
<div class="mb-8">
    {{-- Steps Header --}}
    <div class="flex items-center justify-between">
        <div class="flex items-center">
            <x-ui::indicator.stepper :step="1" status="completed" />
            <div class="w-24 h-1 bg-blue-600"></div>
        </div>

        <div class="flex items-center">
            <x-ui::indicator.stepper :step="2" status="active" />
            <div class="w-24 h-1 bg-gray-300"></div>
        </div>

        <div class="flex items-center">
            <x-ui::indicator.stepper :step="3" status="pending" />
            <div class="w-24 h-1 bg-gray-300"></div>
        </div>

        <x-ui::indicator.stepper :step="4" status="pending" />
    </div>

    {{-- Step Labels --}}
    <div class="flex justify-between mt-2">
        <span class="text-sm font-medium text-blue-600">Personal Info</span>
        <span class="text-sm font-medium text-blue-600">Address</span>
        <span class="text-sm text-gray-500">Payment</span>
        <span class="text-sm text-gray-500">Review</span>
    </div>
</div>

{{-- Form Content --}}
<div>
    @if($currentStep === 2)
        <h2 class="text-xl font-bold mb-4">Step 2: Address Information</h2>
        {{-- Address form fields --}}
    @endif
</div>
```

### Loading States

```blade
<div class="space-y-4">
    {{-- Button with Loading --}}
    <button
        wire:click="save"
        wire:loading.attr="disabled"
        class="px-4 py-2 bg-blue-600 text-white rounded-lg"
    >
        <span wire:loading.remove>Save Changes</span>
        <span wire:loading>
            <x-ui::indicator.loading text="Saving..." />
        </span>
    </button>

    {{-- Card with Loading State --}}
    <div class="p-6 bg-white rounded-lg shadow">
        <div wire:loading.remove wire:target="loadData">
            <h3 class="font-bold">Your Data</h3>
            <p>{{ $data }}</p>
        </div>
        <div wire:loading wire:target="loadData" class="flex justify-center">
            <x-ui::indicator.loading />
        </div>
    </div>
</div>
```

### Service Status Dashboard

```blade
<div class="grid grid-cols-1 md:grid-cols-3 gap-4">
    @foreach($services as $service)
        <div class="p-4 bg-white rounded-lg shadow">
            <div class="flex items-center justify-between mb-2">
                <h3 class="font-semibold">{{ $service->name }}</h3>
                <x-ui::indicator
                    :color="$service->status === 'operational' ? 'green' : ($service->status === 'degraded' ? 'yellow' : 'red')"
                    size="lg"
                    :border="true"
                />
            </div>
            <p class="text-sm text-gray-600">{{ $service->description }}</p>
            <div class="mt-2 text-xs text-gray-500">
                Last checked: {{ $service->last_checked_at->diffForHumans() }}
            </div>
        </div>
    @endforeach
</div>
```

### Pet Profile Status

```blade
<div class="flex items-center space-x-4">
    <div class="relative">
        <x-ui::avatar :src="$pet->photo" size="xl" />
        <x-ui::indicator.status
            :status="$pet->is_available ? 'online' : 'offline'"
            size="lg"
            position="bottom-right"
        />
    </div>

    <div>
        <h2 class="text-2xl font-bold">{{ $pet->name }}</h2>
        <div class="flex items-center space-x-2 mt-1">
            <x-ui::indicator
                :color="$pet->is_available ? 'green' : 'gray'"
                label="{{ $pet->is_available ? 'Available for adoption' : 'Not available' }}"
            />
        </div>
    </div>
</div>
```

---

## With Livewire

### Real-Time Notification Counter

```blade
<div>
    <div class="relative inline-flex">
        <button class="p-2">
            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20">
                <path d="M10 2a6 6 0 00-6 6v3.586l-.707.707A1 1 0 004 14h12a1 1 0 00.707-1.707L16 11.586V8a6 6 0 00-6-6z"/>
            </svg>
        </button>
        @if($unreadCount > 0)
            <x-ui::indicator.count :count="$unreadCount" />
        @endif
    </div>
</div>
```

### Dynamic Status Update

```blade
<div wire:poll.5s="checkUserStatus">
    <div class="relative">
        <x-ui::avatar :src="$user->avatar" />
        <x-ui::indicator.status
            :status="$user->status"
            :animate="$user->status === 'online'"
        />
    </div>
</div>
```

---

## Best Practices

### 1. Use Appropriate Colors

```blade
{{-- Success/Online --}}
<x-ui::indicator color="green" />

{{-- Warning/Away --}}
<x-ui::indicator color="yellow" />

{{-- Error/Offline --}}
<x-ui::indicator color="red" />

{{-- Info --}}
<x-ui::indicator color="blue" />
```

### 2. Position Indicators Correctly

```blade
{{-- For avatars: bottom-right is standard --}}
<div class="relative">
    <x-ui::avatar src="/user.jpg" />
    <x-ui::indicator.status position="bottom-right" />
</div>

{{-- For buttons: top-right for notifications --}}
<div class="relative">
    <button>Messages</button>
    <x-ui::indicator.count :count="5" position="top-right" />
</div>
```

### 3. Use Borders for Contrast

```blade
{{-- On colored backgrounds --}}
<div class="bg-blue-600 p-4">
    <x-ui::indicator color="green" :border="true" />
</div>
```

### 4. Animate When Appropriate

```blade
{{-- Online users --}}
<x-ui::indicator.status status="online" :animate="true" />

{{-- Loading states --}}
<x-ui::indicator.loading text="Processing..." />
```

### 5. Handle Zero Counts

```blade
{{-- Don't show badge when count is 0 --}}
@if($count > 0)
    <x-ui::indicator.count :count="$count" />
@endif
```

---

## Accessibility

### Screen Reader Text

```blade
<div class="relative">
    <button aria-label="Messages">
        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20">
            <path d="..."/>
        </svg>
    </button>
    @if($unreadMessages > 0)
        <x-ui::indicator.count :count="$unreadMessages" />
        <span class="sr-only">{{ $unreadMessages }} unread messages</span>
    @endif
</div>
```

### Status Labels

```blade
<div class="relative">
    <x-ui::avatar src="/user.jpg" />
    <x-ui::indicator.status status="online" />
    <span class="sr-only">User is online</span>
</div>
```

---

## Related Components

- [Badge](badge.md) - Badge components
- [Avatar](avatar.md) - User avatars
- [Button](button.md) - Button components
- [Spinner](spinner.md) - Loading spinners

---

## Tips & Tricks

### Conditional Indicators

```blade
{{-- Show different indicators based on conditions --}}
<div class="relative">
    <x-ui::avatar :src="$user->avatar" />

    @if($user->is_premium)
        <x-ui::indicator.count count="⭐" color="blue" size="sm" />
    @elseif($user->has_new_message)
        <x-ui::indicator.status status="online" :animate="true" />
    @endif
</div>
```

### Animated Notification Badge

```blade
<div class="relative" x-data="{ count: {{ $initialCount }} }">
    <button>Notifications</button>
    <div
        x-show="count > 0"
        x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="scale-0"
        x-transition:enter-end="scale-100"
    >
        <x-ui::indicator.count x-bind:count="count" />
    </div>
</div>
```

### Progress Percentage Indicator

```blade
<div class="relative w-32 h-32">
    <svg class="w-full h-full" viewBox="0 0 100 100">
        <circle cx="50" cy="50" r="45" fill="none" stroke="#e5e7eb" stroke-width="10"/>
        <circle
            cx="50" cy="50" r="45"
            fill="none"
            stroke="#3b82f6"
            stroke-width="10"
            stroke-dasharray="{{ $percentage * 2.827 }} 283"
            transform="rotate(-90 50 50)"
        />
    </svg>
    <div class="absolute inset-0 flex items-center justify-center">
        <span class="text-2xl font-bold">{{ $percentage }}%</span>
    </div>
</div>
```