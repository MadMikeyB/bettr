<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CreateGoalsTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function an_authenticated_user_may_create_a_goal()
    {
        $this->withoutExceptionHandling();
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
}
