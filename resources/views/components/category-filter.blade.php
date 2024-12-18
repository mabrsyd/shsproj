<div class="mb-6">
    <div class="flex flex-wrap gap-2">
        <button type="button" 
                class="px-4 py-2 rounded-full {{ request('category') === null ? 'bg-blue-500 text-white' : 'bg-gray-200 text-gray-700' }}"
                onclick="window.location.href='{{ route('inventory.public') }}'">
            All
        </button>
        @foreach(['spare_parts', 'accessories', 'tools', 'components'] as $category)
            <button type="button"
                    class="px-4 py-2 rounded-full {{ request('category') === $category ? 'bg-blue-500 text-white' : 'bg-gray-200 text-gray-700' }}"
                    onclick="window.location.href='{{ route('inventory.public', ['category' => $category]) }}'">
                {{ ucfirst(str_replace('_', ' ', $category)) }}
            </button>
        @endforeach
    </div>
</div>