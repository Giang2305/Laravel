<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $product_name = $this->faker->unique()->words($nb=2, $asText=true);
        $slug = Str::slug($product_name);
        $image_names = [];
        for ($i = 0; $i < 3; $i++) {
            $image_names[] = 'Products/' . $this->faker->numberBetween(1, 24) . '.jpg';
        }
        $image_names_string = implode(',', $image_names);
        $single_image_name = 'Products/' . $this->faker->numberBetween(1, 24) . '.jpg';
    
        return [
            'name' => Str::title($product_name),
            'slug' => $slug,
            'description' => $this->faker->text(500),
            'price' => $this->faker->numberBetween(1, 22),
            'stock_status' => 'instock',
            'quantity' => $this->faker->numberBetween(100, 200),
            'image' => $single_image_name, // Single image
            'images' => $image_names_string, // Multiple images
            'featured' => $this->faker->numberBetween(0, 1),
            'category_id' => $this->faker->numberBetween(1, 6),
            'brand_id' => $this->faker->numberBetween(1, 6),
            'created_by' => 'Admin'
        ];
    }
}
