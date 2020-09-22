<?php

namespace Tests\Feature;

use App\Models\User;
use Tests\TestCase;

class StarredTest extends TestCase
{
    public function test_can_get_starred_repos()
    {

        $user = User::factory()->make();

        $this->actingAs($user)
            ->post(route('starred-repos'))
            ->assertStatus(302);

    }
}
