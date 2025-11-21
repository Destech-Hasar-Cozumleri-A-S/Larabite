# Component Structure Standards

This document outlines the naming conventions, best practices, and structural standards for Blade components in the Flowbite application.

---

## 1. Naming Conventions

### Generic Components: `ui::*`

Generic, reusable UI components that can be used anywhere in the application.

**Examples:**
- `<x-ui::button>`
- `<x-ui::card>`
- `<x-ui::badge>`
- `<x-ui::dropdown>`
- `<x-ui::avatar>`
- `<x-ui::form.input>`
- `<x-ui::form.select>`

**Location:** `resources/views/components/ui/`

### Domain-Specific Components

Components specific to a particular feature or domain.

**Feed Components:** `feed.*`
- `<x-feed.post-badges>`
- `<x-feed.post-header>`
- `<x-feed.post-media>`
- `<x-feed.post-actions>`
- `<x-feed.comment-item>`

**Location:** `resources/views/components/feed/`

**Modal Components:** `modal.*`
- `<x-modal.backdrop>`
- `<x-modal.close-button>`

**Location:** `resources/views/components/modal/`

**Pet Components:** `pets.*`
- `<x-pets.form-fields>`
- `<x-pets.profile-header>`

**Location:** `resources/views/components/pets/`

### Sub-Components

Sub-components are separated by dots (`.`).

**Examples:**
- `<x-ui::dropdown.item>`
- `<x-ui::dropdown.divider>`
- `<x-ui::form.input>`
- `<x-ui::form.select>`
- `<x-ui::form.checkbox>`
- `<x-ui::alert.bordered>`
- `<x-ui::alert.additional-content>`

**Hierarchy:**
```
ui/
├── dropdown/
│   ├── item.blade.php
│   └── divider.blade.php
├── form/
│   ├── input.blade.php
│   ├── select.blade.php
│   ├── checkbox.blade.php
│   └── radio.blade.php
└── alert/
    ├── bordered.blade.php
    └── additional-content.blade.php
```

---

## 2. Props Best Practices

### Boolean Props

Always use `:` prefix for boolean props to ensure they're evaluated as PHP expressions.

**Correct:**
```blade
<x-ui::button :loading="true" />
<x-ui::button :disabled="$isDisabled" />
<x-ui::form.input :required="true" />
```

**Incorrect:**
```blade
<x-ui::button loading="true" />  <!-- This is a string, not boolean -->
<x-ui::button disabled="false" /> <!-- This is truthy because it's a non-empty string -->
```

### String Props

String props can be passed without `:` prefix.

**Examples:**
```blade
<x-ui::button size="md" />
<x-ui::button variant="primary" />
<x-ui::badge color="blue" />
```

### Variable Props

Use `:` prefix when passing variables.

**Examples:**
```blade
<x-ui::button :label="$buttonText" />
<x-ui::avatar :src="$user->avatar_url" />
<x-feed.post-header :post="$post" />
```

### Default Values

Always specify default values in component definitions.

**Component Definition:**
```php
@props([
    'size' => 'md',           // Default size
    'variant' => 'default',   // Default variant
    'disabled' => false,      // Default disabled state
    'required' => false,      // Default required state
])
```

### Required vs Optional Props

Document which props are required and which are optional.

**Example:**
```blade
{{-- Component: ui/form/input.blade.php --}}
@props([
    // Required
    'name',                   // Input name (required)

    // Optional
    'label' => null,          // Label text (optional)
    'type' => 'text',         // Input type (default: text)
    'placeholder' => null,    // Placeholder text (optional)
    'value' => null,          // Input value (optional)
    'error' => null,          // Error message (optional)
    'disabled' => false,      // Disabled state (default: false)
])
```

---

## 3. Slot Usage

### Default Slot

Use `{{ $slot }}` for the main content area.

**Component:**
```blade
{{-- components/ui/card.blade.php --}}
@props(['padding' => true])

<div class="bg-white rounded-lg shadow {{ $padding ? 'p-6' : '' }}">
    {{ $slot }}
</div>
```

**Usage:**
```blade
<x-ui::card>
    <h2>Card Title</h2>
    <p>Card content here...</p>
</x-ui::card>
```

### Named Slots

Use `<x-slot:name>` for specific content areas.

