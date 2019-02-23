<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class GoalTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_has_an_author()
    {
        $user = factory(\App\Models\User::class)->create();
        $goal = factory(\App\Models\Goal::class)->create(['user_id' => $user->id]);
        $this->assertInstanceOf('App\Models\User', $goal->user);
    }

    /** @test */
    // public function it_has_a_category()
    // {
    //     //
    // }

    // /** @test */
    // public function it_has_targets()
    // {
    //     //
    // }
}
