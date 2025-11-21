# Drawer Components

Off-canvas panel (sidebar) bileşenleri. Mobil menüler, filtreler, settings panelleri ve navigasyon için kullanılır. Alpine.js ile state management, smooth transitions ve backdrop desteği sunar.

## 📦 Available Components

- **Drawer** - Base drawer component (left, right, top, bottom)
- **Drawer Trigger** - Button to open drawer
- **Drawer Navigation** - Navigation menu variant
- **Drawer Nav Item** - Navigation item component

---

## Base Drawer Component

Temel drawer bileşeni. 4 farklı pozisyon desteği ile off-canvas panel.

**Location:** `resources/views/components/ui/drawer.blade.php`

### Features

- 4 pozisyon: left, right, top, bottom
- Backdrop overlay desteği
- Body scroll control
- Close button
- Smooth transitions (Alpine.js)
- Keyboard support (ESC key)
- Auto-close on backdrop click
- Width variants (default, large, full)
- Dark mode support
- Accessible (ARIA attributes)

### Usage

```blade
{{-- Basic Left Drawer --}}
<x-ui.drawer id="my-drawer" title="Menu">
    <p>Drawer content goes here</p>
</x-ui.drawer>

{{-- Trigger Button --}}
<x-ui.button @click="openDrawer('my-drawer')">
    Open Drawer
</x-ui.button>

{{-- Right Position --}}
<x-ui.drawer id="right-drawer" position="right" title="Filters">
    <div class="space-y-4">
        <x-ui.form.checkbox label="Option 1" />
        <x-ui.form.checkbox label="Option 2" />
        <x-ui.form.checkbox label="Option 3" />
    </div>
</x-ui.drawer>

{{-- Top Position --}}
<x-ui.drawer id="top-drawer" position="top" title="Notification">
    <p>This drawer slides from the top</p>
</x-ui.drawer>

{{-- Bottom Position --}}
<x-ui.drawer id="bottom-drawer" position="bottom" title="Actions">
    <div class="flex gap-2">
        <x-ui.button>Action 1</x-ui.button>
        <x-ui.button variant="secondary">Action 2</x-ui.button>
    </div>
</x-ui.drawer>

{{-- Without Backdrop --}}
<x-ui.drawer id="no-backdrop" :backdrop="false">
    <p>Drawer without backdrop overlay</p>
</x-ui.drawer>

{{-- With Body Scrolling Enabled --}}
<x-ui.drawer id="scrollable" :bodyScrolling="true">
    <p>Page can scroll while drawer is open</p>
</x-ui.drawer>

{{-- Without Close Button --}}
<x-ui.drawer id="no-close" :closeButton="false">
    <p>No close button - must close programmatically</p>
</x-ui.drawer>

{{-- Large Width --}}
<x-ui.drawer id="large-drawer" width="large">
    <p>Wider drawer panel</p>
</x-ui.drawer>

{{-- Full Width (Responsive) --}}
<x-ui.drawer id="full-drawer" width="full">
    <p>Full width on mobile, fixed width on desktop</p>
</x-ui.drawer>

{{-- Custom Styling --}}
<x-ui.drawer id="custom-drawer" class="shadow-2xl">
    <div class="bg-gradient-to-b from-blue-50 to-white p-6">
        <h3 class="text-2xl font-bold mb-4">Custom Styled Drawer</h3>
        <p>Add your own classes for custom styling</p>
    </div>
</x-ui.drawer>
```

### Props

| Prop | Type | Default | Options | Description |
|------|------|---------|---------|-------------|
| `id` | string | auto | - | Unique drawer ID |
| `position` | string | 'left' | left, right, top, bottom | Drawer position |
| `backdrop` | bool | true | - | Show backdrop overlay |
| `bodyScrolling` | bool | false | - | Allow body scroll when open |
| `closeButton` | bool | true | - | Show close button |
| `title` | string | null | - | Drawer title |
| `width` | string | 'default' | default, large, full | Drawer width (left/right only) |

### Opening/Closing Programmatically

