<?php

namespace Tests\Feature;

use App\Models\Student;
use App\Models\Batch;
use App\Models\Course;
use App\Models\Enrollment;
use App\Models\Payment;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class SystemTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_handles_full_student_registration_system()
    {
        // Step 1: Create a Course
        $course = Course::factory()->create([
            'Coursename' => 'Software Engineering',
            'Duration' => '4 years',
            'Outline' => 'Basics to Advanced Concepts',
            'Instructor' => 'John Doe',
        ]);

        // Step 2: Create a Batch for the Course
        $batch = Batch::factory()->create([
            'name' => 'Batch 2025',
            'course_id' => $course->id,
            'start_date' => now(),
        ]);

        // Step 3: Register a Student
        $studentData = [
            'Fname' => 'Jane',
            'Lname' => 'Doe',
            'User' => 'jdoe',
            'Email' => 'jane.doe@example.com',
            'Department' => 'Engineering',
            'Year' => 1,
        ];

        $response = $this->post('/students/register', $studentData);

        $response->assertStatus(201); // Ensure successful registration
        $this->assertDatabaseHas('students', $studentData);

        $student = Student::first();

        // Step 4: Enroll the Student in the Batch
        $enrollmentData = [
            'enroll_no' => 'ENR12345',
            'batch_id' => $batch->id,
            'student_id' => $student->id,
            'join_date' => now(),
        ];

        $response = $this->post('/enrollments', $enrollmentData);

        $response->assertStatus(201); // Ensure successful enrollment
        $this->assertDatabaseHas('enrollments', $enrollmentData);

        // Step 5: Make a Payment for the Enrollment
        $paymentData = [
            'enrollment_id' => Enrollment::first()->id,
            'paid_date' => now(),
            'amount' => 5000,
        ];

        $response = $this->post('/payments', $paymentData);

        $response->assertStatus(201); // Ensure successful payment
        $this->assertDatabaseHas('payments', $paymentData);

        // Ensure all relationships are set correctly
        $this->assertEquals($student->id, Enrollment::first()->student_id);
        $this->assertEquals($batch->id, Enrollment::first()->batch_id);
        $this->assertEquals(5000, Payment::first()->amount);
    }
}
