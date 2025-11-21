# Form Components Overview

Flowbite form bileşenleri ile oluşturulmuş kapsamlı form elemanları koleksiyonu. Modern, accessible ve responsive form'lar oluşturmak için gerekli tüm bileşenler.

## 📦 Available Form Components

| Component | Description | Path |
|-----------|-------------|------|
| [Input](input.md) | Text inputs with validation | `ui/form/input.blade.php` |
| [Textarea](textarea.md) | Multi-line text input | `ui/form/textarea.blade.php` |
| [Select](select.md) | Dropdown select menus | `ui/form/select.blade.php` |
| [Checkbox](checkbox.md) | Checkbox inputs | `ui/form/checkbox.blade.php` |
| [Radio](radio.md) | Radio button inputs | `ui/form/radio.blade.php` |
| [Toggle](toggle.md) | Toggle switches | `ui/form/toggle.blade.php` |
| [Range](range.md) | Range slider inputs | `ui/form/range.blade.php` |
| [File Input](file-input.md) | File upload inputs | `ui/form/file-input.blade.php` |
| [Search Input](search-input.md) | Search input variants | `ui/form/search-input.blade.php` |
| [Number Input](number-input.md) | Numeric inputs with controls | `ui/form/number-input.blade.php` |
| [Phone Input](phone-input.md) | Phone number inputs | `ui/form/phone-input.blade.php` |
| [Timepicker](timepicker.md) | Time selection inputs | `ui/form/timepicker.blade.php` |
| [Datepicker](datepicker.md) | Date selection with calendar | `ui/form/datepicker.blade.php` |
| [Floating Label](floating-label.md) | Material Design floating labels | `ui/form/floating-label.blade.php` |

---

## 🎨 Common Features

### Validation States

All form components support three validation states:

```blade
{{-- Error State --}}
<x-ui.form.input
    label="Email"
    name="email"
    type="email"
    error="Please enter a valid email address"
/>

{{-- Success State --}}
<x-ui.form.input
    label="Email"
    name="email"
    type="email"
    success="Email is valid!"
/>

{{-- Normal State with Helper Text --}}
<x-ui.form.input
    label="Email"
    name="email"
    type="email"
    helper="We'll never share your email with anyone else."
/>
```

### Sizes

Most form inputs support multiple sizes:

```blade
{{-- Small --}}
<x-ui.form.input label="Small Input" size="sm" />

{{-- Base (Default) --}}
<x-ui.form.input label="Base Input" size="base" />

{{-- Large --}}
<x-ui.form.input label="Large Input" size="lg" />

{{-- Extra Large --}}
<x-ui.form.input label="Extra Large Input" size="xl" />
```

### Disabled State

```blade
<x-ui.form.input
    label="Disabled Input"
    name="disabled"
    :disabled="true"
    value="This cannot be edited"
/>
```

### Required Fields

```blade
<x-ui.form.input
    label="Required Field"
    name="required"
    :required="true"
/>
```

---

## 📝 Complete Form Example

### Registration Form

