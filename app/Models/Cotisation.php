<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cotisation extends Model
{
    protected $fillable = [
        'taux_cnss_employe',
        'plafond_cnss_employe',
        'taux_cnss_employeur',
        'plafond_cnss_employeur',
        'taux_anpe',
        'plafond_anpe'
        ];
}
