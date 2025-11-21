# Carousel / Slider Components

Flowbite uses two different approaches for carousel/slider implementations: **Alpine.js** for simple carousels and **Swiper.js** for complex, feature-rich sliders.

## When to Use Which?

### Alpine.js Carousel
✅ Use for:
- Simple image galleries (2-5 images)
- Post media carousels
- Lightweight implementations
- Minimal JavaScript needed
- Basic navigation (prev/next/dots)

### Swiper.js Carousel
✅ Use for:
- Complex multi-slide layouts
- Multiple items per view
- Touch/swipe support required
- Auto-play functionality
- Responsive breakpoints
- Thumbnail galleries
- Product showcases

---

## 1. Alpine.js Image Carousel

Lightweight carousel using Alpine.js for state management and transitions.

### Basic Implementation

**Location:** Used in `resources/views/components/feed/post-media.blade.php`

```blade
@php
    $images = [
        '/images/pet1.jpg',
        '/images/pet2.jpg',
        '/images/pet3.jpg',
    ];
@endphp

<div x-data="{ currentIndex: 0, total: {{ count($images) }} }" class="relative bg-black overflow-hidden" style="max-height: 600px;">
    {{-- Images --}}
    @foreach ($images as $index => $image)
        <img
            x-show="currentIndex === {{ $index }}"
            src="{{ $image }}"
            alt="Image {{ $index + 1 }}"
            class="w-full h-auto max-h-[600px] object-contain"
        >
    @endforeach

    {{-- Previous Button --}}
    <button
        x-show="currentIndex > 0"
        @click="currentIndex--"
        class="absolute left-2 top-1/2 -translate-y-1/2 bg-white/80 hover:bg-white rounded-full p-2"
    >
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
        </svg>
    </button>

    {{-- Next Button --}}
    <button
        x-show="currentIndex < total - 1"
        @click="currentIndex++"
        class="absolute right-2 top-1/2 -translate-y-1/2 bg-white/80 hover:bg-white rounded-full p-2"
    >
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
        </svg>
    </button>

    {{-- Dots Indicator --}}
    <div class="absolute bottom-4 left-1/2 -translate-x-1/2 flex space-x-2">
        @foreach ($images as $index => $image)
            <button
                @click="currentIndex = {{ $index }}"
                class="w-2 h-2 rounded-full transition-all"
                :class="currentIndex === {{ $index }} ? 'bg-white w-3' : 'bg-white/50'"
            ></button>
        @endforeach
    </div>

    {{-- Image Counter --}}
    <div class="absolute top-4 right-4 bg-black/60 text-white px-3 py-1 rounded-full text-sm">
        <span x-text="currentIndex + 1"></span>/<span x-text="total"></span>
    </div>
</div>
```

### Advanced Alpine.js Carousel with Autoplay

```blade
<div x-data="{
    currentSlide: 0,
    slides: 5,
    autoplay: true,
    interval: null
}"
x-init="
    if (autoplay) {
        interval = setInterval(() => {
            currentSlide = (currentSlide + 1) % slides
        }, 3000)
    }
"
@mouseenter="clearInterval(interval)"
@mouseleave="if (autoplay) interval = setInterval(() => { currentSlide = (currentSlide + 1) % slides }, 3000)"
class="relative overflow-hidden rounded-lg">
    {{-- Slides --}}
    <div class="relative h-96">
        <div x-show="currentSlide === 0" class="absolute inset-0">
            <img src="/images/product1.jpg" class="w-full h-full object-cover" alt="Product 1">
        </div>
        <div x-show="currentSlide === 1" class="absolute inset-0">
            <img src="/images/product2.jpg" class="w-full h-full object-cover" alt="Product 2">
        </div>
        <!-- More slides... -->
    </div>

    {{-- Navigation --}}
    <button
        @click="currentSlide = currentSlide === 0 ? slides - 1 : currentSlide - 1"
        class="absolute left-4 top-1/2 -translate-y-1/2 bg-white/90 hover:bg-white text-gray-800 rounded-full p-3 shadow-lg transition"
    >
        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
        </svg>
    </button>

    <button
        @click="currentSlide = (currentSlide + 1) % slides"
        class="absolute right-4 top-1/2 -translate-y-1/2 bg-white/90 hover:bg-white text-gray-800 rounded-full p-3 shadow-lg transition"
    >
        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
        </svg>
    </button>

    {{-- Indicators --}}
    <div class="absolute bottom-4 left-1/2 -translate-x-1/2 flex space-x-2">
        <template x-for="i in slides" :key="i">
            <button
                @click="currentSlide = i - 1"
                :class="currentSlide === i - 1 ? 'bg-white w-8' : 'bg-white/60 w-2'"
                class="h-2 rounded-full transition-all duration-300"
            ></button>
        </template>
    </div>
</div>
```

