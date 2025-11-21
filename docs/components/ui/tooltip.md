# Tooltip

Contextual information component that displays helpful text on hover or click. Built with Alpine.js following Flowbite design patterns.

## Component Location

- **Component**: `resources/views/components/ui/tooltip.blade.php`

## Features

- Two visual styles (dark, light)
- Four positioning options (top, right, bottom, left)
- Two trigger modes (hover, click)
- Optional arrow pointer
- Configurable show/hide animations
- Delay support for hover tooltips
- Full dark mode support
- Accessible with ARIA attributes
- Alpine.js powered
- Click-outside detection for click trigger
- Livewire integration support

## Usage

### Basic Tooltip

```blade
<x-ui.tooltip content="This is a tooltip">
    <x-ui.button variant="primary">
        Hover me
    </x-ui.button>
</x-ui.tooltip>
```

### Tooltip Positions

```blade
{{-- Top (default) --}}
<x-ui.tooltip content="Tooltip on top" placement="top">
    <x-ui.button>Top</x-ui.button>
</x-ui.tooltip>

{{-- Right --}}
<x-ui.tooltip content="Tooltip on right" placement="right">
    <x-ui.button>Right</x-ui.button>
</x-ui.tooltip>

{{-- Bottom --}}
<x-ui.tooltip content="Tooltip on bottom" placement="bottom">
    <x-ui.button>Bottom</x-ui.button>
</x-ui.tooltip>

{{-- Left --}}
<x-ui.tooltip content="Tooltip on left" placement="left">
    <x-ui.button>Left</x-ui.button>
</x-ui.tooltip>
```

### Tooltip Styles

```blade
{{-- Dark style (default) --}}
<x-ui.tooltip content="Dark tooltip" style="dark">
    <x-ui.button>Dark Tooltip</x-ui.button>
</x-ui.tooltip>

{{-- Light style --}}
<x-ui.tooltip content="Light tooltip" style="light">
    <x-ui.button>Light Tooltip</x-ui.button>
</x-ui.tooltip>
```

### Trigger Types

```blade
{{-- Hover trigger (default) --}}
<x-ui.tooltip content="Shown on hover" trigger="hover">
    <x-ui.button>Hover me</x-ui.button>
</x-ui.tooltip>

{{-- Click trigger --}}
<x-ui.tooltip content="Shown on click" trigger="click">
    <x-ui.button>Click me</x-ui.button>
</x-ui.tooltip>
```

### Without Arrow

```blade
<x-ui.tooltip content="No arrow tooltip" :arrow="false">
    <x-ui.button>No Arrow</x-ui.button>
</x-ui.tooltip>
```

### With Delay

```blade
{{-- Delay 500ms before showing --}}
<x-ui.tooltip content="Delayed tooltip" :delay="500">
    <x-ui.button>Hover with delay</x-ui.button>
</x-ui.tooltip>
```

### Disable Animation

```blade
<x-ui.tooltip content="No animation" :animation="false">
    <x-ui.button>No Animation</x-ui.button>
</x-ui.tooltip>
```

### Rich Content with Slot

```blade
<x-ui.tooltip placement="right">
    <x-slot:contentSlot>
        <div class="space-y-1">
            <div class="font-semibold">Premium Feature</div>
            <div class="text-xs">Upgrade to unlock</div>
        </div>
    </x-slot:contentSlot>

    <x-ui.badge variant="primary">
        Pro
    </x-ui.badge>
</x-ui.tooltip>
```

### Tooltip on Icons

```blade
<x-ui.tooltip content="Edit item" placement="top">
    <button class="text-gray-500 hover:text-gray-700 dark:text-gray-400">
        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
            <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z"/>
        </svg>
    </button>
</x-ui.tooltip>
```

### Tooltip on Avatar

```blade
<x-ui.tooltip content="John Doe - Online" placement="bottom">
    <x-ui.avatar
        src="/images/avatar.jpg"
        alt="John Doe"
        size="md"
        status="online"
    />
</x-ui.tooltip>
```

## Props

