# Footer Components

Footer components. Used to display sitemap links, social media icons, copyright, and brand information at the bottom of every page.

## 📦 Available Components

- **Footer** - Base footer container
- **Footer Brand** - Logo and company name
- **Footer Link Group** - Section with title and links
- **Footer Link** - Individual link item
- **Footer Copyright** - Copyright text
- **Footer Icon** - Social media icon link
- **Footer Divider** - Horizontal divider

---

## Base Footer Component

Base footer container component. Wraps all footer content.

**Location:** `resources/views/components/ui/footer.blade.php`

### Features

- Container width control
- Sticky footer option
- Dark mode support
- Responsive padding
- Centered content container

### Usage

```blade
{{-- Basic Footer --}}
<x-ui::footer>
    <div class="text-center">
        <x-ui::footer.copyright company="Flowbite" href="/" />
    </div>
</x-ui::footer>

{{-- Sticky Footer --}}
<x-ui::footer :sticky="true">
    {{-- Footer content --}}
</x-ui::footer>

{{-- Without Container --}}
<x-ui::footer :container="false">
    {{-- Full width content --}}
</x-ui::footer>
```

### Props

| Prop | Type | Default | Options | Description |
|------|------|---------|---------|-------------|
| `sticky` | bool | false | - | Fixed at bottom of page |
| `container` | bool | true | - | Use centered container |

---

## Footer Brand Component

Displays logo and company name.

**Location:** `resources/views/components/ui/footer/brand.blade.php`

### Features

- Logo image support
- Company name display
- Custom content slot
- Link to homepage
- Dark mode support

### Usage

```blade
{{-- With Logo and Name --}}
<x-ui::footer.brand
    logo="/images/logo.svg"
    name="Flowbite"
    href="/"
/>

{{-- Logo Only --}}
<x-ui::footer.brand logo="/images/logo.svg" />

{{-- Custom Content --}}
<x-ui::footer.brand>
    <img src="/logo.svg" class="h-8">
    <span class="ml-3 text-xl font-bold">My Brand</span>
</x-ui::footer.brand>
```

### Props

| Prop | Type | Default | Options | Description |
|------|------|---------|---------|-------------|
| `logo` | string | null | - | Logo image URL |
| `name` | string | null | - | Company name |
| `href` | string | '/' | - | Link URL |

---

## Footer Link Group Component

Section containing a title and list of links.

**Location:** `resources/views/components/ui/footer/link-group.blade.php`

### Features

- Optional section title
- Unordered list wrapper
- Responsive styling
- Dark mode support

### Usage

```blade
<x-ui::footer.link-group title="Resources">
    <x-ui::footer.link href="/docs">Documentation</x-ui::footer.link>
    <x-ui::footer.link href="/api">API</x-ui::footer.link>
    <x-ui::footer.link href="/blog">Blog</x-ui::footer.link>
</x-ui::footer.link-group>

{{-- Without Title --}}
<x-ui::footer.link-group>
    <x-ui::footer.link href="/">Home</x-ui::footer.link>
    <x-ui::footer.link href="/about">About</x-ui::footer.link>
</x-ui::footer.link-group>
```

### Props

| Prop | Type | Default | Options | Description |
|------|------|---------|---------|-------------|
| `title` | string | null | - | Section title |

---

## Footer Link Component

Individual link item.

**Location:** `resources/views/components/ui/footer/link.blade.php`

### Features

- Hover underline effect
- Dark mode support
- Bottom margin spacing

### Usage

```blade
<x-ui::footer.link href="/privacy">
    Privacy Policy
</x-ui::footer.link>

<x-ui::footer.link href="/terms">
    Terms of Service
</x-ui::footer.link>

{{-- With Livewire --}}
<x-ui::footer.link href="/contact" wire:navigate>
    Contact Us
</x-ui::footer.link>
```

### Props

| Prop | Type | Default | Options | Description |
|------|------|---------|---------|-------------|
| `href` | string | '#' | - | Link URL |

---

## Footer Copyright Component

Copyright text component.

**Location:** `resources/views/components/ui/footer/copyright.blade.php`

### Features

- Automatic current year
- Company name with link
- Custom text support
- "All Rights Reserved" text
- Dark mode support

### Usage

```blade
{{-- With Company Name --}}
<x-ui::footer.copyright company="Flowbite" href="/" />
{{-- Output: © 2024 Flowbite™. All Rights Reserved. --}}

{{-- Custom Year --}}
<x-ui::footer.copyright :year="2023" company="Flowbite" />

{{-- Custom Text --}}
<x-ui::footer.copyright>
    © 2024 My Company. All Rights Reserved.
</x-ui::footer.copyright>

{{-- Just Year and Company --}}
<x-ui::footer.copyright company="Flowbite" />
```