### Livewire Integration with Alpine.js

```blade
{{-- Livewire Component View --}}
<div x-data="{ currentSlide: @entangle('currentSlide') }" class="relative">
    <div class="overflow-hidden rounded-lg">
        @foreach($images as $index => $image)
            <div
                x-show="currentSlide === {{ $index }}"
                x-transition:enter="transition ease-out duration-300"
                x-transition:enter-start="opacity-0 transform translate-x-full"
                x-transition:enter-end="opacity-100 transform translate-x-0"
                x-transition:leave="transition ease-in duration-300"
                x-transition:leave-start="opacity-100 transform translate-x-0"
                x-transition:leave-end="opacity-0 transform -translate-x-full"
                class="w-full"
            >
                <img src="{{ $image->url }}" alt="{{ $image->title }}" class="w-full h-96 object-cover">
                <div class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-black/70 to-transparent p-6">
                    <h3 class="text-white text-2xl font-bold mb-2">{{ $image->title }}</h3>
                    <p class="text-white/90 text-sm">{{ $image->description }}</p>
                </div>
            </div>
        @endforeach
    </div>

    {{-- Controls --}}
    <button
        wire:click="previousSlide"
        class="absolute left-4 top-1/2 -translate-y-1/2 bg-white/80 hover:bg-white p-3 rounded-full"
    >
        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
        </svg>
    </button>
    <button
        wire:click="nextSlide"
        class="absolute right-4 top-1/2 -translate-y-1/2 bg-white/80 hover:bg-white p-3 rounded-full"
    >
        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
        </svg>
    </button>

    {{-- Indicators --}}
    <div class="absolute bottom-4 left-1/2 -translate-x-1/2 flex space-x-2">
        @foreach($images as $index => $image)
            <button
                wire:click="goToSlide({{ $index }})"
                class="h-2 rounded-full transition-all {{ $currentSlide === $index ? 'bg-white w-8' : 'bg-white/50 w-2' }}"
            ></button>
        @endforeach
    </div>
</div>
```

```php
// Livewire Component Class
namespace App\Livewire;

use Livewire\Component;

class ImageCarousel extends Component
{
    public $images;
    public $currentSlide = 0;

    public function mount($images)
    {
        $this->images = $images;
    }

    public function nextSlide()
    {
        $this->currentSlide = ($this->currentSlide + 1) % count($this->images);
    }

    public function previousSlide()
    {
        $this->currentSlide = $this->currentSlide === 0
            ? count($this->images) - 1
            : $this->currentSlide - 1;
    }

    public function goToSlide($index)
    {
        $this->currentSlide = $index;
    }

    public function render()
    {
        return view('livewire.image-carousel');
    }
}
```

---

## 2. Swiper.js Carousel

Feature-rich carousel library for complex implementations.

### Installation

**CDN Method (Recommended):**

```blade
{{-- In your layout or component --}}
@push('styles')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
@endpush

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
@endpush
```

### Basic Swiper Implementation

