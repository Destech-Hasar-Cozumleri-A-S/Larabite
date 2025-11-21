# Rating Component

Star ratings, review displays, and multi-category score indicators.

## Overview

The Rating component provides multiple variants for displaying ratings including simple star ratings, interactive rating inputs, advanced rating distributions, multi-category scores, and complete review cards. Built with Alpine.js for interactivity and includes support for half-stars, custom colors, and sizes.

## Component Files

- `resources/views/components/ui/rating.blade.php` - Base star rating
- `resources/views/components/ui/rating/advanced.blade.php` - Rating distribution with breakdown
- `resources/views/components/ui/rating/score.blade.php` - Multi-category score bars
- `resources/views/components/ui/rating/review.blade.php` - Complete review card

## Basic Usage

### Simple Star Rating

```blade
<x-ui.rating
    :rating="4.5"
    :maxRating="5"
    size="default"
/>
```

### Rating with Value

```blade
<x-ui.rating
    :rating="4.7"
    :showValue="true"
    valuePosition="after"
    :reviewCount="128"
/>
```

### Interactive Rating

```blade
<x-ui.rating
    :rating="0"
    :interactive="true"
    name="user_rating"
    wire:model="rating"
/>
```

## Props

### Base Rating Props

| Prop | Type | Default | Options | Description |
|------|------|---------|---------|-------------|
| `rating` | float | `0` | - | Current rating value (supports decimals) |
| `maxRating` | int | `5` | - | Maximum rating value |
| `size` | string | `'default'` | `'sm'`, `'default'`, `'lg'`, `'xl'` | Star size |
| `color` | string | `'yellow'` | `'yellow'`, `'red'`, `'green'`, `'blue'`, `'purple'` | Star color |
| `interactive` | bool | `false` | - | Enable click to rate |
| `readonly` | bool | `false` | - | Disable interactions |
| `showValue` | bool | `false` | - | Display numeric value |
| `valuePosition` | string | `'after'` | `'before'`, `'after'` | Where to show value |
| `reviewCount` | int | `null` | - | Number of reviews (optional) |
| `name` | string | `null` | - | Form input name |

### Advanced Rating Props

| Prop | Type | Default | Description |
|------|------|---------|-------------|
| `rating` | float | `0` | Overall average rating |
| `totalReviews` | int | `0` | Total number of reviews |
| `distribution` | array | `[]` | Star distribution `[5 => 70, 4 => 17, ...]` |
| `showPercentages` | bool | `true` | Show percentages vs counts |
| `color` | string | `'yellow'` | Progress bar color |

### Score Rating Props

| Prop | Type | Default | Description |
|------|------|---------|-------------|
| `scores` | array | `[]` | Category scores `[['label' => 'Staff', 'score' => 8.8, 'max' => 10]]` |
| `color` | string | `'blue'` | Progress bar color |
| `showValue` | bool | `true` | Display score badges |

### Review Card Props

| Prop | Type | Default | Description |
|------|------|---------|-------------|
| `rating` | float | `0` | Review rating |
| `author` | string | `null` | Author name |
| `authorAvatar` | string | `null` | Avatar URL |
| `date` | Carbon/string | `null` | Review date |
| `verified` | bool | `false` | Show verified badge |
| `helpful` | array | `null` | Helpful votes `['id' => 1, 'yes' => 10, 'no' => 2]` |
| `content` | string | `null` | Review text |

## Rating Variants

### 1. Size Variants

```blade
<div class="space-y-4">
    {{-- Small --}}
    <x-ui.rating
        :rating="4.5"
        size="sm"
    />

    {{-- Default --}}
    <x-ui.rating
        :rating="4.5"
        size="default"
    />

    {{-- Large --}}
    <x-ui.rating
        :rating="4.5"
        size="lg"
    />

    {{-- Extra Large --}}
    <x-ui.rating
        :rating="4.5"
        size="xl"
    />
</div>
```

### 2. Color Variants

```blade
<div class="space-y-3">
    <x-ui.rating :rating="4.5" color="yellow" />
    <x-ui.rating :rating="4.5" color="red" />
    <x-ui.rating :rating="4.5" color="green" />
    <x-ui.rating :rating="4.5" color="blue" />
    <x-ui.rating :rating="4.5" color="purple" />
</div>
```