### Props

| Prop | Type | Default | Options | Description |
|------|------|---------|---------|-------------|
| `year` | int | current year | - | Copyright year |
| `company` | string | null | - | Company name |
| `href` | string | null | - | Company link URL |

---

## Footer Icon Component

Social media icon link.

**Location:** `resources/views/components/ui/footer/icon.blade.php`

### Features

- SVG icon support
- Hover color transition
- Screen reader label
- Dark mode support

### Usage

```blade
{{-- Facebook --}}
<x-ui::footer.icon href="https://facebook.com/yourpage" label="Facebook page">
    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 8 19">
        <path fill-rule="evenodd" d="M6.135 3H8V0H6.135a4.147 4.147 0 0 0-4.142 4.142V6H0v3h2v9.938h3V9h2.021l.592-3H5V3.591A.6.6 0 0 1 5.592 3h.543Z" clip-rule="evenodd"/>
    </svg>
</x-ui::footer.icon>

{{-- Twitter --}}
<x-ui::footer.icon href="https://twitter.com/yourhandle" label="Twitter page">
    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 17">
        <path fill-rule="evenodd" d="M20 1.892a8.178 8.178 0 0 1-2.355.635 4.074 4.074 0 0 0 1.8-2.235 8.344 8.344 0 0 1-2.605.98A4.13 4.13 0 0 0 13.85 0a4.068 4.068 0 0 0-4.1 4.038 4 4 0 0 0 .105.919A11.705 11.705 0 0 1 1.4.734a4.006 4.006 0 0 0 1.268 5.392 4.165 4.165 0 0 1-1.859-.5v.05A4.057 4.057 0 0 0 4.1 9.635a4.19 4.19 0 0 1-1.856.07 4.108 4.108 0 0 0 3.831 2.807A8.36 8.36 0 0 1 0 14.184 11.732 11.732 0 0 0 6.291 16 11.502 11.502 0 0 0 17.964 4.5c0-.177 0-.35-.012-.523A8.143 8.143 0 0 0 20 1.892Z" clip-rule="evenodd"/>
    </svg>
</x-ui::footer.icon>

{{-- GitHub --}}
<x-ui::footer.icon href="https://github.com/yourrepo" label="GitHub repository">
    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
        <path fill-rule="evenodd" d="M10 .333A9.911 9.911 0 0 0 6.866 19.65c.5.092.678-.215.678-.477 0-.237-.01-1.017-.014-1.845-2.757.6-3.338-1.169-3.338-1.169a2.627 2.627 0 0 0-1.1-1.451c-.9-.615.07-.6.07-.6a2.084 2.084 0 0 1 1.518 1.021 2.11 2.11 0 0 0 2.884.823c.044-.503.268-.973.63-1.325-2.2-.25-4.516-1.1-4.516-4.9A3.832 3.832 0 0 1 4.7 7.068a3.56 3.56 0 0 1 .095-2.623s.832-.266 2.726 1.016a9.409 9.409 0 0 1 4.962 0c1.89-1.282 2.717-1.016 2.717-1.016.366.83.402 1.768.1 2.623a3.827 3.827 0 0 1 1.02 2.659c0 3.807-2.319 4.644-4.525 4.889a2.366 2.366 0 0 1 .673 1.834c0 1.326-.012 2.394-.012 2.72 0 .263.18.572.681.475A9.911 9.911 0 0 0 10 .333Z" clip-rule="evenodd"/>
    </svg>
</x-ui::footer.icon>

{{-- Instagram --}}
<x-ui::footer.icon href="https://instagram.com/yourprofile" label="Instagram page">
    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
        <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/>
    </svg>
</x-ui::footer.icon>
```

### Props

| Prop | Type | Default | Options | Description |
|------|------|---------|---------|-------------|
| `href` | string | '#' | - | Social media link URL |
| `label` | string | '' | - | Screen reader label |
| `icon` | string | null | - | SVG icon HTML |

---

## Footer Divider Component

Horizontal line divider.

**Location:** `resources/views/components/ui/footer/divider.blade.php`

### Usage

```blade
<x-ui::footer.divider />

{{-- Custom Styling --}}
<x-ui::footer.divider class="my-4" />
```

---

## Real-World Examples

### Default Footer

Simple footer with copyright and horizontal links.

