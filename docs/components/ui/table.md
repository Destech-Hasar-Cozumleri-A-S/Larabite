# Table

Responsive data table component with multiple variants and features. Built following Flowbite design patterns with support for striped rows, hover effects, sorting, and more.

## Component Location

- **Base Component**: `resources/views/components/ui/table.blade.php`
- **Table Head**: `resources/views/components/ui/table/head.blade.php`
- **Table Body**: `resources/views/components/ui/table/body.blade.php`
- **Table Row**: `resources/views/components/ui/table/row.blade.php`
- **Table Header Cell**: `resources/views/components/ui/table/header.blade.php`
- **Table Cell**: `resources/views/components/ui/table/cell.blade.php`
- **Table Footer**: `resources/views/components/ui/table/foot.blade.php`
- **Table Caption**: `resources/views/components/ui/table/caption.blade.php`

**Note**: The existing `data-table.blade.php` component provides a data-driven approach for programmatic table generation. This new table component system provides more granular control for custom layouts.

## Features

- Responsive design with horizontal scroll
- Striped rows and hover effects
- Sortable column headers
- Bordered and borderless variants
- Shadow and rounded corners
- Table captions
- Footer support
- Full dark mode support
- Accessible with semantic HTML
- Cell alignment options
- Text wrapping control

## Usage

### Basic Table

```blade
<x-ui::table>
    <x-ui::table.head>
        <x-ui::table.row>
            <x-ui::table.header>Product Name</x-ui::table.header>
            <x-ui::table.header>Color</x-ui::table.header>
            <x-ui::table.header>Category</x-ui::table.header>
            <x-ui::table.header align="right">Price</x-ui::table.header>
        </x-ui::table.row>
    </x-ui::table.head>
    <x-ui::table.body>
        <x-ui::table.row>
            <x-ui::table.cell>Apple MacBook Pro 17"</x-ui::table.cell>
            <x-ui::table.cell>Silver</x-ui::table.cell>
            <x-ui::table.cell>Laptop</x-ui::table.cell>
            <x-ui::table.cell align="right">$2999</x-ui::table.cell>
        </x-ui::table.row>
        <x-ui::table.row>
            <x-ui::table.cell>Microsoft Surface Pro</x-ui::table.cell>
            <x-ui::table.cell>White</x-ui::table.cell>
            <x-ui::table.cell>Laptop PC</x-ui::table.cell>
            <x-ui::table.cell align="right">$1999</x-ui::table.cell>
        </x-ui::table.row>
    </x-ui::table.body>
</x-ui::table>
```

### Striped Rows

```blade
<x-ui::table>
    <x-ui::table.head>
        <x-ui::table.row>
            <x-ui::table.header>Name</x-ui::table.header>
            <x-ui::table.header>Email</x-ui::table.header>
            <x-ui::table.header>Status</x-ui::table.header>
        </x-ui::table.row>
    </x-ui::table.head>
    <x-ui::table.body striped>
        <x-ui::table.row striped>
            <x-ui::table.cell>John Doe</x-ui::table.cell>
            <x-ui::table.cell>john@example.com</x-ui::table.cell>
            <x-ui::table.cell>Active</x-ui::table.cell>
        </x-ui::table.row>
        <x-ui::table.row striped>
            <x-ui::table.cell>Jane Smith</x-ui::table.cell>
            <x-ui::table.cell>jane@example.com</x-ui::table.cell>
            <x-ui::table.cell>Active</x-ui::table.cell>
        </x-ui::table.row>
        <x-ui::table.row striped>
            <x-ui::table.cell>Bob Johnson</x-ui::table.cell>
            <x-ui::table.cell>bob@example.com</x-ui::table.cell>
            <x-ui::table.cell>Inactive</x-ui::table.cell>
        </x-ui::table.row>
    </x-ui::table.body>
</x-ui::table>
```

### Sortable Headers

