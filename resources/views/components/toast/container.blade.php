{{-- Toast Container Component --}}
@props([
    'position' => 'top-right', // top-left, top-right, bottom-left, bottom-right
])

@php
    $positions = [
        'top-left' => 'top-5 start-5',
        'top-right' => 'top-5 end-5',
        'bottom-left' => 'bottom-5 start-5',
        'bottom-right' => 'bottom-5 end-5',
    ];

    $positionClass = $positions[$position] ?? $positions['top-right'];
@endphp

<div
    {{ $attributes->merge(['class' => "fixed {$positionClass} z-50 space-y-4"]) }}
    x-data="toastContainer()"
>
    {{ $slot }}
</div>

@once
@push('scripts')
<script>
function toastContainer() {
    return {
        toasts: [],

        addToast(message, type = 'default', duration = 5000) {
            const id = Date.now();
            this.toasts.push({ id, message, type, duration });

            if (duration > 0) {
                setTimeout(() => {
                    this.removeToast(id);
                }, duration);
            }
        },

        removeToast(id) {
            this.toasts = this.toasts.filter(toast => toast.id !== id);
        }
    }
}

// Global toast helper
window.showToast = function(message, type = 'default', duration = 5000) {
    window.dispatchEvent(new CustomEvent('show-toast', {
        detail: { message, type, duration }
    }));
};
</script>
@endpush
@endonce