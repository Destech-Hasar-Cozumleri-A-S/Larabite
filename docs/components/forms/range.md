# Form Range Component

Range slider component - allows users to select numeric values by sliding.

## Component Location

**File Path:** `resources/views/components/ui/form/range.blade.php`

## Features

- 3 variant (default, steps, labels)
- 3 size option (sm, base, lg)
- Min/max value support
- Step (increment) support
- Current value display
- Value prefix/suffix
- Min/max labels
- Custom step labels
- Validation states (error, success)
- Helper text support
- Disabled state
- Required field indicator
- Dark mode support
- Livewire integration
- Keyboard navigation

## Usage Examples

### Default Range Slider

```blade
<x-ui::form.range
    label="Volume"
    name="volume"
    wire:model="volume"
/>
```

### With Current Value Display

```blade
<x-ui::form.range
    label="Price"
    name="price"
    :showValue="true"
    valuePrefix="$"
    wire:model="price"
/>
```

### Custom Min/Max

```blade
<x-ui::form.range
    label="Age"
    name="age"
    :min="18"
    :max="100"
    :value="25"
    wire:model="age"
/>
```

### With Min/Max Labels

```blade
<x-ui::form.range
    label="Temperature"
    name="temperature"
    :min="0"
    :max="100"
    :showMinMax="true"
    valueSuffix="°C"
    wire:model="temperature"
/>
```

### Custom Step

```blade
<x-ui::form.range
    label="Rating"
    name="rating"
    :min="0"
    :max="5"
    :step="0.5"
    :showValue="true"
    wire:model="rating"
/>
```

### Disabled State

```blade
<x-ui::form.range
    label="Locked Setting"
    name="locked"
    :disabled="true"
    :value="75"
/>
```

### With Helper Text

```blade
<x-ui::form.range
    label="Brightness"
    name="brightness"
    helper="Adjust the screen brightness level"
    :showValue="true"
    valueSuffix="%"
    wire:model="brightness"
/>
```

### Different Sizes

```blade
{{-- Small Size --}}
<x-ui::form.range
    label="Small Range"
    name="small_range"
    size="sm"
    wire:model="smallRange"
/>

{{-- Base Size (Default) --}}
<x-ui::form.range
    label="Base Range"
    name="base_range"
    size="base"
    wire:model="baseRange"
/>

{{-- Large Size --}}
<x-ui::form.range
    label="Large Range"
    name="large_range"
    size="lg"
    wire:model="largeRange"
/>
```

### Steps Variant

```blade
<x-ui::form.range
    label="Quality"
    name="quality"
    :min="0"
    :max="100"
    :step="25"
    :steps="[0, 25, 50, 75, 100]"
    variant="steps"
    wire:model="quality"
/>
```

### Labels Variant

```blade
<x-ui::form.range
    label="Size"
    name="size"
    :min="1"
    :max="5"
    :value="3"
    variant="labels"
    wire:model="size"
>
    <div class="flex justify-between text-xs text-gray-500 dark:text-gray-400">
        <span>XS</span>
        <span>S</span>
        <span>M</span>
        <span>L</span>
        <span>XL</span>
    </div>
</x-ui::form.range>
```

### Error State

```blade
<x-ui::form.range
    label="Age"
    name="age"
    :error="$errors->first('age')"
    wire:model="age"
/>
```

### Success State

```blade
<x-ui::form.range
    label="Completed"
    name="progress"
    success="Goal achieved!"
    :value="100"
    wire:model="progress"
/>
```

## Real-World Examples

### Price Range Filter

```blade
<div class="space-y-4">
    <x-ui::form.range
        label="Minimum Price"
        name="min_price"
        :min="0"
        :max="1000"
        :value="100"
        :showValue="true"
        valuePrefix="$"
        helper="Minimum price"
        wire:model.live="filters.minPrice"
    />

    <x-ui::form.range
        label="Maximum Price"
        name="max_price"
        :min="0"
        :max="1000"
        :value="500"
        :showValue="true"
        valuePrefix="$"
        helper="Maximum price"
        wire:model.live="filters.maxPrice"
    />
</div>
```

### Volume Control

```blade
<div class="bg-white p-6 rounded-lg shadow">
    <x-ui::form.range
        label="Volume"
        name="volume"
        :min="0"
        :max="100"
        :value="50"
        :showValue="true"
        valueSuffix="%"
        size="lg"
        wire:model.live="settings.volume"
    />
</div>
```

