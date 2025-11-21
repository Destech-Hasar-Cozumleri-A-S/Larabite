# Form Floating Label Component

Material Design tarzı yüzen etiketli input alanları için. Etiket, input boşken içeride durur, input focus aldığında veya doldurulduğunda yukarı kayar.

## Component Location

**File Path:** `resources/views/components/ui/form/floating-label.blade.php`

## Features

- 3 varyant (outlined, filled, standard)
- 2 boyut seçeneği (sm, base)
- Validation states (error, success)
- Helper text desteği
- Icon support
- Multiple input types
- Disabled state
- Required field indicator
- Dark mode desteği
- Livewire entegrasyonu
- CSS peer selectors

## Usage Examples

### Outlined (Çerçeveli) - Varsayılan

```blade
<x-ui.form.floating-label
    label="Email"
    name="email"
    type="email"
    wire:model="email"
/>
```

### Filled (Doldurulmuş) Variant

```blade
<x-ui.form.floating-label
    label="Username"
    name="username"
    variant="filled"
    wire:model="username"
/>
```

### Standard (Alt Çizgi) Variant

```blade
<x-ui.form.floating-label
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
<x-ui.form.floating-label
    label="Full Name"
    name="full_name"
    size="base"
    wire:model="fullName"
/>

{{-- Small Size --}}
<x-ui.form.floating-label
    label="Username"
    name="username"
    size="sm"
    wire:model="username"
/>
```

### Error State

```blade
<x-ui.form.floating-label
    label="Email"
    name="email"
    type="email"
    wire:model="email"
    :error="$errors->first('email')"
/>
```

### Success State

```blade
<x-ui.form.floating-label
    label="Email"
    name="email"
    type="email"
    wire:model="email"
    success="Email is valid!"
/>
```

### Helper Text

```blade
<x-ui.form.floating-label
    label="Username"
    name="username"
    wire:model="username"
    helper="Choose a unique username between 3-20 characters"
/>
```

### Different Input Types

```blade
{{-- Text Input --}}
<x-ui.form.floating-label
    label="First Name"
    name="first_name"
    type="text"
    wire:model="firstName"
/>

{{-- Email Input --}}
<x-ui.form.floating-label
    label="Email Address"
    name="email"
    type="email"
    wire:model="email"
/>

{{-- Password Input --}}
<x-ui.form.floating-label
    label="Password"
    name="password"
    type="password"
    wire:model="password"
    required
/>

{{-- Number Input --}}
<x-ui.form.floating-label
    label="Age"
    name="age"
    type="number"
    wire:model="age"
    min="0"
    max="120"
/>

{{-- Phone Input --}}
<x-ui.form.floating-label
    label="Phone Number"
    name="phone"
    type="tel"
    wire:model="phone"
/>

{{-- URL Input --}}
<x-ui.form.floating-label
    label="Website"
    name="website"
    type="url"
    wire:model="website"
/>

{{-- Date Input --}}
<x-ui.form.floating-label
    label="Birth Date"
    name="birth_date"
    type="date"
    wire:model="birthDate"
/>

{{-- Time Input --}}
<x-ui.form.floating-label
    label="Appointment Time"
    name="appointment_time"
    type="time"
    wire:model="appointmentTime"
/>
```

### With Icon

```blade
<x-ui.form.floating-label
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
</x-ui.form.floating-label>
```

### Disabled State

```blade
<x-ui.form.floating-label
    label="Readonly Field"
    name="readonly_field"
    value="Cannot be changed"
    disabled
/>
```

### Required Field

```blade
<x-ui.form.floating-label
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
        <x-ui.form.floating-label
            label="Email Address"
            name="email"
            type="email"
            variant="outlined"
            wire:model="email"
            :error="$errors->first('email')"
            required
        />

        <x-ui.form.floating-label
            label="Password"
            name="password"
            type="password"
            variant="outlined"
            wire:model="password"
            :error="$errors->first('password')"
            required
        />

        <x-ui.button type="submit" color="primary">
            Login
        </x-ui.button>
    </div>
</form>
```

### Registration Form

```blade
<form wire:submit.prevent="register">
    <div class="space-y-6">
        <x-ui.form.floating-label
            label="Full Name"
            name="name"
            variant="filled"
            wire:model="name"
            :error="$errors->first('name')"
            required
        />

        <x-ui.form.floating-label
            label="Email Address"
            name="email"
            type="email"
            variant="filled"
            wire:model="email"
            :error="$errors->first('email')"
            helper="We'll never share your email with anyone else"
            required
        />

        <x-ui.form.floating-label
            label="Password"
            name="password"
            type="password"
            variant="filled"
            wire:model="password"
            :error="$errors->first('password')"
            helper="Use 8 or more characters with a mix of letters, numbers & symbols"
            required
        />

        <x-ui.form.floating-label
            label="Confirm Password"
            name="password_confirmation"
            type="password"
            variant="filled"
            wire:model="passwordConfirmation"
            :error="$errors->first('password_confirmation')"
            required
        />

        <x-ui.button type="submit" color="primary">
            Register
        </x-ui.button>
    </div>
</form>
```

### Contact Form

```blade
<form wire:submit.prevent="submitContact">
    <div class="space-y-4">
        <x-ui.form.floating-label
            label="Your Name"
            name="name"
            variant="standard"
            wire:model="contactForm.name"
            required
        />

        <x-ui.form.floating-label
            label="Email"
            name="email"
            type="email"
            variant="standard"
            wire:model="contactForm.email"
            required
        />

        <x-ui.form.floating-label
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
| `label` | string | **required** | Label metni |
| `name` | string | **required** | Input name attribute |
| `type` | string | 'text' | Input tipi |
| `value` | string | optional | Initial value |
| `placeholder` | string | optional | Placeholder (genellikle gerekli değil) |
| `size` | string | 'base' | Boyut: sm, base |
| `variant` | string | 'outlined' | Varyant: outlined, filled, standard |
| `disabled` | boolean | false | Disabled durumu |
| `required` | boolean | false | Zorunlu alan göstergesi |
| `error` | string | optional | Hata mesajı |
| `success` | string | optional | Başarı mesajı |
| `helper` | string | optional | Yardımcı metin |
| `icon` | slot | optional | Icon içeriği |
| `min` | number | optional | Minimum value (number/date types) |
| `max` | number | optional | Maximum value (number/date types) |

## Variants

### Outlined
Çerçeveli (bordered) design

### Filled
Filled background design

### Standard
Alt çizgi (underline) design

## Validation Examples

### With Livewire Validation

```blade
<x-ui.form.floating-label
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
<x-ui.form.floating-label
    label="Name"
    name="name"
    wire:model="name"
/>
```

### Live Update

```blade
<x-ui.form.floating-label
    label="Username"
    name="username"
    wire:model.live="username"
    :error="$errors->first('username')"
/>
```

### Blur Update

```blade
<x-ui.form.floating-label
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
- Peer utility Tailwind CSS'in grup gibi çalışan state selector'üdür
- For best results, avoid using placeholder attribute (label serves this purpose)
- Icon position and styling varies by variant
- Compatible with Livewire's real-time validation