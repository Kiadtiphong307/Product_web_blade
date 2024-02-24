<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

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
        return [
            'product_id'  =>fake()->unique()->regexify('[A-Z]{1}[0-9]{4}'),
            'product_name' =>fake()->word(),
            'description' =>fake()->sentence(),
            'price' =>fake()->numberBetween(1,1000),
            'stock' =>fake()->numberBetween(1,100),
            'created_at' =>now(),
            'updated_at' =>now(),
        ];
    }
}
