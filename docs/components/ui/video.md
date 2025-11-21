# Video

Video player component for embedding local videos, YouTube, and Vimeo content. Built with HTML5 video and responsive iframe embeds following Flowbite design patterns.

## Component Location

- **Component**: `resources/views/components/ui/video.blade.php`

## Features

- Three video types (local, YouTube, Vimeo)
- Four aspect ratios (16:9, 4:3, 1:1, 21:9)
- Automatic URL parsing for YouTube and Vimeo
- Player controls customization
- Autoplay and loop support
- Poster/thumbnail images for local videos
- Multiple width options
- Rounded corners and shadow support
- Responsive by default
- Full dark mode support
- Accessible with proper ARIA attributes
- Fallback content for unsupported browsers

## Usage

### Local Video

```blade
{{-- Basic local video --}}
<x-ui.video
    type="local"
    src="/videos/demo.mp4"
    poster="/images/video-thumbnail.jpg"
/>
```

### YouTube Video

```blade
{{-- YouTube embed --}}
<x-ui.video
    type="youtube"
    src="https://www.youtube.com/watch?v=dQw4w9WgXcQ"
/>

{{-- Alternative YouTube formats supported --}}
<x-ui.video
    type="youtube"
    src="https://youtu.be/dQw4w9WgXcQ"
/>
```

### Vimeo Video

```blade
<x-ui.video
    type="vimeo"
    src="https://vimeo.com/76979871"
/>
```

### Aspect Ratios

```blade
{{-- 16:9 (default, standard widescreen) --}}
<x-ui.video
    type="youtube"
    src="https://www.youtube.com/watch?v=dQw4w9WgXcQ"
    aspectRatio="16:9"
/>

{{-- 4:3 (classic TV) --}}
<x-ui.video
    type="youtube"
    src="https://www.youtube.com/watch?v=dQw4w9WgXcQ"
    aspectRatio="4:3"
/>

{{-- 1:1 (square) --}}
<x-ui.video
    type="youtube"
    src="https://www.youtube.com/watch?v=dQw4w9WgXcQ"
    aspectRatio="1:1"
/>

{{-- 21:9 (ultrawide) --}}
<x-ui.video
    type="youtube"
    src="https://www.youtube.com/watch?v=dQw4w9WgXcQ"
    aspectRatio="21:9"
/>
```

### Video Controls

```blade
{{-- With controls (default) --}}
<x-ui.video
    type="local"
    src="/videos/demo.mp4"
    :controls="true"
/>

{{-- Without controls --}}
<x-ui.video
    type="local"
    src="/videos/demo.mp4"
    :controls="false"
/>
```

### Autoplay and Mute

```blade
{{-- Autoplay muted (best practice for autoplay) --}}
<x-ui.video
    type="local"
    src="/videos/demo.mp4"
    :autoplay="true"
    :muted="true"
/>

{{-- YouTube autoplay --}}
<x-ui.video
    type="youtube"
    src="https://www.youtube.com/watch?v=dQw4w9WgXcQ"
    :autoplay="true"
    :muted="true"
/>
```

### Loop Video

```blade
<x-ui.video
    type="local"
    src="/videos/background-loop.mp4"
    :loop="true"
    :autoplay="true"
    :muted="true"
    :controls="false"
/>
```

### Width Options

```blade
{{-- Full width (default) --}}
<x-ui.video
    type="youtube"
    src="https://www.youtube.com/watch?v=dQw4w9WgXcQ"
    width="full"
/>

{{-- Half width --}}
<x-ui.video
    type="youtube"
    src="https://www.youtube.com/watch?v=dQw4w9WgXcQ"
    width="1/2"
/>

{{-- Custom width with Tailwind classes --}}
<x-ui.video
    type="youtube"
    src="https://www.youtube.com/watch?v=dQw4w9WgXcQ"
    width="w-96"
/>
```

### Styling Options

