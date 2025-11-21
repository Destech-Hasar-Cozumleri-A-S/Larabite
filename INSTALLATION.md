# Kurulum Kılavuzu

Flowbite Laravel bileşenlerini projenize kurma adımları.

## 1. Composer ile Kurulum

### Packagist'ten Kurulum (Yayınlandıktan Sonra)

```bash
composer require destech-packages/flowbite-laravel
```

### Yerel Olarak Kurulum (Geliştirme Aşamasında)

Ana projenizin `composer.json` dosyasına repository ekleyin:

```json
{
    "repositories": [
        {
            "type": "path",
            "url": "./packages/flowbite-laravel"
        }
    ]
}
```

Ardından paketi yükleyin:

```bash
composer require destech-packages/flowbite-laravel @dev
```

## 2. Yapılandırma

### Config Dosyasını Yayınlama

```bash
php artisan vendor:publish --tag=flowbite-config
```

Bu komut `config/flowbite-laravel.php` dosyasını oluşturur.

### Tailwind CSS Yapılandırması

`tailwind.config.js` dosyanızı güncelleyin:

```js
module.exports = {
  content: [
    './resources/**/*.blade.php',
    './resources/**/*.js',
    './resources/**/*.vue',
    './vendor/destech-packages/flowbite-laravel/resources/**/*.blade.php',
  ],
  darkMode: 'class', // veya 'media'
  theme: {
    extend: {
      colors: {
        primary: {
          50: '#eff6ff',
          100: '#dbeafe',
          200: '#bfdbfe',
          300: '#93c5fd',
          400: '#60a5fa',
          500: '#3b82f6',
          600: '#2563eb',
          700: '#1d4ed8',
          800: '#1e40af',
          900: '#1e3a8a',
          950: '#172554',
        }
      }
    },
  },
  plugins: [
    require('flowbite/plugin')
  ],
}
```

### Flowbite Yükleme

```bash
npm install flowbite
```

## 3. Alpine.js Kurulumu (Opsiyonel ama Önerilen)

Bazı interaktif bileşenler Alpine.js gerektirir.

```bash
npm install alpinejs
```

`resources/js/app.js`:

```js
import Alpine from 'alpinejs'

window.Alpine = Alpine

Alpine.start()
```

## 4. Vite Yapılandırması

`vite.config.js`:

```js
import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.js',
            ],
            refresh: true,
        }),
    ],
});
```

## 5. CSS Hazırlama

`resources/css/app.css`:

```css
@tailwind base;
@tailwind components;
@tailwind utilities;

/* Flowbite için gerekli (opsiyonel) */
@layer components {
    /* Özel stil tanımlamaları */
}
```

## 6. Asset'leri Build Etme

```bash
npm install
npm run build

# Geliştirme için:
npm run dev
```

## 7. Layout Dosyanızı Güncelleme

`resources/views/layouts/app.blade.php`:

```blade
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Vite ile CSS & JS -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Alpine.js için (eğer CDN kullanıyorsanız) -->
    {{-- <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script> --}}
</head>
<body class="bg-gray-50 dark:bg-gray-900">
    {{ $slot }}
</body>
</html>
```

## 8. Bileşenleri Kullanmaya Başlayın

```blade
<x-ui.button variant="primary">
    İlk Butonum
</x-ui.button>

<x-ui.card>
    <x-ui.typography.heading level="2">
        Kart Başlığı
    </x-ui.typography.heading>
    <x-ui.typography.paragraph>
        Kart içeriği buraya gelir.
    </x-ui.typography.paragraph>
</x-ui.card>
```

## Bileşenleri Özelleştirme (Opsiyonel)

Bileşenleri kendi projenizde özelleştirmek isterseniz:

```bash
# Tüm bileşenleri kopyala
php artisan vendor:publish --tag=flowbite-components

# Sadece belirli bileşenleri düzenlemek için
php artisan vendor:publish --tag=flowbite-views
```

Bileşenler `resources/views/components/ui/` dizinine kopyalanacaktır.

## Dokümantasyonu Yayınlama

```bash
php artisan vendor:publish --tag=flowbite-docs
```

Dokümantasyon `docs/flowbite/` dizinine kopyalanacaktır.

## Livewire ile Kullanım

Eğer Livewire kullanıyorsanız, ek kurulum gerektirmez. Tüm bileşenler Livewire ile uyumludur:

```blade
<div>
    <x-ui.form.input
        label="İsim"
        wire:model="name"
    />

    <x-ui.button
        wire:click="save"
        variant="primary"
    >
        Kaydet
    </x-ui.button>
</div>
```

## Dark Mode Ayarları

### Class-based Dark Mode

`tailwind.config.js`:

```js
module.exports = {
  darkMode: 'class',
  // ...
}
```

Layout'unuzda:

```blade
<html lang="en" class="dark">
```

### Toggle ile Dark Mode

```blade
<div x-data="{ darkMode: localStorage.getItem('darkMode') === 'true' }"
     x-init="$watch('darkMode', val => {
         localStorage.setItem('darkMode', val);
         val ? document.documentElement.classList.add('dark') : document.documentElement.classList.remove('dark');
     })"
     :class="{'dark': darkMode}">

    <x-ui.button @click="darkMode = !darkMode">
        <span x-show="!darkMode">🌙 Karanlık Mod</span>
        <span x-show="darkMode">☀️ Aydınlık Mod</span>
    </x-ui.button>

    <!-- Sayfa içeriği -->
</div>
```

## .env Yapılandırması

```env
# Component prefix (varsayılan: ui)
FLOWBITE_PREFIX=ui

# Dark mode desteği (varsayılan: true)
FLOWBITE_DARK_MODE=true

# CDN kullanımı (varsayılan: false)
FLOWBITE_CDN_ENABLED=false
```

## Sorun Giderme

### Bileşenler Görünmüyorsa

1. Cache'i temizleyin:
```bash
php artisan view:clear
php artisan config:clear
php artisan cache:clear
```

2. Tailwind build kontrol edin:
```bash
npm run build
```

3. Tailwind config'de paket yolunu kontrol edin

### Stil Uygulanmıyorsa

1. `tailwind.config.js` content yollarını kontrol edin
2. CSS'in doğru yüklendiğinden emin olun
3. Tarayıcı cache'ini temizleyin

### Alpine.js Çalışmıyorsa

1. Alpine.js'in yüklendiğinden emin olun
2. Browser console'da hata kontrolü yapın
3. Script tag sırasını kontrol edin

## Versiyon Uyumluluğu

| Flowbite Laravel | Laravel | PHP | Tailwind CSS |
|------------------|---------|-----|--------------|
| 1.x              | 10.x, 11.x | 8.1+ | 3.x |

## Sonraki Adımlar

- [📖 Dokümantasyonu İnceleyin](docs/README.md)
- [🎨 Bileşen Örneklerine Bakın](docs/components/examples.md)
- [⚙️ Yapılandırma Seçenekleri](config/flowbite-laravel.php)

## Destek

Sorun yaşıyorsanız:
- [GitHub Issues](https://github.com/destech-packages/flowbite-laravel/issues)
- [Dokümantasyon](docs/README.md)
- Email: dev@destech-packages.com
