# Form Timepicker Component

Zaman seçimi için HTML5 time input bileşeni.

## Component Location

**File Path:** `resources/views/components/ui/form/timepicker.blade.php`

## Features

- 6 varyant (default, icon, dropdown, select, range, inline)
- 3 boyut seçeneği (sm, base, lg)
- Min/max zaman kısıtlamaları
- Step (interval) desteği
- Zaman aralığı seçimi (range)
- Dropdown ile süre seçimi
- Timezone seçimi
- Interval checkbox'ları
- Validation states (error, success)
- Helper text desteği
- Dark mode desteği
- Disabled state desteği
- Livewire entegrasyonu

## Usage Examples

### Default Timepicker

```blade
<x-ui.form.timepicker
    label="Meeting Time"
    name="meeting_time"
    value="14:00"
    required
    wire:model="meetingTime"
/>
```

### Timepicker with Icon

```blade
<x-ui.form.timepicker
    variant="icon"
    label="Appointment Time"
    name="appointment_time"
    min="09:00"
    max="18:00"
    wire:model="appointmentTime"
    helper="Business hours: 9 AM - 6 PM"
/>
```

### Timepicker with Dropdown (Duration)

```blade
<x-ui.form.timepicker
    variant="dropdown"
    label="Start Time"
    name="start_time"
    dropdownLabel="Duration"
    :dropdownItems="[
        ['value' => '30', 'label' => '30 minutes'],
        ['value' => '60', 'label' => '1 hour'],
        ['value' => '90', 'label' => '1.5 hours'],
        ['value' => '120', 'label' => '2 hours'],
    ]"
    wire:model="startTime"
/>
```

### Timepicker with Timezone Select

```blade
<x-ui.form.timepicker
    variant="select"
    label="Schedule Time"
    name="schedule_time"
    :timezones="[
        ['value' => 'UTC', 'label' => 'UTC (GMT +0:00)'],
        ['value' => 'PST', 'label' => 'PST (GMT -8:00)'],
        ['value' => 'EST', 'label' => 'EST (GMT -5:00)'],
        ['value' => 'CET', 'label' => 'CET (GMT +1:00)'],
    ]"
    selectedTimezone="UTC"
    wire:model="scheduleTime"
/>
```

### Time Range Picker

```blade
<x-ui.form.timepicker
    variant="range"
    label="Business Hours"
    startName="open_time"
    endName="close_time"
    startLabel="Opening Time"
    endLabel="Closing Time"
    startValue="09:00"
    endValue="17:00"
    wire:model.live="openTime"
/>
```

### Inline Timepicker with Intervals

```blade
<x-ui.form.timepicker
    variant="inline"
    label="Event Time"
    name="event_time"
    :intervals="['30 min', '1 hour', '2 hours', '3 hours']"
    intervalLabel="Repeat every"
    wire:model="eventTime"
/>
```

### With Validation Error

```blade
<x-ui.form.timepicker
    label="Delivery Time"
    name="delivery_time"
    variant="icon"
    required
    wire:model="deliveryTime"
    :error="$errors->first('delivery_time')"
/>
```

### With Success State

```blade
<x-ui.form.timepicker
    label="Verified Time"
    name="verified_time"
    variant="icon"
    wire:model="verifiedTime"
    success="Time verified successfully!"
/>
```

### Disabled State

```blade
<x-ui.form.timepicker
    label="Disabled Time"
    name="disabled_time"
    value="12:00"
    disabled
/>
```

### With Step (15 minute intervals)

```blade
<x-ui.form.timepicker
    label="Reservation Time"
    name="reservation_time"
    variant="icon"
    step="900"
    min="10:00"
    max="22:00"
    helper="Available slots every 15 minutes"
    wire:model="reservationTime"
/>
```

### Different Sizes

```blade
{{-- Small Size --}}
<x-ui.form.timepicker
    label="Time"
    name="time"
    size="sm"
    variant="icon"
    wire:model="time"
/>

{{-- Large Size --}}
<x-ui.form.timepicker
    label="Time"
    name="time"
    size="lg"
    variant="icon"
    wire:model="time"
/>
```

### Custom Timezones

```blade
<x-ui.form.timepicker
    variant="select"
    label="Global Meeting Time"
    name="meeting_time"
    :timezones="[
        ['value' => 'UTC', 'label' => 'UTC (GMT +0:00)'],
        ['value' => 'London', 'label' => 'London (GMT +0:00)'],
        ['value' => 'Paris', 'label' => 'Paris (GMT +1:00)'],
        ['value' => 'Istanbul', 'label' => 'Istanbul (GMT +3:00)'],
        ['value' => 'Tokyo', 'label' => 'Tokyo (GMT +9:00)'],
        ['value' => 'Sydney', 'label' => 'Sydney (GMT +10:00)'],
        ['value' => 'New_York', 'label' => 'New York (GMT -5:00)'],
        ['value' => 'Los_Angeles', 'label' => 'Los Angeles (GMT -8:00)'],
    ]"
    selectedTimezone="Istanbul"
    wire:model="meetingTime"
/>
```

### Working Hours Range

```blade
<x-ui.form.timepicker
    variant="range"
    label="Monday Working Hours"
    startName="monday_start"
    endName="monday_end"
    startValue="08:00"
    endValue="16:00"
    required
    wire:model="mondayStart"
/>
```

