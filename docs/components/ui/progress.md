# Progress Component

Visual indicators showing task completion, loading states, and multi-step processes.

## Overview

The Progress component provides multiple variants for displaying progress indicators including linear progress bars, circular progress rings, and multi-step progress trackers. Built with Tailwind CSS and includes support for animations, colors, and sizes.

## Component Files

- `resources/views/components/ui/progress.blade.php` - Linear progress bar
- `resources/views/components/ui/progress/circular.blade.php` - Circular progress ring
- `resources/views/components/ui/progress/step.blade.php` - Simple step progress
- `resources/views/components/ui/progress/steps.blade.php` - Multi-step with labels

## Basic Usage

### Simple Progress Bar

```blade
<x-ui::progress
    :value="45"
    :max="100"
    color="blue"
/>
```

### Progress with Label

```blade
<x-ui::progress
    :value="75"
    :max="100"
    label="Uploading..."
    labelPosition="outside"
    :showPercentage="true"
    color="green"
/>
```

### Circular Progress

```blade
<x-ui::progress.circular
    :value="65"
    :max="100"
    size="lg"
    color="blue"
    label="Complete"
/>
```

## Props

### Linear Progress Props

| Prop | Type | Default | Options | Description |
|------|------|---------|---------|-------------|
| `value` | int | `0` | - | Current progress value |
| `max` | int | `100` | - | Maximum value |
| `size` | string | `'default'` | `'sm'`, `'default'`, `'lg'`, `'xl'` | Bar height |
| `color` | string | `'blue'` | `'blue'`, `'dark'`, `'red'`, `'green'`, `'yellow'`, `'indigo'`, `'purple'` | Progress color |
| `label` | string | `null` | - | Optional label text |
| `labelPosition` | string | `'none'` | `'none'`, `'inside'`, `'outside'` | Where to show label |
| `showPercentage` | bool | `false` | - | Display percentage |
| `striped` | bool | `false` | - | Striped pattern |
| `animated` | bool | `false` | - | Animate stripes |
| `indeterminate` | bool | `false` | - | Continuous loading animation |

### Circular Progress Props

| Prop | Type | Default | Options | Description |
|------|------|---------|---------|-------------|
| `value` | int | `0` | - | Current progress value |
| `max` | int | `100` | - | Maximum value |
| `size` | string | `'default'` | `'sm'`, `'default'`, `'lg'`, `'xl'` | Circle size |
| `color` | string | `'blue'` | `'blue'`, `'dark'`, `'red'`, `'green'`, `'yellow'`, `'indigo'`, `'purple'` | Progress color |
| `strokeWidth` | int | `null` | - | Custom stroke width |
| `showPercentage` | bool | `true` | - | Display percentage |
| `label` | string | `null` | - | Optional label below percentage |

### Step Progress Props

| Prop | Type | Default | Options | Description |
|------|------|---------|---------|-------------|
| `currentStep` | int | `1` | - | Active step number |
| `totalSteps` | int | `4` | - | Total number of steps |
| `color` | string | `'blue'` | `'blue'`, `'dark'`, `'red'`, `'green'`, `'yellow'`, `'indigo'`, `'purple'` | Active step color |
| `size` | string | `'default'` | `'sm'`, `'default'` | Step indicator size |
| `orientation` | string | `'horizontal'` | `'horizontal'`, `'vertical'` | Layout direction |

### Steps Progress Props

| Prop | Type | Default | Options | Description |
|------|------|---------|---------|-------------|
| `steps` | array | `[]` | - | Array of step data |
| `currentStep` | int | `1` | - | Active step number |
| `color` | string | `'blue'` | `'blue'`, `'dark'`, `'red'`, `'green'`, `'yellow'`, `'indigo'`, `'purple'` | Active step color |
| `size` | string | `'default'` | `'sm'`, `'default'` | Step indicator size |
| `orientation` | string | `'horizontal'` | `'horizontal'`, `'vertical'` | Layout direction |
| `clickable` | bool | `false` | - | Enable step navigation |

## Progress Bar Variants

### 1. Size Variants

