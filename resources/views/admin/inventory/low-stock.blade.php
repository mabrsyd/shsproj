<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="flex justify-between items-center mb-6">
                        <h2 class="text-2xl font-bold">Low Stock Alert</h2>
                        <a href="{{ route('admin.inventory.index') }}" 
                           class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
                            Back to Inventory
                        </a>
                    </div>

                    @if($lowStockItems->count() > 0)
                        <div class="overflow-x-auto">
                            <table class="min-w-full table-auto">
                                <thead>
                                    <tr class="bg-gray-100">
                                        <th class="px-4 py-2">SKU</th>
                                        <th class="px-4 py-2">Name</th>
                                        <th class="px-4 py-2">Current Stock</th>
                                        <th class="px-4 py-2">Minimum Stock</th>
                                        <th class="px-4 py-2">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($lowStockItems as $item)
                                        <tr class="border-b">
                                            <td class="px-4 py-2">{{ $item->sku }}</td>
                                            <td class="px-4 py-2">{{ $item->name }}</td>
                                            <td class="px-4 py-2 text-red-600">{{ $item->stock }}</td>
                                            <td class="px-4 py-2">{{ $item->minimum_stock }}</td>
                                            <td class="px-4 py-2">
                                                <a href="{{ route('admin.inventory.edit', $item) }}" 
                                                   class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-3 rounded">
                                                    Update Stock
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <div class="text-center py-8">
                            <p class="text-gray-500">No items are currently low in stock.</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>