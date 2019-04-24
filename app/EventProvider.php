<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;

class EventProvider extends Model implements HasMedia
{
    use HasMediaTrait;
    protected $fillable = ['company_name', 'url', 'email', 'company_type', 'phone', 'facebook', 'twitter', 'logo_path', 'company_information', 'logo_name', 'logo_alt_tag_name'];

    public function registerMediaCollections()
    {
        $this->addMediaCollection('event_provider_image');
    }
}
