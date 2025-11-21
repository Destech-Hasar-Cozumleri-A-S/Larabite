# Navbar Component

The Navbar component provides primary navigation positioned at the top of web pages. It supports logos, navigation links, dropdowns, mobile responsiveness with hamburger menu, and various styling options.

## Components

- `<x-ui.navbar>` - Main navbar container
- `<x-ui.navbar.brand>` - Logo and brand section
- `<x-ui.navbar.toggle>` - Mobile hamburger menu button
- `<x-ui.navbar.menu>` - Navigation links container
- `<x-ui.navbar.link>` - Individual navigation link
- `<x-ui.navbar.dropdown>` - Dropdown menu
- `<x-ui.navbar.dropdown-link>` - Link within dropdown

## Basic Usage

### Default Navbar

A basic responsive navbar with logo and links:

```blade
<x-ui.navbar>
    {{-- Brand/Logo --}}
    <x-ui.navbar.brand href="/" text="Flowbite" />

    {{-- Mobile Toggle --}}
    <x-ui.navbar.toggle target="navbar-menu" />

    {{-- Navigation Menu --}}
    <x-ui.navbar.menu id="navbar-menu">
        <x-ui.navbar.link href="/" :active="request()->is('/')">
            Home
        </x-ui.navbar.link>
        <x-ui.navbar.link href="/about" :active="request()->is('about')">
            About
        </x-ui.navbar.link>
        <x-ui.navbar.link href="/services" :active="request()->is('services*')">
            Services
        </x-ui.navbar.link>
        <x-ui.navbar.link href="/contact" :active="request()->is('contact')">
            Contact
        </x-ui.navbar.link>
    </x-ui.navbar.menu>
</x-ui.navbar>
```

### Navbar with Logo Image

```blade
<x-ui.navbar :sticky="true" :shadow="true">
    <x-ui.navbar.brand href="/" logo="/logo.svg" text="Flowbite" />

    <x-ui.navbar.toggle target="navbar-menu" />

    <x-ui.navbar.menu id="navbar-menu">
        <x-ui.navbar.link href="/">Home</x-ui.navbar.link>
        <x-ui.navbar.link href="/services">Services</x-ui.navbar.link>
        <x-ui.navbar.link href="/about">About</x-ui.navbar.link>
    </x-ui.navbar.menu>
</x-ui.navbar>
```

### Sticky Navbar

Keep navbar visible while scrolling:

```blade
<x-ui.navbar :sticky="true" :border="true">
    <x-ui.navbar.brand href="/" text="My App" />

    <x-ui.navbar.toggle target="navbar-menu" />

    <x-ui.navbar.menu id="navbar-menu">
        <x-ui.navbar.link href="/dashboard">Dashboard</x-ui.navbar.link>
        <x-ui.navbar.link href="/profile">Profile</x-ui.navbar.link>
    </x-ui.navbar.menu>
</x-ui.navbar>
```

### Fixed Navbar

Fix navbar to top of viewport:

```blade
<x-ui.navbar :fixed="true" :shadow="true">
    <x-ui.navbar.brand href="/" text="My App" />

    <x-ui.navbar.toggle target="navbar-menu" />

    <x-ui.navbar.menu id="navbar-menu">
        {{-- Links --}}
    </x-ui.navbar.menu>
</x-ui.navbar>

{{-- Add padding to body to prevent content from hiding under fixed navbar --}}
<div class="pt-16">
    {{-- Your page content --}}
</div>
```

## Navbar with Dropdown

Add dropdown menus for complex navigation:

```blade
<x-ui.navbar>
    <x-ui.navbar.brand href="/" text="Flowbite" />

    <x-ui.navbar.toggle target="navbar-menu" />

    <x-ui.navbar.menu id="navbar-menu">
        <x-ui.navbar.link href="/">Home</x-ui.navbar.link>

        <x-ui.navbar.dropdown label="Services">
            <x-ui.navbar.dropdown-link href="/services/grooming">
                Grooming
            </x-ui.navbar.dropdown-link>
            <x-ui.navbar.dropdown-link href="/services/veterinary">
                Veterinary
            </x-ui.navbar.dropdown-link>
            <x-ui.navbar.dropdown-link href="/services/training">
                Training
            </x-ui.navbar.dropdown-link>
            <x-ui.navbar.dropdown-link href="/services/boarding">
                Boarding
            </x-ui.navbar.dropdown-link>
        </x-ui.navbar.dropdown>

        <x-ui.navbar.link href="/about">About</x-ui.navbar.link>
        <x-ui.navbar.link href="/contact">Contact</x-ui.navbar.link>
    </x-ui.navbar.menu>
</x-ui.navbar>
```

