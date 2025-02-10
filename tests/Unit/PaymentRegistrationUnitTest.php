<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Payment;
use App\Models\Enrollment;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PaymentRegistrationUnitTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_create_a_payment()
    {
        // Create an enrollment
        $enrollment = Enrollment::factory()->create(); // Assuming Enrollment factory exists

        // Create a payment
        $payment = Payment::create([
            'enrollment_id' => $enrollment->id,
            'paid_date' => now(),
            'amount' => 100.00,
        ]);

        // Assert that the payment is saved in the database
        $this->assertDatabaseHas('payments', [
            'enrollment_id' => $enrollment->id,
            'amount' => 100.00,
        ]);
    }

    /** @test */
    public function it_belongs_to_enrollment()
    {
        // Create an enrollment and payment
        $enrollment = Enrollment::factory()->create();
        $payment = Payment::create([
            'enrollment_id' => $enrollment->id,
            'paid_date' => now(),
            'amount' => 100.00,
        ]);

        // Assert that the payment belongs to the enrollment
        $this->assertInstanceOf(Enrollment::class, $payment->enrollment);
        $this->assertEquals($enrollment->id, $payment->enrollment->id);
    }

    /** @test */
    public function it_requires_enrollment_id()
    {
        // Test that enrollment_id is required
        $payment = new Payment([
            'paid_date' => now(),
            'amount' => 100.00,
        ]);

        $this->expectException(\Illuminate\Database\QueryException::class);
        $payment->save();
    }

    /** @test */
    public function it_requires_paid_date()
    {
        // Test that paid_date is required
        $payment = new Payment([
            'enrollment_id' => 1, // Mocking enrollment_id
            'amount' => 100.00,
        ]);

        $this->expectException(\Illuminate\Database\QueryException::class);
        $payment->save();
    }

    /** @test */
    public function it_requires_amount()
    {
        // Test that amount is required
        $payment = new Payment([
            'enrollment_id' => 1, // Mocking enrollment_id
            'paid_date' => now(),
        ]);

        $this->expectException(\Illuminate\Database\QueryException::class);
        $payment->save();
    }

    /** @test */
    public function it_stores_valid_amount()
    {
        // Create an enrollment
        $enrollment = Enrollment::factory()->create();

        // Create a payment with a valid amount
        $payment = Payment::create([
            'enrollment_id' => $enrollment->id,
            'paid_date' => now(),
            'amount' => 100.00,
        ]);

        // Assert that the payment's amount is stored correctly
        $this->assertEquals(100.00, $payment->amount);
    }
}
