<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    protected $fillable = [
        'article_id'
    ];

    public function article(){
        return $this->belongsTo('App\Article');
    }
}
