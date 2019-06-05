<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Finish extends Model
{
    protected $fillable = [
        'category_id', 'name', 'archivo'
    ];

    public function categories(){
        return $this->belongsTo('App\Ctegory');
    }
}
