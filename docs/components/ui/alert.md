# Alert

Notification message components for displaying success, error, warning, and info messages.

## Components

- **Alert** - `resources/views/components/ui/alert.blade.php`
- **Alert Bordered** - `resources/views/components/ui/alert/bordered.blade.php`
- **Alert Additional Content** - `resources/views/components/ui/alert/additional-content.blade.php`

## Features

- 4 message types (success, error, warning, info)
- Automatic dismiss (close) functionality
- Icon support
- Accessibility (ARIA) support
- Dark mode support
- Border variants with accent option
- Additional content with title and action buttons
- Global flash message integration

## Global Flash Messages

Alert components are globally defined in `resources/views/layouts/app.blade.php`. Laravel session flash messages are automatically displayed:

```php
// In controller or Livewire component
session()->flash('success', 'Operation completed successfully!');
session()->flash('error', 'An error occurred!');
session()->flash('warning', 'Please be aware of this situation.');
session()->flash('info', 'Information message.');
```

## Usage

### Default Alert

```blade
<x-ui::alert type="success">
    Operation completed successfully!
</x-ui::alert>
```

### All Types

```blade
<x-ui::alert type="success">
    Success message!
</x-ui::alert>

<x-ui::alert type="error">
    Error message!
</x-ui::alert>

<x-ui::alert type="warning">
    Warning message!
</x-ui::alert>

<x-ui::alert type="info">
    Information message.
</x-ui::alert>
```

### Non-dismissible Alert

```blade
<x-ui::alert type="error" :dismissible="false">
    An error occurred!
</x-ui::alert>
```

### Custom ID

```blade
<x-ui::alert type="info" id="my-alert">
    Information message
</x-ui::alert>
```

### Bordered Alert

```blade
<x-ui::alert.bordered type="success">
    A simple success alert with solid border. Check it out!
</x-ui::alert.bordered>
```

### Border Accent (Top border only)

```blade
<x-ui::alert.bordered type="info" :accent="true">
    Change a few things up and try submitting again.
</x-ui::alert.bordered>
```

### Alert with Additional Content

```blade
<x-ui::alert.additional-content
    type="info"
    title="Dark mode is here!"
    actionText="View more"
    actionHref="{{ route('settings') }}"
>
    The new dark mode is now available for all users. You can enable it in your settings.
</x-ui::alert.additional-content>
```

### With Livewire Action

```blade
<x-ui::alert.additional-content
    type="warning"
    title="Attention needed"
    actionText="Take action"
    actionWireClick="handleWarning"
>
    Please review your account settings and update your information.
</x-ui::alert.additional-content>
```

## Props

### Alert Component

| Prop | Type | Default | Description |
|------|------|---------|-------------|
| `type` | string | 'info' | Alert type: success, error, warning, info |
| `dismissible` | boolean | true | Can be dismissed by user |
| `id` | string | optional | Custom ID |

### Alert Bordered Props

| Prop | Type | Default | Description |
|------|------|---------|-------------|
| `type` | string | 'info' | Alert type: success, error, warning, info |
| `dismissible` | boolean | true | Can be dismissed by user |
| `accent` | boolean | false | Show only top border (4px top accent) |
| `id` | string | optional | Custom ID |

### Alert Additional Content Props

| Prop | Type | Default | Description |
|------|------|---------|-------------|
| `type` | string | 'info' | Alert type: success, error, warning, info |
| `title` | string | required | Alert title |
| `actionText` | string | optional | Action button text |
| `actionHref` | string | optional | Action button link |
| `actionWireClick` | string | optional | Livewire action |
| `dismissible` | boolean | true | Can be dismissed by user |
| `id` | string | optional | Custom ID |

## Best Practices

1. **Type Selection**: Use appropriate types based on message importance
   - `success`: Confirm successful operations
   - `error`: Show critical errors that need attention
   - `warning`: Display cautionary information
   - `info`: Provide general information

2. **Dismissible**: Allow users to dismiss non-critical alerts

3. **Flash Messages**: Use Laravel's flash messages for temporary notifications after form submissions or actions

4. **Placement**: Display alerts prominently at the top of the page or near relevant content

5. **Clear Messages**: Write concise, actionable messages

6. **Icons**: Built-in icons provide visual context for alert types

7. **Actions**: Use action buttons for alerts that require user response

8. **Accessibility**: Alerts include proper ARIA attributes for screen readers

9. **Animation**: Dismissible alerts fade out smoothly when closed

10. **Persistence**: Only show critical alerts as non-dismissible

## Note

Flash messages are now automatically displayed on all pages through the global alert system in the layout file. You don't need to add alert components to individual pages.