```blade
<x-ui::footer>
    <div class="w-full mx-auto max-w-screen-xl p-4 md:flex md:items-center md:justify-between">
        <x-ui::footer.copyright company="Flowbite" href="/" />

        <ul class="flex flex-wrap items-center mt-3 text-sm font-medium text-gray-500 dark:text-gray-400 sm:mt-0">
            <li>
                <a href="/about" class="hover:underline me-4 md:me-6">About</a>
            </li>
            <li>
                <a href="/privacy" class="hover:underline me-4 md:me-6">Privacy Policy</a>
            </li>
            <li>
                <a href="/licensing" class="hover:underline me-4 md:me-6">Licensing</a>
            </li>
            <li>
                <a href="/contact" class="hover:underline">Contact</a>
            </li>
        </ul>
    </div>
</x-ui::footer>
```

### Footer with Logo

Footer with brand, links, and divider.

```blade
<x-ui::footer>
    <div class="md:flex md:justify-between">
        <x-ui::footer.brand
            logo="/images/logo.svg"
            name="Flowbite"
            href="/"
        />

        <div class="grid grid-cols-2 gap-8 sm:gap-6 sm:grid-cols-3">
            <x-ui::footer.link-group title="Resources">
                <x-ui::footer.link href="/docs">Documentation</x-ui::footer.link>
                <x-ui::footer.link href="/api">API</x-ui::footer.link>
            </x-ui::footer.link-group>

            <x-ui::footer.link-group title="Follow Us">
                <x-ui::footer.link href="https://github.com/Flowbite">Github</x-ui::footer.link>
                <x-ui::footer.link href="https://discord.gg/Flowbite">Discord</x-ui::footer.link>
            </x-ui::footer.link-group>

            <x-ui::footer.link-group title="Legal">
                <x-ui::footer.link href="/privacy">Privacy Policy</x-ui::footer.link>
                <x-ui::footer.link href="/terms">Terms & Conditions</x-ui::footer.link>
            </x-ui::footer.link-group>
        </div>
    </div>

    <x-ui::footer.divider />

    <x-ui::footer.copyright company="Flowbite" href="/" />
</x-ui::footer>
```

### Social Media Footer

Footer with brand, multi-column links, and social icons.

