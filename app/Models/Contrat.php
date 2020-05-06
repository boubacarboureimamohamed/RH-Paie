<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contrat extends Model
{
    protected $fillable = [

        'ref_contrat',
        'description',
        'date',
        'date_debut_contrat',
        'date_fin_contrat',
        'agent_id'

    ];

    public function agent()
    {
        return $this->belongsTo('App\Models\Agent');
    }
}
