<?php

namespace Database\Factories;

use App\Models\Employee;
use App\Models\Employer;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Contract>
 */
class ContractFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'employer_id' => function (array $attributes) {
                return Employer::query()->inRandomOrder()->first()->id;
            },
            'employee_id' => function (array $attributes) {
                return Employee::query()->inRandomOrder()->first()->id;
            },
            'hours_per_week' => fake()->numberBetween(1, 40),
        ];
    }
}
