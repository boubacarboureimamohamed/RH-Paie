<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Direction extends Model
{
    protected $fillable = [

        'libelle',
        'departement_id'

    ];

    public function departement()
    {
        return $this->belongsTo('App\Models\Departement');
    }

    public function services()
    {
        return $this->hasMany('App\Models\Service');
    }
}
