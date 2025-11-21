# Device Mockup Components

Uygulama ekran görüntülerini ve içeriği farklı cihaz çerçeveleri içinde göstermek için kullanılan bileşenler. Flowbite tasarım sistemine uygun, responsive ve dark mode destekli mockup'lar.

## 📦 Available Components

- **Smartphone** - Mobile phone mockup (default, iPhone, Android variants)
- **Tablet** - Tablet mockup (portrait/landscape)
- **Laptop** - Laptop screen mockup
- **Desktop** - Desktop computer (iMac) mockup
- **Smartwatch** - Smartwatch mockup

---

## Smartphone Mockup

Mobile telefon görünümü için mockup. 3 farklı varyant sunar.

**Location:** `resources/views/components/ui/device-mockup/smartphone.blade.php`

### Features

- 3 varyant: Default, iPhone, Android
- Realistic device frame with bezels
- Side button details
- Notch/camera hole support
- Dark mode support
- Responsive sizing
- Shadow effects

### Usage

```blade
{{-- Default Smartphone --}}
<x-ui.device-mockup.smartphone>
    <img src="/images/app-screenshot.jpg" alt="App Screenshot" class="w-full h-full object-cover">
</x-ui.device-mockup.smartphone>

{{-- iPhone Variant --}}
<x-ui.device-mockup.smartphone variant="iphone">
    <img src="/images/ios-app.jpg" alt="iOS App" class="w-full h-full object-cover">
</x-ui.device-mockup.smartphone>

{{-- Android (Google Pixel) Variant --}}
<x-ui.device-mockup.smartphone variant="android">
    <img src="/images/android-app.jpg" alt="Android App" class="w-full h-full object-cover">
</x-ui.device-mockup.smartphone>

{{-- With Video Content --}}
<x-ui.device-mockup.smartphone variant="iphone">
    <video class="w-full h-full object-cover" autoplay loop muted>
        <source src="/videos/app-demo.mp4" type="video/mp4">
    </video>
</x-ui.device-mockup.smartphone>

{{-- With Live Livewire Component --}}
<x-ui.device-mockup.smartphone>
    <div class="p-4 h-full overflow-y-auto">
        <livewire:mobile-app-demo />
    </div>
</x-ui.device-mockup.smartphone>

{{-- Dark Mode Screenshot --}}
<x-ui.device-mockup.smartphone variant="iphone">
    <img src="/images/dark-mode.jpg" alt="Dark Mode" class="w-full h-full object-cover dark:block hidden">
    <img src="/images/light-mode.jpg" alt="Light Mode" class="w-full h-full object-cover dark:hidden block">
</x-ui.device-mockup.smartphone>
```

### Props

| Prop | Type | Default | Options | Description |
|------|------|---------|---------|-------------|
| `variant` | string | 'default' | default, iphone, android | Phone mockup style |
| `darkMode` | bool | false | - | Enable dark mode styling |

### Dimensions

- Frame: 300px × 600px
- Screen: 272px × 572px
- Border: 14px
- Border radius: 2.5rem

---

## Tablet Mockup

Tablet görünümü için mockup. Portrait ve landscape orientasyonları destekler.

**Location:** `resources/views/components/ui/device-mockup/tablet.blade.php`

### Features

- Portrait and landscape orientations
- Realistic tablet bezel
- Camera detail
- Dark mode support
- Responsive sizing
- Large screen area

### Usage

```blade
{{-- Portrait Tablet --}}
<x-ui.device-mockup.tablet>
    <img src="/images/tablet-app.jpg" alt="Tablet App" class="w-full h-full object-cover">
</x-ui.device-mockup.tablet>

{{-- Landscape Tablet --}}
<x-ui.device-mockup.tablet orientation="landscape">
    <img src="/images/tablet-landscape.jpg" alt="Landscape View" class="w-full h-full object-cover">
</x-ui.device-mockup.tablet>

{{-- With Dashboard Content --}}
<x-ui.device-mockup.tablet orientation="landscape">
    <div class="p-6 h-full overflow-y-auto">
        <h2 class="text-2xl font-bold mb-4">Dashboard</h2>
        <div class="grid grid-cols-3 gap-4">
            <x-ui.card>Card 1</x-ui.card>
            <x-ui.card>Card 2</x-ui.card>
            <x-ui.card>Card 3</x-ui.card>
        </div>
    </div>
</x-ui.device-mockup.tablet>

{{-- With Video --}}
<x-ui.device-mockup.tablet>
    <video class="w-full h-full object-cover" controls>
        <source src="/videos/tablet-demo.mp4" type="video/mp4">
    </video>
</x-ui.device-mockup.tablet>
```

