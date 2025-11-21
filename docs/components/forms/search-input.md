# Form Search Input Component

Search input fields component.

## Component Location

**File Path:** `resources/views/components/ui/form/search-input.blade.php`

## Features

- 3 size options (sm, base, lg)
- 4 main variants (default, simple, voice, dropdown)
- Search icon automatically added
- Voice search feature
- Dropdown category filtering
- Submit button support
- Validation states (error)
- Helper text support
- Dark mode support
- Livewire integration
- HTML5 search input type

## Usage Examples

### Default Search with Button Inside

```blade
<x-ui::form.search-input
    name="search"
    placeholder="Search for anything..."
    buttonText="Search"
    wire:model.live="searchQuery"
/>
```

### Simple Search (Separate Button)

```blade
<x-ui::form.search-input
    variant="simple"
    name="query"
    placeholder="Search..."
    buttonText="Search"
    wire:model="query"
/>
```

### Voice Search

```blade
<x-ui::form.search-input
    variant="voice"
    name="search"
    placeholder="Search or speak..."
    wire:model.live.debounce.500ms="search"
/>
```

### Search with Voice Button in Default Variant

```blade
<x-ui::form.search-input
    name="search"
    placeholder="Search..."
    :voiceSearch="true"
    :showButton="false"
    wire:model.live="search"
/>
```

### Search with Dropdown Categories

```blade
<x-ui::form.search-input
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
<x-ui::form.search-input
    size="lg"
    name="search"
    placeholder="Search..."
    buttonText="Go"
    wire:model="search"
/>
```

### Small Size

```blade
<x-ui::form.search-input
    size="sm"
    variant="simple"
    name="search"
    placeholder="Quick search..."
    wire:model.live="search"
/>
```

### With Error

```blade
<x-ui::form.search-input
    name="search"
    placeholder="Search..."
    error="Search query is required"
    wire:model="search"
/>
```

### With Helper Text

```blade
<x-ui::form.search-input
    name="search"
    placeholder="Search products, categories..."
    helper="Try searching for product names or SKUs"
    wire:model="search"
/>
```

### Without Button (Live Search)

```blade
<x-ui::form.search-input
    name="search"
    placeholder="Type to search..."
    :showButton="false"
    wire:model.live.debounce.300ms="search"
/>
```

### Form Submission

```blade
<form wire:submit.prevent="performSearch">
    <x-ui::form.search-input
        name="q"
        placeholder="Search..."
        buttonText="Search"
        :required="true"
    />
</form>
```

### Custom Button Text

```blade
<x-ui::form.search-input
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
<x-ui::form.search-input
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
<x-ui::form.search-input
    name="global_search"
    placeholder="Search..."
    buttonText="Search"
    :voiceSearch="true"
    wire:model="globalSearch"
/>
```

### Blog Search

```blade
<x-ui::form.search-input
    variant="simple"
    name="blog_search"
    placeholder="Search articles..."
    buttonText="Search"
    wire:model.live.debounce.300ms="blogSearch"
/>
```

### User Search (Admin)

```blade
<x-ui::form.search-input
    name="user_search"
    placeholder="Search users by name or email..."
    :showButton="false"
    wire:model.live.debounce.500ms="userSearch"
/>
```

## Props Table

| Prop | Type | Default | Description |
|------|------|---------|-------------|
| `label` | string | optional | Label text (generally not needed for search) |
| `name` | string | 'search' | Input name attribute |
| `placeholder` | string | 'Search...' | Placeholder text |
| `value` | string | optional | Initial value |
| `size` | string | 'base' | Size: sm, base, lg |
| `variant` | string | 'default' | Variant: default, simple, voice, dropdown |
| `buttonText` | string | 'Search' | Search button text |
| `showButton` | boolean | true | Show search button? |
| `voiceSearch` | boolean | false | Add voice search button? |
| `dropdownItems` | array | [] | Dropdown items (for dropdown variant) |
| `dropdownPlaceholder` | string | 'All categories' | Dropdown placeholder |
| `error` | string | optional | Error message |
| `helper` | string | optional | Helper text |
| `required` | boolean | false | Required field indicator |

## Variants

### Default
Icon on left, search button on right (inside input)

### Simple
Icon on left, search button on right (outside input, adjacent)

### Voice
Icon on left, microphone button on right

### Dropdown
Category dropdown on left, search button on right

## Validation Examples

```blade
<form wire:submit.prevent="search">
    <x-ui::form.search-input
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
<x-ui::form.search-input
    name="search"
    placeholder="Search..."
    wire:model="searchTerm"
/>
```

### Live Search with Debounce

```blade
<x-ui::form.search-input
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
    <x-ui::form.search-input
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

- Search input automatically uses `type="search"` (HTML5 semantic)
- Voice search feature is active but audio processing function must be added
- Dropdown feature requires Flowbite JS (for dropdown toggle)
- For live search, use `wire:model.live` and `showButton="false"`
- For form submit, `wire:submit.prevent` or normal form action can be used
- Debounce value can be adjusted according to search frequency (300ms-500ms recommended)
- Web Speech API can be used for voice search (browser support required)