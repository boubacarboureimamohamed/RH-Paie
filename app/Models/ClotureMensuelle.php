<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ClotureMensuelle extends Model
{
    protected $fillable = [

        'mois_cloture',
        'date_cloture'

    ];

    public function payrolls()
    {
        return $this->hasMany('App\Models\Payroll');
    }
}
