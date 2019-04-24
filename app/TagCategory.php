<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TagCategory extends Model
{
    public function tag()
    {
        return $this->hasMany('App\Tag');
    }
}
