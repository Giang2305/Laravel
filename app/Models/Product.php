<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'name', 'slug', 'description', 'price', 'image', 'images', 'stock_status', 
        'quantity', 'category_id', 'brand_id', 'featured', 'is_active', 'created_by'
    ];

    public function category(){
        return $this->belongsTo(Category::class,'category_id');
    }
    public function brand(){
        return $this->belongsTo(Brand::class,'brand_id');
    }
    public function order()
    {
        return $this->belongsTo(Order::class, 'order_id');
    }
}