### Props

| Prop | Type | Default | Options | Description |
|------|------|---------|---------|-------------|
| `orientation` | string | 'portrait' | portrait, landscape | Tablet orientation |

### Dimensions

**Portrait:**
- Frame: 454px × 768px
- Screen: 426px × 740px
- Border: 14px

**Landscape:**
- Frame: 768px × 454px
- Screen: 740px × 426px
- Border: 14px

---

## Laptop Mockup

Laptop ekran görünümü için mockup. Klavye gösterimi opsiyonel.

**Location:** `resources/views/components/ui/device-mockup/laptop.blade.php`

### Features

- Realistic laptop screen bezel
- Optional keyboard base
- Responsive sizing (mobile/desktop)
- Dark mode support
- Trackpad detail
- Shadow effects

### Usage

```blade
{{-- Basic Laptop --}}
<x-ui.device-mockup.laptop>
    <img src="/images/web-app.jpg" alt="Web Application" class="w-full h-full object-cover">
</x-ui.device-mockup.laptop>

{{-- Without Keyboard --}}
<x-ui.device-mockup.laptop :showKeyboard="false">
    <img src="/images/screen-only.jpg" alt="Screen" class="w-full h-full object-cover">
</x-ui.device-mockup.laptop>

{{-- With Website Content --}}
<x-ui.device-mockup.laptop>
    <div class="w-full h-full overflow-y-auto">
        <iframe src="https://example.com" class="w-full h-full border-0"></iframe>
    </div>
</x-ui.device-mockup.laptop>

{{-- With Gradient Background --}}
<x-ui.device-mockup.laptop>
    <div class="w-full h-full bg-gradient-to-br from-purple-600 to-blue-600 flex items-center justify-center">
        <h1 class="text-4xl font-bold text-white">Welcome</h1>
    </div>
</x-ui.device-mockup.laptop>
```

### Props

| Prop | Type | Default | Options | Description |
|------|------|---------|---------|-------------|
| `showKeyboard` | bool | true | - | Show keyboard base |

### Dimensions

**Mobile:**
- Frame: 301px × 172px (screen)
- Screen: 301px × 156px
- Border: 8px

**Desktop:**
- Frame: 512px × 294px (screen)
- Screen: 512px × 278px
- Border: 8px

---

## Desktop Mockup

Desktop computer (iMac style) mockup. Stand ve base dahil.

**Location:** `resources/views/components/ui/device-mockup/desktop.blade.php`

### Features

- iMac-style monitor frame
- Stand and base included
- Large screen area
- Responsive sizing
- Dark mode support
- Professional appearance

### Usage

```blade
{{-- Basic Desktop --}}
<x-ui.device-mockup.desktop>
    <img src="/images/desktop-app.jpg" alt="Desktop Application" class="w-full h-full object-cover">
</x-ui.device-mockup.desktop>

{{-- With Dashboard --}}
<x-ui.device-mockup.desktop>
    <div class="w-full h-full p-8 overflow-y-auto bg-gray-50 dark:bg-gray-900">
        <div class="max-w-7xl mx-auto">
            <h1 class="text-3xl font-bold mb-6">Admin Dashboard</h1>
            <div class="grid grid-cols-4 gap-4">
                <x-ui.stat-card title="Users" value="1,234" />
                <x-ui.stat-card title="Revenue" value="$12,345" />
                <x-ui.stat-card title="Orders" value="456" />
                <x-ui.stat-card title="Growth" value="+23%" />
            </div>
        </div>
    </div>
</x-ui.device-mockup.desktop>

{{-- With Video Player --}}
<x-ui.device-mockup.desktop>
    <video class="w-full h-full object-cover" controls>
        <source src="/videos/desktop-demo.mp4" type="video/mp4">
    </video>
</x-ui.device-mockup.desktop>
```

