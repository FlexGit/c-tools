<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\ResponseCache\Facades\ResponseCache;

class Service extends Model
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

        Service::created(function () {
            ResponseCache::clear();
        });

        Service::updated(function () {
            ResponseCache::clear();
        });

        Service::deleted(function () {
            ResponseCache::clear();
        });
    }

    /**
     * @return mixed
     */
    public static function activeServices() {
        return self::where('is_active', true)->orderBy('title')->get();
    }
}
