<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TypeAbsence extends Model
{
    public function absences()
    {
        return $this->hasMany('App\Models\Absence');
    }
}
