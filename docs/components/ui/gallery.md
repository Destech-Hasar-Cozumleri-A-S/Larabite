# Gallery Components

Image gallery components. Responsive grid layouts, masonry grids, featured image galleries ve hover effects ile görsel koleksiyonlarınızı sergileyin.

## 📦 Available Components

- **Gallery** - Base responsive grid gallery
- **Gallery Item** - Individual image item with hover effects
- **Gallery Masonry** - Pinterest-style masonry layout
- **Gallery Featured** - Featured image with thumbnail grid
- **Gallery Quad** - 2x2 compact gallery
- **Gallery Filter** - Category filter buttons

---

## Base Gallery Component

Base responsive grid gallery container.

**Location:** `resources/views/components/ui/gallery.blade.php`

### Features

- Responsive column layouts (2-5 columns)
- Configurable gap spacing
- Mobile-first design
- Dark mode compatible
- Easy to customize

### Usage

```blade
{{-- Basic 3-Column Gallery --}}
<x-ui::gallery>
    <x-ui::gallery.item src="/images/photo1.jpg" alt="Photo 1" />
    <x-ui::gallery.item src="/images/photo2.jpg" alt="Photo 2" />
    <x-ui::gallery.item src="/images/photo3.jpg" alt="Photo 3" />
    <x-ui::gallery.item src="/images/photo4.jpg" alt="Photo 4" />
    <x-ui::gallery.item src="/images/photo5.jpg" alt="Photo 5" />
    <x-ui::gallery.item src="/images/photo6.jpg" alt="Photo 6" />
</x-ui::gallery>

{{-- 4-Column Gallery --}}
<x-ui::gallery :columns="4">
    {{-- Images --}}
</x-ui::gallery>

{{-- With Custom Gap --}}
<x-ui::gallery :columns="3" :gap="6">
    {{-- Images --}}
</x-ui::gallery>
```

### Props

| Prop | Type | Default | Options | Description |
|------|------|---------|---------|-------------|
| `columns` | int | 3 | 2, 3, 4, 5 | Number of columns |
| `gap` | int | 4 | 2, 4, 6, 8 | Gap spacing |

---

## Gallery Item Component

Individual gallery image with hover effects and optional lightbox.

**Location:** `resources/views/components/ui/gallery/item.blade.php`

### Features

- Hover zoom effect
- Lightbox integration support
- Optional captions
- Link support
- Aspect ratio control
- Overlay effects

### Usage

```blade
{{-- Basic Image --}}
<x-ui::gallery.item
    src="/images/photo.jpg"
    alt="Beautiful landscape"
/>

{{-- With Caption --}}
<x-ui::gallery.item
    src="/images/photo.jpg"
    alt="Beautiful landscape"
    caption="Sunset in the mountains"
/>

{{-- With Link --}}
<x-ui::gallery.item
    src="/images/photo.jpg"
    alt="Product photo"
    href="/products/123"
/>

{{-- With Lightbox --}}
<x-ui::gallery.item
    src="/images/photo.jpg"
    alt="Gallery photo"
    :lightbox="true"
/>

{{-- With Aspect Ratio --}}
<x-ui::gallery.item
    src="/images/photo.jpg"
    alt="Square photo"
    aspectRatio="square"
/>
```

### Props

| Prop | Type | Default | Options | Description |
|------|------|---------|---------|-------------|
| `src` | string | null | - | Image source URL |
| `alt` | string | '' | - | Alt text |
| `caption` | string | null | - | Image caption |
| `href` | string | null | - | Link URL |
| `lightbox` | bool | false | - | Enable lightbox |
| `aspectRatio` | string | null | auto, square, video, portrait | Aspect ratio |

---

## Gallery Masonry Component

Pinterest-style masonry grid layout.

**Location:** `resources/views/components/ui/gallery/masonry.blade.php`

### Features

- Variable height columns
- Responsive columns
- Configurable gap
- Auto-flow layout

### Usage

