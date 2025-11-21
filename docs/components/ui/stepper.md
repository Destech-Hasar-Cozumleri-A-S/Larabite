# Stepper

Multi-step progress indicator component for guiding users through sequential processes. Built following Flowbite design patterns with support for horizontal and vertical layouts.

## Component Location

- **Base Component**: `resources/views/components/ui/stepper.blade.php`
- **Item Component**: `resources/views/components/ui/stepper/item.blade.php`

## Features

- Horizontal and vertical orientation
- Multiple variants (default, progress, detailed, breadcrumb)
- Three step states (completed, active, inactive)
- Numbered steps or custom icons
- Optional titles and descriptions
- Connector lines between steps
- Full dark mode support
- Accessible with semantic HTML
- Clickable steps (optional)
- Responsive design

## Usage

### Default Horizontal Stepper

```blade
<x-ui::stepper orientation="horizontal">
    <x-ui::stepper.item
        status="completed"
        step="1"
        title="Personal Info"
    />
    <x-ui::stepper.item
        status="active"
        step="2"
        title="Account Info"
    />
    <x-ui::stepper.item
        status="inactive"
        step="3"
        title="Confirmation"
        :isLast="true"
    />
</x-ui::stepper>
```

### Vertical Stepper

```blade
<x-ui::stepper orientation="vertical">
    <x-ui::stepper.item
        orientation="vertical"
        status="completed"
        step="1"
        title="Personal Info"
        description="Provide your name and email"
    />
    <x-ui::stepper.item
        orientation="vertical"
        status="active"
        step="2"
        title="Account Info"
        description="Choose your username and password"
    />
    <x-ui::stepper.item
        orientation="vertical"
        status="inactive"
        step="3"
        title="Confirmation"
        description="Review and submit"
        :isLast="true"
    />
</x-ui::stepper>
```

### Progress Stepper with Icons

```blade
<x-ui::stepper orientation="horizontal">
    <x-ui::stepper.item
        status="completed"
        title="Step 1"
    >
        <x-slot:icon>
            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                <path d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z"/>
            </svg>
        </x-slot:icon>
    </x-ui::stepper.item>

    <x-ui::stepper.item
        status="active"
        title="Step 2"
    >
        <x-slot:icon>
            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z"/>
                <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z"/>
            </svg>
        </x-slot:icon>
    </x-ui::stepper.item>

    <x-ui::stepper.item
        status="inactive"
        title="Step 3"
        :isLast="true"
    >
        <x-slot:icon>
            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"/>
            </svg>
        </x-slot:icon>
    </x-ui::stepper.item>
</x-ui::stepper>
```

### Detailed Stepper with Descriptions

```blade
<x-ui::stepper orientation="horizontal">
    <x-ui::stepper.item
        status="completed"
        step="1"
        title="Account Created"
        description="2024-01-15"
    />
    <x-ui::stepper.item
        status="completed"
        step="2"
        title="Email Verified"
        description="2024-01-15"
    />
    <x-ui::stepper.item
        status="active"
        step="3"
        title="Profile Setup"
        description="In Progress"
    />
    <x-ui::stepper.item
        status="inactive"
        step="4"
        title="Ready to Use"
        description="Pending"
        :isLast="true"
    />
</x-ui::stepper>
```

### Clickable Steps

```blade
<x-ui::stepper orientation="horizontal">
    <x-ui::stepper.item
        status="completed"
        step="1"
        title="Personal Info"
        href="#step-1"
    />
    <x-ui::stepper.item
        status="active"
        step="2"
        title="Account Info"
        href="#step-2"
    />
    <x-ui::stepper.item
        status="inactive"
        step="3"
        title="Confirmation"
        href="#step-3"
        :isLast="true"
    />
</x-ui::stepper>
```

## Props

### Stepper Component

| Prop | Type | Default | Description |
|------|------|---------|-------------|
| `orientation` | string | 'horizontal' | Layout orientation: horizontal, vertical |
| `variant` | string | 'default' | Stepper variant (for future use) |
| `currentStep` | integer | 1 | Current active step number (for future use) |

### Stepper Item Component

| Prop | Type | Default | Description |
|------|------|---------|-------------|
| `status` | string | 'inactive' | Step status: completed, active, inactive |
| `title` | string | null | Step title text |
| `description` | string | null | Optional description text |
| `step` | string/int | null | Step number to display |
| `icon` | string | null | Custom SVG icon (slot) |
| `orientation` | string | 'horizontal' | Must match parent stepper orientation |
| `isLast` | boolean | false | Whether this is the last step (removes connector) |
| `href` | string | null | Make step clickable with URL |

