# Mega Menu Component

The Mega Menu component provides a full-width or large dropdown navigation menu that displays multiple columns of links, ideal for websites with extensive navigation needs. It's perfect for e-commerce sites, corporate websites, and applications with complex navigation hierarchies.

## Components

- `<x-ui::mega-menu>` - Main dropdown container with column layout
- `<x-ui::mega-menu.trigger>` - Mobile hamburger menu button
- `<x-ui::mega-menu.column>` - Column section with optional title
- `<x-ui::mega-menu.link>` - Simple text link
- `<x-ui::mega-menu.item>` - Link with icon and description
- `<x-ui::mega-menu.cta>` - Call-to-action section with background

## Basic Usage

### Default Mega Menu

A basic mega menu with three columns of links:

```blade
<nav class="bg-white border-b border-gray-200 dark:bg-gray-800 dark:border-gray-700">
    <div class="max-w-screen-xl px-4 py-3 mx-auto">
        <div class="flex items-center">
            {{-- Logo --}}
            <a href="/" class="flex items-center">
                <span class="text-xl font-semibold">Flowbite</span>
            </a>

            {{-- Desktop Menu --}}
            <div class="hidden md:flex md:ml-6">
                <div class="relative" x-data="{ open: false }">
                    <button
                        @click="open = !open"
                        class="flex items-center px-3 py-2 text-gray-900 rounded hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700"
                    >
                        Services
                        <svg class="w-4 h-4 ml-1" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"/>
                        </svg>
                    </button>

                    <x-ui::mega-menu :columns="3">
                        <x-ui::mega-menu.column title="Pet Care">
                            <x-ui::mega-menu.link href="/grooming">Grooming</x-ui::mega-menu.link>
                            <x-ui::mega-menu.link href="/veterinary">Veterinary</x-ui::mega-menu.link>
                            <x-ui::mega-menu.link href="/training">Training</x-ui::mega-menu.link>
                            <x-ui::mega-menu.link href="/boarding">Boarding</x-ui::mega-menu.link>
                        </x-ui::mega-menu.column>

                        <x-ui::mega-menu.column title="Products">
                            <x-ui::mega-menu.link href="/food">Pet Food</x-ui::mega-menu.link>
                            <x-ui::mega-menu.link href="/toys">Toys</x-ui::mega-menu.link>
                            <x-ui::mega-menu.link href="/accessories">Accessories</x-ui::mega-menu.link>
                            <x-ui::mega-menu.link href="/healthcare">Healthcare</x-ui::mega-menu.link>
                        </x-ui::mega-menu.column>

                        <x-ui::mega-menu.column title="Resources">
                            <x-ui::mega-menu.link href="/blog">Blog</x-ui::mega-menu.link>
                            <x-ui::mega-menu.link href="/guides">Guides</x-ui::mega-menu.link>
                            <x-ui::mega-menu.link href="/faq">FAQ</x-ui::mega-menu.link>
                            <x-ui::mega-menu.link href="/support">Support</x-ui::mega-menu.link>
                        </x-ui::mega-menu.column>
                    </x-ui::mega-menu>
                </div>
            </div>
        </div>
    </div>
</nav>
```

### Mega Menu with Icons

Add icons and descriptions to menu items:

