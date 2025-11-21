# Flowbite Component Documentation

Welcome to the Flowbite Component System documentation. This guide provides comprehensive documentation for all reusable components used in the Flowbite project, built with Flowbite design system and Tailwind CSS.

## 📚 Quick Navigation

- [Component Standards](components/standards.md) - Development standards and best practices
- [Usage Examples](components/examples.md) - Real-world implementation examples

## 📦 Component Categories

### ✍️ Typography Components

Text-based components following Flowbite design system.

| Component | Description | Location |
|-----------|-------------|----------|
| [Heading](components/typography/heading.md) | H1-H6 headings with variants | `ui/typography/heading.blade.php` |
| [Paragraph](components/typography/paragraph.md) | Paragraph text with sizing | `ui/typography/paragraph.blade.php` |
| [Text](components/typography/text.md) | Inline text utilities and styling | `ui/typography/text.blade.php` |
| [Blockquote](components/typography/blockquote.md) | Quotes and testimonials | `ui/typography/blockquote.blade.php` |
| [Image](components/typography/image.md) | Typography images with captions | `ui/typography/image.blade.php` |
| [List](components/typography/list.md) | Ordered, unordered, and definition lists | `ui/typography/list.blade.php` |
| [Link](components/typography/link.md) | Hyperlinks with variants | `ui/typography/link.blade.php` |
| [HR](components/typography/hr.md) | Horizontal rules and dividers | `ui/typography/hr.blade.php` |

### 🎨 UI Components

Generic UI components for common interface patterns.

| Component | Description | Location |
|-----------|-------------|----------|
| [Avatar](components/ui/avatar.md) | User avatars with variants | `ui/avatar.blade.php` |
| [Button](components/ui/button.md) | Buttons with multiple styles | `ui/button.blade.php` |
| [Card](components/ui/card.md) | Flexible container component | `ui/card.blade.php` |
| [Badge](components/ui/badge.md) | Labels and tags | `ui/badge.blade.php` |
| [Alert](components/ui/alert.md) | Alert messages | `ui/alert.blade.php` |
| [Banner](components/ui/banner.md) | Top/bottom banners | `ui/banner.blade.php` |
| [Dropdown](components/ui/dropdown.md) | Dropdown menus | `ui/dropdown.blade.php` |
| [Accordion](components/ui/accordion.md) | Collapsible content | `ui/accordion.blade.php` |
| [Breadcrumb](components/ui/breadcrumb.md) | Navigation breadcrumbs | `ui/breadcrumb.blade.php` |
| [Bottom Nav](components/ui/bottom-nav.md) | Mobile bottom navigation | `ui/bottom-nav.blade.php` |
| [Spinner](components/ui/spinner.md) | Loading animations | `ui/spinner.blade.php` |
| [Data Table](components/ui/data-table.md) | Responsive data tables | `ui/data-table.blade.php` |
| [Clipboard](components/ui/clipboard.md) | Copy to clipboard functionality | `ui/clipboard.blade.php` |
| [Device Mockup](components/ui/device-mockup.md) | Device frames for screenshots | `ui/device-mockup/*.blade.php` |
| [Drawer](components/ui/drawer.md) | Off-canvas sidebars/panels | `ui/drawer.blade.php` |
| [Footer](components/ui/footer.md) | Footer sections with links | `ui/footer.blade.php` |
| [Gallery](components/ui/gallery.md) | Image galleries and grids | `ui/gallery.blade.php` |
| [Hero](components/ui/hero.md) | Hero/Jumbotron sections | `ui/hero.blade.php` |
| [Indicator](components/ui/indicator.md) | Status indicators and badges | `ui/indicator.blade.php` |
| [KBD](components/ui/kbd.md) | Keyboard input display | `ui/kbd.blade.php` |
| [List Group](components/ui/list-group.md) | Vertical lists with links/buttons | `ui/list-group.blade.php` |
| [Mega Menu](components/ui/mega-menu.md) | Full-width dropdown navigation | `ui/mega-menu.blade.php` |
| [Modal](components/ui/modal.md) | Dialog boxes and overlays | `ui/modal.blade.php` |
| [Navbar](components/ui/navbar.md) | Top navigation bar | `ui/navbar.blade.php` |
| [Pagination](components/ui/pagination.md) | Page navigation controls | `ui/pagination.blade.php` |
| [Popover](components/ui/popover.md) | Contextual tooltips and info | `ui/popover.blade.php` |
| [Progress](components/ui/progress.md) | Progress bars and indicators | `ui/progress.blade.php` |
| [Rating](components/ui/rating.md) | Star ratings and reviews | `ui/rating.blade.php` |
| [Sidebar](components/ui/sidebar.md) | Vertical navigation sidebars | `ui/sidebar.blade.php` |
| [Skeleton](components/ui/skeleton.md) | Loading state placeholders | `ui/skeleton.blade.php` |
| [Speed Dial](components/ui/speed-dial.md) | Floating action button menu | `ui/speed-dial.blade.php` |
| [Stepper](components/ui/stepper.md) | Multi-step progress indicator | `ui/stepper.blade.php` |
| [Table](components/ui/table.md) | Flexible table component | `ui/table.blade.php` |
| [Tabs](components/ui/tabs.md) | Tabbed interface navigation | `ui/tabs.blade.php` |
| [Timeline](components/ui/timeline.md) | Chronological event display | `ui/timeline.blade.php` |
| [Toast](components/ui/toast.md) | Notification messages | `ui/toast.blade.php` |
| [Tooltip](components/ui/tooltip.md) | Contextual help and information | `ui/tooltip.blade.php` |
| [Video](components/ui/video.md) | Video player with YouTube/Vimeo support | `ui/video.blade.php` |