## Step States

### Completed

Steps that have been finished:
- Blue background indicator
- Checkmark icon (or custom icon)
- Blue text color
- Blue connector line

```blade
<x-ui::stepper.item
    status="completed"
    step="1"
    title="Completed Step"
/>
```

### Active

The current step in progress:
- Blue background indicator
- Step number or icon
- Blue text color
- Gray connector line (to next step)

```blade
<x-ui::stepper.item
    status="active"
    step="2"
    title="Current Step"
/>
```

### Inactive

Steps that haven't been reached yet:
- Gray background indicator
- Step number or icon
- Gray text color
- Gray connector line

```blade
<x-ui::stepper.item
    status="inactive"
    step="3"
    title="Upcoming Step"
/>
```

## Real-World Examples

### 1. E-commerce Checkout Process

```blade
<div class="w-full max-w-4xl mx-auto p-6">
    <x-ui::stepper orientation="horizontal">
        <x-ui::stepper.item
            status="completed"
            step="1"
            title="Shopping Cart"
            description="Review items"
        />
        <x-ui::stepper.item
            status="completed"
            step="2"
            title="Shipping"
            description="Enter address"
        />
        <x-ui::stepper.item
            status="active"
            step="3"
            title="Payment"
            description="Choose method"
        />
        <x-ui::stepper.item
            status="inactive"
            step="4"
            title="Confirmation"
            description="Order complete"
            :isLast="true"
        />
    </x-ui::stepper>

    {{-- Payment form content --}}
    <div class="mt-8 bg-white dark:bg-gray-800 rounded-lg shadow p-6">
        <h2 class="text-xl font-bold mb-4">Payment Information</h2>
        <form wire:submit.prevent="processPayment">
            <x-ui::form.input
                label="Card Number"
                type="text"
                placeholder="1234 5678 9012 3456"
            />
            <div class="grid grid-cols-2 gap-4 mt-4">
                <x-ui::form.input
                    label="Expiry Date"
                    type="text"
                    placeholder="MM/YY"
                />
                <x-ui::form.input
                    label="CVV"
                    type="text"
                    placeholder="123"
                />
            </div>
            <div class="mt-6 flex justify-between">
                <x-ui::button variant="outline" wire:click="previousStep">
                    Back
                </x-ui::button>
                <x-ui::button variant="primary" type="submit">
                    Complete Order
                </x-ui::button>
            </div>
        </form>
    </div>
</div>
```

### 2. User Registration Flow

```blade
<div class="max-w-2xl mx-auto p-6">
    <h1 class="text-2xl font-bold mb-6 text-gray-900 dark:text-white">
        Create Your Account
    </h1>

    <x-ui::stepper orientation="horizontal">
        <x-ui::stepper.item
            status="{{ $currentStep >= 2 ? 'completed' : ($currentStep === 1 ? 'active' : 'inactive') }}"
            step="1"
            title="Basic Info"
        />
        <x-ui::stepper.item
            status="{{ $currentStep >= 3 ? 'completed' : ($currentStep === 2 ? 'active' : 'inactive') }}"
            step="2"
            title="Profile"
        />
        <x-ui::stepper.item
            status="{{ $currentStep === 3 ? 'active' : 'inactive' }}"
            step="3"
            title="Verify"
            :isLast="true"
        />
    </x-ui::stepper>

    <div class="mt-8">
        @if($currentStep === 1)
            {{-- Step 1: Basic Info --}}
            <x-ui::card>
                <form wire:submit.prevent="submitBasicInfo">
                    <x-ui::form.input
                        label="Full Name"
                        wire:model="name"
                        required
                    />
                    <x-ui::form.input
                        label="Email"
                        type="email"
                        wire:model="email"
                        required
                        class="mt-4"
                    />
                    <x-ui::form.input
                        label="Password"
                        type="password"
                        wire:model="password"
                        required
                        class="mt-4"
                    />
                    <div class="mt-6 flex justify-end">
                        <x-ui::button variant="primary" type="submit">
                            Continue
                        </x-ui::button>
                    </div>
                </form>
            </x-ui::card>

        @elseif($currentStep === 2)
            {{-- Step 2: Profile --}}
            <x-ui::card>
                <form wire:submit.prevent="submitProfile">
                    <x-ui::form.textarea
                        label="Bio"
                        wire:model="bio"
                        rows="4"
                    />
                    <x-ui::form.input
                        label="Phone Number"
                        type="tel"
                        wire:model="phone"
                        class="mt-4"
                    />
                    <div class="mt-6 flex justify-between">
                        <x-ui::button variant="outline" wire:click="previousStep">
                            Back
                        </x-ui::button>
                        <x-ui::button variant="primary" type="submit">
                            Continue
                        </x-ui::button>
                    </div>
                </form>
            </x-ui::card>

        @elseif($currentStep === 3)
            {{-- Step 3: Verification --}}
            <x-ui::card>
                <div class="text-center py-8">
                    <svg class="w-16 h-16 text-green-500 mx-auto mb-4" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"/>
                    </svg>
                    <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-2">
                        Check Your Email
                    </h3>
                    <p class="text-gray-600 dark:text-gray-400">
                        We've sent a verification link to {{ $email }}
                    </p>
                    <x-ui::button variant="primary" wire:click="resendVerification" class="mt-6">
                        Resend Email
                    </x-ui::button>
                </div>
            </x-ui::card>
        @endif
    </div>
</div>
```

