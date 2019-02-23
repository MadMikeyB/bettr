<?php

namespace Tests\Feature\Api\Profile;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ShowGoalsTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_provide_a_list_of_the_requested_users_goals()
    {
        $this->withoutExceptionHandling();
        // Given I have a user
        $user = factory(\App\Models\User::class)->create();
        // Who has goals
        $goals = factory(\App\Models\Goal::class, 25)->create(['user_id' => $user->id]);
        // And I request the API endpoint to get their goals
        $response = $this->get(route('api.profiles.goals.show', $user));
        // Then I should see a list of goals
        $response->assertStatus(200)->assertJson($goals->toArray()); 
    }
}
