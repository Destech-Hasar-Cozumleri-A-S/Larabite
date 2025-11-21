# Flowbite Laravel Components

<p align="center">
<img src="https://flowbite.com/docs/images/logo.svg" width="400" alt="Flowbite Laravel">
</p>

<p align="center">
<a href="https://packagist.org/packages/destech-packages/flowbite-laravel"><img src="https://img.shields.io/packagist/v/destech-packages/flowbite-laravel" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/destech-packages/flowbite-laravel"><img src="https://img.shields.io/packagist/dt/destech-packages/flowbite-laravel" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/destech-packages/flowbite-laravel"><img src="https://img.shields.io/packagist/l/destech-packages/flowbite-laravel" alt="License"></a>
</p>

## Hakkında

Flowbite Laravel Components, **60+ önceden oluşturulmuş UI bileşeni** içeren eksiksiz bir Laravel paketi. Flowbite tasarım sistemini takip ederek, Tailwind CSS, Alpine.js ve Livewire ile sorunsuz entegrasyon sağlar.

### ✨ Özellikler

- ✅ **60+ Hazır Bileşen** - Typography, UI, Form bileşenleri
- ✅ **Flowbite Tasarım Sistemi** - Profesyonel ve tutarlı tasarım
- ✅ **Tailwind CSS** - Utility-first CSS framework
- ✅ **Alpine.js Entegrasyonu** - Reaktif bileşenler
- ✅ **Livewire Desteği** - Full-stack Laravel deneyimi
- ✅ **Dark Mode** - Tam karanlık mod desteği
- ✅ **Responsive** - Mobil-öncelikli tasarım
- ✅ **Accessible** - WCAG 2.1 AA uyumlu
- ✅ **Türkçe Dokümantasyon** - Detaylı kullanım kılavuzu

## Kurulum

Composer ile paketi yükleyin:

```bash
composer require destech-hasar-cozumleri-a-s/larabite
```

Service provider otomatik olarak keşfedilecektir (Laravel 5.5+).

### Yapılandırma Dosyasını Yayınlama

```bash
php artisan vendor:publish --tag=flowbite-config
```

### Bileşenleri Yayınlama (Özelleştirmek İçin)

```bash
# Tüm bileşenleri yayınla
php artisan vendor:publish --tag=flowbite-components

# Sadece görünümleri yayınla
php artisan vendor:publish --tag=flowbite-views

# Dokümantasyonu yayınla
php artisan vendor:publish --tag=flowbite-docs

# Her şeyi yayınla
php artisan vendor:publish --tag=flowbite-all
```

## Hızlı Başlangıç

### 1. Tailwind CSS Kurulumu

`tailwind.config.js` dosyanıza paket yollarını ekleyin:

```js
module.exports = {
  content: [
    './resources/**/*.blade.php',
    './resources/**/*.js',
    './vendor/destech-packages/flowbite-laravel/resources/**/*.blade.php',
  ],
  theme: {
    extend: {},
  },
  plugins: [
    require('flowbite/plugin')
  ],
}
```

### 2. Alpine.js Kurulumu

```bash
npm install alpinejs
```

`resources/js/app.js`:

```js
import Alpine from 'alpinejs'

window.Alpine = Alpine

Alpine.start()
```

### 3. İlk Bileşeninizi Kullanın

```blade
<x-ui.button variant="primary" size="md">
    Tıkla
</x-ui.button>

<x-ui.card shadow="true">
    <x-ui.typography.heading level="2">
        Kart Başlığı
    </x-ui.typography.heading>
    <x-ui.typography.paragraph>
        Kart içeriği buraya gelir.
    </x-ui.typography.paragraph>
</x-ui.card>

<x-ui.alert variant="success" dismissible="true">
    İşlem başarıyla tamamlandı!
</x-ui.alert>
```

## Bileşen Kategorileri

### ✍️ Typography Bileşenleri (8)

Text tabanlı bileşenler:

```blade
<x-ui.typography.heading level="1">Başlık</x-ui.typography.heading>
<x-ui.typography.paragraph>Paragraf metni</x-ui.typography.paragraph>
<x-ui.typography.text variant="lead">Öne çıkan metin</x-ui.typography.text>
<x-ui.typography.blockquote>Alıntı</x-ui.typography.blockquote>
<x-ui.typography.list type="ordered">Liste</x-ui.typography.list>
<x-ui.typography.link href="#">Bağlantı</x-ui.typography.link>
<x-ui.typography.hr variant="default" />
```

[📖 Typography Dokümantasyonu](docs/components/typography/)

### 🎨 UI Bileşenleri (38)

Genel arayüz bileşenleri:

