<?php

namespace Tests\Feature\Api\Goal;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CreateGoalsTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function an_authenticated_user_may_create_a_goal()
    {
        // Given I have a user
        $user = factory(\App\Models\User::class)->create();
        // And i sign in
        $this->signIn($user);
        // and a goal
        $goal = factory(\App\Models\Goal::class)->make(['user_id' => $user->id]);
        // when I post to the goals API endpoint
        $response = $this->post(route('api.goals.store'), $goal->toArray());
        // I assert the database has the goal
        $this->assertDatabaseHas('goals', $goal->toArray());
        // and the api returns the goal
        $response->assertJson($goal->toArray());
    }

    /** @test */
    public function an_unauthenticated_user_may_not_create_a_goal()
    {
        //given i have a goal
        $goal = factory(\App\Models\Goal::class)->make();
        // when i post it to the goals api endpoint
        $response = $this->post(route('api.goals.store'), $goal->toArray());
        // i assert the response code is 401
        $response->assertStatus(403);
    }
}
