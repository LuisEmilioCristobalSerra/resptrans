<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ResponsiveLetterDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'inventory_item_id',
        'quantity',
    ];

    public function responsive()
    {
        return $this->belongsTo(ResponsiveLetter::class);
    }

    public function inventoryItemPivot()
    {
        return $this->belongsTo(Inventory::class, 'inventory_item_id', 'id');
    }

    public function items()
    {
        return $this->hasMany(ResponsiveLetterDetailItem::class);
    }
}
