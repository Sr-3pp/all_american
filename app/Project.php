<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = [
        'name', 'category_id'
    ];

    public function gallery(){
        return $this->hasMany('App\Gallery');
    }
}
