# Form Floating Label Component

Material Design style input fields with floating labels. The label stays inside when the input is empty, and floats up when the input gains focus or is filled.

## Component Location

**File Path:** `resources/views/components/ui/form/floating-label.blade.php`

## Features

- 3 variant (outlined, filled, standard)
- 2 size option (sm, base)
- Validation states (error, success)
- Helper text support
- Icon support
- Multiple input types
- Disabled state
- Required field indicator
- Dark mode support
- Livewire integration
- CSS peer selectors

## Usage Examples

### Outlined (Bordered) - Default

```blade
<x-ui::form.floating-label
    label="Email"
    name="email"
    type="email"
    wire:model="email"
/>
```

### Filled Variant

```blade
<x-ui::form.floating-label
    label="Username"
    name="username"
    variant="filled"
    wire:model="username"
/>
```

### Standard (Underline) Variant

```blade
<x-ui::form.floating-label
    label="Password"
    name="password"
    type="password"
    variant="standard"
    wire:model="password"
/>
```

### Different Sizes

```blade
{{-- Base Size (Default) --}}
<x-ui::form.floating-label
    label="Full Name"
    name="full_name"
    size="base"
    wire:model="fullName"
/>

{{-- Small Size --}}
<x-ui::form.floating-label
    label="Username"
    name="username"
    size="sm"
    wire:model="username"
/>
```

### Error State

```blade
<x-ui::form.floating-label
    label="Email"
    name="email"
    type="email"
    wire:model="email"
    :error="$errors->first('email')"
/>
```

### Success State

```blade
<x-ui::form.floating-label
    label="Email"
    name="email"
    type="email"
    wire:model="email"
    success="Email is valid!"
/>
```

### Helper Text

```blade
<x-ui::form.floating-label
    label="Username"
    name="username"
    wire:model="username"
    helper="Choose a unique username between 3-20 characters"
/>
```

### Different Input Types

```blade
{{-- Text Input --}}
<x-ui::form.floating-label
    label="First Name"
    name="first_name"
    type="text"
    wire:model="firstName"
/>

{{-- Email Input --}}
<x-ui::form.floating-label
    label="Email Address"
    name="email"
    type="email"
    wire:model="email"
/>

{{-- Password Input --}}
<x-ui::form.floating-label
    label="Password"
    name="password"
    type="password"
    wire:model="password"
    required
/>

{{-- Number Input --}}
<x-ui::form.floating-label
    label="Age"
    name="age"
    type="number"
    wire:model="age"
    min="0"
    max="120"
/>

{{-- Phone Input --}}
<x-ui::form.floating-label
    label="Phone Number"
    name="phone"
    type="tel"
    wire:model="phone"
/>

{{-- URL Input --}}
<x-ui::form.floating-label
    label="Website"
    name="website"
    type="url"
    wire:model="website"
/>

{{-- Date Input --}}
<x-ui::form.floating-label
    label="Birth Date"
    name="birth_date"
    type="date"
    wire:model="birthDate"
/>

{{-- Time Input --}}
<x-ui::form.floating-label
    label="Appointment Time"
    name="appointment_time"
    type="time"
    wire:model="appointmentTime"
/>
```

### With Icon

```blade
<x-ui::form.floating-label
    label="Email Address"
    name="email"
    type="email"
    wire:model="email"
>
    <x-slot:icon>
        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
            <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z"/>
            <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z"/>
        </svg>
    </x-slot:icon>
</x-ui::form.floating-label>
```

### Disabled State

```blade
<x-ui::form.floating-label
    label="Readonly Field"
    name="readonly_field"
    value="Cannot be changed"
    disabled
/>
```

### Required Field

```blade
<x-ui::form.floating-label
    label="Email"
    name="email"
    type="email"
    wire:model="email"
    required
/>
```

## Complete Form Examples

### Login Form

```blade
<form wire:submit.prevent="login">
    <div class="space-y-6">
        <x-ui::form.floating-label
            label="Email Address"
            name="email"
            type="email"
            variant="outlined"
            wire:model="email"
            :error="$errors->first('email')"
            required
        />

        <x-ui::form.floating-label
            label="Password"
            name="password"
            type="password"
            variant="outlined"
            wire:model="password"
            :error="$errors->first('password')"
            required
        />

        <x-ui::button type="submit" color="primary">
            Login
        </x-ui::button>
    </div>
</form>
```

### Registration Form

