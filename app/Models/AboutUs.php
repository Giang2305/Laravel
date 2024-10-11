<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AboutUs extends Model
{
    use HasFactory;

    protected $table = 'about_us'; // Specify the table name if it's different from the model name
    
    protected $fillable = ['title', 'description', 'image']; // Define fillable attributes

    public $timestamps = true; // Enable timestamps (created_at and updated_at)
}
