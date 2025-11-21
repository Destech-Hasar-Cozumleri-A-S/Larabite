# Button

Advanced button component system with multiple variants, sizes, and styles.

## Components

- **Button** - `resources/views/components/ui/button.blade.php`
- **Button Icon** - `resources/views/components/ui/button/icon.blade.php`
- **Button Group** - `resources/views/components/ui/button/group.blade.php`
- **Button Group Item** - `resources/views/components/ui/button/group-item.blade.php`
- **Button Gradient** - `resources/views/components/ui/button/gradient.blade.php`
- **Button Social** - `resources/views/components/ui/button/social.blade.php`

## Features

- 9 different color variants
- 5 size options (xs, sm, md, lg, xl)
- Outline (border) style
- Pill (rounded-full) style
- Loading state
- Dark mode support
- Icon support
- Link and button modes
- Group functionality with overlapping borders
- Gradient color options
- Social media branded buttons

## Usage

### Default Button

```blade
<x-ui.button variant="primary" size="md">
    Save Changes
</x-ui.button>
```

### All Variants

```blade
<x-ui.button variant="primary">Primary</x-ui.button>
<x-ui.button variant="secondary">Secondary</x-ui.button>
<x-ui.button variant="tertiary">Tertiary</x-ui.button>
<x-ui.button variant="success">Success</x-ui.button>
<x-ui.button variant="danger">Danger</x-ui.button>
<x-ui.button variant="warning">Warning</x-ui.button>
<x-ui.button variant="dark">Dark</x-ui.button>
<x-ui.button variant="ghost">Ghost</x-ui.button>
<x-ui.button variant="link">Link</x-ui.button>
```

### Outline Buttons

```blade
<x-ui.button variant="primary" :outline="true">
    Outlined Primary
</x-ui.button>
```

### Pill Buttons

```blade
<x-ui.button variant="primary" :pill="true">
    Pill Button
</x-ui.button>
```

### Sizes

```blade
<x-ui.button size="xs">Extra Small</x-ui.button>
<x-ui.button size="sm">Small</x-ui.button>
<x-ui.button size="md">Medium</x-ui.button>
<x-ui.button size="lg">Large</x-ui.button>
<x-ui.button size="xl">Extra Large</x-ui.button>
```

### Link Button

```blade
<x-ui.button href="{{ route('profile') }}" wire:navigate>
    View Profile
</x-ui.button>
```

### Loading State

```blade
<x-ui.button :loading="true">
    Processing...
</x-ui.button>
```

### With Icon

```blade
<x-ui.button variant="primary">
    <svg class="w-4 h-4 me-2" fill="currentColor" viewBox="0 0 20 20">
        <path d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z"/>
    </svg>
    Add Item
</x-ui.button>
```

### Icon Button

```blade
<x-ui.button.icon variant="primary" size="md" label="Settings">
    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
        <path fill-rule="evenodd" d="M11.49 3.17c-.38-1.56-2.6-1.56-2.98 0a1.532 1.532 0 01-2.286.948c-1.372-.836-2.942.734-2.106 2.106.54.886.061 2.042-.947 2.287-1.561.379-1.561 2.6 0 2.978a1.532 1.532 0 01.947 2.287c-.836 1.372.734 2.942 2.106 2.106a1.532 1.532 0 012.287.947c.379 1.561 2.6 1.561 2.978 0a1.533 1.533 0 012.287-.947c1.372.836 2.942-.734 2.106-2.106a1.533 1.533 0 01.947-2.287c1.561-.379 1.561-2.6 0-2.978a1.532 1.532 0 01-.947-2.287c.836-1.372-.734-2.942-2.106-2.106a1.532 1.532 0 01-2.287-.947zM10 13a3 3 0 100-6 3 3 0 000 6z" clip-rule="evenodd"/>
    </svg>
</x-ui.button.icon>
```

### Button Group

```blade
<x-ui.button.group>
    <x-ui.button.group-item position="first" variant="primary">
        Profile
    </x-ui.button.group-item>

    <x-ui.button.group-item position="middle" variant="primary">
        Settings
    </x-ui.button.group-item>

    <x-ui.button.group-item position="last" variant="primary">
        Messages
    </x-ui.button.group-item>
</x-ui.button.group>
```

### Vertical Button Group

