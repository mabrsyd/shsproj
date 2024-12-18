<?php

namespace App\Http\Controllers;

use App\Models\Inventaris;
use Illuminate\Http\Request;

class InventarisController extends Controller
{
    public function index()
    {
        $inventaris = Inventaris::all();
        return view('inventaris.index', compact('inventaris'));
    }

    public function create()
    {
        return view('inventaris.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'description' => 'nullable',
            'stock' => 'required|integer',
            'status' => 'required|in:tersedia,stok habis,perlu dipesan',
        ]);

        Inventaris::create($validated);
        return redirect()->route('inventaris.index')->with('success', 'Inventaris berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $inventaris = Inventaris::findOrFail($id);
        return view('inventaris.edit', compact('inventaris'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'stock' => 'required|integer',
            'status' => 'required|string',
        ]);

        $inventaris = Inventaris::findOrFail($id);
        $inventaris->update($request->all());

        return redirect()->route('inventaris.index')->with('success', 'Data inventaris berhasil diperbarui');
    }


    public function destroy($id)
    {   
        $inventaris = Inventaris::findOrFail($id);
        $inventaris->delete();
        
        return redirect()->route('inventaris.index')->with('success', 'Inventaris berhasil dihapus.');
    }
}
