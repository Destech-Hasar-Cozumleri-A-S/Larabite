{{-- Inline Datepicker Component --}}
@props([
    'name' => null,
    'value' => null,
    'title' => null,
    'minDate' => null,
    'maxDate' => null,
    'format' => 'mm/dd/yyyy',
    'autoselect' => false,
])

@php
    $id = $name ?? 'inline-datepicker-' . uniqid();

    // Build data attributes
    $dataAttributes = [
        'inline-datepicker' => '',
        'data-date' => $value ?? date('m/d/Y'),
    ];

    if ($title) {
        $dataAttributes['datepicker-title'] = $title;
    }

    if ($minDate) {
        $dataAttributes['datepicker-min-date'] = $minDate;
    }

    if ($maxDate) {
        $dataAttributes['datepicker-max-date'] = $maxDate;
    }

    if ($format) {
        $dataAttributes['datepicker-format'] = $format;
    }

    if ($autoselect) {
        $dataAttributes['datepicker-autoselect-today'] = '';
    }
@endphp

<div {{ $attributes->merge(['class' => 'inline-block']) }}>
    <div
        id="{{ $id }}"
        @foreach($dataAttributes as $key => $val)
            {{ $key }}="{{ $val }}"
        @endforeach
    ></div>

    @if($name)
        <input type="hidden" name="{{ $name }}" id="{{ $id }}-input" value="{{ $value }}">
    @endif
</div>

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const datepicker = document.getElementById('{{ $id }}');
        @if($name)
        const hiddenInput = document.getElementById('{{ $id }}-input');

        // Update hidden input when date is selected
        datepicker.addEventListener('changeDate', function(e) {
            if (e.detail.date) {
                const formattedDate = formatDate(e.detail.date);
                hiddenInput.value = formattedDate;

                // Trigger Livewire update if applicable
                if (hiddenInput.hasAttribute('wire:model')) {
                    hiddenInput.dispatchEvent(new Event('input'));
                }
            }
        });

        function formatDate(date) {
            const format = '{{ $format }}';
            const d = new Date(date);
            const day = String(d.getDate()).padStart(2, '0');
            const month = String(d.getMonth() + 1).padStart(2, '0');
            const year = d.getFullYear();

            return format
                .replace('dd', day)
                .replace('mm', month)
                .replace('yyyy', year);
        }
        @endif
    });
</script>
@endpush