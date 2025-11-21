# Speed Dial Component

Floating action button with expandable quick action menu.

## Overview

The Speed Dial component provides a floating action button that expands to reveal a menu of quick actions. Perfect for mobile interfaces and situations where screen space is limited, it keeps primary actions accessible without cluttering the interface.

## Component Files

- `resources/views/components/ui/speed-dial.blade.php` - Main speed dial container
- `resources/views/components/ui/speed-dial/action.blade.php` - Action button item

## Basic Usage

### Simple Speed Dial

```blade
<x-ui::speed-dial>
    <x-slot:actions>
        <x-ui::speed-dial.action
            href="/create"
            label="Create"
            :icon="'<svg class=\'w-5 h-5\' fill=\'currentColor\' viewBox=\'0 0 20 20\'><path d=\'M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z\'/></svg>'"
        />

        <x-ui::speed-dial.action
            href="/edit"
            label="Edit"
            :icon="'<svg class=\'w-5 h-5\' fill=\'currentColor\' viewBox=\'0 0 20 20\'><path d=\'M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z\'/></svg>'"
        />

        <x-ui::speed-dial.action
            href="/delete"
            label="Delete"
            :icon="'<svg class=\'w-5 h-5\' fill=\'currentColor\' viewBox=\'0 0 20 20\'><path fill-rule=\'evenodd\' d=\'M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z\' clip-rule=\'evenodd\'/></svg>'"
        />
    </x-slot:actions>
</x-ui::speed-dial>
```

### With Click Trigger

```blade
<x-ui::speed-dial trigger="click">
    <x-slot:actions>
        {{-- Actions --}}
    </x-slot:actions>
</x-ui::speed-dial>
```

## Props

### Speed Dial Props

| Prop | Type | Default | Options | Description |
|------|------|---------|---------|-------------|
| `id` | string | `auto` | - | Unique identifier |
| `position` | string | `'bottom-right'` | `'top-left'`, `'top-right'`, `'bottom-left'`, `'bottom-right'` | Screen position |
| `direction` | string | `'vertical'` | `'vertical'`, `'horizontal'` | Menu expansion direction |
| `trigger` | string | `'hover'` | `'hover'`, `'click'` | Activation method |
| `buttonShape` | string | `'circle'` | `'circle'`, `'square'` | Main button shape |
| `tooltipPosition` | string | `'left'` | `'left'`, `'right'`, `'top'`, `'bottom'` | Tooltip placement |

### Action Props

| Prop | Type | Default | Options | Description |
|------|------|---------|---------|-------------|
| `href` | string | `null` | - | Link URL (makes it an anchor) |
| `icon` | string | `null` | - | SVG icon HTML |
| `label` | string | `null` | - | Tooltip label |
| `tooltipPosition` | string | `'left'` | `'left'`, `'right'`, `'top'`, `'bottom'` | Tooltip placement |
| `shape` | string | `'circle'` | `'circle'`, `'square'` | Button shape |

## Speed Dial Variants

### 1. Position Variants

```blade
{{-- Bottom Right (default) --}}
<x-ui::speed-dial position="bottom-right">
    <x-slot:actions>
        {{-- Actions --}}
    </x-slot:actions>
</x-ui::speed-dial>

{{-- Bottom Left --}}
<x-ui::speed-dial position="bottom-left">
    <x-slot:actions>
        {{-- Actions --}}
    </x-slot:actions>
</x-ui::speed-dial>

{{-- Top Right --}}
<x-ui::speed-dial position="top-right">
    <x-slot:actions>
        {{-- Actions --}}
    </x-slot:actions>
</x-ui::speed-dial>

{{-- Top Left --}}
<x-ui::speed-dial position="top-left">
    <x-slot:actions>
        {{-- Actions --}}
    </x-slot:actions>
</x-ui::speed-dial>
```

### 2. Direction Variants

