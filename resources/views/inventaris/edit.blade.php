<x-layout>
    <x-slot name="title">Edit Inventaris</x-slot>

    <div class="max-w-2xl mx-auto space-y-8">
        <!-- Form Edit Inventaris -->
        <form action="{{ route('inventaris.update', $inventaris->id) }}" method="POST" class="bg-gray-200 dark:bg-gray-800 p-6 rounded-lg shadow-md w-full text-gray-800 dark:text-gray-200">
            @csrf
            @method('PUT')
            <div class="mb-4">
                <label for="name" class="block font-semibold text-gray-700 dark:text-gray-300">Nama Inventaris</label>
                <input type="text" name="name" id="name" value="{{ old('name', $inventaris->name) }}" class="w-full border-gray-300 dark:border-gray-600 dark:bg-gray-700 rounded p-2" required>
            </div>
            
            <div class="mb-4">
                <label for="description" class="block font-semibold text-gray-700 dark:text-gray-300">Deskripsi</label>
                <textarea name="description" id="description" class="w-full border-gray-300 dark:border-gray-600 dark:bg-gray-700 rounded p-2">{{ old('description', $inventaris->description) }}</textarea>
            </div>

            <div class="mb-4">
                <label for="stock" class="block font-semibold text-gray-700 dark:text-gray-300">Stok</label>
                <input type="number" name="stock" id="stock" value="{{ old('stock', $inventaris->stock) }}" class="w-full border-gray-300 dark:border-gray-600 dark:bg-gray-700 rounded p-2" required>
            </div>
            
            <div class="mb-4">
                <label for="status" class="block font-semibold text-gray-700 dark:text-gray-300">Status</label>
                <select name="status" id="status" class="w-full border-gray-300 dark:border-gray-600 dark:bg-gray-700 rounded p-2">
                    <option value="tersedia" {{ $inventaris->status == 'tersedia' ? 'selected' : '' }}>Tersedia</option>
                    <option value="stok habis" {{ $inventaris->status == 'stok habis' ? 'selected' : '' }}>Stok Habis</option>
                    <option value="perlu dipesan" {{ $inventaris->status == 'perlu dipesan' ? 'selected' : '' }}>Perlu Dipesan</option>
                </select>
            </div>

            <button type="submit" class="bg-blue-600 dark:bg-blue-700 text-white py-2 px-4 rounded hover:bg-blue-700 dark:hover:bg-blue-800">Update</button>
        </form>
    </div>
</x-layout>
