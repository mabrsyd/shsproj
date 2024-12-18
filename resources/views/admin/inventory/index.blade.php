<x-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-gray-900 overflow-hidden shadow-sm sm:rounded-lg border border-gray-600">
                <div class="p-6 bg-gray-900 border-b border-gray-600 text-gray-300">
                    <div class="flex justify-between items-center mb-6">
                        <h2 class="text-2xl font-bold text-white">Inventory Management</h2>
                        <a href="{{ route('admin.inventory.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                            Add New Item
                        </a>
                    </div>

                    {{-- Flash Message --}}
                    @if (session('success'))
                        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
                            <span class="block sm:inline">{{ session('success') }}</span>
                        </div>
                    @endif

                    {{-- Inventory Table --}}
                    <div class="overflow-x-auto">
                        <table class="min-w-full table-auto bg-gray-800 text-gray-300">
                            <thead>
                                <tr class="bg-gray-700">
                                    <th class="px-4 py-2">SKU</th>
                                    <th class="px-4 py-2">Image</th>
                                    <th class="px-4 py-2">Name</th>
                                    <th class="px-4 py-2">Category</th>
                                    <th class="px-4 py-2">Stock</th>
                                    <th class="px-4 py-2">Price</th>
                                    <th class="px-4 py-2">Visibility</th>
                                    <th class="px-4 py-2">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($inventories as $item)
                                    <tr class="border-t border-gray-600">
                                        <td class="px-4 py-2">{{ $item->sku }}</td>
                                        <td class="px-4 py-2">
                                            @if($item->image)
                                                <img src="{{ Storage::url($item->image) }}" alt="{{ $item->name }}" class="w-16 h-16 object-cover">
                                            @else
                                                <span class="text-gray-500">No Image</span>
                                            @endif
                                        </td>
                                        <td class="px-4 py-2">{{ $item->name }}</td>
                                        <td class="px-4 py-2">{{ $item->category }}</td>
                                        <td class="px-4 py-2">
                                            <span class="@if($item->isLowStock()) text-red-500 @endif">
                                                {{ $item->stock }}
                                            </span>
                                        </td>
                                        <td class="px-4 py-2">Rp {{ number_format($item->price, 0, ',', '.') }}</td>
                                        <td class="px-4 py-2">
                                            <span class="@if($item->is_visible) text-green-500 @else text-red-500 @endif">
                                                {{ $item->is_visible ? 'Visible' : 'Hidden' }}
                                            </span>
                                        </td>
                                        <td class="px-4 py-2">
                                            <div class="flex space-x-2">
                                                <a href="{{ route('admin.inventory.edit', $item) }}" class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-1 px-3 rounded">Edit</a>
                                                <form action="{{ route('admin.inventory.destroy', $item) }}" method="POST" onsubmit="return confirm('Are you sure?');">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-3 rounded">Delete</button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>