```blade
{{-- Small --}}
<x-ui::progress
    :value="45"
    size="sm"
    color="blue"
/>

{{-- Default --}}
<x-ui::progress
    :value="45"
    size="default"
    color="blue"
/>

{{-- Large --}}
<x-ui::progress
    :value="45"
    size="lg"
    color="blue"
/>

{{-- Extra Large --}}
<x-ui::progress
    :value="45"
    size="xl"
    color="blue"
/>
```

### 2. Color Variants

```blade
{{-- Blue --}}
<x-ui::progress :value="45" color="blue" />

{{-- Dark --}}
<x-ui::progress :value="55" color="dark" />

{{-- Red --}}
<x-ui::progress :value="65" color="red" />

{{-- Green --}}
<x-ui::progress :value="75" color="green" />

{{-- Yellow --}}
<x-ui::progress :value="85" color="yellow" />

{{-- Indigo --}}
<x-ui::progress :value="60" color="indigo" />

{{-- Purple --}}
<x-ui::progress :value="70" color="purple" />
```

### 3. Label Positions

```blade
{{-- No label --}}
<x-ui::progress
    :value="45"
    labelPosition="none"
/>

{{-- Inside label --}}
<x-ui::progress
    :value="65"
    labelPosition="inside"
    :showPercentage="true"
    size="lg"
/>

{{-- Outside label --}}
<x-ui::progress
    :value="75"
    label="Uploading file..."
    labelPosition="outside"
    :showPercentage="true"
/>
```

### 4. Striped Progress

```blade
{{-- Static stripes --}}
<x-ui::progress
    :value="60"
    :striped="true"
    color="blue"
/>

{{-- Animated stripes --}}
<x-ui::progress
    :value="60"
    :striped="true"
    :animated="true"
    color="green"
/>
```

### 5. Indeterminate Progress

For unknown duration loading states.

```blade
<x-ui::progress
    :indeterminate="true"
    color="blue"
    size="lg"
/>
```

## Circular Progress Variants

### Size Variants

```blade
<div class="flex items-center gap-6">
    {{-- Small --}}
    <x-ui::progress.circular
        :value="45"
        size="sm"
    />

    {{-- Default --}}
    <x-ui::progress.circular
        :value="65"
        size="default"
    />

    {{-- Large --}}
    <x-ui::progress.circular
        :value="75"
        size="lg"
    />

    {{-- Extra Large --}}
    <x-ui::progress.circular
        :value="85"
        size="xl"
    />
</div>
```

### With Label

```blade
<x-ui::progress.circular
    :value="75"
    :max="100"
    size="lg"
    color="green"
    label="Complete"
    :showPercentage="true"
/>
```

### Color Variants

```blade
<div class="flex items-center gap-6">
    <x-ui::progress.circular :value="45" color="blue" />
    <x-ui::progress.circular :value="55" color="green" />
    <x-ui::progress.circular :value="65" color="red" />
    <x-ui::progress.circular :value="75" color="purple" />
</div>
```

## Step Progress

### Simple Step Progress

```blade
<x-ui::progress.step
    :currentStep="2"
    :totalSteps="4"
    color="blue"
/>
```

### Vertical Steps

```blade
<x-ui::progress.step
    :currentStep="3"
    :totalSteps="5"
    color="green"
    orientation="vertical"
/>
```

### Multi-Step with Labels

```blade
<x-ui::progress.steps
    :steps="[
        'Account Details',
        'Personal Info',
        'Preferences',
        'Review'
    ]"
    :currentStep="2"
    color="blue"
/>
```

### Steps with Descriptions

```blade
<x-ui::progress.steps
    :steps="[
        [
            'title' => 'Create Account',
            'description' => 'Enter your email and password'
        ],
        [
            'title' => 'Verify Email',
            'description' => 'Check your inbox for verification'
        ],
        [
            'title' => 'Complete Profile',
            'description' => 'Add your personal information'
        ],
        [
            'title' => 'Get Started',
            'description' => 'Start using the platform'
        ]
    ]"
    :currentStep="2"
    color="blue"
    orientation="vertical"
/>
```

### Clickable Steps

```blade
<x-ui::progress.steps
    :steps="['Details', 'Payment', 'Confirm']"
    :currentStep="$currentStep"
    :clickable="true"
    color="blue"
/>
```

```php
// Livewire component
public function goToStep($step)
{
    if ($step <= $this->completedSteps) {
        $this->currentStep = $step;
    }
}
```