```blade
<x-ui::mega-menu :columns="3">
    <x-ui::mega-menu.column title="Popular Services">
        <x-ui::mega-menu.item
            href="/grooming"
            description="Professional pet grooming services"
        >
            <x-slot:icon>
                <svg fill="currentColor" viewBox="0 0 20 20">
                    <path d="M10 3.5a1.5 1.5 0 013 0V4a1 1 0 001 1h3a1 1 0 011 1v3a1 1 0 01-1 1h-.5a1.5 1.5 0 000 3h.5a1 1 0 011 1v3a1 1 0 01-1 1h-3a1 1 0 01-1-1v-.5a1.5 1.5 0 00-3 0v.5a1 1 0 01-1 1H6a1 1 0 01-1-1v-3a1 1 0 00-1-1h-.5a1.5 1.5 0 010-3H4a1 1 0 001-1V6a1 1 0 011-1h3a1 1 0 001-1v-.5z"/>
                </svg>
            </x-slot:icon>
            Grooming
        </x-ui::mega-menu.item>

        <x-ui::mega-menu.item
            href="/veterinary"
            description="Expert veterinary care for your pets"
        >
            <x-slot:icon>
                <svg fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z" clip-rule="evenodd"/>
                </svg>
            </x-slot:icon>
            Veterinary
        </x-ui::mega-menu.item>

        <x-ui::mega-menu.item
            href="/training"
            description="Behavior training and obedience classes"
        >
            <x-slot:icon>
                <svg fill="currentColor" viewBox="0 0 20 20">
                    <path d="M10.394 2.08a1 1 0 00-.788 0l-7 3a1 1 0 000 1.84L5.25 8.051a.999.999 0 01.356-.257l4-1.714a1 1 0 11.788 1.838L7.667 9.088l1.94.831a1 1 0 00.787 0l7-3a1 1 0 000-1.838l-7-3zM3.31 9.397L5 10.12v4.102a8.969 8.969 0 00-1.05-.174 1 1 0 01-.89-.89 11.115 11.115 0 01.25-3.762zM9.3 16.573A9.026 9.026 0 007 14.935v-3.957l1.818.78a3 3 0 002.364 0l5.508-2.361a11.026 11.026 0 01.25 3.762 1 1 0 01-.89.89 8.968 8.968 0 00-5.35 2.524 1 1 0 01-1.4 0zM6 18a1 1 0 001-1v-2.065a8.935 8.935 0 00-2-.712V17a1 1 0 001 1z"/>
                </svg>
            </x-slot:icon>
            Training
        </x-ui::mega-menu.item>
    </x-ui::mega-menu.column>

    <x-ui::mega-menu.column title="Shop by Pet">
        <x-ui::mega-menu.item href="/dogs" description="Products for dogs">
            <x-slot:icon>
                <svg fill="currentColor" viewBox="0 0 20 20">
                    <path d="M2 6a2 2 0 012-2h6a2 2 0 012 2v8a2 2 0 01-2 2H4a2 2 0 01-2-2V6zM14.553 7.106A1 1 0 0014 8v4a1 1 0 00.553.894l2 1A1 1 0 0018 13V7a1 1 0 00-1.447-.894l-2 1z"/>
                </svg>
            </x-slot:icon>
            Dogs
        </x-ui::mega-menu.item>

        <x-ui::mega-menu.item href="/cats" description="Products for cats">
            <x-slot:icon>
                <svg fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM7 9a1 1 0 100-2 1 1 0 000 2zm7-1a1 1 0 11-2 0 1 1 0 012 0zm-.464 5.535a1 1 0 10-1.415-1.414 3 3 0 01-4.242 0 1 1 0 00-1.415 1.414 5 5 0 007.072 0z" clip-rule="evenodd"/>
                </svg>
            </x-slot:icon>
            Cats
        </x-ui::mega-menu.item>

        <x-ui::mega-menu.item href="/birds" description="Products for birds">
            <x-slot:icon>
                <svg fill="currentColor" viewBox="0 0 20 20">
                    <path d="M11 17a1 1 0 001.447.894l4-2A1 1 0 0017 15V9.236a1 1 0 00-1.447-.894l-4 2a1 1 0 00-.553.894V17zM15.211 6.276a1 1 0 000-1.788l-4.764-2.382a1 1 0 00-.894 0L4.789 4.488a1 1 0 000 1.788l4.764 2.382a1 1 0 00.894 0l4.764-2.382zM4.447 8.342A1 1 0 003 9.236V15a1 1 0 00.553.894l4 2A1 1 0 009 17v-5.764a1 1 0 00-.553-.894l-4-2z"/>
                </svg>
            </x-slot:icon>
            Birds
        </x-ui::mega-menu.item>
    </x-ui::mega-menu.column>

    <x-ui::mega-menu.column title="Resources">
        <x-ui::mega-menu.link href="/blog">Blog</x-ui::mega-menu.link>
        <x-ui::mega-menu.link href="/guides">Pet Care Guides</x-ui::mega-menu.link>
        <x-ui::mega-menu.link href="/videos">Video Tutorials</x-ui::mega-menu.link>
        <x-ui::mega-menu.link href="/community">Community</x-ui::mega-menu.link>
    </x-ui::mega-menu.column>
</x-ui::mega-menu>
```

