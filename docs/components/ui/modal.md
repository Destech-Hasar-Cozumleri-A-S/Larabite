# Modal Component

The Modal component displays dialog boxes and overlays on top of the main content. It's perfect for forms, confirmations, alerts, notifications, and any content that requires user focus and interaction.

## Components

- `<x-ui.modal>` - Main modal container with backdrop
- `<x-ui.modal.header>` - Modal header with title and close button
- `<x-ui.modal.body>` - Scrollable content area
- `<x-ui.modal.footer>` - Action buttons footer
- `<x-ui.modal.trigger>` - Button to open modal

## Basic Usage

### Default Modal

A basic modal with header, body, and footer:

```blade
{{-- Trigger Button --}}
<x-ui.modal.trigger target="default-modal">
    <x-ui.button variant="primary">Open Modal</x-ui.button>
</x-ui.modal.trigger>

{{-- Modal --}}
<x-ui.modal id="default-modal">
    <x-ui.modal.header title="Terms of Service" />

    <x-ui.modal.body>
        <p class="text-base leading-relaxed text-gray-500 dark:text-gray-400">
            With less than a month to go before the European Union enacts new consumer privacy laws for its citizens, companies around the world are updating their terms of service agreements to comply.
        </p>
        <p class="text-base leading-relaxed text-gray-500 dark:text-gray-400">
            The European Union's General Data Protection Regulation (G.D.P.R.) goes into effect on May 25 and is meant to ensure a common set of data rights in the European Union.
        </p>
    </x-ui.modal.body>

    <x-ui.modal.footer>
        <x-ui.button variant="primary" @click="open = false">
            I accept
        </x-ui.button>
        <x-ui.button variant="light" @click="open = false">
            Decline
        </x-ui.button>
    </x-ui.modal.footer>
</x-ui.modal>
```

### Alternative Trigger Method

You can also trigger modals using Alpine.js directly:

```blade
<button
    type="button"
    @click="$dispatch('open-modal', 'my-modal')"
    class="px-4 py-2 bg-blue-600 text-white rounded-lg"
>
    Open Modal
</button>

<div x-data @open-modal.window="if ($event.detail === 'my-modal') open = true">
    <x-ui.modal id="my-modal">
        {{-- Modal content --}}
    </x-ui.modal>
</div>
```

## Modal Sizes

Control the width of your modal:

```blade
{{-- Small (max-w-md) --}}
<x-ui.modal size="sm">
    <x-ui.modal.header title="Small Modal" />
    <x-ui.modal.body>
        <p>This is a small modal</p>
    </x-ui.modal.body>
</x-ui.modal>

{{-- Medium/Default (max-w-lg) --}}
<x-ui.modal size="md">
    <x-ui.modal.header title="Medium Modal" />
    <x-ui.modal.body>
        <p>This is a medium modal</p>
    </x-ui.modal.body>
</x-ui.modal>

{{-- Large (max-w-4xl) --}}
<x-ui.modal size="lg">
    <x-ui.modal.header title="Large Modal" />
    <x-ui.modal.body>
        <p>This is a large modal</p>
    </x-ui.modal.body>
</x-ui.modal>

{{-- Extra Large (max-w-7xl) --}}
<x-ui.modal size="xl">
    <x-ui.modal.header title="Extra Large Modal" />
    <x-ui.modal.body>
        <p>This is an extra large modal</p>
    </x-ui.modal.body>
</x-ui.modal>

{{-- Full Screen --}}
<x-ui.modal size="full">
    <x-ui.modal.header title="Full Screen Modal" />
    <x-ui.modal.body>
        <p>This modal takes up the full screen</p>
    </x-ui.modal.body>
</x-ui.modal>
```

## Modal Positioning

Position your modal vertically:

```blade
{{-- Top positioned --}}
<x-ui.modal position="top">
    <x-ui.modal.header title="Top Modal" />
    <x-ui.modal.body>
        <p>This modal appears at the top</p>
    </x-ui.modal.body>
</x-ui.modal>

{{-- Center positioned (default) --}}
<x-ui.modal position="center">
    <x-ui.modal.header title="Centered Modal" />
    <x-ui.modal.body>
        <p>This modal is vertically centered</p>
    </x-ui.modal.body>
</x-ui.modal>

{{-- Bottom positioned --}}
<x-ui.modal position="bottom">
    <x-ui.modal.header title="Bottom Modal" />
    <x-ui.modal.body>
        <p>This modal appears at the bottom</p>
    </x-ui.modal.body>
</x-ui.modal>
```

## Static Backdrop

Prevent closing when clicking outside the modal:

