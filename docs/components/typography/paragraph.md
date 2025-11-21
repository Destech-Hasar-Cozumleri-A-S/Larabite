# Paragraph Component

Paragraf metinleri için.

## Component Location

`resources/views/components/ui/typography/paragraph.blade.php`

## Features

- 3 boyut seçeneği
- Satır aralığı kontrolü (leading)
- Hizalama seçenekleri
- Drop cap (büyük ilk harf) desteği
- First line özel stil desteği

## Usage Examples

```blade
{{-- Default Paragraph --}}
<x-ui.typography.paragraph>
    Track work across the enterprise through an open, collaborative platform.
</x-ui.typography.paragraph>

{{-- Leading Paragraph (larger) --}}
<x-ui.typography.paragraph size="lg">
    Flowbite is an open-source library of UI components based on Tailwind CSS.
</x-ui.typography.paragraph>

{{-- Drop Cap Effect --}}
<x-ui.typography.paragraph :firstLetter="true" :firstLine="true">
    Track work across the enterprise through an open, collaborative platform. Link issues across Jira and ingest data from other software development tools.
</x-ui.typography.paragraph>

{{-- Centered Paragraph --}}
<x-ui.typography.paragraph align="center" size="lg">
    Centered text content
</x-ui.typography.paragraph>

{{-- Relaxed Leading --}}
<x-ui.typography.paragraph leading="relaxed">
    Text with more line spacing for better readability.
</x-ui.typography.paragraph>
```

## Props

| Prop | Type | Default | Options | Description |
|------|------|---------|---------|-------------|
| `size` | string | 'base' | base, lg, xl | Paragraf boyutu |
| `leading` | string | 'normal' | normal, relaxed, loose | Satır aralığı |
| `align` | string | 'left' | left, center, right, justify | Metin hizalama |
| `firstLetter` | boolean | false | - | Drop cap efekti |
| `firstLine` | boolean | false | - | İlk satır büyük harflerle |