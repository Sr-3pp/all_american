<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FinishCategory extends Model
{
    protected $fillable = [
        'name', 'description'
    ];

    public function finishes(){
        return $this->hasMany('App\Finish');
    }
}
