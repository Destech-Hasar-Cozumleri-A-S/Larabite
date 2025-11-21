# Text

Inline text utility component for applying various text styles, weights, decorations, and transformations. Built following Flowbite design patterns.

## Component Location

- **Component**: `resources/views/components/ui/typography/text.blade.php`

## Features

- Five text variants (default, lead, secondary, muted, small)
- Seven font weight options
- Text decoration support (underline, line-through, none)
- Text transform options (uppercase, lowercase, capitalize)
- Text alignment control
- Flexible sizing (xs to 9xl)
- Italic styling
- Text truncation
- Custom color support
- Full dark mode support
- Inline element (span-based)

## Usage

### Basic Text

```blade
<x-ui::typography.text>
    This is default text
</x-ui::typography.text>
```

### Text Variants

```blade
{{-- Default --}}
<x-ui::typography.text variant="default">
    Default text with standard styling
</x-ui::typography.text>

{{-- Lead text (prominent intro text) --}}
<x-ui::typography.text variant="lead">
    This is lead text for article introductions
</x-ui::typography.text>

{{-- Secondary text --}}
<x-ui::typography.text variant="secondary">
    Secondary descriptive text
</x-ui::typography.text>

{{-- Muted text --}}
<x-ui::typography.text variant="muted">
    Muted helper text
</x-ui::typography.text>

{{-- Small text --}}
<x-ui::typography.text variant="small">
    Small fine print text
</x-ui::typography.text>
```

### Font Weights

```blade
<x-ui::typography.text weight="light">Light weight text</x-ui::typography.text>
<x-ui::typography.text weight="normal">Normal weight text</x-ui::typography.text>
<x-ui::typography.text weight="medium">Medium weight text</x-ui::typography.text>
<x-ui::typography.text weight="semibold">Semibold weight text</x-ui::typography.text>
<x-ui::typography.text weight="bold">Bold weight text</x-ui::typography.text>
<x-ui::typography.text weight="extrabold">Extrabold weight text</x-ui::typography.text>
<x-ui::typography.text weight="black">Black weight text</x-ui::typography.text>
```

### Text Decoration

```blade
{{-- Underline --}}
<x-ui::typography.text decoration="underline">
    Underlined text
</x-ui::typography.text>

{{-- Line through --}}
<x-ui::typography.text decoration="line-through">
    Strikethrough text
</x-ui::typography.text>

{{-- No decoration --}}
<x-ui::typography.text decoration="none">
    Text without decoration
</x-ui::typography.text>
```

### Text Transform

```blade
{{-- Uppercase --}}
<x-ui::typography.text transform="uppercase">
    uppercase text
</x-ui::typography.text>

{{-- Lowercase --}}
<x-ui::typography.text transform="lowercase">
    LOWERCASE TEXT
</x-ui::typography.text>

{{-- Capitalize --}}
<x-ui::typography.text transform="capitalize">
    capitalize each word
</x-ui::typography.text>

{{-- Normal case --}}
<x-ui::typography.text transform="normal-case">
    Normal case text
</x-ui::typography.text>
```

### Text Alignment

```blade
<x-ui::typography.text align="left">Left aligned text</x-ui::typography.text>
<x-ui::typography.text align="center">Center aligned text</x-ui::typography.text>
<x-ui::typography.text align="right">Right aligned text</x-ui::typography.text>
<x-ui::typography.text align="justify">Justified text</x-ui::typography.text>
```

### Text Sizes

```blade
<x-ui::typography.text size="xs">Extra small text</x-ui::typography.text>
<x-ui::typography.text size="sm">Small text</x-ui::typography.text>
<x-ui::typography.text size="base">Base text</x-ui::typography.text>
<x-ui::typography.text size="lg">Large text</x-ui::typography.text>
<x-ui::typography.text size="xl">Extra large text</x-ui::typography.text>
<x-ui::typography.text size="2xl">2XL text</x-ui::typography.text>
<x-ui::typography.text size="3xl">3XL text</x-ui::typography.text>
```

### Italic Text

```blade
<x-ui::typography.text :italic="true">
    This text is italicized
</x-ui::typography.text>
```

