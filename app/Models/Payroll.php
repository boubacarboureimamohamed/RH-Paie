<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payroll extends Model
{
    protected $fillable = [
        'mois',
        'debut_mois',
        'fin_mois',
        'net_a_payer',
        'agent_id',
        'cloture_mensuelle_id'
    ];
    protected $dates = ['mois'];

    public function agent()
    {
        return $this->belongsTo('App\Models\Agent');
    }

    public function cloture_mensuelle()
    {
        return $this->belongsTo('App\Models\ClotureMensuelle');
    }
}
