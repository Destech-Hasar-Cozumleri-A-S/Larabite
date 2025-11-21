# KBD (Keyboard) Component

The KBD component is used to represent keyboard input within your interface. It's perfect for documentation, tutorials, keyboard shortcuts, and instructional content where you need to indicate specific keys or key combinations to users.

## Components

- `<x-ui.kbd>` - Base keyboard key component
- `<x-ui.kbd.arrow>` - Arrow key variant with directional icons
- `<x-ui.kbd.combo>` - Keyboard combination (e.g., Ctrl+Shift+R)
- `<x-ui.kbd.function>` - Function keys (F1-F12)

## Basic Usage

### Default KBD

Display individual keyboard keys:

```blade
<x-ui.kbd>Shift</x-ui.kbd>
<x-ui.kbd>Ctrl</x-ui.kbd>
<x-ui.kbd>Tab</x-ui.kbd>
<x-ui.kbd>Caps Lock</x-ui.kbd>
<x-ui.kbd>Esc</x-ui.kbd>
<x-ui.kbd>Spacebar</x-ui.kbd>
<x-ui.kbd>Enter</x-ui.kbd>
```

### Letter Keys

```blade
<x-ui.kbd>Q</x-ui.kbd>
<x-ui.kbd>W</x-ui.kbd>
<x-ui.kbd>E</x-ui.kbd>
<x-ui.kbd>R</x-ui.kbd>
<x-ui.kbd>T</x-ui.kbd>
<x-ui.kbd>Y</x-ui.kbd>
```

### Number Keys

```blade
<x-ui.kbd>0</x-ui.kbd>
<x-ui.kbd>1</x-ui.kbd>
<x-ui.kbd>2</x-ui.kbd>
<x-ui.kbd>3</x-ui.kbd>
<x-ui.kbd>4</x-ui.kbd>
```

## Arrow Keys

Use the arrow component for directional navigation:

```blade
<x-ui.kbd.arrow direction="up" />
<x-ui.kbd.arrow direction="down" />
<x-ui.kbd.arrow direction="left" />
<x-ui.kbd.arrow direction="right" />
```

## Function Keys

Display function keys F1 through F12:

```blade
<x-ui.kbd.function :number="1" />
<x-ui.kbd.function :number="2" />
<x-ui.kbd.function :number="3" />
<x-ui.kbd.function :number="12" />
```

## Keyboard Combinations

Use the combo component to display key combinations:

```blade
{{-- Using the keys array --}}
<x-ui.kbd.combo :keys="['Ctrl', 'Shift', 'R']" />
<x-ui.kbd.combo :keys="['⌘', 'K']" />
<x-ui.kbd.combo :keys="['Alt', 'F4']" />

{{-- Using slot for custom combinations --}}
<x-ui.kbd.combo>
    <x-ui.kbd>Ctrl</x-ui.kbd>
    <span class="mx-1 text-gray-500">+</span>
    <x-ui.kbd>Shift</x-ui.kbd>
    <span class="mx-1 text-gray-500">+</span>
    <x-ui.kbd>P</x-ui.kbd>
</x-ui.kbd.combo>

{{-- Custom separator --}}
<x-ui.kbd.combo :keys="['Ctrl', 'Alt', 'Del']" separator="-" />
```

## Sizes

All KBD components support three sizes:

```blade
{{-- Small --}}
<x-ui.kbd size="sm">Shift</x-ui.kbd>
<x-ui.kbd.arrow direction="up" size="sm" />
<x-ui.kbd.function :number="5" size="sm" />

{{-- Default --}}
<x-ui.kbd>Shift</x-ui.kbd>
<x-ui.kbd.arrow direction="up" />
<x-ui.kbd.function :number="5" />

{{-- Large --}}
<x-ui.kbd size="lg">Shift</x-ui.kbd>
<x-ui.kbd.arrow direction="up" size="lg" />
<x-ui.kbd.function :number="5" size="lg" />
```

## Props

### Base KBD (`ui.kbd`)

