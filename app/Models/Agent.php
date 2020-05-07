<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Agent extends Model
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
        'recrutement_id'
    ];

    public function recrutement()
    {
        return $this->belongsTo('App\Models\Recrutement');
    }

    public function missions()
    {
        return $this->belongsToMany('App\Models\Mission');
    }

    public function formations()
    {
        return $this->belongsToMany('App\Models\Formation', 'agents_formations');
    }

    public function absences()
    {
        return $this->hasMany('App\Models\Absence');
    }

    public function contrats()
    {
        return $this->hasMany('App\Models\Contrat');
    }

    public function cursus()
    {
        return $this->hasMany('App\Models\Cursu');
    }

    public function charges()
    {
        return $this->hasMany('App\Models\Charge');
    }
}