### 3. Order Status Tracker

```blade
<x-ui::card>
    <h2 class="text-xl font-bold mb-6 text-gray-900 dark:text-white">
        Order #{{ $orderId }} Status
    </h2>

    <x-ui::stepper orientation="vertical">
        <x-ui::stepper.item
            orientation="vertical"
            status="completed"
            title="Order Placed"
            description="January 15, 2024 at 10:30 AM"
        >
            <x-slot:icon>
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M3 1a1 1 0 000 2h1.22l.305 1.222a.997.997 0 00.01.042l1.358 5.43-.893.892C3.74 11.846 4.632 14 6.414 14H15a1 1 0 000-2H6.414l1-1H14a1 1 0 00.894-.553l3-6A1 1 0 0017 3H6.28l-.31-1.243A1 1 0 005 1H3zM16 16.5a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0zM6.5 18a1.5 1.5 0 100-3 1.5 1.5 0 000 3z"/>
                </svg>
            </x-slot:icon>
        </x-ui::stepper.item>

        <x-ui::stepper.item
            orientation="vertical"
            status="completed"
            title="Payment Confirmed"
            description="January 15, 2024 at 10:32 AM"
        >
            <x-slot:icon>
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M4 4a2 2 0 00-2 2v1h16V6a2 2 0 00-2-2H4z"/>
                    <path fill-rule="evenodd" d="M18 9H2v5a2 2 0 002 2h12a2 2 0 002-2V9zM4 13a1 1 0 011-1h1a1 1 0 110 2H5a1 1 0 01-1-1zm5-1a1 1 0 100 2h1a1 1 0 100-2H9z"/>
                </svg>
            </x-slot:icon>
        </x-ui::stepper.item>

        <x-ui::stepper.item
            orientation="vertical"
            status="active"
            title="In Transit"
            description="Expected delivery: January 18, 2024"
        >
            <x-slot:icon>
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M8 16.5a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0zM15 16.5a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0z"/>
                    <path d="M3 4a1 1 0 00-1 1v10a1 1 0 001 1h1.05a2.5 2.5 0 014.9 0H10a1 1 0 001-1V5a1 1 0 00-1-1H3zM14 7a1 1 0 00-1 1v6.05A2.5 2.5 0 0115.95 16H17a1 1 0 001-1v-5a1 1 0 00-.293-.707l-2-2A1 1 0 0015 7h-1z"/>
                </svg>
            </x-slot:icon>
        </x-ui::stepper.item>

        <x-ui::stepper.item
            orientation="vertical"
            status="inactive"
            title="Delivered"
            description="Awaiting delivery"
            :isLast="true"
        >
            <x-slot:icon>
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"/>
                </svg>
            </x-slot:icon>
        </x-ui::stepper.item>
    </x-ui::stepper>

    <div class="mt-6 p-4 bg-blue-50 dark:bg-blue-900/20 rounded-lg">
        <p class="text-sm text-blue-900 dark:text-blue-100">
            <strong>Tracking Number:</strong> 1234567890
        </p>
        <p class="text-sm text-blue-700 dark:text-blue-300 mt-1">
            Your order is currently in transit and will arrive soon.
        </p>
    </div>
</x-ui::card>
```

### 4. Multi-Step Form Wizard

