<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function all_category()
    {
        $all_category = DB::table('categories')
                        ->orderByDesc('id')
                        ->get();

        return view('admin.category.show_category', compact('all_category'));
    }

    /**
     * Display the form for creating a new resource.
     */
    public function show_create_category()
    {
        return view('admin.category.create_category');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function create_category(Request $request)
    {
        $data = [
            'name' => $request->name,
            'slug' => $request->slug,
            'image' => $request->image,
            'is_active' => $request->is_active,
            'created_by' => $request->created_by,
        ];

        DB::table('categories')->insert($data);

        return redirect()->route('all_category')->with('success', 'Category created successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function show_edit_category($id)
    {
        $category = DB::table('categories')->where('id', $id)->first();
        if (!$category) {
            return redirect()->route('all_category')->with('error', 'Category not found.');
        }
        return view('admin.category.edit_category', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function edit_category(Request $request, $id)
    {
        $data = [
            'name' => $request->name,
            'slug' => $request->slug,
            'image' => $request->image,
            'is_active' => $request->is_active,
            'created_by' => $request->created_by,
        ];

        DB::table('categories')->where('id', $id)->update($data);

        return redirect()->route('all_category')->with('success', 'Category edited successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete_category($id)
    {
        DB::table('categories')->where('id', $id)->delete();

        return redirect()->route('all_category')->with('success', 'Category deleted successfully.');
    }
}
