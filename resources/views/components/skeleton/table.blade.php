{{-- Skeleton Table --}}
@props([
    'rows' => 5,
    'columns' => 4,
    'animated' => true,
    'header' => true,
])

@php
    $animateClass = $animated ? 'animate-pulse' : '';
@endphp

<div {{ $attributes->merge(['class' => 'relative overflow-x-auto']) }} role="status" aria-label="Loading">
    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
        @if($header)
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    @for($col = 0; $col < $columns; $col++)
                        <th scope="col" class="px-6 py-3">
                            <div class="h-2.5 bg-gray-200 rounded-full dark:bg-gray-600 w-24 {{ $animateClass }}"></div>
                        </th>
                    @endfor
                </tr>
            </thead>
        @endif

        <tbody>
            @for($row = 0; $row < $rows; $row++)
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                    @for($col = 0; $col < $columns; $col++)
                        <td class="px-6 py-4">
                            <div class="h-2 bg-gray-200 rounded-full dark:bg-gray-700 {{ ['w-20', 'w-32', 'w-24', 'w-28', 'w-36'][$col % 5] }} {{ $animateClass }}"></div>
                        </td>
                    @endfor
                </tr>
            @endfor
        </tbody>
    </table>

    <span class="sr-only">Loading...</span>
</div>