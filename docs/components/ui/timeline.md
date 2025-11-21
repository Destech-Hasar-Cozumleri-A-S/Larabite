# Timeline

Chronological display component for events, activities, and process steps. Built following Flowbite design patterns with vertical and horizontal orientations.

## Component Location

- **Base Component**: `resources/views/components/ui/timeline.blade.php`
- **Timeline Item**: `resources/views/components/ui/timeline/item.blade.php`

## Features

- Vertical and horizontal orientation
- Customizable icons and colors
- Avatar support for user activities
- Time/date display
- Connector lines between items
- Six color variants for icons
- Full dark mode support
- Semantic HTML with `<ol>` and `<time>`
- Accessible with proper structure
- Responsive design

## Usage

### Basic Vertical Timeline

```blade
<x-ui.timeline>
    <x-ui.timeline.item
        time="February 2022"
        title="Application UI code in Tailwind CSS"
    >
        Get access to over 20+ pages including a dashboard layout, charts, kanban board, calendar, and pre-order E-commerce & Marketing pages.
    </x-ui.timeline.item>

    <x-ui.timeline.item
        time="March 2022"
        title="Marketing UI design in Figma"
    >
        All of the pages and components are first designed in Figma and we keep a parity between the two versions even as we update the project.
    </x-ui.timeline.item>

    <x-ui.timeline.item
        time="April 2022"
        title="E-Commerce UI code in Tailwind CSS"
        :isLast="true"
    >
        Get started with dozens of web components and interactive elements built on top of Tailwind CSS.
    </x-ui.timeline.item>
</x-ui.timeline>
```

### Timeline with Icons

```blade
<x-ui.timeline>
    <x-ui.timeline.item
        time="January 13th, 2022"
        title="Flowbite Application UI v2.0.0"
        iconColor="blue"
    >
        <x-slot:icon>
            <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z"/>
            </svg>
        </x-slot:icon>
        Released Flowbite v2.0.0
    </x-ui.timeline.item>

    <x-ui.timeline.item
        time="December 7th, 2021"
        title="Flowbite Figma v1.3.0"
        iconColor="green"
    >
        <x-slot:icon>
            <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"/>
            </svg>
        </x-slot:icon>
        All of the pages and components are first designed in Figma
    </x-ui.timeline.item>
</x-ui.timeline>
```

### Activity Timeline with Avatars

```blade
<x-ui.timeline>
    <x-ui.timeline.item
        time="just now"
        title="Bonnie Green commented"
        avatar="/images/avatars/bonnie.jpg"
    >
        <p class="text-sm">Bonnie Green commented on your post</p>
        <div class="mt-3 p-3 bg-gray-50 rounded-lg dark:bg-gray-700">
            <p class="text-sm text-gray-500 dark:text-gray-400">
                "I wanted to share a webinar zeroheight."
            </p>
        </div>
        <x-ui.button variant="outline" size="sm" class="mt-3">
            View comment
        </x-ui.button>
    </x-ui.timeline.item>

    <x-ui.timeline.item
        time="2 hours ago"
        title="Jese Leos uploaded"
        avatar="/images/avatars/jese.jpg"
    >
        <p class="text-sm">Jese Leos uploaded a document</p>
        <div class="mt-3 flex items-center gap-2">
            <svg class="w-5 h-5 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                <path d="M4 4a2 2 0 012-2h4.586A2 2 0 0112 2.586L15.414 6A2 2 0 0116 7.414V16a2 2 0 01-2 2H6a2 2 0 01-2-2V4z"/>
            </svg>
            <span class="text-sm font-medium">document.pdf</span>
            <x-ui.badge size="sm">2.5 MB</x-ui.badge>
        </div>
    </x-ui.timeline.item>
</x-ui.timeline>
```

### Horizontal Timeline

```blade
<x-ui.timeline orientation="horizontal">
    <x-ui.timeline.item
        orientation="horizontal"
        time="Step 1"
        title="Account Created"
        iconColor="green"
    >
        <x-slot:icon>
            <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"/>
            </svg>
        </x-slot:icon>
        Your account has been created
    </x-ui.timeline.item>

    <x-ui.timeline.item
        orientation="horizontal"
        time="Step 2"
        title="Email Verified"
        iconColor="blue"
    >
        Complete
    </x-ui.timeline.item>

    <x-ui.timeline.item
        orientation="horizontal"
        time="Step 3"
        title="Profile Setup"
        iconColor="gray"
        :isLast="true"
    >
        Pending
    </x-ui.timeline.item>
</x-ui.timeline>
```

### Timeline with Different Colors

```blade
<x-ui.timeline>
    <x-ui.timeline.item
        time="Now"
        title="Success Event"
        iconColor="green"
    >
        Operation completed successfully
    </x-ui.timeline.item>

    <x-ui.timeline.item
        time="1 hour ago"
        title="Warning Event"
        iconColor="yellow"
    >
        Action requires attention
    </x-ui.timeline.item>

    <x-ui.timeline.item
        time="2 hours ago"
        title="Error Event"
        iconColor="red"
        :isLast="true"
    >
        Operation failed
    </x-ui.timeline.item>
</x-ui.timeline>
```