```blade
{{-- Vertical (default) --}}
<x-ui::speed-dial direction="vertical">
    <x-slot:actions>
        {{-- Actions stack vertically --}}
    </x-slot:actions>
</x-ui::speed-dial>

{{-- Horizontal --}}
<x-ui::speed-dial direction="horizontal">
    <x-slot:actions>
        {{-- Actions spread horizontally --}}
    </x-slot:actions>
</x-ui::speed-dial>
```

### 3. Trigger Types

```blade
{{-- Hover (default) --}}
<x-ui::speed-dial trigger="hover">
    <x-slot:actions>
        {{-- Shows on hover --}}
    </x-slot:actions>
</x-ui::speed-dial>

{{-- Click --}}
<x-ui::speed-dial trigger="click">
    <x-slot:actions>
        {{-- Shows on click --}}
    </x-slot:actions>
</x-ui::speed-dial>
```

### 4. Shape Variants

```blade
{{-- Circle buttons (default) --}}
<x-ui::speed-dial buttonShape="circle">
    <x-slot:actions>
        <x-ui::speed-dial.action shape="circle" label="Action" />
    </x-slot:actions>
</x-ui::speed-dial>

{{-- Square buttons --}}
<x-ui::speed-dial buttonShape="square">
    <x-slot:actions>
        <x-ui::speed-dial.action shape="square" label="Action" />
    </x-slot:actions>
</x-ui::speed-dial>
```

### 5. Tooltip Positions

```blade
<x-ui::speed-dial tooltipPosition="left">
    <x-slot:actions>
        {{-- Tooltips appear on left --}}
        <x-ui::speed-dial.action
            tooltipPosition="left"
            label="Left tooltip"
        />
    </x-slot:actions>
</x-ui::speed-dial>

<x-ui::speed-dial tooltipPosition="right">
    <x-slot:actions>
        {{-- Tooltips appear on right --}}
        <x-ui::speed-dial.action
            tooltipPosition="right"
            label="Right tooltip"
        />
    </x-slot:actions>
</x-ui::speed-dial>
```

## Real-World Examples

### Example 1: Social Media Actions

```blade
<x-ui::speed-dial position="bottom-right">
    <x-slot:actions>
        {{-- Share --}}
        <x-ui::speed-dial.action
            wire:click="share"
            label="Share"
            :icon="'<svg class=\'w-5 h-5\' fill=\'currentColor\' viewBox=\'0 0 20 20\'><path d=\'M15 8a3 3 0 10-2.977-2.63l-4.94 2.47a3 3 0 100 4.319l4.94 2.47a3 3 0 10.895-1.789l-4.94-2.47a3.027 3.027 0 000-.74l4.94-2.47C13.456 7.68 14.19 8 15 8z\'/></svg>'"
        />

        {{-- Comment --}}
        <x-ui::speed-dial.action
            href="#comments"
            label="Comment"
            :icon="'<svg class=\'w-5 h-5\' fill=\'currentColor\' viewBox=\'0 0 20 20\'><path fill-rule=\'evenodd\' d=\'M18 10c0 3.866-3.582 7-8 7a8.841 8.841 0 01-4.083-.98L2 17l1.338-3.123C2.493 12.767 2 11.434 2 10c0-3.866 3.582-7 8-7s8 3.134 8 7zM7 9H5v2h2V9zm8 0h-2v2h2V9zM9 9h2v2H9V9z\' clip-rule=\'evenodd\'/></svg>'"
        />

        {{-- Like --}}
        <x-ui::speed-dial.action
            wire:click="like"
            label="Like"
            :icon="'<svg class=\'w-5 h-5\' fill=\'currentColor\' viewBox=\'0 0 20 20\'><path fill-rule=\'evenodd\' d=\'M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z\' clip-rule=\'evenodd\'/></svg>'"
        />

        {{-- Bookmark --}}
        <x-ui::speed-dial.action
            wire:click="bookmark"
            label="Save"
            :icon="'<svg class=\'w-5 h-5\' fill=\'currentColor\' viewBox=\'0 0 20 20\'><path d=\'M5 4a2 2 0 012-2h6a2 2 0 012 2v14l-5-2.5L5 18V4z\'/></svg>'"
        />
    </x-slot:actions>
</x-ui::speed-dial>
```

