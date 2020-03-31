<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Agents extends Model
{
    protected $fillable = [
        'matricule',
        'nom',
        'prenom',
        'date_naiss',
        'lieu_naiss',
        'telephone',
        'email',
        'sexe',
        'fonction',
        'nationalite',
        'adresse',
        'agents_recrutements_id'
    ];

    public function recrutement()
    {
        return $this->belongsTo('App\Models\Recrutements');
    }

    public function missions()
    {
        return $this->belongsToMany('App\Models\Missions');
    }

    public function formations()
    {
        return $this->belongsToMany('App\Models\Formations');
    }
}
