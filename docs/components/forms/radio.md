# Form Radio Component

Radio button bileşeni - kullanıcıların birden fazla seçenek arasından tek bir seçenek seçmesini sağlar.

## Component Location

**Enhanced Version:** `resources/views/components/ui/form/radio.blade.php`
**Basic Version:** `resources/views/components/ui/form-radio.blade.php`

## Features

- 5 varyant (default, inline, list-group, bordered, color)
- 7 renk seçeneği (blue, red, green, purple, teal, yellow, orange)
- Helper text desteği
- Description/açıklama desteği (bordered için)
- Icon desteği (bordered için)
- Validation states (error, success)
- Disabled state
- Required field indicator
- Dark mode desteği
- Livewire entegrasyonu

## Usage Examples - Enhanced Version

### Default Radio Button

```blade
<x-ui.form.radio
    label="Male"
    name="gender"
    value="male"
    wire:model="gender"
/>

<x-ui.form.radio
    label="Female"
    name="gender"
    value="female"
    wire:model="gender"
/>
```

### Radio Button with Helper Text

```blade
<x-ui.form.radio
    label="Standard Delivery"
    name="shipping"
    value="standard"
    helper="Delivery within 5-7 business days"
    wire:model="shipping"
/>
```

### Checked State

```blade
<x-ui.form.radio
    label="Yes"
    name="newsletter"
    value="yes"
    :checked="true"
    wire:model="newsletter"
/>
```

### Disabled State

```blade
<x-ui.form.radio
    label="Premium Option"
    name="plan"
    value="premium"
    :disabled="true"
/>
```

### Required Field

```blade
<x-ui.form.radio
    label="Credit Card"
    name="payment_method"
    value="credit_card"
    :required="true"
    wire:model="paymentMethod"
/>
```

### Inline Radio Buttons

```blade
<div class="flex space-x-4">
    <x-ui.form.radio label="Small" name="size" value="small" variant="inline" wire:model="size" />
    <x-ui.form.radio label="Medium" name="size" value="medium" variant="inline" wire:model="size" />
    <x-ui.form.radio label="Large" name="size" value="large" variant="inline" wire:model="size" />
</div>
```

### List Group Radio Buttons

```blade
<ul class="w-48 text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-lg dark:bg-gray-700 dark:border-gray-600 dark:text-white">
    <x-ui.form.radio label="Profile" name="settings" value="profile" variant="list-group" wire:model="activeSetting" />
    <x-ui.form.radio label="Account" name="settings" value="account" variant="list-group" wire:model="activeSetting" />
    <x-ui.form.radio label="Security" name="settings" value="security" variant="list-group" wire:model="activeSetting" />
</ul>
```

### Bordered Radio (Card Style)

```blade
<div class="space-y-4">
    <x-ui.form.radio
        label="Standard Plan"
        description="Basic features included"
        name="plan"
        value="standard"
        variant="bordered"
        wire:model="selectedPlan"
    />
    <x-ui.form.radio
        label="Premium Plan"
        description="All features + priority support"
        name="plan"
        value="premium"
        variant="bordered"
        wire:model="selectedPlan"
    />
</div>
```

### Bordered with Icon

```blade
<x-ui.form.radio
    label="Credit Card"
    description="Pay with Visa, Mastercard, or American Express"
    name="payment"
    value="credit_card"
    variant="bordered"
    wire:model="paymentMethod"
>
    <x-slot:icon>
        <svg class="w-6 h-6 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z" />
        </svg>
    </x-slot:icon>
</x-ui.form.radio>
```

### Color Variants

```blade
<div class="space-y-3">
    <x-ui.form.radio label="Blue (Default)" name="color" value="blue" variant="color" color="blue" />
    <x-ui.form.radio label="Red" name="color" value="red" variant="color" color="red" />
    <x-ui.form.radio label="Green" name="color" value="green" variant="color" color="green" />
    <x-ui.form.radio label="Purple" name="color" value="purple" variant="color" color="purple" />
    <x-ui.form.radio label="Teal" name="color" value="teal" variant="color" color="teal" />
    <x-ui.form.radio label="Yellow" name="color" value="yellow" variant="color" color="yellow" />
    <x-ui.form.radio label="Orange" name="color" value="orange" variant="color" color="orange" />
</div>
```

### Error State

```blade
<x-ui.form.radio
    label="Option 1"
    name="choice"
    value="option1"
    :error="$errors->first('choice')"
    wire:model="choice"
/>
```

### Success State

```blade
<x-ui.form.radio
    label="Verified Option"
    name="verified"
    value="yes"
    success="This option has been verified"
    wire:model="verified"
/>
```

## Real-World Examples

### Gender Selection

```blade
<fieldset>
    <legend class="text-sm font-medium text-gray-900 dark:text-white mb-3">Gender</legend>
    <div class="space-y-2">
        <x-ui.form.radio label="Male" name="gender" value="male" wire:model="gender" />
        <x-ui.form.radio label="Female" name="gender" value="female" wire:model="gender" />
        <x-ui.form.radio label="Other" name="gender" value="other" wire:model="gender" />
        <x-ui.form.radio label="Prefer not to say" name="gender" value="prefer_not_to_say" wire:model="gender" />
    </div>
</fieldset>
```

### Shipping Method Selection

