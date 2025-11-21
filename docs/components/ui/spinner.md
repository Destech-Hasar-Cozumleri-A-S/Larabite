# Spinner

Loading animation component for indicating progress or processing states. Built with SVG and Tailwind CSS animations, following Flowbite design patterns.

## Component Location

`resources/views/components/ui/spinner.blade.php`

## Features

- 5 size options (xs, sm, md, lg, xl)
- 8 color variants (blue, gray, green, red, yellow, pink, purple, white)
- Smooth CSS animations with `animate-spin`
- Full dark mode support
- Accessible with proper ARIA attributes
- Screen reader friendly with customizable labels
- Inline and block display options
- Flowbite-compatible SVG design

## Usage

### Default Spinner

```blade
<x-ui.spinner />
```

### All Sizes

```blade
<x-ui.spinner size="xs" />  {{-- 16x16px --}}
<x-ui.spinner size="sm" />  {{-- 24x24px --}}
<x-ui.spinner size="md" />  {{-- 32x32px (default) --}}
<x-ui.spinner size="lg" />  {{-- 40x40px --}}
<x-ui.spinner size="xl" />  {{-- 48x48px --}}
```

### Color Variants

```blade
<x-ui.spinner color="blue" />    {{-- Default --}}
<x-ui.spinner color="gray" />
<x-ui.spinner color="green" />
<x-ui.spinner color="red" />
<x-ui.spinner color="yellow" />
<x-ui.spinner color="pink" />
<x-ui.spinner color="purple" />
<x-ui.spinner color="white" />   {{-- For dark backgrounds --}}
```

### Custom Screen Reader Label

```blade
<x-ui.spinner label="Processing payment..." />
<x-ui.spinner label="Uploading files..." />
<x-ui.spinner label="Searching database..." />
```

### With Loading Text

```blade
<div class="flex items-center gap-2">
    <x-ui.spinner size="sm" />
    <span>Loading...</span>
</div>
```

### Centered Spinner

```blade
<div class="text-center">
    <x-ui.spinner size="lg" />
</div>
```

### Text Alignment Options

```blade
{{-- Left aligned --}}
<div class="text-left">
    <x-ui.spinner size="md" />
</div>

{{-- Center aligned --}}
<div class="text-center">
    <x-ui.spinner size="md" />
</div>

{{-- Right aligned --}}
<div class="text-right">
    <x-ui.spinner size="md" />
</div>
```

## Props

| Prop | Type | Default | Description |
|------|------|---------|-------------|
| `size` | string | 'md' | Spinner size: xs, sm, md, lg, xl |
| `color` | string | 'blue' | Spinner color: blue, gray, green, red, yellow, pink, purple, white |
| `label` | string | 'Loading...' | Screen reader text for accessibility |

## Size Reference

- **xs** (16x16px): Extra small - For inline text or icons
- **sm** (24x24px): Small - For inline elements and compact spaces
- **md** (32x32px): Medium - Default size for most use cases
- **lg** (40x40px): Large - For prominent loading states
- **xl** (48x48px): Extra large - For full page or hero sections

## Color Reference

All colors support dark mode automatically:

- **blue**: Default blue spinner (primary brand color)
- **gray**: Neutral gray spinner
- **green**: Success/positive states
- **red**: Error/destructive states
- **yellow**: Warning states
- **pink**: Accent color variant
- **purple**: Alternative accent color
- **white**: For dark backgrounds or colored buttons

## Real-World Examples

### 1. Button Loading States

```blade
{{-- Primary Button --}}
<button
    type="submit"
    class="inline-flex items-center px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700"
    wire:loading.attr="disabled"
>
    <x-ui.spinner
        size="sm"
        color="white"
        class="me-2"
        wire:loading
        wire:target="submit"
    />
    <span wire:loading.remove wire:target="submit">Submit</span>
    <span wire:loading wire:target="submit">Submitting...</span>
</button>

{{-- Success Button --}}
<button class="inline-flex items-center px-4 py-2 bg-green-600 text-white rounded-lg">
    <x-ui.spinner size="sm" color="white" class="me-2" />
    Processing
</button>

{{-- Danger Button --}}
<button class="inline-flex items-center px-4 py-2 bg-red-600 text-white rounded-lg">
    <x-ui.spinner size="sm" color="white" class="me-2" />
    Deleting
</button>
```

