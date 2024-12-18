<x-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-gray-800 border-b border-gray-700 text-gray-300">
                    <div class="mb-6">
                        <h2 class="text-2xl font-bold text-white">Add New Inventory Item</h2>
                    </div>

                    <form action="{{ route('admin.inventory.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @include('admin.inventory.form')

                        <div class="mt-6 flex items-center justify-end space-x-3">
                            <a href="{{ route('admin.inventory.index') }}" 
                               class="bg-gray-700 hover:bg-gray-600 text-gray-300 font-bold py-2 px-4 rounded">
                                Cancel
                            </a>
                            <button type="submit" 
                                    class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                Add Item
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-layout>
