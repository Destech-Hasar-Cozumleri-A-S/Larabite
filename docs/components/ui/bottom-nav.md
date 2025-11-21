# Bottom Navigation

Fixed bottom navigation components for mobile applications.

## Components

- **Bottom Nav** - `resources/views/components/ui/bottom-nav.blade.php`
- **Bottom Nav Item** - `resources/views/components/ui/bottom-nav/item.blade.php`
- **Bottom Nav App Bar** - `resources/views/components/ui/bottom-nav/app-bar.blade.php`
- **Bottom Nav Icon Button** - `resources/views/components/ui/bottom-nav/icon-button.blade.php`
- **Bottom Nav Pagination** - `resources/views/components/ui/bottom-nav/pagination.blade.php`
- **Bottom Nav Control Bar** - `resources/views/components/ui/bottom-nav/control-bar.blade.php`
- **Control Button** - `resources/views/components/ui/bottom-nav/control-button.blade.php`

## Features

- Fixed bottom positioning
- 4-column grid layout (default)
- Icon + label combinations
- Border options
- Livewire support
- Dark mode compatible
- Central CTA button support (app bar)
- Pagination controls
- Media/meeting controls
- Tooltip support

## Usage

### Default Bottom Navigation

```blade
<x-ui.bottom-nav border>
    <x-ui.bottom-nav.item href="{{ route('home') }}" label="Home" :active="request()->routeIs('home')">
        <x-slot:icon>
            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                <path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"/>
            </svg>
        </x-slot:icon>
    </x-ui.bottom-nav.item>

    <x-ui.bottom-nav.item href="{{ route('wallet') }}" label="Wallet">
        <x-slot:icon>
            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                <path d="M4 4a2 2 0 00-2 2v1h16V6a2 2 0 00-2-2H4z"/>
                <path fill-rule="evenodd" d="M18 9H2v5a2 2 0 002 2h12a2 2 0 002-2V9zM4 13a1 1 0 011-1h1a1 1 0 110 2H5a1 1 0 01-1-1zm5-1a1 1 0 100 2h1a1 1 0 100-2H9z" clip-rule="evenodd"/>
            </svg>
        </x-slot:icon>
    </x-ui.bottom-nav.item>

    <x-ui.bottom-nav.item wire="openSettings" label="Settings">
        <x-slot:icon>
            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M11.49 3.17c-.38-1.56-2.6-1.56-2.98 0a1.532 1.532 0 01-2.286.948c-1.372-.836-2.942.734-2.106 2.106.54.886.061 2.042-.947 2.287-1.561.379-1.561 2.6 0 2.978a1.532 1.532 0 01.947 2.287c-.836 1.372.734 2.942 2.106 2.106a1.532 1.532 0 012.287.947c.379 1.561 2.6 1.561 2.978 0a1.533 1.533 0 012.287-.947c1.372.836 2.942-.734 2.106-2.106a1.533 1.533 0 01.947-2.287c1.561-.379 1.561-2.6 0-2.978a1.532 1.532 0 01-.947-2.287c.836-1.372-.734-2.942-2.106-2.106a1.532 1.532 0 01-2.287-.947zM10 13a3 3 0 100-6 3 3 0 000 6z" clip-rule="evenodd"/>
            </svg>
        </x-slot:icon>
    </x-ui.bottom-nav.item>

    <x-ui.bottom-nav.item href="{{ route('profile') }}" label="Profile">
        <x-slot:icon>
            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"/>
            </svg>
        </x-slot:icon>
    </x-ui.bottom-nav.item>
</x-ui.bottom-nav>
```

### With Border Between Items

```blade
<x-ui.bottom-nav>
    <x-ui.bottom-nav.item href="{{ route('home') }}" label="Home" :showBorder="true">
        <x-slot:icon><!-- SVG --></x-slot:icon>
    </x-ui.bottom-nav.item>

    <x-ui.bottom-nav.item href="{{ route('search') }}" label="Search" :showBorder="true">
        <x-slot:icon><!-- SVG --></x-slot:icon>
    </x-ui.bottom-nav.item>
</x-ui.bottom-nav>
```

### App Bar with Central CTA