```blade
<form wire:submit.prevent="register">
    <div class="space-y-6">
        <x-ui::form.floating-label
            label="Full Name"
            name="name"
            variant="filled"
            wire:model="name"
            :error="$errors->first('name')"
            required
        />

        <x-ui::form.floating-label
            label="Email Address"
            name="email"
            type="email"
            variant="filled"
            wire:model="email"
            :error="$errors->first('email')"
            helper="We'll never share your email with anyone else"
            required
        />

        <x-ui::form.floating-label
            label="Password"
            name="password"
            type="password"
            variant="filled"
            wire:model="password"
            :error="$errors->first('password')"
            helper="Use 8 or more characters with a mix of letters, numbers & symbols"
            required
        />

        <x-ui::form.floating-label
            label="Confirm Password"
            name="password_confirmation"
            type="password"
            variant="filled"
            wire:model="passwordConfirmation"
            :error="$errors->first('password_confirmation')"
            required
        />

        <x-ui::button type="submit" color="primary">
            Register
        </x-ui::button>
    </div>
</form>
```

### Contact Form

```blade
<form wire:submit.prevent="submitContact">
    <div class="space-y-4">
        <x-ui::form.floating-label
            label="Your Name"
            name="name"
            variant="standard"
            wire:model="contactForm.name"
            required
        />

        <x-ui::form.floating-label
            label="Email"
            name="email"
            type="email"
            variant="standard"
            wire:model="contactForm.email"
            required
        />

        <x-ui::form.floating-label
            label="Phone"
            name="phone"
            type="tel"
            variant="standard"
            wire:model="contactForm.phone"
        />

        <button type="submit">Send Message</button>
    </div>
</form>
```

## Props Table

| Prop | Type | Default | Description |
|------|------|---------|-------------|
| `label` | string | **required** | Label text |
| `name` | string | **required** | Input name attribute |
| `type` | string | 'text' | Input type |
| `value` | string | optional | Initial value |
| `placeholder` | string | optional | Placeholder (usually not needed) |
| `size` | string | 'base' | Size: sm, base |
| `variant` | string | 'outlined' | Variant: outlined, filled, standard |
| `disabled` | boolean | false | Disabled state |
| `required` | boolean | false | Required field indicator |
| `error` | string | optional | Error message |
| `success` | string | optional | Success message |
| `helper` | string | optional | Helper text |
| `icon` | slot | optional | Icon content |
| `min` | number | optional | Minimum value (number/date types) |
| `max` | number | optional | Maximum value (number/date types) |

## Variants

### Outlined
Bordered design

### Filled
Filled background design

### Standard
Underline design

## Validation Examples

### With Livewire Validation

```blade
<x-ui::form.floating-label
    label="Email"
    name="email"
    type="email"
    wire:model="email"
    :error="$errors->first('email')"
    :required="true"
/>

{{-- In Livewire Component --}}
protected $rules = [
    'email' => 'required|email|unique:users,email',
];
```

## Livewire Integration

### Basic Integration

```blade
<x-ui::form.floating-label
    label="Name"
    name="name"
    wire:model="name"
/>
```

### Live Update

```blade
<x-ui::form.floating-label
    label="Username"
    name="username"
    wire:model.live="username"
    :error="$errors->first('username')"
/>
```

### Blur Update

```blade
<x-ui::form.floating-label
    label="Email"
    name="email"
    type="email"
    wire:model.blur="email"
/>
```

## Best Practices

1. **Use for modern designs** - Floating labels provide a clean, minimal look
2. **Don't use placeholders** - The label serves as the placeholder
3. **Provide clear labels** - Labels should be descriptive
4. **Show validation** - Display clear error messages
5. **Group related fields** - Use consistent variant across forms
6. **Choose appropriate variant** - Outlined for prominence, standard for minimalism
7. **Add helper text** - Provide guidance when needed
8. **Use icons sparingly** - Only add icons when they add value
9. **Consider accessibility** - Ensure proper label associations
10. **Test on mobile** - Verify floating behavior on touch devices

## Notes

- Floating label animation uses CSS peer selectors
- Requires modern browsers (IE11 not supported)
- Label automatically floats when input has value or is focused
- Works with all HTML5 input types
- Dark mode automatically adapts colors
- Animation is smooth and follows Material Design guidelines
- Peer utility is a Tailwind CSS state selector that works like group
- For best results, avoid using placeholder attribute (label serves this purpose)
- Icon position and styling varies by variant
- Compatible with Livewire's real-time validation