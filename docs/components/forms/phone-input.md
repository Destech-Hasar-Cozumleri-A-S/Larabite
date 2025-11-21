# Form Phone Input Component

Telefon numarası girişi için özel bileşen (ülke dropdown desteği ile).

## Component Location

**File Path:** `resources/views/components/ui/form/phone-input.blade.php`

## Features

- 3 boyut seçeneği (sm, base, lg)
- 3 ana varyant (default, dropdown, floating)
- Telefon ikonu otomatik eklenir
- Ülke seçimi dropdown menüsü
- Bayrak (flag) emoji desteği
- Ülke kodu gösterimi
- Pattern validation desteği
- Validation states (error, success)
- Helper text desteği
- Dark mode desteği
- Livewire entegrasyonu
- HTML5 tel input tipi
- Flowbite Dropdown JS entegrasyonu

## Usage Examples

### Default Phone Input (with Icon)

```blade
<x-ui.form.phone-input
    label="Phone Number"
    name="phone"
    placeholder="555-123-4567"
    wire:model="phone"
/>
```

### Phone Input with Country Dropdown

```blade
<x-ui.form.phone-input
    variant="dropdown"
    label="Phone Number"
    name="phone"
    placeholder="555-123-4567"
    wire:model="phone"
/>
```

### Custom Countries List

```blade
@php
$countries = [
    ['code' => '+90', 'name' => 'Turkey', 'flag' => '🇹🇷', 'iso' => 'TR'],
    ['code' => '+1', 'name' => 'United States', 'flag' => '🇺🇸', 'iso' => 'US'],
    ['code' => '+44', 'name' => 'United Kingdom', 'flag' => '🇬🇧', 'iso' => 'GB'],
];
@endphp

<x-ui.form.phone-input
    variant="dropdown"
    label="Telefon Numarası"
    name="phone"
    placeholder="5xx xxx xx xx"
    :countries="$countries"
    :selectedCountry="$countries[0]"
    wire:model="phone"
/>
```

### Floating Label Variant

```blade
<x-ui.form.phone-input
    variant="floating"
    label="Phone Number"
    name="phone"
    wire:model="phone"
/>
```

### With Pattern Validation

```blade
<x-ui.form.phone-input
    label="US Phone"
    name="phone"
    placeholder="123-456-7890"
    pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}"
    helper="Format: 123-456-7890"
    wire:model="phone"
/>
```

### Without Country Dropdown

```blade
<x-ui.form.phone-input
    variant="dropdown"
    label="Phone"
    name="phone"
    placeholder="Enter phone number"
    :showCountryDropdown="false"
    wire:model="phone"
/>
```

### With Error

```blade
<x-ui.form.phone-input
    label="Phone Number"
    name="phone"
    placeholder="555-123-4567"
    error="Please enter a valid phone number"
    wire:model="phone"
/>
```

### With Success

```blade
<x-ui.form.phone-input
    label="Phone Number"
    name="phone"
    placeholder="555-123-4567"
    success="Phone number verified!"
    wire:model="phone"
/>
```

### With Helper Text

```blade
<x-ui.form.phone-input
    label="Phone Number"
    name="phone"
    placeholder="555-123-4567"
    helper="We'll send you a verification code"
    wire:model="phone"
/>
```

### Required Field

```blade
<x-ui.form.phone-input
    label="Phone Number"
    name="phone"
    placeholder="555-123-4567"
    :required="true"
    wire:model="phone"
/>
```

### Disabled State

```blade
<x-ui.form.phone-input
    label="Phone Number"
    name="phone"
    value="+90 555 123 45 67"
    :disabled="true"
/>
```

### Different Sizes

```blade
{{-- Large Size --}}
<x-ui.form.phone-input
    size="lg"
    label="Phone Number"
    name="phone"
    placeholder="Enter your phone"
    wire:model="phone"
/>

{{-- Small Size --}}
<x-ui.form.phone-input
    size="sm"
    variant="dropdown"
    label="Phone"
    name="phone"
    placeholder="Phone number"
    wire:model="phone"
/>
```

### Verification Form Example

```blade
<form wire:submit.prevent="sendVerification">
    <x-ui.form.phone-input
        variant="dropdown"
        label="Phone Number"
        name="phone"
        placeholder="555-123-4567"
        helper="We will send you an SMS with a verification code"
        :required="true"
        wire:model="phone"
    />

    <button type="submit" class="mt-4 px-4 py-2 bg-blue-600 text-white rounded-lg">
        Send Verification Code
    </button>
</form>
```

## Real-World Examples

### User Registration

```blade
<x-ui.form.phone-input
    variant="dropdown"
    label="Mobile Number"
    name="phone"
    placeholder="Enter your mobile number"
    :required="true"
    :error="$errors->first('phone')"
    wire:model="phone"
/>
```

### Two-Factor Authentication

```blade
<x-ui.form.phone-input
    label="Phone Number for 2FA"
    name="two_factor_phone"
    placeholder="Enter phone for verification"
    helper="We'll send a verification code to this number"
    :required="true"
    wire:model="twoFactorPhone"
/>
```