## Props

### Navbar Container (`ui.navbar`)

| Prop | Type | Default | Description |
|------|------|---------|-------------|
| `fixed` | boolean | `false` | Fix navbar to top of viewport |
| `sticky` | boolean | `false` | Navbar sticks to top when scrolling |
| `border` | boolean | `true` | Show bottom border |
| `shadow` | boolean | `false` | Add shadow effect |
| `transparent` | boolean | `false` | Remove background color |

### Navbar Brand (`ui.navbar.brand`)

| Prop | Type | Default | Description |
|------|------|---------|-------------|
| `href` | string | `'/'` | Link destination |
| `logo` | string | `null` | Logo image URL |
| `text` | string | `null` | Brand text to display |

### Navbar Toggle (`ui.navbar.toggle`)

| Prop | Type | Default | Description |
|------|------|---------|-------------|
| `target` | string | `'navbar-default'` | ID of menu to toggle |

### Navbar Menu (`ui.navbar.menu`)

| Prop | Type | Default | Description |
|------|------|---------|-------------|
| `id` | string | `'navbar-default'` | Unique menu identifier |

### Navbar Link (`ui.navbar.link`)

| Prop | Type | Default | Description |
|------|------|---------|-------------|
| `href` | string | `'#'` | Link destination URL |
| `active` | boolean | `false` | Mark link as active/current |

### Navbar Dropdown (`ui.navbar.dropdown`)

| Prop | Type | Default | Description |
|------|------|---------|-------------|
| `label` | string | `'Menu'` | Dropdown button text |
| `id` | string | auto-generated | Unique dropdown identifier |

### Navbar Dropdown Link (`ui.navbar.dropdown-link`)

| Prop | Type | Default | Description |
|------|------|---------|-------------|
| `href` | string | `'#'` | Link destination URL |

## Real-World Examples

### E-commerce Navbar

```blade
<x-ui.navbar :sticky="true" :shadow="true">
    {{-- Logo --}}
    <x-ui.navbar.brand href="/" logo="/logo.svg" text="PetShop" />

    {{-- Mobile Toggle --}}
    <x-ui.navbar.toggle target="main-nav" />

    {{-- Main Navigation --}}
    <x-ui.navbar.menu id="main-nav">
        <x-ui.navbar.link href="/" :active="request()->is('/')">
            Home
        </x-ui.navbar.link>

        <x-ui.navbar.dropdown label="Shop">
            <x-ui.navbar.dropdown-link href="/shop/dogs">
                For Dogs
            </x-ui.navbar.dropdown-link>
            <x-ui.navbar.dropdown-link href="/shop/cats">
                For Cats
            </x-ui.navbar.dropdown-link>
            <x-ui.navbar.dropdown-link href="/shop/birds">
                For Birds
            </x-ui.navbar.dropdown-link>
        </x-ui.navbar.dropdown>

        <x-ui.navbar.dropdown label="Services">
            <x-ui.navbar.dropdown-link href="/services/grooming">
                Grooming
            </x-ui.navbar.dropdown-link>
            <x-ui.navbar.dropdown-link href="/services/vet">
                Veterinary
            </x-ui.navbar.dropdown-link>
            <x-ui.navbar.dropdown-link href="/services/training">
                Training
            </x-ui.navbar.dropdown-link>
        </x-ui.navbar.dropdown>

        <x-ui.navbar.link href="/deals" :active="request()->is('deals')">
            Deals
        </x-ui.navbar.link>

        <x-ui.navbar.link href="/contact" :active="request()->is('contact')">
            Contact
        </x-ui.navbar.link>
    </x-ui.navbar.menu>

    {{-- Right Side Actions --}}
    <div class="flex items-center space-x-3 md:space-x-4">
        <a href="/cart" class="text-gray-700 hover:text-blue-600 dark:text-gray-300">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"/>
            </svg>
        </a>

        @auth
            <x-ui.dropdown>
                <x-slot:trigger>
                    <x-ui.avatar src="{{ auth()->user()->avatar }}" size="sm" />
                </x-slot:trigger>

                <x-ui.dropdown.link href="/profile">Profile</x-ui.dropdown.link>
                <x-ui.dropdown.link href="/orders">Orders</x-ui.dropdown.link>
                <x-ui.dropdown.divider />
                <x-ui.dropdown.link href="/logout">Logout</x-ui.dropdown.link>
            </x-ui.dropdown>
        @else
            <x-ui.button href="/login" variant="light" size="sm">
                Login
            </x-ui.button>
            <x-ui.button href="/register" variant="primary" size="sm">
                Sign Up
            </x-ui.button>
        @endauth
    </div>
</x-ui.navbar>
```