## Real-World Examples

### Example 1: File Upload Progress

```blade
<div class="space-y-4">
    @foreach($uploads as $upload)
        <div class="bg-white dark:bg-gray-800 rounded-lg p-4">
            <div class="flex items-center justify-between mb-2">
                <div class="flex items-center gap-3">
                    <svg class="w-8 h-8 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M4 4a2 2 0 012-2h4.586A2 2 0 0112 2.586L15.414 6A2 2 0 0116 7.414V16a2 2 0 01-2 2H6a2 2 0 01-2-2V4z" clip-rule="evenodd"></path>
                    </svg>

                    <div>
                        <p class="font-medium text-sm">{{ $upload->filename }}</p>
                        <p class="text-xs text-gray-500">{{ $upload->size }}</p>
                    </div>
                </div>

                @if($upload->status === 'uploading')
                    <x-ui::spinner size="sm" />
                @elseif($upload->status === 'completed')
                    <svg class="w-6 h-6 text-green-500" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                    </svg>
                @elseif($upload->status === 'error')
                    <svg class="w-6 h-6 text-red-500" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"></path>
                    </svg>
                @endif
            </div>

            @if($upload->status === 'uploading')
                <x-ui::progress
                    :value="$upload->progress"
                    :max="100"
                    color="blue"
                    :showPercentage="true"
                    labelPosition="outside"
                    size="default"
                />
            @elseif($upload->status === 'completed')
                <x-ui::progress
                    :value="100"
                    :max="100"
                    color="green"
                />
            @elseif($upload->status === 'error')
                <div class="text-sm text-red-600 dark:text-red-400">
                    Upload failed: {{ $upload->error_message }}
                </div>
            @endif
        </div>
    @endforeach
</div>
```

### Example 2: Profile Completion

```blade
<div class="bg-white dark:bg-gray-800 rounded-lg p-6">
    <div class="flex items-center justify-between mb-4">
        <div>
            <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                Complete Your Profile
            </h3>
            <p class="text-sm text-gray-500 dark:text-gray-400">
                {{ $completedSections }}/{{ $totalSections }} sections completed
            </p>
        </div>

        <x-ui::progress.circular
            :value="$completedSections"
            :max="$totalSections"
            size="lg"
            color="green"
        />
    </div>

    <x-ui::progress
        :value="$completedSections"
        :max="$totalSections"
        color="green"
        size="lg"
        class="mb-6"
    />

    <div class="space-y-3">
        @foreach($profileSections as $section)
            <div class="flex items-center justify-between p-3 bg-gray-50 dark:bg-gray-700 rounded-lg">
                <div class="flex items-center gap-3">
                    @if($section->completed)
                        <div class="w-6 h-6 rounded-full bg-green-500 flex items-center justify-center">
                            <svg class="w-4 h-4 text-white" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                            </svg>
                        </div>
                    @else
                        <div class="w-6 h-6 rounded-full border-2 border-gray-300 dark:border-gray-600"></div>
                    @endif

                    <div>
                        <p class="font-medium text-sm">{{ $section->title }}</p>
                        <p class="text-xs text-gray-500">{{ $section->description }}</p>
                    </div>
                </div>

                @if(!$section->completed)
                    <x-ui::button
                        variant="primary"
                        size="sm"
                        wire:click="completeSection('{{ $section->id }}')"
                    >
                        Complete
                    </x-ui::button>
                @endif
            </div>
        @endforeach
    </div>
</div>
```

### Example 3: Multi-Step Form

