<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subsidiary extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'street',
        'interior',
        'exterior',
        'district',
        'postal_code',
    ];

    public function employees()
    {
        return $this->belongsToMany(Employee::class, 'assign_subsidiaries')->using(AssignSubsidiary::class);
    }

    public function inventoryItems()
    {
        return Inventory::query()->where('subsidiary_id', $this->id);
    }
}
