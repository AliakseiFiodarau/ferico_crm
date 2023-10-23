<?php

declare(strict_types=1);

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Company as Model;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Company>
 */
class CompanyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array {
        return [
            Model::COLUMN_NAME => fake()->company(),
            Model::COLUMN_EMAIL => fake()->unique()->companyEmail(),
            Model::COLUMN_PHONE => fake()->unique()->phoneNumber(),
            Model::COLUMN_URL => fake()->unique()->url(),
            Model::COLUMN_LOGO => fake()->unique()->image(
                'public/storage/images/logo',
                300,
                240,
                null,
                false
            ),
        ];
    }
}
