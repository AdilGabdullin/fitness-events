<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;

class Blog extends Model implements HasMedia
{
    use HasMediaTrait;
    protected  $fillable = ['title', 'blog_category_id', 'short_description', 'main_content', 'meta_title', 'meta_description', 'url', 'image', 'image_name', 'image_alt_tag'];

    public function blogCategory()
    {
        return $this->belongsTo('App\BlogCategory', 'blog_category_id');
    }

    public function registerMediaCollections()
    {
        $this->addMediaCollection('blog_image');
    }

    public function blogCategoryColor()
    {
        $category_color = "#89c4f4";
        if($this->blog_category_id == 3) {
            $category_color = "#F87531";
        } elseif ($this->blog_category_id == 6) {
            $category_color = "#BF5FFF";
        } elseif ($this->blog_category_id == 5) {
            $category_color = "#f4d03f";
        } elseif ($this->blog_category_id == 4) {
            $category_color = "#66cc99";
        }
        return $category_color;
    }
}