### Text Truncation

```blade
<div class="w-48">
    <x-ui::typography.text :truncate="true">
        This is a very long text that will be truncated with an ellipsis
    </x-ui::typography.text>
</div>
```

### Custom Colors

```blade
{{-- Using Tailwind color classes --}}
<x-ui::typography.text color="text-blue-600 dark:text-blue-400">
    Blue colored text
</x-ui::typography.text>

<x-ui::typography.text color="text-red-600 dark:text-red-400">
    Red colored text
</x-ui::typography.text>

<x-ui::typography.text color="text-green-600 dark:text-green-400">
    Green colored text
</x-ui::typography.text>
```

### Combined Styling

```blade
<x-ui::typography.text
    weight="bold"
    size="lg"
    color="text-blue-600 dark:text-blue-400"
    :italic="true"
>
    Bold, large, blue, italic text
</x-ui::typography.text>

<x-ui::typography.text
    variant="lead"
    decoration="underline"
    transform="capitalize"
>
    Lead text with underline and capitalization
</x-ui::typography.text>
```

## Props

| Prop | Type | Default | Description |
|------|------|---------|-------------|
| `variant` | string | 'default' | Text variant: default, lead, secondary, muted, small |
| `weight` | string | null | Font weight: light, normal, medium, semibold, bold, extrabold, black |
| `decoration` | string | null | Text decoration: underline, line-through, none |
| `transform` | string | null | Text transform: uppercase, lowercase, capitalize, normal-case |
| `align` | string | null | Text alignment: left, center, right, justify |
| `color` | string | null | Custom color classes |
| `size` | string | null | Text size: xs, sm, base, lg, xl, 2xl, 3xl, 4xl, 5xl, 6xl, 7xl, 8xl, 9xl |
| `italic` | boolean | false | Apply italic styling |
| `truncate` | boolean | false | Truncate text with ellipsis |

## Real-World Examples

### 1. Article Lead Paragraph

```blade
<article class="prose dark:prose-invert">
    <x-ui::typography.heading level="1">
        Introduction to Web Development
    </x-ui::typography.heading>

    <x-ui::typography.text variant="lead">
        Web development has revolutionized how we interact with information and services online.
        This comprehensive guide will walk you through the fundamentals of modern web development.
    </x-ui::typography.text>

    <x-ui::typography.paragraph>
        In this article, we'll cover HTML, CSS, and JavaScript fundamentals...
    </x-ui::typography.paragraph>
</article>
```

### 2. Product Price Display

```blade
<div class="flex items-center gap-3">
    <x-ui::typography.text
        size="3xl"
        weight="bold"
        color="text-gray-900 dark:text-white"
    >
        $299.99
    </x-ui::typography.text>

    <x-ui::typography.text
        size="xl"
        weight="normal"
        decoration="line-through"
        color="text-gray-500 dark:text-gray-400"
    >
        $399.99
    </x-ui::typography.text>

    <x-ui::typography.text
        size="sm"
        weight="semibold"
        color="text-green-600 dark:text-green-400"
    >
        Save 25%
    </x-ui::typography.text>
</div>
```

### 3. User Status Badge

```blade
<div class="flex items-center gap-2">
    <x-ui::avatar
        src="{{ $user->avatar }}"
        alt="{{ $user->name }}"
        size="md"
        status="online"
    />
    <div>
        <x-ui::typography.text weight="semibold" size="base">
            {{ $user->name }}
        </x-ui::typography.text>
        <x-ui::typography.text variant="muted" size="sm">
            Active 2 minutes ago
        </x-ui::typography.text>
    </div>
</div>
```

### 4. Form Field Labels and Hints

```blade
<div class="space-y-2">
    <label class="block">
        <x-ui::typography.text weight="medium" size="sm">
            Email Address
            <x-ui::typography.text color="text-red-500">*</x-ui::typography.text>
        </x-ui::typography.text>
    </label>

    <x-ui::form.input
        type="email"
        name="email"
        placeholder="you@example.com"
    />

    <x-ui::typography.text variant="small" color="text-gray-500 dark:text-gray-400">
        We'll never share your email with anyone else.
    </x-ui::typography.text>
</div>
```