```blade
<form action="{{ route('register') }}" method="POST" class="space-y-6">
    @csrf

    {{-- Name Input --}}
    <x-ui.form.input
        label="Full Name"
        name="name"
        type="text"
        placeholder="John Doe"
        :required="true"
        :error="$errors->first('name')"
    />

    {{-- Email Input with Icon --}}
    <x-ui.form.input
        label="Email Address"
        name="email"
        type="email"
        placeholder="john@example.com"
        :required="true"
        :error="$errors->first('email')"
    >
        <x-slot:leadingIcon>
            <svg class="w-4 h-4 text-gray-500" fill="currentColor" viewBox="0 0 20 20">
                <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z"/>
                <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z"/>
            </svg>
        </x-slot:leadingIcon>
    </x-ui.form.input>

    {{-- Password Input --}}
    <x-ui.form.input
        label="Password"
        name="password"
        type="password"
        placeholder="••••••••"
        :required="true"
        :error="$errors->first('password')"
        helper="Must be at least 8 characters long"
    />

    {{-- Confirm Password --}}
    <x-ui.form.input
        label="Confirm Password"
        name="password_confirmation"
        type="password"
        placeholder="••••••••"
        :required="true"
    />

    {{-- Phone Number --}}
    <x-ui.form.phone-input
        label="Phone Number"
        name="phone"
        placeholder="123-456-7890"
    />

    {{-- Date of Birth --}}
    <x-ui.form.datepicker
        label="Date of Birth"
        name="dob"
        :required="true"
    />

    {{-- Country Select --}}
    <x-ui.form.select
        label="Country"
        name="country"
        :required="true"
    >
        <option value="">Select a country</option>
        <option value="us">United States</option>
        <option value="ca">Canada</option>
        <option value="uk">United Kingdom</option>
        <option value="tr">Turkey</option>
    </x-ui.form.select>

    {{-- Bio Textarea --}}
    <x-ui.form.textarea
        label="Bio"
        name="bio"
        placeholder="Tell us about yourself..."
        rows="4"
        maxlength="500"
        :showCharCount="true"
        helper="Write a short bio about yourself"
    />

    {{-- Terms Checkbox --}}
    <x-ui.form.checkbox
        name="terms"
        :required="true"
        :error="$errors->first('terms')"
    >
        I agree to the <a href="/terms" class="text-blue-600 hover:underline">Terms and Conditions</a>
    </x-ui.form.checkbox>

    {{-- Newsletter Toggle --}}
    <x-ui.form.toggle
        label="Subscribe to newsletter"
        name="newsletter"
        helper="Get updates about new features and special offers"
    />

    {{-- Submit Button --}}
    <x-ui.button type="submit" variant="primary" size="lg" class="w-full">
        Create Account
    </x-ui.button>
</form>
```

### Contact Form

```blade
<form action="{{ route('contact') }}" method="POST" class="space-y-4">
    @csrf

    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        {{-- First Name --}}
        <x-ui.form.input
            label="First Name"
            name="first_name"
            :required="true"
        />

        {{-- Last Name --}}
        <x-ui.form.input
            label="Last Name"
            name="last_name"
            :required="true"
        />
    </div>

    {{-- Email --}}
    <x-ui.form.input
        label="Email"
        name="email"
        type="email"
        :required="true"
    />

    {{-- Subject --}}
    <x-ui.form.select
        label="Subject"
        name="subject"
        :required="true"
    >
        <option value="">Select a subject</option>
        <option value="general">General Inquiry</option>
        <option value="support">Technical Support</option>
        <option value="billing">Billing Question</option>
        <option value="feedback">Feedback</option>
    </x-ui.form.select>

    {{-- Message --}}
    <x-ui.form.textarea
        label="Message"
        name="message"
        rows="6"
        :required="true"
        placeholder="Write your message here..."
    />

    {{-- File Attachment --}}
    <x-ui.form.file-input
        label="Attachment (Optional)"
        name="attachment"
        helper="Max file size: 5MB"
    />

    {{-- Submit --}}
    <x-ui.button type="submit" variant="primary">
        Send Message
    </x-ui.button>
</form>
```

### Login Form

```blade
<form action="{{ route('login') }}" method="POST" class="space-y-4">
    @csrf

    {{-- Email with Icon --}}
    <x-ui.form.input
        label="Email"
        name="email"
        type="email"
        :required="true"
        :error="$errors->first('email')"
    >
        <x-slot:leadingIcon>
            <svg class="w-4 h-4 text-gray-500" fill="currentColor" viewBox="0 0 20 20">
                <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z"/>
                <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z"/>
            </svg>
        </x-slot:leadingIcon>
    </x-ui.form.input>

    {{-- Password --}}
    <x-ui.form.input
        label="Password"
        name="password"
        type="password"
        :required="true"
        :error="$errors->first('password')"
    />

    <div class="flex items-center justify-between">
        {{-- Remember Me --}}
        <x-ui.form.checkbox name="remember" label="Remember me" />

        {{-- Forgot Password Link --}}
        <a href="{{ route('password.request') }}" class="text-sm text-blue-600 hover:underline">
            Forgot password?
        </a>
    </div>

    {{-- Submit --}}
    <x-ui.button type="submit" variant="primary" class="w-full">
        Sign In
    </x-ui.button>
</form>
```

### Search Form

