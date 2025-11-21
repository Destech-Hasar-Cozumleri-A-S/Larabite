# Modal Components

Modal components provide overlay dialogs for displaying content above the main page. These components are used throughout the Flowbite application for various interactions.

## Components Location

All modal components are located in: `resources/views/components/modal/`

---

## Modal Backdrop

The backdrop/container for modal dialogs with overlay and positioning.

**Location:** `resources/views/components/modal/backdrop.blade.php`

### Usage

```blade
<x-modal.backdrop :show="true">
    <div class="bg-white rounded-lg p-6">
        Modal content here...
    </div>
</x-modal.backdrop>
```

### Props

- `show` (boolean, required): Controls modal visibility

### Features

- Full-screen dark overlay (backdrop)
- Centered content positioning
- Click outside to close (optional)
- Smooth fade-in/fade-out transitions
- Prevents body scroll when open
- Z-index management for proper layering
- Dark mode support

### Example

```blade
{{-- Basic Modal --}}
<x-modal.backdrop :show="$showModal">
    <div class="bg-white dark:bg-gray-800 rounded-lg shadow-xl max-w-lg w-full mx-4">
        <div class="p-6">
            <h2 class="text-xl font-bold text-gray-900 dark:text-white mb-4">
                Modal Title
            </h2>
            <p class="text-gray-600 dark:text-gray-300 mb-6">
                Modal content goes here...
            </p>
            <div class="flex justify-end space-x-3">
                <button class="px-4 py-2 bg-gray-300 rounded-lg">Cancel</button>
                <button class="px-4 py-2 bg-blue-600 text-white rounded-lg">Confirm</button>
            </div>
        </div>
    </div>
</x-modal.backdrop>
```

### Technical Details

The backdrop component typically includes:
- Fixed positioning (`fixed inset-0`)
- Semi-transparent background (`bg-black/50`)
- Flex centering (`flex items-center justify-center`)
- High z-index for proper layering
- Transition effects for smooth appearance

---

## Modal Close Button

Close button for modals with consistent styling.

**Location:** `resources/views/components/modal/close-button.blade.php`

### Usage

```blade
<x-modal.close-button />
```

### Features

- Positioned in top-right corner
- X icon (close symbol)
- Hover effects
- Consistent styling across all modals
- Accessible with keyboard
- Dark mode support

### Example

```blade
<div class="relative bg-white rounded-lg p-6">
    {{-- Close button in top-right --}}
    <x-modal.close-button />

    <h2 class="text-xl font-bold mb-4">Modal Title</h2>
    <p>Content...</p>
</div>
```

### Styling

The close button typically uses:
- Absolute positioning (top-right)
- SVG X icon
- Gray color with hover state
- Circular or square background on hover
- Minimum 44x44px touch target

---

## Real-World Usage Examples

### Confirmation Modal

```blade
<x-modal.backdrop :show="$showDeleteConfirm">
    <div class="bg-white dark:bg-gray-800 rounded-lg shadow-xl max-w-md w-full mx-4">
        <div class="p-6">
            <x-modal.close-button />

            <div class="text-center">
                <svg class="w-12 h-12 mx-auto text-red-600 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>
                </svg>

                <h2 class="text-xl font-bold text-gray-900 dark:text-white mb-2">
                    Delete Post?
                </h2>
                <p class="text-gray-600 dark:text-gray-300 mb-6">
                    Are you sure you want to delete this post? This action cannot be undone.
                </p>

                <div class="flex justify-center space-x-3">
                    <button
                        wire:click="$set('showDeleteConfirm', false)"
                        class="px-6 py-2 bg-gray-300 hover:bg-gray-400 text-gray-900 rounded-lg transition"
                    >
                        Cancel
                    </button>
                    <button
                        wire:click="deletePost"
                        class="px-6 py-2 bg-red-600 hover:bg-red-700 text-white rounded-lg transition"
                    >
                        Delete
                    </button>
                </div>
            </div>
        </div>
    </div>
</x-modal.backdrop>
```

