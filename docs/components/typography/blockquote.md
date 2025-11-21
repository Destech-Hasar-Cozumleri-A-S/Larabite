# Blockquote Component

Alıntılar ve testimonial'lar için.

## Component Location

`resources/views/components/ui/typography/blockquote.blade.php`

## Features

- 5 varyant (default, solid, icon, testimonial, review)
- 3 boyut seçeneği
- Hizalama desteği
- Yazar bilgisi ve avatarı
- Yıldız rating sistemi (review için)

## Usage Examples

```blade
{{-- Default Blockquote --}}
<x-ui.typography.blockquote cite="- Bonnie Green">
    "Flowbite is just awesome. It contains tons of predesigned components and pages starting from login screen to complex dashboard."
</x-ui.typography.blockquote>

{{-- Solid Background --}}
<x-ui.typography.blockquote variant="solid">
    "Flowbite is just awesome. It contains tons of predesigned components."
</x-ui.typography.blockquote>

{{-- With Icon --}}
<x-ui.typography.blockquote variant="icon" size="2xl">
    "Flowbite is just awesome. It contains tons of predesigned components and pages starting from login screen to complex dashboard."
</x-ui.typography.blockquote>

{{-- Testimonial --}}
<x-ui.typography.blockquote
    variant="testimonial"
    author="Bonnie Green"
    authorTitle="CEO at Flowbite"
    authorImage="/avatar.jpg"
    align="center"
>
    "Flowbite is just awesome. It contains tons of predesigned components."
</x-ui.typography.blockquote>

{{-- User Review with Rating --}}
<x-ui.typography.blockquote
    variant="review"
    :rating="4"
    author="Jese Leos"
    authorTitle="Marketing at Open AI"
    authorImage="/avatar2.jpg"
>
    "This is my third Invision product and I'm excited about this one. I'm sure I'll learn a lot from this course."
</x-ui.typography.blockquote>
```

## Props

| Prop | Type | Default | Options | Description |
|------|------|---------|---------|-------------|
| `variant` | string | 'default' | default, solid, icon, testimonial, review | Blockquote varyantı |
| `size` | string | 'xl' | lg, xl, 2xl | Metin boyutu |
| `align` | string | 'left' | left, center, right | Metin hizalama |
| `cite` | string | optional | - | Kaynak/referans metni |
| `author` | string | optional | - | Yazar adı |
| `authorTitle` | string | optional | - | Yazar unvanı |
| `authorImage` | string | optional | - | Yazar avatar URL |
| `rating` | int | optional | 1-5 | Yıldız sayısı (review varyantı için) |