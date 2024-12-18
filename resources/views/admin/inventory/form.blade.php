<div class="space-y-6 p-6 bg-gray-200 dark:bg-gray-800 rounded-lg shadow-md text-gray-800 dark:text-gray-200">
    <div>
        <label for="name" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Name</label>
        <input type="text" name="name" id="name" value="{{ old('name', $inventory->name ?? '') }}" 
               class="mt-2 block w-full rounded-lg border-gray-300 dark:border-gray-600 dark:bg-gray-700 shadow-md focus:border-indigo-600 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
        @error('name')
            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label for="sku" class="block text-sm font-medium text-gray-700 dark:text-gray-300">SKU</label>
        <input type="text" name="sku" id="sku" value="{{ old('sku', $inventory->sku ?? '') }}"
               class="mt-2 block w-full rounded-lg border-gray-300 dark:border-gray-600 dark:bg-gray-700 shadow-md focus:border-indigo-600 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
        @error('sku')
            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label for="category" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Category</label>
        <select name="category" id="category" 
                class="mt-2 block w-full rounded-lg border-gray-300 dark:border-gray-600 dark:bg-gray-700 shadow-md focus:border-indigo-600 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
            <option value="">Select Category</option>
            <option value="spare_parts" {{ old('category', $inventory->category ?? '') == 'spare_parts' ? 'selected' : '' }}>Spare Parts</option>
            <option value="accessories" {{ old('category', $inventory->category ?? '') == 'accessories' ? 'selected' : '' }}>Accessories</option>
            <option value="tools" {{ old('category', $inventory->category ?? '') == 'tools' ? 'selected' : '' }}>Tools</option>
            <option value="components" {{ old('category', $inventory->category ?? '') == 'components' ? 'selected' : '' }}>Components</option>
        </select>
        @error('category')
            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label for="description" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Description</label>
        <textarea name="description" id="description" rows="4" 
                  class="mt-2 block w-full rounded-lg border-gray-300 dark:border-gray-600 dark:bg-gray-700 shadow-md focus:border-indigo-600 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">{{ old('description', $inventory->description ?? '') }}</textarea>
        @error('description')
            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label for="stock" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Stock</label>
        <input type="number" name="stock" id="stock" value="{{ old('stock', $inventory->stock ?? '') }}"
               class="mt-2 block w-full rounded-lg border-gray-300 dark:border-gray-600 dark:bg-gray-700 shadow-md focus:border-indigo-600 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
        @error('stock')
            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label for="minimum_stock" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Minimum Stock</label>
        <input type="number" name="minimum_stock" id="minimum_stock" value="{{ old('minimum_stock', $inventory->minimum_stock ?? '') }}"
               class="mt-2 block w-full rounded-lg border-gray-300 dark:border-gray-600 dark:bg-gray-700 shadow-md focus:border-indigo-600 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
        @error('minimum_stock')
            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label for="price" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Price (Rp)</label>
        <input type="number" name="price" id="price" value="{{ old('price', $inventory->price ?? '') }}" step="0.01"
               class="mt-2 block w-full rounded-lg border-gray-300 dark:border-gray-600 dark:bg-gray-700 shadow-md focus:border-indigo-600 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
        @error('price')
            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label for="condition" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Condition</label>
        <select name="condition" id="condition" 
                class="mt-2 block w-full rounded-lg border-gray-300 dark:border-gray-600 dark:bg-gray-700 shadow-md focus:border-indigo-600 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
            <option value="new" {{ old('condition', $inventory->condition ?? '') == 'new' ? 'selected' : '' }}>New</option>
            <option value="used" {{ old('condition', $inventory->condition ?? '') == 'used' ? 'selected' : '' }}>Used</option>
            <option value="refurbished" {{ old('condition', $inventory->condition ?? '') == 'refurbished' ? 'selected' : '' }}>Refurbished</option>
        </select>
        @error('condition')
            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label for="image" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Image</label>
        <input type="file" name="image" id="image" 
               class="mt-2 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-indigo-50 file:text-indigo-700 hover:file:bg-indigo-100 dark:file:bg-indigo-900 dark:file:text-indigo-400 dark:hover:file:bg-indigo-800">
        @if(isset($inventory) && $inventory->image)
            <div class="mt-2">
                <img src="{{ Storage::url($inventory->image) }}" alt="Current Image" class="w-24 h-24 object-cover rounded-lg shadow">
            </div>
        @endif
        @error('image')
            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
        @enderror
    </div>

<!-- Previous fields remain the same until visible checkbox -->

    <div class="flex items-center space-x-2">
        <input type="checkbox" name="is_visible" id="is_visible" value="1" 
            {{ old('is_visible', $inventory->is_visible ?? false) ? 'checked' : '' }}
            class="rounded border-gray-300 dark:border-gray-600 text-indigo-600 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
        <label for="is_visible" class="text-sm font-medium text-gray-700 dark:text-gray-300">Visible to Public</label>
        @error('is_visible')
            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
        @enderror
    </div>

    <div class="flex items-center space-x-2">
        <input type="checkbox" name="notify_low_stock" id="notify_low_stock" value="1" 
            {{ old('notify_low_stock', $inventory->notify_low_stock ?? false) ? 'checked' : '' }}
            class="rounded border-gray-300 dark:border-gray-600 text-indigo-600 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
        <label for="notify_low_stock" class="text-sm font-medium text-gray-700 dark:text-gray-300">Notify when stock is low</label>
        @error('notify_low_stock')
            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
        @enderror
    </div>