### 5. Notification Messages

```blade
<div class="space-y-2">
    <x-ui::typography.text
        weight="semibold"
        color="text-green-700 dark:text-green-400"
    >
        ✓ Success
    </x-ui::typography.text>
    <x-ui::typography.text variant="secondary">
        Your profile has been updated successfully.
    </x-ui::typography.text>
</div>
```

### 6. Data Table Content

```blade
<x-ui::table>
    <x-ui::table.body>
        <x-ui::table.row>
            <x-ui::table.cell>
                <x-ui::typography.text weight="medium">
                    John Doe
                </x-ui::typography.text>
            </x-ui::table.cell>
            <x-ui::table.cell>
                <x-ui::typography.text variant="muted">
                    john@example.com
                </x-ui::typography.text>
            </x-ui::table.cell>
            <x-ui::table.cell>
                <x-ui::typography.text
                    size="xs"
                    weight="semibold"
                    transform="uppercase"
                    color="text-green-600 dark:text-green-400"
                >
                    Active
                </x-ui::typography.text>
            </x-ui::table.cell>
        </x-ui::table.row>
    </x-ui::table.body>
</x-ui::table>
```

### 7. Breadcrumb Trail

```blade
<nav class="flex items-center space-x-2">
    <x-ui::typography.link href="/">
        Home
    </x-ui::typography.link>

    <x-ui::typography.text color="text-gray-400">/</x-ui::typography.text>

    <x-ui::typography.link href="/products">
        Products
    </x-ui::typography.link>

    <x-ui::typography.text color="text-gray-400">/</x-ui::typography.text>

    <x-ui::typography.text weight="medium">
        Laptop
    </x-ui::typography.text>
</nav>
```

### 8. Card Metadata

```blade
<x-ui::card>
    <x-ui::typography.heading level="3" class="mb-2">
        Article Title
    </x-ui::typography.heading>

    <div class="flex items-center gap-4 mb-4">
        <x-ui::typography.text variant="muted" size="sm">
            By <x-ui::typography.text weight="medium" color="text-gray-700 dark:text-gray-300">Jane Smith</x-ui::typography.text>
        </x-ui::typography.text>

        <x-ui::typography.text variant="muted" size="sm">
            5 min read
        </x-ui::typography.text>

        <x-ui::typography.text variant="muted" size="sm">
            March 15, 2025
        </x-ui::typography.text>
    </div>

    <x-ui::typography.paragraph>
        Article excerpt goes here...
    </x-ui::typography.paragraph>
</x-ui::card>
```

### 9. Stats Display

```blade
<div class="grid grid-cols-3 gap-4">
    <div class="text-center">
        <x-ui::typography.text size="4xl" weight="bold" color="text-blue-600 dark:text-blue-400">
            2.5K
        </x-ui::typography.text>
        <x-ui::typography.text variant="muted" size="sm" transform="uppercase">
            Followers
        </x-ui::typography.text>
    </div>

    <div class="text-center">
        <x-ui::typography.text size="4xl" weight="bold" color="text-green-600 dark:text-green-400">
            184
        </x-ui::typography.text>
        <x-ui::typography.text variant="muted" size="sm" transform="uppercase">
            Following
        </x-ui::typography.text>
    </div>

    <div class="text-center">
        <x-ui::typography.text size="4xl" weight="bold" color="text-purple-600 dark:text-purple-400">
            48
        </x-ui::typography.text>
        <x-ui::typography.text variant="muted" size="sm" transform="uppercase">
            Posts
        </x-ui::typography.text>
    </div>
</div>
```

### 10. Code Snippet Display

```blade
<div class="bg-gray-50 dark:bg-gray-800 p-4 rounded-lg">
    <x-ui::typography.text variant="muted" size="sm" class="mb-2">
        Terminal
    </x-ui::typography.text>
    <x-ui::typography.text
        weight="medium"
        color="text-gray-900 dark:text-white"
        class="font-mono"
    >
        npm install flowbite
    </x-ui::typography.text>
</div>
```

## Livewire Integration

### Dynamic Text Styling

