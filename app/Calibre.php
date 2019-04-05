<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Calibre extends Model
{
    protected $fillable = [
        'material_id', 'gauge', 'thick'
    ];

    public function material(){
        return $this->belongsTo('App\Material');
    }
}
