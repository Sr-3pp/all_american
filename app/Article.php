<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $fillable = [
        'title', 'content', 'archivo'
    ];

    public function likes(){
        return $this->hasMany('App\Like');
    }
    public function comments(){
        return $this->hasMany('App\Comment');
    }
}
