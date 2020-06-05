<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Conge extends Model
{
    protected $fillable = [

        'date_debut_conge',
        'date_fin_conge',
        'agent_id',
        'type_conge_id'

    ];

    public function agent()
    {
        return $this->belongsTo('App\Models\Agent');
    }

    public function typeConge()
    {
        return $this->belongsTo('App\Models\TypeConge');
    }
}
