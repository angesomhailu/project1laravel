<?php

namespace Tests\Feature;

use App\Models\Student;
use App\Models\Batch;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class StudentBatchIntegrationTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_assign_a_student_to_a_batch()
    {
        // Create a Batch
        $batch = Batch::factory()->create();

        // Create a Student and assign it to the Batch
        $student = Student::factory()->create();
        $student->batch_id = $batch->id;
        $student->save();

        // Assert that the Student is assigned to the correct Batch
        $this->assertEquals($batch->id, $student->batch_id);
    }

    /** @test */
    public function it_can_fetch_students_in_a_batch()
    {
        // Create a Batch
        $batch = Batch::factory()->create();

        // Create Students and assign them to the Batch
        $students = Student::factory(3)->create(['batch_id' => $batch->id]);

        // Fetch Students from the Batch
        $fetchedStudents = $batch->students;

        // Assert that the Batch has the correct Students
        $this->assertCount(3, $fetchedStudents);
        $this->assertTrue($fetchedStudents->contains($students[0]));
        $this->assertTrue($fetchedStudents->contains($students[1]));
        $this->assertTrue($fetchedStudents->contains($students[2]));
    }

    /** @test */
    public function it_can_fetch_the_batch_of_a_student()
    {
        // Create a Batch
        $batch = Batch::factory()->create();

        // Create a Student and assign it to the Batch
        $student = Student::factory()->create(['batch_id' => $batch->id]);

        // Fetch the Batch of the Student
        $fetchedBatch = $student->batch;

        // Assert that the fetched Batch is the correct one
        $this->assertEquals($batch->id, $fetchedBatch->id);
    }
}
