<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductRatingRequest;
use App\Http\Requests\UpdateProductRatingRequest;
use App\Models\ProductRating;
use Illuminate\Support\Facades\Auth;

class ProductRatingController extends Controller
{

    public function store(StoreProductRatingRequest $request)
    {

        $fiels = $request->validated();

        Auth::user()->productRating()->create($fiels);
    }

    public function update(UpdateProductRatingRequest $request, $id){

        $fiels = $request->validated();

        $productRating = ProductRating::findOrfail($id);

        $this->authorize('update', $productRating);

        $productRating->update($fiels);
    }

}
