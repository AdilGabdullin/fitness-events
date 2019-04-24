<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\Models\Media as MMedia;

class Media extends MMedia
{
    public function scopeSearch($query, $s)
    {
        return $query->where('name', 'like', '%'.$s.'%')
            ->orWhere('model_type', 'like', '%'.$s.'%')
            ->orWhere('file_name', 'like', '%'.$s.'%');
    }
}
