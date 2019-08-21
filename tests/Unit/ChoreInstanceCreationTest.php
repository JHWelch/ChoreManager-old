<?php

namespace Tests\Unit;

use Carbon\Carbon;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ChoreInstanceCreationTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A_chore_instance_can_be_created_now

     * @test
     * @return void
     */
    public function a_chore_instance_can_be_created_now()
    {
        $chore = $this->getChore();

        $chore->createInstanceNow();

        $this->assertDatabaseHas(
            'chore_instances',
            [
                'chore_id' => $chore->id,
                'due_date' => Carbon::now()->toDateString(),
            ]
        );
    }

    /**
     * A_chore_instance_can_be_created_now

     * @test
     * @return void
     */
    public function a_chore_instance_can_be_created_at_a_date()
    {
        $date = new Carbon;

        $date->day = 10;
        $date->month = 5;
        $date->year = Carbon::now()->year + 1;

        $chore = $this->getChore();

        $chore->createInstanceAt($date);

        $this->assertDatabaseHas(
            'chore_instances',
            [
                'chore_id' => $chore->id,
                'due_date' => $date->toDateString(),
            ]
        );
    }

    private function getChore()
    {
        $this->actingAs(factory('App\User')->create());

        $this->post(
            '/chores',
            [
                'title' => 'Test Chore',
                'description' => 'This is a whole thing',
                'frequency_id' => 1,
            ]
        );

        return auth()->user()->chores->last();
    }

}
