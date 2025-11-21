# Skeleton Component

Loading state placeholders that mimic content structure while data is being fetched.

## Overview

The Skeleton component provides visual loading indicators that show placeholder elements mimicking the structure of content being loaded. This improves perceived performance and user experience by showing that content is actively loading rather than displaying empty space or spinners.

## Component Files

- `resources/views/components/ui/skeleton.blade.php` - Base skeleton element
- `resources/views/components/ui/skeleton/text.blade.php` - Text line placeholders
- `resources/views/components/ui/skeleton/card.blade.php` - Card loading state
- `resources/views/components/ui/skeleton/list.blade.php` - List item placeholders
- `resources/views/components/ui/skeleton/avatar.blade.php` - Avatar with optional text
- `resources/views/components/ui/skeleton/table.blade.php` - Table loading state
- `resources/views/components/ui/skeleton/image.blade.php` - Image placeholder
- `resources/views/components/ui/skeleton/video.blade.php` - Video placeholder

## Basic Usage

### Simple Skeleton

```blade
<x-ui.skeleton class="h-4 w-48" />
```

### Text Lines

```blade
<x-ui.skeleton.text :lines="3" />
```

### Skeleton Card

```blade
<x-ui.skeleton.card />
```

## Props

### Base Skeleton Props

| Prop | Type | Default | Options | Description |
|------|------|---------|---------|-------------|
| `animated` | bool | `true` | - | Enable pulse animation |
| `width` | string | `null` | - | Custom width (e.g., '100px') |
| `height` | string | `null` | - | Custom height (e.g., '50px') |
| `rounded` | string | `'default'` | `'none'`, `'sm'`, `'default'`, `'md'`, `'lg'`, `'full'` | Border radius |

### Text Props

| Prop | Type | Default | Description |
|------|------|---------|-------------|
| `lines` | int | `3` | Number of text lines |
| `animated` | bool | `true` | Enable pulse animation |

### Card Props

| Prop | Type | Default | Description |
|------|------|---------|-------------|
| `animated` | bool | `true` | Enable pulse animation |
| `showImage` | bool | `true` | Show image placeholder |
| `showAvatar` | bool | `true` | Show avatar at bottom |

### List Props

| Prop | Type | Default | Description |
|------|------|---------|-------------|
| `items` | int | `3` | Number of list items |
| `animated` | bool | `true` | Enable pulse animation |
| `divided` | bool | `true` | Show dividers between items |

### Avatar Props

| Prop | Type | Default | Options | Description |
|------|------|---------|---------|-------------|
| `size` | string | `'default'` | `'xs'`, `'sm'`, `'default'`, `'lg'`, `'xl'` | Avatar size |
| `animated` | bool | `true` | - | Enable pulse animation |
| `showText` | bool | `false` | - | Show text lines next to avatar |

### Table Props

| Prop | Type | Default | Description |
|------|------|---------|-------------|
| `rows` | int | `5` | Number of table rows |
| `columns` | int | `4` | Number of columns |
| `animated` | bool | `true` | Enable pulse animation |
| `header` | bool | `true` | Show table header |

### Image Props

| Prop | Type | Default | Options | Description |
|------|------|---------|---------|-------------|
| `animated` | bool | `true` | - | Enable pulse animation |
| `width` | string | `null` | - | Custom width |
| `height` | string | `null` | - | Custom height |
| `aspectRatio` | string | `'video'` | `'square'`, `'video'`, `'portrait'` | Aspect ratio |

### Video Props

| Prop | Type | Default | Description |
|------|------|---------|-------------|
| `animated` | bool | `true` | Enable pulse animation |
| `width` | string | `null` | Custom width |
| `height` | string | `'h-56'` | Height class |

## Skeleton Variants

### 1. Base Skeleton

```blade
{{-- Simple rectangle --}}
<x-ui.skeleton class="h-4 w-32" />

{{-- Custom size --}}
<x-ui.skeleton width="200px" height="100px" />

{{-- Different shapes --}}
<x-ui.skeleton class="h-12 w-12" rounded="full" />
<x-ui.skeleton class="h-20 w-full" rounded="lg" />

{{-- Without animation --}}
<x-ui.skeleton class="h-4 w-48" :animated="false" />
```

### 2. Text Skeletons