```blade
<x-ui::table>
    <x-ui::table.head>
        <x-ui::table.row>
            <x-ui::table.header
                sortable
                :sorted="$sortColumn === 'name' ? $sortDirection : null"
                wire:click="sortBy('name')"
            >
                Product Name
            </x-ui::table.header>
            <x-ui::table.header
                sortable
                :sorted="$sortColumn === 'price' ? $sortDirection : null"
                wire:click="sortBy('price')"
                align="right"
            >
                Price
            </x-ui::table.header>
            <x-ui::table.header
                sortable
                :sorted="$sortColumn === 'stock' ? $sortDirection : null"
                wire:click="sortBy('stock')"
                align="center"
            >
                Stock
            </x-ui::table.header>
        </x-ui::table.row>
    </x-ui::table.head>
    <x-ui::table.body>
        @foreach($products as $product)
            <x-ui::table.row>
                <x-ui::table.cell>{{ $product->name }}</x-ui::table.cell>
                <x-ui::table.cell align="right">${{ number_format($product->price, 2) }}</x-ui::table.cell>
                <x-ui::table.cell align="center">{{ $product->stock }}</x-ui::table.cell>
            </x-ui::table.row>
        @endforeach
    </x-ui::table.body>
</x-ui::table>
```

### Table with Caption

```blade
<x-ui::table>
    <x-ui::table.caption>
        Recent Orders
        <p class="mt-1 text-sm font-normal text-gray-500 dark:text-gray-400">
            Browse a list of recent orders including order ID, customer, and status.
        </p>
    </x-ui::table.caption>
    <x-ui::table.head>
        <x-ui::table.row>
            <x-ui::table.header>Order ID</x-ui::table.header>
            <x-ui::table.header>Customer</x-ui::table.header>
            <x-ui::table.header>Status</x-ui::table.header>
        </x-ui::table.row>
    </x-ui::table.head>
    <x-ui::table.body>
        {{-- Table rows --}}
    </x-ui::table.body>
</x-ui::table>
```

### Table with Footer

```blade
<x-ui::table>
    <x-ui::table.head>
        <x-ui::table.row>
            <x-ui::table.header>Product</x-ui::table.header>
            <x-ui::table.header align="right">Quantity</x-ui::table.header>
            <x-ui::table.header align="right">Price</x-ui::table.header>
        </x-ui::table.row>
    </x-ui::table.head>
    <x-ui::table.body>
        <x-ui::table.row>
            <x-ui::table.cell>Item 1</x-ui::table.cell>
            <x-ui::table.cell align="right">5</x-ui::table.cell>
            <x-ui::table.cell align="right">$50.00</x-ui::table.cell>
        </x-ui::table.row>
        <x-ui::table.row>
            <x-ui::table.cell>Item 2</x-ui::table.cell>
            <x-ui::table.cell align="right">3</x-ui::table.cell>
            <x-ui::table.cell align="right">$30.00</x-ui::table.cell>
        </x-ui::table.row>
    </x-ui::table.body>
    <x-ui::table.foot>
        <x-ui::table.row>
            <x-ui::table.header>Total</x-ui::table.header>
            <x-ui::table.header align="right">8</x-ui::table.header>
            <x-ui::table.header align="right">$80.00</x-ui::table.header>
        </x-ui::table.row>
    </x-ui::table.foot>
</x-ui::table>
```

## Props

### Table Component

| Prop | Type | Default | Description |
|------|------|---------|-------------|
| `striped` | boolean | false | Enable striped row styling |
| `hover` | boolean | true | Enable hover effects on rows |
| `bordered` | boolean | true | Show table borders |
| `shadow` | boolean | true | Add shadow to table wrapper |
| `responsive` | boolean | true | Enable responsive wrapper with scroll |

### Table Header Component

| Prop | Type | Default | Description |
|------|------|---------|-------------|
| `sortable` | boolean | false | Make column sortable |
| `sorted` | string | null | Sort direction: 'asc', 'desc', or null |
| `align` | string | 'left' | Text alignment: left, center, right |

### Table Cell Component

| Prop | Type | Default | Description |
|------|------|---------|-------------|
| `align` | string | 'left' | Text alignment: left, center, right |
| `nowrap` | boolean | false | Prevent text wrapping |

### Table Row Component

