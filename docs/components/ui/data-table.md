# Data Table

Responsive data table component with mobile card view support.

## Component Location

`resources/views/components/ui/data-table.blade.php`

## Features

- Mobile card view, desktop table view
- Flexible column definition system
- Custom format functions
- Pagination support
- Empty state integration
- Custom mobile card views
- Alignment options (left, center, right)
- Text wrapping control
- Hide columns on mobile
- Custom CSS classes per column

## Usage

### Basic Data Table

```blade
@php
$columns = [
    [
        'key' => 'created_at',
        'label' => __('Date'),
        'align' => 'left',
        'wrap' => false,
        'hideOnMobile' => true,
        'format' => fn($item) => $item->created_at->format('d.m.Y H:i')
    ],
    [
        'key' => 'name',
        'label' => __('Name'),
        'align' => 'left',
        'format' => fn($item) => $item->name
    ],
    [
        'key' => 'status',
        'label' => __('Status'),
        'align' => 'left',
        'wrap' => false,
        'format' => fn($item) => '<span class="px-2 py-1 text-xs rounded-full bg-green-100 text-green-800">' . $item->status . '</span>'
    ],
    [
        'key' => 'amount',
        'label' => __('Amount'),
        'align' => 'right',
        'wrap' => false,
        'class' => 'font-medium text-gray-900',
        'format' => fn($item) => number_format($item->amount, 2) . ' ₺'
    ],
];
@endphp

<x-ui.data-table
    :data="$payments"
    :columns="$columns"
    :emptyMessage="__('No payments found')"
    :pagination="$payments"
    mobileView="partials.payment-card"
/>
```

### Simple Table

```blade
@php
$columns = [
    ['key' => 'id', 'label' => 'ID'],
    ['key' => 'name', 'label' => 'Name'],
    ['key' => 'email', 'label' => 'Email'],
];
@endphp

<x-ui.data-table
    :data="$users"
    :columns="$columns"
/>
```

### With Custom Formatting

```blade
@php
$columns = [
    [
        'key' => 'user',
        'label' => 'User',
        'format' => function($order) {
            return '<div class="flex items-center space-x-2">
                <img src="' . $order->user->avatar . '" class="w-8 h-8 rounded-full">
                <span>' . $order->user->name . '</span>
            </div>';
        }
    ],
    [
        'key' => 'total',
        'label' => 'Total',
        'align' => 'right',
        'format' => fn($order) => '$' . number_format($order->total, 2)
    ],
    [
        'key' => 'status',
        'label' => 'Status',
        'align' => 'center',
        'format' => function($order) {
            $colors = [
                'pending' => 'yellow',
                'completed' => 'green',
                'cancelled' => 'red',
            ];
            $color = $colors[$order->status] ?? 'gray';
            return "<x-ui.badge variant=\"{$color}\">{$order->status}</x-ui.badge>";
        }
    ],
];
@endphp

<x-ui.data-table
    :data="$orders"
    :columns="$columns"
    :pagination="$orders"
/>
```

### Finance Table Example

```blade
@php
$columns = [
    [
        'key' => 'payment_date',
        'label' => __('Date'),
        'align' => 'left',
        'wrap' => false,
        'hideOnMobile' => true,
        'format' => fn($payment) => $payment->payment_date->format('d.m.Y')
    ],
    [
        'key' => 'description',
        'label' => __('Description'),
        'align' => 'left',
        'format' => fn($payment) => $payment->description
    ],
    [
        'key' => 'amount',
        'label' => __('Amount'),
        'align' => 'right',
        'wrap' => false,
        'class' => 'font-medium text-gray-900 dark:text-white',
        'format' => fn($payment) => number_format($payment->amount, 2) . ' ₺'
    ],
    [
        'key' => 'status',
        'label' => __('Status'),
        'align' => 'center',
        'format' => function($payment) {
            $variant = match($payment->status) {
                'completed' => 'success',
                'pending' => 'warning',
                'failed' => 'danger',
                default => 'default'
            };
            return "<x-ui.badge variant=\"{$variant}\">" . __($payment->status) . "</x-ui.badge>";
        }
    ],
];
@endphp

<x-ui.data-table
    :data="$payments"
    :columns="$columns"
    :pagination="$payments"
    :emptyMessage="__('No payments found')"
/>
```

### With Actions Column

```blade
@php
$columns = [
    ['key' => 'name', 'label' => 'Name'],
    ['key' => 'email', 'label' => 'Email'],
    [
        'key' => 'actions',
        'label' => 'Actions',
        'align' => 'right',
        'format' => function($user) {
            return '
                <x-ui.button.group>
                    <x-ui.button.group-item
                        position="first"
                        variant="secondary"
                        :outline="true"
                        size="xs"
                        href="' . route('users.edit', $user->id) . '"
                    >
                        Edit
                    </x-ui.button.group-item>
                    <x-ui.button.group-item
                        position="last"
                        variant="danger"
                        :outline="true"
                        size="xs"
                        wire:click="delete(' . $user->id . ')"
                        wire:confirm="Are you sure?"
                    >
                        Delete
                    </x-ui.button.group-item>
                </x-ui.button.group>
            ';
        }
    ],
];
@endphp

<x-ui.data-table
    :data="$users"
    :columns="$columns"
/>
```

### Empty State

```blade
<x-ui.data-table
    :data="[]"
    :columns="$columns"
    :emptyMessage="__('No data available. Click the button above to add your first item.')"
/>
```

## Column Definition

