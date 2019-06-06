<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mills extends Model
{
    protected $fillable = [
        'name', 'svg', 'category_id'
    ];

    public function category(){
        return $this->belongsTo('App\Category');
    }
}
