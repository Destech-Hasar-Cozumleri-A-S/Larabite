# Datepicker Components

Components that allow users to select dates. Compliant with the Flowbite design system, offers various variants for different use scenarios.

> **Note:** These components use Flowbite's datepicker JavaScript library. Before using Flowbite datepicker ensure the library is installed.

## 📦 Available Components

- **Datepicker** - Standard date input with calendar popup
- **Datepicker Inline** - Always visible calendar
- **Datepicker Range** - Start and end date selection

---

## Default Datepicker

Calendar selection with standard input field. Calendar popup opens when clicked.

**Location:** `resources/views/components/ui/form/datepicker.blade.php`

### Features

- Input field with calendar icon
- Popup calendar picker
- Autohide support
- Custom date format
- Min/max date restrictions
- Action buttons (Today, Clear)
- Keyboard navigation
- Dark mode support
- Validation support

### Usage

```blade
{{-- Basic Datepicker --}}
<x-ui::form.datepicker
    label="Select Date"
    name="date"
    placeholder="Select date"
/>

{{-- With Custom Format --}}
<x-ui::form.datepicker
    label="Birth Date"
    name="birth_date"
    format="dd-mm-yyyy"
    placeholder="DD-MM-YYYY"
/>

{{-- With Action Buttons --}}
<x-ui::form.datepicker
    label="Appointment Date"
    name="appointment_date"
    :buttons="true"
    :autoselect="true"
/>

{{-- With Min/Max Dates --}}
<x-ui::form.datepicker
    label="Event Date"
    name="event_date"
    minDate="01/01/2024"
    maxDate="12/31/2024"
/>

{{-- With Custom Title --}}
<x-ui::form.datepicker
    label="Reservation Date"
    name="reservation_date"
    title="Select Reservation Date"
/>

{{-- With Helper Text --}}
<x-ui::form.datepicker
    label="Delivery Date"
    name="delivery_date"
    helper="Select your preferred delivery date"
/>

{{-- With Error State --}}
<x-ui::form.datepicker
    label="Date"
    name="date"
    error="Please select a valid date"
/>

{{-- Different Sizes --}}
<x-ui::form.datepicker
    name="date_sm"
    size="sm"
    placeholder="Small"
/>

<x-ui::form.datepicker
    name="date_base"
    size="base"
    placeholder="Base"
/>

<x-ui::form.datepicker
    name="date_lg"
    size="lg"
    placeholder="Large"
/>

{{-- Disabled State --}}
<x-ui::form.datepicker
    label="Date"
    name="date"
    :disabled="true"
    value="01/15/2024"
/>

{{-- With Livewire --}}
<x-ui::form.datepicker
    label="Select Date"
    name="date"
    wire:model="selectedDate"
/>
```

### Props

| Prop | Type | Default | Options | Description |
|------|------|---------|---------|-------------|
| `label` | string | null | - | Input label |
| `name` | string | null | - | Input name attribute |
| `value` | string | null | - | Initial date value |
| `placeholder` | string | 'Select date' | - | Input placeholder |
| `size` | string | 'base' | sm, base, lg | Input size |
| `disabled` | bool | false | - | Disabled state |
| `required` | bool | false | - | Required field |
| `error` | string | null | - | Error message |
| `helper` | string | null | - | Helper text |
| `format` | string | 'mm/dd/yyyy' | dd-mm-yyyy, yyyy-mm-dd, etc. | Date format |
| `autohide` | bool | true | - | Auto-hide after selection |
| `autoselect` | bool | false | - | Auto-select today's date |
| `buttons` | bool | false | - | Show Today/Clear buttons |
| `title` | string | null | - | Calendar popup title |
| `minDate` | string | null | - | Minimum selectable date |
| `maxDate` | string | null | - | Maximum selectable date |
| `orientation` | string | 'bottom' | bottom, top, left, right | Popup position |

---

## Inline Datepicker

Always visible calendar component. Shows calendar directly without input field.

**Location:** `resources/views/components/ui/form/datepicker-inline.blade.php`

### Features

- Always visible calendar
- No popup required
- Hidden input field for form submission
- Auto-select today
- Custom title
- Min/max date restrictions
- Dark mode support