```blade
{{-- With rounded corners (default) --}}
<x-ui.video
    type="local"
    src="/videos/demo.mp4"
    :rounded="true"
/>

{{-- With shadow --}}
<x-ui.video
    type="local"
    src="/videos/demo.mp4"
    :shadow="true"
/>

{{-- Combined styling --}}
<x-ui.video
    type="local"
    src="/videos/demo.mp4"
    :rounded="true"
    :shadow="true"
/>
```

### Accessibility

```blade
<x-ui.video
    type="youtube"
    src="https://www.youtube.com/watch?v=dQw4w9WgXcQ"
    title="Product demonstration video"
/>
```

### Multiple Video Sources

```blade
<x-ui.video type="local" poster="/images/poster.jpg">
    <source src="/videos/demo.mp4" type="video/mp4">
    <source src="/videos/demo.webm" type="video/webm">
    <source src="/videos/demo.ogg" type="video/ogg">
</x-ui.video>
```

## Props

| Prop | Type | Default | Description |
|------|------|---------|-------------|
| `type` | string | 'local' | Video type: local, youtube, vimeo |
| `src` | string | null | Video source URL or file path |
| `poster` | string | null | Thumbnail image (local videos only) |
| `aspectRatio` | string | '16:9' | Aspect ratio: 16:9, 4:3, 1:1, 21:9 |
| `controls` | boolean | true | Show player controls |
| `autoplay` | boolean | false | Auto-play video on load |
| `muted` | boolean | false | Mute audio |
| `loop` | boolean | false | Loop video playback |
| `width` | string | 'full' | Width: full, 1/2, 1/3, 2/3, auto, or custom |
| `rounded` | boolean | true | Apply rounded corners |
| `shadow` | boolean | false | Apply shadow effect |
| `title` | string | null | Accessible title for screen readers |

## Slots

| Slot | Description |
|------|-------------|
| Default | Multiple `<source>` tags for local videos with different formats |

## Real-World Examples

### 1. Product Demo Video

```blade
<x-ui.card>
    <x-ui.typography.heading level="2" class="mb-4">
        Product Demo
    </x-ui.typography.heading>

    <x-ui.video
        type="youtube"
        src="https://www.youtube.com/watch?v=dQw4w9WgXcQ"
        title="Product demonstration"
        :shadow="true"
    />

    <x-ui.typography.paragraph class="mt-4">
        Watch our comprehensive product demo to see all features in action.
    </x-ui.typography.paragraph>
</x-ui.card>
```

### 2. Background Video Hero

```blade
<div class="relative w-full h-screen overflow-hidden">
    <x-ui.video
        type="local"
        src="/videos/hero-background.mp4"
        :autoplay="true"
        :muted="true"
        :loop="true"
        :controls="false"
        :rounded="false"
        class="absolute inset-0 w-full h-full object-cover"
    />

    <div class="relative z-10 flex items-center justify-center h-full bg-black bg-opacity-40">
        <div class="text-center text-white">
            <x-ui.typography.heading level="1" class="text-white mb-4">
                Welcome to Our Platform
            </x-ui.typography.heading>
            <x-ui.button variant="primary" size="lg">
                Get Started
            </x-ui.button>
        </div>
    </div>
</div>
```

### 3. Video Gallery

```blade
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
    @foreach($videos as $video)
        <x-ui.card>
            <x-ui.video
                type="youtube"
                :src="$video->youtube_url"
                :title="$video->title"
                :shadow="true"
            />

            <div class="p-4">
                <x-ui.typography.text weight="semibold" class="block mb-2">
                    {{ $video->title }}
                </x-ui.typography.text>

                <x-ui.typography.text variant="muted" size="sm">
                    {{ $video->description }}
                </x-ui.typography.text>

                <div class="flex items-center gap-4 mt-4">
                    <x-ui.typography.text variant="muted" size="sm">
                        <svg class="w-4 h-4 inline" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M10 12a2 2 0 100-4 2 2 0 000 4z"/>
                            <path fill-rule="evenodd" d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z" clip-rule="evenodd"/>
                        </svg>
                        {{ $video->views }} views
                    </x-ui.typography.text>

                    <x-ui.typography.text variant="muted" size="sm">
                        {{ $video->created_at->diffForHumans() }}
                    </x-ui.typography.text>
                </div>
            </div>
        </x-ui.card>
    @endforeach
</div>
```

