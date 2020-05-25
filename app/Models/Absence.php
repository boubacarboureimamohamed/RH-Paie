<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Absence extends Model
{
    protected $fillable = [

        'agent_id',
        'nombre_jour',
        'motif_absence'

    ];

    public function agent()
    {
        return $this->belongsTo('App\Models\Agent');
    }

}
