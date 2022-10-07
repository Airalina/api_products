<?php

namespace App\Http\Controllers;

use App\Http\Resources\Product\ProductResource;
use App\Http\Resources\Rating\RatingResource;
use App\Models\User;
use App\Models\Product;
use Gate;
use Illuminate\Http\Request;

class ProductRatingController extends Controller
{
    public function rate(Product $product, Request $request)
    {
        $this->validate($request, [
            'score' => 'required'
        ]);

        /** @var User $user */
        $user = $request->user();
        $user->rate($product, $request->get('score'));

        return new ProductResource($product);
    }

    public function unrate(Product $product, Request $request)
    {
        /** @var User $user */
        $user = $request->user();
        $user->unrate($product);

        return new ProductResource($product);
    }
}
