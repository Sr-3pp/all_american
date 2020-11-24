<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Newsletter extends Model
{
    protected $fillable = [
        'email', 'status'
    ];

    public function comments(){
        return $this->hasMany('App\Comments');
    }
}
