<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ad extends Model
{

    protected $fillable = [
        'title','phone','description','user_id'
    ];

    use HasFactory;
}