```blade
<x-ui::gallery.masonry :columns="4" :gap="4">
    <x-slot:column1>
        <x-ui::gallery.item src="/images/1.jpg" alt="Image 1" />
        <x-ui::gallery.item src="/images/5.jpg" alt="Image 5" />
        <x-ui::gallery.item src="/images/9.jpg" alt="Image 9" />
    </x-slot:column1>

    <x-slot:column2>
        <x-ui::gallery.item src="/images/2.jpg" alt="Image 2" />
        <x-ui::gallery.item src="/images/6.jpg" alt="Image 6" />
        <x-ui::gallery.item src="/images/10.jpg" alt="Image 10" />
    </x-slot:column2>

    <x-slot:column3>
        <x-ui::gallery.item src="/images/3.jpg" alt="Image 3" />
        <x-ui::gallery.item src="/images/7.jpg" alt="Image 7" />
        <x-ui::gallery.item src="/images/11.jpg" alt="Image 11" />
    </x-slot:column3>

    <x-slot:column4>
        <x-ui::gallery.item src="/images/4.jpg" alt="Image 4" />
        <x-ui::gallery.item src="/images/8.jpg" alt="Image 8" />
        <x-ui::gallery.item src="/images/12.jpg" alt="Image 12" />
    </x-slot:column4>
</x-ui::gallery.masonry>
```

### Props

| Prop | Type | Default | Options | Description |
|------|------|---------|---------|-------------|
| `columns` | int | 4 | 2, 3, 4 | Number of columns |
| `gap` | int | 4 | 2, 4, 6, 8 | Gap spacing |

---

## Gallery Featured Component

Featured image with thumbnail grid below.

**Location:** `resources/views/components/ui/gallery/featured.blade.php`

### Features

- Large featured image
- Thumbnail grid
- Configurable thumbnail columns
- Perfect for product galleries

### Usage

```blade
{{-- With Props --}}
<x-ui::gallery.featured
    featuredSrc="/images/featured.jpg"
    featuredAlt="Featured product"
    :thumbnailColumns="5"
>
    <x-ui::gallery.item src="/images/thumb1.jpg" alt="View 1" />
    <x-ui::gallery.item src="/images/thumb2.jpg" alt="View 2" />
    <x-ui::gallery.item src="/images/thumb3.jpg" alt="View 3" />
    <x-ui::gallery.item src="/images/thumb4.jpg" alt="View 4" />
    <x-ui::gallery.item src="/images/thumb5.jpg" alt="View 5" />
</x-ui::gallery.featured>

{{-- With Named Slots --}}
<x-ui::gallery.featured>
    <x-slot:featured>
        <img src="/images/hero.jpg" class="w-full h-auto rounded-lg">
    </x-slot:featured>

    <x-slot:thumbnails>
        <x-ui::gallery.item src="/images/thumb1.jpg" alt="Thumbnail 1" />
        <x-ui::gallery.item src="/images/thumb2.jpg" alt="Thumbnail 2" />
        <x-ui::gallery.item src="/images/thumb3.jpg" alt="Thumbnail 3" />
        <x-ui::gallery.item src="/images/thumb4.jpg" alt="Thumbnail 4" />
        <x-ui::gallery.item src="/images/thumb5.jpg" alt="Thumbnail 5" />
    </x-slot:thumbnails>
</x-ui::gallery.featured>
```

### Props

| Prop | Type | Default | Options | Description |
|------|------|---------|---------|-------------|
| `featuredSrc` | string | null | - | Featured image URL |
| `featuredAlt` | string | '' | - | Featured image alt |
| `thumbnailColumns` | int | 5 | 4, 5, 6 | Thumbnail columns |
| `gap` | int | 4 | 2, 4, 6 | Gap spacing |

---

## Gallery Quad Component

Compact 2x2 grid layout.

**Location:** `resources/views/components/ui/gallery/quad.blade.php`

### Features

- Fixed 2x2 grid
- Compact spacing
- Perfect for social media style

### Usage

```blade
<x-ui::gallery.quad>
    <x-ui::gallery.item src="/images/1.jpg" alt="Image 1" />
    <x-ui::gallery.item src="/images/2.jpg" alt="Image 2" />
    <x-ui::gallery.item src="/images/3.jpg" alt="Image 3" />
    <x-ui::gallery.item src="/images/4.jpg" alt="Image 4" />
</x-ui::gallery.quad>

{{-- With Custom Gap --}}
<x-ui::gallery.quad :gap="4">
    {{-- 4 Images --}}
</x-ui::gallery.quad>
```

### Props

| Prop | Type | Default | Options | Description |
|------|------|---------|---------|-------------|
| `gap` | int | 2 | 1, 2, 4 | Gap spacing |

---

## Gallery Filter Component

Category filter buttons for gallery.

