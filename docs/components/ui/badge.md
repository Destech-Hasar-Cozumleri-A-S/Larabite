# Badge

Label and status indicator components for displaying information tags.

## Components

- **Badge** - `resources/views/components/ui/badge.blade.php`
- **Badge Dismissible** - `resources/views/components/ui/badge/dismissible.blade.php`
- **Badge Link** - `resources/views/components/ui/badge/link.blade.php`
- **Badge Notification** - `resources/views/components/ui/badge/notification.blade.php`
- **Badge Bordered** - `resources/views/components/ui/badge/bordered.blade.php`
- **Badge Icon Only** - `resources/views/components/ui/badge/icon-only.blade.php`

## Features

- 6 color variants (default, primary, success, warning, danger, info)
- 3 size options (sm, md, lg)
- Icon support
- Flexible rounded corners
- Dark mode support
- Dismissible functionality
- Notification badges with counts
- Link badges
- Border variants

## Usage

### Default Badge

```blade
<x-ui.badge variant="primary" size="md">
    New
</x-ui.badge>
```

### All Variants

```blade
<x-ui.badge variant="default">Default</x-ui.badge>
<x-ui.badge variant="primary">Primary</x-ui.badge>
<x-ui.badge variant="success">Success</x-ui.badge>
<x-ui.badge variant="warning">Warning</x-ui.badge>
<x-ui.badge variant="danger">Danger</x-ui.badge>
<x-ui.badge variant="info">Info</x-ui.badge>
```

### Badge with Icon

```blade
<x-ui.badge variant="success" :icon="'<path d=\'...\'/>'">
    Active
</x-ui.badge>
```

### Different Sizes

```blade
<x-ui.badge variant="primary" size="sm">Small</x-ui.badge>
<x-ui.badge variant="primary" size="md">Medium</x-ui.badge>
<x-ui.badge variant="primary" size="lg">Large</x-ui.badge>
```

### Rounded Options

```blade
<x-ui.badge variant="primary" rounded="none">Square</x-ui.badge>
<x-ui.badge variant="primary" rounded="md">Rounded</x-ui.badge>
<x-ui.badge variant="primary" rounded="lg">More Rounded</x-ui.badge>
<x-ui.badge variant="primary" rounded="full">Pill</x-ui.badge>
```

### Dismissible Badge

```blade
<x-ui.badge.dismissible variant="primary" size="md">
    Dismissible badge
</x-ui.badge.dismissible>

<x-ui.badge.dismissible variant="danger" size="sm" id="custom-badge">
    Click to remove
</x-ui.badge.dismissible>
```

### Link Badge

```blade
<x-ui.badge.link href="{{ route('category', 'technology') }}" variant="primary">
    Technology
</x-ui.badge.link>

<x-ui.badge.link href="{{ route('tags.show', 'new') }}" variant="success" size="lg">
    New Posts
</x-ui.badge.link>
```

### Notification Badge

```blade
{{-- Badge with count --}}
<x-ui.badge.notification :count="5" variant="danger">
    <button class="p-2 text-gray-600">
        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20">
            <path d="M10 2a6 6 0 00-6 6v3.586l-.707.707A1 1 0 004 14h12a1 1 0 00.707-1.707L16 11.586V8a6 6 0 00-6-6z"/>
        </svg>
    </button>
</x-ui.badge.notification>

{{-- Animated dot indicator --}}
<x-ui.badge.notification :dot="true" variant="success" position="top-right">
    <x-ui.avatar src="/avatar.jpg" alt="User" size="md" />
</x-ui.badge.notification>
```

### Bordered Badge

```blade
<x-ui.badge.bordered variant="primary">
    Bordered
</x-ui.badge.bordered>

<x-ui.badge.bordered variant="success" size="lg">
    Success
</x-ui.badge.bordered>
```

### Icon Only Badge

```blade
<x-ui.badge.icon-only variant="success" size="md">
    <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z"/>
</x-ui.badge.icon-only>

<x-ui.badge.icon-only variant="danger" size="sm">
    <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 11.793a1 1 0 1 1-1.414 1.414L10 11.414l-2.293 2.293a1 1 0 0 1-1.414-1.414L8.586 10 6.293 7.707a1 1 0 0 1 1.414-1.414L10 8.586l2.293-2.293a1 1 0 0 1 1.414 1.414L11.414 10l2.293 2.293Z"/>
</x-ui.badge.icon-only>
```

## Props

### Badge Component

| Prop | Type | Default | Description |
|------|------|---------|-------------|
| `variant` | string | 'default' | Color variant: default, primary, success, warning, danger, info |
| `size` | string | 'md' | Badge size: sm, md, lg |
| `rounded` | string | 'full' | Border radius: none, md, lg, full |
| `icon` | string | optional | SVG path for icon |

### Badge Dismissible Props

| Prop | Type | Default | Description |
|------|------|---------|-------------|
| `variant` | string | 'default' | Color variant: default, primary, success, warning, danger, info |
| `size` | string | 'md' | Badge size: sm, md, lg |
| `id` | string | optional | Custom badge ID |

### Badge Link Props

| Prop | Type | Default | Description |
|------|------|---------|-------------|
| `href` | string | required | Link URL |
| `variant` | string | 'default' | Color variant: default, primary, success, warning, danger, info |
| `size` | string | 'md' | Badge size: sm, md, lg |
| `rounded` | string | 'full' | Border radius: none, md, lg, full |

### Badge Notification Props

| Prop | Type | Default | Description |
|------|------|---------|-------------|
| `count` | int | 0 | Notification count |
| `variant` | string | 'danger' | Color variant: primary, success, warning, danger, info |
| `dot` | boolean | false | Show only animated dot |
| `position` | string | 'top-right' | Badge position: top-right, top-left, bottom-right, bottom-left |

### Badge Bordered Props

| Prop | Type | Default | Description |
|------|------|---------|-------------|
| `variant` | string | 'default' | Color variant: default, primary, success, warning, danger, info |
| `size` | string | 'md' | Badge size: sm, md, lg |
| `rounded` | string | 'full' | Border radius: none, md, lg, full |

### Badge Icon Only Props

| Prop | Type | Default | Description |
|------|------|---------|-------------|
| `variant` | string | 'default' | Color variant: default, primary, success, warning, danger, info |
| `size` | string | 'md' | Badge size: sm, md |

## Best Practices

1. **Variant Selection**: Use appropriate colors for status (success=completed, danger=error, warning=pending)
2. **Size Consistency**: Match badge sizes to the surrounding text size
3. **Icon Usage**: Use icons sparingly and only when they add meaningful context
4. **Notification Badges**: Show count up to 99, then use "99+" for larger numbers
5. **Accessibility**: Provide meaningful text, not just icons
6. **Link Badges**: Use for navigable categories and tags
7. **Dismissible Badges**: Use for temporary filters or selections that users can remove
8. **Position**: Keep notification badge positions consistent across the application
9. **Animation**: Use animated dots for real-time status indicators
10. **Color Meaning**: Maintain consistent color meanings throughout the app