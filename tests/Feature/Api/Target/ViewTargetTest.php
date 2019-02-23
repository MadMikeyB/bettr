<?php

namespace Tests\Feature\Api\Target;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ViewTargetTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_show_a_listing_of_targets()
    {
        $targets = factory(\App\Models\Target::class, 25)->create();
        $response = $this->get(route('api.targets.index'));
        $response->assertStatus(200)->assertJson($targets->toArray());
    }

    /** @test */
    public function it_can_be_viewed()
    {
        $target = factory(\App\Models\Target::class)->create();
        $response = $this->get(route('api.targets.show', $target));
        $response->assertStatus(200)->assertJson($target->toArray());
    }
}
