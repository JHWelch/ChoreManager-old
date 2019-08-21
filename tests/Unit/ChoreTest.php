<?php

namespace Tests\Unit;

use App\Chore;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ChoreTests extends TestCase
{
    use RefreshDatabase;

    /**
     * Can a user create a test?
     *
     * @test
     * @return void
     */
    public function a_user_can_create_a_test()
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

        $this->assertDatabaseHas('chores', ['title' => 'Test Chore']);
    }

    /**
     * Test relationship between user and chores
     *
     * @test
     * @return void
     */
    public function user_can_have_chores()
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

        // dd(auth()->user()->chores);

        $this->assertFalse(auth()->user()->chores->isEmpty());
    }

    /** @test */
    public function chore_can_have_user()
    {
        $this->assertFalse(Chore::first() === null);
    }
}
