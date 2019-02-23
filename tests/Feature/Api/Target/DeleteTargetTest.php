<?php

namespace Tests\Feature\Api\Target;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class DeleteTargetTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function an_authorised_user_may_delete_targets_which_they_have_permission_to_delete()
    {
        // Given I have a user
        $user = factory(\App\Models\User::class)->create();
        // Who is signed in
        $this->signIn($user);
        // Who has a target
        $target = factory(\App\Models\Target::class)->create(['user_id' => $user->id]);
        // And wants to delete it
        $response = $this->delete(route('api.targets.destroy', $target));
        // it should be marked as soft deleted in the database
        $this->assertSoftDeleted('targets', $target->toArray());
        // assert the status code is 204
        $response->assertStatus(204);
    }

    /** @test */
    public function an_authorised_user_may_not_delete_targets_which_they_do_not_have_permission_to_delete()
    {
        // Given I have a user
        $user = factory(\App\Models\User::class)->create();
        // Who is signed in
        $this->signIn($user);
        // Who has a target
        $target = factory(\App\Models\Target::class)->create(['user_id' => 1337]);
        // And wants to delete it
        $response = $this->delete(route('api.targets.destroy', $target));
        // assert the status code is 403
        $response->assertStatus(403);
    }

    /** @test */
    public function an_unauthorised_user_may_not_delete_targets()
    {
        // given i have a target
        $target = factory(\App\Models\Target::class)->create();
        // and a hacker wants to delete it
        $response = $this->delete(route('api.targets.destroy', $target));
        // they should be denied with great vengeance
        $response->assertStatus(403);
    }
}
