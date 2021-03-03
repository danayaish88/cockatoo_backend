<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PlaceResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'place_id' => $this->id,
            'place_name' => $this->name,
            'place_city' => $this->city,
            'place_country' => $this->country,
            'place_rating' => $this->rating,
            'place_location' => $this->location,
            'place_link' => $this->link,
            'place_image_id' => $this->image_id,
            'place_category' => $this->category
        ];
    }
}
