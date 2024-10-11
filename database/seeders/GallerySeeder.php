<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Gallery;

class GallerySeeder extends Seeder
{
    /**
     * Run the seeder.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i <= 24; $i++) {
            Gallery::create([
                'brand_id' => rand(1, 6),
                'image_path' => 'Products/' . $i,
            ]);
        }
    }
}