### Usage

```blade
{{-- Basic Inline Datepicker --}}
<x-ui::form.datepicker-inline
    name="date"
/>

{{-- With Initial Value --}}
<x-ui::form.datepicker-inline
    name="selected_date"
    value="01/15/2024"
/>

{{-- With Custom Title --}}
<x-ui::form.datepicker-inline
    name="appointment_date"
    title="Select Appointment Date"
/>

{{-- With Min/Max Dates --}}
<x-ui::form.datepicker-inline
    name="event_date"
    minDate="01/01/2024"
    maxDate="12/31/2024"
/>

{{-- Auto-select Today --}}
<x-ui::form.datepicker-inline
    name="today_date"
    :autoselect="true"
/>

{{-- Custom Format --}}
<x-ui::form.datepicker-inline
    name="date"
    format="dd-mm-yyyy"
/>

{{-- With Livewire --}}
<x-ui::form.datepicker-inline
    name="date"
    wire:model="selectedDate"
/>

{{-- In a Card --}}
<x-ui::card>
    <h3 class="text-lg font-semibold mb-4">Select Date</h3>
    <x-ui::form.datepicker-inline
        name="calendar_date"
    />
</x-ui::card>
```

### Props

| Prop | Type | Default | Options | Description |
|------|------|---------|---------|-------------|
| `name` | string | null | - | Hidden input name |
| `value` | string | null | - | Initial date value |
| `title` | string | null | - | Calendar title |
| `minDate` | string | null | - | Minimum selectable date |
| `maxDate` | string | null | - | Maximum selectable date |
| `format` | string | 'mm/dd/yyyy' | dd-mm-yyyy, yyyy-mm-dd, etc. | Date format |
| `autoselect` | bool | false | - | Auto-select today's date |

### Notes

- Creates a hidden input field for form submission if `name` prop is provided
- Automatically syncs selected date with hidden input
- Supports Livewire model binding through hidden input

---

## Date Range Picker

Two linked datepickers for start and end date selection.

**Location:** `resources/views/components/ui/form/datepicker-range.blade.php`

### Features

- Two linked datepickers
- Start and end date selection
- "to" separator between dates
- Calendar icons
- Autohide after selection
- Action buttons support
- Min/max date restrictions
- Dark mode support
- Validation support

### Usage

```blade
{{-- Basic Date Range --}}
<x-ui::form.datepicker-range
    label="Select Date Range"
    startName="start_date"
    endName="end_date"
/>

{{-- With Custom Placeholders --}}
<x-ui::form.datepicker-range
    label="Event Duration"
    startName="event_start"
    endName="event_end"
    startPlaceholder="From date"
    endPlaceholder="To date"
/>

{{-- With Initial Values --}}
<x-ui::form.datepicker-range
    label="Booking Period"
    startName="check_in"
    endName="check_out"
    startValue="01/15/2024"
    endValue="01/20/2024"
/>

{{-- With Action Buttons --}}
<x-ui::form.datepicker-range
    label="Campaign Period"
    startName="campaign_start"
    endName="campaign_end"
    :buttons="true"
/>

{{-- With Min/Max Dates --}}
<x-ui::form.datepicker-range
    label="Availability"
    startName="available_from"
    endName="available_to"
    minDate="01/01/2024"
    maxDate="12/31/2024"
/>

{{-- With Helper Text --}}
<x-ui::form.datepicker-range
    label="Vacation Dates"
    startName="vacation_start"
    endName="vacation_end"
    helper="Select your vacation start and end dates"
/>

{{-- With Error State --}}
<x-ui::form.datepicker-range
    label="Date Range"
    startName="start"
    endName="end"
    error="End date must be after start date"
/>

{{-- Different Sizes --}}
<x-ui::form.datepicker-range
    startName="start_sm"
    endName="end_sm"
    size="sm"
/>

<x-ui::form.datepicker-range
    startName="start_lg"
    endName="end_lg"
    size="lg"
/>

{{-- With Livewire --}}
<x-ui::form.datepicker-range
    label="Date Range"
    startName="start_date"
    endName="end_date"
    wire:model.start_date="startDate"
    wire:model.end_date="endDate"
/>

{{-- Booking Form Example --}}
<form>
    <x-ui::form.datepicker-range
        label="Check-in / Check-out"
        startName="check_in"
        endName="check_out"
        startPlaceholder="Check-in date"
        endPlaceholder="Check-out date"
        :required="true"
        :autohide="true"
    />

    <x-ui::button type="submit" class="mt-4">
        Book Now
    </x-ui::button>
</form>
```

