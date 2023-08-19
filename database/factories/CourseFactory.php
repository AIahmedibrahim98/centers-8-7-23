<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\User;
use App\Models\Vendor;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Course>
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
        return [
            'name' => fake()->word(),
            'hours' => fake()->numberBetween(25, 80),
            'price' => fake()->numberBetween(800, 8000),
            'vendor_id' => Vendor::InRandomOrder()->first()->id,
            'category_id' => Category::InRandomOrder()->first()->id,
            'user_id' => User::whereIn('type', ['admin', 'user'])->InRandomOrder()->first()->id,
        ];
    }
}