```blade
<x-ui.bottom-nav.app-bar
    ctaLabel="Create new"
    ctaHref="{{ route('posts.create') }}"
>
    <x-ui.bottom-nav.icon-button
        href="{{ route('home') }}"
        label="Home"
        :active="true"
    >
        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20">
            <path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"/>
        </svg>
    </x-ui.bottom-nav.icon-button>

    <x-ui.bottom-nav.icon-button href="{{ route('wallet') }}" label="Wallet">
        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20"><!-- SVG --></svg>
    </x-ui.bottom-nav.icon-button>

    {{-- CTA button will be automatically inserted here --}}

    <x-ui.bottom-nav.icon-button href="{{ route('settings') }}" label="Settings">
        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20"><!-- SVG --></svg>
    </x-ui.bottom-nav.icon-button>

    <x-ui.bottom-nav.icon-button href="{{ route('profile') }}" label="Profile">
        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20"><!-- SVG --></svg>
    </x-ui.bottom-nav.icon-button>
</x-ui.bottom-nav.app-bar>
```

### Custom CTA Button

```blade
<x-ui.bottom-nav.app-bar>
    <x-slot:cta>
        <div class="flex items-center justify-center">
            <button class="w-12 h-12 bg-gradient-to-r from-purple-500 to-pink-500 rounded-full">
                <svg class="w-5 h-5 text-white mx-auto" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                </svg>
            </button>
        </div>
    </x-slot:cta>

    <!-- Navigation items -->
</x-ui.bottom-nav.app-bar>
```

### Icon Button with Tooltip

```blade
<x-ui.bottom-nav.icon-button
    href="{{ route('home') }}"
    label="Home"
    tooltip="Go to home"
    :active="true"
>
    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20">
        <path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"/>
    </svg>
</x-ui.bottom-nav.icon-button>
```

### Pagination Navigation

```blade
<x-ui.bottom-nav.pagination
    :currentPage="$currentPage"
    :totalPages="$totalPages"
    prevHref="{{ route('gallery.index', ['page' => $currentPage - 1]) }}"
    nextHref="{{ route('gallery.index', ['page' => $currentPage + 1]) }}"
>
    <x-ui.bottom-nav.icon-button href="{{ route('search') }}" label="Search">
        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><!-- SVG --></svg>
    </x-ui.bottom-nav.icon-button>

    <x-ui.bottom-nav.icon-button href="{{ route('bookmarks') }}" label="Bookmarks">
        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><!-- SVG --></svg>
    </x-ui.bottom-nav.icon-button>

    <x-ui.bottom-nav.icon-button href="{{ route('documents') }}" label="Documents">
        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><!-- SVG --></svg>
    </x-ui.bottom-nav.icon-button>
</x-ui.bottom-nav.pagination>
```

### With Livewire Pagination

```blade
<x-ui.bottom-nav.pagination
    :currentPage="$page"
    :totalPages="$total"
    prevWire="previousPage"
    nextWire="nextPage"
>
    <!-- Content -->
</x-ui.bottom-nav.pagination>
```

### Video Player Controls

```blade
<x-ui.bottom-nav.control-bar :columns="5">
    <x-ui.bottom-nav.control-button label="Shuffle">
        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><!-- SVG --></svg>
    </x-ui.bottom-nav.control-button>

    <x-ui.bottom-nav.control-button label="Previous">
        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><!-- SVG --></svg>
    </x-ui.bottom-nav.control-button>

    <x-ui.bottom-nav.control-button wire="togglePlay" :active="$isPlaying">
        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><!-- Play/Pause SVG --></svg>
    </x-ui.bottom-nav.control-button>

    <x-ui.bottom-nav.control-button label="Next">
        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><!-- SVG --></svg>
    </x-ui.bottom-nav.control-button>

    <x-ui.bottom-nav.control-button label="Volume">
        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><!-- SVG --></svg>
    </x-ui.bottom-nav.control-button>
</x-ui.bottom-nav.control-bar>
```

### Meeting Controls

```blade
<x-ui.bottom-nav.control-bar :columns="3">
    <x-ui.bottom-nav.control-button wire="toggleMic" :active="$micOn" size="sm">
        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><!-- Mic SVG --></svg>
    </x-ui.bottom-nav.control-button>

    <x-ui.bottom-nav.control-button wire="toggleCamera" :active="$cameraOn" size="sm">
        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><!-- Camera SVG --></svg>
    </x-ui.bottom-nav.control-button>

    <x-ui.bottom-nav.control-button wire="leaveMeeting" size="sm">
        <svg class="w-5 h-5 text-red-600" fill="currentColor" viewBox="0 0 20 20"><!-- Leave SVG --></svg>
    </x-ui.bottom-nav.control-button>
</x-ui.bottom-nav.control-bar>
```

## Props

### Bottom Nav Component

| Prop | Type | Default | Description |
|------|------|---------|-------------|
| `border` | boolean | false | Show top border |

### Bottom Nav Item Props

