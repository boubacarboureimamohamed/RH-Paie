<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cursu extends Model
{
    protected $fillable = [
        'ecole',
        'date_debut',
        'date_fin',
        'diplome',
        'agent_id'
    ];

    public function agent()
    {
        return $this->belongsTo('App\Models\Agent');
    }
}