### Dashboard Navbar

```blade
<x-ui.navbar :sticky="true" :border="true">
    <x-ui.navbar.brand href="/dashboard" text="Admin Panel" />

    <x-ui.navbar.toggle target="dashboard-nav" />

    <x-ui.navbar.menu id="dashboard-nav">
        <x-ui.navbar.link href="/dashboard" :active="request()->is('dashboard')">
            Dashboard
        </x-ui.navbar.link>

        <x-ui.navbar.link href="/pets" :active="request()->is('pets*')">
            Pets
        </x-ui.navbar.link>

        <x-ui.navbar.link href="/services" :active="request()->is('services*')">
            Services
        </x-ui.navbar.link>

        <x-ui.navbar.link href="/users" :active="request()->is('users*')">
            Users
        </x-ui.navbar.link>

        <x-ui.navbar.dropdown label="Settings">
            <x-ui.navbar.dropdown-link href="/settings/general">
                General
            </x-ui.navbar.dropdown-link>
            <x-ui.navbar.dropdown-link href="/settings/security">
                Security
            </x-ui.navbar.dropdown-link>
            <x-ui.navbar.dropdown-link href="/settings/billing">
                Billing
            </x-ui.navbar.dropdown-link>
        </x-ui.navbar.dropdown>
    </x-ui.navbar.menu>

    {{-- User Profile --}}
    <div class="flex items-center">
        <span class="hidden md:block mr-3 text-sm text-gray-700 dark:text-gray-300">
            {{ auth()->user()->name }}
        </span>
        <x-ui.avatar src="{{ auth()->user()->avatar }}" size="sm" />
    </div>
</x-ui.navbar>
```

### Marketing Site Navbar

```blade
<x-ui.navbar :transparent="true" class="absolute">
    <x-ui.navbar.brand href="/" text="StartupName" />

    <x-ui.navbar.toggle target="marketing-nav" />

    <x-ui.navbar.menu id="marketing-nav">
        <x-ui.navbar.link href="/#features">
            Features
        </x-ui.navbar.link>

        <x-ui.navbar.link href="/#pricing">
            Pricing
        </x-ui.navbar.link>

        <x-ui.navbar.link href="/blog">
            Blog
        </x-ui.navbar.link>

        <x-ui.navbar.dropdown label="Company">
            <x-ui.navbar.dropdown-link href="/about">
                About Us
            </x-ui.navbar.dropdown-link>
            <x-ui.navbar.dropdown-link href="/team">
                Team
            </x-ui.navbar.dropdown-link>
            <x-ui.navbar.dropdown-link href="/careers">
                Careers
            </x-ui.navbar.dropdown-link>
            <x-ui.navbar.dropdown-link href="/press">
                Press Kit
            </x-ui.navbar.dropdown-link>
        </x-ui.navbar.dropdown>
    </x-ui.navbar.menu>

    <div class="flex items-center space-x-3">
        <x-ui.button href="/login" variant="light">
            Sign In
        </x-ui.button>
        <x-ui.button href="/register" variant="primary">
            Get Started
        </x-ui.button>
    </div>
</x-ui.navbar>
```

### Navbar with Search

```blade
<x-ui.navbar :sticky="true">
    <x-ui.navbar.brand href="/" logo="/logo.svg" text="Flowbite" />

    {{-- Search Bar (Desktop) --}}
    <div class="hidden md:block md:flex-1 md:mx-6">
        <x-ui.form.search-input
            placeholder="Search pets, services..."
            name="q"
        />
    </div>

    {{-- Mobile Toggle --}}
    <x-ui.navbar.toggle target="main-nav" />

    {{-- Navigation --}}
    <x-ui.navbar.menu id="main-nav">
        <x-ui.navbar.link href="/">Home</x-ui.navbar.link>
        <x-ui.navbar.link href="/services">Services</x-ui.navbar.link>
        <x-ui.navbar.link href="/about">About</x-ui.navbar.link>
    </x-ui.navbar.menu>

    {{-- User Actions --}}
    <div class="flex items-center space-x-3">
        <button class="md:hidden p-2">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
            </svg>
        </button>

        @auth
            <x-ui.avatar src="{{ auth()->user()->avatar }}" />
        @else
            <x-ui.button href="/login" variant="primary" size="sm">
                Login
            </x-ui.button>
        @endauth
    </div>
</x-ui.navbar>
```

