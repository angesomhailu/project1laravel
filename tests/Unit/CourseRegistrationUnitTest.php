<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Course;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CourseRegistrationUnitTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_create_a_course()
    {
        // Course data to be inserted into the database
        $courseData = [
            'Coursename' => 'java1',
            'Duration' => '6 months',
            'Outline' => 'introduction',
            'Instructor' => 'messele',
        ];

        // Create the course using the Course model
        $course = Course::create($courseData);

        // Assert that the course is saved in the 'courses' table
        $this->assertDatabaseHas('courses', [
            'Coursename' => 'java1',
            'Duration' => '6 months',
            'Outline' => 'introduction',
            'Instructor' => 'messele',
        ]);
    }
}