### Props

| Prop | Type | Default | Options | Description |
|------|------|---------|---------|-------------|
| `label` | string | null | - | Label for date range |
| `startName` | string | 'start_date' | - | Start date input name |
| `endName` | string | 'end_date' | - | End date input name |
| `startValue` | string | null | - | Initial start date |
| `endValue` | string | null | - | Initial end date |
| `startPlaceholder` | string | 'Start date' | - | Start input placeholder |
| `endPlaceholder` | string | 'End date' | - | End input placeholder |
| `size` | string | 'base' | sm, base, lg | Input size |
| `disabled` | bool | false | - | Disabled state |
| `required` | bool | false | - | Required field |
| `error` | string | null | - | Error message |
| `helper` | string | null | - | Helper text |
| `format` | string | 'mm/dd/yyyy' | dd-mm-yyyy, yyyy-mm-dd, etc. | Date format |
| `autohide` | bool | true | - | Auto-hide after selection |
| `buttons` | bool | false | - | Show Today/Clear buttons |
| `minDate` | string | null | - | Minimum selectable date |
| `maxDate` | string | null | - | Maximum selectable date |

---

## Installation & Setup

### Required Dependencies

You need to install the Flowbite Datepicker library:

```bash
npm install flowbite-datepicker
```

### Import JavaScript

```javascript
// resources/js/app.js
import 'flowbite-datepicker';
```

Or you can use CDN:

```html
<!-- In your layout file -->
<script src="https://cdn.jsdelivr.net/npm/flowbite-datepicker@1.2.6/dist/js/datepicker.min.js"></script>
```

---

## Date Format Options

Supported date format patterns:

| Format | Example | Description |
|--------|---------|-------------|
| `mm/dd/yyyy` | 01/15/2024 | US format |
| `dd/mm/yyyy` | 15/01/2024 | EU format |
| `yyyy-mm-dd` | 2024-01-15 | ISO format |
| `dd-mm-yyyy` | 15-01-2024 | Alternative EU |
| `mm-dd-yyyy` | 01-15-2024 | Alternative US |
| `M d, yy` | Jan 15, 24 | Short text |
| `MM d, yyyy` | January 15, 2024 | Full text |

---

## Best Practices

### 1. Date Format Selection

- **US Users:** `mm/dd/yyyy`
- **EU Users:** `dd/mm/yyyy`
- **Database Storage:** `yyyy-mm-dd` (ISO 8601)
- **API Communication:** ISO 8601 format

### 2. Validation

```blade
{{-- Client-side with required --}}
<x-ui::form.datepicker
    label="Birth Date"
    name="birth_date"
    :required="true"
    error="{{ $errors->first('birth_date') }}"
/>

{{-- Laravel validation --}}
// Controller
$validated = $request->validate([
    'birth_date' => 'required|date|before:today',
]);
```

### 3. Min/Max Dates

```blade
{{-- Past dates only --}}
<x-ui::form.datepicker
    label="Birth Date"
    name="birth_date"
    :maxDate="date('m/d/Y')"
/>

{{-- Future dates only --}}
<x-ui::form.datepicker
    label="Appointment"
    name="appointment_date"
    :minDate="date('m/d/Y')"
/>

{{-- Specific range --}}
<x-ui::form.datepicker
    label="Event Date"
    name="event_date"
    minDate="01/01/2024"
    maxDate="12/31/2024"
/>
```

### 4. Livewire Integration

```blade
{{-- Component view --}}
<x-ui::form.datepicker
    label="Select Date"
    name="selected_date"
    wire:model="selectedDate"
/>

{{-- Livewire component --}}
class DateSelector extends Component
{
    public $selectedDate;

    public function updatedSelectedDate($value)
    {
        // Handle date change
        $this->validate([
            'selectedDate' => 'required|date',
        ]);
    }
}
```

