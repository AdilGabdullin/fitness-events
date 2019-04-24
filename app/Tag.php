<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;

class Tag extends Model implements HasMedia
{
    use HasMediaTrait;
    protected $fillable = ['name', 'slug', 'description', 'tag_category_id'];

    public function tagCategory()
    {
        return $this->belongsTo('App\TagCategory', 'tag_category_id');
    }

    public function registerMediaCollections()
    {
        $this->addMediaCollection('tag_image');
    }
}
