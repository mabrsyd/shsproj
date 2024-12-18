<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;

class ProjectController extends Controller
{

    // Menampilkan halaman status
    public function index()
    {
        $projects = Project::all();
        return view('projects.index', compact('projects'));
    }

    // Membuat proyek baru
    public function store(Request $request)
    {
        $request->validate([
            'customer_name' => 'required',
            'laptop_brand' => 'required',
            'issue_description' => 'required',
            'total_price' => 'required|numeric',
            'status' => 'required',
        ]);

        // Menyimpan proyek
        Project::create($request->all());
        return redirect()->route('projects.index')->with('success', 'Proyek berhasil dibuat.');
    }

    // Mengupdate status dan detail progress
    public function update(Request $request, $id)
    {
        $project = Project::findOrFail($id);

        $request->validate([
            'status' => 'required',
        ]);

        $project->update($request->all());
        return redirect()->route('projects.index') // Perbaiki rute ke index proyek
            ->with('success', 'Proyek berhasil diperbarui.');
    }

    // Menghapus proyek yang sudah selesai
    public function destroy($id)
    {
        $project = Project::findOrFail($id);
        $project->delete();

        return redirect()->route('projects.index') // Perbaiki rute ke index proyek
            ->with('success', 'Proyek berhasil dihapus.');
    }
}
