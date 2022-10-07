<?php

namespace App\Http\Resources\Rating;

use Illuminate\Http\Resources\Json\JsonResource;

class RatingResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'score' => $this->score,
            'rateable_type' => $this->rateable_type,
            'rateable_id' => $this->rateable_id,
            'qualifier_type ' => $this->qualifier_type,
            'qualifier_id' => $this->qualifier_id
        ];
    }
}
