<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'name', 'kind'
    ];

    public function projects(){
        return $this->hasMany('App\Project');
    }
    public function finishes(){
        return $this->hasMany('App\Finish');
    }
}
