<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contrat extends Model
{
    protected $fillable = [

        'ref_contrat',
        'description',
        'salaire_base',
        'date',
        'date_debut_contrat',
        'date_fin_contrat',
        'agent_id',
        'poste_id'

    ];

    public function agent()
    {
        return $this->belongsTo('App\Models\Agent');
    }

    public function poste()
    {
        return $this->belongsTo('App\Models\Poste');
    }
}
