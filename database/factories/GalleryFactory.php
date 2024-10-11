<?php

namespace Database\Factories;

use App\Models\Gallery; // Import the Gallery model
use Illuminate\Database\Eloquent\Factories\Factory;

class GalleryFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $single_image_name = 'Gallery/' . $this->faker->numberBetween(1, 24) . '.jpg';
    
        return [
            'image_path' => $single_image_name, // Single image
            'brand_id' => $this->faker->numberBetween(1, 6),
        ];
    }
}
