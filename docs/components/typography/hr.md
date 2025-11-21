# HR (Horizontal Rule) Component

For content dividers.

## Component Location

`resources/views/components/ui/typography/hr.blade.php`

## Features

- 5 variants (default, trimmed, icon, text, shape)
- Custom icon support
- Custom text support

## Usage Examples

```blade
{{-- Default HR --}}
<x-ui::typography.hr />

{{-- Trimmed (shorter) --}}
<x-ui::typography.hr variant="trimmed" />

{{-- HR with Icon --}}
<x-ui::typography.hr variant="icon">
    <x-slot:icon>
        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
            <path d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z" fill-rule="evenodd" clip-rule="evenodd"/>
        </svg>
    </x-slot:icon>
</x-ui::typography.hr>

{{-- HR with Text --}}
<x-ui::typography.hr variant="text" text="or" />

{{-- Shape HR (decorative) --}}
<x-ui::typography.hr variant="shape" />
```

## Props

| Prop | Type | Default | Options | Description |
|------|------|---------|---------|-------------|
| `variant` | string | 'default' | default, trimmed, icon, text, shape | HR variant |
| `text` | string | optional | - | Text for text variant |
| `icon` | slot | optional | - | SVG icon for icon variant (as slot) |