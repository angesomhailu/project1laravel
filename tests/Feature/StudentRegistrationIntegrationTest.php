<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\User;
use App\Models\Student;

class StudentRegistrationIntegrationTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_handles_student_registration_and_saves_data_correctly()
    {
        // Step 1: Simulate a registration request with valid data
        $data = [
            'Fname' => 'angesom',
            'Lname' => 'bahre',
            'User' => 'UGR/178521/12',
            'password' => 'securepassword',
            'password_confirmation' => 'securepassword',
            'Email' => 'angesomhailu1414@gmail.com',
            'Department' => 'software',
            'Year' => '4',
        ];

        // Post the registration request
        $response = $this->post('/register', $data);

        // Step 2: Assert the user is redirected to the dashboard
        $response->assertRedirect('/dashboard');

        // Step 3: Check the database for the user and student data
        $this->assertDatabaseHas('users', [
            'Email' => 'angesomhailu1414@gmail.com',
        ]);

        $this->assertDatabaseHas('students', [
            'User' => 'UGR/178521/12',
            'Department' => 'software',
        ]);
    }

    /** @test */
    public function it_prevents_registration_if_student_id_already_exists()
    {
        // Step 1: Create an existing student record
        Student::factory()->create([
            'User' => 'UGR/178521/12',
        ]);

        // Step 2: Try registering another student with the same student ID
        $data = [
            'Fname' => 'angesom',
            'Lname' => 'bahre',
            'User' => 'UGR/178521/12',
            'password' => 'securepassword',
            'password_confirmation' => 'securepassword',
            'Email' => 'angesomhailu1414@gmail.com',
            'Department' => 'software',
            'Year' => '4',
        ];

        // Post the registration request
        $response = $this->post('/register', $data);

        // Step 3: Assert validation error is returned
        $response->assertSessionHasErrors(['User']);

        // Step 4: Ensure no new student or user is added to the database
        $this->assertDatabaseMissing('users', [
            'Email' => 'angesomhailu1414@gmail.com',
        ]);

        $this->assertDatabaseMissing('students', [
            'Department' => 'software',
        ]);
    }

    /** @test */
    public function it_allows_admin_to_view_all_registered_students()
    {
        // Step 1: Create multiple student records
        Student::factory()->create(['User' => 'UGR/178521/12', 'Department' => 'software']);
        Student::factory()->create(['User' => 'UGR/178521/13', 'Department' => 'cs']);

        // Simulate admin login
        $admin = User::factory()->create(['is_admin' => true]);
        $this->actingAs($admin);

        // Step 2: Send a GET request to the student list route
        $response = $this->get('/students');

        // Step 3: Assert the response contains the student records
        $response->assertStatus(200);
        $response->assertSee('UGR/178521/12');
        $response->assertSee('UGR/178521/13');
    }
}
