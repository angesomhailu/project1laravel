<?php

namespace Tests\Feature;

use App\Models\Course;
use App\Models\Student;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CourseStudentIntegrationTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function student_can_be_associated_with_a_course()
    {
        // Create a course
        $course = Course::factory()->create([
            'Coursename' => 'java1',
            'Duration' => '3 months',
            'Outline' => 'Introduction ',
            'Instructor' => 'messelle',
        ]);

        // Create a student
        $student = Student::factory()->create([
            'Fname' => 'angesom',
            'Lname' => 'hailu',
            'User' => 'janedoe',
            'Email' => 'angesomhailu@example.com',
            'Department' => 'software',
            'Year' => 4,
        ]);

        // Associate the student with the course (If there is a direct relation, like `student->course_id`)
        $student->courses()->attach($course->id);  // Assuming a many-to-many relation via pivot table

        // Assert that the student is correctly associated with the course
        $this->assertTrue($student->courses->contains($course));

        // Alternatively, if it's a simple foreign key relationship on the student model:
        // $student->course_id = $course->id;
        // $student->save();
        // $this->assertEquals($student->course_id, $course->id);
    }

    /** @test */
    public function course_can_have_multiple_students()
    {
        // Create a course
        $course = Course::factory()->create([
           'Coursename' => 'java1',
            'Duration' => '3 months',
            'Outline' => 'Introduction ',
            'Instructor' => 'messelle',
        ]);

        // Create multiple students
        $student1 = Student::factory()->create();
        $student2 = Student::factory()->create();

        // Associate students with the course (via pivot table, assuming many-to-many)
        $course->students()->attach([$student1->id, $student2->id]);

        // Assert that the course has the correct number of students
        $courseWithStudents = Course::with('students')->find($course->id);
        $this->assertCount(2, $courseWithStudents->students);
        $this->assertTrue($courseWithStudents->students->contains($student1));
        $this->assertTrue($courseWithStudents->students->contains($student2));
    }
}