### 3. With Value Display

```blade
{{-- Value after stars --}}
<x-ui.rating
    :rating="4.7"
    :showValue="true"
    valuePosition="after"
/>

{{-- Value before stars --}}
<x-ui.rating
    :rating="4.7"
    :showValue="true"
    valuePosition="before"
/>

{{-- With review count --}}
<x-ui.rating
    :rating="4.7"
    :showValue="true"
    :reviewCount="128"
/>
```

### 4. Interactive Rating

```blade
<div x-data="{ userRating: 0 }">
    <x-ui.rating
        :rating="0"
        :interactive="true"
        name="rating"
        size="lg"
        @rating-changed="userRating = $event.detail.rating"
    />

    <p class="mt-2 text-sm text-gray-600" x-show="userRating > 0">
        You rated: <span x-text="userRating"></span> stars
    </p>
</div>
```

### 5. Readonly Rating

```blade
<x-ui.rating
    :rating="4.5"
    :readonly="true"
    size="default"
/>
```

## Advanced Rating

### Distribution with Percentages

```blade
<x-ui.rating.advanced
    :rating="4.95"
    :totalReviews="1745"
    :distribution="[
        5 => 1234,
        4 => 297,
        3 => 140,
        2 => 70,
        1 => 4
    ]"
    :showPercentages="true"
    color="yellow"
/>
```

### Distribution with Counts

```blade
<x-ui.rating.advanced
    :rating="4.5"
    :totalReviews="500"
    :distribution="[
        5 => 350,
        4 => 85,
        3 => 40,
        2 => 20,
        1 => 5
    ]"
    :showPercentages="false"
>
    <x-ui.button variant="primary" size="sm" class="w-full">
        Write a Review
    </x-ui.button>
</x-ui.rating.advanced>
```

## Score Rating

### Multi-Category Scores

```blade
<x-ui.rating.score
    :scores="[
        ['label' => 'Staff', 'score' => 8.8, 'max' => 10],
        ['label' => 'Comfort', 'score' => 9.2, 'max' => 10],
        ['label' => 'Facilities', 'score' => 7.5, 'max' => 10],
        ['label' => 'Cleanliness', 'score' => 9.5, 'max' => 10],
        ['label' => 'Value', 'score' => 8.0, 'max' => 10],
    ]"
    color="blue"
    :showValue="true"
/>
```

### Different Color Schemes

```blade
{{-- Green for performance metrics --}}
<x-ui.rating.score
    :scores="[
        ['label' => 'Speed', 'score' => 9.5, 'max' => 10],
        ['label' => 'Reliability', 'score' => 8.8, 'max' => 10],
        ['label' => 'Support', 'score' => 9.0, 'max' => 10],
    ]"
    color="green"
/>

{{-- Purple for creative scores --}}
<x-ui.rating.score
    :scores="[
        ['label' => 'Design', 'score' => 9.2, 'max' => 10],
        ['label' => 'Innovation', 'score' => 8.5, 'max' => 10],
        ['label' => 'Usability', 'score' => 9.7, 'max' => 10],
    ]"
    color="purple"
/>
```

## Review Cards

### Basic Review

```blade
<x-ui.rating.review
    :rating="5"
    author="John Doe"
    authorAvatar="/images/users/john.jpg"
    :date="now()->subDays(2)"
    :verified="true"
    content="Excellent service! Highly recommended. The staff was professional and my pet loved the grooming session."
/>
```

### Review with Helpful Votes

```blade
<x-ui.rating.review
    :rating="4.5"
    author="Jane Smith"
    authorAvatar="/images/users/jane.jpg"
    :date="now()->subWeek()"
    :verified="true"
    :helpful="[
        'id' => 123,
        'yes' => 15,
        'no' => 2
    ]"
>
    Great experience overall. The facility was clean and the staff was friendly.
    My dog came back happy and well-groomed. Will definitely return!
</x-ui.rating.review>
```

### Multiple Reviews List

