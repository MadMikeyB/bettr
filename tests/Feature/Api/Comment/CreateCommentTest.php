<?php

namespace Tests\Feature\Api\Comment;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CreateCommentTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function an_authorised_user_may_create_a_comment()
    {
        $this->withoutExceptionHandling();

        // Given I have a user
        $user = factory(\App\Models\User::class)->create();
        // Who is signed in
        $this->signIn($user);
        // Who wants to make a comment
        $comment = factory(\App\Models\Comment::class)->make(['user_id' => $user->id]);
        // When I submit an API request to store a comment
        $response = $this->post(route('api.comments.store'), $comment->toArray());
        // it should be persisted in the database
        $this->assertDatabaseHas('comments', $comment->toArray());
        // and returned back to me
        $response->assertStatus(201)->assertJson($comment->toArray());
    }
}