### Full Width Mega Menu

Span the entire page width:

```blade
<div class="relative" x-data="{ open: false }">
    <button
        @click="open = !open"
        class="flex items-center px-3 py-2 text-gray-900 rounded hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700"
    >
        Company
        <svg class="w-4 h-4 ml-1" fill="currentColor" viewBox="0 0 20 20">
            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"/>
        </svg>
    </button>

    <x-ui::mega-menu :columns="4" :fullWidth="true">
        <x-ui::mega-menu.column title="Company">
            <x-ui::mega-menu.link href="/about">About Us</x-ui::mega-menu.link>
            <x-ui::mega-menu.link href="/team">Team</x-ui::mega-menu.link>
            <x-ui::mega-menu.link href="/careers">Careers</x-ui::mega-menu.link>
            <x-ui::mega-menu.link href="/press">Press</x-ui::mega-menu.link>
        </x-ui::mega-menu.column>

        <x-ui::mega-menu.column title="Support">
            <x-ui::mega-menu.link href="/help">Help Center</x-ui::mega-menu.link>
            <x-ui::mega-menu.link href="/contact">Contact Us</x-ui::mega-menu.link>
            <x-ui::mega-menu.link href="/status">Status</x-ui::mega-menu.link>
            <x-ui::mega-menu.link href="/feedback">Feedback</x-ui::mega-menu.link>
        </x-ui::mega-menu.column>

        <x-ui::mega-menu.column title="Legal">
            <x-ui::mega-menu.link href="/privacy">Privacy</x-ui::mega-menu.link>
            <x-ui::mega-menu.link href="/terms">Terms</x-ui::mega-menu.link>
            <x-ui::mega-menu.link href="/cookies">Cookies</x-ui::mega-menu.link>
            <x-ui::mega-menu.link href="/licenses">Licenses</x-ui::mega-menu.link>
        </x-ui::mega-menu.column>

        <x-ui::mega-menu.column title="Social">
            <x-ui::mega-menu.link href="https://twitter.com">Twitter</x-ui::mega-menu.link>
            <x-ui::mega-menu.link href="https://facebook.com">Facebook</x-ui::mega-menu.link>
            <x-ui::mega-menu.link href="https://instagram.com">Instagram</x-ui::mega-menu.link>
            <x-ui::mega-menu.link href="https://youtube.com">YouTube</x-ui::mega-menu.link>
        </x-ui::mega-menu.column>
    </x-ui::mega-menu>
</div>
```

### Mega Menu with CTA

Add call-to-action sections:

```blade
<x-ui::mega-menu :columns="3">
    <x-ui::mega-menu.column title="Services">
        <x-ui::mega-menu.link href="/grooming">Grooming</x-ui::mega-menu.link>
        <x-ui::mega-menu.link href="/veterinary">Veterinary</x-ui::mega-menu.link>
        <x-ui::mega-menu.link href="/training">Training</x-ui::mega-menu.link>
        <x-ui::mega-menu.link href="/boarding">Boarding</x-ui::mega-menu.link>
    </x-ui::mega-menu.column>

    <x-ui::mega-menu.column title="Products">
        <x-ui::mega-menu.link href="/food">Pet Food</x-ui::mega-menu.link>
        <x-ui::mega-menu.link href="/toys">Toys</x-ui::mega-menu.link>
        <x-ui::mega-menu.link href="/accessories">Accessories</x-ui::mega-menu.link>
        <x-ui::mega-menu.link href="/healthcare">Healthcare</x-ui::mega-menu.link>
    </x-ui::mega-menu.column>

    <x-ui::mega-menu.cta
        title="New Customer Offer"
        description="Get 20% off your first service booking. Limited time offer!"
    >
        <x-ui::button variant="primary" href="/register">
            Sign Up Now
        </x-ui::button>
        <x-ui::button variant="light" href="/services">
            Browse Services
        </x-ui::button>
    </x-ui::mega-menu.cta>
</x-ui::mega-menu>
```