### Example 2: Content Management

```blade
<x-ui::speed-dial position="bottom-right" trigger="click">
    <x-slot:actions>
        {{-- Create New Post --}}
        <x-ui::speed-dial.action
            href="{{ route('posts.create') }}"
            label="New Post"
            :icon="'<svg class=\'w-5 h-5\' fill=\'currentColor\' viewBox=\'0 0 20 20\'><path fill-rule=\'evenodd\' d=\'M4 4a2 2 0 012-2h4.586A2 2 0 0112 2.586L15.414 6A2 2 0 0116 7.414V16a2 2 0 01-2 2H6a2 2 0 01-2-2V4zm2 6a1 1 0 011-1h6a1 1 0 110 2H7a1 1 0 01-1-1zm1 3a1 1 0 100 2h6a1 1 0 100-2H7z\' clip-rule=\'evenodd\'/></svg>'"
        />

        {{-- Upload Media --}}
        <x-ui::speed-dial.action
            wire:click="$dispatch('open-modal', 'upload-media')"
            label="Upload"
            :icon="'<svg class=\'w-5 h-5\' fill=\'currentColor\' viewBox=\'0 0 20 20\'><path fill-rule=\'evenodd\' d=\'M3 17a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM6.293 6.707a1 1 0 010-1.414l3-3a1 1 0 011.414 0l3 3a1 1 0 01-1.414 1.414L11 5.414V13a1 1 0 11-2 0V5.414L7.707 6.707a1 1 0 01-1.414 0z\' clip-rule=\'evenodd\'/></svg>'"
        />

        {{-- Create Event --}}
        <x-ui::speed-dial.action
            href="{{ route('events.create') }}"
            label="New Event"
            :icon="'<svg class=\'w-5 h-5\' fill=\'currentColor\' viewBox=\'0 0 20 20\'><path fill-rule=\'evenodd\' d=\'M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z\' clip-rule=\'evenodd\'/></svg>'"
        />

        {{-- Add User --}}
        <x-ui::speed-dial.action
            href="{{ route('users.invite') }}"
            label="Invite User"
            :icon="'<svg class=\'w-5 h-5\' fill=\'currentColor\' viewBox=\'0 0 20 20\'><path d=\'M8 9a3 3 0 100-6 3 3 0 000 6zM8 11a6 6 0 016 6H2a6 6 0 016-6zM16 7a1 1 0 10-2 0v1h-1a1 1 0 100 2h1v1a1 1 0 102 0v-1h1a1 1 0 100-2h-1V7z\'/></svg>'"
        />
    </x-slot:actions>
</x-ui::speed-dial>
```

### Example 3: Mobile App Actions

```blade
{{-- Bottom navigation replacement for mobile --}}
<x-ui::speed-dial position="bottom-right" direction="vertical">
    <x-slot:actions>
        {{-- Home --}}
        <x-ui::speed-dial.action
            href="{{ route('dashboard') }}"
            label="Home"
            :icon="'<svg class=\'w-5 h-5\' fill=\'currentColor\' viewBox=\'0 0 20 20\'><path d=\'M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z\'/></svg>'"
        />

        {{-- Search --}}
        <x-ui::speed-dial.action
            href="{{ route('search') }}"
            label="Search"
            :icon="'<svg class=\'w-5 h-5\' fill=\'currentColor\' viewBox=\'0 0 20 20\'><path fill-rule=\'evenodd\' d=\'M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z\' clip-rule=\'evenodd\'/></svg>'"
        />

        {{-- Notifications --}}
        <x-ui::speed-dial.action
            href="{{ route('notifications') }}"
            label="Notifications"
            :icon="'<svg class=\'w-5 h-5\' fill=\'currentColor\' viewBox=\'0 0 20 20\'><path d=\'M10 2a6 6 0 00-6 6v3.586l-.707.707A1 1 0 004 14h12a1 1 0 00.707-1.707L16 11.586V8a6 6 0 00-6-6zM10 18a3 3 0 01-3-3h6a3 3 0 01-3 3z\'/></svg>'"
        />

        {{-- Profile --}}
        <x-ui::speed-dial.action
            href="{{ route('profile') }}"
            label="Profile"
            :icon="'<svg class=\'w-5 h-5\' fill=\'currentColor\' viewBox=\'0 0 20 20\'><path fill-rule=\'evenodd\' d=\'M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z\' clip-rule=\'evenodd\'/></svg>'"
        />
    </x-slot:actions>
</x-ui::speed-dial>
```

