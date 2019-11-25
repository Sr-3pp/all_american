<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    protected $fillable = [
        'name', 'archivo', 'cover', 'project_id'
    ];

    public function project(){
        return $this->belongsTo('App\Project');
    }

    public function likes(){
        return $this->hasMany('App\Like');
    }
}