```blade
<div class="max-w-3xl mx-auto p-6" x-data="{ currentStep: @entangle('currentStep') }">
    <x-ui::stepper orientation="horizontal">
        <x-ui::stepper.item
            :status="$currentStep >= 2 ? 'completed' : ($currentStep === 1 ? 'active' : 'inactive')"
            step="1"
            title="Company Details"
            href="#"
            @click.prevent="currentStep >= 1 ? currentStep = 1 : null"
        />
        <x-ui::stepper.item
            :status="$currentStep >= 3 ? 'completed' : ($currentStep === 2 ? 'active' : 'inactive')"
            step="2"
            title="Team Members"
            href="#"
            @click.prevent="currentStep >= 2 ? currentStep = 2 : null"
        />
        <x-ui::stepper.item
            :status="$currentStep >= 4 ? 'completed' : ($currentStep === 3 ? 'active' : 'inactive')"
            step="3"
            title="Billing"
            href="#"
            @click.prevent="currentStep >= 3 ? currentStep = 3 : null"
        />
        <x-ui::stepper.item
            :status="$currentStep === 4 ? 'active' : 'inactive'"
            step="4"
            title="Review"
            :isLast="true"
        />
    </x-ui::stepper>

    {{-- Form steps content --}}
    <div class="mt-8">
        <x-ui::card>
            <div x-show="currentStep === 1">
                <h3 class="text-lg font-bold mb-4">Company Details</h3>
                <!-- Company form fields -->
            </div>

            <div x-show="currentStep === 2" style="display: none;">
                <h3 class="text-lg font-bold mb-4">Team Members</h3>
                <!-- Team members form -->
            </div>

            <div x-show="currentStep === 3" style="display: none;">
                <h3 class="text-lg font-bold mb-4">Billing Information</h3>
                <!-- Billing form -->
            </div>

            <div x-show="currentStep === 4" style="display: none;">
                <h3 class="text-lg font-bold mb-4">Review & Submit</h3>
                <!-- Review summary -->
            </div>
        </x-ui::card>
    </div>
</div>
```

### 5. Project Timeline

```blade
<x-ui::card>
    <h2 class="text-xl font-bold mb-6 text-gray-900 dark:text-white">
        Project Milestones
    </h2>

    <x-ui::stepper orientation="vertical">
        <x-ui::stepper.item
            orientation="vertical"
            status="completed"
            title="Project Kickoff"
            description="Meeting with stakeholders completed"
        >
            <div class="mt-2 text-sm text-gray-500 dark:text-gray-400">
                <p>January 10, 2024</p>
                <p class="mt-1">Duration: 2 hours</p>
            </div>
        </x-ui::stepper.item>

        <x-ui::stepper.item
            orientation="vertical"
            status="completed"
            title="Requirements Gathering"
            description="All requirements documented"
        >
            <div class="mt-2 text-sm text-gray-500 dark:text-gray-400">
                <p>January 15, 2024</p>
                <p class="mt-1">Duration: 1 week</p>
            </div>
        </x-ui::stepper.item>

        <x-ui::stepper.item
            orientation="vertical"
            status="active"
            title="Design Phase"
            description="Creating mockups and prototypes"
        >
            <div class="mt-2 text-sm text-gray-500 dark:text-gray-400">
                <p>In Progress</p>
                <p class="mt-1">Expected: January 25, 2024</p>
                <div class="mt-3">
                    <x-ui::progress value="65" color="blue" />
                </div>
            </div>
        </x-ui::stepper.item>

        <x-ui::stepper.item
            orientation="vertical"
            status="inactive"
            title="Development"
            description="Building the application"
        >
            <div class="mt-2 text-sm text-gray-500 dark:text-gray-400">
                <p>Not Started</p>
                <p class="mt-1">Expected: February 1, 2024</p>
            </div>
        </x-ui::stepper.item>

        <x-ui::stepper.item
            orientation="vertical"
            status="inactive"
            title="Testing & Launch"
            description="QA and deployment"
            :isLast="true"
        >
            <div class="mt-2 text-sm text-gray-500 dark:text-gray-400">
                <p>Not Started</p>
                <p class="mt-1">Expected: February 15, 2024</p>
            </div>
        </x-ui::stepper.item>
    </x-ui::stepper>
</x-ui::card>
```

### 6. Account Setup Progress

