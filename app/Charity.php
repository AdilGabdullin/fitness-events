<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Charity extends Model
{
    protected $fillable = ['name', 'email', 'phone', 'logo', 'website_link'];
}
