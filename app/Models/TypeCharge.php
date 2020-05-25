<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TypeCharge extends Model
{
    protected $fillable = [
        'type_charge'
    ];

    public function charges()
    {
        return $this->hasMany('App\Models\Charge');
    }
}
