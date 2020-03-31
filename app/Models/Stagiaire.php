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
        'stagiaires_themes_id',
        'stagiaires_recrutements_id',
        'stagiaires_services_id'

    ];

    public function theme()
    {
        return $this->belongsTo('App\Models\Theme');
    }

    public function recrutement()
    {
        return $this->belongsTo('App\Models\Recrutement');
    }
}
