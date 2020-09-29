<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Nationalite extends Model
{
    protected $fillable = [

        'nationalite'

    ];

    public function agents()
    {
        return $this->hasMany('App\Models\Agent');
    }
}
