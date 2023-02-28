<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubsidiaryAssigned extends Model
{
    use HasFactory;
    public $table = 'assign_subsidiaries';

    public function createResponsive()
    {
        return ResponsiveLetter::create([
            'user_id' => 1,
            'assign_subsidiary_id' => $this->id,
        ]);
    }

    public function employee()
    {
        return $this->hasOne(Employee::class, 'id', 'employee_id');
    }

    public function subsidiary()
    {
        return $this->hasOne(Subsidiary::class, 'id', 'subsidiary_id');
    }
}
