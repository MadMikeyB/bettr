<?php

namespace Tests\Feature\Api\Profile;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ShowFriendsTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_provide_a_list_of_the_requested_users_friends()
    {
        $this->withoutExceptionHandling();
        // Given I have a user
        $user = factory(\App\Models\User::class)->create();
        // And a friend
        $friend = factory(\App\Models\User::class)->create();
        // And the two users are friends
        $friends = factory(\App\Models\Friend::class)->create([
            'user_id' => $user->id,
            'friend_id' => $friend->id,
            'accepted' => true
        ]);
        // And I request the API endpoint to get their friends
        $response = $this->get(route('api.profiles.friends.show', $user));
        // Then I should see a list of friends
        $response->assertStatus(200)->assertJson($user->friends->toArray()); 
    }
}
