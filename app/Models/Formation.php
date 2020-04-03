<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Formation extends Model
{
    protected $fillable = [

        'lieu',
        'date_debut_formation',
        'date_fin_formation',
        'bilan_formation',
        'date',
        'agents_id',
        'type_formation_id'

    ];

    public function agents()
    {
        return $this->belongsToMany('App\Models\Agent', 'agents_formations');
    }

    public function typeformation()
    {
        return $this->belongsTo('App\Models\TypeFormation');
    }
}