```blade
<div class="space-y-4">
    @foreach($reviews as $review)
        <x-ui.rating.review
            :rating="$review->rating"
            :author="$review->user->name"
            :authorAvatar="$review->user->avatar"
            :date="$review->created_at"
            :verified="$review->user->is_verified"
            :helpful="[
                'id' => $review->id,
                'yes' => $review->helpful_count,
                'no' => $review->not_helpful_count
            ]"
            :content="$review->content"
        />
    @endforeach
</div>
```

## Real-World Examples

### Example 1: Product Rating Display

```blade
<div class="bg-white dark:bg-gray-800 rounded-lg p-6">
    <div class="flex items-start gap-6">
        {{-- Product Image --}}
        <img src="{{ $product->image }}" alt="{{ $product->name }}" class="w-32 h-32 object-cover rounded-lg">

        {{-- Product Details --}}
        <div class="flex-1">
            <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-2">
                {{ $product->name }}
            </h3>

            <div class="flex items-center gap-2 mb-3">
                <x-ui.rating
                    :rating="$product->average_rating"
                    :showValue="true"
                    :reviewCount="$product->reviews_count"
                    size="default"
                />
            </div>

            <p class="text-gray-600 dark:text-gray-400 mb-4">
                {{ $product->description }}
            </p>

            <div class="flex items-center gap-4">
                <span class="text-2xl font-bold text-gray-900 dark:text-white">
                    ${{ number_format($product->price, 2) }}
                </span>

                <x-ui.button variant="primary">
                    Add to Cart
                </x-ui.button>
            </div>
        </div>
    </div>
</div>
```

### Example 2: Service Provider Profile

```blade
<div class="bg-white dark:bg-gray-800 rounded-lg shadow-lg overflow-hidden">
    {{-- Header --}}
    <div class="relative h-48 bg-gradient-to-r from-blue-500 to-purple-600">
        <img src="{{ $provider->cover_image }}" alt="Cover" class="w-full h-full object-cover opacity-50">
    </div>

    <div class="p-6">
        {{-- Provider Info --}}
        <div class="flex items-start gap-4 -mt-20 mb-6">
            <x-ui.avatar
                :src="$provider->avatar"
                :alt="$provider->name"
                size="2xl"
                class="ring-4 ring-white dark:ring-gray-800"
            />

            <div class="flex-1 mt-16">
                <h2 class="text-2xl font-bold text-gray-900 dark:text-white">
                    {{ $provider->name }}
                </h2>
                <p class="text-gray-600 dark:text-gray-400">
                    {{ $provider->specialty }}
                </p>
            </div>

            <x-ui.button variant="primary">
                Book Now
            </x-ui.button>
        </div>

        {{-- Overall Rating --}}
        <div class="mb-6">
            <x-ui.rating
                :rating="$provider->average_rating"
                :showValue="true"
                :reviewCount="$provider->total_reviews"
                size="lg"
            />
        </div>

        {{-- Category Scores --}}
        <div class="mb-6">
            <h3 class="text-lg font-semibold mb-4">Service Quality</h3>
            <x-ui.rating.score
                :scores="[
                    ['label' => 'Professionalism', 'score' => $provider->ratings->professionalism, 'max' => 10],
                    ['label' => 'Communication', 'score' => $provider->ratings->communication, 'max' => 10],
                    ['label' => 'Punctuality', 'score' => $provider->ratings->punctuality, 'max' => 10],
                    ['label' => 'Quality', 'score' => $provider->ratings->quality, 'max' => 10],
                    ['label' => 'Value', 'score' => $provider->ratings->value, 'max' => 10],
                ]"
                color="blue"
            />
        </div>

        {{-- Rating Distribution --}}
        <x-ui.rating.advanced
            :rating="$provider->average_rating"
            :totalReviews="$provider->total_reviews"
            :distribution="$provider->rating_distribution"
        />
    </div>
</div>
```

### Example 3: Reviews Section

