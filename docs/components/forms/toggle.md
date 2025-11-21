# Form Toggle Component

Toggle/Switch bileşeni - iki durumlu (açık/kapalı, aktif/pasif) seçimler için.

## Component Location

**File Path:** `resources/views/components/ui/form/toggle.blade.php`

## Features

- 4 varyant (default, double-label, icon, card)
- 2 boyut seçeneği (base, lg)
- 7 renk seçeneği (blue, red, green, purple, teal, yellow, orange)
- Description/açıklama desteği (card için)
- Icon desteği (card için)
- Validation states (error, success)
- Helper text desteği
- Disabled state
- Required field indicator
- Dark mode desteği
- Livewire entegrasyonu
- Smooth animations
- RTL support

## Usage Examples

### Default Toggle

```blade
<x-ui.form.toggle
    label="Enable notifications"
    name="notifications"
    wire:model="notifications"
/>
```

### Checked State

```blade
<x-ui.form.toggle
    label="Remember me"
    name="remember"
    :checked="true"
    wire:model="rememberMe"
/>
```

### Disabled State

```blade
<x-ui.form.toggle
    label="Premium Feature"
    name="premium"
    :disabled="true"
    helper="Available only for premium users"
/>
```

### With Helper Text

```blade
<x-ui.form.toggle
    label="Dark Mode"
    name="dark_mode"
    helper="Switch between light and dark themes"
    wire:model="darkMode"
/>
```

### Required Field

```blade
<x-ui.form.toggle
    label="Accept Terms"
    name="accept_terms"
    :required="true"
    wire:model="acceptTerms"
/>
```

### Different Sizes

```blade
{{-- Base Size (Default) --}}
<x-ui.form.toggle
    label="Base size toggle"
    name="base_toggle"
    size="base"
    wire:model="baseToggle"
/>

{{-- Large Size --}}
<x-ui.form.toggle
    label="Large size toggle"
    name="large_toggle"
    size="lg"
    wire:model="largeToggle"
/>
```

### Color Variants

```blade
<div class="space-y-3">
    <x-ui.form.toggle label="Blue (Default)" name="color1" color="blue" :checked="true" />
    <x-ui.form.toggle label="Red" name="color2" color="red" :checked="true" />
    <x-ui.form.toggle label="Green" name="color3" color="green" :checked="true" />
    <x-ui.form.toggle label="Purple" name="color4" color="purple" :checked="true" />
    <x-ui.form.toggle label="Teal" name="color5" color="teal" :checked="true" />
    <x-ui.form.toggle label="Yellow" name="color6" color="yellow" :checked="true" />
    <x-ui.form.toggle label="Orange" name="color7" color="orange" :checked="true" />
</div>
```

### Double Label Variant

```blade
<x-ui.form.toggle
    labelBefore="Off"
    labelAfter="On"
    name="status"
    variant="double-label"
    wire:model="status"
/>
```

### Icon Variant

```blade
<x-ui.form.toggle
    label="Status"
    name="active_status"
    variant="icon"
    wire:model="activeStatus"
/>
```

### Card Variant

```blade
<x-ui.form.toggle
    label="Email Notifications"
    description="Receive email updates about your account activity"
    name="email_notifications"
    variant="card"
    wire:model="emailNotifications"
/>
```

### Card with Icon

```blade
<x-ui.form.toggle
    label="Two-Factor Authentication"
    description="Add an extra layer of security to your account"
    name="two_factor"
    variant="card"
    wire:model="twoFactor"
>
    <x-slot:icon>
        <svg class="w-8 h-8 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
        </svg>
    </x-slot:icon>
</x-ui.form.toggle>
```

### Error State

```blade
<x-ui.form.toggle
    label="Accept Terms"
    name="terms"
    :error="$errors->first('terms')"
    wire:model="acceptedTerms"
/>
```

### Success State

```blade
<x-ui.form.toggle
    label="Verified Account"
    name="verified"
    success="Your account has been verified"
    :checked="true"
    :disabled="true"
/>
```

## Real-World Examples

### Settings Page - Notification Preferences

```blade
<div class="space-y-4">
    <h3 class="text-lg font-semibold text-gray-900 mb-4">Notification Preferences</h3>

    <x-ui.form.toggle
        label="Email Notifications"
        description="Receive email updates about your orders and account"
        name="email_notifications"
        variant="card"
        wire:model.live="settings.emailNotifications"
    >
        <x-slot:icon>
            <svg class="w-8 h-8 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
            </svg>
        </x-slot:icon>
    </x-ui.form.toggle>

    <x-ui.form.toggle
        label="Push Notifications"
        description="Get push notifications on your devices"
        name="push_notifications"
        variant="card"
        wire:model.live="settings.pushNotifications"
    >
        <x-slot:icon>
            <svg class="w-8 h-8 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
            </svg>
        </x-slot:icon>
    </x-ui.form.toggle>
</div>
```

### Privacy Settings

```blade
<div class="bg-white rounded-lg shadow p-6 space-y-4">
    <h3 class="text-lg font-semibold text-gray-900 mb-4">Privacy Settings</h3>

    <x-ui.form.toggle
        label="Public Profile"
        description="Make your profile visible to everyone"
        name="public_profile"
        variant="card"
        wire:model.live="privacy.publicProfile"
    />

    <x-ui.form.toggle
        label="Show Online Status"
        description="Let others see when you're online"
        name="show_online"
        variant="card"
        wire:model.live="privacy.showOnline"
    />

    <x-ui.form.toggle
        label="Allow Search Engines"
        description="Let search engines index your profile"
        name="allow_indexing"
        variant="card"
        wire:model.live="privacy.allowIndexing"
    />
</div>
```

