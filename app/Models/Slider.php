<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\ResponseCache\Facades\ResponseCache;

class Slider extends Model
{
    use HasFactory;

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

        Slider::created(function () {
            ResponseCache::clear();
        });

        Slider::updated(function () {
            ResponseCache::clear();
        });

        Slider::deleted(function () {
            ResponseCache::clear();
        });
    }
}
