<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Recrutement extends Model
{
    protected $fillable = [
        'ref_recrutement',
         'description',
          'date_offre'
        ];

    public function agents()
    {
        return $this->belongsToMany('App\Models\Agent');
    }

    public function stagiaires()
    {
        return $this->belongsToMany('App\Models\Stagiaire');
    }
}
