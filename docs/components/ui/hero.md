# Hero (Jumbotron) Components

Hero/Jumbotron bileşenleri. Landing page'ler ve section başlıkları için büyük, dikkat çekici başlıklar, açıklamalar ve CTA butonları.

## 📦 Available Components

- **Hero** - Base hero/jumbotron component
- **Hero Actions** - CTA button container
- **Hero Split** - Two-column layout with media
- **Hero Card Grid** - Hero with feature cards below
- **Hero Search** - Hero with search form
- **Hero Newsletter** - Hero with newsletter signup

---

## Base Hero Component

Temel hero/jumbotron container component.

**Location:** `resources/views/components/ui/hero.blade.php`

### Features

- Flexible alignment (left, center)
- 4 size variants
- Background options (image, gradient, pattern)
- Optional overlay
- Responsive typography
- Dark mode support

### Usage

```blade
{{-- Simple Hero --}}
<x-ui.hero
    title="Welcome to Flowbite"
    description="The best platform for pet care and adoption"
>
    <x-ui.hero.actions>
        <x-ui.button variant="primary" size="lg">Get Started</x-ui.button>
        <x-ui.button variant="secondary" size="lg" :outline="true">Learn More</x-ui.button>
    </x-ui.hero.actions>
</x-ui.hero>

{{-- With Subtitle --}}
<x-ui.hero
    subtitle="New in 2024"
    title="Find Your Perfect Pet"
    description="Connect with thousands of pets looking for a loving home"
/>

{{-- Left Aligned --}}
<x-ui.hero
    title="Start Your Journey"
    description="Join our community today"
    align="left"
/>

{{-- Large Size --}}
<x-ui.hero
    title="Big Impact"
    description="Make a difference"
    size="lg"
/>
```

### Background Variations

```blade
{{-- With Background Image --}}
<x-ui.hero
    title="Explore the World"
    description="Adventure awaits"
    background="image"
    backgroundImage="/images/hero-bg.jpg"
    :overlay="true"
>
    <x-ui.hero.actions>
        <x-ui.button variant="primary">Start Exploring</x-ui.button>
    </x-ui.hero.actions>
</x-ui.hero>

{{-- With Gradient --}}
<x-ui.hero
    title="Modern Design"
    description="Beautiful and functional"
    background="gradient"
/>

{{-- With Pattern --}}
<x-ui.hero
    title="Clean Layout"
    description="Minimalist approach"
    background="pattern"
/>
```

### Props

| Prop | Type | Default | Options | Description |
|------|------|---------|---------|-------------|
| `title` | string | null | - | Main heading |
| `subtitle` | string | null | - | Small text above title |
| `description` | string | null | - | Description text |
| `align` | string | 'center' | left, center | Text alignment |
| `size` | string | 'default' | sm, default, lg, xl | Title size |
| `background` | string | null | null, image, gradient, pattern | Background style |
| `backgroundImage` | string | null | - | Background image URL |
| `overlay` | bool | false | - | Dark overlay on image |

---

## Hero Actions Component

CTA button container with responsive layout.

**Location:** `resources/views/components/ui/hero/actions.blade.php`

### Usage

```blade
<x-ui.hero.actions>
    <x-ui.button variant="primary" size="lg">Primary Action</x-ui.button>
    <x-ui.button variant="secondary" size="lg">Secondary Action</x-ui.button>
</x-ui.hero.actions>

{{-- Left Aligned --}}
<x-ui.hero.actions align="left">
    <x-ui.button>Get Started</x-ui.button>
    <x-ui.button :outline="true">Learn More</x-ui.button>
</x-ui.hero.actions>
```

### Props

| Prop | Type | Default | Options | Description |
|------|------|---------|---------|-------------|
| `align` | string | 'center' | left, center | Button alignment |

---

## Hero Split Component

Two-column layout with content and media.

**Location:** `resources/views/components/ui/hero/split.blade.php`

### Features

- Two-column responsive grid
- Optional reverse layout
- Perfect for content + image/video
- Dark mode support