**Component:**
```blade
{{-- components/ui/modal.blade.php --}}
<div class="modal">
    <div class="modal-header">
        {{ $title }}
    </div>
    <div class="modal-body">
        {{ $slot }}
    </div>
    @if(isset($footer))
        <div class="modal-footer">
            {{ $footer }}
        </div>
    @endif
</div>
```

**Usage:**
```blade
<x-ui::modal>
    <x-slot:title>
        <h2>Modal Title</h2>
    </x-slot:title>

    <p>Modal content here...</p>

    <x-slot:footer>
        <button>Cancel</button>
        <button>Confirm</button>
    </x-slot:footer>
</x-ui::modal>
```

### Icon Slots

Use icon slots for flexible icon placement.

**Component:**
```blade
{{-- components/ui/button.blade.php --}}
<button {{ $attributes->merge(['class' => 'button']) }}>
    @if(isset($icon))
        <span class="icon">{{ $icon }}</span>
    @endif
    {{ $slot }}
</button>
```

**Usage:**
```blade
<x-ui::button>
    <x-slot:icon>
        <svg class="w-5 h-5">...</svg>
    </x-slot:icon>
    Click Me
</x-ui::button>
```

---

## 4. Styling Standards

### Tailwind CSS

Use Tailwind CSS utility classes for styling.

**Best Practices:**
```blade
{{-- Good: Utility classes --}}
<div class="bg-white rounded-lg shadow-md p-6">
    Content
</div>

{{-- Avoid: Inline styles --}}
<div style="background: white; border-radius: 8px;">
    Content
</div>
```

### Class Merging

Use `$attributes->merge()` for proper class merging.

**Component:**
```blade
@props(['variant' => 'default'])

@php
$classes = match($variant) {
    'primary' => 'bg-blue-600 text-white hover:bg-blue-700',
    'secondary' => 'bg-gray-300 text-gray-900 hover:bg-gray-400',
    default => 'bg-white text-gray-900 border border-gray-300',
};
@endphp

<button {{ $attributes->merge(['class' => "px-4 py-2 rounded-lg font-semibold transition $classes"]) }}>
    {{ $slot }}
</button>
```

**Usage:**
```blade
<x-ui::button variant="primary" class="w-full">
    Submit
</x-ui::button>

{{-- Renders: --}}
<button class="px-4 py-2 rounded-lg font-semibold transition bg-blue-600 text-white hover:bg-blue-700 w-full">
    Submit
</button>
```

### Dark Mode Support

Always include dark mode variants.

**Examples:**
```blade
{{-- Text Colors --}}
<p class="text-gray-900 dark:text-white">Text</p>

{{-- Backgrounds --}}
<div class="bg-white dark:bg-gray-800">Content</div>

{{-- Borders --}}
<div class="border border-gray-200 dark:border-gray-700">Content</div>

{{-- Hover States --}}
<button class="hover:bg-gray-100 dark:hover:bg-gray-700">Button</button>
```

### Flowbite Design Tokens

Follow Flowbite design system conventions.

**Color Palette:**
- Primary: `blue-600`
- Success: `green-600`
- Danger: `red-600`
- Warning: `yellow-600`
- Info: `blue-500`

**Spacing:**
- Small: `p-3` / `px-3 py-2`
- Medium: `p-4` / `px-4 py-3`
- Large: `p-6` / `px-6 py-4`

**Border Radius:**
- Small: `rounded`
- Medium: `rounded-lg`
- Large: `rounded-xl`
- Full: `rounded-full`

---

## 5. Accessibility

### Alt Text

Always provide alt text for images.

**Examples:**
```blade
<x-ui::avatar :src="$user->avatar" :alt="$user->name" />

<img src="{{ $image->url }}" alt="{{ $image->description }}">
```

### ARIA Attributes

Use ARIA attributes for better accessibility.

**Examples:**
```blade
{{-- Buttons --}}
<button aria-label="Close modal">
    <svg>...</svg>
</button>

{{-- Inputs --}}
<input
    type="text"
    aria-describedby="email-help"
    aria-invalid="{{ $errors->has('email') ? 'true' : 'false' }}"
>
<p id="email-help">Enter your email address</p>

{{-- Modals --}}
<div role="dialog" aria-modal="true" aria-labelledby="modal-title">
    <h2 id="modal-title">Modal Title</h2>
</div>
```

### Keyboard Navigation

Ensure components support keyboard navigation.

