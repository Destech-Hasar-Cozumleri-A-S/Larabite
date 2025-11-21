# Accordion

Expandable/collapsible content sections for organizing information.

## Components

- **Accordion** - `resources/views/components/ui/accordion.blade.php`
- **Accordion Item** - `resources/views/components/ui/accordion/item.blade.php`

## Features

- Collapse mode: Only one item open at a time
- Always open mode: Multiple items can be open simultaneously
- Flush style: Minimal design without borders and backgrounds
- Smooth transitions with Alpine.js
- Accessibility support with ARIA attributes
- Dark mode compatible

## Usage

### Default Accordion (Collapse Mode)

```blade
<x-ui.accordion>
    <x-ui.accordion.item id="item-1" title="What is Flowbite?">
        Flowbite is an open-source library of interactive components built on top of Tailwind CSS including buttons, dropdowns, modals, navbars, and more.
    </x-ui.accordion.item>

    <x-ui.accordion.item id="item-2" title="Is there a Figma file available?" :active="true">
        Yes! Flowbite comes with a Figma design system that includes all components.
    </x-ui.accordion.item>

    <x-ui.accordion.item id="item-3" title="What are the differences between Flowbite and Tailwind UI?">
        The main difference is that Flowbite is open-source while Tailwind UI is a paid product.
    </x-ui.accordion.item>
</x-ui.accordion>
```

### Always Open Accordion

```blade
<x-ui.accordion alwaysOpen>
    <x-ui.accordion.item id="item-1" title="What is Flowbite?" data-always-open>
        Content here...
    </x-ui.accordion.item>

    <x-ui.accordion.item id="item-2" title="Another question" data-always-open>
        More content...
    </x-ui.accordion.item>

    <x-ui.accordion.item id="item-3" title="Third question" data-always-open>
        Even more content...
    </x-ui.accordion.item>
</x-ui.accordion>
```

### Flush Accordion (Minimal Style)

```blade
<x-ui.accordion flush>
    <x-ui.accordion.item id="item-1" title="What is Flowbite?" flush>
        Content here...
    </x-ui.accordion.item>

    <x-ui.accordion.item id="item-2" title="Another question" flush>
        More content...
    </x-ui.accordion.item>

    <x-ui.accordion.item id="item-3" title="Third question" flush>
        Even more content...
    </x-ui.accordion.item>
</x-ui.accordion>
```

### FAQ Section

```blade
<x-ui.accordion>
    <x-ui.accordion.item id="faq-1" title="How do I create an account?">
        <p class="mb-2 text-gray-500 dark:text-gray-400">
            Click on the "Sign Up" button in the top right corner and fill out the registration form with your details.
        </p>
    </x-ui.accordion.item>

    <x-ui.accordion.item id="faq-2" title="What payment methods do you accept?">
        <p class="mb-2 text-gray-500 dark:text-gray-400">
            We accept all major credit cards, PayPal, and bank transfers for enterprise accounts.
        </p>
    </x-ui.accordion.item>

    <x-ui.accordion.item id="faq-3" title="Can I cancel my subscription anytime?">
        <p class="mb-2 text-gray-500 dark:text-gray-400">
            Yes, you can cancel your subscription at any time from your account settings. Your access will continue until the end of your billing period.
        </p>
    </x-ui.accordion.item>
</x-ui.accordion>
```

### Product Details Accordion

```blade
<x-ui.accordion alwaysOpen>
    <x-ui.accordion.item id="features" title="Features" :active="true" data-always-open>
        <ul class="list-disc pl-5 space-y-2 text-gray-500 dark:text-gray-400">
            <li>High-quality materials</li>
            <li>Durable construction</li>
            <li>Easy to clean</li>
            <li>Available in multiple colors</li>
        </ul>
    </x-ui.accordion.item>

    <x-ui.accordion.item id="specifications" title="Specifications" data-always-open>
        <dl class="space-y-2 text-gray-500 dark:text-gray-400">
            <div class="flex">
                <dt class="font-semibold w-32">Dimensions:</dt>
                <dd>10 x 8 x 6 inches</dd>
            </div>
            <div class="flex">
                <dt class="font-semibold w-32">Weight:</dt>
                <dd>2.5 lbs</dd>
            </div>
            <div class="flex">
                <dt class="font-semibold w-32">Material:</dt>
                <dd>Premium plastic</dd>
            </div>
        </dl>
    </x-ui.accordion.item>

    <x-ui.accordion.item id="shipping" title="Shipping Information" data-always-open>
        <p class="text-gray-500 dark:text-gray-400">
            Free shipping on orders over $50. Standard delivery takes 5-7 business days.
            Express shipping available for an additional fee.
        </p>
    </x-ui.accordion.item>
</x-ui.accordion>
```

### Settings Accordion