```blade
<x-ui.button.group :vertical="true">
    <x-ui.button.group-item position="first" :vertical="true" variant="secondary">
        Dashboard
    </x-ui.button.group-item>

    <x-ui.button.group-item position="middle" :vertical="true" variant="secondary">
        Settings
    </x-ui.button.group-item>

    <x-ui.button.group-item position="last" :vertical="true" variant="secondary">
        Logout
    </x-ui.button.group-item>
</x-ui.button.group>
```

### Gradient Buttons

```blade
{{-- Monochrome Gradients --}}
<x-ui.button.gradient gradient="blue">Blue Gradient</x-ui.button.gradient>
<x-ui.button.gradient gradient="green">Green Gradient</x-ui.button.gradient>
<x-ui.button.gradient gradient="purple">Purple Gradient</x-ui.button.gradient>

{{-- Duotone Gradients --}}
<x-ui.button.gradient gradient="purple-blue">Purple to Blue</x-ui.button.gradient>
<x-ui.button.gradient gradient="cyan-blue">Cyan to Blue</x-ui.button.gradient>
<x-ui.button.gradient gradient="pink-orange">Pink to Orange</x-ui.button.gradient>
```

### Social Buttons

```blade
<x-ui.button.social provider="facebook">
    Sign in with Facebook
</x-ui.button.social>

<x-ui.button.social provider="github">
    Sign in with GitHub
</x-ui.button.social>

<x-ui.button.social provider="google">
    Sign in with Google
</x-ui.button.social>
```

## Props

### Button Component

| Prop | Type | Default | Description |
|------|------|---------|-------------|
| `variant` | string | 'primary' | Color variant: primary, secondary, tertiary, success, danger, warning, dark, ghost, link |
| `size` | string | 'md' | Button size: xs, sm, md, lg, xl |
| `href` | string | optional | URL for link mode |
| `type` | string | 'button' | Button type: button, submit, reset |
| `loading` | boolean | false | Show loading state |
| `pill` | boolean | false | Rounded-full style |
| `outline` | boolean | false | Outlined (border) style |

### Button Icon Props

| Prop | Type | Default | Description |
|------|------|---------|-------------|
| `variant` | string | 'primary' | Color variant: primary, secondary, success, danger, dark |
| `size` | string | 'md' | Button size: xs, sm, md, lg, xl |
| `href` | string | optional | URL for link mode |
| `type` | string | 'button' | Button type: button, submit, reset |
| `outline` | boolean | false | Outlined style |
| `label` | string | required | Screen reader label (accessibility) |

### Button Group Props

| Prop | Type | Default | Description |
|------|------|---------|-------------|
| `vertical` | boolean | false | Use vertical layout |

### Button Group Item Props

| Prop | Type | Default | Description |
|------|------|---------|-------------|
| `position` | string | required | Position in group: first, middle, last |
| `vertical` | boolean | false | Vertical mode |
| All base button props | - | - | Inherits all button component props |

### Button Gradient Props

| Prop | Type | Default | Description |
|------|------|---------|-------------|
| `gradient` | string | 'blue' | Gradient: blue, green, cyan, teal, lime, red, pink, purple, purple-blue, cyan-blue, green-blue, purple-pink, pink-orange, teal-lime, red-yellow |
| `size` | string | 'md' | Button size: xs, sm, md, lg, xl |
| `type` | string | 'button' | Button type |
| `href` | string | optional | Link URL |
| `pill` | boolean | false | Rounded-full style |

### Button Social Props

| Prop | Type | Default | Description |
|------|------|---------|-------------|
| `provider` | string | 'facebook' | Social provider: facebook, github, twitter, google, apple |
| `size` | string | 'md' | Button size: xs, sm, md, lg, xl |
| `type` | string | 'button' | Button type |
| `href` | string | optional | Link URL |

## Best Practices

1. **Variant Selection**: Use primary for main actions, secondary for alternative actions, danger for destructive actions
2. **Size Consistency**: Maintain consistent button sizes within the same context
3. **Loading States**: Always show loading states for async operations
4. **Accessibility**: Use `label` prop for icon-only buttons
5. **Button Groups**: Use for related actions that should be visually connected
6. **Outline vs Solid**: Use outline buttons for less prominent actions
7. **Icon Placement**: Place icons on the left for actions, right for navigation
8. **Disabled State**: Use the disabled attribute for inactive buttons
9. **Link Buttons**: Use href prop when button acts as navigation
10. **Livewire Integration**: Use wire:click for dynamic actions without page reload