| Prop | Type | Default | Description |
|------|------|---------|-------------|
| `href` | string | '#' | Link URL |
| `active` | boolean | false | Active state |
| `label` | string | required | Label text |
| `showBorder` | boolean | false | Show side border |
| `wire` | string | optional | Livewire method |
| `icon` | slot | optional | Icon SVG |

### App Bar Props

| Prop | Type | Default | Description |
|------|------|---------|-------------|
| `ctaLabel` | string | 'Create' | CTA button screen reader label |
| `ctaHref` | string | '#' | CTA button link |
| `ctaWire` | string | optional | CTA Livewire method |
| `cta` | slot | optional | Custom CTA button |

### Icon Button Props

| Prop | Type | Default | Description |
|------|------|---------|-------------|
| `href` | string | '#' | Link URL |
| `active` | boolean | false | Active state |
| `label` | string | required | Screen reader label |
| `tooltip` | string | optional | Tooltip text |
| `wire` | string | optional | Livewire method |

### Pagination Props

| Prop | Type | Default | Description |
|------|------|---------|-------------|
| `currentPage` | int | 1 | Current page number |
| `totalPages` | int | 1 | Total number of pages |
| `prevHref` | string | '#' | Previous page link |
| `nextHref` | string | '#' | Next page link |
| `prevWire` | string | optional | Previous page Livewire method |
| `nextWire` | string | optional | Next page Livewire method |

### Control Bar Props

| Prop | Type | Default | Description |
|------|------|---------|-------------|
| `columns` | int | 5 | Grid column count (1-6) |

### Control Button Props

| Prop | Type | Default | Description |
|------|------|---------|-------------|
| `active` | boolean | false | Active state |
| `wire` | string | optional | Livewire method |
| `href` | string | optional | Link URL |
| `label` | string | required | Screen reader label |
| `size` | string | 'md' | Button size: sm, md, lg |

## Best Practices

1. **Mobile First**: Bottom navigation is primarily for mobile; hide on desktop with responsive classes

2. **Item Count**: Limit to 3-5 items for optimal usability

3. **Active State**: Always indicate the currently active section

4. **Icons**: Use clear, recognizable icons with descriptive labels

5. **Accessibility**: Always provide labels for screen readers

6. **Fixed Position**: Bottom nav uses fixed positioning; ensure content has proper padding-bottom

7. **Z-Index**: Ensure proper z-index layering with other fixed elements

8. **CTA Button**: Place the most important action in the center for app bar layouts

9. **Touch Targets**: Ensure buttons are at least 44x44px for easy tapping

10. **Context**: Use appropriate variant (standard, app bar, pagination, controls) based on context

## Examples

### Social Media App

```blade
<x-ui.bottom-nav.app-bar ctaLabel="Create Post" ctaHref="{{ route('posts.create') }}">
    <x-ui.bottom-nav.icon-button href="{{ route('feed') }}" label="Feed" :active="true">
        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20"><!-- Home icon --></svg>
    </x-ui.bottom-nav.icon-button>

    <x-ui.bottom-nav.icon-button href="{{ route('search') }}" label="Search">
        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20"><!-- Search icon --></svg>
    </x-ui.bottom-nav.icon-button>

    <x-ui.bottom-nav.icon-button href="{{ route('notifications') }}" label="Notifications">
        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20"><!-- Bell icon --></svg>
    </x-ui.bottom-nav.icon-button>

    <x-ui.bottom-nav.icon-button href="{{ route('profile') }}" label="Profile">
        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20"><!-- User icon --></svg>
    </x-ui.bottom-nav.icon-button>
</x-ui.bottom-nav.app-bar>
```

### E-commerce App

```blade
<x-ui.bottom-nav border>
    <x-ui.bottom-nav.item href="{{ route('shop') }}" label="Shop" :active="true">
        <x-slot:icon>
            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><!-- Shop icon --></svg>
        </x-slot:icon>
    </x-ui.bottom-nav.item>

    <x-ui.bottom-nav.item href="{{ route('categories') }}" label="Categories">
        <x-slot:icon>
            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><!-- Grid icon --></svg>
        </x-slot:icon>
    </x-ui.bottom-nav.item>

    <x-ui.bottom-nav.item href="{{ route('cart') }}" label="Cart">
        <x-slot:icon>
            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><!-- Cart icon --></svg>
        </x-slot:icon>
    </x-ui.bottom-nav.item>

    <x-ui.bottom-nav.item href="{{ route('account') }}" label="Account">
        <x-slot:icon>
            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><!-- User icon --></svg>
        </x-slot:icon>
    </x-ui.bottom-nav.item>
</x-ui.bottom-nav>
```