### Mega Menu with Background Image

Add a promotional section with background image:

```blade
<x-ui::mega-menu :columns="3">
    <x-ui::mega-menu.column title="Pet Care">
        <x-ui::mega-menu.link href="/grooming">Grooming</x-ui::mega-menu.link>
        <x-ui::mega-menu.link href="/veterinary">Veterinary</x-ui::mega-menu.link>
        <x-ui::mega-menu.link href="/training">Training</x-ui::mega-menu.link>
    </x-ui::mega-menu.column>

    <x-ui::mega-menu.column title="Products">
        <x-ui::mega-menu.link href="/food">Pet Food</x-ui::mega-menu.link>
        <x-ui::mega-menu.link href="/toys">Toys</x-ui::mega-menu.link>
        <x-ui::mega-menu.link href="/accessories">Accessories</x-ui::mega-menu.link>
    </x-ui::mega-menu.column>

    <x-ui::mega-menu.cta
        title="Premium Pet Care"
        description="Join our membership program for exclusive benefits"
        image="/images/promo-bg.jpg"
    >
        <x-ui::button variant="white" href="/membership">
            Learn More
        </x-ui::button>
    </x-ui::mega-menu.cta>
</x-ui::mega-menu>
```

## Props

### Mega Menu Container (`ui::mega-menu`)

| Prop | Type | Default | Description |
|------|------|---------|-------------|
| `id` | string | auto-generated | Unique identifier for the dropdown |
| `columns` | int | `3` | Number of columns: `1`, `2`, `3`, `4` |
| `fullWidth` | boolean | `false` | Span full page width with border-y styling |

### Mega Menu Trigger (`ui::mega-menu.trigger`)

| Prop | Type | Default | Description |
|------|------|---------|-------------|
| `target` | string | `null` | ID of the mega menu to toggle |
| `icon` | boolean | `true` | Show hamburger icon |

### Mega Menu Column (`ui::mega-menu.column`)

| Prop | Type | Default | Description |
|------|------|---------|-------------|
| `title` | string | `null` | Column header title |

### Mega Menu Link (`ui::mega-menu.link`)

| Prop | Type | Default | Description |
|------|------|---------|-------------|
| `href` | string | `'#'` | Link destination URL |
| `active` | boolean | `false` | Mark link as active/current |

### Mega Menu Item (`ui::mega-menu.item`)

| Prop | Type | Default | Description |
|------|------|---------|-------------|
| `href` | string | `'#'` | Link destination URL |
| `icon` | slot | `null` | SVG icon to display |
| `description` | string | `null` | Description text below title |

### Mega Menu CTA (`ui::mega-menu.cta`)

| Prop | Type | Default | Description |
|------|------|---------|-------------|
| `title` | string | `null` | CTA heading |
| `description` | string | `null` | CTA description text |
| `image` | string | `null` | Background image URL |

## Real-World Examples

### E-commerce Navigation