```blade
{{-- 3 lines (default) --}}
<x-ui.skeleton.text />

{{-- Custom number of lines --}}
<x-ui.skeleton.text :lines="5" />

{{-- With heading --}}
<div>
    <x-ui.skeleton class="h-6 w-64 mb-4" />
    <x-ui.skeleton.text :lines="4" />
</div>
```

### 3. Card Skeletons

```blade
{{-- Full card with image and avatar --}}
<x-ui.skeleton.card />

{{-- Without image --}}
<x-ui.skeleton.card :showImage="false" />

{{-- Without avatar --}}
<x-ui.skeleton.card :showAvatar="false" />

{{-- Minimal card --}}
<x-ui.skeleton.card :showImage="false" :showAvatar="false" />
```

### 4. List Skeletons

```blade
{{-- 3 items (default) --}}
<x-ui.skeleton.list />

{{-- Custom item count --}}
<x-ui.skeleton.list :items="5" />

{{-- Without dividers --}}
<x-ui.skeleton.list :divided="false" />
```

### 5. Avatar Skeletons

```blade
{{-- Different sizes --}}
<x-ui.skeleton.avatar size="xs" />
<x-ui.skeleton.avatar size="sm" />
<x-ui.skeleton.avatar size="default" />
<x-ui.skeleton.avatar size="lg" />
<x-ui.skeleton.avatar size="xl" />

{{-- With text --}}
<x-ui.skeleton.avatar :showText="true" />
<x-ui.skeleton.avatar size="lg" :showText="true" />
```

### 6. Table Skeletons

```blade
{{-- Default 5x4 table --}}
<x-ui.skeleton.table />

{{-- Custom dimensions --}}
<x-ui.skeleton.table :rows="10" :columns="6" />

{{-- Without header --}}
<x-ui.skeleton.table :header="false" />
```

### 7. Image Skeletons

```blade
{{-- Video aspect ratio (16:9) --}}
<x-ui.skeleton.image aspectRatio="video" />

{{-- Square image --}}
<x-ui.skeleton.image aspectRatio="square" />

{{-- Portrait image --}}
<x-ui.skeleton.image aspectRatio="portrait" />

{{-- Custom size --}}
<x-ui.skeleton.image width="300px" height="200px" />
```

### 8. Video Skeletons

```blade
{{-- Default video placeholder --}}
<x-ui.skeleton.video />

{{-- Custom height --}}
<x-ui.skeleton.video height="h-96" />

{{-- Custom width --}}
<x-ui.skeleton.video width="600px" />
```

## Real-World Examples

### Example 1: Product Grid Loading

```blade
<div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-4 gap-6">
    @if($loading)
        @for($i = 0; $i < 8; $i++)
            <x-ui.skeleton.card />
        @endfor
    @else
        @foreach($products as $product)
            <x-product-card :product="$product" />
        @endforeach
    @endif
</div>
```

### Example 2: Blog Post Loading

```blade
<div class="max-w-4xl mx-auto">
    @if($loading)
        {{-- Header --}}
        <div class="mb-8">
            <x-ui.skeleton class="h-8 w-3/4 mb-4" />
            <div class="flex items-center gap-4 mb-6">
                <x-ui.skeleton.avatar :showText="true" />
            </div>
            <x-ui.skeleton.image aspectRatio="video" class="mb-6" />
        </div>

        {{-- Content --}}
        <div class="space-y-4">
            <x-ui.skeleton.text :lines="8" />
            <x-ui.skeleton.text :lines="6" />
            <x-ui.skeleton.text :lines="7" />
        </div>
    @else
        <article>
            <h1>{{ $post->title }}</h1>
            <div class="flex items-center gap-4 mb-6">
                <x-ui.avatar :src="$post->author->avatar" />
                <div>
                    <p class="font-medium">{{ $post->author->name }}</p>
                    <p class="text-sm text-gray-500">{{ $post->published_at->diffForHumans() }}</p>
                </div>
            </div>
            <img src="{{ $post->featured_image }}" alt="{{ $post->title }}" class="mb-6">
            <div class="prose">
                {!! $post->content !!}
            </div>
        </article>
    @endif
</div>
```

### Example 3: User Profile Loading

