<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class SightResource extends JsonResource
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
            'sight_id' => $this->id,
            'sight_name' => $this->name,
            'sight_city' => $this->city,
            'sight_country' => $this->country,
            'sight_rating' => $this->rating,
            'sight_descprition' => $this->details,
            'sight_location' => $this->location,
            'sight_link' => $this->link,
            'sight_image_id' => $this->image_id,
            'sight_cultures' => CultureResource::collection($this->cultures),
            'sight_natures' => CultureResource::collection($this->natures),
        ];
    }
}