### Example 4: E-commerce Product Actions

```blade
<x-ui::speed-dial position="bottom-right">
    <x-slot:actions>
        {{-- Add to Cart --}}
        <x-ui::speed-dial.action
            wire:click="addToCart"
            label="Add to Cart"
            :icon="'<svg class=\'w-5 h-5\' fill=\'currentColor\' viewBox=\'0 0 20 20\'><path d=\'M3 1a1 1 0 000 2h1.22l.305 1.222a.997.997 0 00.01.042l1.358 5.43-.893.892C3.74 11.846 4.632 14 6.414 14H15a1 1 0 000-2H6.414l1-1H14a1 1 0 00.894-.553l3-6A1 1 0 0017 3H6.28l-.31-1.243A1 1 0 005 1H3zM16 16.5a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0zM6.5 18a1.5 1.5 0 100-3 1.5 1.5 0 000 3z\'/></svg>'"
        />

        {{-- Add to Wishlist --}}
        <x-ui::speed-dial.action
            wire:click="addToWishlist"
            label="Wishlist"
            :icon="'<svg class=\'w-5 h-5\' fill=\'currentColor\' viewBox=\'0 0 20 20\'><path fill-rule=\'evenodd\' d=\'M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z\' clip-rule=\'evenodd\'/></svg>'"
        />

        {{-- Compare --}}
        <x-ui::speed-dial.action
            wire:click="addToCompare"
            label="Compare"
            :icon="'<svg class=\'w-5 h-5\' fill=\'currentColor\' viewBox=\'0 0 20 20\'><path d=\'M9 2a1 1 0 000 2h2a1 1 0 100-2H9z\'/><path fill-rule=\'evenodd\' d=\'M4 5a2 2 0 012-2 3 3 0 003 3h2a3 3 0 003-3 2 2 0 012 2v11a2 2 0 01-2 2H6a2 2 0 01-2-2V5zm3 4a1 1 0 000 2h.01a1 1 0 100-2H7zm3 0a1 1 0 000 2h3a1 1 0 100-2h-3zm-3 4a1 1 0 100 2h.01a1 1 0 100-2H7zm3 0a1 1 0 100 2h3a1 1 0 100-2h-3z\' clip-rule=\'evenodd\'/></svg>'"
        />

        {{-- Share --}}
        <x-ui::speed-dial.action
            wire:click="shareProduct"
            label="Share"
            :icon="'<svg class=\'w-5 h-5\' fill=\'currentColor\' viewBox=\'0 0 20 20\'><path d=\'M15 8a3 3 0 10-2.977-2.63l-4.94 2.47a3 3 0 100 4.319l4.94 2.47a3 3 0 10.895-1.789l-4.94-2.47a3.027 3.027 0 000-.74l4.94-2.47C13.456 7.68 14.19 8 15 8z\'/></svg>'"
        />
    </x-slot:actions>
</x-ui::speed-dial>
```

### Example 5: Admin Dashboard Tools