```blade
{{-- Using Alpine.js --}}
<button @click="openDrawer('my-drawer')">Open</button>
<button @click="closeDrawer('my-drawer')">Close</button>

{{-- Using JavaScript --}}
<button onclick="openDrawer('my-drawer')">Open</button>
<button onclick="closeDrawer('my-drawer')">Close</button>

{{-- With Livewire --}}
<button wire:click="$dispatch('open-drawer-my-drawer')">Open</button>
<button wire:click="$dispatch('close-drawer-my-drawer')">Close</button>
```

---

## Drawer Trigger Component

Drawer'ı açmak için özel button bileşeni.

**Location:** `resources/views/components/ui/drawer/trigger.blade.php`

### Usage

```blade
{{-- Basic Trigger --}}
<x-ui.drawer.trigger target="my-drawer">
    Open Menu
</x-ui.drawer.trigger>

{{-- Icon Only --}}
<x-ui.drawer.trigger target="side-menu" :icon="true" />

{{-- Custom Icon --}}
<x-ui.drawer.trigger target="filters">
    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
        <path d="M3 3a1 1 0 011-1h12a1 1 0 011 1v3a1 1 0 01-.293.707L12 11.414V15a1 1 0 01-.293.707l-2 2A1 1 0 018 17v-5.586L3.293 6.707A1 1 0 013 6V3z"/>
    </svg>
    Filters
</x-ui.drawer.trigger>

{{-- With Button Component --}}
<x-ui.button @click="openDrawer('settings-drawer')">
    Settings
</x-ui.button>
```

### Props

| Prop | Type | Default | Options | Description |
|------|------|---------|---------|-------------|
| `target` | string | required | - | Target drawer ID |
| `icon` | bool | true | - | Show default menu icon |

---

## Navigation Drawer

Navigasyon menüsü için özel drawer varyantı.

**Location:** `resources/views/components/ui/drawer/navigation.blade.php`

### Features

- Logo/brand display
- Navigation items support
- Active state handling
- Icon support
- Hierarchical menu structure
- Dark mode support

### Usage