### Props

No configurable props available.

### Dimensions

**Mobile:**
- Frame: 301px × 172px (screen)
- Screen: 301px × 140px
- Border: 16px

**Desktop:**
- Frame: 512px × 406px (screen)
- Screen: 512px × 374px
- Border: 16px

---

## Smartwatch Mockup

Akıllı saat görünümü için mockup. Kayış gösterimi opsiyonel.

**Location:** `resources/views/components/ui/device-mockup/smartwatch.blade.php`

### Features

- Circular/rounded watch face
- Optional watch straps
- Compact size
- Dark mode support
- Realistic bezels
- Shadow effects

### Usage

```blade
{{-- Basic Smartwatch --}}
<x-ui.device-mockup.smartwatch>
    <img src="/images/watch-face.jpg" alt="Watch Face" class="w-full h-full object-cover">
</x-ui.device-mockup.smartwatch>

{{-- Without Straps --}}
<x-ui.device-mockup.smartwatch :showStraps="false">
    <img src="/images/watch-screen.jpg" alt="Watch Screen" class="w-full h-full object-cover">
</x-ui.device-mockup.smartwatch>

{{-- With Custom Watch Face --}}
<x-ui.device-mockup.smartwatch>
    <div class="w-full h-full bg-black flex flex-col items-center justify-center text-white p-4">
        <div class="text-5xl font-bold">10:30</div>
        <div class="text-sm mt-2">Monday, Jan 15</div>
        <div class="mt-4 grid grid-cols-3 gap-2">
            <div class="text-center">
                <div class="text-xs">Steps</div>
                <div class="font-bold">5.2K</div>
            </div>
            <div class="text-center">
                <div class="text-xs">Cal</div>
                <div class="font-bold">342</div>
            </div>
            <div class="text-center">
                <div class="text-xs">HR</div>
                <div class="font-bold">72</div>
            </div>
        </div>
    </div>
</x-ui.device-mockup.smartwatch>

{{-- With Animated Content --}}
<x-ui.device-mockup.smartwatch>
    <div class="w-full h-full bg-gradient-to-br from-blue-500 to-purple-600 animate-pulse"></div>
</x-ui.device-mockup.smartwatch>
```

### Props

| Prop | Type | Default | Options | Description |
|------|------|---------|---------|-------------|
| `showStraps` | bool | true | - | Show watch straps |

### Dimensions

- Frame: 208px × 213px
- Screen: 188px × 193px
- Border: 10px
- Border radius: 2.5rem

---

## Best Practices

### 1. Content Sizing

```blade
{{-- Always use object-cover for images --}}
<x-ui.device-mockup.smartphone>
    <img src="/image.jpg" class="w-full h-full object-cover">
</x-ui.device-mockup.smartphone>

{{-- For scrollable content --}}
<x-ui.device-mockup.tablet>
    <div class="w-full h-full overflow-y-auto p-4">
        <!-- Your content -->
    </div>
</x-ui.device-mockup.tablet>
```

### 2. Responsive Considerations

```blade
{{-- Use appropriate mockup for screen size --}}
<div class="lg:hidden">
    <x-ui.device-mockup.smartphone>
        <!-- Mobile content -->
    </x-ui.device-mockup.smartphone>
</div>

<div class="hidden lg:block">
    <x-ui.device-mockup.laptop>
        <!-- Desktop content -->
    </x-ui.device-mockup.laptop>
</div>
```

### 3. Dark Mode Images

```blade
<x-ui.device-mockup.smartphone>
    {{-- Light mode image --}}
    <img src="/light-screenshot.jpg" class="w-full h-full object-cover dark:hidden">

    {{-- Dark mode image --}}
    <img src="/dark-screenshot.jpg" class="w-full h-full object-cover hidden dark:block">
</x-ui.device-mockup.smartphone>
```

