<x-layout>
    <div class="py-12 bg-gray-900">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg border border-gray-700">
                <div class="p-6 bg-gray-800 border-b border-gray-700">
                    <h2 class="text-2xl font-bold mb-6 text-white">Available Items</h2>

                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                        @forelse($inventories as $item)
                            <div class="rounded-lg overflow-hidden shadow-lg bg-gray-700">
                                @if($item->image)
                                    <img src="{{ Storage::url($item->image) }}" 
                                         alt="{{ $item->name }}" 
                                         class="w-full h-48 object-cover">
                                @else
                                    <div class="w-full h-48 bg-gray-600 flex items-center justify-center">
                                        <span class="text-gray-400">No Image Available</span>
                                    </div>
                                @endif

                                <div class="p-4 text-gray-200">
                                    <h3 class="text-lg font-semibold text-white">{{ $item->name }}</h3>
                                    <p class="text-gray-400 text-sm">{{ $item->category }}</p>
                                    <p class="mt-2 text-gray-300">{{ Str::limit($item->description, 100) }}</p>
                                    
                                    <div class="mt-4 flex justify-between items-center">
                                        <span class="font-bold text-lg text-white">
                                            Rp {{ number_format($item->price, 0, ',', '.') }}
                                        </span>
                                        <span class="text-sm {{ $item->stock > 0 ? 'text-green-400' : 'text-red-400' }}">
                                            {{ $item->stock_status }}
                                        </span>
                                    </div>

                                    <div class="mt-4">
                                        <span class="inline-block bg-gray-600 rounded-full px-3 py-1 text-sm font-semibold text-gray-300">
                                            {{ ucfirst($item->condition) }}
                                        </span>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class="col-span-full text-center py-12">
                                <p class="text-gray-400">No items available at the moment.</p>
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>
