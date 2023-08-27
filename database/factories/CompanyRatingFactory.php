<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\CompanyRating>
 */
class CompanyRatingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            "company_id" => $this->faker->numberBetween(1, 40),
            "rating" => $this->faker->numberBetween(1, 5),
            "comment" => $this->faker->paragraph,
            "rated_by" => $this->faker->numberBetween(1, 2),
        ];
    }
}
