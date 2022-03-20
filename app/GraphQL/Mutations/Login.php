<?php

namespace App\GraphQL\Mutations;

use App\Models\User;
use GraphQL\Error\Error;

class Login
{
    /**
     * @param  null  $_
     * @param  array<string, mixed>  $args
     */
    public function __invoke($_, array $args): User
    {
        // We are using sanctum as our API guard
        $auth_guard = config('sanctum.guard', 'web');

        if(is_array($auth_guard)){
            $auth_guard = $auth_guard[0];
        }

        $guard = auth()->guard($auth_guard);

        if( ! $guard->attempt($args)) {
            throw new Error('Invalid credentials.');
        }

        /**
         * Since we successfully logged in, this can no longer be `null`.
         *
         * @var \App\Models\User $user
        */
        $user = $guard->user();

        return $user;
    }
}
