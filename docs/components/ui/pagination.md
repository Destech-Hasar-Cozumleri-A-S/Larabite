# Pagination Component

The Pagination component provides navigation controls for browsing through multi-page content and data sets. It's perfect for blog listings, product catalogs, search results, and table data where content spans multiple pages.

## Components

- `<x-ui::pagination>` - Full pagination with page numbers
- `<x-ui::pagination.simple>` - Previous/Next only navigation
- `<x-ui::pagination.info>` - Entry count information display

## Basic Usage

### Default Pagination

Full pagination with numbered pages and Previous/Next buttons:

```blade
{{-- In your controller --}}
$pets = Pet::paginate(15);

{{-- In your view --}}
<x-ui::pagination :paginator="$pets" />
```

### Pagination with Info

Show entry count information along with pagination:

```blade
<x-ui::pagination :paginator="$pets" :showInfo="true" />
```

### Simple Pagination

Previous/Next navigation without page numbers:

```blade
<x-ui::pagination.simple :paginator="$pets" />
```

### Standalone Info Display

Show pagination info separately:

```blade
<x-ui::pagination.info :paginator="$pets" />

{{-- Somewhere else in your layout --}}
<x-ui::pagination :paginator="$pets" />
```

## Sizes

Control the size of pagination buttons:

```blade
{{-- Small size --}}
<x-ui::pagination :paginator="$pets" size="sm" />

{{-- Default size --}}
<x-ui::pagination :paginator="$pets" size="default" />

{{-- Simple pagination sizes --}}
<x-ui::pagination.simple :paginator="$pets" size="sm" />
```

## Props

### Pagination (`ui::pagination`)

| Prop | Type | Default | Description |
|------|------|---------|-------------|
| `paginator` | object | `null` | Laravel paginator instance |
| `size` | string | `'default'` | Button size: `sm`, `default` |
| `showInfo` | boolean | `false` | Show entry count information |

### Simple Pagination (`ui::pagination.simple`)

| Prop | Type | Default | Description |
|------|------|---------|-------------|
| `paginator` | object | `null` | Laravel paginator instance |
| `size` | string | `'default'` | Button size: `sm`, `default` |

### Pagination Info (`ui::pagination.info`)

| Prop | Type | Default | Description |
|------|------|---------|-------------|
| `paginator` | object | `null` | Laravel paginator instance |

## Real-World Examples

### Blog Post Listing

```blade
{{-- routes/web.php --}}
Route::get('/blog', function () {
    $posts = App\Models\Post::latest()->paginate(10);
    return view('blog.index', compact('posts'));
});

{{-- resources/views/blog/index.blade.php --}}
<div class="max-w-4xl mx-auto">
    <h1 class="text-3xl font-bold mb-8">Blog Posts</h1>

    {{-- Post Grid --}}
    <div class="grid gap-6 mb-8">
        @foreach($posts as $post)
            <x-ui::card>
                <x-slot:header>
                    <h2 class="text-xl font-semibold">{{ $post->title }}</h2>
                    <p class="text-sm text-gray-500">{{ $post->published_at->format('M d, Y') }}</p>
                </x-slot:header>

                <p class="text-gray-700 dark:text-gray-300">{{ $post->excerpt }}</p>

                <x-slot:footer>
                    <x-ui::button href="{{ route('blog.show', $post) }}" variant="primary">
                        Read More
                    </x-ui::button>
                </x-slot:footer>
            </x-ui::card>
        @endforeach
    </div>

    {{-- Pagination --}}
    <div class="flex justify-center">
        <x-ui::pagination :paginator="$posts" />
    </div>
</div>
```

### Product Catalog

```blade
<div class="container mx-auto px-4">
    <div class="flex items-center justify-between mb-6">
        <h1 class="text-2xl font-bold">Pet Products</h1>
        <x-ui::pagination.info :paginator="$products" />
    </div>

    {{-- Product Grid --}}
    <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-4 gap-6 mb-8">
        @foreach($products as $product)
            <x-ui::card>
                <img src="{{ $product->image }}" alt="{{ $product->name }}" class="w-full h-48 object-cover rounded-t-lg">

                <x-slot:header>
                    <h3 class="font-semibold">{{ $product->name }}</h3>
                    <p class="text-xl font-bold text-blue-600">${{ $product->price }}</p>
                </x-slot:header>

                <p class="text-sm text-gray-600 dark:text-gray-400">{{ $product->description }}</p>

                <x-slot:footer>
                    <x-ui::button variant="primary" class="w-full">
                        Add to Cart
                    </x-ui::button>
                </x-slot:footer>
            </x-ui::card>
        @endforeach
    </div>

    {{-- Pagination --}}
    <div class="flex justify-center">
        <x-ui::pagination :paginator="$products" size="sm" />
    </div>
</div>
```

