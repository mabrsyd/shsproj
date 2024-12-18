<x-layout>
    <div class="container mx-auto p-6">
        <h1 class="text-3xl font-bold mb-6">Status Pesanan</h1>
        <div class="flex flex-col justify-between gap-4">
            <div class="mb-4 flex flex-col items-start">
                <div class="flex mb-4 gap-4 flex-wrap">
                    @auth
                    @if(Auth::check() && Auth::user()->usertype === 'admin')
                        <button type="button" onclick="openModal()" class="bg-blue-500 text-white p-2 rounded">Tambah Proyek</button>
                    @endif
                @endauth
                </div>
            </div>

        <div class="overflow-x-auto">
            <table class="table table-zebra">
              <thead>
                <tr>
                  <th>Nama Kostumer</th>
                  <th>Tanggal Masuk</th>
                  <th>Merk Laptop</th>
                  <th>Deskripsi Masalah</th>
                  <th>Total Harga</th>
                  <th>Progress</th>
                  @auth
                  @if(Auth::check() && Auth::user()->usertype === 'admin')
                      <th>Aksi</th>
                  @endif
              @endauth
                </tr>
              </thead>
<tbody>
    @foreach ($projects as $project)
        <tr>
            <td>{{ $project->customer_name }}</td>
            <td>{{ $project->created_at }}</td>
            <td>{{ $project->laptop_brand }}</td>
            <td>{{ $project->issue_description }}</td>
            <td>{{ $project->total_price }}</td>
            <td>{{ $project->status }}</td>
            @auth
                @if(Auth::check() && Auth::user()->usertype === 'admin')
                    <td class="py-2 px-4">
                        <form action="{{ route('projects.update', $project->id) }}" method="POST" enctype="multipart/form-data" class="inline">
                            @csrf
                            @method('PATCH')
                            <select name="status" class="border rounded p-1">
                                <option value="not_started" {{ $project->status == 'not_started' ? 'selected' : '' }}>Belum Dikerjakan</option>
                                <option value="in_progess" {{ $project->status == 'in_progess' ? 'selected' : '' }}>Sedang Dikerjakan</option>
                                <option value="completed" {{ $project->status == 'completed' ? 'selected' : '' }}>Selesai</option>
                            </select>
                            <button type="submit" class="bg-blue-500 text-white p-1 rounded">Update</button>
                        </form>
                        <form action="{{ route('projects.destroy', $project->id) }}" method="POST" enctype="multipart/form-data" class="inline-block">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-500 text-white p-1 rounded">Hapus</button>
                        </form>
                    </td>
                @endif
            @endauth
        </tr>
    @endforeach
</tbody>
            </table>
          </div>
    </div>

<div id="projectModal" class="fixed inset-0 bg-black bg-opacity-50 flex justify-center items-center hidden">
    <div class="bg-white rounded-lg shadow-lg w-96 p-6">
        <h2 class="text-xl font-bold mb-4">Tambah Proyek Baru</h2>
        <form action="{{ route('projects.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-4">
                <label for="customer_name" class="block text-sm font-semibold">Nama Kostumer</label>
                <input type="text" name="customer_name" id="customer_name" class="border rounded p-2 w-full" required>
            </div>
            <div class="mb-4">
                <label for="laptop_brand" class="block text-sm font-semibold">Merk Laptop</label>
                <input type="text" name="laptop_brand" id="laptop_brand" class="border rounded p-2 w-full" required>
            </div>
            <div class="mb-4">
                <label for="issue_description" class="block text-sm font-semibold">Deskripsi Masalah</label>
                <textarea name="issue_description" id="issue_description" class="border rounded p-2 w-full" rows="3" required></textarea>
            </div>
            <div class="mb-4">
                <label for="total_price" class="block text-sm font-semibold">Total Harga</label>
                <input type="number" name="total_price" id="total_price" class="border rounded p-2 w-full" step="0.01" required>
            </div>
            <div class="mb-4">
                <label for="status" class="block text-sm font-semibold">Status</label>
                <select name="status" id="status" class="border rounded p-2 w-full">
                    <option value="not_started">Belum Dikerjakan</option>
                    <option value="in_progess">Sedang Dikerjakan</option>
                    <option value="completed">Selesai</option>
                </select>
            </div>
            <div class="flex justify-end">
                <button type="button" onclick="closeModal()" class="bg-gray-500 text-white p-2 rounded mr-2">Batal</button>
                <button type="submit" class="bg-blue-500 text-white p-2 rounded">Simpan</button>
            </div>
        </form>
    </div>
</div>

<script>
    function openModal() {
        document.getElementById('projectModal').classList.remove('hidden');
    }
    
    function closeModal() {
        document.getElementById('projectModal').classList.add('hidden');
    }
    </script>
    

</x-layout>