```blade
<nav class="bg-white border-b border-gray-200 dark:bg-gray-800">
    <div class="max-w-screen-xl mx-auto px-4">
        <div class="flex items-center justify-between h-16">
            {{-- Logo --}}
            <a href="/" class="flex items-center">
                <img src="/logo.svg" alt="Flowbite" class="h-8">
            </a>

            {{-- Main Navigation --}}
            <div class="hidden md:flex md:space-x-8">
                {{-- Services Mega Menu --}}
                <div class="relative" x-data="{ open: false }">
                    <button
                        @click="open = !open"
                        class="flex items-center px-3 py-2 text-gray-900 hover:text-blue-600 dark:text-white"
                    >
                        Services
                        <svg class="w-4 h-4 ml-1" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"/>
                        </svg>
                    </button>

                    <x-ui::mega-menu :columns="4">
                        <x-ui::mega-menu.column title="Grooming">
                            <x-ui::mega-menu.link href="/grooming/basic">Basic Grooming</x-ui::mega-menu.link>
                            <x-ui::mega-menu.link href="/grooming/premium">Premium Grooming</x-ui::mega-menu.link>
                            <x-ui::mega-menu.link href="/grooming/spa">Spa Treatment</x-ui::mega-menu.link>
                            <x-ui::mega-menu.link href="/grooming/mobile">Mobile Grooming</x-ui::mega-menu.link>
                        </x-ui::mega-menu.column>

                        <x-ui::mega-menu.column title="Veterinary">
                            <x-ui::mega-menu.link href="/vet/checkup">Health Checkup</x-ui::mega-menu.link>
                            <x-ui::mega-menu.link href="/vet/vaccination">Vaccination</x-ui::mega-menu.link>
                            <x-ui::mega-menu.link href="/vet/surgery">Surgery</x-ui::mega-menu.link>
                            <x-ui::mega-menu.link href="/vet/emergency">Emergency Care</x-ui::mega-menu.link>
                        </x-ui::mega-menu.column>

                        <x-ui::mega-menu.column title="Training">
                            <x-ui::mega-menu.link href="/training/puppy">Puppy Training</x-ui::mega-menu.link>
                            <x-ui::mega-menu.link href="/training/obedience">Obedience Classes</x-ui::mega-menu.link>
                            <x-ui::mega-menu.link href="/training/behavior">Behavior Training</x-ui::mega-menu.link>
                            <x-ui::mega-menu.link href="/training/agility">Agility Training</x-ui::mega-menu.link>
                        </x-ui::mega-menu.column>

                        <x-ui::mega-menu.cta
                            title="Book Now & Save"
                            description="First-time customers get 25% off any service"
                        >
                            <x-ui::button variant="primary" href="/book">
                                Book Appointment
                            </x-ui::button>
                        </x-ui::mega-menu.cta>
                    </x-ui::mega-menu>
                </div>

                {{-- Shop Mega Menu --}}
                <div class="relative" x-data="{ open: false }">
                    <button
                        @click="open = !open"
                        class="flex items-center px-3 py-2 text-gray-900 hover:text-blue-600 dark:text-white"
                    >
                        Shop
                        <svg class="w-4 h-4 ml-1" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"/>
                        </svg>
                    </button>

                    <x-ui::mega-menu :columns="3">
                        <x-ui::mega-menu.column title="Shop by Category">
                            <x-ui::mega-menu.link href="/shop/food">Food & Treats</x-ui::mega-menu.link>
                            <x-ui::mega-menu.link href="/shop/toys">Toys & Entertainment</x-ui::mega-menu.link>
                            <x-ui::mega-menu.link href="/shop/beds">Beds & Furniture</x-ui::mega-menu.link>
                            <x-ui::mega-menu.link href="/shop/accessories">Accessories</x-ui::mega-menu.link>
                            <x-ui::mega-menu.link href="/shop/healthcare">Healthcare</x-ui::mega-menu.link>
                        </x-ui::mega-menu.column>

                        <x-ui::mega-menu.column title="Shop by Pet">
                            <x-ui::mega-menu.link href="/shop/dogs">Dogs</x-ui::mega-menu.link>
                            <x-ui::mega-menu.link href="/shop/cats">Cats</x-ui::mega-menu.link>
                            <x-ui::mega-menu.link href="/shop/birds">Birds</x-ui::mega-menu.link>
                            <x-ui::mega-menu.link href="/shop/small-pets">Small Pets</x-ui::mega-menu.link>
                            <x-ui::mega-menu.link href="/shop/fish">Fish</x-ui::mega-menu.link>
                        </x-ui::mega-menu.column>

                        <x-ui::mega-menu.column title="Featured">
                            <x-ui::mega-menu.link href="/shop/new">New Arrivals</x-ui::mega-menu.link>
                            <x-ui::mega-menu.link href="/shop/bestsellers">Bestsellers</x-ui::mega-menu.link>
                            <x-ui::mega-menu.link href="/shop/deals">Deals</x-ui::mega-menu.link>
                            <x-ui::mega-menu.link href="/shop/subscriptions">Subscriptions</x-ui::mega-menu.link>
                        </x-ui::mega-menu.column>
                    </x-ui::mega-menu>
                </div>

                <a href="/about" class="px-3 py-2 text-gray-900 hover:text-blue-600 dark:text-white">
                    About
                </a>
                <a href="/contact" class="px-3 py-2 text-gray-900 hover:text-blue-600 dark:text-white">
                    Contact
                </a>
            </div>

            {{-- Mobile Menu Toggle --}}
            <x-ui::mega-menu.trigger target="mobile-menu" class="md:hidden" />
        </div>
    </div>
</nav>
```

