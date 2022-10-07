<?php

namespace App\Http\Resources\Rating;

use Illuminate\Http\Resources\Json\ResourceCollection;

class RatingCollection extends ResourceCollection
{
    public $collects = RatingResource::class;
}