### 📝 Form Components

Form input elements with validation support.

[📖 **View Complete Forms Guide**](components/forms/overview.md) - Comprehensive guide with full form examples

| Component | Description | Location |
|-----------|-------------|----------|
| [Input](components/forms/input.md) | Text input with validation | `ui/form/input.blade.php` |
| [Select](components/forms/select.md) | Dropdown select menus | `ui/form/select.blade.php` |
| [Textarea](components/forms/textarea.md) | Multi-line text input | `ui/form-textarea.blade.php` |
| [Checkbox](components/forms/checkbox.md) | Checkbox inputs | `ui/form/checkbox.blade.php` |
| [Radio](components/forms/radio.md) | Radio button inputs | `ui/form/radio.blade.php` |
| [Toggle](components/forms/toggle.md) | Toggle switches | `ui/form/toggle.blade.php` |
| [Range](components/forms/range.md) | Range slider inputs | `ui/form/range.blade.php` |
| [File Input](components/forms/file-input.md) | File upload inputs | `ui/form/file-input.blade.php` |
| [Search Input](components/forms/search-input.md) | Search input with variants | `ui/form/search-input.blade.php` |
| [Number Input](components/forms/number-input.md) | Numeric inputs with controls | `ui/form/number-input.blade.php` |
| [Phone Input](components/forms/phone-input.md) | Phone number inputs | `ui/form/phone-input.blade.php` |
| [Timepicker](components/forms/timepicker.md) | Time selection inputs | `ui/form/timepicker.blade.php` |
| [Datepicker](components/forms/datepicker.md) | Date selection with calendar | `ui/form/datepicker.blade.php` |
| [Radio Group](components/forms/radio-group.md) | Radio button groups | `ui/form-radio-group.blade.php` |
| [Floating Label](components/forms/floating-label.md) | Floating label inputs | `ui/form/floating-label.blade.php` |


### 🪟 Modal Components

Modal dialog and overlay components.

[📖 View Modal Components Documentation](components/modal/README.md)

- Modal Backdrop
- Modal Close Button
- Confirmation Modals
- Form Modals

### 🎠 Carousel Components

Image and content slider components.

[📖 View Carousel Components Documentation](components/carousel/README.md)

- Alpine.js Carousel
- Swiper.js Carousel

### 💬 Chat Components

Chat and messaging interface components.

[📖 View Chat Components Documentation](components/chat/README.md)

- Chat Bubbles
- Message Actions
- Delivery Status
- Voice Messages
- File Attachments
- Image Messages
- Link Previews

---

## 🚀 Getting Started

### Basic Usage

All components follow a consistent naming convention and can be used with Blade's component syntax:

