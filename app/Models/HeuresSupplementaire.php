<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HeuresSupplementaire extends Model
{
    protected $fillable = [

        'nbr_heure',
        'majoration',
        'mois_heure_supp',
        'montant_horaire',
        'montant_heure_supp',
        'agent_id'

    ];

    protected $dates = ['mois_heure_supp'];

    public function agent()
        {
        return $this->belongsTo('App\Models\Agent');
        }
}
