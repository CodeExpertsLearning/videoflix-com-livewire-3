<?php

namespace App\Models;

use App\Traits\Sluggable;
use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    use Sluggable;

    protected $slugColumnFrom = 'name';

    protected $fillable = [
        'code', 'name', 'video', 'is_processed', 'thumb'
    ];
}