```blade
<div class="swiper mySwiper">
    <div class="swiper-wrapper">
        <div class="swiper-slide">
            <img src="/images/slide1.jpg" alt="Slide 1" class="w-full h-96 object-cover">
        </div>
        <div class="swiper-slide">
            <img src="/images/slide2.jpg" alt="Slide 2" class="w-full h-96 object-cover">
        </div>
        <div class="swiper-slide">
            <img src="/images/slide3.jpg" alt="Slide 3" class="w-full h-96 object-cover">
        </div>
    </div>

    {{-- Pagination --}}
    <div class="swiper-pagination"></div>

    {{-- Navigation --}}
    <div class="swiper-button-prev"></div>
    <div class="swiper-button-next"></div>
</div>

@push('scripts')
<script>
    const swiper = new Swiper('.mySwiper', {
        slidesPerView: 1,
        spaceBetween: 30,
        loop: true,
        pagination: {
            el: '.swiper-pagination',
            clickable: true,
        },
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
    });
</script>
@endpush
```

### Service Plans Carousel (Real-World Example)

**Location:** `resources/views/livewire/services/show.blade.php` (lines 185-220)

```blade
{{-- Mobile View - Swiper Slider --}}
<div class="md:hidden relative">
    <div class="swiper planSwiper">
        <div class="swiper-wrapper">
            @foreach($service->activePlans as $plan)
                <div class="swiper-slide">
                    <div class="border-2 border-gray-200 rounded-lg p-5 bg-white h-full">
                        <h3 class="text-lg font-bold text-gray-900 mb-2">{{ $plan->name }}</h3>
                        <div class="text-2xl font-bold text-blue-600 mb-3">{{ $plan->formatted_price }}</div>
                        <p class="text-xs text-gray-600 mb-3">{{ $plan->full_billing_text }}</p>

                        @if($plan->trial_days > 0)
                            <p class="text-xs text-green-600 mb-3 font-medium">
                                {{ $plan->trial_days }} days free trial
                            </p>
                        @endif

                        @if($plan->features)
                            <ul class="space-y-1.5 mb-4">
                                @foreach($plan->features as $feature)
                                    <li class="flex items-start text-xs text-gray-700">
                                        <svg class="w-4 h-4 text-green-500 mr-2 flex-shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                                        </svg>
                                        {{ $feature }}
                                    </li>
                                @endforeach
                            </ul>
                        @endif

                        <a
                            href="{{ route('services.checkout', ['service' => $service->id, 'planId' => $plan->id]) }}"
                            wire:navigate
                            class="block w-full py-2.5 px-4 bg-blue-600 text-white text-sm font-semibold rounded-lg hover:bg-blue-700 transition text-center"
                        >
                            Choose Plan
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="swiper-pagination !relative !bottom-0 mt-4"></div>
    </div>
</div>

@push('styles')
<style>
    .planSwiper {
        padding: 4px;
    }
    .planSwiper .swiper-pagination-bullet {
        width: 8px;
        height: 8px;
        background: #3B82F6;
    }
</style>
@endpush

@push('scripts')
<script>
    document.addEventListener('livewire:navigated', () => {
        setTimeout(() => {
            if (document.querySelector('.planSwiper')) {
                new Swiper('.planSwiper', {
                    slidesPerView: 1.1,
                    spaceBetween: 12,
                    centeredSlides: false,
                    pagination: {
                        el: '.swiper-pagination',
                        clickable: true,
                    },
                });
            }
        }, 100);
    });
</script>
@endpush
```

### Multi-Slide Responsive Carousel

```blade
<div class="swiper productSwiper">
    <div class="swiper-wrapper">
        @foreach($products as $product)
            <div class="swiper-slide">
                <div class="bg-white rounded-lg shadow-md overflow-hidden">
                    <img src="{{ $product->image }}" alt="{{ $product->name }}" class="w-full h-48 object-cover">
                    <div class="p-4">
                        <h3 class="font-bold text-gray-900 mb-2">{{ $product->name }}</h3>
                        <p class="text-sm text-gray-600 mb-3">{{ $product->description }}</p>
                        <div class="flex items-center justify-between">
                            <span class="text-xl font-bold text-blue-600">{{ $product->price }} ₺</span>
                            <button class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">
                                Add to Cart
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <div class="swiper-pagination"></div>
    <div class="swiper-button-prev"></div>
    <div class="swiper-button-next"></div>
</div>

@push('scripts')
<script>
    new Swiper('.productSwiper', {
        slidesPerView: 1,
        spaceBetween: 20,
        loop: true,
        autoplay: {
            delay: 3000,
            disableOnInteraction: false,
        },
        pagination: {
            el: '.swiper-pagination',
            clickable: true,
        },
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
        breakpoints: {
            640: {
                slidesPerView: 2,
                spaceBetween: 20,
            },
            768: {
                slidesPerView: 3,
                spaceBetween: 30,
            },
            1024: {
                slidesPerView: 4,
                spaceBetween: 30,
            },
        },
    });
</script>
@endpush
```

