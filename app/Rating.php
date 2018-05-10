<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    protected $guarded = ['id'];

    public function movie()
    {
        return $this->belongsTo('App\Movie');
    }

    public function user() 
    { 
        return $this->hasOne('App\User', 'id', 'user_id'); 
    }
}
