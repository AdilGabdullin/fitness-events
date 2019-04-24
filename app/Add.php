<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;

class Add extends Model implements HasMedia
{
    use HasMediaTrait;
    protected $fillable = ['image', 'image_name', 'image_alt_tag', 'image_link', 'page_id'];

    public function registerMediaCollections()
    {
        $this->addMediaCollection('add_image');
    }
}
