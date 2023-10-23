<?php

declare(strict_types=1);

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Employee as Model;
use App\Models\Company;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Employee>
 */
class EmployeeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array {
        return [
            Model::COLUMN_FIRST_NAME => fake()->firstName(),
            Model::COLUMN_LAST_NAME => fake()->lastName(),
            Model::COLUMN_COMPANY_ID => Company::inRandomOrder()->first()->id,
            Model::COLUMN_EMAIL => fake()->unique()->companyEmail(),
            Model::COLUMN_PHONE => fake()->unique()->phoneNumber(),
            Model::COLUMN_NOTE => fake()->paragraph(1)
        ];
    }
}
