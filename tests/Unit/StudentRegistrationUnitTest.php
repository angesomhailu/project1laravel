<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Student;
use Illuminate\Foundation\Testing\RefreshDatabase;

class StudentRegistrationUnitTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_create_a_student()
    {
        $studentData = [
            'Fname' => 'angesom',
            'Lname' => 'hailu',
            'Email' => 'angesomhailu1414@gmail.com',
            'User' => 'UGR/172185/12',
            'Department' => 'software',
            'Year' => '4',
        ];

        $students = Student::create($studentData);

        $this->assertDatabaseHas('students', [
            'Fname' => 'angesom',
            'Lname' => 'hailu',
            'Email' => 'angesomhailu1414@gmail.com',
            'User' => 'UGR/172185/12',
            'Department' => 'software',
            'Year' => '4',
        ]);
    }
}
