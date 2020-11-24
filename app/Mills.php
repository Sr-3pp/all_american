<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mills extends Model
{
    protected $fillable = [
        'name'
    ];

    public function mills(){
        return $this->hasMany('App\MillType');
    }
}