```blade
<x-ui::footer>
    <div class="md:flex md:justify-between">
        <div class="mb-6 md:mb-0">
            <x-ui::footer.brand
                logo="/images/logo.svg"
                name="Flowbite"
                href="/"
            />
        </div>

        <div class="grid grid-cols-2 gap-8 sm:gap-6 sm:grid-cols-3">
            <x-ui::footer.link-group title="Resources">
                <x-ui::footer.link href="https://flowbite.com/">Flowbite</x-ui::footer.link>
                <x-ui::footer.link href="https://tailwindcss.com/">Tailwind CSS</x-ui::footer.link>
            </x-ui::footer.link-group>

            <x-ui::footer.link-group title="Follow Us">
                <x-ui::footer.link href="https://github.com/Flowbite">Github</x-ui::footer.link>
                <x-ui::footer.link href="https://discord.gg/Flowbite">Discord</x-ui::footer.link>
            </x-ui::footer.link-group>

            <x-ui::footer.link-group title="Legal">
                <x-ui::footer.link href="/privacy">Privacy Policy</x-ui::footer.link>
                <x-ui::footer.link href="/terms">Terms & Conditions</x-ui::footer.link>
            </x-ui::footer.link-group>
        </div>
    </div>

    <x-ui::footer.divider />

    <div class="sm:flex sm:items-center sm:justify-between">
        <x-ui::footer.copyright company="Flowbite" href="/" />

        <div class="flex mt-4 sm:justify-center sm:mt-0 space-x-5">
            <x-ui::footer.icon href="https://facebook.com/Flowbite" label="Facebook page">
                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 8 19">
                    <path fill-rule="evenodd" d="M6.135 3H8V0H6.135a4.147 4.147 0 0 0-4.142 4.142V6H0v3h2v9.938h3V9h2.021l.592-3H5V3.591A.6.6 0 0 1 5.592 3h.543Z" clip-rule="evenodd"/>
                </svg>
            </x-ui::footer.icon>

            <x-ui::footer.icon href="https://discord.gg/Flowbite" label="Discord community">
                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 21 16">
                    <path d="M16.942 1.556a16.3 16.3 0 0 0-4.126-1.3 12.04 12.04 0 0 0-.529 1.1 15.175 15.175 0 0 0-4.573 0 11.585 11.585 0 0 0-.535-1.1 16.274 16.274 0 0 0-4.129 1.3A17.392 17.392 0 0 0 .182 13.218a15.785 15.785 0 0 0 4.963 2.521c.41-.564.773-1.16 1.084-1.785a10.63 10.63 0 0 1-1.706-.83c.143-.106.283-.217.418-.33a11.664 11.664 0 0 0 10.118 0c.137.113.277.224.418.33-.544.328-1.116.606-1.71.832a12.52 12.52 0 0 0 1.084 1.785 16.46 16.46 0 0 0 5.064-2.595 17.286 17.286 0 0 0-2.973-11.59ZM6.678 10.813a1.941 1.941 0 0 1-1.8-2.045 1.93 1.93 0 0 1 1.8-2.047 1.919 1.919 0 0 1 1.8 2.047 1.93 1.93 0 0 1-1.8 2.045Zm6.644 0a1.94 1.94 0 0 1-1.8-2.045 1.93 1.93 0 0 1 1.8-2.047 1.918 1.918 0 0 1 1.8 2.047 1.93 1.93 0 0 1-1.8 2.045Z"/>
                </svg>
            </x-ui::footer.icon>

            <x-ui::footer.icon href="https://twitter.com/Flowbite" label="Twitter page">
                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 17">
                    <path fill-rule="evenodd" d="M20 1.892a8.178 8.178 0 0 1-2.355.635 4.074 4.074 0 0 0 1.8-2.235 8.344 8.344 0 0 1-2.605.98A4.13 4.13 0 0 0 13.85 0a4.068 4.068 0 0 0-4.1 4.038 4 4 0 0 0 .105.919A11.705 11.705 0 0 1 1.4.734a4.006 4.006 0 0 0 1.268 5.392 4.165 4.165 0 0 1-1.859-.5v.05A4.057 4.057 0 0 0 4.1 9.635a4.19 4.19 0 0 1-1.856.07 4.108 4.108 0 0 0 3.831 2.807A8.36 8.36 0 0 1 0 14.184 11.732 11.732 0 0 0 6.291 16 11.502 11.502 0 0 0 17.964 4.5c0-.177 0-.35-.012-.523A8.143 8.143 0 0 0 20 1.892Z" clip-rule="evenodd"/>
                </svg>
            </x-ui::footer.icon>

            <x-ui::footer.icon href="https://github.com/Flowbite" label="GitHub repository">
                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M10 .333A9.911 9.911 0 0 0 6.866 19.65c.5.092.678-.215.678-.477 0-.237-.01-1.017-.014-1.845-2.757.6-3.338-1.169-3.338-1.169a2.627 2.627 0 0 0-1.1-1.451c-.9-.615.07-.6.07-.6a2.084 2.084 0 0 1 1.518 1.021 2.11 2.11 0 0 0 2.884.823c.044-.503.268-.973.63-1.325-2.2-.25-4.516-1.1-4.516-4.9A3.832 3.832 0 0 1 4.7 7.068a3.56 3.56 0 0 1 .095-2.623s.832-.266 2.726 1.016a9.409 9.409 0 0 1 4.962 0c1.89-1.282 2.717-1.016 2.717-1.016.366.83.402 1.768.1 2.623a3.827 3.827 0 0 1 1.02 2.659c0 3.807-2.319 4.644-4.525 4.889a2.366 2.366 0 0 1 .673 1.834c0 1.326-.012 2.394-.012 2.72 0 .263.18.572.681.475A9.911 9.911 0 0 0 10 .333Z" clip-rule="evenodd"/>
                </svg>
            </x-ui::footer.icon>

            <x-ui::footer.icon href="https://dribbble.com/Flowbite" label="Dribbble account">
                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M10 0a10 10 0 1 0 10 10A10.009 10.009 0 0 0 10 0Zm6.613 4.614a8.523 8.523 0 0 1 1.93 5.32 20.094 20.094 0 0 0-5.949-.274c-.059-.149-.122-.292-.184-.441a23.879 23.879 0 0 0-.566-1.239 11.41 11.41 0 0 0 4.769-3.366ZM8 1.707a8.821 8.821 0 0 1 2-.238 8.5 8.5 0 0 1 5.664 2.152 9.608 9.608 0 0 1-4.476 3.087A45.758 45.758 0 0 0 8 1.707ZM1.642 8.262a8.57 8.57 0 0 1 4.73-5.981A53.998 53.998 0 0 1 9.54 7.222a32.078 32.078 0 0 1-7.9 1.04h.002Zm2.01 7.46a8.51 8.51 0 0 1-2.2-5.707v-.262a31.64 31.64 0 0 0 8.777-1.219c.243.477.477.964.692 1.449-.114.032-.227.067-.336.1a13.569 13.569 0 0 0-6.942 5.636l.009.003ZM10 18.556a8.508 8.508 0 0 1-5.243-1.8 11.717 11.717 0 0 1 6.7-5.332.509.509 0 0 1 .055-.02 35.65 35.65 0 0 1 1.819 6.476 8.476 8.476 0 0 1-3.331.676Zm4.772-1.462A37.232 37.232 0 0 0 13.113 11a12.513 12.513 0 0 1 5.321.364 8.56 8.56 0 0 1-3.66 5.73h-.002Z" clip-rule="evenodd"/>
                </svg>
            </x-ui::footer.icon>
        </div>
    </div>
</x-ui::footer>
```

