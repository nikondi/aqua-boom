<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Result extends Model
{
    public $timestamps = false;

    public function getBeforeUrl(): string
    {
        return Storage::url($this->before);
    }

    public function getAfterUrl(): string
    {
        return Storage::url($this->after);
    }

    protected $fillable = [
        'before',
        'after',
    ];
}
