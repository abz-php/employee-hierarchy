<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Employee extends JsonResource
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
            'id'           => $this->id,
            'full_name'    => $this->full_name,
            'chief_id'     => $this->chief_id,
            'position'     => __("catalog.position.{$this->position}"),
            'subordinates' => $this->relationLoaded('subordinates') ? Employee::collection($this->subordinates) : [],
        ];
    }
}
