# Form Select Component

Gelişmiş select dropdown bileşeni.

## Component Location

**Enhanced Version:** `resources/views/components/ui/form/select.blade.php`
**Basic Version:** `resources/views/components/ui/form-select.blade.php`

## Features

- 3 boyut seçeneği (sm, base, lg)
- 2 varyant (default, underline)
- Multiple selection desteği
- Validation states (error, success)
- Helper text desteği
- Disabled state
- Required field indicator
- Dark mode desteği
- Livewire entegrasyonu
- Custom size attribute (visible options count)

## Usage Examples - Enhanced Version

### Basic Select

```blade
<x-ui.form.select
    label="Country"
    name="country"
    placeholder="Select your country"
    wire:model="country"
>
    <option value="TR">Turkey</option>
    <option value="US">United States</option>
    <option value="GB">United Kingdom</option>
    <option value="FR">France</option>
</x-ui.form.select>
```

### With Error

```blade
<x-ui.form.select
    label="Category"
    name="category_id"
    placeholder="Choose category"
    :error="$errors->first('category_id')"
    wire:model="category_id"
>
    @foreach ($categories as $category)
        <option value="{{ $category->id }}">{{ $category->name }}</option>
    @endforeach
</x-ui.form.select>
```

### With Success

```blade
<x-ui.form.select
    label="Status"
    name="status"
    success="Status updated successfully"
    wire:model="status"
>
    <option value="active">Active</option>
    <option value="inactive">Inactive</option>
    <option value="pending">Pending</option>
</x-ui.form.select>
```

### With Helper Text

```blade
<x-ui.form.select
    label="Priority"
    name="priority"
    helper="Select the priority level for this task"
    wire:model="priority"
>
    <option value="low">Low</option>
    <option value="medium">Medium</option>
    <option value="high">High</option>
</x-ui.form.select>
```

### Required Field

```blade
<x-ui.form.select
    label="Species"
    name="species_id"
    placeholder="Select species"
    :required="true"
    wire:model.live="species_id"
>
    @foreach ($species as $s)
        <option value="{{ $s->id }}">{{ $s->name }}</option>
    @endforeach
</x-ui.form.select>
```

### Disabled State

```blade
<x-ui.form.select
    label="Region"
    name="region"
    :disabled="true"
    wire:model="region"
>
    <option value="emea">EMEA</option>
    <option value="apac">APAC</option>
    <option value="americas">Americas</option>
</x-ui.form.select>
```

### Multiple Selection

```blade
<x-ui.form.select
    label="Tags"
    name="tags[]"
    :multiple="true"
    helper="Hold Ctrl/Cmd to select multiple options"
    wire:model="tags"
>
    <option value="laravel">Laravel</option>
    <option value="php">PHP</option>
    <option value="javascript">JavaScript</option>
    <option value="tailwind">Tailwind CSS</option>
    <option value="livewire">Livewire</option>
</x-ui.form.select>
```

### Multiple with Size Attribute

```blade
<x-ui.form.select
    label="Skills"
    name="skills[]"
    :multiple="true"
    :selectSize="5"
    helper="Select all that apply"
    wire:model="skills"
>
    <option value="design">UI/UX Design</option>
    <option value="frontend">Frontend Development</option>
    <option value="backend">Backend Development</option>
    <option value="mobile">Mobile Development</option>
    <option value="devops">DevOps</option>
    <option value="testing">Testing & QA</option>
</x-ui.form.select>
```

### Underline Variant

```blade
<x-ui.form.select
    variant="underline"
    label="Language"
    name="language"
    wire:model="language"
>
    <option value="en">English</option>
    <option value="tr">Türkçe</option>
    <option value="es">Español</option>
    <option value="fr">Français</option>
</x-ui.form.select>
```

### Large Size

```blade
<x-ui.form.select
    size="lg"
    label="Department"
    name="department"
    placeholder="Select department"
    wire:model="department"
>
    <option value="sales">Sales</option>
    <option value="marketing">Marketing</option>
    <option value="engineering">Engineering</option>
    <option value="hr">Human Resources</option>
</x-ui.form.select>
```

### Small Size

```blade
<x-ui.form.select
    size="sm"
    label="Type"
    name="type"
    wire:model="type"
>
    <option value="personal">Personal</option>
    <option value="business">Business</option>
</x-ui.form.select>
```

### With Dynamic Options

```blade
<x-ui.form.select
    label="City"
    name="city_id"
    placeholder="Select city"
    helper="Select country first"
    :disabled="!$selectedCountry"
    wire:model="city_id"
>
    @foreach ($cities as $city)
        <option value="{{ $city->id }}">{{ $city->name }}</option>
    @endforeach
</x-ui.form.select>
```

### With Optgroups