**Location:** `resources/views/components/ui/gallery/filter.blade.php`

### Features

- Active/inactive states
- Category data attribute
- Hover effects
- Dark mode support

### Usage

```blade
<div class="flex flex-wrap gap-2 mb-6">
    <x-ui::gallery.filter :active="true">
        All
    </x-ui::gallery.filter>

    <x-ui::gallery.filter category="nature">
        Nature
    </x-ui::gallery.filter>

    <x-ui::gallery.filter category="architecture">
        Architecture
    </x-ui::gallery.filter>

    <x-ui::gallery.filter category="people">
        People
    </x-ui::gallery.filter>
</div>
```

### Props

| Prop | Type | Default | Options | Description |
|------|------|---------|---------|-------------|
| `active` | bool | false | - | Active state |
| `category` | string | null | - | Category identifier |

---

## Real-World Examples

### Product Gallery

```blade
<div class="max-w-6xl mx-auto p-6">
    <x-ui::gallery.featured
        featuredSrc="{{ $product->image }}"
        featuredAlt="{{ $product->name }}"
        :thumbnailColumns="5"
    >
        @foreach($product->images as $image)
            <x-ui::gallery.item
                src="{{ $image->url }}"
                alt="{{ $product->name }} - View {{ $loop->iteration }}"
                href="{{ $image->url }}"
                :lightbox="true"
            />
        @endforeach
    </x-ui::gallery.featured>
</div>
```

### Portfolio Gallery with Filters

```blade
<div x-data="{
    activeFilter: 'all',
    images: {{ $images->toJson() }}
}">
    {{-- Filters --}}
    <div class="flex flex-wrap gap-2 mb-8">
        <x-ui::gallery.filter
            x-bind:class="{ 'active': activeFilter === 'all' }"
            @click="activeFilter = 'all'"
        >
            All Projects
        </x-ui::gallery.filter>

        <x-ui::gallery.filter
            category="web"
            @click="activeFilter = 'web'"
        >
            Web Design
        </x-ui::gallery.filter>

        <x-ui::gallery.filter
            category="mobile"
            @click="activeFilter = 'mobile'"
        >
            Mobile Apps
        </x-ui::gallery.filter>

        <x-ui::gallery.filter
            category="branding"
            @click="activeFilter = 'branding'"
        >
            Branding
        </x-ui::gallery.filter>
    </div>

    {{-- Gallery --}}
    <x-ui::gallery :columns="3" :gap="6">
        @foreach($images as $image)
            <div x-show="activeFilter === 'all' || activeFilter === '{{ $image->category }}'">
                <x-ui::gallery.item
                    src="{{ $image->url }}"
                    alt="{{ $image->title }}"
                    caption="{{ $image->title }}"
                    href="{{ route('portfolio.show', $image) }}"
                />
            </div>
        @endforeach
    </x-ui::gallery>
</div>
```

### Pet Photo Gallery

```blade
<div class="container mx-auto py-8">
    <h2 class="text-2xl font-bold mb-6">{{ $pet->name }}'s Photos</h2>

    <x-ui::gallery :columns="4" :gap="4">
        @foreach($pet->photos as $photo)
            <x-ui::gallery.item
                src="{{ $photo->url }}"
                alt="{{ $pet->name }} - {{ $photo->created_at->format('M Y') }}"
                caption="{{ $photo->created_at->diffForHumans() }}"
                :lightbox="true"
            />
        @endforeach
    </x-ui::gallery>
</div>
```

### Masonry Pinterest-Style Gallery

```blade
<x-ui::gallery.masonry :columns="4" :gap="4">
    <x-slot:column1>
        <x-ui::gallery.item src="/images/nature/1.jpg" alt="Forest" :lightbox="true" />
        <x-ui::gallery.item src="/images/nature/5.jpg" alt="Mountain" :lightbox="true" />
        <x-ui::gallery.item src="/images/nature/9.jpg" alt="River" :lightbox="true" />
    </x-slot:column1>

    <x-slot:column2>
        <x-ui::gallery.item src="/images/nature/2.jpg" alt="Sunset" :lightbox="true" />
        <x-ui::gallery.item src="/images/nature/6.jpg" alt="Ocean" :lightbox="true" />
        <x-ui::gallery.item src="/images/nature/10.jpg" alt="Desert" :lightbox="true" />
    </x-slot:column2>

    <x-slot:column3>
        <x-ui::gallery.item src="/images/nature/3.jpg" alt="Flowers" :lightbox="true" />
        <x-ui::gallery.item src="/images/nature/7.jpg" alt="Snow" :lightbox="true" />
        <x-ui::gallery.item src="/images/nature/11.jpg" alt="Autumn" :lightbox="true" />
    </x-slot:column3>

    <x-slot:column4>
        <x-ui::gallery.item src="/images/nature/4.jpg" alt="Lake" :lightbox="true" />
        <x-ui::gallery.item src="/images/nature/8.jpg" alt="Waterfall" :lightbox="true" />
        <x-ui::gallery.item src="/images/nature/12.jpg" alt="Clouds" :lightbox="true" />
    </x-slot:column4>
</x-ui::gallery.masonry>
```