```blade
{{-- Temel Bileşenler --}}
<x-ui.button variant="primary">Buton</x-ui.button>
<x-ui.badge variant="success">Rozet</x-ui.badge>
<x-ui.card>Kart</x-ui.card>
<x-ui.alert variant="info">Uyarı</x-ui.alert>
<x-ui.avatar src="..." />

{{-- Navigasyon --}}
<x-ui.navbar />
<x-ui.breadcrumb />
<x-ui.tabs />
<x-ui.pagination />

{{-- Bildirim --}}
<x-ui.toast type="success">Başarılı!</x-ui.toast>
<x-ui.tooltip content="Yardım">İkon</x-ui.tooltip>

{{-- Medya --}}
<x-ui.video type="youtube" src="..." />
<x-ui.gallery />

{{-- Veri Gösterimi --}}
<x-ui.table />
<x-ui.timeline />
<x-ui.stepper />
<x-ui.progress value="75" />
```

[📖 UI Bileşenleri Dokümantasyonu](docs/components/ui/)

### 📝 Form Bileşenleri (14)

Doğrulama desteği ile form elemanları:

```blade
<x-ui.form.input
    label="E-posta"
    type="email"
    name="email"
    required
/>

<x-ui.form.select
    label="Kategori"
    name="category"
    :options="$categories"
/>

<x-ui.form.textarea
    label="Açıklama"
    name="description"
    rows="4"
/>

<x-ui.form.checkbox
    label="Kabul ediyorum"
    name="terms"
/>

<x-ui.form.toggle
    label="Bildirimleri aç"
    name="notifications"
/>

<x-ui.form.datepicker
    label="Tarih Seçin"
    name="date"
/>

<x-ui.form.file-input
    label="Dosya Yükle"
    name="file"
    accept="image/*"
/>
```

[📖 Form Bileşenleri Dokümantasyonu](docs/components/forms/)

## Livewire Entegrasyonu

Tüm bileşenler Livewire ile sorunsuz çalışır:

```php
<?php

namespace App\Livewire;

use Livewire\Component;

class UserProfile extends Component
{
    public $name;
    public $email;
    public $showToast = false;

    public function save()
    {
        $this->validate([
            'name' => 'required',
            'email' => 'required|email',
        ]);

        // Kaydetme işlemi...

        $this->showToast = true;
    }

    public function render()
    {
        return view('livewire.user-profile');
    }
}
```

```blade
{{-- livewire/user-profile.blade.php --}}
<div>
    <x-ui.card>
        <form wire:submit.prevent="save">
            <x-ui.form.input
                label="İsim"
                wire:model="name"
            />

            <x-ui.form.input
                label="E-posta"
                type="email"
                wire:model="email"
            />

            <x-ui.button type="submit" variant="primary">
                Kaydet
            </x-ui.button>
        </form>
    </x-ui.card>

    @if($showToast)
        <x-ui.toast type="success">
            Profil güncellendi!
        </x-ui.toast>
    @endif
</div>
```

## Özelleştirme

### Varsayılan Değerleri Değiştirme

`config/flowbite-laravel.php`:

```php
return [
    'prefix' => 'ui', // Bileşen prefix'i

    'defaults' => [
        'button' => [
            'variant' => 'primary',
            'size' => 'md',
        ],
        'card' => [
            'shadow' => true,
            'border' => true,
        ],
    ],

    'dark_mode' => true, // Dark mode desteği
];
```

### Bileşenleri Özelleştirme

Bileşenleri yayınladıktan sonra `resources/views/components/ui/` dizininde özelleştirebilirsiniz:

```bash
php artisan vendor:publish --tag=flowbite-components
```

### Prefix Değiştirme

`.env` dosyanızda:

```env
FLOWBITE_PREFIX=flowbite
```

Artık bileşenleri şu şekilde kullanabilirsiniz:

```blade
<x-flowbite.button>Buton</x-flowbite.button>
```

## Popüler Bileşenler

### Modal (Dialog)

```blade
<div x-data="{ open: false }">
    <x-ui.button @click="open = true">
        Modal Aç
    </x-ui.button>

    <x-ui.modal
        x-show="open"
        @close="open = false"
        title="Onay"
    >
        <p>Bu işlemi onaylıyor musunuz?</p>

        <x-slot:footer>
            <x-ui.button
                @click="open = false"
                variant="outline"
            >
                İptal
            </x-ui.button>
            <x-ui.button
                variant="primary"
                wire:click="confirm"
            >
                Onayla
            </x-ui.button>
        </x-slot:footer>
    </x-ui.modal>
</div>
```

### Dropdown Menu

```blade
<x-ui.dropdown>
    <x-slot:trigger>
        <x-ui.button variant="outline">
            Menü
            <svg class="w-4 h-4 ml-2" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"/>
            </svg>
        </x-ui.button>
    </x-slot:trigger>

    <x-ui.dropdown.item href="/profile">
        Profil
    </x-ui.dropdown.item>
    <x-ui.dropdown.item href="/settings">
        Ayarlar
    </x-ui.dropdown.item>
    <x-ui.dropdown.divider />
    <x-ui.dropdown.item href="/logout">
        Çıkış
    </x-ui.dropdown.item>
</x-ui.dropdown>
```

### Data Table

