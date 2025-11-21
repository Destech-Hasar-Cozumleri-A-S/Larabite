# Link Component

Hyperlink'ler için.

## Component Location

`resources/views/components/ui/typography/link.blade.php`

## Features

- 4 varyant (default, button, card, cta)
- Underline kontrolü
- External link desteği
- Dark mode desteği

## Usage Examples

```blade
{{-- Default Link --}}
<x-ui.typography.link href="{{ route('about') }}">
    Learn more
</x-ui.typography.link>

{{-- Button Styled Link --}}
<x-ui.typography.link href="{{ route('signup') }}" variant="button">
    Get started
</x-ui.typography.link>

{{-- Card Link --}}
<x-ui.typography.link href="{{ route('features') }}" variant="card">
    <h5 class="mb-2 text-2xl font-bold text-gray-900 dark:text-white">
        Noteworthy features
    </h5>
    <p class="font-normal text-gray-700 dark:text-gray-400">
        Here are the biggest enterprise features.
    </p>
</x-ui.typography.link>

{{-- CTA Link --}}
<x-ui.typography.link href="{{ route('docs') }}" variant="cta">
    <svg class="w-5 h-5 me-2" fill="currentColor" viewBox="0 0 20 20">...</svg>
    <div>
        <div class="text-gray-500 dark:text-gray-400">Read more</div>
        <div class="text-sm">Documentation</div>
    </div>
    <svg class="w-6 h-6 ms-auto" fill="currentColor" viewBox="0 0 20 20">...</svg>
</x-ui.typography.link>

{{-- External Link --}}
<x-ui.typography.link href="https://flowbite.com" :external="true">
    Visit Flowbite
</x-ui.typography.link>

{{-- No Underline --}}
<x-ui.typography.link href="#" underline="never">
    Link without underline
</x-ui.typography.link>
```

## Props

| Prop | Type | Default | Options | Description |
|------|------|---------|---------|-------------|
| `href` | string | '#' | - | Link URL |
| `variant` | string | 'default' | default, button, card, cta | Link stili varyantı |
| `underline` | string | 'hover' | always, hover, never | Altı çizili olma durumu |
| `external` | boolean | false | - | Yeni sekmede açılsın mı? |