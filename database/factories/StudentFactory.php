<?php

namespace Database\Factories;

use App\Models\Student;
use Illuminate\Database\Eloquent\Factories\Factory;

class StudentFactory extends Factory
{
    protected $model = Student::class;

    public function definition()
    {
        return [
            'Fname' => $this->faker->firstName(),
            'Lname' => $this->faker->lastName(),
            'Email' => $this->faker->unique()->safeEmail(),
            'User' => $this->faker->userName(),
            'Department' => $this->faker->word(),
            'Year' => $this->faker->randomElement([1, 2, 3, 4]),
        ];
    }
}