```blade
<x-ui::speed-dial position="bottom-right" trigger="click">
    <x-slot:actions>
        {{-- Export Data --}}
        <x-ui::speed-dial.action
            wire:click="exportData"
            label="Export"
            :icon="'<svg class=\'w-5 h-5\' fill=\'currentColor\' viewBox=\'0 0 20 20\'><path fill-rule=\'evenodd\' d=\'M3 17a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm3.293-7.707a1 1 0 011.414 0L9 10.586V3a1 1 0 112 0v7.586l1.293-1.293a1 1 0 111.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z\' clip-rule=\'evenodd\'/></svg>'"
        />

        {{-- Generate Report --}}
        <x-ui::speed-dial.action
            href="{{ route('reports.generate') }}"
            label="Report"
            :icon="'<svg class=\'w-5 h-5\' fill=\'currentColor\' viewBox=\'0 0 20 20\'><path d=\'M2 11a1 1 0 011-1h2a1 1 0 011 1v5a1 1 0 01-1 1H3a1 1 0 01-1-1v-5zM8 7a1 1 0 011-1h2a1 1 0 011 1v9a1 1 0 01-1 1H9a1 1 0 01-1-1V7zM14 4a1 1 0 011-1h2a1 1 0 011 1v12a1 1 0 01-1 1h-2a1 1 0 01-1-1V4z\'/></svg>'"
        />

        {{-- Settings --}}
        <x-ui::speed-dial.action
            href="{{ route('settings') }}"
            label="Settings"
            :icon="'<svg class=\'w-5 h-5\' fill=\'currentColor\' viewBox=\'0 0 20 20\'><path fill-rule=\'evenodd\' d=\'M11.49 3.17c-.38-1.56-2.6-1.56-2.98 0a1.532 1.532 0 01-2.286.948c-1.372-.836-2.942.734-2.106 2.106.54.886.061 2.042-.947 2.287-1.561.379-1.561 2.6 0 2.978a1.532 1.532 0 01.947 2.287c-.836 1.372.734 2.942 2.106 2.106a1.532 1.532 0 012.287.947c.379 1.561 2.6 1.561 2.978 0a1.533 1.533 0 012.287-.947c1.372.836 2.942-.734 2.106-2.106a1.533 1.533 0 01.947-2.287c1.561-.379 1.561-2.6 0-2.978a1.532 1.532 0 01-.947-2.287c.836-1.372-.734-2.942-2.106-2.106a1.532 1.532 0 01-2.287-.947zM10 13a3 3 0 100-6 3 3 0 000 6z\' clip-rule=\'evenodd\'/></svg>'"
        />

        {{-- Help --}}
        <x-ui::speed-dial.action
            href="{{ route('help') }}"
            label="Help"
            :icon="'<svg class=\'w-5 h-5\' fill=\'currentColor\' viewBox=\'0 0 20 20\'><path fill-rule=\'evenodd\' d=\'M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-8-3a1 1 0 00-.867.5 1 1 0 11-1.731-1A3 3 0 0113 8a3.001 3.001 0 01-2 2.83V11a1 1 0 11-2 0v-1a1 1 0 011-1 1 1 0 100-2zm0 8a1 1 0 100-2 1 1 0 000 2z\' clip-rule=\'evenodd\'/></svg>'"
        />
    </x-slot:actions>
</x-ui::speed-dial>
```

### Example 6: Map/Location Actions

