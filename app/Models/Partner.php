<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\ResponseCache\Facades\ResponseCache;

class Partner extends Model
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

        Partner::created(function () {
            ResponseCache::clear();
        });

        Partner::updated(function () {
            ResponseCache::clear();
        });

        Partner::deleted(function () {
            ResponseCache::clear();
        });
    }
}