| Prop | Type | Default | Description |
|------|------|---------|-------------|
| `size` | string | `'default'` | Size variant: `sm`, `default`, `lg` |

### Arrow KBD (`ui.kbd.arrow`)

| Prop | Type | Default | Description |
|------|------|---------|-------------|
| `direction` | string | `'up'` | Arrow direction: `up`, `down`, `left`, `right` |
| `size` | string | `'default'` | Size variant: `sm`, `default`, `lg` |

### Combo KBD (`ui.kbd.combo`)

| Prop | Type | Default | Description |
|------|------|---------|-------------|
| `keys` | array | `[]` | Array of key names to display |
| `separator` | string | `'+'` | Character to display between keys |
| `size` | string | `'default'` | Size variant for all keys: `sm`, `default`, `lg` |

### Function KBD (`ui.kbd.function`)

| Prop | Type | Default | Description |
|------|------|---------|-------------|
| `number` | int | `1` | Function key number (1-12) |
| `size` | string | `'default'` | Size variant: `sm`, `default`, `lg` |

## Real-World Examples

### Documentation Page

```blade
<div class="prose dark:prose-invert">
    <h2>Keyboard Shortcuts</h2>

    <h3>Navigation</h3>
    <ul>
        <li>
            <x-ui.kbd.combo :keys="['Ctrl', 'K']" /> - Open command palette
        </li>
        <li>
            <x-ui.kbd.combo :keys="['Ctrl', 'B']" /> - Toggle sidebar
        </li>
        <li>
            <x-ui.kbd.arrow direction="up" />
            <x-ui.kbd.arrow direction="down" /> - Navigate items
        </li>
    </ul>

    <h3>Editing</h3>
    <ul>
        <li>
            <x-ui.kbd.combo :keys="['Ctrl', 'S']" /> - Save document
        </li>
        <li>
            <x-ui.kbd.combo :keys="['Ctrl', 'Z']" /> - Undo
        </li>
        <li>
            <x-ui.kbd.combo :keys="['Ctrl', 'Shift', 'Z']" /> - Redo
        </li>
    </ul>
</div>
```

### Inline Text Usage

```blade
<p class="text-gray-700 dark:text-gray-300">
    Please press <x-ui.kbd>Ctrl</x-ui.kbd> + <x-ui.kbd>Shift</x-ui.kbd> + <x-ui.kbd>R</x-ui.kbd>
    to reload the editor. You can also use <x-ui.kbd>F5</x-ui.kbd> to refresh the page.
</p>

<p class="text-gray-700 dark:text-gray-300">
    Use the <x-ui.kbd.arrow direction="left" /> and
    <x-ui.kbd.arrow direction="right" /> keys to navigate between slides.
</p>
```

### Keyboard Shortcuts Table

```blade
<x-ui.data-table>
    <x-slot:header>
        <tr>
            <th>Action</th>
            <th>Shortcut</th>
            <th>Description</th>
        </tr>
    </x-slot:header>

    <x-slot:body>
        <tr>
            <td>Save</td>
            <td><x-ui.kbd.combo :keys="['Ctrl', 'S']" /></td>
            <td>Save the current document</td>
        </tr>
        <tr>
            <td>Open</td>
            <td><x-ui.kbd.combo :keys="['Ctrl', 'O']" /></td>
            <td>Open file browser</td>
        </tr>
        <tr>
            <td>Find</td>
            <td><x-ui.kbd.combo :keys="['Ctrl', 'F']" /></td>
            <td>Open search dialog</td>
        </tr>
        <tr>
            <td>Help</td>
            <td><x-ui.kbd.function :number="1" /></td>
            <td>Show help documentation</td>
        </tr>
        <tr>
            <td>DevTools</td>
            <td><x-ui.kbd.function :number="12" /></td>
            <td>Open browser developer tools</td>
        </tr>
    </x-slot:body>
</x-ui.data-table>
```

### Help Modal

