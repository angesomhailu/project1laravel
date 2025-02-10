<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Batch;
use Illuminate\Foundation\Testing\RefreshDatabase;

class BatchRegistrationUnitTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_create_a_batch()
    {
        $batchData = [
            'name' => 'Batch A',
            'course_id' => 'BATCHA101',
            'start_date' => '2025/12/02',
        ];

        // Create the batch
        $batch = Batch::create($batchData);

        // Assert that the batch is saved in the database
        $this->assertDatabaseHas('batches', [
            'name' => 'Batch A',
            'course_id' => 'BATCHA101',
            'start_date' => '2025/12/02',
        ]);
    }
}