### Service Showcase Gallery

```blade
<div class="space-y-8">
    @foreach($services as $service)
        <div class="bg-white dark:bg-gray-800 rounded-lg p-6 shadow">
            <h3 class="text-xl font-semibold mb-4">{{ $service->name }}</h3>

            <x-ui::gallery.quad :gap="2">
                @foreach($service->images->take(4) as $image)
                    <x-ui::gallery.item
                        src="{{ $image->url }}"
                        alt="{{ $service->name }}"
                        aspectRatio="square"
                        href="{{ route('services.show', $service) }}"
                    />
                @endforeach
            </x-ui::gallery.quad>
        </div>
    @endforeach
</div>
```

### User Feed with Image Grid

```blade
@foreach($posts as $post)
    <div class="bg-white dark:bg-gray-800 rounded-lg p-4 mb-4 shadow">
        {{-- Post Header --}}
        <div class="flex items-center mb-3">
            <x-ui::avatar :src="$post->user->avatar" size="sm" />
            <span class="ml-2 font-semibold">{{ $post->user->name }}</span>
        </div>

        {{-- Post Content --}}
        <p class="mb-3">{{ $post->content }}</p>

        {{-- Image Gallery --}}
        @if($post->images->count() === 1)
            <img src="{{ $post->images->first()->url }}" class="w-full rounded-lg">
        @elseif($post->images->count() <= 4)
            <x-ui::gallery.quad>
                @foreach($post->images as $image)
                    <x-ui::gallery.item
                        src="{{ $image->url }}"
                        alt="Post image"
                        aspectRatio="square"
                        :lightbox="true"
                    />
                @endforeach
            </x-ui::gallery.quad>
        @else
            <x-ui::gallery :columns="3" :gap="2">
                @foreach($post->images as $image)
                    <x-ui::gallery.item
                        src="{{ $image->url }}"
                        alt="Post image"
                        :lightbox="true"
                    />
                @endforeach
            </x-ui::gallery>
        @endif
    </div>
@endforeach
```

---

## Lightbox Integration

### Using GLightbox

Install GLightbox:

```bash
npm install glightbox
```

Initialize in your JavaScript:

```javascript
import GLightbox from 'glightbox';
import 'glightbox/dist/css/glightbox.css';

// Initialize
const lightbox = GLightbox({
    selector: '[data-lightbox="gallery"]'
});
```

Usage:

```blade
<x-ui::gallery :columns="3">
    <x-ui::gallery.item
        src="/images/photo1.jpg"
        alt="Photo 1"
        :lightbox="true"
    />
</x-ui::gallery>
```

### Using Lightbox2

Install Lightbox2:

```bash
npm install lightbox2
```

Usage:

```blade
<x-ui::gallery :columns="3">
    <a href="/images/large1.jpg" data-lightbox="gallery-set" data-title="Image 1">
        <x-ui::gallery.item src="/images/thumb1.jpg" alt="Photo 1" />
    </a>
</x-ui::gallery>
```

---

## Best Practices

### 1. Optimize Images

```blade
{{-- Use optimized images --}}
<x-ui::gallery.item
    src="/images/optimized/photo.webp"
    alt="Optimized photo"
/>

{{-- Use srcset for responsive images --}}
<img
    src="/images/photo-800.jpg"
    srcset="/images/photo-400.jpg 400w,
            /images/photo-800.jpg 800w,
            /images/photo-1200.jpg 1200w"
    sizes="(max-width: 768px) 100vw, 33vw"
    alt="Responsive photo"
    class="h-auto max-w-full rounded-lg"
>
```

