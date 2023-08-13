<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ColumnResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $locations = [];
        foreach ($this->locations as $location) {
            $locations[] = [
                'address' => $location->address,
                'location' => $location->location,
            ];
        }
        return [
            'column_id' => $this->id,
            'column_name' => $this->name,
            'locations' => $locations,
        ];
    }
}
