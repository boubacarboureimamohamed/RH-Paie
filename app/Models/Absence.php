<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Absence extends Model
{
    protected $fillable = [

        'type_id',
        'agent_id',
        'date_debut_absence',
        'date_fin_absence',
        'motif_absence'

    ];

    public function agent()
    {
        return $this->belongsTo('App\Models\Agent');
    }

    public function typeabsence()
    {
        return $this->belongsTo('App\Models\TypeAbsence');
    }
}
