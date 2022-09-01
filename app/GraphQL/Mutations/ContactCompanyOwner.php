<?php

namespace App\GraphQL\Mutations;

use App\Mail\ContactMail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

final class ContactCompanyOwner
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {

        Mail::to($args["emailTo"])->send(

            new ContactMail(
                Auth::user(),
                $args["subject"],
                $args["message"],
            )
        );

        return [
            "status" => "SUCCESSFUll"
        ];
    }
}
