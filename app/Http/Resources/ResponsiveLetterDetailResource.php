<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ResponsiveLetterDetailResource extends JsonResource
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
            "id" => $this->inventoryItemPivot->item->id,
            "name" => $this->inventoryItemPivot->item->name,
            "description" => $this->inventoryItemPivot->item->description,
            "code" => $this->inventoryItemPivot->item->code,
            "serial" => $this->inventoryItemPivot->item->serial,
            "invoice" => $this->inventoryItemPivot->item->invoice,
            "oc" => $this->inventoryItemPivot->item->oc,
            "bought_at" => $this->inventoryItemPivot->item->bought_at,
            "created_at" => $this->inventoryItemPivot->item->created_at,
            "updated_at" => $this->inventoryItemPivot->item->updated_at,
            "quantity" => $this->quantity,
        ];
    }
}
