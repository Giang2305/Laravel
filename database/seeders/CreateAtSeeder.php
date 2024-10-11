<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;
use Carbon\Carbon; // Use Carbon for more precise timestamp control

class CreateAtSeeder extends Seeder
{
    public function run()
    {
        $timestamp = now(); // Set a starting point for random timestamps
        $endTime = $timestamp->addHour(); // Define an end point for the time range

        for ($i = 0; $i < 100; $i++) {
            $randomTimestamp = now()->timestamp;
            $testData[] = [
                'created_at' => $randomTimestamp,
            ];
        }

        Product::insert($testData); // Use insert for bulk creation (more efficient)
    }
}
