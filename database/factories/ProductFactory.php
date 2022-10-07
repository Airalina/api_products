<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
    
     * @return array<string, mixed>
     */
    protected $model = Product::class;

    public function definition()
    {   
        $categories = Category::select('id')->get();
        $user = User::select('id')->get();

        return [
            'name' => $this->faker->name(),
            'price' => $this->faker->randomFloat(2, 0, 1000),
            'category_id' => $categories->random()->id,
            'user_id' => $user->random()->id
       ];
    }
}
