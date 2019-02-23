<?php

namespace Tests\Feature\Api\Comment;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ViewCommentTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_show_a_listing_of_comments()
    {
        $comments = factory(\App\Models\Comment::class, 25)->create();
        $response = $this->get(route('api.comments.index'));
        $response->assertStatus(200)->assertJson($comments->toArray());
    }

    /** @test */
    public function it_can_be_viewed()
    {
        $comment = factory(\App\Models\Comment::class)->create();
        $response = $this->get(route('api.comments.show', $comment));
        $response->assertStatus(200)->assertJson($comment->toArray());
    }
}
