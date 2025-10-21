<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class GalleryImage extends Model
{
    public $timestamps = false;

    public function getUrl(): string
    {
        return Storage::url($this->image);
    }

    protected $fillable = [
        'image',
        'sort',
    ];
}