```blade
<x-ui.modal title="Keyboard Shortcuts">
    <div class="space-y-6">
        {{-- General --}}
        <div>
            <h3 class="text-lg font-semibold mb-3 text-gray-900 dark:text-white">
                General
            </h3>
            <div class="space-y-2">
                <div class="flex items-center justify-between">
                    <span class="text-gray-700 dark:text-gray-300">Search</span>
                    <x-ui.kbd.combo :keys="['Ctrl', 'K']" />
                </div>
                <div class="flex items-center justify-between">
                    <span class="text-gray-700 dark:text-gray-300">Settings</span>
                    <x-ui.kbd.combo :keys="['Ctrl', ',']" />
                </div>
                <div class="flex items-center justify-between">
                    <span class="text-gray-700 dark:text-gray-300">Toggle theme</span>
                    <x-ui.kbd.combo :keys="['Ctrl', 'Shift', 'T']" />
                </div>
            </div>
        </div>

        {{-- Navigation --}}
        <div>
            <h3 class="text-lg font-semibold mb-3 text-gray-900 dark:text-white">
                Navigation
            </h3>
            <div class="space-y-2">
                <div class="flex items-center justify-between">
                    <span class="text-gray-700 dark:text-gray-300">Move up/down</span>
                    <div class="flex gap-1">
                        <x-ui.kbd.arrow direction="up" />
                        <x-ui.kbd.arrow direction="down" />
                    </div>
                </div>
                <div class="flex items-center justify-between">
                    <span class="text-gray-700 dark:text-gray-300">Move left/right</span>
                    <div class="flex gap-1">
                        <x-ui.kbd.arrow direction="left" />
                        <x-ui.kbd.arrow direction="right" />
                    </div>
                </div>
                <div class="flex items-center justify-between">
                    <span class="text-gray-700 dark:text-gray-300">Go to top</span>
                    <x-ui.kbd.combo :keys="['Ctrl', 'Home']" />
                </div>
            </div>
        </div>

        {{-- Editing --}}
        <div>
            <h3 class="text-lg font-semibold mb-3 text-gray-900 dark:text-white">
                Editing
            </h3>
            <div class="space-y-2">
                <div class="flex items-center justify-between">
                    <span class="text-gray-700 dark:text-gray-300">Copy</span>
                    <x-ui.kbd.combo :keys="['Ctrl', 'C']" />
                </div>
                <div class="flex items-center justify-between">
                    <span class="text-gray-700 dark:text-gray-300">Paste</span>
                    <x-ui.kbd.combo :keys="['Ctrl', 'V']" />
                </div>
                <div class="flex items-center justify-between">
                    <span class="text-gray-700 dark:text-gray-300">Select all</span>
                    <x-ui.kbd.combo :keys="['Ctrl', 'A']" />
                </div>
            </div>
        </div>
    </div>
</x-ui.modal>
```

### Game Controls

```blade
<x-ui.card>
    <x-slot:header>
        <h3 class="text-lg font-semibold">Game Controls</h3>
    </x-slot:header>

    <div class="space-y-4">
        <div>
            <h4 class="font-medium mb-2">Movement</h4>
            <div class="flex items-center gap-2">
                <x-ui.kbd>W</x-ui.kbd>
                <x-ui.kbd>A</x-ui.kbd>
                <x-ui.kbd>S</x-ui.kbd>
                <x-ui.kbd>D</x-ui.kbd>
                <span class="text-sm text-gray-600 dark:text-gray-400 ml-2">
                    or use arrow keys
                </span>
                <x-ui.kbd.arrow direction="up" />
                <x-ui.kbd.arrow direction="left" />
                <x-ui.kbd.arrow direction="down" />
                <x-ui.kbd.arrow direction="right" />
            </div>
        </div>

        <div>
            <h4 class="font-medium mb-2">Actions</h4>
            <div class="space-y-2">
                <div class="flex items-center gap-2">
                    <x-ui.kbd>Space</x-ui.kbd>
                    <span class="text-sm text-gray-600 dark:text-gray-400">Jump</span>
                </div>
                <div class="flex items-center gap-2">
                    <x-ui.kbd>E</x-ui.kbd>
                    <span class="text-sm text-gray-600 dark:text-gray-400">Interact</span>
                </div>
                <div class="flex items-center gap-2">
                    <x-ui.kbd>Shift</x-ui.kbd>
                    <span class="text-sm text-gray-600 dark:text-gray-400">Sprint</span>
                </div>
            </div>
        </div>

        <div>
            <h4 class="font-medium mb-2">Menu</h4>
            <div class="space-y-2">
                <div class="flex items-center gap-2">
                    <x-ui.kbd>Esc</x-ui.kbd>
                    <span class="text-sm text-gray-600 dark:text-gray-400">Pause</span>
                </div>
                <div class="flex items-center gap-2">
                    <x-ui.kbd>Tab</x-ui.kbd>
                    <span class="text-sm text-gray-600 dark:text-gray-400">Inventory</span>
                </div>
                <div class="flex items-center gap-2">
                    <x-ui.kbd>M</x-ui.kbd>
                    <span class="text-sm text-gray-600 dark:text-gray-400">Map</span>
                </div>
            </div>
        </div>
    </div>
</x-ui.card>
```