## Props

### Timeline Component

| Prop | Type | Default | Description |
|------|------|---------|-------------|
| `orientation` | string | 'vertical' | Layout: vertical, horizontal |

### Timeline Item Component

| Prop | Type | Default | Description |
|------|------|---------|-------------|
| `time` | string | null | Time/date text to display |
| `title` | string | null | Item title/heading |
| `icon` | string | null | Custom SVG icon (slot) |
| `iconColor` | string | 'blue' | Icon color: blue, green, red, yellow, gray, purple |
| `avatar` | string | null | Avatar image URL |
| `orientation` | string | 'vertical' | Must match parent orientation |
| `isLast` | boolean | false | Whether this is the last item |

## Real-World Examples

### 1. Order Tracking Timeline

```blade
<x-ui.card>
    <h2 class="text-xl font-bold mb-6">Order #12345 Tracking</h2>

    <x-ui.timeline>
        <x-ui.timeline.item
            time="January 15, 2024 10:30 AM"
            title="Order Placed"
            iconColor="green"
        >
            <x-slot:icon>
                <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"/>
                </svg>
            </x-slot:icon>
            <p>Your order has been confirmed and is being prepared.</p>
            <div class="mt-2 text-sm text-gray-500 dark:text-gray-400">
                Order value: $129.99
            </div>
        </x-ui.timeline.item>

        <x-ui.timeline.item
            time="January 15, 2024 2:45 PM"
            title="Payment Confirmed"
            iconColor="green"
        >
            <x-slot:icon>
                <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M4 4a2 2 0 00-2 2v1h16V6a2 2 0 00-2-2H4z"/>
                    <path fill-rule="evenodd" d="M18 9H2v5a2 2 0 002 2h12a2 2 0 002-2V9zM4 13a1 1 0 011-1h1a1 1 0 110 2H5a1 1 0 01-1-1zm5-1a1 1 0 100 2h1a1 1 0 100-2H9z"/>
                </svg>
            </x-slot:icon>
            <p>Payment received via Visa ending in 4242</p>
        </x-ui.timeline.item>

        <x-ui.timeline.item
            time="January 16, 2024 9:00 AM"
            title="In Transit"
            iconColor="blue"
        >
            <x-slot:icon>
                <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M8 16.5a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0zM15 16.5a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0z"/>
                    <path d="M3 4a1 1 0 00-1 1v10a1 1 0 001 1h1.05a2.5 2.5 0 014.9 0H10a1 1 0 001-1V5a1 1 0 00-1-1H3z"/>
                </svg>
            </x-slot:icon>
            <p>Your package is on the way!</p>
            <div class="mt-2">
                <p class="text-sm text-gray-500 dark:text-gray-400">
                    Tracking: <span class="font-mono">1Z999AA10123456784</span>
                </p>
                <p class="text-sm text-gray-500 dark:text-gray-400 mt-1">
                    Estimated delivery: January 18, 2024
                </p>
            </div>
        </x-ui.timeline.item>

        <x-ui.timeline.item
            time="Pending"
            title="Delivered"
            iconColor="gray"
            :isLast="true"
        >
            <p class="text-gray-400">Awaiting delivery</p>
        </x-ui.timeline.item>
    </x-ui.timeline>
</x-ui.card>
```

### 2. Activity Feed

```blade
<x-ui.card>
    <h2 class="text-xl font-bold mb-6">Recent Activity</h2>

    <x-ui.timeline>
        @foreach($activities as $activity)
            <x-ui.timeline.item
                :time="$activity->created_at->diffForHumans()"
                :title="$activity->user->name . ' ' . $activity->action"
                :avatar="$activity->user->avatar_url"
                :isLast="$loop->last"
            >
                <p class="text-sm">{{ $activity->description }}</p>

                @if($activity->type === 'comment')
                    <div class="mt-3 p-3 bg-gray-50 rounded-lg dark:bg-gray-700">
                        <p class="text-sm text-gray-600 dark:text-gray-300">
                            "{{ $activity->content }}"
                        </p>
                    </div>
                    <x-ui.button variant="outline" size="sm" class="mt-2">
                        Reply
                    </x-ui.button>
                @endif

                @if($activity->type === 'upload')
                    <div class="mt-2 flex items-center gap-2 p-2 bg-gray-50 rounded-lg dark:bg-gray-700">
                        <svg class="w-5 h-5 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M4 4a2 2 0 012-2h4.586A2 2 0 0112 2.586L15.414 6A2 2 0 0116 7.414V16a2 2 0 01-2 2H6a2 2 0 01-2-2V4z"/>
                        </svg>
                        <span class="text-sm font-medium">{{ $activity->filename }}</span>
                    </div>
                @endif
            </x-ui.timeline.item>
        @endforeach
    </x-ui.timeline>
</x-ui.card>
```

