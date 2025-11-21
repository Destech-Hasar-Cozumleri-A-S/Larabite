# Image Component

For displaying images within typography.

## Component Location

`resources/views/components/ui/typography/image.blade.php`

## Features

- Responsive sizing
- Caption support
- Alignment options
- Rounded corners
- Shadow effect

## Usage Examples

```blade
{{-- Default Image --}}
<x-ui::typography.image
    src="/image.jpg"
    alt="Description"
    size="full"
/>

{{-- With Caption --}}
<x-ui::typography.image
    src="/image.jpg"
    alt="Office"
    caption="Image caption goes here"
    align="center"
    size="xl"
/>

{{-- Rounded with Shadow --}}
<x-ui::typography.image
    src="/image.jpg"
    alt="Profile"
    rounded="lg"
    :shadow="true"
    size="md"
    align="center"
/>

{{-- Circular Image --}}
<x-ui::typography.image
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
| `src` | string | **required** | - | Image URL |
| `alt` | string | **required** | - | Alt text |
| `caption` | string | optional | - | Caption text |
| `align` | string | 'left' | left, center, right | Image alignment |
| `size` | string | 'full' | xs, md, xl, full | Image size |
| `rounded` | string | 'base' | none, base, lg, full | Corner roundness |
| `shadow` | boolean | false | - | Shadow effect |