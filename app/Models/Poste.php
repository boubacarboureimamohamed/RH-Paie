<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Poste extends Model
{
    protected $fillable =[
        'intitule'
    ];

    public function affectations()
    {
        return $this->hasMany('App\Models\Affectation');
    }

    public function contrats()
    {
        return $this->hasMany('App\Models\Contrat');
    }


}
