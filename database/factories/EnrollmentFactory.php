<?php

namespace Database\Factories;

use App\Models\Enrollment;
use App\Models\Student;
use App\Models\Batch;
use Illuminate\Database\Eloquent\Factories\Factory;

class EnrollmentFactory extends Factory
{
    protected $model = Enrollment::class;

    public function definition()
    {
        return [
            'enroll_no' => $this->faker->unique()->word,
            'batch_id' => Batch::factory(), // Assuming BatchFactory is defined
            'student_id' => Student::factory(), // Assuming StudentFactory is defined
            'join_date' => $this->faker->date(),
        ];
    }
}
