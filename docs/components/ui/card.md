# Card

Flexible container component for content cards with images, text, lists, forms, and more.

## Component Location

`resources/views/components/ui/card.blade.php`

## Features

- Flexible slot-based content structure
- 5 shadow levels (none, sm, md, lg, xl)
- Hover effect support
- Padding control
- Dark mode support
- Responsive design
- Border and rounded corners
- Full content composition control

## Usage

### Basic Card

```blade
<x-ui.card>
    <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-2">
        Noteworthy technology acquisitions 2021
    </h3>
    <p class="text-gray-700 dark:text-gray-400">
        Here are the biggest enterprise technology acquisitions of 2021 so far, in reverse chronological order.
    </p>
</x-ui.card>
```

### Card with Action Button

```blade
<x-ui.card>
    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
        Noteworthy technology acquisitions 2021
    </h5>
    <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">
        Here are the biggest enterprise technology acquisitions of 2021 so far.
    </p>
    <x-ui.button variant="primary" size="sm">
        Read more
    </x-ui.button>
</x-ui.card>
```

### Shadow Variants

```blade
{{-- No shadow --}}
<x-ui.card shadow="none">
    <p>Card with no shadow effect.</p>
</x-ui.card>

{{-- Small shadow (default) --}}
<x-ui.card shadow="sm">
    <p>Card with small shadow.</p>
</x-ui.card>

{{-- Medium shadow --}}
<x-ui.card shadow="md">
    <p>Card with medium shadow.</p>
</x-ui.card>

{{-- Large shadow --}}
<x-ui.card shadow="lg">
    <p>Card with large shadow.</p>
</x-ui.card>

{{-- Extra large shadow --}}
<x-ui.card shadow="xl">
    <p>Card with extra large shadow.</p>
</x-ui.card>
```

### Card with Image

```blade
<x-ui.card :padding="false" class="max-w-sm">
    <img class="rounded-t-lg" src="/images/blog/image-1.jpg" alt="Blog post cover" />
    <div class="p-5">
        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
            Noteworthy technology acquisitions 2021
        </h5>
        <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">
            Here are the biggest enterprise technology acquisitions of 2021.
        </p>
        <x-ui.button variant="primary" size="sm">
            Read more
        </x-ui.button>
    </div>
</x-ui.card>
```

### Horizontal Card

```blade
<x-ui.card :padding="false" class="flex flex-col md:flex-row md:max-w-xl">
    <img class="object-cover w-full rounded-t-lg h-96 md:h-auto md:w-48 md:rounded-none md:rounded-s-lg" src="/images/blog/image-4.jpg" alt="Blog image">
    <div class="flex flex-col justify-between p-4 leading-normal">
        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
            Noteworthy technology acquisitions 2021
        </h5>
        <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">
            Here are the biggest enterprise technology acquisitions of 2021.
        </p>
    </div>
</x-ui.card>
```

### User Profile Card

```blade
<x-ui.card class="max-w-sm">
    <div class="flex flex-col items-center pb-10">
        <img class="w-24 h-24 mb-3 rounded-full shadow-lg" src="/images/people/profile-picture-3.jpg" alt="Bonnie Green"/>
        <h5 class="mb-1 text-xl font-medium text-gray-900 dark:text-white">Bonnie Green</h5>
        <span class="text-sm text-gray-500 dark:text-gray-400">Visual Designer</span>
        <div class="flex mt-4 md:mt-6">
            <x-ui.button variant="primary" size="sm" class="me-2">Add friend</x-ui.button>
            <x-ui.button variant="secondary" :outline="true" size="sm">Message</x-ui.button>
        </div>
    </div>
</x-ui.card>
```

### Pricing Card

```blade
<x-ui.card class="max-w-sm">
    <h5 class="mb-4 text-xl font-medium text-gray-500 dark:text-gray-400">Standard plan</h5>
    <div class="flex items-baseline text-gray-900 dark:text-white">
        <span class="text-3xl font-semibold">$</span>
        <span class="text-5xl font-extrabold tracking-tight">49</span>
        <span class="ms-1 text-xl font-normal text-gray-500 dark:text-gray-400">/month</span>
    </div>
    <ul role="list" class="space-y-5 my-7">
        <li class="flex items-center">
            <svg class="flex-shrink-0 w-4 h-4 text-blue-600 dark:text-blue-500" fill="currentColor" viewBox="0 0 20 20">
                <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z"/>
            </svg>
            <span class="text-base font-normal leading-tight text-gray-500 dark:text-gray-400 ms-3">2 team members</span>
        </li>
        <li class="flex items-center">
            <svg class="flex-shrink-0 w-4 h-4 text-blue-600 dark:text-blue-500" fill="currentColor" viewBox="0 0 20 20">
                <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z"/>
            </svg>
            <span class="text-base font-normal leading-tight text-gray-500 dark:text-gray-400 ms-3">20GB Cloud storage</span>
        </li>
    </ul>
    <x-ui.button variant="primary" class="w-full">
        Choose plan
    </x-ui.button>
</x-ui.card>
```

### Hover Effect Card

```blade
<x-ui.card :hover="true" shadow="md" class="max-w-sm cursor-pointer">
    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
        Noteworthy technology acquisitions 2021
    </h5>
    <p class="font-normal text-gray-700 dark:text-gray-400">
        Here are the biggest enterprise technology acquisitions of 2021.
    </p>
</x-ui.card>
```

### Empty State Card

```blade
<x-ui.card class="text-center py-12">
    <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 13h6m-3-3v6m-9 1V7a2 2 0 012-2h6l2 2h6a2 2 0 012 2v8a2 2 0 01-2 2H5a2 2 0 01-2-2z" />
    </svg>
    <h3 class="mt-2 text-sm font-semibold text-gray-900 dark:text-white">No projects</h3>
    <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">Get started by creating a new project.</p>
    <div class="mt-6">
        <x-ui.button variant="primary" size="sm">
            New Project
        </x-ui.button>
    </div>
</x-ui.card>
```

## Props

| Prop | Type | Default | Description |
|------|------|---------|-------------|
| `padding` | boolean | true | Add content padding (p-6) |
| `shadow` | string | 'sm' | Shadow level: none, sm, md, lg, xl |
| `hover` | boolean | false | Enable hover effect (shadow growth) |

## CSS Classes

- **Background**: `bg-white` (light mode), `dark:bg-gray-800` (dark mode)
- **Border**: `border border-gray-200` (light), `dark:border-gray-700` (dark)
- **Rounded**: `rounded-lg`
- **Padding**: `p-6` (when padding=true)

## Best Practices

1. **Padding Control**: Use `padding="false"` for cards with images, then add manual padding to content areas
2. **Shadow Levels**: Use appropriate shadows based on importance (sm for lists, lg for modals)
3. **Hover Effect**: Always add `cursor-pointer` class when using hover effects
4. **Dark Mode**: Ensure all text content has appropriate dark mode colors
5. **Responsive**: Use responsive classes for grid layouts containing cards
6. **Image Usage**: Use `rounded-t-lg` for top images, `rounded-lg` for full images
7. **Accessibility**: Use semantic HTML and appropriate ARIA attributes for interactive cards
8. **Livewire**: Add `wire:key` for dynamic cards in lists
9. **Performance**: Avoid large shadows when displaying 50+ cards on a single page
10. **Combining Components**: Cards work well with avatar, badge, button, and other UI components