```blade
{{-- Basic Navigation Drawer --}}
<x-ui.drawer.navigation
    id="nav-drawer"
    logo="/images/logo.svg"
    appName="Flowbite"
>
    <x-ui.drawer.nav-item href="/" :active="true">
        Home
    </x-ui.drawer.nav-item>
    <x-ui.drawer.nav-item href="/about">
        About
    </x-ui.drawer.nav-item>
    <x-ui.drawer.nav-item href="/services">
        Services
    </x-ui.drawer.nav-item>
    <x-ui.drawer.nav-item href="/contact">
        Contact
    </x-ui.drawer.nav-item>
</x-ui.drawer.navigation>

{{-- With Icons --}}
<x-ui.drawer.navigation
    id="app-nav"
    logo="/images/logo.svg"
    appName="My App"
>
    <x-ui.drawer.nav-item href="/dashboard" :active="true">
        <x-slot:icon>
            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20">
                <path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"/>
            </svg>
        </x-slot:icon>
        Dashboard
    </x-ui.drawer.nav-item>

    <x-ui.drawer.nav-item href="/users">
        <x-slot:icon>
            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20">
                <path d="M9 6a3 3 0 11-6 0 3 3 0 016 0zM17 6a3 3 0 11-6 0 3 3 0 016 0zM12.93 17c.046-.327.07-.66.07-1a6.97 6.97 0 00-1.5-4.33A5 5 0 0119 16v1h-6.07zM6 11a5 5 0 015 5v1H1v-1a5 5 0 015-5z"/>
            </svg>
        </x-slot:icon>
        Users
    </x-ui.drawer.nav-item>

    <x-ui.drawer.nav-item href="/settings">
        <x-slot:icon>
            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M11.49 3.17c-.38-1.56-2.6-1.56-2.98 0a1.532 1.532 0 01-2.286.948c-1.372-.836-2.942.734-2.106 2.106.54.886.061 2.042-.947 2.287-1.561.379-1.561 2.6 0 2.978a1.532 1.532 0 01.947 2.287c-.836 1.372.734 2.942 2.106 2.106a1.532 1.532 0 012.287.947c.379 1.561 2.6 1.561 2.978 0a1.533 1.533 0 012.287-.947c1.372.836 2.942-.734 2.106-2.106a1.533 1.533 0 01.947-2.287c1.561-.379 1.561-2.6 0-2.978a1.532 1.532 0 01-.947-2.287c.836-1.372-.734-2.942-2.106-2.106a1.532 1.532 0 01-2.287-.947zM10 13a3 3 0 100-6 3 3 0 000 6z" clip-rule="evenodd"/>
            </svg>
        </x-slot:icon>
        Settings
    </x-ui.drawer.nav-item>
</x-ui.drawer.navigation>

{{-- Grouped Navigation --}}
<x-ui.drawer.navigation id="grouped-nav" appName="Admin Panel">
    <div class="space-y-2">
        <p class="px-3 text-xs font-semibold text-gray-500 uppercase dark:text-gray-400">Main</p>
        <x-ui.drawer.nav-item href="/dashboard" :active="true">Dashboard</x-ui.drawer.nav-item>
        <x-ui.drawer.nav-item href="/analytics">Analytics</x-ui.drawer.nav-item>
    </div>

    <div class="space-y-2 mt-4 pt-4 border-t border-gray-200 dark:border-gray-700">
        <p class="px-3 text-xs font-semibold text-gray-500 uppercase dark:text-gray-400">Manage</p>
        <x-ui.drawer.nav-item href="/users">Users</x-ui.drawer.nav-item>
        <x-ui.drawer.nav-item href="/products">Products</x-ui.drawer.nav-item>
        <x-ui.drawer.nav-item href="/orders">Orders</x-ui.drawer.nav-item>
    </div>

    <div class="space-y-2 mt-4 pt-4 border-t border-gray-200 dark:border-gray-700">
        <p class="px-3 text-xs font-semibold text-gray-500 uppercase dark:text-gray-400">Account</p>
        <x-ui.drawer.nav-item href="/profile">Profile</x-ui.drawer.nav-item>
        <x-ui.drawer.nav-item href="/settings">Settings</x-ui.drawer.nav-item>
        <x-ui.drawer.nav-item href="/logout">Logout</x-ui.drawer.nav-item>
    </div>
</x-ui.drawer.navigation>
```

### Props (Navigation)

| Prop | Type | Default | Options | Description |
|------|------|---------|---------|-------------|
| `id` | string | auto | - | Unique drawer ID |
| `position` | string | 'left' | left, right | Drawer position |
| `logo` | string | null | - | Logo image URL |
| `logoAlt` | string | 'Logo' | - | Logo alt text |
| `appName` | string | null | - | Application name |

### Props (Nav Item)

| Prop | Type | Default | Options | Description |
|------|------|---------|---------|-------------|
| `href` | string | '#' | - | Navigation URL |
| `active` | bool | false | - | Active state |
| `icon` | string/slot | null | - | Icon SVG |

---

## Best Practices

### 1. Mobile Navigation

```blade
{{-- Mobile menu drawer --}}
<nav class="bg-white border-b border-gray-200 dark:bg-gray-800">
    <div class="flex items-center justify-between p-4">
        <img src="/logo.svg" alt="Logo" class="h-8">

        {{-- Mobile menu button --}}
        <x-ui.drawer.trigger target="mobile-menu" class="md:hidden">
            <span class="sr-only">Open menu</span>
        </x-ui.drawer.trigger>
    </div>
</nav>

<x-ui.drawer.navigation
    id="mobile-menu"
    logo="/logo.svg"
    appName="My App"
>
    <x-ui.drawer.nav-item href="/" :active="request()->is('/')">
        Home
    </x-ui.drawer.nav-item>
    <x-ui.drawer.nav-item href="/about" :active="request()->is('about')">
        About
    </x-ui.drawer.nav-item>
</x-ui.drawer.navigation>
```

### 2. Filter Panel

