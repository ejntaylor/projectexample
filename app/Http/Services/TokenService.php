<?php

namespace App\Services;

use App\Http\Requests\TokenRequest;
use App\Models\User;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;

class TokenService
{

    public function storeToken(TokenRequest $request)
    {

        return Auth::user()->fill([
            'gh_token_id' => Crypt::encryptString($request->gh_token_id),
        ])->save();

    }

    public function getUserToken(User $user)
    {
        return $this->decryptToken($user->gh_token_id);
    }

    public function decryptToken($value)
    {
        try {
            return Crypt::decryptString($value);
        } catch (DecryptException $e) {
            return $value;
        }
    }
}