### 2. Lazy Loading

```blade
<x-ui::gallery :columns="3">
    <img
        src="/images/photo.jpg"
        alt="Photo"
        loading="lazy"
        class="h-auto max-w-full rounded-lg"
    >
</x-ui::gallery>
```

### 3. Accessibility

```blade
{{-- Always provide alt text --}}
<x-ui::gallery.item
    src="/images/sunset.jpg"
    alt="Beautiful sunset over the ocean with orange and pink skies"
/>

{{-- Use figure and figcaption for context --}}
<figure>
    <x-ui::gallery.item src="/images/photo.jpg" alt="Product photo" />
    <figcaption class="text-sm text-gray-600 mt-2">
        Limited edition product
    </figcaption>
</figure>
```

### 4. Aspect Ratios

```blade
{{-- Maintain consistent aspect ratios --}}
<x-ui::gallery :columns="3">
    <x-ui::gallery.item src="/photo1.jpg" alt="Photo 1" aspectRatio="square" />
    <x-ui::gallery.item src="/photo2.jpg" alt="Photo 2" aspectRatio="square" />
    <x-ui::gallery.item src="/photo3.jpg" alt="Photo 3" aspectRatio="square" />
</x-ui::gallery>
```

### 5. Loading States

```blade
<div x-data="{ loaded: false }">
    <x-ui::gallery :columns="3">
        <div class="relative">
            <div x-show="!loaded" class="absolute inset-0 bg-gray-200 animate-pulse rounded-lg"></div>
            <img
                src="/images/photo.jpg"
                alt="Photo"
                @load="loaded = true"
                class="h-auto max-w-full rounded-lg"
            >
        </div>
    </x-ui::gallery>
</div>
```

---

## With Livewire

### Dynamic Gallery with Upload

```blade
<div>
    {{-- Upload Form --}}
    <div class="mb-6">
        <input type="file" wire:model="photos" multiple>
        @error('photos.*') <span class="text-red-500">{{ $message }}</span> @enderror
    </div>

    {{-- Gallery --}}
    <x-ui::gallery :columns="4" :gap="4">
        @foreach($this->photos as $photo)
            <div class="relative">
                <x-ui::gallery.item
                    src="{{ $photo->url }}"
                    alt="{{ $photo->name }}"
                />

                {{-- Delete Button --}}
                <button
                    wire:click="deletePhoto({{ $photo->id }})"
                    class="absolute top-2 right-2 bg-red-600 text-white p-2 rounded-full hover:bg-red-700"
                >
                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"/>
                    </svg>
                </button>
            </div>
        @endforeach
    </x-ui::gallery>
</div>
```

---

## Related Components

- [Card](card.md) - Container components
- [Modal](../modal/README.md) - Modal dialogs
- [Carousel](../carousel/README.md) - Image sliders

---

## Tips & Tricks

### Infinite Scroll Gallery

```blade
<div
    x-data="{ page: 1, loading: false }"
    x-intersect:enter="
        if (!loading) {
            loading = true;
            $wire.loadMore().then(() => loading = false);
        }
    "
>
    <x-ui::gallery :columns="3">
        @foreach($images as $image)
            <x-ui::gallery.item src="{{ $image->url }}" alt="{{ $image->alt }}" />
        @endforeach
    </x-ui::gallery>

    <div x-show="loading" class="text-center py-4">
        <x-ui::spinner />
    </div>
</div>
```

### Image Upload Preview

```blade
<div x-data="{ preview: null }">
    <input
        type="file"
        accept="image/*"
        @change="preview = URL.createObjectURL($event.target.files[0])"
    >

    <div x-show="preview" class="mt-4">
        <img :src="preview" class="max-w-md rounded-lg">
    </div>
</div>
```

### Drag and Drop Reorder

```blade
<div
    x-data="{
        items: {{ $images->toJson() }},
        draggedItem: null
    }"
>
    <x-ui::gallery :columns="3">
        <template x-for="(item, index) in items" :key="item.id">
            <div
                draggable="true"
                @dragstart="draggedItem = index"
                @drop="
                    const temp = items[index];
                    items[index] = items[draggedItem];
                    items[draggedItem] = temp;
                "
                @dragover.prevent
            >
                <x-ui::gallery.item
                    :src="item.url"
                    :alt="item.alt"
                />
            </div>
        </template>
    </x-ui::gallery>
</div>
```