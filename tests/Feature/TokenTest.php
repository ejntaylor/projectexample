<?php

namespace Tests\Feature;

use App\Models\User;
use App\Services\TokenService;
use Tests\TestCase;

class TokenTest extends TestCase
{

    public function test_has_gh_token_id()
    {
        $user = User::factory()->make();

        $this->actingAs($user)
            ->get('/')
            ->assertStatus(200)
            ->assertHasProp('gh_token_id');
    }

    public function test_can_add_gh_token_id()
    {

        $user = User::factory()->make();

        $this->actingAs($user)
            ->post(route('tokens.store'), [
                'gh_token_id' => 'testHash',
            ])
            ->assertStatus(302);

        $decrypted = (new TokenService)->decryptToken($user->gh_token_id);

        $this->assertSame('testHash', $decrypted);

    }

}
