@props([
    'data' => [],
    'columns' => [], // ['key' => 'name', 'label' => 'İsim', 'align' => 'left', 'format' => null]
    'mobileView' => null, // Mobile card view'ın path'i (örn: 'livewire.finance.partials.mobile-cards.payment-card')
    'emptyMessage' => 'Kayıt bulunamadı',
    'pagination' => null,
])

<div class="bg-white rounded-lg shadow">
    {{-- Mobile: Card View --}}
    <div class="md:hidden divide-y divide-gray-200">
        @forelse($data as $item)
            @if($mobileView)
                @include($mobileView, ['payment' => $item, 'invoice' => $item])
            @else
                <div class="p-4">
                    <div class="space-y-2">
                        @foreach($columns as $column)
                            @if(!($column['hideOnMobile'] ?? false))
                                <div class="flex justify-between items-start">
                                    <span class="text-xs text-gray-500">{{ $column['label'] }}</span>
                                    <span class="text-sm font-medium text-gray-900 text-right ml-4">
                                        @if(isset($column['format']))
                                            {!! $column['format']($item) !!}
                                        @else
                                            {{ data_get($item, $column['key']) }}
                                        @endif
                                    </span>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>
            @endif
        @empty
            <div></div>
        @endforelse
    </div>

    {{-- Desktop: Table View --}}
    <div class="hidden md:block overflow-x-auto">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    @foreach($columns as $column)
                        <th class="px-6 py-3 text-{{ $column['align'] ?? 'left' }} text-xs font-medium text-gray-500 uppercase tracking-wider">
                            {{ $column['label'] }}
                        </th>
                    @endforeach
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @forelse($data as $item)
                    <tr>
                        @foreach($columns as $column)
                            <td class="px-6 py-4 {{ $column['wrap'] ?? true ? '' : 'whitespace-nowrap' }} text-sm text-{{ $column['align'] ?? 'left' }} {{ $column['class'] ?? 'text-gray-900' }}">
                                @if(isset($column['format']))
                                    {!! $column['format']($item) !!}
                                @else
                                    {{ data_get($item, $column['key']) }}
                                @endif
                            </td>
                        @endforeach
                    </tr>
                @empty
                    <tr>
                        <td colspan="{{ count($columns) }}" class="px-6 py-12 text-center text-gray-500">
                            {{ $emptyMessage }}
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    {{-- Pagination --}}
    @if($pagination && $pagination->hasPages())
        <div class="px-4 md:px-6 py-3 md:py-4 border-t border-gray-200">
            {{ $pagination->links() }}
        </div>
    @endif
</div>