### Data Table with Pagination

```blade
<div class="relative overflow-x-auto">
    {{-- Table Info --}}
    <div class="flex items-center justify-between pb-4">
        <x-ui::pagination.info :paginator="$users" />

        {{-- Search --}}
        <x-ui::form.search-input
            placeholder="Search users..."
            wire:model.live="search"
        />
    </div>

    {{-- Table --}}
    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">Name</th>
                <th scope="col" class="px-6 py-3">Email</th>
                <th scope="col" class="px-6 py-3">Role</th>
                <th scope="col" class="px-6 py-3">Joined</th>
                <th scope="col" class="px-6 py-3">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                    <td class="px-6 py-4 font-medium text-gray-900 dark:text-white">
                        {{ $user->name }}
                    </td>
                    <td class="px-6 py-4">{{ $user->email }}</td>
                    <td class="px-6 py-4">{{ $user->role }}</td>
                    <td class="px-6 py-4">{{ $user->created_at->format('M d, Y') }}</td>
                    <td class="px-6 py-4">
                        <x-ui::button href="{{ route('users.edit', $user) }}" variant="light" size="sm">
                            Edit
                        </x-ui::button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{-- Pagination --}}
    <div class="flex items-center justify-between pt-4">
        <x-ui::pagination.simple :paginator="$users" />
    </div>
</div>
```

### Search Results

```blade
<div class="max-w-4xl mx-auto">
    <h1 class="text-2xl font-bold mb-2">Search Results</h1>
    <x-ui::pagination.info :paginator="$results" class="mb-6" />

    @if($results->total() > 0)
        <div class="space-y-4 mb-8">
            @foreach($results as $result)
                <div class="p-4 bg-white dark:bg-gray-800 rounded-lg shadow">
                    <h3 class="text-lg font-semibold mb-2">
                        <a href="{{ $result->url }}" class="text-blue-600 hover:underline">
                            {{ $result->title }}
                        </a>
                    </h3>
                    <p class="text-sm text-gray-600 dark:text-gray-400 mb-2">
                        {{ $result->url }}
                    </p>
                    <p class="text-gray-700 dark:text-gray-300">
                        {{ $result->excerpt }}
                    </p>
                </div>
            @endforeach
        </div>

        <div class="flex justify-center">
            <x-ui::pagination :paginator="$results" />
        </div>
    @else
        <p class="text-gray-500 dark:text-gray-400 text-center py-12">
            No results found for your search.
        </p>
    @endif
</div>
```

### Mobile-Responsive Table

```blade
<div>
    {{-- Desktop Table --}}
    <div class="hidden md:block">
        <x-ui::pagination.info :paginator="$pets" class="mb-4" />

        <table class="w-full">
            {{-- Table content --}}
        </table>

        <div class="mt-4">
            <x-ui::pagination :paginator="$pets" />
        </div>
    </div>

    {{-- Mobile Card View --}}
    <div class="md:hidden space-y-4">
        @foreach($pets as $pet)
            <x-ui::card>
                <h3 class="font-semibold">{{ $pet->name }}</h3>
                <p class="text-sm text-gray-500">{{ $pet->species }} • {{ $pet->breed }}</p>
            </x-ui::card>
        @endforeach

        <x-ui::pagination.simple :paginator="$pets" size="sm" />
    </div>
</div>
```

## Laravel Integration

### Controller Setup

```php
<?php

namespace App\Http\Controllers;

use App\Models\Pet;
use Illuminate\Http\Request;

class PetController extends Controller
{
    public function index(Request $request)
    {
        // Simple pagination
        $pets = Pet::paginate(15);

        // Paginate with custom per-page
        $pets = Pet::paginate($request->input('per_page', 25));

        // Simple pagination (no page count)
        $pets = Pet::simplePaginate(15);

        // With query filters
        $pets = Pet::query()
            ->when($request->search, function ($query, $search) {
                $query->where('name', 'like', "%{$search}%");
            })
            ->when($request->species, function ($query, $species) {
                $query->where('species', $species);
            })
            ->latest()
            ->paginate(20);

        return view('pets.index', compact('pets'));
    }
}
```

### Preserving Query Parameters

```blade
{{-- Append query parameters to pagination links --}}
<x-ui::pagination :paginator="$pets->appends(request()->query())" />

{{-- Or in controller --}}
$pets = Pet::where('species', $species)->paginate(15)->withQueryString();
```

## Livewire Integration

### Basic Livewire Pagination

```php
<?php

namespace App\Livewire;

use App\Models\Pet;
use Livewire\Component;
use Livewire\WithPagination;

class PetList extends Component
{
    use WithPagination;

    public $search = '';
    public $perPage = 15;

    public function render()
    {
        return view('livewire.pet-list', [
            'pets' => Pet::where('name', 'like', "%{$this->search}%")
                ->paginate($this->perPage)
        ]);
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }
}
```