### Sitemap Footer

Large footer with 4-column grid and extensive links.

```blade
<x-ui::footer>
    <div class="md:flex md:justify-between">
        <div class="mb-6 md:mb-0">
            <x-ui::footer.brand
                logo="/images/logo.svg"
                name="Flowbite"
                href="/"
            />
        </div>

        <div class="grid grid-cols-2 gap-8 sm:gap-6 sm:grid-cols-4">
            <x-ui::footer.link-group title="Company">
                <x-ui::footer.link href="/about">About</x-ui::footer.link>
                <x-ui::footer.link href="/careers">Careers</x-ui::footer.link>
                <x-ui::footer.link href="/brand">Brand Center</x-ui::footer.link>
                <x-ui::footer.link href="/blog">Blog</x-ui::footer.link>
            </x-ui::footer.link-group>

            <x-ui::footer.link-group title="Help Center">
                <x-ui::footer.link href="https://discord.gg/Flowbite">Discord Server</x-ui::footer.link>
                <x-ui::footer.link href="https://twitter.com/Flowbite">Twitter</x-ui::footer.link>
                <x-ui::footer.link href="https://facebook.com/Flowbite">Facebook</x-ui::footer.link>
                <x-ui::footer.link href="/contact">Contact Us</x-ui::footer.link>
            </x-ui::footer.link-group>

            <x-ui::footer.link-group title="Legal">
                <x-ui::footer.link href="/privacy">Privacy Policy</x-ui::footer.link>
                <x-ui::footer.link href="/licensing">Licensing</x-ui::footer.link>
                <x-ui::footer.link href="/terms">Terms & Conditions</x-ui::footer.link>
            </x-ui::footer.link-group>

            <x-ui::footer.link-group title="Download">
                <x-ui::footer.link href="/download/ios">iOS</x-ui::footer.link>
                <x-ui::footer.link href="/download/android">Android</x-ui::footer.link>
                <x-ui::footer.link href="/download/windows">Windows</x-ui::footer.link>
                <x-ui::footer.link href="/download/macos">MacOS</x-ui::footer.link>
            </x-ui::footer.link-group>
        </div>
    </div>

    <x-ui::footer.divider />

    <div class="sm:flex sm:items-center sm:justify-between">
        <x-ui::footer.copyright company="Flowbite" href="/" />

        <div class="flex mt-4 sm:justify-center sm:mt-0 space-x-5">
            <x-ui::footer.icon href="https://facebook.com/Flowbite" label="Facebook page">
                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 8 19">
                    <path fill-rule="evenodd" d="M6.135 3H8V0H6.135a4.147 4.147 0 0 0-4.142 4.142V6H0v3h2v9.938h3V9h2.021l.592-3H5V3.591A.6.6 0 0 1 5.592 3h.543Z" clip-rule="evenodd"/>
                </svg>
            </x-ui::footer.icon>

            <x-ui::footer.icon href="https://discord.gg/Flowbite" label="Discord community">
                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 21 16">
                    <path d="M16.942 1.556a16.3 16.3 0 0 0-4.126-1.3 12.04 12.04 0 0 0-.529 1.1 15.175 15.175 0 0 0-4.573 0 11.585 11.585 0 0 0-.535-1.1 16.274 16.274 0 0 0-4.129 1.3A17.392 17.392 0 0 0 .182 13.218a15.785 15.785 0 0 0 4.963 2.521c.41-.564.773-1.16 1.084-1.785a10.63 10.63 0 0 1-1.706-.83c.143-.106.283-.217.418-.33a11.664 11.664 0 0 0 10.118 0c.137.113.277.224.418.33-.544.328-1.116.606-1.71.832a12.52 12.52 0 0 0 1.084 1.785 16.46 16.46 0 0 0 5.064-2.595 17.286 17.286 0 0 0-2.973-11.59ZM6.678 10.813a1.941 1.941 0 0 1-1.8-2.045 1.93 1.93 0 0 1 1.8-2.047 1.919 1.919 0 0 1 1.8 2.047 1.93 1.93 0 0 1-1.8 2.045Zm6.644 0a1.94 1.94 0 0 1-1.8-2.045 1.93 1.93 0 0 1 1.8-2.047 1.918 1.918 0 0 1 1.8 2.047 1.93 1.93 0 0 1-1.8 2.045Z"/>
                </svg>
            </x-ui::footer.icon>

            <x-ui::footer.icon href="https://twitter.com/Flowbite" label="Twitter page">
                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 17">
                    <path fill-rule="evenodd" d="M20 1.892a8.178 8.178 0 0 1-2.355.635 4.074 4.074 0 0 0 1.8-2.235 8.344 8.344 0 0 1-2.605.98A4.13 4.13 0 0 0 13.85 0a4.068 4.068 0 0 0-4.1 4.038 4 4 0 0 0 .105.919A11.705 11.705 0 0 1 1.4.734a4.006 4.006 0 0 0 1.268 5.392 4.165 4.165 0 0 1-1.859-.5v.05A4.057 4.057 0 0 0 4.1 9.635a4.19 4.19 0 0 1-1.856.07 4.108 4.108 0 0 0 3.831 2.807A8.36 8.36 0 0 1 0 14.184 11.732 11.732 0 0 0 6.291 16 11.502 11.502 0 0 0 17.964 4.5c0-.177 0-.35-.012-.523A8.143 8.143 0 0 0 20 1.892Z" clip-rule="evenodd"/>
                </svg>
            </x-ui::footer.icon>

            <x-ui::footer.icon href="https://github.com/Flowbite" label="GitHub repository">
                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M10 .333A9.911 9.911 0 0 0 6.866 19.65c.5.092.678-.215.678-.477 0-.237-.01-1.017-.014-1.845-2.757.6-3.338-1.169-3.338-1.169a2.627 2.627 0 0 0-1.1-1.451c-.9-.615.07-.6.07-.6a2.084 2.084 0 0 1 1.518 1.021 2.11 2.11 0 0 0 2.884.823c.044-.503.268-.973.63-1.325-2.2-.25-4.516-1.1-4.516-4.9A3.832 3.832 0 0 1 4.7 7.068a3.56 3.56 0 0 1 .095-2.623s.832-.266 2.726 1.016a9.409 9.409 0 0 1 4.962 0c1.89-1.282 2.717-1.016 2.717-1.016.366.83.402 1.768.1 2.623a3.827 3.827 0 0 1 1.02 2.659c0 3.807-2.319 4.644-4.525 4.889a2.366 2.366 0 0 1 .673 1.834c0 1.326-.012 2.394-.012 2.72 0 .263.18.572.681.475A9.911 9.911 0 0 0 10 .333Z" clip-rule="evenodd"/>
                </svg>
            </x-ui::footer.icon>

            <x-ui::footer.icon href="https://dribbble.com/Flowbite" label="Dribbble account">
                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M10 0a10 10 0 1 0 10 10A10.009 10.009 0 0 0 10 0Zm6.613 4.614a8.523 8.523 0 0 1 1.93 5.32 20.094 20.094 0 0 0-5.949-.274c-.059-.149-.122-.292-.184-.441a23.879 23.879 0 0 0-.566-1.239 11.41 11.41 0 0 0 4.769-3.366ZM8 1.707a8.821 8.821 0 0 1 2-.238 8.5 8.5 0 0 1 5.664 2.152 9.608 9.608 0 0 1-4.476 3.087A45.758 45.758 0 0 0 8 1.707ZM1.642 8.262a8.57 8.57 0 0 1 4.73-5.981A53.998 53.998 0 0 1 9.54 7.222a32.078 32.078 0 0 1-7.9 1.04h.002Zm2.01 7.46a8.51 8.51 0 0 1-2.2-5.707v-.262a31.64 31.64 0 0 0 8.777-1.219c.243.477.477.964.692 1.449-.114.032-.227.067-.336.1a13.569 13.569 0 0 0-6.942 5.636l.009.003ZM10 18.556a8.508 8.508 0 0 1-5.243-1.8 11.717 11.717 0 0 1 6.7-5.332.509.509 0 0 1 .055-.02 35.65 35.65 0 0 1 1.819 6.476 8.476 8.476 0 0 1-3.331.676Zm4.772-1.462A37.232 37.232 0 0 0 13.113 11a12.513 12.513 0 0 1 5.321.364 8.56 8.56 0 0 1-3.66 5.73h-.002Z" clip-rule="evenodd"/>
                </svg>
            </x-ui::footer.icon>
        </div>
    </div>
</x-ui::footer>
```