### Multi-level Navigation

```blade
<x-ui::mega-menu :columns="3" :fullWidth="true">
    <x-ui::mega-menu.column>
        <x-ui::mega-menu.item
            href="/services/grooming"
            description="Complete grooming services for all breeds"
        >
            <x-slot:icon>
                <svg fill="currentColor" viewBox="0 0 20 20">
                    <path d="M10 3.5a1.5 1.5 0 013 0V4a1 1 0 001 1h3a1 1 0 011 1v3a1 1 0 01-1 1h-.5a1.5 1.5 0 000 3h.5a1 1 0 011 1v3a1 1 0 01-1 1h-3a1 1 0 01-1-1v-.5a1.5 1.5 0 00-3 0v.5a1 1 0 01-1 1H6a1 1 0 01-1-1v-3a1 1 0 00-1-1h-.5a1.5 1.5 0 010-3H4a1 1 0 001-1V6a1 1 0 011-1h3a1 1 0 001-1v-.5z"/>
                </svg>
            </x-slot:icon>
            Professional Grooming
        </x-ui::mega-menu.item>

        <x-ui::mega-menu.item
            href="/services/veterinary"
            description="Expert medical care from licensed veterinarians"
        >
            <x-slot:icon>
                <svg fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z" clip-rule="evenodd"/>
                </svg>
            </x-slot:icon>
            Veterinary Services
        </x-ui::mega-menu.item>

        <x-ui::mega-menu.item
            href="/services/training"
            description="Professional training programs for all ages"
        >
            <x-slot:icon>
                <svg fill="currentColor" viewBox="0 0 20 20">
                    <path d="M10.394 2.08a1 1 0 00-.788 0l-7 3a1 1 0 000 1.84L5.25 8.051a.999.999 0 01.356-.257l4-1.714a1 1 0 11.788 1.838L7.667 9.088l1.94.831a1 1 0 00.787 0l7-3a1 1 0 000-1.838l-7-3z"/>
                </svg>
            </x-slot:icon>
            Training Programs
        </x-ui::mega-menu.item>
    </x-ui::mega-menu.column>

    <x-ui::mega-menu.column>
        <x-ui::mega-menu.item
            href="/services/boarding"
            description="Safe and comfortable pet boarding facilities"
        >
            <x-slot:icon>
                <svg fill="currentColor" viewBox="0 0 20 20">
                    <path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"/>
                </svg>
            </x-slot:icon>
            Pet Boarding
        </x-ui::mega-menu.item>

        <x-ui::mega-menu.item
            href="/services/daycare"
            description="Supervised daycare and socialization"
        >
            <x-slot:icon>
                <svg fill="currentColor" viewBox="0 0 20 20">
                    <path d="M10 12a2 2 0 100-4 2 2 0 000 4z"/>
                    <path fill-rule="evenodd" d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z" clip-rule="evenodd"/>
                </svg>
            </x-slot:icon>
            Pet Daycare
        </x-ui::mega-menu.item>

        <x-ui::mega-menu.item
            href="/services/walking"
            description="Regular walking and exercise services"
        >
            <x-slot:icon>
                <svg fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"/>
                </svg>
            </x-slot:icon>
            Dog Walking
        </x-ui::mega-menu.item>
    </x-ui::mega-menu.column>

    <x-ui::mega-menu.cta
        title="Premium Membership"
        description="Get unlimited access to all services with our premium plan"
        image="/images/membership-bg.jpg"
    >
        <x-ui::button variant="white" size="lg" href="/membership">
            Join Now
        </x-ui::button>
    </x-ui::mega-menu.cta>
</x-ui::mega-menu>
```

