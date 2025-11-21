# Example Usage Patterns

This document provides practical examples of using Blade components in the Flowbite application. These patterns demonstrate real-world scenarios and best practices.

---

## 1. Profile Card

A complete user profile card combining multiple UI components.

```blade
<x-ui::card shadow="md" :hover="true">
    <div class="flex items-center space-x-4">
        {{-- Avatar with Ring --}}
        <x-ui::avatar
            :src="$user->avatar"
            :alt="$user->name"
            size="xl"
            :ring="true"
        />

        {{-- User Information --}}
        <div class="flex-1">
            <h3 class="font-bold text-lg">{{ $user->name }}</h3>
            <p class="text-gray-600">{{ $user->bio }}</p>

            {{-- Stats --}}
            <div class="flex space-x-4 mt-2">
                <x-ui::stat-item
                    :value="$user->posts_count"
                    :label="__('Posts')"
                />
                <x-ui::stat-item
                    :value="$user->followers_count"
                    :label="__('Followers')"
                />
            </div>
        </div>

        {{-- Follow Button --}}
        <x-ui::button variant="primary">
            {{ __('Follow') }}
        </x-ui::button>
    </div>
</x-ui::card>
```

---

## 2. Dropdown Menu

User dropdown menu with avatar and navigation items.

```blade
<x-ui::dropdown align="right">
    {{-- Trigger Button --}}
    <x-slot:trigger>
        <button class="flex items-center space-x-2">
            <x-ui::avatar :src="auth()->user()->avatar" size="sm" />
            <span>{{ auth()->user()->name }}</span>
        </button>
    </x-slot:trigger>

    {{-- Dropdown Items --}}
    <x-ui::dropdown.item href="{{ route('profile') }}" wire:navigate>
        <x-slot:icon>
            <path d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
        </x-slot:icon>
        {{ __('Profile') }}
    </x-ui::dropdown.item>

    <x-ui::dropdown.item href="{{ route('settings') }}" wire:navigate>
        {{ __('Settings') }}
    </x-ui::dropdown.item>

    <x-ui::dropdown.divider />

    <x-ui::dropdown.item variant="danger" wire:click="logout">
        {{ __('Logout') }}
    </x-ui::dropdown.item>
</x-ui::dropdown>
```

---

## 3. Form with Validation

Complete form with various input types and validation.

```blade
<form wire:submit.prevent="submit">
    {{-- Text Input --}}
    <x-ui::form.input
        label="Full Name"
        name="name"
        type="text"
        placeholder="Enter your name"
        :required="true"
        wire:model="name"
        :error="$errors->first('name')"
    />

    {{-- Email Input with Icon --}}
    <x-ui::form.input
        label="Email"
        name="email"
        type="email"
        placeholder="name@example.com"
        wire:model="email"
        :error="$errors->first('email')"
    >
        <x-slot:leadingIcon>
            <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z"/>
                <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z"/>
            </svg>
        </x-slot:leadingIcon>
    </x-ui::form.input>

    {{-- Select Dropdown --}}
    <x-ui::form.select
        label="Country"
        name="country"
        placeholder="Select your country"
        wire:model="country"
        :error="$errors->first('country')"
    >
        <option value="TR">Turkey</option>
        <option value="US">United States</option>
        <option value="GB">United Kingdom</option>
        <option value="FR">France</option>
    </x-ui::form.select>

    {{-- Checkbox --}}
    <x-ui::form.checkbox
        label="I agree to the terms and conditions"
        name="terms"
        value="1"
        :required="true"
        wire:model="acceptedTerms"
        :error="$errors->first('acceptedTerms')"
    />

    {{-- Submit Button --}}
    <div class="flex justify-end space-x-3 mt-6">
        <x-ui::button type="button" variant="secondary" wire:click="cancel">
            Cancel
        </x-ui::button>
        <x-ui::button type="submit" variant="primary" :loading="$isSubmitting">
            Submit
        </x-ui::button>
    </div>
</form>
```

---

## 4. Data Table with Pagination

Responsive data table with custom columns and pagination.

```blade
@php
$columns = [
    [
        'key' => 'created_at',
        'label' => __('Date'),
        'align' => 'left',
        'wrap' => false,
        'hideOnMobile' => true,
        'format' => fn($item) => $item->created_at->format('d.m.Y H:i')
    ],
    [
        'key' => 'name',
        'label' => __('Name'),
        'align' => 'left',
        'format' => fn($item) => $item->name
    ],
    [
        'key' => 'status',
        'label' => __('Status'),
        'align' => 'left',
        'wrap' => false,
        'format' => fn($item) => '<span class="px-2 py-1 text-xs rounded-full bg-green-100 text-green-800">' . $item->status . '</span>'
    ],
    [
        'key' => 'amount',
        'label' => __('Amount'),
        'align' => 'right',
        'wrap' => false,
        'class' => 'font-medium text-gray-900',
        'format' => fn($item) => number_format($item->amount, 2) . ' ₺'
    ],
];
@endphp

<x-ui::data-table
    :data="$payments"
    :columns="$columns"
    :emptyMessage="__('No payments found')"
    :pagination="$payments"
/>
```

---

## 5. Alert Messages

Different alert variants for various scenarios.

```blade
{{-- Success Alert --}}
<x-ui::alert type="success">
    Your profile has been updated successfully!
</x-ui::alert>

{{-- Error Alert with Non-dismissible --}}
<x-ui::alert type="error" :dismissible="false">
    An error occurred while processing your request.
</x-ui::alert>

{{-- Bordered Warning Alert --}}
<x-ui::alert.bordered type="warning" :accent="true">
    Your subscription will expire in 3 days. Please renew to continue.
</x-ui::alert.bordered>

{{-- Alert with Additional Content --}}
<x-ui::alert.additional-content
    type="info"
    title="New Features Available"
    actionText="Learn More"
    actionHref="{{ route('features') }}"
>
    We've added new features to enhance your experience. Check them out!
</x-ui::alert.additional-content>
```


---

## Best Practices Summary

### 1. Component Composition
- Build complex UIs by composing smaller components
- Keep components focused and reusable
- Use slots for flexible content areas

### 2. Prop Validation
- Always validate props in Livewire components
- Provide sensible defaults
- Document required vs optional props

### 3. Accessibility
- Use semantic HTML
- Include ARIA attributes
- Ensure keyboard navigation

### 4. Responsive Design
- Mobile-first approach
- Test on multiple screen sizes
- Use responsive utility classes

### 5. Performance
- Use Livewire wire:key for lists
- Lazy load images
- Debounce live inputs

### 6. Consistency
- Follow naming conventions
- Use consistent spacing/sizing
- Maintain visual hierarchy

---

## Resources

- [Flowbite Components](https://flowbite.com)
- [Tailwind CSS Documentation](https://tailwindcss.com)
- [Laravel Blade Components](https://laravel.com/docs/blade#components)
- [Livewire Documentation](https://livewire.laravel.com)
- [Alpine.js Documentation](https://alpinejs.dev)
