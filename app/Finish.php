<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Finish extends Model
{
    protected $fillable = [
        'name', 'description'
    ];

    public function finishes(){
        return $this->hasMany('App\FinishType');
    }
}
