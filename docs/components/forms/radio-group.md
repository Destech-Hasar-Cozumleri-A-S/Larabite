# Form Radio Group Component

Wrapper component for radio button groups.

## Component Location

**File Path:** `resources/views/components/ui/form-radio-group.blade.php`

## Features

- Label support for the entire group
- Error message display
- Groups multiple radio buttons together
- Dark mode support
- Livewire integration

## Usage Examples

### Basic Radio Group

```blade
<x-ui::form-radio-group
    label="Gender"
    name="gender"
    :error="$errors->first('gender')"
>
    <x-ui::form-radio label="Male" value="male" wire:model="gender" />
    <x-ui::form-radio label="Female" value="female" wire:model="gender" />
</x-ui::form-radio-group>
```

### Multiple Options

```blade
<x-ui::form-radio-group
    label="Preferred Contact Method"
    name="contact_method"
    :error="$errors->first('contact_method')"
>
    <x-ui::form-radio label="Email" value="email" wire:model="contactMethod" />
    <x-ui::form-radio label="Phone" value="phone" wire:model="contactMethod" />
    <x-ui::form-radio label="SMS" value="sms" wire:model="contactMethod" />
    <x-ui::form-radio label="Mail" value="mail" wire:model="contactMethod" />
</x-ui::form-radio-group>
```

### Without Error

```blade
<x-ui::form-radio-group
    label="Size"
    name="size"
>
    <x-ui::form-radio label="Small" value="small" wire:model="size" />
    <x-ui::form-radio label="Medium" value="medium" wire:model="size" />
    <x-ui::form-radio label="Large" value="large" wire:model="size" />
</x-ui::form-radio-group>
```

## Real-World Examples

### Registration Form

```blade
<form wire:submit.prevent="register">
    <x-ui::form-radio-group
        label="Account Type"
        name="account_type"
        :error="$errors->first('account_type')"
    >
        <x-ui::form-radio label="Personal" value="personal" wire:model="accountType" />
        <x-ui::form-radio label="Business" value="business" wire:model="accountType" />
    </x-ui::form-radio-group>

    <button type="submit">Register</button>
</form>
```

### Survey Form

```blade
<x-ui::form-radio-group
    label="How satisfied are you with our service?"
    name="satisfaction"
    :error="$errors->first('satisfaction')"
>
    <x-ui::form-radio label="Very Satisfied" value="very_satisfied" wire:model="satisfaction" />
    <x-ui::form-radio label="Satisfied" value="satisfied" wire:model="satisfaction" />
    <x-ui::form-radio label="Neutral" value="neutral" wire:model="satisfaction" />
    <x-ui::form-radio label="Dissatisfied" value="dissatisfied" wire:model="satisfaction" />
    <x-ui::form-radio label="Very Dissatisfied" value="very_dissatisfied" wire:model="satisfaction" />
</x-ui::form-radio-group>
```

### Settings Form

```blade
<x-ui::form-radio-group
    label="Email Frequency"
    name="email_frequency"
>
    <x-ui::form-radio label="Daily Digest" value="daily" wire:model="emailFrequency" />
    <x-ui::form-radio label="Weekly Summary" value="weekly" wire:model="emailFrequency" />
    <x-ui::form-radio label="Monthly Newsletter" value="monthly" wire:model="emailFrequency" />
    <x-ui::form-radio label="Never" value="never" wire:model="emailFrequency" />
</x-ui::form-radio-group>
```

## Props Table

| Prop | Type | Default | Description |
|------|------|---------|-------------|
| `label` | string | optional | Label text for the entire group |
| `name` | string | **required** | Radio name (all radios in group should have same name) |
| `error` | string | optional | Error message |

## Validation Examples

### With Livewire Validation

```blade
<x-ui::form-radio-group
    label="Gender"
    name="gender"
    :error="$errors->first('gender')"
>
    <x-ui::form-radio label="Male" value="male" wire:model="gender" />
    <x-ui::form-radio label="Female" value="female" wire:model="gender" />
    <x-ui::form-radio label="Other" value="other" wire:model="gender" />
</x-ui::form-radio-group>
```

## Livewire Integration

### Basic Integration

```blade
<x-ui::form-radio-group label="Choice" name="choice">
    <x-ui::form-radio label="Option 1" value="option1" wire:model="choice" />
    <x-ui::form-radio label="Option 2" value="option2" wire:model="choice" />
</x-ui::form-radio-group>
```

### Live Update

```blade
<x-ui::form-radio-group label="Theme" name="theme">
    <x-ui::form-radio label="Light" value="light" wire:model.live="theme" />
    <x-ui::form-radio label="Dark" value="dark" wire:model.live="theme" />
    <x-ui::form-radio label="Auto" value="auto" wire:model.live="theme" />
</x-ui::form-radio-group>
```

## Best Practices

1. **Use descriptive labels** - Clearly describe what the group is for
2. **Consistent naming** - All radio buttons in group should have same `name`
3. **Unique values** - Each radio button needs a unique `value`
4. **Show errors** - Display validation errors for the entire group
5. **Logical grouping** - Only group related radio buttons together
6. **Provide default** - Consider setting a default selection when appropriate
7. **Accessibility** - Use semantic HTML with proper labels
8. **Limit options** - Don't overwhelm users with too many choices
9. **Use alternative components** - For many options, consider using a select dropdown
10. **Clear spacing** - Ensure adequate spacing between radio options

## Notes

- This is a simple wrapper component for grouping radio buttons
- Provides consistent styling and error handling
- The `name` prop should match the `name` attribute of all child radio buttons
- Error message is displayed below the group
- For more advanced radio button features, use the enhanced `form.radio` component with different variants
- Consider using fieldset/legend HTML elements for better semantics
- All radio buttons within the group should share the same Livewire model