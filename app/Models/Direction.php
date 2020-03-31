<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Directions extends Model
{

    protected $fillable = [

        'libelle',
        'departements_id'

    ];

    public function departement()
    {
        return $this->belongsTo('App\Models\Departements');
    }

    public function services()
    {
        return $this->belongsToMany('App\Models\Services');
    }
}
