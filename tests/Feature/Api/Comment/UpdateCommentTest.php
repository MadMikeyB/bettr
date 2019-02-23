<?php

namespace Tests\Feature\Api\Comment;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UpdateCommentTest extends TestCase
{
use RefreshDatabase;

    /** @test */
    public function an_authorised_user_may_update_their_own_comment()
    {
        $this->withExceptionHandling();
        // Given I have a user
        $user = factory(\App\Models\User::class)->create();
        // who is signed in
        $this->signIn($user);
        // who has a comment
        $comment = factory(\App\Models\Comment::class)->create(['user_id' => $user->id]);
        // who wants to modify that comment
        $comment->comment = 'Modified';
        // when we submit a patch request to the update api endpoint
        $response = $this->patch(route('api.comments.update', $comment), $comment->toArray());
        // it should be persisted in the database
        $this->assertDatabaseHas('comments', $comment->toArray());
        // and i should receive the comment back 
        $response->assertJson($comment->toArray());
    }

    /** @test */
    public function an_authorised_user_may_only_update_comments_which_they_have_permission_to_update()
    {
        // Given I have a user
        $user = factory(\App\Models\User::class)->create();
        $secondUser = factory(\App\Models\User::class)->create();
        // who is signed in
        $this->signIn($user);
        // Who tries to modify a comment they do not own
        $comment = factory(\App\Models\Comment::class)->create(['user_id' => $secondUser->id]);
        $comment->comment = 'Modified';
        // when we submit a patch request to the update api endpoint
        $response = $this->patch(route('api.comments.update', $comment), $comment->toArray());
        // I should be unauthorised
        $response->assertStatus(403);
    }

    /** @test */
    public function an_unauthorised_user_may_not_update_any_comments()
    {
        // Given I have comment
        $comment = factory(\App\Models\Comment::class)->create();
        // and i modify it somehow
        $comment->comment = 'Hi2u';
        // when we submit a patch request to the update api endpoint
        $response = $this->patch(route('api.comments.update', $comment), $comment->toArray());
        // I should be unauthorised
        $response->assertStatus(403);
    }
}
