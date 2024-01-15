<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\ResponseCache\Facades\ResponseCache;

class Certificate extends Model
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

        Certificate::created(function () {
            ResponseCache::clear();
        });

        Certificate::updated(function () {
            ResponseCache::clear();
        });

        Certificate::deleted(function () {
            ResponseCache::clear();
        });
    }
}
