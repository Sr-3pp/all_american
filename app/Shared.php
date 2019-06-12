<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shared extends Model
{
    protected $fillable = [
        'forming_id', 'name', 'email', 'afair', 'message', 'archivo'
    ];

    public function forming(){
        return $this->belongsTo('App\Forming');
    }
}
