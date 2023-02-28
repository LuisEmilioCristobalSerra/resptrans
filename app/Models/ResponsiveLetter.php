<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOneThrough;

class ResponsiveLetter extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'assign_subsidiary_id',
    ];

    public function details()
    {
        return $this->hasMany(ResponsiveLetterDetail::class);
    }

    public function employee()
    {
        return AssignSubsidiary::query()->where('id', 'assign_subsidiary_id')->first();
    }

    public function subsidiaryEmployeePivot()
    {
        return $this->hasOne(SubsidiaryAssigned::class, 'id', 'assign_subsidiary_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