### T-Shirt Size Selector

```blade
<x-ui::form.range
    label="Select Size"
    name="tshirt_size"
    :min="1"
    :max="5"
    :value="3"
    variant="labels"
    wire:model="orderSize"
>
    <div class="flex justify-between text-sm font-medium text-gray-700 dark:text-gray-300">
        <span>XS</span>
        <span>S</span>
        <span>M</span>
        <span>L</span>
        <span>XL</span>
    </div>
</x-ui::form.range>
```

### Service Distance Radius

```blade
<x-ui::form.range
    label="Service Radius"
    name="service_radius"
    :min="1"
    :max="50"
    :value="10"
    :showValue="true"
    valueSuffix=" km"
    helper="Maximum distance for service delivery"
    wire:model.live="service.radius"
/>
```

### Decimal Steps

```blade
<x-ui::form.range
    label="Temperature"
    name="temperature"
    :min="15.0"
    :max="30.0"
    :step="0.5"
    :value="22.5"
    :showValue="true"
    valueSuffix="°C"
    helper="Room temperature setting"
    wire:model.live="room.temperature"
/>
```

## Props Table

| Prop | Type | Default | Description |
|------|------|---------|-------------|
| `label` | string | optional | Range slider label |
| `name` | string | **required** | Input name |
| `value` | number | 50 | Initial value |
| `min` | number | 0 | Minimum value |
| `max` | number | 100 | Maximum value |
| `step` | number | 1 | Increment amount |
| `disabled` | boolean | false | Disabled state |
| `required` | boolean | false | Required field indicator |
| `error` | string | optional | Error message |
| `success` | string | optional | Success message |
| `helper` | string | optional | Helper text |
| `size` | string | 'base' | Slider size: sm, base, lg |
| `variant` | string | 'default' | Variant: default, steps, labels |
| `showValue` | boolean | false | Show current value |
| `valuePrefix` | string | optional | Value prefix (e.g.: "$") |
| `valueSuffix` | string | optional | Value suffix (e.g.: "%", "°C", " km") |
| `showMinMax` | boolean | false | Show min/max values |
| `steps` | array | optional | Step values array (for steps variant) |

## Variants

### Default
Standard range slider

### Steps
With specific step labels

### Labels
With custom labels (using slot)

## Validation Examples

```blade
<x-ui::form.range
    label="Age"
    name="age"
    :min="18"
    :max="100"
    :required="true"
    :error="$errors->first('age')"
    wire:model="age"
/>
```

## Livewire Integration

### Basic Integration

```blade
<x-ui::form.range
    label="Volume"
    name="volume"
    wire:model="volume"
/>
```

### Live Update

```blade
<x-ui::form.range
    label="Brightness"
    name="brightness"
    :showValue="true"
    valueSuffix="%"
    wire:model.live="brightness"
/>
```

### Debounced Update

```blade
<x-ui::form.range
    label="Price Filter"
    name="price"
    :showValue="true"
    valuePrefix="$"
    wire:model.live.debounce.500ms="filters.price"
/>
```

## Best Practices

1. **Set meaningful min/max** - Define appropriate value ranges
2. **Use appropriate steps** - Choose step sizes that make sense for the context
3. **Show current value** - Display the selected value for user feedback
4. **Add units** - Use prefix/suffix to show currency, percentages, units
5. **Show min/max labels** - Help users understand the range
6. **Use steps variant** - For predefined value sets (quality levels, etc.)
7. **Use labels variant** - For non-numeric scales (sizes, ratings, etc.)
8. **Provide helper text** - Explain what the slider controls
9. **Validate ranges** - Ensure min is less than max
10. **Use live updates** - For real-time filtering and previews

## Notes

- Range slider uses HTML5 native input[type="range"]
- `w-full` class is used for responsive design
- Dark mode support is available
- Step value can be a decimal number (e.g.: 0.5, 0.1)
- Min/max values can be negative
- `wire:model.live` can be used for real-time updates
- Value is automatically updated with `showValue` (JavaScript oninput event)
- Specific value points can be shown with steps variant
- Completely custom labels can be created with labels variant
- Value formatting can be done with prefix and suffix ($100, 50%, 22°C etc.)
- In disabled state, opacity decreases and cursor changes
- Keyboard navigation is supported (value change with Arrow keys)
- `wire:model` or `wire:model.live` can be used with Livewire
- Required attribute can be used for form validation