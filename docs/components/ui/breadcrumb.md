# Breadcrumb

Navigation components for showing page hierarchy and location.

## Components

- **Breadcrumb** - `resources/views/components/ui/breadcrumb.blade.php`
- **Breadcrumb Item** - `resources/views/components/ui/breadcrumb/item.blade.php`
- **Breadcrumb Dropdown** - `resources/views/components/ui/breadcrumb/dropdown.blade.php`
- **Breadcrumb with Button** - `resources/views/components/ui/breadcrumb/with-button.blade.php`
- **Breadcrumb with Nav** - `resources/views/components/ui/breadcrumb/with-nav.blade.php`

## Features

- Home icon support
- Arrow separators with RTL support
- Active/current page indication
- Solid background variant
- Dropdown menu support
- Custom icon support
- Accessibility (ARIA attributes)
- Prev/Next navigation integration
- Action button integration

## Usage

### Default Breadcrumb

```blade
<x-ui::breadcrumb>
    <x-ui::breadcrumb.item href="{{ route('home') }}" home>
        Home
    </x-ui::breadcrumb.item>

    <x-ui::breadcrumb.item href="{{ route('projects') }}">
        Projects
    </x-ui::breadcrumb.item>

    <x-ui::breadcrumb.item :active="true">
        Project Details
    </x-ui::breadcrumb.item>
</x-ui::breadcrumb>
```

### Solid Background

```blade
<x-ui::breadcrumb background>
    <x-ui::breadcrumb.item href="{{ route('home') }}" home>
        Home
    </x-ui::breadcrumb.item>

    <x-ui::breadcrumb.item href="{{ route('blog') }}">
        Blog
    </x-ui::breadcrumb.item>

    <x-ui::breadcrumb.item :active="true">
        Article
    </x-ui::breadcrumb.item>
</x-ui::breadcrumb>
```

### With Custom Icon

```blade
<x-ui::breadcrumb>
    <x-ui::breadcrumb.item href="{{ route('dashboard') }}">
        <x-slot:icon>
            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                <path d="M3 4a1 1 0 011-1h12a1 1 0 011 1v2a1 1 0 01-1 1H4a1 1 0 01-1-1V4z"/>
            </svg>
        </x-slot:icon>
        Dashboard
    </x-ui::breadcrumb.item>

    <x-ui::breadcrumb.item :active="true">
        Settings
    </x-ui::breadcrumb.item>
</x-ui::breadcrumb>
```

### With Livewire

```blade
<x-ui::breadcrumb>
    <x-ui::breadcrumb.item wire="goHome" home>
        Home
    </x-ui::breadcrumb.item>

    <x-ui::breadcrumb.item wire="goToCategory" wire-params="['id' => 1]">
        Category
    </x-ui::breadcrumb.item>

    <x-ui::breadcrumb.item :active="true">
        Item
    </x-ui::breadcrumb.item>
</x-ui::breadcrumb>
```

### Breadcrumb with Dropdown

```blade
<x-ui::breadcrumb>
    <x-ui::breadcrumb.item href="{{ route('home') }}" home>
        Home
    </x-ui::breadcrumb.item>

    <x-ui::breadcrumb.dropdown label="Projects" id="projects-dropdown">
        <x-ui::breadcrumb.dropdown-item href="{{ route('projects.web') }}">
            Web Projects
        </x-ui::breadcrumb.dropdown-item>

        <x-ui::breadcrumb.dropdown-item href="{{ route('projects.mobile') }}">
            Mobile Projects
        </x-ui::breadcrumb.dropdown-item>

        <x-ui::breadcrumb.dropdown-item wire="showArchivedProjects">
            Archived
        </x-ui::breadcrumb.dropdown-item>
    </x-ui::breadcrumb.dropdown>

    <x-ui::breadcrumb.item :active="true">
        Project Name
    </x-ui::breadcrumb.item>
</x-ui::breadcrumb>
```

### Breadcrumb with Button

