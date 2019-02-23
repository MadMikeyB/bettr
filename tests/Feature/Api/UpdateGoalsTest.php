<?php

namespace Tests\Feature\Api;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UpdateGoalsTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function an_authorised_user_may_update_their_own_goal()
    {
        // Given I have a user
        $user = factory(\App\Models\User::class)->create();
        // who is signed in
        $this->signIn($user);
        // who has a goal
        $goal = factory(\App\Models\Goal::class)->create(['user_id' => $user->id]);
        // who wants to modify that goal
        $goal->description = 'Modified';
        // when we submit a patch request to the update api endpoint
        $response = $this->patch(route('api.goals.update', $goal), $goal->toArray());
        // it should be persisted in the database
        $this->assertDatabaseHas('goals', $goal->toArray());
        // and i should receive the goal back 
        $response->assertJson($goal->toArray());
    }

    /** @test */
    public function an_unauthorised_user_may_not_update_any_goals()
    {
        // Given I have goal
        $goal = factory(\App\Models\Goal::class)->create();
        // and i modify it somehow
        $goal->description = 'Hi2u';
        // when we submit a patch request to the update api endpoint
        $response = $this->patch(route('api.goals.update', $goal), $goal->toArray());
        // I should be unauthorised
        $response->assertStatus(403);
    }
}
