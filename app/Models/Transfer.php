<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transfer extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'origin_id',
        'target_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function origin()
    {
        return $this->belongsTo(Subsidiary::class, 'origin_id');
    }

    public function target()
    {
        return $this->belongsTo(Subsidiary::class, 'target_id');
    }

    public function details()
    {
        return $this->hasMany(InformationTransfer::class);
    }
}