### Code Editor Shortcuts

```blade
<div class="bg-gray-50 dark:bg-gray-800 rounded-lg p-4">
    <h3 class="text-sm font-semibold uppercase tracking-wide text-gray-700 dark:text-gray-300 mb-3">
        Editor Shortcuts
    </h3>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        <div class="space-y-2">
            <div class="flex items-center justify-between">
                <span class="text-sm">Quick Open</span>
                <x-ui.kbd.combo :keys="['Ctrl', 'P']" size="sm" />
            </div>
            <div class="flex items-center justify-between">
                <span class="text-sm">Command Palette</span>
                <x-ui.kbd.combo :keys="['Ctrl', 'Shift', 'P']" size="sm" />
            </div>
            <div class="flex items-center justify-between">
                <span class="text-sm">New File</span>
                <x-ui.kbd.combo :keys="['Ctrl', 'N']" size="sm" />
            </div>
        </div>

        <div class="space-y-2">
            <div class="flex items-center justify-between">
                <span class="text-sm">Toggle Terminal</span>
                <x-ui.kbd.combo :keys="['Ctrl', '`']" size="sm" />
            </div>
            <div class="flex items-center justify-between">
                <span class="text-sm">Toggle Sidebar</span>
                <x-ui.kbd.combo :keys="['Ctrl', 'B']" size="sm" />
            </div>
            <div class="flex items-center justify-between">
                <span class="text-sm">Go to Line</span>
                <x-ui.kbd.combo :keys="['Ctrl', 'G']" size="sm" />
            </div>
        </div>
    </div>
</div>
```

### macOS Modifier Keys

```blade
<p class="text-gray-700 dark:text-gray-300">
    macOS users can use
    <x-ui.kbd>⌘</x-ui.kbd> (Command) instead of
    <x-ui.kbd>Ctrl</x-ui.kbd> for most shortcuts:
</p>

<div class="mt-2 space-y-1">
    <div>
        <x-ui.kbd.combo :keys="['⌘', 'C']" /> - Copy
    </div>
    <div>
        <x-ui.kbd.combo :keys="['⌘', 'V']" /> - Paste
    </div>
    <div>
        <x-ui.kbd.combo :keys="['⌘', 'Z']" /> - Undo
    </div>
    <div>
        <x-ui.kbd.combo :keys="['⌘', '⇧', 'Z']" /> - Redo
    </div>
</div>
```

## Accessibility

The KBD component includes several accessibility features:

1. **Semantic HTML**: Uses the native `<kbd>` element for proper semantic meaning
2. **Screen Reader Support**: Arrow keys include hidden labels via `sr-only` class
3. **Visual Clarity**: High contrast between text and background in both light and dark modes
4. **Keyboard Navigation**: The component itself doesn't trap focus

### Screen Reader Announcements

```blade
{{-- This arrow key --}}
<x-ui.kbd.arrow direction="up" />