### Sticky Footer

Fixed footer that stays at bottom of viewport.

```blade
<x-ui::footer :sticky="true">
    <div class="w-full mx-auto max-w-screen-xl p-4 md:flex md:items-center md:justify-between">
        <x-ui::footer.copyright company="Flowbite" href="/" />

        <ul class="flex flex-wrap items-center mt-3 text-sm font-medium text-gray-500 dark:text-gray-400 sm:mt-0">
            <li>
                <a href="/about" class="hover:underline me-4 md:me-6">About</a>
            </li>
            <li>
                <a href="/privacy" class="hover:underline me-4 md:me-6">Privacy Policy</a>
            </li>
            <li>
                <a href="/contact" class="hover:underline">Contact</a>
            </li>
        </ul>
    </div>
</x-ui::footer>

{{-- Add padding to body to prevent content overlap --}}
<style>
    body {
        padding-bottom: 80px; /* Adjust based on footer height */
    }
</style>
```

---

## Best Practices

### 1. Organize Links Logically

Group related links under clear section titles.

```blade
<x-ui::footer.link-group title="Company">
    <x-ui::footer.link href="/about">About</x-ui::footer.link>
    <x-ui::footer.link href="/careers">Careers</x-ui::footer.link>
</x-ui::footer.link-group>

<x-ui::footer.link-group title="Legal">
    <x-ui::footer.link href="/privacy">Privacy Policy</x-ui::footer.link>
    <x-ui::footer.link href="/terms">Terms</x-ui::footer.link>
</x-ui::footer.link-group>
```