### 5. Accessibility

- Always provide `label` for screen readers
- Use `required` attribute when applicable
- Provide `helper` text for date format guidance
- Ensure keyboard navigation works
- Test with screen readers

### 6. User Experience

- Use action buttons for quick "today" selection
- Provide clear placeholder text with format
- Show helper text explaining date format
- Use autohide for better mobile experience
- Validate dates on selection

### 7. Mobile Optimization

```blade
{{-- Auto-hide for better mobile UX --}}
<x-ui::form.datepicker
    name="date"
    :autohide="true"
    size="lg"
/>
```

### 8. Form Integration

```blade
<form action="{{ route('appointments.store') }}" method="POST">
    @csrf

    <div class="grid gap-6 mb-6 md:grid-cols-2">
        <x-ui::form.datepicker
            label="Appointment Date"
            name="appointment_date"
            :required="true"
            :buttons="true"
            :autoselect="true"
            error="{{ $errors->first('appointment_date') }}"
        />

        <x-ui::form.timepicker
            label="Appointment Time"
            name="appointment_time"
            :required="true"
            error="{{ $errors->first('appointment_time') }}"
        />
    </div>

    <x-ui::button type="submit">
        Book Appointment
    </x-ui::button>
</form>
```

---

## Real-World Examples

### Booking System

```blade
<x-ui::card>
    <h3 class="text-xl font-bold mb-4">Book Your Stay</h3>

    <form action="{{ route('bookings.create') }}" method="POST">
        @csrf

        <x-ui::form.datepicker-range
            label="Check-in / Check-out Dates"
            startName="check_in"
            endName="check_out"
            :minDate="date('m/d/Y')"
            :required="true"
            :buttons="true"
            helper="Select your check-in and check-out dates"
        />

        <x-ui::form.select
            label="Number of Guests"
            name="guests"
            :options="[
                1 => '1 Guest',
                2 => '2 Guests',
                3 => '3 Guests',
                4 => '4+ Guests',
            ]"
            class="mt-4"
        />

        <x-ui::button type="submit" class="w-full mt-6">
            Check Availability
        </x-ui::button>
    </form>
</x-ui::card>
```

### Event Registration

```blade
<form action="{{ route('events.register') }}" method="POST">
    @csrf

    <x-ui::form.input
        label="Full Name"
        name="name"
        :required="true"
    />

    <x-ui::form.datepicker
        label="Birth Date"
        name="birth_date"
        :maxDate="date('m/d/Y', strtotime('-18 years'))"
        :required="true"
        helper="You must be 18 or older to register"
        class="mt-4"
    />

    <x-ui::form.input
        label="Email"
        type="email"
        name="email"
        :required="true"
        class="mt-4"
    />

    <x-ui::button type="submit" class="mt-6">
        Register for Event
    </x-ui::button>
</form>
```

### Report Date Filter

```blade
<form action="{{ route('reports.generate') }}" method="GET">
    <div class="flex gap-4 items-end">
        <x-ui::form.datepicker-range
            label="Report Period"
            startName="from"
            endName="to"
            :startValue="request('from')"
            :endValue="request('to')"
            class="flex-1"
        />

        <x-ui::button type="submit">
            Generate Report
        </x-ui::button>
    </div>
</form>
```

---

## Related Components

- [Input](input.md) - Text input component
- [Timepicker](timepicker.md) - Time selection component
- [Select](select.md) - Dropdown selection

---

## JavaScript API

### Get Selected Date

```javascript
const datepicker = document.querySelector('[datepicker]');
const date = datepicker.value;
```

### Set Date Programmatically

```javascript
const datepicker = document.querySelector('[datepicker]');
datepicker.value = '01/15/2024';
datepicker.dispatchEvent(new Event('input'));
```

### Listen to Date Changes

```javascript
const datepicker = document.querySelector('[datepicker]');
datepicker.addEventListener('changeDate', (e) => {
    console.log('Selected date:', e.detail.date);
});
```