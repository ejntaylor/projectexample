<?php

namespace App\Http\Controllers;

use App\Services\TokenService;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(TokenService $tokenService)
    {
        // return inertia('Home');

        return Inertia::render('Home', [
            'gh_token_id' => $tokenService->getUserToken(Auth::user()),
        ]);

    }
}
