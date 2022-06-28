<?php

namespace App\GraphQL\Mutations;

use Illuminate\Support\Facades\Auth;

final class Logout
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     * @return array [status, message]
     */
    public function __invoke($_, array $args): array
    {
        
        Auth::user()->tokens()->delete();

        return [
            'status'  => 'TOKEN_REVOKED',
            'message' => 'Your session has been terminated',
        ];
    }
}
