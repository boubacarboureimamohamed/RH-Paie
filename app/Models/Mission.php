<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mission extends Model
{
    protected $fillable = [

        'ref_mission',
        'iteneraire',
        'ordre_mission',
        'date_debut_mission',
        'date_fin_mission',
        'motif_mission',
        'bilan_mission',
        'date',
        'agent_id'

    ];

    public function agents()
    {
        return $this->belongsToMany('App\Models\Agent', 'agents_missions');
    }
}
