<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Platform;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class CourseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'slug' => fake()->slug(),
            'name' => fake()->name(),
            'type' => rand(0, 1),
            'resources' => rand(1, 50),
            'year' => rand(2009, 2016),
            'price' => rand(0, 1) ? rand(1, 100) : 0.00,
            'image' => fake()->imageUrl(),
            'content' => fake()->paragraph(),
            'link' => fake()->url(),
            'submitted_by' => User::all()->random()->id,
            'duration' => rand(0, 2),
            'level' => rand(0, 2),
            'platform_id' => Platform::all()->random()->id,
        ];
    }
}