```blade
<x-ui::speed-dial position="bottom-right">
    <x-slot:actions>
        {{-- Current Location --}}
        <x-ui::speed-dial.action
            wire:click="getCurrentLocation"
            label="My Location"
            :icon="'<svg class=\'w-5 h-5\' fill=\'currentColor\' viewBox=\'0 0 20 20\'><path fill-rule=\'evenodd\' d=\'M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z\' clip-rule=\'evenodd\'/></svg>'"
        />

        {{-- Add Marker --}}
        <x-ui::speed-dial.action
            wire:click="addMarker"
            label="Add Marker"
            :icon="'<svg class=\'w-5 h-5\' fill=\'currentColor\' viewBox=\'0 0 20 20\'><path fill-rule=\'evenodd\' d=\'M10 18a8 8 0 100-16 8 8 0 000 16zm1-11a1 1 0 10-2 0v2H7a1 1 0 100 2h2v2a1 1 0 102 0v-2h2a1 1 0 100-2h-2V7z\' clip-rule=\'evenodd\'/></svg>'"
        />

        {{-- Directions --}}
        <x-ui::speed-dial.action
            wire:click="getDirections"
            label="Directions"
            :icon="'<svg class=\'w-5 h-5\' fill=\'currentColor\' viewBox=\'0 0 20 20\'><path fill-rule=\'evenodd\' d=\'M12.586 4.586a2 2 0 112.828 2.828l-3 3a2 2 0 01-2.828 0 1 1 0 00-1.414 1.414 4 4 0 005.656 0l3-3a4 4 0 00-5.656-5.656l-1.5 1.5a1 1 0 101.414 1.414l1.5-1.5zm-5 5a2 2 0 012.828 0 1 1 0 101.414-1.414 4 4 0 00-5.656 0l-3 3a4 4 0 105.656 5.656l1.5-1.5a1 1 0 10-1.414-1.414l-1.5 1.5a2 2 0 11-2.828-2.828l3-3z\' clip-rule=\'evenodd\'/></svg>'"
        />

        {{-- Filter --}}
        <x-ui::speed-dial.action
            wire:click="$dispatch('open-modal', 'map-filters')"
            label="Filter"
            :icon="'<svg class=\'w-5 h-5\' fill=\'currentColor\' viewBox=\'0 0 20 20\'><path fill-rule=\'evenodd\' d=\'M3 3a1 1 0 011-1h12a1 1 0 011 1v3a1 1 0 01-.293.707L12 11.414V15a1 1 0 01-.293.707l-2 2A1 1 0 018 17v-5.586L3.293 6.707A1 1 0 013 6V3z\' clip-rule=\'evenodd\'/></svg>'"
        />
    </x-slot:actions>
</x-ui::speed-dial>
```

## Livewire Integration

### Basic Actions

```blade
<x-ui::speed-dial>
    <x-slot:actions>
        <x-ui::speed-dial.action
            wire:click="create"
            label="Create"
            :icon="'...'"
        />
    </x-slot:actions>
</x-ui::speed-dial>
```

```php
namespace App\Livewire\Components;

use Livewire\Component;

class Actions extends Component
{
    public function create()
    {
        $this->dispatch('open-modal', 'create-item');
    }

    public function render()
    {
        return view('livewire.components.actions');
    }
}
```

### Dynamic Actions Based on State

```blade
<x-ui::speed-dial>
    <x-slot:actions>
        @if($canEdit)
            <x-ui::speed-dial.action
                wire:click="edit"
                label="Edit"
                :icon="'...'"
            />
        @endif

        @if($canDelete)
            <x-ui::speed-dial.action
                wire:click="confirmDelete"
                label="Delete"
                :icon="'...'"
            />
        @endif

        @if($canShare)
            <x-ui::speed-dial.action
                wire:click="share"
                label="Share"
                :icon="'...'"
            />
        @endif
    </x-slot:actions>
</x-ui::speed-dial>
```

### Loading States

```blade
<x-ui::speed-dial>
    <x-slot:actions>
        <x-ui::speed-dial.action
            wire:click="save"
            label="Save"
            wire:loading.attr="disabled"
            wire:target="save"
        >
            <svg wire:loading.remove wire:target="save" class="w-5 h-5" ...>
                {{-- Save icon --}}
            </svg>
            <x-ui::spinner wire:loading wire:target="save" size="sm" />
        </x-ui::speed-dial.action>
    </x-slot:actions>
</x-ui::speed-dial>
```

## Accessibility

### ARIA Attributes

