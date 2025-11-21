# Heading Component

H1-H6 başlıkları için.

## Component Location

`resources/views/components/ui/typography/heading.blade.php`

## Features

- 6 seviye başlık (h1-h6)
- 5 farklı varyant (default, highlight, mark, gradient, underline)
- Responsive boyutlandırma
- Dark mode desteği
- Gradient renk kombinasyonları

## Usage Examples

```blade
{{-- Default Headings --}}
<x-ui.typography.heading level="1">
    Large Heading
</x-ui.typography.heading>

<x-ui.typography.heading level="2">
    Medium Heading
</x-ui.typography.heading>

{{-- Gradient Heading --}}
<x-ui.typography.heading level="1" variant="gradient" gradient="blue-purple">
    Gradient Heading
</x-ui.typography.heading>

{{-- Underlined Heading --}}
<x-ui.typography.heading level="2" variant="underline">
    Underlined Heading
</x-ui.typography.heading>

{{-- With Highlight (manual) --}}
<x-ui.typography.heading level="1">
    We invest in the <span class="text-blue-600 dark:text-blue-500">world's potential</span>
</x-ui.typography.heading>

{{-- With Mark (manual) --}}
<x-ui.typography.heading level="1">
    Regain <mark class="px-2 text-white bg-blue-600 rounded dark:bg-blue-500">control</mark> over your days
</x-ui.typography.heading>
```

## Props

| Prop | Type | Default | Options | Description |
|------|------|---------|---------|-------------|
| `level` | int | 1 | 1-6 | Başlık seviyesi |
| `variant` | string | 'default' | default, highlight, mark, gradient, underline | Başlık varyantı |
| `gradient` | string | 'blue-purple' | blue-purple, cyan-blue, green-blue, purple-pink, teal-lime, red-yellow | Gradient renk kombinasyonu |
| `highlightColor` | string | 'blue' | - | Vurgu rengi |