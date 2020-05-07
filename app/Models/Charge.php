<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Charge extends Model
{
    protected $fillable = [
        'nomc',
        'prenomc',
        'date_naissc',
        'lieu_naissc',
        'nationalitec',
        'sexec',
        'type_id',
        'agent_id'
    ];

    public function agent()
    {
        return $this->belongsTo('App\Models\Agent');
    }

    public function typecharge()
    {
        return $this->belongsTo('App\Models\TypeCharge');
    }
}
