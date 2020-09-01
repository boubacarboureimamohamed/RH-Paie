<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Absence extends Model
{
    protected $fillable = [

        'agent_id',
        'date_debut',
        'date_fin',
        'nbr_jour',
        'paiement_absence',
        'motif_absence',
        'montant_a_prelever',
        'type_absence_id'

        ];

    public function type_absence()
        {
        return $this->belongsTo('App\Models\TypeAbsence');
        }
    public function agent()
        {
        return $this->belongsTo('App\Models\Agent');
        }
}