```blade
<x-ui.modal :staticBackdrop="true">
    <x-ui.modal.header title="Important Action" />

    <x-ui.modal.body>
        <p class="text-base text-gray-500 dark:text-gray-400">
            This action cannot be undone. Please confirm you want to proceed.
        </p>
    </x-ui.modal.body>

    <x-ui.modal.footer>
        <x-ui.button variant="danger" @click="open = false">
            Confirm Delete
        </x-ui.button>
        <x-ui.button variant="light" @click="open = false">
            Cancel
        </x-ui.button>
    </x-ui.modal.footer>
</x-ui.modal>
```

## Auto-show Modal

Display modal on page load:

```blade
<x-ui.modal :show="true">
    <x-ui.modal.header title="Welcome!" />

    <x-ui.modal.body>
        <p>Welcome to our application! Here's a quick tour...</p>
    </x-ui.modal.body>

    <x-ui.modal.footer>
        <x-ui.button variant="primary" @click="open = false">
            Get Started
        </x-ui.button>
    </x-ui.modal.footer>
</x-ui.modal>
```

## Props

### Modal Container (`ui.modal`)

| Prop | Type | Default | Description |
|------|------|---------|-------------|
| `id` | string | auto-generated | Unique identifier for the modal |
| `size` | string | `'md'` | Modal width: `sm`, `md`, `lg`, `xl`, `full` |
| `position` | string | `'center'` | Vertical position: `top`, `center`, `bottom` |
| `staticBackdrop` | boolean | `false` | Prevent closing on backdrop click |
| `show` | boolean | `false` | Show modal on page load |

### Modal Header (`ui.modal.header`)

| Prop | Type | Default | Description |
|------|------|---------|-------------|
| `title` | string | `null` | Header title text |
| `closeable` | boolean | `true` | Show close button |

### Modal Body (`ui.modal.body`)

| Prop | Type | Default | Description |
|------|------|---------|-------------|
| `scrollable` | boolean | `true` | Enable scrolling for tall content |

### Modal Footer (`ui.modal.footer`)

| Prop | Type | Default | Description |
|------|------|---------|-------------|
| `align` | string | `'end'` | Button alignment: `start`, `center`, `end`, `between` |

### Modal Trigger (`ui.modal.trigger`)

| Prop | Type | Default | Description |
|------|------|---------|-------------|
| `target` | string | `null` | ID of the modal to open |

## Real-World Examples

### Confirmation Modal

```blade
<x-ui.modal.trigger target="delete-modal">
    <x-ui.button variant="danger">Delete Account</x-ui.button>
</x-ui.modal.trigger>

<x-ui.modal id="delete-modal" size="sm">
    <x-ui.modal.body class="text-center">
        <svg class="mx-auto mb-4 text-gray-400 w-12 h-12 dark:text-gray-200" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
        </svg>
        <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">
            Are you sure you want to delete your account?
        </h3>
        <div class="flex justify-center gap-4">
            <x-ui.button
                variant="danger"
                @click="open = false"
                wire:click="deleteAccount"
            >
                Yes, I'm sure
            </x-ui.button>
            <x-ui.button variant="light" @click="open = false">
                No, cancel
            </x-ui.button>
        </div>
    </x-ui.modal.body>
</x-ui.modal>
```

### Form Modal

```blade
<x-ui.modal.trigger target="login-modal">
    <x-ui.button variant="primary">Sign In</x-ui.button>
</x-ui.modal.trigger>

<x-ui.modal id="login-modal">
    <x-ui.modal.header title="Sign in to our platform" />

    <x-ui.modal.body>
        <form class="space-y-6" action="#">
            <div>
                <x-ui.form.input
                    label="Your email"
                    type="email"
                    name="email"
                    placeholder="name@company.com"
                    required
                />
            </div>
            <div>
                <x-ui.form.input
                    label="Your password"
                    type="password"
                    name="password"
                    placeholder="••••••••"
                    required
                />
            </div>
            <div class="flex justify-between">
                <x-ui.form.checkbox name="remember">
                    Remember me
                </x-ui.form.checkbox>
                <a href="/forgot-password" class="text-sm text-blue-700 hover:underline dark:text-blue-500">
                    Lost Password?
                </a>
            </div>
            <x-ui.button variant="primary" type="submit" class="w-full">
                Login to your account
            </x-ui.button>
            <div class="text-sm font-medium text-gray-500 dark:text-gray-300">
                Not registered?
                <a href="/register" class="text-blue-700 hover:underline dark:text-blue-500">
                    Create account
                </a>
            </div>
        </form>
    </x-ui.modal.body>
</x-ui.modal>
```

