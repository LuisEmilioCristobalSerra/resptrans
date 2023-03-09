<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class SubsidiaryEmployeeResource extends JsonResource
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
            "id" => $this->employee->name,
            "name" => $this->employee->name,
            "paternal_surname" => $this->employee->paternal_surname,
            "maternal_surname" => $this->employee->maternal_surname,
            "email" => $this->employee->email,
            "phone" => $this->employee->phone,
            "workstation" => $this->employee->workstation,
        ];
    }
}
