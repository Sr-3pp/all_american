<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Forming extends Model
{
    protected $fillable = [
        'object'
    ];

    public function shared(){
        return $this->hasMany('App\Shared');
    }
}
