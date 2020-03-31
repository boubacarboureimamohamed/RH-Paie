<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TypeFormations extends Model
{
    public function formations()
    {
        return $this->belongsToMany('App\Models\Formations');
    }
}
