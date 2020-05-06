<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Departement extends Model
{
    protected $fillable = [

        'libelle'

    ];

    public function directions()
    {
        return $this->hasMany('App\Models\Direction');
    }
}