```blade
<div class="bg-white dark:bg-gray-800 rounded-lg shadow-lg overflow-hidden">
    @if($loading)
        {{-- Cover Image --}}
        <x-ui.skeleton.image height="h-48" class="mb-0" />

        {{-- Profile Section --}}
        <div class="p-6">
            <div class="flex items-start gap-4 -mt-20 mb-6">
                <x-ui.skeleton class="w-24 h-24" rounded="full" />
                <div class="flex-1 mt-16">
                    <x-ui.skeleton class="h-6 w-48 mb-2" />
                    <x-ui.skeleton class="h-4 w-32" />
                </div>
            </div>

            <x-ui.skeleton.text :lines="3" class="mb-6" />

            <div class="grid grid-cols-3 gap-4 mb-6">
                @for($i = 0; $i < 3; $i++)
                    <div class="text-center">
                        <x-ui.skeleton class="h-8 w-16 mb-2 mx-auto" />
                        <x-ui.skeleton class="h-4 w-20 mx-auto" />
                    </div>
                @endfor
            </div>

            <x-ui.skeleton class="h-10 w-full" rounded="lg" />
        </div>
    @else
        {{-- Actual profile content --}}
        <img src="{{ $user->cover_image }}" alt="Cover" class="w-full h-48 object-cover">

        <div class="p-6">
            <div class="flex items-start gap-4 -mt-20 mb-6">
                <x-ui.avatar :src="$user->avatar" size="2xl" class="ring-4 ring-white" />
                <div class="flex-1 mt-16">
                    <h2 class="text-2xl font-bold">{{ $user->name }}</h2>
                    <p class="text-gray-600">{{ $user->email }}</p>
                </div>
            </div>

            <p class="mb-6">{{ $user->bio }}</p>

            <div class="grid grid-cols-3 gap-4 mb-6 text-center">
                <div>
                    <p class="text-2xl font-bold">{{ $user->posts_count }}</p>
                    <p class="text-sm text-gray-600">Posts</p>
                </div>
                <div>
                    <p class="text-2xl font-bold">{{ $user->followers_count }}</p>
                    <p class="text-sm text-gray-600">Followers</p>
                </div>
                <div>
                    <p class="text-2xl font-bold">{{ $user->following_count }}</p>
                    <p class="text-sm text-gray-600">Following</p>
                </div>
            </div>

            <x-ui.button variant="primary" class="w-full">
                Follow
            </x-ui.button>
        </div>
    @endif
</div>
```

### Example 4: Comments Section Loading

```blade
<div class="space-y-4">
    @if($loadingComments)
        @for($i = 0; $i < 5; $i++)
            <div class="flex gap-3">
                <x-ui.skeleton.avatar size="sm" />
                <div class="flex-1">
                    <x-ui.skeleton class="h-4 w-32 mb-2" />
                    <x-ui.skeleton.text :lines="2" />
                </div>
            </div>
        @endfor
    @else
        @foreach($comments as $comment)
            <div class="flex gap-3">
                <x-ui.avatar :src="$comment->user->avatar" size="sm" />
                <div class="flex-1">
                    <p class="font-medium">{{ $comment->user->name }}</p>
                    <p class="text-gray-700 dark:text-gray-300">{{ $comment->content }}</p>
                </div>
            </div>
        @endforeach
    @endif
</div>
```

### Example 5: Dashboard Widgets Loading

```blade
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
    @if($loading)
        @for($i = 0; $i < 6; $i++)
            <div class="bg-white dark:bg-gray-800 rounded-lg p-6 shadow">
                <x-ui.skeleton class="h-6 w-32 mb-4" />
                <x-ui.skeleton class="h-10 w-24 mb-2" />
                <x-ui.skeleton class="h-4 w-full" />
            </div>
        @endfor
    @else
        @foreach($widgets as $widget)
            <div class="bg-white dark:bg-gray-800 rounded-lg p-6 shadow">
                <h3 class="text-lg font-semibold mb-4">{{ $widget->title }}</h3>
                <p class="text-3xl font-bold mb-2">{{ $widget->value }}</p>
                <p class="text-sm text-gray-600">{{ $widget->description }}</p>
            </div>
        @endforeach
    @endif
</div>
```

### Example 6: Data Table Loading

```blade
<div class="bg-white dark:bg-gray-800 rounded-lg shadow overflow-hidden">
    @if($loading)
        <x-ui.skeleton.table :rows="10" :columns="5" />
    @else
        <table class="w-full">
            <thead class="bg-gray-50 dark:bg-gray-700">
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                    <tr>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->role }}</td>
                        <td>{{ $user->status }}</td>
                        <td>...</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
```

