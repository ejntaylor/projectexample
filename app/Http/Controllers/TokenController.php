<?php

namespace App\Http\Controllers;

use App\Http\Requests\TokenRequest;
use App\Services\TokenService;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;

class TokenController extends Controller
{
    public function create()
    {
        return inertia('Token/Create');

    }

    public function store(TokenRequest $request, TokenService $tokenService)
    {
        $tokenService->storeToken($request);
        return Redirect::back();
    }

}
