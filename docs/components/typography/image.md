# Image Component

Tipografi içinde resim gösterimi için.

## Component Location

`resources/views/components/ui/typography/image.blade.php`

## Features

- Responsive boyutlandırma
- Caption (altyazı) desteği
- Hizalama seçenekleri
- Rounded köşeler
- Shadow efekti

## Usage Examples

```blade
{{-- Default Image --}}
<x-ui.typography.image
    src="/image.jpg"
    alt="Description"
    size="full"
/>

{{-- With Caption --}}
<x-ui.typography.image
    src="/image.jpg"
    alt="Office"
    caption="Image caption goes here"
    align="center"
    size="xl"
/>

{{-- Rounded with Shadow --}}
<x-ui.typography.image
    src="/image.jpg"
    alt="Profile"
    rounded="lg"
    :shadow="true"
    size="md"
    align="center"
/>

{{-- Circular Image --}}
<x-ui.typography.image
    src="/avatar.jpg"
    alt="User"
    rounded="full"
    size="xs"
    align="center"
/>
```

## Props

| Prop | Type | Default | Options | Description |
|------|------|---------|---------|-------------|
| `src` | string | **required** | - | Resim URL |
| `alt` | string | **required** | - | Alt text |
| `caption` | string | optional | - | Altyazı |
| `align` | string | 'left' | left, center, right | Resim hizalama |
| `size` | string | 'full' | xs, md, xl, full | Resim boyutu |
| `rounded` | string | 'base' | none, base, lg, full | Köşe yuvarlaklığı |
| `shadow` | boolean | false | - | Gölge efekti |