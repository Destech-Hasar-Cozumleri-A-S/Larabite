{{-- Footer Copyright --}}
@props([
    'year' => null,
    'company' => null,
    'href' => null,
])

@php
    $currentYear = $year ?? date('Y');
@endphp

<span {{ $attributes->merge(['class' => 'text-sm text-gray-500 dark:text-gray-400']) }}>
    © {{ $currentYear }}
    @if($href && $company)
        <a href="{{ $href }}" class="hover:underline">{{ $company }}</a>™
    @elseif($company)
        {{ $company }}™
    @else
        {{ $slot }}
    @endif
    @if($company || $href)
        . All Rights Reserved.
    @endif
</span>