<?php

namespace App\Policies;

use App\Models\ProductRating;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ProductRatingPolicy
{
    use HandlesAuthorization;

     /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\ProductRating  $productRating
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, ProductRating $productRating)
    {
        return $user->id === $productRating->user_id;
    }

}
