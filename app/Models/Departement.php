<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Departements extends Model
{
    protected $fillable = [

        'libelle'

    ];

    public function directions()
    {
        return $this->belongsToMany('App\Models\Directions');
    }

}
