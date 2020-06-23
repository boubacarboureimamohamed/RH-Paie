<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Abattement extends Model
{
    protected $fillable = [

        'nombre_charge',
        'pourcentage'

    ];
}
