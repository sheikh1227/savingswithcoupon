<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class homeform extends Model
{
    use HasFactory;
    protected $fillable = [
        'sold',
        'discount',
        'save',
        'image',
        'Oprice',
        'Dprice',
        'expires',
        'useonline',
        'use',

    ];
}
