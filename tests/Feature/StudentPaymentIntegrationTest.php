<?php

namespace Tests\Feature;

use App\Models\Student;
use App\Models\Payment;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class StudentPaymentIntegrationTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_associate_a_payment_with_a_student()
    {
        // Create a Student
        $student = Student::factory()->create();

        // Create a Payment and associate it with the Student
        $payment = Payment::factory()->create(['student_id' => $student->id]);

        // Assert that the Payment is associated with the correct Student
        $this->assertEquals($student->id, $payment->student_id);
    }

    /** @test */
    public function it_can_fetch_payments_for_a_student()
    {
        // Create a Student
        $student = Student::factory()->create();

        // Create multiple Payments for the Student
        $payments = Payment::factory(3)->create(['student_id' => $student->id]);

        // Fetch Payments associated with the Student
        $fetchedPayments = $student->payments;

        // Assert that the Student has the correct Payments
        $this->assertCount(3, $fetchedPayments);
        $this->assertTrue($fetchedPayments->contains($payments[0]));
        $this->assertTrue($fetchedPayments->contains($payments[1]));
        $this->assertTrue($fetchedPayments->contains($payments[2]));
    }

    /** @test */
    public function it_can_fetch_the_student_of_a_payment()
    {
        // Create a Student
        $student = Student::factory()->create();

        // Create a Payment and associate it with the Student
        $payment = Payment::factory()->create(['student_id' => $student->id]);

        // Fetch the Student associated with the Payment
        $fetchedStudent = $payment->student;

        // Assert that the fetched Student is the correct one
        $this->assertEquals($student->id, $fetchedStudent->id);
    }
}
