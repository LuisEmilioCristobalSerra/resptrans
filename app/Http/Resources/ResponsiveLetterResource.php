<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ResponsiveLetterResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            "id" => $this->id,
            "generated_by" => $this->user,
            "created_at" => $this->created_at,
            "subsidiary" => [
                "id" => $this->subsidiaryEmployeePivot->subsidiary->id,
                "name" => $this->subsidiaryEmployeePivot->subsidiary->name,
                "street" => $this->subsidiaryEmployeePivot->subsidiary->street,
                "interior" => $this->subsidiaryEmployeePivot->subsidiary->interior,
                "exterior" => $this->subsidiaryEmployeePivot->subsidiary->exterior,
                "district" => $this->subsidiaryEmployeePivot->subsidiary->district,
                "postal_code" => $this->subsidiaryEmployeePivot->subsidiary->postal_code,
            ],
            "employee" => new SubsidiaryEmployeeResource($this->whenLoaded('subsidiaryEmployeePivot')),
            "details" => ResponsiveLetterDetailResource::collection($this->details),
        ];
    }
}
