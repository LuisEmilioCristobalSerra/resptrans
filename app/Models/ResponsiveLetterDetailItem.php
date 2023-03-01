<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ResponsiveLetterDetailItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'responsive_letter_detail_id',
        'code',
        'serial',
        'oc',
    ];
}
