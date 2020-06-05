<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TypeConge extends Model
{
    public function conges()
    {
        return $this->hasMany('App\Models\Conge');
    }
}
