<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;

class Page extends Model implements HasMedia
{
    use HasMediaTrait;
    protected $fillable = ['title', 'url', 'page_category_id', 'tag_ids', 'description', 'content', 'add_ids', 'banner_image', 'banner_name', 'banner_alt_tag', 'meta_title', 'meta_description'];

    public function registerMediaCollections()
    {
        $this->addMediaCollection('page_thumb');
    }

    public function pageCategory()
    {
        $this->belongsTo('App\Page', 'page_category_id');
    }
}
