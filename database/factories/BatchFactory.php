<?php

namespace Database\Factories;

use App\Models\Batch;
use App\Models\Course; // If your Batch model has a course relationship
use Illuminate\Database\Eloquent\Factories\Factory;

class BatchFactory extends Factory
{
    protected $model = Batch::class;

    public function definition()
    {
        return [
            'name' => $this->faker->word, // You can use any word for the batch name
            'course_id' => Course::factory(), // Assuming you have a Course factory defined
            'start_date' => $this->faker->date(), // Random start date
        ];
    }
}
