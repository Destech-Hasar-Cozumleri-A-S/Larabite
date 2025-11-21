# Clipboard Components

Components that allow users to copy text, code, or data to clipboard with a single click. Compatible with Flowbite design system, offering various variants for different use cases.

## 📦 Available Components

- **Clipboard** - Default copy to clipboard with input and button
- **Clipboard Input Icon** - Input with icon button inside
- **Clipboard Input Text** - Input with text button inside
- **Clipboard Input Group** - Input group with prefix and copy button
- **Clipboard Code** - Copy code blocks
- **Clipboard Card** - Card with multiple copyable fields

---

## Default Clipboard Component

The simplest clipboard component. Contains an input field and a separate copy button.

**Location:** `resources/views/components/ui/clipboard.blade.php`

### Features

- Uses existing `form.input` and `button` components
- 2-second success state after copying
- Visual feedback with icon and text changes
- Responsive sizing
- Dark mode support

### Usage

```blade
{{-- Basic Usage --}}
<x-ui::clipboard
    label="Website URL"
    value="https://flowbite.com/"
    placeholder="Enter URL"
/>

{{-- With Custom Button Text --}}
<x-ui::clipboard
    value="npm install flowbite"
    buttonText="Copy"
    copiedText="Copied!"
    :timeout="3000"
/>

{{-- Different Sizes --}}
<x-ui::clipboard
    value="https://flowbite.com/"
    inputSize="sm"
    buttonSize="sm"
/>

<x-ui::clipboard
    value="https://flowbite.com/"
    inputSize="lg"
    buttonSize="lg"
/>
```

### Props

| Prop | Type | Default | Options | Description |
|------|------|---------|---------|-------------|
| `label` | string | null | - | Input label |
| `value` | string | '' | - | Value to copy |
| `placeholder` | string | 'Enter text...' | - | Input placeholder |
| `buttonText` | string | 'Copy' | - | Button text |
| `copiedText` | string | 'Copied!' | - | Success state text |
| `timeout` | int | 2000 | - | Success state duration (ms) |
| `inputSize` | string | 'base' | sm, base, lg | Input size |
| `buttonSize` | string | 'md' | xs, sm, md, lg, xl | Button size |

---

## Clipboard Input with Icon

Compact clipboard component with an icon button inside the input.

**Location:** `resources/views/components/ui/clipboard/input-icon.blade.php`

### Features

- Copy icon button positioned inside input
- Tooltip support
- Icon change on success state
- Disabled state support
- Minimal and clean appearance

### Usage

```blade
{{-- Basic with Icon --}}
<x-ui::clipboard.input-icon
    label="API Key"
    value="your-api-key-here"
/>

{{-- With Custom Tooltip --}}
<x-ui::clipboard.input-icon
    value="https://flowbite.com/"
    tooltipText="Copy URL"
    copiedTooltipText="URL Copied!"
/>

{{-- Without Tooltip --}}
<x-ui::clipboard.input-icon
    value="user@example.com"
    :tooltip="false"
/>

{{-- Disabled State --}}
<x-ui::clipboard.input-icon
    value="disabled@example.com"
    :disabled="true"
/>

{{-- Different Sizes --}}
<x-ui::clipboard.input-icon
    value="Small size"
    size="sm"
/>

<x-ui::clipboard.input-icon
    value="Large size"
    size="lg"
/>
```

### Props

| Prop | Type | Default | Options | Description |
|------|------|---------|---------|-------------|
| `label` | string | null | - | Input label |
| `value` | string | '' | - | Value to copy |
| `placeholder` | string | 'Enter text...' | - | Input placeholder |
| `tooltip` | bool | true | - | Show/hide tooltip |
| `tooltipText` | string | 'Copy to clipboard' | - | Tooltip text |
| `copiedTooltipText` | string | 'Copied!' | - | Success tooltip text |
| `timeout` | int | 2000 | - | Success state duration (ms) |
| `size` | string | 'base' | sm, base, lg | Size |
| `disabled` | bool | false | - | Disabled state |

---

## Clipboard Input with Text Button

Clipboard component with a button containing text and icon inside the input.

**Location:** `resources/views/components/ui/clipboard/input-text.blade.php`

### Features

- Text button positioned inside input
- Icon and text displayed together
- Prominent copy button
- Disabled state support

### Usage

```blade
{{-- Basic with Text Button --}}
<x-ui::clipboard.input-text
    label="Share Link"
    value="https://flowbite.com/docs/getting-started"
    buttonText="Copy link"
    copiedText="Link copied"
/>

{{-- Different Sizes --}}
<x-ui::clipboard.input-text
    value="npm install flowbite"
    size="sm"
    buttonText="Copy"
/>

<x-ui::clipboard.input-text
    value="pip install flowbite"
    size="lg"
    buttonText="Copy command"
/>

{{-- Custom Timeout --}}
<x-ui::clipboard.input-text
    value="Long success state"
    :timeout="5000"
/>
```