### Form Modal

```blade
<x-modal.backdrop :show="$showCreateModal">
    <div class="bg-white dark:bg-gray-800 rounded-lg shadow-xl max-w-2xl w-full mx-4 max-h-[90vh] overflow-y-auto">
        <div class="sticky top-0 bg-white dark:bg-gray-800 border-b border-gray-200 dark:border-gray-700 px-6 py-4">
            <div class="flex items-center justify-between">
                <h2 class="text-xl font-bold text-gray-900 dark:text-white">
                    Create New Post
                </h2>
                <x-modal.close-button />
            </div>
        </div>

        <form wire:submit.prevent="createPost" class="p-6">
            <div class="mb-4">
                <x-ui.form.input
                    label="Post Title"
                    name="title"
                    wire:model="title"
                    :error="$errors->first('title')"
                />
            </div>

            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                    Content
                </label>
                <textarea
                    wire:model="content"
                    rows="4"
                    class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white"
                ></textarea>
                @error('content')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex justify-end space-x-3">
                <button
                    type="button"
                    wire:click="$set('showCreateModal', false)"
                    class="px-6 py-2 bg-gray-300 hover:bg-gray-400 text-gray-900 rounded-lg transition"
                >
                    Cancel
                </button>
                <button
                    type="submit"
                    class="px-6 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-lg transition"
                >
                    Create Post
                </button>
            </div>
        </form>
    </div>
</x-modal.backdrop>
```

### Image Preview Modal

```blade
<x-modal.backdrop :show="$showImagePreview">
    <div class="relative max-w-7xl w-full mx-4">
        <x-modal.close-button />

        <img
            src="{{ $previewImage }}"
            alt="Preview"
            class="w-full h-auto max-h-[90vh] object-contain rounded-lg"
        >

        {{-- Navigation for gallery --}}
        @if($hasMultipleImages)
            <button
                wire:click="previousImage"
                class="absolute left-4 top-1/2 -translate-y-1/2 bg-white/90 hover:bg-white rounded-full p-3 shadow-lg"
            >
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                </svg>
            </button>

            <button
                wire:click="nextImage"
                class="absolute right-4 top-1/2 -translate-y-1/2 bg-white/90 hover:bg-white rounded-full p-3 shadow-lg"
            >
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                </svg>
            </button>
        @endif

        {{-- Image counter --}}
        <div class="absolute bottom-4 left-1/2 -translate-x-1/2 bg-black/60 text-white px-4 py-2 rounded-full text-sm">
            {{ $currentImageIndex + 1 }} / {{ $totalImages }}
        </div>
    </div>
</x-modal.backdrop>
```

### List Selection Modal

```blade
<x-modal.backdrop :show="$showSelector">
    <div class="bg-white dark:bg-gray-800 rounded-lg shadow-xl max-w-md w-full mx-4 max-h-[80vh] flex flex-col">
        <div class="border-b border-gray-200 dark:border-gray-700 px-6 py-4">
            <div class="flex items-center justify-between">
                <h2 class="text-xl font-bold text-gray-900 dark:text-white">
                    Select Pet
                </h2>
                <x-modal.close-button />
            </div>
        </div>

        <div class="flex-1 overflow-y-auto p-6">
            <div class="space-y-3">
                @foreach($items as $item)
                    <button
                        wire:click="selectPet({{ $item->id }})"
                        class="w-full flex items-center space-x-3 p-3 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-700 transition"
                    >
                        <img
                            src="{{ $item->avatar_url }}"
                            alt="{{ $item->name }}"
                            class="w-12 h-12 rounded-full object-cover"
                        >
                        <div class="flex-1 text-left">
                            <p class="font-semibold text-gray-900 dark:text-white">
                                {{ $item->name }}
                            </p>
                            <p class="text-sm text-gray-600 dark:text-gray-400">
                                {{ $item->sub_title }}
                            </p>
                        </div>
                        @if($selectedPetId === $item->id)
                            <svg class="w-5 h-5 text-blue-600" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                            </svg>
                        @endif
                    </button>
                @endforeach
            </div>
        </div>
    </div>
</x-modal.backdrop>
```

