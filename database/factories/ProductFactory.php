<?php

namespace Database\Factories;

use App\Models\Product;
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
    protected $model = Product::class;

    public function definition(): array
    {
        				
        return [
            'name' => fake()->name(),
            'brand' => fake()->company(),
            'unit_price' => fake()->randomNumber(),
            'img' => fake()->imageUrl(),
            'stock' => fake()->numberBetween(1,100),
            'status' => fake()->boolean()
        ];
    }
}