### Props

| Prop | Type | Default | Options | Description |
|------|------|---------|---------|-------------|
| `label` | string | null | - | Input label |
| `value` | string | '' | - | Value to copy |
| `placeholder` | string | 'Enter text...' | - | Input placeholder |
| `buttonText` | string | 'Copy' | - | Button text |
| `copiedText` | string | 'Copied' | - | Success state text |
| `timeout` | int | 2000 | - | Success state duration (ms) |
| `size` | string | 'base' | sm, base, lg | Size |
| `disabled` | bool | false | - | Disabled state |

---

## Clipboard Input Group

Input group component with prefix label and copy button.

**Location:** `resources/views/components/ui/clipboard/input-group.blade.php`

### Features

- Input group pattern (prefix + input + button)
- Prefix text or icon support
- Professional form integration style
- Tooltip feedback

### Usage

```blade
{{-- Basic Input Group --}}
<x-ui::clipboard.input-group
    label="Flowbite URL"
    prefix="https://"
    value="flowbite.com"
/>

{{-- With Icon Prefix --}}
<x-ui::clipboard.input-group
    label="Email"
    value="user@flowbite.com"
>
    <x-slot:prefix>
        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
            <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z"></path>
            <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z"></path>
        </svg>
    </x-slot:prefix>
</x-ui::clipboard.input-group>

{{-- Different Sizes --}}
<x-ui::clipboard.input-group
    prefix="API"
    value="sk_test_123456789"
    size="sm"
/>

<x-ui::clipboard.input-group
    prefix="Token"
    value="eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9"
    size="lg"
/>

{{-- Without Tooltip --}}
<x-ui::clipboard.input-group
    prefix="ID"
    value="12345"
    :tooltip="false"
/>
```

### Props

| Prop | Type | Default | Options | Description |
|------|------|---------|---------|-------------|
| `label` | string | null | - | Input label |
| `prefix` | string/slot | null | - | Prefix text or icon |
| `value` | string | '' | - | Value to copy |
| `placeholder` | string | 'Enter text...' | - | Input placeholder |
| `tooltip` | bool | true | - | Show/hide tooltip |
| `tooltipText` | string | 'Copy to clipboard' | - | Tooltip text |
| `copiedTooltipText` | string | 'Copied!' | - | Success tooltip text |
| `timeout` | int | 2000 | - | Success state duration (ms) |
| `size` | string | 'base' | sm, base, lg | Size |
| `disabled` | bool | false | - | Disabled state |

---

## Clipboard Code Block

Customized clipboard component for copying code blocks.

**Location:** `resources/views/components/ui/clipboard/code.blade.php`

### Features

- Supports `<pre><code>` elements
- Copy button in top right corner
- HTML entities decode
- Language syntax support
- Line numbers support (optional)

### Usage

```blade
{{-- Basic Code Block --}}
<x-ui::clipboard.code language="javascript">
function greet(name) {
    return `Hello, ${name}!`;
}

console.log(greet('World'));
</x-ui::clipboard.code>

{{-- With Code Prop --}}
<x-ui::clipboard.code
    language="bash"
    :code="'npm install flowbite\nnpm run dev'"
/>

{{-- PHP Code Example --}}
<x-ui::clipboard.code language="php">
@php
$users = User::where('active', true)->get();
foreach ($users as $user) {
    echo $user->name;
}
@endphp
</x-ui::clipboard.code>

{{-- HTML Code --}}
<x-ui::clipboard.code language="html">
<div class="container">
    <h1>Hello World</h1>
    <p>This is a paragraph.</p>
</div>
</x-ui::clipboard.code>

{{-- Custom Button Text --}}
<x-ui::clipboard.code
    language="python"
    copyText="Copy Code"
    copiedText="Code Copied!"
>
def hello_world():
    print("Hello, World!")

hello_world()
</x-ui::clipboard.code>
```

### Props

| Prop | Type | Default | Options | Description |
|------|------|---------|---------|-------------|
| `code` | string | null | - | Code content (alternative to slot) |
| `language` | string | 'text' | javascript, php, html, css, python, etc. | Code language |
| `showLineNumbers` | bool | false | - | Show line numbers |
| `copyText` | string | 'Copy' | - | Button text |
| `copiedText` | string | 'Copied!' | - | Success state text |
| `timeout` | int | 2000 | - | Success state duration (ms) |

---

## Clipboard Card

Card component containing multiple clipboard fields. Ideal for multiple field scenarios like API keys and credentials.

**Location:** `resources/views/components/ui/clipboard/card.blade.php`

