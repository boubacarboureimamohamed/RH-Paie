<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Impot extends Model
{
    protected $fillable = [
        'minimum',
        'maximum',
        'taux'
    ];
}