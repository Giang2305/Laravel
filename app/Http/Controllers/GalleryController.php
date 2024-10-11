<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use App\Models\Brand;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    public function index()
    {
        // Retrieve galleries with their associated brands, ordered by id in descending order
        $galleries = Gallery::with('brand')->orderBy('id', 'DESC')->get();
        $brands = Brand::all();
    
        return view('gallery', compact('galleries', 'brands'));
    }

    public function all_galleries()
    {
        // Retrieve all galleries ordered by id in descending order
        $galleries = Gallery::orderBy('id', 'DESC')->get();
        return view('admin.gallery.show_gallery', compact('galleries'));
    }
    public function create()
    {
        $brands = Brand::all();
        return view('admin.gallery.create_gallery', compact('brands'));
    }

    public function store(Request $request)
{
    $request->validate([
        'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        'brand_id' => 'required|exists:brands,id',
    ]);

    if ($request->hasFile('image')) {
        $image = $request->file('image');
        $originalFileName = $image->getClientOriginalName();
        $imagePath = 'Gallery/' . $originalFileName;

        // Save the image in the specified directory with the original name
        $image->storeAs('public/Gallery', $originalFileName);

        // Create a new gallery record
        Gallery::create([
            'image_path' => $imagePath,
            'brand_id' => $request->brand_id,
        ]);

        return redirect()->route('all_gallery')->with('success', 'Gallery image added successfully.');
    } else {
        return redirect()->route('create_gallery')->with('error', 'Image upload failed.');
    }
}

    public function edit($id)
    {
        $gallery = Gallery::findOrFail($id);
        $brands = Brand::all();
        return view('admin.gallery.edit_gallery', compact('gallery', 'brands'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'image' => 'sometimes|image|mimes:jpeg,png,jpg,gif|max:2048',
            'brand_id' => 'required|exists:brands,id',
        ]);

        $gallery = Gallery::findOrFail($id);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $originalFileName = $image->getClientOriginalName();
            $imagePath = 'Gallery/' . $originalFileName;

            // Save the new image in the specified directory with the original name
            $image->storeAs('public/Gallery', $originalFileName);

            // Update the image path in the database
            $gallery->image_path = $imagePath;
        }

        // Update the brand_id
        $gallery->brand_id = $request->brand_id;
        $gallery->save();

        return redirect()->route('all_gallery')->with('success', 'Gallery image updated successfully.');
    }
    public function destroy($id)
    {
        $gallery = Gallery::findOrFail($id);
        $gallery->delete();

        return redirect()->route('all_gallery')->with('success', 'Gallery image deleted successfully.');
    }
}