```blade
<x-ui::card>
    <h2 class="text-xl font-bold mb-6 text-gray-900 dark:text-white">
        Complete Your Profile
    </h2>

    <x-ui::stepper orientation="horizontal">
        <x-ui::stepper.item
            status="completed"
            title="Email"
        >
            <x-slot:icon>
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z"/>
                    <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z"/>
                </svg>
            </x-slot:icon>
        </x-ui::stepper.item>

        <x-ui::stepper.item
            status="completed"
            title="Profile"
        >
            <x-slot:icon>
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z"/>
                </svg>
            </x-slot:icon>
        </x-ui::stepper.item>

        <x-ui::stepper.item
            status="active"
            title="Preferences"
        >
            <x-slot:icon>
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M11.49 3.17c-.38-1.56-2.6-1.56-2.98 0a1.532 1.532 0 01-2.286.948c-1.372-.836-2.942.734-2.106 2.106.54.886.061 2.042-.947 2.287-1.561.379-1.561 2.6 0 2.978a1.532 1.532 0 01.947 2.287c-.836 1.372.734 2.942 2.106 2.106a1.532 1.532 0 012.287.947c.379 1.561 2.6 1.561 2.978 0a1.533 1.533 0 012.287-.947c1.372.836 2.942-.734 2.106-2.106a1.533 1.533 0 01.947-2.287c1.561-.379 1.561-2.6 0-2.978a1.532 1.532 0 01-.947-2.287c.836-1.372-.734-2.942-2.106-2.106a1.532 1.532 0 01-2.287-.947zM10 13a3 3 0 100-6 3 3 0 000 6z"/>
                </svg>
            </x-slot:icon>
        </x-ui::stepper.item>

        <x-ui::stepper.item
            status="inactive"
            title="Done"
            :isLast="true"
        >
            <x-slot:icon>
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"/>
                </svg>
            </x-slot:icon>
        </x-ui::stepper.item>
    </x-ui::stepper>

    <div class="mt-8 p-4 bg-blue-50 dark:bg-blue-900/20 rounded-lg">
        <p class="text-sm text-blue-900 dark:text-blue-100">
            You're almost done! Complete your preferences to finish setting up your account.
        </p>
        <x-ui::button variant="primary" size="sm" class="mt-3">
            Complete Setup
        </x-ui::button>
    </div>
</x-ui::card>
```

## Best Practices

### 1. Orientation Selection

**Use Horizontal for:**
- Short processes (3-5 steps)
- Desktop-focused interfaces
- When space is limited vertically
- Quick overview needs

**Use Vertical for:**
- Longer processes (5+ steps)
- Mobile-first designs
- When additional context/descriptions are needed
- Timeline-style displays

### 2. Step Count

- **Optimal**: 3-5 steps for best user experience
- **Maximum**: 7 steps (beyond this, consider grouping)
- **Minimum**: 2 steps (otherwise, use a different pattern)

### 3. Titles and Descriptions

```blade
{{-- Good: Clear and concise --}}
<x-ui::stepper.item
    title="Payment"
    description="Enter card details"
/>

{{-- Bad: Too verbose --}}
<x-ui::stepper.item
    title="Payment Information Submission"
    description="Please enter your credit or debit card information to complete the payment process"
/>
```

### 4. State Management

```blade
{{-- Using Livewire --}}
<x-ui::stepper orientation="horizontal">
    @foreach($steps as $index => $step)
        <x-ui::stepper.item
            :status="$this->getStepStatus($index + 1)"
            :step="$index + 1"
            :title="$step['title']"
            :isLast="$loop->last"
        />
    @endforeach
</x-ui::stepper>
```

```php
// In your Livewire component
public function getStepStatus($stepNumber)
{
    if ($stepNumber < $this->currentStep) {
        return 'completed';
    } elseif ($stepNumber === $this->currentStep) {
        return 'active';
    }
    return 'inactive';
}
```

### 5. Clickable Steps

Only make completed steps clickable:

```blade
<x-ui::stepper.item
    :status="$status"
    :href="$status === 'completed' ? route('step', $stepNumber) : null"
    step="{{ $stepNumber }}"
    title="{{ $title }}"
/>
```

### 6. Responsive Design

```blade
{{-- Switch orientation based on screen size --}}
<div class="hidden md:block">
    <x-ui::stepper orientation="horizontal">
        {{-- Steps --}}
    </x-ui::stepper>
</div>

<div class="block md:hidden">
    <x-ui::stepper orientation="vertical">
        {{-- Same steps --}}
    </x-ui::stepper>
</div>
```

### 7. Icons vs Numbers

**Use Numbers for:**
- Sequential processes
- Emphasis on order
- Simple, clear steps

**Use Icons for:**
- Category-based steps
- Visual differentiation
- Thematic consistency