| Prop | Type | Default | Description |
|------|------|---------|-------------|
| `striped` | boolean | false | Enable striped styling for this row |
| `hover` | boolean | true | Enable hover effect |

### Table Caption Component

| Prop | Type | Default | Description |
|------|------|---------|-------------|
| `position` | string | 'top' | Caption position: top, bottom |

## Real-World Examples

### 1. User Management Table

```blade
<div class="space-y-4">
    {{-- Search and filters --}}
    <div class="flex items-center justify-between">
        <x-ui::form.input
            type="search"
            placeholder="Search users..."
            wire:model.live.debounce.300ms="search"
            class="w-64"
        />
        <x-ui::button variant="primary" wire:click="$dispatch('openModal', 'create-user')">
            <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
                <path d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z"/>
            </svg>
            Add User
        </x-ui::button>
    </div>

    {{-- Users table --}}
    <x-ui::table>
        <x-ui::table.caption>
            User Directory
            <p class="mt-1 text-sm font-normal text-gray-500 dark:text-gray-400">
                Manage your team members and their account permissions.
            </p>
        </x-ui::table.caption>

        <x-ui::table.head>
            <x-ui::table.row>
                <x-ui::table.header
                    sortable
                    :sorted="$sortColumn === 'name' ? $sortDirection : null"
                    wire:click="sortBy('name')"
                >
                    Name
                </x-ui::table.header>
                <x-ui::table.header
                    sortable
                    :sorted="$sortColumn === 'email' ? $sortDirection : null"
                    wire:click="sortBy('email')"
                >
                    Email
                </x-ui::table.header>
                <x-ui::table.header>Role</x-ui::table.header>
                <x-ui::table.header>Status</x-ui::table.header>
                <x-ui::table.header align="right">Actions</x-ui::table.header>
            </x-ui::table.row>
        </x-ui::table.head>

        <x-ui::table.body striped>
            @forelse($users as $user)
                <x-ui::table.row striped hover>
                    <x-ui::table.cell nowrap>
                        <div class="flex items-center gap-3">
                            <img
                                src="{{ $user->avatar_url }}"
                                alt="{{ $user->name }}"
                                class="w-10 h-10 rounded-full"
                            />
                            <div>
                                <div class="font-medium text-gray-900 dark:text-white">
                                    {{ $user->name }}
                                </div>
                                <div class="text-xs text-gray-500 dark:text-gray-400">
                                    ID: {{ $user->id }}
                                </div>
                            </div>
                        </div>
                    </x-ui::table.cell>
                    <x-ui::table.cell>{{ $user->email }}</x-ui::table.cell>
                    <x-ui::table.cell>
                        <x-ui::badge :color="$user->role === 'admin' ? 'blue' : 'gray'">
                            {{ ucfirst($user->role) }}
                        </x-ui::badge>
                    </x-ui::table.cell>
                    <x-ui::table.cell>
                        <x-ui::badge :color="$user->is_active ? 'green' : 'red'">
                            {{ $user->is_active ? 'Active' : 'Inactive' }}
                        </x-ui::badge>
                    </x-ui::table.cell>
                    <x-ui::table.cell align="right">
                        <div class="flex items-center justify-end gap-2">
                            <x-ui::button
                                variant="ghost"
                                size="sm"
                                wire:click="editUser({{ $user->id }})"
                            >
                                Edit
                            </x-ui::button>
                            <x-ui::button
                                variant="ghost"
                                size="sm"
                                class="text-red-600 hover:text-red-700"
                                wire:click="deleteUser({{ $user->id }})"
                            >
                                Delete
                            </x-ui::button>
                        </div>
                    </x-ui::table.cell>
                </x-ui::table.row>
            @empty
                <x-ui::table.row>
                    <x-ui::table.cell colspan="5" class="text-center py-12">
                        <div class="text-gray-500 dark:text-gray-400">
                            <svg class="w-12 h-12 mx-auto mb-3 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                            </svg>
                            <p class="text-lg font-medium">No users found</p>
                            <p class="text-sm mt-1">Try adjusting your search criteria</p>
                        </div>
                    </x-ui::table.cell>
                </x-ui::table.row>
            @endforelse
        </x-ui::table.body>
    </x-ui::table>

    {{-- Pagination --}}
    @if($users->hasPages())
        <div class="mt-4">
            {{ $users->links() }}
        </div>
    @endif
</div>
```