```blade
{{-- Filters drawer --}}
<x-ui.drawer id="filters-drawer" position="right" title="Filters">
    <form class="space-y-4">
        <div>
            <label class="block mb-2 text-sm font-medium">Category</label>
            <x-ui.form.select
                :options="[
                    'all' => 'All Categories',
                    'electronics' => 'Electronics',
                    'clothing' => 'Clothing',
                    'books' => 'Books',
                ]"
            />
        </div>

        <div>
            <label class="block mb-2 text-sm font-medium">Price Range</label>
            <x-ui.form.range min="0" max="1000" />
        </div>

        <div>
            <label class="block mb-2 text-sm font-medium">Brand</label>
            <x-ui.form.checkbox label="Brand A" />
            <x-ui.form.checkbox label="Brand B" />
            <x-ui.form.checkbox label="Brand C" />
        </div>

        <div class="flex gap-2">
            <x-ui.button type="submit" class="flex-1">
                Apply Filters
            </x-ui.button>
            <x-ui.button variant="secondary" @click="closeDrawer('filters-drawer')">
                Cancel
            </x-ui.button>
        </div>
    </form>
</x-ui.drawer>

<x-ui.button @click="openDrawer('filters-drawer')">
    <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
        <path d="M3 3a1 1 0 011-1h12a1 1 0 011 1v3a1 1 0 01-.293.707L12 11.414V15a1 1 0 01-.293.707l-2 2A1 1 0 018 17v-5.586L3.293 6.707A1 1 0 013 6V3z"/>
    </svg>
    Filters
</x-ui.button>
```

### 3. Settings Panel

```blade
<x-ui.drawer id="settings" position="right" title="Settings" width="large">
    <div class="space-y-6">
        <div>
            <h3 class="text-lg font-semibold mb-3">Appearance</h3>
            <x-ui.form.toggle label="Dark Mode" />
            <x-ui.form.toggle label="Compact View" class="mt-2" />
        </div>

        <div>
            <h3 class="text-lg font-semibold mb-3">Notifications</h3>
            <x-ui.form.toggle label="Email Notifications" />
            <x-ui.form.toggle label="Push Notifications" class="mt-2" />
            <x-ui.form.toggle label="SMS Notifications" class="mt-2" />
        </div>

        <div>
            <h3 class="text-lg font-semibold mb-3">Privacy</h3>
            <x-ui.form.toggle label="Profile Visibility" />
            <x-ui.form.toggle label="Show Online Status" class="mt-2" />
        </div>

        <div class="pt-4 border-t border-gray-200 dark:border-gray-700">
            <x-ui.button class="w-full">Save Settings</x-ui.button>
        </div>
    </div>
</x-ui.drawer>
```

### 4. Contact Form Drawer

```blade
<x-ui.drawer id="contact-form" position="bottom" title="Contact Us">
    <form class="space-y-4" wire:submit="sendMessage">
        <x-ui.form.input
            label="Name"
            name="name"
            :required="true"
            wire:model="name"
        />

        <x-ui.form.input
            label="Email"
            type="email"
            name="email"
            :required="true"
            wire:model="email"
        />

        <x-ui.form.textarea
            label="Message"
            name="message"
            rows="4"
            :required="true"
            wire:model="message"
        />

        <div class="flex gap-2">
            <x-ui.button type="submit" class="flex-1">
                Send Message
            </x-ui.button>
            <x-ui.button
                variant="secondary"
                type="button"
                @click="closeDrawer('contact-form')"
            >
                Cancel
            </x-ui.button>
        </div>
    </form>
</x-ui.drawer>
```

### 5. Shopping Cart Drawer