### 3. Project Milestones

```blade
<x-ui.timeline>
    <x-ui.timeline.item
        time="Q1 2024"
        title="Project Kickoff"
        iconColor="green"
    >
        <x-slot:icon>
            <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"/>
            </svg>
        </x-slot:icon>
        <p class="mb-2">Initial planning and team assembly completed.</p>
        <ul class="list-disc list-inside text-sm text-gray-500 dark:text-gray-400">
            <li>Team of 8 developers assembled</li>
            <li>Requirements documented</li>
            <li>Budget approved: $500,000</li>
        </ul>
    </x-ui.timeline.item>

    <x-ui.timeline.item
        time="Q2 2024"
        title="Design Phase"
        iconColor="blue"
    >
        <p class="mb-2">UI/UX design and architecture planning.</p>
        <div class="flex gap-2 mt-2">
            <x-ui.badge color="blue">In Progress</x-ui.badge>
            <x-ui.badge color="gray">65% Complete</x-ui.badge>
        </div>
    </x-ui.timeline.item>

    <x-ui.timeline.item
        time="Q3 2024"
        title="Development"
        iconColor="gray"
    >
        <p class="text-gray-400">Backend and frontend development scheduled.</p>
    </x-ui.timeline.item>

    <x-ui.timeline.item
        time="Q4 2024"
        title="Launch"
        iconColor="gray"
        :isLast="true"
    >
        <p class="text-gray-400">Production deployment and go-live.</p>
    </x-ui.timeline.item>
</x-ui.timeline>
```

### 4. Onboarding Steps

```blade
<x-ui.timeline orientation="horizontal">
    <x-ui.timeline.item
        orientation="horizontal"
        time="Step 1"
        title="Create Account"
        iconColor="green"
    >
        <x-slot:icon>
            <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"/>
            </svg>
        </x-slot:icon>
        <x-ui.badge color="green" size="sm">Complete</x-ui.badge>
    </x-ui.timeline.item>

    <x-ui.timeline.item
        orientation="horizontal"
        time="Step 2"
        title="Verify Email"
        iconColor="green"
    >
        <x-slot:icon>
            <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"/>
            </svg>
        </x-slot:icon>
        <x-ui.badge color="green" size="sm">Complete</x-ui.badge>
    </x-ui.timeline.item>

    <x-ui.timeline.item
        orientation="horizontal"
        time="Step 3"
        title="Complete Profile"
        iconColor="blue"
    >
        <x-ui.badge color="blue" size="sm">Current</x-ui.badge>
    </x-ui.timeline.item>

    <x-ui.timeline.item
        orientation="horizontal"
        time="Step 4"
        title="Start Using"
        iconColor="gray"
        :isLast="true"
    >
        <x-ui.badge color="gray" size="sm">Pending</x-ui.badge>
    </x-ui.timeline.item>
</x-ui.timeline>
```

## Best Practices

### 1. Use Semantic Time Elements

```blade
<x-ui.timeline.item time="{{ $event->created_at->format('M d, Y') }}">
    {{-- Content --}}
</x-ui.timeline.item>
```

### 2. Consistent Icon Colors

Use color-coding to represent states:
- **Green**: Completed/Success
- **Blue**: In Progress/Active
- **Yellow**: Warning/Attention Needed
- **Red**: Error/Failed
- **Gray**: Pending/Inactive

### 3. Last Item Flag

Always set `isLast` on the final item:

```blade
<x-ui.timeline.item :isLast="$loop->last">
```

### 4. Responsive Considerations

For horizontal timelines, hide on mobile:

```blade
<div class="hidden md:block">
    <x-ui.timeline orientation="horizontal">
        {{-- Items --}}
    </x-ui.timeline>
</div>
```

### 5. Loading States

```blade
<x-ui.timeline>
    <div wire:loading wire:target="loadActivities">
        <x-ui.timeline.item time="Loading..." title="Loading activities">
            <x-ui.spinner size="sm" />
        </x-ui.timeline.item>
    </div>

    <div wire:loading.remove wire:target="loadActivities">
        @foreach($activities as $activity)
            <x-ui.timeline.item>
                {{-- Activity content --}}
            </x-ui.timeline.item>
        @endforeach
    </div>
</x-ui.timeline>
```

## Accessibility

- Uses semantic `<ol>` and `<li>` elements
- `<time>` elements for dates
- Proper heading hierarchy
- Screen reader-friendly structure
- Icon SVGs with `aria-hidden="true"`

## Related Components

- [Stepper](stepper.md) - Step-by-step progress
- [Progress](progress.md) - Progress indicators
- [Badge](badge.md) - Status labels
- [Avatar](avatar.md) - User images