### 2. Product Inventory Table

```blade
<x-ui::table>
    <x-ui::table.head>
        <x-ui::table.row>
            <x-ui::table.header>
                <input
                    type="checkbox"
                    wire:model="selectAll"
                    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500"
                />
            </x-ui::table.header>
            <x-ui::table.header>Product</x-ui::table.header>
            <x-ui::table.header align="center">Stock</x-ui::table.header>
            <x-ui::table.header align="right">Price</x-ui::table.header>
            <x-ui::table.header align="center">Status</x-ui::table.header>
            <x-ui::table.header align="right">Actions</x-ui::table.header>
        </x-ui::table.row>
    </x-ui::table.head>

    <x-ui::table.body>
        @foreach($products as $product)
            <x-ui::table.row hover>
                <x-ui::table.cell>
                    <input
                        type="checkbox"
                        wire:model="selected"
                        value="{{ $product->id }}"
                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500"
                    />
                </x-ui::table.cell>
                <x-ui::table.cell nowrap>
                    <div class="flex items-center gap-3">
                        <img
                            src="{{ $product->image_url }}"
                            alt="{{ $product->name }}"
                            class="w-12 h-12 rounded object-cover"
                        />
                        <div>
                            <div class="font-medium text-gray-900 dark:text-white">
                                {{ $product->name }}
                            </div>
                            <div class="text-xs text-gray-500 dark:text-gray-400">
                                SKU: {{ $product->sku }}
                            </div>
                        </div>
                    </div>
                </x-ui::table.cell>
                <x-ui::table.cell align="center">
                    <span class="font-medium {{ $product->stock < 10 ? 'text-red-600' : 'text-gray-900 dark:text-white' }}">
                        {{ $product->stock }}
                    </span>
                </x-ui::table.cell>
                <x-ui::table.cell align="right" nowrap>
                    <span class="font-medium text-gray-900 dark:text-white">
                        ${{ number_format($product->price, 2) }}
                    </span>
                </x-ui::table.cell>
                <x-ui::table.cell align="center">
                    <x-ui::badge
                        :color="$product->is_active ? 'green' : 'gray'"
                        size="sm"
                    >
                        {{ $product->is_active ? 'Active' : 'Draft' }}
                    </x-ui::badge>
                </x-ui::table.cell>
                <x-ui::table.cell align="right">
                    <x-ui::dropdown>
                        <x-slot:trigger>
                            <button class="p-1 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-600">
                                <svg class="w-5 h-5 text-gray-500" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z"/>
                                </svg>
                            </button>
                        </x-slot:trigger>
                        <x-ui::dropdown.item wire:click="editProduct({{ $product->id }})">
                            Edit
                        </x-ui::dropdown.item>
                        <x-ui::dropdown.item wire:click="duplicateProduct({{ $product->id }})">
                            Duplicate
                        </x-ui::dropdown.item>
                        <x-ui::dropdown.divider />
                        <x-ui::dropdown.item
                            wire:click="deleteProduct({{ $product->id }})"
                            class="text-red-600"
                        >
                            Delete
                        </x-ui::dropdown.item>
                    </x-ui::dropdown>
                </x-ui::table.cell>
            </x-ui::table.row>
        @endforeach
    </x-ui::table.body>

    <x-ui::table.foot>
        <x-ui::table.row>
            <x-ui::table.header colspan="2">Total Products</x-ui::table.header>
            <x-ui::table.header align="center">{{ $totalStock }}</x-ui::table.header>
            <x-ui::table.header align="right">${{ number_format($totalValue, 2) }}</x-ui::table.header>
            <x-ui::table.header colspan="2"></x-ui::table.header>
        </x-ui::table.row>
    </x-ui::table.foot>
</x-ui::table>
```

### 3. Orders Table with Status Tracking