```blade
<div class="max-w-4xl mx-auto py-8">
    {{-- Header with Filter --}}
    <div class="flex items-center justify-between mb-6">
        <h2 class="text-2xl font-bold text-gray-900 dark:text-white">
            Customer Reviews
        </h2>

        <x-ui.form.select wire:model="sortBy" class="w-48">
            <option value="recent">Most Recent</option>
            <option value="helpful">Most Helpful</option>
            <option value="highest">Highest Rating</option>
            <option value="lowest">Lowest Rating</option>
        </x-ui.form.select>
    </div>

    {{-- Overall Rating Summary --}}
    <div class="bg-white dark:bg-gray-800 rounded-lg p-6 mb-6">
        <x-ui.rating.advanced
            :rating="$averageRating"
            :totalReviews="$totalReviews"
            :distribution="$ratingDistribution"
            color="yellow"
        >
            @auth
                <x-ui.button
                    variant="primary"
                    size="sm"
                    class="w-full"
                    wire:click="$dispatch('open-modal', 'write-review')"
                >
                    Write a Review
                </x-ui.button>
            @else
                <a href="{{ route('login') }}" class="block">
                    <x-ui.button variant="secondary" size="sm" class="w-full">
                        Sign in to Review
                    </x-ui.button>
                </a>
            @endauth
        </x-ui.rating.advanced>
    </div>

    {{-- Reviews List --}}
    <div class="space-y-4">
        @forelse($reviews as $review)
            <x-ui.rating.review
                :rating="$review->rating"
                :author="$review->user->name"
                :authorAvatar="$review->user->avatar"
                :date="$review->created_at"
                :verified="$review->user->is_verified"
                :helpful="[
                    'id' => $review->id,
                    'yes' => $review->helpful_votes,
                    'no' => $review->not_helpful_votes
                ]"
            >
                {{ $review->content }}

                @if($review->images->count() > 0)
                    <div class="flex gap-2 mt-3">
                        @foreach($review->images as $image)
                            <img src="{{ $image->url }}"
                                 alt="Review image"
                                 class="w-20 h-20 object-cover rounded cursor-pointer"
                                 wire:click="showImage('{{ $image->url }}')">
                        @endforeach
                    </div>
                @endif

                @if($review->response)
                    <div class="mt-4 pl-4 border-l-2 border-blue-500">
                        <div class="flex items-center gap-2 mb-2">
                            <x-ui.badge color="blue">Provider Response</x-ui.badge>
                            <span class="text-xs text-gray-500">
                                {{ $review->response_date->diffForHumans() }}
                            </span>
                        </div>
                        <p class="text-sm text-gray-700 dark:text-gray-300">
                            {{ $review->response }}
                        </p>
                    </div>
                @endif
            </x-ui.rating.review>
        @empty
            <div class="text-center py-12">
                <svg class="w-16 h-16 mx-auto text-gray-400 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z"></path>
                </svg>
                <p class="text-gray-500 dark:text-gray-400">
                    No reviews yet. Be the first to review!
                </p>
            </div>
        @endforelse
    </div>

    {{-- Pagination --}}
    @if($reviews->hasPages())
        <div class="mt-6">
            {{ $reviews->links() }}
        </div>
    @endif
</div>
```

### Example 4: Write Review Form

