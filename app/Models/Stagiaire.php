<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Stagiaire extends Model
{
    protected $fillable = [

        'nom',
        'prenom',
        'date_naiss',
        'lieu_naiss',
        'sexe',
        'adresse',
        'nationalite',
        'telephone',
        'email',
        'date_debut_stage',
        'date_fin_stage',
        'theme_id',
        'recrutement_id',
        'service_id'

    ];

    public function theme()
    {
        return $this->belongsTo('App\Models\Theme');
    }

    public function recrutement()
    {
        return $this->belongsTo('App\Models\Recrutement');
    }

    public function service()
    {
        return $this->belongsTo('App\Models\Service');
    }
}
