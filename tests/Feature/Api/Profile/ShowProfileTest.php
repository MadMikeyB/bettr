<?php

namespace Tests\Feature\Api\Profile;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ShowProfileTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_provide_information_about_the_requested_user()
    {
        $this->withoutExceptionHandling();
        // Given I have a user
        $user = factory(\App\Models\User::class)->create();
        // And I request information about that user
        $response = $this->get(route('api.profiles.show', $user));
        // then I should receive information about this user
        $response->assertStatus(200)->assertJson($user->toArray());
    }
}