### Usage

```blade
<x-ui.hero.split>
    <x-slot:content>
        <h1 class="text-4xl font-bold mb-4">Welcome to Our Platform</h1>
        <p class="text-lg text-gray-600 mb-6">
            Discover amazing features and grow your business with our tools.
        </p>
        <x-ui.hero.actions align="left">
            <x-ui.button variant="primary">Get Started</x-ui.button>
            <x-ui.button :outline="true">Watch Demo</x-ui.button>
        </x-ui.hero.actions>
    </x-slot:content>

    <x-slot:media>
        <img src="/images/hero-image.jpg" class="w-full rounded-lg shadow-xl" alt="Hero">
    </x-slot:media>
</x-ui.hero.split>

{{-- Reverse Layout (Image on Left) --}}
<x-ui.hero.split :reverse="true">
    <x-slot:content>
        <h2 class="text-3xl font-bold">Feature Highlight</h2>
        <p class="text-gray-600">Description of the feature...</p>
    </x-slot:content>

    <x-slot:media>
        <img src="/images/feature.jpg" alt="Feature">
    </x-slot:media>
</x-ui.hero.split>

{{-- With Video --}}
<x-ui.hero.split>
    <x-slot:content>
        <h1 class="text-4xl font-bold mb-4">Watch Our Story</h1>
        <p class="text-lg mb-6">Learn how we're making a difference</p>
    </x-slot:content>

    <x-slot:media>
        <iframe
            class="w-full aspect-video rounded-lg"
            src="https://www.youtube.com/embed/dQw4w9WgXcQ"
            title="Video"
            allowfullscreen
        ></iframe>
    </x-slot:media>
</x-ui.hero.split>
```

### Props

| Prop | Type | Default | Options | Description |
|------|------|---------|---------|-------------|
| `reverse` | bool | false | - | Reverse column order |

---

## Hero Card Grid Component

Hero section with feature cards below.

**Location:** `resources/views/components/ui/hero/card-grid.blade.php`

### Features

- Hero section + card grid
- Responsive columns (2-4)
- Perfect for feature showcases
- Dark mode support

### Usage

```blade
<x-ui.hero.card-grid :columns="3">
    <x-slot:hero>
        <h1 class="text-4xl font-bold mb-4">Our Features</h1>
        <p class="text-lg text-gray-600">
            Everything you need to succeed
        </p>
    </x-slot:hero>

    <x-slot:cards>
        <x-ui.card>
            <div class="flex flex-col items-center text-center">
                <div class="p-3 bg-blue-100 rounded-full mb-4">
                    <svg class="w-6 h-6 text-blue-600" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M10 3.5a1.5 1.5 0 013 0V4a1 1 0 001 1h3a1 1 0 011 1v3a1 1 0 01-1 1h-.5a1.5 1.5 0 000 3h.5a1 1 0 011 1v3a1 1 0 01-1 1h-3a1 1 0 01-1-1v-.5a1.5 1.5 0 00-3 0v.5a1 1 0 01-1 1H6a1 1 0 01-1-1v-3a1 1 0 00-1-1h-.5a1.5 1.5 0 010-3H4a1 1 0 001-1V6a1 1 0 011-1h3a1 1 0 001-1v-.5z"/>
                    </svg>
                </div>
                <h3 class="text-xl font-bold mb-2">Easy Integration</h3>
                <p class="text-gray-600">
                    Connect with your existing tools seamlessly
                </p>
            </div>
        </x-ui.card>

        <x-ui.card>
            <div class="flex flex-col items-center text-center">
                <div class="p-3 bg-green-100 rounded-full mb-4">
                    <svg class="w-6 h-6 text-green-600" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                    </svg>
                </div>
                <h3 class="text-xl font-bold mb-2">Reliable</h3>
                <p class="text-gray-600">
                    99.9% uptime guarantee
                </p>
            </div>
        </x-ui.card>

        <x-ui.card>
            <div class="flex flex-col items-center text-center">
                <div class="p-3 bg-purple-100 rounded-full mb-4">
                    <svg class="w-6 h-6 text-purple-600" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z"/>
                    </svg>
                </div>
                <h3 class="text-xl font-bold mb-2">Collaborative</h3>
                <p class="text-gray-600">
                    Work together with your team
                </p>
            </div>
        </x-ui.card>
    </x-slot:cards>
</x-ui.hero.card-grid>
```

