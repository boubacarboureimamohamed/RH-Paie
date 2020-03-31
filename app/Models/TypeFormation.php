<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TypeFormation extends Model
{
    public function formations()
    {
        return $this->belongsToMany('App\Models\Formation');
    }
}