### Column Props

| Prop | Type | Default | Description |
|------|------|---------|-------------|
| `key` | string | required | Data key for the column |
| `label` | string | required | Column header label |
| `align` | string | 'left' | Text alignment: left, center, right |
| `wrap` | boolean | true | Allow text wrapping |
| `hideOnMobile` | boolean | false | Hide column on mobile devices |
| `class` | string | optional | Custom CSS classes for the column |
| `format` | function | optional | Value formatting function |

### Format Function

The format function receives the item as parameter and should return a string (HTML allowed):

```php
'format' => fn($item) => $item->created_at->format('Y-m-d')
```

## Component Props

| Prop | Type | Default | Description |
|------|------|---------|-------------|
| `data` | array | required | Data to display |
| `columns` | array | required | Column definitions |
| `emptyMessage` | string | 'No records found' | Empty state message |
| `pagination` | Paginator | optional | Laravel pagination object |
| `mobileCard` | slot | optional | Custom mobile card view |

## Best Practices

1. **Column Count**: Limit to 5-7 columns for better readability

2. **Mobile**: Hide less important columns on mobile with `hideOnMobile`

3. **Alignment**: Align numbers to the right, text to the left

4. **Formatting**: Use format functions for dates, currency, and status badges

5. **Text Wrapping**: Disable wrapping for dates, numbers, and status columns

6. **Actions**: Place action columns on the right with right alignment

7. **Empty States**: Provide clear, actionable empty state messages

8. **Pagination**: Always paginate large datasets

9. **Performance**: Use eager loading to prevent N+1 queries

10. **Accessibility**: Provide meaningful column labels

## Examples

### User Management Table

```blade
@php
$columns = [
    [
        'key' => 'user',
        'label' => __('User'),
        'format' => function($user) {
            return '
                <div class="flex items-center space-x-3">
                    <x-ui.avatar :src="$user->avatar" size="sm" />
                    <div>
                        <div class="font-medium text-gray-900 dark:text-white">' . $user->name . '</div>
                        <div class="text-sm text-gray-500 dark:text-gray-400">' . $user->email . '</div>
                    </div>
                </div>
            ';
        }
    ],
    [
        'key' => 'role',
        'label' => __('Role'),
        'align' => 'center',
        'format' => fn($user) => "<x-ui.badge variant=\"primary\">{$user->role}</x-ui.badge>"
    ],
    [
        'key' => 'joined',
        'label' => __('Joined'),
        'hideOnMobile' => true,
        'format' => fn($user) => $user->created_at->format('M d, Y')
    ],
    [
        'key' => 'status',
        'label' => __('Status'),
        'align' => 'center',
        'format' => function($user) {
            $variant = $user->is_active ? 'success' : 'danger';
            $text = $user->is_active ? 'Active' : 'Inactive';
            return "<x-ui.badge variant=\"{$variant}\">{$text}</x-ui.badge>";
        }
    ],
    [
        'key' => 'actions',
        'label' => '',
        'align' => 'right',
        'format' => fn($user) => '<x-ui.dropdown align="right" width="48">
            <x-slot:trigger>
                <button class="p-2 hover:bg-gray-100 rounded">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M10 6a2 2 0 110-4 2 2 0 010 4zM10 12a2 2 0 110-4 2 2 0 010 4zM10 18a2 2 0 110-4 2 2 0 010 4z"/>
                    </svg>
                </button>
            </x-slot:trigger>
            <x-ui.dropdown.item href="' . route('users.edit', $user->id) . '">Edit</x-ui.dropdown.item>
            <x-ui.dropdown.item variant="danger" wire:click="delete(' . $user->id . ')">Delete</x-ui.dropdown.item>
        </x-ui.dropdown>'
    ],
];
@endphp

<x-ui.data-table
    :data="$users"
    :columns="$columns"
    :pagination="$users"
    :emptyMessage="__('No users found. Add your first user to get started.')"
/>
```

### Transaction History

```blade
@php
$columns = [
    [
        'key' => 'date',
        'label' => __('Date'),
        'wrap' => false,
        'format' => fn($tx) => $tx->created_at->format('M d, Y H:i')
    ],
    [
        'key' => 'type',
        'label' => __('Type'),
        'align' => 'center',
        'format' => function($tx) {
            $variant = $tx->type === 'credit' ? 'success' : 'warning';
            return "<x-ui.badge variant=\"{$variant}\">" . ucfirst($tx->type) . "</x-ui.badge>";
        }
    ],
    [
        'key' => 'description',
        'label' => __('Description'),
    ],
    [
        'key' => 'amount',
        'label' => __('Amount'),
        'align' => 'right',
        'wrap' => false,
        'class' => 'font-semibold',
        'format' => function($tx) {
            $color = $tx->type === 'credit' ? 'text-green-600' : 'text-red-600';
            $sign = $tx->type === 'credit' ? '+' : '-';
            return "<span class=\"{$color}\">{$sign}$" . number_format($tx->amount, 2) . "</span>";
        }
    ],
];
@endphp

<x-ui.data-table
    :data="$transactions"
    :columns="$columns"
    :pagination="$transactions"
/>
```

## Mobile Responsive

The data table automatically switches to a card view on mobile devices. Columns marked with `hideOnMobile` will not appear in the mobile view.

To customize the mobile card view, pass a custom blade view to the `mobileView` prop:

```blade
<x-ui.data-table
    :data="$items"
    :columns="$columns"
    mobileView="partials.custom-mobile-card"
/>
```