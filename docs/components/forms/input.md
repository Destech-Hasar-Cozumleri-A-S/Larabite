# Form Input Component

Component for advanced form input fields.

## Component Location

**File Path:** `resources/views/components/ui/form/input.blade.php`

## Features

- 4 size options (sm, base, lg, xl)
- Validation states (error, success)
- Leading/trailing icons
- Prefix/suffix text
- Helper text support
- Disabled state
- Required field indicator
- Dark mode support
- Livewire integration

## Usage Examples

### Basic Input

```blade
<x-ui::form.input
    label="Full Name"
    name="name"
    type="text"
    placeholder="Enter your name"
    :required="true"
    wire:model="name"
/>
```

### With Error

```blade
<x-ui::form.input
    label="Email"
    name="email"
    type="email"
    placeholder="name@example.com"
    :error="$errors->first('email')"
    wire:model="email"
/>
```

### With Success Message

```blade
<x-ui::form.input
    label="Username"
    name="username"
    placeholder="Choose username"
    success="Username is available!"
    wire:model.blur="username"
/>
```

### With Helper Text

```blade
<x-ui::form.input
    label="Password"
    name="password"
    type="password"
    placeholder="••••••••"
    helper="Must be at least 8 characters long"
    wire:model="password"
/>
```

### With Leading Icon

```blade
<x-ui::form.input
    label="Email"
    name="email"
    type="email"
    placeholder="name@example.com"
    wire:model="email"
>
    <x-slot:leadingIcon>
        <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" fill="currentColor" viewBox="0 0 20 20">
            <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z"/>
            <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z"/>
        </svg>
    </x-slot:leadingIcon>
</x-ui::form.input>
```

### With Trailing Icon

```blade
<x-ui::form.input
    label="Search"
    name="search"
    type="search"
    placeholder="Search..."
    wire:model.live="search"
>
    <x-slot:trailingIcon>
        <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" fill="currentColor" viewBox="0 0 20 20">
            <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"/>
        </svg>
    </x-slot:trailingIcon>
</x-ui::form.input>
```

### With Prefix

```blade
<x-ui::form.input
    label="Website"
    name="website"
    type="url"
    placeholder="example.com"
    prefix="https://"
    wire:model="website"
/>
```

### With Suffix

```blade
<x-ui::form.input
    label="Price"
    name="price"
    type="number"
    placeholder="0.00"
    suffix="USD"
    wire:model="price"
/>
```

### Different Sizes

```blade
<x-ui::form.input label="Small" name="small" size="sm" placeholder="Small input" />
<x-ui::form.input label="Base" name="base" size="base" placeholder="Base input (default)" />
<x-ui::form.input label="Large" name="large" size="lg" placeholder="Large input" />
<x-ui::form.input label="Extra Large" name="xl" size="xl" placeholder="Extra large input" />
```

### Disabled State

```blade
<x-ui::form.input
    label="Disabled Field"
    name="disabled"
    value="Cannot edit this"
    :disabled="true"
/>
```

### Different Input Types

```blade
<x-ui::form.input label="Email" name="email" type="email" placeholder="name@example.com" />
<x-ui::form.input label="Password" name="password" type="password" placeholder="••••••••" />
<x-ui::form.input label="Number" name="number" type="number" placeholder="123" />
<x-ui::form.input label="Tel" name="tel" type="tel" placeholder="+1 (555) 123-4567" />
<x-ui::form.input label="URL" name="url" type="url" placeholder="https://example.com" />
<x-ui::form.input label="Date" name="date" type="date" />
<x-ui::form.input label="Time" name="time" type="time" />
<x-ui::form.input label="Search" name="search" type="search" placeholder="Search..." />
```

## Props Table

| Prop | Type | Default | Description |
|------|------|---------|-------------|
| `label` | string | optional | Label text |
| `name` | string | **required** | Input name attribute |
| `type` | string | 'text' | Input type (text, email, password, number, tel, url, date, time, search, etc.) |
| `placeholder` | string | optional | Placeholder text |
| `value` | string | optional | Input value |
| `size` | string | 'base' | Size option: sm, base, lg, xl |
| `disabled` | boolean | false | Disabled state |
| `required` | boolean | false | Required field indicator |
| `error` | string | optional | Error message (red color) |
| `success` | string | optional | Success message (green color) |
| `helper` | string | optional | Helper text (gray color) |
| `leadingIcon` | slot | optional | Left-side icon |
| `trailingIcon` | slot | optional | Right-side icon |
| `prefix` | string | optional | Text at input start (e.g.: "https://") |
| `suffix` | string | optional | Text at input end (e.g.: "USD") |

## Validation Examples

### With Livewire Validation

```blade
<x-ui::form.input
    label="Email"
    name="email"
    type="email"
    placeholder="name@example.com"
    :error="$errors->first('email')"
    :required="true"
    wire:model="email"
/>
```

### Real-time Validation

```blade
<x-ui::form.input
    label="Username"
    name="username"
    placeholder="Choose username"
    :error="$errors->first('username')"
    success="Username is available!"
    wire:model.blur="username"
/>
```

## Livewire Integration

### Basic Integration

```blade
<x-ui::form.input
    label="Name"
    name="name"
    wire:model="name"
/>
```

### Live Update

```blade
<x-ui::form.input
    label="Search"
    name="search"
    type="search"
    placeholder="Search..."
    wire:model.live="search"
/>
```

### Blur Update

```blade
<x-ui::form.input
    label="Email"
    name="email"
    type="email"
    wire:model.blur="email"
/>
```

### Debounced Update

```blade
<x-ui::form.input
    label="Search"
    name="search"
    type="search"
    placeholder="Type to search..."
    wire:model.live.debounce.500ms="search"
/>
```

## Best Practices

1. **Always provide a label** - Improve accessibility and UX
2. **Use appropriate input types** - Use `type="email"` for emails, `type="tel"` for phones, etc.
3. **Add validation feedback** - Show clear error messages to users
4. **Use helper text** - Provide guidance on expected input format
5. **Consider icons** - Leading/trailing icons improve visual clarity
6. **Disable when needed** - Disable inputs that shouldn't be edited
7. **Use prefixes/suffixes** - Add context to inputs (currency, URLs, etc.)
8. **Choose appropriate sizes** - Match input size to importance and content
9. **Validate on blur** - Use `wire:model.blur` for non-critical fields to reduce server requests
10. **Debounce search inputs** - Use `wire:model.live.debounce` for search fields

## Notes

- The old component `form-input.blade.php` is deprecated
- Use the new component at `form/input.blade.php` instead
- All input types support dark mode out of the box
- Icons should be SVG elements with proper sizing classes
- Prefix and suffix are text-only; use leading/trailing icons for icons