```blade
<x-ui.form.select
    label="Timezone"
    name="timezone"
    wire:model="timezone"
>
    <optgroup label="North America">
        <option value="America/New_York">Eastern Time</option>
        <option value="America/Chicago">Central Time</option>
        <option value="America/Denver">Mountain Time</option>
        <option value="America/Los_Angeles">Pacific Time</option>
    </optgroup>
    <optgroup label="Europe">
        <option value="Europe/London">London</option>
        <option value="Europe/Paris">Paris</option>
        <option value="Europe/Istanbul">Istanbul</option>
    </optgroup>
</x-ui.form.select>
```

## Usage Examples - Basic Version

```blade
<x-ui.form-select
    label="Species"
    name="species_id"
    placeholder="Select species"
    required
    wire:model.live="species_id"
    :error="$errors->first('species_id')"
>
    @foreach ($species as $s)
        <option value="{{ $s->id }}">{{ $s->name }}</option>
    @endforeach
</x-ui.form-select>
```

## Props Table - Enhanced Version

| Prop | Type | Default | Description |
|------|------|---------|-------------|
| `label` | string | optional | Label metni |
| `name` | string | optional | Select name attribute |
| `placeholder` | string | 'Choose an option' | Placeholder option text |
| `size` | string | 'base' | Boyut seçeneği: sm, base, lg |
| `variant` | string | 'default' | Varyant: default, underline |
| `required` | boolean | false | Zorunlu alan göstergesi |
| `disabled` | boolean | false | Disabled durumu |
| `multiple` | boolean | false | Çoklu seçim aktif mi? |
| `selectSize` | number | optional | Görünür seçenek sayısı (multiple için) |
| `error` | string | optional | Hata mesajı |
| `success` | string | optional | Başarı mesajı |
| `helper` | string | optional | Yardımcı metin |

## Props Table - Basic Version

| Prop | Type | Default | Description |
|------|------|---------|-------------|
| `label` | string | optional | Label metni |
| `name` | string | **required** | Select name |
| `placeholder` | string | 'Select an option' | Placeholder |
| `required` | boolean | false | Zorunlu mu? |
| `error` | string | optional | Hata mesajı |

## Variants

### Default
Standart bordered select dropdown

### Underline
Alt çizgi stili (floating label ile)

## Validation Examples

### With Livewire Validation

```blade
<x-ui.form.select
    label="Category"
    name="category_id"
    placeholder="Choose category"
    :error="$errors->first('category_id')"
    :required="true"
    wire:model="category_id"
>
    @foreach ($categories as $category)
        <option value="{{ $category->id }}">{{ $category->name }}</option>
    @endforeach
</x-ui.form.select>
```

## Livewire Integration

### Basic Integration

```blade
<x-ui.form.select
    label="Status"
    name="status"
    wire:model="status"
>
    <option value="active">Active</option>
    <option value="inactive">Inactive</option>
</x-ui.form.select>
```

### Live Update

```blade
<x-ui.form.select
    label="Country"
    name="country_id"
    placeholder="Select country"
    wire:model.live="country_id"
>
    @foreach ($countries as $country)
        <option value="{{ $country->id }}">{{ $country->name }}</option>
    @endforeach
</x-ui.form.select>
```

### Dependent Dropdowns

```blade
{{-- Country Select --}}
<x-ui.form.select
    label="Country"
    name="country_id"
    placeholder="Select country"
    wire:model.live="country_id"
>
    @foreach ($countries as $country)
        <option value="{{ $country->id }}">{{ $country->name }}</option>
    @endforeach
</x-ui.form.select>

{{-- City Select (depends on country) --}}
<x-ui.form.select
    label="City"
    name="city_id"
    placeholder="Select city"
    :disabled="!$country_id"
    wire:model="city_id"
>
    @foreach ($cities as $city)
        <option value="{{ $city->id }}">{{ $city->name }}</option>
    @endforeach
</x-ui.form.select>
```

## Best Practices

1. **Use meaningful placeholders** - Help users understand what to select
2. **Group related options** - Use `<optgroup>` for better organization
3. **Provide feedback** - Show validation errors and success messages
4. **Handle empty states** - Disable dependent selects until prerequisites are met
5. **Use live updates** - Use `wire:model.live` for dependent dropdowns
6. **Multiple selection clarity** - Always add helper text for multiple selection
7. **Size appropriately** - Use `selectSize` for multiple selects to show more options
8. **Alphabetize options** - Sort options alphabetically when appropriate
9. **Disable when loading** - Disable select while loading dynamic options
10. **Use underline variant** - For modern, minimal designs

## Notes

- Multiple selection requires `name` attribute to be an array (e.g., `name="tags[]"`)
- `selectSize` prop controls how many options are visible in multiselect mode
- Underline variant uses CSS peer selectors (requires modern browsers)
- Optgroup provides visual grouping of related options
- Use `wire:model.live` for dynamic option loading
- Basic version is for simple use cases; use enhanced version for advanced features