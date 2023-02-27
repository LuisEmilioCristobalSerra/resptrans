<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
}
