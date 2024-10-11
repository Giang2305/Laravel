<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Brand;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function show_product()
    {
        $all_product = DB::table('products')
            ->join('categories', 'categories.id', '=', 'products.category_id')
            ->join('brands', 'brands.id', '=', 'products.brand_id')
            ->select('products.*', 'categories.name as category_name', 'brands.name as brand_name')
            ->get();
       
        return view('admin.product.show_product', compact('all_product'));
    }
    

    /**
     * Store a newly created resource in storage.
     */
    public function all_product()
    {
        $all_product = DB::table('products')
            ->join('categories', 'categories.id', '=', 'products.category_id')
            ->join('brands', 'brands.id', '=', 'products.brand_id')
            ->select('products.*', 'categories.name as category_name', 'brands.name as brand_name')
            ->orderBy('products.id', 'desc') // Add this line to order by id in descending order
            ->get();
       
        return view('admin.product.show_product', compact('all_product'));
    }
    /**
     * Display the specified resource.
     */
    public function show_create_product(){
        $categories = Category::all();
        $brands = Brand::all();

    return view('admin.product.create_product', compact('categories', 'brands'));
    }

    public function create_product(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'stock_status' => 'required|string|in:instock,outstock',
            'quantity' => 'required|integer|min:0',
            'category_id' => 'required|exists:categories,id',
            'brand_id' => 'required|exists:brands,id',
            'created_by' => 'required|string|max:255',
        ]);
    
        $data = $request->only([
            'name', 'slug', 'description', 'price', 'stock_status', 'quantity', 
            'category_id', 'brand_id', 'featured', 'is_active', 'created_by'
        ]);
    
        $uploadDir = 'Products';
    
        if (!file_exists(public_path($uploadDir))) {
            mkdir(public_path($uploadDir), 0755, true);
        }
    
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = $image->getClientOriginalName(); // Use the original image name
            $image->move(public_path($uploadDir), $imageName);
            $data['image'] = $uploadDir . '/' . $imageName;
        }
    
        if ($request->hasFile('images')) {
            $images = $request->file('images');
            $imagePaths = [];
        
            foreach ($images as $index => $image) {
                $imageName = $image->getClientOriginalName(); // Use the original image name
                $image->move(public_path($uploadDir), $imageName);
                $imagePaths[] = $uploadDir . '/' . $imageName;
            }
        
            // Convert the array of image paths to a JSON string
            $imageJson = json_encode($imagePaths);
        
            // Replace backslashes with forward slashes
            $imageJson = str_replace("\\", "/", $imageJson);
        
            // Assign the modified JSON string to the data array
            $data['images'] = $imageJson;
        }
    
        // Save the product data
        $product = Product::create($data);
    
        // Redirect to the product list with a success message
        return redirect('/admin/products')->with('success', 'Product created successfully!');
    }
    
    /**
     * Show the form for editing the specified resource.
     */
    
   public function show_edit_product($product)
    {
        $product = DB::table('products')->where('id', $product)->first();
        $categories = Category::all();
        $brands = Brand::all();
        if (!$product) {
            return redirect()->route('all_product')->with('error', 'Product not found.');
        }
        return view('admin.product.edit_product', compact('product','categories', 'brands'));
    }

    public function edit_product(Request $request, $product)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'stock_status' => 'required|string|in:instock,outstock',
            'quantity' => 'required|integer|min:0',
            'category_id' => 'required|exists:categories,id',
            'brand_id' => 'required|exists:brands,id',
            'created_by' => 'required|string|max:255',
        ]);

        $data = $request->only([
            'name', 'slug', 'description', 'price', 'stock_status', 'quantity', 
            'category_id', 'brand_id', 'featured', 'is_active', 'created_by'
        ]);

        $uploadDir = 'Products';

        if (!file_exists(public_path($uploadDir))) {
            mkdir(public_path($uploadDir), 0755, true);
        }

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = $image->getClientOriginalName(); // Use the original image name
            $image->move(public_path($uploadDir), $imageName);
            $data['image'] = $uploadDir . '/' . $imageName;
        }

        if ($request->hasFile('images')) {
            $images = $request->file('images');
            $imagePaths = [];

            foreach ($images as $index => $image) {
                $imageName = $image->getClientOriginalName(); // Use the original image name
                $image->move(public_path($uploadDir), $imageName);
                $imagePaths[] = $uploadDir . '/' . $imageName;
            }

            // Convert the array of image paths to a JSON string
            $data['images'] = json_encode($imagePaths);
        }

        // Update the product data
        DB::table('products')->where('id', $product)->update($data);

        // Redirect to the product list with a success message
        return redirect()->route('all_product')->with('success', 'Product edited successfully.');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function delete_product($product){
        DB::table('products')->where('id', $product)->delete();

        return redirect()->route('all_product')->with('success', 'Product edited successfully.');
    }
    
}
