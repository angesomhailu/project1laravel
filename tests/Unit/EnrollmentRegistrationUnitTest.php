<?php

namespace Tests\Unit;

use App\Models\Enrollment;
use App\Models\Student;
use App\Models\Batch;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class EnrollmentRegistrationUnitTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_create_an_enrollment()
    {
        $student = Student::factory()->create();  // Create a student using the factory
        $batch = Batch::factory()->create();      // Create a batch using the factory

        $enrollmentData = [
            'student_id' => $student->id,
            'batch_id' => $batch->id,
            'join_date' => now(),
        ];

        $enrollment = Enrollment::create($enrollmentData);

        $this->assertDatabaseHas('enrollments', [
            'student_id' => $student->id,
            'batch_id' => $batch->id,
        ]);
    }

    /** @test */
    public function it_requires_a_student()
    {
        $this->expectException(\Illuminate\Database\QueryException::class);
        
        Enrollment::create([
            'batch_id' => 1,
            'join_date' => now(),
        ]);
    }

    /** @test */
    public function it_requires_a_batch()
    {
        $this->expectException(\Illuminate\Database\QueryException::class);
        
        Enrollment::create([
            'student_id' => 1,
            'join_date' => now(),
        ]);
    }
}
