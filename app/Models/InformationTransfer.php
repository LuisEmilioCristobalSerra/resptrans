<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InformationTransfer extends Model
{
    use HasFactory;

    protected $fillable = [
        'transfer_id',
        'inventory_item_id',
        'quantity',
    ];

    public function inventoryItemPivot()
    {
        return $this->belongsTo(Inventory::class, 'inventory_item_id', 'id');
    }

    public function items()
    {
        return $this->hasMany(InformationTransferDetail::class);
    }
}
