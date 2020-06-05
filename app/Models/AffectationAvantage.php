<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AffectationAvantage extends Model
{
    protected $fillable = [

        'agent_id',
        'avantage_id',
        'montant'

    ];

    public function agent()
    {
        return $this->belongsTo('App\Models\Agent');
    }

    public function avantage()
    {
        return $this->belongsTo('App\Models\Avantage');
    }
}
