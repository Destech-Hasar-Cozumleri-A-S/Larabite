# List Component

Liste gösterimi için (ul, ol, dl).

## Component Location

`resources/views/components/ui/typography/list.blade.php`

## Features

- 4 liste tipi (unordered, ordered, description, unstyled)
- İçten/dıştan pozisyon kontrolü
- Spacing ayarları
- Icon desteği

## Usage Examples

```blade
{{-- Unordered List --}}
<x-ui.typography.list type="unordered" spacing="2">
    <x-ui.typography.list-item>At least 10 characters</x-ui.typography.list-item>
    <x-ui.typography.list-item>At least one lowercase character</x-ui.typography.list-item>
    <x-ui.typography.list-item>At least one uppercase character</x-ui.typography.list-item>
    <x-ui.typography.list-item>At least one special character, e.g., ! @ # ?</x-ui.typography.list-item>
</x-ui.typography.list>

{{-- Ordered List --}}
<x-ui.typography.list type="ordered" spacing="1">
    <x-ui.typography.list-item>Bonnie Green with 70 points</x-ui.typography.list-item>
    <x-ui.typography.list-item>Jese Leos with 63 points</x-ui.typography.list-item>
    <x-ui.typography.list-item>Michael Gough with 57 points</x-ui.typography.list-item>
</x-ui.typography.list>

{{-- List with Icons --}}
<x-ui.typography.list type="unstyled" spacing="4">
    <x-ui.typography.list-item>
        <x-slot:icon>
            <svg class="w-3.5 h-3.5 me-2 text-green-500 dark:text-green-400 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z"/>
            </svg>
        </x-slot:icon>
        Individual configuration
    </x-ui.typography.list-item>

    <x-ui.typography.list-item>
        <x-slot:icon>
            <svg class="w-3.5 h-3.5 me-2 text-green-500 dark:text-green-400 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z"/>
            </svg>
        </x-slot:icon>
        No setup, or hidden fees
    </x-ui.typography.list-item>
</x-ui.typography.list>

{{-- Description List --}}
<x-ui.typography.list type="description">
    <div class="py-3">
        <x-ui.typography.list-item type="dt" class="mb-1 text-gray-500 dark:text-gray-400">
            Email address
        </x-ui.typography.list-item>
        <x-ui.typography.list-item type="dd" class="text-lg font-semibold">
            yourname@flowbite.com
        </x-ui.typography.list-item>
    </div>

    <div class="py-3">
        <x-ui.typography.list-item type="dt" class="mb-1 text-gray-500 dark:text-gray-400">
            Home address
        </x-ui.typography.list-item>
        <x-ui.typography.list-item type="dd" class="text-lg font-semibold">
            California, USA
        </x-ui.typography.list-item>
    </div>
</x-ui.typography.list>
```

## List Props

| Prop | Type | Default | Options | Description |
|------|------|---------|---------|-------------|
| `type` | string | 'unordered' | unordered, ordered, description, unstyled | Liste tipi |
| `position` | string | 'inside' | inside, outside | Liste işareti pozisyonu |
| `spacing` | string | '1' | 1, 2, 4 | Liste öğeleri arası boşluk |

## List Item Props

| Prop | Type | Default | Options | Description |
|------|------|---------|---------|-------------|
| `type` | string | 'li' | li, dt, dd | Liste öğesi HTML elementi |
| `icon` | slot | optional | - | SVG icon (slot olarak) |