### 4. Course Lesson Video

```blade
<div class="max-w-4xl mx-auto">
    <x-ui.video
        type="vimeo"
        src="https://vimeo.com/76979871"
        title="Lesson 1: Introduction"
        :shadow="true"
        class="mb-6"
    />

    <div class="space-y-4">
        <x-ui.typography.heading level="2">
            Lesson 1: Introduction to Web Development
        </x-ui.typography.heading>

        <div class="flex items-center gap-4">
            <x-ui.badge variant="primary">
                Beginner
            </x-ui.badge>
            <x-ui.typography.text variant="muted" size="sm">
                Duration: 15 minutes
            </x-ui.typography.text>
        </div>

        <x-ui.typography.paragraph>
            In this lesson, we'll cover the fundamentals of web development...
        </x-ui.typography.paragraph>

        <div class="flex gap-2">
            <x-ui.button variant="primary" wire:click="markComplete">
                Mark as Complete
            </x-ui.button>
            <x-ui.button variant="outline" wire:click="nextLesson">
                Next Lesson
            </x-ui.button>
        </div>
    </div>
</div>
```

### 5. Testimonial Video

```blade
<div class="bg-gray-50 dark:bg-gray-800 rounded-lg p-8">
    <div class="grid md:grid-cols-2 gap-8 items-center">
        <div>
            <x-ui.video
                type="youtube"
                src="https://www.youtube.com/watch?v=dQw4w9WgXcQ"
                title="Customer testimonial"
                aspectRatio="4:3"
                :shadow="true"
            />
        </div>

        <div>
            <svg class="w-10 h-10 text-blue-600 mb-4" fill="currentColor" viewBox="0 0 18 14">
                <path d="M6 0H2a2 2 0 0 0-2 2v4a2 2 0 0 0 2 2h4v1a3 3 0 0 1-3 3H2a1 1 0 0 0 0 2h1a5.006 5.006 0 0 0 5-5V2a2 2 0 0 0-2-2Zm10 0h-4a2 2 0 0 0-2 2v4a2 2 0 0 0 2 2h4v1a3 3 0 0 1-3 3h-1a1 1 0 0 0 0 2h1a5.006 5.006 0 0 0 5-5V2a2 2 0 0 0-2-2Z"/>
            </svg>

            <x-ui.typography.text size="lg" class="mb-4 block">
                "This product completely transformed how we work. The video tutorial made it easy to get started."
            </x-ui.typography.text>

            <x-ui.typography.text weight="semibold">
                Sarah Johnson
            </x-ui.typography.text>
            <x-ui.typography.text variant="muted" size="sm">
                CEO, Tech Company
            </x-ui.typography.text>
        </div>
    </div>
</div>
```

### 6. Video Modal

```blade
<div x-data="{ showVideo: false }">
    <x-ui.button @click="showVideo = true">
        Watch Video
    </x-ui.button>

    <div
        x-show="showVideo"
        @click.away="showVideo = false"
        class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-75"
        style="display: none;"
    >
        <div class="relative max-w-4xl w-full mx-4">
            <button
                @click="showVideo = false"
                class="absolute -top-10 right-0 text-white hover:text-gray-300"
            >
                <svg class="w-8 h-8" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"/>
                </svg>
            </button>

            <x-ui.video
                type="youtube"
                src="https://www.youtube.com/watch?v=dQw4w9WgXcQ"
                :autoplay="true"
            />
        </div>
    </div>
</div>
```

