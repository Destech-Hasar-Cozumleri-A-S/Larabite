# Form Textarea Component

Multi-line text input component with validation states, helper text, sizes, character count and dark mode support.

## Component Location

**File Path:** `resources/views/components/ui/form/textarea.blade.php`

## Features

- **Sizes** - Small, base, and large sizes
- **Validation States** - Error, success, and normal states
- **Helper Text** - Supporting text below textarea
- **Character Count** - Optional character counter
- **Max Length** - Character limit with visual feedback
- **Readonly Mode** - Non-editable display
- **Disabled State** - Visual disabled state
- **Required Field** - Asterisk indicator
- **Dark Mode** - Full dark mode support
- **Livewire Integration** - Wire:model support
- **Resize Control** - Vertical resize enabled

---

## Basic Usage

### Simple Textarea

```blade
<x-ui::form.textarea
    label="Description"
    name="description"
    placeholder="Enter description..."
/>
```

### With Helper Text

```blade
<x-ui::form.textarea
    label="Bio"
    name="bio"
    placeholder="Tell us about yourself..."
    helper="This will be displayed on your public profile"
/>
```

### With Character Count

```blade
<x-ui::form.textarea
    label="Tweet"
    name="tweet"
    placeholder="What's happening?"
    maxlength="280"
    :showCharCount="true"
    rows="3"
/>
```

---

## Sizes

### Size Variants

```blade
{{-- Small --}}
<x-ui::form.textarea
    label="Small Textarea"
    name="small"
    size="sm"
    rows="3"
/>

{{-- Base (Default) --}}
<x-ui::form.textarea
    label="Base Textarea"
    name="base"
    size="base"
    rows="4"
/>

{{-- Large --}}
<x-ui::form.textarea
    label="Large Textarea"
    name="large"
    size="lg"
    rows="5"
/>
```

---

## Validation States

### Error State

```blade
<x-ui::form.textarea
    label="Comment"
    name="comment"
    placeholder="Write your comment..."
    error="Comment must be at least 10 characters long"
/>
```

### Success State

```blade
<x-ui::form.textarea
    label="Feedback"
    name="feedback"
    placeholder="Share your feedback..."
    success="Thank you for your feedback!"
/>
```

### With Livewire Validation

```blade
<x-ui::form.textarea
    label="Description"
    name="description"
    wire:model.blur="description"
    :error="$errors->first('description')"
/>
```

---

## Advanced Features

### With Character Limit

```blade
<x-ui::form.textarea
    label="Product Description"
    name="description"
    placeholder="Describe your product..."
    maxlength="500"
    :showCharCount="true"
    rows="6"
    helper="Keep it concise and informative"
/>
```

### Readonly Textarea

```blade
<x-ui::form.textarea
    label="Terms and Conditions"
    name="terms"
    value="Your terms text here..."
    :readonly="true"
    rows="10"
/>
```

### Disabled Textarea

```blade
<x-ui::form.textarea
    label="Archived Content"
    name="archived"
    value="This content is archived"
    :disabled="true"
    rows="4"
/>
```

### Required Field

```blade
<x-ui::form.textarea
    label="Required Message"
    name="message"
    placeholder="This field is required"
    :required="true"
    rows="4"
/>
```

---

## Real-World Examples

### Blog Post Editor

```blade
<form wire:submit.prevent="publish">
    <x-ui::form.textarea
        label="Post Content"
        name="content"
        placeholder="Write your post content..."
        rows="12"
        maxlength="5000"
        :showCharCount="true"
        :required="true"
        wire:model="post.content"
        :error="$errors->first('post.content')"
        helper="Format your content with markdown"
    />

    <div class="mt-4">
        <x-ui::button type="submit" variant="primary">
            Publish Post
        </x-ui::button>
    </div>
</form>
```

### Comment Form

```blade
<form wire:submit.prevent="submitComment" class="space-y-4">
    <x-ui::form.textarea
        label="Your Comment"
        name="comment"
        placeholder="Share your thoughts..."
        rows="4"
        maxlength="1000"
        :showCharCount="true"
        :required="true"
        wire:model="commentText"
        :error="$errors->first('commentText')"
    />

    <div class="flex justify-end">
        <x-ui::button type="submit" variant="primary" size="sm">
            Post Comment
        </x-ui::button>
    </div>
</form>
```

### Contact Form

```blade
<form action="{{ route('contact.submit') }}" method="POST" class="space-y-4">
    @csrf

    <x-ui::form.input
        label="Name"
        name="name"
        :required="true"
        :error="$errors->first('name')"
    />

    <x-ui::form.input
        label="Email"
        name="email"
        type="email"
        :required="true"
        :error="$errors->first('email')"
    />

    <x-ui::form.textarea
        label="Message"
        name="message"
        placeholder="How can we help you?"
        rows="6"
        :required="true"
        :error="$errors->first('message')"
        helper="Please provide as much detail as possible"
    />

    <x-ui::button type="submit" variant="primary">
        Send Message
    </x-ui::button>
</form>
```

