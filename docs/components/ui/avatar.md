# Avatar

Avatar components for displaying user and pet profile images.

## Components

- **Avatar** - `resources/views/components/ui/avatar.blade.php`
- **Avatar Placeholder** - `resources/views/components/ui/avatar/placeholder.blade.php`
- **Avatar Group** - `resources/views/components/ui/avatar/group.blade.php`
- **Avatar Stacked** - `resources/views/components/ui/avatar/stacked.blade.php`
- **Avatar with Text** - `resources/views/components/ui/avatar/with-text.blade.php`

## Features

- 6 different size options (xs, sm, md, lg, xl, 2xl)
- Status indicator support (online, offline, away, busy)
- Ring/border support with customizable colors
- Rounded corners (full, lg, md)
- Fallback URL support
- Placeholder with initials or icon
- Group display for multiple avatars
- Text integration for user info display

## Usage

### Default Avatar

```blade
<x-ui.avatar
    :src="$user->avatar_url"
    :alt="$user->name"
    size="lg"
/>
```

### Avatar with Ring

```blade
<x-ui.avatar
    :src="$user->avatar_url"
    :alt="$user->name"
    size="md"
    :ring="true"
    ringColor="blue"
/>
```

### Avatar with Status

```blade
<x-ui.avatar
    :src="$user->avatar_url"
    :alt="$user->name"
    status="online"
    statusPosition="bottom-right"
/>
```

### Rounded Avatar

```blade
<x-ui.avatar
    :src="$user->avatar_url"
    :alt="$user->name"
    rounded="lg"
/>
```

### Avatar Placeholder

```blade
{{-- Icon Placeholder --}}
<x-ui.avatar.placeholder size="md" type="icon" />

{{-- Initials Placeholder --}}
<x-ui.avatar.placeholder size="lg" type="initials" initials="JD" />
```

### Avatar Group

```blade
@php
$users = [
    ['name' => 'John Doe', 'avatar' => '/path/to/avatar1.jpg'],
    ['name' => 'Jane Smith', 'avatar' => '/path/to/avatar2.jpg'],
    ['name' => 'Bob Johnson', 'avatar' => '/path/to/avatar3.jpg'],
];
@endphp

<x-ui.avatar.group :users="$users" :max="3" size="md" />
```

### Avatar Stacked

```blade
<x-ui.avatar.stacked size="md">
    <x-ui.avatar src="/avatar1.jpg" alt="User 1" size="md" />
    <x-ui.avatar src="/avatar2.jpg" alt="User 2" size="md" />
    <x-ui.avatar src="/avatar3.jpg" alt="User 3" size="md" />
</x-ui.avatar.stacked>
```

### Avatar with Text

```blade
<x-ui.avatar.with-text
    :src="$user->avatar_url"
    :name="$user->name"
    description="Software Developer"
    size="md"
/>

{{-- Custom content --}}
<x-ui.avatar.with-text
    :src="$user->avatar_url"
    :name="$user->name"
    size="lg"
>
    <p class="text-xs text-gray-500">{{ $user->email }}</p>
</x-ui.avatar.with-text>
```

## Props

### Avatar Component

| Prop | Type | Default | Description |
|------|------|---------|-------------|
| `src` | string | optional | Avatar URL |
| `alt` | string | required | Alt text |
| `size` | string | 'md' | Size: xs, sm, md, lg, xl, 2xl |
| `ring` | boolean | false | Show ring border |
| `ringColor` | string | 'gray' | Ring color |
| `rounded` | string | 'full' | Border radius: full, lg, md |
| `status` | string | optional | Status indicator: online, offline, away, busy |
| `statusPosition` | string | 'bottom-right' | Status position: bottom-right, bottom-left, top-right, top-left |

### Avatar Placeholder Props

| Prop | Type | Default | Description |
|------|------|---------|-------------|
| `size` | string | 'md' | Size: xs, sm, md, lg, xl, 2xl |
| `type` | string | 'icon' | Type: icon, initials |
| `initials` | string | optional | User initials |
| `rounded` | string | 'full' | Border radius: full, lg, md |

### Avatar Group Props

| Prop | Type | Default | Description |
|------|------|---------|-------------|
| `users` | array | required | Array of users with name and avatar |
| `size` | string | 'md' | Size: xs, sm, md, lg, xl |
| `max` | int | 5 | Maximum avatars to display |

### Avatar Stacked Props

| Prop | Type | Default | Description |
|------|------|---------|-------------|
| `size` | string | 'md' | Size: xs, sm, md, lg, xl |
| `remaining` | int | optional | Number of remaining users to show as +N |

### Avatar with Text Props

| Prop | Type | Default | Description |
|------|------|---------|-------------|
| `src` | string | optional | Avatar URL |
| `alt` | string | optional | Alt text |
| `name` | string | required | User name |
| `description` | string | optional | Description text |
| `size` | string | 'md' | Size: xs, sm, md, lg, xl |
| `rounded` | string | 'full' | Border radius: full, lg, md |
| `ring` | boolean | false | Show ring border |
| `ringColor` | string | 'gray' | Ring color |

## Best Practices

1. Always provide meaningful alt text for accessibility
2. Use appropriate sizes based on context (sm for comments, lg for profiles)
3. Status indicators should be used consistently across the app
4. For groups with many users, use avatar groups with a max limit
5. Use placeholders when avatar images are not available
6. Consider using ring borders to highlight important users