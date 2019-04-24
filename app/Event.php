<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;

class Event extends Model implements HasMedia
{
    use HasMediaTrait;
    protected  $fillable = ['name','url', 'cost', 'distance', 'distance_type', 'date_time', 'event_provider_id', 'short_description', 'long_description', 'address', 'city', 'postcode', 'country', 'latitude', 'longitude', 'image', 'tags_sport', 'tags_region', 'tags_distance', 'tags_charity_sponsors', 'signup_btn_txt', 'signup_btn_link', 'discount', 'discount_code', 'discount_link', 'meta_title', 'meta_description', 'page_url', 'related_events', 'related_articles', 'is_featured', 'charity_sponsors', 'tag_category_id', 'discount_link_text', 'image_name', 'image_alt_tag', 'phone'];

    public function eventprovider()
    {
        return $this->belongsTo('App\EventProvider', 'event_provider_id');
    }

    public function tagCategory()
    {
        return $this->belongsTo('App\TagCategory', 'tag_category_id');
    }

    public function registerMediaCollections()
    {
        $this->addMediaCollection('event_image');
    }

    public function getTagColor($id)
    {
        $color = "#29af61";
        if ($id == 1) {
            $color = "#29af61";
        } elseif ($id == 2) {
            $color = "#e775b3";
        } elseif ($id == 3) {
            $color = "#8a5d3b";
        } elseif ($id == 4) {
            $color = "#be90d4";
        } elseif ($id == 5) {
            $color = "#66cc99";
        } elseif ($id == 6) {
            $color = "#89c4f4";
        } elseif ($id == 7) {
            $color = "#f4d03f";
        } else {
            $color = "#f2784b";
        }
        return $color;
    }

    public function scopeSearch($query, $s)
    {
        return $query->where('name', 'like', '%'.$s.'%')
        ->orWhere('address', 'like', '%'.$s.'%')
        ->orWhere('city', 'like', '%'.$s.'%')
        ->orWhere('postcode', 'like', '%'.$s.'%')
        ->orWhere('tags_region', 'like', '%'.$s.'%')
        ->orWhere('tags_region', 'like', '%'.$s.'%')
        ->orWhere('tags_distance', 'like', '%'.$s.'%');
    }
}
