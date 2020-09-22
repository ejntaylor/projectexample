<?php

namespace App\Services;

use App\Http\Requests\TokenRequest;
use Illuminate\Support\Facades\Auth;

class TokenService
{

    public function storeToken(TokenRequest $request)
    {
        return Auth::user()->update(['gh_token_id' => $request->gh_token_id]);
    }

}
