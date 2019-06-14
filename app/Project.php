<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = [
        'name'
    ];

    public function gallery(){
        return $this->hasMany('App\Gallery');
    }
}
