<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FinishType extends Model
{
    protected $fillable = [
        'finish_id', 'archivo', 'name', 'bases'
    ];

    public function finish(){
        return $this->blongsTo('App\Finish');
    }
}