| Prop | Type | Default | Description |
|------|------|---------|-------------|
| `id` | string | auto-generated | Unique tooltip identifier |
| `content` | string | null | Tooltip text content |
| `placement` | string | 'top' | Position: top, right, bottom, left |
| `trigger` | string | 'hover' | Trigger type: hover, click |
| `style` | string | 'dark' | Visual style: dark, light |
| `arrow` | boolean | true | Show arrow pointer |
| `animation` | boolean | true | Enable fade animation |
| `delay` | integer | 0 | Delay before showing (milliseconds, hover only) |

## Slots

| Slot | Description |
|------|-------------|
| Default | Trigger element (button, icon, text, etc.) |
| `contentSlot` | Rich HTML content for tooltip (alternative to `content` prop) |

## Real-World Examples

### 1. Form Field Help Text

```blade
<div class="space-y-2">
    <label class="flex items-center gap-2">
        Email Address
        <x-ui.tooltip content="We'll never share your email with anyone else" placement="right">
            <svg class="w-4 h-4 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"/>
            </svg>
        </x-ui.tooltip>
    </label>
    <x-ui.form.input
        type="email"
        name="email"
        placeholder="you@example.com"
    />
</div>
```

### 2. Action Buttons with Tooltips

```blade
<div class="flex gap-2">
    <x-ui.tooltip content="Edit post" placement="top">
        <x-ui.button variant="ghost" size="sm" wire:click="edit">
            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z"/>
            </svg>
        </x-ui.button>
    </x-ui.tooltip>

    <x-ui.tooltip content="Delete post" placement="top">
        <x-ui.button variant="ghost" size="sm" wire:click="delete">
            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"/>
            </svg>
        </x-ui.button>
    </x-ui.tooltip>

    <x-ui.tooltip content="Share post" placement="top">
        <x-ui.button variant="ghost" size="sm" wire:click="share">
            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                <path d="M15 8a3 3 0 10-2.977-2.63l-4.94 2.47a3 3 0 100 4.319l4.94 2.47a3 3 0 10.895-1.789l-4.94-2.47a3.027 3.027 0 000-.74l4.94-2.47C13.456 7.68 14.19 8 15 8z"/>
            </svg>
        </x-ui.button>
    </x-ui.tooltip>
</div>
```

### 3. User Status Indicators

```blade
<div class="flex items-center gap-4">
    <x-ui.tooltip placement="bottom">
        <x-slot:contentSlot>
            <div class="text-center">
                <div class="font-semibold">Sarah Johnson</div>
                <div class="text-xs text-gray-400">Active now</div>
            </div>
        </x-slot:contentSlot>

        <x-ui.avatar
            src="/images/sarah.jpg"
            alt="Sarah Johnson"
            size="md"
            status="online"
        />
    </x-ui.tooltip>

    <x-ui.tooltip placement="bottom">
        <x-slot:contentSlot>
            <div class="text-center">
                <div class="font-semibold">Mike Chen</div>
                <div class="text-xs text-gray-400">Away</div>
            </div>
        </x-slot:contentSlot>

        <x-ui.avatar
            src="/images/mike.jpg"
            alt="Mike Chen"
            size="md"
            status="away"
        />
    </x-ui.tooltip>

    <x-ui.tooltip placement="bottom">
        <x-slot:contentSlot>
            <div class="text-center">
                <div class="font-semibold">Emma Davis</div>
                <div class="text-xs text-gray-400">Offline</div>
            </div>
        </x-slot:contentSlot>

        <x-ui.avatar
            src="/images/emma.jpg"
            alt="Emma Davis"
            size="md"
            status="offline"
        />
    </x-ui.tooltip>
</div>
```

### 4. Disabled Form Elements

```blade
<div class="space-y-4">
    <x-ui.tooltip content="This feature is only available to premium users" placement="right">
        <div class="inline-block">
            <x-ui.button variant="primary" disabled>
                Premium Feature
            </x-ui.button>
        </div>
    </x-ui.tooltip>

    <x-ui.tooltip content="Complete the previous step first" placement="right">
        <div class="inline-block">
            <x-ui.button variant="outline" disabled>
                Next Step
            </x-ui.button>
        </div>
    </x-ui.tooltip>
</div>
```