{{-- Will be announced as "Arrow key up" to screen readers --}}
```

## Best Practices

### Do's

- Use KBD for keyboard input representation
- Keep key names concise and clear
- Use arrow components for directional keys
- Group related shortcuts together
- Provide context with surrounding text
- Use appropriate sizes for your layout

### Don'ts

- Don't use KBD for non-keyboard elements
- Don't mix different naming conventions (e.g., "Ctrl" vs "Control")
- Don't overuse - only show important shortcuts
- Don't use extremely long key combinations

### Naming Conventions

Be consistent with key names:

```blade
{{-- Recommended --}}
<x-ui.kbd>Ctrl</x-ui.kbd>   {{-- Not Control --}}
<x-ui.kbd>Alt</x-ui.kbd>    {{-- Not Option (unless macOS) --}}
<x-ui.kbd>Shift</x-ui.kbd>
<x-ui.kbd>Enter</x-ui.kbd>  {{-- Not Return --}}
<x-ui.kbd>Esc</x-ui.kbd>    {{-- Not Escape --}}

{{-- macOS specific --}}
<x-ui.kbd>⌘</x-ui.kbd>      {{-- Command --}}
<x-ui.kbd>⌥</x-ui.kbd>      {{-- Option --}}
<x-ui.kbd>⌃</x-ui.kbd>      {{-- Control --}}
<x-ui.kbd>⇧</x-ui.kbd>      {{-- Shift --}}
```

## Dark Mode

The KBD component automatically adapts to dark mode with appropriate color adjustments:

- Light mode: Gray background with dark text
- Dark mode: Darker gray background with light text
- Both modes maintain proper contrast ratios for accessibility

## Browser Compatibility

The KBD component uses standard HTML and CSS that works across all modern browsers:

- Chrome/Edge (latest)
- Firefox (latest)
- Safari (latest)
- Opera (latest)

## Related Components

- [Button](button.md) - For interactive elements
- [Badge](badge.md) - For labels and tags
- [Alert](alert.md) - For informational messages
- [Data Table](data-table.md) - For tabular keyboard shortcut listings

## Tips & Tricks

### Dynamic Key Display

```blade
@php
    $isMac = str_contains(request()->userAgent(), 'Mac');
    $modKey = $isMac ? '⌘' : 'Ctrl';
@endphp

<p>
    Press <x-ui.kbd.combo :keys="[$modKey, 'S']" /> to save
</p>
```

### Custom Styling

```blade
{{-- Add custom classes --}}
<x-ui.kbd class="!bg-blue-100 !text-blue-800 dark:!bg-blue-900 dark:!text-blue-200">
    Custom
</x-ui.kbd>

{{-- Combine with other utilities --}}
<x-ui.kbd class="shadow-lg ring-2 ring-blue-500">
    Highlighted
</x-ui.kbd>
```

### Tooltips Integration

```blade
<span x-data="{ show: false }" class="relative">
    <button
        @mouseenter="show = true"
        @mouseleave="show = false"
        class="p-2 rounded hover:bg-gray-100 dark:hover:bg-gray-800"
    >
        Save
    </button>

    <div
        x-show="show"
        x-transition
        class="absolute bottom-full mb-2 left-1/2 -translate-x-1/2"
    >
        <div class="bg-gray-900 text-white text-xs px-2 py-1 rounded">
            <x-ui.kbd.combo :keys="['Ctrl', 'S']" size="sm" />
        </div>
    </div>
</span>
```

### Printable Shortcuts Cheatsheet

```blade
<div class="print:block hidden">
    <h1>Keyboard Shortcuts Cheatsheet</h1>

    <div class="grid grid-cols-2 gap-4">
        <div>
            <h2>Navigation</h2>
            <table>
                <tr>
                    <td><x-ui.kbd.combo :keys="['Ctrl', 'K']" /></td>
                    <td>Search</td>
                </tr>
                {{-- More shortcuts --}}
            </table>
        </div>
    </div>
</div>
```

---

**Component Location:** `resources/views/components/ui/kbd.blade.php`
**Documentation:** `docs/components/ui/kbd.md`
**Flowbite Reference:** [KBD Component](https://flowbite.com/docs/components/kbd/)