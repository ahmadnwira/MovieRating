<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    protected $guarded = ['id'];

    public function ratings()
    {
        return $this->hasMany('App\Rating');
    }

    public function search($query)
    {
        return $this->whereRaw("MATCH(title, description, director) AGAINST(? IN BOOLEAN MODE)",  $query);

    }
}