## Livewire Integration

### Wire Navigate

Use Livewire's wire:navigate for SPA-like navigation:

```blade
<x-ui.navbar>
    <x-ui.navbar.brand href="/" text="My App" wire:navigate />

    <x-ui.navbar.toggle target="nav-menu" />

    <x-ui.navbar.menu id="nav-menu">
        <x-ui.navbar.link href="/" wire:navigate>
            Home
        </x-ui.navbar.link>
        <x-ui.navbar.link href="/dashboard" wire:navigate>
            Dashboard
        </x-ui.navbar.link>
    </x-ui.navbar.menu>
</x-ui.navbar>
```

### Dynamic Active State

```blade
<x-ui.navbar.link
    href="/pets"
    :active="request()->is('pets*')"
    wire:navigate
>
    Pets
</x-ui.navbar.link>
```

## Accessibility

The Navbar component includes several accessibility features:

1. **Semantic HTML**: Uses `<nav>` element for proper document structure
2. **ARIA Attributes**: `aria-current="page"` marks active links
3. **Screen Reader Support**: "Open main menu" label with `sr-only`
4. **Keyboard Navigation**: Full keyboard support for all interactive elements
5. **Focus Management**: Visible focus indicators
6. **Mobile Accessibility**: Touch-friendly targets (minimum 44x44px)

## Best Practices

### Do's

- Keep navigation simple and focused
- Use descriptive link labels
- Indicate current page with active state
- Provide mobile-friendly hamburger menu
- Test on various screen sizes
- Use sticky or fixed positioning sparingly
- Limit dropdown menu depth to 2 levels
- Make logo clickable (link to home)

### Don'ts

- Don't overcrowd navbar with too many links
- Don't use more than 7 main navigation items
- Don't forget mobile responsiveness
- Don't use tiny click targets on mobile
- Don't hide important actions in dropdowns
- Don't use auto-expanding dropdowns (use click)
- Don't forget to mark active page

## Dark Mode

The Navbar component automatically adapts to dark mode with appropriate color adjustments for:
- Background colors
- Text colors
- Border colors
- Hover states
- Dropdown backgrounds

## Browser Compatibility

The Navbar component works across all modern browsers:
- Chrome/Edge (latest)
- Firefox (latest)
- Safari (latest)
- Opera (latest)

Requires Alpine.js for dropdown functionality.

## Related Components

- [Mega Menu](mega-menu.md) - Complex navigation with grid layouts
- [Dropdown](dropdown.md) - Standalone dropdown menus
- [Button](button.md) - CTA buttons in navbar
- [Avatar](avatar.md) - User profile images
- [Breadcrumb](breadcrumb.md) - Secondary navigation

## Tips & Tricks

### Auto-detect Active State

```blade
<x-ui.navbar.link
    href="/services"
    :active="request()->is('services*')"
>
    Services
</x-ui.navbar.link>
```

### Custom Brand Content

```blade
<x-ui.navbar.brand href="/">
    <img src="/logo.svg" class="h-8" alt="Logo" />
    <div>
        <div class="font-bold">Flowbite</div>
        <div class="text-xs text-gray-500">Pet Care Platform</div>
    </div>
</x-ui.navbar.brand>
```

### Notification Badge

```blade
<x-ui.navbar.link href="/notifications" class="relative">
    Notifications
    <x-ui.indicator.count :count="5" position="top-right" />
</x-ui.navbar.link>
```

### Responsive Utilities

```blade
{{-- Show on desktop only --}}
<div class="hidden md:flex items-center space-x-4">
    {{-- Desktop actions --}}
</div>

{{-- Show on mobile only --}}
<div class="md:hidden">
    {{-- Mobile actions --}}
</div>
```

---

**Component Location:** `resources/views/components/ui/navbar.blade.php`
**Documentation:** `docs/components/ui/navbar.md`
**Flowbite Reference:** [Navbar Component](https://flowbite.com/docs/components/navbar/)
**Dependencies:** Alpine.js for dropdown functionality
