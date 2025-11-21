# Form Number Input Component

Number, phone and currency input component.

## Component Location

**File Path:** `resources/views/components/ui/form/number-input.blade.php`

## Features

- 3 size options (sm, base, lg)
- 5 main variants (default, buttons, counter, currency, phone)
- Min/max/step support
- Increment/decrement buttons
- Currency symbol support
- Phone number format
- Validation states (error, success)
- Helper text support
- Dark mode support
- Livewire integration
- Flowbite InputCounter JS integration

## Usage Examples

### Default Number Input

```blade
<x-ui::form.number-input
    label="Quantity"
    name="quantity"
    :min="0"
    :max="100"
    :step="1"
    wire:model="quantity"
/>
```

### Number Input with Leading Icon

```blade
<x-ui::form.number-input
    label="Age"
    name="age"
    :min="0"
    :max="120"
    wire:model="age"
>
    <x-slot:leadingIcon>
        <svg class="w-4 h-4 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
        </svg>
    </x-slot:leadingIcon>
</x-ui::form.number-input>
```

### Number Input with Increment/Decrement Buttons (Horizontal)

```blade
<x-ui::form.number-input
    variant="buttons"
    label="Quantity"
    name="quantity"
    value="1"
    :min="1"
    :max="10"
    buttonPosition="horizontal"
    wire:model="quantity"
/>
```

### Number Input with Buttons (Vertical)

```blade
<x-ui::form.number-input
    variant="buttons"
    label="Items"
    name="items"
    value="5"
    :min="0"
    :max="100"
    buttonPosition="andrtical"
    wire:model="items"
/>
```

### Counter Input (Minimalist Round Buttons)

```blade
<x-ui::form.number-input
    variant="counter"
    label="People"
    name="people"
    value="2"
    :min="1"
    :max="10"
    wire:model="people"
/>
```

### Currency Input (Symbol Left)

```blade
<x-ui::form.number-input
    variant="currency"
    label="Price"
    name="price"
    placeholder="0.00"
    currencySymbol="₺"
    currencyPosition="left"
    :min="0"
    :step="0.01"
    wire:model="price"
/>
```

### Currency Input (Symbol Right)

```blade
<x-ui::form.number-input
    variant="currency"
    label="Amount"
    name="amount"
    placeholder="0.00"
    currencySymbol="USD"
    currencyPosition="right"
    :min="0"
    :step="0.01"
    wire:model="amount"
/>
```

### Phone Number Input

```blade
<x-ui::form.number-input
    variant="phone"
    label="Phone Number"
    name="phone"
    placeholder="555-123-4567"
    countryCode="+1"
    countryFlag="🇺🇸"
    wire:model="phone"
/>
```

### Phone Number Input (Turkey)

```blade
<x-ui::form.number-input
    variant="phone"
    label="Telefon Numarası"
    name="phone"
    placeholder="5xx xxx xx xx"
    countryCode="+90"
    countryFlag="🇹🇷"
    wire:model="phone"
/>
```

### With Error

```blade
<x-ui::form.number-input
    label="Quantity"
    name="quantity"
    error="Quantity must be at least 1"
    wire:model="quantity"
/>
```

### With Success

```blade
<x-ui::form.number-input
    label="Stock"
    name="stock"
    success="Stock updated successfully"
    wire:model="stock"
/>
```

### With Helper Text

```blade
<x-ui::form.number-input
    label="Discount Percentage"
    name="discount"
    helper="Enter a value between 0 and 100"
    :min="0"
    :max="100"
    :step="0.1"
    wire:model="discount"
/>
```

### Disabled State

```blade
<x-ui::form.number-input
    label="Fixed Price"
    name="price"
    value="99.99"
    :disabled="true"
/>
```

### Required Field

```blade
<x-ui::form.number-input
    label="Required Quantity"
    name="qty"
    :required="true"
    :min="1"
    wire:model="qty"
/>
```

### Different Sizes

```blade
{{-- Large Size --}}
<x-ui::form.number-input
    size="lg"
    label="Amount"
    name="amount"
    placeholder="Enter amount"
    wire:model="amount"
/>

{{-- Small Size --}}
<x-ui::form.number-input
    size="sm"
    label="Qty"
    name="qty"
    wire:model="qty"
/>
```

## Real-World Examples

