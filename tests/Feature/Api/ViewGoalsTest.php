<?php

namespace Tests\Feature\Api;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ViewGoalsTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_show_a_listing_of_goals()
    {
        $goals = factory(\App\Models\Goal::class, 25)->create();
        $response = $this->get(route('api.goals.index'));
        $response->assertStatus(200)->assertJson($goals->toArray());
    }

    /** @test */
    public function it_can_be_viewed()
    {
        $goal = factory(\App\Models\Goal::class)->create();
        $response = $this->get(route('api.goals.show', $goal));
        $response->assertStatus(200)->assertJson($goal->toArray());
    }
}
