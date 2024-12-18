<?php

namespace App\Http\Controllers;

use App\Models\Inventory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class InventoryController extends Controller
{
    public function index()
    {
        $inventories = Inventory::latest()->get();
        return view('admin.inventory.index', compact('inventories'));
    }

    public function create()
    {
        return view('admin.inventory.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|max:255',
            'description' => 'nullable',
            'category' => 'required',
            'stock' => 'required|integer|min:0',
            'price' => 'required|numeric|min:0',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'condition' => 'required|in:new,used,refurbished',
            'sku' => 'required|unique:inventories',
            'minimum_stock' => 'required|integer|min:0'
        ]);

        // Handle boolean fields explicitly
        $validated['is_visible'] = $request->has('is_visible');
        $validated['notify_low_stock'] = $request->has('notify_low_stock');

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('inventories', 'public');
            $validated['image'] = $imagePath;
        }

        Inventory::create($validated);

        return redirect()->route('admin.inventory.index')
            ->with('success', 'Item added successfully.');
    }

    public function edit(Inventory $inventory)
    {
        return view('admin.inventory.edit', compact('inventory'));
    }

    public function update(Request $request, Inventory $inventory)
    {
        $validated = $request->validate([
            'name' => 'required|max:255',
            'description' => 'nullable',
            'category' => 'required',
            'stock' => 'required|integer|min:0',
            'price' => 'required|numeric|min:0',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'condition' => 'required|in:new,used,refurbished',
            'sku' => 'required|unique:inventories,sku,' . $inventory->id,
            'minimum_stock' => 'required|integer|min:0'
        ]);

        // Handle boolean fields explicitly
        $validated['is_visible'] = $request->has('is_visible');
        $validated['notify_low_stock'] = $request->has('notify_low_stock');

        if ($request->hasFile('image')) {
            if ($inventory->image) {
                Storage::disk('public')->delete($inventory->image);
            }
            $imagePath = $request->file('image')->store('inventories', 'public');
            $validated['image'] = $imagePath;
        }

        $inventory->update($validated);

        return redirect()->route('admin.inventory.index')
            ->with('success', 'Item updated successfully.');
    }

    public function destroy(Inventory $inventory)
    {
        if ($inventory->image) {
            Storage::disk('public')->delete($inventory->image);
        }
        $inventory->delete();

        return redirect()->route('admin.inventory.index')
            ->with('success', 'Item deleted successfully.');
    }

    // Public facing view
    public function publicIndex()
    {
        $inventories = Inventory::visible()->latest()->get();
        return view('inventory.public', compact('inventories'));
    }

    public function lowStockAlert()
    {
        $lowStockItems = Inventory::lowStock()->get();
        return view('admin.inventory.low-stock', compact('lowStockItems'));
    }
}