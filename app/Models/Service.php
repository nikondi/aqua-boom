<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Service extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'name',
        'description',
        'price',
        'image',
    ];

    public function getImageUrl(): string
    {
        return Storage::url($this->image);
    }
}