### 4. Multiple Devices Layout

```blade
<div class="grid grid-cols-1 md:grid-cols-3 gap-8 items-end">
    <x-ui.device-mockup.smartphone>
        <img src="/mobile.jpg" class="w-full h-full object-cover">
    </x-ui.device-mockup.smartphone>

    <x-ui.device-mockup.tablet>
        <img src="/tablet.jpg" class="w-full h-full object-cover">
    </x-ui.device-mockup.tablet>

    <x-ui.device-mockup.laptop>
        <img src="/laptop.jpg" class="w-full h-full object-cover">
    </x-ui.device-mockup.laptop>
</div>
```

### 5. Performance Optimization

```blade
{{-- Use lazy loading for images --}}
<x-ui.device-mockup.smartphone>
    <img
        src="/screenshot.jpg"
        loading="lazy"
        class="w-full h-full object-cover"
    >
</x-ui.device-mockup.smartphone>

{{-- Optimize video playback --}}
<x-ui.device-mockup.laptop>
    <video
        class="w-full h-full object-cover"
        autoplay
        loop
        muted
        playsinline
    >
        <source src="/demo.mp4" type="video/mp4">
    </video>
</x-ui.device-mockup.laptop>
```

### 6. Accessibility

```blade
{{-- Always provide alt text --}}
<x-ui.device-mockup.smartphone>
    <img
        src="/app-screenshot.jpg"
        alt="Mobile app showing user dashboard with statistics"
        class="w-full h-full object-cover"
    >
</x-ui.device-mockup.smartphone>

{{-- Add ARIA labels for interactive content --}}
<x-ui.device-mockup.tablet>
    <div role="img" aria-label="Tablet showing admin dashboard">
        <!-- Interactive content -->
    </div>
</x-ui.device-mockup.tablet>
```

---

## Real-World Examples

### Landing Page Showcase

```blade
<section class="py-20 bg-gray-50 dark:bg-gray-900">
    <div class="max-w-7xl mx-auto px-4">
        <div class="text-center mb-12">
            <h2 class="text-4xl font-bold mb-4">Beautiful on Every Device</h2>
            <p class="text-xl text-gray-600 dark:text-gray-400">
                Experience our app across all your devices
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 items-end">
            <div data-aos="fade-up" data-aos-delay="0">
                <x-ui.device-mockup.smartphone variant="iphone">
                    <img src="/images/mobile-app.jpg" class="w-full h-full object-cover">
                </x-ui.device-mockup.smartphone>
            </div>

            <div data-aos="fade-up" data-aos-delay="200">
                <x-ui.device-mockup.tablet>
                    <img src="/images/tablet-app.jpg" class="w-full h-full object-cover">
                </x-ui.device-mockup.tablet>
            </div>

            <div data-aos="fade-up" data-aos-delay="400">
                <x-ui.device-mockup.laptop>
                    <img src="/images/desktop-app.jpg" class="w-full h-full object-cover">
                </x-ui.device-mockup.laptop>
            </div>
        </div>
    </div>
</section>
```

### App Features Section

```blade
<section class="py-20">
    <div class="max-w-6xl mx-auto px-4">
        <div class="grid md:grid-cols-2 gap-12 items-center">
            <div>
                <h3 class="text-3xl font-bold mb-4">Powerful Mobile Experience</h3>
                <p class="text-gray-600 dark:text-gray-400 mb-6">
                    Access all features on the go with our intuitive mobile interface.
                </p>
                <ul class="space-y-3">
                    <li class="flex items-center">
                        <svg class="w-5 h-5 text-green-500 mr-2" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"/>
                        </svg>
                        Real-time notifications
                    </li>
                    <li class="flex items-center">
                        <svg class="w-5 h-5 text-green-500 mr-2" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"/>
                        </svg>
                        Offline mode support
                    </li>
                    <li class="flex items-center">
                        <svg class="w-5 h-5 text-green-500 mr-2" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"/>
                        </svg>
                        Biometric authentication
                    </li>
                </ul>
            </div>

            <div>
                <x-ui.device-mockup.smartphone variant="iphone">
                    <img src="/images/features-mobile.jpg" class="w-full h-full object-cover">
                </x-ui.device-mockup.smartphone>
            </div>
        </div>
    </div>
</section>
```

