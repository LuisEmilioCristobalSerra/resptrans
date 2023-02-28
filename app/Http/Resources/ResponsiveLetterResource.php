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
            "employee" => [
                "id" => $this->subsidiaryEmployeePivot->employee->id,
                "name" => $this->subsidiaryEmployeePivot->employee->name,
                "paternal_surname" => $this->subsidiaryEmployeePivot->employee->paternal_surname,
                "maternal_surname" => $this->subsidiaryEmployeePivot->employee->maternal_surname,
                "email" => $this->subsidiaryEmployeePivot->employee->email,
                "phone" => $this->subsidiaryEmployeePivot->employee->phone,
                "workstation" => $this->subsidiaryEmployeePivot->employee->workstation,
            ],
            "details" => ResponsiveLetterDetailResource::collection($this->details),
        ];
    }
}
