# Form Range Component

Range slider bileşeni - kullanıcıların kaydırarak sayısal değer seçmesini sağlar.

## Component Location

**File Path:** `resources/views/components/ui/form/range.blade.php`

## Features

- 3 varyant (default, steps, labels)
- 3 boyut seçeneği (sm, base, lg)
- Min/max value desteği
- Step (increment) desteği
- Current value display
- Value prefix/suffix
- Min/max labels
- Custom step labels
- Validation states (error, success)
- Helper text desteği
- Disabled state
- Required field indicator
- Dark mode desteği
- Livewire entegrasyonu
- Keyboard navigation

## Usage Examples

### Default Range Slider

```blade
<x-ui.form.range
    label="Volume"
    name="volume"
    wire:model="volume"
/>
```

### With Current Value Display

```blade
<x-ui.form.range
    label="Price"
    name="price"
    :showValue="true"
    valuePrefix="$"
    wire:model="price"
/>
```

### Custom Min/Max

```blade
<x-ui.form.range
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
<x-ui.form.range
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
<x-ui.form.range
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
<x-ui.form.range
    label="Locked Setting"
    name="locked"
    :disabled="true"
    :value="75"
/>
```

### With Helper Text

```blade
<x-ui.form.range
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
<x-ui.form.range
    label="Small Range"
    name="small_range"
    size="sm"
    wire:model="smallRange"
/>

{{-- Base Size (Default) --}}
<x-ui.form.range
    label="Base Range"
    name="base_range"
    size="base"
    wire:model="baseRange"
/>

{{-- Large Size --}}
<x-ui.form.range
    label="Large Range"
    name="large_range"
    size="lg"
    wire:model="largeRange"
/>
```

### Steps Variant

```blade
<x-ui.form.range
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
<x-ui.form.range
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
</x-ui.form.range>
```

### Error State

```blade
<x-ui.form.range
    label="Age"
    name="age"
    :error="$errors->first('age')"
    wire:model="age"
/>
```

### Success State

```blade
<x-ui.form.range
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
    <x-ui.form.range
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

    <x-ui.form.range
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
    <x-ui.form.range
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
<x-ui.form.range
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
</x-ui.form.range>
```

### Service Distance Radius

```blade
<x-ui.form.range
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
<x-ui.form.range
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
| `label` | string | optional | Range slider etiketi |
| `name` | string | **required** | Input name |
| `value` | number | 50 | Başlangıç değeri |
| `min` | number | 0 | Minimum değer |
| `max` | number | 100 | Maximum değer |
| `step` | number | 1 | Artış miktarı |
| `disabled` | boolean | false | Devre dışı durumu |
| `required` | boolean | false | Zorunlu alan işareti |
| `error` | string | optional | Hata mesajı |
| `success` | string | optional | Başarı mesajı |
| `helper` | string | optional | Yardımcı metin |
| `size` | string | 'base' | Slider boyutu: sm, base, lg |
| `variant` | string | 'default' | Varyant: default, steps, labels |
| `showValue` | boolean | false | Mevcut değeri göster |
| `valuePrefix` | string | optional | Değer öneki (örn: "$") |
| `valueSuffix` | string | optional | Değer soneki (örn: "%", "°C", " km") |
| `showMinMax` | boolean | false | Min/max değerleri göster |
| `steps` | array | optional | Adım değerleri dizisi (steps varyantı için) |

## Variants

### Default
Standart range slider

### Steps
Belirli adım etiketleri ile

### Labels
Özel etiketler ile (slot kullanarak)

## Validation Examples

```blade
<x-ui.form.range
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
<x-ui.form.range
    label="Volume"
    name="volume"
    wire:model="volume"
/>
```

### Live Update

```blade
<x-ui.form.range
    label="Brightness"
    name="brightness"
    :showValue="true"
    valueSuffix="%"
    wire:model.live="brightness"
/>
```

### Debounced Update

```blade
<x-ui.form.range
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

- Range slider, HTML5 native input[type="range"] kullanır
- Responsive tasarım için `w-full` class'ı kullanılır
- Dark mode desteği mevcuttur
- Step değeri ondalık sayı olabilir (örn: 0.5, 0.1)
- Min/max değerleri negatif olabilir
- Real-time updates için `wire:model.live` kullanılabilir
- `showValue` ile değer otomatik güncellenir (JavaScript oninput event)
- Steps varyantı ile belirli değer noktaları gösterilebilir
- Labels varyantı ile tamamen özelleştirilmiş etiketler oluşturulabilir
- Prefix ve suffix ile değer formatlaması yapılabilir ($100, 50%, 22°C vb.)
- Disabled durumda opacity azalır ve cursor değişir
- Keyboard navigation desteklenir (Arrow keys ile değer değişimi)
- Livewire ile `wire:model` veya `wire:model.live` kullanılabilir
- Required attribute form validation için kullanılabilir