```blade
<form action="{{ route('search') }}" method="GET" class="max-w-2xl mx-auto">
    <x-ui.form.search-input
        name="q"
        placeholder="Search for products, brands, or categories..."
        size="lg"
        button-text="Search"
    />

    {{-- Advanced Filters (Collapsible) --}}
    <div x-data="{ showFilters: false }" class="mt-4">
        <button
            type="button"
            @click="showFilters = !showFilters"
            class="text-sm text-blue-600 hover:underline"
        >
            <span x-show="!showFilters">Show advanced filters</span>
            <span x-show="showFilters">Hide advanced filters</span>
        </button>

        <div x-show="showFilters" x-collapse class="mt-4 space-y-4">
            <x-ui.form.select label="Category" name="category">
                <option value="">All Categories</option>
                <option value="electronics">Electronics</option>
                <option value="clothing">Clothing</option>
                <option value="books">Books</option>
            </x-ui.form.select>

            <div>
                <label class="block text-sm font-medium text-gray-900 mb-3">Price Range</label>
                <x-ui.form.range
                    name="price"
                    min="0"
                    max="1000"
                    step="10"
                    value="500"
                />
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-900 mb-3">Rating</label>
                <div class="space-y-2">
                    <x-ui.form.radio name="rating" value="5" label="5 stars" />
                    <x-ui.form.radio name="rating" value="4" label="4 stars & up" />
                    <x-ui.form.radio name="rating" value="3" label="3 stars & up" />
                </div>
            </div>
        </div>
    </div>
</form>
```

---

## 🎯 Form Layouts

### Horizontal Form

```blade
<form class="space-y-4">
    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 items-start">
        <label class="block text-sm font-medium text-gray-900 md:text-right md:pt-2">
            Email
        </label>
        <div class="md:col-span-2">
            <x-ui.form.input
                name="email"
                type="email"
                placeholder="john@example.com"
            />
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 items-start">
        <label class="block text-sm font-medium text-gray-900 md:text-right md:pt-2">
            Password
        </label>
        <div class="md:col-span-2">
            <x-ui.form.input
                name="password"
                type="password"
                placeholder="••••••••"
            />
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
        <div class="md:col-start-2 md:col-span-2">
            <x-ui.button type="submit" variant="primary">
                Submit
            </x-ui.button>
        </div>
    </div>
</form>
```

### Inline Form

```blade
<form class="flex items-center gap-2">
    <x-ui.form.input
        name="email"
        type="email"
        placeholder="Enter your email"
        size="sm"
        class="flex-1"
    />
    <x-ui.button type="submit" variant="primary" size="sm">
        Subscribe
    </x-ui.button>
</form>
```

### Multi-Column Form

```blade
<form class="space-y-6">
    {{-- Personal Information --}}
    <div>
        <h3 class="text-lg font-semibold mb-4">Personal Information</h3>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <x-ui.form.input label="First Name" name="first_name" :required="true" />
            <x-ui.form.input label="Last Name" name="last_name" :required="true" />
            <x-ui.form.input label="Email" name="email" type="email" :required="true" />
            <x-ui.form.phone-input label="Phone" name="phone" />
        </div>
    </div>

    {{-- Address --}}
    <div>
        <h3 class="text-lg font-semibold mb-4">Address</h3>
        <div class="grid grid-cols-1 gap-4">
            <x-ui.form.input label="Street Address" name="address" />
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <x-ui.form.input label="City" name="city" />
                <x-ui.form.input label="State" name="state" />
                <x-ui.form.input label="ZIP Code" name="zip" />
            </div>
        </div>
    </div>

    {{-- Preferences --}}
    <div>
        <h3 class="text-lg font-semibold mb-4">Preferences</h3>
        <div class="space-y-3">
            <x-ui.form.toggle
                label="Email Notifications"
                name="email_notifications"
                helper="Receive updates via email"
            />
            <x-ui.form.toggle
                label="SMS Notifications"
                name="sms_notifications"
                helper="Receive updates via SMS"
            />
        </div>
    </div>

    {{-- Submit --}}
    <div class="flex justify-end">
        <x-ui.button type="submit" variant="primary">
            Save Changes
        </x-ui.button>
    </div>
</form>
```

---

## ✨ Form Validation with Livewire

### Real-Time Validation

```blade
<div>
    <form wire:submit.prevent="submit">
        <x-ui.form.input
            label="Username"
            name="username"
            wire:model.live="username"
            :error="$errors->first('username')"
            helper="Only letters, numbers, and underscores"
        />

        <x-ui.form.input
            label="Email"
            name="email"
            type="email"
            wire:model.blur="email"
            :error="$errors->first('email')"
        />

        <x-ui.button type="submit" variant="primary">
            Submit
        </x-ui.button>
    </form>
</div>
```