### Pet Profile Bio

```blade
<x-ui::form.textarea
    label="About Your Pet"
    name="bio"
    placeholder="Tell us about your pet's personality, habits, and quirks..."
    rows="6"
    maxlength="500"
    :showCharCount="true"
    wire:model="pet.bio"
    :error="$errors->first('pet.bio')"
    helper="This will appear on your pet's public profile"
/>
```

### Service Description

```blade
<x-ui::form.textarea
    label="Service Description"
    name="description"
    placeholder="Describe your service in detail..."
    rows="8"
    maxlength="2000"
    :showCharCount="true"
    :required="true"
    wire:model="service.description"
    :error="$errors->first('service.description')"
    helper="Include what makes your service unique"
/>
```

### Feedback Form

```blade
<div class="space-y-4">
    <x-ui::form.textarea
        label="What did you like?"
        name="positive"
        placeholder="Tell us what went well..."
        rows="4"
        size="sm"
        wire:model="feedback.positive"
    />

    <x-ui::form.textarea
        label="What could be improved?"
        name="improvement"
        placeholder="Share your suggestions..."
        rows="4"
        size="sm"
        wire:model="feedback.improvement"
    />

    <x-ui::form.textarea
        label="Additional Comments"
        name="additional"
        placeholder="Any other thoughts?"
        rows="4"
        size="sm"
        wire:model="feedback.additional"
    />
</div>
```

---

## Props Table

| Prop | Type | Default | Options | Description |
|------|------|---------|---------|-------------|
| `label` | string | null | - | Label text |
| `name` | string | null | - | Input name attribute |
| `placeholder` | string | null | - | Placeholder text |
| `value` | string | null | - | Initial value |
| `rows` | int | 4 | - | Number of visible rows |
| `size` | string | 'base' | sm, base, lg | Textarea size |
| `disabled` | bool | false | - | Disabled state |
| `required` | bool | false | - | Required field |
| `readonly` | bool | false | - | Readonly state |
| `error` | string | null | - | Error message |
| `success` | string | null | - | Success message |
| `helper` | string | null | - | Helper text |
| `maxlength` | int | null | - | Maximum characters |
| `showCharCount` | bool | false | - | Show character counter |

---

## Livewire Integration

### Basic Binding

```blade
<x-ui::form.textarea
    label="Notes"
    name="notes"
    wire:model="notes"
/>
```

### Live Updates

```blade
<x-ui::form.textarea
    label="Description"
    name="description"
    rows="6"
    wire:model.live="description"
/>

<div class="mt-2 text-sm text-gray-600">
    Preview: {{ $description }}
</div>
```

### Blur Updates (Recommended)

```blade
<x-ui::form.textarea
    label="Content"
    name="content"
    rows="8"
    wire:model.blur="content"
    :error="$errors->first('content')"
/>
```

### Debounced Updates

```blade
<x-ui::form.textarea
    label="Search Query"
    name="query"
    rows="3"
    wire:model.live.debounce.500ms="query"
/>
```

### With Real-Time Validation

```blade
<div>
    <x-ui::form.textarea
        label="Message"
        name="message"
        rows="5"
        wire:model.blur="message"
        :error="$errors->first('message')"
        :success="strlen($message) >= 10 && !$errors->has('message') ? 'Looks good!' : null"
    />
</div>
```

---

## Livewire Component Example

```php
<?php

namespace App\Livewire\Forms;

use Livewire\Component;
use Livewire\Attributes\Validate;

class CommentForm extends Component
{
    #[Validate('required|min:10|max:1000')]
    public $comment = '';

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function submit()
    {
        $validated = $this->validate();

        // Save comment...

        session()->flash('success', 'Comment posted!');
        $this->comment = '';
    }

    public function render()
    {
        return view('livewire.forms.comment-form');
    }
}
```

```blade
{{-- livewire/forms/comment-form.blade.php --}}
<div>
    <form wire:submit.prevent="submit">
        <x-ui::form.textarea
            label="Your Comment"
            name="comment"
            placeholder="Write your comment..."
            rows="4"
            maxlength="1000"
            :showCharCount="true"
            :required="true"
            wire:model.blur="comment"
            :error="$errors->first('comment')"
        />

        <div class="mt-4">
            <x-ui::button type="submit" variant="primary">
                Post Comment
            </x-ui::button>
        </div>
    </form>

    @if (session()->has('success'))
        <x-ui::alert variant="success" class="mt-4">
            {{ session('success') }}
        </x-ui::alert>
    @endif
</div>
```