---

## Best Practices

### 1. Accessibility

```blade
{{-- Add ARIA attributes --}}
<div
    role="dialog"
    aria-modal="true"
    aria-labelledby="modal-title"
    class="fixed inset-0 z-50"
>
    <h2 id="modal-title" class="text-xl font-bold">
        Modal Title
    </h2>
</div>

{{-- Trap focus within modal --}}
<div
    x-data="{ modalOpen: true }"
    x-trap="modalOpen"
>
    <!-- Modal content -->
</div>
```

### 2. Keyboard Navigation

- Close on `Esc` key press
- Tab through interactive elements
- Auto-focus first input on open
- Return focus to trigger element on close

```blade
<div
    x-data="{ open: @entangle('showModal') }"
    @keydown.escape.window="open = false"
>
    <!-- Modal content -->
</div>
```

### 3. Scroll Management

```blade
{{-- Prevent body scroll when modal is open --}}
<div
    x-data="{ open: @entangle('showModal') }"
    x-effect="open ? document.body.classList.add('overflow-hidden') : document.body.classList.remove('overflow-hidden')"
>
    <!-- Modal content -->
</div>
```

### 4. Responsive Design

```blade
{{-- Mobile-friendly modal --}}
<div class="fixed inset-0 z-50 flex items-end sm:items-center justify-center p-4">
    <div class="bg-white rounded-t-xl sm:rounded-lg max-w-lg w-full">
        <!-- Modal content -->
    </div>
</div>
```

### 5. Loading States

```blade
<button
    wire:click="submitForm"
    wire:loading.attr="disabled"
    wire:loading.class="opacity-50 cursor-not-allowed"
    class="px-6 py-2 bg-blue-600 text-white rounded-lg"
>
    <span wire:loading.remove>Submit</span>
    <span wire:loading>
        <svg class="animate-spin h-5 w-5 inline-block" viewBox="0 0 24 24">
            <!-- Spinner icon -->
        </svg>
        Processing...
    </span>
</button>
```

---

## Livewire Integration

### Component Example

```php
// In Livewire component
class PostManager extends Component
{
    public bool $showModal = false;
    public string $title = '';
    public string $content = '';

    public function openModal()
    {
        $this->showModal = true;
        $this->reset(['title', 'content']);
    }

    public function closeModal()
    {
        $this->showModal = false;
    }

    public function save()
    {
        $this->validate([
            'title' => 'required|min:3',
            'content' => 'required',
        ]);

        Post::create([
            'title' => $this->title,
            'content' => $this->content,
            'user_id' => auth()->id(),
        ]);

        $this->closeModal();
        $this->dispatch('post-created');
    }
}
```

### View Template

```blade
<div>
    <button wire:click="openModal">
        Open Modal
    </button>

    <x-modal.backdrop :show="$showModal">
        <div class="bg-white rounded-lg max-w-lg w-full">
            <form wire:submit.prevent="save">
                <!-- Form content -->
            </form>
        </div>
    </x-modal.backdrop>
</div>
```

---

## Common Modal Patterns

### 1. Alert/Notification
- Single button (OK/Close)
- Icon for visual context
- Clear message

### 2. Confirmation
- Two buttons (Cancel/Confirm)
- Warning icon for destructive actions
- Clear consequence description

### 3. Form
- Input fields
- Cancel and Submit buttons
- Validation error display
- Scrollable content area

### 4. Preview
- Full-screen or large content area
- Navigation for galleries
- Download/share actions

### 5. Selection
- List of options
- Search functionality
- Selected state indicator

---

## Notes

- All modals use Tailwind CSS for styling
- Z-index: 50 or higher for proper layering
- Dark mode variants included
- Mobile-first responsive design
- Livewire wire:model for two-way binding
- Alpine.js for interactive behaviors
- Smooth transitions for better UX
- Click outside to close (implement with @click.away)
