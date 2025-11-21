{{-- Navigation Drawer --}}
@props([
    'id' => null,
    'position' => 'left',
    'logo' => null,
    'logoAlt' => 'Logo',
    'appName' => null,
])

@php
    $drawerId = $id ?? 'nav-drawer-' . uniqid();
@endphp

<x-ui::drawer :id="$drawerId" :position="$position" :title="null" {{ $attributes }}>
    {{-- Logo/Brand --}}
    @if($logo || $appName)
        <div class="mb-6 flex items-center">
            @if($logo)
                <img src="{{ $logo }}" alt="{{ $logoAlt }}" class="h-8 me-3">
            @endif
            @if($appName)
                <span class="self-center text-xl font-semibold whitespace-nowrap dark:text-white">
                    {{ $appName }}
                </span>
            @endif
        </div>
    @endif

    {{-- Navigation Items --}}
    <nav>
        {{ $slot }}
    </nav>
</x-ui::drawer>