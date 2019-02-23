<?php

namespace Tests\Feature\Api\Profile;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ShowCommentsTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_provide_a_list_of_the_requested_users_comments()
    {
        $this->withoutExceptionHandling();
        // Given I have a user
        $user = factory(\App\Models\User::class)->create();
        // who has made comments
        $comments = factory(\App\Models\Comment::class, 25)->create();
        // And I request the API endpoint to get their friends
        $response = $this->get(route('api.profiles.comments.show', $user));
        // Then I should see a list of friends
        $response->assertStatus(200)->assertJson($comments->toArray()); 
    }
}