### Thumbnail Gallery

```blade
{{-- Main Slider --}}
<div class="swiper mainSlider mb-4">
    <div class="swiper-wrapper">
        @foreach($images as $image)
            <div class="swiper-slide">
                <img src="{{ $image->url }}" alt="{{ $image->alt }}" class="w-full h-96 object-cover rounded-lg">
            </div>
        @endforeach
    </div>
</div>

{{-- Thumbnail Slider --}}
<div class="swiper thumbSlider">
    <div class="swiper-wrapper">
        @foreach($images as $image)
            <div class="swiper-slide cursor-pointer">
                <img src="{{ $image->thumbnail }}" alt="{{ $image->alt }}" class="w-full h-24 object-cover rounded-lg">
            </div>
        @endforeach
    </div>
</div>

@push('scripts')
<script>
    const thumbSlider = new Swiper('.thumbSlider', {
        slidesPerView: 4,
        spaceBetween: 10,
        freeMode: true,
        watchSlidesProgress: true,
    });

    const mainSlider = new Swiper('.mainSlider', {
        spaceBetween: 10,
        thumbs: {
            swiper: thumbSlider,
        },
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
    });
</script>
@endpush
```

---

## Best Practices

### 1. Performance

**Alpine.js:**
- Use `x-show` for simple toggles (keeps DOM)
- Use `x-if` for conditional rendering (better performance)
- Limit number of slides for optimal performance

**Swiper.js:**
- Enable lazy loading for images
- Use `watchSlidesProgress` for thumbnails
- Destroy instance when component unmounts

### 2. Responsive Design

- Mobile: Show 1-2 slides
- Tablet: Show 2-3 slides
- Desktop: Show 3-4 slides
- Use Swiper's `breakpoints` configuration

### 3. Accessibility

- Add `aria-label` to navigation buttons
- Use `role="region"` for carousel container
- Support keyboard navigation
- Provide pause button for autoplay

### 4. Touch/Swipe Support

- Swiper.js provides native touch support
- For Alpine.js, consider adding touch event handlers
- Test on actual mobile devices

### 5. Livewire Integration

- Use `livewire:navigated` event to initialize Swiper
- Add timeout to ensure DOM is ready
- Destroy Swiper on component destroy

```javascript
document.addEventListener('livewire:navigated', () => {
    setTimeout(() => {
        if (document.querySelector('.mySwiper')) {
            new Swiper('.mySwiper', {
                // configuration
            });
        }
    }, 100);
});
```

---

## Common Configuration Options

### Swiper.js Options

```javascript
{
    // Basic
    slidesPerView: 1,
    spaceBetween: 30,
    loop: true,
    speed: 800,

    // Autoplay
    autoplay: {
        delay: 3000,
        disableOnInteraction: false,
    },

    // Navigation
    navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
    },

    // Pagination
    pagination: {
        el: '.swiper-pagination',
        clickable: true,
        type: 'bullets', // 'bullets', 'fraction', 'progressbar'
    },

    // Effects
    effect: 'slide', // 'slide', 'fade', 'cube', 'flip', 'cards'

    // Responsive
    breakpoints: {
        640: {
            slidesPerView: 2,
        },
        1024: {
            slidesPerView: 4,
        },
    },
}
```

---

## Notes

- Alpine.js is lighter weight (better for simple carousels)
- Swiper.js has more features and better touch support
- Always test on mobile devices
- Consider lazy loading for images
- Use appropriate transitions for smooth UX
- Provide visual feedback for loading states
- Ensure navigation buttons are large enough for touch (min 44x44px)
- Test with different content lengths
- Consider using skeleton loaders while images load
