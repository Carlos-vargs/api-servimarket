<?php

namespace App\GraphQL\Mutations;

use App\Models\User;

final class Register
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     * @return array [user, token]
     */
    public function __invoke($_, array $args): array
    {
        $user = User::create([
            'name' => $args['name'],
            'email' => $args['email'],
            'password' => bcrypt($args['password']),
        ]);

        return [
            'user' => $user,
            'token' => $user->createToken('default')->plainTextToken
        ];
    }
}