### CRUD Modal

```blade
<x-ui.modal.trigger target="create-pet-modal">
    <x-ui.button variant="primary">Add New Pet</x-ui.button>
</x-ui.modal.trigger>

<x-ui.modal id="create-pet-modal" size="lg">
    <x-ui.modal.header title="Add New Pet" />

    <x-ui.modal.body>
        <form wire:submit.prevent="createPet" class="space-y-4">
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <x-ui.form.input
                        label="Pet Name"
                        name="name"
                        wire:model="name"
                        required
                    />
                </div>
                <div>
                    <x-ui.form.select
                        label="Species"
                        name="species"
                        wire:model="species"
                        required
                    >
                        <option value="">Select species</option>
                        <option value="dog">Dog</option>
                        <option value="cat">Cat</option>
                        <option value="bird">Bird</option>
                        <option value="other">Other</option>
                    </x-ui.form.select>
                </div>
            </div>

            <div class="grid grid-cols-2 gap-4">
                <div>
                    <x-ui.form.input
                        label="Breed"
                        name="breed"
                        wire:model="breed"
                    />
                </div>
                <div>
                    <x-ui.form.input
                        label="Date of Birth"
                        type="date"
                        name="birth_date"
                        wire:model="birth_date"
                    />
                </div>
            </div>

            <div>
                <x-ui.form.textarea
                    label="Description"
                    name="description"
                    wire:model="description"
                    rows="4"
                />
            </div>

            <div>
                <x-ui.form.file-input
                    label="Pet Photo"
                    name="photo"
                    wire:model="photo"
                />
            </div>
        </form>
    </x-ui.modal.body>

    <x-ui.modal.footer>
        <x-ui.button variant="primary" wire:click="createPet">
            Add Pet
        </x-ui.button>
        <x-ui.button variant="light" @click="open = false">
            Cancel
        </x-ui.button>
    </x-ui.modal.footer>
</x-ui.modal>
```

### Image Gallery Modal

```blade
<x-ui.modal id="image-modal" size="xl">
    <x-ui.modal.header title="Image Gallery" />

    <x-ui.modal.body>
        <div class="grid grid-cols-3 gap-4">
            @foreach($images as $image)
                <img
                    src="{{ $image->url }}"
                    alt="{{ $image->alt }}"
                    class="h-auto max-w-full rounded-lg cursor-pointer hover:opacity-75"
                    @click="selectedImage = '{{ $image->url }}'"
                >
            @endforeach
        </div>
    </x-ui.modal.body>
</x-ui.modal>
```

### Notification Modal

```blade
<x-ui.modal id="notification-modal" size="sm" position="top">
    <x-ui.modal.body class="text-center">
        <div class="mx-auto mb-4 flex items-center justify-center w-12 h-12 rounded-full bg-green-100 dark:bg-green-900">
            <svg class="w-6 h-6 text-green-600 dark:text-green-300" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
            </svg>
        </div>
        <h3 class="mb-2 text-lg font-semibold text-gray-900 dark:text-white">
            Success!
        </h3>
        <p class="mb-4 text-gray-500 dark:text-gray-400">
            Your pet profile has been created successfully.
        </p>
        <x-ui.button variant="primary" @click="open = false">
            Continue
        </x-ui.button>
    </x-ui.modal.body>
</x-ui.modal>
```

### Progress Modal

```blade
<x-ui.modal id="upload-progress-modal" size="md" :staticBackdrop="true">
    <x-ui.modal.header title="Uploading Files" :closeable="false" />

    <x-ui.modal.body>
        <div class="space-y-4">
            <div>
                <div class="flex justify-between mb-1">
                    <span class="text-sm font-medium text-gray-700 dark:text-gray-300">
                        Photo 1.jpg
                    </span>
                    <span class="text-sm font-medium text-gray-700 dark:text-gray-300">
                        45%
                    </span>
                </div>
                <div class="w-full bg-gray-200 rounded-full h-2.5 dark:bg-gray-700">
                    <div class="bg-blue-600 h-2.5 rounded-full" style="width: 45%"></div>
                </div>
            </div>

            <div>
                <div class="flex justify-between mb-1">
                    <span class="text-sm font-medium text-gray-700 dark:text-gray-300">
                        Photo 2.jpg
                    </span>
                    <span class="text-sm font-medium text-gray-700 dark:text-gray-300">
                        100%
                    </span>
                </div>
                <div class="w-full bg-gray-200 rounded-full h-2.5 dark:bg-gray-700">
                    <div class="bg-green-600 h-2.5 rounded-full" style="width: 100%"></div>
                </div>
            </div>
        </div>
    </x-ui.modal.body>
</x-ui.modal>
```