```blade
<x-ui::breadcrumb.with-button
    buttonText="Database"
    buttonHref="{{ route('database.settings') }}"
>
    <x-slot:buttonIcon>
        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
            <path d="M3 12v3c0 1.657 3.134 3 7 3s7-1.343 7-3v-3c0 1.657-3.134 3-7 3s-7-1.343-7-3z"/>
        </svg>
    </x-slot:buttonIcon>

    <x-slot:breadcrumb>
        <x-ui::breadcrumb.item href="{{ route('home') }}" home>
            Home
        </x-ui::breadcrumb.item>

        <x-ui::breadcrumb.item :active="true">
            Settings
        </x-ui::breadcrumb.item>
    </x-slot:breadcrumb>
</x-ui::breadcrumb.with-button>
```

### With Dropdown Button

```blade
<x-ui::breadcrumb.with-button
    buttonText="Actions"
    dropdownId="actions-dropdown"
>
    <x-slot:breadcrumb>
        <x-ui::breadcrumb.item href="{{ route('home') }}" home>
            Home
        </x-ui::breadcrumb.item>

        <x-ui::breadcrumb.item :active="true">
            Page
        </x-ui::breadcrumb.item>
    </x-slot:breadcrumb>

    <x-slot:dropdown>
        <x-ui::breadcrumb.dropdown-item href="{{ route('export') }}">
            Export Data
        </x-ui::breadcrumb.dropdown-item>

        <x-ui::breadcrumb.dropdown-item wire="importData">
            Import Data
        </x-ui::breadcrumb.dropdown-item>
    </x-slot:dropdown>
</x-ui::breadcrumb.with-button>
```

### With Livewire Button

```blade
<x-ui::breadcrumb.with-button
    buttonText="Create New"
    buttonWire="createNew"
>
    <x-slot:breadcrumb>
        <x-ui::breadcrumb.item href="{{ route('home') }}" home>
            Home
        </x-ui::breadcrumb.item>

        <x-ui::breadcrumb.item :active="true">
            Items
        </x-ui::breadcrumb.item>
    </x-slot:breadcrumb>
</x-ui::breadcrumb.with-button>
```

### Breadcrumb with Navigation

```blade
<x-ui::breadcrumb.with-nav
    prevHref="{{ route('gallery.show', $previousId) }}"
    nextHref="{{ route('gallery.show', $nextId) }}"
>
    <x-ui::breadcrumb.item href="{{ route('home') }}" home>
        Home
    </x-ui::breadcrumb.item>

    <x-ui::breadcrumb.item href="{{ route('gallery') }}">
        Gallery
    </x-ui::breadcrumb.item>

    <x-ui::breadcrumb.item :active="true">
        Photo {{ $currentId }}
    </x-ui::breadcrumb.item>
</x-ui::breadcrumb.with-nav>
```

### With Livewire Navigation

```blade
<x-ui::breadcrumb.with-nav
    prevWire="previousItem"
    nextWire="nextItem"
>
    <x-ui::breadcrumb.item href="{{ route('home') }}" home>
        Home
    </x-ui::breadcrumb.item>

    <x-ui::breadcrumb.item :active="true">
        {{ $currentItem->name }}
    </x-ui::breadcrumb.item>
</x-ui::breadcrumb.with-nav>
```

## Props

### Breadcrumb Component

| Prop | Type | Default | Description |
|------|------|---------|-------------|
| `background` | boolean | false | Show solid background |

### Breadcrumb Item Props

| Prop | Type | Default | Description |
|------|------|---------|-------------|
| `href` | string | optional | Link URL |
| `active` | boolean | false | Active/current page |
| `home` | boolean | false | Show home icon |
| `wire` | string | optional | Livewire method |
| `icon` | slot | optional | Custom icon |

### Breadcrumb Dropdown Props

| Prop | Type | Default | Description |
|------|------|---------|-------------|
| `id` | string | optional | Dropdown ID (auto-generated if not provided) |
| `label` | string | required | Dropdown button text |

### Breadcrumb Dropdown Item Props