### 5. Data Table Column Headers

```blade
<x-ui.table>
    <x-ui.table.head>
        <x-ui.table.row>
            <x-ui.table.header>
                <div class="flex items-center gap-1">
                    Username
                    <x-ui.tooltip content="Click to sort by username" placement="top">
                        <svg class="w-3 h-3 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M5 12a1 1 0 102 0V6.414l1.293 1.293a1 1 0 001.414-1.414l-3-3a1 1 0 00-1.414 0l-3 3a1 1 0 001.414 1.414L5 6.414V12zM15 8a1 1 0 10-2 0v5.586l-1.293-1.293a1 1 0 00-1.414 1.414l3 3a1 1 0 001.414 0l3-3a1 1 0 00-1.414-1.414L15 13.586V8z"/>
                        </svg>
                    </x-ui.tooltip>
                </div>
            </x-ui.table.header>

            <x-ui.table.header>
                <div class="flex items-center gap-1">
                    Status
                    <x-ui.tooltip content="Account verification status" placement="top">
                        <svg class="w-3 h-3 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"/>
                        </svg>
                    </x-ui.tooltip>
                </div>
            </x-ui.table.header>

            <x-ui.table.header>Actions</x-ui.table.header>
        </x-ui.table.row>
    </x-ui.table.head>
</x-ui.table>
```

### 6. Badge with Additional Context

```blade
<div class="flex flex-wrap gap-2">
    <x-ui.tooltip content="This post has been verified by moderators" placement="top">
        <x-ui.badge variant="success">
            <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M6.267 3.455a3.066 3.066 0 001.745-.723 3.066 3.066 0 013.976 0 3.066 3.066 0 001.745.723 3.066 3.066 0 012.812 2.812c.051.643.304 1.254.723 1.745a3.066 3.066 0 010 3.976 3.066 3.066 0 00-.723 1.745 3.066 3.066 0 01-2.812 2.812 3.066 3.066 0 00-1.745.723 3.066 3.066 0 01-3.976 0 3.066 3.066 0 00-1.745-.723 3.066 3.066 0 01-2.812-2.812 3.066 3.066 0 00-.723-1.745 3.066 3.066 0 010-3.976 3.066 3.066 0 00.723-1.745 3.066 3.066 0 012.812-2.812zm7.44 5.252a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
            </svg>
            Verified
        </x-ui.badge>
    </x-ui.tooltip>

    <x-ui.tooltip content="This content is sponsored" placement="top">
        <x-ui.badge variant="warning">
            Sponsored
        </x-ui.badge>
    </x-ui.tooltip>

    <x-ui.tooltip content="Premium members only" placement="top">
        <x-ui.badge variant="primary">
            Premium
        </x-ui.badge>
    </x-ui.tooltip>
</div>
```

### 7. Chart Data Points

```blade
<div class="flex items-end gap-2 h-40">
    @foreach($chartData as $index => $value)
        <x-ui.tooltip placement="top">
            <x-slot:contentSlot>
                <div class="text-center">
                    <div class="font-semibold">{{ $value['label'] }}</div>
                    <div class="text-xs">{{ $value['count'] }} items</div>
                    <div class="text-xs text-gray-400">{{ $value['percentage'] }}%</div>
                </div>
            </x-slot:contentSlot>

            <div
                class="w-12 bg-blue-500 hover:bg-blue-600 rounded-t cursor-pointer transition-colors"
                style="height: {{ $value['percentage'] }}%"
            ></div>
        </x-ui.tooltip>
    @endforeach
</div>
```

### 8. Navigation Menu Items