### Selection Modal (Radio)

```blade
<x-ui.modal id="payment-method-modal">
    <x-ui.modal.header title="Choose Payment Method" />

    <x-ui.modal.body>
        <ul class="space-y-3">
            <li>
                <x-ui.form.radio
                    name="payment_method"
                    value="credit_card"
                    id="credit_card"
                >
                    <div class="flex items-center gap-3">
                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M4 4a2 2 0 00-2 2v1h16V6a2 2 0 00-2-2H4z"/>
                            <path fill-rule="evenodd" d="M18 9H2v5a2 2 0 002 2h12a2 2 0 002-2V9zM4 13a1 1 0 011-1h1a1 1 0 110 2H5a1 1 0 01-1-1zm5-1a1 1 0 100 2h1a1 1 0 100-2H9z" clip-rule="evenodd"/>
                        </svg>
                        <div>
                            <div class="font-semibold">Credit Card</div>
                            <div class="text-sm text-gray-500">Pay with credit or debit card</div>
                        </div>
                    </div>
                </x-ui.form.radio>
            </li>

            <li>
                <x-ui.form.radio
                    name="payment_method"
                    value="paypal"
                    id="paypal"
                >
                    <div class="flex items-center gap-3">
                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M4 4a2 2 0 00-2 2v4a2 2 0 002 2V6h10a2 2 0 00-2-2H4zm2 6a2 2 0 012-2h8a2 2 0 012 2v4a2 2 0 01-2 2H8a2 2 0 01-2-2v-4zm6 4a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"/>
                        </svg>
                        <div>
                            <div class="font-semibold">PayPal</div>
                            <div class="text-sm text-gray-500">Pay with PayPal account</div>
                        </div>
                    </div>
                </x-ui.form.radio>
            </li>

            <li>
                <x-ui.form.radio
                    name="payment_method"
                    value="bank_transfer"
                    id="bank_transfer"
                >
                    <div class="flex items-center gap-3">
                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M8.433 7.418c.155-.103.346-.196.567-.267v1.698a2.305 2.305 0 01-.567-.267C8.07 8.34 8 8.114 8 8c0-.114.07-.34.433-.582zM11 12.849v-1.698c.22.071.412.164.567.267.364.243.433.468.433.582 0 .114-.07.34-.433.582a2.305 2.305 0 01-.567.267z"/>
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-13a1 1 0 10-2 0v.092a4.535 4.535 0 00-1.676.662C6.602 6.234 6 7.009 6 8c0 .99.602 1.765 1.324 2.246.48.32 1.054.545 1.676.662v1.941c-.391-.127-.68-.317-.843-.504a1 1 0 10-1.51 1.31c.562.649 1.413 1.076 2.353 1.253V15a1 1 0 102 0v-.092a4.535 4.535 0 001.676-.662C13.398 13.766 14 12.991 14 12c0-.99-.602-1.765-1.324-2.246A4.535 4.535 0 0011 9.092V7.151c.391.127.68.317.843.504a1 1 0 101.511-1.31c-.563-.649-1.413-1.076-2.354-1.253V5z" clip-rule="evenodd"/>
                        </svg>
                        <div>
                            <div class="font-semibold">Bank Transfer</div>
                            <div class="text-sm text-gray-500">Direct bank account transfer</div>
                        </div>
                    </div>
                </x-ui.form.radio>
            </li>
        </ul>
    </x-ui.modal.body>

    <x-ui.modal.footer>
        <x-ui.button variant="primary" @click="open = false">
            Continue
        </x-ui.button>
    </x-ui.modal.footer>
</x-ui.modal>
```

## Livewire Integration

### Opening Modal from Livewire

```blade
{{-- Livewire Component --}}
<div>
    <x-ui.button wire:click="openEditModal({{ $pet->id }})">
        Edit Pet
    </x-ui.button>

    <div x-data @open-edit-modal.window="open = true">
        <x-ui.modal id="edit-pet-modal">
            <x-ui.modal.header title="Edit Pet: {{ $editingPet?->name }}" />

            <x-ui.modal.body>
                @if($editingPet)
                    <form wire:submit.prevent="updatePet">
                        <x-ui.form.input
                            label="Pet Name"
                            wire:model="editingPet.name"
                        />
                        {{-- More fields --}}
                    </form>
                @endif
            </x-ui.modal.body>

            <x-ui.modal.footer>
                <x-ui.button variant="primary" wire:click="updatePet">
                    Save Changes
                </x-ui.button>
                <x-ui.button variant="light" @click="open = false">
                    Cancel
                </x-ui.button>
            </x-ui.modal.footer>
        </x-ui.modal>
    </div>
</div>

{{-- Livewire Component Class --}}
public function openEditModal($petId)
{
    $this->editingPet = Pet::find($petId);
    $this->dispatch('open-edit-modal');
}
```