### Features

- Uses existing `card` component
- Multiple clipboard inputs
- Separate tooltip for each field
- Title and description support
- Easy usage with field array

### Usage

```blade
{{-- Basic Card with Fields Array --}}
<x-ui::clipboard.card
    title="API Credentials"
    description="Keep your credentials secure and don't share them with anyone."
    :fields="[
        [
            'label' => 'Account ID',
            'value' => 'acc_1234567890',
            'placeholder' => 'Account ID'
        ],
        [
            'label' => 'API Key',
            'value' => 'sk_test_1234567890abcdef',
            'placeholder' => 'API Key'
        ],
        [
            'label' => 'Secret Key',
            'value' => 'sk_live_abcdef1234567890',
            'placeholder' => 'Secret Key'
        ]
    ]"
/>

{{-- With Custom Tooltips --}}
<x-ui::clipboard.card
    title="AWS Credentials"
    :fields="[
        [
            'label' => 'Access Key ID',
            'value' => 'AKIAIOSFODNN7EXAMPLE',
            'tooltipText' => 'Copy Access Key',
            'copiedTooltipText' => 'Access Key Copied!'
        ],
        [
            'label' => 'Secret Access Key',
            'value' => 'wJalrXUtnFEMI/K7MDENG/bPxRfiCYEXAMPLEKEY',
            'tooltipText' => 'Copy Secret Key',
            'copiedTooltipText' => 'Secret Key Copied!'
        ]
    ]"
/>

{{-- Using Slot for Custom Content --}}
<x-ui::clipboard.card title="Custom Credentials">
    <div class="space-y-4">
        <x-ui::clipboard.input-icon
            label="Username"
            value="john.doe@example.com"
        />

        <x-ui::clipboard.input-icon
            label="Password"
            value="********"
            :disabled="true"
        />

        <x-ui::clipboard.input-icon
            label="API Token"
            value="eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9"
        />
    </div>
</x-ui::clipboard.card>

{{-- Different Sizes --}}
<x-ui::clipboard.card
    title="Small Fields"
    :fields="[
        ['label' => 'ID', 'value' => '12345', 'size' => 'sm'],
        ['label' => 'Code', 'value' => 'ABC123', 'size' => 'sm']
    ]"
/>
```

### Props

| Prop | Type | Default | Options | Description |
|------|------|---------|---------|-------------|
| `title` | string | null | - | Card title |
| `description` | string | null | - | Card description |
| `fields` | array | [] | - | Array of fields (see below) |

**Field Array Structure:**
Each field can have:
- `label` (string): Input label
- `value` (string): Value to copy
- `placeholder` (string, optional): Input placeholder
- `tooltip` (bool, default: true): Show/hide tooltip
- `tooltipText` (string, default: 'Copy to clipboard'): Tooltip text
- `copiedTooltipText` (string, default: 'Copied!'): Success tooltip text
- `size` (string, default: 'base'): Size (sm, base, lg)
- `disabled` (bool, default: false): Disabled state

**Note:** If `fields` prop is not used, slot content will be displayed.

---

## Best Practices

### 1. Choosing the Right Variant

- **Single field:** `clipboard` or `clipboard.input-icon`
- **Prominent CTA:** `clipboard.input-text`
- **Form integration:** `clipboard.input-group`
- **Code copying:** `clipboard.code`
- **Multiple fields:** `clipboard.card`

### 2. Success Feedback

- Default 2 second timeout is sufficient
- Use 3-5 seconds for critical operations
- Always show icon change
- Add tooltip or text feedback

### 3. Accessibility

- Add meaningful `aria-label` for buttons
- Use `role="status"` for success state
- Provide keyboard navigation support
- Specify disabled states

### 4. User Experience

- Provide visual feedback before copying
- Success state should be clear (icon + text/tooltip)
- Add error handling (clipboard API fail)
- Test on mobile devices

### 5. Security Considerations

- Use masked input for sensitive data
- Be careful that the copy button is always active
- Remember that sensitive data may remain in clipboard history
- Timer can be added for auto-clear

### 6. Performance

- JavaScript code is loaded with `@push('scripts')`
- Each component instance uses a unique ID
- Event listeners are added on DOMContentLoaded
- Cleanup is done without memory leaks

### 7. Integration

- Works seamlessly with Livewire
- Can be combined with Alpine.js
- Can be used inside forms
- Works inside Modal/Drawer

### 8. Customization

- Can be customized with Tailwind classes
- Button variant can be changed
- Custom icons can be used
- Timeout duration can be adjusted

---

## Related Components

- [Form Input](../forms/input.md) - Used internally by clipboard components
- [Button](button.md) - Used for copy action
- [Card](card.md) - Used in clipboard card variant