### Props

| Prop | Type | Default | Options | Description |
|------|------|---------|---------|-------------|
| `columns` | int | 3 | 2, 3, 4 | Number of card columns |

---

## Hero Search Component

Hero with integrated search form.

**Location:** `resources/views/components/ui/hero/search.blade.php`

### Usage

```blade
<x-ui.hero
    title="Find Your Pet"
    description="Search thousands of pets available for adoption"
>
    <x-ui.hero.search
        placeholder="Search by breed, location, or name..."
        buttonText="Search"
        action="/search"
    />
</x-ui.hero>

{{-- With Custom Styling --}}
<x-ui.hero.search
    placeholder="What are you looking for?"
    buttonText="Go"
    action="/search"
    method="POST"
    class="max-w-2xl"
/>
```

### Props

| Prop | Type | Default | Options | Description |
|------|------|---------|---------|-------------|
| `placeholder` | string | 'Search...' | - | Input placeholder |
| `buttonText` | string | 'Search' | - | Button text |
| `action` | string | null | - | Form action URL |
| `method` | string | 'GET' | GET, POST | Form method |

---

## Hero Newsletter Component

Hero with newsletter signup form.

**Location:** `resources/views/components/ui/hero/newsletter.blade.php`

### Usage

```blade
<x-ui.hero
    title="Stay Updated"
    description="Get the latest news and updates delivered to your inbox"
>
    <x-ui.hero.newsletter
        placeholder="Enter your email"
        buttonText="Subscribe"
        action="/newsletter/subscribe"
        helper="We'll never share your email. Unsubscribe anytime."
    />
</x-ui.hero>

{{-- Inline in Hero --}}
<x-ui.hero.newsletter
    placeholder="Your email address"
    buttonText="Join Now"
    action="/subscribe"
/>
```

### Props

| Prop | Type | Default | Options | Description |
|------|------|---------|---------|-------------|
| `placeholder` | string | 'Enter your email' | - | Input placeholder |
| `buttonText` | string | 'Subscribe' | - | Button text |
| `action` | string | null | - | Form action URL |
| `helper` | string | null | - | Helper text below form |

---

## Real-World Examples

### Landing Page Hero

```blade
<x-ui.hero
    subtitle="Welcome to Flowbite"
    title="Find Your Perfect Pet Companion"
    description="Connect with thousands of pets looking for a loving home. Browse, match, and adopt your new best friend today."
    size="lg"
    background="gradient"
>
    <x-ui.hero.actions>
        <x-ui.button variant="primary" size="lg" href="/browse">
            Browse Pets
        </x-ui.button>
        <x-ui.button variant="secondary" size="lg" :outline="true" href="/about">
            Learn More
        </x-ui.button>
    </x-ui.hero.actions>
</x-ui.hero>
```

### Hero with Background Image

```blade
<x-ui.hero
    title="Adventure Awaits"
    description="Discover amazing experiences with your furry friends"
    background="image"
    backgroundImage="/images/pets-hero.jpg"
    :overlay="true"
    size="xl"
>
    <x-ui.hero.actions>
        <x-ui.button variant="primary" size="lg">Get Started</x-ui.button>
    </x-ui.hero.actions>
</x-ui.hero>
```

### Service Hero with Features