### Product Quantity Selector

```blade
<x-ui::form.number-input
    variant="counter"
    label="Quantity"
    name="quantity"
    value="1"
    :min="1"
    :max="99"
    helper="Maximum 99 items per order"
    wire:model="cart.quantity"
/>
```

### Price Input

```blade
<x-ui::form.number-input
    variant="currency"
    label="Product Price"
    name="price"
    placeholder="0.00"
    currencySymbol="$"
    currencyPosition="left"
    :min="0"
    :step="0.01"
    :required="true"
    :error="$errors->first('price')"
    wire:model="product.price"
/>
```

### Discount Calculator

```blade
<x-ui::form.number-input
    variant="buttons"
    label="Discount %"
    name="discount"
    value="0"
    :min="0"
    :max="100"
    :step="5"
    buttonPosition="horizontal"
    helper="Discount percentage (0-100%)"
    wire:model.live="discount"
/>
```

## Props Table

| Prop | Type | Default | Description |
|------|------|---------|-------------|
| `label` | string | optional | Label text |
| `name` | string | optional | Input name attribute |
| `placeholder` | string | optional | Placeholder text |
| `value` | string/number | optional | Initial value |
| `size` | string | 'base' | Size: sm, base, lg |
| `variant` | string | 'default' | Variant: default, buttons, counter, currency, phone |
| `min` | number | optional | Minimum value |
| `max` | number | optional | Maximum value |
| `step` | number | 1 | Increment amount |
| `required` | boolean | false | Required field |
| `disabled` | boolean | false | Disabled state |
| `error` | string | optional | Error message |
| `success` | string | optional | Success message |
| `helper` | string | optional | Helper text |
| `leadingIcon` | slot | optional | Left icon (for default variant) |
| `buttonPosition` | string | 'horizontal' | Button position: horizontal, vertical |
| `currencySymbol` | string | '$' | Currency symbol |
| `currencyPosition` | string | 'left' | Symbol position: left, right |
| `countryCode` | string | '+1' | Country code |
| `countryFlag` | string | optional | Country flag emoji |

## Variants

### Default
Standard number input (with arrow icons)

### Buttons
With increment/decrement buttons (horizontal or vertical)

### Counter
With minimalist round buttons (small sized)

### Currency
With currency symbol

### Phone
For phone number (with country code)

## Validation Examples

```blade
<x-ui::form.number-input
    label="Quantity"
    name="quantity"
    :min="1"
    :max="100"
    :required="true"
    :error="$errors->first('quantity')"
    wire:model="quantity"
/>

{{-- In Livewire Component --}}
protected $rules = [
    'quantity' => 'required|integer|min:1|max:100',
];
```

## Livewire Integration

### Basic Integration

```blade
<x-ui::form.number-input
    label="Quantity"
    name="quantity"
    wire:model="quantity"
/>
```

### Live Update

```blade
<x-ui::form.number-input
    variant="counter"
    label="Items"
    name="items"
    wire:model.live="items"
/>

{{-- Display calculated total --}}
<div class="mt-2">
    Total: ${{ $items * $price }}
</div>
```

## Best Practices

1. **Set min/max constraints** - Define appropriate value ranges
2. **Use appropriate steps** - Set decimal steps for currency (0.01)
3. **Choose right variant** - Counter for small ranges, buttons for general use
4. **Add currency symbols** - Use currency variant for prices
5. **Provide feedback** - Show validation errors and success messages
6. **Disable when needed** - Disable inputs that shouldn't be changed
7. **Use helper text** - Explain constraints and format
8. **Validate on server** - Always validate min/max on server side
9. **Format display** - Show proper formatting for currencies
10. **Consider UX** - Buttons are easier than typing for small ranges

## Notes

- `buttons` and `counter` variants require Flowbite InputCounter JS
- InputCounter uses `data-input-counter`, `data-input-counter-min`, `data-input-counter-max` data attributes
- Buttons are connected to input with `data-input-counter-increment` and `data-input-counter-decrement` attributes
- Currency variant uses `type="number"`, add `step="0.01"` for decimal numbers
- Phone variant uses `type="tel"`
- Min/max values should also be validated on manual input (Livewire validation)
- Step value can be a decimal number (0.01 for prices)
- Counter variant ideal for quantity selectors in e-commerce