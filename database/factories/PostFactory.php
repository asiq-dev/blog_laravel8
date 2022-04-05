<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->sentence,
            'user_id' => User::factory(), 
            'category_id' => Category::factory(),
            'excerpt' => $this->faker->sentence,
            'slug' => $this->faker->slug,
            'body' => $this->faker->paragraph
        ];
    }
}