```blade
<div class="max-w-4xl mx-auto bg-white dark:bg-gray-800 rounded-lg shadow-lg p-6">
    <h2 class="text-2xl font-bold mb-6 text-gray-900 dark:text-white">
        Service Registration
    </h2>

    <x-ui::progress.steps
        :steps="[
            [
                'title' => 'Service Details',
                'description' => 'Basic information about your service'
            ],
            [
                'title' => 'Pricing',
                'description' => 'Set your rates and plans'
            ],
            [
                'title' => 'Availability',
                'description' => 'Configure your schedule'
            ],
            [
                'title' => 'Review',
                'description' => 'Review and publish'
            ]
        ]"
        :currentStep="$currentStep"
        color="blue"
        class="mb-8"
    />

    <div class="mt-8">
        @if($currentStep === 1)
            {{-- Step 1: Service Details --}}
            <div class="space-y-4">
                <x-ui::form.input
                    label="Service Name"
                    wire:model="serviceName"
                    placeholder="e.g., Dog Walking"
                />

                <x-ui::form.textarea
                    label="Description"
                    wire:model="description"
                    rows="4"
                    placeholder="Describe your service..."
                />

                <x-ui::form.select
                    label="Category"
                    wire:model="category"
                >
                    <option value="">Select a category</option>
                    <option value="grooming">Grooming</option>
                    <option value="training">Training</option>
                    <option value="boarding">Boarding</option>
                    <option value="walking">Walking</option>
                </x-ui::form.select>
            </div>

        @elseif($currentStep === 2)
            {{-- Step 2: Pricing --}}
            <div class="space-y-4">
                <x-ui::form.input
                    label="Base Price"
                    type="number"
                    wire:model="basePrice"
                    placeholder="0.00"
                />

                <x-ui::form.toggle
                    label="Offer subscription plans"
                    wire:model="hasSubscription"
                />
            </div>

        @elseif($currentStep === 3)
            {{-- Step 3: Availability --}}
            <div class="space-y-4">
                <div class="grid grid-cols-2 gap-4">
                    <x-ui::form.timepicker
                        label="Start Time"
                        wire:model="startTime"
                    />
                    <x-ui::form.timepicker
                        label="End Time"
                        wire:model="endTime"
                    />
                </div>
            </div>

        @elseif($currentStep === 4)
            {{-- Step 4: Review --}}
            <div class="bg-gray-50 dark:bg-gray-700 rounded-lg p-6">
                <h3 class="font-semibold mb-4">Review Your Service</h3>

                <dl class="space-y-3">
                    <div>
                        <dt class="text-sm font-medium text-gray-500">Service Name</dt>
                        <dd class="text-sm text-gray-900 dark:text-white">{{ $serviceName }}</dd>
                    </div>
                    <div>
                        <dt class="text-sm font-medium text-gray-500">Category</dt>
                        <dd class="text-sm text-gray-900 dark:text-white">{{ ucfirst($category) }}</dd>
                    </div>
                    <div>
                        <dt class="text-sm font-medium text-gray-500">Base Price</dt>
                        <dd class="text-sm text-gray-900 dark:text-white">${{ $basePrice }}</dd>
                    </div>
                </dl>
            </div>
        @endif
    </div>

    <div class="flex items-center justify-between mt-8 pt-6 border-t border-gray-200 dark:border-gray-700">
        @if($currentStep > 1)
            <x-ui::button
                variant="secondary"
                wire:click="previousStep"
            >
                Previous
            </x-ui::button>
        @else
            <div></div>
        @endif

        @if($currentStep < 4)
            <x-ui::button
                variant="primary"
                wire:click="nextStep"
            >
                Next
            </x-ui::button>
        @else
            <x-ui::button
                variant="primary"
                wire:click="submit"
            >
                Publish Service
            </x-ui::button>
        @endif
    </div>
</div>
```

### Example 4: Skill Levels Dashboard

```blade
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
    @foreach($skills as $skill)
        <div class="bg-white dark:bg-gray-800 rounded-lg p-6 text-center">
            <x-ui::progress.circular
                :value="$skill->level"
                :max="100"
                size="xl"
                :color="$skill->level >= 80 ? 'green' : ($skill->level >= 50 ? 'blue' : 'yellow')"
            >
                <p class="text-sm font-medium text-gray-700 dark:text-gray-300 mt-2">
                    {{ $skill->name }}
                </p>
            </x-ui::progress.circular>

            <div class="mt-4 space-y-2 text-left">
                <div class="flex items-center justify-between text-sm">
                    <span class="text-gray-600 dark:text-gray-400">Experience</span>
                    <span class="font-medium">{{ $skill->experience }} hrs</span>
                </div>
                <div class="flex items-center justify-between text-sm">
                    <span class="text-gray-600 dark:text-gray-400">Projects</span>
                    <span class="font-medium">{{ $skill->projects_count }}</span>
                </div>
            </div>
        </div>
    @endforeach
</div>
```

