<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\Student;

class StudentRegistrationIntegrationTest extends TestCase
{
    use RefreshDatabase;

    public function test_student_registration_saves_to_database()
    {
        $response = $this->post('/register', [
            'Fname' => 'angesom',
            'email' => 'angesomhailu1414@gmail.com',
            'password' => 'password',
            'password_confirmation' => 'password',
        ]);

        $response->assertRedirect('/dashboard');
        $this->assertDatabaseHas('students', [
            'name' => 'angesom',
            'email' => 'angesomhailu1414@gmail.com',
        ]);
    }
}
