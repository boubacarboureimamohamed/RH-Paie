<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Affectation extends Model
{
    protected $fillable = [
        'date_affectation',
        'agent_id',
        'service_id',
        'poste_id'
    ];

    public function agent()
    {
        return $this->belongsTo('App\Models\Agent');
    }

    public function poste()
    {
        return $this->belongsTo('App\Models\Poste');
    }

    public function service()
    {
        return $this->belongsTo('App\Models\Service');
    }
}