---

## Styling Customization

### Custom Classes

```blade
<x-ui::form.textarea
    label="Custom Textarea"
    name="custom"
    class="!bg-blue-50 !border-blue-300 font-mono"
/>
```

### Custom Height

```blade
{{-- Using rows --}}
<x-ui::form.textarea
    label="Tall Textarea"
    name="tall"
    rows="15"
/>

{{-- Using custom class --}}
<x-ui::form.textarea
    label="Fixed Height"
    name="fixed"
    class="!h-64"
/>
```

---

## Best Practices

### 1. Choose Appropriate Row Count

```blade
{{-- Short notes: 3-4 rows --}}
<x-ui::form.textarea label="Quick Note" name="note" rows="3" />

{{-- Comments: 4-6 rows --}}
<x-ui::form.textarea label="Comment" name="comment" rows="5" />

{{-- Long content: 8-12 rows --}}
<x-ui::form.textarea label="Article" name="article" rows="10" />
```

### 2. Use Character Limits

```blade
{{-- Always set reasonable maxlength --}}
<x-ui::form.textarea
    label="Tweet"
    name="tweet"
    maxlength="280"
    :showCharCount="true"
/>
```

### 3. Provide Clear Placeholders

```blade
{{-- Good: Specific example --}}
<x-ui::form.textarea
    placeholder="Example: I loved this product because..."
/>

{{-- Bad: Vague placeholder --}}
<x-ui::form.textarea
    placeholder="Enter text..."
/>
```

### 4. Use Helper Text

```blade
<x-ui::form.textarea
    label="Description"
    name="description"
    helper="Provide a detailed description including key features and benefits"
/>
```

### 5. Optimize Livewire Updates

```blade
{{-- Use blur for long textarea --}}
<x-ui::form.textarea
    name="content"
    wire:model.blur="content"
/>

{{-- Use live only when necessary --}}
<x-ui::form.textarea
    name="search"
    wire:model.live.debounce.500ms="search"
/>
```

---

## Accessibility

### Proper Labels

```blade
{{-- Always include label --}}
<x-ui::form.textarea
    label="Feedback"
    name="feedback"
/>
```

### ARIA Attributes

```blade
{{-- Helper text automatically gets aria-describedby --}}
<x-ui::form.textarea
    label="Message"
    name="message"
    helper="Your message will be sent to our support team"
/>
```

### Required Fields

```blade
{{-- Visual indicator with asterisk --}}
<x-ui::form.textarea
    label="Required Field"
    name="required"
    :required="true"
/>
```

---

## Related Components

- [Input Component](input.md) - Text input fields
- [Select Component](select.md) - Dropdown selection
- [Forms Overview](overview.md) - Complete form examples

---

## Tips & Tricks

### Auto-Growing Textarea (with Alpine.js)

```blade
<div x-data="{
    resize() {
        $refs.textarea.style.height = 'auto';
        $refs.textarea.style.height = $refs.textarea.scrollHeight + 'px';
    }
}">
    <x-ui::form.textarea
        label="Auto-Growing"
        name="auto"
        rows="3"
        x-ref="textarea"
        @input="resize()"
    />
</div>
```

### Character Counter with Warning

```blade
<div x-data="{ count: 0, max: 100 }">
    <x-ui::form.textarea
        label="Limited Text"
        name="limited"
        maxlength="100"
        @input="count = $event.target.value.length"
    />

    <div class="mt-1 text-sm" :class="count > 80 ? 'text-red-600' : 'text-gray-500'">
        <span x-text="count"></span> / <span x-text="max"></span>
        <span x-show="count > 80" class="font-medium">- Almost at limit!</span>
    </div>
</div>
```

### Markdown Preview

```blade
<div x-data="{ content: '', tab: 'write' }">
    <div class="flex border-b mb-4">
        <button
            type="button"
            @click="tab = 'write'"
            :class="tab === 'write' ? 'border-b-2 border-blue-600 text-blue-600' : ''"
            class="px-4 py-2"
        >
            Write
        </button>
        <button
            type="button"
            @click="tab = 'preview'"
            :class="tab === 'preview' ? 'border-b-2 border-blue-600 text-blue-600' : ''"
            class="px-4 py-2"
        >
            Preview
        </button>
    </div>

    <div x-show="tab === 'write'">
        <x-ui::form.textarea
            label="Content"
            name="content"
            rows="10"
            x-model="content"
            helper="Supports markdown"
        />
    </div>

    <div x-show="tab === 'preview'" class="prose">
        <div x-html="marked.parse(content)"></div>
    </div>
</div>
```