```blade
{{-- Typography --}}
<x-ui.typography.heading level="1">
    My Heading
</x-ui.typography.heading>

{{-- UI Components --}}
<x-ui.button variant="primary" size="md">
    Click Me
</x-ui.button>

{{-- Form Components --}}
<x-ui.form.input
    label="Email"
    type="email"
    name="email"
/>

{{-- Clipboard --}}
<x-ui.clipboard
    label="API Key"
    value="your-api-key-here"
/>
```

### Component Structure

Components are organized in the following structure:

```
resources/views/components/
├── ui/                          # Generic UI components
│   ├── typography/              # Typography components
│   ├── form/                    # Form components
│   ├── button/                  # Button variants
│   ├── badge/                   # Badge variants
│   ├── alert/                   # Alert variants
│   ├── banner/                  # Banner variants
│   ├── dropdown/                # Dropdown components
│   ├── accordion/               # Accordion components
│   ├── breadcrumb/              # Breadcrumb components
│   ├── bottom-nav/              # Bottom navigation
│   ├── avatar/                  # Avatar variants
│   └── clipboard/               # Clipboard variants
└── modal/                       # Modal components
```

### Documentation Structure

Documentation is organized by component type:

```
docs/
├── README.md                    # This file
├── components/
│   ├── standards.md            # Development standards
│   ├── examples.md             # Usage examples
│   ├── typography/             # Typography docs
│   ├── ui/                     # UI component docs
│   ├── forms/                  # Form component docs
│   ├── modal/                  # Modal component docs
│   ├── carousel/               # Carousel component docs
│   └── chat/                   # Chat component docs
└── COMPONENTS_GUIDE.md         # Original comprehensive guide
```

---

## 🎯 Key Features

### Design System

- ✅ **Flowbite-based** - Follows Flowbite design patterns
- ✅ **Tailwind CSS** - Utility-first styling
- ✅ **Dark Mode** - Full dark mode support
- ✅ **Responsive** - Mobile-first approach
- ✅ **Accessible** - WCAG 2.1 AA compliant

### Developer Experience

- ✅ **Reusable** - DRY principle applied
- ✅ **Documented** - Comprehensive documentation
- ✅ **Type-safe** - Props validation
- ✅ **Customizable** - Easy to extend
- ✅ **Livewire Ready** - Seamless Livewire integration

### Component Features

- ✅ **Props validation** - Clear prop definitions
- ✅ **Slot support** - Flexible content insertion
- ✅ **Event handling** - Livewire events
- ✅ **State management** - Alpine.js integration
- ✅ **Icon support** - SVG icons included

---

## 📖 Documentation Guides

### For Developers

1. **[Component Standards](components/standards.md)** - Learn about naming conventions, prop best practices, and development guidelines
2. **[Usage Examples](components/examples.md)** - See real-world examples and implementation patterns
3. **Component-specific docs** - Detailed documentation for each component type

### Quick Links

- [Typography Components](components/typography/)
- [UI Components](components/ui/)
- [Form Components](components/forms/)
- [Modal Components](components/modal/README.md)
- [Carousel Components](components/carousel/README.md)
- [Chat Components](components/chat/README.md)

---

## 🤝 Contributing

When adding new components:

1. Follow the [Component Standards](components/standards.md)
2. Create comprehensive documentation
3. Include usage examples
4. Add props table
5. Test for accessibility
6. Ensure responsive design
7. Support dark mode

---

## 📚 Resources

- [Flowbite Documentation](https://flowbite.com)
- [Tailwind CSS Documentation](https://tailwindcss.com)
- [Laravel Blade Components](https://laravel.com/docs/blade#components)
- [Livewire Documentation](https://laravel-livewire.com)
- [Alpine.js Documentation](https://alpinejs.dev)

---

## 🔄 Migration Note

This documentation structure replaces the single `COMPONENTS_GUIDE.md` file with a modular, organized system. The original guide is still available at `docs/COMPONENTS_GUIDE.md` for reference.

### Benefits of New Structure

- ✅ **Easier Navigation** - Find components quickly
- ✅ **Better Organization** - Logical categorization
- ✅ **Maintainability** - Update individual components
- ✅ **Searchability** - Better search results
- ✅ **Scalability** - Easy to add new components

---

**Last Updated:** 2025-11-20
**Version:** 2.0.0
**Maintained by:** Flowbite Development Team