### 2. Card Loading Overlay

```blade
<x-ui.card class="relative">
    {{-- Card content --}}
    <h3 class="text-xl font-bold">User Profile</h3>
    <p class="mt-2 text-gray-600 dark:text-gray-400">Loading user information...</p>

    {{-- Loading overlay --}}
    <div
        wire:loading
        wire:target="loadProfile"
        class="absolute inset-0 bg-white/80 dark:bg-gray-800/80 flex items-center justify-center rounded-lg"
    >
        <x-ui.spinner size="lg" color="blue" label="Loading profile..." />
    </div>
</x-ui.card>
```

### 3. Full Page Loading

```blade
<div
    wire:loading
    wire:target="initialize"
    class="fixed inset-0 bg-gray-900/50 dark:bg-gray-900/80 flex items-center justify-center z-50"
>
    <div class="bg-white dark:bg-gray-800 rounded-lg p-8 shadow-xl max-w-sm w-full mx-4">
        <div class="text-center">
            <x-ui.spinner size="xl" color="blue" label="Initializing application..." />
            <p class="mt-4 text-gray-700 dark:text-gray-300 font-medium">
                Loading, please wait...
            </p>
            <p class="mt-2 text-sm text-gray-500 dark:text-gray-400">
                This may take a few seconds
            </p>
        </div>
    </div>
</div>
```

### 4. Table/List Loading

```blade
<div class="overflow-x-auto">
    <table class="w-full" wire:loading.remove wire:target="loadUsers">
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
                <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->status }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div
        wire:loading
        wire:target="loadUsers"
        class="flex flex-col items-center justify-center py-12 space-y-4"
    >
        <x-ui.spinner size="lg" color="blue" />
        <p class="text-gray-600 dark:text-gray-400">Loading users...</p>
    </div>
</div>
```

### 5. Search Input with Spinner

```blade
<div class="relative">
    <x-ui.form.input
        type="search"
        placeholder="Search users..."
        wire:model.live.debounce.300ms="search"
    />

    <div
        wire:loading
        wire:target="search"
        class="absolute right-3 top-1/2 -translate-y-1/2"
    >
        <x-ui.spinner size="xs" color="gray" label="Searching..." />
    </div>
</div>

<div wire:loading wire:target="search" class="mt-2 flex items-center gap-2 text-sm text-gray-600 dark:text-gray-400">
    <x-ui.spinner size="xs" color="gray" />
    <span>Searching...</span>
</div>
```

### 6. Form Submission

```blade
<form wire:submit.prevent="saveProfile">
    <div class="space-y-4">
        <x-ui.form.input
            label="Full Name"
            name="name"
            wire:model="name"
        />

        <x-ui.form.input
            label="Email"
            type="email"
            name="email"
            wire:model="email"
        />

        <x-ui.form.textarea
            label="Bio"
            name="bio"
            wire:model="bio"
        />
    </div>

    <div class="mt-6 flex justify-end gap-3">
        <x-ui.button variant="outline" type="button">
            Cancel
        </x-ui.button>

        <x-ui.button
            variant="primary"
            type="submit"
            wire:loading.attr="disabled"
        >
            <span wire:loading.remove wire:target="saveProfile">
                Save Changes
            </span>
            <span wire:loading wire:target="saveProfile" class="inline-flex items-center gap-2">
                <x-ui.spinner size="sm" color="white" />
                Saving...
            </span>
        </x-ui.button>
    </div>
</form>
```

### 7. Infinite Scroll Loading

```blade
<div class="space-y-4">
    @foreach($posts as $post)
        <x-ui.card>
            <h3 class="font-bold">{{ $post->title }}</h3>
            <p class="mt-2 text-gray-600 dark:text-gray-400">{{ $post->excerpt }}</p>
        </x-ui.card>
    @endforeach

    {{-- Load more indicator --}}
    @if($hasMore)
        <div
            wire:loading
            wire:target="loadMore"
            class="flex justify-center py-8"
        >
            <div class="text-center space-y-3">
                <x-ui.spinner size="lg" color="blue" />
                <p class="text-sm text-gray-600 dark:text-gray-400">Loading more posts...</p>
            </div>
        </div>
    @endif
</div>
```