```blade
<fieldset>
    <legend class="text-lg font-semibold text-gray-900 mb-4">Shipping Method</legend>
    <div class="space-y-3">
        <x-ui.form.radio
            label="Standard Delivery"
            description="5-7 business days • Free"
            name="shipping"
            value="standard"
            variant="bordered"
            wire:model="shippingMethod"
        />
        <x-ui.form.radio
            label="Express Delivery"
            description="2-3 business days • $9.99"
            name="shipping"
            value="express"
            variant="bordered"
            wire:model="shippingMethod"
        />
        <x-ui.form.radio
            label="Next Day Delivery"
            description="Order before 5pm for next day • $19.99"
            name="shipping"
            value="next_day"
            variant="bordered"
            wire:model="shippingMethod"
        />
    </div>
</fieldset>
```

### Payment Method Selection

```blade
<div class="space-y-3">
    <x-ui.form.radio
        label="Credit Card"
        description="Pay with Visa, Mastercard, or American Express"
        name="payment_method"
        value="credit_card"
        variant="bordered"
        wire:model="paymentMethod"
    >
        <x-slot:icon>
            <svg class="w-6 h-6 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z" />
            </svg>
        </x-slot:icon>
    </x-ui.form.radio>

    <x-ui.form.radio
        label="PayPal"
        description="Fast and secure payment via PayPal"
        name="payment_method"
        value="paypal"
        variant="bordered"
        wire:model="paymentMethod"
    >
        <x-slot:icon>
            <svg class="w-6 h-6 text-blue-600" fill="currentColor" viewBox="0 0 24 24">
                <path d="M20.067 8.478c.492.88.556 2.014.3 3.327-.74 3.806-3.276 5.12-6.514 5.12h-.5a.805.805 0 00-.794.68l-.04.22-.63 3.993-.028.16a.804.804 0 01-.794.679H7.72a.483.483 0 01-.477-.558L7.418 21h1.518l.95-6.02h1.385c4.678 0 7.75-2.203 8.796-6.502z"/>
            </svg>
        </x-slot:icon>
    </x-ui.form.radio>
</div>
```

## Usage Examples - Basic Version

```blade
<x-ui.form-radio
    label="Option 1"
    value="option1"
    name="choice"
    wire:model="selectedChoice"
/>
```

## Props Table - Enhanced Version

| Prop | Type | Default | Description |
|------|------|---------|-------------|
| `label` | string | optional | Radio button etiketi |
| `name` | string | **required** | Radio button grubu adı |
| `value` | mixed | **required** | Radio button değeri |
| `checked` | boolean | false | Başlangıçta seçili olup olmadığı |
| `disabled` | boolean | false | Devre dışı durumu |
| `required` | boolean | false | Zorunlu alan işareti |
| `error` | string | optional | Hata mesajı |
| `success` | string | optional | Başarı mesajı |
| `helper` | string | optional | Yardımcı metin |
| `variant` | string | 'default' | Varyant: default, inline, list-group, bordered, color |
| `color` | string | 'blue' | Renk: blue, red, green, purple, teal, yellow, orange |
| `description` | string | optional | Açıklama metni (bordered için) |
| `icon` | slot | optional | İkon içeriği (bordered için) |

## Props Table - Basic Version

| Prop | Type | Default | Description |
|------|------|---------|-------------|
| `label` | string | **required** | Label metni |
| `value` | mixed | **required** | Radio button değeri |

## Variants

### Default
Standart radio button

### Inline
Yatay düzen için

### List Group
Liste içinde kullanım için

### Bordered
Kart tarzı, büyük tıklama alanı

### Color
Renk varyantları ile

## Validation Examples

```blade
<fieldset>
    <legend class="text-sm font-medium text-gray-900 mb-3">Select Payment Method</legend>
    <div class="space-y-2">
        <x-ui.form.radio
            label="Credit Card"
            name="payment"
            value="credit_card"
            :required="true"
            :error="$errors->first('payment')"
            wire:model="payment"
        />
        <x-ui.form.radio
            label="PayPal"
            name="payment"
            value="paypal"
            wire:model="payment"
        />
    </div>
</fieldset>
```

## Livewire Integration

### Basic Integration

```blade
<x-ui.form.radio
    label="Option 1"
    name="choice"
    value="option1"
    wire:model="choice"
/>
```

### Live Update

```blade
<x-ui.form.radio
    label="Yes"
    name="subscribe"
    value="yes"
    wire:model.live="subscribe"
/>
```

## Best Practices

1. **Group with same name** - All radio buttons in a group must share the same `name`
2. **Unique values** - Each radio button needs a unique `value`
3. **Provide labels** - Always include descriptive labels for accessibility
4. **Use fieldset** - Wrap radio groups in `<fieldset>` with `<legend>`
5. **Bordered for important choices** - Use bordered variant for plan selection, payment methods
6. **Inline for compact layouts** - Use inline variant for sizes, ratings
7. **List group for settings** - Use list-group variant for settings panels
8. **Validate required** - Show clear error messages for required selections
9. **Disable when needed** - Disable options that aren't available
10. **Use descriptions** - Add helpful descriptions with bordered variant

## Notes

- Radio buttonlar aynı `name` ile gruplandırılmalıdır
- Bir grup içinde sadece bir radio button seçilebilir
- Her radio button için benzersiz bir `value` gereklidir
- Accessibility için her radio button'ın label'ı olmalıdır
- List group varyantı `ul` wrapper içinde kullanılmalıdır
- Bordered varyant daha büyük tıklama alanı sağlar (label tüm kartı kaplar)
- Color varyantı ile 7 farklı renk seçeneği kullanılabilir
- Icon slot kullanılarak SVG iconlar eklenebilir (bordered varyantı için)
- Livewire ile `wire:model` veya `wire:model.live` kullanılabilir
- `wire:model.live` anında değişiklikleri yakalar (real-time validation için ideal)
- Basic version is deprecated; use enhanced version for new projects