### Contact Form

```blade
<x-ui.form.phone-input
    variant="dropdown"
    label="Contact Number"
    name="contact_phone"
    placeholder="Your phone number"
    helper="Optional - We'll only use this to follow up"
    wire:model="contactPhone"
/>
```

## Props Table

| Prop | Type | Default | Description |
|------|------|---------|-------------|
| `label` | string | optional | Label metni |
| `name` | string | 'phone' | Input name attribute |
| `placeholder` | string | optional | Placeholder text |
| `value` | string | optional | Initial value |
| `size` | string | 'base' | Boyut: sm, base, lg |
| `variant` | string | 'default' | Varyant: default, dropdown, floating |
| `required` | boolean | false | Zorunlu alan göstergesi |
| `disabled` | boolean | false | Disabled durumu |
| `error` | string | optional | Hata mesajı |
| `success` | string | optional | Başarı mesajı |
| `helper` | string | optional | Yardımcı metin |
| `pattern` | string | optional | Validation pattern |
| `countries` | array | optional | Ülke listesi |
| `selectedCountry` | array | optional | Varsayılan seçili ülke |
| `showCountryDropdown` | boolean | true | Ülke dropdown gösterilsin mi? |

## Variants

### Default
Telefon ikonu ile standart input

### Dropdown
Ülke seçimi dropdown menüsü ile birlikte

### Floating
Material Design tarzı yüzen label

## Default Countries

Eğer `countries` prop'u sağlanmazsa, varsayılan olarak şu ülkeler kullanılır:
- 🇹🇷 Turkey (+90)
- 🇺🇸 United States (+1)
- 🇬🇧 United Kingdom (+44)
- 🇫🇷 France (+33)
- 🇩🇪 Germany (+49)
- 🇦🇺 Australia (+61)

## Country Object Format

```php
[
    'code' => '+90',      // Ülke telefon kodu
    'name' => 'Turkey',   // Ülke adı
    'flag' => '🇹🇷',      // Bayrak emoji
    'iso' => 'TR'         // ISO ülke kodu
]
```

## Validation Examples

### With Livewire Validation

```blade
<x-ui.form.phone-input
    variant="dropdown"
    label="Phone Number"
    name="phone"
    placeholder="555-123-4567"
    :required="true"
    :error="$errors->first('phone')"
    wire:model="phone"
/>

{{-- In Livewire Component --}}
protected $rules = [
    'phone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10|max:15',
];
```

### With Pattern Validation

```blade
<x-ui.form.phone-input
    label="US Phone Number"
    name="phone"
    placeholder="123-456-7890"
    pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}"
    helper="Format: 123-456-7890"
    :required="true"
    :error="$errors->first('phone')"
    wire:model="phone"
/>
```

## Livewire Integration

### Basic Integration

```blade
<x-ui.form.phone-input
    label="Phone"
    name="phone"
    wire:model="phone"
/>
```

### Live Update with Validation

```blade
<x-ui.form.phone-input
    variant="dropdown"
    label="Phone Number"
    name="phone"
    wire:model.live="phone"
    :error="$errors->first('phone')"
/>
```

### Country Selection

```blade
<x-ui.form.phone-input
    variant="dropdown"
    label="Phone"
    name="phone"
    :countries="$availableCountries"
    :selectedCountry="$defaultCountry"
    wire:model="phone"
/>

{{-- In Livewire Component --}}
public $phone;
public $availableCountries;
public $defaultCountry;

public function mount()
{
    $this->availableCountries = [
        ['code' => '+90', 'name' => 'Turkey', 'flag' => '🇹🇷', 'iso' => 'TR'],
        ['code' => '+1', 'name' => 'United States', 'flag' => '🇺🇸', 'iso' => 'US'],
    ];
    $this->defaultCountry = $this->availableCountries[0];
}
```

## Best Practices

1. **Use dropdown variant** - Better UX for international applications
2. **Provide format hints** - Show expected format in placeholder or helper
3. **Validate on server** - Always validate phone numbers on server side
4. **Use pattern attribute** - Add client-side validation pattern
5. **Include country code** - Store complete phone number with country code
6. **Show clear errors** - Provide specific error messages for invalid formats
7. **Consider auto-formatting** - Format phone numbers as user types
8. **Default to user's country** - Set default country based on user location
9. **Support international** - Use dropdown for international phone numbers
10. **Verify with SMS** - Consider adding phone verification

## Notes

- Dropdown varyantı Flowbite Dropdown JS gerektirir
- `type="tel"` HTML5 semantic input kullanılır
- Pattern validation için `pattern` attribute kullanılabilir
- Ülke dropdown interaktif olması için Flowbite JS yüklenmiş olmalıdır
- Floating label varyantı CSS peer selectors kullanır (modern browsers için)
- Telefon numarası formatı validation için pattern kullanın veya Livewire'da validate edin
- Consider using a phone number library (like libphonenumber) for robust validation
- Store phone numbers in E.164 format (+[country code][number]) in database