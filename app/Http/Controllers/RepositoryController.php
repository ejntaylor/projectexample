<?php

namespace App\Http\Controllers;

use App\Services\RepositoryService;
use App\Services\TokenService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Validation\ValidationException;

class RepositoryController extends Controller
{
    public function fetch(RepositoryService $repoService, TokenService $tokenService)
    {

        try {
            $token = $tokenService->getUserToken(Auth::user());
            $starredRepos = $repoService->getUsersStarredRepos($token);
        } catch (\Exception $e) {
            throw ValidationException::withMessages(['message' => $e->getMessage()]);
        }

        return Redirect::route('home')->with('starredRepos', $starredRepos);

    }
}
