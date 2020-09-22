<?php

namespace App\Http\Controllers;

use App\Services\TokenService;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class HomeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(TokenService $tokenService)
    {
        return Inertia::render('Home', [
            'gh_token_id' => $tokenService->getUserToken(Auth::user()),
        ]);

    }
}
