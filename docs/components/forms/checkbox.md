# Form Checkbox Component

Component for checkbox (tickbox) selections.

## Component Location

**Enhanced Version:** `resources/views/components/ui/form/checkbox.blade.php`
**Basic Version:** `resources/views/components/ui/form-checkbox.blade.php`

## Features

- 6 variant (default, link, bordered, list-group, inline, color)
- 7 color option (blue, red, green, purple, teal, yellow, orange)
- Helper text support
- Description/description support
- Icon support (bordered variant for)
- Validation states (error, success)
- Disabled state
- Required field indicator
- Dark mode support
- Livewire integration
- Accessibility (aria-describedby)

## Usage Examples - Enhanced Version

### Default Checkbox

```blade
<x-ui::form.checkbox
    label="I agree to the terms and conditions"
    name="terms"
    value="1"
    :required="true"
    wire:model="acceptedTerms"
/>
```

### Checkbox with Helper Text

```blade
<x-ui::form.checkbox
    label="Subscribe to newsletter"
    name="newsletter"
    value="1"
    helper="Get weekly updates delivered to your inbox"
    wire:model="newsletter"
/>
```

### Checkbox with Link in Label

```blade
<x-ui::form.checkbox
    variant="link"
    name="privacy"
    value="1"
    wire:model="acceptedPrivacy"
>
    <x-slot:label>
        I agree with the <a href="#" class="text-blue-600 hover:underline dark:text-blue-500">privacy policy</a>
    </x-slot:label>
</x-ui::form.checkbox>
```

### Bordered Checkbox (Card Style)

```blade
<x-ui::form.checkbox
    variant="bordered"
    label="Apple"
    description="A technology company that designs, develops and sells consumer electronics"
    name="company"
    value="apple"
    wire:model="selectedCompany"
/>
```

### Bordered with Icon

```blade
<x-ui::form.checkbox
    variant="bordered"
    label="React"
    description="A JavaScript library for building user interfaces"
    name="framework"
    value="react"
    wire:model="selectedFramework"
>
    <x-slot:icon>
        <svg class="w-5 h-5 text-gray-500" fill="currentColor" viewBox="0 0 20 20">
            <path d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z"/>
        </svg>
    </x-slot:icon>
</x-ui::form.checkbox>
```

### List Group Checkboxes

```blade
<ul class="w-full text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-lg dark:bg-gray-700 dark:border-gray-600 dark:text-white">
    <x-ui::form.checkbox
        variant="list-group"
        label="Vue JS"
        name="frameworks[]"
        value="vue"
        wire:model="frameworks"
    />

    <x-ui::form.checkbox
        variant="list-group"
        label="React"
        name="frameworks[]"
        value="react"
        wire:model="frameworks"
    />

    <x-ui::form.checkbox
        variant="list-group"
        label="Angular"
        name="frameworks[]"
        value="angular"
        wire:model="frameworks"
    />
</ul>
```

### Inline Checkboxes

```blade
<div class="flex flex-wrap gap-4">
    <x-ui::form.checkbox
        variant="inline"
        label="Inline 1"
        name="inline[]"
        value="1"
        wire:model="inlineOptions"
    />

    <x-ui::form.checkbox
        variant="inline"
        label="Inline 2"
        name="inline[]"
        value="2"
        wire:model="inlineOptions"
    />

    <x-ui::form.checkbox
        variant="inline"
        label="Inline 3"
        name="inline[]"
        value="3"
        wire:model="inlineOptions"
    />
</div>
```

### Color Variants

```blade
<div class="space-y-2">
    <x-ui::form.checkbox variant="color" color="blue" label="Blue checkbox" name="color" value="blue" />
    <x-ui::form.checkbox variant="color" color="red" label="Red checkbox" name="color" value="red" />
    <x-ui::form.checkbox variant="color" color="green" label="Green checkbox" name="color" value="green" />
    <x-ui::form.checkbox variant="color" color="purple" label="Purple checkbox" name="color" value="purple" />
    <x-ui::form.checkbox variant="color" color="teal" label="Teal checkbox" name="color" value="teal" />
    <x-ui::form.checkbox variant="color" color="yellow" label="Yellow checkbox" name="color" value="yellow" />
    <x-ui::form.checkbox variant="color" color="orange" label="Orange checkbox" name="color" value="orange" />
</div>
```

### Checked State

```blade
<x-ui::form.checkbox
    label="This is checked by default"
    name="default_checked"
    value="1"
    :checked="true"
    wire:model="defaultChecked"
/>
```

### Disabled State

