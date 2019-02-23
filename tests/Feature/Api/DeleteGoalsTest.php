<?php

namespace Tests\Feature\Api;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class DeleteGoalsTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function an_authorised_user_may_delete_goals_which_they_have_permission_to_delete()
    {
        // Given I have a user
        $user = factory(\App\Models\User::class)->create();
        // Who is signed in
        $this->signIn($user);
        // Who has a goal
        $goal = factory(\App\Models\Goal::class)->create(['user_id' => $user->id]);
        // And wants to delete it
        $response = $this->delete(route('api.goals.destroy', $goal));
        // it should be marked as soft deleted in the database
        $this->assertSoftDeleted('goals', $goal->toArray());
        // assert the status code is 204
        $response->assertStatus(204);
    }
}