**Requirements:**
- All interactive elements must be focusable
- Tab order should be logical
- Enter/Space should activate buttons
- Escape should close modals/dropdowns
- Arrow keys for navigation where appropriate

**Example:**
```blade
<div x-data="{ open: false }" @keydown.escape.window="open = false">
    <button @click="open = !open" @keydown.enter="open = !open">
        Toggle
    </button>

    <div x-show="open" x-trap="open">
        <!-- Focusable content -->
    </div>
</div>
```

### Semantic HTML

Use appropriate HTML elements.

**Good:**
```blade
<button type="button" wire:click="submit">Submit</button>
<nav>...</nav>
<article>...</article>
<header>...</header>
<footer>...</footer>
```

**Bad:**
```blade
<div onclick="submit()">Submit</div>  <!-- Not semantic, not accessible -->
<div>...</div>  <!-- Generic, not semantic -->
```

---

## 6. Component Organization

### File Structure

```
resources/views/components/
├── ui/                      # Generic UI components
│   ├── button.blade.php
│   ├── card.blade.php
│   ├── badge.blade.php
│   ├── dropdown/
│   │   ├── item.blade.php
│   │   └── divider.blade.php
│   ├── form/
│   │   ├── input.blade.php
│   │   ├── select.blade.php
│   │   └── checkbox.blade.php
│   └── alert/
│       ├── bordered.blade.php
│       └── additional-content.blade.php
├── modal/                   # Modal components
│   ├── backdrop.blade.php
│   └── close-button.blade.php

```

### Component Documentation

Each component should include:

1. **Header Comment** with description
2. **Props Definition** with @props directive
3. **Usage Examples** in comments
4. **Default Values** clearly defined

**Example:**
```blade
{{--
    Button Component

    A reusable button component with multiple variants and sizes.

    Usage:
    <x-ui::button variant="primary" size="md">Click Me</x-ui::button>

    Props:
    - variant: primary|secondary|danger (default: primary)
    - size: sm|md|lg (default: md)
    - disabled: boolean (default: false)
--}}

@props([
    'variant' => 'primary',
    'size' => 'md',
    'disabled' => false,
])

{{-- Component implementation --}}
```

---

## 7. Testing Components

### Visual Testing

Test components in multiple states:
- Default state
- Hover state
- Focus state
- Disabled state
- Error state
- Success state
- Loading state

### Responsive Testing

Test on multiple screen sizes:
- Mobile (320px - 640px)
- Tablet (640px - 1024px)
- Desktop (1024px+)

### Browser Testing

Test in multiple browsers:
- Chrome
- Firefox
- Safari
- Edge

### Dark Mode Testing

Test both light and dark modes to ensure proper contrast and visibility.

---

## 8. Performance Considerations

### Lazy Loading

Use lazy loading for images and heavy components.

```blade
<img src="{{ $image->url }}" loading="lazy" alt="{{ $image->alt }}">
```

### Minimize Re-renders

In Livewire components, use `wire:key` to prevent unnecessary re-renders.

```blade
@foreach($items as $item)
    <div wire:key="item-{{ $item->id }}">
        <x-item-card :item="$item" />
    </div>
@endforeach
```

### Alpine.js Optimization

Use `x-cloak` to prevent flash of unstyled content.

```blade
<div x-data="{ open: false }" x-cloak>
    <div x-show="open">Content</div>
</div>

<style>
    [x-cloak] { display: none !important; }
</style>
```

---

## 9. Version Control

### Backward Compatibility

When updating components, maintain backward compatibility:
- Don't remove props without deprecation notice
- Add new props as optional
- Document breaking changes
- Provide migration guides

### Deprecation Process

1. Mark as deprecated in comments
2. Add console warning
3. Document in changelog
4. Wait 1-2 versions before removal

---

## 10. Code Quality

### Formatting

- Consistent indentation (4 spaces)
- Proper line breaks
- Logical grouping of classes
- Comments where necessary

### Validation

- Validate prop values where appropriate
- Handle edge cases
- Provide meaningful error messages

### Reusability

- Keep components focused on single responsibility
- Extract common patterns
- Avoid hard-coding values
- Use configuration where appropriate

---

## Summary

Following these standards ensures:
- Consistent component structure
- Better maintainability
- Improved accessibility
- Enhanced developer experience
- Easier onboarding for new developers
- Reliable and predictable components