### Example 5: Task Progress Board

```blade
<div class="space-y-6">
    {{-- Overall Progress --}}
    <div class="bg-white dark:bg-gray-800 rounded-lg p-6">
        <div class="flex items-center justify-between mb-4">
            <div>
                <h3 class="text-lg font-semibold">Project Progress</h3>
                <p class="text-sm text-gray-500">{{ $completedTasks }}/{{ $totalTasks }} tasks completed</p>
            </div>

            <x-ui::progress.circular
                :value="$completedTasks"
                :max="$totalTasks"
                size="lg"
                color="blue"
            />
        </div>

        <x-ui::progress
            :value="$completedTasks"
            :max="$totalTasks"
            color="blue"
            size="lg"
            :showPercentage="true"
            labelPosition="outside"
        />
    </div>

    {{-- Category Progress --}}
    <div class="bg-white dark:bg-gray-800 rounded-lg p-6">
        <h3 class="text-lg font-semibold mb-4">Progress by Category</h3>

        <div class="space-y-4">
            @foreach($categories as $category)
                <div>
                    <div class="flex items-center justify-between mb-2">
                        <div class="flex items-center gap-2">
                            <span class="w-3 h-3 rounded-full" style="background-color: {{ $category->color }}"></span>
                            <span class="font-medium text-sm">{{ $category->name }}</span>
                        </div>
                        <span class="text-sm text-gray-500">
                            {{ $category->completed_count }}/{{ $category->total_count }}
                        </span>
                    </div>

                    <x-ui::progress
                        :value="$category->completed_count"
                        :max="$category->total_count"
                        :color="$category->color_name"
                        size="sm"
                    />
                </div>
            @endforeach
        </div>
    </div>
</div>
```

### Example 6: Loading States

```blade
<div class="space-y-6">
    {{-- Processing data --}}
    <div class="bg-white dark:bg-gray-800 rounded-lg p-6">
        <div class="flex items-center gap-4 mb-4">
            <x-ui::spinner />
            <span class="font-medium">Processing your data...</span>
        </div>

        <x-ui::progress
            :indeterminate="true"
            color="blue"
            size="default"
        />
    </div>

    {{-- With striped animation --}}
    <div class="bg-white dark:bg-gray-800 rounded-lg p-6">
        <p class="font-medium mb-4">Syncing files...</p>

        <x-ui::progress
            :value="$syncProgress"
            :max="100"
            :striped="true"
            :animated="true"
            color="green"
            size="lg"
        />
    </div>

    {{-- Multiple processes --}}
    <div class="bg-white dark:bg-gray-800 rounded-lg p-6">
        <h3 class="font-semibold mb-4">Active Processes</h3>

        <div class="space-y-4">
            @foreach($processes as $process)
                <div>
                    <div class="flex items-center justify-between mb-2">
                        <span class="text-sm font-medium">{{ $process->name }}</span>
                        <span class="text-sm text-gray-500">{{ $process->status }}</span>
                    </div>

                    @if($process->status === 'in_progress')
                        <x-ui::progress
                            :value="$process->progress"
                            :max="100"
                            :striped="true"
                            :animated="true"
                            color="blue"
                        />
                    @elseif($process->status === 'completed')
                        <x-ui::progress
                            :value="100"
                            color="green"
                        />
                    @endif
                </div>
            @endforeach
        </div>
    </div>
</div>
```

## Livewire Integration

### Dynamic Progress Update

```blade
<div>
    <x-ui::progress
        :value="$progress"
        :max="100"
        label="Processing..."
        labelPosition="outside"
        :showPercentage="true"
        color="blue"
        size="lg"
    />

    <div class="mt-4 flex gap-2">
        <x-ui::button
            variant="primary"
            size="sm"
            wire:click="startProcess"
            :disabled="$isProcessing"
        >
            Start
        </x-ui::button>

        <x-ui::button
            variant="secondary"
            size="sm"
            wire:click="resetProcess"
        >
            Reset
        </x-ui::button>
    </div>
</div>
```