```blade
{{-- resources/views/livewire/pet-list.blade.php --}}
<div>
    <div class="mb-4">
        <x-ui::form.search-input
            wire:model.live="search"
            placeholder="Search pets..."
        />
    </div>

    <div class="grid gap-4 mb-4">
        @foreach($pets as $pet)
            <x-ui::card>
                <h3>{{ $pet->name }}</h3>
            </x-ui::card>
        @endforeach
    </div>

    <x-ui::pagination :paginator="$pets" />
</div>
```

### Livewire with Custom Pagination View

```php
protected $paginationTheme = 'tailwind'; // Use Tailwind pagination

// Or use simple pagination
public function render()
{
    return view('livewire.pet-list', [
        'pets' => Pet::query()->simplePaginate($this->perPage)
    ]);
}
```

## Accessibility

The Pagination component includes several accessibility features:

1. **Semantic HTML**: Uses `<nav>` with `aria-label="Page navigation"`
2. **ARIA Attributes**: `aria-current="page"` marks active page
3. **Screen Reader Support**: "Previous" and "Next" labels with `sr-only`
4. **Keyboard Navigation**: All links are keyboard accessible
5. **Visual Indicators**: Clear visual distinction for current page
6. **Disabled States**: Proper disabled styling and cursor indication

## Best Practices

### Do's

- Use appropriate pagination type (full vs simple) based on content
- Show entry count for data tables
- Keep pages at reasonable size (10-50 items)
- Preserve query parameters (search, filters)
- Provide visual feedback for current page
- Use consistent pagination placement
- Reset to page 1 when filters change

### Don'ts

- Don't show pagination for single-page results
- Don't use too many visible page numbers
- Don't forget to handle empty states
- Don't use pagination for infinite scroll content
- Don't break the back button (use proper URLs)
- Don't forget mobile responsiveness

### Recommended Page Sizes

- **Blog posts**: 10-15 per page
- **Product listings**: 20-30 per page
- **Search results**: 15-25 per page
- **Data tables**: 25-50 per page
- **User lists**: 15-30 per page

## Dark Mode

The Pagination component automatically adapts to dark mode with appropriate color adjustments for:
- Background colors
- Border colors
- Text colors
- Hover states
- Active page highlighting

## Browser Compatibility

The Pagination component works across all modern browsers:
- Chrome/Edge (latest)
- Firefox (latest)
- Safari (latest)
- Opera (latest)

## Related Components

- [Data Table](data-table.md) - Table components with pagination
- [Button](button.md) - Navigation buttons
- [Dropdown](dropdown.md) - Per-page selection
- [Form Input](../forms/input.md) - Page number input

## Tips & Tricks

### Custom Per-Page Selection

```blade
<div class="flex items-center justify-between mb-4">
    <x-ui::pagination.info :paginator="$items" />

    <div class="flex items-center gap-2">
        <label class="text-sm text-gray-700 dark:text-gray-300">Per page:</label>
        <select
            wire:model.live="perPage"
            class="border-gray-300 rounded-lg text-sm"
        >
            <option value="10">10</option>
            <option value="25">25</option>
            <option value="50">50</option>
            <option value="100">100</option>
        </select>
    </div>
</div>
```

### Loading States with Livewire

```blade
<div wire:loading.class="opacity-50">
    @foreach($items as $item)
        <x-ui::card>{{ $item->name }}</x-ui::card>
    @endforeach
</div>

<div class="relative">
    <div wire:loading.delay class="absolute inset-0 bg-white/50 flex items-center justify-center">
        <x-ui::spinner />
    </div>

    <x-ui::pagination :paginator="$items" />
</div>
```

### Scroll to Top on Page Change

```blade
<div id="content-top"></div>

<div>
    {{-- Content --}}
</div>

<x-ui::pagination :paginator="$items" />

<script>
document.querySelectorAll('[aria-label="Page navigation"] a').forEach(link => {
    link.addEventListener('click', () => {
        document.getElementById('content-top').scrollIntoView({ behavior: 'smooth' });
    });
});
</script>
```

### Custom Pagination Fragment

```php
// In controller
$pets = Pet::paginate(15, ['*'], 'page', $page)->fragment('pets-section');
```

```blade
<div id="pets-section">
    @foreach($pets as $pet)
        {{-- Content --}}
    @endforeach

    <x-ui::pagination :paginator="$pets" />
</div>
```

---

**Component Location:** `resources/views/components/ui/pagination.blade.php`
**Documentation:** `docs/components/ui/pagination.md`
**Flowbite Reference:** [Pagination Component](https://flowbite.com/docs/components/pagination/)
**Laravel Docs:** [Database Pagination](https://laravel.com/docs/pagination)