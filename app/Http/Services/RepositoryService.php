<?php

namespace App\Services;

use GrahamCampbell\GitHub\GitHubManager;

class RepositoryService
{
    protected $github;

    public function __construct(GitHubManager $github)
    {
        $this->github = $github;
    }

    public function getUser($token)
    {
        return $this->github->getFactory()->make(['token' => $token, 'method' => 'token']);
    }

    public function getUsersStarredRepos($token)
    {
        return $this->getUser($token)->me()->starring()->all();
    }

}
