<?php

namespace Tests\Feature\Api\Comment;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class DeleteCommentTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function an_authorised_user_may_delete_comments_which_they_have_permission_to_delete()
    {
        // Given I have a user
        $user = factory(\App\Models\User::class)->create();
        // Who is signed in
        $this->signIn($user);
        // Who has a comment
        $comment = factory(\App\Models\Comment::class)->create(['user_id' => $user->id]);
        // And wants to delete it
        $response = $this->delete(route('api.comments.destroy', $comment));
        // it should be marked as soft deleted in the database
        $this->assertSoftDeleted('comments', $comment->toArray());
        // assert the status code is 204
        $response->assertStatus(204);
    }

    /** @test */
    public function an_authorised_user_may_not_delete_comments_which_they_do_not_have_permission_to_delete()
    {
        // Given I have a user
        $user = factory(\App\Models\User::class)->create();
        $secondUser = factory(\App\Models\User::class)->create();
        // Who is signed in
        $this->signIn($user);
        // Who has a comment
        $comment = factory(\App\Models\Comment::class)->create(['user_id' => $secondUser->id]);
        // And wants to delete it
        $response = $this->delete(route('api.comments.destroy', $comment));
        // assert the status code is 403
        $response->assertStatus(403);
    }

    /** @test */
    public function an_unauthorised_user_may_not_delete_comments()
    {
        // given i have a comment
        $comment = factory(\App\Models\Comment::class)->create();
        // and a hacker wants to delete it
        $response = $this->delete(route('api.comments.destroy', $comment));
        // they should be denied with great vengeance
        $response->assertStatus(403);
    }
}
