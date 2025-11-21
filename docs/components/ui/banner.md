# Banner

Banner components for displaying announcements and notifications at the top or bottom of pages.

## Components

- **Banner** - `resources/views/components/ui/banner.blade.php`
- **Banner CTA** - `resources/views/components/ui/banner/cta.blade.php`
- **Banner Newsletter** - `resources/views/components/ui/banner/newsletter.blade.php`
- **Banner Cookie** - `resources/views/components/ui/banner/cookie.blade.php`

## Features

- Top/Bottom positioning
- 4 color variants (info, success, warning, danger)
- Dismissible (closeable)
- Fixed positioning
- Full-width display
- CTA (Call-to-Action) support
- Newsletter subscription form
- Cookie consent functionality

## Usage

### Top Banner

```blade
<x-ui::banner position="top" variant="info">
    <span class="me-2">🎉</span>
    New features are now available!
    <a href="#" class="ms-2 font-medium underline hover:no-underline">Learn more</a>
</x-ui::banner>
```

### Bottom Banner

```blade
<x-ui::banner position="bottom" variant="success" :dismissible="true">
    Your changes have been saved successfully!
</x-ui::banner>
```

### All Variants

```blade
<x-ui::banner variant="info">Information banner</x-ui::banner>
<x-ui::banner variant="success">Success banner</x-ui::banner>
<x-ui::banner variant="warning">Warning banner</x-ui::banner>
<x-ui::banner variant="danger">Danger banner</x-ui::banner>
```

### Banner CTA

```blade
<x-ui::banner.cta
    position="top"
    title="Get 5% commission every month"
    description="Join our affiliate program and earn commission on every sale"
    ctaText="Sign up now"
    ctaHref="{{ route('affiliate.signup') }}"
>
    <x-slot:icon>
        <img src="/logo.png" class="h-6 me-2" alt="Logo">
    </x-slot:icon>
</x-ui::banner.cta>
```

### Banner Newsletter

```blade
<x-ui::banner.newsletter
    position="bottom"
    title="Sign up for our newsletter"
    description="Get the latest news and updates delivered to your inbox"
    placeholder="Enter your email"
    buttonText="Subscribe"
    wireSubmit="subscribe"
    wire:model="email"
/>
```

### Banner Cookie

```blade
<x-ui::banner.cookie
    position="bottom"
    title="Cookie Consent"
    description="We use cookies to enhance your browsing experience, serve personalized ads or content, and analyze our traffic."
    acceptText="Accept All"
    declineText="Decline"
    settingsText="Settings"
    acceptAction="acceptCookies"
    declineAction="declineCookies"
    settingsAction="{{ route('cookie.settings') }}"
/>
```

## Props

### Banner Component

| Prop | Type | Default | Description |
|------|------|---------|-------------|
| `position` | string | 'top' | Banner position: top, bottom |
| `variant` | string | 'info' | Color variant: info, success, warning, danger |
| `dismissible` | boolean | true | Can be dismissed by user |
| `id` | string | optional | Custom ID |

### Banner CTA Props

| Prop | Type | Default | Description |
|------|------|---------|-------------|
| `position` | string | 'top' | Banner position: top, bottom |
| `title` | string | required | Banner title |
| `description` | string | required | Description text |
| `ctaText` | string | optional | CTA button text |
| `ctaHref` | string | '#' | CTA button link |
| `dismissible` | boolean | true | Can be dismissed by user |
| `id` | string | optional | Custom ID |
| `icon` | slot | optional | Logo/icon slot |

### Banner Newsletter Props

| Prop | Type | Default | Description |
|------|------|---------|-------------|
| `position` | string | 'bottom' | Banner position: top, bottom |
| `title` | string | required | Banner title |
| `description` | string | required | Description text |
| `placeholder` | string | 'Enter your email' | Input placeholder |
| `buttonText` | string | 'Subscribe' | Submit button text |
| `dismissible` | boolean | true | Can be dismissed by user |
| `wireSubmit` | string | optional | Livewire submit method |
| `id` | string | optional | Custom ID |

### Banner Cookie Props

| Prop | Type | Default | Description |
|------|------|---------|-------------|
| `position` | string | 'bottom' | Banner position: top, bottom |
| `title` | string | 'Cookie Consent' | Banner title |
| `description` | string | required | Description text |
| `acceptText` | string | 'Accept All' | Accept button text |
| `declineText` | string | 'Decline' | Decline button text |
| `settingsText` | string | 'Settings' | Settings button text |
| `acceptAction` | string | optional | Accept action (Livewire method or URL) |
| `declineAction` | string | optional | Decline action |
| `settingsAction` | string | optional | Settings action |
| `id` | string | optional | Custom ID |

## Best Practices

1. **Position**: Use top banners for important announcements, bottom banners for less critical notifications

2. **Variant Selection**:
   - `info`: General announcements, new features
   - `success`: Confirm successful actions
   - `warning`: Important notices that need attention
   - `danger`: Critical alerts or errors

3. **Dismissible**: Allow users to dismiss non-critical banners

4. **Persistence**: Use localStorage to remember when a user dismisses a banner

5. **Cookie Consent**: Implement proper cookie consent before tracking users

6. **Newsletter**: Validate email addresses and show success/error states

7. **CTA Clarity**: Make call-to-action text clear and actionable

8. **Mobile**: Test banner layouts on mobile devices to ensure readability

9. **Z-Index**: Banners use fixed positioning; ensure proper z-index layering

10. **Animation**: Consider adding smooth transitions for banner appearance and dismissal

## Examples

### Marketing Campaign Banner

```blade
<x-ui::banner.cta
    position="top"
    variant="info"
    title="Limited Time Offer"
    description="Get 20% off all premium plans this week only"
    ctaText="View Plans"
    ctaHref="{{ route('pricing') }}"
>
    <x-slot:icon>
        <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 20 20">
            <path d="M10 2a6 6 0 00-6 6v3.586l-.707.707A1 1 0 004 14h12a1 1 0 00.707-1.707L16 11.586V8a6 6 0 00-6-6z"/>
        </svg>
    </x-slot:icon>
</x-ui::banner.cta>
```

### Maintenance Notice

```blade
<x-ui::banner position="top" variant="warning" :dismissible="false">
    <span class="font-medium">Scheduled Maintenance:</span>
    The site will be under maintenance on Sunday, 2-4 AM EST.
</x-ui::banner>
```

### Feature Announcement

```blade
<x-ui::banner position="top" variant="success">
    🎉 We've just launched dark mode!
    <a href="{{ route('settings') }}" class="ms-2 font-medium underline hover:no-underline">
        Try it now
    </a>
</x-ui::banner>
```