```blade
<x-ui::table striped>
    <x-ui::table.head>
        <x-ui::table.row>
            <x-ui::table.header>Order ID</x-ui::table.header>
            <x-ui::table.header>Customer</x-ui::table.header>
            <x-ui::table.header>Date</x-ui::table.header>
            <x-ui::table.header align="right">Amount</x-ui::table.header>
            <x-ui::table.header align="center">Payment</x-ui::table.header>
            <x-ui::table.header align="center">Status</x-ui::table.header>
            <x-ui::table.header align="right">Actions</x-ui::table.header>
        </x-ui::table.row>
    </x-ui::table.head>

    <x-ui::table.body striped>
        @foreach($orders as $order)
            <x-ui::table.row striped>
                <x-ui::table.cell nowrap>
                    <a
                        href="{{ route('orders.show', $order) }}"
                        class="font-medium text-blue-600 hover:underline dark:text-blue-500"
                    >
                        #{{ $order->id }}
                    </a>
                </x-ui::table.cell>
                <x-ui::table.cell>
                    <div>
                        <div class="font-medium text-gray-900 dark:text-white">
                            {{ $order->customer->name }}
                        </div>
                        <div class="text-xs text-gray-500 dark:text-gray-400">
                            {{ $order->customer->email }}
                        </div>
                    </div>
                </x-ui::table.cell>
                <x-ui::table.cell nowrap>
                    {{ $order->created_at->format('M d, Y') }}
                </x-ui::table.cell>
                <x-ui::table.cell align="right" nowrap>
                    <span class="font-semibold text-gray-900 dark:text-white">
                        ${{ number_format($order->total, 2) }}
                    </span>
                </x-ui::table.cell>
                <x-ui::table.cell align="center">
                    @php
                        $paymentColors = [
                            'paid' => 'green',
                            'pending' => 'yellow',
                            'failed' => 'red',
                        ];
                    @endphp
                    <x-ui::badge :color="$paymentColors[$order->payment_status] ?? 'gray'">
                        {{ ucfirst($order->payment_status) }}
                    </x-ui::badge>
                </x-ui::table.cell>
                <x-ui::table.cell align="center">
                    @php
                        $statusColors = [
                            'delivered' => 'green',
                            'shipped' => 'blue',
                            'processing' => 'yellow',
                            'cancelled' => 'red',
                        ];
                    @endphp
                    <x-ui::badge :color="$statusColors[$order->status] ?? 'gray'">
                        {{ ucfirst($order->status) }}
                    </x-ui::badge>
                </x-ui::table.cell>
                <x-ui::table.cell align="right">
                    <div class="flex items-center justify-end gap-2">
                        <x-ui::button
                            variant="outline"
                            size="sm"
                            href="{{ route('orders.show', $order) }}"
                        >
                            View
                        </x-ui::button>
                        @if($order->status !== 'cancelled')
                            <x-ui::button
                                variant="outline"
                                size="sm"
                                wire:click="updateStatus({{ $order->id }})"
                            >
                                Update
                            </x-ui::button>
                        @endif
                    </div>
                </x-ui::table.cell>
            </x-ui::table.row>
        @endforeach
    </x-ui::table.body>
</x-ui::table>
```

### 4. Analytics Table with Trends

