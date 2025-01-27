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
            'name' => 'angesom bahre',
            'email' => 'angesomhailu1414@gmail.com',
            'student_id' => '1',
            'course' => 'java',
        ];

        $students = Student::create($studentData);

        $this->assertDatabaseHas('students', [
            'name' => 'angesom bahre',
            'email' => 'angesomhailu1414@gmail.com',
        ]);
    }
}
