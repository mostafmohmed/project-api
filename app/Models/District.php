<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class District extends Model
{
    public function city(): BelongsTo
    {
        return $this->belongsTo(City::class,'city_id');
    }

    
    protected $table='districts';
    use HasFactory;
}
