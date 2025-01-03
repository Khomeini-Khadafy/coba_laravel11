<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use Database\Factories\CategoryFactory;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        
        return[
            'name' => fake()->sentence(rand(1,2), false),
            'slug' => Str::slug(fake()->sentence())

        ];
        // $category = fake()->sentence(rand(3,4),false);
        // return [
        //     'category' => $category,
        //     'slug' => Str::slug($category)
        // ];
    }
}
