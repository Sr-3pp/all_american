<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [
        'article_id', 'newsletter_id', 'comment'
    ];

    public function article(){
        return $this->belongsTo('App\Article');
    }
    public function newsletter(){
        return $this->belongsTo('App\Newsletter');
    }
}
