<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Finish extends Model
{
    protected $fillable = [
        'name', 'description', 'finish_category_id'
    ];

    public function types(){
        return $this->hasMany('App\FinishType');
    }

    public function category(){
        return $this->belongsTo('App\FinishCategory');
    }
}
