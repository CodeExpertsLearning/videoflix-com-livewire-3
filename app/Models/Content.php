<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Content extends Model
{
    /** @use HasFactory<\Database\Factories\ContentFactory> */
    use HasFactory;

    protected $fillable = [
        'title','code', 'description',
        'body', 'slug', 'cover', 'status', 'type'
    ];

    public function videos(): HasMany
    {
        return $this->hasMany(Video::class);
    }
}