```blade
<x-ui::table>
    <x-ui::table.caption>
        Website Analytics
        <p class="mt-1 text-sm font-normal text-gray-500 dark:text-gray-400">
            Track your website's performance metrics over the last 30 days.
        </p>
    </x-ui::table.caption>

    <x-ui::table.head>
        <x-ui::table.row>
            <x-ui::table.header>Page</x-ui::table.header>
            <x-ui::table.header align="right">Views</x-ui::table.header>
            <x-ui::table.header align="right">Unique Visitors</x-ui::table.header>
            <x-ui::table.header align="right">Avg. Time</x-ui::table.header>
            <x-ui::table.header align="right">Bounce Rate</x-ui::table.header>
            <x-ui::table.header align="center">Trend</x-ui::table.header>
        </x-ui::table.row>
    </x-ui::table.head>

    <x-ui::table.body>
        @foreach($analytics as $page)
            <x-ui::table.row hover>
                <x-ui::table.cell>
                    <div class="flex items-center gap-2">
                        <svg class="w-4 h-4 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M4 4a2 2 0 012-2h4.586A2 2 0 0112 2.586L15.414 6A2 2 0 0116 7.414V16a2 2 0 01-2 2H6a2 2 0 01-2-2V4z"/>
                        </svg>
                        <span class="font-medium text-gray-900 dark:text-white">
                            {{ $page->path }}
                        </span>
                    </div>
                </x-ui::table.cell>
                <x-ui::table.cell align="right">
                    {{ number_format($page->views) }}
                </x-ui::table.cell>
                <x-ui::table.cell align="right">
                    {{ number_format($page->unique_visitors) }}
                </x-ui::table.cell>
                <x-ui::table.cell align="right">
                    {{ gmdate('i:s', $page->avg_time) }}
                </x-ui::table.cell>
                <x-ui::table.cell align="right">
                    <span class="{{ $page->bounce_rate > 70 ? 'text-red-600' : 'text-gray-900 dark:text-white' }}">
                        {{ number_format($page->bounce_rate, 1) }}%
                    </span>
                </x-ui::table.cell>
                <x-ui::table.cell align="center">
                    @if($page->trend > 0)
                        <span class="inline-flex items-center text-green-600">
                            <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M5.293 7.707a1 1 0 010-1.414l4-4a1 1 0 011.414 0l4 4a1 1 0 01-1.414 1.414L11 5.414V17a1 1 0 11-2 0V5.414L6.707 7.707a1 1 0 01-1.414 0z"/>
                            </svg>
                            {{ number_format(abs($page->trend), 1) }}%
                        </span>
                    @elseif($page->trend < 0)
                        <span class="inline-flex items-center text-red-600">
                            <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M14.707 12.293a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 111.414-1.414L9 14.586V3a1 1 0 012 0v11.586l2.293-2.293a1 1 0 011.414 0z"/>
                            </svg>
                            {{ number_format(abs($page->trend), 1) }}%
                        </span>
                    @else
                        <span class="text-gray-500">—</span>
                    @endif
                </x-ui::table.cell>
            </x-ui::table.row>
        @endforeach
    </x-ui::table.body>

    <x-ui::table.foot>
        <x-ui::table.row>
            <x-ui::table.header>Total</x-ui::table.header>
            <x-ui::table.header align="right">{{ number_format($totalViews) }}</x-ui::table.header>
            <x-ui::table.header align="right">{{ number_format($totalVisitors) }}</x-ui::table.header>
            <x-ui::table.header align="right">{{ gmdate('i:s', $avgTime) }}</x-ui::table.header>
            <x-ui::table.header align="right">{{ number_format($avgBounceRate, 1) }}%</x-ui::table.header>
            <x-ui::table.header></x-ui::table.header>
        </x-ui::table.row>
    </x-ui::table.foot>
</x-ui::table>
```

### 5. Responsive Invoice Table