### Livewire Component Example

```php
<?php

namespace App\Livewire\Forms;

use Livewire\Component;
use Livewire\Attributes\Validate;

class UserForm extends Component
{
    #[Validate('required|string|min:3|max:20|alpha_dash')]
    public $username = '';

    #[Validate('required|email')]
    public $email = '';

    #[Validate('required|min:8')]
    public $password = '';

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function submit()
    {
        $validated = $this->validate();

        // Save user...

        session()->flash('success', 'User created successfully!');
    }

    public function render()
    {
        return view('livewire.forms.user-form');
    }
}
```

---

## 🎨 Styling Customization

### Custom Classes

```blade
<x-ui.form.input
    label="Custom Input"
    name="custom"
    class="!bg-blue-50 !border-blue-300"
/>
```

### Variant Override

```blade
{{-- Change validation colors --}}
<x-ui.form.input
    label="Warning Input"
    name="warning"
    class="bg-yellow-50 border-yellow-500 focus:ring-yellow-500"
/>
```

---

## 🔒 Security Best Practices

### CSRF Protection

Always include `@csrf` in your forms:

```blade
<form method="POST" action="{{ route('submit') }}">
    @csrf
    {{-- Form fields --}}
</form>
```

### Input Sanitization

```blade
<x-ui.form.input
    label="Name"
    name="name"
    value="{{ old('name', $user->name) }}"
    :error="$errors->first('name')"
/>
```

### File Upload Security

```blade
<x-ui.form.file-input
    label="Profile Picture"
    name="avatar"
    accept="image/png,image/jpeg"
    helper="Max size: 2MB"
/>
```

---

## 📱 Responsive Design

All form components are mobile-first and responsive:

```blade
{{-- Stack on mobile, side-by-side on desktop --}}
<div class="grid grid-cols-1 md:grid-cols-2 gap-4">
    <x-ui.form.input label="First Name" name="first_name" />
    <x-ui.form.input label="Last Name" name="last_name" />
</div>

{{-- Full width on mobile, constrained on desktop --}}
<div class="max-w-md mx-auto">
    <x-ui.form.input label="Email" name="email" type="email" />
</div>
```

---

## 🌙 Dark Mode

All form components support dark mode out of the box. No additional configuration needed!

```blade
{{-- Automatically adapts to dark mode --}}
<x-ui.form.input
    label="Username"
    name="username"
    placeholder="Enter username"
/>
```

---

## ♿ Accessibility

### ARIA Attributes

All components include proper ARIA attributes:

```blade
{{-- aria-describedby for helper text --}}
<x-ui.form.input
    label="Email"
    name="email"
    helper="We'll never share your email"
/>

{{-- aria-invalid for errors --}}
<x-ui.form.input
    label="Email"
    name="email"
    error="Invalid email address"
/>
```

### Keyboard Navigation

All form components support keyboard navigation:
- Tab to navigate between fields
- Enter to submit forms
- Space to toggle checkboxes and radios
- Arrow keys for radio groups and select menus

---

## 🔗 Related Resources

- [Input Component](input.md) - Detailed input documentation
- [Select Component](select.md) - Detailed select documentation
- [Checkbox Component](checkbox.md) - Detailed checkbox documentation
- [Component Standards](../standards.md) - Development guidelines

---

## 💡 Tips & Tricks

### Auto-Focus First Input

```blade
<x-ui.form.input
    label="Email"
    name="email"
    autofocus
/>
```

### Conditional Fields

```blade
<div x-data="{ showAdvanced: false }">
    <x-ui.form.checkbox
        label="Show advanced options"
        @click="showAdvanced = !showAdvanced"
    />

    <div x-show="showAdvanced" x-collapse class="mt-4">
        <x-ui.form.input label="Advanced Setting" name="advanced" />
    </div>
</div>
```

### Form Progress Indicator

```blade
<div class="mb-6">
    <div class="flex justify-between mb-2">
        <span class="text-sm font-medium">Step 2 of 4</span>
        <span class="text-sm font-medium">50% Complete</span>
    </div>
    <div class="w-full bg-gray-200 rounded-full h-2">
        <div class="bg-blue-600 h-2 rounded-full" style="width: 50%"></div>
    </div>
</div>
```