## Alpine.js Integration

The mega menu uses Alpine.js for state management and animations:

```blade
<div class="relative" x-data="{ open: false }">
    {{-- Trigger Button --}}
    <button
        @click="open = !open"
        @keydown.escape="open = false"
        class="flex items-center px-3 py-2"
    >
        Menu
        <svg
            class="w-4 h-4 ml-1 transition-transform"
            :class="{ 'rotate-180': open }"
            fill="currentColor"
            viewBox="0 0 20 20"
        >
            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"/>
        </svg>
    </button>

    {{-- Mega Menu Dropdown --}}
    <x-ui::mega-menu>
        {{-- Content --}}
    </x-ui::mega-menu>
</div>
```

## Accessibility

The Mega Menu component includes several accessibility features:

1. **Semantic HTML**: Uses `<nav>`, `<button>`, and `<a>` elements appropriately
2. **ARIA Attributes**: `aria-current="page"` for active links, `aria-hidden` for icons
3. **Keyboard Navigation**: Full keyboard support with Tab and Escape keys
4. **Focus Management**: Visible focus indicators with ring utility
5. **Screen Reader Support**: Icons hidden from screen readers, descriptive text provided
6. **Mobile Accessibility**: Hamburger menu with proper labels

## Best Practices

### Do's

- Use mega menus for complex navigation with many links
- Organize links into logical categories with clear headings
- Limit to 3-4 columns for optimal readability
- Include CTAs to highlight important actions
- Test on mobile devices for responsive behavior
- Provide clear visual feedback on hover and focus

### Don'ts

- Don't use mega menus for simple navigation (use regular dropdowns)
- Don't create too many columns (becomes overwhelming)
- Don't nest mega menus within mega menus
- Don't use mega menus as the only navigation method
- Don't forget mobile menu functionality
- Don't use auto-opening mega menus (use click activation)

## Dark Mode

The Mega Menu component automatically adapts to dark mode with appropriate color adjustments for:
- Background colors
- Border colors
- Text colors
- Hover states
- Focus rings

## Browser Compatibility

The Mega Menu component works across all modern browsers:
- Chrome/Edge (latest)
- Firefox (latest)
- Safari (latest)
- Opera (latest)

Requires Alpine.js for interactivity.

## Related Components

- [Dropdown](dropdown.md) - Simple dropdown menus
- [Navbar](navbar.md) - Navigation bar container
- [List Group](list-group.md) - Vertical list navigation
- [Button](button.md) - Trigger buttons
- [Card](card.md) - CTA sections

## Tips & Tricks

### Close on Navigation

```blade
<x-ui::mega-menu.link
    href="/services"
    @click="open = false"
>
    Services
</x-ui::mega-menu.link>
```

### Keyboard Navigation Enhancement

```blade
<div
    x-data="{ open: false }"
    @keydown.escape.window="open = false"
    @click.away="open = false"
>
    {{-- Mega menu --}}
</div>
```

### Responsive Column Count

```blade
{{-- 2 columns on tablet, 4 on desktop --}}
<x-ui::mega-menu :columns="4">
    {{-- Content --}}
</x-ui::mega-menu>
```

### Custom Positioning

```blade
<x-ui::mega-menu class="!left-0 !right-auto md:!w-96">
    {{-- Left-aligned on desktop with fixed width --}}
</x-ui::mega-menu>
```

---

**Component Location:** `resources/views/components/ui/mega-menu.blade.php`
**Documentation:** `docs/components/ui/mega-menu.md`
**Flowbite Reference:** [Mega Menu Component](https://flowbite.com/docs/components/mega-menu/)
**Dependencies:** Alpine.js for interactivity