```blade
<nav class="flex gap-4">
    <x-ui.tooltip content="Go to dashboard" placement="bottom">
        <a href="/dashboard" class="text-gray-600 hover:text-gray-900">
            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20">
                <path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"/>
            </svg>
        </a>
    </x-ui.tooltip>

    <x-ui.tooltip content="View messages (3 unread)" placement="bottom" style="light">
        <a href="/messages" class="relative text-gray-600 hover:text-gray-900">
            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20">
                <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z"/>
                <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z"/>
            </svg>
            <span class="absolute -top-1 -right-1 w-4 h-4 bg-red-500 text-white text-xs rounded-full flex items-center justify-center">3</span>
        </a>
    </x-ui.tooltip>

    <x-ui.tooltip content="Notifications" placement="bottom">
        <a href="/notifications" class="text-gray-600 hover:text-gray-900">
            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20">
                <path d="M10 2a6 6 0 00-6 6v3.586l-.707.707A1 1 0 004 14h12a1 1 0 00.707-1.707L16 11.586V8a6 6 0 00-6-6zM10 18a3 3 0 01-3-3h6a3 3 0 01-3 3z"/>
            </svg>
        </a>
    </x-ui.tooltip>
</nav>
```

## Livewire Integration

### Dynamic Tooltip Content

```php
<?php

namespace App\Livewire;

use Livewire\Component;

class ProductCard extends Component
{
    public $product;
    public $stockInfo;

    public function mount($product)
    {
        $this->product = $product;
        $this->updateStockInfo();
    }

    public function updateStockInfo()
    {
        $this->stockInfo = $this->product->stock > 0
            ? "In stock: {$this->product->stock} units"
            : "Out of stock";
    }

    public function render()
    {
        return view('livewire.product-card');
    }
}
```

```blade
{{-- livewire/product-card.blade.php --}}
<div class="border rounded-lg p-4">
    <h3 class="font-semibold">{{ $product->name }}</h3>

    <div class="flex items-center gap-2 mt-2">
        <span class="text-xl font-bold">${{ $product->price }}</span>

        <x-ui.tooltip :content="$stockInfo" placement="right">
            <x-ui.badge :variant="$product->stock > 0 ? 'success' : 'error'">
                {{ $product->stock > 0 ? 'Available' : 'Sold Out' }}
            </x-ui.badge>
        </x-ui.tooltip>
    </div>

    <x-ui.button
        variant="primary"
        class="mt-4 w-full"
        wire:click="addToCart"
        :disabled="$product->stock === 0"
    >
        Add to Cart
    </x-ui.button>
</div>
```

### Tooltip on Loading States

```blade
<div wire:loading.remove>
    <x-ui.tooltip content="Click to refresh data" placement="top">
        <x-ui.button variant="ghost" size="sm" wire:click="refresh">
            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M4 2a1 1 0 011 1v2.101a7.002 7.002 0 0111.601 2.566 1 1 0 11-1.885.666A5.002 5.002 0 005.999 7H9a1 1 0 010 2H4a1 1 0 01-1-1V3a1 1 0 011-1zm.008 9.057a1 1 0 011.276.61A5.002 5.002 0 0014.001 13H11a1 1 0 110-2h5a1 1 0 011 1v5a1 1 0 11-2 0v-2.101a7.002 7.002 0 01-11.601-2.566 1 1 0 01.61-1.276z" clip-rule="evenodd"/>
            </svg>
        </x-ui.button>
    </x-ui.tooltip>
</div>

<div wire:loading>
    <x-ui.tooltip content="Loading..." placement="top">
        <x-ui.spinner size="sm" />
    </x-ui.tooltip>
</div>
```

## Best Practices

### 1. Appropriate Use Cases

```blade
{{-- Good: Short, helpful information --}}
<x-ui.tooltip content="Save changes">
    <x-ui.button>Save</x-ui.button>
</x-ui.tooltip>

{{-- Avoid: Essential information (use visible text instead) --}}
{{-- Don't hide critical labels in tooltips --}}
```

### 2. Content Length

```blade
{{-- Good: Concise tooltip --}}
<x-ui.tooltip content="Delete this item">
    <button>Delete</button>
</x-ui.tooltip>

{{-- Avoid: Too much text (consider using a popover instead) --}}
<x-ui.tooltip content="This action will permanently delete the item from your account and cannot be undone. All associated data will also be removed.">
    <button>Delete</button>
</x-ui.tooltip>
```

### 3. Positioning

