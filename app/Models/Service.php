<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $fillable = [

        'libelle',
        'direction_id'

    ];

    public function direction()
    {
        return $this->belongsTo('App\Models\Direction');
    }

    public function stagiaires()
    {
        return $this->hasMany('App\Models\Stagiaire');
    }

    public function affectations()
    {
        return $this->hasMany('App\Models\Affectation');
    }
}