```php
<?php

namespace App\Livewire;

use Livewire\Component;

class StatusDisplay extends Component
{
    public $status = 'pending'; // pending, active, completed, error

    public function getStatusColor()
    {
        return match($this->status) {
            'pending' => 'text-yellow-600 dark:text-yellow-400',
            'active' => 'text-blue-600 dark:text-blue-400',
            'completed' => 'text-green-600 dark:text-green-400',
            'error' => 'text-red-600 dark:text-red-400',
            default => 'text-gray-600 dark:text-gray-400',
        };
    }

    public function getStatusText()
    {
        return ucfirst($this->status);
    }

    public function render()
    {
        return view('livewire.status-display');
    }
}
```

```blade
{{-- livewire/status-display.blade.php --}}
<div>
    <x-ui::typography.text
        weight="semibold"
        transform="uppercase"
        size="sm"
        :color="$this->getStatusColor()"
    >
        {{ $this->getStatusText() }}
    </x-ui::typography.text>
</div>
```

### Dynamic Content Truncation

```blade
<div x-data="{ expanded: false }">
    @if(!$expanded)
        <x-ui::typography.text :truncate="true" class="w-96">
            {{ $longDescription }}
        </x-ui::typography.text>
        <x-ui::button
            variant="ghost"
            size="sm"
            @click="expanded = true"
        >
            Read more
        </x-ui::button>
    @else
        <x-ui::typography.text>
            {{ $longDescription }}
        </x-ui::typography.text>
        <x-ui::button
            variant="ghost"
            size="sm"
            @click="expanded = false"
        >
            Read less
        </x-ui::button>
    @endif
</div>
```

## Best Practices

### 1. Semantic Variants

```blade
{{-- Good: Use appropriate variants --}}
<x-ui::typography.text variant="lead">
    Introductory paragraph
</x-ui::typography.text>

<x-ui::typography.text variant="muted">
    Helper text
</x-ui::typography.text>

{{-- Avoid: Manual styling when variant exists --}}
<x-ui::typography.text size="xl" color="text-gray-500">
    This should use variant="secondary"
</x-ui::typography.text>
```

### 2. Consistent Weights

```blade
{{-- Good: Consistent hierarchy --}}
<x-ui::typography.text weight="bold">Main point</x-ui::typography.text>
<x-ui::typography.text weight="medium">Sub point</x-ui::typography.text>
<x-ui::typography.text weight="normal">Details</x-ui::typography.text>

{{-- Avoid: Random weight variations --}}
```

### 3. Proper Color Usage

```blade
{{-- Good: Use semantic colors --}}
<x-ui::typography.text color="text-green-600 dark:text-green-400">
    Success message
</x-ui::typography.text>

{{-- Good: Always include dark mode variant --}}
<x-ui::typography.text color="text-blue-600 dark:text-blue-400">
    Link text
</x-ui::typography.text>
```

### 4. Appropriate Transforms

```blade
{{-- Good: Labels in uppercase --}}
<x-ui::typography.text transform="uppercase" size="sm" weight="semibold">
    Category Label
</x-ui::typography.text>

{{-- Avoid: Uppercase for long content --}}
```

### 5. Truncation Context

```blade
{{-- Good: Truncate with defined width --}}
<div class="w-64">
    <x-ui::typography.text :truncate="true">
        {{ $longText }}
    </x-ui::typography.text>
</div>

{{-- Avoid: Truncate without width constraint --}}
```

## Accessibility

The text component is accessible by default:

### Features

- Uses semantic `<span>` element for inline text
- Color contrast meets WCAG 2.1 AA standards in all variants
- Dark mode ensures sufficient contrast
- Text size options maintain readability
- Truncated text should include tooltip or expand option

### Testing

```bash
# Ensure sufficient color contrast
# All text variants should pass WCAG AA (4.5:1 for normal, 3:1 for large)
```

## Related Components

- [Heading](heading.md) - For headings (H1-H6)
- [Paragraph](paragraph.md) - For paragraph blocks
- [Link](link.md) - For hyperlinks
- [Badge](../ui/badge.md) - For labeled text indicators