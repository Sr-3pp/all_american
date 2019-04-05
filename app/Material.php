<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Material extends Model
{
    protected $fillable = [
        'name', 'description', 'img'
    ];

    public function gauges(){
        return $this->hasMany('App\Calibre');
    }
}