```blade
<div class="bg-white dark:bg-gray-800 rounded-lg p-6">
    <h3 class="text-lg font-semibold mb-4">Write a Review</h3>

    <form wire:submit="submitReview">
        {{-- Overall Rating --}}
        <div class="mb-6">
            <label class="block text-sm font-medium mb-2">
                Overall Rating
            </label>
            <x-ui.rating
                :rating="$rating"
                :interactive="true"
                name="rating"
                size="lg"
                wire:model="rating"
            />
            @error('rating')
                <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
            @enderror
        </div>

        {{-- Category Ratings --}}
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-6">
            <div>
                <label class="block text-sm font-medium mb-2">
                    Professionalism
                </label>
                <x-ui.rating
                    :rating="$professionalism"
                    :interactive="true"
                    name="professionalism"
                    wire:model="professionalism"
                />
            </div>

            <div>
                <label class="block text-sm font-medium mb-2">
                    Communication
                </label>
                <x-ui.rating
                    :rating="$communication"
                    :interactive="true"
                    name="communication"
                    wire:model="communication"
                />
            </div>

            <div>
                <label class="block text-sm font-medium mb-2">
                    Quality
                </label>
                <x-ui.rating
                    :rating="$quality"
                    :interactive="true"
                    name="quality"
                    wire:model="quality"
                />
            </div>

            <div>
                <label class="block text-sm font-medium mb-2">
                    Value for Money
                </label>
                <x-ui.rating
                    :rating="$value"
                    :interactive="true"
                    name="value"
                    wire:model="value"
                />
            </div>
        </div>

        {{-- Review Text --}}
        <div class="mb-6">
            <x-ui.form.textarea
                label="Your Review"
                wire:model="content"
                rows="5"
                placeholder="Share your experience..."
            />
        </div>

        {{-- Image Upload --}}
        <div class="mb-6">
            <x-ui.form.file-input
                label="Add Photos (Optional)"
                wire:model="images"
                multiple
                accept="image/*"
            />

            @if($images)
                <div class="flex gap-2 mt-3">
                    @foreach($images as $image)
                        <div class="relative">
                            <img src="{{ $image->temporaryUrl() }}"
                                 class="w-20 h-20 object-cover rounded">
                            <button
                                type="button"
                                wire:click="removeImage({{ $loop->index }})"
                                class="absolute -top-2 -right-2 bg-red-500 text-white rounded-full p-1"
                            >
                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                                </svg>
                            </button>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>

        {{-- Submit --}}
        <div class="flex items-center gap-3">
            <x-ui.button
                type="submit"
                variant="primary"
                :disabled="$rating === 0"
            >
                Submit Review
            </x-ui.button>

            <x-ui.button
                type="button"
                variant="secondary"
                wire:click="$dispatch('close-modal')"
            >
                Cancel
            </x-ui.button>
        </div>
    </form>
</div>
```

### Example 5: Dashboard Rating Summary

```blade
<div class="grid grid-cols-1 md:grid-cols-3 gap-6">
    {{-- Overall Rating Card --}}
    <div class="bg-white dark:bg-gray-800 rounded-lg p-6 text-center">
        <div class="text-5xl font-bold text-gray-900 dark:text-white mb-2">
            {{ number_format($averageRating, 1) }}
        </div>
        <x-ui.rating
            :rating="$averageRating"
            size="lg"
            readonly
            class="justify-center mb-2"
        />
        <p class="text-sm text-gray-500 dark:text-gray-400">
            Based on {{ number_format($totalReviews) }} reviews
        </p>
    </div>

    {{-- Recent Reviews --}}
    <div class="bg-white dark:bg-gray-800 rounded-lg p-6 md:col-span-2">
        <h3 class="text-lg font-semibold mb-4">Recent Reviews</h3>

        <div class="space-y-3">
            @foreach($recentReviews->take(3) as $review)
                <div class="flex items-start gap-3">
                    <x-ui.avatar
                        :src="$review->user->avatar"
                        :alt="$review->user->name"
                        size="sm"
                    />

                    <div class="flex-1">
                        <div class="flex items-center justify-between mb-1">
                            <span class="font-medium text-sm">{{ $review->user->name }}</span>
                            <x-ui.rating :rating="$review->rating" size="sm" readonly />
                        </div>
                        <p class="text-sm text-gray-600 dark:text-gray-400 line-clamp-2">
                            {{ $review->content }}
                        </p>
                    </div>
                </div>
            @endforeach
        </div>

        <a href="{{ route('reviews.index') }}" class="block mt-4">
            <x-ui.button variant="secondary" size="sm" class="w-full">
                View All Reviews
            </x-ui.button>
        </a>
    </div>
</div>
```

### Example 6: Comparison Table

```blade
<div class="overflow-x-auto">
    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">Provider</th>
                <th scope="col" class="px-6 py-3">Rating</th>
                <th scope="col" class="px-6 py-3">Reviews</th>
                <th scope="col" class="px-6 py-3">Price</th>
                <th scope="col" class="px-6 py-3">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($providers as $provider)
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                    <td class="px-6 py-4">
                        <div class="flex items-center gap-3">
                            <x-ui.avatar
                                :src="$provider->avatar"
                                :alt="$provider->name"
                                size="sm"
                            />
                            <span class="font-medium">{{ $provider->name }}</span>
                        </div>
                    </td>
                    <td class="px-6 py-4">
                        <x-ui.rating
                            :rating="$provider->average_rating"
                            :showValue="true"
                            size="sm"
                            readonly
                        />
                    </td>
                    <td class="px-6 py-4">
                        {{ number_format($provider->reviews_count) }}
                    </td>
                    <td class="px-6 py-4">
                        ${{ number_format($provider->starting_price, 2) }}
                    </td>
                    <td class="px-6 py-4">
                        <x-ui.button variant="primary" size="sm">
                            View Profile
                        </x-ui.button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
```

