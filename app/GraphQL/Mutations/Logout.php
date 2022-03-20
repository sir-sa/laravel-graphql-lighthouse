<?php

namespace App\GraphQL\Mutations;

use App\Models\User;
use GraphQL\Error\Error;

class Logout
{
    /**
     * @param  null  $_
     * @param  array<string, mixed>  $args
     */
    public function __invoke($_, array $args): ?User
    {
        // We are using sanctum as our API guard
        $auth_guard = config('sanctum.guard', 'web');

        if(is_array($auth_guard)){
            $auth_guard = $auth_guard[0];
        }

        $guard = auth()->guard($auth_guard);

        /** @var \App\Models\User|null $user */
        $user = $guard->user();
        $guard->logout();

        return $user;
    }
}
