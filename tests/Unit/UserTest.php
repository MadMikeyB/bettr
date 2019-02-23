<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_has_goals()
    {
        $user = factory(\App\Models\User::class)->create();
        $goals = factory(\App\Models\Goal::class, 25)->create(['user_id' => $user->id]);

        $this->assertInstanceOf('Illuminate\Database\Eloquent\Collection', $user->goals);
    }
}