```blade
<x-ui::table :responsive="true" :shadow="true">
    <x-ui::table.caption>
        Invoice #{{ $invoice->number }}
        <p class="mt-1 text-sm font-normal text-gray-500 dark:text-gray-400">
            Issued on {{ $invoice->created_at->format('F d, Y') }}
        </p>
    </x-ui::table.caption>

    <x-ui::table.head>
        <x-ui::table.row>
            <x-ui::table.header>Description</x-ui::table.header>
            <x-ui::table.header align="center">Qty</x-ui::table.header>
            <x-ui::table.header align="right">Unit Price</x-ui::table.header>
            <x-ui::table.header align="right">Amount</x-ui::table.header>
        </x-ui::table.row>
    </x-ui::table.head>

    <x-ui::table.body>
        @foreach($invoice->items as $item)
            <x-ui::table.row>
                <x-ui::table.cell>
                    <div>
                        <div class="font-medium text-gray-900 dark:text-white">
                            {{ $item->product_name }}
                        </div>
                        @if($item->description)
                            <div class="text-sm text-gray-500 dark:text-gray-400 mt-1">
                                {{ $item->description }}
                            </div>
                        @endif
                    </div>
                </x-ui::table.cell>
                <x-ui::table.cell align="center">
                    {{ $item->quantity }}
                </x-ui::table.cell>
                <x-ui::table.cell align="right" nowrap>
                    ${{ number_format($item->unit_price, 2) }}
                </x-ui::table.cell>
                <x-ui::table.cell align="right" nowrap>
                    <span class="font-medium text-gray-900 dark:text-white">
                        ${{ number_format($item->amount, 2) }}
                    </span>
                </x-ui::table.cell>
            </x-ui::table.row>
        @endforeach

        {{-- Subtotal --}}
        <x-ui::table.row>
            <x-ui::table.cell colspan="3" align="right" class="font-medium">
                Subtotal
            </x-ui::table.cell>
            <x-ui::table.cell align="right" nowrap>
                ${{ number_format($invoice->subtotal, 2) }}
            </x-ui::table.cell>
        </x-ui::table.row>

        {{-- Tax --}}
        <x-ui::table.row>
            <x-ui::table.cell colspan="3" align="right" class="font-medium">
                Tax ({{ $invoice->tax_rate }}%)
            </x-ui::table.cell>
            <x-ui::table.cell align="right" nowrap>
                ${{ number_format($invoice->tax_amount, 2) }}
            </x-ui::table.cell>
        </x-ui::table.row>

        {{-- Total --}}
        <x-ui::table.row class="bg-gray-50 dark:bg-gray-700">
            <x-ui::table.cell colspan="3" align="right" class="text-lg font-bold">
                Total
            </x-ui::table.cell>
            <x-ui::table.cell align="right" nowrap class="text-lg font-bold">
                ${{ number_format($invoice->total, 2) }}
            </x-ui::table.cell>
        </x-ui::table.row>
    </x-ui::table.body>
</x-ui::table>
```

## Best Practices

### 1. Responsive Design

```blade
{{-- Always use responsive wrapper for tables with many columns --}}
<x-ui::table :responsive="true">
    {{-- Table content --}}
</x-ui::table>

{{-- For mobile, consider showing fewer columns or card view --}}
<div class="hidden md:block">
    <x-ui::table>
        {{-- Full table --}}
    </x-ui::table>
</div>

<div class="block md:hidden">
    {{-- Mobile card view --}}
    @foreach($items as $item)
        <x-ui::card>
            {{-- Card content --}}
        </x-ui::card>
    @endforeach>
</div>
```

### 2. Empty States

```blade
<x-ui::table.body>
    @forelse($items as $item)
        <x-ui::table.row>
            {{-- Row content --}}
        </x-ui::table.row>
    @empty
        <x-ui::table.row>
            <x-ui::table.cell :colspan="$columnCount" class="text-center py-12">
                <div class="text-gray-500 dark:text-gray-400">
                    <svg class="w-12 h-12 mx-auto mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        {{-- Icon --}}
                    </svg>
                    <p class="text-lg font-medium">No data available</p>
                    <p class="text-sm mt-1">Start by adding your first item</p>
                </div>
            </x-ui::table.cell>
        </x-ui::table.row>
    @endforelse
</x-ui::table.body>
```

### 3. Loading States

```blade
<x-ui::table>
    <x-ui::table.head>
        {{-- Headers --}}
    </x-ui::table.head>
    <x-ui::table.body>
        <div wire:loading wire:target="loadData" class="absolute inset-0 bg-white/80 dark:bg-gray-800/80 flex items-center justify-center">
            <x-ui::spinner size="lg" />
        </div>

        <div wire:loading.remove wire:target="loadData">
            @foreach($items as $item)
                <x-ui::table.row>
                    {{-- Row content --}}
                </x-ui::table.row>
            @endforeach
        </div>
    </x-ui::table.body>
</x-ui::table>
```

### 4. Sorting Implementation

```php
// In your Livewire component
public $sortColumn = 'name';
public $sortDirection = 'asc';

public function sortBy($column)
{
    if ($this->sortColumn === $column) {
        $this->sortDirection = $this->sortDirection === 'asc' ? 'desc' : 'asc';
    } else {
        $this->sortColumn = $column;
        $this->sortDirection = 'asc';
    }
}
```

