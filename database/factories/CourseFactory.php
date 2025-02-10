<?php

namespace Database\Factories;

use App\Models\Course;
use Illuminate\Database\Eloquent\Factories\Factory;

class CourseFactory extends Factory
{
    protected $model = Course::class;

    public function definition()
    {
        return [
            'Coursename' => $this->faker->word, // You can use any word for the course name
            'Duration' => $this->faker->numberBetween(1, 12), // Random duration (in months)
            'Outline' => $this->faker->sentence, // Random outline sentence
            'Instructor' => $this->faker->name, // Random instructor name
        ];
    }
}
