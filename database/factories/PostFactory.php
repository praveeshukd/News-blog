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
          'user_id'=>User::factory(),
          'category_id'=>Category::factory(),
          'excerpt'=>$this->faker->paragraph(3),
          'body'=>$this->faker->paragraph(3),
          'title'=>$this->faker->sentence,
          'slug'=>$this->faker->slug,
        ];
    }
}