### Closing Modal After Action

```blade
<x-ui.modal id="delete-confirmation">
    <x-ui.modal.header title="Confirm Deletion" />

    <x-ui.modal.body>
        <p>Are you sure you want to delete this item?</p>
    </x-ui.modal.body>

    <x-ui.modal.footer>
        <x-ui.button
            variant="danger"
            wire:click="deleteItem"
            @click="open = false"
        >
            Delete
        </x-ui.button>
        <x-ui.button variant="light" @click="open = false">
            Cancel
        </x-ui.button>
    </x-ui.modal.footer>
</x-ui.modal>
```

## Accessibility

The Modal component includes several accessibility features:

1. **Focus Management**: Modal traps focus when open
2. **Keyboard Support**: Escape key closes modal (unless static backdrop)
3. **ARIA Attributes**: `aria-hidden` indicates visibility state, `tabindex="-1"` for proper focus
4. **Screen Reader Support**: Close button includes "Close modal" label with `sr-only`
5. **Semantic HTML**: Proper heading hierarchy in modal content
6. **Backdrop Click**: Click outside to close (configurable)

## Best Practices

### Do's

- Use modals for important actions requiring user attention
- Keep modal content focused and concise
- Provide clear action buttons (primary and secondary)
- Use appropriate size for content amount
- Include a visible close button
- Use static backdrop for critical confirmations
- Test keyboard navigation (Tab, Escape)

### Don'ts

- Don't nest modals within modals
- Don't use modals for large amounts of content (use separate pages)
- Don't auto-open modals on every page load (annoying)
- Don't make modals too small or too large
- Don't use modals for non-critical information
- Don't forget mobile responsiveness

## Dark Mode

The Modal component automatically adapts to dark mode with appropriate color adjustments for:
- Background colors
- Border colors
- Text colors
- Backdrop opacity
- Close button hover states

## Browser Compatibility

The Modal component works across all modern browsers:
- Chrome/Edge (latest)
- Firefox (latest)
- Safari (latest)
- Opera (latest)

Requires Alpine.js for interactivity.

## Related Components

- [Alert](alert.md) - For inline notifications
- [Banner](banner.md) - For top/bottom page alerts
- [Button](button.md) - Modal triggers and actions
- [Form Components](../forms/overview.md) - Form inputs in modals
- [Card](card.md) - Alternative container pattern

## Tips & Tricks

### Programmatic Control

```blade
{{-- Open modal programmatically --}}
<button @click="$refs.modal.__x.$data.open = true">
    Open
</button>

<div x-ref="modal">
    <x-ui.modal>
        {{-- Content --}}
    </x-ui.modal>
</div>
```

### Confirm Before Close

```blade
<x-ui.modal x-data="{ hasChanges: false }">
    <x-ui.modal.header>
        <h3 @click="if(hasChanges && !confirm('You have unsaved changes. Close anyway?')) { $event.stopPropagation(); return; } else { open = false; }">
            Edit Form
        </h3>
    </x-ui.modal.header>

    <x-ui.modal.body>
        <input @input="hasChanges = true" />
    </x-ui.modal.body>
</x-ui.modal>
```

### Loading State

```blade
<x-ui.modal>
    <x-ui.modal.header title="Processing..." />

    <x-ui.modal.body class="text-center">
        <x-ui.spinner size="lg" class="mx-auto" />
        <p class="mt-4">Please wait while we process your request...</p>
    </x-ui.modal.body>
</x-ui.modal>
```

### Custom Header Content

```blade
<x-ui.modal>
    <x-ui.modal.header>
        <div class="flex items-center gap-3">
            <x-ui.avatar src="/avatar.jpg" />
            <div>
                <h3 class="font-semibold">John Doe</h3>
                <p class="text-sm text-gray-500">Premium Member</p>
            </div>
        </div>
    </x-ui.modal.header>

    <x-ui.modal.body>
        {{-- Content --}}
    </x-ui.modal.body>
</x-ui.modal>
```

---

**Component Location:** `resources/views/components/ui/modal.blade.php`
**Documentation:** `docs/components/ui/modal.md`
**Flowbite Reference:** [Modal Component](https://flowbite.com/docs/components/modal/)
**Dependencies:** Alpine.js for interactivity