| Prop | Type | Default | Description |
|------|------|---------|-------------|
| `href` | string | '#' | Link URL |
| `wire` | string | optional | Livewire method |

### Breadcrumb with Button Props

| Prop | Type | Default | Description |
|------|------|---------|-------------|
| `buttonText` | string | optional | Button text |
| `buttonIcon` | slot | optional | Button icon |
| `buttonWire` | string | optional | Livewire method |
| `buttonHref` | string | optional | Button link |
| `dropdownId` | string | optional | Dropdown ID (if using dropdown) |
| `breadcrumb` | slot | required | Breadcrumb items |
| `dropdown` | slot | optional | Dropdown items |
| `button` | slot | optional | Custom button |

### Breadcrumb with Nav Props

| Prop | Type | Default | Description |
|------|------|---------|-------------|
| `prevHref` | string | optional | Previous page URL |
| `nextHref` | string | optional | Next page URL |
| `prevWire` | string | optional | Previous page Livewire method |
| `nextWire` | string | optional | Next page Livewire method |

## Best Practices

1. **Hierarchy**: Always start with home or top-level page

2. **Active State**: Mark the current page as active (last item)

3. **Click Behavior**: Active items should not be clickable

4. **Mobile**: Consider showing only the last 2-3 items on mobile devices

5. **RTL Support**: Arrows automatically reverse for RTL languages

6. **Accessibility**: Include proper ARIA labels and navigation landmarks

7. **Deep Nesting**: Use dropdowns for deep hierarchies to save space

8. **Truncation**: Truncate long breadcrumb text with ellipsis

9. **Action Buttons**: Place related actions in breadcrumb bar for context

10. **Navigation**: Use prev/next navigation for sequential content (galleries, articles)

## Examples

### E-commerce Product Page

```blade
<x-ui::breadcrumb>
    <x-ui::breadcrumb.item href="{{ route('home') }}" home>
        Home
    </x-ui::breadcrumb.item>

    <x-ui::breadcrumb.item href="{{ route('shop') }}">
        Shop
    </x-ui::breadcrumb.item>

    <x-ui::breadcrumb.item href="{{ route('category', $product->category) }}">
        {{ $product->category->name }}
    </x-ui::breadcrumb.item>

    <x-ui::breadcrumb.item :active="true">
        {{ $product->name }}
    </x-ui::breadcrumb.item>
</x-ui::breadcrumb>
```

### Blog Article with Navigation

```blade
<x-ui::breadcrumb.with-nav
    :prevHref="$previousArticle ? route('blog.show', $previousArticle) : null"
    :nextHref="$nextArticle ? route('blog.show', $nextArticle) : null"
>
    <x-ui::breadcrumb.item href="{{ route('home') }}" home>
        Home
    </x-ui::breadcrumb.item>

    <x-ui::breadcrumb.item href="{{ route('blog.index') }}">
        Blog
    </x-ui::breadcrumb.item>

    <x-ui::breadcrumb.item href="{{ route('blog.category', $article->category) }}">
        {{ $article->category->name }}
    </x-ui::breadcrumb.item>

    <x-ui::breadcrumb.item :active="true">
        {{ Str::limit($article->title, 50) }}
    </x-ui::breadcrumb.item>
</x-ui::breadcrumb.with-nav>
```

### Admin Panel with Actions

```blade
<x-ui::breadcrumb.with-button
    buttonText="Add New"
    buttonWire="showCreateModal"
>
    <x-slot:buttonIcon>
        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
            <path fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" clip-rule="evenodd"/>
        </svg>
    </x-slot:buttonIcon>

    <x-slot:breadcrumb>
        <x-ui::breadcrumb.item href="{{ route('admin.dashboard') }}" home>
            Dashboard
        </x-ui::breadcrumb.item>

        <x-ui::breadcrumb.item :active="true">
            Users
        </x-ui::breadcrumb.item>
    </x-slot:breadcrumb>
</x-ui::breadcrumb.with-button>
```