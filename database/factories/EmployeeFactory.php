<?php

namespace Database\Factories;

use App\Models\Employee;
use Illuminate\Database\Eloquent\Factories\Factory;

class EmployeeFactory extends Factory
{
    protected $model = Employee::class;

    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'employee_no' => $this->faker->unique()->randomNumber(6),
            'designation' => $this->faker->jobTitle,
            // Add more attributes and their corresponding default values as needed
        ];
    }
}