```php
// Livewire component
namespace App\Livewire\Components;

use Livewire\Component;

class ProgressDemo extends Component
{
    public int $progress = 0;
    public bool $isProcessing = false;

    public function startProcess()
    {
        $this->isProcessing = true;
        $this->progress = 0;

        // Simulate progress updates
        for ($i = 0; $i <= 100; $i += 10) {
            $this->progress = $i;
            $this->dispatch('progress-updated', progress: $i);
            sleep(0.5); // In real app, this would be actual processing
        }

        $this->isProcessing = false;
        $this->dispatch('process-completed');
    }

    public function resetProcess()
    {
        $this->progress = 0;
        $this->isProcessing = false;
    }

    public function render()
    {
        return view('livewire.components.progress-demo');
    }
}
```

### Multi-Step Form

```php
namespace App\Livewire\Forms;

use Livewire\Component;

class ServiceRegistration extends Component
{
    public int $currentStep = 1;
    public int $totalSteps = 4;

    // Form fields
    public string $serviceName = '';
    public string $description = '';
    public string $category = '';
    public float $basePrice = 0;
    public bool $hasSubscription = false;
    public string $startTime = '';
    public string $endTime = '';

    public function nextStep()
    {
        $this->validate($this->getValidationRules());

        if ($this->currentStep < $this->totalSteps) {
            $this->currentStep++;
        }
    }

    public function previousStep()
    {
        if ($this->currentStep > 1) {
            $this->currentStep--;
        }
    }

    public function goToStep(int $step)
    {
        if ($step <= $this->currentStep || $step === 1) {
            $this->currentStep = $step;
        }
    }

    public function submit()
    {
        $this->validate($this->getValidationRules());

        // Save service
        // ...

        $this->dispatch('service-created');
        return redirect()->route('services.index');
    }

    protected function getValidationRules(): array
    {
        return match($this->currentStep) {
            1 => [
                'serviceName' => 'required|string|max:255',
                'description' => 'required|string|max:1000',
                'category' => 'required|string',
            ],
            2 => [
                'basePrice' => 'required|numeric|min:0',
            ],
            3 => [
                'startTime' => 'required',
                'endTime' => 'required|after:startTime',
            ],
            default => [],
        };
    }

    public function render()
    {
        return view('livewire.forms.service-registration');
    }
}
```

## Accessibility

### ARIA Attributes

All progress components include proper ARIA attributes:

```blade
<div
    role="progressbar"
    aria-valuenow="{{ $value }}"
    aria-valuemin="0"
    aria-valuemax="{{ $max }}"
    aria-label="Progress: {{ $percentage }}%"
>
    {{-- Progress bar --}}
</div>
```

### Screen Reader Support

```blade
{{-- Include text for screen readers --}}
<x-ui::progress :value="75" :max="100">
    <span class="sr-only">75% complete</span>
</x-ui::progress>
```

### Keyboard Navigation

For step progress with clickable steps:

```blade
<button
    wire:click="goToStep({{ $stepNumber }})"
    class="focus:outline-none focus:ring-2 focus:ring-blue-500 rounded-full"
    aria-current="{{ $isCurrent ? 'step' : 'false' }}"
>
    {{-- Step indicator --}}
</button>
```

## Best Practices

### 1. Choose Appropriate Progress Type

**Linear Progress:**
- File uploads/downloads
- Form submission
- Data processing with known duration

**Circular Progress:**
- Dashboard widgets
- Profile completion
- Skill levels
- Compact spaces

**Step Progress:**
- Multi-step forms
- Onboarding flows
- Checkout processes
- Wizards

### 2. Provide Context

```blade
{{-- Good: Clear context --}}
<x-ui::progress
    :value="$bytesUploaded"
    :max="$totalBytes"
    label="Uploading profile picture..."
    labelPosition="outside"
    :showPercentage="true"
/>

{{-- Avoid: No context --}}
<x-ui::progress :value="45" />
```

### 3. Use Appropriate Colors

```blade
{{-- Success states --}}
<x-ui::progress :value="100" color="green" />

{{-- Warning states --}}
<x-ui::progress :value="90" color="yellow" />

{{-- Error states --}}
<x-ui::progress :value="$failed" :max="$total" color="red" />

{{-- Normal progress --}}
<x-ui::progress :value="$current" color="blue" />
```

### 4. Handle Edge Cases

