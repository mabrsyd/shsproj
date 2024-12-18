<x-layout>
    <div class="container mx-auto mt-10">
        @if(Auth::check() && Auth::user()->usertype === 'admin')
        <h2 class="text-2xl font-bold mb-5">Upload Testimonial Image</h2>

        @if ($message = Session::get('success'))
            <div class="bg-green-500 text-white p-3 mb-5">
                <p>{{ $message }}</p>
            </div>
        @endif

        <form action="{{ route('testimonials.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="image">
                    Select Image:
                </label>
                <input type="file" name="image" class="border rounded w-full py-2 px-3 text-gray-700" required>
                @error('image')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                Upload
            </button>
            </form>
        
        <div class="grid grid-cols-2 md:grid-cols-3 gap-4 mt-10">
            @foreach ($testimonials as $testimonial)
                <div class="relative">
                    <img src="{{ asset('img/testimonials/' . $testimonial->image) }}" alt="Testimonial Image" class="rounded-lg">

                    <form action="{{ route('testimonials.destroy', $testimonial->id) }}" method="POST" class="absolute top-0 right-0">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="bg-red-500 hover:bg-red-700 text-white py-1 px-3 rounded mt-2 mr-2">
                            Delete
                        </button>
                    </form>
                </div>
            @endforeach
        </div>
        @endif

        @if(!Auth::check() || Auth::user()->usertype != 'admin')
        <div class="grid grid-cols-2 md:grid-cols-3 gap-4 mt-10">
            @foreach ($testimonials as $testimonial)
                <div class="relative">
                    <img src="{{ asset('img/testimonials/' . $testimonial->image) }}" alt="Testimonial Image" class="rounded-lg">
                </div>
            @endforeach
        @endif
        
    </div>
</x-layout>