### Example 7: Search Results Loading

```blade
<div>
    {{-- Search Input --}}
    <x-ui.form.search-input
        wire:model.live.debounce.300ms="search"
        placeholder="Search..."
    />

    {{-- Results --}}
    <div class="mt-6 space-y-4">
        @if($searching)
            @for($i = 0; $i < 5; $i++)
                <div class="flex gap-4 p-4 bg-white dark:bg-gray-800 rounded-lg">
                    <x-ui.skeleton.image aspectRatio="square" class="w-20 h-20 flex-shrink-0" />
                    <div class="flex-1">
                        <x-ui.skeleton class="h-5 w-3/4 mb-2" />
                        <x-ui.skeleton.text :lines="2" />
                    </div>
                </div>
            @endfor
        @elseif(count($results) > 0)
            @foreach($results as $result)
                <div class="flex gap-4 p-4 bg-white dark:bg-gray-800 rounded-lg">
                    <img src="{{ $result->image }}" alt="{{ $result->title }}" class="w-20 h-20 object-cover rounded">
                    <div class="flex-1">
                        <h3 class="font-semibold mb-1">{{ $result->title }}</h3>
                        <p class="text-sm text-gray-600">{{ $result->description }}</p>
                    </div>
                </div>
            @endforeach
        @else
            <p class="text-center text-gray-500 py-8">No results found</p>
        @endif
    </div>
</div>
```

### Example 8: Infinite Scroll Loading

```blade
<div class="space-y-4" wire:poll.visible>
    @foreach($posts as $post)
        <x-post-card :post="$post" />
    @endforeach

    {{-- Loading more indicator --}}
    @if($loadingMore)
        <div class="space-y-4">
            @for($i = 0; $i < 3; $i++)
                <x-ui.skeleton.card />
            @endfor
        </div>
    @endif
</div>
```

## Livewire Integration

### Basic Loading State

```blade
<div>
    @if($loading)
        <x-ui.skeleton.card />
    @else
        <x-product-card :product="$product" />
    @endif
</div>
```

```php
namespace App\Livewire;

use Livewire\Component;

class ProductDisplay extends Component
{
    public $product;
    public $loading = true;

    public function mount($productId)
    {
        $this->loadProduct($productId);
    }

    public function loadProduct($productId)
    {
        $this->loading = true;

        // Simulate API call
        sleep(1);

        $this->product = Product::find($productId);
        $this->loading = false;
    }

    public function render()
    {
        return view('livewire.product-display');
    }
}
```

### With Wire:Loading Directive

```blade
<div>
    {{-- Show skeleton while loading --}}
    <div wire:loading>
        <x-ui.skeleton.table :rows="10" />
    </div>

    {{-- Show content when loaded --}}
    <div wire:loading.remove>
        <table>
            {{-- Table content --}}
        </table>
    </div>
</div>
```

### Targeted Loading States

```blade
<div>
    <button wire:click="refresh">Refresh</button>

    {{-- Show skeleton only when refresh is loading --}}
    <div wire:loading wire:target="refresh">
        <x-ui.skeleton.list :items="5" />
    </div>

    <div wire:loading.remove wire:target="refresh">
        @foreach($items as $item)
            <x-list-item :item="$item" />
        @endforeach
    </div>
</div>
```

### Progressive Enhancement

```blade
<div x-data="{ loaded: false }" x-init="setTimeout(() => loaded = true, 2000)">
    <div x-show="!loaded">
        <x-ui.skeleton.card />
    </div>

    <div x-show="loaded" x-transition>
        <x-product-card :product="$product" />
    </div>
</div>
```

## Accessibility

### Screen Reader Support

All skeleton components include screen reader text:

```blade
<span class="sr-only">Loading...</span>
```

### ARIA Attributes

```blade
<div role="status" aria-label="Loading">
    {{-- Skeleton content --}}
</div>
```

### Live Regions

For dynamic content updates:

```blade
<div
    role="status"
    aria-live="polite"
    aria-busy="{{ $loading ? 'true' : 'false' }}"
>
    @if($loading)
        <x-ui.skeleton.card />
        <span class="sr-only">Loading content...</span>
    @else
        {{-- Content --}}
        <span class="sr-only">Content loaded</span>
    @endif
</div>
```

