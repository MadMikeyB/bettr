<?php

namespace Tests\Feature\Api\Target;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CreateTargetTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function an_authenticated_user_may_create_a_target()
    {
        $this->withoutExceptionHandling();
        // Given I have a user
        $user = factory(\App\Models\User::class)->create();
        // Who has a goal
        $goal = factory(\App\Models\Goal::class)->create(['user_id' => $user->id]);
        // And i sign in
        $this->signIn($user);
        // and a target i want to create
        $target = factory(\App\Models\Target::class)->make(['user_id' => $user->id, 'goal_id' => $goal->id]);
        // when I post to the targets API endpoint
        $response = $this->post(route('api.targets.store'), $target->toArray());
        // I assert the database has the target
        $this->assertDatabaseHas('targets', $target->toArray());
        // and the api returns the target
        $response->assertJson($target->toArray());
    }

    /** @test */
    public function an_unauthenticated_user_may_not_create_a_target()
    {
        //given i have a target
        $target = factory(\App\Models\Target::class)->make();
        // when i post it to the targets api endpoint
        $response = $this->post(route('api.targets.store'), $target->toArray());
        // i assert the response code is 401
        $response->assertStatus(403);
    }
}