### 2. Use Proper Semantic HTML

Footer should contain site-wide information and links.

```blade
{{-- Good: Site-wide navigation and info --}}
<x-ui::footer>
    <x-ui::footer.brand />
    <x-ui::footer.link-group title="Navigation">
        {{-- Site-wide links --}}
    </x-ui::footer.link-group>
</x-ui::footer>

{{-- Avoid: Page-specific content --}}
```

### 3. Include Social Media

Add social icons for better engagement.

```blade
<div class="flex space-x-5">
    <x-ui::footer.icon href="https://facebook.com/yourpage" label="Facebook">
        {{-- Icon SVG --}}
    </x-ui::footer.icon>
    <x-ui::footer.icon href="https://twitter.com/yourhandle" label="Twitter">
        {{-- Icon SVG --}}
    </x-ui::footer.icon>
</div>
```

### 4. Keep Copyright Updated

Use automatic year or specify it.

```blade
{{-- Good: Automatic current year --}}
<x-ui::footer.copyright company="Flowbite" href="/" />

{{-- Good: Specific year range --}}
<x-ui::footer.copyright :year="2020" company="Flowbite" />
```

### 5. Mobile-First Responsive Design

```blade
{{-- Stack on mobile, grid on desktop --}}
<div class="grid grid-cols-1 gap-8 sm:grid-cols-2 lg:grid-cols-4">
    <x-ui::footer.link-group title="Column 1">
        {{-- Links --}}
    </x-ui::footer.link-group>

    <x-ui::footer.link-group title="Column 2">
        {{-- Links --}}
    </x-ui::footer.link-group>

    <x-ui::footer.link-group title="Column 3">
        {{-- Links --}}
    </x-ui::footer.link-group>

    <x-ui::footer.link-group title="Column 4">
        {{-- Links --}}
    </x-ui::footer.link-group>
</div>
```

### 6. Accessibility

Use proper labels and semantic HTML.

```blade
{{-- Good: Screen reader labels --}}
<x-ui::footer.icon href="https://facebook.com/page" label="Facebook page">
    {{-- Icon --}}
</x-ui::footer.icon>

{{-- Good: Semantic footer element --}}
<x-ui::footer>
    {{-- Content in semantic <footer> tag --}}
</x-ui::footer>
```

---

## Related Components

- [Button](button.md) - Button component
- [Dropdown](dropdown.md) - Dropdown menus
- [Navbar](../navbar.md) - Navigation bar

---

## Tips & Tricks

### Newsletter Signup in Footer