## Props Table

### Basic Props

| Prop | Type | Default | Description |
|------|------|---------|-------------|
| `label` | string | optional | Label metni |
| `name` | string | 'time' | Input name |
| `placeholder` | string | optional | Placeholder metni |
| `value` | string | optional | Varsayılan zaman değeri (HH:MM formatında) |
| `size` | string | 'base' | Boyut: sm, base, lg |
| `required` | boolean | false | Zorunlu mu? |
| `disabled` | boolean | false | Devre dışı mı? |
| `error` | string | optional | Hata mesajı |
| `success` | string | optional | Başarı mesajı |
| `helper` | string | optional | Yardımcı metin |
| `variant` | string | 'default' | Varyant: default, icon, dropdown, select, range, inline |
| `min` | string | optional | Minimum zaman (örn: "09:00") |
| `max` | string | optional | Maximum zaman (örn: "18:00") |
| `step` | string | optional | Zaman adımı saniye cinsinden (örn: 900 = 15 dakika) |

### Range Variant Props

| Prop | Type | Default | Description |
|------|------|---------|-------------|
| `startName` | string | 'start_time' | Başlangıç zamanı input name |
| `endName` | string | 'end_time' | Bitiş zamanı input name |
| `startLabel` | string | 'Start time' | Başlangıç zamanı label |
| `endLabel` | string | 'End time' | Bitiş zamanı label |
| `startValue` | string | optional | Başlangıç zamanı değeri |
| `endValue` | string | optional | Bitiş zamanı değeri |

### Dropdown Variant Props

| Prop | Type | Default | Description |
|------|------|---------|-------------|
| `dropdownItems` | array | [] | Süre seçenekleri dizisi |
| `dropdownLabel` | string | 'Duration' | Dropdown button label |
| `dropdownName` | string | 'duration' | Dropdown input name |

### Select Variant Props

| Prop | Type | Default | Description |
|------|------|---------|-------------|
| `timezones` | array | [] | Timezone seçenekleri dizisi |
| `timezoneLabel` | string | 'Timezone' | Timezone label |
| `timezoneName` | string | 'timezone' | Timezone input name |
| `selectedTimezone` | string | optional | Seçili timezone değeri |

### Inline Variant Props

| Prop | Type | Default | Description |
|------|------|---------|-------------|
| `intervals` | array | ['30 min', '1 hour', '2 hours'] | Interval checkbox'ları |
| `intervalLabel` | string | 'Interval' | Interval section label |

## Variants

### Default
Standart HTML5 time input

### Icon
Sağ tarafta saat ikonu olan time input

### Dropdown
Time input + süre seçimi dropdown'u

### Select
Time input + timezone select dropdown'u

### Range
Başlangıç ve bitiş zamanı için ikili time input

### Inline
Time input + interval seçimi için checkbox'lar

## Validation Examples

```blade
<x-ui.form.timepicker
    label="Appointment Time"
    name="appointment_time"
    variant="icon"
    min="09:00"
    max="18:00"
    :required="true"
    :error="$errors->first('appointment_time')"
    wire:model="appointmentTime"
/>
```

## Livewire Integration

### Basic Integration

```blade
<x-ui.form.timepicker
    label="Meeting Time"
    name="meeting_time"
    wire:model="meetingTime"
/>
```

### Live Update

```blade
<x-ui.form.timepicker
    label="Start Time"
    name="start_time"
    variant="icon"
    wire:model.live="startTime"
/>
```

### Range with Separate Models

```blade
<x-ui.form.timepicker
    variant="range"
    label="Working Hours"
    startName="start_time"
    endName="end_time"
    wire:model.live="startTime"
/>

{{-- In your Livewire component --}}
public $startTime;
public $endTime;
```

## Best Practices

1. **Set min/max constraints** - Limit time selection to valid business hours
2. **Use appropriate steps** - Set step intervals that make sense (15min, 30min, 1hr)
3. **Provide helper text** - Clarify time format and constraints
4. **Use range for periods** - Use range variant for start/end time pairs
5. **Add timezone support** - Use select variant for international scheduling
6. **Include duration** - Use dropdown variant to select duration alongside start time
7. **Validate on server** - Always validate time values on the server side
8. **Consider user timezone** - Account for timezone differences in global applications
9. **Use icon variant** - Makes the input more visually clear as a time picker
10. **Disable invalid times** - Disable the input when not applicable

## Notes

- HTML5 native time picker kullanır, tarayıcı desteği gerektirir
- Step değeri saniye cinsindendir:
  - 900 = 15 dakika
  - 1800 = 30 dakika
  - 3600 = 1 saat
- Min/max değerleri "HH:MM" formatında olmalıdır (örn: "09:00", "18:00")
- Range varyantında her iki input için ayrı wire:model kullanabilirsiniz
- Dropdown varyantı için Flowbite JS gereklidir (dropdown toggle için)
- Default timezones ve durations sağlanmıştır, özelleştirebilirsiniz
- Inline varyantındaki interval checkbox'ları `intervals[]` name ile gönderilir
- Livewire ile kullanırken `wire:model.live` ile real-time validation yapabilirsiniz