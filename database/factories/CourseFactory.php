<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Course;
use App\Models\User;
use App\Models\Level;
use App\Models\Category;
use App\Models\Currency;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class CourseFactory extends Factory
{

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $user = User::first();
        $level = Level::first();
        $category = Category::first();

        return [
            'name' => fake()->name(),
            'slug' => fake()->slug(),
            'description' => fake()->text(),
            'short_title' => fake()->sentence(),
            'creator_id' => $user->id,
            'level_id' => $level->id,
            'tags' => fake()->words(5, true),
            'status' => 'published',
            'duration' => random_int(1, 12),
            'price_type' => 'free',
        ];
    }
}
