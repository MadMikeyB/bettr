<?php

namespace Tests\Feature\Api\Target;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UpdateTargetTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function an_authorised_user_may_update_their_own_target()
    {
        $this->withoutExceptionHandling();
        // Given I have a user
        $user = factory(\App\Models\User::class)->create();
        // Who has a goal
        $goal = factory(\App\Models\Goal::class)->create();
        // who is signed in
        $this->signIn($user);
        // who has a target
        $target = factory(\App\Models\Target::class)->create(['user_id' => $user->id, 'goal_id' => $goal->id]);
        // who wants to modify that target
        $target->description = 'Modified';
        // when we submit a patch request to the update api endpoint
        $response = $this->patch(route('api.targets.update', $target), $target->toArray());
        // it should be persisted in the database
        $this->assertDatabaseHas('targets', $target->toArray());
        // and i should receive the target back 
        $response->assertJson($target->toArray());
    }

    /** @test */
    public function an_authorised_user_may_only_update_targets_which_they_have_permission_to_update()
    {
        $this->withoutExceptionHandling();
        // Given I have a user
        $user = factory(\App\Models\User::class)->create();
        // Who has a goal
        $goal = factory(\App\Models\Goal::class)->create(['user_id' => $user->id]);
        // who is signed in
        $this->signIn($user);
        // and I have a second user who owns the target
        $secondUser = factory(\App\Models\User::class)->create();
        // and the first user tries to modify a target they do not own
        $target = factory(\App\Models\Target::class)->create(['user_id' => $secondUser->id, 'goal_id' => $goal->id]);
        $target->description = 'Modified';
        // when we submit a patch request to the update api endpoint
        $response = $this->patch(route('api.targets.update', $target), $target->toArray());
        // I should be unauthorised
        $response->assertStatus(403);
    }

    /** @test */
    public function an_unauthorised_user_may_not_update_any_targets()
    {
        // Given I have target
        $target = factory(\App\Models\Target::class)->create();
        // Who has a goal
        $goal = factory(\App\Models\Goal::class)->create();
        // and i modify it somehow
        $target->description = 'Hi2u';
        // when we submit a patch request to the update api endpoint
        $response = $this->patch(route('api.targets.update', $target), $target->toArray());
        // I should be unauthorised
        $response->assertStatus(403);
    }
}
