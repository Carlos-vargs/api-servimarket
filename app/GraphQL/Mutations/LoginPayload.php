<?php

namespace App\GraphQL\Mutations;

use App\Models\User;

final class LoginPayload
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     * @return array [ user, token ]
     */
    public function __invoke($_, array $args): array
    {
        $user = User::whereEmail($args['email'])->first();

        return [
            'user' => $user,
            'token' => $user->createToken('default')->plainTextToken
        ];
    }
}
