<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestimoniController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'rating' => 'required|integer|min:1|max:5',
            'description' => 'required|string|max:1000',
            'image' => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('testimoni_images', 'public');
        }

        auth()->user()->testimonis()->create([
            'rating' => $request->input('rating'),
            'description' => $request->input('description'),
            'image_path' => $imagePath,
        ]);

        return redirect()->back()->with('success', 'Testimoni berhasil ditambahkan!');
    }

}
