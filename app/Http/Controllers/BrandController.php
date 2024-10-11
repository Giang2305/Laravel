<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Brand;
use Illuminate\Support\Facades\DB;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function show_brand()
    {
        $all_brand = Brand::orderByDesc('id')->get();
    
        return view('admin.brand.show_brand', compact('all_brand'));
    }
    
    
    /**
     * Store a newly created resource in storage.
     */
    public function all_brand()
    {
        $all_brand = DB::table('brands')
            ->leftJoin('products', 'brands.id', '=', 'products.brand_id')
            ->select('brands.id', 'brands.name', 'brands.slug', 'brands.image', 'brands.is_active', 'brands.created_by', DB::raw('COUNT(products.id) as product_count'))
            ->groupBy('brands.id', 'brands.name', 'brands.slug', 'brands.image', 'brands.is_active', 'brands.created_by')
            ->orderByDesc('id')
            ->get();

        return view('admin.brand.show_brand', compact('all_brand'));
    }
    /**
     * Display the specified resource.
     */
    public function show_create_brand(){

        return view('admin.brand.create_brand');
    }

    public function create_brand(Request $request)
    {
       
        $data = array();
        $data['name'] = $request->name;
        $data['slug'] = $request->slug;
        $data['image'] = $request->image;
        $data['is_active'] = $request->is_active;
        $data['created_by'] = $request->created_by;
        if ($request->has('photo')) {
            $data['image'] = $request->input('photo');
        }
        DB::table('brands')->insert($data);

        return redirect()->route('all_brand')->with('success', 'Brand created successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function show_edit_brand($id)
    {
        $brand = DB::table('brands')->where('id', $id)->first();
        if (!$brand) {
            return redirect()->route('all_brand')->with('error', 'Brand not found.');
        }
        return view('admin.brand.edit_brand', compact('brand'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function edit_brand(Request $request, $id)
    {
        $data = [
            'name' => $request->name,
            'slug' => $request->slug,
            'image' => $request->image,
            'is_active' => $request->is_active,
            'created_by' => $request->created_by,
        ];
    
        DB::table('brands')->where('id', $id)->update($data);
    
        return redirect()->route('all_brand')->with('success', 'Brand edited successfully.');
    }
    
    /**
     * Remove the specified resource from storage.
     */
    public function delete_brand($brand){
        DB::table('brands')->where('id', $brand)->delete();

        return redirect()->route('all_brand')->with('success', 'Brand edited successfully.');
    }
}
