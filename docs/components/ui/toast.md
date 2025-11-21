# Toast

Notification component for displaying temporary messages and alerts. Built with Alpine.js following Flowbite design patterns.

## Component Location

- **Base Component**: `resources/views/components/ui/toast.blade.php`
- **Container Component**: `resources/views/components/ui/toast/container.blade.php`

## Features

- Five toast types (default, success, warning, error, info)
- Four positioning options (all corners)
- Auto-dismiss with configurable duration
- Manual dismiss with close button
- Custom icons
- Smooth enter/exit animations
- Full dark mode support
- Accessible with ARIA attributes
- Alpine.js powered
- Livewire integration support

## Usage

### Basic Toast

```blade
<x-ui::toast type="success">
    Message sent successfully!
</x-ui::toast>
```

### Toast Types

```blade
{{-- Default --}}
<x-ui::toast type="default">
    This is a default notification
</x-ui::toast>

{{-- Success --}}
<x-ui::toast type="success">
    Operation completed successfully!
</x-ui::toast>

{{-- Warning --}}
<x-ui::toast type="warning">
    Please review your changes
</x-ui::toast>

{{-- Error --}}
<x-ui::toast type="error">
    An error occurred
</x-ui::toast>

{{-- Info --}}
<x-ui::toast type="info">
    New update available
</x-ui::toast>
```

### Toast Positioning

```blade
<x-ui::toast position="top-left">Top Left</x-ui::toast>
<x-ui::toast position="top-right">Top Right</x-ui::toast>
<x-ui::toast position="bottom-left">Bottom Left</x-ui::toast>
<x-ui::toast position="bottom-right">Bottom Right</x-ui::toast>
```

### Auto-Dismiss Configuration

```blade
{{-- Auto-dismiss after 5 seconds (default) --}}
<x-ui::toast type="success" :autoDismiss="true">
    This will disappear automatically
</x-ui::toast>

{{-- Custom duration (3 seconds) --}}
<x-ui::toast type="info" :autoDismiss="true" :duration="3000">
    Quick message
</x-ui::toast>

{{-- No auto-dismiss --}}
<x-ui::toast type="warning" :autoDismiss="false">
    This stays until manually closed
</x-ui::toast>
```

### Custom Icon

```blade
<x-ui::toast type="success">
    <x-slot:icon>
        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
            <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z"/>
            <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z"/>
        </svg>
    </x-slot:icon>
    New message received
</x-ui::toast>
```

### Rich Content

```blade
<x-ui::toast type="info">
    <div class="font-semibold">Update Available</div>
    <div class="text-sm mt-1 text-gray-500 dark:text-gray-400">
        Version 2.0.0 is ready to install
    </div>
</x-ui::toast>
```

### With Action Buttons

```blade
<x-ui::toast type="success" :autoDismiss="false">
    <div class="flex flex-col gap-2">
        <div class="font-medium">File uploaded successfully</div>
        <div class="flex gap-2">
            <x-ui::button variant="primary" size="xs" wire:click="viewFile">
                View
            </x-ui::button>
            <x-ui::button variant="outline" size="xs" wire:click="shareFile">
                Share
            </x-ui::button>
        </div>
    </div>
</x-ui::toast>
```

## Props

### Toast Component

| Prop | Type | Default | Description |
|------|------|---------|-------------|
| `id` | string | auto-generated | Unique toast identifier |
| `type` | string | 'default' | Toast type: default, success, warning, error, info |
| `position` | string | 'top-right' | Position: top-left, top-right, bottom-left, bottom-right |
| `dismissible` | boolean | true | Show close button |
| `autoDismiss` | boolean | true | Auto-dismiss after duration |
| `duration` | integer | 5000 | Auto-dismiss duration in milliseconds |
| `icon` | string | null | Custom icon (slot) |

## Real-World Examples

### 1. Success Notifications

```blade
{{-- After form submission --}}
@if(session('success'))
    <x-ui::toast type="success" position="top-right">
        {{ session('success') }}
    </x-ui::toast>
@endif

{{-- Livewire component --}}
<div>
    @if($showSuccessToast)
        <x-ui::toast type="success" wire:key="success-{{ $toastId }}">
            Profile updated successfully!
        </x-ui::toast>
    @endif
</div>
```

