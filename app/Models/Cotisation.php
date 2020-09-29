<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cotisation extends Model
{
    protected $fillable = [

        'taux_cnss_employe_national',
        'plafond_cnss_employe_national',
        'taux_cnss_employe_expatrie',
        'plafond_cnss_employe_expatrie',
        'taux_cnss_employeur',
        'plafond_cnss_employeur',
        'taux_anpe',
        'plafond_anpe'
        
        ];
}
