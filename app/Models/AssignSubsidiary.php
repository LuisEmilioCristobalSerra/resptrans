<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\Pivot;

class AssignSubsidiary extends Pivot
{
    use HasFactory;

    public function createResponsive()
    {
        return ResponsiveLetter::create([
            'user_id' => 1,
            'assign_subsidiary_id' => $this->id,
        ]);
    }
}