```blade
<x-ui.accordion flush>
    <x-ui.accordion.item id="profile-settings" title="Profile Settings" flush>
        <div class="space-y-4">
            <x-ui.form.input label="Display Name" name="display_name" wire:model="displayName" />
            <x-ui.form.textarea label="Bio" name="bio" wire:model="bio" rows="3" />
            <x-ui.button variant="primary" size="sm">Save Changes</x-ui.button>
        </div>
    </x-ui.accordion.item>

    <x-ui.accordion.item id="privacy-settings" title="Privacy Settings" flush>
        <div class="space-y-4">
            <x-ui.form.checkbox name="show_email" label="Show email on profile" wire:model="showEmail" />
            <x-ui.form.checkbox name="allow_messages" label="Allow direct messages" wire:model="allowMessages" />
            <x-ui.button variant="primary" size="sm">Update Privacy</x-ui.button>
        </div>
    </x-ui.accordion.item>

    <x-ui.accordion.item id="notification-settings" title="Notification Settings" flush>
        <div class="space-y-4">
            <x-ui.form.checkbox name="email_notifications" label="Email notifications" wire:model="emailNotifications" />
            <x-ui.form.checkbox name="push_notifications" label="Push notifications" wire:model="pushNotifications" />
            <x-ui.button variant="primary" size="sm">Save Preferences</x-ui.button>
        </div>
    </x-ui.accordion.item>
</x-ui.accordion>
```

## Props

### Accordion Component

| Prop | Type | Default | Description |
|------|------|---------|-------------|
| `alwaysOpen` | boolean | false | Allow multiple items to be open simultaneously |
| `flush` | boolean | false | Minimal design without borders and shadows |

### Accordion Item Props

| Prop | Type | Default | Description |
|------|------|---------|-------------|
| `id` | string | required | Unique identifier for the item |
| `title` | string | required | Accordion header title |
| `active` | boolean | false | Initially open |
| `flush` | boolean | false | Minimal design style |
| `data-always-open` | attribute | optional | Required when using alwaysOpen mode |

## Best Practices

1. **Unique IDs**: Always provide unique IDs for each accordion item to ensure proper functionality

2. **Mode Selection**:
   - Use collapse mode (default) for mutually exclusive content
   - Use always open mode for independent sections that users may want to compare

3. **Initial State**: Use the `active` prop to open important items by default

4. **Content Length**: Keep accordion content concise; consider using tabs for longer content

5. **Accessibility**:
   - Titles are keyboard accessible
   - ARIA attributes are automatically included
   - Screen readers can navigate accordion structure

6. **Mobile**: Accordions are excellent for mobile layouts where screen space is limited

7. **Flush Style**: Use flush style for cleaner integration within cards or minimal designs

8. **Loading States**: Show loading indicators for dynamic content within accordion items

9. **Smooth Transitions**: Alpine.js `x-collapse` directive provides smooth animations

10. **Nested Content**: Avoid nesting accordions more than one level deep

## Examples

### Documentation Sections

```blade
<x-ui.accordion>
    <x-ui.accordion.item id="getting-started" title="Getting Started" :active="true">
        <p class="mb-2">Follow these steps to get started with our platform...</p>
        <ol class="list-decimal pl-5 space-y-1">
            <li>Create an account</li>
            <li>Complete your profile</li>
            <li>Add your first project</li>
        </ol>
    </x-ui.accordion.item>

    <x-ui.accordion.item id="api-reference" title="API Reference">
        <p class="mb-2">Our API provides the following endpoints...</p>
        <pre class="bg-gray-100 dark:bg-gray-700 p-4 rounded"><code>GET /api/users
POST /api/users
PUT /api/users/{id}
DELETE /api/users/{id}</code></pre>
    </x-ui.accordion.item>
</x-ui.accordion>
```

### Troubleshooting Guide

```blade
<x-ui.accordion flush>
    <x-ui.accordion.item id="issue-1" title="Cannot log in to my account" flush>
        <p class="mb-2 text-gray-500 dark:text-gray-400">Try these solutions:</p>
        <ol class="list-decimal pl-5 space-y-2 text-gray-500 dark:text-gray-400">
            <li>Verify your email and password are correct</li>
            <li>Clear your browser cache and cookies</li>
            <li>Try resetting your password</li>
            <li>Contact support if the issue persists</li>
        </ol>
    </x-ui.accordion.item>

    <x-ui.accordion.item id="issue-2" title="Payment not processing" flush>
        <p class="mb-2 text-gray-500 dark:text-gray-400">
            Ensure your payment information is up to date and your card has sufficient funds.
            Try using a different payment method or contact your bank if the problem continues.
        </p>
    </x-ui.accordion.item>
</x-ui.accordion>
```

## Note

Alpine.js's `x-collapse` directive is used for smooth transition animations. Ensure Alpine.js is properly loaded in your application.