## Livewire Integration

### Interactive Rating Component

```php
namespace App\Livewire\Components;

use Livewire\Component;

class RatingInput extends Component
{
    public $rating = 0;
    public $maxRating = 5;

    public function setRating($value)
    {
        $this->rating = $value;
        $this->dispatch('rating-updated', rating: $value);
    }

    public function render()
    {
        return view('livewire.components.rating-input');
    }
}
```

```blade
{{-- livewire/components/rating-input.blade.php --}}
<div>
    <x-ui.rating
        :rating="$rating"
        :maxRating="$maxRating"
        :interactive="true"
        size="lg"
    />

    @if($rating > 0)
        <p class="mt-2 text-sm text-gray-600 dark:text-gray-400">
            You rated: {{ $rating }} out of {{ $maxRating }} stars
        </p>
    @endif
</div>
```

### Review Submission

```php
namespace App\Livewire\Reviews;

use App\Models\Review;
use Livewire\Component;
use Livewire\WithFileUploads;

class CreateReview extends Component
{
    use WithFileUploads;

    public $serviceId;
    public $rating = 0;
    public $professionalism = 0;
    public $communication = 0;
    public $quality = 0;
    public $value = 0;
    public $content = '';
    public $images = [];

    protected $rules = [
        'rating' => 'required|integer|min:1|max:5',
        'professionalism' => 'required|integer|min:1|max:5',
        'communication' => 'required|integer|min:1|max:5',
        'quality' => 'required|integer|min:1|max:5',
        'value' => 'required|integer|min:1|max:5',
        'content' => 'required|string|min:10|max:1000',
        'images.*' => 'nullable|image|max:2048',
    ];

    public function submitReview()
    {
        $this->validate();

        $review = Review::create([
            'service_id' => $this->serviceId,
            'user_id' => auth()->id(),
            'rating' => $this->rating,
            'professionalism' => $this->professionalism,
            'communication' => $this->communication,
            'quality' => $this->quality,
            'value' => $this->value,
            'content' => $this->content,
        ]);

        // Upload images
        foreach ($this->images as $image) {
            $path = $image->store('review-images', 'public');
            $review->images()->create(['path' => $path]);
        }

        $this->dispatch('review-submitted');
        $this->dispatch('close-modal');

        session()->flash('success', 'Thank you for your review!');

        return redirect()->route('services.show', $this->serviceId);
    }

    public function removeImage($index)
    {
        array_splice($this->images, $index, 1);
    }

    public function render()
    {
        return view('livewire.reviews.create-review');
    }
}
```

### Helpful Votes

```php
namespace App\Livewire\Reviews;

use App\Models\Review;
use Livewire\Component;

class ReviewCard extends Component
{
    public Review $review;

    public function markHelpful($reviewId, $helpful)
    {
        if (!auth()->check()) {
            return redirect()->route('login');
        }

        $vote = $this->review->helpfulVotes()
            ->where('user_id', auth()->id())
            ->first();

        if ($vote) {
            // Update existing vote
            $vote->update(['helpful' => $helpful]);
        } else {
            // Create new vote
            $this->review->helpfulVotes()->create([
                'user_id' => auth()->id(),
                'helpful' => $helpful,
            ]);
        }

        $this->review->refresh();
        $this->dispatch('vote-recorded');
    }

    public function render()
    {
        return view('livewire.reviews.review-card');
    }
}
```

## Accessibility

### ARIA Attributes

```blade
<button
    type="button"
    aria-label="Rate {{ $i }} out of {{ $maxRating }}"
    role="radio"
    :aria-checked="rating >= {{ $i }}"
>
    {{-- Star icon --}}
</button>
```

### Keyboard Navigation

For interactive ratings:
- Tab to focus rating group
- Arrow keys to select rating
- Enter/Space to confirm
- Escape to cancel

### Screen Reader Support

