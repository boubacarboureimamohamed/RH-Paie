<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Themes extends Model
{
    protected $fillable = [

        'intitule'

    ];

    public function stagiaires()
    {
        return $this->belongsToMany('App\Models\Stagiaires');
    }
}
