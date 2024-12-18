<?php
namespace App\Http\Controllers;

use App\Models\Testimonial;
use Illuminate\Http\Request;

class TestimonialController extends Controller
{
    public function index()
    {
        $testimonials = Testimonial::all();
        return view('testimonials.index', compact('testimonials'));
        
    }

    // Meng-handle upload gambar
    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Menyimpan gambar di folder 'public/img/testimonials'
        $imageName = time().'.'.$request->image->extension();  
        $request->image->move(public_path('img/testimonials'), $imageName);

        // Simpan nama gambar ke database
        Testimonial::create(['image' => $imageName]);

        return redirect()->route('testimonials.index')
                         ->with('success', 'Image uploaded successfully.');
    }

    // Meng-handle penghapusan gambar
    public function destroy(Testimonial $testimonial)
    {
        $imagePath = public_path('img/testimonials/' . $testimonial->image);

        // Hapus gambar dari storage
        if (file_exists($imagePath)) {
            unlink($imagePath);
        }

        // Hapus data dari database
        $testimonial->delete();

        return redirect()->route('testimonials.index')
                         ->with('success', 'Image deleted successfully.');
    }
}
?>