```blade
{{-- Zero progress --}}
<x-ui::progress
    :value="0"
    :max="100"
    label="Waiting to start..."
    labelPosition="outside"
/>

{{-- Complete progress --}}
<x-ui::progress
    :value="100"
    :max="100"
    color="green"
>
    <p class="text-sm text-green-600 mt-2">
        ✓ Upload complete!
    </p>
</x-ui::progress>

{{-- Error state --}}
@if($uploadError)
    <div class="text-sm text-red-600">
        Upload failed: {{ $uploadError }}
    </div>
@else
    <x-ui::progress :value="$progress" />
@endif
```

### 5. Optimize Performance

```blade
{{-- Throttle updates for smooth animation --}}
<div wire:poll.1s="updateProgress">
    <x-ui::progress :value="$progress" />
</div>

{{-- Use wire:poll only when needed --}}
@if($isProcessing)
    <div wire:poll.500ms="checkProgress">
        <x-ui::progress :value="$progress" />
    </div>
@endif
```

### 6. Mobile Considerations

```blade
{{-- Stack labels on mobile --}}
<div class="space-y-2">
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-2">
        <span class="font-medium text-sm">{{ $label }}</span>
        <span class="text-sm text-gray-500">{{ $percentage }}%</span>
    </div>

    <x-ui::progress
        :value="$value"
        :max="$max"
        size="lg"
    />
</div>

{{-- Use vertical steps on mobile --}}
<x-ui::progress.steps
    :steps="$steps"
    :currentStep="$currentStep"
    :orientation="$isMobile ? 'vertical' : 'horizontal'"
/>
```

## Dark Mode Support

All progress components include full dark mode support:

```blade
{{-- Automatically adapts to dark mode --}}
<x-ui::progress
    :value="75"
    color="blue"
    labelPosition="outside"
    :showPercentage="true"
/>

<x-ui::progress.circular
    :value="65"
    color="green"
/>

<x-ui::progress.steps
    :steps="$steps"
    :currentStep="2"
/>
```

## Animation Customization

### Custom Animation Speed

```css
/* In your CSS file */
.animate-progress-stripes {
    animation: progress-stripes 2s linear infinite; /* Slower */
}

.animate-progress-indeterminate {
    animation: progress-indeterminate 1s ease-in-out infinite; /* Faster */
}
```

### Disable Animations

```blade
{{-- For users who prefer reduced motion --}}
@media (prefers-reduced-motion: reduce) {
    <x-ui::progress
        :value="$progress"
        :striped="false"
        :animated="false"
    />
}
```

## Testing

### Component Testing

```php
public function test_progress_displays_correct_percentage()
{
    $progress = 45;
    $max = 100;

    $view = $this->blade(
        '<x-ui::progress :value="$progress" :max="$max" :showPercentage="true" labelPosition="inside" />',
        ['progress' => $progress, 'max' => $max]
    );

    $view->assertSee('45%');
}

public function test_circular_progress_renders()
{
    $view = $this->blade(
        '<x-ui::progress.circular :value="75" :max="100" />',
        []
    );

    $view->assertSee('75%');
}
```

### Livewire Testing

```php
public function test_multi_step_form_navigation()
{
    Livewire::test(ServiceRegistration::class)
        ->assertSet('currentStep', 1)
        ->call('nextStep')
        ->assertSet('currentStep', 2)
        ->call('previousStep')
        ->assertSet('currentStep', 1);
}

public function test_progress_updates_correctly()
{
    Livewire::test(ProgressDemo::class)
        ->assertSet('progress', 0)
        ->call('startProcess')
        ->assertSet('progress', 100)
        ->assertDispatched('process-completed');
}
```

## Related Components

- [Spinner](spinner.md) - Loading indicators
- [Badge](badge.md) - Status indicators
- [Alert](alert.md) - Status messages
- [Button](button.md) - Action buttons

## Resources

- [Flowbite Progress Documentation](https://flowbite.com/docs/components/progress/)
- [ARIA Progressbar Pattern](https://www.w3.org/WAI/ARIA/apg/patterns/meter/)
- [MDN: progress element](https://developer.mozilla.org/en-US/docs/Web/HTML/Element/progress)

---

**Component Version:** 1.0.0
**Last Updated:** 2025-11-20
**Flowbite Version:** 2.x