## Best Practices

### 1. Match Content Structure

```blade
{{-- Good: Skeleton matches actual content --}}
@if($loading)
    <div class="flex gap-4">
        <x-ui.skeleton.avatar size="lg" />
        <div class="flex-1">
            <x-ui.skeleton class="h-6 w-48 mb-2" />
            <x-ui.skeleton.text :lines="2" />
        </div>
    </div>
@else
    <div class="flex gap-4">
        <x-ui.avatar :src="$user->avatar" size="lg" />
        <div class="flex-1">
            <h3 class="text-xl font-bold">{{ $user->name }}</h3>
            <p class="text-gray-600">{{ $user->bio }}</p>
        </div>
    </div>
@endif
```

### 2. Use Appropriate Variant

```blade
{{-- For text-heavy content --}}
<x-ui.skeleton.text :lines="5" />

{{-- For image galleries --}}
<div class="grid grid-cols-3 gap-4">
    @for($i = 0; $i < 6; $i++)
        <x-ui.skeleton.image aspectRatio="square" />
    @endfor
</div>

{{-- For data tables --}}
<x-ui.skeleton.table :rows="10" :columns="5" />
```

### 3. Limit Animation Duration

```blade
{{-- Disable animation for very long loading times --}}
@if($loadingTime > 5)
    <x-ui.skeleton.card :animated="false" />
@else
    <x-ui.skeleton.card />
@endif
```

### 4. Progressive Loading

```blade
{{-- Load critical content first --}}
<div>
    @if($headerLoaded)
        <header>{{ $header }}</header>
    @else
        <x-ui.skeleton class="h-16 w-full mb-4" />
    @endif

    @if($contentLoaded)
        <main>{{ $content }}</main>
    @else
        <x-ui.skeleton.text :lines="10" />
    @endif
</div>
```

### 5. Mobile Optimization

```blade
{{-- Adjust skeleton count for mobile --}}
<div class="grid grid-cols-1 md:grid-cols-3 gap-4">
    @for($i = 0; $i < ($isMobile ? 3 : 9); $i++)
        <x-ui.skeleton.card />
    @endfor
</div>
```

## Dark Mode Support

All skeleton components include full dark mode support:

```blade
{{-- Automatically adapts to dark mode --}}
<x-ui.skeleton.card />
<x-ui.skeleton.text :lines="5" />
<x-ui.skeleton.table />
```

## Performance Tips

### 1. Reduce Skeleton Count

```blade
{{-- Avoid showing too many skeletons --}}
{{-- Bad: 100 skeleton cards --}}
@for($i = 0; $i < 100; $i++)
    <x-ui.skeleton.card />
@endfor

{{-- Good: Show limited skeletons --}}
@for($i = 0; $i < 6; $i++)
    <x-ui.skeleton.card />
@endfor
<p class="text-center text-gray-500 mt-4">Loading more...</p>
```

### 2. Conditional Rendering

```blade
{{-- Only show skeleton when actually loading --}}
@if($loading)
    <x-ui.skeleton.table />
@else
    <x-data-table :data="$data" />
@endif
```

### 3. Lazy Loading

```blade
{{-- Load skeletons only when visible --}}
<div x-intersect="$wire.loadMore()">
    @if($loadingMore)
        <x-ui.skeleton.list :items="3" />
    @endif
</div>
```

## Testing

### Component Testing

```php
public function test_shows_skeleton_while_loading()
{
    Livewire::test(ProductList::class)
        ->assertSee('Loading...', false) // Screen reader text
        ->call('loadProducts')
        ->assertDontSee('Loading...', false);
}
```

## Related Components

- [Spinner](spinner.md) - Loading spinners
- [Progress](progress.md) - Progress indicators
- [Alert](alert.md) - Status messages

## Resources

- [Flowbite Skeleton Documentation](https://flowbite.com/docs/components/skeleton/)
- [Content Placeholders Best Practices](https://www.nngroup.com/articles/progress-indicators/)
- [Skeleton Screens UX](https://uxdesign.cc/what-you-should-know-about-skeleton-screens-a820c45a571a)

---

**Component Version:** 1.0.0
**Last Updated:** 2025-11-20
**Flowbite Version:** 2.x