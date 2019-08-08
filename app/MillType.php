<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MillType extends Model
{
    protected $fillable = [
        'name', 'svg', 'mills_id'
    ];

    public function mills(){
        return $this->hasMany('App\Mill');
    }
}