### Portfolio/Case Study

```blade
<div class="max-w-4xl mx-auto px-4 py-12">
    <h2 class="text-3xl font-bold mb-8">Project: E-commerce Platform</h2>

    <div class="space-y-12">
        {{-- Mobile View --}}
        <div>
            <h3 class="text-xl font-semibold mb-4">Mobile Shopping Experience</h3>
            <div class="flex justify-center">
                <x-ui.device-mockup.smartphone variant="android">
                    <img src="/portfolio/mobile-shop.jpg" class="w-full h-full object-cover">
                </x-ui.device-mockup.smartphone>
            </div>
        </div>

        {{-- Desktop View --}}
        <div>
            <h3 class="text-xl font-semibold mb-4">Desktop Admin Dashboard</h3>
            <x-ui.device-mockup.desktop>
                <img src="/portfolio/admin-dashboard.jpg" class="w-full h-full object-cover">
            </x-ui.device-mockup.desktop>
        </div>

        {{-- Tablet View --}}
        <div>
            <h3 class="text-xl font-semibold mb-4">Tablet POS System</h3>
            <div class="flex justify-center">
                <x-ui.device-mockup.tablet orientation="landscape">
                    <img src="/portfolio/pos-system.jpg" class="w-full h-full object-cover">
                </x-ui.device-mockup.tablet>
            </div>
        </div>
    </div>
</div>
```

### Wearable App Showcase

```blade
<section class="py-20 bg-gradient-to-br from-purple-600 to-blue-600 text-white">
    <div class="max-w-4xl mx-auto px-4 text-center">
        <h2 class="text-4xl font-bold mb-4">Now on Your Wrist</h2>
        <p class="text-xl mb-12">Track your health and fitness with our smartwatch app</p>

        <div class="flex justify-center">
            <x-ui.device-mockup.smartwatch>
                <img src="/images/watch-app.jpg" class="w-full h-full object-cover">
            </x-ui.device-mockup.smartwatch>
        </div>
    </div>
</section>
```

---

## Use Cases

### 1. **Landing Pages**
- Showcase app screenshots
- Multi-device responsive views
- Feature demonstrations

### 2. **Portfolio/Case Studies**
- Project presentations
- Client work display
- Design mockups

### 3. **Documentation**
- User guides with screenshots
- Tutorial illustrations
- Feature explanations

### 4. **Marketing Materials**
- App store assets
- Social media posts
- Promotional content

### 5. **Product Pages**
- SaaS product demos
- App feature highlights
- Platform showcases

---

## Related Components

- [Card](card.md) - Container component
- [Image](../typography/image.md) - Typography images
- [Carousel](../carousel/README.md) - Image sliders

---

## Tips & Tricks

### Animation

```blade
<div class="animate-float">
    <x-ui.device-mockup.smartphone>
        <img src="/app.jpg" class="w-full h-full object-cover">
    </x-ui.device-mockup.smartphone>
</div>

{{-- Add to your CSS --}}
<style>
@keyframes float {
    0%, 100% { transform: translateY(0); }
    50% { transform: translateY(-20px); }
}
.animate-float {
    animation: float 3s ease-in-out infinite;
}
</style>
```

### Comparison View

```blade
<div class="flex gap-8 items-center justify-center">
    <div class="text-center">
        <p class="mb-4 font-semibold">Before</p>
        <x-ui.device-mockup.smartphone>
            <img src="/before.jpg" class="w-full h-full object-cover">
        </x-ui.device-mockup.smartphone>
    </div>

    <div class="text-center">
        <p class="mb-4 font-semibold">After</p>
        <x-ui.device-mockup.smartphone>
            <img src="/after.jpg" class="w-full h-full object-cover">
        </x-ui.device-mockup.smartphone>
    </div>
</div>
```