<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\ResponseCache\Facades\ResponseCache;

class News extends Model
{
    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'is_active' => 'boolean',
    ];

    public static function boot()
    {
        parent::boot();

        News::created(function () {
            ResponseCache::clear();
        });

        News::updated(function () {
            ResponseCache::clear();
        });

        News::deleted(function () {
            ResponseCache::clear();
        });
    }
}
