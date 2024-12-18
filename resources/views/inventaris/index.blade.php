<x-layout>
    <x-slot name="title">Tambah Inventaris</x-slot>

    <div class="max-w-2xl mx-auto space-y-8">
        <!-- Form Tambah Inventaris -->
        <form action="{{ route('inventaris.store') }}" method="POST" class="bg-gray-200 dark:bg-gray-800 p-6 rounded-lg shadow-md w-full text-gray-800 dark:text-gray-200">
            @csrf
            <div class="mb-4">
                <label for="name" class="block font-semibold text-gray-700 dark:text-gray-300">Nama Inventaris</label>
                <input type="text" name="name" id="name" class="w-full border-gray-300 dark:border-gray-600 dark:bg-gray-700 rounded p-2" required>
            </div>
            
            <div class="mb-4">
                <label for="description" class="block font-semibold text-gray-700 dark:text-gray-300">Deskripsi</label>
                <textarea name="description" id="description" class="w-full border-gray-300 dark:border-gray-600 dark:bg-gray-700 rounded p-2"></textarea>
            </div>

            <div class="mb-4">
                <label for="stock" class="block font-semibold text-gray-700 dark:text-gray-300">Stok</label>
                <input type="number" name="stock" id="stock" class="w-full border-gray-300 dark:border-gray-600 dark:bg-gray-700 rounded p-2" required>
            </div>
            
            <div class="mb-4">
                <label for="status" class="block font-semibold text-gray-700 dark:text-gray-300">Status</label>
                <select name="status" id="status" class="w-full border-gray-300 dark:border-gray-600 dark:bg-gray-700 rounded p-2">
                    <option value="tersedia">Tersedia</option>
                    <option value="stok habis">Stok Habis</option>
                    <option value="perlu dipesan">Perlu Dipesan</option>
                </select>
            </div>

            <button type="submit" class="bg-blue-600 dark:bg-blue-700 text-white py-2 px-4 rounded hover:bg-blue-700 dark:hover:bg-blue-800">Simpan</button>
        </form>

        <!-- Tabel Daftar Inventaris -->
        <table class="w-full bg-gray-200 dark:bg-gray-800 shadow-md rounded-lg mt-8 text-gray-800 dark:text-gray-200">
            <thead class="bg-gray-300 dark:bg-gray-700">
                <tr>
                    <th class="py-2 px-4 font-semibold">Nama</th>
                    <th class="py-2 px-4 font-semibold">Deskripsi</th>
                    <th class="py-2 px-4 font-semibold">Stok</th>
                    <th class="py-2 px-4 font-semibold">Status</th>
                    <th class="py-2 px-4 font-semibold">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <!-- Loop Data Inventaris -->
                @foreach($inventaris as $item)
                <tr>
                    <td class="border-gray-300 dark:border-gray-600 border py-2 px-4">{{ $item->name }}</td>
                    <td class="border-gray-300 dark:border-gray-600 border py-2 px-4">{{ $item->description }}</td>
                    <td class="border-gray-300 dark:border-gray-600 border py-2 px-4">{{ $item->stock }}</td>
                    <td class="border-gray-300 dark:border-gray-600 border py-2 px-4">{{ $item->status }}</td>
                    <td class="border-gray-300 dark:border-gray-600 border py-2 px-4">
                        <a href="{{ route('inventaris.edit', $item->id) }}" class="bg-yellow-500 text-white py-1 px-2 rounded hover:bg-yellow-600">Edit</a>
                        <form action="{{ route('inventaris.destroy', $item->id) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-600 text-white py-1 px-2 rounded hover:bg-red-700">Hapus</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-layout>
