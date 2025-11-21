# Form Search Input Component

Arama (search) input alanları için özel bileşen.

## Component Location

**File Path:** `resources/views/components/ui/form/search-input.blade.php`

## Features

- 3 boyut seçeneği (sm, base, lg)
- 4 ana varyant (default, simple, voice, dropdown)
- Search icon otomatik eklenir
- Voice search özelliği
- Dropdown kategori filtreleme
- Submit button desteği
- Validation states (error)
- Helper text desteği
- Dark mode desteği
- Livewire entegrasyonu
- HTML5 search input tipi

## Usage Examples

### Default Search with Button Inside

```blade
<x-ui.form.search-input
    name="search"
    placeholder="Search for anything..."
    buttonText="Search"
    wire:model.live="searchQuery"
/>
```

### Simple Search (Separate Button)

```blade
<x-ui.form.search-input
    variant="simple"
    name="query"
    placeholder="Search..."
    buttonText="Search"
    wire:model="query"
/>
```

### Voice Search

```blade
<x-ui.form.search-input
    variant="voice"
    name="search"
    placeholder="Search or speak..."
    wire:model.live.debounce.500ms="search"
/>
```

### Search with Voice Button in Default Variant

```blade
<x-ui.form.search-input
    name="search"
    placeholder="Search..."
    :voiceSearch="true"
    :showButton="false"
    wire:model.live="search"
/>
```

### Search with Dropdown Categories

```blade
<x-ui.form.search-input
    variant="dropdown"
    name="search"
    placeholder="Search products..."
    dropdownPlaceholder="All categories"
    :dropdownItems="['Shopping', 'Images', 'News', 'Finance']"
    wire:model="searchQuery"
/>
```

### Large Size

```blade
<x-ui.form.search-input
    size="lg"
    name="search"
    placeholder="Search..."
    buttonText="Go"
    wire:model="search"
/>
```

### Small Size

```blade
<x-ui.form.search-input
    size="sm"
    variant="simple"
    name="search"
    placeholder="Quick search..."
    wire:model.live="search"
/>
```

### With Error

```blade
<x-ui.form.search-input
    name="search"
    placeholder="Search..."
    error="Search query is required"
    wire:model="search"
/>
```

### With Helper Text

```blade
<x-ui.form.search-input
    name="search"
    placeholder="Search products, categories..."
    helper="Try searching for product names or SKUs"
    wire:model="search"
/>
```

### Without Button (Live Search)

```blade
<x-ui.form.search-input
    name="search"
    placeholder="Type to search..."
    :showButton="false"
    wire:model.live.debounce.300ms="search"
/>
```

### Form Submission

```blade
<form wire:submit.prevent="performSearch">
    <x-ui.form.search-input
        name="q"
        placeholder="Search..."
        buttonText="Search"
        :required="true"
    />
</form>
```

### Custom Button Text

```blade
<x-ui.form.search-input
    variant="simple"
    name="search"
    placeholder="Find products..."
    buttonText="Find"
    wire:model="search"
/>
```

## Real-World Examples

### Product Search

```blade
<x-ui.form.search-input
    variant="dropdown"
    name="product_search"
    placeholder="Search products..."
    dropdownPlaceholder="All categories"
    :dropdownItems="['Electronics', 'Clothing', 'Books', 'Home & Garden']"
    helper="Search by product name, SKU, or description"
    wire:model.live.debounce.500ms="productSearch"
/>
```

### Site-Wide Search

```blade
<x-ui.form.search-input
    name="global_search"
    placeholder="Search..."
    buttonText="Search"
    :voiceSearch="true"
    wire:model="globalSearch"
/>
```

### Blog Search

```blade
<x-ui.form.search-input
    variant="simple"
    name="blog_search"
    placeholder="Search articles..."
    buttonText="Search"
    wire:model.live.debounce.300ms="blogSearch"
/>
```

### User Search (Admin)

```blade
<x-ui.form.search-input
    name="user_search"
    placeholder="Search users by name or email..."
    :showButton="false"
    wire:model.live.debounce.500ms="userSearch"
/>
```

## Props Table

| Prop | Type | Default | Description |
|------|------|---------|-------------|
| `label` | string | optional | Label metni (genellikle search için label gerekmez) |
| `name` | string | 'search' | Input name attribute |
| `placeholder` | string | 'Search...' | Placeholder text |
| `value` | string | optional | Initial value |
| `size` | string | 'base' | Boyut: sm, base, lg |
| `variant` | string | 'default' | Varyant: default, simple, voice, dropdown |
| `buttonText` | string | 'Search' | Arama butonu metni |
| `showButton` | boolean | true | Arama butonu gösterilsin mi? |
| `voiceSearch` | boolean | false | Ses arama butonu eklensin mi? |
| `dropdownItems` | array | [] | Dropdown öğeleri (dropdown varyant için) |
| `dropdownPlaceholder` | string | 'All categories' | Dropdown placeholder |
| `error` | string | optional | Hata mesajı |
| `helper` | string | optional | Yardımcı metin |
| `required` | boolean | false | Zorunlu alan göstergesi |

## Variants

### Default
Icon solda, search butonu sağda (input içinde)

### Simple
Icon solda, search butonu sağda (input dışında, bitişik)

### Voice
Icon solda, mikrofon butonu sağda

### Dropdown
Kategori dropdown solda, search butonu sağda

## Validation Examples

```blade
<form wire:submit.prevent="search">
    <x-ui.form.search-input
        name="query"
        placeholder="Search..."
        buttonText="Search"
        :required="true"
        :error="$errors->first('query')"
        wire:model="query"
    />
</form>
```

## Livewire Integration

### Basic Search

```blade
<x-ui.form.search-input
    name="search"
    placeholder="Search..."
    wire:model="searchTerm"
/>
```

### Live Search with Debounce

```blade
<x-ui.form.search-input
    name="search"
    placeholder="Search products..."
    :showButton="false"
    wire:model.live.debounce.300ms="searchTerm"
/>

{{-- Display Results --}}
@if ($searchTerm)
    <div class="mt-4">
        @foreach ($results as $result)
            {{-- Display search results --}}
        @endforeach
    </div>
@endif
```

### Search with Loading State

```blade
<div>
    <x-ui.form.search-input
        name="search"
        placeholder="Search..."
        wire:model.live.debounce.500ms="searchQuery"
    />

    <div wire:loading wire:target="searchQuery" class="mt-2 text-sm text-gray-500">
        Searching...
    </div>
</div>
```

## Best Practices

1. **Use debounce** - Add debounce to live search to reduce server load
2. **Provide placeholders** - Help users understand what they can search for
3. **Show loading states** - Display loading indicator during search
4. **Hide button for live search** - Remove button when using live search
5. **Add voice search** - Enhance UX with voice input option
6. **Use categories** - Add dropdown for filtered searches
7. **Show results count** - Display number of results found
8. **Highlight matches** - Highlight search terms in results
9. **Save search history** - Consider storing recent searches
10. **Handle empty results** - Show helpful message when no results found

## Notes

- Search input otomatik olarak `type="search"` kullanır (HTML5 semantic)
- Voice search özelliği aktif ama ses işleme fonksiyonu eklenmelidir
- Dropdown özelliği için Flowbite JS gerektirir (dropdown toggle için)
- Live search için `wire:model.live` ve `showButton="false"` kullanın
- Form submit için `wire:submit.prevent` veya normal form action kullanılabilir
- Debounce değeri arama sıklığına göre ayarlanabilir (300ms-500ms önerilir)
- Voice search için Web Speech API kullanılabilir (tarayıcı desteği gerekli)