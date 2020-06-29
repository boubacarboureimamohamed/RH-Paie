<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Avantage extends Model
{
    protected $fillable = [

        'libelle',
        'imposable'

    ];

    public function affectationAvantages()
    {
        return $this->hasMany('App\Models\AffectationAvantage');
    }

}
