<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Student;
use Illuminate\Foundation\Testing\RefreshDatabase;

class StudentRegistrationTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_create_a_student()
    {
        $studentData = [
            'name' => 'John Doe',
            'email' => 'johndoe@example.com',
            'student_id' => '123456',
            'course' => 'Computer Science',
        ];

        $students = Student::create($studentData);

        $this->assertDatabaseHas('students', [
            'name' => 'John Doe',
            'email' => 'johndoe@example.com',
        ]);
    }
}
