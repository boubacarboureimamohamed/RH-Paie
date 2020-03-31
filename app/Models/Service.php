<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $fillable = [

        'libelle',
        'directions_id'

    ];

    public function direction()
    {
        return $this->belongsTo('App\Models\Direction');
    }
}