```blade
<x-ui.drawer id="cart" position="right" title="Shopping Cart">
    <div class="space-y-4">
        @foreach($cartItems as $item)
            <div class="flex gap-4 border-b border-gray-200 dark:border-gray-700 pb-4">
                <img src="{{ $item->image }}" alt="{{ $item->name }}" class="w-20 h-20 object-cover rounded">
                <div class="flex-1">
                    <h4 class="font-semibold">{{ $item->name }}</h4>
                    <p class="text-sm text-gray-600">${{ $item->price }}</p>
                    <div class="flex items-center gap-2 mt-2">
                        <button wire:click="decreaseQuantity({{ $item->id }})" class="p-1">-</button>
                        <span>{{ $item->quantity }}</span>
                        <button wire:click="increaseQuantity({{ $item->id }})" class="p-1">+</button>
                    </div>
                </div>
                <button wire:click="removeItem({{ $item->id }})" class="text-red-600">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"/>
                    </svg>
                </button>
            </div>
        @endforeach

        <div class="pt-4 border-t border-gray-200 dark:border-gray-700">
            <div class="flex justify-between text-lg font-semibold mb-4">
                <span>Total:</span>
                <span>${{ $total }}</span>
            </div>
            <x-ui.button href="/checkout" class="w-full">
                Proceed to Checkout
            </x-ui.button>
        </div>
    </div>
</x-ui.drawer>
```

### 6. Livewire Integration

```blade
{{-- Livewire Component --}}
<div>
    <x-ui.button wire:click="$dispatch('open-drawer-user-profile')">
        View Profile
    </x-ui.button>

    <x-ui.drawer id="user-profile" title="User Profile">
        <div class="space-y-4">
            <div class="text-center">
                <img src="{{ $user->avatar }}" alt="{{ $user->name }}" class="w-24 h-24 rounded-full mx-auto mb-4">
                <h3 class="text-xl font-bold">{{ $user->name }}</h3>
                <p class="text-gray-600">{{ $user->email }}</p>
            </div>

            <div class="pt-4 border-t">
                <x-ui.button wire:click="editProfile" class="w-full">
                    Edit Profile
                </x-ui.button>
            </div>
        </div>
    </x-ui.drawer>
</div>
```

---

## Accessibility

### Keyboard Support

- **ESC key**: Closes the drawer
- **Tab navigation**: Focus management within drawer
- **ARIA attributes**: Proper labeling for screen readers

### Implementation

```blade
<x-ui.drawer
    id="accessible-drawer"
    title="Accessible Drawer"
    aria-label="Main navigation"
>
    {{-- Content with proper heading hierarchy --}}
    <h2 class="text-lg font-semibold mb-4">Menu</h2>

    <nav aria-label="Main navigation">
        <x-ui.drawer.nav-item href="/">Home</x-ui.drawer.nav-item>
        <x-ui.drawer.nav-item href="/about">About</x-ui.drawer.nav-item>
    </nav>
</x-ui.drawer>
```

---

## Performance Tips

### 1. Lazy Loading Content

```blade
<x-ui.drawer id="heavy-content" title="Products">
    <div wire:init="loadProducts">
        @if($productsLoaded)
            @foreach($products as $product)
                {{-- Product items --}}
            @endforeach
        @else
            <x-ui.spinner />
        @endif
    </div>
</x-ui.drawer>
```

### 2. Conditional Rendering

```blade
{{-- Only render drawer when needed --}}
@if($showDrawer)
    <x-ui.drawer id="conditional" title="Dynamic Content">
        {{-- Heavy content only loaded when needed --}}
    </x-ui.drawer>
@endif
```

---

## Related Components

- [Modal](../modal/README.md) - Dialog overlays
- [Dropdown](dropdown.md) - Dropdown menus
- [Bottom Nav](bottom-nav.md) - Mobile navigation

---

## Tips & Tricks

### Nested Drawers

```blade
{{-- Main drawer --}}
<x-ui.drawer id="main-drawer" title="Main Menu">
    <x-ui.button @click="openDrawer('sub-drawer')">
        Open Submenu
    </x-ui.button>
</x-ui.drawer>

{{-- Sub drawer --}}
<x-ui.drawer id="sub-drawer" position="right" title="Submenu">
    <p>Nested drawer content</p>
</x-ui.drawer>
```

### Custom Animations

```blade
{{-- Add custom transition classes --}}
<x-ui.drawer
    id="custom-animation"
    x-transition:enter="transition ease-out duration-500"
    x-transition:enter-start="opacity-0 scale-95"
    x-transition:enter-end="opacity-100 scale-100"
>
    {{-- Content --}}
</x-ui.drawer>
```