```blade
<div role="radiogroup" aria-label="Rating">
    <span class="sr-only">Current rating: {{ $rating }} out of {{ $maxRating }} stars</span>
    {{-- Star buttons --}}
</div>
```

## Best Practices

### 1. Use Appropriate Rating Type

**Star Rating:**
- Product reviews
- Service quality
- User feedback
- General satisfaction

**Score Rating:**
- Multiple attributes
- Detailed feedback
- Category breakdowns
- Professional services

**Advanced Rating:**
- High review volume
- Distribution insights
- Statistical overview
- Decision support

### 2. Provide Context

```blade
{{-- Good: Clear context --}}
<x-ui.rating
    :rating="4.7"
    :showValue="true"
    :reviewCount="128"
/>

{{-- Avoid: No context --}}
<x-ui.rating :rating="4.7" />
```

### 3. Handle Zero Ratings

```blade
@if($product->reviews_count > 0)
    <x-ui.rating
        :rating="$product->average_rating"
        :showValue="true"
        :reviewCount="$product->reviews_count"
    />
@else
    <span class="text-sm text-gray-500">No reviews yet</span>
@endif
```

### 4. Validate Interactive Ratings

```php
protected $rules = [
    'rating' => 'required|integer|min:1|max:5',
];

protected $messages = [
    'rating.required' => 'Please select a rating',
    'rating.min' => 'Rating must be at least 1 star',
];
```

### 5. Mobile Optimization

```blade
{{-- Larger touch targets --}}
<x-ui.rating
    :rating="$rating"
    :interactive="true"
    size="lg"
    class="gap-2"
/>

{{-- Responsive layout --}}
<div class="flex flex-col sm:flex-row items-start sm:items-center gap-2">
    <x-ui.rating :rating="$rating" />
    <span class="text-sm">{{ $reviewCount }} reviews</span>
</div>
```

## Dark Mode Support

All rating components include full dark mode support:

```blade
{{-- Automatically adapts to dark mode --}}
<x-ui.rating :rating="4.5" />

<x-ui.rating.advanced
    :rating="4.95"
    :totalReviews="1745"
    :distribution="$distribution"
/>

<x-ui.rating.score :scores="$scores" />

<x-ui.rating.review
    :rating="5"
    author="John Doe"
    content="Great service!"
/>
```

## Testing

### Component Testing

```php
public function test_rating_displays_correct_stars()
{
    $view = $this->blade(
        '<x-ui.rating :rating="3.5" :maxRating="5" />',
        []
    );

    // Should have 3 full stars, 1 half star, 1 empty star
    $view->assertSee('currentColor'); // Stars are rendered
}

public function test_interactive_rating_updates()
{
    Livewire::test(RatingInput::class)
        ->assertSet('rating', 0)
        ->call('setRating', 4)
        ->assertSet('rating', 4)
        ->assertDispatched('rating-updated');
}
```

### Review Submission Testing

```php
public function test_user_can_submit_review()
{
    $user = User::factory()->create();
    $service = Service::factory()->create();

    Livewire::actingAs($user)
        ->test(CreateReview::class, ['serviceId' => $service->id])
        ->set('rating', 5)
        ->set('professionalism', 5)
        ->set('communication', 4)
        ->set('quality', 5)
        ->set('value', 4)
        ->set('content', 'Excellent service, highly recommended!')
        ->call('submitReview')
        ->assertDispatched('review-submitted');

    $this->assertDatabaseHas('reviews', [
        'user_id' => $user->id,
        'service_id' => $service->id,
        'rating' => 5,
    ]);
}
```

## Related Components

- [Badge](badge.md) - Rating badges
- [Avatar](avatar.md) - User avatars in reviews
- [Button](button.md) - Action buttons
- [Progress](progress.md) - Rating distribution bars

## Resources

- [Flowbite Rating Documentation](https://flowbite.com/docs/components/rating/)
- [ARIA Rating Pattern](https://www.w3.org/WAI/ARIA/apg/patterns/rating/)
- [Star Rating Best Practices](https://www.nngroup.com/articles/rating-scales/)

---

**Component Version:** 1.0.0
**Last Updated:** 2025-11-20
**Flowbite Version:** 2.x