### 7. Video Playlist

```blade
<div class="grid lg:grid-cols-3 gap-6">
    <div class="lg:col-span-2">
        <x-ui.video
            type="youtube"
            :src="$currentVideo->url"
            :title="$currentVideo->title"
            :shadow="true"
        />

        <div class="mt-4">
            <x-ui.typography.heading level="2" class="mb-2">
                {{ $currentVideo->title }}
            </x-ui.typography.heading>

            <x-ui.typography.text variant="muted">
                {{ $currentVideo->description }}
            </x-ui.typography.text>
        </div>
    </div>

    <div class="space-y-2">
        <x-ui.typography.text weight="semibold" class="block mb-4">
            Playlist ({{ count($playlist) }} videos)
        </x-ui.typography.text>

        @foreach($playlist as $video)
            <div
                wire:click="selectVideo({{ $video->id }})"
                class="flex gap-3 p-2 rounded hover:bg-gray-100 dark:hover:bg-gray-800 cursor-pointer {{ $video->id === $currentVideo->id ? 'bg-gray-100 dark:bg-gray-800' : '' }}"
            >
                <img
                    src="{{ $video->thumbnail }}"
                    alt="{{ $video->title }}"
                    class="w-24 h-16 object-cover rounded"
                />
                <div class="flex-1">
                    <x-ui.typography.text size="sm" weight="medium" class="line-clamp-2">
                        {{ $video->title }}
                    </x-ui.typography.text>
                    <x-ui.typography.text variant="small">
                        {{ $video->duration }}
                    </x-ui.typography.text>
                </div>
            </div>
        @endforeach
    </div>
</div>
```

### 8. Video with Tabs

```blade
<x-ui.card>
    <x-ui.video
        type="local"
        src="/videos/product-demo.mp4"
        poster="/images/product-poster.jpg"
        :shadow="true"
        class="mb-6"
    />

    <x-ui.tabs defaultTab="overview">
        <x-ui.tabs.item id="overview" variant="underline">
            Overview
        </x-ui.tabs.item>
        <x-ui.tabs.item id="features" variant="underline">
            Features
        </x-ui.tabs.item>
        <x-ui.tabs.item id="reviews" variant="underline">
            Reviews
        </x-ui.tabs.item>

        <x-ui.tabs.panel id="overview">
            <x-ui.typography.paragraph>
                Product overview content...
            </x-ui.typography.paragraph>
        </x-ui.tabs.panel>

        <x-ui.tabs.panel id="features">
            <x-ui.typography.paragraph>
                Feature details...
            </x-ui.typography.paragraph>
        </x-ui.tabs.panel>

        <x-ui.tabs.panel id="reviews">
            <x-ui.typography.paragraph>
                Customer reviews...
            </x-ui.typography.paragraph>
        </x-ui.tabs.panel>
    </x-ui.tabs>
</x-ui.card>
```

## Livewire Integration

### Video Progress Tracking

```php
<?php

namespace App\Livewire;

use Livewire\Component;

class VideoLesson extends Component
{
    public $lesson;
    public $completed = false;
    public $progress = 0;

    public function mount($lessonId)
    {
        $this->lesson = Lesson::findOrFail($lessonId);
        $this->completed = auth()->user()->hasCompletedLesson($lessonId);
    }

    public function markComplete()
    {
        auth()->user()->markLessonComplete($this->lesson->id);
        $this->completed = true;
        $this->dispatch('lesson-completed');
    }

    public function render()
    {
        return view('livewire.video-lesson');
    }
}
```

