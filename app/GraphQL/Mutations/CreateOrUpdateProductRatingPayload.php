<?php

namespace App\GraphQL\Mutations;

use App\Models\Product;
use Illuminate\Support\Facades\Auth;

final class CreateOrUpdateProductRatingPayload
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {

        $product = Product::find($args["product_id"]);

        $product
            ->usersRated()
            ->sync([Auth::id() => ["rating" => $args["rating"]]], false);

        return [
            "product" => $product,
        ];

    }
}