### 2. Error Messages

```blade
@if(session('error'))
    <x-ui::toast type="error" position="top-right" :autoDismiss="false">
        <div class="font-semibold">Error</div>
        <div class="text-sm mt-1">{{ session('error') }}</div>
    </x-ui::toast>
@endif

{{-- Validation errors --}}
@if($errors->any())
    <x-ui::toast type="error" :autoDismiss="false">
        <div class="font-semibold">Please fix the following errors:</div>
        <ul class="mt-2 text-sm list-disc list-inside">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </x-ui::toast>
@endif
```

### 3. Upload Progress

```blade
<div x-data="{ uploading: false, progress: 0 }">
    @if($uploading)
        <x-ui::toast type="info" :autoDismiss="false">
            <div>
                <div class="font-medium mb-2">Uploading file...</div>
                <x-ui::progress :value="$progress" size="sm" />
                <div class="text-xs text-gray-500 mt-1">{{ $progress }}% complete</div>
            </div>
        </x-ui::toast>
    @endif
</div>
```

### 4. Undo Action

```blade
<x-ui::toast type="warning" :autoDismiss="true" :duration="10000">
    <div class="flex items-center justify-between gap-4">
        <span>Item deleted</span>
        <x-ui::button
            variant="outline"
            size="xs"
            wire:click="undoDelete"
        >
            Undo
        </x-ui::button>
    </div>
</x-ui::toast>
```

### 5. New Message Notification

```blade
<x-ui::toast type="default" position="top-right">
    <div class="flex items-start gap-3">
        <img
            src="{{ $user->avatar }}"
            alt="{{ $user->name }}"
            class="w-10 h-10 rounded-full"
        />
        <div class="flex-1">
            <div class="font-semibold text-gray-900 dark:text-white">
                {{ $user->name }}
            </div>
            <div class="text-sm text-gray-500 dark:text-gray-400">
                {{ $message }}
            </div>
            <div class="text-xs text-gray-400 dark:text-gray-500 mt-1">
                {{ $timestamp }}
            </div>
        </div>
    </div>
</x-ui::toast>
```

### 6. Update Available

```blade
<x-ui::toast type="info" :autoDismiss="false">
    <div class="flex flex-col gap-3">
        <div>
            <div class="font-semibold">New version available</div>
            <div class="text-sm text-gray-500 dark:text-gray-400 mt-1">
                Version 2.0.0 is ready to install
            </div>
        </div>
        <div class="flex gap-2">
            <x-ui::button variant="primary" size="xs" wire:click="updateNow">
                Update Now
            </x-ui::button>
            <x-ui::button variant="ghost" size="xs" wire:click="remindLater">
                Remind Later
            </x-ui::button>
        </div>
    </div>
</x-ui::toast>
```

## Livewire Integration

### Example Component

```php
<?php

namespace App\Livewire;

use Livewire\Component;

class UserProfile extends Component
{
    public $name;
    public $email;
    public $showToast = false;
    public $toastType = 'success';
    public $toastMessage = '';

    public function save()
    {
        $this->validate([
            'name' => 'required',
            'email' => 'required|email',
        ]);

        // Save logic here...

        $this->showSuccessToast('Profile updated successfully!');
    }

    public function showSuccessToast($message)
    {
        $this->toastType = 'success';
        $this->toastMessage = $message;
        $this->showToast = true;

        // Auto-hide after component renders
        $this->dispatch('toast-shown');
    }

    public function showErrorToast($message)
    {
        $this->toastType = 'error';
        $this->toastMessage = $message;
        $this->showToast = true;
    }

    public function render()
    {
        return view('livewire.user-profile');
    }
}
```

```blade
{{-- livewire/user-profile.blade.php --}}
<div>
    <form wire:submit.prevent="save">
        <x-ui::form.input
            label="Name"
            wire:model="name"
        />
        <x-ui::form.input
            label="Email"
            type="email"
            wire:model="email"
        />
        <x-ui::button variant="primary" type="submit">
            Save
        </x-ui::button>
    </form>

    @if($showToast)
        <x-ui::toast
            :type="$toastType"
            wire:key="toast-{{ now()->timestamp }}"
        >
            {{ $toastMessage }}
        </x-ui::toast>
    @endif
</div>
```