### 8. Upload Progress

```blade
<div class="space-y-4">
    <x-ui.form.file-input
        label="Upload Files"
        wire:model="files"
    />

    <div
        wire:loading
        wire:target="files"
        class="flex items-center gap-3 p-4 bg-blue-50 dark:bg-blue-900/20 rounded-lg"
    >
        <x-ui.spinner size="md" color="blue" />
        <div>
            <p class="text-sm font-medium text-blue-900 dark:text-blue-100">
                Uploading files...
            </p>
            <p class="text-xs text-blue-700 dark:text-blue-300">
                Please wait while we process your files
            </p>
        </div>
    </div>
</div>
```

### 9. Modal Processing State

```blade
<div
    x-show="showModal"
    class="fixed inset-0 bg-gray-900/50 flex items-center justify-center z-50"
>
    <div class="bg-white dark:bg-gray-800 rounded-lg shadow-xl max-w-md w-full mx-4">
        <div class="p-6">
            <h3 class="text-lg font-bold text-gray-900 dark:text-white">
                Confirm Action
            </h3>

            <div wire:loading.remove wire:target="confirmDelete">
                <p class="mt-2 text-gray-600 dark:text-gray-400">
                    Are you sure you want to delete this item?
                </p>

                <div class="mt-6 flex justify-end gap-3">
                    <x-ui.button variant="outline" @click="showModal = false">
                        Cancel
                    </x-ui.button>
                    <x-ui.button variant="danger" wire:click="confirmDelete">
                        Delete
                    </x-ui.button>
                </div>
            </div>

            <div
                wire:loading
                wire:target="confirmDelete"
                class="py-8 text-center"
            >
                <x-ui.spinner size="lg" color="red" />
                <p class="mt-4 text-gray-700 dark:text-gray-300">
                    Deleting item...
                </p>
            </div>
        </div>
    </div>
</div>
```

### 10. Multi-Step Progress

```blade
<div class="space-y-6">
    {{-- Step indicator with spinners --}}
    <div class="flex items-center justify-between">
        <div class="flex items-center gap-2">
            <x-ui.spinner
                size="sm"
                color="green"
                wire:loading.remove
                wire:target="step1"
            />
            <span class="text-sm font-medium text-green-600 dark:text-green-400">
                Step 1 Complete
            </span>
        </div>

        <div class="flex items-center gap-2">
            <x-ui.spinner
                size="sm"
                color="blue"
                wire:loading
                wire:target="step2"
            />
            <span class="text-sm font-medium text-blue-600 dark:text-blue-400">
                Processing Step 2...
            </span>
        </div>

        <div class="flex items-center gap-2">
            <div class="w-5 h-5 rounded-full border-2 border-gray-300 dark:border-gray-600"></div>
            <span class="text-sm text-gray-500 dark:text-gray-400">
                Step 3 Pending
            </span>
        </div>
    </div>
</div>
```

## Best Practices

### 1. Size Selection

- **xs**: Inline with text, icons, or very compact UI elements
- **sm**: Small buttons, input fields, inline indicators
- **md**: Default for most cards, forms, and content areas
- **lg**: Prominent loading states, modals, important actions
- **xl**: Full-page loading, hero sections, splash screens

### 2. Color Usage

- Use **blue** as default for general loading states
- Use **green** for success operations (saving, uploading)
- Use **red** for delete/destructive operations
- Use **gray** for neutral contexts
- Use **white** inside colored buttons or dark backgrounds
- Use **yellow** for warning states
- Use **pink/purple** for accent features

### 3. Accessibility

```blade
{{-- Always provide meaningful labels --}}
<x-ui.spinner label="Loading user profile..." />
<x-ui.spinner label="Processing payment..." />
<x-ui.spinner label="Uploading files..." />

{{-- The component automatically includes: --}}
{{-- role="status" on wrapper --}}
{{-- aria-hidden="true" on SVG --}}
{{-- <span class="sr-only"> for screen readers --}}
```

### 4. Loading States