```blade
{{-- Position tooltips to avoid viewport edges --}}
<div class="flex justify-end">
    {{-- Use 'left' placement for items near right edge --}}
    <x-ui.tooltip content="Settings" placement="left">
        <button>⚙️</button>
    </x-ui.tooltip>
</div>
```

### 4. Trigger Selection

```blade
{{-- Hover for informational tooltips --}}
<x-ui.tooltip content="Your account balance" trigger="hover">
    <span>${{ $balance }}</span>
</x-ui.tooltip>

{{-- Click for interactive content --}}
<x-ui.tooltip trigger="click" placement="bottom">
    <x-slot:contentSlot>
        <div class="space-y-2">
            <div class="font-semibold">Quick Actions</div>
            <button wire:click="action1">Action 1</button>
            <button wire:click="action2">Action 2</button>
        </div>
    </x-slot:contentSlot>

    <button>More</button>
</x-ui.tooltip>
```

### 5. Disabled Elements

```blade
{{-- Wrap disabled elements in a container --}}
<x-ui.tooltip content="Complete the form to continue">
    <div class="inline-block">
        <x-ui.button disabled>
            Submit
        </x-ui.button>
    </div>
</x-ui.tooltip>
```

### 6. Mobile Considerations

```blade
{{-- Use click trigger on mobile for better UX --}}
<div class="md:hidden">
    <x-ui.tooltip content="Help text" trigger="click">
        <button>Help</button>
    </x-ui.tooltip>
</div>

<div class="hidden md:block">
    <x-ui.tooltip content="Help text" trigger="hover">
        <button>Help</button>
    </x-ui.tooltip>
</div>
```

### 7. Accessibility

```blade
{{-- Tooltips should supplement, not replace, accessible labels --}}
<x-ui.tooltip content="Additional context here">
    <button aria-label="Save document">
        <svg><!-- icon --></svg>
    </button>
</x-ui.tooltip>
```

### 8. Performance

```blade
{{-- Use delay for frequently hovered elements --}}
<div class="grid grid-cols-10 gap-1">
    @foreach($items as $item)
        <x-ui.tooltip :content="$item->name" :delay="300">
            <div class="w-8 h-8 bg-gray-200"></div>
        </x-ui.tooltip>
    @endforeach
</div>
```

## Accessibility

The tooltip component follows WCAG 2.1 AA guidelines:

### ARIA Attributes

```html
<div role="tooltip">
    Tooltip content
</div>
```

### Features

- `role="tooltip"` for screen reader identification
- Keyboard accessible trigger elements
- ESC key closes click-triggered tooltips (when clicking outside)
- Sufficient color contrast in both dark and light styles
- Content remains accessible even if tooltip fails to display

### Testing

```bash
# Screen readers should:
# - Announce the trigger element properly
# - Read tooltip content when triggered
# - Provide context about the tooltip relationship
```

## Common Patterns

### Icon Buttons

```blade
<div class="flex gap-2">
    <x-ui.tooltip content="Edit">
        <button class="p-2 hover:bg-gray-100 rounded">
            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z"/>
            </svg>
        </button>
    </x-ui.tooltip>

    <x-ui.tooltip content="Delete">
        <button class="p-2 hover:bg-gray-100 rounded text-red-600">
            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"/>
            </svg>
        </button>
    </x-ui.tooltip>
</div>
```

### Truncated Text

```blade
<x-ui.tooltip :content="$fullText" placement="top">
    <div class="truncate max-w-xs">
        {{ $fullText }}
    </div>
</x-ui.tooltip>
```

### Status Indicators

```blade
<div class="flex items-center gap-2">
    <x-ui.tooltip content="Server is running normally" placement="right">
        <span class="flex items-center gap-2">
            <span class="w-2 h-2 bg-green-500 rounded-full"></span>
            <span class="text-sm">Online</span>
        </span>
    </x-ui.tooltip>
</div>
```

## Related Components

- [Popover](popover.md) - For more complex interactive content
- [Modal](modal.md) - For important information requiring user action
- [Badge](badge.md) - Often used with tooltips for additional context
- [Button](button.md) - Common tooltip trigger element
- [Avatar](avatar.md) - Often paired with user info tooltips