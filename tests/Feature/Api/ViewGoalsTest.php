<?php

namespace Tests\Feature\Api;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ViewGoalsTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_viewed()
    {
        $goal = factory(\App\Models\Goal::class)->create();
        $response = $this->get(route('api.goals.show', $goal));
        $response->assertStatus(200);
        $response->assertJson($goal->toArray());
    }
}