```blade
{{-- Replace content with spinner --}}
<div wire:loading.remove wire:target="loadData">
    <!-- Content here -->
</div>
<div wire:loading wire:target="loadData">
    <x-ui.spinner />
</div>

{{-- Overlay spinner on top of content --}}
<div class="relative">
    <!-- Content here -->
    <div wire:loading class="absolute inset-0 bg-white/80 flex items-center justify-center">
        <x-ui.spinner />
    </div>
</div>
```

### 5. Inline vs Block

```blade
{{-- Inline (default) --}}
<x-ui.spinner size="sm" /> {{-- Displays inline-block --}}

{{-- Centered block --}}
<div class="text-center">
    <x-ui.spinner size="lg" />
</div>

{{-- Flex layout --}}
<div class="flex items-center justify-center">
    <x-ui.spinner />
</div>
```

### 6. Timeout Handling

```blade
<div x-data="{ showTimeout: false }" x-init="setTimeout(() => showTimeout = true, 10000)">
    <div wire:loading wire:target="longRunningTask">
        <x-ui.spinner size="lg" />
        <p class="mt-4 text-gray-600" x-show="!showTimeout">
            Loading...
        </p>
        <p class="mt-4 text-yellow-600" x-show="showTimeout">
            This is taking longer than expected. Please wait...
        </p>
    </div>
</div>
```

### 7. Contextual Loading Messages

```blade
{{-- Payment processing --}}
<x-ui.spinner color="green" label="Processing your payment..." />

{{-- File upload --}}
<x-ui.spinner color="blue" label="Uploading 3 files..." />

{{-- Data sync --}}
<x-ui.spinner color="blue" label="Syncing data with server..." />

{{-- Delete operation --}}
<x-ui.spinner color="red" label="Deleting item..." />
```

### 8. Performance

- Spinners use pure CSS animations (no JavaScript required)
- SVG format ensures crisp rendering at any size
- Minimal DOM footprint
- GPU-accelerated with `transform` animations
- No external dependencies

### 9. Dark Mode

```blade
{{-- All colors automatically support dark mode --}}
<x-ui.spinner color="blue" />   {{-- Adapts to dark mode --}}
<x-ui.spinner color="gray" />   {{-- Adapts to dark mode --}}

{{-- Use white for dark backgrounds specifically --}}
<div class="bg-gray-900 p-4">
    <x-ui.spinner color="white" />
</div>
```

### 10. Button Integration

```blade
{{-- Left-aligned spinner in button --}}
<button class="inline-flex items-center gap-2">
    <x-ui.spinner size="sm" color="white" />
    Processing
</button>

{{-- Right-aligned spinner in button --}}
<button class="inline-flex items-center gap-2">
    Submit
    <x-ui.spinner size="sm" color="white" />
</button>
```

## Accessibility

The spinner component follows WCAG 2.1 AA guidelines:

```html
<div role="status" class="inline-block">
    <svg aria-hidden="true" class="animate-spin ...">
        <!-- SVG paths -->
    </svg>
    <span class="sr-only">Loading...</span>
</div>
```

**Accessibility Features:**

1. **role="status"**: Indicates a status message to assistive technologies
2. **aria-hidden="true"**: Hides decorative SVG from screen readers
3. **sr-only**: Provides text alternative for screen reader users
4. **Customizable labels**: Meaningful context for different operations

**Testing:**

```bash
# Test with screen reader (macOS VoiceOver)
# Should announce: "Loading..." or custom label

# Test keyboard navigation
# Spinner should not interfere with tab order

# Test color contrast
# All color variants meet WCAG AA standards
```

## Technical Details

**SVG Structure:**

```xml
<svg viewBox="0 0 100 101" fill="none">
    <!-- Background ring (light gray) -->
    <path fill="currentColor" ... />

    <!-- Animated segment (colored) -->
    <path fill="currentFill" ... />
</svg>
```

**Animation:**

- Uses Tailwind's `animate-spin` utility
- 1 second rotation duration
- Linear timing function
- Infinite loop

**Color Implementation:**

- `text-{color}`: Background ring color (via `currentColor`)
- `fill-{color}`: Animated segment color (via `currentFill`)
- Dark mode: Automatically adjusts opacity and colors

## Related Components

- [Button](button.md) - Buttons with loading states
- [Progress](progress.md) - Progress bars and indicators
- [Alert](alert.md) - Alert messages
- [Skeleton](skeleton.md) - Loading state placeholders