```blade
{{-- livewire/video-lesson.blade.php --}}
<div>
    <x-ui.video
        type="youtube"
        :src="$lesson->video_url"
        :title="$lesson->title"
    />

    <div class="mt-6 flex items-center justify-between">
        <div>
            <x-ui.typography.heading level="3">
                {{ $lesson->title }}
            </x-ui.typography.heading>
            <x-ui.typography.text variant="muted">
                Duration: {{ $lesson->duration }}
            </x-ui.typography.text>
        </div>

        @if(!$completed)
            <x-ui.button variant="primary" wire:click="markComplete">
                Mark as Complete
            </x-ui.button>
        @else
            <x-ui.badge variant="success">
                ✓ Completed
            </x-ui.badge>
        @endif
    </div>
</div>
```

## Best Practices

### 1. Autoplay Guidelines

```blade
{{-- Good: Autoplay with mute --}}
<x-ui.video
    type="local"
    src="/videos/background.mp4"
    :autoplay="true"
    :muted="true"
    :loop="true"
/>

{{-- Avoid: Autoplay with sound (poor UX) --}}
<x-ui.video
    type="local"
    src="/videos/demo.mp4"
    :autoplay="true"
/>
```

### 2. Accessibility

```blade
{{-- Good: Provide descriptive titles --}}
<x-ui.video
    type="youtube"
    src="https://www.youtube.com/watch?v=dQw4w9WgXcQ"
    title="Product setup tutorial - Step by step guide"
/>

{{-- Good: Provide captions/subtitles for local videos --}}
<x-ui.video type="local" src="/videos/demo.mp4">
    <source src="/videos/demo.mp4" type="video/mp4">
    <track kind="captions" src="/videos/demo-captions.vtt" srclang="en" label="English">
</x-ui.video>
```

### 3. Aspect Ratio Selection

```blade
{{-- Use 16:9 for standard videos --}}
<x-ui.video
    type="youtube"
    src="https://www.youtube.com/watch?v=dQw4w9WgXcQ"
    aspectRatio="16:9"
/>

{{-- Use 1:1 for social media style videos --}}
<x-ui.video
    type="local"
    src="/videos/instagram-story.mp4"
    aspectRatio="1:1"
/>
```

### 4. Performance

```blade
{{-- Good: Use poster images --}}
<x-ui.video
    type="local"
    src="/videos/large-demo.mp4"
    poster="/images/video-poster.jpg"
/>

{{-- Good: Lazy load videos below fold --}}
<x-ui.video
    type="local"
    src="/videos/demo.mp4"
    loading="lazy"
/>
```

### 5. Responsive Design

```blade
{{-- Good: Let video scale naturally --}}
<x-ui.video
    type="youtube"
    src="https://www.youtube.com/watch?v=dQw4w9WgXcQ"
    width="full"
/>

{{-- Good: Constrain max width --}}
<div class="max-w-4xl mx-auto">
    <x-ui.video
        type="youtube"
        src="https://www.youtube.com/watch?v=dQw4w9WgXcQ"
    />
</div>
```

## Accessibility

The video component follows WCAG 2.1 AA guidelines:

### Features

- Descriptive `title` attributes for screen readers
- Native HTML5 video controls are keyboard accessible
- Support for captions/subtitles via `<track>` elements
- Fallback content for unsupported browsers
- Proper iframe attributes for embedded videos

### Best Practices

```blade
{{-- Always provide title for embedded videos --}}
<x-ui.video
    type="youtube"
    src="https://www.youtube.com/watch?v=dQw4w9WgXcQ"
    title="Descriptive video title"
/>

{{-- Include captions for accessibility --}}
<x-ui.video type="local" src="/videos/tutorial.mp4">
    <source src="/videos/tutorial.mp4" type="video/mp4">
    <track kind="captions" src="/videos/tutorial-en.vtt" srclang="en" label="English">
    <track kind="captions" src="/videos/tutorial-es.vtt" srclang="es" label="Español">
</x-ui.video>
```

## Related Components

- [Image](../typography/image.md) - For static images
- [Card](card.md) - Often used as video container
- [Modal](modal.md) - For video lightboxes
- [Skeleton](skeleton.md) - Loading states for videos