### 8. Progress Indication

Combine with progress bars for clarity:

```blade
<x-ui::stepper orientation="horizontal">
    {{-- Steps --}}
</x-ui::stepper>

<div class="mt-4">
    <x-ui::progress
        :value="($currentStep / $totalSteps) * 100"
        color="blue"
    />
    <p class="text-sm text-gray-600 dark:text-gray-400 mt-2 text-center">
        Step {{ $currentStep }} of {{ $totalSteps }}
    </p>
</div>
```

### 9. Error States

```blade
<x-ui::stepper.item
    status="active"
    step="2"
    title="Payment"
>
    @if($errors->any())
        <div class="mt-2">
            <x-ui::badge color="red" size="sm">
                Error: Please check your information
            </x-ui::badge>
        </div>
    @endif
</x-ui::stepper.item>
```

### 10. Save Progress

```blade
<div class="mt-6 flex justify-between items-center">
    <x-ui::button
        variant="outline"
        wire:click="saveProgress"
        size="sm"
    >
        <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
            <path d="M7.707 10.293a1 1 0 10-1.414 1.414l3 3a1 1 0 001.414 0l3-3a1 1 0 00-1.414-1.414L11 11.586V6h5a2 2 0 012 2v7a2 2 0 01-2 2H4a2 2 0 01-2-2V8a2 2 0 012-2h5v5.586l-1.293-1.293zM9 4a1 1 0 012 0v2H9V4z"/>
        </svg>
        Save & Exit
    </x-ui::button>

    <div class="flex gap-3">
        <x-ui::button
            variant="outline"
            wire:click="previousStep"
            :disabled="$currentStep === 1"
        >
            Previous
        </x-ui::button>
        <x-ui::button
            variant="primary"
            wire:click="nextStep"
        >
            {{ $currentStep === $totalSteps ? 'Complete' : 'Next' }}
        </x-ui::button>
    </div>
</div>
```

## Accessibility

The stepper component follows WCAG 2.1 AA guidelines:

### Semantic HTML

```html
<ol class="flex items-center">
    <li class="flex items-center">
        <!-- Step content -->
    </li>
</ol>
```

### ARIA Attributes

```blade
<x-ui::stepper role="navigation" aria-label="Progress">
    <x-ui::stepper.item
        status="active"
        step="2"
        title="Current Step"
        aria-current="step"
    />
</x-ui::stepper>
```

### Screen Reader Support

```blade
<div class="flex items-center">
    <span class="sr-only">Step {{ $step }}: </span>
    {{ $title }}
    <span class="sr-only">
        {{ $status === 'completed' ? 'Completed' : ($status === 'active' ? 'Current' : 'Not completed') }}
    </span>
</div>
```

### Keyboard Navigation

For clickable steps:

```blade
<x-ui::stepper.item
    href="#step-{{ $stepNumber }}"
    role="link"
    tabindex="0"
    @keydown.enter="goToStep({{ $stepNumber }})"
/>
```

## Livewire Integration

### Complete Example

```php
<?php

namespace App\Livewire\Registration;

use Livewire\Component;

class MultiStepForm extends Component
{
    public $currentStep = 1;
    public $totalSteps = 4;

    // Step 1
    public $name;
    public $email;

    // Step 2
    public $company;
    public $role;

    // Step 3
    public $password;
    public $password_confirmation;

    public function nextStep()
    {
        $this->validateCurrentStep();

        if ($this->currentStep < $this->totalSteps) {
            $this->currentStep++;
        }
    }

    public function previousStep()
    {
        if ($this->currentStep > 1) {
            $this->currentStep--;
        }
    }

    public function goToStep($step)
    {
        if ($step <= $this->currentStep) {
            $this->currentStep = $step;
        }
    }

    protected function validateCurrentStep()
    {
        $rules = match($this->currentStep) {
            1 => ['name' => 'required', 'email' => 'required|email'],
            2 => ['company' => 'required', 'role' => 'required'],
            3 => ['password' => 'required|min:8|confirmed'],
            default => [],
        };

        $this->validate($rules);
    }

    public function submit()
    {
        $this->validateCurrentStep();
        // Handle final submission
    }

    public function render()
    {
        return view('livewire.registration.multi-step-form');
    }
}
```

## Related Components

- [Progress](progress.md) - Progress bars and indicators
- [Badge](badge.md) - Status badges
- [Button](button.md) - Navigation buttons
- [Form Input](../forms/input.md) - Form fields for steps