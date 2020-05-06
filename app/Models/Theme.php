<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Theme extends Model
{
    protected $fillable = [

        'intitule'

    ];

    public function stagiaires()
    {
        return $this->hasMany('App\Models\Stagiaire');
    }
}
