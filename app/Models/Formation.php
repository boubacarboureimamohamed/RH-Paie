<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Formations extends Model
{
    protected $fillable = [

        'lieu',
        'date_debut_formation',
        'date_fin_formation',
        'bilan_formation',
        'date',
        'agents_id',
        'type_formations_id'

    ];

    public function agents()
    {
        return $this->belongsToMany('App\Models\Agents', 'agents_formations');
    }

    public function typeformation()
    {
        return $this->belongsTo('App\Models\TypeFormations');
    }
}
