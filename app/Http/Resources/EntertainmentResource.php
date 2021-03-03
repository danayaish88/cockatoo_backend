<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class EntertainmentResource extends JsonResource
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
            'entertainment_id' => $this->id,
            'entertainment_name' => $this->name,
            'entertainment_city' => $this->city,
            'entertainment_country' => $this->country,
            'entertainment_rating' => $this->rating,
            'entertainment_descprition' => $this->details,
            'entertainment_location' => $this->location,
            'entertainment_link' => $this->link,
            'entertainment_image_id' => $this->image_id,
            'entertainment_type' => $this->type
        ];
    }
}
