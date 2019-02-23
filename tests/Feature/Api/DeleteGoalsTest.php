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

    /** @test */
    public function an_authorised_user_may_not_delete_goals_which_they_do_not_have_permission_to_delete()
    {
        // Given I have a user
        $user = factory(\App\Models\User::class)->create();
        // Who is signed in
        $this->signIn($user);
        // Who has a goal
        $goal = factory(\App\Models\Goal::class)->create(['user_id' => 1337]);
        // And wants to delete it
        $response = $this->delete(route('api.goals.destroy', $goal));
        // assert the status code is 403
        $response->assertStatus(403);
    }

    /** @test */
    public function an_unauthorised_user_may_not_delete_goals()
    {
        // given i have a goal
        $goal = factory(\App\Models\Goal::class)->create();
        // and a hacker wants to delete it
        $response = $this->delete(route('api.goals.destroy', $goal));
        // they should be denied with great vengeance
        $response->assertStatus(403);
    }
}