### Service/Feature Toggles

```blade
<div class="space-y-3">
    <x-ui.form.toggle
        label="Subscription-Based Service"
        helper="Create different subscription plans for your service"
        name="is_subscription_based"
        wire:model.live="isSubscriptionBased"
    />

    <x-ui.form.toggle
        label="Enable Booking"
        helper="Allow customers to book appointments"
        name="enable_booking"
        wire:model.live="enableBooking"
    />

    <x-ui.form.toggle
        label="Auto-Accept Orders"
        helper="Automatically accept new orders without manual review"
        name="auto_accept"
        color="green"
        wire:model.live="autoAccept"
    />
</div>
```

### Feature Flags

```blade
<div class="space-y-2">
    <div class="flex items-center justify-between p-3 bg-gray-50 rounded">
        <span class="text-sm font-medium text-gray-700">Dark Mode</span>
        <x-ui.form.toggle name="dark_mode" variant="icon" size="lg" wire:model.live="darkMode" />
    </div>

    <div class="flex items-center justify-between p-3 bg-gray-50 rounded">
        <span class="text-sm font-medium text-gray-700">Beta Features</span>
        <x-ui.form.toggle name="beta_features" variant="icon" size="lg" color="purple" wire:model.live="betaFeatures" />
    </div>

    <div class="flex items-center justify-between p-3 bg-gray-50 rounded">
        <span class="text-sm font-medium text-gray-700">Analytics</span>
        <x-ui.form.toggle name="analytics" variant="icon" size="lg" color="blue" wire:model.live="analytics" />
    </div>
</div>
```

## Props Table

| Prop | Type | Default | Description |
|------|------|---------|-------------|
| `label` | string | optional | Toggle etiketi |
| `name` | string | **required** | Toggle input adı |
| `value` | string | '1' | Toggle değeri |
| `checked` | boolean | false | Başlangıçta seçili olup olmadığı |
| `disabled` | boolean | false | Devre dışı durumu |
| `required` | boolean | false | Zorunlu alan işareti |
| `error` | string | optional | Hata mesajı |
| `success` | string | optional | Başarı mesajı |
| `helper` | string | optional | Yardımcı metin |
| `size` | string | 'base' | Toggle boyutu: base, lg |
| `color` | string | 'blue' | Renk: blue, red, green, purple, teal, yellow, orange |
| `variant` | string | 'default' | Varyant: default, double-label, icon, card |
| `labelBefore` | string | optional | Toggle öncesi etiket (double-label için) |
| `labelAfter` | string | optional | Toggle sonrası etiket (double-label için) |
| `description` | string | optional | Açıklama metni (card için) |
| `icon` | slot | optional | İkon içeriği (card için) |

## Variants

### Default
Standart toggle (sağda etiket)

### Double-Label
İki taraflı etiket

### Icon
İçinde check/X iconları

### Card
Kart formatında

## Validation Examples

```blade
<x-ui.form.toggle
    label="I accept the terms and conditions"
    name="accept_terms"
    :required="true"
    :error="$errors->first('accept_terms')"
    wire:model="acceptTerms"
/>
```

## Livewire Integration

### Basic Integration

```blade
<x-ui.form.toggle
    label="Enable feature"
    name="feature"
    wire:model="featureEnabled"
/>
```

### Live Update

```blade
<x-ui.form.toggle
    label="Dark Mode"
    name="dark_mode"
    wire:model.live="darkMode"
/>
```

### Nested Properties

```blade
<x-ui.form.toggle
    label="Email Notifications"
    name="settings.email_notifications"
    wire:model.live="settings.emailNotifications"
/>
```

## Best Practices

1. **Use for binary choices** - Perfect for on/off, enabled/disabled states
2. **Provide clear labels** - Make it obvious what the toggle controls
3. **Add descriptions** - Use card variant with descriptions for complex settings
4. **Use colors meaningfully** - Red for destructive actions, green for positive ones
5. **Live updates** - Use `wire:model.live` for immediate feedback
6. **Group related toggles** - Organize settings into logical groups
7. **Disable when needed** - Disable toggles that depend on other settings
8. **Provide feedback** - Show success/error states for important toggles
9. **Use icons** - Add visual context with icons in card variant
10. **Consider accessibility** - Ensure toggles are keyboard-navigable

## Notes

- Toggle, checkbox input olarak implement edilmiştir
- CSS `peer` selector ile state management yapılır
- RTL (Right-to-Left) dil desteği vardır
- Focus state ile keyboard navigation desteklenir
- Smooth transition animasyonları ile modern görünüm
- Card varyantı daha fazla açıklama ve görsel zenginlik sağlar
- Icon varyantında varsayılan check/X iconları otomatik eklenir
- Double-label varyantı On/Off, Yes/No gibi açık durumlar için idealdir
- Livewire ile `wire:model` veya `wire:model.live` kullanılabilir
- `wire:model.live` anında değişiklikleri yakalar (real-time updates için)
- Disabled state ile kullanıcı etkileşimi engellenebilir
- Required attribute form validation için kullanılabilir