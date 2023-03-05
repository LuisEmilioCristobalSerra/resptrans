<?php

namespace App\Models;

use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SubsidiaryAssigned extends Model
{
    use HasFactory;
    public $table = 'assign_subsidiaries';

    public function createResponsive()
    {
        return ResponsiveLetter::create([
            'user_id' => Auth::user()->id,
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