### 5. Bulk Actions

```blade
{{-- Bulk action toolbar --}}
@if(count($selected) > 0)
    <div class="mb-4 p-3 bg-blue-50 dark:bg-blue-900/20 rounded-lg flex items-center justify-between">
        <span class="text-sm text-blue-900 dark:text-blue-100">
            {{ count($selected) }} item(s) selected
        </span>
        <div class="flex gap-2">
            <x-ui::button variant="outline" size="sm" wire:click="exportSelected">
                Export
            </x-ui::button>
            <x-ui::button variant="danger" size="sm" wire:click="deleteSelected">
                Delete
            </x-ui::button>
        </div>
    </div>
@endif
```

### 6. Cell Content

```blade
{{-- Use nowrap for numbers and dates --}}
<x-ui::table.cell align="right" nowrap>
    ${{ number_format($amount, 2) }}
</x-ui::table.cell>

{{-- Allow wrapping for long text --}}
<x-ui::table.cell>
    {{ $description }}
</x-ui::table.cell>

{{-- Use appropriate alignment --}}
<x-ui::table.cell align="center">
    <x-ui::badge>{{ $status }}</x-ui::badge>
</x-ui::table.cell>
```

### 7. Performance

```blade
{{-- Use pagination to limit rows --}}
@foreach($items->take(50) as $item)
    <x-ui::table.row>
        {{-- Content --}}
    </x-ui::table.row>
@endforeach

{{-- Use lazy loading with wire:init --}}
<div wire:init="loadItems">
    @if($itemsLoaded)
        {{-- Table content --}}
    @else
        <x-ui::spinner />
    @endif
</div>
```

### 8. Accessibility

```blade
{{-- Always use scope on headers --}}
<x-ui::table.header scope="col">Name</x-ui::table.header>

{{-- Use th for row headers --}}
<th scope="row" class="px-6 py-4">{{ $label }}</th>

{{-- Provide meaningful captions --}}
<x-ui::table.caption>
    Clear description of table content
</x-ui::table.caption>
```

### 9. Actions Column

```blade
<x-ui::table.cell align="right">
    <div class="flex items-center justify-end gap-2">
        {{-- Icon buttons for common actions --}}
        <button
            wire:click="edit({{ $item->id }})"
            class="p-1 text-blue-600 hover:bg-blue-50 rounded"
            title="Edit"
        >
            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                {{-- Edit icon --}}
            </svg>
        </button>

        {{-- Dropdown for more actions --}}
        <x-ui::dropdown>
            {{-- Dropdown content --}}
        </x-ui::dropdown>
    </div>
</x-ui::table.cell>
```

### 10. Sticky Headers

```blade
{{-- Make headers sticky on scroll --}}
<x-ui::table>
    <x-ui::table.head class="sticky top-0 z-10">
        <x-ui::table.row>
            {{-- Headers --}}
        </x-ui::table.row>
    </x-ui::table.head>
    <x-ui::table.body>
        {{-- Rows --}}
    </x-ui::table.body>
</x-ui::table>
```

## Accessibility

The table component follows WCAG 2.1 AA guidelines:

### Semantic HTML

```html
<table>
    <caption>Table description</caption>
    <thead>
        <tr>
            <th scope="col">Column Header</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>Cell content</td>
        </tr>
    </tbody>
    <tfoot>
        <tr>
            <th scope="row">Footer</th>
        </tr>
    </tfoot>
</table>
```

### Screen Reader Support

- Use `<caption>` for table descriptions
- Use `scope="col"` for column headers
- Use `scope="row"` for row headers
- Provide meaningful labels for actions
- Use `aria-label` for icon-only buttons

### Keyboard Navigation

- All interactive elements are keyboard accessible
- Sortable headers respond to Enter/Space
- Checkboxes can be toggled with Space
- Links and buttons are in tab order

## Related Components

- [Data Table](data-table.md) - Programmatic table component
- [Pagination](pagination.md) - Page navigation
- [Badge](badge.md) - Status indicators
- [Dropdown](dropdown.md) - Action menus
- [Checkbox](../forms/checkbox.md) - Selection inputs