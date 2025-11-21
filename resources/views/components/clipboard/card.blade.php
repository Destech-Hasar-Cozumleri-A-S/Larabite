{{-- Clipboard Card with Multiple Fields --}}
@props([
    'title' => null,
    'description' => null,
    'fields' => [], // Array of fields: [['label' => 'API Key', 'value' => 'xxx'], ...]
])

<x-ui::card {{ $attributes }}>
    @if($title || $description)
        <div class="mb-4">
            @if($title)
                <h5 class="text-xl font-bold text-gray-900 dark:text-white">
                    {{ $title }}
                </h5>
            @endif

            @if($description)
                <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">
                    {{ $description }}
                </p>
            @endif
        </div>
    @endif

    @if(!empty($fields))
        <div class="space-y-4">
            @foreach($fields as $field)
                <x-ui::clipboard.input-icon
                    :label="$field['label'] ?? ''"
                    :value="$field['value'] ?? ''"
                    :placeholder="$field['placeholder'] ?? ''"
                    :tooltip="$field['tooltip'] ?? true"
                    :tooltipText="$field['tooltipText'] ?? 'Copy to clipboard'"
                    :copiedTooltipText="$field['copiedTooltipText'] ?? 'Copied!'"
                    :size="$field['size'] ?? 'base'"
                    :disabled="$field['disabled'] ?? false"
                />
            @endforeach
        </div>
    @else
        {{ $slot }}
    @endif
</x-ui::card>