<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Votes extends Model
{
    protected $fillable = [
        'grade', 'name', 'title', 'email', 'review'
    ];
}
