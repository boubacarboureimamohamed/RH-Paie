<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Formation extends Model
{
    protected $fillable = [

        'lieu',
        'date_debut_formation',
        'date_fin_formation',
        'attestation',
        'agent_id',
        'type_formation_id'

    ];

    public function agents()
    {
        return $this->belongsToMany('App\Models\Agent', 'agent_formation');
    }

    public function typeFormation()
    {
        return $this->belongsTo('App\Models\TypeFormation');
    }
}