### Using Livewire Events

```php
// In your Livewire component
$this->dispatch('show-toast', [
    'type' => 'success',
    'message' => 'Action completed!',
]);
```

```blade
{{-- In your layout --}}
<div
    x-data="{
        toastType: 'success',
        toastMessage: '',
        showToast: false
    }"
    @show-toast.window="
        toastType = $event.detail.type || 'success';
        toastMessage = $event.detail.message;
        showToast = true;
        setTimeout(() => showToast = false, 5000);
    "
>
    <template x-if="showToast">
        <x-ui::toast :type="toastType" x-text="toastMessage"></x-ui::toast>
    </template>
</div>
```

## Best Practices

### 1. Appropriate Timing

```blade
{{-- Quick confirmations: 3-5 seconds --}}
<x-ui::toast :duration="3000">Quick action confirmed</x-ui::toast>

{{-- Important messages: 7-10 seconds --}}
<x-ui::toast :duration="10000">Please read this carefully</x-ui::toast>

{{-- Actions with undo: Don't auto-dismiss or use longer duration --}}
<x-ui::toast :autoDismiss="false">
    Action completed. <button>Undo</button>
</x-ui::toast>
```

### 2. Message Length

```blade
{{-- Good: Concise message --}}
<x-ui::toast type="success">
    Changes saved
</x-ui::toast>

{{-- Avoid: Too verbose --}}
<x-ui::toast type="success">
    Your changes have been successfully saved to the database and will be reflected immediately across all your devices.
</x-ui::toast>
```

### 3. Toast Stacking

For multiple toasts, position them consistently and ensure they don't overlap:

```blade
{{-- Use same position for all toasts --}}
<x-ui::toast position="top-right" class="mt-0">First toast</x-ui::toast>
<x-ui::toast position="top-right" class="mt-16">Second toast</x-ui::toast>
```

### 4. Type Selection

- **Success**: Completed actions (saved, deleted, created)
- **Error**: Failed operations, validation errors
- **Warning**: Caution messages, reversible actions
- **Info**: General information, updates
- **Default**: Neutral notifications

### 5. Accessibility

```blade
{{-- Always provide meaningful content --}}
<x-ui::toast type="success">
    <span class="sr-only">Success: </span>
    Profile updated successfully
</x-ui::toast>

{{-- Ensure sufficient color contrast --}}
{{-- Use semantic types for screen readers --}}
```

### 6. Avoid Overuse

```blade
{{-- Good: One toast for action --}}
<x-ui::toast>Action completed</x-ui::toast>

{{-- Avoid: Multiple toasts for same action --}}
```

### 7. Mobile Considerations

```blade
{{-- Use top position for mobile --}}
<div class="md:hidden">
    <x-ui::toast position="top-right">Mobile toast</x-ui::toast>
</div>

{{-- Desktop can use bottom --}}
<div class="hidden md:block">
    <x-ui::toast position="bottom-right">Desktop toast</x-ui::toast>
</div>
```

## Accessibility

The toast component follows WCAG 2.1 AA guidelines:

### ARIA Attributes

```html
<div role="alert" class="...">
    <button aria-label="Close">
        <span class="sr-only">Close</span>
        <!-- Close icon -->
    </button>
</div>
```

### Features

- `role="alert"` for screen reader announcements
- Close button with `aria-label`
- Screen reader text with `sr-only`
- Keyboard accessible (Tab to focus, Enter/Space to close)
- Sufficient color contrast for all types

### Testing

```bash
# Screen reader should announce:
# "Success: Profile updated successfully"
# "Error: Please fix validation errors"
# "Close button"
```

## Related Components

- [Alert](alert.md) - Static alert messages
- [Banner](banner.md) - Prominent announcements
- [Modal](modal.md) - Dialog boxes
- [Spinner](spinner.md) - Loading indicators