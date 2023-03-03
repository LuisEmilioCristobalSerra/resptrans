<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InformationTransferDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'information_transfer_id',
        'code',
        'serial',
        'oc',
    ];
}
