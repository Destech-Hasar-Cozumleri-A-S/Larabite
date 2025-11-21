# Paragraph Component

For paragraph text.

## Component Location

`resources/views/components/ui/typography/paragraph.blade.php`

## Features

- 3 size options
- Line spacing control (leading)
- Alignment options
- Drop cap (large first letter) support
- First line special styling support

## Usage Examples

```blade
{{-- Default Paragraph --}}
<x-ui::typography.paragraph>
    Track work across the enterprise through an open, collaborative platform.
</x-ui::typography.paragraph>

{{-- Leading Paragraph (larger) --}}
<x-ui::typography.paragraph size="lg">
    Flowbite is an open-source library of UI components based on Tailwind CSS.
</x-ui::typography.paragraph>

{{-- Drop Cap Effect --}}
<x-ui::typography.paragraph :firstLetter="true" :firstLine="true">
    Track work across the enterprise through an open, collaborative platform. Link issues across Jira and ingest data from other software development tools.
</x-ui::typography.paragraph>

{{-- Centered Paragraph --}}
<x-ui::typography.paragraph align="center" size="lg">
    Centered text content
</x-ui::typography.paragraph>

{{-- Relaxed Leading --}}
<x-ui::typography.paragraph leading="relaxed">
    Text with more line spacing for better readability.
</x-ui::typography.paragraph>
```

## Props

| Prop | Type | Default | Options | Description |
|------|------|---------|---------|-------------|
| `size` | string | 'base' | base, lg, xl | Paragraph size |
| `leading` | string | 'normal' | normal, relaxed, loose | Line spacing |
| `align` | string | 'left' | left, center, right, justify | Text alignment |
| `firstLetter` | boolean | false | - | Drop cap effect |
| `firstLine` | boolean | false | - | First line in uppercase |