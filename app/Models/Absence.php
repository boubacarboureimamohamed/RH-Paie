<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Absence extends Model
{
    protected $fillable = [

        'agent_id',
        'nombre_jour',
        'motif_absence',
        'mois_absence',
        'montant_a_prelever',
        'type_absence_id'

        ];

    protected $dates = ['mois_absence'];

    public function type_absence()
        {
        return $this->belongsTo('App\Models\TypeAbsence');
        }
    public function agent()
        {
        return $this->belongsTo('App\Models\Agent');
        }
}