```blade
<x-ui::footer>
    <div class="md:flex md:justify-between">
        <div class="mb-6 md:mb-0">
            <x-ui::footer.brand logo="/logo.svg" name="Flowbite" />
            <p class="mt-2 text-sm text-gray-500 dark:text-gray-400">
                Stay updated with the latest news and offers.
            </p>

            <form class="mt-4">
                <div class="flex gap-2">
                    <input
                        type="email"
                        placeholder="Enter your email"
                        class="flex-1 px-4 py-2 text-sm border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white"
                    >
                    <button type="submit" class="px-4 py-2 text-sm font-medium text-white bg-blue-700 rounded-lg hover:bg-blue-800">
                        Subscribe
                    </button>
                </div>
            </form>
        </div>

        <div class="grid grid-cols-2 gap-8 sm:gap-6 sm:grid-cols-3">
            {{-- Link groups --}}
        </div>
    </div>
</x-ui::footer>
```

### Multi-Language Footer

```blade
<x-ui::footer>
    {{-- Footer content --}}

    <x-ui::footer.divider />

    <div class="flex justify-between items-center">
        <x-ui::footer.copyright company="Flowbite" href="/" />

        <div class="flex items-center gap-2">
            <svg class="w-4 h-4 text-gray-500" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM4.332 8.027a6.012 6.012 0 011.912-2.706C6.512 5.73 6.974 6 7.5 6A1.5 1.5 0 019 7.5V8a2 2 0 004 0 2 2 0 011.523-1.943A5.977 5.977 0 0116 10c0 .34-.028.675-.083 1H15a2 2 0 00-2 2v2.197A5.973 5.973 0 0110 16v-2a2 2 0 00-2-2 2 2 0 01-2-2 2 2 0 00-1.668-1.973z" clip-rule="evenodd"/>
            </svg>
            <select class="text-sm text-gray-500 bg-transparent border-none focus:ring-0 dark:text-gray-400">
                <option>English (US)</option>
                <option>Türkçe</option>
                <option>Español</option>
                <option>Français</option>
            </select>
        </div>
    </div>
</x-ui::footer>
```

### App Download Links

```blade
<x-ui::footer.link-group title="Download Our App">
    <li class="mb-4">
        <a href="/download/ios" class="flex items-center hover:underline">
            <svg class="w-5 h-5 me-2" fill="currentColor" viewBox="0 0 20 20">
                <path d="M13.024 9.25c.47 0 .827-.12 1.17-.33.343-.21.59-.498.787-.867.197-.37.31-.795.31-1.28 0-.482-.113-.908-.31-1.277a2.365 2.365 0 00-.787-.867c-.343-.21-.7-.33-1.17-.33-.47 0-.827.12-1.17.33a2.365 2.365 0 00-.787.867c-.197.37-.31.795-.31 1.277 0 .485.113.91.31 1.28.197.37.444.656.787.867.343.21.7.33 1.17.33zm-3.898 7.351c1.136 0 2.143-.385 2.974-1.137.83-.752 1.406-1.767 1.708-2.994h-1.39c-.257.952-.666 1.697-1.237 2.212-.571.515-1.243.773-2.055.773-.97 0-1.773-.33-2.41-.99-.637-.66-.955-1.506-.955-2.539V8.073c0-1.033.318-1.88.955-2.54.637-.66 1.44-.99 2.41-.99.812 0 1.484.258 2.055.773.571.515.98 1.26 1.237 2.212h1.39c-.302-1.227-.877-2.242-1.708-2.994-.83-.752-1.838-1.137-2.974-1.137-1.513 0-2.74.5-3.68 1.499-.94.999-1.41 2.326-1.41 3.981v3.853c0 1.655.47 2.982 1.41 3.981.94.999 2.167 1.499 3.68 1.499z"/>
            </svg>
            App Store
        </a>
    </li>
    <li class="mb-4">
        <a href="/download/android" class="flex items-center hover:underline">
            <svg class="w-5 h-5 me-2" fill="currentColor" viewBox="0 0 20 20">
                <path d="M13.21 8.13l-2.21-3.83c-.13-.22-.42-.3-.64-.17-.22.13-.3.42-.17.64l2.21 3.83c-.79-.39-1.69-.61-2.65-.61-.96 0-1.86.22-2.65.61l2.21-3.83c.13-.22.05-.51-.17-.64-.22-.13-.51-.05-.64.17L6.79 8.13C4.72 9.24 3.3 11.3 3 13.75h14c-.3-2.45-1.72-4.51-3.79-5.62zM7.5 12.25c-.41 0-.75-.34-.75-.75s.34-.75.75-.75.75.34.75.75-.34.75-.75.75zm5 0c-.41 0-.75-.34-.75-.75s.34-.75.75-.75.75.34.75.75-.34.75-.75.75z"/>
            </svg>
            Google Play
        </a>
    </li>
</x-ui::footer.link-group>
```