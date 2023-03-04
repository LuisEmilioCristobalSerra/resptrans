<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class TransferResource extends JsonResource
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
            "id" => $this->id,
            "generated_by" => $this->user,
            "created_at" => $this->created_at,
            "origin" => [
                "id" => $this->origin->id,
                "name" => $this->origin->name,
                "street" => $this->origin->street,
                "interior" => $this->origin->interior,
                "exterior" => $this->origin->exterior,
                "district" => $this->origin->district,
                "postal_code" => $this->origin->postal_code,
            ],
            "target" => [
                "id" => $this->target->id,
                "name" => $this->target->name,
                "street" => $this->target->street,
                "interior" => $this->target->interior,
                "exterior" => $this->target->exterior,
                "district" => $this->target->district,
                "postal_code" => $this->target->postal_code,
            ],
            "details" => ResponsiveLetterDetailResource::collection($this->details),
        ];
    }
}
