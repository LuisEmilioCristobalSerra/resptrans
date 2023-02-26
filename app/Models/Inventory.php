<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
    use HasFactory;

    protected $fillable = [
        'item_id',
        'subsidiary_id',
    ];

    public function item()
    {
        return $this->belongsTo(Item::class);
    }

    public function subsidiary()
    {
        return $this->belongsTo(Subsidiary::class);
    }
}