```blade
<x-ui.hero.card-grid :columns="3">
    <x-slot:hero>
        <h1 class="text-5xl font-bold text-gray-900 mb-4">
            Professional Pet Care Services
        </h1>
        <p class="text-xl text-gray-600 max-w-2xl mx-auto">
            Everything your pet needs, all in one place
        </p>
    </x-slot:hero>

    <x-slot:cards>
        @foreach($services as $service)
            <x-ui.card>
                <div class="text-center">
                    <div class="inline-flex p-3 bg-blue-100 rounded-full mb-4">
                        {!! $service->icon !!}
                    </div>
                    <h3 class="text-xl font-bold mb-2">{{ $service->name }}</h3>
                    <p class="text-gray-600 mb-4">{{ $service->description }}</p>
                    <a href="{{ route('services.show', $service) }}" class="text-blue-600 hover:underline">
                        Learn more →
                    </a>
                </div>
            </x-ui.card>
        @endforeach
    </x-slot:cards>
</x-ui.hero.card-grid>
```

### Split Hero with Video

```blade
<x-ui.hero.split>
    <x-slot:content>
        <h1 class="text-4xl font-bold text-gray-900 mb-4">
            See How Flowbite Works
        </h1>
        <p class="text-lg text-gray-600 mb-6">
            Watch our quick video to learn how easy it is to find and adopt your perfect pet companion.
        </p>
        <ul class="space-y-3 mb-6">
            <li class="flex items-center">
                <svg class="w-5 h-5 text-green-500 mr-2" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                </svg>
                Browse verified pet profiles
            </li>
            <li class="flex items-center">
                <svg class="w-5 h-5 text-green-500 mr-2" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                </svg>
                Connect with shelters directly
            </li>
            <li class="flex items-center">
                <svg class="w-5 h-5 text-green-500 mr-2" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                </svg>
                Complete adoption online
            </li>
        </ul>
        <x-ui.hero.actions align="left">
            <x-ui.button variant="primary">Start Browsing</x-ui.button>
        </x-ui.hero.actions>
    </x-slot:content>

    <x-slot:media>
        <div class="relative">
            <iframe
                class="w-full aspect-video rounded-lg shadow-xl"
                src="https://www.youtube.com/embed/your-video-id"
                title="How Flowbite Works"
                allowfullscreen
            ></iframe>
        </div>
    </x-slot:media>
</x-ui.hero.split>
```

### Search Hero

```blade
<x-ui.hero
    title="Find Your Perfect Service"
    description="Search from thousands of pet care services in your area"
    background="gradient"
    size="lg"
>
    <x-ui.hero.search
        placeholder="Enter location or service type..."
        buttonText="Search"
        action="/services/search"
    />

    <div class="mt-8 flex flex-wrap justify-center gap-2">
        <span class="text-sm text-gray-600">Popular:</span>
        <a href="/services/grooming" class="text-sm text-blue-600 hover:underline">Grooming</a>
        <a href="/services/training" class="text-sm text-blue-600 hover:underline">Training</a>
        <a href="/services/boarding" class="text-sm text-blue-600 hover:underline">Boarding</a>
        <a href="/services/veterinary" class="text-sm text-blue-600 hover:underline">Veterinary</a>
    </div>
</x-ui.hero>
```

### Newsletter Hero

```blade
<x-ui.hero
    title="Join Our Community"
    description="Get weekly tips, pet care advice, and adoption success stories"
    align="center"
>
    <x-ui.hero.newsletter
        placeholder="Enter your email address"
        buttonText="Subscribe Now"
        action="/newsletter/subscribe"
        helper="Join 10,000+ pet lovers. No spam, unsubscribe anytime."
    />

    <div class="mt-6 flex items-center justify-center space-x-4 text-sm text-gray-500">
        <span class="flex items-center">
            <svg class="w-5 h-5 text-green-500 mr-1" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
            </svg>
            Weekly tips
        </span>
        <span class="flex items-center">
            <svg class="w-5 h-5 text-green-500 mr-1" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
            </svg>
            No spam
        </span>
        <span class="flex items-center">
            <svg class="w-5 h-5 text-green-500 mr-1" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
            </svg>
            Free forever
        </span>
    </div>
</x-ui.hero>
```