```blade
<button
    aria-expanded="false"
    aria-controls="speed-dial-menu"
    aria-haspopup="true"
>
    {{-- Trigger button --}}
</button>

<div role="menu" aria-label="Speed dial menu">
    {{-- Action items --}}
</div>
```

### Keyboard Navigation

- Tab to focus trigger button
- Enter/Space to toggle menu
- Escape to close menu
- Tab through action items

### Screen Reader Support

```blade
<span class="sr-only">Toggle speed dial menu</span>
<span class="sr-only">{{ $label }}</span>
```

## Best Practices

### 1. Limit Number of Actions

```blade
{{-- Good: 4-6 actions maximum --}}
<x-ui::speed-dial>
    <x-slot:actions>
        <x-ui::speed-dial.action label="Action 1" />
        <x-ui::speed-dial.action label="Action 2" />
        <x-ui::speed-dial.action label="Action 3" />
        <x-ui::speed-dial.action label="Action 4" />
    </x-slot:actions>
</x-ui::speed-dial>

{{-- Avoid: Too many actions --}}
<x-ui::speed-dial>
    <x-slot:actions>
        {{-- 10+ actions is too many --}}
    </x-slot:actions>
</x-ui::speed-dial>
```

### 2. Use Clear Labels

```blade
{{-- Good: Descriptive labels --}}
<x-ui::speed-dial.action label="Create New Post" />
<x-ui::speed-dial.action label="Upload Image" />

{{-- Avoid: Vague labels --}}
<x-ui::speed-dial.action label="New" />
<x-ui::speed-dial.action label="Add" />
```

### 3. Choose Appropriate Trigger

```blade
{{-- Hover for desktop --}}
<div class="hidden md:block">
    <x-ui::speed-dial trigger="hover" />
</div>

{{-- Click for mobile/touch --}}
<div class="md:hidden">
    <x-ui::speed-dial trigger="click" />
</div>
```

### 4. Position Wisely

```blade
{{-- Don't overlap important content --}}
<x-ui::speed-dial position="bottom-right" />

{{-- Consider layout --}}
@if($sidebarVisible)
    <x-ui::speed-dial position="bottom-left" />
@else
    <x-ui::speed-dial position="bottom-right" />
@endif
```

### 5. Mobile Optimization

```blade
{{-- Larger touch targets on mobile --}}
<div class="md:hidden">
    <x-ui::speed-dial>
        <x-slot:actions>
            <x-ui::speed-dial.action
                class="w-16 h-16"
                label="Action"
            />
        </x-slot:actions>
    </x-ui::speed-dial>
</div>
```

## Dark Mode Support

All speed dial components include full dark mode support:

```blade
<x-ui::speed-dial>
    <x-slot:actions>
        <x-ui::speed-dial.action label="Action" />
    </x-slot:actions>
</x-ui::speed-dial>
```

## Testing

### Component Testing

```php
public function test_speed_dial_toggles()
{
    $view = $this->blade('
        <x-ui::speed-dial trigger="click">
            <x-slot:actions>
                <x-ui::speed-dial.action label="Test" />
            </x-slot:actions>
        </x-ui::speed-dial>
    ');

    $view->assertSee('Test');
}
```

### Livewire Testing

```php
public function test_speed_dial_action_triggers_method()
{
    Livewire::test(Actions::class)
        ->call('create')
        ->assertDispatched('open-modal', 'create-item');
}
```

## Related Components

- [Button](button.md) - Action buttons
- [Dropdown](dropdown.md) - Dropdown menus
- [Tooltip](tooltip.md) - Tooltips
- [Modal](modal.md) - Dialog boxes

## Resources

- [Flowbite Speed Dial Documentation](https://flowbite.com/docs/components/speed-dial/)
- [Material Design FAB](https://material.io/components/buttons-floating-action-button)
- [Floating Action Button UX](https://www.nngroup.com/articles/floating-action-buttons/)

---

**Component Version:** 1.0.0
**Last Updated:** 2025-11-20
**Flowbite Version:** 2.x