```blade
<x-ui.table striped hover>
    <x-ui.table.head>
        <x-ui.table.row>
            <x-ui.table.header sortable>İsim</x-ui.table.header>
            <x-ui.table.header>E-posta</x-ui.table.header>
            <x-ui.table.header>Durum</x-ui.table.header>
            <x-ui.table.header>İşlemler</x-ui.table.header>
        </x-ui.table.row>
    </x-ui.table.head>

    <x-ui.table.body>
        @foreach($users as $user)
            <x-ui.table.row>
                <x-ui.table.cell>{{ $user->name }}</x-ui.table.cell>
                <x-ui.table.cell>{{ $user->email }}</x-ui.table.cell>
                <x-ui.table.cell>
                    <x-ui.badge :variant="$user->active ? 'success' : 'error'">
                        {{ $user->active ? 'Aktif' : 'Pasif' }}
                    </x-ui.badge>
                </x-ui.table.cell>
                <x-ui.table.cell>
                    <x-ui.button size="sm" variant="ghost">
                        Düzenle
                    </x-ui.button>
                </x-ui.table.cell>
            </x-ui.table.row>
        @endforeach
    </x-ui.table.body>
</x-ui.table>
```

### Tabs

```blade
<x-ui.tabs defaultTab="profile">
    <x-ui.tabs.item id="profile" variant="underline">
        Profil
    </x-ui.tabs.item>
    <x-ui.tabs.item id="settings" variant="underline">
        Ayarlar
    </x-ui.tabs.item>
    <x-ui.tabs.item id="billing" variant="underline">
        Faturalama
    </x-ui.tabs.item>

    <x-ui.tabs.panel id="profile">
        <p>Profil içeriği</p>
    </x-ui.tabs.panel>

    <x-ui.tabs.panel id="settings">
        <p>Ayarlar içeriği</p>
    </x-ui.tabs.panel>

    <x-ui.tabs.panel id="billing">
        <p>Faturalama içeriği</p>
    </x-ui.tabs.panel>
</x-ui.tabs>
```

## Gereksinimler

- PHP 8.1 veya üzeri
- Laravel 10.x veya 11.x
- Tailwind CSS 3.x
- Alpine.js 3.x (opsiyonel, bazı bileşenler için)

## Dokümantasyon

Detaylı dokümantasyon için:

```bash
php artisan vendor:publish --tag=flowbite-docs
```

Yayınlandıktan sonra `docs/flowbite/` dizininde bulabilirsiniz.

### Çevrimiçi Dokümantasyon

- [Başlangıç Kılavuzu](docs/README.md)
- [Typography Bileşenleri](docs/components/typography/)
- [UI Bileşenleri](docs/components/ui/)
- [Form Bileşenleri](docs/components/forms/)
- [Geliştirme Standartları](docs/components/standards.md)
- [Kullanım Örnekleri](docs/components/examples.md)

## Bileşen Listesi

### Typography (8 Bileşen)
- Heading, Paragraph, Text, Blockquote, Image, List, Link, HR

### UI (38 Bileşen)
- Accordion, Alert, Avatar, Badge, Banner, Bottom Nav, Breadcrumb, Button, Card, Clipboard, Data Table, Device Mockup, Drawer, Dropdown, Footer, Gallery, Hero, Indicator, KBD, List Group, Mega Menu, Modal, Navbar, Pagination, Popover, Progress, Rating, Sidebar, Skeleton, Speed Dial, Spinner, Stepper, Table, Tabs, Timeline, Toast, Tooltip, Video

### Form (14 Bileşen)
- Input, Select, Textarea, Checkbox, Radio, Toggle, Range, File Input, Search Input, Number Input, Phone Input, Datepicker, Timepicker, Floating Label

## Örnekler

Daha fazla örnek için `examples/` dizinine bakın:

```bash
php artisan vendor:publish --tag=flowbite-examples
```

## Changelog

Tüm değişiklikler için [CHANGELOG.md](CHANGELOG.md) dosyasına bakın.

## Katkıda Bulunma

Katkılarınızı bekliyoruz! Lütfen [CONTRIBUTING.md](CONTRIBUTING.md) dosyasını okuyun.

## Güvenlik

Güvenlik açıkları için lütfen [SECURITY.md](SECURITY.md) dosyasını okuyun.

## Lisans

MIT Lisansı. Detaylar için [LICENSE.md](LICENSE.md) dosyasına bakın.

## Credits

- [Flowbite](https://flowbite.com) - UI component library
- [Tailwind CSS](https://tailwindcss.com) - CSS framework
- [Alpine.js](https://alpinejs.dev) - JavaScript framework
- [Laravel](https://laravel.com) - PHP framework
- [Livewire](https://laravel-livewire.com) - Full-stack framework

## Destek

- 📧 Email: erman.titiz@destechhasar.com
- 🐛 Issues: [GitHub Issues](https://github.com/destech-packages/flowbite-laravel/issues)
- 💬 Discussions: [GitHub Discussions](https://github.com/destech-packages/flowbite-laravel/discussions)

---

**Destech Development Team** tarafından ❤️ ile geliştirildi.