---

## Best Practices

### 1. Keep Titles Concise

```blade
{{-- Good: Clear and concise --}}
<x-ui.hero title="Find Your Perfect Pet" />

{{-- Avoid: Too long --}}
<x-ui.hero title="Welcome to Our Amazing Platform Where You Can Find Pets" />
```

### 2. Use Appropriate Sizes

```blade
{{-- Main landing page: Large or XL --}}
<x-ui.hero title="Welcome" size="xl" />

{{-- Section headers: Default or Small --}}
<x-ui.hero title="Our Services" size="default" />
```

### 3. Optimize Background Images

```blade
{{-- Use optimized, compressed images --}}
<x-ui.hero
    background="image"
    backgroundImage="/images/hero-optimized.webp"
    :overlay="true"
/>
```

### 4. Clear Call-to-Actions

```blade
{{-- Primary action should stand out --}}
<x-ui.hero.actions>
    <x-ui.button variant="primary" size="lg">Get Started</x-ui.button>
    <x-ui.button variant="secondary" :outline="true">Learn More</x-ui.button>
</x-ui.hero.actions>
```

### 5. Mobile-First Design

All hero components are mobile-first and responsive by default. Test on mobile devices to ensure readability.

---

## Accessibility

### Proper Heading Hierarchy

```blade
{{-- Use h1 for main page hero --}}
<x-ui.hero title="Main Page Title" />

{{-- Use h2 for section heroes --}}
<section>
    <h2 class="text-4xl font-bold">Section Title</h2>
</section>
```

### Alt Text for Images

```blade
<x-ui.hero.split>
    <x-slot:media>
        <img
            src="/hero.jpg"
            alt="Happy family with their newly adopted dog"
            class="rounded-lg"
        >
    </x-slot:media>
</x-ui.hero.split>
```

### Form Labels

All hero form components include proper labels and ARIA attributes.

---

## Related Components

- [Button](button.md) - CTA buttons
- [Card](card.md) - Feature cards
- [Banner](banner.md) - Top banners

---

## Tips & Tricks

### Animated Hero with Alpine.js

```blade
<div x-data="{ show: false }" x-init="setTimeout(() => show = true, 100)">
    <div
        x-show="show"
        x-transition:enter="transition ease-out duration-1000"
        x-transition:enter-start="opacity-0 translate-y-10"
        x-transition:enter-end="opacity-100 translate-y-0"
    >
        <x-ui.hero
            title="Welcome"
            description="Your journey starts here"
        />
    </div>
</div>
```

### Countdown Timer in Hero

```blade
<x-ui.hero
    title="Limited Time Offer"
    description="Adoption fees waived for the next"
>
    <div
        x-data="{
            time: 86400,
            interval: null,
            mounted() {
                this.interval = setInterval(() => {
                    if (this.time > 0) this.time--;
                }, 1000);
            }
        }"
        class="flex justify-center gap-4 my-8"
    >
        <div class="text-center">
            <div class="text-4xl font-bold" x-text="Math.floor(time / 3600)"></div>
            <div class="text-sm text-gray-600">Hours</div>
        </div>
        <div class="text-4xl font-bold">:</div>
        <div class="text-center">
            <div class="text-4xl font-bold" x-text="Math.floor((time % 3600) / 60)"></div>
            <div class="text-sm text-gray-600">Minutes</div>
        </div>
        <div class="text-4xl font-bold">:</div>
        <div class="text-center">
            <div class="text-4xl font-bold" x-text="time % 60"></div>
            <div class="text-sm text-gray-600">Seconds</div>
        </div>
    </div>
</x-ui.hero>
```

### Parallax Background

```blade
<div x-data="{ scroll: 0 }" @scroll.window="scroll = window.pageYOffset">
    <div :style="`transform: translateY(${scroll * 0.5}px)`">
        <x-ui.hero
            title="Smooth Scrolling"
            background="image"
            backgroundImage="/hero-bg.jpg"
        />
    </div>
</div>
```