```blade
<x-ui::form.checkbox
    label="Disabled checkbox"
    name="disabled"
    value="1"
    :disabled="true"
/>

<x-ui::form.checkbox
    label="Disabled and checked"
    name="disabled_checked"
    value="1"
    :checked="true"
    :disabled="true"
/>
```

### With Validation Error

```blade
<x-ui::form.checkbox
    label="Accept terms and conditions"
    name="terms"
    value="1"
    :required="true"
    error="You must accept the terms and conditions"
    wire:model="terms"
/>
```

### With Success State

```blade
<x-ui::form.checkbox
    label="Email verified"
    name="email_verified"
    value="1"
    :checked="true"
    success="Your email has been verified!"
    wire:model="emailVerified"
/>
```

### Multiple Checkboxes for Form

```blade
<div class="space-y-3">
    <label class="block text-sm font-medium text-gray-900 dark:text-white mb-2">
        Select your interests
    </label>

    <x-ui::form.checkbox label="Technology" name="interests[]" value="technology" wire:model="interests" />
    <x-ui::form.checkbox label="Sports" name="interests[]" value="sports" wire:model="interests" />
    <x-ui::form.checkbox label="Music" name="interests[]" value="music" wire:model="interests" />
    <x-ui::form.checkbox label="Travel" name="interests[]" value="travel" wire:model="interests" />
</div>
```

## Usage Examples - Basic Version

```blade
<x-ui::form-checkbox
    label="Make this pet's profile public"
    description="(others can see their posts)"
    wire:model="is_public"
/>
```

## Props Table - Enhanced Version

| Prop | Type | Default | Description |
|------|------|---------|-------------|
| `label` | string | optional | Label text (can also be sent as slot) |
| `name` | string | optional | Checkbox name attribute |
| `value` | string | optional | Checkbox value |
| `checked` | boolean | false | Is it checked by default? |
| `disabled` | boolean | false | Is it disabled? |
| `required` | boolean | false | Required field indicator |
| `error` | string | optional | Error message |
| `success` | string | optional | Success message |
| `helper` | string | optional | Helper text |
| `variant` | string | 'default' | Variant: default, link, bordered, list-group, inline, color |
| `color` | string | 'blue' | Color: blue, red, green, purple, teal, yellow, orange |
| `description` | string | optional | Description text (for bordered variant) |
| `icon` | slot | optional | Icon (for bordered variant) |

## Props Table - Basic Version

| Prop | Type | Default | Description |
|------|------|---------|-------------|
| `label` | string | **required** | Label text |
| `description` | string | optional | Additional description |

## Variants

### Default
Standard checkbox + label

### Link
Label can contain link elements

### Bordered
Card-style with border, wider click area

### List Group
For use in list groups (inside ul > li)

### Inline
For horizontal alignment

### Color
Colored checkbox variants

## Validation Examples

```blade
<x-ui::form.checkbox
    label="I accept the terms and conditions"
    name="terms"
    value="1"
    :required="true"
    :error="$errors->first('terms')"
    wire:model="terms"
/>
```

## Livewire Integration

### Basic Integration

```blade
<x-ui::form.checkbox
    label="Subscribe to newsletter"
    name="newsletter"
    value="1"
    wire:model="newsletter"
/>
```

### Live Update

```blade
<x-ui::form.checkbox
    label="Enable subscription-based pricing"
    name="is_subscription_based"
    value="1"
    wire:model.live="isSubscriptionBased"
/>
```

### Multiple Selection

```blade
@foreach($features as $feature)
    <x-ui::form.checkbox
        label="{{ $feature->name }}"
        name="features[]"
        value="{{ $feature->id }}"
        wire:model="selectedFeatures"
    />
@endforeach
```

## Best Practices

1. **Clear labels** - Use descriptive, action-oriented labels
2. **Group related items** - Use list-group for related checkboxes
3. **Provide context** - Use helper text and descriptions
4. **Use bordered for important choices** - Card-style for plan selection, etc.
5. **Inline for compact layouts** - Use inline variant for filters or tags
6. **Validate required checkboxes** - Show clear error messages
7. **Use color meaningfully** - Different colors for different categories
8. **Accessibility** - Always provide labels and use aria attributes
9. **Multiple selection** - Use array syntax `name="items[]"` for multiple values
10. **Disable when needed** - Disable checkboxes that shouldn't be changed

## Notes

- For multiple selection, `name` must be an array (e.g., `name="items[]"`)
- For helper text, the `aria-describedby` accessibility attribute is automatically added
- Bordered variant provides a larger click area (card-sized)
- List group variant should be used inside a `ul` wrapper
- With color variant, 7 different color options can be used
- HTML content can be added using the label slot (for links)
- With Livewire, `wire:model` or `wire:model.live` can be used
- Basic version is deprecated; use enhanced version for new projects