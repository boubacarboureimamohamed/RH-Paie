<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mission extends Model
{
    protected $fillable = [

        'numero_ordre_mission',
        'objet_mission',
        'date_debut_mission',
        'date_fin_mission',
        'depart',
        'destination',
        'agent_id'

    ];

    public function agents()
    {
        return $this->belongsToMany('App\Models\Agent', 'agent_mission')->withPivot('est_chef');
    }
}
